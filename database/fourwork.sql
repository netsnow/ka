-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-05-27 07:11:42
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fourwork`
--

-- --------------------------------------------------------

--
-- 表的结构 `we_account_history`
--

DROP TABLE IF EXISTS `we_account_history`;
CREATE TABLE IF NOT EXISTS `we_account_history` (
  `account_history_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '消费充值记录id',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '账户ID',
  `order_id` int(10) UNSIGNED DEFAULT '0' COMMENT '订单ID',
  `ac_type` tinyint(10) NOT NULL COMMENT '动作类型 1为充值 2为消费',
  `account` decimal(10,2) NOT NULL COMMENT '充值金额or消费金额',
  `charge_name` varchar(20) NOT NULL COMMENT '充值类型 account为账户余额 other_account为赠送余额',
  `operator_id` int(10) DEFAULT '0' COMMENT '操作员ID',
  `operator_name` varchar(50) DEFAULT NULL COMMENT '操作员名称',
  `flag` int(10) DEFAULT '0' COMMENT 'PHP后台是否同步0同步失败1同步成功',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`account_history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_account_history`
--

TRUNCATE TABLE `we_account_history`;
-- --------------------------------------------------------

--
-- 表的结构 `we_ad`
--

DROP TABLE IF EXISTS `we_ad`;
CREATE TABLE IF NOT EXISTS `we_ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pad广告ID',
  `room_id` int(10) DEFAULT '0' COMMENT '房间id',
  `side_path` varchar(11) DEFAULT '0' COMMENT '位置ID',
  `ad_pic` varchar(60) NOT NULL COMMENT '展示图片路径',
  `ad_link` varchar(200) DEFAULT '0' COMMENT '广告链接地址',
  `sort_order` varchar(60) NOT NULL COMMENT '排序',
  `is_show` char(1) NOT NULL COMMENT '是否显示 0-不显示 1-显示',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=218 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_ad`
--

TRUNCATE TABLE `we_ad`;
--
-- 转存表中的数据 `we_ad`
--

INSERT INTO `we_ad` VALUES(212, NULL, NULL, '/data/uploads/1463396599_756117.png', NULL, '0', '1', NULL, '2015-11-19 09:25:47', '2016-05-16 11:03:19');
INSERT INTO `we_ad` VALUES(215, NULL, NULL, '/data/uploads/1463396590_102611.png', NULL, '0', '1', NULL, '2015-11-19 10:54:28', '2016-05-16 11:03:10');
INSERT INTO `we_ad` VALUES(216, NULL, NULL, '/data/uploads/1463396608_846184.png', NULL, '0', '1', NULL, '2016-05-16 11:03:28', '2016-05-16 11:03:28');
INSERT INTO `we_ad` VALUES(217, NULL, NULL, '/data/uploads/1463396616_550245.png', NULL, '0', '1', NULL, '2016-05-16 11:03:36', '2016-05-16 11:03:36');

-- --------------------------------------------------------

--
-- 表的结构 `we_attendance`
--

DROP TABLE IF EXISTS `we_attendance`;
CREATE TABLE IF NOT EXISTS `we_attendance` (
  `attendance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone` varchar(13) DEFAULT NULL COMMENT '教师手机号',
  `attendance_date` int(10) DEFAULT '0' COMMENT '应出勤日',
  `attendance_month` int(8) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '出勤状态（0：未出勤；1：已出勤；2：迟到）',
  `attendance_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '实际出勤时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`attendance_id`),
  KEY `phone` (`phone`),
  KEY `attendance_date` (`attendance_date`)
) ENGINE=InnoDB AUTO_INCREMENT=587 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_attendance`
--

TRUNCATE TABLE `we_attendance`;
--
-- 转存表中的数据 `we_attendance`
--

INSERT INTO `we_attendance` VALUES(583, '18622185062', 20150101, 201501, 0, '0000-00-00 00:00:00', '2016-05-12 08:05:22', '2016-05-20 12:22:17', NULL);
INSERT INTO `we_attendance` VALUES(584, '18622185062', 20160102, 201601, 0, '0000-00-00 00:00:00', '2016-05-12 08:05:49', '2016-05-20 12:22:27', NULL);
INSERT INTO `we_attendance` VALUES(585, '18622185062', 20150101, 201501, 0, '0000-00-00 00:00:00', '2016-05-12 08:05:22', '2016-05-20 12:22:36', NULL);
INSERT INTO `we_attendance` VALUES(586, '18622185062', 20150102, 201501, 1, '0000-00-00 00:00:00', '2016-05-12 08:05:22', '2016-05-20 12:22:43', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `we_booking`
--

DROP TABLE IF EXISTS `we_booking`;
CREATE TABLE IF NOT EXISTS `we_booking` (
  `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '预约ID',
  `booking_type` varchar(10) NOT NULL DEFAULT '' COMMENT '会议室：room；工位：seat',
  `item_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '预约物品ID',
  `room_num` varchar(60) DEFAULT '0' COMMENT '房间号',
  `room_price` decimal(10,2) UNSIGNED DEFAULT '0.00' COMMENT '房间定价',
  `room_type` varchar(225) DEFAULT '' COMMENT '房间种类',
  `room_size` int(10) DEFAULT '0' COMMENT '房间最大人数',
  `room_url` varchar(225) DEFAULT NULL COMMENT '图片路径',
  `item_name` varchar(20) NOT NULL DEFAULT '' COMMENT '房间名',
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '预约开始时间',
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '预约终止时间',
  `user_id` int(10) UNSIGNED DEFAULT '0' COMMENT '用户id',
  `order_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '订单号',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=702 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_booking`
--

TRUNCATE TABLE `we_booking`;
-- --------------------------------------------------------

--
-- 表的结构 `we_charging`
--

DROP TABLE IF EXISTS `we_charging`;
CREATE TABLE IF NOT EXISTS `we_charging` (
  `charging_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '事件预约ID',
  `charging_type_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '计费类型和定价关联',
  `charging_type_name` varchar(20) DEFAULT NULL COMMENT '事件类型名称',
  `charging_price` decimal(10,2) UNSIGNED DEFAULT '0.00' COMMENT '事件单价',
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '预约开始时间',
  `end_time` timestamp NULL DEFAULT NULL COMMENT '预约终止时间',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户id',
  `equpt_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '设备号',
  `order_id` int(10) UNSIGNED DEFAULT '0' COMMENT '订单号',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`charging_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_charging`
--

TRUNCATE TABLE `we_charging`;
-- --------------------------------------------------------

--
-- 表的结构 `we_charging_type`
--

DROP TABLE IF EXISTS `we_charging_type`;
CREATE TABLE IF NOT EXISTS `we_charging_type` (
  `charging_type_id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '事件ID',
  `charging_type_name` varchar(50) NOT NULL DEFAULT '' COMMENT '事件名称',
  `charging_price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '事件价格',
  `describe` text COMMENT '事件简介',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建事件',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`charging_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_charging_type`
--

TRUNCATE TABLE `we_charging_type`;
-- --------------------------------------------------------

--
-- 表的结构 `we_checkin_data`
--

DROP TABLE IF EXISTS `we_checkin_data`;
CREATE TABLE IF NOT EXISTS `we_checkin_data` (
  `checkin_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '打卡ID',
  `user_id` int(10) DEFAULT NULL COMMENT '用户ID',
  `checkin_date` int(8) NOT NULL,
  `machine_id` int(10) DEFAULT NULL COMMENT '打卡机ID',
  `checkin_datetime` bigint(12) DEFAULT '0' COMMENT '打卡时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`checkin_id`),
  UNIQUE KEY `user_id` (`user_id`,`checkin_date`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_checkin_data`
--

TRUNCATE TABLE `we_checkin_data`;
--
-- 转存表中的数据 `we_checkin_data`
--

INSERT INTO `we_checkin_data` VALUES(68, 30, 20160523, 766, 201605231513, '2016-05-23 07:13:34', '2016-05-23 07:13:34', NULL);
INSERT INTO `we_checkin_data` VALUES(72, 34, 20160523, 0, 201605231614, '2016-05-23 08:14:15', '2016-05-23 08:14:15', NULL);
INSERT INTO `we_checkin_data` VALUES(78, 35, 0, 0, 201605230000, '2016-05-23 08:44:16', '2016-05-23 08:44:16', NULL);
INSERT INTO `we_checkin_data` VALUES(79, 36, 0, 0, 201605230000, '2016-05-23 08:44:21', '2016-05-23 08:44:21', NULL);
INSERT INTO `we_checkin_data` VALUES(80, 37, 0, 0, 201605230000, '2016-05-23 08:44:23', '2016-05-23 08:44:23', NULL);
INSERT INTO `we_checkin_data` VALUES(81, 40, 0, 0, 201605230000, '2016-05-23 08:44:24', '2016-05-23 08:44:24', NULL);
INSERT INTO `we_checkin_data` VALUES(82, 46, 0, 0, 201605230000, '2016-05-23 08:44:27', '2016-05-23 08:44:27', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `we_company`
--

DROP TABLE IF EXISTS `we_company`;
CREATE TABLE IF NOT EXISTS `we_company` (
  `company_id` int(10) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) NOT NULL COMMENT '公司名称',
  `company_information` text COMMENT ' 公司简介',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_company`
--

TRUNCATE TABLE `we_company`;
--
-- 转存表中的数据 `we_company`
--

INSERT INTO `we_company` VALUES(15, 'A园02级1班', '', '2015-09-01 01:04:06', '2016-05-23 08:25:57', NULL);
INSERT INTO `we_company` VALUES(19, 'A园02级2班', '', '2015-09-16 01:22:32', '2016-05-23 08:26:07', NULL);
INSERT INTO `we_company` VALUES(22, 'A园03级2班', 'aaa', '2015-09-16 07:22:04', '2016-05-23 08:26:18', NULL);
INSERT INTO `we_company` VALUES(20, 'A园03级1班', 'ttt', '2015-09-16 01:38:59', '2016-05-23 08:26:12', NULL);
INSERT INTO `we_company` VALUES(29, 'A园04级1班', '', '2015-09-17 03:13:16', '2016-05-23 08:26:24', NULL);
INSERT INTO `we_company` VALUES(30, 'A园04级2班', '1', '2015-09-24 06:29:49', '2016-05-23 08:26:31', NULL);
INSERT INTO `we_company` VALUES(41, 'A园05级1班', '', '2016-05-11 13:12:36', '2016-05-11 13:12:36', NULL);
INSERT INTO `we_company` VALUES(42, 'B园06级2班', '', '2016-05-11 13:13:43', '2016-05-11 13:13:43', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `we_equpt`
--

DROP TABLE IF EXISTS `we_equpt`;
CREATE TABLE IF NOT EXISTS `we_equpt` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `equpt_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '设备ID',
  `charging_type_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '计费类型和定价关联',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_equpt`
--

TRUNCATE TABLE `we_equpt`;
-- --------------------------------------------------------

--
-- 表的结构 `we_fact`
--

DROP TABLE IF EXISTS `we_fact`;
CREATE TABLE IF NOT EXISTS `we_fact` (
  `fact_id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '事件ID',
  `fact_name` varchar(50) NOT NULL DEFAULT '' COMMENT '事件名称',
  `fact_price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '事件价格',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建事件',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`fact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_fact`
--

TRUNCATE TABLE `we_fact`;
-- --------------------------------------------------------

--
-- 表的结构 `we_floor`
--

DROP TABLE IF EXISTS `we_floor`;
CREATE TABLE IF NOT EXISTS `we_floor` (
  `floor_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '楼层ID',
  `floor_name` varchar(60) DEFAULT NULL COMMENT '楼层名称',
  `floor_map_url` text COMMENT '楼层地图链接',
  `floor_num` int(2) UNSIGNED DEFAULT '0' COMMENT '没用到',
  `floor_cat` varchar(255) DEFAULT NULL COMMENT '没用到',
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `position` varchar(45) DEFAULT NULL COMMENT '没用到',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`floor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_floor`
--

TRUNCATE TABLE `we_floor`;
-- --------------------------------------------------------

--
-- 表的结构 `we_floor_room_mst`
--

DROP TABLE IF EXISTS `we_floor_room_mst`;
CREATE TABLE IF NOT EXISTS `we_floor_room_mst` (
  `floor_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '楼层ID',
  `floor_name` varchar(60) DEFAULT NULL COMMENT '楼层名称',
  `floor_map_url` text COMMENT '楼层地图链接',
  `floor_num` int(2) UNSIGNED DEFAULT '0',
  `floor_cat` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `position` varchar(45) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`floor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_floor_room_mst`
--

TRUNCATE TABLE `we_floor_room_mst`;
-- --------------------------------------------------------

--
-- 表的结构 `we_floor_store`
--

DROP TABLE IF EXISTS `we_floor_store`;
CREATE TABLE IF NOT EXISTS `we_floor_store` (
  `floor_store_id` varchar(10) NOT NULL,
  `floor_id` int(10) NOT NULL DEFAULT '0' COMMENT '楼层ID',
  `store_id` int(20) NOT NULL DEFAULT '0' COMMENT '店铺ID',
  `house_number` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`store_id`,`floor_id`,`floor_store_id`),
  KEY `fk_tb_floor_store_tb_floor_1` (`floor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_floor_store`
--

TRUNCATE TABLE `we_floor_store`;
-- --------------------------------------------------------

--
-- 表的结构 `we_goods`
--

DROP TABLE IF EXISTS `we_goods`;
CREATE TABLE IF NOT EXISTS `we_goods` (
  `goods_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `cat_id` int(5) DEFAULT '0' COMMENT '分类id',
  `store_name` varchar(120) NOT NULL COMMENT '商店名称',
  `goods_name` varchar(120) NOT NULL DEFAULT '' COMMENT '商品名称',
  `price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '出售价格',
  `goods_brief` varchar(255) DEFAULT '' COMMENT '商品简介',
  `goods_img` varchar(255) DEFAULT '' COMMENT '商品图片',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`goods_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_goods`
--

TRUNCATE TABLE `we_goods`;
-- --------------------------------------------------------

--
-- 表的结构 `we_member`
--

DROP TABLE IF EXISTS `we_member`;
CREATE TABLE IF NOT EXISTS `we_member` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `phone` varchar(13) DEFAULT NULL,
  `password` varchar(300) NOT NULL DEFAULT '' COMMENT '密码',
  `real_name` varchar(60) DEFAULT NULL COMMENT '真实姓名',
  `role_id` int(5) DEFAULT '0',
  `reg_time` int(10) DEFAULT '0' COMMENT '注册时间',
  `last_login` timestamp NULL DEFAULT NULL COMMENT '最后登录',
  `last_ip` varchar(15) DEFAULT NULL,
  `logins` int(10) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `level_id` int(6) NOT NULL DEFAULT '0',
  `user_type` varchar(255) DEFAULT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `account` decimal(10,2) DEFAULT NULL COMMENT '账户余额',
  `company_name` varchar(50) DEFAULT NULL COMMENT '所属公司',
  `company_id` int(10) DEFAULT '0' COMMENT '所属公司ID',
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_member`
--

TRUNCATE TABLE `we_member`;
-- --------------------------------------------------------

--
-- 表的结构 `we_order`
--

DROP TABLE IF EXISTS `we_order`;
CREATE TABLE IF NOT EXISTS `we_order` (
  `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL DEFAULT '' COMMENT ' 订单号,唯一',
  `order_type` varchar(20) DEFAULT NULL COMMENT '订单类型（room：会议室预约；bath：洗浴；sleep：睡眠舱）',
  `buyer_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '买家ID（与users表关联）',
  `buyer_name` varchar(100) DEFAULT NULL COMMENT '买家名称',
  `status` tinyint(3) UNSIGNED DEFAULT NULL COMMENT '订单状态（0：未出勤；1：已出勤；2:迟到；99:未记入）',
  `payment_id` int(10) UNSIGNED DEFAULT '0' COMMENT '用户支付方式的id',
  `bill_other` varchar(225) DEFAULT NULL COMMENT '支付宝或等等 返回来的其他有用信息',
  `bill_number` varchar(60) DEFAULT NULL COMMENT '支付完成支付宝或等等的流水单号',
  `payment_name` varchar(100) DEFAULT NULL COMMENT '用户选择的支付方式名称',
  `buyer_phone` varchar(13) DEFAULT NULL,
  `payment_code` varchar(20) DEFAULT '' COMMENT '用户选择的支付方式code',
  `pay_at` timestamp NULL DEFAULT NULL COMMENT '买家支付时间',
  `goods_image` varchar(255) DEFAULT NULL,
  `goods_name` varchar(120) DEFAULT NULL,
  `order_amount` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '应付款金额',
  `attendance_date` varchar(8) NOT NULL DEFAULT '0',
  `check_time` bigint(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `buyer_phone` (`buyer_phone`,`attendance_date`)
) ENGINE=InnoDB AUTO_INCREMENT=839 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_order`
--

TRUNCATE TABLE `we_order`;
--
-- 转存表中的数据 `we_order`
--

INSERT INTO `we_order` VALUES(820, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160621', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(821, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160622', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(822, '', NULL, 0, NULL, 1, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, 'xxxx', '0.00', '20160523', 201605231636, '2016-05-22 10:14:43', '2016-05-23 08:36:07', NULL);
INSERT INTO `we_order` VALUES(823, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160524', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(824, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160525', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(825, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160526', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(826, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160527', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(827, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160528', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(828, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160529', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(829, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20160530', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(830, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160621', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(831, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160622', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(832, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160523', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(833, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160524', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(834, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160525', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(835, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160526', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(836, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160527', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(837, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160528', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);
INSERT INTO `we_order` VALUES(838, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20160529', 0, '2016-05-22 10:14:43', '2016-05-22 10:14:43', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `we_order_change_log`
--

DROP TABLE IF EXISTS `we_order_change_log`;
CREATE TABLE IF NOT EXISTS `we_order_change_log` (
  `change_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL DEFAULT '0',
  `order_amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`change_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_order_change_log`
--

TRUNCATE TABLE `we_order_change_log`;
-- --------------------------------------------------------

--
-- 表的结构 `we_order_goods`
--

DROP TABLE IF EXISTS `we_order_goods`;
CREATE TABLE IF NOT EXISTS `we_order_goods` (
  `rec_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品预约id',
  `order_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '订单商品信息对应的详细信息id',
  `goods_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商品的的id',
  `goods_name` varchar(255) DEFAULT '' COMMENT '商品的名称',
  `goods_image` varchar(255) DEFAULT NULL COMMENT '商品图片',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  `store_name` varchar(255) DEFAULT '0' COMMENT '商店名字',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `user_id` int(10) UNSIGNED DEFAULT '0' COMMENT '用户id',
  PRIMARY KEY (`rec_id`),
  KEY `order_id` (`order_id`,`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_order_goods`
--

TRUNCATE TABLE `we_order_goods`;
-- --------------------------------------------------------

--
-- 表的结构 `we_payment`
--

DROP TABLE IF EXISTS `we_payment`;
CREATE TABLE IF NOT EXISTS `we_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(20) NOT NULL DEFAULT '' COMMENT '支付方式名称（例如：支付宝，微信，银联）',
  `payment_desc` text COMMENT '支付方式描述',
  `config` text COMMENT '支付方式对接的各种key，appId等',
  `is_online` tinyint(4) UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否为在线支付：0-货到付款 | 1-在线支付',
  `is_enabled` tinyint(4) UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否启用：0-未启用 | 1-已启用',
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '列表中的排列顺序',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_payment`
--

TRUNCATE TABLE `we_payment`;
-- --------------------------------------------------------

--
-- 表的结构 `we_room`
--

DROP TABLE IF EXISTS `we_room`;
CREATE TABLE IF NOT EXISTS `we_room` (
  `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '房间id',
  `room_num` varchar(60) DEFAULT '0' COMMENT '房间号',
  `seat_type_id` int(10) UNSIGNED DEFAULT '0' COMMENT '工位类型关联房间表',
  `floor_id` int(10) DEFAULT '0' COMMENT '楼层ID，tb_floor外键',
  `room_size` int(10) DEFAULT '0' COMMENT '房间最大人数',
  `room_price` decimal(10,2) UNSIGNED DEFAULT '0.00' COMMENT '会议室定价',
  `room_type` varchar(60) DEFAULT '' COMMENT '房间种类',
  `room_descript` varchar(225) DEFAULT NULL COMMENT '房间描述',
  `room_url` varchar(225) DEFAULT NULL COMMENT '图片路径',
  `region_name` varchar(100) DEFAULT NULL COMMENT '区域名称',
  `address` varchar(255) DEFAULT '',
  `zipcode` varchar(20) DEFAULT '' COMMENT '邮编',
  `tel` varchar(60) DEFAULT '',
  `sgrade` int(3) DEFAULT '0' COMMENT '店铺等级ID，tb_sgrade外键',
  `credit_value` int(10) DEFAULT '0',
  `praise_rate` decimal(5,2) DEFAULT '0.00',
  `state` int(3) DEFAULT '0',
  `close_reason` varchar(255) DEFAULT '',
  `add_time` int(10) DEFAULT '0',
  `end_time` int(10) DEFAULT '0',
  `certification` varchar(255) DEFAULT NULL,
  `sort_order` int(5) DEFAULT '0',
  `recommended` int(4) DEFAULT '0',
  `theme` varchar(60) DEFAULT '',
  `store_banner` varchar(255) DEFAULT NULL,
  `store_logo` varchar(255) DEFAULT NULL,
  `description` text,
  `image_1` varchar(255) DEFAULT '',
  `image_2` varchar(255) DEFAULT '',
  `image_3` varchar(255) DEFAULT '',
  `im_qq` varchar(60) DEFAULT '',
  `im_ww` varchar(60) DEFAULT '',
  `is_show` int(1) DEFAULT '1' COMMENT '是否显示',
  `enable_groupbuy` int(1) DEFAULT '0',
  `enable_radar` int(1) DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间戳',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间戳',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间戳',
  PRIMARY KEY (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1070 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_room`
--

TRUNCATE TABLE `we_room`;
--
-- 转存表中的数据 `we_room`
--

INSERT INTO `we_room` VALUES(1056, 'A123', 0, 79, NULL, NULL, NULL, 'A园卡机3', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-15 06:02:15', '2016-05-23 08:11:04');
INSERT INTO `we_room` VALUES(1069, 'A122', 0, NULL, NULL, NULL, NULL, 'A园卡机2', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2016-05-23 08:11:33', '2016-05-23 08:11:33');
INSERT INTO `we_room` VALUES(1068, 'A121', 0, NULL, NULL, NULL, NULL, 'A园卡机1', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2016-05-23 08:11:19', '2016-05-23 08:11:19');
INSERT INTO `we_room` VALUES(1067, 'B123', 0, NULL, NULL, NULL, NULL, '愁吃愁穿', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-23 08:09:45', '2016-05-19 01:59:32', '2016-05-23 08:09:45');

-- --------------------------------------------------------

--
-- 表的结构 `we_room_company_mst`
--

DROP TABLE IF EXISTS `we_room_company_mst`;
CREATE TABLE IF NOT EXISTS `we_room_company_mst` (
  `floor_store_id` varchar(10) NOT NULL,
  `floor_id` int(10) NOT NULL DEFAULT '0' COMMENT '楼层ID',
  `store_id` int(20) NOT NULL DEFAULT '0' COMMENT '店铺ID',
  `house_number` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`store_id`,`floor_id`,`floor_store_id`),
  KEY `fk_tb_floor_store_tb_floor_1` (`floor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_room_company_mst`
--

TRUNCATE TABLE `we_room_company_mst`;
-- --------------------------------------------------------

--
-- 表的结构 `we_seat`
--

DROP TABLE IF EXISTS `we_seat`;
CREATE TABLE IF NOT EXISTS `we_seat` (
  `seat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '工位id',
  `seat_name` varchar(10) DEFAULT NULL COMMENT '工位名称',
  `room_id` int(11) DEFAULT '0' COMMENT '工位属于哪个房间(关联room_id)',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`seat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_seat`
--

TRUNCATE TABLE `we_seat`;
-- --------------------------------------------------------

--
-- 表的结构 `we_seat_type`
--

DROP TABLE IF EXISTS `we_seat_type`;
CREATE TABLE IF NOT EXISTS `we_seat_type` (
  `seat_type_id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '工位类型ID',
  `seat_type_name` varchar(50) NOT NULL DEFAULT '' COMMENT '工位类型名称',
  `seat_price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '工位类型价格',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`seat_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_seat_type`
--

TRUNCATE TABLE `we_seat_type`;
-- --------------------------------------------------------

--
-- 表的结构 `we_setting`
--

DROP TABLE IF EXISTS `we_setting`;
CREATE TABLE IF NOT EXISTS `we_setting` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `key` varchar(200) NOT NULL COMMENT '设置类型',
  `value` text COMMENT 'jeson数组值',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_setting`
--

TRUNCATE TABLE `we_setting`;
-- --------------------------------------------------------

--
-- 表的结构 `we_students`
--

DROP TABLE IF EXISTS `we_students`;
CREATE TABLE IF NOT EXISTS `we_students` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `student_name` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `phone` varchar(13) DEFAULT NULL COMMENT '用户手机号',
  `password` varchar(300) NOT NULL DEFAULT '' COMMENT '密码',
  `real_name` varchar(60) DEFAULT NULL COMMENT '真实姓名',
  `card_room_num` int(20) NOT NULL DEFAULT '0' COMMENT '门禁卡号',
  `card_num` varchar(20) NOT NULL DEFAULT '0' COMMENT '刷卡卡号',
  `role_id` int(5) DEFAULT '0' COMMENT '1可作为管理员登陆系统0普通用户',
  `reg_time` int(10) DEFAULT '0' COMMENT '注册时间',
  `last_login` timestamp NULL DEFAULT NULL COMMENT '最后登录',
  `last_ip` varchar(15) DEFAULT NULL COMMENT '最后登陆IP',
  `logins` int(10) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `level_id` int(6) NOT NULL DEFAULT '0',
  `user_type` varchar(255) DEFAULT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `account` decimal(10,2) DEFAULT '0.00' COMMENT '账户余额',
  `other_account` decimal(10,2) DEFAULT '0.00' COMMENT '赠送账户余额',
  `company_name` varchar(50) DEFAULT ' ' COMMENT '所属公司',
  `company_id` int(10) DEFAULT '0' COMMENT '所属公司ID',
  `store_name` varchar(120) DEFAULT NULL COMMENT '商店名称',
  `img` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `student_name` (`student_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_students`
--

TRUNCATE TABLE `we_students`;
--
-- 转存表中的数据 `we_students`
--

INSERT INTO `we_students` VALUES(30, '', '88888888888', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲8', 0, 'xiaozhou8', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:27:10', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992030_228330.mp3');
INSERT INTO `we_students` VALUES(34, '', '88888888881', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲1', 0, 'xiaozhou1', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:27:18', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992038_455231.mp3');
INSERT INTO `we_students` VALUES(35, '', '88888888882', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲2', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:27:27', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992047_872801.mp3');
INSERT INTO `we_students` VALUES(36, '', '88888888883', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲3', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:27:35', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992055_362562.mp3');
INSERT INTO `we_students` VALUES(37, '', '88888888884', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲4', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:27:43', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992063_552817.mp3');
INSERT INTO `we_students` VALUES(38, '', '88888888885', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲5', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:27:54', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992074_834672.mp3');
INSERT INTO `we_students` VALUES(39, '', '88888888886', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲6', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:28:13', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992093_726961.mp3');
INSERT INTO `we_students` VALUES(40, '', '88888888887', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲7', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:28:03', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992083_204583.mp3');
INSERT INTO `we_students` VALUES(41, '', '88888888889', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲9', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:28:21', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992101_959236.mp3');
INSERT INTO `we_students` VALUES(42, '', '88888888890', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲10', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:28:30', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992110_351218.mp3');
INSERT INTO `we_students` VALUES(43, '', '88888888891', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲11', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:28:48', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992128_812413.mp3');
INSERT INTO `we_students` VALUES(44, '', '88888888892', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲12', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:29:07', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992147_94348.mp3');
INSERT INTO `we_students` VALUES(45, '', '88888888893', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲13', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:29:21', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992161_561175.mp3');
INSERT INTO `we_students` VALUES(46, '', '88888888894', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲14', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:29:50', '2016-05-11 13:05:28', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463992190_765778.mp3');

-- --------------------------------------------------------

--
-- 表的结构 `we_users`
--

DROP TABLE IF EXISTS `we_users`;
CREATE TABLE IF NOT EXISTS `we_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `phone` varchar(13) DEFAULT NULL COMMENT '用户手机号',
  `password` varchar(300) NOT NULL DEFAULT '' COMMENT '密码',
  `real_name` varchar(60) DEFAULT NULL COMMENT '真实姓名',
  `card_room_num` int(20) NOT NULL DEFAULT '0' COMMENT '门禁卡号',
  `card_num` varchar(20) NOT NULL DEFAULT '0' COMMENT '刷卡卡号',
  `role_id` int(5) DEFAULT '0' COMMENT '1可作为管理员登陆系统0普通用户',
  `reg_time` int(10) DEFAULT '0' COMMENT '注册时间',
  `last_login` timestamp NULL DEFAULT NULL COMMENT '最后登录',
  `last_ip` varchar(15) DEFAULT NULL COMMENT '最后登陆IP',
  `logins` int(10) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `level_id` int(6) NOT NULL DEFAULT '0',
  `user_type` varchar(255) DEFAULT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `account` decimal(10,2) DEFAULT '0.00' COMMENT '账户余额',
  `other_account` decimal(10,2) DEFAULT '0.00' COMMENT '赠送账户余额',
  `company_name` varchar(50) DEFAULT ' ' COMMENT '所属公司',
  `company_id` int(10) DEFAULT '0' COMMENT '所属公司ID',
  `store_name` varchar(120) DEFAULT NULL COMMENT '商店名称',
  `img` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `phone` (`phone`),
  KEY `user_name` (`user_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=626 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_users`
--

TRUNCATE TABLE `we_users`;
--
-- 转存表中的数据 `we_users`
--

INSERT INTO `we_users` VALUES(1, 'admin', '66666666666', '$2y$10$enOQEgLB3kBq1yqP6q5Ll.Xbk9RMFmvzRpNT1hGe5tw4FRep1/FoG', '管理员', 0, '4432524', 1, 0, '2016-05-23 08:44:44', '::1', 216, 0, NULL, '78nqehKqhP5HxNxpRLAtozwpLQZzcYQkQnjuvALN5FvTmaLL14xE6aNdHJHm', '2016-05-23 08:44:44', '2015-10-16 09:42:26', NULL, '20.00', '0.00', '无', NULL, '', '', '');
INSERT INTO `we_users` VALUES(19, 'wang', '13444448888', '$2y$10$x8JA.lXBU6whuslRnd/yHOtY0w6Qiup4Ta2ezMYjWv7vwIHNcySAe', '王校长', 123456, '00000002', 1, 0, '2015-11-23 04:51:23', '127.0.0.1', 3, 0, NULL, 'zjaS9m33e5Ea103fpB4Xd64qt8w8Xy5dCd6cljNC0PqFBAnHjE2Mcpb6Vcm9', '2016-05-12 06:00:27', '2015-10-27 07:12:16', NULL, '2852.00', '3.00', '无', 0, NULL, '/data/uploads/1463032827_205046.png', '');
INSERT INTO `we_users` VALUES(30, 'zhou', '15555555555', '$2y$10$72z/QDHgMxYTslW4TUCEguyUSC/9dPmLT29dyOqJo0apRfTIjuNF6', '周会计', 0, '0', 1, 0, '2015-11-03 13:09:41', '127.0.0.1', 4, 0, NULL, 'j6R1AsSW2vTt6rIpS6hBLYlOkdPHvULknXBQDXlpwLlv0xQoMYPWnnPmfHy0', '2016-05-10 12:33:37', '2015-09-16 05:32:44', NULL, NULL, NULL, '无', NULL, '', '', '');
INSERT INTO `we_users` VALUES(61, '', '11111111111', '$2y$10$it0PK23th./5GRc5/Pd3Wemy14P7sWcYuOffVHD3tT17vaqop2Nti', '李老师', 0, '133434', 0, 0, '2016-05-21 09:37:10', '::1', 3, 0, NULL, 'BUjskOegqLzPL59I8N3Y956jKtDUDu07GhwWxD8IAWsVXxDyNJqWxFR6LXtN', '2016-05-23 08:37:12', '2015-09-29 08:21:06', NULL, NULL, '40.00', 'A园04级2班', NULL, NULL, '', '/data/audio/1463992632_595144.mp3');
INSERT INTO `we_users` VALUES(622, '', '18622185062', '$2y$10$eZxBc6TswvQgrW6LMVRbe.q1OirNXee1VxLFxp8uYN1J7WovSTW1G', '白老师', 0, 'baixue', 0, 0, '2016-05-23 08:43:47', '::1', 36, 0, NULL, 'WXvmRttsj0kARJnvsOSWfSmrvlW7W5vmJ1216rKFFNSHb5YStSi23xmzA74I', '2016-05-23 08:44:35', '2016-05-11 11:42:17', NULL, '0.00', '0.00', 'A园03级1班', 0, NULL, '/data/uploads/1463992429_704189.png', '/data/audio/1463992430_238570.mp3');
INSERT INTO `we_users` VALUES(625, '', '18622185026', '$2y$10$aaQPPYqW2fkUWGgiieqgPu6CQEBIUGH.vsMLYliToF.mS/K.CYKKa', '周老师', 0, 'zhouqiufan', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-23 08:24:12', '2016-05-23 08:24:12', NULL, '0.00', '0.00', 'A园05级1班', 0, NULL, '/data/uploads/1463991852_247324.png', '/data/audio/1463991852_318080.mp3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
