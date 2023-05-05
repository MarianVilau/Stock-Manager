-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 03, 2023 la 11:11 PM
-- Versiune PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `inventory_system`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
                              `id` int(11) UNSIGNED NOT NULL,
                              `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
                                            (1, 'Food'),
                                            (2, 'Electronics'),
                                            (3, 'Make-up'),
                                            (4, 'Fashion'),
                                            (5, 'Sports'),
                                            (6, 'Housewares');



-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `media`
--

CREATE TABLE `media` (
                         `id` int(11) UNSIGNED NOT NULL,
                         `file_name` varchar(255) NOT NULL,
                         `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

CREATE TABLE `products` (
                            `id` int(11) UNSIGNED NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `quantity` varchar(50) DEFAULT NULL,
                            `buy_price` decimal(25,2) DEFAULT NULL,
                            `sale_price` decimal(25,2) NOT NULL,
                            `categorie_id` int(11) UNSIGNED NOT NULL,
                            `media_id` int(11) DEFAULT 0,
                            `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`) VALUES
                                                                                                                     (1, 'Paine', '60', '5.00', '8.00', 1, 0, '2023-05-03 14:54:45'),
                                                                                                                     (2, 'Apa 2L', '100', '1.00', '2.00', 1, 0, '2023-05-03 14:57:39'),
                                                                                                                     (3, 'Cola 2L', '65', '5.00', '7.00', 1, 0, '2023-05-03 14:59:29'),
                                                                                                                     (4, 'Fanta 2L', '65', '5.00', '8.00', 1, 0, '2023-05-03 15:00:21'),
                                                                                                                     (5, 'Salam 100gr', '100', '2.00', '3.60', 1, 0, '2023-05-03 15:00:51'),
                                                                                                                     (6, 'Cipsuri', '35', '4.50', '6.00', 1, 0, '2023-05-03 15:00:51'),
                                                                                                                     (7, 'Cablu HDMI tata tata', '20', '17.00', '25.00', 2, 0, '2023-05-03 15:03:09'),
                                                                                                                     (8, 'Ruj de buze', '10', '20.00', '35.00', 3, 0, '2023-05-03 15:04:57'),
                                                                                                                     (9, 'Bluza Dama', '26', '30.00', '45.00', 4, 0, '2023-05-03 15:06:04'),
                                                                                                                     (10, 'Minge de fotbal', '7', '20.00', '35.00', 5, 0, '2023-05-03 15:06:35'),
                                                                                                                     (11, 'Hartie igienica', '110', '7.00', '13.00', 6, 0, '2023-05-03 15:07:32');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sales`
--

CREATE TABLE `sales` (
                         `id` int(11) UNSIGNED NOT NULL,
                         `product_id` int(11) UNSIGNED NOT NULL,
                         `qty` int(11) NOT NULL,
                         `price` decimal(25,2) NOT NULL,
                         `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Eliminarea datelor din tabel `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`) VALUES
                                                                     (1, 5, 4, '14.40', '2023-05-03'),
                                                                     (2, 1, 3, '24.00', '2023-05-03'),
                                                                     (3, 2, 5, '10.00', '2023-05-03'),
                                                                     (4, 10, 1, '35.00', '2023-05-03'),
                                                                     (5, 8, 2, '70.00', '2023-05-03'),
                                                                     (6, 6, 5, '30.00', '2023-05-03'),
                                                                     (7, 9, 1, '45.00', '2023-05-03'),
                                                                     (8, 3, 3, '21.00', '2023-05-03');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
                         `id` int(11) UNSIGNED NOT NULL,
                         `name` varchar(60) NOT NULL,
                         `username` varchar(50) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `user_level` int(11) NOT NULL,
                         `image` varchar(255) DEFAULT 'no_image.jpg',
                         `status` int(1) NOT NULL,
                         `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
                                                                                                              (1, 'Admin', 'admin', 'admin', 1, 'no_image.jpg', 1, '2023-05-03 16:20:21'),
                                                                                                              (2, 'User', 'user', 'user', 3, 'no_image.jpg', 1, '2023-05-03 16:20:21'),
                                                                                                              (3, 'Special', 'special', 'special', 2, 'no_image.jpg', 1, '2023-05-03 16:22:38');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_groups`
--

CREATE TABLE `user_groups` (
                               `id` int(11) NOT NULL,
                               `group_name` varchar(150) NOT NULL,
                               `group_level` int(11) NOT NULL,
                               `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Eliminarea datelor din tabel `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
                                                                                  (1, 'Admin', 1, 1),
                                                                                  (2, 'Special', 2, 1),
                                                                                  (3, 'User', 3, 1);
--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `name` (`name`);

--
-- Indexuri pentru tabele `media`
--
ALTER TABLE `media`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id` (`id`);

--
-- Indexuri pentru tabele `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `name` (`name`),
    ADD KEY `categorie_id` (`categorie_id`),
    ADD KEY `media_id` (`media_id`);

--
-- Indexuri pentru tabele `sales`
--
ALTER TABLE `sales`
    ADD PRIMARY KEY (`id`),
    ADD KEY `product_id` (`product_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_level` (`user_level`);

--
-- Indexuri pentru tabele `user_groups`
--
ALTER TABLE `user_groups`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `media`
--
ALTER TABLE `media`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `products`
--
ALTER TABLE `products`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `sales`
--
ALTER TABLE `sales`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `user_groups`
--
ALTER TABLE `user_groups`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `products`
--
ALTER TABLE `products`
    ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `sales`
--
ALTER TABLE `sales`
    ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `users`
--
ALTER TABLE `users`
    ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
