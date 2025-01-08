-- users table
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR (25),
    email VARCHAR (25),
    password VARCHAR (100),
    created_at DATE NOT NULL,
    PRIMARY KEY (id)
);

-- notes table
CREATE TABLE notes (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    created_at DATE NOT NULL,
    userId INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES users(id)
);