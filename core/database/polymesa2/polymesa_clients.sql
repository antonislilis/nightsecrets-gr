CREATE DATABASE  IF NOT EXISTS `polymesa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `polymesa`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: polymesa
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `description` varchar(545) DEFAULT NULL,
  `notes` varchar(25) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `address` varchar(245) DEFAULT NULL,
  `perioxi` varchar(100) DEFAULT NULL,
  `map` varchar(545) DEFAULT NULL,
  `logo` varchar(245) DEFAULT NULL,
  `main_photo` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `url` varchar(245) DEFAULT NULL,
  `liked` int(11) DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Gazi College','Καλωσήρθατε στο Gazi College, έναν απολαυστικό casual κόσμο που εμπνεύστηκαν 3 φίλοι - συνδημιουργοί των καλύτερων σημείων διασκέδασης σε Αθήνα και Θεσσαλονίκη. Urban ατμόσφαιρα, χορταστικά πιάτα, τεράστιες βιβλιοθήκες είναι το φόντο για τις αξέχαστες ώρες σας εδώ μέσα.','Eatery','eatery','Περσεφόνης 53','Γκάζι',NULL,'img/clients/gazi-college-logo.jpg','img/clients/gazi-college-main.jpg','gazicoll@gazi.gr','210 3422112',15,'http://www.gazicollege.gr/',NULL,'<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/GUBhf-L5Qv0\" frameborder=\"0\" allowfullscreen></iframe>'),(2,'Club W','Tο W nightclub αλλάζει καλοκαιρινή στέγη και μεταφέρεται στο χώρο του BED, στον Αστέρα Γλυφάδας.','The best Club in city','nightclub','Leoforos Poseidonos 58','Γλυφάδα',NULL,'img/clients/club-w.png','img/clients/club-w-main.jpg','info@wnightclub.gr','6939001746',10,'http://www.wnightclub.gr/',NULL,'<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/DhAM1S9HkNg\" frameborder=\"0\" allowfullscreen></iframe>'),(3,'MOJITO BAY','Μοναδικά cocktails και Mojitos σε πολλές παραλλαγές που θα κερδίσουν τις εντυπώσεις!','Night Club','nightclub','Παραλία Λομπάρδας, 33ο χλμ. Αθηνών-Σουνίου, 19400','Αγία Μαρίνα',NULL,'img/clients/mojito_bay_logo.jpg','img/clients/mojito_bay_main.jpg','mojitobay@yahoo.gr','22910-78950',NULL,'https://www.facebook.com/MojitoBayClub',NULL,'<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/NMl8c17bcyE\" frameborder=\"0\" allowfullscreen></iframe>'),(4,'LIMBO ROCK CLUB','Ροκάδικο στο Αιγάλεω για όλα τα γούστα.','Απο το 1960','rockbar','Λεωφόρος Αθηνών 389','Αιγάλεω',NULL,'http://justbands.gr/wp-content/uploads/2014/05/limbo_rock_club-150x150.jpg','http://4.bp.blogspot.com/-UWsK0705UC4/U4L7rL0JrvI/AAAAAAAACCc/08gYfHetSLM/s1600/limbo_simos.jpg','limborockclub@limbo.gr','2105900333',NULL,'http://www.facebook.com/limbo.rock.73',NULL,'<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/nVp166hKN2c\" frameborder=\"0\" allowfullscreen></iframe>'),(5,' A FOR ATHENS','Το δημοφιλέστερο cocktail spot της πόλης έχει σούπερ θέα στην Ακρόπολη και στην Πλατεία Μοναστηρακίου και βρίσκεται στον έκτο όροφο του ξενοδοχείου «Α For Athens» ','A for U','jazzbar','Μιαούλη 2-4','Μοναστηράκι',NULL,'http://static.gr.groupon-content.net/71/63/1343293426371.jpg','http://aforathens.com/material/images/topfloor/01.jpg','aforAthens@gmail.com',' 2103244244',NULL,'',NULL,'<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/pFVX_fJE69I\" frameborder=\"0\" allowfullscreen></iframe>'),(6,'ALIARMAN','Ντυμένο στα λευκά, με βοτσαλάκι κάτω από τα πόδια σου χειμώνα-καλοκαίρι, σαν να είσαι σε νησί. Σνακ, fingerfood, σαλάτες. ','Bar','bar','Σωφρονίου 2','Γκάζι',NULL,'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpa1/v/t1.0-1/c0.0.160.160/p160x160/1557515_644224572303758_1858043980_n.jpg?oh=2c88117ba8d0a870db3cab40eca529d0&amp;oe=5532C24A&amp;__gda__=1429987231_e8c3fb24a153d6f4e528295e34febce7','http://www.neolaia.gr/wp-content/uploads/2012/03/2005.png','aliarman@yahoo.gr','2103426322',NULL,'',NULL,'<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/YsdotsS2hAA\" frameborder=\"0\" allowfullscreen></iframe>'),(7,' BLUE BIRD','Ένα μικροσκοπικό, γλυκό bistro-bar με φιλική διάθεση και φανατικούς θαμώνες. Δεν το ξενυχτάει πολύ. Τσέκαρε τις Παρασκευές με Chris Kontos στη μουσική ',' bistro-bar','bar','Ηπίτου 4','Σύνταγμα',NULL,'http://fthinopolis.gr/wp-content/uploads/2014/03/blue-bird.jpg','http://www.choosybastards.gr/wp-content/uploads/2013/02/Blue-Bird-1.jpg','bluebird@blue.com','6944878767',NULL,'https://www.facebook.com/pages/BLUE-BIRD/256266337813438',NULL,''),(8,'CIRCLE','Καφετέρια','Καφέ','caferestaurant','Αιμιλίου Βεάκη 62','Περιστέρι',NULL,'http://4.bp.blogspot.com/-skLkQU-WnT4/UGAr_mnD4hI/AAAAAAAABSk/J9hgzopm6z4/s1600/collage+circle+food.jpg','http://static.roundmenu.com/images/restaurants/rst_1374.jpg','circle@circle.gr','2130210834',NULL,'http://www.circle-cafe.com/?p=home/main-courses',NULL,''),(9,'ΦΟΙΝΙΚΑΣ','Δεν περιέχει περιγραφή','Φοινικας','nightclub','Ηρώων Πολυτεχνείου 76 (πεζόδρομος)','Χαιδάρι',NULL,'http://2.bp.blogspot.com/-P823w-o3R3Q/VDKDceN5yII/AAAAAAAAB0M/On8dGbjCjlo/s1600/foinikas-club-eikones.png','http://www.kratisinow.gr/wp-content/uploads/2014/10/foinikas.jpg','foinikasgr@yahoo.gr','2105320114',NULL,'https://el-gr.facebook.com/pages/%CE%A6%CE%BF%CE%B9%CE%BD%CE%B9%CE%BA%CE%B1%CF%82-M%CE%BF%CF%85%CF%83%CE%B9%CE%BA%CE%BF-%CE%BC%CF%80%CE%B1%CF%81/106602496084178',NULL,'<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/QWD61jZFxW8\" frameborder=\"0\" allowfullscreen></iframe>'),(10,'ΝΗΠΙΑΓΩΓΕΙΟ','Από τα παλιότερα μπαράκια της περιοχής, καλαίσθητο όσο και οι μαύρες μουσικές που υπεραγαπά. ','Soul / Jazz / Funk','jazzbar','Ελασιδών &amp; Κλεάνθους 8','Γκάζι',NULL,'http://www.instyle.gr/wp-content/uploads/2013/10/16/nip1.jpg','http://lmnts.athinorama.gr/lmnts/articles/5729/nipi180.jpg','nipiagogeio@hotmail.com','2103458534',NULL,'https://www.facebook.com/nipiagogio.gazi',NULL,''),(11,'METAMATIC:TAF','Καλλιτεχνικό κοινό αλλά και καινούργιοι θαμώνες που κάνουν «ουάου» μόλις ανακαλύψουν αυτήν την αναλλοίωτη από το χρόνο συνοικία της πόλης, η οποία στεγάζει γκαλερί σε πολλά επίπεδα κι ένα κατά τα άλλα χαλαρό bar στην πλατεία. Ωραίες μαύρες μουσικές. Κάθε Δευτ. οι Shaolin Bunnies η μπάντα-μουσικό πείραμα σε αυτοσχεδιασμούς. ','Soul / Jazz / Funk','jazzbar','Νορμανού 5','Μοναστηράκι',NULL,'http://theartfoundation.metamatic.gr/files/blogs/metamatic_taf/resized/taf_periklis_door_543x355$.jpg','http://theartfoundation.metamatic.gr/files/blogs/metamatic_taf/resized/taf_543x355_543x355$.JPG','meta@hot.gr','2103238757',NULL,'http://theartfoundation.metamatic.gr/GR/about_metamatic_taf/',NULL,''),(13,'MIKRO (BY MATTO)','Mοιράζει τη δράση του σε επτά δωμάτια, έχει εστιατόριο με μεσογειακή κουζίνα και μια μικρή εξωτική αυλή. Η μουσική του είναι πάντα house. ','Electronica','nightclub','Κύπρου 13','Γλυφάδα',NULL,'http://artinook.com/media/cache/ae/85/ae857a3ebfbe13924c249c532346a793.jpg','http://ic.pics.livejournal.com/nicety/2147506/588690/588690_original.jpg','mikmatto@ht.gr','2108941031',NULL,'',NULL,''),(14,' MOUSTAKI','einai kalo','kalo','eatery','Δροσίνη 5','Κηφισιά',NULL,'http://www.neolaia.gr/wp-content/uploads/2013/03/486501_356800431101598_1791754994_n-400x400.png','http://clubeat.vivanews.gr/wp-content/uploads/2014/12/moustaki_bar-702x401.png','moustaki@gr.gr','2114047612',NULL,'https://el-gr.facebook.com/MoustakiBar',NULL,''),(15,'Κέντρο Αθηνών','Από Παρασκευή 24 Οκτωβρίου το Κέντρο Αθηνών υποδέχεται το Νίκο Βέρτη και την Ελένη Φουρέϊρα.\r\nΜετά από μια σειρά ετών στο νυχτερινό κέντρο Fantasia, ο Νίκος Βέρτης αλλάζει στέγη και ανεβαίνει στην πίστα του Κέντρο Αθηνών με σκοπό να &quot;τινάξει&quot; τη διασκέδαση στα ύψη.\r\nΜαζί του η ανανεωμένη Ελένη Φουρέϊρα που μοναδικό σκοπό έχει να συνοδέψει το Νίκο Βέρτη σε ένα ανεπανάληπτο πρόγραμμα γεμάτο εκπλήξεις.\r\nΑπό Παρασκευή 24 Οκτωβρίου και κάθε Σάββατο και Κυριακή.','Βέρτης - Φουρέϊρα ','mpouzoukia','Πειραιώς 142 και Π. Ράλλη','Αθήνα',NULL,'http://ghgt-blog.org/wp-content/uploads/2014/09/Kentro-Athinon_1378833650.jpeg','http://3.bp.blogspot.com/-tBSzmd0L0_U/U9q-ka6mbGI/AAAAAAAAAdM/E2Dw41nif9E/s1600/%CE%9A%CE%B5%CC%81%CE%BD%CF%84%CF%81%CE%BF-%CE%91%CE%B8%CE%B7%CE%BD%CF%89%CC%81%CE%BD-2014-2015.jpeg','kentro-athinon@night.gr','2103454108',NULL,'http://www.kentro-athinon.gr/el-gr/Default.aspx',NULL,'<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/9SC77FAqgXM\" frameborder=\"0\" allowfullscreen></iframe>');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-31  7:54:58
