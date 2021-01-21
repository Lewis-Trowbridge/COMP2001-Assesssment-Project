CREATE TRIGGER store_old_password 
ON users
AFTER UPDATE
AS
BEGIN
    DECLARE @old_password NVARCHAR(max)
    DECLARE @user_id INT
    SELECT @old_password = password FROM deleted
    SELECT @user_id = user_id FROM deleted

    INSERT INTO passwords(user_id, password_text, password_changed)
    VALUES
    (@user_id, @old_password, GETDATE())
END