drop database if exists app;
create database app;
use app;

drop table if exists AreaList; 
create table AreaList(
    id TINYINT UNSIGNED primary key auto_increment,
    name varchar(5) NOT NULL unique
);

drop table if exists TroubleList; 
create table TroubleList(
    id TINYINT UNSIGNED primary key auto_increment,
    name varchar(50) NOT NULL unique,
    meta_word varchar(50) NOT NULL
);

drop table if exists SupportOrgs;
create table SupportOrgs(
    id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    area_id TINYINT UNSIGNED,
    support_content varchar(400) NOT NULL,
    owner varchar(100) NOT NULL,
    access varchar(600) NOT NULL,
    is_foreign_ok BOOLEAN NOT NULL,
    is_public BOOLEAN NOT NULL,
    meta_words VARCHAR(100) NOT NULL,
    appendix VARCHAR(200) default NULL,

    CONSTRAINT fk_area_id_on_SupportOrgs
        FOREIGN KEY (area_id)
        REFERENCES AreaList(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);


drop TABLE if exists ArticleCategory;
create table ArticleCategory(
    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name varchar(20) NOT NULL unique,
    meta_words varchar(100) NOT NULL
);


DROP TABLE IF exists Article;
create TABLE Article(
    id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title varchar(50) NOT NULL unique,
    thumbnailName varchar(20) NOT NULL,
    content TEXT,
    category_id TINYINT UNSIGNED,

    CONSTRAINT fk_category_id_on_Article
        FOREIGN KEY (category_id)
        REFERENCES ArticleCategory(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);


