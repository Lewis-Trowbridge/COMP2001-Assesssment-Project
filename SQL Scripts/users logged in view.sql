CREATE VIEW users_logged_in AS
SELECT users.user_id, first_name, last_name, email, COUNT(session_issued) AS logged_in_count
FROM users, sessions
WHERE users.user_id = sessions.user_id
GROUP BY users.user_id, first_name, last_name, email