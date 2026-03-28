-- MedicareCollab import-safe wrapper
CREATE DATABASE IF NOT EXISTS `medicare` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `medicare`;
SET FOREIGN_KEY_CHECKS = 0;
SET UNIQUE_CHECKS = 0;

-- Full cleanup of existing tables in the same database (safe re-import).
SET @tables = NULL;
SELECT GROUP_CONCAT(CONCAT('`', table_name, '`') SEPARATOR ',')
INTO @tables
FROM information_schema.tables
WHERE table_schema = DATABASE();
SET @drop_sql = IF(@tables IS NULL, 'SELECT 1', CONCAT('DROP TABLE IF EXISTS ', @tables));
PREPARE stmt FROM @drop_sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2026 at 11:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicare`
--

-- --------------------------------------------------------

--
-- Table structure for table `cause`
--

DROP TABLE IF EXISTS `cause`;
CREATE TABLE `cause` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `objectif_montant` double DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cause`
--

INSERT INTO `cause` (`id`, `titre`, `description`, `objectif_montant`, `date_debut`, `date_fin`, `statut`) VALUES
(1, 'Aide aux patients cancÃ©reux', 'Soutenez les patients atteints de cancer en finanÃ§ant leurs traitements coÃ»teux et en amÃ©liorant leur confort de vie pendant la chimiothÃ©rapie.', 50000, '2026-02-20', NULL, 'active'),
(2, 'Ã‰quipement pour pÃ©diatrie', 'Nous collectons des fonds pour l\'achat de nouveaux incubateurs et de matÃ©riel mÃ©dical spÃ©cialisÃ© pour notre service de nÃ©onatalogie.', 25000, '2026-02-20', NULL, 'active'),
(3, 'Clinique mobile rurale', 'Aidez-nous Ã  financer une clinique mobile pour apporter des soins mÃ©dicaux de base aux populations vivant dans les zones rurales reculÃ©es.', 100000, '2026-02-20', NULL, 'active'),
(4, 'Lutte contre le SIDA', 'Financement des programmes de dÃ©pistage, de sensibilisation et d\'accÃ¨s aux traitements antirÃ©troviraux pour les personnes touchÃ©es par le VIH/SIDA.', 60000, '2026-02-20', NULL, 'active'),
(5, 'PrÃ©vention du cancer du sein', 'Campagnes de mammographie gratuite et sensibilisation Ã  l\'autodÃ©pistage pour rÃ©duire la mortalitÃ© liÃ©e au cancer du sein.', 45000, '2026-02-20', NULL, 'active'),
(6, 'Soutien Ã  la santÃ© mentale', 'Mise en place de lignes d\'Ã©coute et de centres de consultation psychologique gratuits pour les personnes en situation de dÃ©tresse mentale.', 35000, '2026-02-20', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `collaboration`
--

DROP TABLE IF EXISTS `collaboration`;
CREATE TABLE `collaboration` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `statut` varchar(255) NOT NULL,
  `partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collaboration`
--

INSERT INTO `collaboration` (`id`, `image_name`, `updated_at`, `titre`, `description`, `date_debut`, `date_fin`, `statut`, `partner_id`) VALUES
(1, NULL, NULL, 'Assumenda debitis omnis facere deleniti.', 'Voluptatum doloribus tempora odit vel ut. Ut harum consectetur sequi molestiae quia. Temporibus non aut enim. Veritatis vel corrupti consectetur ut expedita.', '2026-02-01', '2026-11-03', 'TERMINEE', 6),
(2, NULL, NULL, 'Ab impedit voluptatem aperiam.', 'Ea amet reiciendis quas qui ut facilis provident. Soluta voluptas ut unde. Iste et perferendis in in. Quo vel asperiores est aut deserunt alias nihil.', '2026-02-19', '2027-11-16', 'TERMINEE', 3),
(3, NULL, NULL, 'Est aut enim vel aperiam.', 'Et quis ducimus molestiae nam quia fugiat. Rerum accusamus quam dolor nostrum esse.', '2026-02-09', '2027-01-11', 'EN_COURS', 9),
(4, NULL, NULL, 'Eveniet et adipisci voluptas veniam.', 'Veniam veritatis sequi atque perferendis. Nihil ex nobis rerum veritatis. Consequatur quod cum ex. Est ea aspernatur dolor nesciunt dolores aut.', '2026-01-20', '2027-01-30', 'EN_ATTENTE', 8),
(5, NULL, NULL, 'Repellendus tenetur sed eligendi.', 'Occaecati reprehenderit natus et repudiandae. Quis quod veniam molestiae itaque et. Delectus est eum eos reprehenderit.', '2026-01-24', '2027-10-15', 'EN_ATTENTE', 5),
(6, NULL, NULL, 'Est illo recusandae sunt illo.', 'Quibusdam et qui temporibus est nemo. Reprehenderit ut sit commodi omnis cumque. Rerum consectetur non odit sed dicta assumenda amet. Ipsam fugiat odio ut iure sit.', '2026-02-02', '2026-06-07', 'ANNULEE', 6),
(7, NULL, NULL, 'Numquam fugiat cupiditate corporis sint.', 'Ipsum non praesentium esse. Optio vitae mollitia molestiae accusantium autem neque.', '2026-01-11', '2027-02-12', 'ANNULEE', 1),
(8, NULL, NULL, 'Sint voluptatem consequatur et.', 'Sed maiores ad architecto aut. Nulla quibusdam aut quasi. Est consectetur architecto accusantium culpa. At quaerat quo sed suscipit quia tempore.', '2026-01-18', '2026-06-28', 'ANNULEE', 4),
(9, NULL, NULL, 'Ea dolores optio accusamus est et.', 'Optio eos est impedit dolores aliquam temporibus et. Doloremque enim sed recusandae placeat odio odit. Sed quisquam est porro facilis.', '2026-01-29', '2026-06-16', 'ANNULEE', 2),
(10, 'pngtree-green-and-blue-background-to-banner-vector-hd-free-image-16323230-69981f7806f37631780949.jpg', '2026-02-20 08:46:48', 'Fugit voluptas voluptates.', 'Earum illo quia magni illum officiis enim corrupti. Est debitis voluptatem labore nesciunt magnam error at. Culpa nobis molestias repellendus ut. In qui ut suscipit dolores impedit exercitationem dolorem.', '2026-02-01', '2026-04-20', 'EN_COURS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `commande_number` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `notes` longtext DEFAULT NULL,
  `commande_date` datetime NOT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `stripe_payment_intent_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `commande_number`, `product_id`, `quantity`, `total_price`, `status`, `notes`, `commande_date`, `delivery_date`, `created_at`, `stripe_payment_intent_id`) VALUES
(8, 'DEMO-2025-09-001', 4, 4, 79.60, 'PAID', 'demo order', '2025-09-05 10:00:00', '2025-09-08 10:00:00', '2025-09-05 10:00:00', 'pi_demo_0901'),
(9, 'DEMO-2025-09-002', 7, 10, 120.00, 'PAID', 'clinic order', '2025-09-16 11:00:00', '2025-09-19 11:00:00', '2025-09-16 11:00:00', 'pi_demo_0902'),
(10, 'DEMO-2025-10-001', 8, 12, 117.60, 'PAID', NULL, '2025-10-03 09:00:00', '2025-10-06 09:00:00', '2025-10-03 09:00:00', 'pi_demo_1001'),
(11, 'DEMO-2025-10-002', 6, 3, 87.00, 'PAID', NULL, '2025-10-21 14:00:00', '2025-10-24 14:00:00', '2025-10-21 14:00:00', 'pi_demo_1002'),
(12, 'DEMO-2025-11-001', 5, 15, 217.50, 'PAID', 'pharmacy', '2025-11-02 10:00:00', '2025-11-05 10:00:00', '2025-11-02 10:00:00', 'pi_demo_1101'),
(13, 'DEMO-2025-11-002', 9, 8, 192.00, 'PAID', NULL, '2025-11-18 12:00:00', '2025-11-21 12:00:00', '2025-11-18 12:00:00', 'pi_demo_1102'),
(14, 'DEMO-2025-12-001', 7, 20, 240.00, 'PAID', 'seasonal rise', '2025-12-04 10:00:00', '2025-12-07 10:00:00', '2025-12-04 10:00:00', 'pi_demo_1201'),
(15, 'DEMO-2025-12-002', 4, 10, 199.00, 'PAID', NULL, '2025-12-22 15:00:00', '2025-12-25 15:00:00', '2025-12-22 15:00:00', 'pi_demo_1202'),
(16, 'DEMO-2026-01-001', 5, 18, 261.00, 'PAID', 'new year demand', '2026-01-06 10:00:00', '2026-01-09 10:00:00', '2026-01-06 10:00:00', 'pi_demo_0101'),
(17, 'DEMO-2026-01-002', 8, 20, 196.00, 'PAID', NULL, '2026-01-19 13:00:00', '2026-01-22 13:00:00', '2026-01-19 13:00:00', 'pi_demo_0102'),
(18, 'DEMO-2026-02-001', 6, 6, 174.00, 'PENDING', 'awaiting payment', '2026-02-08 09:00:00', NULL, '2026-02-08 09:00:00', NULL),
(19, 'DEMO-2026-02-002', 9, 10, 240.00, 'PAID', NULL, '2026-02-14 11:30:00', '2026-02-17 11:30:00', '2026-02-14 11:30:00', 'pi_demo_0202'),
(20, 'DEMO-2026-02-003', 7, 5, 60.00, 'CANCELLED', 'customer cancelled', '2026-02-20 16:00:00', NULL, '2026-02-20 16:00:00', NULL),
(21, 'CMD-69A14E915C580', 5, 1, 14.50, 'PENDING', NULL, '2026-02-27 07:58:09', NULL, '2026-02-27 07:58:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `date_consultation` datetime NOT NULL,
  `description` longtext NOT NULL,
  `ordonnance` longtext DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `medecin_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `rendez_vous_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demande_medecin`
--

DROP TABLE IF EXISTS `demande_medecin`;
CREATE TABLE `demande_medecin` (
  `id` int(11) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `cabinet` varchar(255) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `bio` longtext DEFAULT NULL,
  `certificats` varchar(500) DEFAULT NULL,
  `statut` varchar(255) NOT NULL,
  `date_demande` datetime NOT NULL,
  `date_traitement` datetime DEFAULT NULL,
  `raison_rejet` longtext DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disponibilite`
--

DROP TABLE IF EXISTS `disponibilite`;
CREATE TABLE `disponibilite` (
  `id` int(11) NOT NULL,
  `jour_semaine` varchar(255) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `medecin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20260220084408', '2026-02-20 08:44:22', 494),
('DoctrineMigrations\\Version20260226194223', '2026-02-26 19:42:33', 539),
('DoctrineMigrations\\Version20260226200157', '2026-02-26 20:02:07', 515),
('DoctrineMigrations\\Version20260306120000', '2026-03-06 09:56:44', 747);

-- --------------------------------------------------------

--
-- Table structure for table `don`
--

DROP TABLE IF EXISTS `don`;
CREATE TABLE `don` (
  `id` int(11) NOT NULL,
  `type_don` varchar(255) NOT NULL,
  `montant` double NOT NULL,
  `description` longtext NOT NULL,
  `date_don` datetime NOT NULL,
  `mode_paiement` varchar(255) NOT NULL,
  `statut_don` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `is_pickup_address_confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `cause_id` int(11) NOT NULL,
  `donateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donateur`
--

DROP TABLE IF EXISTS `donateur`;
CREATE TABLE `donateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment`
--

DROP TABLE IF EXISTS `forum_comment`;
CREATE TABLE `forum_comment` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `reported_by_id` int(11) DEFAULT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `is_reported` tinyint(1) NOT NULL,
  `is_hidden` tinyint(1) NOT NULL,
  `reported_reason` varchar(255) DEFAULT NULL,
  `reported_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment_reaction`
--

DROP TABLE IF EXISTS `forum_comment_reaction`;
CREATE TABLE `forum_comment_reaction` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

DROP TABLE IF EXISTS `forum_topic`;
CREATE TABLE `forum_topic` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `reported_by_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `type` varchar(16) NOT NULL DEFAULT 'text',
  `video_url` varchar(500) DEFAULT NULL,
  `summary` longtext DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tags`)),
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_reported` tinyint(1) NOT NULL,
  `is_hidden` tinyint(1) NOT NULL,
  `reported_reason` varchar(255) DEFAULT NULL,
  `reported_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`id`, `author_id`, `reported_by_id`, `title`, `content`, `type`, `video_url`, `summary`, `tags`, `created_at`, `updated_at`, `is_reported`, `is_hidden`, `reported_reason`, `reported_at`) VALUES
(1, 4, NULL, 'aaaa', 'aaaa', 'text', NULL, 'Resume: aaaa', '[\"aaaa\"]', '2026-03-06 10:04:54', '2026-03-06 10:04:54', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic_reaction`
--

DROP TABLE IF EXISTS `forum_topic_reaction`;
CREATE TABLE `forum_topic_reaction` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_cause`
--

DROP TABLE IF EXISTS `image_cause`;
CREATE TABLE `image_cause` (
  `id` int(11) NOT NULL,
  `url_image` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `cause_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_cause`
--

INSERT INTO `image_cause` (`id`, `url_image`, `updated_at`, `cause_id`) VALUES
(1, 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=800&q=80', NULL, 1),
(2, 'https://images.unsplash.com/photo-1581594632702-fbd8b494133a?auto=format&fit=crop&w=800&q=80', NULL, 2),
(3, 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=800&q=80', NULL, 3),
(4, 'https://images.unsplash.com/photo-1532187875605-7fe3584d0ee5?auto=format&fit=crop&w=800&q=80', NULL, 4),
(5, 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=800&q=80', NULL, 5),
(6, 'https://images.unsplash.com/photo-1527137342181-19aab11a8ee1?auto=format&fit=crop&w=800&q=80', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE `medecin` (
  `id` int(11) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `cabinet` varchar(255) NOT NULL,
  `bio` longtext DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":5:{i:0;s:41:\\\"registration/confirmation_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:160:\\\"http://127.0.0.1:8000/verify/email?expires=1771806825&signature=HHWqr8_RvlPNunJCDfnRYSYhaxnY2aVXPNH9Pq44lZo&token=IrqO3rw2buZQtV4GdhWJF7eZr9Qb97yupbTUpfjQuqk%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:23:\\\"ayoubadjida80@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:16:\\\"Djida Adam Ayoub\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:13:\\\"user@user.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"Please Confirm your Email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}i:4;N;}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2026-02-22 23:33:46', '2026-02-22 23:33:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `message` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `author_name` varchar(160) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `recipient_id`, `type`, `message`, `link`, `author_name`, `created_at`, `is_read`) VALUES
(1, 1, 'NEW_TOPIC', 'Admin Rayen a publie un nouveau sujet', '/admin/forum/1', 'Admin Rayen', '2026-03-06 10:04:57', 0),
(2, 2, 'NEW_TOPIC', 'Admin Rayen a publie un nouveau sujet', '/admin/forum/1', 'Admin Rayen', '2026-03-06 10:04:57', 0),
(3, 3, 'NEW_TOPIC', 'Admin Rayen a publie un nouveau sujet', '/admin/forum/1', 'Admin Rayen', '2026-03-06 10:04:57', 0),
(4, 5, 'NEW_TOPIC', 'Admin Rayen a publie un nouveau sujet', '/admin/forum/1', 'Admin Rayen', '2026-03-06 10:04:57', 0),
(5, 6, 'NEW_TOPIC', 'Admin Rayen a publie un nouveau sujet', '/admin/forum/1', 'Admin Rayen', '2026-03-06 10:04:57', 0),
(6, 7, 'NEW_TOPIC', 'Admin Rayen a publie un nouveau sujet', '/dashboard/forum/1', 'Admin Rayen', '2026-03-06 10:04:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `objet_don`
--

DROP TABLE IF EXISTS `objet_don`;
CREATE TABLE `objet_don` (
  `id` int(11) NOT NULL,
  `nom_objet` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `don_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_partenariat` date NOT NULL,
  `type_partenaire` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `image_name`, `updated_at`, `name`, `adresse`, `telephone`, `email`, `date_partenariat`, `type_partenaire`, `statut`) VALUES
(1, NULL, NULL, 'Adam', '28, boulevard de Etienne\n86071 Renault', '0228452971', 'michele41@courtois.fr', '2022-08-19', 'ASSURANCE', 'SUSPENDU'),
(2, NULL, NULL, 'Leconte', '2, avenue Besson\n97112 Ruiz-sur-Payet', '0698028343', 'william77@dubois.com', '2024-07-23', 'CLINIQUE', 'ACTIF'),
(3, NULL, NULL, 'Picard', '92, boulevard Lombard\n27616 Letellier', '0550401671', 'nicole.leveque@duval.com', '2022-05-30', 'ASSURANCE', 'ACTIF'),
(4, NULL, NULL, 'Evrard Lambert SA', '35, avenue de Raynaud\n84330 Coste-la-ForÃªt', '07 60 82 53 37', 'mahe.helene@boutin.org', '2020-10-04', 'LABORATOIRE', 'RESILIE'),
(5, NULL, NULL, 'Parent et Fils', '86, place Antoine Masson\n76388 Delaunay-les-Bains', '+33 2 02 39 44 31', 'antoine70@lefort.org', '2022-04-10', 'PHARMACIE', 'ACTIF'),
(6, NULL, NULL, 'Laporte SAS', '102, avenue de Dubois\n33844 Besnardboeuf', '0341048059', 'francois08@benard.org', '2022-10-22', 'LABORATOIRE', 'RESILIE'),
(7, NULL, NULL, 'Lejeune Giraud SARL', 'avenue Lefebvre\n98323 Mace', '+33 (0)7 47 66 21 58', 'charlotte30@fabre.net', '2017-05-20', 'CLINIQUE', 'RESILIE'),
(8, NULL, NULL, 'Charles et Fils', '94, rue TimothÃ©e De Oliveira\n51548 DenisBourg', '0213648864', 'henri84@leduc.fr', '2018-12-08', 'CLINIQUE', 'RESILIE'),
(9, NULL, NULL, 'Noel Berthelot S.A.', '48, rue Moreno\n84520 Seguin', '+33 (0)5 35 04 68 31', 'kribeiro@leger.com', '2017-05-27', 'CLINIQUE', 'RESILIE'),
(10, NULL, NULL, 'Roche Pottier SAS', '188, impasse Alphonse Valette\n14604 JacquesVille', '0497297831', 'antoine99@leroy.org', '2020-07-21', 'PHARMACIE', 'RESILIE');

-- --------------------------------------------------------

--
-- Table structure for table `partner_rating`
--

DROP TABLE IF EXISTS `partner_rating`;
CREATE TABLE `partner_rating` (
  `id` int(11) NOT NULL,
  `rating` smallint(6) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `partner_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_rating`
--

INSERT INTO `partner_rating` (`id`, `rating`, `comment`, `created_at`, `partner_id`, `author_id`) VALUES
(1, 5, 'Good', '2026-02-26 19:43:00', 10, 4),
(2, 4, NULL, '2026-02-26 19:43:10', 10, 4),
(3, 2, NULL, '2026-02-26 19:43:15', 10, 4),
(4, 5, NULL, '2026-02-26 19:43:52', 10, 4),
(5, 2, NULL, '2026-02-26 19:47:06', 5, 4),
(6, 3, NULL, '2026-02-26 19:47:10', 5, 4),
(7, 5, NULL, '2026-02-26 19:47:14', 5, 4),
(8, 5, NULL, '2026-02-26 19:47:17', 5, 4),
(9, 5, NULL, '2026-02-26 21:14:38', 10, 4),
(10, 5, NULL, '2026-02-27 10:11:44', 10, 4),
(11, 5, NULL, '2026-02-27 10:11:56', 9, 4),
(12, 5, NULL, '2026-02-27 10:12:02', 9, 4),
(13, 5, NULL, '2026-02-27 10:12:21', 10, 4),
(14, 5, NULL, '2026-02-27 10:12:31', 10, 4),
(15, 3, 'good', '2026-03-06 08:44:51', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `groupe_sanguin` varchar(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `date_naissance`, `groupe_sanguin`, `user_id`) VALUES
(1, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `sku` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dosage` varchar(100) DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `sku`, `price`, `quantity`, `type`, `dosage`, `expiry_date`, `is_active`, `created_at`) VALUES
(4, 'Vitamin C 1000mg', 'Immune support vitamin', 'DEMO-VIT-C-1000', 19.90, 200, 'vitamin', '1000mg', '2027-12-31 00:00:00', 1, '2025-08-10 10:00:00'),
(5, 'Vitamin D3', 'Bone and immune support', 'DEMO-VIT-D3', 14.50, 180, 'vitamin', '2000 IU', '2027-11-30 00:00:00', 1, '2025-08-10 10:00:00'),
(6, 'Digital Thermometer', 'Fast digital thermometer', 'DEMO-THERMO-01', 29.00, 90, 'medical_device', NULL, '2029-12-31 00:00:00', 1, '2025-08-10 10:00:00'),
(7, 'Surgical Mask Box', '50 disposable masks', 'DEMO-MASK-50', 12.00, 500, 'medical_supply', NULL, '2028-12-31 00:00:00', 1, '2025-08-10 10:00:00'),
(8, 'Pain Relief 500mg', 'General pain relief', 'DEMO-PAIN-500', 9.80, 250, 'medication', '500mg', '2027-06-30 00:00:00', 1, '2025-08-10 10:00:00'),
(9, 'B12 Injectable', 'Vitamin B12 injectable ampoules', 'DEMO-B12-INJ', 24.00, 70, 'injectable', '1ml', '2027-10-31 00:00:00', 1, '2025-08-10 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `statut` varchar(255) NOT NULL,
  `medecin_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `is_verified` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `numero`, `roles`, `is_verified`) VALUES
(1, 'Ayoub', 'Admin', 'ayoub@admin.com', '$2y$13$0fNz49ubuLRoW81ahez4QeF602RRW.QRj1NoXssiFmfYlqpNcXfuW', '+216 12 345 678', '[\"ROLE_ADMIN\", \"ROLE_USER\"]', 1),
(2, 'Samer', 'Admin', 'samer@admin.com', '$2y$13$EgUMudcdbk3oZRTg1JFAquNFyIn4jMRAKmtNqJ41mPIXxEY8Py91e', '+216 12 345 679', '[\"ROLE_ADMIN\", \"ROLE_USER\"]', 1),
(3, 'Dhia', 'Admin', 'dhia@admin.com', '$2y$13$xbdMNhzgr/y5KenboakTrOK2HAosIAVR9j6ppaXFCDkikkxXDLuga', '+216 12 345 680', '[\"ROLE_ADMIN\", \"ROLE_USER\"]', 1),
(4, 'Rayen', 'Admin', 'rayen@admin.com', '$2y$13$CJkPRQ.lyTV0sOXyfuJNuuN9ysvbxTTEBY0GYIOJm.oyCD6rgP76G', '+216 12 345 681', '[\"ROLE_ADMIN\", \"ROLE_USER\"]', 1),
(5, 'Asser', 'Admin', 'asser@admin.com', '$2y$13$7AxEx.6aMZdxpKIUEJ6YA.NZhjbrCktT0Ii8Au7pPKAhIeKNMnbzG', '+216 12 345 682', '[\"ROLE_ADMIN\", \"ROLE_USER\"]', 1),
(6, 'Malek', 'Admin', 'malek@admin.com', '$2y$13$/3u96UJLSDU5EyBYz4eBy.rHvyMpn26Skm16O8fsCvM8RIcQazAAy', '+216 12 345 683', '[\"ROLE_ADMIN\", \"ROLE_USER\"]', 1),
(7, 'user', 'user', 'user@user.com', '$2y$13$4ETQo8ip5BiuZjWfgpAkxOX/Tk3ZAGC05UOuTPHw3dt7iFIVimRcu', '+216 17137217', '[\"ROLE_PATIENT\", \"ROLE_USER\"]', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cause`
--
ALTER TABLE `cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DA3AE3239393F8FE` (`partner_id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6EEAA67D94C4E481` (`commande_number`),
  ADD KEY `idx_commande_number` (`commande_number`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `IDX_6EEAA67D4584665A` (`product_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_964685A691EF7EAA` (`rendez_vous_id`),
  ADD KEY `IDX_964685A64F31A84` (`medecin_id`),
  ADD KEY `IDX_964685A66B899279` (`patient_id`);

--
-- Indexes for table `demande_medecin`
--
ALTER TABLE `demande_medecin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2B2DE869A76ED395` (`user_id`);

--
-- Indexes for table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2CBACE2F4F31A84` (`medecin_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F8F081D966E2221E` (`cause_id`),
  ADD KEY `IDX_F8F081D9A9C80E3` (`donateur_id`);

--
-- Indexes for table `donateur`
--
ALTER TABLE `donateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9CD3DE50A76ED395` (`user_id`);

--
-- Indexes for table `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1A0AFA1AF675F31B` (`author_id`),
  ADD KEY `IDX_1A0AFA1A1F55203D` (`topic_id`),
  ADD KEY `IDX_1A0AFA1A727ACA70` (`parent_id`),
  ADD KEY `IDX_1A0AFA1AE1CFE6F5` (`reported_by_id`);

--
-- Indexes for table `forum_comment_reaction`
--
ALTER TABLE `forum_comment_reaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_forum_comment_user_reaction` (`comment_id`,`user_id`),
  ADD KEY `IDX_7706AF08F8697D13` (`comment_id`),
  ADD KEY `IDX_7706AF08A76ED395` (`user_id`);

--
-- Indexes for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9BA4C28BF675F31B` (`author_id`),
  ADD KEY `IDX_9BA4C28BE1CFE6F5` (`reported_by_id`);

--
-- Indexes for table `forum_topic_reaction`
--
ALTER TABLE `forum_topic_reaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_forum_topic_user_reaction` (`topic_id`,`user_id`),
  ADD KEY `IDX_6408B6ED1F55203D` (`topic_id`),
  ADD KEY `IDX_6408B6EDA76ED395` (`user_id`);

--
-- Indexes for table `image_cause`
--
ALTER TABLE `image_cause`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E79FFB1666E2221E` (`cause_id`);

--
-- Indexes for table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1BDA53C6A76ED395` (`user_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BF5476CAA4C0A3C3` (`recipient_id`),
  ADD KEY `IDX_BF5476CA82C9F` (`is_read`);

--
-- Indexes for table `objet_don`
--
ALTER TABLE `objet_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_186F716F7B3C9061` (`don_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_rating`
--
ALTER TABLE `partner_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E5428F599393F8FE` (`partner_id`),
  ADD KEY `IDX_E5428F59F675F31B` (`author_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1ADAD7EBA76ED395` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D34A04ADF9038C4` (`sku`),
  ADD KEY `idx_sku` (`sku`),
  ADD KEY `idx_type` (`type`);

--
-- Indexes for table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_medecin_date_heure` (`medecin_id`,`date`,`heure`),
  ADD KEY `IDX_65E8AA0A4F31A84` (`medecin_id`),
  ADD KEY `IDX_65E8AA0A6B899279` (`patient_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cause`
--
ALTER TABLE `cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `collaboration`
--
ALTER TABLE `collaboration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demande_medecin`
--
ALTER TABLE `demande_medecin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `don`
--
ALTER TABLE `don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donateur`
--
ALTER TABLE `donateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_comment`
--
ALTER TABLE `forum_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_comment_reaction`
--
ALTER TABLE `forum_comment_reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum_topic_reaction`
--
ALTER TABLE `forum_topic_reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_cause`
--
ALTER TABLE `image_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `objet_don`
--
ALTER TABLE `objet_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `partner_rating`
--
ALTER TABLE `partner_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD CONSTRAINT `FK_1A0AFA1A1F55203D` FOREIGN KEY (`topic_id`) REFERENCES `forum_topic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1A0AFA1A727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `forum_comment` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_1A0AFA1AE1CFE6F5` FOREIGN KEY (`reported_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_1A0AFA1AF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `forum_comment_reaction`
--
ALTER TABLE `forum_comment_reaction`
  ADD CONSTRAINT `FK_7706AF08A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7706AF08F8697D13` FOREIGN KEY (`comment_id`) REFERENCES `forum_comment` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD CONSTRAINT `FK_9BA4C28BE1CFE6F5` FOREIGN KEY (`reported_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_9BA4C28BF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `forum_topic_reaction`
--
ALTER TABLE `forum_topic_reaction`
  ADD CONSTRAINT `FK_6408B6ED1F55203D` FOREIGN KEY (`topic_id`) REFERENCES `forum_topic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6408B6EDA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FK_BF5476CAA4C0A3C3` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET UNIQUE_CHECKS = 1;
SET FOREIGN_KEY_CHECKS = 1;

