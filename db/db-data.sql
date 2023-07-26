USE `projet_stage_SKH`;

INSERT INTO role(id, code, label) VALUES
     (1, 'GEST', 'Gestionnaire')
    ,(2, 'MEMB', 'Membre')
;
INSERT INTO user(id,username, email, password, idRole) VALUES
      (1, 'akram','akram@gmail.com', '123', 1)
     ,(2, 'sanae','sanae@gmail.com', '123', 2)
;
INSERT INTO produit(id,label, ref, description, prix, picture ,idUser) VALUES
      (1, 'produit1',123, 'description1', 23.89,'', 1)
     ,(2, 'produit2',456, 'description1', 1469.33,'',1)
;
INSERT INTO transporteur(id,name,description, prix) VALUES
      (1, 'Chrono Express','Livraison en 48h Chrono',15.99 )
     ,(2, 'Colissimo','Livraison en 2 à 4 jours ouvrés',4.95)
     


;INSERT INTO adresse(id,fullname,adresse, complement, code_postale,ville, pays,telephone,idUser) VALUES
      (1, 'Akram khamlichi','AdresseAkram','', 78955,'IDF','FR',0600000000,1)
     ,(2, 'Sanae khamlichi','AdreseSanae','',13012,'Marseille','FR',0607000000,2)
     


;