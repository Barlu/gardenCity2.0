-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2015 at 02:48 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gardencity2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bags`
--

CREATE TABLE IF NOT EXISTS `bags` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bags`
--

INSERT INTO `bags` (`id`) VALUES
(14),
(15),
(16);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image_id`, `heading`, `caption`, `link`) VALUES
(54, 122, NULL, NULL, NULL),
(55, 123, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  `user_data` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4d97ca42b850fc453ee7de7537dbc2ca', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1430793905, 'a:6:{s:9:"user_data";s:0:"";s:8:"usertype";s:6:"public";s:15:"production_week";s:2:"20";s:15:"production_year";s:4:"2015";s:6:"userid";i:8;s:13:"cart_contents";a:5:{s:32:"3f6a7b4cef2eed68efe918d8ba04b2c0";a:7:{s:5:"rowid";s:32:"3f6a7b4cef2eed68efe918d8ba04b2c0";s:2:"id";i:15;s:3:"qty";s:1:"1";s:5:"price";s:2:"30";s:4:"name";s:6:"Medium";s:7:"options";a:2:{s:4:"type";s:3:"Bag";s:13:"quantity-type";i:13;}s:8:"subtotal";i:30;}s:32:"a03243e2bdeb177c3f106618d7c112bc";a:7:{s:5:"rowid";s:32:"a03243e2bdeb177c3f106618d7c112bc";s:2:"id";i:18;s:3:"qty";s:1:"1";s:5:"price";s:3:"1.3";s:4:"name";s:7:"Bananas";s:7:"options";a:2:{s:4:"type";s:7:"Produce";s:13:"quantity-type";i:10;}s:8:"subtotal";d:1.3000000000000000444089209850062616169452667236328125;}s:32:"c427e59049ed53acce79c1470f280bbc";a:7:{s:5:"rowid";s:32:"c427e59049ed53acce79c1470f280bbc";s:2:"id";i:17;s:3:"qty";s:1:"7";s:5:"price";s:3:"1.2";s:4:"name";s:6:"Apples";s:7:"options";a:2:{s:4:"type";s:7:"Produce";s:13:"quantity-type";i:8;}s:8:"subtotal";d:8.4000000000000003552713678800500929355621337890625;}s:11:"total_items";i:9;s:10:"cart_total";d:39.7000000000000028421709430404007434844970703125;}}');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `file` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateAdded` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `image_id`, `name`, `description`, `file`, `dateAdded`, `type`) VALUES
(27, 95, 'November 2014', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere, nunc vitae faucibus pharetra, nibh urna faucibus sapien, at egestas mauris dolor eget massa. Sed ornare mi sed enim egestas, vel porttitor mauris blandit. Morbi posuere, felis ornare tincidunt fringilla, metus neque pretium mauris, vel hendrerit metus ex non magna. Suspendisse tristique lectus magna, ut placerat libero ullamcorper a. Phasellus egestas quis dui in ultricies. Aliquam mauris ante, efficitur eget vehicula at, elementum sed sem. Nullam dui risus, faucibus dictum vulputate sit amet, luctus ac leo. Sed venenatis turpis at lorem pulvinar consectetur. Maecenas id tellus blandit, porta massa eget, fringilla nisi.\r\n\r\nAliquam convallis mauris tempor euismod convallis. Suspendisse lectus sem, vulputate a bibendum sit amet, euismod vitae augue. Curabitur eget consequat ipsum. Fusce congue mattis justo, eget dignissim felis congue non. Maecenas bibendum metus vitae diam pharetra vulputate. Aliquam ut pellentesque tortor. In hac habitasse platea dictumst. Sed ligula lacus, aliquet rutrum iaculis sed, auctor at erat. Etiam et dui ligula. Nulla facilisi. Morbi luctus, tortor at dignissim finibus, tellus nibh gravida purus, vel fermentum ipsum ex facilisis nisl. Aliquam a tristique neque, ac euismod tortor. Mauris sed tristique elit, sed euismod risus. Vestibulum dictum ac tortor ac condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis imperdiet, lorem in tempor rhoncus, purus lectus ultricies dolor, id pulvinar arcu nisl congue enim.\r\n\r\nCurabitur ac condimentum lacus, sit amet gravida quam. Sed nec neque facilisis, porta libero a, ultricies magna. Donec accumsan, tortor aliquet scelerisque viverra, urna ipsum porta eros, quis feugiat est mauris nec erat. Proin dignissim elit in felis pharetra commodo. Nunc mollis velit vel consectetur maximus. Maecenas in lobortis ex. Integer volutpat ante sit amet sem tristique elementum. Integer orci eros, mattis at ligula eu, volutpat pretium arcu. Nullam gravida, lorem nec sagittis tempor, nulla metus viverra lectus, id vulputate dui ex sed metus. Maecenas scelerisque finibus libero, eu condimentum lectus dignissim sit amet. Curabitur at nisl elit.', NULL, 1430394813, 'newsletter'),
(29, 97, 'December 2014', 'asbasdbasdbasdb', NULL, 1430394955, 'newsletter'),
(31, 99, 'Kale Chips', 'Another veg we are seeing a lot of this time in the summer is kale. Kale is a super versatile vegetable\r\n– great for salads (try massaging the leaves in a lemon-based vinaigrette dressing for a few minutes –\r\nit breaks down the stiff fibres in the kale) - delicious sautéed with some olive oil, garlic and a few\r\nchilli flakes - and great when stirred through other dishes or soups. But there is only so much kale\r\nyou can eat in a week. So if you have a bit of a glut, here is a delicious way of extending the life of\r\nyour kale.\r\nThese chips are a favourite snack in our house and we go through them as quickly as I make them. In\r\nfact the bowl in the photo barely lasted long enough to get the shot. They will however, stay fresh in\r\na well-sealed container for up to two weeks. The key things to bear in mind when making kale ships\r\nare: (1) the kale must be impeccably dry before you start; (2) the olive oil must be distributed evenly\r\non all the chips; and (3) watch them very carefully towards the end of the cooking time. They turn\r\nfrom perfectly crisp to scorched and inedible in seconds. And you do not want a house filled with the\r\nsmell of burnt kale. Trust me on that one.', 'http://localhost/gardenCity2/uploads/files/recipes/Kale-chips.pdf', 1430723852, 'recipe'),
(32, 100, 'Roasted Radishes', 'Radishes seem to be doing particularly well this summer. They haven’t fared too well in our garden\r\nthough. Our one year old Labrador has been digging them up and eating them under the cloak of\r\ndarkness each night as quickly as they mature, so I was pleased to see so many in my produce bag\r\nthis week.\r\nMost people associate radishes with salad. Their peppery crunch does add a certain oomph to the\r\nold greens, but don’t restrict yourself to just munching them raw – radishes are great roasted too.\r\nAnd for those who find their peppery bite a bit too strong, the roasting process really mellows them;\r\nit brings out a whole new side to these familiar vegetables. With a taste not dissimilar to roast\r\nturnips or swede, roasted radishes have a very different texture than their fresh counterpart. They\r\nretain their high water content, so be careful when you bite into one as the hot liquid can be a bit of\r\na hazard for the unaware.', 'http://localhost/gardenCity2/uploads/files/recipes/Roasted-Radishes.pdf', 1430724635, 'recipe'),
(33, 101, 'Potato and Bean Curry', 'When our children were younger, we lived in Fiji for many years. Learning about the variety of\r\ncuisines that make up “Fijian food” was a revelation. Along with traditional Fijian food, there is\r\nwonderful Chinese-Fijian cuisine, adaptations of European cuisine using local ingredients, new\r\n“Pacific cuisine” and of course Indian inspired dishes.\r\nThe Indo-Fijian cuisine is absolutely amazing (make sure you visit a local curry house if you are in\r\nFiji!), and it is something we came to make at home regularly, as we continue to do here in\r\nChristchurch. This curry is a great way to take advantage of summer produce such as new season\r\npotatoes and beans. It is also very adaptable – it can be made with just potatoes or you can\r\nsubstitute cauliflower for the potatoes. You could also swap in a leafy greens (such as shredded\r\nsilver beet , spinach or kale) for the beans - whatever strikes your fancy, or in my case whatever is in\r\nseason and I have in the fridge on the day.\r\nI know it sounds like a lot of butter or oil in the dish, but don’t scrimp. The oil is an important carrier\r\nof the flavours, and you will also need that amount to properly temper the spices. The amount of\r\nwater you add will vary depending on how much liquid the potatoes absorb, the size of your pan and\r\nhow well the lid fits. So start with the recommended amount and add more as appropriate. This is a\r\n“dry” curry, so you want enough to steam the veggies, but not so much that it is soupy.', 'http://localhost/gardenCity2/uploads/files/recipes/Potato-and-Bean-Curry-raita_recipes.pdf', 1430725062, 'recipe'),
(34, 102, 'Beetroot Raita', 'This is worth making for the colour alone. But I find that the earthy sweetness of the beetroot\r\ncomplements curries beautifully. And it''s a great way of using up all those beetroots from your\r\nGarden City 2.0 organics bag!', 'http://localhost/gardenCity2/uploads/files/recipes/Potato-and-Bean-Curry-raita_recipes1.pdf', 1430725242, 'recipe');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Table structure for table `deliverypoints`
--

CREATE TABLE IF NOT EXISTS `deliverypoints` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `day` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeFrom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeTo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deliverypoints`
--

INSERT INTO `deliverypoints` (`id`, `name`, `description`, `day`, `timeFrom`, `timeTo`, `address`) VALUES
(3, 'Harriot', 'Come round the back.....i dare you.', '4', '15:30', '17:30', '230 Centaurus Road, St Martins'),
(4, 'Mashvin', 'DO it', '2', '13:30', '16:30', '16 Derrett Place, St Martins');

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE IF NOT EXISTS `extra` (
`id` int(11) NOT NULL,
  `frequency` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `extra_product`
--

CREATE TABLE IF NOT EXISTS `extra_product` (
  `extra_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallerys`
--

CREATE TABLE IF NOT EXISTS `gallerys` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gallerys`
--

INSERT INTO `gallerys` (`id`, `name`, `description`) VALUES
(1, 'First new gallery', 'Die pooped'),
(2, 'FARMS', 'DAFBNSDFN');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `location` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=130 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `location`, `title`) VALUES
(83, NULL, 'http://localhost/gardenCity2/uploads/images/fresh-vegetables-in-basket-248867.jpg', 'Food Bag'),
(84, NULL, 'http://localhost/gardenCity2/uploads/images/fresh-vegetables-in-basket-248867.jpg', 'Food Bag'),
(85, NULL, 'http://localhost/gardenCity2/uploads/images/fresh-vegetables-in-basket-248867.jpg', 'Food Bag'),
(86, NULL, 'http://localhost/gardenCity2/uploads/images/Granny_Smith_Apples_002.jpg', 'Granny Smith Apples'),
(87, NULL, 'http://localhost/gardenCity2/uploads/images/bananas-Hd-wallpaper11.jpeg', 'Lady Finger Bananas'),
(88, NULL, NULL, 'Cat-time'),
(90, 1, 'http://localhost/gardenCity2/uploads/images/Space-Art-Wallpaper.jpg', ''),
(95, NULL, 'http://localhost/gardenCity2/uploads/images/newsletters/Space-Art-Wallpaper14.jpg', 'Cramberry'),
(97, NULL, 'http://localhost/gardenCity2/uploads/images/newsletters/Desert2.jpg', 'Dessert'),
(99, NULL, 'http://localhost/gardenCity2/uploads/images/recipes/Kale_Chips_(3425805140).jpg', 'Kale Chips'),
(100, NULL, 'http://localhost/gardenCity2/uploads/images/recipes/img_9902.jpg', 'Roasted Radishes'),
(101, NULL, 'http://localhost/gardenCity2/uploads/images/recipes/img_0112-potato-and-green-bean-curry.jpg', 'Potato and Bean Curry'),
(102, NULL, 'http://localhost/gardenCity2/uploads/images/recipes/IMG_2947.JPG', 'Beetroot Raita'),
(103, NULL, 'http://localhost/gardenCity2/uploads/images/products/rsz_001_10447509large.jpg', 'Detroit Dark Red Beet Root'),
(104, NULL, 'http://localhost/gardenCity2/uploads/images/products/Iceberg-Lettuce.jpg', 'Iceberg Lettuce'),
(122, NULL, 'http://localhost/gardenCity2/uploads/images/location_farming2025.jpg', ''),
(123, NULL, 'http://localhost/gardenCity2/uploads/images/green-field-farming.png', ''),
(124, 2, 'http://localhost/gardenCity2/uploads/images/Desert1.jpg', ''),
(125, 2, 'http://localhost/gardenCity2/uploads/images/Jellyfish1.jpg', ''),
(126, 2, 'http://localhost/gardenCity2/uploads/images/Koala1.jpg', ''),
(127, 2, 'http://localhost/gardenCity2/uploads/images/Lighthouse1.jpg', ''),
(128, 2, 'http://localhost/gardenCity2/uploads/images/Tulips1.jpg', ''),
(129, 2, 'http://localhost/gardenCity2/uploads/images/Chrysanthemum1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `lineitems`
--

CREATE TABLE IF NOT EXISTS `lineitems` (
`id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `lineitems`
--

INSERT INTO `lineitems` (`id`, `product_id`, `quantity_id`, `order_id`, `amount`) VALUES
(5, 14, 12, 3, 1),
(6, 17, 8, 3, 8),
(7, 16, 14, 4, 1),
(8, 17, 8, 4, 3),
(9, 15, 13, 5, 1),
(10, 18, 10, 5, 14),
(11, 20, 16, 5, 2),
(12, 21, 17, 5, 1),
(13, 14, 12, 6, 1),
(14, 17, 8, 6, 8),
(15, 21, 17, 6, 3),
(16, 20, 16, 6, 2),
(17, 14, 12, 7, 1),
(18, 17, 8, 7, 8),
(19, 15, 13, 9, 1),
(20, 18, 10, 9, 1),
(21, 17, 8, 9, 7);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `link`) VALUES
(27, ''),
(29, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `firstDelivery` bigint(20) NOT NULL,
  `nextDelivery` bigint(20) NOT NULL,
  `frequency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deliveryPoint_id` int(11) DEFAULT NULL,
  `extra_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `firstDelivery`, `nextDelivery`, `frequency`, `deliveryPoint_id`, `extra_id`, `user_id`) VALUES
(3, 1432123200, 1432123200, '2', 3, NULL, 4),
(4, 1432728000, 1432728000, '2', 3, NULL, 7),
(5, 1432123200, 1432123200, '2', 3, NULL, NULL),
(6, 1431345600, 1431345600, '2', 4, NULL, NULL),
(7, 1432728000, 1432728000, '2', 3, NULL, NULL),
(8, 1432728000, 1432728000, '2', 3, NULL, NULL),
(9, 1433332800, 1433332800, '1', 3, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE IF NOT EXISTS `preferences` (
`id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prefer` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `product_id`, `user_id`, `prefer`) VALUES
(4, 18, 7, 0),
(13, 17, 4, 1),
(14, 21, 4, 0),
(15, 17, 8, 1),
(16, 21, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
`id` int(11) NOT NULL,
  `quantity_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `quantity_id`, `type`, `amount`) VALUES
(8, 9, 'wholesale', 29.9),
(9, 8, 'wholesale', 1),
(10, 9, 'public', 32.9),
(11, 8, 'public', 1.2),
(12, 10, 'wholesale', 0.99),
(13, 10, 'public', 1.3),
(14, 11, 'public', 7),
(15, 10, 'public', 0),
(16, 11, 'wholesale', 4.99),
(17, 12, 'public', 20),
(18, 13, 'public', 30),
(19, 14, 'public', 40),
(20, 16, 'public', 1.2),
(21, 17, 'public', 3.75);

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE IF NOT EXISTS `produce` (
  `id` int(11) NOT NULL,
  `variety` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`id`, `variety`, `status`) VALUES
(17, 'Granny Smith', 0),
(18, 'Lady Finger', 0),
(20, 'Detroit Dark Red', 0),
(21, 'Iceberg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image_id`, `name`, `description`, `type`) VALUES
(14, 83, 'Small', 'Cras malesuada laoreet odio. Pellentesque egestas leo et augue accumsan, at accumsan purus elementum. Duis consequat dictum dui at ultrices. Nam vel nisi eget augue euismod maximus. Pellentesque at enim a enim convallis posuere. Morbi ut sollicitudin mauris. Vivamus suscipit est quam, nec malesuada erat tristique eget. Suspendisse potenti. Vestibulum cursus libero aliquam risus feugiat tincidunt. Maecenas mattis auctor libero et lobortis.', 'bag'),
(15, 84, 'Medium', 'Cras malesuada laoreet odio. Pellentesque egestas leo et augue accumsan, at accumsan purus elementum. Duis consequat dictum dui at ultrices. Nam vel nisi eget augue euismod maximus. Pellentesque at enim a enim convallis posuere. Morbi ut sollicitudin mauris. Vivamus suscipit est quam, nec malesuada erat tristique eget. Suspendisse potenti. Vestibulum cursus libero aliquam risus feugiat tincidunt. Maecenas mattis auctor libero et lobortis.', 'bag'),
(16, 85, 'Large', 'Cras malesuada laoreet odio. Pellentesque egestas leo et augue accumsan, at accumsan purus elementum. Duis consequat dictum dui at ultrices. Nam vel nisi eget augue euismod maximus. Pellentesque at enim a enim convallis posuere. Morbi ut sollicitudin mauris. Vivamus suscipit est quam, nec malesuada erat tristique eget. Suspendisse potenti. Vestibulum cursus libero aliquam risus feugiat tincidunt. Maecenas mattis auctor libero et lobortis.', 'bag'),
(17, 86, 'Apples', 'Cras malesuada laoreet odio. Pellentesque egestas leo et augue accumsan, at accumsan purus elementum. Duis consequat dictum dui at ultrices. Nam vel nisi eget augue euismod maximus. Pellentesque at enim a enim convallis posuere. Morbi ut sollicitudin mauris. Vivamus suscipit est quam, nec malesuada erat tristique eget. Suspendisse potenti. Vestibulum cursus libero aliquam risus feugiat tincidunt. Maecenas mattis auctor libero et lobortis.', 'produce'),
(18, 87, 'Bananas', 'Cras malesuada laoreet odio. Pellentesque egestas leo et augue accumsan, at accumsan purus elementum. Duis consequat dictum dui at ultrices. Nam vel nisi eget augue euismod maximus. Pellentesque at enim a enim convallis posuere. Morbi ut sollicitudin mauris. Vivamus suscipit est quam, nec malesuada erat tristique eget. Suspendisse potenti. Vestibulum cursus libero aliquam risus feugiat tincidunt. Maecenas mattis auctor libero et lobortis.', 'produce'),
(20, 103, 'Beetroot', 'The most popular beet, Detroit is the standard, all-purpose red beet seed; uniform and smooth, blood red flesh.', 'produce'),
(21, 104, 'Lettuce', 'Etiam cursus massa sed ex lobortis, sed scelerisque dui porta. Etiam id rhoncus erat. Aenean tincidunt neque nisi, et tristique arcu rutrum eu. Nam maximus rutrum ligula, ac eleifend velit. Mauris vestibulum mattis nunc, vitae rhoncus tellus volutpat et. Suspendisse potenti.', 'produce');

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

CREATE TABLE IF NOT EXISTS `quantities` (
`id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`id`, `product_id`, `name`, `description`, `value`) VALUES
(8, 17, 'Each', '', 120),
(9, 17, 'Box', '', 1560),
(10, 18, 'Each', '', 120),
(11, 18, 'Bunch', '', 500),
(12, 14, 'Each', '', 0),
(13, 15, 'Each', '', 0),
(14, 16, 'Each', '', 0),
(16, 20, 'Each', '', 120),
(17, 21, 'Each', '', 300);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`) VALUES
(31),
(32),
(33),
(34);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_product`
--

CREATE TABLE IF NOT EXISTS `recipe_product` (
  `recipe_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `phone`, `email`, `discount`, `role`) VALUES
(1, 'Admin', 'janice321', 'Emmett', 'Newman', '9801342', NULL, NULL, 'public'),
(2, 'dgsdg', 'asdgasdg', 'dg', 'gsdgas', 'asdgasd', NULL, NULL, 'public'),
(3, 'zxcbzx', 'zbxcbz', 'vzcxb', 'zxcbzxcb', 'cbxzcbzx', NULL, NULL, 'public'),
(4, 'Barlu', 'janice321', '', '', '', NULL, NULL, 'public'),
(5, 'Barlu', 'janice321', '', '', '', NULL, NULL, 'public'),
(6, 'Barlu', 'janice321', '', '', '', NULL, NULL, 'public'),
(7, 'asvfasdvsd', '', 'sdfbfbdf', 'basdfbsdf', 'bsdf', '', NULL, 'public'),
(8, 'sdgasd', 'asdg', 'dgqsdg', 'asdgasdg', 'asdg', 'asdg', NULL, 'public');

-- --------------------------------------------------------

--
-- Table structure for table `wholesalers`
--

CREATE TABLE IF NOT EXISTS `wholesalers` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bags`
--
ALTER TABLE `bags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_6F9DB8E73DA5256D` (`image_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_FEC530A93DA5256D` (`image_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverypoints`
--
ALTER TABLE `deliverypoints`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_product`
--
ALTER TABLE `extra_product`
 ADD PRIMARY KEY (`extra_id`,`order_id`), ADD KEY `IDX_B91034F2B959FC6` (`extra_id`), ADD KEY `IDX_B91034F8D9F6D38` (`order_id`);

--
-- Indexes for table `gallerys`
--
ALTER TABLE `gallerys`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_E01FBE6A4E7AF8F` (`gallery_id`);

--
-- Indexes for table `lineitems`
--
ALTER TABLE `lineitems`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_F6B7458B4584665A` (`product_id`), ADD KEY `IDX_F6B7458B7E8B4AFC` (`quantity_id`), ADD KEY `IDX_F6B7458B8D9F6D38` (`order_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_E52FFDEE2B959FC6` (`extra_id`), ADD UNIQUE KEY `UNIQ_E52FFDEEA76ED395` (`user_id`), ADD KEY `IDX_E52FFDEE4708F257` (`deliveryPoint_id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_E931A6F54584665A` (`product_id`), ADD KEY `IDX_E931A6F5A76ED395` (`user_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_E4CB6D597E8B4AFC` (`quantity_id`);

--
-- Indexes for table `produce`
--
ALTER TABLE `produce`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_B3BA5A5A3DA5256D` (`image_id`);

--
-- Indexes for table `quantities`
--
ALTER TABLE `quantities`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_F1B1B53C4584665A` (`product_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_product`
--
ALTER TABLE `recipe_product`
 ADD PRIMARY KEY (`recipe_id`,`product_id`), ADD KEY `IDX_9D774BA959D8A214` (`recipe_id`), ADD KEY `IDX_9D774BA94584665A` (`product_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholesalers`
--
ALTER TABLE `wholesalers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `deliverypoints`
--
ALTER TABLE `deliverypoints`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `extra`
--
ALTER TABLE `extra`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallerys`
--
ALTER TABLE `gallerys`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `lineitems`
--
ALTER TABLE `lineitems`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `quantities`
--
ALTER TABLE `quantities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
ADD CONSTRAINT `FK_A2E0150FBF396750` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bags`
--
ALTER TABLE `bags`
ADD CONSTRAINT `FK_1ACE9C65BF396750` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
ADD CONSTRAINT `FK_6F9DB8E73DA5256D` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
ADD CONSTRAINT `FK_FEC530A93DA5256D` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
ADD CONSTRAINT `FK_62534E21BF396750` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `extra_product`
--
ALTER TABLE `extra_product`
ADD CONSTRAINT `FK_B91034F2B959FC6` FOREIGN KEY (`extra_id`) REFERENCES `extra` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_B91034F8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
ADD CONSTRAINT `FK_E01FBE6A4E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallerys` (`id`);

--
-- Constraints for table `lineitems`
--
ALTER TABLE `lineitems`
ADD CONSTRAINT `FK_F6B7458B4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
ADD CONSTRAINT `FK_F6B7458B7E8B4AFC` FOREIGN KEY (`quantity_id`) REFERENCES `quantities` (`id`),
ADD CONSTRAINT `FK_F6B7458B8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `newsletters`
--
ALTER TABLE `newsletters`
ADD CONSTRAINT `FK_8ECF000CBF396750` FOREIGN KEY (`id`) REFERENCES `content` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `FK_E52FFDEE2B959FC6` FOREIGN KEY (`extra_id`) REFERENCES `extra` (`id`),
ADD CONSTRAINT `FK_E52FFDEE4708F257` FOREIGN KEY (`deliveryPoint_id`) REFERENCES `deliverypoints` (`id`),
ADD CONSTRAINT `FK_E52FFDEEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
ADD CONSTRAINT `FK_E931A6F54584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
ADD CONSTRAINT `FK_E931A6F5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
ADD CONSTRAINT `FK_E4CB6D597E8B4AFC` FOREIGN KEY (`quantity_id`) REFERENCES `quantities` (`id`);

--
-- Constraints for table `produce`
--
ALTER TABLE `produce`
ADD CONSTRAINT `FK_B9FA245FBF396750` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `FK_B3BA5A5A3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `quantities`
--
ALTER TABLE `quantities`
ADD CONSTRAINT `FK_F1B1B53C4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
ADD CONSTRAINT `FK_DA88B137BF396750` FOREIGN KEY (`id`) REFERENCES `content` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_product`
--
ALTER TABLE `recipe_product`
ADD CONSTRAINT `FK_9D774BA94584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_9D774BA959D8A214` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
ADD CONSTRAINT `FK_426EF392BF396750` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wholesalers`
--
ALTER TABLE `wholesalers`
ADD CONSTRAINT `FK_61B371CBBF396750` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
