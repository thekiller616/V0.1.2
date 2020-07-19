/*!40100 SET CHARACTER SET latin1*/;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0*/;


#
# Table structure for table 'infos'
#

CREATE TABLE `infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` text NOT NULL,
  `hostname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `cpanel` text,
  `c_user` text,
  `c_pass` varchar(255) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 /*!40100 DEFAULT CHARSET=latin1*/;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS*/;
