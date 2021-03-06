/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : hc_club

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2018-06-02 21:04:02
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_item`
-- ----------------------------
DROP TABLE IF EXISTS `admin_item`;
CREATE TABLE `admin_item` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `filepath` text COLLATE utf8_unicode_ci,
  `admin_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('payment','ath') COLLATE utf8_unicode_ci DEFAULT 'ath',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_item
-- ----------------------------
INSERT INTO `admin_item` VALUES ('1021c825cd', '3', '_1021c825cd_bwZThQ.png', null, 'ath');
INSERT INTO `admin_item` VALUES ('32ae78cdc4', '2', '_32ae78cdc4_9v4CrwP.png', null, 'ath');
INSERT INTO `admin_item` VALUES ('330f7e9d4f', '1', '_330f7e9d4f_083l1FHT.png', null, 'ath');
INSERT INTO `admin_item` VALUES ('4d4d29e753', '1', 'c26351bc2c_4d4d29e753_a21e7ba0906f9ea0f1d0e5a59611215392fb6ccd.png', 'c26351bc2c', 'ath');
INSERT INTO `admin_item` VALUES ('7fa3897c9b', '3', '_7fa3897c9b_7bAOhW.png', null, 'ath');
INSERT INTO `admin_item` VALUES ('8b732b01a9', '2', 'c26351bc2c_8b732b01a9_bwZThQ.png', 'c26351bc2c', 'ath');
INSERT INTO `admin_item` VALUES ('9ebe277b6b', '4', '_9ebe277b6b_49eaa1ae5e329cf4936d5076fbc4bf096a975e8e.png', null, 'ath');
INSERT INTO `admin_item` VALUES ('a6844debc6', '2', '_a6844debc6_a21e7ba0906f9ea0f1d0e5a59611215392fb6ccd.png', null, 'ath');
INSERT INTO `admin_item` VALUES ('efc22cdee4', '1', '_efc22cdee4_46b66ad36214d82445ed44bd11a81b4529c93ced.png', null, 'ath');
INSERT INTO `admin_item` VALUES ('fd50190f55', '3', 'c26351bc2c_fd50190f55_083l1FHT.png', 'c26351bc2c', 'ath');

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
INSERT INTO `admin_user` VALUES ('ac15ecb9d3', 'sdsd', 'asdds', 'sereepap1', '$2y$10$cnFTGZfZyJT.atF3bBJG4.ksNEbVKGhQs993i7lUejIMU/4NtznfS', 'sereepap2029@gmail.com', 'นาง');
INSERT INTO `admin_user` VALUES ('bcbafee4da', 'sadmin', 'sadmin', 'sadmin', '$2y$10$bIVz69VrjIjVaf.ApOmdnujiGEC8IES1Kv2.HmT3cKkH1TxwmvP2C', 'sadmin@gmail.com', 'นาย');
INSERT INTO `admin_user` VALUES ('c26351bc2c', 'sereepap', 'khamsee', 'sereepap2029', '$2y$10$yJ6urGx8YMxrn8qgIVN27u9BzyK..FXQwMjlYFSxQaPEvfZHWmFna', 'sereepap2029@hotmail.com', 'นาย');

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

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` text COLLATE utf8_unicode_ci,
  `lastname` text COLLATE utf8_unicode_ci,
  `username` text COLLATE utf8_unicode_ci,
  `password` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `prefix` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `sex` text COLLATE utf8_unicode_ci,
  `bank_name` text COLLATE utf8_unicode_ci,
  `bank_acc` text COLLATE utf8_unicode_ci,
  `bank_organization` text COLLATE utf8_unicode_ci,
  `ref_id` text COLLATE utf8_unicode_ci,
  `status` enum('active','pending') COLLATE utf8_unicode_ci DEFAULT 'pending',
  `referrer_id` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of member
-- ----------------------------

-- ----------------------------
-- Table structure for `member_item`
-- ----------------------------
DROP TABLE IF EXISTS `member_item`;
CREATE TABLE `member_item` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `filepath` text COLLATE utf8_unicode_ci,
  `member_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('payment','ath') COLLATE utf8_unicode_ci DEFAULT 'ath',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of member_item
-- ----------------------------
INSERT INTO `member_item` VALUES ('08cc9da0a1', '3', '02427109d2_08cc9da0a1_5mrevky0.png', '02427109d2', 'ath');
INSERT INTO `member_item` VALUES ('445fb1e0ca', '1', '02427109d2_445fb1e0ca_5ArMeEVXJL.png', '02427109d2', 'ath');
INSERT INTO `member_item` VALUES ('499e0f212d', '2', 'a584d8549f_499e0f212d_hKfDP (2).png', 'a584d8549f', 'ath');
INSERT INTO `member_item` VALUES ('5903a69754', '2', '53017dfe6d_5903a69754_083l1FHT.png', '53017dfe6d', 'ath');
INSERT INTO `member_item` VALUES ('a7982b215a', '3', 'a584d8549f_a7982b215a_hsfxj.png', 'a584d8549f', 'ath');
INSERT INTO `member_item` VALUES ('afe9237414', '3', '53017dfe6d_afe9237414_bwZThQ (1).png', '53017dfe6d', 'ath');
INSERT INTO `member_item` VALUES ('cb37e9a708', '1', '53017dfe6d_cb37e9a708_a21e7ba0906f9ea0f1d0e5a59611215392fb6ccd.png', '53017dfe6d', 'ath');
INSERT INTO `member_item` VALUES ('db09b84e0a', '1', 'a584d8549f_db09b84e0a_gv8Om (2).png', 'a584d8549f', 'ath');
INSERT INTO `member_item` VALUES ('dedb36d0cc', '2', '02427109d2_dedb36d0cc_4Wmg (1).png', '02427109d2', 'ath');

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
