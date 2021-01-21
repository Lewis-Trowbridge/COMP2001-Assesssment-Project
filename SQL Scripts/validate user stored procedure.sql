CREATE PROCEDURE validate_user (
@email NVARCHAR(50),
@password NVARCHAR(max)
)
AS
BEGIN
	DECLARE @user_id INT
	SELECT @user_id = user_id FROM users
		WHERE email = @email
		AND password = HASHBYTES('SHA2_256', @password)
    -- If the user ID is not null, insert a session into the sessions table with this current user ID
	IF ISNULL(@user_id, 0) <> 0
		BEGIN
			INSERT INTO sessions(user_id, session_issued)
			VALUES
			(@user_id, GETDATE())
			RETURN 1
		END
	ELSE
		BEGIN
			RETURN 0
		END
END