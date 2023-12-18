##YouCode
##Code AI
####-- Table des utilisateurs
CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    mot_de_passe VARCHAR(100),
    role VARCHAR(20) DEFAULT 'apprenant' -- 'formateur', 'administrateur', etc.
);

-- Table des classes
CREATE TABLE classes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_classe VARCHAR(50),
    id_formateur INT,
    FOREIGN KEY (id_formateur) REFERENCES utilisateurs(id)
);

-- Table des apprenants dans une classe
CREATE TABLE apprenants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT,
    id_classe INT,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id),
    FOREIGN KEY (id_classe) REFERENCES classes(id)
);

-- Table des statistiques (à adapter en fonction des besoins)
CREATE TABLE statistiques (
    id INT PRIMARY KEY AUTO_INCREMENT,
    total_utilisateurs INT,
    total_classes INT,
    total_apprenants INT,
    -- Ajoutez d'autres champs de statistiques selon vos besoins
);

-- Exemple de données pour le rôle administrateur
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role)
VALUES ('NomAdmin', 'PrenomAdmin', 'admin@example.com', 'motdepasseadmin', 'administrateur');
