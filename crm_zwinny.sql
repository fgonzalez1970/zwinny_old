-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para crm_zwinny
CREATE DATABASE IF NOT EXISTS `crm_zwinny` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crm_zwinny`;

-- Volcando estructura para tabla crm_zwinny.leads
CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `id_condicion_pago` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_giro` tinyint(4) DEFAULT NULL,
  `codigo_lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nac_lead` timestamp NULL DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs_lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status` tinyint(4) DEFAULT NULL,
  `fecha_alta_lead` timestamp NULL DEFAULT NULL,
  `fecha_baja_lead` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.leads: ~50 rows (aproximadamente)
DELETE FROM `leads`;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` (`id`, `id_entity`, `id_condicion_pago`, `id_empleado`, `id_giro`, `codigo_lead`, `nombre_lead`, `apellido_lead`, `fecha_nac_lead`, `razon_social`, `rfc`, `contacto_lead`, `email`, `obs_lead`, `id_status`, `fecha_alta_lead`, `fecha_baja_lead`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, 1, 'Alexandrine Heaney', 'Margret Hahn', 'Thompson', NULL, 'Dorian Casper', 'Pinkie Kuvalis MD', 'Prof. Gaston Parker', 'uheller@example.com', 'Rerum et maiores maiores quisquam harum.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(2, 1, 1, NULL, 1, 'Elna Buckridge IV', 'Jasper Johnston', 'Rosenbaum', NULL, 'Winston Weissnat', 'Pedro Zemlak', 'Maverick Harris', 'stone.casper@example.com', 'Non porro nisi cum porro.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(3, 1, 1, NULL, 1, 'Prof. Waldo Stark IV', 'Molly Moen', 'Stamm', NULL, 'Lila Beier III', 'Quinn Krajcik', 'Florence Jakubowski', 'maria24@example.com', 'Quia cupiditate incidunt inventore et minima.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(4, 1, 1, NULL, 1, 'Tracy Murray', 'Dr. Hollis Hegmann I', 'Stracke', NULL, 'Cathrine Leffler', 'Dr. Giovanni Cummings', 'Dr. Adonis Baumbach', 'travis40@example.org', 'Enim rerum voluptas consequatur excepturi unde.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(5, 1, 1, NULL, 1, 'Dr. Princess Bernhard MD', 'Winnifred Kulas MD', 'Haag', NULL, 'Berenice Zboncak', 'Mrs. Trudie Stehr', 'Sid Grimes', 'ikonopelski@example.org', 'Quidem quia fugiat rerum assumenda.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(6, 1, 1, NULL, 1, 'Dr. Riley Heaney', 'Prof. Edmund Lang V', 'Donnelly', NULL, 'Felicita Marvin', 'Graciela Gulgowski', 'Jalon O\'Hara', 'tremayne64@example.com', 'Perferendis et est sit ut beatae commodi blanditiis.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(7, 1, 1, NULL, 1, 'Stanley Kilback', 'Bradley Eichmann', 'Beatty', NULL, 'Arianna Klein', 'Dr. Harold Crona', 'Dr. Xzavier Schumm MD', 'wiegand.jillian@example.com', 'Necessitatibus et occaecati voluptate commodi aperiam omnis.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(8, 1, 1, NULL, 1, 'Mrs. Savanna Aufderhar', 'Prof. Valentine Effertz II', 'Olson', NULL, 'Germaine Kirlin', 'Nikolas Spencer I', 'Laverne Swaniawski', 'marquis.parker@example.net', 'Reprehenderit cum molestias aut praesentium.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(9, 1, 1, NULL, 1, 'Michele Bashirian', 'Matilde Oberbrunner', 'White', NULL, 'Prof. Bradley Spencer II', 'Margarete Luettgen', 'Savanna Beier', 'celia16@example.com', 'Quo quia vel adipisci quaerat beatae ullam iusto.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(10, 1, 1, NULL, 1, 'Ellen Lockman', 'Jacinthe Price MD', 'Dach', NULL, 'Emely Reichert', 'Lauren O\'Hara', 'Lina Nicolas', 'gilbert.harris@example.net', 'Dolores quis aut esse.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(11, 1, 1, NULL, 1, 'Fritz Barrows', 'Lillian Mitchell IV', 'Nienow', NULL, 'Kyler Beier I', 'Delta Feest DVM', 'Micah Jacobi DVM', 'morar.skye@example.org', 'Eum est aut adipisci quia possimus corrupti et.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(12, 1, 1, NULL, 1, 'Sandra Stanton', 'Prof. Andy Collier', 'Padberg', NULL, 'Kaylee Vandervort DDS', 'Hillard Medhurst', 'Marlee Ritchie', 'ullrich.ellis@example.com', 'Consequatur et veniam molestiae nam voluptas nisi.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(13, 1, 1, NULL, 1, 'Leonardo Ward', 'Prof. Marie Feest PhD', 'Tremblay', NULL, 'Prof. Reina Dickens', 'Dasia Brakus Jr.', 'Rosanna Hessel Jr.', 'vance75@example.org', 'Aut ut excepturi omnis quia cupiditate voluptatem mollitia.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(14, 1, 1, NULL, 1, 'Dr. Mable Klein III', 'Jaylin Larkin', 'Sauer', NULL, 'Prof. Lane Legros', 'Manley Abernathy', 'Dr. Wanda Senger', 'rasheed91@example.org', 'Ipsam quis eos eum.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(15, 1, 1, NULL, 1, 'Prof. Cynthia Hermann III', 'Dr. Hank Lynch', 'Leffler', NULL, 'Mrs. Reba Dicki I', 'Sonia Botsford', 'Mr. Gerard Botsford IV', 'ppfannerstill@example.org', 'Enim est qui quia maxime id labore magnam.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(16, 1, 1, NULL, 1, 'Geovanny Langosh', 'Judd Wisoky MD', 'Bechtelar', NULL, 'Mr. Raven Auer', 'Flo Block Sr.', 'Ms. Bridget Gaylord', 'george.schowalter@example.org', 'Numquam aspernatur vel repellendus dolores.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(17, 1, 1, NULL, 1, 'Kris Yundt', 'Prof. Kiel Reinger DVM', 'Medhurst', NULL, 'Noe Russel', 'Beaulah Lindgren', 'Alexa Kunde', 'frankie.howell@example.org', 'Cumque sunt omnis vitae ipsa.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(18, 1, 1, NULL, 1, 'Allison Batz', 'Sven Daugherty', 'Rempel', NULL, 'Prof. Elvera Koch Sr.', 'Liam Russel I', 'Ms. Lola Goldner', 'vbeahan@example.org', 'Tempora suscipit iure sint culpa non.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(19, 1, 1, NULL, 1, 'Theodora Heidenreich', 'Kianna Walter Jr.', 'Bauch', NULL, 'Deron Kilback II', 'Elfrieda Rice', 'Prof. Jayden Kub MD', 'xharber@example.com', 'Beatae nemo cum eligendi atque fugit fuga placeat saepe.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(20, 1, 1, NULL, 1, 'Mr. Kolby Lockman', 'Dr. Anne O\'Hara V', 'Mosciski', NULL, 'Saige Torp', 'Dr. Bernardo Mann V', 'Anne Klein', 'rempel.earnestine@example.com', 'Debitis voluptatem fuga quod sit ea.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(21, 1, 1, NULL, 1, 'Niko Mante PhD', 'Triston Schaefer IV', 'Kris', NULL, 'Ms. Amara Haag', 'Mckenzie Terry', 'Dr. Germaine Von DVM', 'delbert.larson@example.net', 'Vel quas molestias beatae quaerat.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(22, 1, 1, NULL, 1, 'Mozelle Renner', 'Evan Kshlerin', 'Cruickshank', NULL, 'Maybell Hermann', 'Annetta Wuckert', 'Prof. Deshawn Mante', 'borer.ursula@example.com', 'Consectetur maxime nobis nihil non non beatae eum.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(23, 1, 1, NULL, 1, 'Amari O\'Reilly II', 'Mossie Greenholt', 'Stehr', NULL, 'Sandrine Robel', 'Dr. Antoinette Bernhard', 'Ms. Gloria Kertzmann MD', 'donny.rempel@example.org', 'Sed laudantium perspiciatis nihil alias.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(24, 1, 1, NULL, 1, 'Holly Jakubowski', 'Darrell Muller', 'Price', NULL, 'Kenya Koepp', 'Mrs. Tabitha Shanahan IV', 'Elody Shields', 'reina.weber@example.net', 'Impedit molestiae repellendus unde quas impedit numquam.', 1, NULL, NULL, '2018-05-10 01:49:29', '2018-05-10 01:49:29'),
	(25, 1, 1, NULL, 1, 'Vernice Lowe', 'Mrs. Thea Barton', 'West', NULL, 'Dr. Keagan Keeling', 'Sigrid Harber', 'Ms. Thora Leffler', 'pspinka@example.org', 'Et vitae qui ex molestias quis unde.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(26, 1, 1, NULL, 1, 'Prof. Grace Reichert Jr.', 'Dr. Meggie Tremblay', 'Kilback', NULL, 'Dr. Ayden Dooley', 'Mrs. Shannon Mertz', 'Mr. Gardner Carter', 'homenick.leta@example.com', 'Et totam sed quia voluptatibus aliquid expedita repudiandae.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(27, 1, 1, NULL, 1, 'Lorenzo McClure', 'Anastasia Mills', 'Ritchie', NULL, 'Bernhard Kovacek', 'Payton Morar V', 'Mrs. Janet Wolf Jr.', 'laury34@example.org', 'Magnam sequi illum accusantium non itaque mollitia facilis.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(28, 1, 1, NULL, 1, 'Art Zieme DVM', 'Lia Schmitt', 'Mohr', NULL, 'Colleen Crooks', 'Roberta Rippin PhD', 'Elise Christiansen III', 'sylvan72@example.org', 'Ratione eveniet dolorem assumenda illo error atque.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(29, 1, 1, NULL, 1, 'Lulu Pacocha', 'Dr. Eulalia Jast MD', 'Schumm', NULL, 'Reba Reynolds', 'Jairo Gleason', 'Lucas Will', 'lourdes65@example.com', 'Reiciendis expedita nihil officia.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(30, 1, 1, NULL, 1, 'Dr. Elvis Marquardt', 'Frederick Jaskolski', 'Emmerich', NULL, 'Ophelia Wisozk', 'Prof. Eloy Russel DDS', 'Melody Moen Sr.', 'junius68@example.net', 'Nam quis facilis dolor nihil autem.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(31, 1, 1, NULL, 1, 'Prof. Russell Jenkins MD', 'Lauryn Mayer Jr.', 'Erdman', NULL, 'Miss Noemi Schuster V', 'Isaias Greenholt', 'Prof. Adolphus Parker V', 'greenfelder.raymundo@example.net', 'Quibusdam vel porro quam omnis.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(32, 1, 1, NULL, 1, 'Estrella Towne', 'Mandy Cronin II', 'O\'Connell', NULL, 'Shayne Davis', 'Coy Abshire III', 'Wanda Rutherford', 'kareem.bartoletti@example.org', 'Sed aliquam tenetur sunt amet deleniti dolorum.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(33, 1, 1, NULL, 1, 'Hailie Baumbach', 'Prof. Ricardo Davis', 'Hayes', NULL, 'Henderson White', 'Geovany Hoppe', 'Bette Nicolas', 'yhills@example.org', 'Doloribus necessitatibus dolore voluptatum nihil eaque hic.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(34, 1, 1, NULL, 1, 'Lyda Goyette', 'Retta Hudson Jr.', 'Abernathy', NULL, 'Kacie Altenwerth V', 'Jana Brown', 'Charity Metz', 'bianka.kihn@example.com', 'Pariatur fugit quia ipsam eum incidunt itaque.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(35, 1, 1, NULL, 1, 'Mr. Jarrell Lueilwitz Sr.', 'Mr. Douglas Wiegand Sr.', 'Marks', NULL, 'Leone Doyle', 'Isaac Gislason', 'Prof. Maudie Crooks', 'hhansen@example.com', 'Molestias qui ipsam quia non omnis numquam vero.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(36, 1, 1, NULL, 1, 'Oswald Miller DVM', 'Dr. Ansley Walker III', 'Hills', NULL, 'Orion Murphy', 'Lionel Blanda', 'Mrs. Alana Schumm', 'rachel73@example.net', 'Officiis iste rerum inventore voluptatem veniam eveniet provident.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(37, 1, 1, NULL, 1, 'Cierra Willms', 'Crystel McClure V', 'Ritchie', NULL, 'Jazlyn Lehner', 'Baby Gleichner', 'Dr. Kamryn Veum', 'darion.kilback@example.com', 'Velit itaque qui illum quia non.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(38, 1, 1, NULL, 1, 'Austin Stoltenberg', 'Mikayla Herman', 'Haley', NULL, 'Dock Turcotte', 'Mr. Gustave Donnelly DVM', 'Prof. Donavon Bartoletti DVM', 'leif85@example.net', 'Eaque qui magni quis harum minima non.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(39, 1, 1, NULL, 1, 'Chaim Kozey', 'Katlynn Johnson PhD', 'Gibson', NULL, 'Corrine Swift MD', 'Brad Schaden', 'Janelle Kuhlman III', 'micheal.west@example.net', 'Velit sit nobis nesciunt.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(40, 1, 1, NULL, 1, 'Emmitt Doyle', 'Kareem Waters Jr.', 'Wintheiser', NULL, 'Kristin Wiza', 'Buck Leffler Jr.', 'Prof. Fernando Lebsack PhD', 'pouros.ofelia@example.net', 'Vitae ea nisi sunt quis nesciunt beatae dolores.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(41, 1, 1, NULL, 1, 'Ottilie Beer', 'Emory Ruecker DVM', 'Wiegand', NULL, 'Frieda Douglas I', 'Cleveland Farrell', 'Mariah Prosacco', 'xpurdy@example.com', 'Vel necessitatibus et voluptatibus.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(42, 1, 1, NULL, 1, 'Betty Hoppe', 'Lambert Brown', 'Murphy', NULL, 'Vince Beatty Jr.', 'Mr. Efren Monahan', 'Amya Dare', 'elliot.abshire@example.net', 'Quas nemo ut expedita odio est expedita.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(43, 1, 1, NULL, 1, 'Dr. Waino Bartell V', 'Mrs. Jana Simonis', 'Cole', NULL, 'Miss Yazmin Bechtelar DVM', 'Mrs. Vivian Macejkovic DVM', 'Abby Herzog', 'camron30@example.net', 'Maxime ratione impedit expedita id et rerum.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(44, 1, 1, NULL, 1, 'Jermaine Klocko', 'Dr. Stefan Tillman', 'Goldner', NULL, 'Mrs. Jessica Wisoky', 'Mr. Stephen Glover', 'Rosalind Metz', 'schoen.brady@example.net', 'Placeat asperiores impedit id.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(45, 1, 1, NULL, 1, 'Miss Eulalia Beahan V', 'Coleman Lang', 'Hyatt', NULL, 'Sarai Daniel DVM', 'Emelia Corwin', 'Elza Spinka', 'fadel.carmen@example.org', 'Quidem et ullam voluptate nihil qui itaque qui.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(46, 1, 1, NULL, 1, 'Mr. Sedrick Crist PhD', 'Prof. Wilfred Schuster', 'Parker', NULL, 'Buster Howe', 'Prof. Izaiah O\'Keefe II', 'Kris Cronin', 'nyasia81@example.net', 'Fugit deserunt dolor et dolor ipsa.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(47, 1, 1, NULL, 1, 'Isaac Stoltenberg', 'Amara McLaughlin', 'Lang', NULL, 'Yasmin Jacobson', 'Brady Zboncak', 'Alba Davis', 'sarina.windler@example.com', 'Qui voluptas quibusdam omnis sint et in assumenda.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(48, 1, 1, NULL, 1, 'Dr. Gisselle Schmitt II', 'Mrs. Marlee Roberts IV', 'Goodwin', NULL, 'Noemi Larkin', 'Emmet Metz', 'Miss Felipa Bins MD', 'kkub@example.net', 'Quod eos quia quidem.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(49, 1, 1, NULL, 1, 'Immanuel Auer', 'Ms. Ara Nitzsche', 'Boehm', NULL, 'Cassandre Schoen', 'Desmond Fahey', 'Nellie McCullough', 'maggie80@example.net', 'Earum sit ut nulla tempore nam quia quod.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30'),
	(50, 1, 1, NULL, 1, 'Autumn Murray', 'Prof. Gabe Howe', 'Vandervort', NULL, 'Emmitt Heaney', 'Elza Stoltenberg', 'Melany Gislason', 'rjohns@example.com', 'Voluptatem autem eligendi nam dicta perferendis quia qui.', 1, NULL, NULL, '2018-05-10 01:49:30', '2018-05-10 01:49:30');
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.migrations: ~10 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_000000_create_users_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2015_01_20_084450_create_roles_table', 1),
	(5, '2015_01_20_084525_create_role_user_table', 1),
	(6, '2015_01_24_080208_create_permissions_table', 1),
	(7, '2015_01_24_080433_create_permission_role_table', 1),
	(8, '2015_12_04_003040_add_special_role_column', 1),
	(9, '2017_10_17_170735_create_permission_user_table', 1),
	(10, '2018_05_07_191923_create_leads_table', 1),
	(11, '2014_04_26_133308_create_tenants_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.permissions: ~19 rows (aproximadamente)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Navegar usuarios', 'users.index', 'Lista y navega todos los usuarios del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(2, 'Ver detalle de usuario', 'users.show', 'Ve en detalle cada usuario del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(3, 'Edición de usuarios', 'users.edit', 'Podría editar cualquier dato de un usuario del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(4, 'Eliminar usuario', 'users.destroy', 'Podría eliminar cualquier usuario del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(5, 'Navegar inquilinos', 'tenants.index', 'Lista y navega todos los inquilinos del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(6, 'Ver detalle de un inquilino', 'tenants.show', 'Ve en detalle cada inquilino del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(7, 'Creación de inquilinos', 'tenants.create', 'Podría crear nuevos inquilinos en el sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(8, 'Edición de inquilinos', 'tenants.edit', 'Podría editar cualquier dato de un inquilino del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(9, 'Eliminar inquilino', 'tenants.destroy', 'Podría eliminar cualquier inquilino del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(10, 'Navegar roles', 'roles.index', 'Lista y navega todos los roles del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(11, 'Ver detalle de un rol', 'roles.show', 'Ve en detalle cada rol del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(12, 'Creación de roles', 'roles.create', 'Podría crear nuevos roles en el sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(13, 'Edición de roles', 'roles.edit', 'Podría editar cualquier dato de un rol del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(14, 'Eliminar roles', 'roles.destroy', 'Podría eliminar cualquier rol del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(15, 'Navegar prospectos', 'leads.index', 'Lista y navega todos los prospectos del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(16, 'Ver detalle de un prospecto', 'leads.show', 'Ve en detalle cada prospecto del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(17, 'Creación de prospectos', 'leads.create', 'Podría crear nuevos prospectos en el sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(18, 'Edición de prospectos', 'leads.edit', 'Podría editar cualquier dato de un prospecto del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30'),
	(19, 'Eliminar prospectos', 'leads.destroy', 'Podría eliminar cualquier prospecto del sistema', '2018-05-09 19:29:30', '2018-05-09 19:29:30');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.permission_role: ~4 rows (aproximadamente)
DELETE FROM `permission_role`;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 15, 2, NULL, NULL),
	(2, 16, 2, NULL, NULL),
	(3, 17, 2, NULL, NULL),
	(4, 18, 2, NULL, NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.permission_user: ~0 rows (aproximadamente)
DELETE FROM `permission_user`;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.roles: ~2 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
	(1, 'Admin Zwinny', 'slug', 'Administrador Global Zwinny', '2018-05-09 19:30:17', '2018-05-10 01:11:18', 'all-access'),
	(2, 'Admin Gral', 'slug2', 'Administrador General', '2018-05-09 19:30:17', '2018-05-09 19:30:17', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.role_user: ~2 rows (aproximadamente)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 2, 2, NULL, NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.tenants
CREATE TABLE IF NOT EXISTS `tenants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_bd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status` tinyint(4) DEFAULT '0',
  `fecha_activacion` date DEFAULT NULL,
  `fecha_suspension` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.tenants: ~0 rows (aproximadamente)
DELETE FROM `tenants`;
/*!40000 ALTER TABLE `tenants` DISABLE KEYS */;
/*!40000 ALTER TABLE `tenants` ENABLE KEYS */;

-- Volcando estructura para tabla crm_zwinny.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_temp` tinyint(1) NOT NULL DEFAULT '1',
  `tenant_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla crm_zwinny.users: ~6 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_temp`, `tenant_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, 'bKwAiEoRPWWiMHYa8JBQF5hNE5KKBYVW13ntkA4eI7Pq3tXhW4UrdJ7i0rc0', '2018-05-09 19:30:11', '2018-05-09 19:30:11'),
	(2, 'Kay Emmerich', 'zdooley@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 2, 'lRTvNpPSReTggRMTQEiN7aWd0OeMYFIX7X6SjY294N77r0UIho8jFARaaAvG', '2018-05-09 19:30:11', '2018-05-09 19:38:25'),
	(3, 'Mrs. Ruby Stroman', 'gracie.greenfelder@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, 'urSv0ualF4', '2018-05-09 19:30:11', '2018-05-09 19:30:11'),
	(4, 'Benny Howell', 'weissnat.tabitha@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, 'DF0tcdkzr4', '2018-05-09 19:30:11', '2018-05-09 19:30:11'),
	(5, 'Dr. Cecile Skiles PhD', 'karianne24@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, '7iyNDmZo3d', '2018-05-09 19:30:11', '2018-05-09 19:30:11'),
	(6, 'Lukas Nitzsche', 'graham.titus@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, '0P9IzM7WOD', '2018-05-09 19:30:11', '2018-05-09 19:30:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
