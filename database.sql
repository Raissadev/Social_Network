-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2021 às 15:13
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `social_network`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Hope you like it! 😊', '2021-11-21 15:45:03', '2021-11-21 15:45:03'),
(2, '7', '3', 'I loved the post!', NULL, NULL),
(3, '6', '1', 'Very nice Raissa! 😊', NULL, NULL),
(4, '5', '3', 'Excellent post!', NULL, NULL),
(5, '4', '1', 'Very interesting post...', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `communities`
--

CREATE TABLE `communities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_community` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `communities`
--

INSERT INTO `communities` (`id`, `users`, `name_community`, `description_community`, `image`, `created_at`, `updated_at`) VALUES
(1, '1,2', 'Code Lovers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas laoreet mattis convallis. Etiam vel dui luctus, sollicitudin leo at, tempor mi. Aliquam tristique eu ante vitae pretium. Mauris ac rutrum tellus. Suspendisse potenti. Curabitur dignissim et mauris et tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent pharetra ante at pharetra accumsan. Sed eu finibus massa.', 'groups/group-one.jpg', NULL, NULL),
(2, '3,4', 'Philosophers Shipowners', 'Proin vel commodo tortor. Maecenas egestas posuere tempus. Nullam tempus erat nec diam imperdiet pellentesque. Sed sed tincidunt orci.', 'groups/group-four.png', NULL, NULL),
(3, '1,5', 'Arcade Lovers', 'Nam sed urna at magna blandit scelerisque. Mauris semper mattis tellus sed consectetur. Etiam dapibus diam a tempus fermentum. Nunc et risus lorem. Nulla felis orci, interdum vestibulum malesuada sed, viverra in nisl.', 'groups/group-two.jpg', NULL, NULL),
(4, '1', 'Traveling in Codes', 'Vivamus sit amet lectus eget odio eleifend lacinia. Aliquam condimentum eget enim vel efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et arcu elementum.', 'groups/group-five.jpg', NULL, '2021-11-21 15:39:47'),
(5, '1,2,3,4,5,6', 'Come Here', 'Sed sodales sodales felis in viverra. Nam iaculis nisi augue, eu malesuada velit pulvinar vitae. Duis malesuada sem id arcu pulvinar egestas. Vivamus efficitur turpis bibendum elit rutrum, vitae efficitur urna hendrerit. Sed scelerisque enim leo, sed mattis urna tempor ac. Maecenas bibendum lacus vitae cursus ornare.', 'groups/group-six.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`, `status`, `created_at`, `updated_at`) VALUES
(1, '4', '1', 'pending', '2021-11-21 15:09:21', '2021-11-21 15:09:21'),
(2, '1', '4', 'approved', '2021-11-21 15:09:21', '2021-11-21 15:09:21'),
(3, '1', '7', 'approved', '2021-11-21 15:09:21', '2021-11-21 15:09:21'),
(4, '1', '6', 'approved', '2021-11-21 15:09:21', '2021-11-21 15:09:21'),
(5, '1', '5', 'approved', '2021-11-21 15:09:21', '2021-11-21 15:09:21'),
(6, '1', '3', 'pending', '2021-11-21 15:09:21', '2021-11-21 15:09:21'),
(7, '1', '2', 'approved', '2021-11-21 15:09:21', '2021-11-21 15:09:21'),
(8, '2', '4', 'approved', '2021-11-21 15:09:21', '2021-11-21 15:09:21'),
(9, '2', '5', 'pending', '2021-11-21 15:09:21', '2021-11-21 15:09:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(134, '2014_10_12_000000_create_users_table', 1),
(135, '2014_10_12_100000_create_password_resets_table', 1),
(136, '2019_08_19_000000_create_failed_jobs_table', 1),
(137, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(138, '2021_11_16_203314_create_posts_table', 1),
(139, '2021_11_17_215030_create_friend_requests_table', 1),
(140, '2021_11_19_203732_create_comments_table', 1),
(141, '2021_11_19_232619_create_professional_profiles_table', 1),
(142, '2021_11_20_004109_create_communities_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user`, `title`, `content`, `image`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'raissa.fullstack@gmail.com', 'Hello World', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor eros ac libero imperdiet, vitae fermentum lectus semper. Aliquam ut accumsan leo. In condimentum, enim ut sagittis ornare, neque sapien sagittis justo.', 'posts/hello-world.png', NULL, '2021-11-21 15:07:04', '2021-11-21 15:07:04'),
(2, 'amanda@doe.com', 'I loved the platform!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor eros ac libero imperdiet, vitae fermentum lectus semper. Aliquam ut accumsan leo. In condimentum, enim ut sagittis ornare, neque sapien sagittis justo, id vestibulum dui mauris a ipsum. Nunc semper mattis ex ut tempor. Donec malesuada ipsum at eros imperdiet rhoncus. Sed sed semper sapien. Aliquam erat volutpat. Ut ut dictum nulla. Morbi malesuada.', 'posts/i-loved-the-platform.png', '1', '2021-11-21 15:07:04', NULL),
(3, 'harry@potter.com', 'Why programming?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor eros ac libero imperdiet, vitae fermentum lectus semper. Aliquam ut accumsan leo. In condimentum, enim ut sagittis ornare, neque sapien sagittis justo, id vestibulum dui mauris a ipsum. Nunc semper mattis ex ut tempor. Donec malesuada ipsum at eros imperdiet rhoncus. Sed sed semper sapien. Aliquam erat volutpat. Ut ut dictum nulla. Morbi malesuada', 'posts/post-one.jpg', '1', '2021-11-21 15:07:04', NULL),
(4, 'jack@doe.com', 'How to start a career the right way!', 'Praesent et mattis diam, eget malesuada quam. Nunc posuere dapibus justo in sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque nisl ligula, malesuada at ante sed, commodo fermentum ipsum. Proin vel vehicula augue.', 'posts/simply-incredible.jpg', '1', '2021-11-21 15:07:04', NULL),
(5, 'ana@doe.com', 'Why join our group?', 'Proin posuere ullamcorper metus id ultrices. Pellentesque hendrerit consectetur tristique. Aliquam erat volutpat. Curabitur blandit, mi eget tempor lacinia, ligula tellus sollicitudin nisl, nec laoreet lorem mauris quis tortor. Aliquam sem mauris, aliquam non luctus vel, varius vitae magna.', 'posts/group-one.jpg', '1', '2021-11-21 15:07:04', NULL),
(6, 'mariana@doe.com', 'Be very welcome! 😁', 'Sed pharetra tortor at tellus cursus, id imperdiet erat accumsan. Morbi at eleifend urna. Proin tempor purus felis, vitae iaculis leo scelerisque nec. Aenean at arcu sem.', 'posts/post-two.jpg', NULL, '2021-11-21 15:07:04', NULL),
(7, 'raissa.fullstack@gmail.com', 'Why I love Javascript and PHP?', 'Vivamus sit amet lectus eget odio eleifend lacinia. Aliquam condimentum eget enim vel efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et arcu elementum, consectetur dui eget, ultrices elit. Etiam eleifend, nisi quis malesuada scelerisque, urna.', 'posts/post-one.jpg', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professional_profiles`
--

CREATE TABLE `professional_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professional_profiles`
--

INSERT INTO `professional_profiles` (`id`, `user_id`, `name_company`, `created_at`, `updated_at`) VALUES
(1, '1', 'Programming Lovers', NULL, NULL),
(2, '1', 'Code', NULL, NULL),
(3, '1', 'Code Philosophers', NULL, NULL),
(4, '2', 'Code Philosophers', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `about`, `banner`, `title_user`, `phone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'RaissaDev', 'raissa.fullstack@gmail.com', NULL, '$2y$10$XQEg0jbzkUb7PWT3urUojugtW9cWF2RuO7Fs36UKj5M3MxvplfJw2', 'users/myImg.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam augue dolor, accumsan et nunc sed, maximus luctus lectus. Quisque rhoncus, elit eu dictum scelerisque, enim ante facilisis sem, et gravida lacus arcu eu tellus. Mauris interdum, felis non vehicula lacinia, purus erat convallis est, vel efficitur quam ante in elit. Sed at magna eleifend, eleifend sapien et, egestas velit. Ut hendrerit fringilla consectetur. Nam dignissim sed tellus eleifend pellentesque. Phasellus lobortis sagittis felis, vitae convallis nisi convallis eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', NULL, 'Desenvolvedora Full-stack & Mobile', '51995657740', NULL, '2021-11-21 03:18:00', '2021-11-21 14:58:41'),
(2, 'Amanda Doe', 'amanda@doe.com', NULL, '$2y$10$JQGkhzAfZxKZ8813e1hFSucZ6cMDVLpJkmHNCKzJcAL.DYIdl0S.C', 'users/avatar-two.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-21 03:18:31', '2021-11-21 03:18:31'),
(3, 'Jhon Doe', 'jhon@doe.com', NULL, '$2y$10$GpU9twX02Vo5VFKHIFkCLunc4PfJDUlWl3h.Mxkdb.fNjnPvKJixq', 'users/avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-21 03:19:04', '2021-11-21 03:19:04'),
(4, 'Harry Potter', 'harry@potter.com', NULL, '$2y$10$Vy4ScDPV7rF0i5EUN.PbvejcfSNlFRPjLccCvdcto3kqMHGaTSLeu', 'users/avatar-four.png', NULL, NULL, NULL, NULL, NULL, '2021-11-21 03:21:02', '2021-11-21 03:21:02'),
(5, 'Ana Doe', 'ana@doe.com', NULL, '12345678', 'users/avatar-five.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Jack Doe', 'jack@doe.com', NULL, '12345678', 'users/avatar-six.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Mariana Doe', 'mariana@doe.com', NULL, '$2y$10$p3zIbzyWS1NpdrZKlPndqOrMHRC0XMFWRq9jhEI.mDdoC5Flaj9Ou', 'users/avatar-seven.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-21 03:23:17', '2021-11-21 03:23:17');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professional_profiles`
--
ALTER TABLE `professional_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `communities`
--
ALTER TABLE `communities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `professional_profiles`
--
ALTER TABLE `professional_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
