CREATE TABLE sessions (
	session_id INT PRIMARY KEY IDENTITY(1,1),
	user_id INT NOT NULL,
	session_issued DATE NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
)