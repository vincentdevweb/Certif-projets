start TRANSACTION;

DROP DATABASE if exists `tennis`;
 
CREATE DATABASE `tennis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tennis`;


CREATE TABLE user (
  id INT UNSIGNED NOT NULL auto_increment ,
  nom_u varchar(64) NOT NULL,
  mdp varchar(64) NOT NULL, 
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE terrain (
  id INT UNSIGNED NOT NULL auto_increment ,
  libelle_t varchar(64) NOT NULL,
  code_t INT UNSIGNED NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE planning (
  id INT UNSIGNED NOT NULL auto_increment ,
  date varchar(255) NOT NULL,
  code_date INT UNSIGNED NOT NULL,
  terrain_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE pj_mm (
  id INT UNSIGNED NOT NULL auto_increment ,
  joueur_id INT UNSIGNED NOT NULL,
  planning_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE joueur (
  id INT UNSIGNED NOT NULL auto_increment ,
  nom_j varchar(64) NOT NULL,
  role varchar(64) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE terrain
  ADD UNIQUE KEY terrain_UNIQUE (code_t);

ALTER TABLE user
  ADD UNIQUE KEY user_UNIQUE (nom_u);

ALTER TABLE joueur
  ADD UNIQUE KEY joueur_UNIQUE (nom_j);

ALTER TABLE planning
  ADD UNIQUE KEY code_date_UNIQUE (code_date),
  ADD CONSTRAINT fk_planning_terrain_id FOREIGN KEY (terrain_id) REFERENCES terrain (id) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE pj_mm
  ADD CONSTRAINT fk_pj_mm_joueur_id FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fk_pj_mm_planning_id FOREIGN KEY (planning_id) REFERENCES planning (id) ON DELETE CASCADE ON UPDATE CASCADE;
 
DROP USER if exists 'clubt'@'%';

CREATE USER 'clubt'@'%' IDENTIFIED BY 'tball';

GRANT SELECT, INSERT, UPDATE, DELETE ON `tennis`.* TO 'clubt'@'%'; 

COMMIT;
