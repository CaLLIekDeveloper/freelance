-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 25 2019 г., 13:42
-- Версия сервера: 5.7.26
-- Версия PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `furniture&insipation`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `password` text NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` text NOT NULL,
  `phone` text,
  `address` text,
  `date` text,
  `cardNo` text,
  `orders` text,
  `isAdmin` int(11) DEFAULT '0',
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `accountId` int(11) NOT NULL DEFAULT '0',
  `orderCustomer` text NOT NULL,
  `orderBasket` text NOT NULL,
  `orderDate` text NOT NULL,
  `orderPrice` int(11) NOT NULL,
  `orderType` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `producer`
--

DROP TABLE IF EXISTS `producer`;
CREATE TABLE IF NOT EXISTS `producer` (
  `producerId` int(11) NOT NULL AUTO_INCREMENT,
  `producerName` text NOT NULL,
  PRIMARY KEY (`producerId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `producer`
--

INSERT INTO `producer` (`producerId`, `producerName`) VALUES
(1, 'Аванта'),
(2, 'ЛЕРОМ'),
(3, 'BRW');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prodId` int(11) NOT NULL AUTO_INCREMENT,
  `prodName` text NOT NULL,
  `prodImage` text NOT NULL,
  `prodDesc` text NOT NULL,
  `prodCharacteristic` text,
  `type` text,
  `price` int(11) NOT NULL DEFAULT '0',
  `bigImageNames` text,
  `prodCustomers` int(11) NOT NULL DEFAULT '0',
  `prodRating` double NOT NULL DEFAULT '0',
  `prodAge` int(11) NOT NULL,
  `prodProducer` text NOT NULL,
  `prodProd` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prodId`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodImage`, `prodDesc`, `prodCharacteristic`, `type`, `price`, `bigImageNames`, `prodCustomers`, `prodRating`, `prodAge`, `prodProducer`, `prodProd`) VALUES
(1, 'Дитяче ліжко Кроха', 'product1.jpg', 'Новинка від компанії \"Аванта\" Зручна і компактна люлька «Кроха» для новонароджених, поєднує в собі лаконічний дизайн і функціональність. Займає мінімум місця і володіє максимумом можливостей! Два видвежних містких ящика і функція заколисування, роблять її дуже практичною. При необхідності, в комплект до люльки, можна придбати пеленальний комод зі зручними ящиками для дитячих речей і дитячий матрацик. Купуючи своїй дитині меблі ТМ «Аванта», ви створюєте йому максимально комфортні умови і забезпечуєте безпеку на багато років.', '- габарити дна люльки 120см х60 см\r\n\r\n- габарити днища ліжка 124см х64 см\r\n\r\n- два положення дна під матрацик у дитячій люльки;\r\n\r\n- система механічного заколисування (горизонтальний маятник поперечного гойдання з системою блокування);\r\n\r\n- ортопедичне днище з буковими ламелями;\r\n\r\n- два містких висувних ящика під днищем ліжечка;\r\n\r\n- закруглені кути для безпеки;\r\n\r\nВаріанти забарвлень кольорового ДСП: Білий, Ваніль, Сонячний Жовтий, Сакура Рожева, Зелена вода, Блакитний Скай, Лаванда.\r\n\r\nЗахисна решітка Білого кольору.\r\n\r\nВаріанти забарвлень деревоподібних ДСП: Дуб молочний, Клен, Вільха, Горіх лісовий, Яблуня, Венге. \r\n\r\nМожливий варіант виготовлення ліжечка в забарвленні за бажанням замовника + 20% від загальної вартості. У комплект поставки входить інструкція для самостійної збірки дитячого ліжечка. Використовувані матеріали: ортопедичні ламелі з бука, масив вільхи, ламіноване ДСП «Swisspan», «Kronosspan», фурнітура від європейських виробників.', '2', 3240, 'product1.jpg', 0, 0, 3, '1', 0),
(6, 'Дитяче ліжко Кітті', 'product6.jpg', 'Лаконічність і універсальність підліткової ліжка «Кітті» дозволить вдало доповнити вже наявні меблі для дитячої кімнати або стане відправною точкою для оновлення інтер\\\\\\\\\\\\\\\'єру. Зручна і практична модель може зацікавити як хлопчика, так дівчинку. Дитяче ліжко «Кітті» є абсолютно безпечною завдяки відсутності гострих кутів і ретельної фіксації ортопедичних букових ламелей. Каркас оснащений стійкими ніжками і додатковим ребром жорсткості під днищем. При проектуванні дитячих ліжечок фахівці фірми «Аванта» в першу чергу звернули увагу на безпеку дитини, зручність і надійність експлуатації, а також на ергономічність дизайну. Всі матеріали, використовувані при виготовленні дитячих меблів «Аванта» - високої якості, гіпоалергенні, сертифіковані і відповідають нормам безпеки. Контроль якості проводиться при складанні кожного елемента ліжка.', '- спальне місце дитячого ліжка 80 см * 190 см, 140 см * 70 см\\r\\n\\r\\n- загальний габаритний розмір: ш 90см х дл 194см, ш 80 см х 144 см\\r\\n\\r\\n- ортопедична основа на ламелях\\r\\n\\r\\n- торці оброблені пластиком ПВХ\\r\\n\\r\\n- кути заокруглені\\r\\n\\r\\nВаріанти кольорів:\\r\\n\\r\\nДеревоподібних ДСП: Горіх темний; Вільха гірська темна; Клен Танзау; Яблуня Локарно; венге; Дуб молочний;\\r\\n\\r\\nКольорове ДСП: ваніль; Сонячний жовтий; Сакура рожева; Зелений лайм; Блакитний скай; Лаванда; Оранж; Зелена вода; крем;\\r\\n\\r\\nВикористовувані матеріали: ламіноване ДСП «Swisspan», «Kronosspan»; букові ламелі; фурнітура європейських виробників.', '1', 2160, 'product6.jpg', 0, 0, 4, '1', 0),
(8, 'Дитяче ліжко Адель', 'product8.jpg', 'Дизайн ліжка «Адель» від торгової марки «Аванта» відмінно підійде і для маленької принцеси, і для романтичної дівчинки-підлітка. Ніжні пастельні тони, варіант яких можна підібрати з представленої лінійки забарвлень, легко впишуться в обстановку дитячої, заспокоюючи дитину перед сном. Акуратно округлені форми ізножья і головах, прикрашаючи ліжко, забезпечують повну безпеку експлуатації спального місця. Для максимально комфортного і здорового сну передбачена надійна система ортопедичних ламелей. Така конструкція днища не тільки сприяє природній релаксації хребта, але і забезпечує циркуляцію повітря. При проектуванні дитячих ліжечок фахівці фірми «Аванта» в першу чергу звернули увагу на безпеку дитини, зручність і надійність експлуатації, а також на ергономічність дизайну. Всі матеріали, використовувані при виготовленні дитячих меблів «Аванта» - високої якості, гіпоалергенні, сертифіковані і відповідають нормам безпеки. Контроль якості проводиться при складанні кожного елемента ліжка.', '- спальне місце дитячого ліжка 80 см * 190 см, 140 см * 70 см\\\\r\\\\n\\\\r\\\\n- загальний габаритний розмір: ш 90см х дл 194см, ш 80 см х 144 см\\\\r\\\\n\\\\r\\\\n- ортопедична основа на ламелях\\\\r\\\\n\\\\r\\\\n- торці оброблені пластиком ПВХ\\\\r\\\\n\\\\r\\\\n- кути заокруглені', '1', 2160, 'product8.jpg', 0, 0, 4, '1', 0),
(9, 'Ліжко дитяче Ліон', 'product9.jpg', 'Матеріал: ЛДСП\r\n\r\nДовжина: 1432 мм\r\n\r\nШирина: 740 мм\r\n\r\nВисота: 600 мм \r\n\r\nСпальне місце: 1400х700 мм', 'Основа під матрац: \r\n\r\n1 категорія ЛДСП: вільха гірська, дуб молочний, венге магія, дуб сонома, німфея альба, білий, дуб сонома трюфель, горіх еко, лайм\r\n\r\n2 категорія ЛДСП (+5%): горіх французький темний, горіх французький світлий, дуб аппалачі, антрацит, дуб крафт білий', '1', 1208, 'product9.jpg', 0, 0, 3, '1', 0),
(10, 'Ліжко Природа', 'product10.jpg', 'Зручна дитяча кімната просто створена для сучасної дитини. Нейтральне забарвлення і малюнок гармонійно «вписувати» її в будь-який інтер\'єр, а конструкція забезпечить дитині затишок і порядок в кімнаті.\r\nКромковано пластиковими протиударними кромки ПВХ. Фотодрук знімна. Знімаєте фотодрук, отримуєте доросле меблі.', 'Корпус і фасад: ДСП\r\n\r\nКолір: венге світлий', '1', 3000, 'product10.jpg', 0, 0, 3, '1', 0),
(11, 'Дитяча кімната Індіана', 'product11.jpg', 'Колір: дуб sutter, сосна каньйон.', 'Комплектація:\r\n\r\nКомод-JKOM 4s / 50 - 1 од.\r\nКровать90-JLOZ90 - 1 од.\r\nТумба приліжкова - 1 од.\r\nСтелаж -JREG2do - 1 од.\r\nПисьмовий стіл S31-JBIU2d2s - 1 од.\r\nПолку - 1 од.\r\nТумба РТВ-JRTV1s - 1 од.', '4', 16489, 'product11.jpg', 0, 0, 4, '3', 0),
(14, 'Дитяча Злата', 'product14.jpg', 'Дитяча ЗЛАТА БРВ - комплект меблів в вітальню модульної системи Zlata BRW від фабрики BRW-Україна. Виготовляється в кольорі: корпус - дуб тахо; фасад - білий. Характеризується мінімалістичним дизайном, строгими прямими лініями, оригінальними ручками, інтегрованими в край фасаду, І пластмасовими ніжками. Вітрини комплектуються підсвічуванням. Використовуються роликові направляючі.', 'ЗЛАТА Комод KOM3S БРВ - 1 шт. - 95/86/41 см. \r\n\r\nЗЛАТА Шафа SZF2D1S БРВ - 1 шт. - 90,5/195/56,5 см.\r\n\r\nЗЛАТА Стіл письмовий BIU/120 БРВ - 1 шт. - 120/76/60 см. \r\n\r\nЗЛАТА Шафа навісна SFW1K БРВ - 1 шт. - 135/37/31 см. \r\n\r\nЗЛАТА Ліжко LOZ/90 (каркас) БРВ з ящиком - 1 шт. - 204,5/80,5/95 см. Спальне місце: 90х200 см', '4', 10462, 'product14.jpg', 0, 0, 1, '3', 0),
(12, 'Дитячий диван-малютка Соня', 'product12.jpg', 'Дитячий диван \"Соня\" має наповнення пінополіуретан з синтепоном високої якості. Місткий ящик для білизни. Дану модель можна замовляти у вигляді ведмедика.\r\n\r\nДиванчик безумовно дуже сподобається вашій дитині, її барвистий колір і незвичайні форми внесуть в кімнату вашого малюка затишок і комфорт, а симпатичний ведмедик тільки прикрасить і доповнить кімнату. Двоступенева трансформація дозволить дитині без праці впорається з розкладанням варто тільки потягнути бічну спинку дивана в сторону і вкласти в порожнечу подушки і диван розкладений.', 'Габаритний розмір (ШхГхВ): 1480 * 840 * 720 мм\r\n\r\nСпальне місце: 1940 * 810 мм\r\n\r\nНаповнення: пінополіуритановий деталі, синтетична повсть, пружинний блок, синтепон\r\n\r\nКаркас: ДСП, ДВП, дерево, фанера, короб - ЛДСП біл.\r\n\r\nМеханізм трансформації: ролик. опора\r\n\r\nНіша для білизни: є\r\n\r\nПодушки: крихта\r\n\r\nЗадня стінка - флізелін', '2', 5623, 'product12.jpg', 0, 0, 3, '2', 0),
(13, 'Дитячий диван Чіп Глорія', 'product13.jpg', 'Зробіть своїй дитині подарунок - перетворите дитячу кімнату в ігровий майданчик. Вибравши один з варіантів, Ви зробите відпочинок малюка комфортним, а гри незабутніми. Міцний дерев\'яний каркас, практична, легкоочіщаемой оббивка і місткий ящик для білизни або іграшок гарантують довгий і зручне використання дивана.', 'Механізм трансформації: викочування\r\n\r\nНаповнення: сосновий брус, фанерний каркас, пінополіуретан, ламелі, синтепон\r\n\r\nГабарити (ШхГхВ): 1250х750х000 мм\r\n\r\nСпальне місце: 1000х1750 мм\r\n\r\nКороб для білизни: є\r\n\r\nДиван поставляється без подушки.', '2', 5106, 'product13.jpg', 0, 0, 3, '2', 0),
(15, 'Дитячий диван Капризулька', 'product15.jpg', 'Диван дитячий Капризулька Джинс - прекрасний варіант для дитячої кімнати. У даній моделі є кишенька для зберігання потрібних дрібниць. Можливе придбання крісла \"Капризулька\".', 'Габаритний розмір (ШхГхВ): 1010х630х470 мм\r\n\r\nВисота сидіння: 370 мм\r\n\r\nНіжки-опори регулюються. \r\n\r\nОббивка - натуральна міцна джинсова тканина, або тканина Сідней.\r\n\r\nНаповнення: пінополіуретан', '2', 2362, 'product15.jpg', 0, 0, 3, '2', 0),
(16, 'Дитяче ліжко Grand Street', 'product16.jpg', 'Матеріал: ЛДСП 16 мм (виробник Swisspan by Sorbes)\r\n\r\nРозміри (ДхШхВ): 2320х1020х780 мм\r\n\r\nВисота спального місця: 360 мм\r\n\r\nСпальне місце: 1900х800 мм', 'Ліжко доступне в чотирьох модифікаціях: \r\n\r\nЛДСП/БМ - спальне місце з ЛДСП, без підйомного механізму;\r\n\r\nЛДСП/ЗМ - спальне місце з ЛДСП, з підйомним механізмом;\r\n\r\nЛАМ/БМ - спальне місце з ламелей на металевому каркасі, без підйомного механізму;\r\n\r\nЛАМ/ЗМ - спальне місце з ламелей на металевому каркасі, з підйомним механізмом.', '1', 4606, 'product16.jpg', 0, 0, 2, '1', 0),
(17, 'Дитяча Карина 1', 'product17.jpg', 'Матеріал: фасад МДФ, корпус ламінована ДСП, крайка ПВХ\r\n\r\nКолір: Сніговий ясен, ясен Асахі, Гікорі Джексон світлий, Акація Молдау\r\n\r\nКомплектація: ПЛ-1001, ШК-1083, СТ-1012, ПЛ-1004 - 2шт, ШК-1049, ШК-1051, ШК-1041.', 'Модульна система\r\nСПАЛЬНЕ МІСЦЕ За вибором\r\nМАТЕРІА ЛМДФ\r\nМАЛЮНОК Однотонний', '4', 25595, 'product17.jpg', 0, 0, 4, '2', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`typeId`, `name`) VALUES
(1, 'Ліжко'),
(2, 'Дитячі дивани'),
(3, 'Дитячі шафи та стелажі'),
(4, 'Дитячі кімнати');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;