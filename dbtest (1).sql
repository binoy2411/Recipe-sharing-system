-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2016 at 05:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `recipeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `commentid` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`recipeid`, `userid`, `comment`, `commentid`, `DATE`) VALUES
(19, 56, 'Awesome Recipe, loved it :)', 15, '2016-05-09 14:59:43'),
(15, 56, 'Delicious Recipe, can eat it anytime :)', 16, '2016-05-09 15:05:00'),
(19, 58, 'Mozarella Cheese makes it even better.', 17, '2016-05-09 15:06:28'),
(1, 58, 'Awesome Recipe of Pasta. My kids love it!', 18, '2016-05-09 15:08:23'),
(2, 58, 'A must have Dessert. Just Yummy!!', 19, '2016-05-09 15:09:33'),
(23, 58, 'Too Refreshing :)', 20, '2016-05-09 15:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `favouritecount`
--

CREATE TABLE `favouritecount` (
  `recipeid` int(5) NOT NULL,
  `favcount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favouritecount`
--

INSERT INTO `favouritecount` (`recipeid`, `favcount`) VALUES
(1, 10),
(2, 7),
(3, 9),
(4, 2),
(5, 1),
(6, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 4),
(11, 1),
(12, 1),
(13, 2),
(14, 1),
(15, 2),
(16, 4),
(17, 2),
(18, 3),
(19, 2),
(20, 1),
(21, 4),
(22, 3),
(23, 5),
(24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `userid` int(5) NOT NULL,
  `recipeid` int(5) NOT NULL,
  `likedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`userid`, `recipeid`, `likedate`) VALUES
(59, 1, '2016-04-14 21:15:48'),
(58, 1, '2016-04-14 21:24:13'),
(58, 2, '2016-04-14 21:24:15'),
(64, 3, '2016-04-14 21:29:45'),
(67, 4, '2016-04-14 21:35:10'),
(67, 3, '2016-04-14 21:35:13'),
(65, 3, '2016-04-15 08:49:19'),
(65, 4, '2016-04-15 09:12:07'),
(71, 3, '2016-04-15 09:17:05'),
(71, 1, '2016-04-15 09:17:16'),
(71, 2, '2016-04-15 09:17:18'),
(56, 6, '2016-04-16 13:44:37'),
(67, 1, '2016-04-16 13:47:31'),
(59, 2, '2016-04-16 14:23:51'),
(59, 3, '2016-04-16 14:23:55'),
(59, 7, '2016-04-16 14:24:05'),
(59, 8, '2016-04-16 14:24:11'),
(66, 10, '2016-04-16 14:25:21'),
(66, 9, '2016-04-16 14:25:23'),
(66, 3, '2016-04-16 14:25:30'),
(66, 2, '2016-04-16 14:25:33'),
(66, 1, '2016-04-16 14:25:38'),
(71, 12, '2016-04-16 14:37:15'),
(71, 10, '2016-04-16 14:37:19'),
(70, 1, '2016-04-16 14:42:48'),
(70, 2, '2016-04-16 14:42:52'),
(70, 7, '2016-04-16 14:43:14'),
(70, 13, '2016-04-16 14:43:23'),
(68, 1, '2016-04-16 14:45:02'),
(68, 2, '2016-04-16 16:12:11'),
(68, 13, '2016-04-16 16:12:25'),
(68, 10, '2016-04-16 16:12:42'),
(57, 16, '2016-04-16 16:32:37'),
(57, 14, '2016-04-16 16:32:44'),
(57, 1, '2016-04-16 16:32:54'),
(57, 3, '2016-04-16 16:33:00'),
(57, 7, '2016-04-16 16:33:12'),
(57, 15, '2016-04-16 16:33:25'),
(57, 2, '2016-04-16 16:34:28'),
(65, 22, '2016-04-16 16:57:06'),
(65, 1, '2016-04-16 16:58:43'),
(65, 16, '2016-04-16 16:59:49'),
(65, 21, '2016-04-16 17:00:59'),
(65, 23, '2016-04-16 17:01:09'),
(70, 23, '2016-04-16 17:55:16'),
(70, 21, '2016-04-16 17:55:29'),
(70, 22, '2016-04-16 17:55:38'),
(70, 20, '2016-04-16 17:55:51'),
(70, 19, '2016-04-16 17:55:57'),
(70, 18, '2016-04-16 17:56:01'),
(70, 17, '2016-04-16 17:56:05'),
(72, 23, '2016-04-16 21:22:03'),
(72, 22, '2016-04-16 21:22:06'),
(72, 1, '2016-04-16 21:22:17'),
(72, 3, '2016-04-16 21:22:24'),
(72, 21, '2016-04-16 21:23:02'),
(56, 18, '2016-04-21 08:10:56'),
(56, 16, '2016-04-21 08:21:36'),
(56, 17, '2016-04-21 08:52:46'),
(56, 3, '2016-04-28 06:32:50'),
(71, 23, '2016-04-28 08:12:52'),
(71, 18, '2016-04-28 08:12:59'),
(71, 11, '2016-04-28 08:15:52'),
(71, 24, '2016-04-28 08:16:00'),
(56, 5, '2016-05-09 15:04:04'),
(56, 15, '2016-05-09 15:04:22'),
(58, 23, '2016-05-09 15:09:48'),
(58, 21, '2016-05-09 15:09:59'),
(58, 19, '2016-05-09 15:10:08'),
(58, 16, '2016-05-09 15:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `userid` int(5) NOT NULL,
  `followid` int(5) NOT NULL,
  `followdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`userid`, `followid`, `followdate`) VALUES
(53, 59, '2016-04-09 19:03:57'),
(53, 57, '2016-04-09 19:04:11'),
(53, 54, '2016-04-09 19:04:18'),
(57, 54, '2016-04-10 10:01:19'),
(57, 56, '2016-04-10 10:05:12'),
(57, 59, '2016-04-10 10:05:16'),
(57, 58, '2016-04-10 10:05:19'),
(53, 58, '2016-04-10 12:31:12'),
(53, 56, '2016-04-10 12:31:16'),
(63, 56, '2016-04-10 18:06:06'),
(63, 54, '2016-04-10 18:06:09'),
(63, 53, '2016-04-10 18:06:11'),
(63, 58, '2016-04-10 18:06:15'),
(63, 53, '2016-04-10 18:28:47'),
(63, 59, '2016-04-10 18:31:57'),
(63, 57, '2016-04-10 18:39:39'),
(56, 63, '2016-04-10 18:48:49'),
(56, 59, '2016-04-10 18:48:52'),
(59, 58, '2016-04-10 18:50:20'),
(59, 57, '2016-04-10 18:50:22'),
(59, 56, '2016-04-10 18:50:24'),
(59, 54, '2016-04-10 18:50:31'),
(64, 56, '2016-04-10 19:29:09'),
(64, 57, '2016-04-10 19:29:13'),
(64, 58, '2016-04-10 19:29:19'),
(54, 64, '2016-04-10 19:42:25'),
(54, 56, '2016-04-10 19:42:29'),
(54, 53, '2016-04-10 19:42:32'),
(54, 57, '2016-04-10 19:42:35'),
(54, 58, '2016-04-10 19:42:38'),
(65, 63, '2016-04-11 03:51:01'),
(65, 58, '2016-04-11 03:51:03'),
(65, 56, '2016-04-11 03:51:05'),
(65, 53, '2016-04-11 03:51:08'),
(66, 65, '2016-04-11 06:34:34'),
(66, 56, '2016-04-11 06:44:06'),
(58, 65, '2016-04-11 06:47:09'),
(58, 66, '2016-04-11 06:47:15'),
(58, 59, '2016-04-11 06:47:18'),
(58, 56, '2016-04-11 06:47:20'),
(58, 57, '2016-04-11 06:47:22'),
(67, 59, '2016-04-11 06:54:47'),
(67, 56, '2016-04-11 18:18:25'),
(67, 57, '2016-04-11 18:18:28'),
(67, 58, '2016-04-11 18:18:35'),
(67, 66, '2016-04-11 18:18:41'),
(67, 65, '2016-04-11 18:20:44'),
(56, 65, '2016-04-12 16:28:54'),
(68, 56, '2016-04-12 17:53:39'),
(68, 58, '2016-04-12 17:53:45'),
(68, 57, '2016-04-12 17:53:47'),
(68, 59, '2016-04-12 17:53:49'),
(68, 66, '2016-04-12 17:53:53'),
(59, 67, '2016-04-12 19:39:49'),
(70, 53, '2016-04-13 11:28:07'),
(70, 64, '2016-04-13 11:28:10'),
(70, 54, '2016-04-13 11:28:12'),
(70, 66, '2016-04-13 11:28:20'),
(70, 67, '2016-04-13 11:29:00'),
(70, 56, '2016-04-13 11:30:43'),
(70, 58, '2016-04-13 12:28:55'),
(70, 57, '2016-04-13 12:31:25'),
(70, 68, '2016-04-13 12:32:15'),
(56, 64, '2016-04-13 12:47:43'),
(56, 70, '2016-04-13 13:08:00'),
(56, 57, '2016-04-13 13:12:55'),
(56, 67, '2016-04-14 10:43:09'),
(71, 56, '2016-04-15 09:16:01'),
(71, 70, '2016-04-15 09:16:10'),
(71, 67, '2016-04-15 09:16:12'),
(71, 66, '2016-04-15 09:16:15'),
(71, 58, '2016-04-15 09:16:19'),
(71, 59, '2016-04-15 09:16:22'),
(72, 56, '2016-04-16 21:23:21'),
(72, 59, '2016-04-16 21:23:43'),
(56, 71, '2016-04-21 08:12:02'),
(56, 68, '2016-04-28 06:31:21'),
(56, 58, '2016-04-28 07:30:08'),
(71, 57, '2016-04-28 08:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `followercount`
--

CREATE TABLE `followercount` (
  `userid` int(5) NOT NULL,
  `followers` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followercount`
--

INSERT INTO `followercount` (`userid`, `followers`) VALUES
(53, 5),
(54, 5),
(56, 14),
(57, 11),
(58, 12),
(59, 9),
(63, 2),
(64, 3),
(65, 4),
(66, 5),
(67, 4),
(68, 2),
(70, 2),
(71, 1),
(72, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipeid` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `dishname` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `cuisine` varchar(30) NOT NULL,
  `dishtype` varchar(30) NOT NULL,
  `ingredients` varchar(1000) DEFAULT NULL,
  `instructions` varchar(5000) DEFAULT NULL,
  `uploaddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipeid`, `userid`, `dishname`, `description`, `cuisine`, `dishtype`, `ingredients`, `instructions`, `uploaddate`) VALUES
(1, 56, 'Tangy Tomato Pasta', 'A delicious recipe of pasta with tomato and cheese.yummy!!', 'Italian', 'Side Dish : Pasta', 'Boiled pasta\r\nChopped onions\r\nChopped capsicum\r\nTomato puree(you can make tomato puree at home.Put the tomato in a blender and add sugar and blend it.)\r\nBlack pepper powder\r\nGrated cheese( i would recommend mozzarella )\r\nSalt\r\nSugar\r\nButter\r\nVinegar\r\nSoya sauce', 'Put butter in a frying pan and let it melt.\r\nDo not burn it.\r\nPut the chopped onion and stir. \r\nDo not make it brown or golden.\r\nAdd capsicum and mix. \r\nAdd the tomato puree and mix.\r\nAdd salt and pepper and sugar.\r\nAdd the grated cheese and let it melt.\r\nAdd the pasta and mix well.\r\nAdd vinegar and soya sauce.\r\nServe hot and garnish with grated cheese.', '2016-04-13 13:38:42'),
(2, 56, 'Classic Smith Island Cake', 'This sumptuous layer cake from Smith Island, off the mainland coast of Maryland, here consists of 10 thin layers of cake stacked and frosted with old-fashioned chocolate fudge icing', 'American', 'Dessert', 'For the Cake Layers\r\n3 cups (14 oz.) all-purpose flour\r\n2 tsp. baking powder\r\n1?2 tsp. kosher salt\r\n2 cups (15 1?4 oz.) sugar\r\n2 sticks unsalted butter, melted\r\n5 large eggs\r\n1 cup evaporated milk\r\n2 tsp. vanilla icing\r\nFor the Chocolate Fudge Icing\r\n2 2?3 cups (1 lb. 4 1?2 oz.) sugar\r\n1 1?3 cups evaporated milk\r\n6 oz. high-quality unsweetened chocolate, roughly chopped\r\n10 tbsp. unsalted butter, melted\r\n1 1?2 tsp. vanilla extract', 'Make the cakes: Heat the oven to 350°. Line two 9-inch round cake pans with parchment paper circles, and spray with nonstick baking spray. In a large bowl, whisk the flour with the baking powder and salt. In the bowl of a stand mixer fitted with a paddle, cream the sugar with the butter on medium speed until pale and fluffy, about 3 minutes. 2. Add the eggs, one at a time, beating well after each addition, until smooth. Reduce the mixer speed to low and add the dry ingredients, followed immediately by the milk, vanilla, and 1/2 cup water, and mix until the batter just comes together. Using a rubber spatula, stir the batter again until smooth.\r\nPour 2/3 cup of the cake batter into each prepared cake pan and, using a small offset spatula, spread the cake batter evenly over the bottom of each pan. Bake the cakes, rotating the pans halfway through cooking, until lightly browned and cooked through, 12 to 14 minutes. Transfer the pans to a rack, let the cakes cool for 10 minutes, and then invert the cakes onto the rack and remove the parchment paper. Once the cake pans are cool, re-line with parchment paper and coat again with nonstick baking spray. Repeat baking with the remaining batter to make 10 thin cakes total and let them all cool completely.\r\nMake the fudge icing and assemble the cake: In a large copper or enameled cast-iron pan (these pans retain heat well, which helps prevent the icing from seizing), combine the sugar with the milk and place over medium-low heat, stirring until the sugar dissolves. Add the chocolate and butter and stir until the chocolate melts. Increase the heat to medium and cook, stirring occasionally, until the icing is thick and glossy and has the consistency of hot fudge sauce, about 15 minutes. Remove the pan from the heat and stir in the vanilla.\r\nPlace 1 cake layer on a cake stand and, using a small offset spatula, spread with 1/4 cup of the warm icing. Repeat stacking and spreading with 8 more cake layers and 2 cups icing, leaving the last cake un-iced. Spread the remaining icing over the top and sides of the cake stack until smooth. (If the icing hardens in the pan while you''re icing the cake, rewarm it over low heat until it loosens before continuing.) Let the cake stand until the icing sets before serving. Store the cake, wrapped in plastic wrap, at room temperature for up to 3 days or in the refrigerator for 1 week.', '2016-04-14 10:57:58'),
(3, 58, 'Shahi Nawabi Biryani', 'This Shahi Nawabi Biryani..has given immence pleassure of cooking this Biryani for my family n friends...this Shahi Biryani is enriched with more flavours from Nawabi kind of peoples.', 'Indian', 'Main', '1/2 kg Basmati Rice (semi-cooked)\r\n1 kg Boneless Meat (washed and chopped into square pieces)\r\n500 gm Curd\r\n4-6 tsp Ginger-Garlic Paste\r\n4-6 Green Chilli\r\n8-10 Big Onions (sliced)\r\n1/4 cup Lime Juice\r\n1/2 tsp Red Chilli Powder\r\n1/2 A pinch of Caraway Seeds (Shahi Zeera)\r\n5-6 twigs Coriander Leaves (chopped)\r\n5-6 twigs Mint Leaves (chopped)\r\n2-4 pinch Saffron,pods Cardamom, Cinnamon\r\n2-3 drops Saffron Color\r\n1-2 pods Clove\r\n2 cup Oil\r\n2 tsp Ghee\r\nSalt to taste', 'Smear the pieces of meat with ginger-garlic paste. Keep them to marinate for an hour. In the meanwhile, fry the sliced onions in a heated pan on low flame till light brown. Let the onions cool down and crush them. Now add crushed fried onion (only three-fourth), curd, red chilli powder, cinnamon, green chilli paste, cardamom, shahi zeera, coriander leaves, clove, saffron water, mint leaves and salt to the marinated meat. Leave the meat as it is for 1 hour\r\nMake the mixture of aromatic water by adding salt (one tsp), cinnamon, clove, cardamom, mint leaves and coriander leaves in a little water. Now spread a layer of semi-cooked rice in a heavy bottomed vessel. Add saffron color, limejuice, ghee and the remaining crushed onions over the layer of rice. Spread a layer of marinated meat over this, and again spread the remaining semi-cooked rice. Now add the aromatic water in a circular motion over the rice layer. Now tightly cover the vessel with a lid. Keep it on a low flame on tawa.\r\nRemove the vessel from the flame exactly after 15 minutes. â€¢ Shahi Nawabi Biryani is ready to eat. Serve hot.\r\nGarnish with Coriander and mint leaves and small piece of Lemon.', '2016-04-14 21:27:51'),
(4, 64, 'Tofu Manchurian', ' Tofu Manchurian is a delicious dish to serve in the afternoon snack or as a starter.', 'Chinese', 'Side Dish : Vegetable', '200 gm Tofu\r\n1 and 1/2 tablespoon Corn Flour\r\n1/3 cup All Purpose Flour\r\n1 teaspoon Garlic-Ginger paste\r\nTo taste Salt\r\n1 tablespoon + deep frying Oil\r\n1/2 cup Water\r\n1 and 1/2 teaspoon Ginger-Garlic, finely chopped\r\n1 tablespoon Soy Sauce\r\n1/2 tablespoon Chilli Sauce\r\n2 tablespoon Spring Onion, chopped\r\n1 small piece Capsicum, sliced', 'Cut tofu into 1-inch cubes.\r\nMix garlic-ginger paste, corn flour, all purpose flour, salt and 1/2-cup water to make a thick batter.\r\nHeat oil in a frying pan to deep fry tofu. Dip each cube of tofu in a batter and deep fry until light brown and crispy. Drain and transfer them in a plate.\r\nHeat 1 tablespoon of oil in a wok or pan.Add finely chopped ginger garlic and saute for 30 seconds over high flame.\r\nAdd capsicum and saute for 1-2 minutes. Add soy sauce, chilli sauce, spring onion and salt and mix well.\r\nAdd fried tofu and mix well. Toss and cook for 1 minute.\r\nTofu Manchurian is ready to serve.', '2016-04-14 21:33:14'),
(5, 65, 'Vegetarian Cassoulet', 'This is a vegetarian version of the traditional French dish. If you are home while this is cooking, give the beans a stir every couple of hours.', 'French', 'Main', '2 tablespoons olive oil\r\n1 onion\r\n2 carrots, peeled and diced\r\n1 pound dry navy beans, soaked overnight\r\n4 cups mushroom broth\r\n1 cube vegetable bouillon\r\n1 bay leaf\r\n4 sprigs fresh parsley\r\n1 sprig fresh rosemary\r\n1 sprig fresh lemon thyme, chopped\r\n1 sprig fresh savory\r\n1 large potato, peeled and cubed', '1. Heat a small amount of oil in a skillet over medium heat. Cook and stir onion and carrots in oil until tender.\r\n2. In a slow cooker, combine beans, carrots and onion, mushroom broth, bouillon, and bay leaf. Pour in water if necessary to cover ingredients with water. Tie together parsley, rosemary, thyme, and savory, and add to the pot. Cook on Low for 8 hours.\r\n3. Stir in potato, and continue cooking for 1 hour. Remove herbs before serving.', '2016-04-15 08:57:45'),
(6, 71, 'Navratan Korma', 'This is an Indian vegetable korma with nuts, paneer cheese, and an adjustable list of vegetables. It is in a tomato-cream sauce as opposed to the usual yogurt based sauce. ''Navratan'' means ''nine gems,'' so choose nine of the vegetable, nuts, and paneer ingredients; you can leave out the elements you don''t want to use, or add them all so it is ''ten gems'' if you wish.', 'Indian', 'Main', '3 tablespoons vegetable oil, divided\r\n1/3 cup mixed nuts (cashews, pistachios, almonds)\r\n1 medium onion grated\r\n1/2 teaspoon garlic paste\r\n1/2 teaspoon ginger paste\r\n1 (8 ounce) can tomato sauce\r\n1 teaspoon cayenne pepper\r\n1/2 teaspoon ground turmeric\r\n2 teaspoons ground coriander\r\n1 teaspoon garam masala\r\n1/4 cup raisins\r\n1/2 cup chopped carrots\r\n1/2 cup chopped green bell pepper\r\n1/2 cup chopped fresh green beans\r\n1/2 cup green peas 1 cup chopped potatoes\r\n4 ounces paneer, cubed\r\n1/4 cup milk\r\n1/4 cup heavy cream', '1. Heat 1 tablespoon oil in a large skillet over medium heat. Place mixed nuts in the skillet, cook and stir until golden brown, and set aside. Stir onion into the skillet, and cook until tender. Mix in garlic paste and ginger paste, and cook 1 minute. Stir in tomato sauce, cayenne pepper, turmeric, coriander, and garam masala. Pour in water, and mix in raisins, carrots, green bell pepper, beans, peas, and potatoes. Bring to a boil. Reduce heat to low, and simmer 20 minutes, until potatoes are tender.\r\n2. Heat remaining oil in a separate skillet over medium-high heat, and cook the paneer on both sides, until golden brown. Drain on paper towels. Place in a bowl with enough hot water to cover for about 2 minutes to soften, then stir into the skillet with the vegetables.\r\n3. Stir milk and cream into the skillet with the vegetables and paneer. Bring to a boil, and continue cooking 2 to 3 minutes. Season with salt to taste.', '2016-04-15 09:22:49'),
(7, 67, 'Chocolate Chip Cheese Ball', 'A sweet switch from the usual cheese ball. Serve with graham crackers or chocolate wafers.', 'Other', 'Snacks', '1 (8 ounce) package cream cheese\r\nSoftened 1/2 cup butter\r\nSoftened 3/4 cup confectioners sugar\r\n2 tablespoon sugar\r\n1/4 teaspoon vanilla extract\r\n3/4 cup miniature semisweet chocolate chips\r\n3/4 cup finely chopped pecans', 'In a medium bowl, beat together cream cheese and butter until smooth. Mix in confectioners'' sugar, brown sugar and vanilla. Stir in chocolate chips. Cover, and chill in the refrigerator for 2 hours.\r\nShape chilled cream cheese mixture into a ball. Wrap with plastic, and chill in the refrigerator for 1 hour.\r\nRoll the cheese ball in finely chopped pecans before serving.', '2016-04-16 13:59:55'),
(8, 67, 'Belgian Waffles', 'Belgian waffles are tender and flavorful waffles made with yeast. They''re great topped with butter, whipped cream and fresh fruit.', 'Other', 'Dessert', '1 (.25 ounce) package active dry yeast\r\n1/4 cup warm milk (110 degrees F/45 degrees C)\r\n3 egg yolks 2 3/4 cups warm milk (110 degrees F/45 degrees C)\r\n3/4 cup butter, melted and cooled to lukewarm\r\n1/2 cup white sugar\r\n1 1/2 teaspoons salt 2 teaspoons vanilla extract\r\n4 cups all-purpose flour\r\n3 egg whites', 'In a small bowl, dissolve yeast in 1/4 cup warm milk. Let stand until creamy, about 10 minutes.\r\nIn a large bowl, whisk together the egg yolks, 1/4 cup of the warm milk and the melted butter. Stir in the yeast mixture, sugar, salt and vanilla. Stir in the remaining 2 1/2 cups milk alternately with the flour, ending with the flour. Beat the egg whites until they form soft peaks; fold into the batter. Cover the bowl tightly with plastic wrap. Let rise in a warm place until doubled in volume, about 1 hour.\r\nPreheat the waffle iron. Brush with oil and spoon about 1/2 cup (or as recommended by manufacturer) onto center of iron. Close the lid and bake until it stops steaming and the waffle is golden brown. Serve immediately or keep warm in 200 degree oven.', '2016-04-16 14:03:08'),
(9, 59, 'French Veggie Loaf', 'I found this savory loaf recipe in the Alsace region of France. It is wonderfully moist, and because of the density of the veggie mixture, it doesn''t rise too much. So be sure to pour all of the batter into the pan. You can add or substitute other veggies of your choice. And enjoy!', 'French', 'Main', '2 tablespoons olive oil\r\n1 shallot, chopped\r\n1 clove garlic, minced\r\n1/2 green bell pepper, diced\r\n1/2 eggplant, cubed\r\n1 tomato, seeded and diced\r\n1 small zucchini, diced\r\nsalt and pepper to taste\r\n1 1/4 cups self-rising flour\r\n3 eggs\r\n1/3 cup milk\r\n1/3 cup olive oil\r\n1 1/2 cups shredded Swiss cheese', 'Preheat oven to 375 degrees F (190 degrees C). Grease and flour a 9x5-inch loaf pan.\r\nHeat 2 tablespoons olive oil in a large skillet over medium heat and cook and stir shallot, garlic, green bell pepper, eggplant, tomato, and zucchini until soft, 10 to 15 minutes. Season vegetables with a sprinkling of salt and black pepper as they cook.\r\nWhisk self-rising flour with eggs and milk in a large mixing bowl until smoothly combined; whisk in olive oil. Gently fold vegetables into flour mixture; stir in Swiss cheese. Pour batter into the prepared loaf pan.\r\nBake loaf in the preheated oven until a toothpick inserted in the middle comes out clean, about 45 minutes. Let cool 10 minutes in the pan before removing to finish cooling on a wire rack; slice when cooled.', '2016-04-16 14:19:21'),
(10, 59, 'Too Much Chocolate Cake', 'As the name suggest, it contains too much chocolate!! A must have recipe for chocolate lovers :)', 'Other', 'Dessert', '1 (18.25 ounce) package devil''s food cake mix\r\n1 (5.9 ounce) package instant chocolate pudding mix\r\n1 cup sour cream\r\n1 cup vegetable oil\r\n4 eggs\r\n1/2 cup warm water\r\n2 cups semisweet chocolate chips', 'Preheat oven to 350 degrees F (175 degrees C).\r\nIn a large bowl, mix together the cake and pudding mixes, sour cream, oil, beaten eggs and water. Stir in the chocolate chips and pour batter into a well greased 12 cup bundt pan.\r\nBake for 50 to 55 minutes, or until top is springy to the touch and a wooden toothpick inserted comes out clean. Cool cake thoroughly in pan at least an hour and a half before inverting onto a plate If desired, dust the cake with powdered sugar.', '2016-04-16 14:22:49'),
(11, 66, 'Roasted Garlic Cauliflower', 'Wonderful roasted cauliflower, even my kid loves it! Add more spices and herbs to suit your taste.', 'Indian', 'Side Dish : Vegetable', '2 tablespoons minced garlic\r\n3 tablespoons olive oil\r\n1 large head cauliflower, separated into florets\r\n1/3 cup grated Parmesan cheese\r\nsalt and black pepper to taste\r\n1 tablespoon chopped fresh parsley', 'Preheat the oven to 450 degrees F (220 degrees C). Grease a large casserole dish.\r\nPlace the olive oil and garlic in a large resealable bag. Add cauliflower, and shake to mix. Pour into the prepared casserole dish, and season with salt and pepper to taste.\r\nBake for 25 minutes, stirring halfway through. Top with Parmesan cheese and parsley, and broil for 3 to 5 minutes, until golden brown.', '2016-04-16 14:28:04'),
(12, 66, 'Bananas Foster', 'Bananas are cooked in a bubbling pan of dark brown sugar, butter, rum and cinnamon and served over ice cream with walnuts in this elegant, quick dessert.', 'Other', 'Dessert', '1/4 cup butter\r\n2/3 cup dark brown sugar\r\n3 1/2 tablespoons rum\r\n1 1/2 teaspoons vanilla extract\r\n1/2 teaspoon ground cinnamon\r\n3 bananas, peeled and sliced lengthwise and crosswise\r\n1/4 cup coarsely chopped walnuts\r\n1 pint vanilla ice cream', 'In a large, deep skillet over medium heat, melt butter. Stir in sugar, rum, vanilla and cinnamon. When mixture begins to bubble, place bananas and walnuts in pan. Cook until bananas are hot, 1 to 2 minutes. Serve at once over vanilla ice cream.', '2016-04-16 14:32:31'),
(13, 71, 'Kung Pao Chicken', 'Spicy chicken with peanuts, similar to what is served in Chinese restaurants. It is easy to make, and you can be as sloppy with the measurements as you want. They reduce to a nice, thick sauce. Substitute cashews for peanuts, or bamboo shoots for the water chestnuts. You can''t go wrong! Enjoy!', 'Chinese', 'Main', '1 pound skinless, boneless chicken breast halves - cut into chunks\r\n2 tablespoons white wine\r\n2 tablespoons soy sauce\r\n2 tablespoons sesame oil, divided\r\n2 tablespoons cornstarch, dissolved in 2 tablespoons water\r\n1 ounce hot chile paste\r\n1 teaspoon distilled white vinegar\r\n2 teaspoons brown sugar\r\n4 green onions, chopped\r\n1 tablespoon chopped garlic\r\n1 (8 ounce) can water chestnuts\r\n4 ounces chopped peanuts', 'To Make Marinade: Combine 1 tablespoon wine, 1 tablespoon soy sauce, 1 tablespoon oil and 1 tablespoon cornstarch/water mixture and mix together. Place chicken pieces in a glass dish or bowl and add marinade. Toss to coat. Cover dish and place in refrigerator for about 30 minutes.\r\nTo Make Sauce: In a small bowl combine 1 tablespoon wine, 1 tablespoon soy sauce, 1 tablespoon oil, 1 tablespoon cornstarch/water mixture, chili paste, vinegar and sugar. Mix together and add green onion, garlic, water chestnuts and peanuts. In a medium skillet, heat sauce slowly until aromatic.\r\nMeanwhile, remove chicken from marinade and saute in a large skillet until meat is white and juices run clear. When sauce is aromatic, add sauteed chicken to it and let simmer together until sauce thickens.', '2016-04-16 14:36:40'),
(14, 70, 'Bangan ka Bhurta (Indian Eggplant)', 'This is a very simple, quick and more importantly authentic Indian side dish of grilled eggplant and tomato. Best served with naan or roti. It should have a consistency of, um, well, ''mush'' when finished, but it''s good.', 'Indian', 'Main', '1 eggplant\r\n1 teaspoon vegetable oil\r\n1 medium onion, chopped\r\n2 roma (plum) tomatoes, chopped\r\n1/4 teaspoon ground cayenne pepper\r\n1/4 teaspoon salt\r\n1/4 teaspoon pepper\r\n4 sprigs chopped fresh cilantro', 'Preheat the oven broiler. Place eggplant in a roasting pan, and broil 5 minutes, turning occasionally, until about 1/2 the skin is scorched.\r\nPlace eggplant in microwave safe dish. Cook 5 minutes on High in the microwave, or until tender. Cool enough to handle, and remove skin, leaving some scorched bits. Cut into thick slices.\r\nHeat oil in a skillet over medium heat, stir in the onion, and cook until tender. Mix in eggplant, and tomatoes. Season with cayenne pepper, salt, and black pepper. Continue to cook and stir until soft. Garnish with cilantro to serve.', '2016-04-16 14:39:56'),
(15, 70, 'Gobi Aloo (Indian Style Cauliflower with Potatoes)', 'This is a basic Indian dish that is very tasty! Adjust the spices to your preferences! To make it even better, you could add a bit of stewed tomatoes.', 'Indian', 'Main', '1 tablespoon vegetable oil\r\n1 teaspoon cumin seeds\r\n1 teaspoon minced garlic\r\n1 teaspoon ginger paste\r\n2 medium potatoes, peeled and cubed\r\n1/2 teaspoon ground turmeric\r\n1/2 teaspoon paprika\r\n1 teaspoon ground cumin\r\n1/2 teaspoon garam masala\r\nsalt to taste\r\n1 pound cauliflower\r\n1 teaspoon chopped fresh cilantro', 'Heat the oil in a medium skillet over medium heat. Stir in the cumin seeds, garlic, and ginger paste. Cook about 1 minute until garlic is lightly browned. Add the potatoes. Season with turmeric, paprika, cumin, garam masala, and salt. Cover and continue cooking 5 to 7 minutes stirring occasionally.\r\nMix the cauliflower and cilantro into the saucepan. Reduce heat to low and cover. Stirring occasionally, continue cooking 10 minutes, or until potatoes and cauliflower are tender.', '2016-04-16 14:41:58'),
(16, 68, 'Green Onion Cakes', 'An excellent and simple recipe, these will make some delicious green onion cakes that are addictive and are just as good, if not better, than the store bought ones.', 'Asian', 'Appetizer', '3 cups bread flour\r\n1 1/4 cups boiling water\r\n2 tablespoons vegetable oil\r\nsalt and pepper to taste\r\n1 bunch green onions, finely chopped\r\n2 teaspoons vegetable oil ', 'Use a fork to mix flour and boiling water in a large bowl. Knead dough into a ball. Cover bowl with plastic wrap; let dough rest for 30 to 60 minutes.\r\nEvenly divide dough into 16 pieces. Roll each piece into a 1/4 inch thick circle. Brush each circle with oil, season with salt and pepper, and sprinkle with about 1 teaspoon of green onions. Roll up, cigar style, and pinch open ends together to form a circle. Roll each circle flat to 1/4 inch.\r\nHeat 2 teaspoons oil in a large skillet. Fry cakes until golden brown, about 2 minutes on each side.', '2016-04-16 16:15:54'),
(17, 68, 'Caprese Appetizer', 'Caprese salad skewers. Perfect for holiday parties.', 'Italian', 'Appetizer', '20 grape tomatoes\r\n10 ounces mozzarella cheese, cubed\r\n2 tablespoons extra virgin olive oil\r\n2 tablespoons fresh basil leaves, chopped\r\n1 pinch salt\r\n1 pinch ground black pepper\r\n20 toothpicks', 'Toss tomatoes, mozzarella cheese, olive oil, basil, salt, and pepper together in a bowl until well coated. Skewer one tomato and one piece of mozzarella cheese on each toothpick', '2016-04-16 16:19:31'),
(18, 57, 'Authentic Enchiladas Verdes', 'These enchiladas are made with a fresh green salsa, just like you would find in a Mexican restaurant or better yet, in a Mexican home.', 'Mexican', 'Main', '2 bone-in chicken breast halves 2 cups chicken broth 1/4 white onion 1 clove garlic 2 teaspoons salt 1 pound fresh tomatillos, husks removed 5 serrano peppers 1/4 white onion 1 clove garlic 1 pinch salt 12 corn tortillas 1/4 cup vegetable oil 1 cup crumbled queso fresco 1/2 white onion, chopped 1 bunch fresh cilantro, chopped', 'In a saucepan, combine chicken breast with chicken broth, one quarter onion, a clove of garlic, and 2 teaspoons salt. Bring to a boil, and then boil for 20 minutes. Reserve broth, set chicken aside to cool, and discard onion and garlic. When cool enough to handle, shred chicken with your hands.\r\nPlace tomatillos and serrano chiles in a pot with water, enough to cover them. Bring to boil, and continue boiling until tomatillos turn a different shade of green (from bright green to a dull, army green). Strain tomatillos and chiles, and place in a blender with another quarter piece of onion, 1 clove garlic, and a pinch of salt. Pour in reserved chicken broth, so that liquid just covers the veggies in the blender by about an inch. Blend all ingredients until they are completely pureed. Pour salsa in a medium saucepan, and bring to a low boil.\r\nPour oil in a frying pan, and allow to get very hot. Slightly fry tortillas one by one in hot oil, setting each on a paper towel afterwards to soak some of the oil. Finally, dip slightly fried tortillas in low-boiling green salsa, until tortillas become soft again. Place on plates, 3 per person.\r\nFill or top tortillas with shredded chicken, then extra green sauce. Top with crumbled cheese, chopped onion, and chopped cilantro.', '2016-04-16 16:24:49'),
(19, 57, 'Owen''s Mozzarella & Tomato Salad', 'A delicious salad for cheese lovers. It is also quick and easy to throw together.', 'Italian', 'Salad', '4 large tomatoes\r\n4 tablespoons olive oil ground\r\nBlack pepper to taste\r\n10 ounces mozzarella cheese, thickly sliced\r\n8 leaves fresh basil, torn into strips', 'Chop tomatoes in half, then slice finely; arrange on four plates.\r\nTrickle a tablespoon of olive oil over each serving, and sprinkle with black pepper.\r\nLay slices of cheese over tomatoes, and strips of basil over cheese.\r\nCover with plastic wrap, and refrigerate for 30 minutes before serving.', '2016-04-16 16:29:58'),
(20, 56, 'Carrot Rice', 'Fragrant basmati rice sauteed with carrots, onions, fresh ginger, peanuts, and cilantro. You will be surprised to taste this delicious rice.', 'Indian', 'Main', '1 cup basmati rice\r\n2 cups water\r\n1/4 cup roasted peanuts\r\n1 tablespoon margarine\r\n1 onion, sliced\r\n1 teaspoon minced fresh ginger root\r\n3/4 cup grated carrots\r\nsalt to taste\r\ncayenne pepper to taste\r\nchopped fresh cilantro', 'Combine rice and water in a medium saucepan. Bring to a boil over high heat. Reduce heat to low, cover with lid, and allow to steam until tender, about 20 minutes.\r\nWhile rice is cooking, grind peanuts in a blender and set aside. Heat the margarine in a skillet over medium heat.\r\nStir in the onion; cook and stir until the onion has softened and turned golden brown about 10 minutes. Stir in ginger, carrots, and salt to taste.\r\nReduce heat to low and cover to steam 5 minutes. Stir in cayenne pepper and peanuts. When rice is done, add it to skillet and stir gently to combine with other ingredients.\r\nGarnish with chopped cilantro.', '2016-04-16 16:41:28'),
(21, 56, 'Chinese Corn Soup', '"It''s an easy-to-make soup, and especially delicious to eat on a cold day. You can also eat this soup with pasta.', 'Chinese', 'Soup', '5 cups chicken broth\r\n1 (14.75 ounce) can cream-style corn\r\n1/4 cup butter\r\n1 stalk celery, cut into bite-size pieces\r\n1 onion, cut into bite-size pieces\r\n1 1/2 tablespoons all-purpose flour\r\n1 teaspoon ground nutmeg, or to taste\r\n1 egg, or more as desired\r\nfresh ground pepper (optional) ', 'Heat the chicken broth in a saucepan over medium heat, and stir in the can of corn. Let the mixture heat to a boil, stirring occasionally, and reduce heat to a simmer.\r\nIn a skillet over medium-low heat, melt the butter and cook and stir the celery and onion until tender, about 5 minutes. Stir in the flour, and cook and stir for about 2 minutes to remove the raw taste from the flour.\r\nAdd the vegetable mixture to the saucepan, whisking in the flour to avoid lumps, and stir in the nutmeg. Let the soup return to a simmer.\r\nWhisk the egg in a bowl until thoroughly beaten. Stir the soup slowly in a clockwise circular motion, and slowly pour the egg into the moving soup.\r\nStir the egg lightly through the soup with a fork to produce egg strands, and sprinkle with black pepper to serve.', '2016-04-16 16:45:24'),
(22, 56, 'Risotto with Butternut Squash and White Beans', 'Known in Italian as ''Risotto con Zucca i Fagioli.'' Steamed butternut squash folded into a creamy white bean risotto is the perfect flavorful dish for a weeknight or entertaining your favorite guests.', 'Italian', 'Side Dish : Grains', '1 butternut squash - peeled, seeded, and cubed\r\nsalt and ground black pepper to taste\r\n1/4 cup extra-virgin olive oil\r\n1 onion, diced\r\n1 small tomato, diced\r\n1 (16 ounce) package Arborio rice\r\n1/2 cup white wine\r\n1 teaspoon dried marjoram (optional)\r\n1 teaspoon dried oregano (optional)\r\n1 teaspoon dried basil (optional)\r\n8 cups chicken broth, or more as needed\r\n1 dash hot pepper sauce, or more to taste\r\n1 (14 ounce) can small white beans, drained\r\n1/4 cup shredded Parmesan cheese\r\n3 tablespoons chopped fresh parsley', 'Season butternut squash cubes with salt and black pepper. Place a steamer insert into a saucepan and fill with water to just below the bottom of the steamer. Cover and bring the water to a boil.\r\nAdd butternut squash, cover, and steam until just tender, 10 to 12 minutes depending on thickness. Transfer squash to a bowl and mash.\r\nHeat olive oil in a skillet over medium heat. Cook and stir onion in the hot oil until softened, 3 to 5 minutes. Stir tomato into onions until onions become translucent, 3 to 5 more minutes.\r\nAdd Arborio rice to onion mixture and stir to coat with oil; cook and stir until rice becomes translucent with a white spots in the middle of each grain, about 2 minutes.\r\nStir white wine into rice mixture; cook and stir until wine is completely absorbed, 2 to 4 minutes; add marjoram, oregano, and basil.\r\nPour chicken broth into rice mixture, about 1/2 cup at a time, stirring until liquid is absorbed, until rice is creamy but firm to the bite, 20 to 25 minutes. Stir squash into rice mixture until fully incorporated. Remove from heat.\r\nStir hot pepper sauce, white beans, Parmesan cheese, and parsley into risotto until cheese is melted. Season with salt and black pepper.', '2016-04-16 16:48:51'),
(23, 56, 'Mojito Perfecto', 'Trial and error pay off! Time-consuming, but so worth it.', 'Caribbean', 'Beverage', '6 mint leaves\r\n4 teaspoons white sugar\r\n1 lime, cut into 6 wedges\r\n2 (1.5 fluid ounce) jiggers lemon-flavored rum\r\n1 cup ice cubes, or as needed\r\n1/2 cup carbonated water, or as needed', 'Put 3 mint leaves and 2 teaspoons sugar into each of 2 glass tumblers; vigorously stir sugar and mint together, crushing mint with the back of a spoon to release oils.\r\nAdd 3 lime wedges to each glass; again stir vigorously to release some lime juice.\r\nPour 1 jigger rum into each glass. Fill glasses with ice cubes and top with carbonated water; stir.', '2016-04-16 16:53:01'),
(24, 56, 'uhhbsshcb', 'hbshhksbukjnj', 'African', 'Appetizer', 'jbsdjbjkbsdkjb\r\njhbs\r\noiocx\r\noklmc\r\nsmcl', 'kjmnkcdsd\r\nlksckslc\r\nlkmslcklmklksc klcls lkmclksm\r\nlkmkslckkkkkkkkkkkk', '2016-04-21 08:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(40) NOT NULL,
  `pro` tinyint(1) NOT NULL,
  `jointime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `known` varchar(100) DEFAULT NULL,
  `interests` varchar(100) DEFAULT NULL,
  `uploadcount` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `firstname`, `lastname`, `gender`, `dob`, `country`, `pro`, `jointime`, `known`, `interests`, `uploadcount`) VALUES
(53, 'user1@trymydish.com', '25d55ad283aa400af464c76d713c07ad', 1234123412, 'User11', 'Tester', 'male', '1990-01-01', 'Argentina', 0, '2016-04-09 11:16:59', 'Arabic, Indian', 'Italian, Mexican', 0),
(54, 'user2@trymydish.com', '7e58d63b60197ceb55a1c487989a3720', 2147483647, 'User2', 'Tester', 'female', '1992-02-02', 'Brazil', 0, '2016-04-09 11:59:23', 'Indian, Italian', 'Japanese, Mexican', 0),
(56, 'panchalmithilesh@gmail.com', 'f5d59894f40d072336e2f0c79b9f2787', 7838829115, 'Mithilesh', 'Panchal', 'male', '1994-04-21', 'India', 0, '2016-04-09 14:18:06', 'Indian, Italian, Chinese, Continental', 'Mexican, Japanese', 7),
(57, 'namrata@trymydish.com', '5bda88ef3739b6d721de7cad617640a6', 1234123412, 'Namrata', 'Varshney', 'female', '1995-04-04', 'India', 1, '2016-04-09 14:39:55', 'Italian, Mexican', 'Indian, Chinese', 2),
(58, 'rishikant@trymydish.com', '25d55ad283aa400af464c76d713c07ad', 2121212121, 'Rishikant', 'Ningthoujam', 'male', '1995-04-26', 'India', 0, '2016-04-09 14:45:06', 'Indian, Italian', 'Mexican', 1),
(59, 'mohit@trymydish.com', 'd8052f9e09a17e6907629e76bbd261cc', 2147483647, 'Mohit', 'Beniwal', 'male', '1995-03-03', 'France', 1, '2016-04-09 14:48:50', 'Indian, Italian, Mexican', 'Continental', 2),
(63, 'chef1@trymydish.com', '25d55ad283aa400af464c76d713c07ad', 1201201201, 'Chef1', 'Tester', 'male', '1980-01-05', 'Canada', 1, '2016-04-10 18:04:01', 'Continental, African, Italian', 'Indian, Chinese, Mexican', 0),
(64, 'chef2@trymydish.com', '25d55ad283aa400af464c76d713c07ad', 1001001000, 'Chef2', 'Tester', 'female', '1989-02-03', 'Bangladesh', 0, '2016-04-10 19:26:54', 'Continental, African, Italian', 'indian', 1),
(65, 'chef3@trymydish.com', 'f7e213cf43c3e88c2c43b3655e070a06', 1041041040, 'Chef3', 'Tester', 'male', '1998-01-01', 'Morocco', 1, '2016-04-11 03:48:47', 'Arabic, Indian', 'Japanese, Mexican, Continental', 1),
(66, 'shashankgarg1@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 9898989898, 'Shashank', 'Garg', 'male', '1995-03-15', 'United Kingdom', 0, '2016-04-11 06:32:58', 'Indian', 'Japanese, Mexican, Continental', 2),
(67, 'namrata.varshney@gmail.com', '25f9e794323b453885f5181f1b624d0b', 9393939393, 'Namrata', 'Varshney 2', 'female', '1996-04-18', 'Singapore', 1, '2016-04-11 06:53:05', 'Indian, Italian', 'Japanese, Mexican, Continental', 2),
(68, 'abc@trymydish.com', '25d55ad283aa400af464c76d713c07ad', 1111122222, 'ABC', 'XYZ', 'male', '1997-05-02', 'Germany', 1, '2016-04-12 17:52:09', 'Indian, Italian, Chinese, Continental, Mexican', 'Mughlai', 2),
(70, 'chef4@trymydish.com', '6f3bdfd281abc10ca3e02c4e7006568c', 78910245, 'Chef4', 'Tester', 'female', '1999-05-05', 'India', 0, '2016-04-13 11:27:03', 'Indian, Italian', 'Japanese, Mexican, Continental', 2),
(71, 'hello@trymydish.com', '5d41402abc4b2a76b9719d911017c592', 1212121212, 'Hello', 'Tester', 'male', '1999-05-21', 'Germany', 1, '2016-04-15 09:14:52', 'Indian, Italian, Chinese, Continental', 'Mughlai', 2),
(72, 'bruce@trymydish.com', 'ec0e2603172c73a8b644bb9456c1ff6e', 9999999999, 'Bruce', 'Wayne', 'male', '1985-04-04', 'United States of America', 0, '2016-04-16 21:15:20', 'Continental, French, Carribbean', 'Indian, Chinese, Mexican', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `favouritecount`
--
ALTER TABLE `favouritecount`
  ADD PRIMARY KEY (`recipeid`);

--
-- Indexes for table `followercount`
--
ALTER TABLE `followercount`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
