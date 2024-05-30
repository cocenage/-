-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 31 2024 г., 02:03
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `market`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `Category`) VALUES
(2, 'Для улица'),
(3, 'сухари'),
(4, 'хлеб'),
(5, 'печенья'),
(6, 'макароня'),
(8, 'мука'),
(9, 'сахар'),
(10, 'соль');

-- --------------------------------------------------------

--
-- Структура таблицы `chek`
--

CREATE TABLE `chek` (
  `date` date NOT NULL,
  `id_user` int NOT NULL,
  `number_check` int NOT NULL,
  `operation_check` int NOT NULL,
  `name_chek` varchar(50) NOT NULL,
  `inn` int NOT NULL,
  `kkm` int NOT NULL,
  `type_payment` varchar(50) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `chek`
--

INSERT INTO `chek` (`date`, `id_user`, `number_check`, `operation_check`, `name_chek`, `inn`, `kkm`, `type_payment`, `id`) VALUES
('2024-05-01', 1, 1999, 2, 'цццццц', 214748364, 2147483641, 'карта', 1),
('2024-05-22', 2, 23142, 1, 'цццццц', 2147483642, 2147483641, 'карта', 2),
('2024-05-27', 1, 23143, 3, 'Чек', 123456, 123456, 'Наличка', 4),
('2024-05-27', 1, 23143, 3, 'Чек', 123456, 123456, 'Наличка', 5),
('2024-05-27', 7, 23144, 4, 'Чек', 123456, 123456, 'Наличка', 6),
('2024-05-31', 20, 23145, 5, 'Чек', 123456, 123456, 'Наличка', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `postavka`
--

CREATE TABLE `postavka` (
  `id` int NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `postavka`
--

INSERT INTO `postavka` (`id`, `name`) VALUES
(2, 'name nam'),
(4, 'name na');

-- --------------------------------------------------------

--
-- Структура таблицы `privoz`
--

CREATE TABLE `privoz` (
  `id` int NOT NULL,
  `Postavka_id` int DEFAULT NULL,
  `Product_id` int DEFAULT NULL,
  `ProductCount` int DEFAULT NULL,
  `PostavkaDate` date DEFAULT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `privoz`
--

INSERT INTO `privoz` (`id`, `Postavka_id`, `Product_id`, `ProductCount`, `PostavkaDate`, `time`) VALUES
(2, 2, 12, 300, '2024-05-29', '02:02:02'),
(4, 2, 11, 40, '2024-03-02', '21:04:23');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `kolvo` int NOT NULL,
  `CategoryID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `ProductName`, `price`, `kolvo`, `CategoryID`) VALUES
(11, 'хлеб', 30, 10, 6),
(12, 'конфеты', 20, 6050, 4),
(13, 'чай', 10, 250, 5),
(20, 'мука', 40, 10, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `shopping`
--

CREATE TABLE `shopping` (
  `id` int NOT NULL,
  `UserId` int DEFAULT NULL,
  `ProductId` int DEFAULT NULL,
  `kolvo` int NOT NULL,
  `priezd` tinyint(1) NOT NULL DEFAULT '0',
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `shopping`
--

INSERT INTO `shopping` (`id`, `UserId`, `ProductId`, `kolvo`, `priezd`, `address`) VALUES
(1, 1, 11, 10, 1, ''),
(2, 2, 12, 2, 1, ''),
(3, 1, 11, 1, 0, '1'),
(4, 1, 11, 2, 0, 'май хаус'),
(5, 5, 12, 2, 0, 'май хаус'),
(7, 5, 20, 11, 0, 'г волгоград хорошш'),
(9, 5, 11, 1, 0, 'г волгоград хорошш'),
(10, 5, 13, 6, 0, 'г волгоград хорошш'),
(11, 1, 12, 6, 0, 'г волгоград хорошш'),
(12, 1, 12, 6, 0, 'г волгоград хорошш'),
(13, 1, 20, 10, 0, 'ЦУ'),
(14, 1, 20, 10, 0, 'май хаус'),
(15, 1, 20, 10, 0, '2etrtg'),
(16, 1, 20, 10, 0, 'г волгоград хорошш'),
(17, 1, 13, 12, 0, 'славянестан'),
(18, 1, 20, 10, 0, 'г волгоград хорошш'),
(19, 1, 13, 12, 0, 'г волгоград хорошш'),
(20, 1, 12, 3, 0, 'май хаус'),
(21, 1, 12, 3, 0, 'май хаус'),
(22, 1, 12, 3, 0, 'май хаус'),
(23, 1, 12, 3, 0, 'г волгоград хорошш'),
(24, 1, 12, 3, 0, 'г волгоград хорошш'),
(25, 1, 12, 3, 0, 'май хаус'),
(26, 1, 12, 3, 0, 'г волгоград хорошш'),
(27, 1, 12, 3, 0, 'не уважаю ппх'),
(28, 1, 12, 3, 0, 'г волгоград хорошш'),
(29, 7, 12, 20, 0, 'домик на берегу моря'),
(30, 20, 11, 10, 0, 'Пыть-ях, тихая 3');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `UserName`, `Email`, `password`) VALUES
(1, 'testUser1', 'test@main.ru', '23213'),
(2, 'testUser2', 'test@mail.ry', '123123123'),
(4, 'крутой чел', '123@gmail.com', '12345678'),
(5, 'oleg', 'olegaa@gmail.com', '111111111111111111111111'),
(6, 'oleg', '12322@gmail.com', '123123123'),
(7, '12313', 'olee@gmail.com', '123123'),
(9, 'oleg', 'olegaa@gmail.com', '222'),
(11, 'gleeeeb', 'gleeb@gmail.com', '123'),
(13, 'olegы', 'olegaa@gmail.com', '4'),
(14, 'olegы', 'olegaa@gmail.com', '4'),
(15, 'olegыwqe', 'olegaa@gmail.com', '2'),
(16, 'wqewe', '89825630221@mail.ru', '123'),
(17, 'qwe', 'qwe@mai', 'qwe'),
(19, '123', '123@1', '123'),
(20, '54', '54@43', '123'),
(22, '1233123', '123@221', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chek`
--
ALTER TABLE `chek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chek_ibfk_1` (`id_user`);

--
-- Индексы таблицы `postavka`
--
ALTER TABLE `postavka`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `privoz`
--
ALTER TABLE `privoz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Postavka_id` (`Postavka_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Индексы таблицы `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `chek`
--
ALTER TABLE `chek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `postavka`
--
ALTER TABLE `postavka`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `privoz`
--
ALTER TABLE `privoz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chek`
--
ALTER TABLE `chek`
  ADD CONSTRAINT `chek_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `shopping` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `privoz`
--
ALTER TABLE `privoz`
  ADD CONSTRAINT `privoz_ibfk_1` FOREIGN KEY (`Postavka_id`) REFERENCES `postavka` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `privoz_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `shopping`
--
ALTER TABLE `shopping`
  ADD CONSTRAINT `shopping_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
