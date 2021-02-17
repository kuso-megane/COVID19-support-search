drop database if exists dev;
create database dev;
use dev;

drop table if exists category; 
create table category(
    id TINYINT primary key auto_increment,
    name varchar(20) NOT NULL unique
);

drop table if exists subCategory;
create table subCategory(
    id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    name varchar(20) NOT NULL unique,
    category_id tinyint,

    CONSTRAINT fk_category_id
        FOREIGN KEY (category_id)
        REFERENCES category(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

drop table if exists article;
create table article(
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(30) DEFAULT 'NO TITLE',
    imgFileName varchar(30) DEFAULT 'default.jpg',
    content TEXT,
    update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


insert into article VALUES(0, 'sampleTitle1', default, '<p>sample1-content</p>', default);


