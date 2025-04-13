-- Drop tables if they exist (to avoid conflicts when re-running the script)
DROP TABLE IF EXISTS presence;
DROP TABLE IF EXISTS exam;
DROP TABLE IF EXISTS etudiant;
DROP TABLE IF EXISTS module;
DROP TABLE IF EXISTS semestre;
DROP TABLE IF EXISTS filiere;

-- Create Filiere Table
CREATE TABLE `filiere` (
  `id_filiere` INT AUTO_INCREMENT PRIMARY KEY,
  `nomF` VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Insert Data into Filiere Table
INSERT INTO `filiere` (`nomF`) VALUES
('Physique'), ('Chimie'), ('Biologie'), ('Geologie'), ('Mathematique'), ('Informatique');

-- Create Semestre Table
CREATE TABLE `semestre` (
  `id_semestre` INT AUTO_INCREMENT PRIMARY KEY,
  `nom` VARCHAR(50) NOT NULL,
  `id_filiere` INT NOT NULL,
  FOREIGN KEY (`id_filiere`) REFERENCES `filiere`(`id_filiere`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insert Data into Semestre Table
INSERT INTO `semestre` (`nom`, `id_filiere`) VALUES
('Semestre 1', 1), ('Semestre 4', 1),
('Semestre 2', 2), ('Semestre 5', 2),
('Semestre 3', 3), ('Semestre 6', 3);

-- Create Module Table
CREATE TABLE `module` (
  `id_module` INT AUTO_INCREMENT PRIMARY KEY,
  `nom` VARCHAR(100) NOT NULL,
  `id_semestre` INT NOT NULL,
  `id_filiere` INT NOT NULL,
  FOREIGN KEY (`id_semestre`) REFERENCES `semestre`(`id_semestre`) ON DELETE CASCADE,
  FOREIGN KEY (`id_filiere`) REFERENCES `filiere`(`id_filiere`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insert Data into Module Table
INSERT INTO `module` (`nom`, `id_semestre`, `id_filiere`) VALUES
('Algorithmique', 1, 1),
('Base de Données', 1, 2),
('Résistance des Matériaux', 3, 1),
('Mécanique des Fluides', 3, 1),
('Électricité Industrielle', 5, 3),
('Automatisme', 5, 5);

-- Create Etudiant Table
CREATE TABLE `etudiant` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nom` VARCHAR(50) NOT NULL,
  `prenom` VARCHAR(50) NOT NULL,
  `apogee` INT UNIQUE NOT NULL,
  `id_filiere` INT NOT NULL,
  `id_semestre` INT NOT NULL,
  FOREIGN KEY (`id_filiere`) REFERENCES `filiere`(`id_filiere`) ON DELETE CASCADE,
  FOREIGN KEY (`id_semestre`) REFERENCES `semestre`(`id_semestre`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insert Data into Etudiant Table
INSERT INTO `etudiant` (`nom`, `prenom`, `apogee`, `id_filiere`, `id_semestre`) VALUES
('El Amrani', 'Mohamed', 111111, 1, 1),
('Ben Salah', 'Youssef', 222222, 1, 1),
('Haddadi', 'Salma', 333333, 2, 3),
('Tazi', 'Omar', 444444, 2, 3),
('Boujamaa', 'Kawtar', 555555, 3, 5),
('El Idrissi', 'Amine', 666666, 3, 5);

-- Create Exam Table
CREATE TABLE `exam` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `id_module` INT NOT NULL,
  `dateD` DATETIME NOT NULL,
  `dateF` DATETIME NOT NULL,
  FOREIGN KEY (`id_module`) REFERENCES `module`(`id_module`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insert Data into Exam Table
INSERT INTO `exam` (`id_module`, `dateD`, `dateF`) VALUES
(1, '2025-06-10 09:00:00', '2025-06-10 11:00:00'),
(2, '2025-06-12 14:00:00', '2025-06-12 16:00:00'),
(3, '2025-06-15 08:00:00', '2025-06-15 10:00:00'),
(4, '2025-06-17 10:00:00', '2025-06-17 12:00:00'),
(5, '2025-06-20 13:00:00', '2025-06-20 15:00:00'),
(6, '2025-06-22 15:00:00', '2025-06-22 17:00:00');

-- Create Presence Table
CREATE TABLE `presence` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `id_etudiant` INT NOT NULL,
  `id_exam` INT NOT NULL,
  `present` ENUM('present', 'absent') DEFAULT 'absent',
  FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`id_exam`) REFERENCES `exam`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insert Data into Presence Table
INSERT INTO `presence` (`id_etudiant`, `id_exam`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);
