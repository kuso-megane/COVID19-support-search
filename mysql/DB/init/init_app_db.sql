drop database if exists app;
create database app;
use app;

drop TABLE if exists AdminLoginInfo;
create table AdminLoginInfo(
    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    adminID varchar(20) NOT NULL UNIQUE,
    pass varchar(255) NOT NULL,
    failCount TINYINT UNSIGNED DEFAULT 0,
    lockedTime varchar(20) default '00:00:00'
);


drop TABLE if exists ArticleCategory;
create table ArticleCategory(
    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name varchar(20) NOT NULL unique
);

DROP TABLE IF exists Article;
create TABLE Article(
    id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title varchar(50) NOT NULL unique,
    thumbnailName varchar(30) default "no_image.jpg",
    content TEXT,
    c_id TINYINT UNSIGNED,
    ogp_description varchar(200),

    CONSTRAINT fk_c_id_on_Article
        FOREIGN KEY (c_id)
        REFERENCES ArticleCategory(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

drop table if exists TroubleList; 
create table TroubleList(
    id TINYINT UNSIGNED primary key auto_increment,
    name varchar(50) NOT NULL unique,
    meta_word varchar(50) NOT NULL,
    ArticleC_id TINYINT UNSIGNED default NULL,

    CONSTRAINT fk_ArtcileC_id_on_TroubleList
        FOREIGN KEY (ArticleC_id)
        REFERENCES ArticleCategory(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);


drop table if exists AreaList; 
create table AreaList(
    id TINYINT UNSIGNED primary key auto_increment,
    name varchar(5) NOT NULL unique
);

drop table if exists SupportOrgs;
create table SupportOrgs(
    id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    area_id TINYINT UNSIGNED,
    support_content varchar(500) NOT NULL,
    owner varchar(100) NOT NULL,
    access varchar(1000) NOT NULL,
    is_foreign_ok BOOLEAN NOT NULL,
    is_public BOOLEAN NOT NULL,
    meta_words VARCHAR(100) NOT NULL,
    appendix VARCHAR(1000) default NULL,

    CONSTRAINT fk_area_id_on_SupportOrgs
        FOREIGN KEY (area_id)
        REFERENCES AreaList(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

drop TABLE if EXISTS SearchLog;
CREATE TABLE SearchLog(
    id SMALLINT UNSIGNED primary KEY AUTO_INCREMENT,
    area_id TINYINT UNSIGNED NOT NULL,
    trouble_id TINYINT UNSIGNED NOT NULL,
    is_only_foreign_ok BOOLEAN NOT NULL,
    searched_time DATETIME DEFAULT now(),

    CONSTRAINT fk_area_id_on_SearchLog
        FOREIGN KEY (area_id)
        REFERENCES AreaList(id)
        ON DELETE RESTRICT ON UPDATE CASCADE,

    CONSTRAINT fk_trouble_id_on_SearchLog
        FOREIGN KEY (trouble_id)
        REFERENCES TroubleList(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);
