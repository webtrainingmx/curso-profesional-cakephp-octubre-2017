CREATE DATABASE blog_cake;
USE blog_cake;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(191) NOT NULL,
    body TEXT,
    published BOOLEAN DEFAULT FALSE,
    created DATETIME,
    modified DATETIME,
    UNIQUE KEY (slug),
    FOREIGN KEY user_key (user_id) REFERENCES users(id)
) CHARSET=utf8mb4;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(191),
    created DATETIME,
    modified DATETIME,
    UNIQUE KEY (title)
) CHARSET=utf8mb4;

CREATE TABLE categories_posts (
    post_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (post_id, category_id),
    FOREIGN KEY category_key(category_id) REFERENCES categories(id),
    FOREIGN KEY post_key(post_id) REFERENCES posts(id)
);

INSERT INTO users (email, password, created, modified)
VALUES ('esmeralda@webtraining.zone', 'esmeralda', NOW(), NOW());

INSERT INTO posts (user_id, title, slug, body, published, created, modified)
VALUES (1, 'Hola Mundo!', 'hola-mundo-post', 'My primer post', 1, now(), now());