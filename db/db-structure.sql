DROP DATABASE IF EXISTS `projet_stage_SKH`;

CREATE DATABASE IF NOT EXISTS `projet_stage_SKH` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `projet_stage_SKH`;

CREATE TABLE role (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,code varchar(10)
  ,label varchar(50)
)
;
CREATE TABLE user (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,idRole bigint(20) NOT NULL
  ,username varchar(50)
  ,email varchar(50)
  ,password varchar(50)
)
;

ALTER TABLE user
   ADD CONSTRAINT u_user_email UNIQUE(email)
  ,ADD CONSTRAINT fk_user_role FOREIGN KEY(idRole) REFERENCES role(id)  
;
CREATE TABLE produit (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,label varchar(50)
  ,ref bigint(20) NOT NULL
  ,description varchar(100)
  ,prix decimal(6,2) NOT NULL
) 

  