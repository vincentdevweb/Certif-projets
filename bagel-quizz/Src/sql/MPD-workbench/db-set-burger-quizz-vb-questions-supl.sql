
USE `burger-quizz-vb`;

INSERT INTO `question` (`id`, `libelle_q`, `code_q`) VALUES 
('25', 'Que font parfois les femelles anacondas après l\'accouplement', 'Q25'),
('26', 'Quelle autre carrière aurait dû avoir Julio Iglesias', 'Q26'),
('27', 'A Churchill, petite ville au nord du Canada, les habitants laissent leurs portes de voitures et de maisons ouvertes. Pourquoi ?', 'Q27'),
('28', 'Le tournage de "La Passion du Christ" fut des plus éprouvants pour Jim Caviezel qui y incarne Jésus. Que lui est-il arrivé ?', 'Q28'),
('29', 'Une seule de ces 4 épreuves de jeu TV n\'existe pas', 'Q29'),
('30', 'Dans "Le Seigneur des Anneaux", comment a été réalisé le rugissement du Balrog ?', 'Q30'),
('31', 'Les paroles de l\'hymne de la Ligue des Champions(de football) sont un mix de plusieurs langues. Sont-ce ?', 'Q31'),
('32', 'Quelle est la particularité du stade de foot "Zérao" au Brésil ?', 'Q32'),
('33', 'Parmis ces 4 Ronaldo, lequel a déjà inscrit plus de 100 buts en Champions League ?', 'Q33'),
('34', 'Laquelle de ces anecdotes est vraie ?', 'Q34'),
('35', 'De qui est inspiré le personnage du film d\'animation Shrek ?', 'Q35'),
('36', 'Laquelle de ces infos complètement hallucinantes est vraie ?', 'Q36'),
('37', 'Qui est Gilles de Rais ?', 'Q37'),
('38', 'Dans la liste suivante qu\'est-ce qui n\'était pas autorisé à l\'école en France dans les années 50?', 'Q38'),
('39', 'Laquelle de ces lois est fausse ?', 'Q39'),
('40', 'Une seule de ces journées existe, laquelle ?', 'Q40'),
('41', 'Qui est Christman Genipperteinga ?', 'Q41'),
('42', 'Laquelle de ces affirmations est vraie ?', 'Q42'),
('43', 'Quelle est la franchise médiatique la plus lucrative du monde au 1er janvier 2018 ?', 'Q43'),
('44', 'Laquelle de ces infos top secrètes est vraie ?', 'Q44'),

('45', 'Lequel de ces musées n\'existe pas ?', 'Q45'),
('46', 'Laquelle de ces écoles n\'existe pas ?', 'Q46'),
('47', 'Lesquelles de ces personnalités ont failli être de la même famille ?', 'Q47'),
('48', 'Maurice Garin est célèbre pour avoir...?', 'Q48'),
('49', 'Que font la plupart des Japonais le jour de Noël ?', 'Q49'),
('50', 'Quel acteur incarne le héros du film de Christopher Nolan "Interstellar" ?', 'Q50'),
('51', 'Laquelle de ces communes française existe ?', 'Q51'),
('52', 'Quelle chanson des Beatles avec "Love" dans le titre n\'existe pas ?', 'Q52'),
('53', 'Au lycée, George W. Bush était...', 'Q53'),
('54', 'Quelle information sur Tom Cruise est véridique ? Il a failli...', 'Q54'),

('55', 'En Russie, qu\'utilisent certaines entreprises pour recruter ?', 'Q55'),
('56', 'Quel pays est le plus gros consommateur de vin par habitant?', 'Q56'),
('57', 'Parmi ces 4 interdictions étranges, laquelle n\'existe pas ?', 'Q57'),
('58', 'En Chine, lequel de ces droits au travail est inscrit dans la constitution ?', 'Q58'),
('59', 'Laquelle de ces infos est vraie ?', 'Q59'),
('60', 'Quelle est la particularité de Rafael Nadal ?', 'Q60'),
('61', 'Le Pygargue à tête blanche est l\'emblème des Etats-Unis. Mais Benjamin Franklin aurait préféré...', 'Q61'),
('62', 'En 1899, Félix Faure est décédé d\'une congestion cérébrale suite à une gâterie de sa maîtresse Marguerite Steinheil. Comment cette dernière fut-elle surnommée ?', 'Q62'),
('63', 'Quel truc pas hyper cool Jerry Lee Lewis a-t-il fait ?', 'Q63'),
('64', 'Quel est le point commun entre l\'Homme et l\'aigle royal ?', 'Q64');


INSERT INTO `reponse` (`id`, `libelle_rep`, `id_question`, `bonne_rep`, `code_r`) VALUES 
('', 'Elles mangent une concurrente, les gourmandes', '25', '0', 'R95'),
('', 'Elles mangent leurs partenaires, les gourmandes', '25', '1', 'R96'),
('', 'Elles dorment jusqu\'à l\'accouchement, ça fatigue', '25', '0', 'R97'),
('', 'Elles s\'allument une clope, comme tout le monde', '25', '0', 'R98'),

('', 'Footballeur, il était au centre de formation de "Real Madrid"', '26', '1', 'R99'),
('', 'Plombier, il était titulaire de l\'équivalent d\'un CAP', '26', '0', 'R100'),
('', 'Alpiniste, il était très bon grimpeur paraît-il', '26', '0', 'R101'),
('', 'Archevêque, avec un nom pareil, c\'était presque une évidence', '26', '0', 'R102'),

('', 'Car c\'est le meilleur moyen pour que personne ne vole', '27', '0', 'R103'),
('', 'Au contraire, c\'est pour se faire voler et faire marcher l\'assurance ', '27', '0', 'R104'),
('', 'Pour que n\importe qui pense se planquer en cas de rencontre avec un ours', '27', '1', 'R105'),
('', 'Pour que les ours puissent se planquer s\'ils croisent Garou', '27', '0', 'R106'),

('', 'Il s\'est déboité l\'épaule', '28', '0', 'R107'),
('', 'Il a fait de l\'hypothermie', '28', '0', 'R108'),
('', 'Il a été frappé par la foudre', '28', '0', 'R109'),
('', 'A, B, C et donc D', '28', '1', 'R110'),

('', '"Grosse ou Enceinte ?" : les candidats doivent deviner si une jeune femme attend un enfant ou si elle est en surpoids', '29', '0', 'R111'),
('', '"Hipster ou SDF ?" : Même principe', '29', '1', 'R112'),
('', '"Naturelle ou Retouché ?" : Même principe', '29', '0', 'R113'),
('', '"Chinois ou Japonais ?" : Même principe', '29', '0', 'R114'),

('', 'Ils ont traîné un parpaing sur un plancher en bois', '30', '1', 'R115'),
('', 'ils ont ralenti le son d\'une locomotive à vapeur', '30', '0', 'R116'),
('', 'Ils ont réutilisé le souffle de Dark Vador mais à l\'envers', '30', '0', 'R117'),
('', 'Ils ont enregistré Gérard Darmon au réveil', '30', '0', 'R118'),

('', 'L\'Espagnol, l\'Allemand et l\'Anglais', '31', '0', 'R119'),
('', 'Le Français, l\'Anglais et l\'Allemand', '31', '1', 'R120'),
('', 'L\'Anglais, l\'Italien et l\'Allemand', '31', '0', 'R121'),
('', 'On s\'en fout, nous ce qu\'on veut, c\'est voir le match', '31', '0', 'R122'),

('', 'Il n\'a accueilli aucun match depuis son inauguration en 1986', '32', '0', 'R123'),
('', 'La ligne du milieu de terrain est alignée avec l\'Equateur', '32', '1', 'R124'),
('', 'Son gazon naturel a laissé place à une végétation florissante', '32', '0', 'R125'),
('', 'L\'équipe domiciliée a perdu tous ses matchs "3-Zérao"', '32', '0', 'R126'),

('', 'Ronaldo des Santos Aveiro', '33', '1', 'R127'),
('', 'Ronaldo Luis Nazario de Lima', '33', '0', 'R128'),
('', 'Ronaldo de Assis Moreira', '33', '0', 'R129'),
('', 'Ronaldo McDonaldo', '33', '0', 'R130'),

('', 'Floyd Mayweather a une passion pour les coquillages', '34', '0', 'R131'),
('', 'Mike Tyson est passionné par les pigeons', '34', '1', 'R132'),
('', 'Jérôme Le Banner est un fou de géraniums', '34', '0', 'R133'),
('', 'Louane est passionnée par les low-kicks', '34', '0', 'R134'),

('', 'Dimitrove Alibovitch, un acrobate russe', '35', '0', 'R135'),
('', 'Dany Diggel, un boxeur américain', '35', '0', 'R136'),
('', 'Maurice Tillet, un catcheur français', '35', '1', 'R137'),
('', 'Eva Green', '35', '0', 'R138'),

('', 'Gustave Flaubert s\'est fait renvoyer de 4 lycées différents', '36', '0', 'R139'),
('', 'Guillaume Apollinaire a un bac pro chauffagiste', '36', '0', 'R140'),
('', 'Emile Zola a loupé son bac deux fois et a abandonné', '36', '1', 'R141'),
('', 'Au collège, Mozart était nul à la flûte à bec', '36', '0', 'R142'),

('', 'Un compagnon d\'arme de Jeanne D\'Arc', '37', '1', 'R147'),
('', 'Le pire ennemi de Henri IV', '37', '0', 'R148'),
('', 'Le cousin de Faudel', '37', '0', 'R149'),
('', 'Le frère d\'Odile', '37', '0', 'R150'),

('', 'Ecrire au stylo bille', '38', '1', 'R151'),
('', 'Arrêter les cours à 14 ans', '38', '0', 'R152'),
('', 'Frapper les enfants', '38', '0', 'R153'),
('', 'Boire de l\'alcool', '38', '0', 'R154'),

('', 'En France, il est interdit d\'appeler un cochon Napoléon', '39', '0', 'R155'),
('', 'Dans le Minnesota, il est interdit d\'exciter les putois', '39', '0', 'R156'),
('', 'A Singapour, il est interdit de peindre sa maison en rose', '39', '1', 'R157'),
('', 'Dans le Vermont, il est interdit de siffler sous l\'eau', '39', '0', 'R158'),

('', 'Journée Internationale du Ninja', '40', '1', 'R159'),
('', 'Journée Européenne du Cow-Boy', '40', '0', 'R160'),
('', 'Journée Mondiale du GI-JOE', '40', '0', 'R161'),
('', 'Journée Internationale des journées mondiales', '40', '0', 'R162'),

('', 'Le plus grand tueur en série de l\'Histoire', '41', '1', 'R163'),
('', 'Le plus grand voyageur de l\'Histoire', '41', '0', 'R164'),
('', 'Le plus grand séducteur de l\'Histoire', '41', '0', 'R165'),
('', 'Le plus grand producteur de moules à l\'escabèche de \'Histoire', '41', '0', 'R166'),

('', 'Nadal a un bras plus long que l\'autre', '42', '0', 'R167'),
('', 'Teddy Riner a une main plus grosse que l\'autre', '42', '0', 'R168'),
('', 'Usain Bolt a une jambe plus longue que l\'autre', '42', '1', 'R169'),
('', 'Rocco a une jambe plus longue que les deux autres', '42', '0', 'R170'),

('', 'Pokémon', '43', '1', 'R171'),
('', 'Star Wars', '43', '0', 'R172'),
('', 'Harry Potter', '43', '0', 'R173'),
('', 'Diane, Femme Flic', '43', '0', 'R174'),

('', 'Tom Hardy a collaboré avec la CIA', '44', '0', 'R175'),
('', 'Russell Crowe a été protégé par le FBI', '44', '1', 'R176'),
('', 'Robert De Niro a été surveillé par le KGB', '44', '0', 'R177'),
('', 'Patrick Timsit a été dépanné par l\'EDF', '44', '0', 'R178'),

('', 'Le musée de la Lessive', '45', '0', 'R179'),
('', 'Le musée du Barbecue', '45', '1', 'R180'),
('', 'Le musée du Corbillard', '45', '0', 'R181'),
('', 'Le musée de la Tondeuse à Gazon', '45', '0', 'R182'),

('', 'Une école de Sorcellerie', '46', '0', 'R183'),
('', 'Une école de Ninja', '46', '0', 'R184'),
('', 'Une école de dresseur de Pokémon', '46', '1', 'R185'),
('', 'Une école de Jedi', '46', '0', 'R186'),

('', 'AL Pacino et Salvatore Adamo', '47', '0', 'R187'),
('', 'Steven Spielberg et Frédéric François', '47', '0', 'R188'),
('', 'Clint Eastwood et Frank Michael', '47', '0', 'R189'),
('', 'George Lucas et Dick Rivers', '47', '1', 'R190'),

('', 'Gagné le prix Goncourt sans avoir écrit de bouquin', '48', '0', 'R191'),
('', 'Gagné le Tour de France en prenant le train', '48', '1', 'R192'),
('', 'Gagné Roland Garros alors qu\'il était manchot', '48', '0', 'R193'),
('', 'Gagné un concours de sosie de Maurice Garin', '48', '0', 'R194'),

('', 'Ils vont au centre commercial entre amis', '49', '0', 'R195'),
('', 'Ils vont à l\'église en famille', '49', '0', 'R196'),
('', 'Ils vont chez KFC en amoureux', '49', '1', 'R197'),
('', 'Ils vont au motel entre amants', '49', '0', 'R198'),

('', 'Leonardo DiCaprio', '50', '0', 'R199'),
('', 'Matthew McConaughey', '50', '1', 'R200'),
('', 'Christian Bale', '50', '0', 'R201'),
('', 'Sarah Michelle Stellar', '50', '0', 'R202'),

('', 'Mouais', '51', '1', 'R203'),
('', 'Boff', '51', '0', 'R204'),
('', 'Patope', '51', '0', 'R205'),
('', 'Peutmieuxfaire', '51', '0', 'R206'),

('', 'She Loves You', '52', '0', 'R207'),
('', 'And I Love Her', '52', '0', 'R208'),
('', 'I Love Everybody', '52', '1', 'R209'),
('', 'P.S. I Love You', '52', '0', 'R210'),

('', 'Champion du club d\'échec', '53', '0', 'R211'),
('', 'Soliste à la chorale universitaire', '53', '0', 'R212'),
('', 'Capitaine de l\'équipe de baseball', '53', '0', 'R213'),
('', 'Capitaine des Cheerleaders', '53', '1', 'R214'),

('', 'Se faire immoler sur le tournage de "Mission Impossible"', '54', '0', 'R215'),
('', 'Exploser en vol sur le tournage de "Top Gun"', '54', '0', 'R216'),
('', 'Se faire décapiter sur le tournage du "Dernier Samouraï"', '54', '1', 'R217'),
('', 'Rentrer dans une secte, mais finalement je crois que c\'est bon', '54', '0', 'R218'),

('', 'Des détecteurs de mensonges', '55', '0', 'R219'),
('', 'Des robots, qui appellent les candidats et leur font passer un entretien', '55', '1', 'R220'),
('', 'De la vodka, pour découvrir le vrai visage des candidats', '55', '0', 'R221'),
('', 'Pas A, pas B, pas C, donc D', '55', '0', 'R222'),

('', 'La  France', '56', '0', 'R223'),
('', 'L\'Australie', '56', '0', 'R224'),
('', 'Les Etats-Unis', '56', '0', 'R225'),
('', 'Le Vatican', '56', '1', 'R226'),

('', 'Mâcher des chewing-gums à Singapour', '57', '0', 'R227'),
('', 'Se moucher après 8H du matin en Arabie Saoudite', '57', '1', 'R228'),
('', 'Faire des châteaux de sable sur la plage à Eraclea en Italie', '57', '0', 'R229'),
('', 'Lâcher un pet en public au Malawi', '57', '0', 'R230'),

('', 'Le droit de faire grève', '58', '0', 'R231'),
('', 'Le droit de faire la sieste', '58', '1', 'R232'),
('', 'Le droit de porter des cols Mao', '58', '0', 'R233'),
('', 'Le droit de fermer sa gueule et de fabriquer des tablettes tactiles', '58', '0', 'R234'),

('', 'Brad Pitt s\'est blessé au talon d\'Achille sur le tournage de "Troie"', '59', '1', 'R235'),
('', 'Sigourney Weaver a eu un ver solitaire pendant le tournage d\'"Alien"', '59', '0', 'R236'),
('', 'Tobey Maguire a été mordu par une araignée sur le tournage de "Spider-Man"', '59', '0', 'R237'),
('', 'Meryl Streep a rouillé sur le tournage de "La Dame de Fer"', '59', '0', 'R238'),

('', 'Il joue au tennis de la main gauche alors qu\'il est droitier', '60', '1', 'R239'),
('', 'Il joue au tennis de la main droite alors alors qu\'il est gaucher', '60', '0', 'R240'),
('', 'Il joue aussi bien au tennis de la main droite que de la main gauche', '60', '0', 'R241'),
('', 'Il possède deux mains droites ce qui est pratique parfois mais pas tout le temps', '60', '0', 'R242'),

('', 'Un tigre du Bengale', '61', '0', 'R243'),
('', 'Une panthère noire', '61', '0', 'R244'),
('', 'Un lion d\'Amérique', '61', '0', 'R245'),
('', 'Un dindon sauvage', '61', '1', 'R246'),

('', 'La casseuse de pipe', '62', '0', 'R247'),
('', 'Maggy les bons tuyaux', '62', '0', 'R248'),
('', 'La grande souffleuse', '62', '0', 'R249'),
('', 'La pompe funèbre', '62', '1', 'R250'),

('', 'Il a géré pendant 3 ans un réseau de prostitution', '63', '0', 'R251'),
('', 'Il a rendu ses enfants accros à la drogue', '63', '0', 'R252'),
('', 'Il s\'est marié avec sa cousine qui n\'avait que 13 ans', '63', '1', 'R253'),
('', 'Il a massacré les dauphins du Marineland d\'Antibes au harpon en chantant "Great Balls of Fire"', '63', '0', 'R254'),

('', 'Ils ont tous les deux intégré le concept de la fidélité', '64', '1', 'R255'),
('', 'Ils ont tous les deux intégré le concept du travail', '64', '0', 'R256'),
('', 'Ils ont tous les deux intégré le concept du racisme', '64', '0', 'R257'),
('', 'Ils ont tous les deux intégré la règle du hors-jeu', '64', '0', 'R258');


