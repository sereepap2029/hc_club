/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : lawyer

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2018-05-28 18:44:40
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
