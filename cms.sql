-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Aug 25. 23:48
-- Kiszolgáló verziója: 10.3.16-MariaDB
-- PHP verzió: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `cms`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(8, 'fasz'),
(12, 'Procedural PHP'),
(13, 'geci');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `comment_content` text COLLATE utf8_hungarian_ci NOT NULL,
  `comment_status` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(7, 11, 'dasd', 'fasd@sad.com', 'dsad', 'approve', '2019-08-11'),
(8, 12, 'fasd', 'dsad@dasd.hgasd', 'dasdsad', 'unapproved', '2019-08-12'),
(9, 15, 'fasz', 'fasz@fasz.hu', 'fasz', 'unapproved', '2019-08-20');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_tags` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) COLLATE utf8_hungarian_ci NOT NULL DEFAULT 'draft',
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `post_author` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `post_user` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text COLLATE utf8_hungarian_ci NOT NULL,
  `post_content` text COLLATE utf8_hungarian_ci NOT NULL,
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`post_id`, `post_tags`, `post_comment_count`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_views_count`) VALUES
(15, 'dsa', 0, 'draft', 8, 'sad', 'dsa', '', '2019-08-11', '65906601_2305832589679803_5861555260006334464_n.jpg', '    sad', 1),
(16, 'dasd', 0, 'draft', 12, 'fasdas', 'dasd', '', '2019-08-12', '', '<p>dasd</p>', 0),
(17, 'dsa', 0, 'draft', 8, 'sad', 'dsa', '', '0000-00-00', '65906601_2305832589679803_5861555260006334464_n.jpg', '    sad', 0),
(18, 'dsa', 0, 'draft', 8, 'sad', 'dsa', '', '0000-00-00', '65906601_2305832589679803_5861555260006334464_n.jpg', '    sad', 0),
(19, 'dasd', 0, 'draft', 12, 'fasdas', 'dasd', '', '0000-00-00', '', '<p>dasd</p>', 0),
(20, 'dsa', 0, 'draft', 8, 'sad', 'dsa', '', '0000-00-00', '65906601_2305832589679803_5861555260006334464_n.jpg', '    sad', 1),
(21, 'dsa', 0, 'draft', 8, 'sad', 'dsa', '', '0000-00-00', '65906601_2305832589679803_5861555260006334464_n.jpg', '    sad', 0),
(22, 'dasd', 0, 'draft', 12, 'fasdas', 'dasd', '', '0000-00-00', '', '<p>dasd</p>', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `user_image` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `user_randSalt` varchar(255) COLLATE utf8_hungarian_ci NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`) VALUES
(8, 'dsa', 'dsada', '', '', 'dasd@ads.has', '', 'admin', '$2y$10$iusesomethingcrazystring'),
(9, 'daDAS', 'DSAD', '', '', 'ADDASD@DASD.SAD', '', 'subscriber', '$2y$10$iusesomethingcrazystring'),
(10, 'fasz', '$2y$10$iusesomethingcrazystrebKXWdy11OeR.qnZUiffItDztsvtDfG.', '', '', 'fasz@fasz.hu', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(11, 'anyad', '$2y$12$QlU18G8.iS0u2wUpOq/EIO7nZJnzkBc2/mHczZ8EuOr2YM3fRxHu2', '', '', 'anyasd13@asd.hg', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(12, 'fasza', '$2y$12$ArC1t3Xn85DqUfOKu1tRc.ApcAr3S.zjdAq2pdFi9wkZYQ7UvjzM2', '', '', 'fasza@fasza.hu', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'e1f336kpaa6cg3caups6jbi1f4', 1566595501),
(2, 'iupmkdu3afk70faa4igh24j8vi', 1566314609),
(3, '7d41df91f520f2212fecd66f9a0ea335', 1566751577),
(4, '1baa88f4b5f2d560e7a100da9db42d4b', 1566735387);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- A tábla indexei `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
