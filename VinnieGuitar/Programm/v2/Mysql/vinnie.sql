-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 15 2015 г., 02:01
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `vinnie`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brend`
--

CREATE TABLE IF NOT EXISTS `brend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Бренд',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='производители' AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `brend`
--

INSERT INTO `brend` (`id`, `name`) VALUES
(1, 'Admira'),
(2, 'Flight'),
(3, 'RainSong'),
(4, 'Моя контора');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Имя',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории товара' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Электрогитары'),
(2, 'Акустические'),
(3, 'Басгитары'),
(4, 'Кастомные гитары'),
(5, 'kostyn''Gitar style');

-- --------------------------------------------------------

--
-- Структура таблицы `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `email`
--

INSERT INTO `email` (`id`, `email`) VALUES
(1, 'kotmonstr@ukr.net');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Наименование',
  `main_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'главное фото',
  `cat_id` int(11) NOT NULL COMMENT 'категория',
  `brend_id` int(50) NOT NULL COMMENT 'Производитель Звукоснимателя',
  `strings` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Количество струн',
  `anker` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Тип крепления стркн',
  `form` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'форма корпуса',
  `bridj` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Тип бриджа',
  `material` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Материал грифа',
  `pie` int(11) DEFAULT NULL COMMENT 'Порожек с зажимом',
  `lad` int(11) DEFAULT NULL COMMENT 'Количество ладов',
  `inlay` tinyint(4) DEFAULT NULL COMMENT 'Инкрустация',
  `shema` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Схема звукаснимателей',
  `q_volume` int(11) DEFAULT NULL COMMENT 'Количество рег громкости',
  `q_tone` int(11) DEFAULT NULL COMMENT 'Количество рег тона',
  `add` text CHARACTER SET utf8 COLLATE utf8_bin COMMENT 'Дополнительно',
  `price` int(11) DEFAULT '0' COMMENT 'цена',
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `brend_id` (`brend_id`),
  KEY `cat_id_2` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Товары' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `main_image`, `cat_id`, `brend_id`, `strings`, `anker`, `form`, `bridj`, `material`, `pie`, `lad`, `inlay`, `shema`, `q_volume`, `q_tone`, `add`, `price`) VALUES
(1, 'dghj', '1447448052.jpg', 2, 3, '6', 'sdfgjh', 'sfghs', 'fhsf', 'hsfhsfh', 0, 7, 0, '', NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Имя',
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Сообщение',
  `created_at` int(11) NOT NULL,
  `tel` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='сообщения' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `name`, `message`, `created_at`, `tel`, `email`) VALUES
(1, 'wrbg', 'ergberberbg', 1447447554, 'ergb', 'kot@wdc.tt');

-- --------------------------------------------------------

--
-- Структура таблицы `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL COMMENT 'Название страницы',
  `description` varchar(255) NOT NULL COMMENT 'Описание страницы',
  `keywords` varchar(255) NOT NULL COMMENT 'Ключевые слова',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `meta`
--

INSERT INTO `meta` (`id`, `url`, `title`, `description`, `keywords`) VALUES
(1, 'site/index', 'Главная страница', 'Главная страница сайта', 'VinnieGuitar, гитары , купить , каталог , симферополь'),
(2, 'site/news', 'Новости', '', 'VinnieGuitar, гитары , купить , каталог , симферополь'),
(3, 'site/review', 'Отзывы', '', 'VinnieGuitar, гитары , купить , каталог , симферополь'),
(4, 'site/catalog', 'Каталог', '', 'VinnieGuitar, гитары , купить , каталог , симферополь'),
(5, 'site/galary', 'Галерея', '', 'VinnieGuitar, гитары , купить , каталог , симферополь'),
(6, 'site/about', 'обо мне', '', 'VinnieGuitar, гитары , купить , каталог , симферополь');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` int(11) NOT NULL COMMENT 'время',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Новости' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `header`, `content`, `image`, `created_at`) VALUES
(1, 'wefvwefvwefv', '<p><img src="/upload/imp/1.jpg" alt="/upload/imp/1.jpg"></p><p>wefvwfv</p>', '1447447692.jpg', 1447447692),
(2, 'we', '<p><img src="/upload/imp/52f6e55f3e92add341da651e2e084ad2.png"></p><p>werwergwrtg</p><p><img src="/upload/imp/5f4f0a1aa55e8655ba42b884625290ad.jpg" alt="/upload/imp/5f4f0a1aa55e8655ba42b884625290ad.jpg"></p>', '1447458403.jpg', 1447458393);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Имя',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Контактный телефон',
  `message` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Сопроводительное письмо',
  `created_at` int(11) NOT NULL COMMENT 'дата',
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='заказы' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-не активна, 1- активна',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Дополнительные страницы' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `status`, `alias`) VALUES
(1, 'TOOZZA.RU', '<h1 class="tit-main"><a href="http://TOOZZA.RU " target="_blank">TOOZZA.RU</a> — наша жизнь:</h1><p class="tit-main-p">Платим налоги, работаем на лицензионном программном обеспечении.</p><hr class="line"><table class="about-content-tab">\r\n<tbody>\r\n<tr>\r\n<td><br></td>\r\n<td><br></td>\r\n<td>\r\n<h2>Идея!</h2>\r\n<p>Все клиенты, как правило, большие фантазеры, они очень любят свои проекты и фонтанируют идеями и мыслями. В большинстве случаев их идеи прекрасны и достойны внимания. Но сложить все свои мысли и идеи в понятное техническое задание они не могут. За 12 лет работы мы научились даже самые сумбурные фантазии наших клиентов превращать в осмысленные и технически понятные обоснованные идеи. Для этого мы используем наверно самый правильный набор инструмента: бумагу, карандаш, мозги и обсуждения.</p>\r\n<br>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><br></td>\r\n<td><br></td>\r\n<td>\r\n<h2>Прототип!</h2>\r\n<p>Прототипирование, несомненно, самый важный этап работы. Ничто так не наводит порядок, как правильно и кропотливо созданный прототип. На этом этапе можно выслушать все требования и пожелания и внести все изменения за минимальное время, а стало быть за минимальные деньги. Благодаря прототипу всем участникам процесса все будет понятно с самого начала. Прототип способен сэкономить до 30% времени на стадии производства, а это очень и очень не мало.</p>\r\n<br>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><br></td>\r\n<td><br></td>\r\n<td>\r\n<h2>Дизайн!</h2>\r\n<p>Его величество дизайн, самый красивый и осязаемый этап работ. Помните, у вас никогда не будет второго шанса оказать первое впечатление. Что видят первым ваши клиенты? Ваши клиенты достойны хорошего дизайна. В нашей команде трудятся и творят дизайнеры наивысшей степени подготовки. Так уж исторически сложилось, что создатель студии сам много лет был топовым дизайнером, потому отбор дизайнеров в команду самый строгий.</p>\r\n<br>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><br></td>\r\n<td><br></td>\r\n<td>\r\n<h2>Верстка!</h2>\r\n<p>Очень многие недооценивают этот вид работ. Многим кажется, что это переходной процесс между дизайном и программированием. Но это далеко не так. Представьте верстку неким мостом между дизайнером, человеком высоко художественным и витающим в облаках, созидающим прекрасное, и программистом, человеком строгим, собранным и логичным. Верстка это мост через бурную реку между двумя враждующими берегами.</p>\r\n<br>\r\n</td>\r\n</tr>\r\n<tr class="company-last">\r\n<td><br></td>\r\n<td></td>\r\n<td>\r\n<h2>Программирование!</h2>\r\n<p>Сложный, долгий и кропотливый процесс, когда все начинает работать. Самое важное найти правильную платформу — то что будет основой вашего будущего проекта. В остальном, программирование — это работа, работа и еще раз работа. Чем более квалифицированный специалист — тем меньше по итогу будет проблем в будущем.</p>\r\n<br>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 0, '_aboute_developer'),
(2, 'Обо мне', '    <div class="container-main">\r\n        <div class="static-pg">\r\n            <div class="o-bo-mne">\r\n                <div class="left-bl">\r\n                    <img src="/image/avtor.jpg">\r\n                </div>\r\n                <div class="right-bl">\r\n                    <hr class="hr-small">\r\n                    <p>\r\n                        На леворуком инструменте я играть не умею, да и опыта делать стратокастеры у меня не было, поэтому было решено делать еще и праворукую зеркальную версию. Из своих материалов, чтоб каждую операцию делать сначала на "пробной" гитаре, а затем на заказной из приобретенных материалов.<br><br>\r\n\r\n                        Задача была поставлена достаточно точно соблюсти спецификации заказчика, профиль грифа, все толщины, ширину грифа у порожка, у пятки и прочее. Интернет изучение вопроса вооружило меня необходимыми данными, сделали чертежи и заказали комплектующие.<br><br>\r\n\r\n                        Заказной инструмент получил серийный номер 003 и по завершении уехал в город Иркутск.<br>\r\n                        Пробный инструмент получил серийный номер 004 и пока пребывает у меня. Продается. Вернее просто лежит, с возможностью приобретения. Не дорого, кстати, обращайтесь.<br><br>\r\n\r\n                        Поскольку я сразу решил давать инструментам имена собственные, то встал вопрос с названиями.<br>\r\n                        И очень скоро решился. Левый инструмент нарекли Nagual, а правый Tonal, как истинную пару, согласно произведениям Карлоса Кастанеды.<br><br>\r\n\r\n                        Кто читал, тому и так понятно, кто не читал, вот примерный расклад:<br><br>\r\n\r\n                        Тональ (Tonal) - это всё, что существует вообще, всё, о чем можно говорить, думать, все понятия, явления, сущности, вся вселенная, весь мир. Вообще ВСЁ.<br>\r\n                        Нагваль (Nagual) - это то великое НИЧТО, в котором пребывает ВСЁ.<br>\r\n                        как то так. У этих понятий, согласно Кастанеды есть еще много смыслов и применений,<br>\r\n                        кому интересно точнее, читаем первоисточник.\r\n                    </p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>', 1, NULL),
(3, 'testpage', '<p><strong>test content</strong></p>', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Имя',
  `items_id` int(11) NOT NULL COMMENT 'товар Id',
  PRIMARY KEY (`id`),
  KEY `items_id` (`items_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Фотографии товаров' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `name`, `items_id`) VALUES
(1, '14474478183.jpg', 1),
(2, '14474478185.jpg', 1),
(3, '14474478186.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Имя',
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Сообщение',
  `created_at` int(11) NOT NULL,
  `tel` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='сообщения' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `name`, `message`, `created_at`, `tel`, `email`) VALUES
(2, 'test-email', 'test email8888', 1438170482, '12345678', 'kotmonstr@ukr.net'),
(3, '23f', '23rf23rf', 1447447619, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) NOT NULL,
  `vkontakte` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `odnoklasniky` varchar(255) DEFAULT NULL,
  `mailru` varchar(255) DEFAULT NULL,
  `yandeks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `social`
--

INSERT INTO `social` (`id`, `facebook`, `vkontakte`, `twitter`, `google`, `odnoklasniky`, `mailru`, `yandeks`) VALUES
(1, 'https://www.facebook.com/sharer.php?u=http://bit.ly/FBshareArticle', 'http://vkontakte.ru/share.php?url=http://guitar.toozza.ru/', 'http://ok.ru/', 'http://ok.ru/', 'http://ok.ru/', 'http://ok.ru/', 'http://ok.ru/');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kot', '1TqwaaXujHiW_S_hnd5xwTnkOuLDVdpQ', '$2y$13$Xz4U8oJ8DyE1gvRjlKNmBuHvyDxr4pNcpws5ESSOTHhOaEj6b8NWa', NULL, 'kotmonstr@ukr.net', 10, 1436785436, 1436785436),
(2, 'Admin', '_1zsHWenmleyNq9Dw-sp5w_KiXFuhhpa', '$2y$13$vWuStjxKwWP2GIvAGlMX9ewlFGcQKATieY83c226fTsvxJXiQKkjm', NULL, 'kotmonstr@i.ud', 10, 1437117609, 1437117609);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`brend_id`) REFERENCES `brend` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
