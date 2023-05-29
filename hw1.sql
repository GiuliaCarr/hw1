USE hw1;

CREATE TABLE users (
    id int primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null
);

CREATE TABLE characters (
    name varchar(255) not null,
    user int not null,
    content json
);

CREATE TABLE profile (
user int not null,
propic varchar(255)
);
 
CREATE TABLE streams(
    name varchar(255) not null,
    user int not null,
    content json
    );
    
    
