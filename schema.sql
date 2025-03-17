CREATE TABLE `auth_users` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `district_id` INT(11) NOT NULL,
    `email` VARCHAR(191) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `display_name` VARCHAR(255) NOT NULL,
    `full_name` VARCHAR(255) NOT NULL,
    `initials` VARCHAR(255) NOT NULL,
    `profile` ENUM('admin', 'teacher', 'parent', 'student', 'none') DEFAULT 'none',
    `last_login` DATETIME DEFAULT NULL,
    `failed_login` INT(11) UNSIGNED DEFAULT 0,
    `status` ENUM('active', 'inactive', 'pending', 'banned') DEFAULT 'active',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `auth_users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `auth_sessions` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED NOT NULL,
    `jti` VARCHAR(255) NOT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `user_agent` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `expires_at` TIMESTAMP NULL,
    FOREIGN KEY (`user_id`) REFERENCES `auth_users` (`id`) ON DELETE CASCADE,
    UNIQUE KEY `unique_jti` (`jti`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `auth_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_custom` tinyint(1) NOT NULL DEFAULT 0,
  `guard_name` varchar(255) NOT NULL DEFAULT 'web',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `base_role_id` int(11) unsigned DEFAULT NULL,
`status` ENUM('active', 'inactive') DEFAULT 'active',

  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4294967296 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
INSERT INTO `auth_roles` (`id`, `name`, `is_custom`, `guard_name`, `description`, `created_at`, `updated_at`) 
VALUES
    (5000000000, 'Admin', 0, 'web', 'System Administrator with full access.', NOW(), NOW()),
    (4000000000, 'Staff', 0, 'web', 'Staff member with specific access to certain modules.', NOW(), NOW()),
    (3000000000, 'Parent', 0, 'web', 'Role for parents with access to their children’s information.', NOW(), NOW()),
    (2000000000, 'Student', 0, 'web', 'Student role with access to their academic information.', NOW(), NOW()),
    (1000000000, 'None', 0, 'web', 'No specific role assigned.', NOW(), NOW());

CREATE TABLE `core_modules` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `core_districts` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `district_name` varchar(255) NOT NULL,
    `district_number` varchar(50) DEFAULT NULL,
    `current_school_year` varchar(20) DEFAULT NULL,
    `office_email` varchar(255) DEFAULT NULL,
    `office_phone` varchar(50) DEFAULT NULL,
    `office_fax` varchar(50) DEFAULT NULL,
    `physical_address_street` varchar(255) DEFAULT NULL,
    `physical_address_city` varchar(100) DEFAULT NULL,
    `physical_address_state` varchar(50) DEFAULT NULL,
    `physical_address_zip` varchar(20) DEFAULT NULL,
    `physical_address_county` varchar(100) DEFAULT NULL,
    `mailing_address_street` varchar(255) DEFAULT NULL,
    `mailing_address_city` varchar(100) DEFAULT NULL,
    `mailing_address_state` varchar(50) DEFAULT NULL,
    `mailing_address_zip` varchar(20) DEFAULT NULL,
    `mailing_address_county` varchar(100) DEFAULT NULL,
    `superintendent_title` varchar(20) DEFAULT NULL,
    `superintendent_last_name` varchar(100) DEFAULT NULL,
    `superintendent_first_name` varchar(100) DEFAULT NULL,
    `superintendent_middle_name` varchar(100) DEFAULT NULL,
    `superintendent_phone` varchar(50) DEFAULT NULL,
    `superintendent_email` varchar(255) DEFAULT NULL,
    `website_url` varchar(255) DEFAULT NULL,
    `district_logo` varchar(255) DEFAULT NULL,
    `type` enum('public', 'private', 'charter', 'other') DEFAULT 'public',
    `state_id` varchar(50) DEFAULT NULL,
    `federal_id` varchar(50) DEFAULT NULL,
    `accreditation_status` varchar(100) DEFAULT NULL,
    `notes` text DEFAULT NULL,
    `latitude` decimal(10, 8) DEFAULT NULL,
    `longitude` decimal(11, 8) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `core_schools` (
    `school_id` INT(11) UNSIGNED NOT NULL,
    `abbreviation` VARCHAR(20) NOT NULL,
    `active_crs_list` TEXT,
    `complete_address` TEXT,
    `alternate_school_number` INT(11),
    `bulletin_email` VARCHAR(255),
    `county_name` VARCHAR(79),
    `county_nbr` VARCHAR(79),
    `custom` TEXT,
    `dflt_next_school` INT(11) DEFAULT 0,
    `district_id` INT(11),
    `fee_exemption_status` INT(11),
    `high_grade` INT(11),
    `hist_high_grade` INT(11),
    `hist_low_grade` INT(11),
    `is_summer_school` INT(1),
    `low_grade` INT(11),
    `name` VARCHAR(60) NOT NULL,
    `school_address` VARCHAR(255),
    `school_city` VARCHAR(79),
    `school_fax` VARCHAR(31),
    `school_phone` VARCHAR(31),
    `school_state` VARCHAR(79),
    `school_zip` VARCHAR(79),
    `sort_order` INT(11),
    `sif_state_pr_id` VARCHAR(32),
    `state_exclude_from_reporting` BOOLEAN,
    `sys_email_from` VARCHAR(255),
    `tchr_log_entr_to` VARCHAR(255),
    INDEX idx_name (name),
    INDEX idx_abbreviation (abbreviation),
    INDEX idx_district_id (district_id),
    INDEX idx_school_phone (school_phone),
    PRIMARY KEY (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `auth_permissions` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `module_id` INT(11) UNSIGNED NOT NULL,
    `description` TEXT DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`module_id`) REFERENCES `core_modules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `auth_role_permissions` (
    `role_id` INT(11) UNSIGNED NOT NULL,
    `permission_id` INT(11) UNSIGNED NOT NULL,
    PRIMARY KEY (`role_id`, `permission_id`),
    FOREIGN KEY (`role_id`) REFERENCES `auth_roles` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `auth_user_roles` (
    `user_id` INT(11) UNSIGNED NOT NULL,
    `role_id` INT(11) UNSIGNED NOT NULL,
    PRIMARY KEY (`user_id`, `role_id`),
    FOREIGN KEY (`user_id`) REFERENCES `auth_users` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`role_id`) REFERENCES `auth_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
