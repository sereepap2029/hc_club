/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : hc_club

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2018-06-02 21:03:35
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
-- Table structure for `perm`
-- ----------------------------
DROP TABLE IF EXISTS `perm`;
CREATE TABLE `perm` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` enum('unbilling','refund','promotion','report2','report1','book','billing','invoice','print','template','money','delete','data','account') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
