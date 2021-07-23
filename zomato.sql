-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 05:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street_address` text NOT NULL,
  `landmark` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `street_address`, `landmark`, `city`, `state`, `pin`, `contact`) VALUES
(1, 2, 'kaikhali', 'kaikhali', 'kolkata', 'wb', '700052', '7462844822'),
(2, 2, 'sarabadhi', 'e', 'masaurhi', 'bihar', '804452', '56789890'),
(3, 4, 'sarabadhi', 'ef', 'masaurhi', 'bihar', '804452', '2345'),
(12, 2, 'sarabadhi', 'swf', 'masaurhi', 'bihar', '804452', '2345'),
(13, 2, 'sarabadhi', 'qwerty', 'masaurhi', 'bihar', '804452', '123456'),
(14, 2, 'sarabadhi', 'qwerty', 'masaurhi', 'bihar', '804452', '56789890');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `user_id`, `res_id`) VALUES
(25, 2, 1),
(26, 2, 4),
(27, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`dish_id`, `dish_name`, `category`, `price`, `image`, `res_id`) VALUES
(2, 'Mutton Thali', 'non-veg,main,thali', 250, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRm6Hn5m75uf0wgAZqm07K-15tc6dDRntNZKQ&usqp=CAU', 1),
(3, 'Chicken Hyderabadi Biryani', 'main,non-veg,biryani,rice', 180, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTM-UReiveiZpjPRcZVnVWOuZbm5uy8cDNwoQ&usqp=CAU', 1),
(4, 'Chicken Lollipop', 'non-veg,starter', 160, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxQUExYUFBQWFxYYGRkbGRkYGR4gGRkfGBkeGR4eIBsfICkhHh4mIBkbIzIjKCosMC8vHiA1OjUxOSkuLywBCgoKDg0OHBAQHDgnISYuMDQwLy4uMDQuLjAuLC4uMC4wLi4wLjAuMDAuLi4uLi4uLjAuLDEuLi4uLi4uLi4uLv/AABEIAMIBAwMBIgACEQEDEQH/', 1),
(5, 'Shahi Paneer', 'main,veg,', 150, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1nfXcnP1Rb-04XLh_okK2KDgEvXXgX3WZtg&usqp=CAU', 1),
(6, 'Chicken Fried Rice', 'main,non-veg,rice', 100, 'https://c.ndtvimg.com/2020-09/19g10na8_fried-rice_625x300_24_September_20.jpg', 1),
(7, 'Veg Chowmein', 'starter,veg,noodles', 80, 'https://b.zmtcdn.com/data/pictures/chains/8/19137878/e5996f30c921286dcf29c63b37f73896_o2_featured_v2.jpg?output-format=webp', 1),
(8, 'Butter Naan', 'main,veg,bread', 20, 'https://www.cookwithmanali.com/wp-content/uploads/2018/09/Garlic-Naan-500x375.jpg', 1),
(9, 'Chole Bhature', 'main,veg,thali', 85, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0kIsTWv5xMTLbyFLt4Jb4FWdGneCNeTvxhw&usqp=CAU', 1),
(10, 'French Toast', 'starter,veg,bread', 40, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUTEhMVFhUXGB4YGhgYGiAhIRwfIBsYHxwfGxsgHikhHiEmHBscIjIiJiosLy8vHiA0OTQtOCkuLywBCgoKDg0OHBAQHDAnIScuMS4wLC4uMzEuMDM4MS4uLjAxLjAuMC4uLi4wMDAuMC42Li4sLi4uLi4wLC4uLi42Lv/AABEIAOEA4QMBIgACEQEDEQH/', 1),
(11, 'Chicken Double Patty Burger Meal', 'veg,meal', 800, 'https://b.zmtcdn.com/data/dish_photos/4dc/a2f97c5423aa05e93c5ac4099a24b4dc.jpg?fit=around|130:130&crop=130:130;*,*', 2),
(12, 'Paneer Double Patty Burger Meal', 'veg,meal,', 560, 'https://b.zmtcdn.com/data/dish_photos/c02/fb7773289ca29df6761d0cb1268b4c02.jpg?fit=around|130:130&crop=130:130;*,*', 2),
(13, 'Chicken Maharaja Mac Burger', 'non-veg,starter,', 226, 'https://b.zmtcdn.com/data/dish_photos/c05/8bfea4581ae057f293aa1c3763ba3c05.jpg?fit=around|130:130&crop=130:130;*,*', 2),
(14, 'Hot Grills', 'veg,starter', 400, 'https://b.zmtcdn.com/data/pictures/2/18919142/e76a54dfb34e5ec540bc05042379589d.jpg?fit=around%7C450%3A450&crop=450%3A450%3B-1%2C46', 2),
(15, 'Chike Tikka', 'non-veg,starter', 355, 'https://b.zmtcdn.com/data/dish_photos/9ac/0dd75f29a7215c6c35bbb08e5263c9ac.jpg?fit=around|130:130&crop=130:130;*,*', 2),
(16, 'Chicken Kadai', 'non-veg,meal', 192, 'https://b.zmtcdn.com/data/dish_photos/7a7/e26bac145cd683009de4a83a14e4c7a7.jpg?fit=around|130:130&crop=130:130;*,*', 2),
(17, 'Chicken Double Patty Burger Meal', 'veg,meal', 400, 'https://b.zmtcdn.com/data/dish_photos/4dc/a2f97c5423aa05e93c5ac4099a24b4dc.jpg?fit=around|130:130&crop=130:130;*,*', 2),
(18, 'Paneer Double Patty Burger Meal', 'veg,meal,', 600, 'https://b.zmtcdn.com/data/dish_photos/c02/fb7773289ca29df6761d0cb1268b4c02.jpg?fit=around|130:130&crop=130:130;*,*', 2),
(19, 'Chicken Maharaja Mac Burger', 'non-veg,starter,', 124, 'https://b.zmtcdn.com/data/dish_photos/c05/8bfea4581ae057f293aa1c3763ba3c05.jpg?fit=around|130:130&crop=130:130;*,*', 2),
(20, 'Hot Grills', 'veg,starter', 224, 'https://b.zmtcdn.com/data/pictures/2/18919142/e76a54dfb34e5ec540bc05042379589d.jpg?fit=around%7C450%3A450&crop=450%3A450%3B-1%2C47', 2),
(21, 'Herbedgrilled Basa Fish', 'non-veg,starter', 280, 'https://b.zmtcdn.com/data/dish_photos/502/af563960c8930d28e692c77174a6b502.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(22, 'Chicken Tikka', 'non-veg,starter', 199, 'https://b.zmtcdn.com/data/dish_photos/03e/0e3f4a7b478849b06bf90b958072903e.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(23, 'Paneer Wrap', 'veg,starter', 216, 'https://b.zmtcdn.com/data/dish_photos/d1b/02a9701f4a860dc58f85fc550ea2ad1b.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(24, 'French Fries', 'veg,starter', 84, 'https://b.zmtcdn.com/data/dish_photos/671/a72661987ae2d3efa3c336e7fdd40671.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(25, 'Paneer Double Patty Burger Meal', 'veg,meal,', 560, 'https://b.zmtcdn.com/data/dish_photos/c02/fb7773289ca29df6761d0cb1268b4c02.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(26, 'Chicken Maharaja Mac Burger', 'non-veg,starter,', 226, 'https://b.zmtcdn.com/data/dish_photos/c05/8bfea4581ae057f293aa1c3763ba3c05.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(27, 'Hot Grills', 'veg,starter', 400, 'https://b.zmtcdn.com/data/pictures/2/18919142/e76a54dfb34e5ec540bc05042379589d.jpg?fit=around%7C450%3A450&crop=450%3A450%3B-1%2C46', 3),
(28, 'Chike Tikka', 'non-veg,starter', 355, 'https://b.zmtcdn.com/data/dish_photos/9ac/0dd75f29a7215c6c35bbb08e5263c9ac.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(29, 'Kaju Barfi', 'sweets,desserts,starter,veg', 257, 'https://b.zmtcdn.com/data/dish_photos/2f0/2bffd3dced67d3d896090b0ddade02f0.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(30, 'Masala Dosa', 'starter,main,veg', 160, 'https://b.zmtcdn.com/data/dish_photos/5a0/252d5e07709eaa3ff08afa951ee095a0.jpg?fit=around|130:130&crop=130:130;*,*', 3),
(31, 'Delux thali', 'main,veg', 185, 'https://b.zmtcdn.com/data/dish_photos/be8/54021eab43065455595bf2d3ac729be8.jpg?fit=around|130:130&crop=130:130;*,*', 4),
(32, 'Chilly baby corn', 'starter,veg,', 200, 'https://b.zmtcdn.com/data/dish_photos/4e0/7a74e887181e45c734803bbd8cbd34e0.jpg?fit=around|130:130&crop=130:130;*,*', 4),
(33, 'Gulab Jamun', 'starter,dessert,veg', 99, 'https://b.zmtcdn.com/data/dish_photos/f96/f88b717bf4fb93d31b8c9334ac01ef96.jpg?fit=around|130:130&crop=130:130;*,*', 4),
(34, 'Milk Cake', 'dessert,veg,starter', 147, 'https://b.zmtcdn.com/data/dish_photos/dd4/4f0db6a4252fe2f5064a88f53dcfadd4.jpg?fit=around|130:130&crop=130:130;*,*', 4),
(35, 'Kaju Barfi', 'sweets,desserts,starter,veg', 257, 'https://b.zmtcdn.com/data/dish_photos/2f0/2bffd3dced67d3d896090b0ddade02f0.jpg?fit=around|130:130&crop=130:130;*,*', 4),
(36, 'Masala Dosa', 'starter,main,veg', 160, 'https://b.zmtcdn.com/data/dish_photos/5a0/252d5e07709eaa3ff08afa951ee095a0.jpg?fit=around|130:130&crop=130:130;*,*', 4),
(37, 'Veg Chowmein', 'starter,veg,noodles', 80, 'https://b.zmtcdn.com/data/pictures/chains/8/19137878/e5996f30c921286dcf29c63b37f73896_o2_featured_v2.jpg?output-format=webp', 4),
(38, 'Butter Naan', 'main,veg,bread', 20, 'https://www.cookwithmanali.com/wp-content/uploads/2018/09/Garlic-Naan-500x375.jpg', 4),
(39, 'Chole Bhature', 'main,veg,thali', 85, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0kIsTWv5xMTLbyFLt4Jb4FWdGneCNeTvxhw&usqp=CAU', 4),
(40, 'French Toast', 'starter,veg,bread', 40, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUTEhMVFhUXGB4YGhgYGiAhIRwfIBsYHxwfGxsgHikhHiEmHBscIjIiJiosLy8vHiA0OTQtOCkuLywBCgoKDg0OHBAQHDAnIScuMS4wLC4uMzEuMDM4MS4uLjAxLjAuMC4uLi4wMDAuMC42Li4sLi4uLi4wLC4uLi42Lv/AABEIAOEA4QMBIgACEQEDEQH/', 4),
(41, 'Chicken Double Patty Burger Meal', 'veg,meal', 800, 'https://b.zmtcdn.com/data/dish_photos/4dc/a2f97c5423aa05e93c5ac4099a24b4dc.jpg?fit=around|130:130&crop=130:130;*,*', 4),
(42, 'Kaju Barfi', 'sweets,desserts,starter,veg', 257, 'https://b.zmtcdn.com/data/dish_photos/2f0/2bffd3dced67d3d896090b0ddade02f0.jpg?fit=around|130:130&crop=130:130;*,*', 15),
(43, 'Masala Dosa', 'starter,main,veg', 160, 'https://b.zmtcdn.com/data/dish_photos/5a0/252d5e07709eaa3ff08afa951ee095a0.jpg?fit=around|130:130&crop=130:130;*,*', 15),
(44, 'Delux thali', 'main,veg', 185, 'https://b.zmtcdn.com/data/dish_photos/be8/54021eab43065455595bf2d3ac729be8.jpg?fit=around|130:130&crop=130:130;*,*', 15),
(45, 'Chilly baby corn', 'starter,veg,', 200, 'https://b.zmtcdn.com/data/dish_photos/4e0/7a74e887181e45c734803bbd8cbd34e0.jpg?fit=around|130:130&crop=130:130;*,*', 15),
(46, 'Gulab Jamun', 'starter,dessert,veg', 99, 'https://b.zmtcdn.com/data/dish_photos/f96/f88b717bf4fb93d31b8c9334ac01ef96.jpg?fit=around|130:130&crop=130:130;*,*', 15),
(47, 'Mango Cake', 'starter,dessert,veg', 250, 'https://b.zmtcdn.com/data/dish_photos/77b/9b26e387495363871abed3b53040977b.jpg?fit=around|130:130&crop=130:130;*,*', 15),
(48, 'Cold Coffee', 'starter,dessert,veg', 120, 'https://static.toiimg.com/thumb/53842591.cms?width=800&height=800&imgsize=1077535', 15),
(49, 'Kit Kat Shake', 'starter,dessert,veg', 150, 'https://b.zmtcdn.com/data/dish_photos/81b/113cb2953821cebed603d1ea8096681b.jpg?fit=around|130:130&crop=130:130;*,*', 15),
(50, 'Mango Cake', 'starter,dessert,veg', 250, 'https://b.zmtcdn.com/data/dish_photos/77b/9b26e387495363871abed3b53040977b.jpg?fit=around|130:130&crop=130:130;*,*', 15),
(51, 'chiken dominator', 'main,non-veg', 305, 'https://b.zmtcdn.com/data/dish_photos/587/e49cb122543d7895346050a0c7528587.jpg?fit=around|130:130&crop=130:130;*,*', 7),
(52, 'Farm house', 'main,veg', 215, 'https://b.zmtcdn.com/data/dish_photos/a3d/7ca006ec8907c2ae13fd006cf0853a3d.png?fit=around|130:130&crop=130:130;*,*', 7),
(53, 'Double Cheese Margherita', 'main,veg', 185, 'https://b.zmtcdn.com/data/dish_photos/f47/db2fb46200a9d41110d7a552e4f69f47.jpg?fit=around|130:130&crop=130:130;*,*', 7),
(54, 'Cheese n Corn', 'main,veg', 165, 'https://b.zmtcdn.com/data/dish_photos/dad/ceebfee6251cbc70ef1cee90fcc98dad.jpg?fit=around|130:130&crop=130:130;*,*', 7),
(55, 'Taco Maxina ', 'starter,veg', 118, 'https://b.zmtcdn.com/data/dish_photos/96f/ff6245e26e081b4dd1bc7016c7db096f.png?fit=around|130:130&crop=130:130;*,*', 7),
(56, 'Garlic Bread', 'starter,bread,veg', 159, 'https://b.zmtcdn.com/data/dish_photos/17f/731e22c58e4b9571db474c7099b1817f.png?fit=around|130:130&crop=130:130;*,*', 7),
(57, 'Creamy Tomato Pasta Pizza', 'main,veg', 320, 'https://b.zmtcdn.com/data/dish_photos/b1f/b33c5c010ef9458bdf571b044553cb1f.jpg?fit=around|130:130&crop=130:130;*,*', 7),
(58, 'Chicken golden delight', 'main,veg', 315, 'https://b.zmtcdn.com/data/dish_photos/21e/78a70ba0b889eddef398ebc530e1721e.jpg?fit=around|130:130&crop=130:130;*,*', 7),
(59, 'Red Velvet Lava Cake', 'starter,dessert,veg', 129, 'https://b.zmtcdn.com/data/dish_photos/529/6bb15cdb281e3da5627147e0dd8a2529.jpg?fit=around|130:130&crop=130:130;*,*', 7),
(60, 'Butter Scotch Mousse', 'starter,dessert,veg', 99, 'https://b.zmtcdn.com/data/dish_photos/76a/7c961cd3ab18d04613db72c62d0ec76a.png?fit=around|130:130&crop=130:130;*,*', 7),
(61, 'Paneer Double Patty Burger Meal', 'veg,meal,', 560, 'https://b.zmtcdn.com/data/dish_photos/c02/fb7773289ca29df6761d0cb1268b4c02.jpg?fit=around|130:130&crop=130:130;*,*', 5),
(62, 'Chicken Maharaja Mac Burger', 'non-veg,starter,', 226, 'https://b.zmtcdn.com/data/dish_photos/c05/8bfea4581ae057f293aa1c3763ba3c05.jpg?fit=around|130:130&crop=130:130;*,*', 5),
(63, 'Hot Grills', 'veg,starter', 400, 'https://b.zmtcdn.com/data/pictures/2/18919142/e76a54dfb34e5ec540bc05042379589d.jpg?fit=around%7C450%3A450&crop=450%3A450%3B-1%2C46', 5),
(64, 'Chike Tikka', 'non-veg,starter', 355, 'https://b.zmtcdn.com/data/dish_photos/9ac/0dd75f29a7215c6c35bbb08e5263c9ac.jpg?fit=around|130:130&crop=130:130;*,*', 5),
(65, 'Chicken Kadai', 'non-veg,meal', 192, 'https://b.zmtcdn.com/data/dish_photos/7a7/e26bac145cd683009de4a83a14e4c7a7.jpg?fit=around|130:130&crop=130:130;*,*', 5),
(66, 'Chicken Double Patty Burger Meal', 'veg,meal', 800, 'https://b.zmtcdn.com/data/dish_photos/4dc/a2f97c5423aa05e93c5ac4099a24b4dc.jpg?fit=around|130:130&crop=130:130;*,*', 6),
(67, 'Paneer Double Patty Burger Meal', 'veg,meal,', 560, 'https://b.zmtcdn.com/data/dish_photos/c02/fb7773289ca29df6761d0cb1268b4c02.jpg?fit=around|130:130&crop=130:130;*,*', 6),
(68, 'Chicken Maharaja Mac Burger', 'non-veg,starter,', 226, 'https://b.zmtcdn.com/data/dish_photos/c05/8bfea4581ae057f293aa1c3763ba3c05.jpg?fit=around|130:130&crop=130:130;*,*', 6),
(69, 'Hot Grills', 'veg,starter', 400, 'https://b.zmtcdn.com/data/pictures/2/18919142/e76a54dfb34e5ec540bc05042379589d.jpg?fit=around%7C450%3A450&crop=450%3A450%3B-1%2C46', 6),
(70, 'Chike Tikka', 'non-veg,starter', 355, 'https://b.zmtcdn.com/data/dish_photos/9ac/0dd75f29a7215c6c35bbb08e5263c9ac.jpg?fit=around|130:130&crop=130:130;*,*', 6),
(71, 'Chicken Kadai', 'non-veg,meal', 192, 'https://b.zmtcdn.com/data/dish_photos/7a7/e26bac145cd683009de4a83a14e4c7a7.jpg?fit=around|130:130&crop=130:130;*,*', 6),
(72, 'Chicken Double Patty Burger Meal', 'veg,meal', 740, 'https://b.zmtcdn.com/data/dish_photos/4dc/a2f97c5423aa05e93c5ac4099a24b4dc.jpg?fit=around|130:130&crop=130:130;*,*', 6),
(73, 'Paneer Double Patty Burger Meal', 'veg,meal,', 253, 'https://b.zmtcdn.com/data/dish_photos/c02/fb7773289ca29df6761d0cb1268b4c02.jpg?fit=around|130:130&crop=130:130;*,*', 6),
(74, 'Chicken Maharaja Mac Burger', 'non-veg,starter,', 124, 'https://b.zmtcdn.com/data/dish_photos/c05/8bfea4581ae057f293aa1c3763ba3c05.jpg?fit=around|130:130&crop=130:130;*,*', 6),
(75, 'Hot Grills', 'veg,starter', 224, 'https://b.zmtcdn.com/data/pictures/2/18919142/e76a54dfb34e5ec540bc05042379589d.jpg?fit=around%7C450%3A450&crop=450%3A450%3B-1%2C47', 6),
(76, 'Cheese n Corn', 'main,veg', 165, 'https://b.zmtcdn.com/data/dish_photos/dad/ceebfee6251cbc70ef1cee90fcc98dad.jpg?fit=around|130:130&crop=130:130;*,*', 8),
(77, 'Taco Maxina ', 'starter,veg', 118, 'https://b.zmtcdn.com/data/dish_photos/96f/ff6245e26e081b4dd1bc7016c7db096f.png?fit=around|130:130&crop=130:130;*,*', 8),
(78, 'Garlic Bread', 'starter,bread,veg', 159, 'https://b.zmtcdn.com/data/dish_photos/17f/731e22c58e4b9571db474c7099b1817f.png?fit=around|130:130&crop=130:130;*,*', 8),
(79, 'Creamy Tomato Pasta Pizza', 'main,veg', 320, 'https://b.zmtcdn.com/data/dish_photos/b1f/b33c5c010ef9458bdf571b044553cb1f.jpg?fit=around|130:130&crop=130:130;*,*', 8),
(80, 'Chicken golden delight', 'main,veg', 315, 'https://b.zmtcdn.com/data/dish_photos/21e/78a70ba0b889eddef398ebc530e1721e.jpg?fit=around|130:130&crop=130:130;*,*', 8),
(81, 'Chicken Hyderabadi Biryani', 'main,non-veg,biryani,rice', 180, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTM-UReiveiZpjPRcZVnVWOuZbm5uy8cDNwoQ&usqp=CAU', 9),
(82, 'Chicken Lollipop', 'non-veg,starter', 160, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxQUExYUFBQWFxYYGRkbGRkYGR4gGRkfGBkeGR4eIBsfICkhHh4mIBkbIzIjKCosMC8vHiA1OjUxOSkuLywBCgoKDg0OHBAQHDgnISYuMDQwLy4uMDQuLjAuLC4uMC4wLi4wLjAuMDAuLi4uLi4uLjAuLDEuLi4uLi4uLi4uLv/AABEIAMIBAwMBIgACEQEDEQH/', 9),
(83, 'Shahi Paneer', 'main,veg,', 150, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1nfXcnP1Rb-04XLh_okK2KDgEvXXgX3WZtg&usqp=CAU', 9),
(84, 'Chicken Fried Rice', 'main,non-veg,rice', 100, 'https://c.ndtvimg.com/2020-09/19g10na8_fried-rice_625x300_24_September_20.jpg', 9),
(85, 'Veg Chowmein', 'starter,veg,noodles', 80, 'https://b.zmtcdn.com/data/pictures/chains/8/19137878/e5996f30c921286dcf29c63b37f73896_o2_featured_v2.jpg?output-format=webp', 9),
(86, 'Chike Tikka', 'non-veg,starter', 355, 'https://b.zmtcdn.com/data/dish_photos/9ac/0dd75f29a7215c6c35bbb08e5263c9ac.jpg?fit=around|130:130&crop=130:130;*,*', 10),
(87, 'Chicken Kadai', 'non-veg,meal', 192, 'https://b.zmtcdn.com/data/dish_photos/7a7/e26bac145cd683009de4a83a14e4c7a7.jpg?fit=around|130:130&crop=130:130;*,*', 10),
(88, 'Chicken Double Patty Burger Meal', 'veg,meal', 400, 'https://b.zmtcdn.com/data/dish_photos/4dc/a2f97c5423aa05e93c5ac4099a24b4dc.jpg?fit=around|130:130&crop=130:130;*,*', 10),
(89, 'Paneer Double Patty Burger Meal', 'veg,meal,', 259, 'https://b.zmtcdn.com/data/dish_photos/c02/fb7773289ca29df6761d0cb1268b4c02.jpg?fit=around|130:130&crop=130:130;*,*', 10),
(90, 'Roll', 'starter,veg,bread', 50, 'https://www.recipetineats.com/wp-content/uploads/2014/08/Mexican-Spring-Rolls-1-1.jpg', 10),
(91, '', '', 0, '', 0),
(92, '', '', 0, '', 0),
(93, '', '', 0, '', 0),
(94, '', '', 0, '', 0),
(95, '', '', 0, '', 0),
(96, '', '', 0, '', 0),
(97, '', '', 0, '', 0),
(98, '', '', 0, '', 0),
(99, '', '', 0, '', 0),
(100, '', '', 0, '', 0),
(101, '', '', 0, '', 0),
(102, '', '', 0, '', 0),
(103, '', '', 0, '', 0),
(104, '', '', 0, '', 0),
(105, '', '', 0, '', 0),
(106, '', '', 0, '', 0),
(107, '', '', 0, '', 0),
(108, '', '', 0, '', 0),
(109, '', '', 0, '', 0),
(110, '', '', 0, '', 0),
(111, '', '', 0, '', 0),
(112, '', '', 0, '', 0),
(113, '', '', 0, '', 0),
(114, '', '', 0, '', 0),
(115, '', '', 0, '', 0),
(116, '', '', 0, '', 0),
(117, '', '', 0, '', 0),
(118, '', '', 0, '', 0),
(119, '', '', 0, '', 0),
(120, '', '', 0, '', 0),
(121, '', '', 0, '', 0),
(122, '', '', 0, '', 0),
(123, '', '', 0, '', 0),
(124, '', '', 0, '', 0),
(125, '', '', 0, '', 0),
(126, '', '', 0, '', 0),
(127, '', '', 0, '', 0),
(128, '', '', 0, '', 0),
(129, '', '', 0, '', 0),
(130, '', '', 0, '', 0),
(131, '', '', 0, '', 0),
(132, '', '', 0, '', 0),
(133, '', '', 0, '', 0),
(134, '', '', 0, '', 0),
(135, '', '', 0, '', 0),
(136, '', '', 0, '', 0),
(137, '', '', 0, '', 0),
(138, '', '', 0, '', 0),
(139, '', '', 0, '', 0),
(140, '', '', 0, '', 0),
(141, '', '', 0, '', 0),
(142, '', '', 0, '', 0),
(143, '', '', 0, '', 0),
(144, '', '', 0, '', 0),
(145, '', '', 0, '', 0),
(146, '', '', 0, '', 0),
(147, '', '', 0, '', 0),
(148, '', '', 0, '', 0),
(149, '', '', 0, '', 0),
(150, '', '', 0, '', 0),
(151, '', '', 0, '', 0),
(152, '', '', 0, '', 0),
(153, '', '', 0, '', 0),
(154, '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `rated` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `status`, `payment_method`, `amount`, `address`, `rated`) VALUES
('60f83fe8a1580', 2, '2021-07-21 09:10:00', 1, 'credit card', 608, 1, 1),
('60f841908bc3d', 2, '2021-07-21 09:17:00', 1, 'UPI', 860, 1, 1),
('60f843e54da3b', 2, '2021-07-21 09:27:00', 1, 'Debit Card', 283, 1, 1),
('60f999436767a', 2, '2021-07-22 09:43:00', 1, 'credit card', 640, 1, 1),
('60f9b73bdfd65', 2, '2021-07-22 11:51:00', 1, 'credit card', 283, 2, 1),
('60fae1d3481ea', 2, '2021-07-23 09:05:00', 1, 'credit card', 1700, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `dish_id`, `quantity`) VALUES
(41, '60f83fe8a1580', 21, 2),
(42, '60f841908bc3d', 11, 1),
(43, '60f843e54da3b', 2, 1),
(44, '60f999436767a', 3, 1),
(45, '60f999436767a', 2, 1),
(46, '60f999436767a', 4, 1),
(48, '60f9b73bdfd65', 2, 1),
(49, '60fae1d3481ea', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cuisins` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vote` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`res_id`, `res_name`, `photo`, `cuisins`, `address`, `vote`, `rating`) VALUES
(1, 'Food Cloud', 'https://b.zmtcdn.com/data/pictures/5/18706155/992d8ed94245330492fffef4d7ea1d9c_o2_featured_v2.jpg', 'Cuisine Varies', 'Aaya Nagar', 13, 4),
(2, 'Burger.in', 'https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YnVyZ2VyJTIwcG5nfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80', 'Fast FoodAdchini, New Delhi', 'Aaya Nagar', 8, 4),
(3, 'Hunger Hackers', 'https://b.zmtcdn.com/data/pictures/chains/1/4000081/7ac630e8c2e925ee164e2e87b0fcb560_o2_featured_v2.jpg', 'North Indian, Seafood, Continental', 'Boring Road,Patna', 1, 3),
(4, 'Mezban Grills', 'https://www.luxurylifestylemag.co.uk/wp-content/uploads/2021/04/bigstock-Beef-steaks-sizzling-on-the-gr-294363952.jpg', 'Mughlai', 'Town House', 0, 0),
(5, 'chulha', 'https://b.zmtcdn.com/data/pictures/7/18942207/c815cfd48c78bc4cfb6ec1c7f8a5ea47_o2_featured_v2.jpg', 'North Indian,South Indian, Fast Food', 'Boring Road,Patna', 0, 0),
(6, 'KFC', 'https://b.zmtcdn.com/data/pictures/4/4000004/9410759d611db9c62c3acc23c1f27e06.jpg?fit=around|771.75:416.25&crop=771.75:416.25;*,*', 'Burger,kabab,Beverages', 'City Mall', 0, 0),
(7, 'Domino\'s', 'https://b.zmtcdn.com/data/pictures/3/4000013/6e118fe83193856b9ea9e78993344529_o2_featured_v2.jpg?output-format=webp', 'Pizza,', 'Near,Central Mall', 0, 0),
(8, 'Pizza hut', 'https://b.zmtcdn.com/data/pictures/chains/5/4000035/ba50a5176f9b3abf84a4b734543474a2_o2_featured_v2.jpg', 'Pizza,Fast Food,Beverages,Desserts', 'Down Town', 0, 0),
(9, 'Bowl\'s n Biryani', '', 'Biryani,Mughlai,North Indian', 'Arrocity', 0, 0),
(10, 'Hungry House', 'https://b.zmtcdn.com/data/pictures/5/19676425/d96608eef4dbca1bd71a96d9b4ffdc87_o2_featured_v2.jpg', 'North Indian,Mughla,iChinese,Dessert', 'Kankarbagh', 0, 0),
(11, 'Social Kulture', 'https://b.zmtcdn.com/data/pictures/6/19436606/01c361be49104bfce556f3360879c13a_o2_featured_v2.jpeg', 'North Indian, Chinese', 'Phulwari', 0, 0),
(12, 'McDonald\'s', 'https://b.zmtcdn.com/data/pictures/chains/9/4000269/d1758cd6112e34e757394dc587cdba90_o2_featured_v2.jpg?output-format=webp', 'North Indian, Chinese,kabab', 'Junction', 0, 0),
(13, 'Curry Story', 'https://b.zmtcdn.com/data/pictures/chains/3/18640853/4d69c12dd85475c85881252477dfdf70_o2_featured_v2.jpg', 'North Indian,Mughlai,Beverages', 'Phulwari', 0, 0),
(14, 'Haldiram', 'https://b.zmtcdn.com/data/pictures/chains/4/18705064/b6cfbb9e61646419ceb4f74ccb3af178_o2_featured_v2.png?output-format=webp', 'North Indian,Fast Food,Deeserts,Mithai,Chinese', 'Near Bus Stand', 0, 0),
(15, 'Bikaner Sweets & Restaurant', 'https://b.zmtcdn.com/data/pictures/chains/7/18705437/75d6026888167fcc63d7a3d192c25527_o2_featured_v2.jpg', '', 'Areal Road', 0, 0),
(16, 'Momo Nation', 'https://b.zmtcdn.com/data/pictures/0/19566510/65a35f27aca9b5e0ad6f6f8af0350369_o2_featured_v2.jpg', 'Sweets,Fast Food,Sandwich,Cakes', 'Gandhi Maidan', 0, 0),
(17, 'Chandan Dhaba', 'https://b.zmtcdn.com/data/pictures/8/18591498/bae3d7eea0fca447553acc4c7990923b_o2_featured_v2.jpg', 'Rolls,North Indian,Chinese', 'City Mall', 0, 0),
(18, '7th Heaven', 'https://b.zmtcdn.com/data/pictures/7/18778907/bb8a8c297d141568fffc439acc586d1c_o2_featured_v2.jpg', 'Bakery,Desserts,Fast Food,Beverages', 'V2,Patna', 0, 0),
(19, 'HungerHook ', 'https://b.zmtcdn.com/data/pictures/1/18625991/9cd2d84e71406a56ab05935e093ceec4_o2_featured_v2.jpg', 'Pizza,Fast Food', 'Virgo', 0, 0),
(20, 'Gulmohar House', 'https://b.zmtcdn.com/data/pictures/chains/5/18784135/68776c6a37f7f1e4c9b41830f7486d1e_o2_featured_v2.jpg', 'Chinese,South Indian,Desserts,Noth Indian', 'Masaurhi', 0, 0),
(21, 'The Food Mania', 'https://b.zmtcdn.com/data/pictures/chains/1/19072861/531e30b3a02c1713cf007d76b16c88b9_o2_featured_v2.jpg', 'Fast Food,Mughlai,Chinese', 'Chauraha', 0, 0),
(22, 'Dragon Flames', 'https://b.zmtcdn.com/data/pictures/0/4000330/3d8dabc7e76db9d9205e707cad29dc7f_o2_featured_v2.jpg', 'Chinese,Sea Food,Fast Food,Momos', 'Boring Road,Patna', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `image`) VALUES
(1, 'salman', 'salman@gmail.com', '12345', 'user.jpg'),
(2, 'Rakesh Kumar', 'rakesh@gmail.com', 'rakesh', 'user.jpg'),
(4, 'Deepak kumar', 'deepak@gmail.com', 'deepak', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`dish_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `dish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
