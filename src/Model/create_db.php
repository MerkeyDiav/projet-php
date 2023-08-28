<?php
set_include_path(".;C:\wamp64\www\projetphp");
include_once 'src/CONSTANTS.php';
$username = USER_NAME;
$db_name = DB_NAME;
$password = USER_PASSWORD;

try {
    $bdd = new PDO('mysql:host='. HOST, ROOT, ROOT_PASSWORD);
    $bdd->exec(
        "
        DROP DATABASE IF EXISTS $db_name;
        CREATE DATABASE IF NOT EXISTS $db_name;
        USE $db_name;
        --
        -- Base de données :  `db_php`
        --
        
        -- --------------------------------------------------------
        
        --
        -- Structure de la table `departements`
        --
        
        DROP TABLE IF EXISTS `departements`;
        CREATE TABLE IF NOT EXISTS `departements` (
          `department_name` varchar(50) NOT NULL,
          `description` varchar(300) NOT NULL,
          PRIMARY KEY (`department_name`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='liste tout les departement d''une facultÃƒÂ©';
        
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
          `bulletin` varchar(100) NOT NULL,
          `avatar` varchar(100) NOT NULL,
          `decision` varchar(10) NOT NULL DEFAULT 'attente',
          `date_inscr` datetime DEFAULT CURRENT_TIMESTAMP,
          `sexe` varchar(1) NOT NULL,
          `notifications` tinyint(1) NOT NULL DEFAULT '0',
          `choix` varchar(50) NOT NULL,
          PRIMARY KEY (`id_student`),
          UNIQUE KEY `email_student` (`student_email`),
          KEY `fk_premierchoix_faculte` (`choix`),
          KEY `premier_choix` (`choix`)
        ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
        
        --
        -- Déchargement des données de la table `etudiant`
        --
        
        INSERT INTO `etudiant` (`id_student`, `first_name`, `last_name`, `born_date`, `student_email`, `password`, `bulletin`, `avatar`, `decision`, `date_inscr`, `sexe`, `notifications`, `premier_choix`) VALUES
        (1, 'Kayinda', 'ImmaculÃƒÂ©', '2018-08-08', 'immakaymw@gmail.com', 'password', 0x3339342e343835, '', 'ajournÃƒÂ©', '2023-08-20 20:32:55', '', 0, '0'),
        (2, 'Nzuzi ', 'Nehemie', '2003-03-05', 'nehemiediav@gmail.com', 'password', 0x343030, '', 'admis', '2023-08-20 20:32:55', '', 0, '0');
        
        -- --------------------------------------------------------
        
        --
        -- Structure de la table `faculte`
        --
        
        DROP TABLE IF EXISTS `faculte`;
        CREATE TABLE IF NOT EXISTS `faculte` (
          `nom_faculte` varchar(50) NOT NULL,
          `creation_date` date NOT NULL,
          `departement` varchar(50) NOT NULL,
          PRIMARY KEY (`nom_faculte`),
          UNIQUE KEY `departement` (`departement`),
          KEY `departement_2` (`departement`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        -- --------------------------------------------------------
        
        --
        -- Structure de la table `questions`
        --
        
        DROP TABLE IF EXISTS `questions`;
        CREATE TABLE IF NOT EXISTS `questions` (
          `id_question` int(11) NOT NULL,
          `corps_de_question` varchar(5000) NOT NULL,
          `heure_posé` int(11) NOT NULL,
          `auteur` int(11) NOT NULL,
          `reponses` int(11) NOT NULL,
          KEY `fk_questions_etudiant` (`auteur`),
          KEY `fk_questions_reponse` (`reponses`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        
        -- --------------------------------------------------------
        
        --
        -- Structure de la table `reponse`
        --
        
        DROP TABLE IF EXISTS `reponse`;
        CREATE TABLE IF NOT EXISTS `reponse` (
          `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
          `corps_de_reponse` varchar(5000) NOT NULL,
          `question` int(11) NOT NULL,
          PRIMARY KEY (`id_reponse`),
          KEY `fk_questions_reponse` (`question`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        --
        -- Contraintes pour les tables déchargées
        --
        
        --
        -- Contraintes pour la table `faculte`
        --
        ALTER TABLE `faculte`
          ADD CONSTRAINT `faculte_ibfk_1` FOREIGN KEY (`departement`) REFERENCES `departements` (`department_name`),
          ADD CONSTRAINT `faculte_ibfk_2` FOREIGN KEY (`nom_faculte`) REFERENCES `etudiant` (`premier_choix`);
        
        --
        -- Contraintes pour la table `questions`
        --
        ALTER TABLE `questions`
          ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `etudiant` (`id_student`),
          ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`reponses`) REFERENCES `reponse` (`id_reponse`);
        COMMIT;")
    or die(print_r($bdd->errorInfo(), true));
}
catch (PDOException $e){
    die("DB ERROR: " . $e->getMessage());
}
