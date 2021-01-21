CREATE PROCEDURE update_user (
    @id INT,
    @first_name NVARCHAR(35),
    @last_name NVARCHAR(35),
    @email NVARCHAR(50),
    @password NVARCHAR(max)
)
AS
BEGIN

    BEGIN TRANSACTION

        BEGIN TRY
            UPDATE users
            SET 
                first_name = ISNULL(@first_name, first_name),
                last_name = ISNULL(@last_name, last_name),
                email = ISNULL(@email, email),
                [password] = ISNULL(CONVERT(VARCHAR, HASHBYTES('SHA2_256', @password)), [password])
            WHERE user_id = @id
            IF @@TRANCOUNT > 0 COMMIT
        END TRY
        BEGIN CATCH
            IF @@TRANCOUNT > 0 ROLLBACK
        END CATCH
END