start TRANSACTION;

USE `tennis`;

INSERT INTO `terrain` (`id`, `libelle_t`, `code_t`) VALUES 
('1', 'TERRAIN A', '001'),
('2', 'TERRAIN B', '002'),
('3', 'TERRAIN C', '003'),
('4', 'TERRAIN D', '004');

COMMIT;


