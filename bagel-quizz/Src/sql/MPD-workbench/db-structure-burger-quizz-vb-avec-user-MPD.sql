start TRANSACTION;

DROP DATABASE if exists `burger-quizz-vb`;
 
CREATE DATABASE `burger-quizz-vb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `burger-quizz-vb`;

CREATE TABLE question (
  id INT UNSIGNED NOT NULL auto_increment ,
  libelle_q varchar(255) NOT NULL,
  code_q varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE reponse (
  id INT UNSIGNED NOT NULL auto_increment ,
  libelle_rep varchar(255) NOT NULL,
  id_question INT UNSIGNED NOT NULL,
  code_r varchar(255) NOT NULL,
  bonne_rep BOOLEAN DEFAULT '0', 
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE users (
  id INT UNSIGNED NOT NULL auto_increment ,
  pseudo varchar(64) NOT NULL,
  mdp varchar(64) NOT NULL, 
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE score (
  id INT UNSIGNED NOT NULL auto_increment ,
  date_session INT UNSIGNED NOT NULL,
  id_user INT UNSIGNED NOT NULL,
  bonne_rep_user INT UNSIGNED NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE question
  ADD UNIQUE KEY question_UNIQUE (code_q);
  
ALTER TABLE reponse
  ADD UNIQUE KEY reponse_UNIQUE (code_r),
  ADD CONSTRAINT fk_list_question_id FOREIGN KEY (id_question) REFERENCES question (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE users
  ADD UNIQUE KEY pseudo_UNIQUE (pseudo);

ALTER TABLE score
  ADD UNIQUE KEY date_session_UNIQUE (date_session),
  ADD CONSTRAINT fk_id_user_users_id FOREIGN KEY (id_user) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE;
 
DROP USER if exists 'Baggel'@'%';

CREATE USER 'Baggel'@'%' IDENTIFIED BY 'Baggel1234@';

GRANT SELECT, INSERT, UPDATE, DELETE ON `burger-quizz-vb`.* TO 'Baggel'@'%'; 

COMMIT;
