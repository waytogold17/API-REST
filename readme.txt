CREATE TABLE IF NOT EXISTS `Etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(50),
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
   `adresse` varchar(255) NOT NULL,
    `niveau` varchar(255) NOT NULL,
    `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;

INSERT INTO `Etudiant` (`id`, `nom`, `prenom`, `age`, `email`,'adresse','niveau', `created`) VALUES 
(1, 'John', 'Doe',32,'johndoe@gmail.com', 'Data Scientist road ','BAC +5', '2012-06-01 02:12:30'),
(2, 'David','Costa',29, 'sam.mraz1996@yahoo.com',  'Apparel Patternmaker road ','BAC +4', '2013-03-03 01:20:10'),
(3, 'Todd','Martell',36, 'liliane_hirt@gmail.com',  'Accountantroad ','BAC +8', '2014-09-20 03:10:25'),
(4, 'Adela','Marion', 42, 'michael2004@yahoo.com', 'Shipping Manager road ','BAC +5', '2015-04-11 04:11:12'),
(5, 'Matthew','Popp',  48,'krystel_wol7@gmail.com', 'Chief Sustainability Officer road ','BAC +6', '2016-01-04 05:20:30'),
(6, 'Alan','Wallin', 37,  'neva_gutman10@hotmail.com','Chemical Technician boulevard ','BAC +10', '2017-01-10 06:40:10'),
(7, 'Joyce','Hinze', 44, 'davonte.maye@yahoo.com', 'Transportation Planner avenue ','BAC +3', '2017-05-02 02:20:30'),
(8, 'Donna','Andrews', 49, 'joesph.quitz@yahoo.com', 'Wind Energy Engineer city view ','BAC +5', '2018-01-04 05:15:35'),
(9, 'Andrew','Best', 51, 'jeramie_roh@hotmail.com', 'Geneticist road ','BAC +10', '2019-01-02 02:20:30'),
(10, 'Joel','Ogle',45, 'summer_shanah@hotmail.com',  'Space Sciences Teacher avenue','BAC +13', '2020-02-01 06:22:50');