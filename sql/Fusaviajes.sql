-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table fusaviajes.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `urlimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.categories: ~3 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `urlimg`) VALUES
	(1, 'EcoTurismo', '2020-05-02 19:47:50', '2020-06-21 19:33:30', '1592768010Ecoturismo.jpg'),
	(2, 'Monumentos', '2020-05-02 19:47:50', '2020-06-21 19:33:50', '1592768030Monumentos.jpg'),
	(3, 'Murales', '2020-06-12 14:53:13', '2020-06-21 19:15:15', '1592766915Murales.jpg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `point` int(10) unsigned NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.comments: ~0 rows (approximately)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.migrations: ~11 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(140, '2020_04_16_204312_create_usuarios_table', 1),
	(182, '2014_10_12_000000_create_users_table', 2),
	(183, '2014_10_12_100000_create_password_resets_table', 2),
	(184, '2019_08_19_000000_create_failed_jobs_table', 2),
	(185, '2020_04_09_180702_create_posts_table', 2),
	(186, '2020_04_09_214909_create_categories_table', 2),
	(187, '2020_04_12_195311_create_tags_table', 2),
	(188, '2020_04_12_200731_create_post_tag_table', 2),
	(189, '2020_04_19_202159_create_comments_table', 2),
	(190, '2020_05_02_180356_create_photos_table', 2),
	(191, '2020_05_02_193956_create_photocs_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.model_has_permissions: ~0 rows (approximately)
DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.model_has_roles: ~2 rows (approximately)
DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 1),
	(2, 'App\\User', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.password_resets: ~1 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.permissions: ~0 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.photos: ~2 rows (approximately)
DELETE FROM `photos`;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`id`, `post_id`, `url`, `created_at`, `updated_at`) VALUES
	(1, 1, '/storage/hykBJ8zMKCjiWVYqviflEUVaTb0nQKP3KaLbA7un.jpeg', '2020-05-02 19:51:51', '2020-05-02 19:51:51'),
	(2, 2, '/storage/IPJxKcPLB3rU49zTAFqLNmbkqCjdWrvZy0dfvxJ1.jpeg', '2020-05-02 20:00:02', '2020-05-02 20:00:02'),
	(3, 3, '/storage/t8tuHMWt2PTGvhK5YupDu1MPuuf3qLa13vbbJ0bD.jpeg', '2020-05-02 20:24:41', '2020-05-02 20:24:41');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlimg` text COLLATE utf8mb4_unicode_ci,
  `excerpt` mediumtext COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `point` float DEFAULT NULL,
  `vrimg_1` text COLLATE utf8mb4_unicode_ci,
  `vrimg_2` text COLLATE utf8mb4_unicode_ci,
  `vrimg_3` text COLLATE utf8mb4_unicode_ci,
  `vrimg_4` text COLLATE utf8mb4_unicode_ci,
  `vrimg_5` text COLLATE utf8mb4_unicode_ci,
  `vrimg_6` text COLLATE utf8mb4_unicode_ci,
  `color_vr` text COLLATE utf8mb4_unicode_ci,
  `pintor_vr` text COLLATE utf8mb4_unicode_ci,
  `ubicacion` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `escena_vr` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.posts: ~17 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `url`, `urlimg`, `excerpt`, `body`, `published_at`, `category_id`, `created_at`, `updated_at`, `point`, `vrimg_1`, `vrimg_2`, `vrimg_3`, `vrimg_4`, `vrimg_5`, `vrimg_6`, `color_vr`, `pintor_vr`, `ubicacion`, `content`, `escena_vr`) VALUES
	(1, 'Monumento Lucho Herrera', 'monumento-lucho-herrera', '1593620779Monumento_Lucho_Herrera.jpg', 'El monumento lucho herrera es una estatua construida para conmemorar la hazaña deportiva realizada por el ciclista fusagasugueño Luis Alberto Herrera Herrera en la Vuelta España de 1987.', '<p class="MsoNormal"><span lang="ES-CO">El monumento lucho herrera es una estatua\r\nconstruida para conmemorar la <b>hazaña deportiva</b> realizada por el ciclista\r\nfusagasugueño Luis Alberto Herrera Herrera en la Vuelta España de 1987, donde\r\nel escalador pudo coronarse <b>campeón</b> de este circuito. La estatua fue\r\ncreada en <b>diciembre del 2007</b>, cuenta con unas medidas de <b>6</b> metros\r\nde alto por <b>4</b> metros de ancho y se encuentra ubicada en la glorieta de\r\nla variante por la doble calzada Bogotá-Girardot.<o:p></o:p></span></p>', '2020-07-01 00:00:00', 2, '2020-07-01 16:22:19', '2020-07-01 16:26:19', 4, '1593620779Monumento_Lucho_Herrera.jpg', '1593620779photo5100656058279504107.jpg', NULL, NULL, NULL, NULL, '#badc58', 'Omar Clavijo', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d248.6456988424333!2d-74.39099193094337!3d4.34881826759708!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9eb952727d79ac12!2sMonumento%20Lucho%20Herrera!5e0!3m2!1ses!2sco!4v1592662222564!5m2!1ses!2sco', 'Luis Alberto Herrera, más conocido como Lucho Herrera y apodado "El jardinerito de Fusagasugá", fue el primer ciclista colombiano en ganar la vuelta a España, profesional entre los años de 1982 y 1992, durante los cuales consiguió 30 victorias en las diferentes etapas ciclísticas en las que participo. Lucho Herrera nació en Fusagasugá el 4 de mayo de 1961, fue pionero del ciclismo colombiano en Europa y su mayor exponente durante la década de 1980. Era un excelente escalador, como demuestran sus victorias en las clasificaciones de la montaña de las tres grandes vueltas, además de numerosas etapas y puestos de honor en las mismas, Ha sido, junto con el español Federico Martín Bahamontes, ganador de la montaña en las tres grandes vueltas europeas. (Guía Turística Fusagasugá 2017)', '2_Escena'),
	(2, 'Monumento Jardinera', 'monumento-jardinera', 'Monumento_Jardinera.jpg', 'Esta escultura representa a la mujer floricultura y campesina de Fusagasugá, está ubicada en la Cra.9 #10-1 junto a  la plaza principal de mercado desde el año 2003.', '<p class="MsoNormal"><span lang="ES-CO">Esta escultura representa a la mujer <b>floricultura</b>\r\ny <b>campesina</b> de Fusagasugá, está ubicada en la <b>Cra.9 #10-1</b> junto\r\na&nbsp; la plaza principal de mercado desde el\r\naño 2003, está elaborada en <b>bronce</b> y sus medidas aproximadas son 3\r\nmetros de alto con 1.20 metros de ancho.<o:p></o:p></span></p>', '2020-07-02 00:00:00', 2, '2020-07-01 17:53:06', '2020-07-01 18:04:39', 4.3, 'Monumento_Jardinera.jpg', '1593626679photo5100656058279504103.jpg', '1593626679Monumento_Jardinera.jpg', NULL, NULL, NULL, '#ffb142', 'Sofia Sánchez.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d683.2618286880668!2d-74.36521944998115!3d4.341651150242952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f056794a0a37f%3A0x75a96485f8142c01!2sMonumento%20a%20la%20Jardinera!5e0!3m2!1ses!2sco!4v1592666251984!5m2!1ses!2sco', NULL, '1_Escena'),
	(3, 'Monumento Indio Sutagao', 'monumento-indio-sutagao', '1593627096Monumento_Indio_Sutagao - copia.jpg', 'Representación insignia de Fusagasugá, este monumento es el homenaje a los primeros ancestros que habitaron la ciudad, el majestuoso Indio Sutagao fue elaborado en el año de 1994.', '<p class="MsoNormal"><span lang="ES-CO">Representación <b>insignia</b> de\r\nFusagasugá, este monumento es el <b>homenaje</b> a los primeros ancestros que\r\nhabitaron la ciudad, el majestuoso Indio <b>Sutagao</b> fue elaborado en el año\r\nde <b>1994</b>, cuenta con unas medidas aproximas de <b>5</b> metros de alto\r\ncon <b>2</b> metros de ancho y se encuentra ubicado en la Cl 24B antigua vía\r\npanamericana.<o:p></o:p></span></p>', '2020-07-03 00:00:00', 2, '2020-07-01 18:09:15', '2020-07-01 18:11:36', 4.3, '1593627096Monumento_Indio_Sutagao.jpg', '1593627096IMG_20200604_095724.jpg', '1593627096Monumento_Sutagao.jpg', NULL, NULL, NULL, '#badc58', 'Luis Enrique Suárez.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.4223501553224!2d-74.37981148570663!3d4.331518245955255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f049468ddbae7%3A0xebea04a5f8ed2ef0!2sMonumento%20al%20Indio%20Sutagao!5e0!3m2!1ses!2sco!4v1592666316640!5m2!1ses!2sco', 'Este monumento es un homenaje a la tribu indígena de los Sutagao, nombre que etimológicamente significa "hijos del sol", habitantes del territorio comprendido entre los ríos de Pasca y Sumapaz. Su naturaleza sedentaria les facilito la adaptación al clima y a los recursos de la zona, y fueron el resultado de la pluralidad de culturas que confluían en la región. (Guía Turística Fusagasugá 2017)', '2_Escena'),
	(4, 'Monumento Rumba Criolla', 'monumento-rumba-criolla', '1593627346Monumento_Rumba_Criolla - copia.jpg', 'Elaborado en el año 2011, esta escultura enaltece el popular festival de la Rumba Criolla Fusagasugueña, que es llevado cada año en la ciudad.', '<p class="MsoNormal"><span lang="ES-CO">Elaborado en el año <b>2011</b>, esta\r\nescultura enaltece el popular festival de la <b>Rumba Criolla</b>\r\nFusagasugueña, que es llevado cada año en la ciudad, la escultura con medidas\r\nde <b>3.20</b> metros de alto con <b>1.10</b> metros de ancho fue elaborada por\r\nSofia Sánchez y su inspiración fue la joven bailarina <b>Luz Emilse Moreno\r\nFierro </b>se encuentra ubicada en el barrio la Marsella, Dg. 16 junto a la\r\nbiblioteca municipal.<o:p></o:p></span></p>', '2020-07-04 00:00:00', 2, '2020-07-01 18:14:05', '2020-07-01 18:15:46', 4, '1593627346Monumento_Rumba_Criolla.jpg', '1593627346Monumento_Rumba_Criolla.jpg', NULL, NULL, NULL, NULL, '#f6e58d', 'Sofia Sánchez.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15913.56996307328!2d-74.3631814!3d4.3371919!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x11f797a3e48ba26d!2sMonumento%20a%20la%20Rumba%20Criolla!5e0!3m2!1ses!2sco!4v1592666450480!5m2!1ses!2sco', 'Se encuentra ubicada en la Biblioteca Municipal María Aya, Fusagasugá, es una escultura en Homenaje a la Rumba Criolla Fusagasugueña, inspirada en la niña Luz Emilse Moreno Fierro, que a su corta edad demostró la grandeza del baile de la Rumba Criolla que se celebra, lamentablemente no está entre nosotros pero nos deja el legado de su sonrisa y baile. Su padre luchó varios años para lograr que su hija fuera recordada en lo que a ella más le gustaba: el baile, eso me conmovió mucho, y fui feliz de poder plasmar a una Emilse sonriente y bella. (Sofia Sánchez)', '2_Escena'),
	(5, 'Monumento Emilio Sierra', 'monumento-emilio-sierra', '1593627534Monumento_Emilio_Sierra - copia.jpg', 'Emilio Sierra Baqueo nació en Fusagasugá el 15 de septiembre de 1891, sus mambos, merecumbés y uno que otro porro, lo hicieron inmortal, pero no tanto como lo hizo el ritmo que Sierra creó: La Rumba Criolla.', '<p class="MsoNormal"><span lang="ES-CO">Elaborada en homenaje al <b>compositor</b> fusagasugueño\r\nde la <b>Rumba Criolla</b> Emilio Sierra Baquero, esta escultura se ubica en la\r\nplazoleta de los <b>músicos</b> con dirección Cl .8a Cra 7 cuenta con unas\r\nmedidas aproximadas de <b>2.30</b> metros de alto con <b>1</b> metro de ancho.<o:p></o:p></span></p>', '2020-07-05 00:00:00', 2, '2020-07-01 18:16:44', '2020-07-01 18:18:54', 3.5, '1593627534Monumento_Emilio_Sierra.jpg', '1593627534Monumento_Emilio_Sierra.jpg', NULL, NULL, NULL, NULL, '#fed330', 'Desconocido.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.36393491243!2d-74.3645066857066!3d4.342610945868706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f71b2f8e1f%3A0xb3e401ba8103e7ec!2sCl.%208a%20%237-88%2C%20Fusagasug%C3%A1%2C%20Cundinamarca!5e0!3m2!1ses!2sco!4v1592669786544!5m2!1ses!2sco', 'Emilio Sierra Baqueo nació en Fusagasugá el 15 de septiembre de 1891, sus mambos, merecumbés y uno que otro porro, lo hicieron inmortal, pero no tanto como lo hizo el ritmo que Sierra creó: La Rumba Criolla. (Diario "El Tiempo"). Emilio Sierra compuso más de 100 canciones, en distintos ritmos tales como bambucos, pasillos, porros, rumbas criollas y boleros. Entre las más conocidas están "Vivan los novios", "Adiós Guayabo", "Cariñito", "Atardeceres", "Amorcito Lindo", "La Reina de la Alegría", "Trago a los Músicos" y "Pin Pan Pun".(Guía Turística Fusagasugá 2017)', '2_Escena'),
	(6, 'Monumento Jorge Eliecer Gaitán', 'monumento-jorge-eliecer-gaitan', '1593628315Monumento_Jorge_Eliecer_Gaitan-01 - copia.jpeg', '“Yo no soy un hombre, soy un pueblo y el pueblo es mayor que sus dirigentes”.(Jorge Eliecer Gaitán)', '<p class="MsoNormal"><span lang="ES-CO">Construido por estudiantes de la escuela <b>General\r\nSantander</b> como homenaje al popular <b>político Jorge Eliecer Gaitán</b> asesinado\r\nel 4 de abril de 1948, este <b>monumento</b> fue instaurado el 9 de Abril del 2009\r\nen el barrio Gaitán con Cra 11 Cl. 2, cuenta con unas medidas aproximadas de <b>2</b>\r\nmetros de alto y <b>1 </b>metro de ancho.<o:p></o:p></span></p>', '2020-07-06 00:00:00', 2, '2020-07-01 18:20:24', '2020-07-01 18:31:55', 4, '1593628315Monumento_Jorge_Eliecer_Gaitan-01.jpeg', '1593628315Monumento_Jorge_Eliecer_Gaitan-02.jpeg', NULL, NULL, NULL, NULL, '#FFC312', 'Alumnos de la Escuela General Santander.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.3418742784356!2d-74.36529446321579!3d4.346792776499134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04fa31d82ee9%3A0xe9358a6d7c116bea!2sCra.%2011%20%26%20Cl.%202%2C%20Fusagasug%C3%A1%2C%20Porta%20Bello%2C%20Fusagasug%C3%A1%2C%20Cundinamarca!5e0!3m2!1ses!2sco!4v1592668140066!5m2!1ses!2sco', 'Jorge Eliécer Gaitán Ayala fue un jurista, escritor, activista, orador y político nacionalista colombiano. Fue rector de la Universidad Libre de Colombia entre 1936 y 1939, de la cual, fue catedrático de Derecho Penal desde 1931 hasta su muerte. Fue alcalde de Bogotá en el año 1936, titular en dos ministerios (Educación en 1940 y Trabajo en 1944) y congresista durante varios períodos entre 1929 y 1948. También fue candidato presidencial disidente del Partido Liberal en las elecciones de 1946 y su posterior jefe único, además que iba a ser el candidato oficial del partido para las presidenciales de 1950. Gaitán se forjó una reputación como orador y defensor de causas populares, que consolidó gracias a sus intervenciones en el debate sobre la Masacre de las Bananeras de 1928. Su asesinato produjo enormes protestas populares inicialmente en Bogotá y luego a nivel nacional conocidas como el "Bogotazo", y el inicio de un periodo sangriento en la historia del país conocido como \'La Violencia\'.', '2_Escena'),
	(7, 'Monumento Manuel Humberto Cárdenas Vélez', 'monumento-manuel-humberto-cardenas-velez', '1593628484Monumento_Manuel_Cardenas.jpg', 'Fusagasugá para todos: A ustedes mis agradecimientos por haberme aguantado tanto tiempo en la Alcaldía y quiero manifestarles que sin ustedes no habría sido posible llevar a cabo el plan de gobierno.(Manuel Humberto Cárdenas Vélez)', '<p class="MsoNormal"><span lang="ES-CO">Gracias por compartir conmigo dos años y\r\nmedio de gobierno y ojalá que el futuro les depare mucha suerte y mejores cosas\r\nen los gobiernos municipales... que Dios los bendiga , finalizó su último\r\ndiscurso.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal"><span lang="ES-CO">Elaborado como un <b>homenaje</b> en\r\nDiciembre del 2008, al asesinado ex alcalde fusagasugueño <b>Manuel Humberto\r\nCárdenas Vélez</b>, este monumento ubicado en <b>Cl 17 #11a-35</b>&nbsp; con medidas de <b>1.40</b> metros de alto y <b>75</b>\r\ncm de ancho, hace honor a una de las personas mas <b>representativas</b> que\r\ntuvo la ciudad, el cual fue un ferviente defensor de la <b>justicia</b> y la <b>seguridad</b>\r\nciudadana.&nbsp;<o:p></o:p></span></p>', '2020-07-07 00:00:00', 2, '2020-07-01 18:32:11', '2020-07-01 18:34:44', 4.5, '1593628484Monumento_Manuel_Cardenas.jpg', '1593628484Monumento_Manuel_Humberto_Cardenas_Velez.jpg', NULL, NULL, NULL, NULL, '#fed330', 'Desconocido.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d994.5994339214127!2d-74.36653497085194!3d4.336195837069236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f36a5d53e9%3A0xa38543aa13f0185c!2sCl.%2017%20%2311a-35%2011a%2C%20Fusagasug%C3%A1%2C%20Cundinamarca!5e0!3m2!1ses!2sco!4v1592670142338!5m2!1ses!2sco', 'Manuel Humberto Cárdenas, nació el 30 de Junio de 1963 tenía una gran afición por los caballos de paso, hizo la primaria y bachillerato en el Colegio Ricaurte, derecho en la Universidad Santo Tomás y un posgrado de ciencias políticas en la Universidad Javeriana. Entre los cargos desempeñados en Fusagasugá, su pueblo natal, había sido personero, contralor y secretario de gobierno. Fue condecorado en dos ocasiones por el Ejército y la Policía, como reconocimiento a su labor frente a los problemas de orden público en la ciudad.(El tiempo, 1994)', '2_Escena'),
	(8, 'Mural Floral', 'mural-floral', '1593628990Mural_Flores - copia.jpg', 'El mural floral es una representación artística que enaltece los atributos florales que contiene la ciudad de Fusagasugá se encuentra ubicado en la Cl 6 #624 junto a la alcaldía municipal.', '<p class="MsoNormal"><span lang="ES-CO">El mural floral es una representación artística\r\nque enaltece los atributos <b>florales</b> que contiene la ciudad de Fusagasugá\r\nse encuentra ubicado en la <b>Cl 6 #624</b> junto a la alcaldía municipal, fue\r\nelaborado por el artista <b>GLEO</b> en el año de <b>2019</b>.<o:p></o:p></span></p>', '2020-07-01 00:00:00', 3, '2020-07-01 18:38:31', '2020-07-01 18:43:10', 4.1, '1593628990Mural_Flores.jpg', '1593628990Mural_Flores_3.jpeg', '1593628990Mural_Flores_2.jpeg', NULL, NULL, NULL, '#EA2027', 'GLEO', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.355610226273!2d-74.36227075718246!3d4.344189451745282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f7785b3b25%3A0x69fd7f2d78923379!2sAlcald%C3%ADa%20Municipal%20De%20Fusagasug%C3%A1!5e0!3m2!1ses!2sco!4v1592669014213!5m2!1ses!2sco', NULL, '1_Escena'),
	(9, 'Mural Energía', 'mural-energia', '1593629262Mural_Energia - copia.jpeg', 'Ubicado en la Cl6 #624 junto a la alcaldía municipal el mural energía es una representación de la cultura juvenil y vivaz que identifica a su población.', '<p class="MsoNormal"><span lang="ES-CO">Ubicado en la <b>Cl6 #624 </b>junto a la alcaldía\r\nmunicipal el mural energía es una representación de la cultura juvenil y vivaz\r\nque identifica a su población, fue diseñado por <b>TONRA</b> en el <b>2020</b>.<o:p></o:p></span></p>', '2020-07-02 00:00:00', 3, '2020-07-01 18:46:16', '2020-07-01 18:47:42', 4.3, '1593629262Mural_Energia.jpeg', '1593629262Mural_Energia_2.jpg', '1593629262Mural_Energia_3.jpg', NULL, NULL, NULL, '#00a8ff', 'TONRA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.355610226273!2d-74.36227075718246!3d4.344189451745282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f7785b3b25%3A0x69fd7f2d78923379!2sAlcald%C3%ADa%20Municipal%20De%20Fusagasug%C3%A1!5e0!3m2!1ses!2sco!4v1592669014213!5m2!1ses!2sco', NULL, '1_Escena'),
	(10, 'Mural Paramo', 'mural-paramo', '1593629370PANO_20200625_081702-02.jpg', 'Una expresión artística para enaltecer la fauna y flora que habita en el páramo de Sumapaz.', '<p class="MsoNormal"><span lang="ES-CO">Una expresión artística para enaltecer la <b>fauna</b>\r\ny <b>flora</b> que habita en el páramo de <b>Sumapaz</b>, este mural se\r\nencuentra ubicado en la Cra. <b>6 #11-70</b> y busca poder enviar un mensaje al\r\ntranseúnte que lo ve, sobre la protección y preservación de estas zonas <b>naturales</b>\r\ndonde habitan estos <b>animales</b> en vía de extinción.<o:p></o:p></span></p>', '2020-07-03 00:00:00', 3, '2020-07-01 18:48:00', '2020-07-01 18:49:30', 4.5, '1593629370PANO_20200625_081702-01.jpg', '1593629370PANO_20200625_081702-03.jpg', '1593629370PANO_20200625_081702-05.jpg', NULL, NULL, NULL, '#130f40', 'Desconocido.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.378566266907!2d-74.3636128229606!3d4.339835196861164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f67cfa114b%3A0x6b5ade755a41d272!2sCra.%206%20%2311-70%2C%20Fusagasug%C3%A1%2C%20Cundinamarca!5e0!3m2!1ses!2sco!4v1592670806261!5m2!1ses!2sco', NULL, '1_Escena'),
	(11, 'Mural Belleza', 'mural-belleza', '1593629512PANO_20200625_082322-02.jpg', 'Mural representativo que busca honrar  la belleza de la mujer fusagasugueña.', '<p class="MsoNormal"><span lang="ES-CO">Mural representativo que busca honrar &nbsp;la <b>belleza</b> de la mujer fusagasugueña, fue\r\ndiseñado por la artista <b>GLAEN</b> en el <b>2019</b> y se encuentra ubicado\r\nen <b>la Cl. 11 #560</b>.<o:p></o:p></span></p>', '2020-07-04 00:00:00', 3, '2020-07-01 18:50:35', '2020-07-01 18:51:52', 4.2, '1593629512PANO_20200625_082322-01.jpg', '1593629512PANO_20200625_082322-03.jpg', '1593629512PANO_20200625_082322-04.jpg', NULL, NULL, NULL, '#f6e58d', 'GLEAN', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.378048015218!2d-74.36492348570663!3d4.33993354588963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f69ea9a13b%3A0xd5abf76620426ee7!2sAutopartes%20la%20Kia!5e0!3m2!1ses!2sco!4v1593616637668!5m2!1ses!2sco', NULL, '1_Escena'),
	(12, 'Mural Multicolor', 'mural-multicolor', '1593629611PANO_20200625_082451-02.jpg', 'Trasmitir un mundo diverso y nuevo, donde posiblemente su autor SUKU quiso exponer algunos de sus pensamientos contemporáneos.', '<p class="MsoNormal"><span lang="ES-CO">Ubicado en la <b>Cl. 11 #560</b> este mural\r\nlleno de colores vivos y atractivos, intenta trasmitir un mundo <b>diverso</b>\r\ny nuevo, donde posiblemente su autor <b>SUKU</b> quiso exponer algunos de sus\r\npensamientos contemporáneos.<o:p></o:p></span></p>', '2020-07-05 00:00:00', 3, '2020-07-01 18:52:04', '2020-07-01 18:53:31', 4, '1593629611PANO_20200625_082451-01.jpg', '1593629611PANO_20200625_082451-05.jpg', '1593629611PANO_20200625_082451-03.jpg', NULL, NULL, NULL, '#ff7979', 'SUKU', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.378048015218!2d-74.36492348570663!3d4.33993354588963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f69ea9a13b%3A0xd5abf76620426ee7!2sAutopartes%20la%20Kia!5e0!3m2!1ses!2sco!4v1593616637668!5m2!1ses!2sco', NULL, '1_Escena'),
	(13, 'Mural Cool', 'mural-cool', '1593629693PANO_20200625_082125-02.jpg', 'Inspirado en el arte urbano y en la cultura callejera el artista AVLN nos presenta su obra artística.', '<p class="MsoNormal"><span lang="ES-CO">Inspirado en el <b>arte urbano</b> y en la\r\ncultura callejera el artista <b>AVLN</b> nos presenta su obra artística en la <b>Cl.\r\n11 #560</b>, un mural llamativo donde la mezcla de colores <b>juegan</b> un\r\npapel importante.<o:p></o:p></span></p>', '2020-07-06 00:00:00', 3, '2020-07-01 18:53:46', '2020-07-01 18:54:53', 4.6, '1593629693PANO_20200625_082125-01.jpg', '1593629693PANO_20200625_082125-01-01.jpg', '1593629693PANO_20200625_082125-01-02.jpg', NULL, NULL, NULL, '#ED4C67', 'AVLN', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.378048015218!2d-74.36492348570663!3d4.33993354588963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f69ea9a13b%3A0xd5abf76620426ee7!2sAutopartes%20la%20Kia!5e0!3m2!1ses!2sco!4v1593616637668!5m2!1ses!2sco', NULL, '1_Escena'),
	(14, 'Mural Noche', 'mural-noche', '1593629839PANO_20200625_082902-01-01.jpg', 'Ubicado en la Cl. 9 #11 junto al tradicional Puente del Águila, esta obra de arte transmite la belleza de la mujer fusagasugueña.', '<p class="MsoNormal"><span lang="ES-CO">Mural ubicado en la <b>Cl. 9 #11</b> junto\r\nal tradicional Puente de el Águila, esta obra de arte <b>transmite</b> la <b>belleza</b>\r\nde la mujer fusagasugueña, la cual no necesita del día para <b>deslumbrar</b>.<o:p></o:p></span></p>', '2020-07-07 00:00:00', 3, '2020-07-01 18:56:01', '2020-07-01 18:57:19', 4.2, '1593629839PANO_20200625_082902-01.jpg', '1593629839PANO_20200625_082902-01-03.jpg', '1593629839PANO_20200625_082902-01-02.jpg', NULL, NULL, NULL, '#130f40', 'Desconocido.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.378048015218!2d-74.36492348570663!3d4.33993354588963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f41ae4eb35%3A0x68a0d19e16acdd7d!2sPuente%20el%20%C3%81guila!5e0!3m2!1ses!2sco!4v1593616726064!5m2!1ses!2sco', NULL, '1_Escena'),
	(15, 'Mural Sueña', 'mural-suena', '1593629929PANO_20200625_082807-01-01.jpg', 'Este mural presenta un mundo divergente, realmente sacada de un cuento de hadas.', '<p class="MsoNormal"><span lang="ES-CO">Elaborado en una <b>colaboración</b> por\r\nparte de los artistas <b>SUKU</b> y <b>SANTANA</b>, este mural presenta un\r\nmundo <b>divergente</b>, realmente sacada de un cuento de hadas, ubicado en la <b>Cl.\r\n9 #11</b>.<o:p></o:p></span></p>', '2020-07-08 00:00:00', 3, '2020-07-01 18:57:32', '2020-07-01 18:58:49', 4.2, '1593629929PANO_20200625_082807-01.jpg', '1593629929PANO_20200625_082807-01-02.jpg', '1593629929PANO_20200625_082807-01-03.jpg', NULL, NULL, NULL, '#ffc048', 'SUKU & SANTANA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.378048015218!2d-74.36492348570663!3d4.33993354588963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f41ae4eb35%3A0x68a0d19e16acdd7d!2sPuente%20el%20%C3%81guila!5e0!3m2!1ses!2sco!4v1593616726064!5m2!1ses!2sco', NULL, '1_Escena'),
	(16, 'Mural Raíces', 'mural-raices', '1593630048Mural_Raices - copia.jpg', 'Inspirado en la tradición de los ancestros Sutagaos, los cuales fueron los primeros habitantes de la ciudad de Fusagasugá.', '<p class="MsoNormal"><span lang="ES-CO">Inspirado en la tradición de los ancestros <b>Sutagaos</b>,\r\nlos cuales fueron los primeros habitantes de la ciudad de Fusagasugá, el mural raíces\r\nplasma a la mujer <b>combativa</b> acompañada de colores y formas geométricas ancestrales\r\npopulares de la cultura <b>muisca</b>, esta expresión de arte fue elaborada en\r\nel <b>2019</b> por <b>SALLALLL</b> y se encuentra ubicada en la <b>Cra 6#11-70</b>.&nbsp;<o:p></o:p></span></p>', '2020-07-09 00:00:00', 3, '2020-07-01 18:59:07', '2020-07-01 19:00:48', 3.8, '1593630048Mural_Raices.jpeg', '1593630048Mural_Raices_2.jpeg', '1593630048Mural_Raices_3.jpeg', NULL, NULL, NULL, '#22a6b3', 'SALLALLL', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.378566266907!2d-74.3636128229606!3d4.339835196861164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f67cfa114b%3A0x6b5ade755a41d272!2sCra.%206%20%2311-70%2C%20Fusagasug%C3%A1%2C%20Cundinamarca!5e0!3m2!1ses!2sco!4v1592670806261!5m2!1ses!2sco', NULL, '1_Escena'),
	(17, 'Mural Salvaje', 'mural-salvaje', '1593630239Mural_Salvaje.jpg', 'Como muestra de la riqueza natural que enorgullece a la región andina, este mural representa la fauna y flora que cubre gran parte de la región del Sumapaz.', '<p class="MsoNormal"><span lang="ES-CO">Como muestra de la <b>riqueza</b> natural\r\nque enorgullece a la región <b>andina</b>, este mural representa la <b>fauna</b>\r\ny <b>flora</b> que cubre gran parte de la región del <b>Sumapaz</b>, se\r\nencuentra ubicado en la <b>Cra. 6#11-70</b> y fue realizado por <b>MACONDIAN</b>\r\nen el <b>2019</b>.<o:p></o:p></span></p>', '2020-07-09 00:00:00', 3, '2020-07-01 19:02:04', '2020-07-01 19:03:59', 4.4, '1593630239Mural_Salvaje.jpeg', '1593630239Mural_Salvaje_2.jpeg', '1593630239Mural_Salvaje_3.jpeg', NULL, NULL, NULL, '#009432', 'MACONDIAN.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.378566266907!2d-74.3636128229606!3d4.339835196861164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f67cfa114b%3A0x6b5ade755a41d272!2sCra.%206%20%2311-70%2C%20Fusagasug%C3%A1%2C%20Cundinamarca!5e0!3m2!1ses!2sco!4v1592670806261!5m2!1ses!2sco', NULL, '1_Escena'),
	(18, 'Parque Natural San Rafael', 'parque-natural-san-rafael', '1593630670MVIMG_20200611_120801.jpg', 'El parque natural San Rafael establecido como reserva ecológica el 28 de mayo del 2004 por acuerdo municipal, se encuentra ubicada entre el corregimiento de la Aguadita y la vereda San Rafael, cuenta con atractivos naturales como su riqueza hídrica, paisajística y floral.', '<p class="MsoNormal"><span lang="ES-CO">El parque natural San Rafael establecido como\r\nreserva ecológica el <b>28</b> de mayo del <b>2004</b> por acuerdo municipal, se\r\nencuentra ubicada entre el corregimiento de la <b>Aguadita</b> y la vereda <b>San\r\nRafael</b>, cuenta con atractivos <b>naturales</b> como su riqueza hídrica, paisajística\r\ny floral, siendo una de las principales <b>reservas</b> de agua del Sumapaz y\r\nde recarga para humedales, además de poder contar con un bosque montañoso húmedo\r\ny de niebla.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal"><span lang="ES-CO">El recorrido por el sendero natural tiene\r\nuna distancia de <b>4.5</b> kilómetros, donde comprende alturas entre los <b>2100</b>\r\nmsnm y <b>3050</b> msnm, la duración aproximada ida y vuelta por el sendero es\r\nde al menos unas <b>4</b> horas, donde se pueden observar diferentes <b>atractivos</b>\r\npropios del parque como: la palma boba, la aula ambiental, el paso entre rocas,\r\nel puente colonia, el torrente del rio Blanco y la cascada de los deseos.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal"><span lang="ES-CO">Algunas <b>actividades</b> que se pueden practicar\r\nen esta reserva son: fotografía, caminata, senderismo, escalada, avistamiento\r\nde aves y exploración de fauna, cabe recalcar que algunas de estas actividades\r\nsolo pueden ser llevadas a cabo por <b>guías</b> turísticos autorizados por la\r\nciudad de Fusagasugá, además de contar con el equipo deportivo <b>pertinente</b>.<o:p></o:p></span></p>', '2020-07-10 00:00:00', 1, '2020-07-01 19:04:20', '2020-07-01 19:11:10', 5, '15936306701.jpg', '15936306702.jpg', '15936306703.jpg', '15936306704.jpg', '15936306705.jpg', '15936306706.jpg', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.1211026991296!2d-74.32681323570662!3d4.38842334550917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f05f9c20b56fb%3A0x6ebbef484177422d!2sParque%20San%20Rafael!5e0!3m2!1ses!2sco!4v1592670872596!5m2!1ses!2sco', NULL, '4_Escena'),
	(19, 'Sendero ecológico al Cerro Fusacatan', 'sendero-ecologico-al-cerro-fusacatan', '1593630960IMG_20200618_073715.jpg', 'El cerro Fusacatan cuenta con diversas estructuras montañosas y de vegetación de gran importancia para el municipio, por el cual circulan 5 quebradas y afluyentes hídricos que lo convierten en un recurso vital para la preservación de fauna y flora en la región.', '<p class="MsoNormal"><span lang="ES-CO">El cerro Fusacatan cuenta con diversas <b>estructuras</b>\r\nmontañosas y de vegetación de gran importancia para el municipio, por el cual\r\ncirculan <b>5</b> quebradas y afluyentes hídricos que lo convierten en un recurso\r\n<b>vital</b> para la preservación de <b>fauna</b> y <b>flora</b> en la región, en\r\nel podremos encontrar áreas de bosques húmedos.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal"><span lang="ES-CO">Algunas <b>actividades</b> que se pueden realizar\r\nson: fotografía, caminata, exploración de flora y fauna entre otras, cabe\r\ndestacar que el transito por este sendero debe ser <b>orientado</b> por los guías\r\nlocales u <b>operadores</b> turísticos autorizados por la Oficina de Turismo de\r\nFusagasugá y la Junta de Acción comunal.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal"><span lang="ES-CO">El sendero ecológico que conduce al cerro Fusacatan\r\nse <b>encuentra</b> ubicado en <b>el km 61 Boquerón con Av. Flores</b> en Fusagasugá\r\na la entrada de la finca tradicional “La María”, cuenta con una distancia de <b>2.3</b>\r\nkm y una altura de <b>2600</b> msnm, la duración del recorrido puede durar\r\naproximadamente <b>2</b> horas.<o:p></o:p></span></p>', '2020-07-07 00:00:00', 1, '2020-07-01 19:13:17', '2020-07-01 19:16:00', 3.5, '15936309601.jpg', '15936309602.jpg', '15936309603.jpg', '15936309604.jpg', NULL, NULL, NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.655259594268!2d-74.45446648570656!3d4.287005346300539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f1d48dc170749%3A0xe8098919975d381a!2sFinca%20la%20maria!5e0!3m2!1ses!2sco!4v1592671306181!5m2!1ses!2sco', NULL, '3_Escena');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.post_tag
CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.post_tag: ~39 rows (approximately)
DELETE FROM `post_tag`;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, NULL, NULL),
	(2, 1, 4, NULL, NULL),
	(3, 1, 9, NULL, NULL),
	(4, 2, 9, NULL, NULL),
	(5, 3, 3, NULL, NULL),
	(6, 3, 4, NULL, NULL),
	(7, 3, 9, NULL, NULL),
	(8, 4, 9, NULL, NULL),
	(9, 5, 9, NULL, NULL),
	(10, 6, 9, NULL, NULL),
	(11, 7, 9, NULL, NULL),
	(12, 8, 1, NULL, NULL),
	(13, 8, 9, NULL, NULL),
	(14, 9, 1, NULL, NULL),
	(15, 9, 9, NULL, NULL),
	(16, 10, 1, NULL, NULL),
	(17, 10, 9, NULL, NULL),
	(18, 11, 1, NULL, NULL),
	(19, 11, 9, NULL, NULL),
	(20, 12, 1, NULL, NULL),
	(21, 12, 9, NULL, NULL),
	(22, 13, 1, NULL, NULL),
	(23, 13, 9, NULL, NULL),
	(24, 14, 1, NULL, NULL),
	(25, 14, 9, NULL, NULL),
	(26, 15, 1, NULL, NULL),
	(27, 15, 9, NULL, NULL),
	(28, 16, 1, NULL, NULL),
	(29, 16, 9, NULL, NULL),
	(30, 17, 1, NULL, NULL),
	(31, 17, 9, NULL, NULL),
	(32, 18, 2, NULL, NULL),
	(33, 18, 3, NULL, NULL),
	(34, 18, 5, NULL, NULL),
	(35, 18, 6, NULL, NULL),
	(36, 18, 7, NULL, NULL),
	(37, 18, 8, NULL, NULL),
	(38, 18, 9, NULL, NULL),
	(39, 18, 10, NULL, NULL),
	(40, 19, 2, NULL, NULL),
	(41, 19, 3, NULL, NULL),
	(42, 19, 7, NULL, NULL),
	(43, 19, 8, NULL, NULL),
	(44, 19, 9, NULL, NULL);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.roles: ~2 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2020-04-19 14:41:29', '2020-04-19 14:41:29'),
	(2, 'User', 'web', '2020-04-19 14:41:29', '2020-04-19 14:41:29');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.role_has_permissions: ~0 rows (approximately)
DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `urlimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.tags: ~10 rows (approximately)
DELETE FROM `tags`;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `urlimg`) VALUES
	(1, 'Arte', '2020-05-02 19:47:50', '2020-06-20 22:32:19', '1592692339Icon_Arte.jpg'),
	(2, 'Avistamiento de Aves', '2020-05-02 19:47:50', '2020-06-20 22:32:48', '1592692368Icon_Avistamiento.jpg'),
	(3, 'Caminata', '2020-05-02 19:47:50', '2020-06-20 22:33:08', '1592692388Icon_Caminar.jpg'),
	(4, 'Ciclopaseo', '2020-05-02 19:47:50', '2020-06-20 22:33:28', '1592692408Icon_CicloPaseo.jpg'),
	(5, 'Educación Ambiental', '2020-06-20 22:33:44', '2020-06-20 22:33:55', '1592692435Icon_Educacion.jpg'),
	(6, 'Escalada', '2020-06-20 22:34:06', '2020-06-20 22:34:16', '1592692456Icon_Escalada.jpg'),
	(7, 'Fauna', '2020-06-20 22:34:27', '2020-06-20 22:34:35', '1592692475Icon_Fauna.jpg'),
	(8, 'Flora', '2020-06-20 22:34:44', '2020-06-20 22:34:55', '1592692495Icon_Flora.jpg'),
	(9, 'Fotografia', '2020-06-20 22:35:07', '2020-06-20 22:35:16', '1592692516Icon_Fotografia.jpg'),
	(10, 'Senderismo', '2020-06-20 22:35:25', '2020-06-20 22:35:33', '1592692533Icon_Senderismo.jpg');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Dumping structure for table fusaviajes.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fusaviajes.users: ~9 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `description`, `avatar`, `provider`, `provider_id`) VALUES
	(1, 'Osman Jimenez', 'osman9812@hotmail.com', NULL, '$2y$10$Ysjf4qki..utVZp4rtaDfOEYYX/nRT4oTCwKhb9WyZs0BLq5ly5Y6', NULL, '2020-05-02 19:47:50', '2020-05-31 20:18:23', NULL, 'user.png', NULL, NULL),
	(2, 'Armando Osman', 'armando9812@gmail.com', NULL, '$2y$10$MGtqk0gS1BlKs9u0OpCavOlURuJxGt6SH/eCElG7x7ER54YWvZUv2', NULL, '2020-05-03 14:23:24', '2020-05-31 20:32:33', NULL, 'user.png', NULL, NULL),
	(3, 'Osman Armando', 'osman98125@gmail.com', NULL, '$2y$10$oteGAIKS0aIGNJtVoOTm4O3JQXj130wRMQmsJAnR4tO20FhN.xWwq', 'onvCgWUVEEWreYABQR30KN0kuiNBEwXhMV2dlIFSqByFnszIep9M2Dy15SyU', '2020-05-12 13:25:25', '2020-06-26 14:31:33', 'Esta es una prueba', '1593181893floor.jpg', NULL, NULL),
	(4, 'prueba98', 'prueba9812@gmail.com', NULL, '$2y$10$szt0SB3DgCBdeFDSOFo.aeKdp8OoZ5Dd8/JoWGcgwi5yJZddsDtw6', NULL, '2020-05-30 21:41:01', '2020-06-13 15:42:10', 'Ahora si', '1592062930mural_color_2-01_2x.jpg', NULL, NULL),
	(13, 'Samuel', 'samuel9812@gmail.com', NULL, '$2y$10$EtmH2IWkksZCFXFkEMgY1.bttyweGTN364MO.3wsiJ00anhy9yshq', NULL, '2020-06-02 16:39:57', '2020-06-02 17:05:12', NULL, 'user.png', NULL, NULL),
	(14, 'Armando Cortes Jimenez', 'armando98125@hotmail.com', NULL, '$2y$10$9EOQxRX0DIv1gAsjPURMiufJ202rP7eyITTekLpGSVT9ohGQxSiJ.', NULL, '2020-06-02 18:30:05', '2020-06-13 15:36:20', 'Esta es una prueba', 'user.png', NULL, NULL),
	(19, 'Jimenez', 'osman98adds125@gmail.com', NULL, '$2y$10$UXGqV6cCgbkW7cHmrCSPkOmgUG6K1ijPS7lA0/20LBd3zBvpeXSP.', NULL, '2020-06-15 19:48:46', '2020-06-15 19:48:46', NULL, 'user.png', NULL, NULL),
	(20, 'casa', 'casa9812@gmail.com', NULL, '$2y$10$TpRtvbqWvMKveJiWyMGdhuAptqGx.bS/sNPNAdGaodaeeijzQObI2', NULL, '2020-06-26 14:36:01', '2020-06-26 14:36:01', NULL, NULL, NULL, NULL),
	(21, 'Jimenez', 'osman98121321235@gmail.com', NULL, '$2y$10$t/eDVH2b260rmIBbofgi6OlRb1risxkL/qGIE6jMmkN2hksskXUvS', NULL, '2020-06-26 14:41:01', '2020-06-26 14:41:01', NULL, NULL, NULL, NULL),
	(22, 'Jimenez', 'osman98hk125@gmail.com', NULL, '$2y$10$99ypcLNOT.wfbDpPPT087erP/ceukdtI5uldfTLndFnSxtByxHnr6', NULL, '2020-06-26 14:43:19', '2020-06-26 14:43:19', NULL, NULL, NULL, NULL),
	(23, 'Jimenez', 'osman9812sadas5@gmail.com', NULL, '$2y$10$5mu0M.7B8vpi8.wYu7M6nuJkom9jDLmLoecF1YY1ZsfDgXLDBwaDi', NULL, '2020-06-26 14:45:59', '2020-06-26 14:45:59', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
