-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2020 г., 16:44
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'game'),
(2, 'sport'),
(3, 'business'),
(4, 'music'),
(5, 'movies'),
(6, 'fashion');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_name`, `user_id`, `new_id`, `parent_id`, `parent_name`, `status`, `created_at`) VALUES
(1, 'sfffffffffffffff', 'Lusine', 1, 2, NULL, NULL, 1, 1588617325),
(2, 'bbbbbbbbbbbbb', 'Hayk', 1, 2, 1, 'Lusine', 1, 1588617978),
(3, 'vvvvvvvvvvv', 'Karen', 1, 2, 1, 'Hayk', 1, 1588619222),
(7, 'dfffffffffffff', 'Ani', 1, 2, 1, 'Karen', 1, 1588789482),
(8, 'nnnnnnnnnn', 'Lusine', 1, 2, 1, 'Ani', 1, 1588789694),
(10, '&lt;style&gt;body{\r\ncolor:red;\r\n}\r\n&lt;/style&gt;', 'Lusine', 1, 2, NULL, NULL, 1, 1588799576);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_image`
--

CREATE TABLE `gallery_image` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `ownerId` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `new_id`) VALUES
(24, 8, 2),
(25, 8, 5),
(26, 8, 5),
(27, 8, 6),
(28, 10, 11),
(29, 10, 11),
(30, 10, 5),
(31, 10, 11),
(32, 9, 2),
(33, 9, 11),
(34, 9, 12),
(35, 7, 11),
(36, 7, 11),
(37, 8, 10),
(38, 10, 10),
(39, 10, 10),
(60, 1, 7),
(67, 1, 10),
(68, 1, 11),
(70, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1588093293),
('m130524_201442_init', 1588093297),
('m190124_110200_add_verification_token_column_to_user_table', 1588093297),
('m200320_122706_create_newlists_table', 1588093297),
('m200324_192420_create_categories_table', 1588093440);

-- --------------------------------------------------------

--
-- Структура таблицы `newlists`
--

CREATE TABLE `newlists` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8mb4 NOT NULL,
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  `video` varchar(255) NOT NULL,
  `likes_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `views_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `comment_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `video_time` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `newlists`
--

INSERT INTO `newlists` (`id`, `title`, `content`, `video`, `likes_count`, `views_count`, `comment_count`, `video_time`, `created_at`, `updated_at`) VALUES
(2, 'Quisque mollis tristique ante. Proin ligula eros, varius id tristique sit amet, rutrum non ligula.', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 9, 44, 3, '14:36', '2020-01-14 20:00:00', 1588799629),
(3, 'May fights on after Johnson savages Brexit approach', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(4, 'Love Island star\'s boyfriend found dead after her funeral', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(5, 'Searching for the \'angel\' who held me on Westminste Bridge', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 3, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(6, 'Warner Bros. Developing ‘The accountant’ Sequel', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 4, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(7, 'Love Island star\'s boyfriend found dead after her funeral', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 6, 6, 0, '14:36', '2020-01-23 20:18:48', 1588789215),
(8, 'Searching for the \'angel\' who held me on Westminste Bridge', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 3, 6, 0, '14:36', '2020-01-23 20:18:48', 1588789355),
(9, 'Warner Bros. Developing ‘The accountant’ Sequel', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(10, 'Love Island star\'s boyfriend found dead after her funeral', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 4, 0, 0, '14:36', '2020-01-23 20:18:48', 1588789374),
(11, 'Searching for the \'angel\' who held me on Westminste Bridge', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 7, 0, 0, '14:36', '2020-01-23 20:18:48', 1588789378),
(12, 'Theresa May battles Brexiteer backlash amid disquie', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 1, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(13, 'Thailand cave rescue: Boys \'doing well\' after spending night', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(14, 'Do This One Simple Action for an Absolutely', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(15, 'Paramedics \'drilled into boat death woman\'', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(16, 'Do This One Simple Action for an Absolutely', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(17, 'Thailand cave rescue: Boys \'doing well\' after spending night', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '0', '2020-01-23 20:18:48', 20200428);
INSERT INTO `newlists` (`id`, `title`, `content`, `video`, `likes_count`, `views_count`, `comment_count`, `video_time`, `created_at`, `updated_at`) VALUES
(18, 'Searching for the \'angel\' who held me on Westminste Bridge', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '0', '2020-01-23 20:18:48', 20200428),
(19, 'Love Island star\'s boyfriend found dead after her funeral', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(46, 'Love Island star\'s boyfriend found dead after her funeral', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '0', '2020-01-23 20:19:06', 20200428),
(49, 'Love Island star\'s boyfriend found dead after her funeral', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '0', '2020-01-23 20:19:06', 20200428),
(52, 'Quisque mollis tristique ante. Proin ligula eros, varius id tristique sit amet, rutrum non ligula.', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 2, 0, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(53, 'Searching for the \'angel\' who held me on Westminste Bridge', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 0, 0, '0', '2020-01-23 20:19:06', 20200428),
(54, 'Warner Bros. Developing ‘The accountant’ Sequel', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 1, 0, '14:36', '2020-01-23 20:18:48', 20200428),
(55, 'Warner Bros. Developing ‘The accountant’ Sequel', ' <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa.</p>\r\n\r\n                            <blockquote class=\"vizew-blockquote mb-15\">\r\n                                <h5 class=\"blockquote-text\">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods.”</h5>\r\n                                <h6>Ollie Schneider - CEO Deercreative</h6>\r\n                            </blockquote>\r\n\r\n                            <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves.</p>\r\n\r\n                            <h4>Immediate Dividends</h4>\r\n\r\n                            <ul class=\"unordered-list mb-0\">\r\n                                <li>Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>\r\n                                <li>Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>\r\n                                <li>Remove the cooker from heat and open only after all the steam has escaped on its own.</li>\r\n                                <li>While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>\r\n                                <li>When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>\r\n                                <li>Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring.</li>\r\n                            </ul>\r\n', 'https://www.youtube.com/embed/1nI-GMmHMHs', 0, 1, 0, '14:36', '2020-01-23 20:18:48', 20200428);

-- --------------------------------------------------------

--
-- Структура таблицы `newlists_categories`
--

CREATE TABLE `newlists_categories` (
  `id` int(11) NOT NULL,
  `newlists_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `newlists_categories`
--

INSERT INTO `newlists_categories` (`id`, `newlists_id`, `categories_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 5),
(4, 4, 1),
(5, 5, 6),
(6, 6, 7),
(7, 7, 5),
(8, 8, 4),
(9, 9, 6),
(10, 10, 3),
(11, 11, 3),
(12, 12, 1),
(13, 13, 7),
(14, 15, 3),
(15, 16, 2),
(16, 2, 2),
(17, 17, 5),
(18, 18, 1),
(19, 19, 6),
(20, 20, 7),
(21, 21, 2),
(22, 22, 4),
(23, 23, 6),
(24, 24, 3),
(25, 25, 3),
(26, 26, 1),
(27, 27, 2),
(28, 28, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `newsletteres`
--

CREATE TABLE `newsletteres` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `newsletteres`
--

INSERT INTO `newsletteres` (`id`, `user_id`, `categories_id`, `created_at`) VALUES
(1, 1, 6, '2020-05-04 17:27:35');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления ` user`
-- (См. Ниже фактическое представление)
--
CREATE TABLE ` user` (
`id` int(11)
,`surname` varchar(255)
,`name` varchar(255)
,`auth_key` varchar(32)
,`password_hash` varchar(255)
,`email` varchar(255)
,`status` smallint(6)
,`role` int(11)
,`created_at` int(11)
,`updated_at` int(11)
);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `surname`, `name`, `auth_key`, `password_hash`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'hovhannisyan', 'lusine', 'FMfYCvGI8GfGs6jnXeG7JL61MensxGm6', '$2y$13$9Uc0.w1q084jjZq5eDc3OubHGpAzVN3yKDtdV8aio1J7eTx5uU2Xu', 'lusinehovhannisyan280@gmail.com', 10, 1, 1588100174, 1588100174);

-- --------------------------------------------------------

--
-- Структура таблицы `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `views`
--

INSERT INTO `views` (`id`, `new_id`, `user_id`) VALUES
(3, 20, 5),
(4, 6, 5),
(5, 7, 5),
(6, 7, 5),
(7, 7, 5),
(8, 8, 5),
(9, 7, 5),
(11, 8, 6),
(12, 7, 6),
(13, 7, 6),
(14, 6, 6),
(15, 6, 6),
(16, 6, 6),
(17, 8, 6),
(18, 6, 6),
(19, 8, 6),
(20, 8, 6),
(21, 8, 6);

-- --------------------------------------------------------

--
-- Структура для представления ` user`
--
DROP TABLE IF EXISTS ` user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW ` user`  AS  select `user`.`id` AS `id`,`user`.`surname` AS `surname`,`user`.`name` AS `name`,`user`.`auth_key` AS `auth_key`,`user`.`password_hash` AS `password_hash`,`user`.`email` AS `email`,`user`.`status` AS `status`,`user`.`role` AS `role`,`user`.`created_at` AS `created_at`,`user`.`updated_at` AS `updated_at` from `user` ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `newlists`
--
ALTER TABLE `newlists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `newlists_categories`
--
ALTER TABLE `newlists_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `newsletteres`
--
ALTER TABLE `newsletteres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT для таблицы `newlists`
--
ALTER TABLE `newlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `newlists_categories`
--
ALTER TABLE `newlists_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `newsletteres`
--
ALTER TABLE `newsletteres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
