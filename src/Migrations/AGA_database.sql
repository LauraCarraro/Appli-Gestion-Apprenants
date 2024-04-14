CREATE TABLE AGA_promo(
   ID_promo INT AUTO_INCREMENT,
   Nom VARCHAR(50)  NOT NULL,
   Date_debut DATE NOT NULL,
   Date_fin VARCHAR(50)  NOT NULL,
   Nombre_apprenants INT NOT NULL,
   PRIMARY KEY(ID_promo)
);
ALTER TABLE AGA_promo ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE AGA_role(
   ID_role INT AUTO_INCREMENT,
   Nom INT NOT NULL,
   PRIMARY KEY(ID_role)
);
ALTER TABLE AGA_role ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE AGA_utilisateur(
   ID_utilisateur INT AUTO_INCREMENT,
   Nom VARCHAR(50)  NOT NULL,
   Prenom VARCHAR(50)  NOT NULL,
   Email VARCHAR(50)  NOT NULL,
   Motdepasse VARCHAR(255)  NOT NULL,
   Activation_compte BOOLEAN NOT NULL,
   ID_role INT NOT NULL,
   PRIMARY KEY(ID_utilisateur),
   UNIQUE(Email),
   FOREIGN KEY(ID_role) REFERENCES AGA_role(ID_role)
);
ALTER TABLE AGA_utilisateur ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE AGA_cours(
   ID_cours INT AUTO_INCREMENT,
   Nom VARCHAR(50)  NOT NULL,
   Jour DATE NOT NULL,
   Heure_debut TIME NOT NULL,
   Heure_fin TIME NOT NULL,
   Code INT NOT NULL,
   ID_promo INT,
   PRIMARY KEY(ID_cours),
   FOREIGN KEY(ID_promo) REFERENCES AGA_promo(ID_promo)
);
ALTER TABLE AGA_cours ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE AGA_appartient(
   ID_utilisateur INT,
   ID_promo INT,
   PRIMARY KEY(ID_utilisateur, ID_promo),
   FOREIGN KEY(ID_utilisateur) REFERENCES AGA_utilisateur(ID_utilisateur),
   FOREIGN KEY(ID_promo) REFERENCES AGA_promo(ID_promo)
);
ALTER TABLE AGA_appartient ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE AGA_est(
   ID_utilisateur INT,
   ID_cours INT,
   Absent BOOLEAN,
   En_retard BOOLEAN,
   PRIMARY KEY(ID_utilisateur, ID_cours),
   FOREIGN KEY(ID_utilisateur) REFERENCES AGA_utilisateur(ID_utilisateur),
   FOREIGN KEY(ID_cours) REFERENCES AGA_cours(ID_cours)
);
ALTER TABLE AGA_est ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
