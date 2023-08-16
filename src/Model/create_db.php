<?php
try {
    set_include_path(".;C:\wamp64\www\projetphp");
    include_once 'src/CONSTANTS.php';
    $username = USER_NAME;
    $db_name = DB_NAME;
    $conn = new PDO('mysql:host='. HOST, ROOT, ROOT_PASSWORD);
    $conn->exec(
        "
        CREATE DATABASE IF NOT EXISTS $db_name;
        CREATE USER IF NOT EXISTS '$username'@'localhost';
        FLUSH PRIVILEGES;
        DROP TABLE IF EXISTS `departements`;
        CREATE TABLE IF NOT EXISTS `departements` (
          `department_name` varchar(50) NOT NULL,
          `description` varchar(300) NOT NULL,
          PRIMARY KEY (`department_name`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='liste tout les departement d''une faculté';
        
        -- --------------------------------------------------------
        
        --
        -- Structure de la table `etudiant`
        --
        
        DROP TABLE IF EXISTS `etudiant`;
        CREATE TABLE IF NOT EXISTS `etudiant` (
          `id_student` int(11) NOT NULL AUTO_INCREMENT,
          `first_name` varchar(50) NOT NULL,
          `last_name` varchar(50) NOT NULL,
          `born_date` date NOT NULL,
          `student_email` varchar(70) NOT NULL,
          `password` varchar(30) NOT NULL,
          `general_average` double NOT NULL,
          `decision` varchar(10) NOT NULL DEFAULT 'attente',
          PRIMARY KEY (`id_student`),
          UNIQUE KEY `email_student` (`student_email`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        -- --------------------------------------------------------
        
        --
        -- Structure de la table `faculte`
        --
        
        DROP TABLE IF EXISTS `faculte`;
        CREATE TABLE IF NOT EXISTS `faculte` (
          `nom_faculte` varchar(50) NOT NULL,
          `description` varchar(300) NOT NULL,
          `creation_date` date NOT NULL,
          `departement` int(11) NOT NULL,
          PRIMARY KEY (`nom_faculte`),
          UNIQUE KEY `description` (`description`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        COMMIT;

        ")
    or die(print_r($conn->errorInfo(), true));
    echo "connexion reussie";
}
catch (PDOException $e){
    die("DB ERROR: " . $e->getMessage());
}