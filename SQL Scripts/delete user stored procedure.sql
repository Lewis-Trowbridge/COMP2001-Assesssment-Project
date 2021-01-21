CREATE PROCEDURE delete_user (
    @id INT 
)
AS 
BEGIN

    BEGIN TRANSACTION

        BEGIN TRY
            DELETE FROM users
            WHERE user_id = @id
            IF @@TRANCOUNT > 0 COMMIT
        END TRY
        BEGIN CATCH
            IF @@TRANCOUNT > 0 ROLLBACK
        END CATCH
END