USE `projet_stage_SKH`;

INSERT INTO role(id, code, label) VALUES
     (1, 'GEST', 'Gestionnaire')
    ,(2, 'MEMB', 'Membre')
;
INSERT INTO user(id,username, email, password, idRole) VALUES
      (1, 'akram','akram@gmail.com', '123', 1)
     ,(2, 'sanae','sanae@gmail.com', '123', 2)
;