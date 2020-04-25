/**
 * File   : schema.sql
 * Author : Levin Weinstein
 * Purpose: One time setup for the schema of the postgresql database.
 */

-- this is made specifically for postgresql.

-- DROP TABLE IF EXISTS embarrasing_posts;
-- DROP TABLE IF EXISTS users;


CREATE TABLE users (
    id       SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    pwd_hash VARCHAR(255) NOT NULL,
    salt     VARCHAR(255)
);

-- Since we always look up by username, create hash index on username

-- Since we always look up by username, and always for one exact name,
-- we don't need a btree, a hash will be much better than the default btree
CREATE INDEX username_index ON users USING hash (username);

CREATE TABLE embarrasing_posts (
    id       SERIAL PRIMARY KEY,
    title    VARCHAR(255) NOT NULL,
    body     TEXT NOT NULL,
    user_id  INTEGER NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Same thing, looking by hash of user id through the embarrasing posts table.
CREATE INDEX user_id_index ON embarrasing_posts USING hash (user_id);