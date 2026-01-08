-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2026 at 09:08 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snte56delegaciones`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitacora`
--

CREATE TABLE `bitacora` (
  `id` bigint UNSIGNED NOT NULL,
  `acciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo_id` bigint UNSIGNED NOT NULL,
  `antes` json DEFAULT NULL,
  `despues` json DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `es_principal` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `es_principal`, `created_at`, `updated_at`) VALUES
(1, 'SECRETARÍA GENERAL', 1, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(2, 'SECRETARÍA DE ORGANIZACIÓN', 0, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(3, 'SECRETARÍA DE TRABAJO Y CONFLICTOS', 0, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(4, 'SECRETARÍA DE FINANZAS', 0, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(5, 'SECRETARÍA DE PREVISIÓN Y ASISTENCIA SOCIAL', 0, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(6, 'SECRETARÍA DE ESCALAFÓN Y PROMOCIÓN', 0, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(7, 'SECRETARÍA DE ORIENTACIÓN IDEOLÓGICA SINDICAL', 0, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(8, 'SECRETARÍA DE CULTURA Y RECREACIÓN', 0, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(9, 'SECRETARÍA DE VINCULACIÓN SOCIAL Y PROGRAMAS PRODUCTIVOS', 0, '2025-12-16 03:45:49', '2025-12-16 03:45:49'),
(10, 'REPRESENTANTE SINDICAL DE CENTRO DE TRABAJO', 1, '2025-12-16 03:45:49', '2025-12-16 03:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `centros_trabajo`
--

CREATE TABLE `centros_trabajo` (
  `id` bigint UNSIGNED NOT NULL,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` enum('ACTIVO','INACTIVO','REESTRUCTURADO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `region_id` bigint UNSIGNED NOT NULL,
  `nivel_id` bigint UNSIGNED NOT NULL,
  `nomenclatura_id` bigint UNSIGNED NOT NULL,
  `sede` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delegaciones`
--

CREATE TABLE `delegaciones` (
  `id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `nivel_id` bigint UNSIGNED NOT NULL,
  `tipo` enum('ACTIVO','JUBILADO','CT') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` enum('ACTIVA','INACTIVA','REESTRUCTURADA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVA',
  `nomenclatura_id` bigint UNSIGNED NOT NULL,
  `sede` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delegaciones`
--

INSERT INTO `delegaciones` (`id`, `region_id`, `nivel_id`, `tipo`, `numero`, `clave`, `estatus`, `nomenclatura_id`, `sede`, `direccion`, `cp`, `ciudad`, `estado`, `fecha_inicio`, `fecha_fin`, `created_at`, `updated_at`) VALUES
(1, 5, 11, 'CT', '33', 'C.T.33', 'ACTIVA', 5, 'XALAPA', 'BLVD. CULTURAS VERACRUZANAS 752', '91010', 'XALAPA', 'VERACRUZ', '2024-02-22', '2028-02-22', '2026-01-09 02:40:02', '2026-01-09 02:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '0001_01_01_000000_create_users_table', 1),
(15, '0001_01_01_000001_create_cache_table', 1),
(16, '0001_01_01_000002_create_jobs_table', 1),
(17, '2025_12_09_193437_create_permission_tables', 1),
(18, '2025_12_12_172949_create_regiones_table', 1),
(19, '2025_12_12_173058_create_niveles_table', 1),
(20, '2025_12_12_183734_create_personas_table', 1),
(21, '2025_12_12_183736_create_nomenclaturas_table', 1),
(22, '2025_12_12_184732_add_persona_id_to_users_table', 1),
(23, '2025_12_12_191245_create_delegaciones_table', 1),
(24, '2025_12_12_191403_create_centros_trabajo_table', 1),
(25, '2025_12_12_191514_create_cargos_table', 1),
(26, '2025_12_15_161045_create_representantes_table', 1),
(27, '2025_12_15_161943_create_bitacora_table', 1),
(28, '2025_12_15_214051_add_es_principal_to_cargos_table', 2),
(29, '2025_12_15_220051_add_estatus_to_delegaciones_table', 3),
(30, '2025_12_15_220318_add_estatus_to_centros_trabajo_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `niveles`
--

CREATE TABLE `niveles` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveles`
--

INSERT INTO `niveles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'PREESCOLAR', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(2, 'PRIMARIA', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(3, 'SECUNDARIA', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(4, 'TELESECUNDARIA', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(5, 'BACHILLERATO', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(6, 'TELEBACHILLERATO', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(7, 'EDUCACIÓN FÍSICA', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(8, 'PAAE', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(9, 'NIVELES ESPECIALES', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(10, 'UNIVERSIDAD PEDAGÓGICA VERACRUZANA', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(11, 'NORMALES', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(12, 'EDUCACIÓN ESPECIAL', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(13, 'NIVEL SUPERIOR', '2025-12-16 03:12:09', '2025-12-16 03:12:09'),
(14, 'JUBILADOS Y PENSIONADOS', '2025-12-16 03:12:09', '2025-12-16 03:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `nomenclaturas`
--

CREATE TABLE `nomenclaturas` (
  `id` bigint UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` enum('ACTIVO','JUBILADO','CT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nomenclaturas`
--

INSERT INTO `nomenclaturas` (`id`, `codigo`, `descripcion`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'D-I-', 'Delegación Activa', 'ACTIVO', '2025-12-16 03:17:21', '2025-12-16 03:17:21'),
(2, 'D-II-', 'Delegación Activa', 'ACTIVO', '2025-12-16 03:17:21', '2025-12-16 03:17:21'),
(3, 'D-III-', 'Delegación Activa', 'ACTIVO', '2025-12-16 03:17:21', '2025-12-16 03:17:21'),
(4, 'D-IV-', 'Delegación de Jubilados', 'JUBILADO', '2025-12-16 03:17:21', '2025-12-16 03:17:21'),
(5, 'C.T.', 'Centro de Trabajo', 'CT', '2025-12-16 03:17:21', '2025-12-16 03:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id` bigint UNSIGNED NOT NULL,
  `titulo` enum('PROF.','PROFA.','C.') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apaterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amaterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` enum('M','F','O') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'VERACRUZ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regiones`
--

CREATE TABLE `regiones` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regiones`
--

INSERT INTO `regiones` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'REGIÓN I - TANTOYUCA', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(2, 'REGIÓN II - TUXPAN', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(3, 'REGIÓN III - POZA RICA', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(4, 'REGIÓN IV - MARTÍNEZ DE LA TORRE', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(5, 'REGIÓN V - XALAPA', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(6, 'REGIÓN VI - VERACRUZ', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(7, 'REGIÓN VII - CORDOBA', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(8, 'REGIÓN VIII - ORIZABA', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(9, 'REGIÓN IX - COSAMALOAPAN', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(10, 'REGIÓN X - SAN ANDRES TUXTLA', '2025-12-16 02:57:17', '2025-12-16 02:57:17'),
(11, 'REGIÓN XI - MINATITLÁN', '2025-12-16 02:57:17', '2025-12-16 02:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `representantes`
--

CREATE TABLE `representantes` (
  `id` bigint UNSIGNED NOT NULL,
  `persona_id` bigint UNSIGNED NOT NULL,
  `delegacion_id` bigint UNSIGNED DEFAULT NULL,
  `centro_trabajo_id` bigint UNSIGNED DEFAULT NULL,
  `cargo_id` bigint UNSIGNED NOT NULL,
  `estatus` enum('ACTIVO','JUBILADO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2025-12-16 06:02:00', '2025-12-16 06:02:00'),
(2, 'Coordinador', 'web', '2025-12-16 06:02:00', '2025-12-16 06:02:00'),
(3, 'Representante', 'web', '2025-12-16 06:02:00', '2025-12-16 06:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ClGD5QmPTFocRJMjRYgRz1hIfsK24mCxrIwr1peU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicEtDRHhaalRGalV2WGxWVXJDbmFPYWJDbTNUa1JFeGZNUWE5ZEN6SyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9zbnRlNTZkZWxlZ2FjaW9uZXMudGVzdC9hZG1pbi9kZWxlZ2FjaW9uZXMiO3M6NToicm91dGUiO3M6MTg6ImFkbWluLmRlbGVnYWNpb25lcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767904802);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `persona_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `persona_id`) VALUES
(1, 'Administrador', 'administrador@email.com', NULL, '$2y$12$yxBaLc2CwmRpX03wq7ReT.iXbla3UWwo6OG1JQu7keRYrbfoE3CVS', NULL, '2025-12-16 06:00:15', '2025-12-16 06:00:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bitacora_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centros_trabajo`
--
ALTER TABLE `centros_trabajo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `centros_trabajo_clave_unique` (`clave`),
  ADD KEY `centros_trabajo_region_id_foreign` (`region_id`),
  ADD KEY `centros_trabajo_nivel_id_foreign` (`nivel_id`),
  ADD KEY `centros_trabajo_nomenclatura_id_foreign` (`nomenclatura_id`);

--
-- Indexes for table `delegaciones`
--
ALTER TABLE `delegaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delegaciones_clave_unique` (`clave`),
  ADD KEY `delegaciones_region_id_foreign` (`region_id`),
  ADD KEY `delegaciones_nivel_id_foreign` (`nivel_id`),
  ADD KEY `delegaciones_nomenclatura_id_foreign` (`nomenclatura_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `niveles_nombre_unique` (`nombre`);

--
-- Indexes for table `nomenclaturas`
--
ALTER TABLE `nomenclaturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomenclaturas_codigo_unique` (`codigo`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regiones_nombre_unique` (`nombre`);

--
-- Indexes for table `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `representantes_persona_id_foreign` (`persona_id`),
  ADD KEY `representantes_delegacion_id_foreign` (`delegacion_id`),
  ADD KEY `representantes_centro_trabajo_id_foreign` (`centro_trabajo_id`),
  ADD KEY `representantes_cargo_id_foreign` (`cargo_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_persona_id_foreign` (`persona_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `centros_trabajo`
--
ALTER TABLE `centros_trabajo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delegaciones`
--
ALTER TABLE `delegaciones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nomenclaturas`
--
ALTER TABLE `nomenclaturas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `centros_trabajo`
--
ALTER TABLE `centros_trabajo`
  ADD CONSTRAINT `centros_trabajo_nivel_id_foreign` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`),
  ADD CONSTRAINT `centros_trabajo_nomenclatura_id_foreign` FOREIGN KEY (`nomenclatura_id`) REFERENCES `nomenclaturas` (`id`),
  ADD CONSTRAINT `centros_trabajo_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`id`);

--
-- Constraints for table `delegaciones`
--
ALTER TABLE `delegaciones`
  ADD CONSTRAINT `delegaciones_nivel_id_foreign` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`),
  ADD CONSTRAINT `delegaciones_nomenclatura_id_foreign` FOREIGN KEY (`nomenclatura_id`) REFERENCES `nomenclaturas` (`id`),
  ADD CONSTRAINT `delegaciones_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `representantes_centro_trabajo_id_foreign` FOREIGN KEY (`centro_trabajo_id`) REFERENCES `centros_trabajo` (`id`),
  ADD CONSTRAINT `representantes_delegacion_id_foreign` FOREIGN KEY (`delegacion_id`) REFERENCES `delegaciones` (`id`),
  ADD CONSTRAINT `representantes_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
