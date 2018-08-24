-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2018 at 04:30 PM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncd_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_foods`
--

CREATE TABLE `category_foods` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_foods`
--

INSERT INTO `category_foods` (`cat_id`, `cat_name`) VALUES
(1, 'อาหารคาวเพื่อสุขภาพ'),
(2, 'เครื่องดื่มเพื่อสุขภาพ');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `dis_id` int(11) NOT NULL,
  `dis_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`dis_id`, `dis_name`) VALUES
(1, 'โรคหัวใจ'),
(2, 'โรคเบาหวาน'),
(3, 'โรคเกาต์'),
(4, 'โรคความดันโลหิตสูง');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `edu_id` int(11) NOT NULL,
  `edu_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`edu_id`, `edu_name`) VALUES
(1, 'ประถมศึกษา'),
(2, 'มัธยมศึกษาตอนต้น'),
(3, 'มัธยมศึกษาตอนปลาย'),
(4, 'อุดมศึกษา'),
(5, 'ปริญญาตรี'),
(6, 'สูงกว่าปริญญาตรี');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `raw_material` varchar(200) NOT NULL,
  `dis_id` varchar(100) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `raw_material`, `dis_id`, `cat_id`, `image`) VALUES
(2001, 'ไก่นึ่งใบเตย', '1.เนื้อน่องไก่ 100 กรัม\r\n2.ใบเตยหอม 6-7 ใบ\r\n3.เกลือป่น\r\n4.พริกไทยป่น\r\n5.ซีอิ๊วขาว\r\n6.ซีอิ๊วดำ', '2', '1', '1001.jpg'),
(1001, 'ไข่ห่อผัดหมี่ข้าวกล้อง', '1.ไข่ไก่\r\n2.ซีอิ๊วขาว\r\n3.เส้นหมี่ข้าวกล้อง\r\n4.กะหล่ำปลีหั่นฝอย\r\n5.แครอทหั่นฝอย\r\n6.ถั่วลันเตา\r\n7.ซีอิ๊วดำ\r\n8.พริกไทยป่น\r\n9.น้ำมันรำข้าว', '1', '1', '1001.jpg'),
(3001, 'บาร์บีคิวแซลมอน', '1.เนื้อปลาแซลมอน\n2.มะเขือเทศลูกเล็ก\n3.พริกหยวกสีเขียว\n4.เกลือป่น\n5.พริกไทยป่น\n6.น้ำมันมะกอก\n7.เลมอนฝานบาง', '3', '1', '1001.jpg'),
(1004, 'น้ำแดง', 'd', '2', '2', '1001.jpg'),
(1003, '66565', '655', '1', '1', '1001.jpg'),
(1002, '5523', 'sss', '1', '1', '1001.jpg'),
(1005, 'น้ำส้ม', 'fwfew', '3', '2', '1001.jpg'),
(1006, 'น้ำมะนาว', 'wfwfwfwf', '4', '2', '1001.jpg'),
(1007, 'fwfwfw', 'fwfwfw', '1', '1', '1001.jpg'),
(1008, 'wfwfwf', 'fwfwf', '1', '1', '1001.jpg'),
(1009, 'fwfwfw', 'fwfw', '1', '1', '1001.jpg'),
(1010, 'ชาเย็น', 'fwfw', '1', '2', '1001.jpg'),
(1011, 'fwfwfw', 'fwfw', '1', '1', '1001.jpg'),
(1012, 'dqdqdqdqdq', 'fwfwf', '1', '1', '1001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `image_kno`
--

CREATE TABLE `image_kno` (
  `img_id` int(11) NOT NULL,
  `kno_id` int(11) NOT NULL,
  `img_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_kno`
--

INSERT INTO `image_kno` (`img_id`, `kno_id`, `img_name`) VALUES
(1, 1, '1-1.jpg'),
(2, 1, '1-3.jpg'),
(3, 1, '1-2.jpg'),
(4, 2, '2-4.jpg'),
(5, 2, '2-3.jpg'),
(6, 2, '2-2.jpg'),
(7, 3, '3-3.jpg'),
(8, 3, '3.jpg'),
(9, 3, '3-4.jpg'),
(10, 4, '4-1.jpg'),
(11, 4, '4-2.jpg'),
(12, 4, '4-4.jpg'),
(13, 4, '4-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge`
--

CREATE TABLE `knowledge` (
  `kno_id` int(11) NOT NULL,
  `kno_name` varchar(50) NOT NULL,
  `explanation` varchar(3500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `dis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `knowledge`
--

INSERT INTO `knowledge` (`kno_id`, `kno_name`, `explanation`, `image`, `dis_id`) VALUES
(1, 'การเลือกรับประทานอาหารสำหรับผู้ป่วยโรคหัวใจ', 'ในครั้งนี้ ได้รับเกียรติจาก รศ.นพ.สรณ บุญใบชัยพฤกษ์ หน่วยโรคหัวใจ ภาควิชาอายุรศาสตร์ คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี มหาวิทยาลัยมหิดล ในการให้ข้อมูลเกี่ยวกับเรื่องของการดูแลหัวใจให้ปลอดภัยจากโรค\nหน้าที่ของหัวใจ\nหัวใจมีหน้าที่ในการสูบฉีดเลือดไปเลี้ยงส่วนต่าง ๆ ของร่างกาย โดยทำงานไม่มีวันหยุด หากหัวใจไม่ทำงานร่างกายก็อยู่ไม่ได้เช่นกัน\nปัจจัยเสี่ยงต่อโรคหัวใจ\nสำหรับปัจจัยเสี่ยงที่จะส่งผลให้เกิดปัญหากับหัวใจที่พบได้บ่อยในประเทศไทย ได้แก่ การสูบบุหรี่ การรับประทานอาหารประเภทแป้ง อาหารที่มีรสหวานจัด อาหารที่มีไขมันสูง และขาดการออกกำลังกาย ซึ่งจะส่งผลให้เกิดโรคอ้วน เบาหวาน ความดันโลหิตสูง อันมีผลต่อการเกิดโรคหัวใจตามมา\nนอกจากปัจจัยเสี่ยงดังกล่าวข้างต้น พันธุกรรมก็เป็นปัจจัยเสี่ยงต่อการเกิดโรคหัวใจด้วยเช่นกัน โดยในผู้ที่มีประวัติคนในครอบครัวเป็นโรคหัวใจจะมีโอกาสเป็นโรคหัวใจได้ และสำหรับโรคบางโรค เช่น โรคเบาหวาน โรคลูปัส ก็จะส่งผลให้ผู้ป่วยมีโอกาสเป็นโรคหัวใจได้มากขึ้นด้วย\nโรคหัวใจที่พบได้บ่อยในประเทศไทย\nในประเทศไทย โรคหัวใจที่พบได้บ่อยคือโรคของหลอดเลือด ซึ่งหัวใจมีหน้าที่ในการปั้มเลือด แต่ในขณะเดียวกันก็ต้องการเลือดไปเลี้ยงตัวเองผ่านทางหลอดเลือด 3 เส้น ซึ่งเมื่อมีการใช้งานไปนาน ๆ หลอดเลือดเหล่านี้ก็จะมีไขมันและหินปูนไปสะสม เกิดเป็นตะกรันและทำให้หลอดเลือดตีบได้ หากตระกรันนี้เกิดการปริแตกออก ก็จะทำให้ลิ่มเลือดอุดตัน และทำให้ผู้ป่วยเสียชีวิตอย่างเฉียบพลันได้ นอกจากนั้นยังอาจก่อให้เกิดความทุพลภาพได้ด้วย', 'heart03.jpg\r\n', 1),
(2, 'หลักการดูแลตัวเองสำหรับผู้ป่วยเบาหวาน', 'รับประทานอาหารให้ครบ 5 หมู่\r\nรับประทานข้าวเป็นหลัก สลับกับอาหารพวกแป้งเป็นบางมื้อ\r\nรับประทานพืชผักให้มาก และรับประทานผลไม้เป็นประจำ เพราะให้สารต้านอนุมูลอิสระสูง\r\nรับประทานเนื้อปลา เนื้อสัตว์ไม่ติดมัน ไข่ และถั่วเมล็ดเป็นประจำ\r\nดื่มนมให้พอเหมาะกับวัย\r\nหลีกเลี่ยงอาหาร หวาน มัน และเค็ม\r\nรับประทานอาหาร 3 มื้อ และอาหารว่างหนึ่งมื้อ และรับประทานอาหารให้เป็นเวลา ห้ามงดอาหาร\r\nรับประทานไขมันให้น้อย เลือกเนื้อสัตว์ที่ไม่ติดมัน หลีกเลี่ยงการทอดใช้การย่าง อบ ต้ม หรือเผาแทนการทอด\r\nรับประทานน้ำตาลให้น้อยลง ก่อนรับประทานอาหารให้อ่านฉลากอาหาร หลีกเลี่ยงน้ำอัดลมที่ใส่น้ำตาล หลีกเลี่ยงคุกกี้ เค้ก ลูกอม\r\nหลีกเลี่ยงอาหารเค็ม โดยการเติมเกลือให้น้อย หลีกเลี่ยงอาหารกระป่อง ให้ชิมรสอาหารก่อนปรุง\r\nหลีกเลี่ยงแอลกอฮอล์', '2.jpg', 2),
(3, 'สาเหตุของโรคเกาต์', 'โรคเกาต์เป็นโรคที่เกิดจากการที่ร่างกายมีกรดยูริกในเลือดสูงอยู่เป็นเวลานานจนเกิดการตกผลึกของยูเรตตามเนื้อเยื่อต่าง ๆ เช่น ข้อ (ทำให้เกิดข้ออักเสบ) ไต (ทำให้เกิดนิ่วในไตและไตวาย) ส่วนสาเหตุที่ทำให้กรดยูริกในเลือดสูงก็เนื่องมาจาก ร่างกายสร้างกรดยูริกมากกว่าปริมาณที่ขับออก (นอกจากกรดยูริกในเลือดสูงจะเป็นผลมาจากการที่ร่างกายขาดยีนในการสลายกรดยูริกแล้ว ยังพบว่าอาจเป็นผลมาจากอาหารที่รับประทานเข้าไป โดยเฉพาะอาหารที่มีสารพิวรีนสูง และจากขบวนการสลายสารพิวรีนในร่างกาย โดยการสลายโปรตีนและได้สารพิวรีนออกมา ซึ่งกรดยูริกในร่างกายส่วนใหญ่จะเกิดจากกระบวนการนี้) หรือเกิดจากการที่ร่างกายสร้างกรดยูริกเป็นปกติแต่ปริมาณที่ขับออกจากร่างกายมีน้อยกว่า (กรดยูริกที่สร้างขึ้นจะมีการขับออกจากร่างกายได้ 2 ทางหลัก คือ ขับออกทางระบบทางเดินอาหาร ซึ่งจะขับออกได้ประมาณ 1 ใน 3 และส่วนที่เหลือจะขับออกทางไตได้ประมาณ 2 ใน 3 ของปริมาณกรดยูริกที่ร่างกายสร้างได้ในแต่ละวัน ซึ่งผู้ป่วยส่วนใหญ่ประมาณ 90% จะมีความผิดปกติในการขับกรดยูริกออกทางไต) ส่วนสาเหตุอื่น ๆ หรือสาเหตุที่ทำให้ข้ออักเสบเป็นซ้ำใหม่ คือ\r\n\r\nความผิดปกติทางพันธุกรรมจากการขาดเอนไซม์บางตัวหรือเอนไซม์บางตัวทำงานมากเกินไป เพราะผู้ป่วยที่เป็นโรคนี้มักพบว่ามีพ่อแม่ญาติพี่น้องเป็นโรคนี้ด้วย\r\nเกิดจากโรคบางชนิดที่ส่งผลให้มีกรดยูริกในเลือดสูง เช่น โรคมะเร็ง มะเร็งเม็ดเลือดขาว โรคเลือด โรคทาลัสซีเมีย โรคอ้วน โรคเบาหวาน โรคความดันโลหิตสูง รวมไปถึงการใช้ยารักษามะเร็งหรือฉายรังสี เป็นต้น\r\nเกิดจากไตขับกรดยูริกได้น้อยลง เช่น เป็นโรคไต ภาวะไตวาย ตะกั่วเป็นพิษ\r\nเกิดจากโรคต่อมไร้ท่อบางชนิด เช่น ไฮโปไทรอยด์ (ภาวะพร่องไทรอยด์ฮอร์โมน, ภาวะขาดไทรอยด์) เพราะส่งผลให้มีกรดยูริกในเลือดสูง\r\nเกิดจากเพศ เนื่องจากพบโรคนี้ได้ในผู้ชายมากกว่าผู้หญิง\r\nการดื่มแอลกอฮอล์ เช่น เหล้า เบียร์ ไวน์ โดยเฉพาะเบียร์ เพราะแอลกอฮอล์มีฤทธิ์ลดการขับกรดยูริกออกทางไตหรือทางปัสสาวะ หลังการดื่มจึงทำให้ไตขับกรดยูริกได้น้อยลง กรดยูริกจึงคั่งอยู่ในเลือดสูงกว่าปกติ\r\nการรับประทานอาหารที่ให้กรดยูริก (สารพิวรีน) สูงอย่างต่อเนื่องเป็นประจำ หรือการรับประทานอาหารที่หมักด้วยยีสต์ (Yeast คือ เชื้อราบางชนิดที่ใช้ในการหมักอาหารและเครื่องดื่ม) เพราะเป็นสาเหตุทำให้มีกรดยูริกในเลือดสูง\r\nความอ้วนหรือภาวะน้ำหนักตัวเกิน โดยอาจสัมพันธ์กับภาวะดื้อต่อฮอร์โมนอินซูลินที่ส่งผลให้เกิดโรคอ้วน (Insulin resistance)', '3.jpg', 3),
(4, 'ความดันโลหิตสูง', 'ปัจจุบันความดันโลหิตสูงเป็นหนึ่งในกลุ่มของโรคที่ทำให้เกิดผลแทรกซ้อนของโรคหัวใจและหลอดเลือด ซึ่งรวมทั้งหลอดเลือดที่สมองและไตด้วย จุดมุ่งหมายของการรักษาภาวะความดันโลหิตสูงเพื่อลดอัตราทุพพลภาพและอัตราตาย   ซึ่งเกิดจากภาวะแทรกซ้อนทางหัวใจและหลอดเลือด การดูแลเฉพาะแต่ความดันโลหิตสูงเท่านั้นจะทำให้ได้ผลไม่ดีเท่าที่ควร ดังนั้นแพทย์จึงต้องตรวจค้นหาภาวะอื่นๆ ที่อาจพบในตัวผู้ป่วยด้วย เช่น เบาหวาน ไขมันในเลือดสูง ภาวะอ้วน ผนังหัวใจห้องซ้ายล่างหนา โรคเก๊าท์ เป็นต้น ซึ่งแพทย์จะต้องดำเนินการควบคุมและรักษาคู่ไปกับการรักษาความดันโลหิตจึงจะได้ผลดี และมีประสิทธิภาพเต็มที่ ', '4.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` varchar(10) NOT NULL,
  `register_date` date NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `home_number` varchar(10) NOT NULL,
  `mooban` varchar(20) NOT NULL,
  `Road` varchar(40) NOT NULL,
  `tumbon` varchar(20) NOT NULL,
  `aumpher` varchar(30) NOT NULL,
  `province` varchar(20) NOT NULL,
  `postalcode` varchar(20) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `education` varchar(30) NOT NULL,
  `career` varchar(40) NOT NULL,
  `disease` varchar(40) NOT NULL,
  `duration` varchar(5) NOT NULL,
  `Previous_symptoms` varchar(40) NOT NULL,
  `Recent_symptoms` varchar(40) NOT NULL,
  `supplementary_food` varchar(30) NOT NULL,
  `line_id` varchar(30) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_ncd`
--

CREATE TABLE `order_ncd` (
  `pro_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `price_sum` int(11) NOT NULL,
  `mem_id` varchar(10) NOT NULL,
  `orderAdd` varchar(1500) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `distance` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `promotion_dateon` date NOT NULL,
  `promotion_Dateoff` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `promotion_name`, `description`, `image`, `promotion_dateon`, `promotion_Dateoff`) VALUES
(1, 'test1', 'test', '111.jpg', '2017-06-13', '2017-06-15'),
(2, 'test2', 'test', '1.jpg', '2017-06-13', '2017-06-15'),
(3, 'test3', 'test', '111.jpg', '2017-06-13', '2017-06-15'),
(4, '4', '', '1.jpg', '2017-06-21', '2017-06-18'),
(5, 'Penguins.jpg', '5', '111.jpg', '2017-06-15', '2017-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `education` varchar(50) NOT NULL,
  `Salary` int(11) NOT NULL,
  `staff_Startdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `fname`, `lname`, `address`, `telephone`, `sex`, `education`, `Salary`, `staff_Startdate`) VALUES
(18112852, 'กิดาการ', 'อินทปัญญา', 'ชลบุรี', '0831101923', 'ชาย', 'ป ตรี', 30000, '0000-00-00'),
(18113001, 'staff', 'staff', 'ปราจีนบุรี', '0831101923', 'ชาย', 'ป ตรี', 30000, '2018-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `status`) VALUES
('1', '1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', 'User'),
('18112852', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('18113001', 'staff', '1253208465b1efa876f982d8a9e73eef', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_foods`
--
ALTER TABLE `category_foods`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `image_kno`
--
ALTER TABLE `image_kno`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `knowledge`
--
ALTER TABLE `knowledge`
  ADD PRIMARY KEY (`kno_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `order_ncd`
--
ALTER TABLE `order_ncd`
  ADD PRIMARY KEY (`pro_id`,`order_id`,`mem_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_kno`
--
ALTER TABLE `image_kno`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18113002;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
