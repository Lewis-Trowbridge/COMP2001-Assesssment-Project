CREATE TABLE passwords (
	password_id INT PRIMARY KEY IDENTITY(1,1),
	user_id INT NOT NULL,
	password_text VARCHAR(256) NOT NULL,
	password_changed DATETIME NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
)