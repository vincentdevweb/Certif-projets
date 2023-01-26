
USE `burger-quizz-vb`;

INSERT INTO `question` (`id`, `libelle_q`, `code_q`) VALUES 

('64', 'Quel est le point commun entre l\'Homme et l\'aigle royal ?', 'Q64');


INSERT INTO `reponse` (`id`, `libelle_rep`, `id_question`, `bonne_rep`, `code_r`) VALUES 
('', 'Elles mangent une concurrente, les gourmandes', '25', '0', 'R95'),
('', 'Elles mangent leurs partenaires, les gourmandes', '25', '1', 'R96'),
('', 'Elles dorment jusqu\'à l\'accouchement, ça fatigue', '25', '0', 'R97'),
('', 'Elles s\'allument une clope, comme tout le monde', '25', '0', 'R98'),

