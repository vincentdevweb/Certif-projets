
USE `burger-quizz-vb`;

INSERT INTO `question` (`id`, `libelle_q`, `code_q`) VALUES 
('1', 'Qui a dit que 1+1 pouvait faire "même peut-être 11" ?', 'Q1'),
('2', 'En combien d\'heures les protagonistes du \'Tour de monde\' en 80 jours de Jules Verne font-ils le tour du monde ?', 'Q2'),
('3', 'Dans "les Simpson", le gérant du bar s\'appelle :', 'Q3'),
('4', 'Qui n\'a jamais combattu Dracula au cinéma ?', 'Q4'),
('5', 'Laquelle de ces peintures n\'existe pas ?', 'Q5'),
('6', 'Que veulent dire les chiffres au fond des verres de cantine ?', 'Q6'),
('7', 'Qu\'est-ce qui est surpenant quand David Banner se transforme en Hulk ?', 'Q7'),
('8', 'Jean-Claude Vandamme a déclaré dans Première : "Je suis fasciné par l\'air. Si vous enlever l\'air du ciel..."', 'Q8'),
('9', 'En plongée, qui signifie le geste pouce et index joints faisant un cercle ?', 'Q9'),
('10', 'Qu\'est-ce que la kénophobie ?', 'Q10'),
('11', 'Quel gang n\'a jamais existé au cinéma ?', 'Q11'),
('12', 'Un anglais a reçu un avertissement de la SPA anglaise parce qu\'il :', 'Q12'),
('13', 'Quel est le point commun ente Janis Joplin, Jimi Hendrix et Jim Morisson ? ', 'Q13'),
('14', 'Quelle est la durée de vie d\'un termite ?', 'Q14'),
('15', 'Une seule de ces chansons de Fancky Vincent n\'est pas dans l\'album Franky Vincent ?', 'Q15'),
('16', 'A quoi s\'intéresse-t-on quand on fait de la potamologie ?', 'Q16'),
('17', 'Que signifie le nom du groupe corse \'I Muvrini\' ?', 'Q17'),
('18', 'Laquelle de ces montagnes existe ?', 'Q18'),
('19', 'Qu\'est-ce qu\'une ploutocratie ?', 'Q19'),
('20', 'En l\'an 2000, combien de personnes ont été tuées par des requins ?', 'Q20'),
('21', 'Comment est mort l\'inventeur du parachute ?', 'Q21'),
('22', 'Yamakasi veut dire :', 'Q22'),
('23', 'Quel est le nom de la petite Sirène de Disney ?', 'Q23'),
('24', 'Pourquoi les autruches enfouissent-elles leut tête dans le sol ?', 'Q24');

INSERT INTO `reponse` (`id`, `libelle_rep`, `id_question`, `bonne_rep`, `code_r`) VALUES 
('', 'Jean-Claude Vandamme ?', '1', '1', 'R1'),
('', 'Javascript ? (c\'est aussi une bonne réponse, mais c\'est pas gentil)', '1', '', 'R2'),
('', 'Obi-Wan Kenobi', '1', '', 'R3'),

('', '1500 heures', '2', '', 'R4'),
('', '1800 heures', '2', '1', 'R5'),
('', '2437 heures', '2', '', 'R6'),
('', '1 million d\'heures', '2', '', 'R7'),
 
('', 'Moe', '3', '1', 'R8'),
('', 'Joe', '3', '', 'R9'),
('', 'Gourio', '3', '', 'R10'),
('', 'Sue Ellen', '3', '', 'R11'),

('', 'Les Charlots contre Dracula', '4', '', 'R12'),
('', 'Dracula conte Frankenstein', '4','', 'R13'),
('', 'Billy le Kid conte Dracula', '4','', 'R14'),
('', 'Dracula conte Godzilla', '4', '1', 'R15'),

('', 'La peinture à l\'oeuf', '5', '', 'R16'),
('', 'La peinture à la cire', '5', '', 'R17'),
('', 'La peinture à la harissa', '5', '1', 'R18'),
('', 'La peinture au couteau', '5', '', 'R19'),

('', 'C\'est l\'âge que vous avez et le plus jeune va chercher l\'eau', '6', '', 'R20'),
('', 'C\'est la note que vous aurez à l\'interro de cet après-midi', '6', '', 'R21'),
('', 'C\'est le nombre de filles avec qui vous sortirez dans la vie', '6', '', 'R22'),
('', 'On sait pas, ça reste un mystère mais on est tous sur le coup…', '6', '1', 'R23'),

('', 'Il ressemble au géant vert', '7', '', 'R24'),
('', 'Il ne pense pas à faire du yoga', '7', '', 'R25'),
('', 'Il déchire tous ses vêtements, sauf son short et son caleçon. C\'est fou, il a une toute petite bite finalement ! ', '7', '1', 'R26'),
('', 'Il \change de nom alors qu\'il ne sait pas parler', '7', '', 'R27'),

('', 'Il n\'y aura plus d\'air', '8', '0', 'R28'), 
('', 'On sera dead et plus alive', '8', '0', 'R29'), 
('', 'Tous les oiseaux tomberaient par terre', '8', '1', 'R30'), 
('', 'Il faudrait aller vivre sous l\'eau', '8', '0', 'R31'),

('', 'Je lui ai mis la rondelle comme ça', '9', '0', 'R32'), 
('', 'Ta blague, elle vaut zéro', '9', '0', 'R33'), 
('', 'Je vais bien, tout va bien', '9', '1', 'R34'), 
('', 'Vas-y, vise là dedans avec ton harpon', '9', '0', 'R35'),

('', 'La peut de jouer au Kéno', '10', '0', 'R36'), 
('', 'La peur des fromages', '10', '0', 'R37'), 
('', 'La peur de Ken le survivant', '10', '0', 'R38'), 
('', 'La peur de la nuit ?', '10', '1', 'R39'),

('', 'Le gang des chaussons aux pommes', '11', '0', 'R40'), 
('', 'La gang des chanteurs à moustache', '11', '1', 'R41'), 
('', 'Le gang des pianos à bretelle', '11', '0', 'R42'), 
('', 'Le gang du dimanche', '11', '0', 'R43'),

('', 'Appelait toutes ses vaches avec des noms de la famille royale', '12', '0', 'R44'), 
('', 'Lançait des vaches mortes avec une catapulte', '12', '1', 'R45'), 
('', 'Tuait des vaches à main nues', '12', '0', 'R46'), 
('', 'Avait offert un piercing à sa vache', '12', '0', 'R47'),

('', 'La drogue', '13', '0', 'R48'), 
('', 'Le J de leur prénom', '13', '0', 'R49'), 
('', 'Ils sont tous morts au même âge, 27 ans', '13', '0', 'R50'), 
('', 'a,b, c et donc d', '13', '1', 'R'),

('', '13 jours', '14', '0', 'R51'), 
('', 'deux siècles', '14', '0', 'R52'), 
('', '60 ans', '14', '1', 'R53'), 
('', 'Comme Christophe Lambert, le termite est immortel', '14', '0', 'R54'),

('', 'Réchauffe l\'hier', '15', '0', 'R55'), 
('', 'Donne-moi ta friandise', '15', '0', 'R56'), 
('', 'Suce ma banane', '15', '1', 'R57'), 
('', 'T\'es chiant(e)', '15', '0', 'R58'),

('', 'Aux hippopotames', '16', '0', 'R59'), 
('', 'Aux potagers', '16', '0', 'R60'), 
('', 'Aux fleuves', '16', '1', 'R61'), 
('', 'Aux potins', '16', '0', 'R62'),

('', 'Les moutons', '17', '0', 'R63'), 
('', 'Les mouflons', '17', '1', 'R64'), 
('', 'Les chanteurs', '17', '0', 'R65'), 
('', 'Putain moins fort y\'en a marre', '17', '0', 'R66'),

('', 'Le mont Frolic', '18', '0', 'R67'), 
('', 'Le mont Canigou', '18', '1', 'R68'), 
('', 'Le mont Royal Canin', '18', '0', 'R69'), 
('', 'Le mont Pal', '18', '0', 'R70'),

('', 'Un régime politique où le pouvoir appartient aux', '19', '1', 'R71'), 
('', 'Un régime politique merveilleux ou le pouvoir appartient à Pluto et à tous ces amis', '19', '0', 'R72'), 
('', 'Un régime politique où le pouvoir appartient aux plus forts', '19', '0', 'R73'), 
('', 'Un régime amaincissant à base de ploutes', '19', '0', 'R74'),

('', '10 personnes, et c\'est la bonne réponse', '20', '1', 'R75'), 
('', '100 personnes', '20', '0', 'R76'), 
('', '2000 personnes', '20', '0', 'R77'), 
('', 'Ca dépend combien de fois t\'as vu les dents de la mer', '20', '0', 'R78'),

('', 'Dans son lit comme tout le monde', '21', '0', 'R79'), 
('', 'Dans le lit de sa femme, comme tout le monde', '21', '0', 'R80'), 
('', 'Dans un accident d\'avion', '21', '0', 'R81'), 
('', 'En sautant de la Tour Eiffel, le con', '21', '1', 'R82'),

('', '"Homme araignée" en japonais', '22', '0', 'R83'), 
('', '"Homme fort" en zaïrois', '22', '1', 'R84'), 
('', 'Yamakaso, au pluriel', '22', '0', 'R85'), 
('', 'Homme moitié Yamaha, moitié Kawasaki', '22', '0', 'R86'),

('', 'Skip', '23', '0', 'R87'), 
('', 'Ariel', '23', '1', 'R88'), 
('', 'Omo Micro', '23', '0', 'R89'), 
('', 'Dash 3 en 1', '23', '0', 'R90'),

('', 'Pour se cacher', '24', '0', 'R91'), 
('', 'Pour protéger leurs oeufs', '24', '1', 'R92'), 
('', 'Pour avoir moins chaud', '24', '0', 'R93'), 
('', 'Pour déconner', '24', '0', 'R94');

