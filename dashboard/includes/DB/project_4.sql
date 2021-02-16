-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 01:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_role` varchar(10) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_role`) VALUES
(1, 'superAdmin', 'admin@orange.com', '123456', 'superAdmin'),
(3, 'laith', 'laith@orange.com', '123456789', 'admin'),
(5, 'laith2', 'laith2@orange.com', '123456789', ''),
(6, 'laith', 'laith3@test.com', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_image`) VALUES
(29, 'Plant Care and Accessories', 'admin_images/manage_category/plant-care-and-accessories.jpeg'),
(30, 'Ferns', 'admin_images/manage_category/Ferns.jpeg'),
(31, 'Indoor Plants ', 'admin_images/manage_category/Indoor-Plants.jpeg'),
(32, 'Outdoor Plants', 'admin_images/manage_category/Outdoor-Plants.jpeg'),
(33, 'Pots', 'admin_images/manage_category/Pots.jpeg'),
(34, 'Edible Plants', 'admin_images/manage_category/Edible-Plants.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_amount` float NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_address1` varchar(100) NOT NULL,
  `order_address2` varchar(100) NOT NULL,
  `order_city` varchar(100) NOT NULL,
  `order_country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_amount`, `order_date`, `order_address1`, `order_address2`, `order_city`, `order_country`) VALUES
(1, 21, 999999, '0000-00-00 00:00:00', 'marj alhamam', 'marj alhamam 2', 'amman', 'jordan'),
(2, 21, 999999, '0000-00-00 00:00:00', 'Marj alhamam', 'home #123456', 'Amman', 'jordan'),
(3, 21, 999999, '2020-12-05 12:55:19', 'Mohammad Oudeh', 'home #12222222', 'Amman', 'jordan'),
(4, 21, 999999, '2020-12-05 13:16:37', 'nora', 'anwar', 'zarqa', 'jordan'),
(5, 18, 999999, '2020-12-05 13:18:44', 'street1', 'street2', 'madaba', 'jordan');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_detail_price` float NOT NULL,
  `order_detail_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `order_detail_price`, `order_detail_quantity`) VALUES
(1, 1, 44, 3, 777777),
(2, 1, 42, 4, 777777),
(3, 1, 59, 8, 777777),
(4, 2, 44, 3, 777777),
(5, 2, 31, 20, 777777),
(6, 2, 59, 8, 777777),
(7, 3, 42, 4, 777777),
(8, 3, 43, 4, 777777),
(9, 3, 61, 8, 777777),
(10, 4, 42, 4, 777777),
(11, 4, 43, 4, 777777),
(12, 4, 60, 15, 777777),
(13, 5, 31, 20, 777777),
(14, 5, 59, 8, 777777),
(15, 5, 43, 4, 777777);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_cat` text NOT NULL,
  `cat_id` int(10) NOT NULL,
  `pro_short_desc` text NOT NULL,
  `pro_long_desc` text NOT NULL,
  `pro_price` float NOT NULL,
  `pro_special_price` float DEFAULT NULL,
  `pro_image` text NOT NULL,
  `pro_sku` varchar(50) DEFAULT NULL,
  `pro_stock` int(11) DEFAULT NULL,
  `pro_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_cat`, `cat_id`, `pro_short_desc`, `pro_long_desc`, `pro_price`, `pro_special_price`, `pro_image`, `pro_sku`, `pro_stock`, `pro_date`) VALUES
(14, ' FIDDLE LEAF FIG TREE', 'Pots', 34, ' High Light. This plant needs at least a few of hours of direct sunlight.', ' The fiddle ­leaf fig tree, or ficus lyrata, is a species of plant within the fig genus native to the lowland tropical rainforests of Western Africa. It has a broad canopy with large, rigid leaves and prefers a high light space. When cared for properly, fiddle leafs grow quickly, and a small tree can double in size in as few as six months.', 50, NULL, 'admin_images/manage_product/Calyer-34-White_4894a1ac-7fd2-4743-aed0-b96089ea4159.jpg', NULL, NULL, '2020-12-02 12:16:32'),
(15, 'FIDDLE LEAF FIG TOPIARY', 'Edible Plants', 34, 'High Light. This plant needs at least a few of hours of direct sunlight.', 'The fiddle ­leaf fig tree, or Ficus lyrata, is a species of plant within the fig genus native to the lowland tropical rainforests of Western Africa. It has a broad canopy with large, rigid leaves and prefers a high light space. When cared for properly, fiddle leafs grow quickly, and a small tree can double in size in as few as six months.', 35, 0, 'admin_images/manage_product/LBE-10-LBE-CYL-10-BLK_Fiddle-Leaf-Fig-Topiary-10.jpg', NULL, NULL, '2020-12-02 12:19:10'),
(17, 'FICUS AUDREY POLE', 'Edible Plants', 34, 'The Ficus \"Audrey\" (Ficus benghalensis) has a striking, minimalist aesthetic, with deep green velvet leaves and a white trunk that thickens as the plant matures. Also called a Banyan tree, over time these trees will send out arial roots that appear as vines.', 'The Ficus \"Audrey\" (Ficus benghalensis) has a striking, minimalist aesthetic, with deep green velvet leaves and a white trunk that thickens as the plant matures. Also called a Banyan tree, over time these trees will send out arial roots that appear as vines.\r\n\r\nCare for the Ficus Audrey is on the easier side for ficuses: it appreciates bright, indirect light and regular waterings with a dry-out period in between, similar to its close relative the Rubber Plant. The stalk usually comes staked in these younger trees to ensure straight vertical growth of the trunk.', 28, 0, 'admin_images/manage_product/LBE-10-LBE-CYL-10-BLK_Fiddle-Leaf-Fig-Topiary-19.jpg', NULL, NULL, '2020-12-02 12:23:51'),
(19, '  BIRD OF PARADISE PLANT', 'Edible Plants', 34, '  Medium Light. This plant will do best in a bright location with mostly indirect light.', 'The Bird of Paradise plant (Strelitzia nicolai) is one of the most popular house plants in the world for good reason: it is easy to care for and its large, structural leaves bring style and grace to any setting. Bird of Paradise exhibits tall stalks carrying broad green leaves with a glossy finish and often produces new leaves. It is common for older leaves to tear and curl over time. If not purchasing this lovely plant in a self-watering container, we recommend adding on a water globe to your order to help ensure moisture consistency.', 23, 0, 'admin_images/manage_product/Nursery-Pot-14_Bird-of-Paradise-14.jpg', NULL, NULL, '2020-12-02 13:07:50'),
(20, 'SCHEFFLERA AMATE ', 'Indoor Plants', 31, 'Medium Light. This plant will do best in a bright location with mostly indirect light.', 'Named after the California nurseryman Charles Amate, this fast-growing houseplant is also known as Umbrella Tree. Schefflera Amate (Schefflera actinophylla) appreciates a warm, humid environment, though this variety is more tolerant of dry air than some of its counterparts. It likes a good amount of water unless placed in lower light conditions, in which case its metabolism slows and it becomes sensitive to overwatering.', 33, 0, 'admin_images/manage_product/Pottery-Pots-Patt-XXL-Grey_Schefflera-Amate-10.jpg', NULL, NULL, '2020-12-02 13:17:25'),
(21, 'MONSTERA DELICIOSA', 'Outdoor Plants', 32, 'Our Large Monstera exibits fully mature perforation in the leaves.', 'Start your deliciosa dream small with this juvenile Monstera specimen. Its famed perforated lobes haven\'t formed yet, but don\'t worry, with some love and a little light you\'ll be in split leaf Shangri-La in no time. \r\n\r\nMonsetera deliciosa is native to the rain forests of Mexico and Central America. As a sub-canopy plant, monsteras are tolerant of lower light conditions, but will grow more quickly and evenly in bright indirect light.', 15, 0, 'admin_images/manage_product/Calyer-46-1970.046-WH_Monstera-Deliciosa-14.jpg', NULL, NULL, '2020-12-02 13:19:36'),
(22, 'PHILODENDRON CONGO GREEN', 'Outdoor Plants', 32, 'Philodendron Congo is a low-humidity tolerant hybrid variety making it a great choice for growing indoors in homes and offices. It prefers bright light and moderately moist soil and rewards regular watering with big-leaf growth.', 'Philodendron Congo is a low-humidity tolerant hybrid variety making it a great choice for growing indoors in homes and offices. It prefers bright light and moderately moist soil and rewards regular watering with big-leaf growth.', 19, 0, 'admin_images/manage_product/Terracotta-12_Philodendron-Congo-10_3a2ab1ff-9dc5-4d4e-aa7e-83f703243255.jpg', NULL, NULL, '2020-12-02 13:27:34'),
(23, 'CEREUS CACTUS (PERUVIANUS)', 'Outdoor Plants', 32, 'High Light. This plant needs at least a few of hours of direct sunlight.', 'Cereus is a genus of cacti (family Cactaceae) including around 33 species of large columnar cacti from South America. The name is derived from Greek (κηρός) and Latin words meaning \"wax\" or \"torch\". It has pale blue-green flesh and requires high light to survive.', 10, 0, 'admin_images/manage_product/Lechuza-Color-35-White_Cereus-Cactus-10.jpg', NULL, NULL, '2020-12-02 13:29:43'),
(24, 'FICUS AUDREY POLE', 'Indoor Plants', 31, 'The Ficus \"Audrey\" (Ficus benghalensis) has a striking, minimalist aesthetic, with deep green velvet leaves and a white trunk that thickens as the plant matures. Also called a Banyan tree, over time these trees will send out arial roots that appear as vines.\r\n', 'The Ficus \"Audrey\" (Ficus benghalensis) has a striking, minimalist aesthetic, with deep green velvet leaves and a white trunk that thickens as the plant matures. Also called a Banyan tree, over time these trees will send out arial roots that appear as vines.\r\n\r\nCare for the Ficus Audrey is on the easier side for ficuses: it appreciates bright, indirect light and regular waterings with a dry-out period in between, similar to its close relative the Rubber Plant. The stalk usually comes staked in these younger trees to ensure straight vertical growth of the trunk.', 19, 0, 'admin_images/manage_product/Nursery-Pot-10_78dedffb-1081-4491-827a-4f61584aaf3c.jpg', NULL, NULL, '2020-12-02 13:31:49'),
(25, 'PHILODENDRON CONGO ROJO', 'Indoor Plants', 31, 'Philodendron Congo is a low-humidity tolerant hybrid variety making it a great choice for growing indoors in homes and offices. It prefers bright light and moderately moist soil and rewards regular watering with big-leaf growth.\r\n', 'Philodendron Congo is a low-humidity tolerant hybrid variety making it a great choice for growing indoors in homes and offices. It prefers bright light and moderately moist soil and rewards regular watering with big-leaf growth.', 10, 0, 'admin_images/manage_product/Pottery-Pots-Charlie-XL-Grey_Philodendron-Rojo-Congo-10.jpg', NULL, NULL, '2020-12-02 13:35:32'),
(26, 'FICUS ELASTICA BURGUNDY', 'Indoor Plants', 31, 'High Light. This plant needs at least a few of hours of direct sunlight.', 'The rubber plant, or Ficus Elastica, is a species of plant in the fig genus native to North Eastern India and surrounding regions. This plant was dubbed “the rubber plant” due to its sticky latex sap that was discovered to dry into a low quality rubber. However, this plant is not to be confused with the more famous rubber tree, (Hevea Brasiliensis) indigenous to the Amazon region of South America.\r\n\r\nThe Ficus Elastica enjoys moderate to bright indirect sunlight. Its deep purple and green leaves have a waxy coat that provides a beautiful glossy sheen. New growth often also exhibits shades of pink within the veins, making this a colorful, yet elegant statement plant. With proper lighting and watering habits the rubber plant will grow quickly, often doubling in size within a year.', 19, 0, 'admin_images/manage_product/LBE-10-STAND-LBE-CYL-10-PCH-STAND_Rubber-Plant-10.jpg', NULL, NULL, '2020-12-02 13:37:16'),
(27, 'AGLAONEMA MARIE ', 'Indoor Plants', 31, 'Low Light. This plant can survive in low light conditions or on bright fluorescent light.', 'Aglaonema Maria is one of the easiest indoor plants to own and is tolerant of low light conditions and infrequent watering. Native to the Philippines, Aglaonema Maria has beautiful, slow-growing foliage that makes a wonderful accent to any space. This is one of only a few plants that can survive under florescent lighting alone making it a great choice for low light spaces.', 11, 0, 'admin_images/manage_product/LBE-Stand-10-White_Aglaonema-Maria-10.jpg', NULL, NULL, '2020-12-02 13:39:08'),
(28, 'MONSTERA DELICIOSA', 'Indoor Plants', 31, 'Medium Light. This plant will do best in a bright location with mostly indirect light.', 'Monsetera Deliciosa is native to the rain forests of Mexico and Central America. Its young leaves are smaller with no lobes or holes, but produce their famed perforated leaves as they mature. As a sub-canopy plant, monsteras are tolerant of lower light conditions, but will grow more quickly and evenly in bright indirect light.\r\n\r\nOur Large Monstera exibits fully mature perforation in the leaves.', 13, 0, 'admin_images/manage_product/Kent-35-3265.035-WH_Monstera-Deliciosa-10.jpg', NULL, NULL, '2020-12-02 13:42:45'),
(29, 'FICUS MOCLAME', 'Edible Plants', 34, 'High Light. This plant needs at least a few of hours of direct sunlight.', 'The Ficus \"Moclame\" has a bushy appearance that is expressed through its abundance of small, oval leaves. The small branches of this tree are most conducive to hedge pruning, and with patience its outward appearance can be highly controlled. The \"Moclame\" is a tough, adaptable member of the Ficus family that can do well in a variety of environmental conditions.', 33, 0, 'admin_images/manage_product/Calyer-46-1970.046-SA_Ficus-Moclame-14.jpg', NULL, NULL, '2020-12-02 13:49:03'),
(30, 'KENTIA PALM | 14\"', 'Indoor Plants', 31, 'Medium Light. This plant will do best in a bright location with mostly indirect light.', 'Kentia Palms (Howea forsteriana) are stately, lush plants that have been a houseplant staple for centuries. They are more tolerant of low light than most other palm species making it an ideal choice for those with lower light spaces. This palm does not tolerate over or under watering so take care to be regular and consistent when watering. Once established, Kentias are known to thrive for decades indoors, so be prepared for a long, lush, and loving relationship with this graceful plant.', 25, 19, 'admin_images/manage_product/Calyer-46-1970.046-BL_Kentia-Palm-14.jpg', NULL, NULL, '2020-12-02 13:55:34'),
(31, 'FICUS AUDREY TOPIARY', 'Outdoor Plants', 32, 'High Light. This plant needs at least a few of hours of direct sunlight.', 'The Ficus \"Audrey\" (Ficus benghalensis) has a striking, minimalist aesthetic, with deep green velvet', 20, 14, 'admin_images/manage_product/Nursery-Pot-10_Ficus-Audrey-Tree-10.jpg', NULL, NULL, '2020-12-02 13:57:06'),
(32, 'AERATION STONE', 'Plant Care and Accessories		\r\n', 29, 'Aeration stones promote healthy root growth by creating air pockets in the soil and absorbing excess water in the basin of your planter. These porous clay stones are a natural, efficient and invaluable material to set your plant up for success.\r\n\r\n', 'Aeration stones promote healthy root growth by creating air pockets in the soil and absorbing excess', 11, 0, 'admin_images/manage_product/Greenery-Unlimited-Aeration-Stones.jpg', NULL, NULL, '2020-12-02 13:59:39'),
(34, 'FOX FARM OCEAN ', 'Plant Care and Accessories', 29, 'After having worked with dozens of different types of soil for indoor plants, this is the one we settled on. Fox Farm Ocean Forest contains all the features we look for when trying to guarantee the long term health of a plant: excellent water retention, breathability, texture, and made from organic materials.\r\n', 'After having worked with dozens of different types of soil for indoor plants, this is the one we settled on. Fox Farm Ocean Forest contains all the features we look for when trying to guarantee the long term health of a plant: excellent water retention, breathability, texture, and made from organic materials', 10, 0, 'admin_images/manage_product/Fox-Farm-Ocean-Forest.jpg', NULL, NULL, '2020-12-02 14:02:00'),
(35, 'ORGANIC POTTING ', 'Plant Care and Accessories', 29, 'This organic potting soil contains fertilizers from the forest and sea floors and can be used for indoor and outdoor container planting. A light and well-aerated blend, this soil is loaded with nutrients to help your plants thrive.\r\n\r\n', 'This organic potting soil contains fertilizers from the forest and sea floors and can be used for indoor and outdoor container planting. A light and well-aerated blend, this soil is loaded with nutrients to help your plants thrive.\r\n\r\n', 3, 0, 'admin_images/manage_product/Greenery-Unlimited-Potting-Soil.jpg', NULL, NULL, '2020-12-02 14:07:24'),
(36, 'SOIL SLEUTH SOIL PROBE', 'Plant Care and Accessories', 29, 'Using the Soil Sleuth aerates the soil as it checks for moisture. Plants do poorly without air to the roots. Overwatering causes the air to be pushed out of the soil, compacting the soil around the waterlogged roots of the plant, therefore suffocating the plant and causing it to die a slow, unsightly death. Detect a difference in the health of your plants with SOIL SLEUTH.\r\n\r\n', 'Using the Soil Sleuth aerates the soil as it checks for moisture. Plants do poorly without air to the roots. Overwatering causes the air to be pushed out of the soil, compacting the soil around the waterlogged roots of the plant, therefore suffocating the plant and causing it to die a slow, unsightly death. Detect a difference in the health of your plants with SOIL SLEUTH.\r\n\r\n', 7, 0, 'admin_images/manage_product/product_shot_soil-sleuth.jpg', NULL, NULL, '2020-12-02 14:09:51'),
(37, 'WATERING GLOBE', 'Plant Care and Accessories', 29, 'Watering globes help keep moisture levels of potted plants consistent, extending the amount of time between waterings and counteracting the drying effects of heat and air conditioning. Watering globes aren’t a stand-in for regular watering and plant care, but they can help promote good plant health and reduce maintenance.\r\n', 'Watering globes help keep moisture levels of potted plants consistent, extending the amount of time between waterings and counteracting the drying effects of heat and air conditioning. Watering globes aren’t a stand-in for regular watering and plant care, but they can help promote good plant health and reduce maintenance.\r\n\r\nThe rate at which your watering globe drains is dependent on plant needs and the condition of your soil. We recommend watering your plant and refilling the globe at the same time. You’ll see that the water level on the globe does not decrease right away as the soil is moist, but over time the soil will begin to absorb water from the globe', 4, 0, 'admin_images/manage_product/Water-Ball-1.jpg', NULL, NULL, '2020-12-02 14:11:06'),
(38, ' CORK MATS', 'Plant Care and Accessories', 29, ' Made of absorbent natural corkProtects furniture and floors from scratches and moistureHIGHLY RECOMMENDED for use with planters made from organic materials such as ceramic', 'FEATURES\r\n\r\nMade of absorbent natural cork\r\nProtects furniture and floors from scratches and moisture\r\nHIGHLY RECOMMENDED for use with planters made from organic materials such as ceramic', 1, 0, 'admin_images/manage_product/12-cork-mat.jpg', NULL, NULL, '2020-12-02 14:12:09'),
(39, 'BONIDE READY-TO-USE NEEM OIL', 'Plant Care and Accessories', 29, 'Neem Oil Ready To Use is an all purpose insecticide, miticide, fungicide for organic gardening. Derived from the Neem seed, Neem Oil is an excellent choice for use on virtually any plant, including roses, flowers, vegetables, herbs, spices, houseplants, trees, turf and shrubs. Kills all stages of insects; eggs, larvae and adults. Makes a great dormant spray.\r\n', 'Neem Oil Ready To Use is an all purpose insecticide, miticide, fungicide for organic gardening. Derived from the Neem seed, Neem Oil is an excellent choice for use on virtually any plant, including roses, flowers, vegetables, herbs, spices, houseplants, trees, turf and shrubs. Kills all stages of insects; eggs, larvae and adults. Makes a great dormant spray.\r\n', 9, 0, 'admin_images/manage_product/Neem-Oil.jpg', NULL, NULL, '2020-12-02 14:13:41'),
(40, 'WATERING CAN ROUND', 'Plant Care and Accessories', 29, 'Simple, sleek and modern, this matte black metal watering can is a perfect blend of form and function. Watering your houseplants never looked so good!', 'This simple matte white round planter contains a water reservoir that supplies water to your plants as needed which allows for longer stretches of time between watering meaning less maintenance for you. You can easily monitor the water reservoir levels with the planter’s water-level indicator, which shows when the reservoir needs to be refilled.\r\n\r\n \r\n\r\nSimple in design yet advanced in functionality, the Classico takes the guess work out of when to water your plants\r\nComes equipped with a water-level indicator that lets you know when it is time to refill\r\n\r\nElegant matte white finish made out of recyclable, shatterproof plastic\r\nMedium measures 13.6×12.8″, Large measures 16×17″', 9, 0, 'admin_images/manage_product/Watering-Can_6357969d-e441-4033-9b12-633d973bde13.jpg', NULL, NULL, '2020-12-02 14:18:36'),
(41, 'Lechuza Classico Color ', 'Pots', 33, 'This simple matte white round planter contains a water reservoir that supplies water to your plants as needed which allows for longer stretches of time between watering meaning less maintenance for you. You can easily monitor the water reservoir levels with the planter’s water-level indicator, which shows when the reservoir needs to be refilled.\r\n\r\n', 'This simple matte white round planter contains a water reservoir that supplies water to your plants as needed which allows for longer stretches of time between watering meaning less maintenance for you. You can easily monitor the water reservoir levels with the planter’s water-level indicator, which shows when the reservoir needs to be refilled.\r\n\r\nFEATURES\r\n\r\nElegant matte finish made out of recyclable, shatterproof plastic.\r\nMeasures 10.8\" W x 10.2\" H. Will fit a plant in a standard 8\" nursery pot. ', 11, 0, 'admin_images/manage_product/lechuza-color-28-slate.jpg', NULL, NULL, '2020-12-02 14:23:08'),
(42, 'Azteca Pot ', 'Plant Care and Accessories', 29, 'This beautiful and artful pot has smooth blue and black glazed stripes along the rim and a rough textured terracotta base. This mix of matte and shine on a footed planter is a beautiful way to bring color and texture to a desk, table or shelf.', 'This beautiful and artful pot has smooth blue and black glazed stripes along the rim and a rough textured terracotta base. This mix of matte and shine on a footed planter is a beautiful way to bring color and texture to a desk, table or shelf.', 15, 12, 'admin_images/manage_product/Stripes-4_PO-4.jpg', NULL, NULL, '2020-12-02 14:30:31'),
(43, 'Chive Cube & Saucer Planter - Azure ', 'Plant Care and Accessories', 29, 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 4, 3, 'admin_images/manage_product/Chive-Cube-and-Saucer-Azure_PO-4.jpg', NULL, NULL, '2020-12-02 14:32:17'),
(44, 'Chive Cube & Saucer Planter - Sunbeam ', 'Plant Care and Accessories', 29, 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 17, 11, 'admin_images/manage_product/Chive-Cube-and-Saucer-Sunbeam_PO-4.jpg', NULL, NULL, '2020-12-02 14:33:21'),
(45, 'Chive Cube & Saucer Planter - White ', 'Plant Care and Accessories', 29, 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.', 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 11, 0, 'admin_images/manage_product/Chive-Cube-and-Saucer-White_PO-4.jpg', NULL, NULL, '2020-12-02 14:46:27'),
(47, 'TERRACOTTA POT AND SAUCER: 6 1/2\"', 'Pots', 33, 'This vessel is a simple take on the classic growers pot. Terra cotta has been successfully used to grow plants for thousands of years. Porous clay absorbs moisture and allows for root aeration. It has been shown to balance pH levels which is helpful in areas with hard water. Each planter features a central drainage hole and comes with a matching saucer to catch excess water. A cork mat is recommended if placing clay pots directly on wood flooring.', 'This vessel is a simple take on the classic growers pot. Terra cotta has been successfully used to grow plants for thousands of years. Porous clay absorbs moisture and allows for root aeration. It has been shown to balance pH levels which is helpful in areas with hard water. Each planter features a central drainage hole and comes with a matching saucer to catch excess water. A cork mat is recommended if placing clay pots directly on wood flooring.\r\n\r\n', 5, 0, 'admin_images/manage_product/Terracotta-Pot-6.jpg', NULL, NULL, '2020-12-02 14:52:01'),
(48, 'TERRACOTTA POT AND SAUCER: 45\"', 'Pots', 33, 'This vessel is a simple take on the classic growers pot. Terra cotta has been successfully used to grow plants for thousands of years. Porous clay absorbs moisture and allows for root aeration. It has been shown to balance pH levels which is helpful in areas with hard water. Each planter features a central drainage hole and comes with a matching saucer to catch excess water. A cork mat is recommended if placing clay pots directly on wood flooring.', 'This vessel is a simple take on the classic growers pot. Terra cotta has been successfully used to grow plants for thousands of years. Porous clay absorbs moisture and allows for root aeration. It has been shown to balance pH levels which is helpful in areas with hard water. Each planter features a central drainage hole and comes with a matching saucer to catch excess water. A cork mat is recommended if placing clay pots directly on wood flooring.\r\n\r\n', 4, 0, 'admin_images/manage_product/Terracotta-Pot-6.jpg', NULL, NULL, '2020-12-02 14:52:51'),
(49, 'This vessel is a simple take on the classic growers pot. Terra cotta has been successfully used to g', 'Pots', 33, 'The Speckled Chalice planter is an elegant vessel with natural tones. Glazed white along the rim with a cream speckled base, this planter has a sensual and homey feel that sits well on mantles, shelves and tabletops.', 'The Speckled Chalice planter is an elegant vessel with natural tones. Glazed white along the rim with a cream speckled base, this planter has a sensual and homey feel that sits well on mantles, shelves and tabletops.\r\n\r\n', 5, 0, 'admin_images/manage_product/Speckled-Chalice-4_PO-4.jpg', NULL, NULL, '2020-12-02 14:54:00'),
(50, 'Polka Dot Cup ', 'Pots', 33, 'Festive and fun, this small polka dot planter adds a pop to any space. Made from stoneware ceramic, the planter is a soft white  with gold dots.', 'Festive and fun, this small polka dot planter adds a pop to any space. Made from stoneware ceramic, the planter is a soft white  with gold dots.\r\n\r\n', 5, 0, 'admin_images/manage_product/Polka-Dot-Cup-4_PO-4.jpg', NULL, NULL, '2020-12-02 14:57:03'),
(51, 'Matte Black Ceramic Cylinder ', 'Pots', 33, 'This simple ceramic cylinder is a great accent to any space. A smooth matte black finish and sleek design make it a great stand alone planter, or easy to mix and match with others.', 'This simple ceramic cylinder is a great accent to any space. A smooth matte black finish and sleek design make it a great stand alone planter, or easy to mix and match with others.\r\n\r\n', 5, 0, 'admin_images/manage_product/Cylinder-4-Black_PO-4.jpg', NULL, NULL, '2020-12-02 14:59:02'),
(52, ' Ladder Vayu Tabletop Planter', 'Pots', 33, 'A sculpture in itself, this ceramic planter is a tabletop version of the Vayu floor planter.  Realized in matte, sand-colored stoneware and pink porcelain the qualities of the materials create sculptural forms that are both beautiful and useful in the home. Made in Greenpoint, Brooklyn.', 'A sculpture in itself, this ceramic planter is a tabletop version of the Vayu floor planter.  Realized in matte, sand-colored stoneware and pink porcelain the qualities of the materials create sculptural forms that are both beautiful and useful in the home. Made in Greenpoint, Brooklyn.\r\n\r\n', 5, 0, 'admin_images/manage_product/Light-Ladder-Vayu_f9a28024-00a6-449e-a5b8-0373d707e598.jpg', NULL, NULL, '2020-12-02 15:01:12'),
(53, 'Jupiter Ceramic Planter: Small ', 'Pots', 33, '5.5 ” W x 4” H\r\n', '5.5 ” W x 4” H\r\n', 5, 0, 'admin_images/manage_product/Jupiter-Planter-4_PO-4.jpg', NULL, NULL, '2020-12-02 15:02:22'),
(54, 'Ferm Hexagon Pot XL | Brass ', 'Pots', 33, 'The Hexagon Pot from Ferm Living is made from powder coated metal with a matte polish. These beautiful planters are the perfect accent piece to beautify a table top, desk or shelf.', 'The Hexagon Pot from Ferm Living is made from powder coated metal with a matte polish. These beautiful planters are the perfect accent piece to beautify a table top, desk or shelf.\r\n\r\n', 5, 0, 'admin_images/manage_product/Ferm-Hexagon-Pot-XL-Brass_3764c233-2ce6-4677-9f14-8afe0c43b543.jpg', NULL, NULL, '2020-12-02 15:03:31'),
(55, 'Ferm Hexagon Pot XL | Black ', 'Pots', 33, 'The Hexagon Pot from Ferm Living is made from powder coated metal with a matte polish. These beautiful planters are the perfect accent piece to beautify a table top, desk or shelf.', 'The Hexagon Pot from Ferm Living is made from powder coated metal with a matte polish. These beautiful planters are the perfect accent piece to beautify a table top, desk or shelf.\r\n', 5, 0, 'admin_images/manage_product/Ferm-Hexagon-Pot-XL-Black_6dbfabc1-b7d1-4eb4-8676-1568c28ad547.jpg', NULL, NULL, '2020-12-02 15:04:36'),
(56, 'Chive Cube & Saucer Planter - Yam ', 'Pots', 33, 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 5, 0, 'admin_images/manage_product/Chive-Cube-and-Saucer-Yam_PO-4.jpg', NULL, NULL, '2020-12-02 15:05:30'),
(57, 'Chive Cube & Saucer Planter - Black ', 'Pots', 33, 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 'Cube and Saucer planters by Chive with a specialty matte finish. Form fitted catchment trays enhance the function of the planters, providing drainage for the plants without sacrificing the sleekness of the cube structure.\r\n', 5, 0, 'admin_images/manage_product/Cylinder-4-Black_PO-4.jpg', NULL, NULL, '2020-12-02 15:06:33'),
(58, 'SENECIO FISH HOOKS HB | 6\"', 'Indoor Plants', 31, 'High Light. This plant needs at least a few of hours of direct sunlight.', 'Senecio ‘Fish Hooks’ (Senecio radicans) is a flowering succulent plant native to South Africa. It is a hardy and easy to care for houseplant with plump, blue hued, banana shaped leaves that grow in a trailing nature. It sprouts white, small cinnamon scented flowers once a year, even when kept indoors. Often grown in hanging baskets, the leaves sprout along trailing vines that hang straight down in a beadlike formation. Best placed on a windowsill or shelf, these plants will grow quickly and can reach upwards of 10ft in length.\r\n\r\n', 12, 0, 'admin_images/manage_product/nursery-pot-6_Senicio-Fish-Hooks.jpg', NULL, NULL, '2020-12-02 15:10:35'),
(59, 'POTHOS JADE HB | 8\"', 'Indoor Plants', 31, 'Low Light. This plant can survive in low light conditions or on bright fluorescent light.', 'The Jade Pothos (epipremnum aureum) is a versatile and one of the easiest to care for houseplants. Although it is native to Polynesia, pothos can be found in many tropical environments. Also known as devil’s ivy, this plant cascades beautifully and pairs well with a hanging planter or a standard planter placed up on a shelf. The jade variety is known for its heart shaped leaves that are a solid dark green color. This plant can be propagated easily. Take a clipping, stick it in water, and watch it grow!\r\n\r\n', 8, 5, 'admin_images/manage_product/Nursery-Pot-8_Pothos-Jade-8.jpg', NULL, NULL, '2020-12-02 15:11:44'),
(60, 'SENECIO STRING OF PEARLS', 'Indoor Plants', 31, 'High Light. This plant needs at least a few of hours of direct sunlight.', 'The String of Pearls (Senecio rowleyanus) is a flowering succulent plant native to South Africa. It is a hardy and easy to care for houseplant with spherical bright green leaves, that grow clustered closely in a trailing nature. It sprouts white, small cinnamon scented flowers once a year, even when kept indoors. Other common names for this plant are String of Beads, Rosary plant, String of Marbles and String of Peas. Often grown in hanging baskets, this plant is best hung near a window, or placed on a windowsill or shelf. With proper care and light these plants will grow quickly and can reach upwards of 8ft in length.\r\n\r\n', 15, 12, 'admin_images/manage_product/nursery-pot-6_Senicio-String-of-Pearls-6.jpg', NULL, NULL, '2020-12-02 15:12:56'),
(61, 'PHILODENDRON CORDATUM | 8\"', 'Indoor Plants', 31, 'Low Light. This plant can survive in low light conditions or on bright fluorescent light.', 'The Philodendron cordatum, or heart leafed philodendron, is a trailing plant native to Southeast Brazil. Often mistaken for pothos, this plant is epiphytic and has solid green heart shaped leaves that trail and grow long. The philodendron cordatum pairs well with a hanging planter, or can be placed on a table or shelf. This plant can be propagated easily.  Take a clipping, stick it in water, and watch it grow!\r\n\r\n', 8, 6, 'admin_images/manage_product/Nursery-Pot-8_Philodendron-Cordatum-8.jpg', NULL, NULL, '2020-12-02 15:14:28'),
(62, 'SENECIO STRING OF DOLPHINS', 'Indoor Plants', 31, 'High Light. This plant needs at least a few of hours of direct sunlight.', 'Senecio String of Dolphins (Senecio ‘Hippogriff”) is a flowering succulent plant that is a hybrid between the String of Pearls (Senecio rowleyanus), and Senecio Articulatus. It is similar in appearance to the String of Fishhooks, however the slightly smaller leaves have a ridge and split that truly resemble small dolphins jumping down the vines.  Like its sister Senecio succulents, it is a hardy and easy to care for houseplant. It sprouts white, small cinnamon scented flowers once a year, even when kept indoors. Often grown in hanging baskets, the leaves sprout along trailing vines that hang straight down in a beadlike formation. Best placed on a windowsill or shelf, these plants will grow quickly and can reach upwards of 10ft in length.\r\n\r\n', 15, 12, 'admin_images/manage_product/Nursery-Pot-8_Philodendron-Cordatum-8.jpg', NULL, NULL, '2020-12-02 15:15:50'),
(63, 'VICTORIA BIRDSNEST FERN', 'Ferns', 30, 'Low Light. This plant can survive in low light conditions or on bright fluorescent light.', 'Senecio String of Dolphins (Senecio ‘Hippogriff”) is a flowering succulent plant that is a hybrid between the String of Pearls (Senecio rowleyanus), and Senecio Articulatus. It is similar in appearance to the String of Fishhooks, however the slightly smaller leaves have a ridge and split that truly resemble small dolphins jumping down the vines.  Like its sister Senecio succulents, it is a hardy and easy to care for houseplant. It sprouts white, small cinnamon scented flowers once a year, even when kept indoors. Often grown in hanging baskets, the leaves sprout along trailing vines that hang straight down in a beadlike formation. Best placed on a windowsill or shelf, these plants will grow quickly and can reach upwards of 10ft in length.\r\n\r\n', 18, 14, 'admin_images/manage_product/Norden-Goods-7-White-Speckle.jpg', NULL, NULL, '2020-12-02 15:19:37'),
(64, 'PHILODENDRON BRASIL | 4\"', 'Ferns', 30, 'Medium Light. This plant will do best in a bright location with mostly indirect light.', 'Medium Light. This plant will do best in a bright location with mostly indirect light.', 8, 5, 'admin_images/manage_product/Philodendron-Brasil-4.jpg', NULL, NULL, '2020-12-02 15:30:28'),
(65, 'PHILODENDRON BRANDTI | 4\"', 'Ferns		\r\n', 30, 'We choose to keep our prices low so that all of our customers can have access to this unusual plant. For this reason we are limiting the sale to three pieces per order. ', 'Philodendron Brandtianum is an easy and fast growing cascading and climbing plant. Its heart-shaped leaves are a deep green with plentiful silver striations that have an iridescent quality. New leaves have a yellow/orange hue to them that quickly morphs to shades of dark green and silver. Brandtianum generally has a more full and upright habit than its close cousin the Philodendron Cordatum.\r\n\r\nWe choose to keep our prices low so that all of our customers can have access to this unusual plant. For this reason we are limiting the sale to three pieces per order. ', 8, 4, 'admin_images/manage_product/Norden-Goods-5-White_Philodendron-Brandtiatum-4.jpg', NULL, NULL, '2020-12-02 15:35:48'),
(66, 'RATTLESNAKE PLANT', 'Ferns', 30, 'Calathea is a genus of several dozen species within ....', 'Calathea is a genus of several dozen species within the Marantaceae family, native to Brazil and Central America. Several varieties of this plant have become highly valued as house plants due to their unique foliage consisting of velvety patterned leaves. They are surprisingly durable plants, and can bounce right back from dehydration.\r\n\r\nIn its natural habitat, the calathea is a forest floor dwelling plant which enjoys the shade provided by the plush tropical canopy over head. While it can survive in low light conditions, it may lose its striking color.', 15, 10, 'admin_images/manage_product/Benotti-Cup-Navy-4_calathea-lancifolia-4.jpg', NULL, NULL, '2020-12-02 15:37:26'),
(67, 'STROMANTHE TRIOSTAR | 4\"', 'Ferns', 30, 'A relative of the prayer plant, Stromanthe boast a stunning coloring. Humidity is key, watering whenever the top inch of soil becomes dry. Bright indirect light with no direct sun will keep it happiest.', 'A relative of the prayer plant, Stromanthe boast a stunning coloring. Humidity is key, watering whenever the top inch of soil becomes dry. Bright indirect light with no direct sun will keep it happiest.\r\n', 10, 0, 'admin_images/manage_product/nursery-pot-4_4f9e10ab-7b23-4dae-9463-782f78a1578e.jpg', NULL, NULL, '2020-12-02 15:39:37'),
(68, 'RHAPHIDOPHORA TETRASPERMA', 'Ferns', 30, 'Medium Light. This plant will do best in a bright location with mostly indirect light.', 'Rhaphidophora tetrasperma can be hard to come by, but lucky you, we know where to find them. This fast growing plant is often called \"Monstera Minima\" or \"Ginny Philo\" and is a highly sought after botanical prize. Its fenestrated leaves bear a resemblance to Monstera Deliciosa as these leaves have a somewhat similar split to them, but unlike Monstera the leaves stay fairly small, making it an excellent long-term roommate. This plant is very easy to care for and has a climbing, vining habit so over time it will need a pole, trellis, or wall to support its growth. It prefers bright indirect light and consistent moisture, though take care not to over water. \r\n\r\n', 9, 0, 'admin_images/manage_product/nursery-pot-4_rhapidaphora-tetrasperma-4.jpg', NULL, NULL, '2020-12-02 15:41:18'),
(69, 'MONSTERA DELICIOSA | 6\"', 'Ferns', 30, 'Monsetera Deliciosa is native to the rain forests of Mexico and Central America. Its young leaves are smaller with no lobes or holes, but produce their famed perforated leaves as they mature. As a sub-canopy plant, monsteras are tolerant of lower light conditions, but will grow quickly and evenly in bright indirect light.', 'Monsetera Deliciosa is native to the rain forests of Mexico and Central America. Its young leaves are smaller with no lobes or holes, but produce their famed perforated leaves as they mature. As a sub-canopy plant, monsteras are tolerant of lower light conditions, but will grow quickly and evenly in bright indirect light.\r\n', 20, 14, 'admin_images/manage_product/Nursery-Pot-6_Monstera-Deliciosa-6.jpg', NULL, NULL, '2020-12-02 15:43:16'),
(70, 'CALATHEA ORNATA | 4\"', 'Ferns', 30, 'This dark burgundy variety of Calathea has bright pink pinstripes and broad flat leaves. It can run on the taller side for calatheas, but like all members of its family does not like to dry out, which can lead to brown spots on its leaves. The Calathea Ornata prefers bright, indirect light. ', 'This dark burgundy variety of Calathea has bright pink pinstripes and broad flat leaves. It can run on the taller side for calatheas, but like all members of its family does not like to dry out, which can lead to brown spots on its leaves. The Calathea Ornata prefers bright, indirect light. \r\n\r\n', 18, 13, 'admin_images/manage_product/Benotti-Cup-Grey-4_Calathea-ornata-4.jpg', NULL, NULL, '2020-12-02 15:45:05'),
(71, 'FICUS ELASTICA RUBY | 4\"', 'Ferns		\r\n', 30, 'The Ficus Elastica Ruby displays beautiful, tri-colored variegation with shades of green, pink and white. The leaves are a subtle way to bring a pop of color into a space, and go great with anything mauve and terracotta. It is a high light plant that will appreciate evenly moist soil, although it likes to dry out between waterings.', 'The Ficus Elastica Ruby displays beautiful, tri-colored variegation with shades of green, pink and white. The leaves are a subtle way to bring a pop of color into a space, and go great with anything mauve and terracotta. It is a high light plant that will appreciate evenly moist soil, although it likes to dry out between waterings.\r\n\r\nWith diligent care, patience and fertilizer, this gem can grow into a fully formed tree, or be pruned back to keep its small stature.', 11, 8, 'admin_images/manage_product/nursery-pot-6_Philodendron-Birkin-6.jpg', NULL, NULL, '2020-12-02 15:49:07'),
(72, 'PILEA PEPEROMIOIDES | 3\"', 'Ferns', 30, 'Pilea peperomioides, also known as Chinese Money Plant, is low-maintenance and easy to grow. Native to the Yunnan province of China, this plant has been popular in Scandinavia for decades, but has been hard to find in the U.S until recently. Its round, glossy leaves grow quickly from a central stem. ', 'Pilea peperomioides, also known as Chinese Money Plant, is low-maintenance and easy to grow. Native to the Yunnan province of China, this plant has been popular in Scandinavia for decades, but has been hard to find in the U.S until recently. Its round, glossy leaves grow quickly from a central stem. \r\n', 8, 0, 'admin_images/manage_product/Chive-Cube-and-Saucer-Azure_Pilea-peperomiodes-3.jpg', NULL, NULL, '2020-12-02 15:55:05'),
(73, 'CALATHEA ZEBRINA | 6\"', 'Ferns', 30, 'Medium Light. This plant will do best in a bright location with mostly indirect light.', 'Velvety, oblong, variegated leaves are the striking features of this lowland tropical plant. The lime and emerald green stripes add a pop of color to any space. Native to the rainforests of Brazil, the Calathea Zebrina appreciates a good amount of water, and bright filtered light. These are not undemanding plants, and they require consistency with care. \r\n\r\n', 7, 0, 'admin_images/manage_product/Ferm-Hexagon-Pot-XL-Blue_Calathea-Zebrina-6.jpg', NULL, NULL, '2020-12-02 15:58:29'),
(74, 'AGLAONEMA SILVER BAY | 4\"', 'Ferns', 30, 'Aglaonema is one of the easiest indoor plants to own and is tolerant of low light conditions and infrequent watering. Native to the Philippines, Aglaonema has beautiful, slow-growing foliage that makes a wonderful accent to any space. This is one of only a few plants that can survive under fluorescent lighting alone making it a great choice for any low light space.', 'Aglaonema is one of the easiest indoor plants to own and is tolerant of low light conditions and infrequent watering. Native to the Philippines, Aglaonema has beautiful, slow-growing foliage that makes a wonderful accent to any space. This is one of only a few plants that can survive under fluorescent lighting alone making it a great choice for any low light space.\r\n', 14, 0, 'admin_images/manage_product/Elizabeth-Benotti-Square-Planter-Large-Herringbone_Aglaonema-Silver-Bay-4.jpg', NULL, NULL, '2020-12-02 16:03:40'),
(75, 'NEANTHE BELLA PALM | 4\"', 'Ferns', 30, 'The Neanthe bella palm is an amazingly adaptive plant. Though native to the rain forests of southern Mexico, it grows well as a houseplant in low light environments and is extremely tolerant of drought. ', 'The Neanthe bella palm is an amazingly adaptive plant. Though native to the rain forests of southern Mexico, it grows well as a houseplant in low light environments and is extremely tolerant of drought. \r\n\r\nNeanthe bellas prefer indirect light and it is better to underwater than over water these plants. The leaves can become washed out and pale if they receive too much light, so better to keep it on a table top, not directly on the window sill. Neanthe bellas are sold as clusters of small plants. They are slow growing and generally do not grow over 2 feet tall.', 20, 12, 'admin_images/manage_product/Nursery-Pot-4_Neanthe-Bella-4.jpg', NULL, NULL, '2020-12-02 16:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `pro_image_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `pro_image1` text NOT NULL,
  `pro_image2` text NOT NULL,
  `pro_image3` text NOT NULL,
  `pro_image4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` int(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_zip_code` int(10) NOT NULL,
  `user_image` text NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_address1` varchar(100) NOT NULL,
  `user_address2` varchar(100) NOT NULL,
  `user_verification` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_phone`, `user_password`, `user_city`, `user_zip_code`, `user_image`, `user_country`, `user_address1`, `user_address2`, `user_verification`) VALUES
(1, 'laith', 'land', 'laith_land@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(2, 'laith', 'land', 'laith_land@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(6, '', '', 'laith22@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(7, '', '', 'laith000000000000000000@gmail.com', 0, '1234', '', 0, '', '', '', '', ''),
(8, 'LAAAAAAAITH', '', 'laithaaa@gmail.com', 0, '1234', '', 0, '', '', '', '', ''),
(9, '', '', 'laithaaa@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(10, '', '', 'laithaaa@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(11, '', '', 'laithaaa@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(14, '', '', 'laithlaithlaith@gmail.com', 0, '1234', '', 0, '', '', '', '', ''),
(15, '', '', 'ADAAAAAAAAAAM@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(16, 'laith', 'laaaaaaaaith', 'laithlaithzzzzzz@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(18, 'lojain', 'nahas', 'lojain@gmail.com', 0, '123', '', 0, '', '', '', '', ''),
(20, '', '', 'sara@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(21, 'laith', 'zayed', 'laith@gmail.com', 791234567, '123456', '', 0, '', '', '', '', ''),
(22, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(23, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(24, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(25, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(26, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(27, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(28, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(29, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(30, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(31, 'laith', 'zayed', 'laith@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(32, 'aaaaaa', 'aaaaaa', 'aaaaaa@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(33, 'aaaaaa', 'aaaaaa', 'aaaaaa@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(34, 'laith', 'land', 'laith_land@gmail.com', 791234567, '123456', 'amman', 11009, '', 'jordan', 'shmesani', 'jabal-amman', ''),
(35, 'Yara', 'fadel', 'zara@gmail.com', 2147483647, '123456', 'amman', 12225, '', 'UAE', 'madba', 'irbid', ''),
(36, '', '', 'adam@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(37, '', '', 'adamadam@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(38, '', '', 'sara222@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(39, '', '', '', 0, '123456', '', 0, '', '', '', '', ''),
(40, '', '', 'sasdas@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(41, '', '', 'laithaaaaa@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(42, '', '', 'vvvv@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(43, '', '', 'bbb@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(44, '', '', 'ahmad@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(45, 'ahmed', 'ali', 'ali@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(46, 'Laith', 'Adam', 'laith_adam@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(47, 'ahmed', '', 'loz@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(48, 'tester', 'tester', 'tester@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(49, 'zzzz', 'aaaa', 'asda@gmail.com', 0, '123456', '', 0, '', '', '', '', ''),
(50, 'Sara', 'ali', 'samer@gmail.com', 0, '123456', '', 0, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`pro_image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `pro_image_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
