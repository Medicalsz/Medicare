-- medicare.sql
-- Creates `partner` and `collaboration` tables (idempotent)

DROP TABLE IF EXISTS `collaboration`;
DROP TABLE IF EXISTS `partner`;

CREATE TABLE IF NOT EXISTS `partner` (
  `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` VARCHAR(40) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `registration_number` VARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `email` VARCHAR(150) DEFAULT NULL,
  `website` VARCHAR(255) DEFAULT NULL,
  `street` VARCHAR(255) DEFAULT NULL,
  `city` VARCHAR(100) DEFAULT NULL,
  `postal_code` VARCHAR(20) DEFAULT NULL,
  `country` VARCHAR(100) DEFAULT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  UNIQUE KEY `uniq_registration` (`registration_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `collaboration` (
  `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `partner_id` BIGINT NOT NULL,
  `organization_id` BIGINT DEFAULT NULL,
  `contract_start` DATE NOT NULL,
  `contract_end` DATE DEFAULT NULL,
  `status` VARCHAR(30) NOT NULL DEFAULT 'active',
  `terms` TEXT DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  INDEX `idx_partner` (`partner_id`),
  CONSTRAINT `fk_collab_partner` FOREIGN KEY (`partner_id`) REFERENCES `partner`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
