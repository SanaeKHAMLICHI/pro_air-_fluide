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
      (1, 'Climatiseur réversible Monosplit - Pompe à chaleur Air Air (PAC)',123, 'Climatiseur fixe puissant et discret avec fonction chauffage et climatisation. Température réglable entre 16°C et 31°C.  Efficacité énergétique A++ et A+. Unité intérieure + unité extérieure. Système de climatisation programmable, doté de 5 modes de fonctionnement. Appareil compatible avec la solution ReadyClim prêt-à-poser et Module Wifi SmartLife.', 499.00,'/asset/image/Clim.png', 1)
     ,(2, 'produit2',456, 'description1', 1469.33,'',1)
;
INSERT INTO transporteur(id,name,description, prix) VALUES
      (1, 'Chrono Express','Livraison en 48h Chrono',15.99 )
     ,(2, 'Colissimo','Livraison en 2 à 4 jours ouvrés',4.95)
     


;INSERT INTO adresse(id,fullname,adresse, complement, code_postale,ville, pays,telephone,idUser) VALUES
      (1, 'Akram khamlichi','AdresseAkram','', 78955,'IDF','FR',0600000000,1)
     ,(2, 'Sanae khamlichi','AdreseSanae','',13012,'Marseille','FR',0607000000,2)
     


;