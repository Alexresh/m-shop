-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2019 г., 20:48
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `m-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Кроссовки'),
(2, 'Куртки'),
(3, 'Свитера'),
(4, 'Рубашки'),
(5, 'Парки'),
(6, 'Аксессуары');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(6) NOT NULL,
  `material` varchar(200) NOT NULL,
  `country` varchar(15) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `material`, `country`, `categoryId`, `img`) VALUES
(1, 'adidas Performance', 'Японский бренд Neighborhood объединился с adidas для создания уникальной итерации Ultra Boost 19. Выполненные в фирменной черно-белой цветовой гамме проекта Синзуке Такидзавы, кроссовки предлагают изящный и яркий внешний вид, соединяющий в себе высокую моду и функциональность. Верх изготовлен из тканого материала по технологии Primeknit. Система шнуровки сопровождается прочной фиксирующей панелью, украшенной паттерном с брендингом Neighborhood и едва заметными тремя полосками. Конструкция в виде носка включает удобную форму язычка с брендингом, а также пятку, оснащенную стабилизационной вставкой. Подошва Boost дополняется технологией стабилизации Torsion System. Завершением служит цепкая резиновая подметка.', 15690, 'текстиль, резина', 'Китай', 1, '11.jpg'),
(2, 'Tommy Jeans', 'Tommy Jeans — знаменитая линейка бренда Tommy Hilfiger, вдохновлённая эстетикой девяностых. Базовые вещи, массивная графика и яркие цветовые решения. Уникальная смесь спорта и уличной культуры, являющихся неотъемлемой частью бренда.', 24990, 'Верх - 100% полиэстер; Подкладка - 100% полиэстер; Наполнитель - 100% полиэстер', 'Китай', 2, '2.jpg'),
(3, 'The North Face', 'Мужская куртка The North Face, выполненная из плотной ткани на основе хлопка и нейлона с тёплой подкладкой внутри. Традиционный силуэт, прямой крой и застёжка на молнии с ветрозащитным клапаном. Удобный капюшон, рукава с регулируемыми патами и четыре кармана спереди. Куртка представлена в однотонной расцветке, которую украшает лаконичный брендинг.', 25190, 'Верх - 75% хлопок, 25% нейлон; Подкладка - 85% полиэстер, 15% акрил', 'Индонезия', 2, '3.jpg'),
(4, 'Helly Hansen', 'Мужская куртка Helly Hansen изготовлена из инновационного двухслойного материала Helly Tech Protection. В дополнение поверхность обработана водоотталкивающим репеллентом DWR. Все швы проклеены. Внутри находится плотный синтетический утеплитель PrimaLoft. Парка застегивается на молнию с планкой на кнопках. Модель оснащена регулируемым капюшоном. По бокам расположены карманы с клапанами на кнопках и дополнительным боковым входом. Нагрудный карман оснащен молнией, защищенной от проникновения воды. Используется японская фурнитура YKK. Также есть внутренний карман для самых ценных вещей. Удлиненный сзади подол и эластичные манжеты позволят максимально укрыться от осадков и ветра. Завершает дизайн логотип на спине и патч на рукаве.', 19990, 'Верх - 100% полиамид; Подкладка - 100% полиамид; Наполнитель - 100% полиэстер', 'Китай', 2, '4.jpg'),
(5, 'Carhartt WIP', 'Рюкзак Carhartt WIP Payton изготовлен из прочного полиэстера Cordura плотностью 8 унций. Материал обработан водоотталкивающим покрытием. Традиционный дизайн включает основной отсек на молнии. Внутри находятся дополнительные карманы и ремешок с карабином для крепления ключей. Спереди расположен карман на молнии для вещей первой необходимости. Рюкзак оснащен мягкой задней панелью с сетчатой вставкой, которая отвечает за воздухопроницаемость. Мягкие регулируемые плечевые ремни снижают нагрузку на спину. Завершением служит брендинг, вышитый на фронтальной стороне.', 5490, '100% полиэстер', 'Вьетнам', 6, '5.jpg'),
(8, 'adidas Originals', 'Бренд уличной одежды 424 из Лос-Анджелеса использует архивы adidas в качестве вдохновения для совместной работы над теннисными кроссовками. В рамках коллаборации модель Supercourt Premiere с монохромным внешним видом и фирменными красными акцентами. Верх изготовлен из премиальной кожи так же, как и подкладка. Традиционная система шнуровки включает мягкий язычок с замшевой нашивкой, украшенной брендингом 424. На заднике расположен логотип adidas. Резиновая подошва также отмечена названием американкой марки. Завершением служит цепкая рельефная подметка.', 1, 'кожа, резина', 'Вьетнам', 1, '6.jpg'),
(9, 'Polo Ralph Lauren', 'Американский бренд Polo Ralph Lauren предлагает классический свитер из мягкого хлопка. Модель прямого кроя представлена в однотонной расцветке. Традиционный дизайн подкрепляется ребристым круглым воротом. В манжетах и подоле также расположены ребристые вставки. Свитер идеально подойдет для любого выбранного образа и согреет в прохладную погоду. Завершением служит фирменный логотип, расположенный в области груди. Игрок в поло является символом компании с 1960-х годов. Он появляется практически на всех изделиях марки.', 9690, '100% хлопок', 'Китай', 3, '7.jpg'),
(10, 'Lacoste Live', 'Мужская рубашка Lacoste из молодежной линейки Live украшена контрастной клеткой в стиле рабочей одежды. Модель свободного кроя Boxy Fit из легкого хлопка подходит для комбинирования с футболкой или использования в качестве самостоятельного предмета гардероба. Это подкрепляется прямым подолом, который позволяет рубашке органично смотреться в любом образе. Классический дизайн с планкой на пуговицах. Манжеты также оснащены пуговицами. Образ подкрепляется воротником button-down и бантовой складкой на спине, которая обеспечивает больший комфорт. Завершением служит нашивка с логотипом, фирменным символом компании, основанной теннисистом Рене Лакостом.', 9490, '100% хлопок', 'Китай', 4, '8.jpg'),
(11, 'MA.Strum', 'Мужская куртка парка MA.Strum Ascenda изготовлена из микро-рип-стопа с алмазным переплетением, снабженного термопластичной мембраной. Она спроектирована таким образом, чтобы обеспечить отвод водяного пара, сохранив воздухопроницаемость. При этом ткань не пропускает капли воды. Алмазное плетение придает поверхности уникальный переливающийся вид. Модель застегивается на двойную молнию с планкой на кнопках. Внутри расположен утеплитель из полиэстера. Регулируемый капюшон оснащен козырьком. Спереди находятся два нагрудных кармана на молнии и два кармана с клапаном. Внутри есть дополнительный карман на молнии. Комфорта добавляют регулируемая талия и подол. Эластичные манжеты оснащены кнопками. Завершением служит фирменный брендинг.', 37190, 'Верх - 100% полиэстер; Подкладка - 100% полиэстер; Наполнитель - 100% полиэстер', 'Китай', 5, '9.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `item_id`, `user_id`, `price`) VALUES
(15, 2, 2, 24990),
(16, 10, 2, 9490);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `name` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `adres`, `name`, `surname`, `pass`, `isAdmin`) VALUES
(1, 'napapapijri@mail.ru', 'Россия', 'Илья', 'Размахнин', '12345', 1),
(2, 'rip@gmail.com', 'Россия', 'Данила', 'Григорьев', '12345', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;