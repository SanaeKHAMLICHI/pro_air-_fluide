USE `projet_stage_SKH`;

INSERT INTO role(id, code, label) VALUES
     (1, 'GEST', 'Gestionnaire')
    ,(2, 'MEMB', 'Membre')
;
INSERT INTO user(id,username, email, password, idRole) VALUES
      (1, 'akram','akram@gmail.com', '123', 1)
     ,(2, 'sanae','sanae@gmail.com', '123', 2)
;
INSERT INTO `produit` (`id`, `label`, `ref`, `description`, `prix`, `picture`) VALUES
(1, 'Climatiseur réversible Monosplit - Pompe à chaleur Air Air (PAC)', 123, 'Climatiseur fixe puissant et discret avec fonction chauffage et climatisation. Température réglable entre 16°C et 31°C.  Efficacité énergétique A++ et A+. Unité intérieure + unité extérieure. Système de climatisation programmable, doté de 5 modes de fonctionnement. Appareil compatible avec la solution ReadyClim prêt-à-poser et Module Wifi SmartLife.', 499.00, '/asset/image/Clim.png'),
(2, 'Pompe à chaleur HILLVERT GROUPE HYDROPHORE - 3 100 L/H - 1 000 W - ACIER INOXYDABLE', 123, 'Groupe hydrophore - 3 100 l/h - 1 000 W - Acier inoxydable\r\n\r\n_x000D_\r\nÀ l’aide de ce groupe hydrophore hillvert, vous pouvez alimenter la maison, la cour et le potager de façon efficace en eaux pluviales ou souterraines. Son puissant moteur électrique de 1 000 W lui permet de puiser l’eau des puits et des citernes, ou d’augmenter la pression dans votre réseau privé. Grâce à son débit allant jusqu’à 3 100 l/h, cette pompe approvisionne rapidement les étangs, les piscines et les platebandes en eau. Elle peut aspirer l’eau à une profondeur de jusqu\'à 9 m et la distribuer sur une distance de 44 m. Un manomètre et un pressostat l’activent automatiquement dès qu’une baisse de pression en deçà du seuil défini est enregistrée dans son réservoir de 19 l en acier inoxydable. Commandez un groupe hydrophore dès aujourd\'hui et bénéficiez d\'une irrigation efficace !', 379.00, '/asset/image/pompe.png'),
(3, 'Pompe à chaleur de piscine MADE FOR POOL POMPE À CHALEUR PISCINE ECOPAC - 4 KW - JUSQU’À 30M³', 123, 'Pompe à chaleur pour Piscine de 4kW, 6kW, 9kW ou 11kW (Température Air/Eau de 27°C)\r\n\r\n\r\nFaible niveau sonore : seulement 33 dB(A)\r\n\r\nGarantie 2 ans\r\n\r\nCompatible bassin sel et chlore\r\n\r\nAccessoires fournis :\r\n\r\n\r\n4 plots anti-vibratils adaptés\r\n\r\nPipette pour évacuation des condensats\r\n\r\nRaccords hydrauliques', 429.00, '/asset/image/pompe2.png'),
(4, 'Pompe à chaleur de piscine EXIT POMPE À CHALEUR POUR PISCINE 15M3 - NOIR', 123, 'La pompe à chaleur pour piscine EXIT est un moyen pour chauffer l\'eau de piscine. La pompe à chaleur transforme l\'air extérieur en chaleur et fonctionne dès une température extérieure de 10 degrés. La chaleur générée est ensuite utilisée pour chauffer l\'eau de piscine jusqu\'à pas moins de 40 degrés. La pompe à chaleur EXIT est facile à connecter à la pompe de filtration, parce qu\'il n\'y a que deux tuyaux à monter. Un tuyau est connecté à la pompe de filtration et l\'autre à la piscine. La pompe à chaleur EXIT pour piscine est facile à utiliser avec son écran numérique sur lequel tu peux ajuster la température. La pompe s\'éteint dès que la température demandée est atteinte, et s\'enclenche  de nouveau automatiquement dès que la température de l\'eau passe en-dessous de la température demandée. Ainsi, la pompe n\'utilise de l\'énergie que lorsque c\'est nécessaire.', 738.00, '/asset/image/pompe3.png'),
(5, 'Pompe à chaleur GENERIQUE GROUPE DE TRANSFERT AMA GASOIL 56 L PISTOLET AUTOMATIQUE', 123, 'Groupe de transfert gasoil 56 L pistolet automatique\r\n\r\n\r\nLes unités de transfert «Easy Pump Counter» conviennent au transfert de tous les carburants à faible point d\'inflammabilité (diesel), ils ne peuvent pas être utilisés pour transférer de l\'essence. Ces groupes de transfert ne peuvent être utilisés qu\'à des fins privées, il est donc interdit de l\'utiliser pour la mesure et la vente de carburant au public. \r\n\r\n\r\nPompe rotative à ailettes auto-amorçante avec vanne by-pass et filtre intégré. Moteur à haut degré de protection (IP55) et à protection thermique. \r\n\r\n\r\nCompteur de litres à disque oscillant. \r\n\r\nRemise à zero du compteur partiel à 3 chiffres. Le compteur cumulatif à 6 chiffres ne peut pas être remis à zéro. \r\n\r\nPrécision +/1%. \r\n\r\nPistolet automatique complet avec raccord pivotant  (fourni)', 856.00, '/asset/image/pompe4.png'),
(6, 'Pompes et filtres AQUA SPHERE POMPE À CHALEUR 11 KW FSP-11 - AQUASPHERE', 123, 'Pompe à chaleur 11 kW FSP-11 - AquasphereLa pompe à chaleur FSP (Fix Speed Positive) est d\'une conception simple et a pour mission le chauffage du bassin en saison. Carrosserie en métal galvanisée et capot ABS, compatible avec le traitement au sel grâce à son échangeur en titane. Câble d\'alimentation 3.5m sans prise inclus. • Compresseur ON/OFF• Dégivrage par ventilation forcée• Gaz réfrigérant R32• Priorité chauffage• Echangeur en titaneCaractérstiques techniques :• Alimentation : 220~240V / 50Hz / 1PH• Coefficient de performances (Température air 15 °C / eau 26 °C) : 4.3• Coefficient de performances (Température air 26 °C / eau 26 °C) : 5.0• Débit d\'eau recommandé : 3.5-7.1 m³/h• Dimensions (L x l x H) : 1000 x 360 x 620 mm• Garantie : 2 ans• Niveau sonore (à 10 m) : 37 dB(A)• Puissance : 11 kW• Alarme niveau de sel : Oui• Contrôle de production volet : Oui• Détecteur de débit (gaz) : OuiAccessoires inclus :• Kit condensat• Housse d\'hivernage• Supports anti-vibration• Afficheur dépor', 1141.00, '/asset/image/pompe5.png');

INSERT INTO transporteur(id,name,description, prix) VALUES
      (1, 'Chrono Express','Livraison en 48h Chrono',15.99 )
     ,(2, 'Colissimo','Livraison en 2 à 4 jours ouvrés',4.95)
     


;INSERT INTO adresse(id,fullname,rue, complement, code_postale,ville, pays,telephone,idUser) VALUES
      (1, 'Akram khamlichi','AdresseAkram','', 78955,'IDF','FR',0600000000,1)
     ,(2, 'Sanae khamlichi','AdreseSanae','',13012,'Marseille','FR',0607000000,2)
     


;INSERT INTO image(id, url, alt) VALUES
     (1, '/asset/image/vitrine/carousel/img1.jpg', 'image 1')
    ,(2, '/asset/image/vitrine/carousel/img2.PNG', 'image 2'),
       (3, '/asset/image/vitrine/carousel/img3.jpg', 'image 3')
    ,(4, '/asset/image/vitrine/carousel/img4.jpg', 'image 4'),
    (5, '/asset/image/vitrine/carousel/img5.PNG', 'image 5'),
(6, '/asset/image/vitrine/carousel/img6.PNG', 'image 6')
;