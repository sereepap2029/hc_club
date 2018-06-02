/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : lawyer

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2018-05-28 18:44:50
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` text COLLATE utf8_unicode_ci,
  `lastname` text COLLATE utf8_unicode_ci,
  `username` text COLLATE utf8_unicode_ci,
  `password` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `prefix` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('ac15ecb9d3', 'sdsd', 'asdds', 'sereepap1', 'sereepap1', 'sereepap2029@gmail.com', 'นาง');
INSERT INTO `admin_user` VALUES ('bcbafee4da', 'sadmin', 'sadmin', 'sadmin', 'sadmin', 'sadmin@gmail.com', 'นาย');
INSERT INTO `admin_user` VALUES ('c26351bc2c', 'sereepap', 'khamsee', 'sereepap2029', '123456789', 'sereepap2029@hotmail.com', 'นาย');

-- ----------------------------
-- Table structure for `aom`
-- ----------------------------
DROP TABLE IF EXISTS `aom`;
CREATE TABLE `aom` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` bigint(11) DEFAULT NULL,
  `acc_no` text COLLATE utf8_unicode_ci,
  `borrower` text COLLATE utf8_unicode_ci,
  `borrower_id` text COLLATE utf8_unicode_ci,
  `black_case` text COLLATE utf8_unicode_ci,
  `red_case` text COLLATE utf8_unicode_ci,
  `branch` text COLLATE utf8_unicode_ci,
  `insurance` text COLLATE utf8_unicode_ci,
  `defendant_num` text COLLATE utf8_unicode_ci,
  `sue_date` bigint(11) DEFAULT NULL,
  `consider_date` bigint(11) DEFAULT NULL,
  `Judge_date` bigint(11) DEFAULT NULL,
  `appeal_date` bigint(11) DEFAULT NULL,
  `unappeal_date` bigint(11) DEFAULT NULL,
  `appeal_type_date` bigint(11) DEFAULT NULL,
  `statement_officer` text COLLATE utf8_unicode_ci,
  `court_order_note` text COLLATE utf8_unicode_ci,
  `warrant_mark_date` bigint(11) DEFAULT NULL,
  `court_cost` text COLLATE utf8_unicode_ci,
  `court_cost_date` bigint(11) DEFAULT NULL,
  `property` text COLLATE utf8_unicode_ci,
  `sequester_date` bigint(11) DEFAULT NULL,
  `sequester_property` text COLLATE utf8_unicode_ci,
  `sold_estimate` text COLLATE utf8_unicode_ci,
  `judge` text COLLATE utf8_unicode_ci,
  `appeal_type` text COLLATE utf8_unicode_ci,
  `bank_statement` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `we_statement` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `court_order` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `warrant_mark` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `finish` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_date` bigint(11) DEFAULT NULL,
  `cort` text COLLATE utf8_unicode_ci,
  `principle` bigint(11) DEFAULT NULL,
  `interest` bigint(11) DEFAULT NULL,
  `monthly_pay` text COLLATE utf8_unicode_ci,
  `pay_time` text COLLATE utf8_unicode_ci,
  `start_pay_year` text COLLATE utf8_unicode_ci,
  `start_pay_month` text COLLATE utf8_unicode_ci,
  `end_pay_date` bigint(11) DEFAULT NULL,
  `borrow_date` bigint(11) DEFAULT NULL,
  `types_of_credits` text COLLATE utf8_unicode_ci,
  `loan` text COLLATE utf8_unicode_ci,
  `interest_when_borrow` text COLLATE utf8_unicode_ci,
  `interest_when_sue` text COLLATE utf8_unicode_ci,
  `section4_template` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section4_description` text COLLATE utf8_unicode_ci,
  `heritage` text COLLATE utf8_unicode_ci,
  `heritage_relate` text COLLATE utf8_unicode_ci,
  `borrower_dead` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `responsible_lawyer` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sue_date_limit` bigint(11) DEFAULT NULL,
  `interest_pk` text COLLATE utf8_unicode_ci,
  `fire_warrant` text COLLATE utf8_unicode_ci,
  `group_number` text COLLATE utf8_unicode_ci,
  `group_name` text COLLATE utf8_unicode_ci,
  `seize_date` bigint(11) DEFAULT NULL,
  `borrower_mail_1` enum('n','z','y') COLLATE utf8_unicode_ci DEFAULT 'z',
  `borrower_mail_2` enum('n','z','y') COLLATE utf8_unicode_ci DEFAULT 'z',
  `borrower_mail_3` enum('n','z','y') COLLATE utf8_unicode_ci DEFAULT 'z',
  `court_order_date` bigint(11) DEFAULT NULL,
  `sold_note` text COLLATE utf8_unicode_ci,
  `consider_note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of aom
-- ----------------------------
INSERT INTO `aom` VALUES ('55e4694ddf', '1524070801', 'ssad', '21321', '12321', 'wqweqw', 'qewqe', 'qweqw', 'sadasdas', '2', '1523379601', '1523984401', '1524070801', '1523466001', '1523984401', '1523898001', 'asdasd', '', '-79305374523', '', '-79305374523', '', '-79305374523', '', '', 'normal', null, 'y', 'n', 'n', 'y', 'n', '1523379601', 'dasd', '22', '33', '2000', '2', '2555', 'dddd', '1524502801', '1523293201', 'asadasd', '231231', '3223', '1232123', 'c2a3d22b5e', 'ไม่จ่าย ไม่จ่าย จ้างให้ก็ไม่ยอมจ่าย asdqweqweqwe', 'กกก', 'หหหห', 'y', 'a16b0b7adf', null, null, null, null, null, null, 'n', 'n', 'n', null, null, null);
INSERT INTO `aom` VALUES ('7c70d0dd8f', '-79305374523', '', 'ฟหก', 'หฟก', 'ฟหก', 'ฟหก', 'หฟกฟหก', 'ฟหกฟหก', '/', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '', '', '-79305374523', '', '-79305374523', '', '-79305374523', '', '', null, null, 'n', 'n', 'n', 'n', 'n', '1523466001', 'AA', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'n', null, null, null, null, null, null, null, 'n', 'n', 'n', null, null, null);
INSERT INTO `aom` VALUES ('7d001899f2', '1525021201', '800056471157', 'นางสาวธัญรัศม์ ราชแก้ว', '3440900806703', 'ผบ.55/2561', 'ผบ.56/2561', 'วาปีปทุม', '', '3', '1526317201', '1528995601', '1528995601', '1531587601', '1531674001', '1531674001', 'นางสาวจันทร์สุดา  แสงดารา', '', '1526835601', '', '-79305374523', '', '1526490001', '', '', 'normal', 'order_appeal', 'n', 'y', 'y', 'y', 'n', '1526403601', 'จังหวัดมหาสารคาม', '21', '30', '', '30/11/2559', '30/11/2559', '30/11/2559', '1480438801', '1450976401', 'พัฒนาองค์กรชุมชน(รายบุคคล)', '50000', 'MRR+2', '', '486f3fdfca', 'ข้อ 4. นับแต่จำเลยที่ 1 ได้ทำสัญญากู้ยืมเงินและรับเงินไปจากโจทก์ตามคำฟ้อง ข้อ 2. \r\nสุดท้ายของเดือนมกราคม 2562 จำเลยที่ 1 ไม่ชำระ จึงถือได้ว่าจำเลยที่ 1 ผิดนัดชำระหนี้ตั้งแต่วันที่ 1 ', '', '', 'n', '7d15e3df81', '1526403601', '520.21', '384.28', '', '', '1526576401', 'y', 'n', 'y', '1526144401', 'กฟหกฟหก', '');
INSERT INTO `aom` VALUES ('80e68fb941', '1526490001', '800058338842', 'นายฉวี  ไปบน', '3440900055694', '', '', 'วาปีปทุม', '', '2', '-79305374523', '-79305374523', '1526576401', '-79305374523', '-79305374523', '-79305374523', '', '', '-79305374523', '', '-79305374523', '', '-79305374523', '', '', null, null, 'n', 'n', 'n', 'n', 'n', '-79305374523', 'จังหวัดมหาสารคาม', '0', '0', '', '31/01/2560', '', '31/01/2560', '-79305374523', '1456333201', 'พัฒนาองค์กรชุมชน(รายบุคคล)', '50000', 'MRR+2', '', '7014d79bb4', '', '', '', 'n', '7d15e3df81', null, null, null, null, null, null, 'n', 'n', 'n', null, null, null);
INSERT INTO `aom` VALUES ('b7bcfa574a', '1525280401', '2321', 'ssssssss     dddddddddddddd', '2233', '112', '3123', '', '', '', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '', '', '-79305374523', '', '-79305374523', '', '-79305374523', '', '', null, null, 'n', 'n', 'n', 'n', 'n', '-79305374523', 'aqwe', '1', '5', '', 'สุดท้าย', '', '', '-79305374523', '1525194001', 'asd', 'das', 'asd', '', '486f3fdfca', '', '', '', 'n', '7d15e3df81', '-79305374523', '4', '3', '1', '22', '-79305374523', 'z', 'z', 'z', '-79305374523', '', null);

-- ----------------------------
-- Table structure for `aom_consider`
-- ----------------------------
DROP TABLE IF EXISTS `aom_consider`;
CREATE TABLE `aom_consider` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `consider_date` bigint(11) DEFAULT NULL,
  `consider_note` text COLLATE utf8_unicode_ci,
  `sort_order` bigint(11) DEFAULT NULL,
  `aom_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of aom_consider
-- ----------------------------
INSERT INTO `aom_consider` VALUES ('8', '1525280401', 'QQ', '0', '7d001899f2');

-- ----------------------------
-- Table structure for `aom_item`
-- ----------------------------
DROP TABLE IF EXISTS `aom_item`;
CREATE TABLE `aom_item` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `filepath` text COLLATE utf8_unicode_ci,
  `aom_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of aom_item
-- ----------------------------
INSERT INTO `aom_item` VALUES ('05bc9ebfa7', '7', '7d001899f2_05bc9ebfa7_Jellyfish.jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('1f8ab2d642', '1', '7d001899f2_1f8ab2d642_after 2.PNG', '7d001899f2');
INSERT INTO `aom_item` VALUES ('30f17ab91d', '9', '7d001899f2_30f17ab91d_Penguins (1).jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('577a4f1fdf', '3', '7c70d0dd8f_577a4f1fdf.jpg', '7c70d0dd8f');
INSERT INTO `aom_item` VALUES ('5e893956bb', '6', '7d001899f2_5e893956bb_Lighthouse (1).jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('738039aa60', '2', '7d001899f2_738039aa60_after_code 3.PNG', '7d001899f2');
INSERT INTO `aom_item` VALUES ('75500f6356', '10', '7d001899f2_75500f6356_ดาวน์โหลด.jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('758e3e5698', '2', '7c70d0dd8f_758e3e5698.jpg', '7c70d0dd8f');
INSERT INTO `aom_item` VALUES ('8481b9f8f5', '8', '7d001899f2_8481b9f8f5_Koala (1).jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('8c446ba9fe', '3', '7d001899f2_8c446ba9fe_Koala.jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('c3635b0944', '5', '7d001899f2_c3635b0944_Penguins.jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('da00a85fe6', '4', '7d001899f2_da00a85fe6_Lighthouse.jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('e5d11eae3d', '11', '7d001899f2_e5d11eae3d_Tulips.jpg', '7d001899f2');
INSERT INTO `aom_item` VALUES ('eff1467559', '1', '7c70d0dd8f_eff1467559.jpg', '7c70d0dd8f');

-- ----------------------------
-- Table structure for `aom_save_log`
-- ----------------------------
DROP TABLE IF EXISTS `aom_save_log`;
CREATE TABLE `aom_save_log` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `aom_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `time` bigint(11) DEFAULT NULL,
  `user` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of aom_save_log
-- ----------------------------
INSERT INTO `aom_save_log` VALUES ('1', '80e68fb941', 'บันทึกปกติ', '1526538098', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('2', '80e68fb941', 'บันทึกปกติ', '1526538111', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('3', '80e68fb941', 'รับเข้าคลัง', '1526538135', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('4', '80e68fb941', 'ออกโนติส', '1526542369', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('5', '80e68fb941', 'เข้าห้องสำนวน', '1526542403', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('6', '80e68fb941', 'พิมพ์ฟ้อง', '1526542455', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('7', '7d001899f2', 'บันทึกปกติ', '1526544043', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('8', '7d001899f2', 'ลงข้อมูลรับเรื่อง', '1526544737', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('9', '7d001899f2', 'บันทึกปกติ', '1526546025', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('10', '7d001899f2', 'บันทึกปกติ', '1526550601', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('11', '7d001899f2', 'บันทึกปกติ', '1526632362', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('12', '7d001899f2', 'บันทึกปกติ', '1526633608', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('13', '7d001899f2', 'บันทึกปกติ', '1526634700', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('14', '7d001899f2', 'บันทึกปกติ', '1526634709', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('15', '7d001899f2', 'บันทึกปกติ', '1526868617', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('16', '7d001899f2', 'บันทึกปกติ', '1526870311', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('17', '7d001899f2', 'บันทึกปกติ', '1526870371', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('18', '7d001899f2', 'บันทึกปกติ', '1526870383', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('19', '7d001899f2', 'บันทึกปกติ', '1526870825', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('20', '7d001899f2', 'บันทึกปกติ', '1526870911', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('21', '7d001899f2', 'บันทึกปกติ', '1526871836', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('22', '7d001899f2', 'บันทึกปกติ', '1526876382', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('23', '7d001899f2', 'บันทึกปกติ', '1526876409', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('24', 'b7bcfa574a', 'บันทึกปกติ', '1526876529', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('25', 'b7bcfa574a', 'บันทึกปกติ', '1526876549', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('26', '7d001899f2', 'บันทึกปกติ', '1526989293', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('27', '7d001899f2', 'บันทึกปกติ', '1526989294', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('28', '7d001899f2', 'บันทึกปกติ', '1526989408', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('29', '7d001899f2', 'บันทึกปกติ', '1526989446', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('30', '7d001899f2', 'บันทึกปกติ', '1526989511', 'bcbafee4da');
INSERT INTO `aom_save_log` VALUES ('31', '7d001899f2', 'บันทึกปกติ', '1526989532', 'bcbafee4da');

-- ----------------------------
-- Table structure for `appeal`
-- ----------------------------
DROP TABLE IF EXISTS `appeal`;
CREATE TABLE `appeal` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aom_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extend_appeal_note` text COLLATE utf8_unicode_ci,
  `extend_appeal_date` bigint(11) DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of appeal
-- ----------------------------
INSERT INTO `appeal` VALUES ('27f0aaa29e', '7d001899f2', '', '-79305374523', '1');
INSERT INTO `appeal` VALUES ('460437a8fd', '7d001899f2', '', '-79305374523', '2');

-- ----------------------------
-- Table structure for `bang`
-- ----------------------------
DROP TABLE IF EXISTS `bang`;
CREATE TABLE `bang` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` bigint(11) DEFAULT NULL,
  `acc_no` text COLLATE utf8_unicode_ci,
  `borrower` text COLLATE utf8_unicode_ci,
  `borrower_id` text COLLATE utf8_unicode_ci,
  `black_case` text COLLATE utf8_unicode_ci,
  `red_case` text COLLATE utf8_unicode_ci,
  `branch` text COLLATE utf8_unicode_ci,
  `insurance` text COLLATE utf8_unicode_ci,
  `defendant_num` text COLLATE utf8_unicode_ci,
  `sue_date` bigint(11) DEFAULT NULL,
  `consider_date` bigint(11) DEFAULT NULL,
  `Judge_date` bigint(11) DEFAULT NULL,
  `appeal_date` bigint(11) DEFAULT NULL,
  `unappeal_date` bigint(11) DEFAULT NULL,
  `appeal_type_date` bigint(11) DEFAULT NULL,
  `statement_officer` text COLLATE utf8_unicode_ci,
  `court_order_note` text COLLATE utf8_unicode_ci,
  `warrant_mark_date` bigint(11) DEFAULT NULL,
  `court_cost` text COLLATE utf8_unicode_ci,
  `court_cost_date` bigint(11) DEFAULT NULL,
  `property` text COLLATE utf8_unicode_ci,
  `sequester_date` bigint(11) DEFAULT NULL,
  `sequester_property` text COLLATE utf8_unicode_ci,
  `sold_estimate` text COLLATE utf8_unicode_ci,
  `judge` text COLLATE utf8_unicode_ci,
  `appeal_type` text COLLATE utf8_unicode_ci,
  `bank_statement` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `we_statement` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `court_order` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `warrant_mark` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `finish` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_date` bigint(11) DEFAULT NULL,
  `cort` text COLLATE utf8_unicode_ci,
  `principle` bigint(11) DEFAULT NULL,
  `interest` bigint(11) DEFAULT NULL,
  `monthly_pay` text COLLATE utf8_unicode_ci,
  `pay_time` text COLLATE utf8_unicode_ci,
  `start_pay_year` text COLLATE utf8_unicode_ci,
  `start_pay_month` text COLLATE utf8_unicode_ci,
  `end_pay_date` bigint(11) DEFAULT NULL,
  `borrow_date` bigint(11) DEFAULT NULL,
  `types_of_credits` text COLLATE utf8_unicode_ci,
  `loan` text COLLATE utf8_unicode_ci,
  `interest_when_borrow` text COLLATE utf8_unicode_ci,
  `interest_when_sue` text COLLATE utf8_unicode_ci,
  `section4_template` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section4_description` text COLLATE utf8_unicode_ci,
  `heritage` text COLLATE utf8_unicode_ci,
  `heritage_relate` text COLLATE utf8_unicode_ci,
  `borrower_dead` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `responsible_lawyer` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sue_date_limit` bigint(11) DEFAULT NULL,
  `interest_pk` text COLLATE utf8_unicode_ci,
  `lawyer_cost` text COLLATE utf8_unicode_ci,
  `group_number` text COLLATE utf8_unicode_ci,
  `group_name` text COLLATE utf8_unicode_ci,
  `seize_date` bigint(11) DEFAULT NULL,
  `borrower_mail_1` enum('n','z','y') COLLATE utf8_unicode_ci DEFAULT 'z',
  `borrower_mail_2` enum('n','z','y') COLLATE utf8_unicode_ci DEFAULT 'z',
  `borrower_mail_3` enum('n','z','y') COLLATE utf8_unicode_ci DEFAULT 'z',
  `court_order_date` bigint(11) DEFAULT NULL,
  `sold_note` text COLLATE utf8_unicode_ci,
  `case_close` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `refrain` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sue_cancel` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `wearing_date` bigint(11) DEFAULT NULL,
  `wearing_warrant_cost` text COLLATE utf8_unicode_ci,
  `wearing_warrant_fee` text COLLATE utf8_unicode_ci,
  `wearing_order` text COLLATE utf8_unicode_ci,
  `wearing_claim` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `wearing_receipt` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `wearing_withdraw_y` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `wearing_withdraw_n` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `wearing_c` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `request_warrant_mark_date` bigint(11) DEFAULT NULL,
  `request_warrant_mark` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `cort_warrant_mark` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `scan_warrant_mark` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `withdraw_warrant_mark` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `unwithdraw_warrant_mark` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigete_close` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigete_death` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigete_done` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigete_undone` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `withdraw_investigete` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `unwithdraw_investigete` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigete_contract_note` text COLLATE utf8_unicode_ci,
  `investigete_officer` text COLLATE utf8_unicode_ci,
  `seize_map` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_photo` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_officer` text COLLATE utf8_unicode_ci,
  `seize_owner` text COLLATE utf8_unicode_ci,
  `seize_guarantee_num` text COLLATE utf8_unicode_ci,
  `seize_enforce_office` text COLLATE utf8_unicode_ci,
  `seize_property_type` text COLLATE utf8_unicode_ci,
  `seize_land` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_car` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_billing_at_office` text COLLATE utf8_unicode_ci,
  `seize_billing_at_office_fee` text COLLATE utf8_unicode_ci,
  `seize_billing_outbound` text COLLATE utf8_unicode_ci,
  `seize_billing_outbound_fee` text COLLATE utf8_unicode_ci,
  `tr_14_12` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_request` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_report` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_deed` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_price_estimate` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_mapandphoto` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_bill` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `withdraw_seize` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `unwithdraw_seize` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `seize_lead_officer` text COLLATE utf8_unicode_ci,
  `acc_close` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_close_date` bigint(11) DEFAULT NULL,
  `paybill_enforce` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `paybill_enforce_date` bigint(11) DEFAULT NULL,
  `paybill_lawyer` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `paybill_lawyer_date` bigint(11) DEFAULT NULL,
  `payperiod` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `payperiod_date` bigint(11) DEFAULT NULL,
  `payperiod_command` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `payperiod_command_date` bigint(11) DEFAULT NULL,
  `acc_unwithdraw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_withdraw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_withdraw_date` bigint(11) DEFAULT NULL,
  `refund_date` bigint(11) DEFAULT NULL,
  `refund_checks_number` text COLLATE utf8_unicode_ci,
  `refund_outbound_date` bigint(11) DEFAULT NULL,
  `refund_outbound_checks_number` text COLLATE utf8_unicode_ci,
  `refund_phone` text COLLATE utf8_unicode_ci,
  `refund_note` text COLLATE utf8_unicode_ci,
  `refund_withdraw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_withdraw_date` bigint(11) DEFAULT NULL,
  `refund_request` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_checks` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_judge` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_draw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_undraw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_officer` text COLLATE utf8_unicode_ci,
  `sold_refrain_request` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_report` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_contract` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_withdraw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_unwithdraw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_officer` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang
-- ----------------------------
INSERT INTO `bang` VALUES ('55e4694ddf', '1524070801', 'ssad', '21321', '12321', 'wqweqw', 'qewqe', 'qweqw', 'sadasdas', '2', '1523379601', '1523984401', '1524070801', '1523466001', '1523984401', '1523898001', 'asdasd', '', '-79305374523', '', '-79305374523', '', '-79305374523', '', '', 'normal', null, 'y', 'n', 'n', 'y', 'n', '1523379601', 'dasd', '22', '33', '2000', '2', '2555', 'dddd', '1524502801', '1523293201', 'asadasd', '231231', '3223', '1232123', 'c2a3d22b5e', 'ไม่จ่าย ไม่จ่าย จ้างให้ก็ไม่ยอมจ่าย asdqweqweqwe', 'กกก', 'หหหห', 'y', 'a16b0b7adf', null, null, null, null, null, null, 'n', 'n', 'n', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `bang` VALUES ('6a3ef3f8d1', '-79305374523', '', 'asdasd 222333', 'qweqw', '', '', '', '', '', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '', '', '-79305374523', '', '-79305374523', '', '-79305374523', '', '', null, null, 'n', 'n', 'n', 'n', 'n', '-79305374523', 'จังหวัดมหาสารคาม', '321', '12', '', 'สุดท้าย', '', '', '-79305374523', '-79305374523', '', '', '', '', '486f3fdfca', '', '', '', 'n', '7d15e3df81', '-79305374523', '12', '32', '2', '3', '-79305374523', 'z', 'z', 'z', '-79305374523', '', 'n', 'n', 'n', '-79305374523', '', '', '', 'n', 'n', 'n', 'n', 'n', '-79305374523', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', '', '', 'n', 'n', '', '', '', '', '', 'n', 'n', '', '', '', '', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', '', 'n', '-79305374523', 'n', '-79305374523', 'n', '-79305374523', 'n', '-79305374523', 'n', '-79305374523', 'n', 'n', '-79305374523', '-79305374523', '', '-79305374523', '', '', '', 'n', '-79305374523', 'n', 'n', 'n', 'n', 'n', '', null, null, null, null, null, null);
INSERT INTO `bang` VALUES ('7c70d0dd8f', '-79305374523', '', 'ฟหก', 'หฟก', 'ฟหก', 'ฟหก', 'หฟกฟหก', 'ฟหกฟหก', '/', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '', '', '-79305374523', '', '-79305374523', '', '-79305374523', '', '', null, null, 'n', 'n', 'n', 'n', 'n', '1523466001', 'AA', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'n', null, null, null, null, null, null, null, 'n', 'n', 'n', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `bang` VALUES ('7d001899f2', '1525021201', '800056471157', 'นางสาวธัญรัศม์ ราชแก้ว', '3440900806703', 'ผบ.55/2561', 'ผบ.56/2561', 'วาปีปทุม', '', '3', '1526317201', '1528995601', '1528995601', '1531587601', '1531674001', '1531674001', 'นางสาวจันทร์สุดา  แสงดารา', '', '1526835601', '', '-79305374523', 'asd', '1526490001', 'asdsa', '2222', 'normal', 'order_appeal', 'n', 'y', 'y', 'y', 'y', '1526403601', 'จังหวัดมหาสารคาม', '21', '30', '', '30/11/2559', '30/11/2559', '30/11/2559', '1480438801', '1450976401', 'พัฒนาองค์กรชุมชน(รายบุคคล)', '50000', 'MRR+2', '', '486f3fdfca', 'ข้อ 4. นับแต่จำเลยที่ 1 ได้ทำสัญญากู้ยืมเงินและรับเงินไปจากโจทก์ตามคำฟ้อง ข้อ 2. \r\nสุดท้ายของเดือนมกราคม 2562 จำเลยที่ 1 ไม่ชำระ จึงถือได้ว่าจำเลยที่ 1 ผิดนัดชำระหนี้ตั้งแต่วันที่ 1 ', '', '', 'y', '7d15e3df81', '1526403601', '520.21', '384.28', '5', '45', '1526576401', 'y', 'n', 'y', '1526144401', 'กฟหกฟหก', 'y', 'y', 'y', '-79305374523', '', '', '', 'n', 'n', 'n', 'n', 'n', '1525194001', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'asd', 'aasd', 'y', 'y', 'sadasdas', 'asdasd', '2', 'qweqwe', 'ssdsasdqw', 'y', 'y', '33213', '222', '123123', '333', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', 'Atom seree', 'y', '1526576401', 'y', '1525798801', 'y', '1525885201', 'y', '1526403601', 'y', '1526403601', 'y', 'y', '1526490001', '1525280401', '4555', '1527699601', '889999', '4456', '78897987', 'y', '1526317201', 'y', 'y', 'y', 'y', 'y', 'sereepap khamsee', 'y', 'y', 'y', 'y', 'y', 'sereekam');
INSERT INTO `bang` VALUES ('80e68fb941', '1526490001', '800058338842', 'นายฉวี  ไปบน', '3440900055694', '', '', 'วาปีปทุม', '', '2', '-79305374523', '-79305374523', '1526576401', '-79305374523', '-79305374523', '-79305374523', '', '', '-79305374523', '', '-79305374523', '', '-79305374523', '', '', null, null, 'n', 'n', 'n', 'n', 'n', '-79305374523', 'จังหวัดมหาสารคาม', '0', '0', '', '31/01/2560', '', '31/01/2560', '-79305374523', '1456333201', 'พัฒนาองค์กรชุมชน(รายบุคคล)', '50000', 'MRR+2', '', '7014d79bb4', '', '', '', 'n', '7d15e3df81', null, null, null, null, null, null, 'n', 'n', 'n', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `bang` VALUES ('9ac9137ef4', '-15612676923', '4457887', 'นายเสรีภาพ คำสี', '144990023998', 'asd', 'asd', '', '', '', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '-79305374523', '', '', '-79305374523', '', '-79305374523', '', '1526576401', '', '', null, null, 'n', 'n', 'n', 'n', 'n', '1526403601', 'จังหวัดมหาสารคาม', '21', '305', '', 'สุดท้าย', '', '', '-79305374523', '-79305374523', '', '', '', '', '486f3fdfca', '', '', '', 'n', '7d15e3df81', '-79305374523', '520.21', '384.28', '112312', '22', '1525885201', 'z', 'z', 'z', '-79305374523', '', 'n', 'n', 'n', '-79305374523', '', '', '', 'n', 'n', 'n', 'n', 'n', '1525885201', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', '', '', 'y', 'y', 'หกฟกฟห', '', '', '', '', 'n', 'n', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `bang_appeal`
-- ----------------------------
DROP TABLE IF EXISTS `bang_appeal`;
CREATE TABLE `bang_appeal` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extend_appeal_note` text COLLATE utf8_unicode_ci,
  `extend_appeal_date` bigint(11) DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_appeal
-- ----------------------------

-- ----------------------------
-- Table structure for `bang_borrow`
-- ----------------------------
DROP TABLE IF EXISTS `bang_borrow`;
CREATE TABLE `bang_borrow` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `borrow_date` bigint(11) DEFAULT NULL,
  `types_of_credits` text COLLATE utf8_unicode_ci,
  `loan` text COLLATE utf8_unicode_ci,
  `interest_when_borrow` text COLLATE utf8_unicode_ci,
  `interest_when_sue` text COLLATE utf8_unicode_ci,
  `sort_order` bigint(11) DEFAULT '0',
  `bang_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_borrow
-- ----------------------------
INSERT INTO `bang_borrow` VALUES ('1b1e252806', '1525280401', '22', '33', '34', '223', '1', '6a3ef3f8d1');

-- ----------------------------
-- Table structure for `bang_guarantee`
-- ----------------------------
DROP TABLE IF EXISTS `bang_guarantee`;
CREATE TABLE `bang_guarantee` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee` text COLLATE utf8_unicode_ci,
  `guarantee_id` text COLLATE utf8_unicode_ci,
  `sort_order` bigint(11) DEFAULT '0',
  `guarantee_mail_1` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee_mail_2` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee_mail_3` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee_mail` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee_home_num` text COLLATE utf8_unicode_ci,
  `guarantee_moo` text COLLATE utf8_unicode_ci,
  `guarantee_road` text COLLATE utf8_unicode_ci,
  `guarantee_soi` text COLLATE utf8_unicode_ci,
  `guarantee_tum` text COLLATE utf8_unicode_ci,
  `guarantee_aum` text COLLATE utf8_unicode_ci,
  `guarantee_province` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_guarantee
-- ----------------------------
INSERT INTO `bang_guarantee` VALUES ('b72da4b3a1', '55e4694ddf', 'asdasdasd', 'dsadas', '1', 'y', 'n', 'n', 'y', 'dddd', 'as', 'sssss', 'eeeeeeee', 'qqqqqqqq', 'wwwwwwwwwww', 'กาญจนบุรี');
INSERT INTO `bang_guarantee` VALUES ('c0fac8a10e', '7d001899f2', 'นายประยุร  คำมูล', '3440900808021', '2', 'n', 'n', 'n', 'n', '19', '2', '-', '-', 'ประชาพัฒนา', 'วาปีปทุม', 'มหาสารคาม');
INSERT INTO `bang_guarantee` VALUES ('fe2ef166ed', '7d001899f2', 'นางดำรงค์  เยาวนารถ', '3440900807556', '1', 'n', 'n', 'n', 'n', '45', '2', '-', '-', 'ประชาพัฒนา', 'วาปีปทุม', 'มหาสารคาม');

-- ----------------------------
-- Table structure for `bang_investigate`
-- ----------------------------
DROP TABLE IF EXISTS `bang_investigate`;
CREATE TABLE `bang_investigate` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `transport_found` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `transport_date` bigint(11) DEFAULT NULL,
  `transport_book` text COLLATE utf8_unicode_ci,
  `transport_property` text COLLATE utf8_unicode_ci,
  `transport_note` text COLLATE utf8_unicode_ci,
  `land_found` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `land_date` bigint(11) DEFAULT NULL,
  `land_book` text COLLATE utf8_unicode_ci,
  `land_property` text COLLATE utf8_unicode_ci,
  `land_note` text COLLATE utf8_unicode_ci,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_investigate
-- ----------------------------
INSERT INTO `bang_investigate` VALUES ('5fdf6c9c32', 'n', '1526576401', 'gggggggggggg', 'wwwwwwwww', 'eeeeeeeeeee', 'n', '1526317201', 'hhhhhhhhhhhhhhh', 'qqqqqqqqqqq', 'rrrrrrrrrrrrr', '7d001899f2', '1');
INSERT INTO `bang_investigate` VALUES ('65179828c9', 'y', '1525280401', 'iiiiiiiiiiiiiiiiii', 'qwe', 'dsasd', 'n', '1525971601', 'uuuuuuuuu', 'asdas', 'qweqwe', '7d001899f2', '2');
INSERT INTO `bang_investigate` VALUES ('d6f477edca', 'y', '1525885201', '23', '', '', 'n', '1525798801', '33', '', '', '6a3ef3f8d1', '1');

-- ----------------------------
-- Table structure for `bang_item`
-- ----------------------------
DROP TABLE IF EXISTS `bang_item`;
CREATE TABLE `bang_item` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `filepath` text COLLATE utf8_unicode_ci,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_item
-- ----------------------------
INSERT INTO `bang_item` VALUES ('577a4f1fdf', '3', '7c70d0dd8f_577a4f1fdf.jpg', '7c70d0dd8f');
INSERT INTO `bang_item` VALUES ('758e3e5698', '2', '7c70d0dd8f_758e3e5698.jpg', '7c70d0dd8f');
INSERT INTO `bang_item` VALUES ('eff1467559', '1', '7c70d0dd8f_eff1467559.jpg', '7c70d0dd8f');

-- ----------------------------
-- Table structure for `bang_payment`
-- ----------------------------
DROP TABLE IF EXISTS `bang_payment`;
CREATE TABLE `bang_payment` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_bill_number` text COLLATE utf8_unicode_ci,
  `payment_date` bigint(11) DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT '0',
  `payment_bill_fee` text COLLATE utf8_unicode_ci,
  `payment_request` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `payment_warrant` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `payment_bill` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `payment_withdraw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `payment_unwithdraw` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `payment_officer` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_payment
-- ----------------------------
INSERT INTO `bang_payment` VALUES ('0a1b8a17ff', '6a3ef3f8d1', '23', '1525798801', '2', '213', 'n', 'n', 'y', 'n', 'n', null);
INSERT INTO `bang_payment` VALUES ('e5bd251cb6', '7d001899f2', 'w', '1526490001', '1', '222', 'y', 'y', 'y', 'y', 'y', 'ccccccccc');
INSERT INTO `bang_payment` VALUES ('f1bbb74e85', '6a3ef3f8d1', 'assads', '1525885201', '3', '3213', 'n', 'y', 'n', 'n', 'n', null);

-- ----------------------------
-- Table structure for `bang_save_log`
-- ----------------------------
DROP TABLE IF EXISTS `bang_save_log`;
CREATE TABLE `bang_save_log` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `time` bigint(11) DEFAULT NULL,
  `user` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_save_log
-- ----------------------------
INSERT INTO `bang_save_log` VALUES ('1', '80e68fb941', 'บันทึกปกติ', '1526538098', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('2', '80e68fb941', 'บันทึกปกติ', '1526538111', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('3', '80e68fb941', 'รับเข้าคลัง', '1526538135', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('4', '80e68fb941', 'ออกโนติส', '1526542369', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('5', '80e68fb941', 'เข้าห้องสำนวน', '1526542403', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('6', '80e68fb941', 'พิมพ์ฟ้อง', '1526542455', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('7', '7d001899f2', 'บันทึกปกติ', '1526544043', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('8', '7d001899f2', 'ลงข้อมูลรับเรื่อง', '1526544737', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('9', '7d001899f2', 'บันทึกปกติ', '1526546025', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('10', '7d001899f2', 'บันทึกปกติ', '1526550601', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('11', '7d001899f2', 'บันทึกปกติ', '1526632362', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('12', '7d001899f2', 'บันทึกปกติ', '1526633608', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('13', '7d001899f2', 'บันทึกปกติ', '1526634700', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('14', '7d001899f2', 'บันทึกปกติ', '1526634709', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('15', '7d001899f2', 'บันทึกปกติ', '1526868617', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('16', '7d001899f2', 'บันทึกปกติ', '1526870311', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('17', '7d001899f2', 'บันทึกปกติ', '1526870371', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('18', '7d001899f2', 'บันทึกปกติ', '1526870383', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('19', '7d001899f2', 'บันทึกปกติ', '1526870825', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('20', '7d001899f2', 'บันทึกปกติ', '1526870911', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('21', '7d001899f2', 'บันทึกปกติ', '1526871836', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('22', '7d001899f2', 'บันทึกปกติ', '1527084588', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('23', '7d001899f2', 'บันทึกปกติ', '1527146812', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('24', '7d001899f2', 'บันทึกปกติ', '1527152402', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('25', '7d001899f2', 'บันทึกปกติ', '1527152601', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('26', '7d001899f2', 'บันทึกปกติ', '1527152778', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('27', '7d001899f2', 'บันทึกปกติ', '1527152798', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('28', '7d001899f2', 'บันทึกปกติ', '1527153259', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('29', '7d001899f2', 'บันทึกปกติ', '1527156234', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('30', '7d001899f2', 'บันทึกปกติ', '1527156258', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('31', '7d001899f2', 'บันทึกปกติ', '1527156271', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('32', '7d001899f2', 'บันทึกปกติ', '1527156641', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('33', '7d001899f2', 'บันทึกปกติ', '1527157793', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('34', '7d001899f2', 'บันทึกปกติ', '1527157793', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('35', '7d001899f2', 'บันทึกปกติ', '1527493086', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('36', '9ac9137ef4', 'บันทึกปกติ', '1527493191', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('37', '7d001899f2', 'บันทึกปกติ', '1527493210', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('38', '7d001899f2', 'บันทึกปกติ', '1527493220', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('39', '7d001899f2', 'บันทึกปกติ', '1527493382', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('40', '7d001899f2', 'บันทึกปกติ', '1527497714', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('41', '7d001899f2', 'test save', '1527497739', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('42', '6a3ef3f8d1', 'บันทึกปกติ', '1527501592', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('43', '7d001899f2', 'บันทึกปกติ', '1527501649', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('44', '7d001899f2', 'บันทึกปกติ', '1527501708', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('45', '7d001899f2', 'บันทึกปกติ', '1527501776', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('46', '7d001899f2', 'บันทึกปกติ', '1527501799', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('47', '7d001899f2', 'บันทึกปกติ', '1527501855', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('48', '7d001899f2', 'บันทึกปกติ', '1527501931', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('49', '7d001899f2', 'บันทึกปกติ', '1527501949', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('50', '7d001899f2', 'บันทึกปกติ', '1527501969', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('51', '7d001899f2', 'บันทึกปกติ', '1527507390', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('52', '7d001899f2', 'บันทึกปกติ', '1527507812', 'bcbafee4da');
INSERT INTO `bang_save_log` VALUES ('53', '7d001899f2', 'บันทึกปกติ', '1527507830', 'bcbafee4da');

-- ----------------------------
-- Table structure for `bang_sold`
-- ----------------------------
DROP TABLE IF EXISTS `bang_sold`;
CREATE TABLE `bang_sold` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT '0',
  `sold_date` bigint(11) DEFAULT NULL,
  `price_sold` text COLLATE utf8_unicode_ci,
  `sold` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `unsold` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_refrain` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_refrain_note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_sold
-- ----------------------------
INSERT INTO `bang_sold` VALUES ('72e550ecf6', '7d001899f2', '1', '1526749201', '1000', 'y', 'y', 'y', '12321');
INSERT INTO `bang_sold` VALUES ('c4999462ad', '7d001899f2', '3', '1527613201', '1000', 'n', 'y', 'n', '789');
INSERT INTO `bang_sold` VALUES ('dc83bd98fb', '7d001899f2', '2', '1527526801', '2000', 'y', 'y', 'n', '456');

-- ----------------------------
-- Table structure for `bang_withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `bang_withdraw`;
CREATE TABLE `bang_withdraw` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_withdraw
-- ----------------------------
INSERT INTO `bang_withdraw` VALUES ('507a41394a', '7c70d0dd8f', '1');
INSERT INTO `bang_withdraw` VALUES ('85b2172f0f', '7c70d0dd8f', '2');
INSERT INTO `bang_withdraw` VALUES ('d59857025b', '7c70d0dd8f', '3');

-- ----------------------------
-- Table structure for `bang_withdraw_detail`
-- ----------------------------
DROP TABLE IF EXISTS `bang_withdraw_detail`;
CREATE TABLE `bang_withdraw_detail` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `withdraw_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bang_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT NULL,
  `withdraw_detail` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bang_withdraw_detail
-- ----------------------------
INSERT INTO `bang_withdraw_detail` VALUES ('2b8467f611', '507a41394a', '7c70d0dd8f', '1', 'A1', '1111');
INSERT INTO `bang_withdraw_detail` VALUES ('da13c7d0b7', 'd59857025b', '7c70d0dd8f', '3', 'A3', '3333');
INSERT INTO `bang_withdraw_detail` VALUES ('f432b76ac8', '85b2172f0f', '7c70d0dd8f', '2', 'A2', '2222');

-- ----------------------------
-- Table structure for `borrow`
-- ----------------------------
DROP TABLE IF EXISTS `borrow`;
CREATE TABLE `borrow` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `borrow_date` bigint(11) DEFAULT NULL,
  `types_of_credits` text COLLATE utf8_unicode_ci,
  `loan` text COLLATE utf8_unicode_ci,
  `interest_when_borrow` text COLLATE utf8_unicode_ci,
  `interest_when_sue` text COLLATE utf8_unicode_ci,
  `sort_order` bigint(11) DEFAULT '0',
  `aom_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of borrow
-- ----------------------------
INSERT INTO `borrow` VALUES ('b43edeae46', '1525194001', 'พัฒนาองค์กรชุมชน(รายบุคคล)', '50000', 'MRR+2', 'MRR+2', '2', '7d001899f2');
INSERT INTO `borrow` VALUES ('d6ab041d1f', '1525107601', 'พัฒนาองค์กรชุมชน(รายบุคคล)', '50000', 'MRR+2', 'MRR+2', '1', '7d001899f2');
INSERT INTO `borrow` VALUES ('e61bd02634', '1525194001', 'asd', '33', '', '', '1', 'b7bcfa574a');

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('jpi1dc9k5bitsfhj86kmgl3q4bpuma8m', '127.0.0.1', '1527493023', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373439333032333B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('chknh45299c690lifjr1ee7kpt0roqn7', '127.0.0.1', '1527493381', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373439333338313B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('o5cnqmsifhp9lh3bd31on276imdidecm', '127.0.0.1', '1527493988', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373439333938383B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('jb3ibo9ou8t5piscqmcpfn5ipsdfnpmi', '127.0.0.1', '1527495478', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373439353437383B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('ls2ldhvhn60uns3ko3n9r8si7t2feh0u', '127.0.0.1', '1527497589', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373439373538393B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('cqhn4vvfgqk1iq9p183tq0vi2vcr6tnl', '127.0.0.1', '1527500443', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373530303434333B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('i6sl8brumtl22g7htsac46cmfub146vp', '127.0.0.1', '1527501508', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373530313530383B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('v9067lj0tusf3784fmqm3ulr7d8rfkmu', '127.0.0.1', '1527501855', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373530313835353B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('7j11uamldrjaajenp93j8fi573q4hcdl', '127.0.0.1', '1527507104', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373530373130343B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('r6pqv0mipiqhfhncmg2pfo567geg26sk', '127.0.0.1', '1527507799', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373530373739393B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);
INSERT INTO `ci_sessions` VALUES ('i85fg8jnkkpl2qh3oka0eonhq1q9re1c', '127.0.0.1', '1527507832', 0x5F5F63695F6C6173745F726567656E65726174657C693A313532373530373739393B757365726E616D657C733A363A227361646D696E223B69647C733A31303A2262636261666565346461223B);

-- ----------------------------
-- Table structure for `guarantee`
-- ----------------------------
DROP TABLE IF EXISTS `guarantee`;
CREATE TABLE `guarantee` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aom_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee` text COLLATE utf8_unicode_ci,
  `guarantee_id` text COLLATE utf8_unicode_ci,
  `sort_order` bigint(11) DEFAULT '0',
  `guarantee_mail_1` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee_mail_2` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee_mail_3` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee_mail` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantee_home_num` text COLLATE utf8_unicode_ci,
  `guarantee_moo` text COLLATE utf8_unicode_ci,
  `guarantee_road` text COLLATE utf8_unicode_ci,
  `guarantee_soi` text COLLATE utf8_unicode_ci,
  `guarantee_tum` text COLLATE utf8_unicode_ci,
  `guarantee_aum` text COLLATE utf8_unicode_ci,
  `guarantee_province` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of guarantee
-- ----------------------------
INSERT INTO `guarantee` VALUES ('b72da4b3a1', '55e4694ddf', 'asdasdasd', 'dsadas', '1', 'y', 'n', 'n', 'y', 'dddd', 'as', 'sssss', 'eeeeeeee', 'qqqqqqqq', 'wwwwwwwwwww', 'กาญจนบุรี');
INSERT INTO `guarantee` VALUES ('c0fac8a10e', '7d001899f2', 'นายประยุร  คำมูล', '3440900808021', '2', 'n', 'n', 'n', 'n', '19', '2', '-', '-', 'ประชาพัฒนา', 'วาปีปทุม', 'มหาสารคาม');
INSERT INTO `guarantee` VALUES ('fe2ef166ed', '7d001899f2', 'นางดำรงค์  เยาวนารถ', '3440900807556', '1', 'n', 'n', 'n', 'n', '45', '2', '-', '-', 'ประชาพัฒนา', 'วาปีปทุม', 'มหาสารคาม');

-- ----------------------------
-- Table structure for `lawyer`
-- ----------------------------
DROP TABLE IF EXISTS `lawyer`;
CREATE TABLE `lawyer` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prefix` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci,
  `lastname` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `rank` text COLLATE utf8_unicode_ci,
  `licence` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lawyer
-- ----------------------------
INSERT INTO `lawyer` VALUES ('7d15e3df81', 'นาง', 'เบญญาภา', 'ศรีกุล', 'bentoben@hotmail.com', '0804032819', 'สอง', '1234/2554');
INSERT INTO `lawyer` VALUES ('a16b0b7adf', 'นาย', 'เสรีภาพ', 'คำสี', 'sereepap2029@hotmail.com', '0804032819', 'หนึ่ง', '1214/2549');

-- ----------------------------
-- Table structure for `office_config`
-- ----------------------------
DROP TABLE IF EXISTS `office_config`;
CREATE TABLE `office_config` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci,
  `home_num` text COLLATE utf8_unicode_ci,
  `moo` text COLLATE utf8_unicode_ci,
  `road` text COLLATE utf8_unicode_ci,
  `soi` text COLLATE utf8_unicode_ci,
  `tum` text COLLATE utf8_unicode_ci,
  `aum` text COLLATE utf8_unicode_ci,
  `province` text COLLATE utf8_unicode_ci,
  `witness1` text COLLATE utf8_unicode_ci,
  `witness2` text COLLATE utf8_unicode_ci,
  `witness3` text COLLATE utf8_unicode_ci,
  `witness4` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of office_config
-- ----------------------------
INSERT INTO `office_config` VALUES ('4', 'asdasd', '11', '5', 'sadasd', 'qwqe', 'sadsa', 'qweqw', null, 'asdas', 'dasd', 'asdas', 'asdasd');

-- ----------------------------
-- Table structure for `perm`
-- ----------------------------
DROP TABLE IF EXISTS `perm`;
CREATE TABLE `perm` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` enum('unbilling','refund','promotion','report2','report1','book','billing','invoice','print','template','money','delete','data','account') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of perm
-- ----------------------------
INSERT INTO `perm` VALUES ('1', 'bcbafee4da', 'account');
INSERT INTO `perm` VALUES ('3', 'bcbafee4da', 'data');
INSERT INTO `perm` VALUES ('5', 'bcbafee4da', 'delete');
INSERT INTO `perm` VALUES ('6', 'c26351bc2c', 'data');
INSERT INTO `perm` VALUES ('8', 'bcbafee4da', 'money');
INSERT INTO `perm` VALUES ('10', 'bcbafee4da', 'template');
INSERT INTO `perm` VALUES ('11', 'bcbafee4da', 'print');

-- ----------------------------
-- Table structure for `sold`
-- ----------------------------
DROP TABLE IF EXISTS `sold`;
CREATE TABLE `sold` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aom_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT '0',
  `sold_date` bigint(11) DEFAULT NULL,
  `price_sold` text COLLATE utf8_unicode_ci,
  `sold` enum('n','y') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sold
-- ----------------------------
INSERT INTO `sold` VALUES ('72e550ecf6', '7d001899f2', '1', '1526749201', 'งด', 'n');

-- ----------------------------
-- Table structure for `task`
-- ----------------------------
DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `work` text COLLATE utf8_unicode_ci,
  `date_create` bigint(11) DEFAULT NULL,
  `status` enum('cancel','active','complete') COLLATE utf8_unicode_ci DEFAULT 'active',
  `finish_date` text COLLATE utf8_unicode_ci,
  `responsible` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of task
-- ----------------------------
INSERT INTO `task` VALUES ('0c40961135', 'sad', 'asdasd', '1526983302', 'active', '1526983307', 'ac15ecb9d3', 'bcbafee4da');

-- ----------------------------
-- Table structure for `task_comment`
-- ----------------------------
DROP TABLE IF EXISTS `task_comment`;
CREATE TABLE `task_comment` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `task_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci,
  `date_create` bigint(11) DEFAULT NULL,
  `user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of task_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `template_section4`
-- ----------------------------
DROP TABLE IF EXISTS `template_section4`;
CREATE TABLE `template_section4` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of template_section4
-- ----------------------------
INSERT INTO `template_section4` VALUES ('486f3fdfca', 'ข้อ 4 ธรรมดา', 'ข้อ 4. นับแต่จำเลยที่ 1 ได้ทำสัญญากู้ยืมเงินและรับเงินไปจากโจทก์ตามคำฟ้อง ข้อ 2. \r\nสุดท้ายของเดือนมกราคม 2562 จำเลยที่ 1 ไม่ชำระ จึงถือได้ว่าจำเลยที่ 1 ผิดนัดชำระหนี้ตั้งแต่วันที่ 1 ');
INSERT INTO `template_section4` VALUES ('7014d79bb4', 'จ่าย แต่ จ่ายไม่ครบ', 'นับตั้งแต่จำเลยที่ 1 ได้ทำสัญญากู้ยืมและับเงินไปจากโจทก์ตามคำฟ้อง ข้อสอง');
INSERT INTO `template_section4` VALUES ('c2a3d22b5e', 'ไม่จ่าย', 'ไม่จ่าย ไม่จ่าย จ้างให้ก็ไม่ยอมจ่าย');

-- ----------------------------
-- Table structure for `withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `withdraw`;
CREATE TABLE `withdraw` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aom_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of withdraw
-- ----------------------------
INSERT INTO `withdraw` VALUES ('507a41394a', '7c70d0dd8f', '1');
INSERT INTO `withdraw` VALUES ('85b2172f0f', '7c70d0dd8f', '2');
INSERT INTO `withdraw` VALUES ('d59857025b', '7c70d0dd8f', '3');

-- ----------------------------
-- Table structure for `withdraw_detail`
-- ----------------------------
DROP TABLE IF EXISTS `withdraw_detail`;
CREATE TABLE `withdraw_detail` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `withdraw_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aom_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` bigint(11) DEFAULT NULL,
  `withdraw_detail` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of withdraw_detail
-- ----------------------------
INSERT INTO `withdraw_detail` VALUES ('2b8467f611', '507a41394a', '7c70d0dd8f', '1', 'A1', '1111');
INSERT INTO `withdraw_detail` VALUES ('da13c7d0b7', 'd59857025b', '7c70d0dd8f', '3', 'A3', '3333');
INSERT INTO `withdraw_detail` VALUES ('f432b76ac8', '85b2172f0f', '7c70d0dd8f', '2', 'A2', '2222');
