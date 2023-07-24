DROP DATABASE IF EXISTS `projet_stage_SKH`;

CREATE DATABASE IF NOT EXISTS `projet_stage_SKH` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `projet_stage_SKH`;

CREATE TABLE role (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,code varchar(10)
  ,label varchar(50)
);

CREATE TABLE user (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,idRole bigint(20) NOT NULL
  ,username varchar(50)
  ,email varchar(50)
  ,password varchar(50)
);

ALTER TABLE user
   ADD CONSTRAINT u_user_email UNIQUE(email)
  ,ADD CONSTRAINT fk_user_role FOREIGN KEY(idRole) REFERENCES role(id);  

CREATE TABLE produit (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,label varchar(50)
  ,ref bigint(20) NOT NULL
  ,description varchar(100)
  ,prix decimal(6,2) NOT NULL
  ,picture varchar(50)
  ,idUser bigint(20) NOT NULL
);  

ALTER TABLE produit
ADD CONSTRAINT fk_produit_user FOREIGN KEY(idUser) REFERENCES user(id);  

CREATE TABLE adresse (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,fullname varchar(50) NOT NULL
  ,adresse varchar(50) NOT NULL
  ,complement varchar(100)
  ,code_postale bigint(20) NOT NULL
  ,ville varchar(50) NOT NULL
  ,pays varchar(50)NOT NULL
  ,telephone bigint(20) NOT NULL
  ,idUser bigint(20) NOT NULL
);  

ALTER TABLE adresse
ADD CONSTRAINT fk_adresse_user FOREIGN KEY(idUser) REFERENCES user(id);  

CREATE TABLE transporteur (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,name varchar(50) NOT NULL
  ,description varchar(250) NOT NULL
  ,prix decimal(6,2) NOT NULL
);

CREATE TABLE panier (
    id BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    transportername VARCHAR(100),
    transporterprice VARCHAR(20) NOT NULL,
    adresse_livraison VARCHAR(50) NOT NULL,
    quantity BIGINT(20) NOT NULL,
    total DECIMAL(6, 2) NOT NULL,
    is_payed TINYINT(1) DEFAULT 0, -- Attribut pour suivre l'état du paiement (0: non payé, 1: payé)    
    stripe_id VARCHAR(255), -- Attribut pour stocker l'ID de la session de paiement Stripe
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE panierdetails (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,product_name varchar(50) NOT NULL
  ,product_price varchar(50) NOT NULL
  ,product_quantity varchar(100)
  ,idPanier bigint(20) NOT NULL
  ,idUser bigint(20) NOT NULL
);

ALTER TABLE panierdetails
ADD CONSTRAINT fk_panierdetails_panier FOREIGN KEY(idPanier) REFERENCES panier(id);  

ALTER TABLE panierdetails
ADD CONSTRAINT fk_panierdetails_user FOREIGN KEY(idUser) REFERENCES user(id);  

CREATE TABLE orders (
    id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    reference VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    transportername VARCHAR(100),
    transporterprice DECIMAL(6, 2) NOT NULL,
    adresse_livraison VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    total DECIMAL(6, 2) NOT NULL,
    stripe_id VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orderdetails (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY   
  ,product_name varchar(50) NOT NULL
  ,product_price varchar(50) NOT NULL
  ,product_quantity varchar(100)
  ,idOrder bigint(20) NOT NULL
  ,idUser bigint(20) NOT NULL
);

ALTER TABLE orderdetails
ADD CONSTRAINT fk_orderdetails_orders FOREIGN KEY(idOrder) REFERENCES orders(id);  

ALTER TABLE orderdetails
ADD CONSTRAINT fk_orderdetails_user FOREIGN KEY(idUser) REFERENCES user(id);
