-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 2 朁E10 日 10:24
-- サーバのバージョン： 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shiems`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `post_type_id` int(11) NOT NULL,
  `category_slug` varchar(20) NOT NULL,
  `category_show` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `del_flg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'editor', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_type_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `state` varchar(10) NOT NULL DEFAULT 'draft' COMMENT 'public=>公開　draft=>下書き　private =>非公開　trash=>ゴミ箱',
  `update_id` int(11) NOT NULL,
  `create_id` int(11) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `post_type_id`, `title`, `content`, `state`, `update_id`, `create_id`, `create_datetime`, `del_flg`) VALUES
(1, 1, 'テスト', 'テスト', 'draft', 1, 1, '2017-01-31 00:00:00', 0),
(2, 1, 'テスト2', 'テスト2', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(3, 1, 'テスト3', 'テスト3', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(4, 1, 'テスト4', 'テスト4', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(5, 1, 'テスト5', 'テスト5', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(6, 1, 'テスト6', 'テスト6', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(7, 1, 'テスト7', 'テスト7', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(8, 1, 'テスト8', 'テスト8', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(9, 1, 'テスト9', 'テスト9', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(10, 1, 'テスト10', 'テスト10', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(11, 1, 'テスト11', 'テスト11', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(12, 1, 'テスト12', 'テスト12', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(13, 1, 'テスト13', 'テスト13', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(14, 1, 'テスト14', 'テスト14', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(15, 1, 'テスト15', 'テスト15', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(16, 1, 'テスト16', 'テスト16', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(17, 1, 'テスト17', 'テスト17', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(18, 1, 'テスト18', 'テスト18', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(19, 1, 'テスト19', 'テスト19', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(20, 1, 'テスト20', 'テスト20', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(21, 1, 'テスト21', 'テスト21', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(22, 1, 'テスト22', 'テスト22', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(23, 1, 'テスト23', 'テスト23', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(24, 1, 'テスト24', 'テスト24', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(25, 1, 'テスト25', 'テスト25', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(26, 1, 'テスト26', 'テスト26', 'public', 1, 1, '2017-01-31 00:00:00', 0),
(27, 1, 'テスト27', 'テスト27', 'public', 1, 1, '2017-01-31 00:00:00', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `post_categorys`
--

CREATE TABLE `post_categorys` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `post_categorys`
--

INSERT INTO `post_categorys` (`post_id`, `category_id`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `post_metas`
--

CREATE TABLE `post_metas` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_val` text NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `post_types`
--

CREATE TABLE `post_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_name_show` varchar(100) NOT NULL,
  `categry_flg` int(11) NOT NULL DEFAULT '0',
  `del_flg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `post_types`
--

INSERT INTO `post_types` (`id`, `type_name`, `type_name_show`, `categry_flg`, `del_flg`) VALUES
(1, 'blog', 'ブログ', 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1486717024, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'shiimoto@allora-inc.jp', '$2y$08$53PDzOsIPnZRoKjYFZ1kR.yooFQzak4a5JvIwNn51Py5CsNjFgro.', NULL, 'shiimoto@allora-inc.jp', NULL, NULL, NULL, NULL, 1484815962, NULL, 1, 'a', 'a', 'a', '668860007');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categorys`
--
ALTER TABLE `post_categorys`
  ADD PRIMARY KEY (`post_id`,`category_id`);

--
-- Indexes for table `post_metas`
--
ALTER TABLE `post_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_types`
--
ALTER TABLE `post_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `post_metas`
--
ALTER TABLE `post_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_types`
--
ALTER TABLE `post_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
