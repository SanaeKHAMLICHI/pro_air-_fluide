DROP DATABASE IF EXISTS `projet_stage_SKH`;

CREATE DATABASE IF NOT EXISTS `projet_stage_SKH` 
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `projet_stage_SKH`;

CREATE TABLE role (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   code varchar(10),
   label varchar(50)
);

CREATE TABLE user (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   idRole bigint(20) NOT NULL,
   username varchar(50),
   email varchar(50),
   password varchar(50)
);

ALTER TABLE user
   ADD CONSTRAINT u_user_email UNIQUE(email),
   ADD CONSTRAINT fk_user_role FOREIGN KEY(idRole) REFERENCES role(id);

CREATE TABLE produit (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  label varchar(50),
  ref bigint(20) NOT NULL,
  description varchar(100),
  prix INT NOT NULL,
  picture varchar(1000) NOT NULL
);

CREATE TABLE adresse (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fullname varchar(50) NOT NULL,
  rue varchar(50) NOT NULL,
  complement varchar(100),
  code_postale bigint(20) NOT NULL,
  ville varchar(50) NOT NULL,
  pays varchar(50) NOT NULL,
  telephone bigint(20) NOT NULL,
  idUser bigint(20) NOT NULL
);

ALTER TABLE adresse
ADD CONSTRAINT fk_adresse_user FOREIGN KEY(idUser) REFERENCES user(id);

CREATE TABLE transporteur (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(50) NOT NULL,
  description varchar(250) NOT NULL,
  prix decimal(6,2) NOT NULL
);

CREATE TABLE panier (
    id BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idTransporteur  bigint(20) NOT NULL,
    idAdresse  bigint(20) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    quantity BIGINT(20) NOT NULL,
    total INT NOT NULL,
    is_payed TINYINT(1) DEFAULT 0,
    stripe_id VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE panier
ADD CONSTRAINT fk_panier_transporteur FOREIGN KEY(idTransporteur) REFERENCES transporteur(id); 
ALTER TABLE panier
ADD CONSTRAINT fk_panier_adresse FOREIGN KEY(idAdresse) REFERENCES adresse(id);

CREATE TABLE panierdetails (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name varchar(50) NOT NULL,
  product_price varchar(50) NOT NULL,
  product_quantity varchar(100),
  idPanier bigint(20) NOT NULL,
  idUser bigint(20) NOT NULL
);

ALTER TABLE panierdetails
ADD CONSTRAINT fk_panierdetails_panier FOREIGN KEY(idPanier) REFERENCES panier(id);

ALTER TABLE panierdetails
ADD CONSTRAINT fk_panierdetails_user FOREIGN KEY(idUser) REFERENCES user(id);

CREATE TABLE orders (
    id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    idTransporteur  bigint(20) NOT NULL,
    idAdresse  bigint(20) NOT NULL,
    reference VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    quantity bigint (20) NOT NULL,
    total bigint (20) NOT NULL,
    stripe_id VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE orders
ADD CONSTRAINT fk_orders_transporteur FOREIGN KEY(idTransporteur) REFERENCES transporteur(id); 
ALTER TABLE orders
ADD CONSTRAINT fk_orders_adresse FOREIGN KEY(idAdresse) REFERENCES adresse(id);

CREATE TABLE orderdetails (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name varchar(50) NOT NULL,
  product_price varchar(50) NOT NULL,
  product_quantity varchar(100),
  idOrder bigint(20) NOT NULL,
  idUser bigint(20) NOT NULL
);

ALTER TABLE orderdetails
ADD CONSTRAINT fk_orderdetails_orders FOREIGN KEY(idOrder) REFERENCES orders(id);

ALTER TABLE orderdetails
ADD CONSTRAINT fk_orderdetails_user FOREIGN KEY(idUser) REFERENCES user(id);
CREATE TABLE image (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  url varchar(50) NOT NULL,
  alt varchar(50) NOT NULL
);