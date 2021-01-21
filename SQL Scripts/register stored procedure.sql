CREATE PROCEDURE register(
@first_name NVARCHAR(35),
@last_name NVARCHAR(35),
@email NVARCHAR (50),
@password NVARCHAR(max),
@response_message VARCHAR(max) OUTPUT
)
AS
BEGIN

	BEGIN TRANSACTION
	
		BEGIN TRY
		
			DECLARE @user_id VARCHAR(MAX)
			DECLARE @password_hash VARBINARY(256)
            SELECT @password_hash = HASHBYTES('SHA2_256', @password)


			INSERT INTO users(first_name, last_name, email, password)
			VALUES
			(@first_name, @last_name, @email, @password_hash)

			SELECT @user_id = CAST(SCOPE_IDENTITY() AS VARCHAR(MAX))
			SET @response_message = CONCAT('200 ', @user_id)
			IF @@TRANCOUNT > 0 COMMIT;
		END TRY
		BEGIN CATCH
			
			DECLARE @existing_email NVARCHAR(50)
			SELECT @existing_email = email FROM users WHERE email = @existing_email

			IF ISNULL(@existing_email, 'email not found') = 'email not found'
			BEGIN
				SET @response_message = '208'
			END
			ELSE
			BEGIN
				SET @response_message = '404'
			END
			IF @@TRANCOUNT > 0 ROLLBACK TRANSACTION;
		END CATCH
END
			