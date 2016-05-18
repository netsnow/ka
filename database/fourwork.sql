-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-05-18 15:47:35
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
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_account_history`
--

TRUNCATE TABLE `we_account_history`;
--
-- 转存表中的数据 `we_account_history`
--

INSERT INTO `we_account_history` VALUES(0000000001, 18, 0, 1, '30.00', '', NULL, NULL, 1, '2015-09-01 03:43:18', '2015-09-01 03:43:18', NULL);
INSERT INTO `we_account_history` VALUES(0000000002, 18, 0, 1, '30.00', '', NULL, NULL, 1, '2015-09-01 03:43:34', '2015-09-01 03:43:34', NULL);
INSERT INTO `we_account_history` VALUES(0000000003, 18, 0, 2, '21.00', '', NULL, NULL, 1, '2015-09-01 04:59:42', '2015-09-01 03:43:47', NULL);
INSERT INTO `we_account_history` VALUES(0000000004, 18, 0, 1, '10.00', '', NULL, NULL, 1, '2015-09-01 05:00:17', '2015-09-01 03:45:02', NULL);
INSERT INTO `we_account_history` VALUES(0000000005, 1, 0, 1, '100.00', '', NULL, NULL, 1, '2015-09-02 08:11:12', '2015-09-02 08:11:12', NULL);
INSERT INTO `we_account_history` VALUES(0000000006, 18, 0, 1, '100.00', '', NULL, NULL, 1, '2015-09-07 06:39:00', '2015-09-07 06:39:00', NULL);
INSERT INTO `we_account_history` VALUES(0000000007, 19, 0, 1, '11.00', '', NULL, NULL, 1, '2015-09-08 01:10:49', '2015-09-08 01:10:49', NULL);
INSERT INTO `we_account_history` VALUES(0000000008, 19, 0, 1, '123.00', '', NULL, NULL, 1, '2015-09-08 01:11:07', '2015-09-08 01:11:07', NULL);
INSERT INTO `we_account_history` VALUES(0000000009, 18, 0, 1, '50.00', '', 1, 'admin', 1, '2015-09-10 06:13:46', '2015-09-10 06:13:46', NULL);
INSERT INTO `we_account_history` VALUES(0000000010, 18, 0, 1, '10.00', '', 1, 'admin', 1, '2015-09-10 06:15:35', '2015-09-10 06:15:35', NULL);
INSERT INTO `we_account_history` VALUES(0000000011, 19, 0, 1, '6.00', '', 18, 'liushaopeng1234', 1, '2015-09-10 06:17:14', '2015-09-10 06:17:14', NULL);
INSERT INTO `we_account_history` VALUES(0000000012, 1, 0, 1, '10.00', '', 1, 'admin', 1, '2015-09-14 03:25:04', '2015-09-14 03:25:04', NULL);
INSERT INTO `we_account_history` VALUES(0000000013, 1, 0, 1, '5.00', '', 1, 'admin', 1, '2015-09-14 05:19:43', '2015-09-14 05:19:43', NULL);
INSERT INTO `we_account_history` VALUES(0000000014, 18, 0, 1, '20.00', '', 1, 'admin', 1, '2015-09-14 06:34:15', '2015-09-14 06:34:15', NULL);
INSERT INTO `we_account_history` VALUES(0000000015, 21, 0, 1, '250.00', '', 1, 'admin', 1, '2015-09-15 00:37:33', '2015-09-15 00:37:33', NULL);
INSERT INTO `we_account_history` VALUES(0000000016, 19, 0, 1, '50.00', '', 1, 'admin', 1, '2015-09-15 07:53:10', '2015-09-15 07:53:10', NULL);
INSERT INTO `we_account_history` VALUES(0000000017, 19, 0, 1, '250.00', '', 1, 'admin', 1, '2015-09-15 08:25:18', '2015-09-15 08:25:18', NULL);
INSERT INTO `we_account_history` VALUES(0000000018, 19, 0, 1, '166.00', '', 1, 'admin', 1, '2015-09-15 08:25:29', '2015-09-15 08:25:29', NULL);
INSERT INTO `we_account_history` VALUES(0000000019, 1, 0, 1, '10.00', '', 1, 'admin', 1, '2015-09-16 01:18:31', '2015-09-16 01:18:31', NULL);
INSERT INTO `we_account_history` VALUES(0000000020, 18, 0, 1, '111.00', '', 1, 'admin', 1, '2015-09-16 01:18:51', '2015-09-16 01:18:51', NULL);
INSERT INTO `we_account_history` VALUES(0000000021, 26, 0, 1, '11.00', '', 1, 'admin', 1, '2015-09-16 01:26:42', '2015-09-16 01:26:42', NULL);
INSERT INTO `we_account_history` VALUES(0000000022, 26, 0, 1, '11.00', '', 1, 'admin', 1, '2015-09-16 01:26:43', '2015-09-16 01:26:43', NULL);
INSERT INTO `we_account_history` VALUES(0000000023, 26, 0, 1, '11.00', '', 1, 'admin', 1, '2015-09-16 01:26:46', '2015-09-16 01:26:46', NULL);
INSERT INTO `we_account_history` VALUES(0000000024, 1, 0, 1, '20.00', '', 1, 'admin', 1, '2015-09-16 07:14:37', '2015-09-16 07:14:37', NULL);
INSERT INTO `we_account_history` VALUES(0000000025, 1, 0, 1, '122.00', '', 1, 'admin', 1, '2015-09-17 07:30:06', '2015-09-17 07:30:06', NULL);
INSERT INTO `we_account_history` VALUES(0000000026, 18, 0, 1, '50.00', '', 1, 'admin', 1, '2015-09-22 05:39:31', '2015-09-22 05:39:31', NULL);
INSERT INTO `we_account_history` VALUES(0000000027, 24, 0, 1, '50.00', '', 1, 'admin', 1, '2015-09-22 05:41:20', '2015-09-22 05:41:20', NULL);
INSERT INTO `we_account_history` VALUES(0000000028, 1, 0, 1, '1.00', '', 1, 'admin', 1, '2015-09-24 04:02:02', '2015-09-24 04:02:02', NULL);
INSERT INTO `we_account_history` VALUES(0000000029, 2, 0, 1, '1.00', '', 1, 'admin', 1, '2015-09-24 04:03:04', '2015-09-24 04:03:04', NULL);
INSERT INTO `we_account_history` VALUES(0000000030, 2, 0, 1, '1.00', '', 1, 'admin', 1, '2015-09-24 05:02:26', '2015-09-24 05:02:26', NULL);
INSERT INTO `we_account_history` VALUES(0000000031, 2, 0, 1, '1.00', '', 1, 'admin', 1, '2015-09-24 05:02:27', '2015-09-24 05:02:27', NULL);
INSERT INTO `we_account_history` VALUES(0000000032, 18, 0, 1, '7.00', '', 1, 'admin', 1, '2015-09-24 07:38:41', '2015-09-24 07:38:41', NULL);
INSERT INTO `we_account_history` VALUES(0000000033, 14, 0, 1, '450.00', 'account', 1, 'admin', 1, '2015-09-25 06:15:29', '2015-09-25 06:15:29', NULL);
INSERT INTO `we_account_history` VALUES(0000000034, 14, 0, 1, '450.00', 'other_account', 1, 'admin', 1, '2015-09-25 06:15:29', '2015-09-25 06:15:29', NULL);
INSERT INTO `we_account_history` VALUES(0000000035, 14, 0, 1, '50.00', 'account', 1, 'admin', 1, '2015-09-25 06:16:21', '2015-09-25 06:16:21', NULL);
INSERT INTO `we_account_history` VALUES(0000000036, 14, 0, 1, '20.00', 'other_account', 1, 'admin', 1, '2015-09-25 06:16:21', '2015-09-25 06:16:21', NULL);
INSERT INTO `we_account_history` VALUES(0000000037, 14, 0, 1, '50.00', 'account', 1, 'admin', 1, '2015-09-25 06:30:19', '2015-09-25 06:30:19', NULL);
INSERT INTO `we_account_history` VALUES(0000000038, 14, 0, 1, '20.00', 'other_account', 1, 'admin', 1, '2015-09-25 06:30:19', '2015-09-25 06:30:19', NULL);
INSERT INTO `we_account_history` VALUES(0000000039, 18, 0, 1, '50.00', 'account', 1, 'admin', 1, '2015-09-25 06:34:12', '2015-09-25 06:34:12', NULL);
INSERT INTO `we_account_history` VALUES(0000000040, 18, 0, 1, '50.00', 'other_account', 1, 'admin', 1, '2015-09-25 06:34:12', '2015-09-25 06:34:12', NULL);
INSERT INTO `we_account_history` VALUES(0000000041, 14, 0, 1, '450.00', 'account', 1, 'admin', 1, '2015-09-25 06:38:59', '2015-09-25 06:38:59', NULL);
INSERT INTO `we_account_history` VALUES(0000000042, 14, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-09-25 06:39:13', '2015-09-25 06:39:13', NULL);
INSERT INTO `we_account_history` VALUES(0000000043, 14, 0, 1, '50.00', 'other_account', 1, 'admin', 1, '2015-09-25 06:39:13', '2015-09-25 06:39:13', NULL);
INSERT INTO `we_account_history` VALUES(0000000044, 14, 0, 1, '450.00', 'account', 1, 'admin', 1, '2015-09-25 07:01:14', '2015-09-25 07:01:14', NULL);
INSERT INTO `we_account_history` VALUES(0000000045, 14, 0, 1, '10.00', 'other_account', 1, 'admin', 1, '2015-09-25 07:01:14', '2015-09-25 07:01:14', NULL);
INSERT INTO `we_account_history` VALUES(0000000046, 14, 0, 1, '123.00', 'account', 1, 'admin', 1, '2015-09-25 08:16:31', '2015-09-25 08:16:31', NULL);
INSERT INTO `we_account_history` VALUES(0000000047, 14, 0, 1, '-40.00', 'account', 1, 'admin', 1, '2015-09-25 08:16:45', '2015-09-25 08:16:45', NULL);
INSERT INTO `we_account_history` VALUES(0000000048, 14, 0, 1, '-3.00', 'account', 1, 'admin', 1, '2015-09-25 08:32:50', '2015-09-25 08:32:50', NULL);
INSERT INTO `we_account_history` VALUES(0000000049, 61, 0, 1, '20.00', 'account', 1, 'admin', 1, '2015-09-29 08:26:02', '2015-09-29 08:26:02', NULL);
INSERT INTO `we_account_history` VALUES(0000000050, 61, 0, 1, '19.00', 'account', 1, 'admin', 1, '2015-09-29 08:34:27', '2015-09-29 08:34:27', NULL);
INSERT INTO `we_account_history` VALUES(0000000051, 61, 0, 1, '30.00', 'other_account', 1, 'admin', 1, '2015-09-29 08:34:27', '2015-09-29 08:34:27', NULL);
INSERT INTO `we_account_history` VALUES(0000000052, 61, 0, 1, '10.00', 'account', 1, 'admin', 1, '2015-09-29 08:36:04', '2015-09-29 08:36:04', NULL);
INSERT INTO `we_account_history` VALUES(0000000053, 61, 0, 1, '10.00', 'other_account', 1, 'admin', 1, '2015-09-29 08:36:04', '2015-09-29 08:36:04', NULL);
INSERT INTO `we_account_history` VALUES(0000000054, 18, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-10-12 01:52:21', '2015-10-12 01:52:21', NULL);
INSERT INTO `we_account_history` VALUES(0000000055, 65, 0, 1, '22121.00', 'account', 1, 'admin', 1, '2015-10-14 08:13:23', '2015-10-14 08:13:23', NULL);
INSERT INTO `we_account_history` VALUES(0000000056, 65, 0, 1, '112.00', 'account', 1, 'admin', 1, '2015-10-14 08:27:44', '2015-10-14 08:27:44', NULL);
INSERT INTO `we_account_history` VALUES(0000000057, 65, 0, 1, '123.00', 'other_account', 1, 'admin', 1, '2015-10-14 08:27:44', '2015-10-14 08:27:44', NULL);
INSERT INTO `we_account_history` VALUES(0000000058, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-10-20 05:59:08', '2015-10-20 05:59:08', NULL);
INSERT INTO `we_account_history` VALUES(0000000059, 26, 0, 1, '30.00', 'account', 1, 'admin', 1, '2015-10-23 10:25:09', '2015-10-23 10:25:09', NULL);
INSERT INTO `we_account_history` VALUES(0000000060, 26, 0, 1, '20.00', 'account', 1, 'admin', 1, '2015-10-23 10:25:30', '2015-10-23 10:25:30', NULL);
INSERT INTO `we_account_history` VALUES(0000000061, 26, 0, 1, '20.00', 'other_account', 1, 'admin', 1, '2015-10-23 10:25:30', '2015-10-23 10:25:30', NULL);
INSERT INTO `we_account_history` VALUES(0000000062, 26, 0, 1, '20.00', 'account', 1, 'admin', 1, '2015-10-23 10:26:30', '2015-10-23 10:26:30', NULL);
INSERT INTO `we_account_history` VALUES(0000000063, 26, 0, 1, '20.00', 'other_account', 1, 'admin', 1, '2015-10-23 10:26:30', '2015-10-23 10:26:30', NULL);
INSERT INTO `we_account_history` VALUES(0000000064, 26, 0, 1, '100.00', 'other_account', 1, 'admin', 1, '2015-10-23 10:27:14', '2015-10-23 10:27:14', NULL);
INSERT INTO `we_account_history` VALUES(0000000065, 26, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-10-26 09:23:56', '2015-10-26 09:23:56', NULL);
INSERT INTO `we_account_history` VALUES(0000000066, 26, 0, 1, '20.00', 'other_account', 1, 'admin', 1, '2015-10-26 09:23:56', '2015-10-26 09:23:56', NULL);
INSERT INTO `we_account_history` VALUES(0000000067, 1, 0, 2, '10.00', 'bath', 0, NULL, 1, '2015-10-27 05:42:25', '2015-10-27 05:42:25', NULL);
INSERT INTO `we_account_history` VALUES(0000000068, 1, 0, 2, '10.00', 'bath', 0, NULL, 1, '2015-10-27 05:45:04', '2015-10-27 05:45:04', NULL);
INSERT INTO `we_account_history` VALUES(0000000069, 1, 0, 2, '5.00', 'bath', 0, NULL, 1, '2015-10-27 05:48:38', '2015-10-27 05:48:38', NULL);
INSERT INTO `we_account_history` VALUES(0000000070, 1, 0, 2, '108.00', '2', 0, NULL, 1, '2015-10-27 08:16:26', '2015-10-27 08:16:26', NULL);
INSERT INTO `we_account_history` VALUES(0000000071, 1, 0, 2, '90.00', 'bath', 0, NULL, 1, '2015-10-27 08:16:31', '2015-10-27 08:16:31', NULL);
INSERT INTO `we_account_history` VALUES(0000000072, 1, 0, 2, '5.00', 'bath', 0, NULL, 1, '2015-10-27 08:23:06', '2015-10-27 08:23:06', NULL);
INSERT INTO `we_account_history` VALUES(0000000073, 1, 0, 2, '135.00', 'bath', 0, NULL, 1, '2015-10-27 08:24:12', '2015-10-27 08:24:12', NULL);
INSERT INTO `we_account_history` VALUES(0000000074, 1, 0, 2, '90.00', 'bath', 0, NULL, 1, '2015-10-27 08:24:12', '2015-10-27 08:24:12', NULL);
INSERT INTO `we_account_history` VALUES(0000000075, 1, 0, 2, '10.00', 'bath', 0, NULL, 1, '2015-10-27 08:50:52', '2015-10-27 08:50:52', NULL);
INSERT INTO `we_account_history` VALUES(0000000076, 1, 0, 2, '90.00', 'bath', 0, NULL, 1, '2015-10-27 08:53:42', '2015-10-27 08:53:42', NULL);
INSERT INTO `we_account_history` VALUES(0000000077, 1, 0, 2, '90.00', 'bath', 1, 'admin', 1, '2015-10-27 08:55:05', '2015-10-27 08:55:05', NULL);
INSERT INTO `we_account_history` VALUES(0000000078, 74, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-10-28 05:48:11', '2015-10-28 05:48:11', NULL);
INSERT INTO `we_account_history` VALUES(0000000079, 74, 0, 1, '1000.00', 'account', 1, 'admin', 1, '2015-10-28 05:48:39', '2015-10-28 05:48:39', NULL);
INSERT INTO `we_account_history` VALUES(0000000080, 1, 0, 1, '708.00', 'bath', 1, 'admin', 1, '2015-10-28 06:36:33', '2015-10-28 06:36:33', NULL);
INSERT INTO `we_account_history` VALUES(0000000081, 74, 0, 1, '30.00', 'account', 1, 'admin', 1, '2015-10-28 11:29:26', '2015-10-28 11:29:26', NULL);
INSERT INTO `we_account_history` VALUES(0000000082, 74, 0, 1, '50.00', 'account', 1, 'admin', 1, '2015-10-28 11:31:59', '2015-10-28 11:31:59', NULL);
INSERT INTO `we_account_history` VALUES(0000000083, 74, 0, 1, '50.00', 'account', 1, 'admin', 1, '2015-10-28 11:32:08', '2015-10-28 11:32:08', NULL);
INSERT INTO `we_account_history` VALUES(0000000084, 74, 0, 1, '50.00', 'account', 1, 'admin', 1, '2015-10-28 11:38:40', '2015-10-28 11:38:40', NULL);
INSERT INTO `we_account_history` VALUES(0000000085, 74, 0, 1, '5.00', 'account', 1, 'admin', 1, '2015-10-28 11:45:20', '2015-10-28 11:45:20', NULL);
INSERT INTO `we_account_history` VALUES(0000000086, 74, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-10-28 11:49:10', '2015-10-28 11:49:10', NULL);
INSERT INTO `we_account_history` VALUES(0000000087, 74, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-10-28 11:49:36', '2015-10-28 11:49:36', NULL);
INSERT INTO `we_account_history` VALUES(0000000088, 74, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-10-28 11:49:45', '2015-10-28 11:49:45', NULL);
INSERT INTO `we_account_history` VALUES(0000000089, 74, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-10-28 11:50:14', '2015-10-28 11:50:14', NULL);
INSERT INTO `we_account_history` VALUES(0000000090, 74, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-10-28 11:52:49', '2015-10-28 11:52:49', NULL);
INSERT INTO `we_account_history` VALUES(0000000091, 74, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-10-28 11:53:23', '2015-10-28 11:53:23', NULL);
INSERT INTO `we_account_history` VALUES(0000000092, 74, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-10-28 11:53:42', '2015-10-28 11:53:42', NULL);
INSERT INTO `we_account_history` VALUES(0000000093, 74, 0, 1, '8.00', 'account', 1, 'admin', 1, '2015-10-28 12:02:41', '2015-10-28 12:02:41', NULL);
INSERT INTO `we_account_history` VALUES(0000000094, 74, 0, 1, '8.00', 'account', 1, 'admin', 1, '2015-10-28 12:03:10', '2015-10-28 12:03:10', NULL);
INSERT INTO `we_account_history` VALUES(0000000118, 1, 0, 1, '2.00', 'account', 1, 'admin', 1, '2015-11-02 08:37:19', '2015-11-02 08:40:49', NULL);
INSERT INTO `we_account_history` VALUES(0000000119, 1, 0, 1, '3.00', 'account', 1, 'admin', 1, '2015-11-02 08:39:27', '2015-11-02 08:39:28', NULL);
INSERT INTO `we_account_history` VALUES(0000000120, 1, 0, 1, '10.00', 'account', 1, 'admin', 1, '2015-11-02 08:40:48', '2015-11-02 08:40:49', NULL);
INSERT INTO `we_account_history` VALUES(0000000121, 1, 0, 1, '5.00', 'account', 1, 'admin', 1, '2015-11-02 08:43:20', '2015-11-02 08:47:33', NULL);
INSERT INTO `we_account_history` VALUES(0000000122, 1, 0, 1, '5.00', 'account', 1, 'admin', 1, '2015-11-02 08:44:34', '2015-11-02 08:47:33', NULL);
INSERT INTO `we_account_history` VALUES(0000000123, 1, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-11-02 08:47:29', '2015-11-02 08:47:33', NULL);
INSERT INTO `we_account_history` VALUES(0000000124, 1, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-11-02 08:54:55', '2015-11-02 08:54:59', NULL);
INSERT INTO `we_account_history` VALUES(0000000125, 1, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-11-02 08:59:32', '2015-11-02 09:25:21', NULL);
INSERT INTO `we_account_history` VALUES(0000000126, 1, 0, 1, '1.00', 'account', 1, 'admin', 1, '2015-11-02 08:59:41', '2015-11-02 09:25:21', NULL);
INSERT INTO `we_account_history` VALUES(0000000127, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 09:21:20', '2015-11-02 09:25:22', NULL);
INSERT INTO `we_account_history` VALUES(0000000128, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 09:23:06', '2015-11-02 09:25:22', NULL);
INSERT INTO `we_account_history` VALUES(0000000129, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 09:23:17', '2015-11-02 09:25:22', NULL);
INSERT INTO `we_account_history` VALUES(0000000130, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 09:25:21', '2015-11-02 09:25:22', NULL);
INSERT INTO `we_account_history` VALUES(0000000131, 1, 0, 1, '10.00', 'account', 1, 'admin', 1, '2015-11-02 09:45:53', '2015-11-02 09:45:53', NULL);
INSERT INTO `we_account_history` VALUES(0000000132, 1, 0, 1, '10.00', 'account', 1, 'admin', 1, '2015-11-02 10:17:27', '2015-11-02 10:17:31', NULL);
INSERT INTO `we_account_history` VALUES(0000000133, 1, 0, 2, '600.00', 'cash', 0, NULL, 1, '2015-11-02 10:56:31', '2015-11-02 10:56:31', NULL);
INSERT INTO `we_account_history` VALUES(0000000134, 1, 0, 2, '400.00', 'cash', 0, NULL, 1, '2015-11-02 10:57:43', '2015-11-02 10:57:43', NULL);
INSERT INTO `we_account_history` VALUES(0000000135, 1, 0, 2, '600.00', 'cash', 0, NULL, 1, '2015-11-02 10:59:47', '2015-11-02 10:59:47', NULL);
INSERT INTO `we_account_history` VALUES(0000000136, 1, 0, 2, '600.00', 'cash', 0, NULL, 1, '2015-11-02 11:01:58', '2015-11-02 11:01:58', NULL);
INSERT INTO `we_account_history` VALUES(0000000137, 1, 0, 1, '3.00', 'account', 1, 'admin', 1, '2015-11-02 11:11:48', '2015-11-02 11:11:48', NULL);
INSERT INTO `we_account_history` VALUES(0000000138, 1, 0, 1, '5.00', 'account', 1, 'admin', 1, '2015-11-02 11:13:01', '2015-11-02 11:13:02', NULL);
INSERT INTO `we_account_history` VALUES(0000000139, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 11:14:25', '2015-11-03 02:04:09', NULL);
INSERT INTO `we_account_history` VALUES(0000000140, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 11:14:30', '2015-11-03 02:04:09', NULL);
INSERT INTO `we_account_history` VALUES(0000000141, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 11:14:57', '2015-11-03 02:04:10', NULL);
INSERT INTO `we_account_history` VALUES(0000000142, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 11:15:01', '2015-11-03 02:04:10', NULL);
INSERT INTO `we_account_history` VALUES(0000000143, 1, 0, 1, '100.00', 'account', 1, 'admin', 1, '2015-11-02 11:15:16', '2015-11-03 02:04:10', NULL);
INSERT INTO `we_account_history` VALUES(0000000144, 1, 516, 2, '2.00', 'other_account', 0, NULL, 1, '2015-11-02 11:44:21', '2015-11-02 11:44:21', NULL);
INSERT INTO `we_account_history` VALUES(0000000145, 1, 516, 2, '2.00', 'other_account', 0, NULL, 1, '2015-11-02 11:50:04', '2015-11-02 11:50:04', NULL);
INSERT INTO `we_account_history` VALUES(0000000146, 1, 516, 2, '2.00', 'other_account', 0, NULL, 1, '2015-11-02 11:50:30', '2015-11-02 11:50:30', NULL);
INSERT INTO `we_account_history` VALUES(0000000147, 1, 516, 2, '2.00', 'other_account', 0, NULL, 1, '2015-11-02 11:56:57', '2015-11-02 11:56:57', NULL);
INSERT INTO `we_account_history` VALUES(0000000148, 1, 520, 2, '20.00', 'other_account', 0, NULL, 1, '2015-11-03 01:22:34', '2015-11-03 01:22:34', NULL);
INSERT INTO `we_account_history` VALUES(0000000149, 1, 521, 2, '10.00', 'other_account', 0, NULL, 1, '2015-11-03 01:24:28', '2015-11-03 01:24:28', NULL);
INSERT INTO `we_account_history` VALUES(0000000150, 1, 521, 2, '10.00', 'account', 0, NULL, 1, '2015-11-03 01:24:28', '2015-11-03 01:47:51', NULL);
INSERT INTO `we_account_history` VALUES(0000000151, 1, 522, 2, '0.00', 'other_account', 0, NULL, 1, '2015-11-03 01:31:36', '2015-11-03 01:31:36', NULL);
INSERT INTO `we_account_history` VALUES(0000000152, 1, 522, 2, '20.00', 'account', 0, NULL, 1, '2015-11-03 01:31:36', '2015-11-03 01:47:51', NULL);
INSERT INTO `we_account_history` VALUES(0000000153, 1, 0, 1, '30.00', 'account', 1, 'admin', 1, '2015-11-03 02:04:09', '2015-11-03 02:04:10', NULL);
INSERT INTO `we_account_history` VALUES(0000000154, 1, 0, 1, '10.00', 'other_account', 1, 'admin', 1, '2015-11-03 02:04:09', '2015-11-03 02:04:09', NULL);
INSERT INTO `we_account_history` VALUES(0000000155, 1, 0, 1, '30.00', 'account', 1, 'admin', 1, '2015-11-03 02:06:12', '2015-11-03 02:06:12', NULL);
INSERT INTO `we_account_history` VALUES(0000000156, 1, 0, 1, '10.00', 'other_account', 1, 'admin', 1, '2015-11-03 02:06:12', '2015-11-03 02:06:12', NULL);
INSERT INTO `we_account_history` VALUES(0000000157, 1, 523, 2, '10.00', 'other_account', 0, NULL, 1, '2015-11-03 02:11:27', '2015-11-03 02:11:27', NULL);
INSERT INTO `we_account_history` VALUES(0000000158, 1, 523, 2, '10.00', 'account', 0, NULL, 1, '2015-11-03 02:11:27', '2015-11-03 02:42:03', NULL);
INSERT INTO `we_account_history` VALUES(0000000159, 1, 524, 2, '0.00', 'other_account', 0, NULL, 1, '2015-11-03 02:17:47', '2015-11-03 02:17:47', NULL);
INSERT INTO `we_account_history` VALUES(0000000160, 1, 524, 2, '20.00', 'account', 0, NULL, 1, '2015-11-03 02:17:47', '2015-11-03 02:42:03', NULL);
INSERT INTO `we_account_history` VALUES(0000000161, 1, 0, 1, '50.00', 'account', 1, 'admin', 1, '2015-11-03 02:20:12', '2015-11-03 02:20:12', NULL);
INSERT INTO `we_account_history` VALUES(0000000162, 1, 525, 2, '0.00', 'other_account', 0, NULL, 1, '2015-11-03 02:36:01', '2015-11-03 02:36:01', NULL);
INSERT INTO `we_account_history` VALUES(0000000163, 1, 525, 2, '20.00', 'account', 0, NULL, 1, '2015-11-03 02:36:01', '2015-11-03 02:42:03', NULL);
INSERT INTO `we_account_history` VALUES(0000000164, 1, 526, 2, '0.00', 'other_account', 0, NULL, 1, '2015-11-03 02:40:21', '2015-11-03 02:40:21', NULL);
INSERT INTO `we_account_history` VALUES(0000000165, 1, 526, 2, '20.00', 'account', 0, NULL, 1, '2015-11-03 02:40:21', '2015-11-03 02:42:03', NULL);
INSERT INTO `we_account_history` VALUES(0000000166, 1, 526, 2, '0.00', 'other_account', 0, NULL, 1, '2015-11-03 02:42:02', '2015-11-03 02:42:02', NULL);
INSERT INTO `we_account_history` VALUES(0000000167, 1, 526, 2, '20.00', 'account', 0, NULL, 1, '2015-11-03 02:42:02', '2015-11-03 02:42:03', NULL);
INSERT INTO `we_account_history` VALUES(0000000168, 1, 0, 1, '30.00', 'account', 1, 'admin', 1, '2015-11-03 02:42:48', '2015-11-03 02:42:49', NULL);
INSERT INTO `we_account_history` VALUES(0000000169, 1, 0, 1, '10.00', 'other_account', 1, 'admin', 1, '2015-11-03 02:42:48', '2015-11-03 02:42:48', NULL);
INSERT INTO `we_account_history` VALUES(0000000170, 1, 527, 2, '10.00', 'other_account', 0, NULL, 1, '2015-11-03 02:44:02', '2015-11-03 02:44:02', NULL);
INSERT INTO `we_account_history` VALUES(0000000171, 1, 527, 2, '10.00', 'account', 0, NULL, 1, '2015-11-03 02:44:02', '2015-11-03 02:44:03', NULL);

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

INSERT INTO `we_ad` VALUES(203, 131, '首页', '/data/uploads/1446705594_Chrysanthemum.jpg', 'http://www.dzy.com/admin/ad/add', '1', '1', '2015-11-06 06:55:08', '2015-11-05 06:39:54', '2015-11-06 06:55:08');
INSERT INTO `we_ad` VALUES(204, 135, '首页', '/data/uploads/1446705606_Penguins.jpg', 'http://www.dzy.com/admin/ad/add', '0', '1', '2015-11-06 06:55:05', '2015-11-05 06:40:07', '2015-11-06 06:55:05');
INSERT INTO `we_ad` VALUES(205, NULL, NULL, '/data/uploads/1446705619_Tulips.jpg', NULL, '1', '1', '2015-11-06 06:21:15', '2015-11-05 06:40:19', '2015-11-06 06:21:15');
INSERT INTO `we_ad` VALUES(206, NULL, NULL, '/data/uploads/1446706648_Lighthouse.jpg', NULL, '0', '1', '2015-11-06 06:21:11', '2015-11-05 06:56:49', '2015-11-06 06:21:11');
INSERT INTO `we_ad` VALUES(207, NULL, NULL, '/data/uploads/1446792887_1435219494_secondarytile.png', NULL, '0', '1', '2015-11-06 06:58:34', '2015-11-06 06:54:47', '2015-11-06 06:58:34');
INSERT INTO `we_ad` VALUES(208, NULL, NULL, '/data/uploads/1446792898_1435218496_secondarytile.png', NULL, '0', '1', '2015-11-06 06:58:32', '2015-11-06 06:54:58', '2015-11-06 06:58:32');
INSERT INTO `we_ad` VALUES(209, NULL, NULL, '/data/uploads/1447924887_Penguins.jpg', NULL, '0', '1', '2015-11-19 09:24:36', '2015-11-06 06:58:17', '2015-11-19 09:24:36');
INSERT INTO `we_ad` VALUES(210, NULL, NULL, '/data/uploads/1447924877_Desert.jpg', NULL, '0', '1', '2015-11-19 09:24:12', '2015-11-06 06:58:26', '2015-11-19 09:24:12');
INSERT INTO `we_ad` VALUES(211, NULL, NULL, '/data/uploads/1447924982_Hydrangeas.jpg', NULL, '0', '1', '2015-11-19 09:24:08', '2015-11-19 09:23:02', '2015-11-19 09:24:08');
INSERT INTO `we_ad` VALUES(212, NULL, NULL, '/data/uploads/1463396599_756117.png', NULL, '0', '1', NULL, '2015-11-19 09:25:47', '2016-05-16 11:03:19');
INSERT INTO `we_ad` VALUES(213, NULL, NULL, '/data/uploads/1447930322_Tulips.jpg', NULL, '10', '1', '2015-11-19 10:54:46', '2015-11-19 10:52:02', '2015-11-19 10:54:46');
INSERT INTO `we_ad` VALUES(214, NULL, NULL, '/data/uploads/1447930409_Chrysanthemum.jpg', NULL, '0', '1', '2015-11-19 10:54:39', '2015-11-19 10:53:29', '2015-11-19 10:54:39');
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
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '出勤状态（0：未出勤；1：已出勤；2：迟到）',
  `attendance_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '实际出勤时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`attendance_id`),
  KEY `phone` (`phone`),
  KEY `attendance_date` (`attendance_date`)
) ENGINE=InnoDB AUTO_INCREMENT=586 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_attendance`
--

TRUNCATE TABLE `we_attendance`;
--
-- 转存表中的数据 `we_attendance`
--

INSERT INTO `we_attendance` VALUES(583, '18622185062', 20150101, 0, '0000-00-00 00:00:00', '2016-05-12 08:05:22', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_attendance` VALUES(584, '18622185062', 20160102, 0, '0000-00-00 00:00:00', '2016-05-12 08:05:49', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_attendance` VALUES(585, '18622185062', 20150101, 0, '0000-00-00 00:00:00', '2016-05-12 08:05:22', '0000-00-00 00:00:00', NULL);

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
--
-- 转存表中的数据 `we_booking`
--

INSERT INTO `we_booking` VALUES(82, 'room', 116, '0', '0.00', '', 0, NULL, 'A1', '2015-09-21 02:50:11', '2015-09-15 11:12:32', NULL, 0, '2015-09-07 03:27:53', '2015-09-07 03:27:53', NULL);
INSERT INTO `we_booking` VALUES(83, 'room', 3, '0', '0.00', '', 0, NULL, 'A1', '2015-09-14 06:45:29', '2015-12-02 11:12:32', NULL, 0, '2015-09-07 03:29:48', '2015-09-07 03:29:48', NULL);
INSERT INTO `we_booking` VALUES(84, 'room', 4, '0', '0.00', '', 0, NULL, 'A1', '2015-09-18 07:33:51', '2015-12-02 11:12:32', NULL, 0, '2015-09-07 03:30:25', '2015-09-07 03:30:25', NULL);
INSERT INTO `we_booking` VALUES(85, 'room', 90, '0', '0.00', '', 0, NULL, 'A1', '2015-09-18 07:35:46', '2015-12-02 11:12:32', NULL, 0, '2015-09-07 03:30:28', '2015-09-07 03:30:28', NULL);
INSERT INTO `we_booking` VALUES(86, 'room', 91, '0', '0.00', '', 0, NULL, 'A1', '2015-09-18 07:35:49', '2015-12-06 11:12:33', NULL, 0, '2015-09-07 04:07:09', '2015-09-07 04:07:09', NULL);
INSERT INTO `we_booking` VALUES(87, 'room', 92, '0', '0.00', '', 0, NULL, 'A1', '2015-09-18 07:35:54', '2016-12-02 11:12:32', NULL, 0, '2015-09-14 01:34:19', '2015-09-14 01:34:19', NULL);
INSERT INTO `we_booking` VALUES(88, 'room', 116, '0', '0.00', '', 0, NULL, 'A1', '2015-09-22 05:22:42', '2016-12-02 11:12:32', NULL, 64, '2015-09-14 01:43:34', '2015-09-14 01:43:34', NULL);
INSERT INTO `we_booking` VALUES(89, 'room', 116, '0', '0.00', '', 0, NULL, 'A1', '2015-09-22 05:22:35', '2016-12-02 11:12:32', 1, 64, '2015-09-14 01:50:31', '2015-09-14 01:50:31', NULL);
INSERT INTO `we_booking` VALUES(90, 'room', 116, '0', '0.00', '', 0, NULL, 'A1', '2015-09-22 05:22:29', '2016-12-02 11:12:32', 1, 64, '2015-09-14 01:52:17', '2015-09-14 01:52:17', NULL);
INSERT INTO `we_booking` VALUES(91, 'room', 35, '0', '0.00', '', 0, NULL, 'A1', '2015-09-17 03:38:41', '2016-12-02 11:12:32', 1, 0, '2015-09-14 01:52:23', '2015-09-14 01:52:23', NULL);
INSERT INTO `we_booking` VALUES(92, 'room', 35, '0', '0.00', '', 0, NULL, 'A1', '2015-09-17 03:38:44', '2016-12-02 11:12:32', 1, 0, '2015-09-14 01:52:26', '2015-09-14 01:52:26', NULL);
INSERT INTO `we_booking` VALUES(93, 'room', 130, '0', '0.00', '', 0, NULL, 'A1', '2015-09-14 06:45:35', '2015-09-13 16:00:00', NULL, 0, '2015-09-14 05:36:58', '2015-09-14 05:36:58', NULL);
INSERT INTO `we_booking` VALUES(95, 'room', 134, '0', '0.00', '', 0, NULL, 'A1', '2015-09-14 06:45:36', '2015-09-12 11:12:32', NULL, 0, '2015-09-14 06:10:50', '2015-09-14 06:10:50', NULL);
INSERT INTO `we_booking` VALUES(96, 'room', 34, '0', '0.00', '', 0, NULL, '', '2015-09-18 07:32:16', '2015-07-15 01:16:40', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_booking` VALUES(98, 'seat', 35, '0', '0.00', '', 0, NULL, '', '2015-09-17 03:38:47', '2015-10-15 02:19:02', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_booking` VALUES(99, 'seat', 34, '0', '0.00', '', 0, NULL, '', '2015-09-16 03:37:38', '2015-09-30 02:31:30', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_booking` VALUES(100, 'seat', 37, '0', '0.00', '', 0, NULL, '', '2016-04-01 05:00:49', '2016-07-01 05:01:05', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_booking` VALUES(101, 'room', 1, '0', '0.00', '', 0, NULL, '', '2015-09-17 05:28:52', '2015-09-18 05:29:05', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_booking` VALUES(102, 'room', 136, '0', '0.00', '', 0, NULL, '', '2015-11-11 16:00:00', '2016-01-05 16:00:00', 1, 0, '2015-09-17 05:34:45', '2015-09-17 05:34:45', NULL);
INSERT INTO `we_booking` VALUES(103, 'room', 136, '0', '0.00', '', 0, NULL, '', '2015-09-17 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-17 05:41:48', '2015-09-17 05:41:48', NULL);
INSERT INTO `we_booking` VALUES(131, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-09-22 05:26:38', '2016-01-01 16:00:00', 82, 82, '2015-09-17 07:06:43', '2015-09-17 07:06:43', NULL);
INSERT INTO `we_booking` VALUES(132, 'seat', 35, '0', '0.00', '', 0, NULL, 'C1', '2015-09-22 05:26:40', '2016-01-01 16:00:00', 82, 82, '2015-09-17 07:06:43', '2015-09-17 07:06:43', NULL);
INSERT INTO `we_booking` VALUES(133, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-09-22 05:26:43', '2016-12-11 16:00:00', 82, 82, '2015-09-17 07:07:18', '2015-09-17 07:07:18', NULL);
INSERT INTO `we_booking` VALUES(134, 'seat', 35, '0', '0.00', '', 0, NULL, 'C1', '2015-09-22 05:26:07', '2016-12-11 16:00:00', 82, 0, '2015-09-17 07:07:18', '2015-09-17 07:07:18', NULL);
INSERT INTO `we_booking` VALUES(135, 'room', 136, '0', '0.00', '', 0, NULL, '', '2015-09-17 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-17 07:28:43', '2015-09-17 07:28:43', NULL);
INSERT INTO `we_booking` VALUES(136, 'room', 136, '0', '0.00', '', 0, NULL, '', '2015-09-17 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-17 07:29:19', '2015-09-17 07:29:19', NULL);
INSERT INTO `we_booking` VALUES(137, 'room', 136, '0', '0.00', '', 0, NULL, '', '2015-09-17 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-17 07:29:56', '2015-09-17 07:29:56', NULL);
INSERT INTO `we_booking` VALUES(138, 'room', 136, '0', '0.00', '', 0, NULL, '', '2015-09-17 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-17 07:31:13', '2015-09-17 07:31:13', NULL);
INSERT INTO `we_booking` VALUES(139, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2015-09-16 16:00:00', '2016-09-16 16:00:00', NULL, 0, '2015-09-17 07:33:54', '2015-09-17 07:33:54', NULL);
INSERT INTO `we_booking` VALUES(140, 'seat', 49, '0', '0.00', '', 0, NULL, 'weqwe', '2015-09-16 16:00:00', '2016-09-16 16:00:00', NULL, 0, '2015-09-17 07:33:54', '2015-09-17 07:33:54', NULL);
INSERT INTO `we_booking` VALUES(141, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2015-08-23 16:00:00', '2015-08-25 16:00:00', NULL, 0, '2015-09-17 07:37:56', '2015-09-17 07:37:56', NULL);
INSERT INTO `we_booking` VALUES(142, 'seat', 49, '0', '0.00', '', 0, NULL, 'weqwe', '2015-08-23 16:00:00', '2015-08-25 16:00:00', NULL, 0, '2015-09-17 07:37:56', '2015-09-17 07:37:56', NULL);
INSERT INTO `we_booking` VALUES(143, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2015-08-23 16:00:00', '2015-08-25 16:00:00', NULL, 0, '2015-09-17 07:37:57', '2015-09-17 07:37:57', NULL);
INSERT INTO `we_booking` VALUES(144, 'seat', 49, '0', '0.00', '', 0, NULL, 'weqwe', '2015-08-23 16:00:00', '2015-08-25 16:00:00', NULL, 0, '2015-09-17 07:37:57', '2015-09-17 07:37:57', NULL);
INSERT INTO `we_booking` VALUES(145, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2015-08-23 16:00:00', '2015-08-25 16:00:00', NULL, 0, '2015-09-17 07:38:00', '2015-09-17 07:38:00', NULL);
INSERT INTO `we_booking` VALUES(146, 'seat', 49, '0', '0.00', '', 0, NULL, 'weqwe', '2015-08-23 16:00:00', '2015-08-25 16:00:00', NULL, 0, '2015-09-17 07:38:00', '2015-09-17 07:38:00', NULL);
INSERT INTO `we_booking` VALUES(147, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2016-12-31 16:00:00', '2017-10-09 16:00:00', NULL, 0, '2015-09-17 07:38:13', '2015-09-17 07:38:13', NULL);
INSERT INTO `we_booking` VALUES(148, 'seat', 49, '0', '0.00', '', 0, NULL, 'weqwe', '2016-12-31 16:00:00', '2017-10-09 16:00:00', NULL, 0, '2015-09-17 07:38:13', '2015-09-17 07:38:13', NULL);
INSERT INTO `we_booking` VALUES(149, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2016-12-31 16:00:00', '2017-10-09 16:00:00', NULL, 0, '2015-09-17 07:40:04', '2015-09-17 07:40:04', NULL);
INSERT INTO `we_booking` VALUES(150, 'seat', 49, '0', '0.00', '', 0, NULL, 'weqwe', '2016-12-31 16:00:00', '2017-10-09 16:00:00', NULL, 0, '2015-09-17 07:40:04', '2015-09-17 07:40:04', NULL);
INSERT INTO `we_booking` VALUES(151, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2015-08-23 16:00:00', '2015-08-25 16:00:00', NULL, 0, '2015-09-17 07:42:07', '2015-09-17 07:42:07', NULL);
INSERT INTO `we_booking` VALUES(152, 'seat', 49, '0', '0.00', '', 0, NULL, 'weqwe', '2015-08-23 16:00:00', '2015-08-25 16:00:00', NULL, 0, '2015-09-17 07:42:07', '2015-09-17 07:42:07', NULL);
INSERT INTO `we_booking` VALUES(153, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-09-21 05:27:53', '2015-11-27 16:00:00', NULL, 84, '2015-09-17 08:00:47', '2015-09-17 08:00:47', NULL);
INSERT INTO `we_booking` VALUES(154, 'seat', 39, '0', '0.00', '', 0, NULL, 'B2', '2015-09-21 06:59:31', '2015-11-27 16:00:00', NULL, 0, '2015-09-23 08:00:47', '2015-09-17 08:00:47', NULL);
INSERT INTO `we_booking` VALUES(155, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2019-09-03 16:00:00', '2021-11-17 16:00:00', NULL, 0, '2015-09-17 08:21:46', '2015-09-17 08:21:46', NULL);
INSERT INTO `we_booking` VALUES(156, 'seat', 48, '0', '0.00', '', 0, NULL, '12313', '2016-09-29 16:00:00', '2017-09-29 16:00:00', NULL, 0, '2015-09-17 08:40:15', '2015-09-17 08:40:15', NULL);
INSERT INTO `we_booking` VALUES(157, 'seat', 49, '0', '0.00', '', 0, NULL, 'weqwe', '2016-09-29 16:00:00', '2017-09-29 16:00:00', NULL, 0, '2015-09-17 08:40:15', '2015-09-17 08:40:15', NULL);
INSERT INTO `we_booking` VALUES(158, 'room', 116, '0', '0.00', '', 0, NULL, '', '2015-09-18 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-18 05:52:21', '2015-09-18 05:52:21', NULL);
INSERT INTO `we_booking` VALUES(159, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-09-18 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-18 05:52:53', '2015-09-18 05:52:53', NULL);
INSERT INTO `we_booking` VALUES(160, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-09-18 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-18 06:03:03', '2015-09-18 06:03:03', NULL);
INSERT INTO `we_booking` VALUES(161, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-09-18 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-18 06:06:25', '2015-09-18 06:06:25', NULL);
INSERT INTO `we_booking` VALUES(162, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-09-21 03:25:55', '2015-09-24 16:00:00', 1, 25, '2015-09-18 06:15:34', '2015-09-18 06:15:34', NULL);
INSERT INTO `we_booking` VALUES(163, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-30 06:59:25', '2015-10-27 16:00:00', 1, 25, '2015-09-18 06:16:54', '2015-09-18 06:16:54', NULL);
INSERT INTO `we_booking` VALUES(164, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 06:23:00', '2015-09-23 16:00:00', 1, 30, '2015-09-18 06:17:42', '2015-09-18 06:17:42', NULL);
INSERT INTO `we_booking` VALUES(165, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-09-18 16:00:00', '2015-09-19 16:00:00', 1, 0, '2015-09-18 06:18:12', '2015-09-18 06:18:12', NULL);
INSERT INTO `we_booking` VALUES(166, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 03:27:11', '2015-09-28 03:27:01', 1, 93, '2015-09-21 03:41:32', '2015-09-21 03:41:32', NULL);
INSERT INTO `we_booking` VALUES(167, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 03:27:11', '2015-09-28 03:27:01', 1, 94, '2015-09-21 03:42:06', '2015-09-21 03:42:06', NULL);
INSERT INTO `we_booking` VALUES(168, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 03:27:11', '2015-09-28 03:27:01', 1, 95, '2015-09-21 03:42:09', '2015-09-21 03:42:09', NULL);
INSERT INTO `we_booking` VALUES(169, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 03:27:11', '2015-09-28 03:27:01', 1, 96, '2015-09-21 03:42:11', '2015-09-21 03:42:11', NULL);
INSERT INTO `we_booking` VALUES(170, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 03:27:11', '2015-09-28 03:27:01', 1, 97, '2015-09-21 03:42:58', '2015-09-21 03:42:58', NULL);
INSERT INTO `we_booking` VALUES(171, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 03:27:11', '2015-09-28 03:27:01', 1, 98, '2015-09-21 05:06:52', '2015-09-21 05:06:52', NULL);
INSERT INTO `we_booking` VALUES(172, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-23 01:11:16', '2015-09-24 11:17:29', 1, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_booking` VALUES(173, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 07:50:00', '2015-09-23 16:00:00', NULL, 99, '2015-09-22 06:47:58', '2015-09-22 06:47:58', NULL);
INSERT INTO `we_booking` VALUES(174, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-23 06:23:00', '2015-09-23 16:00:00', NULL, 99, '2015-09-22 06:47:58', '2015-09-22 06:47:58', NULL);
INSERT INTO `we_booking` VALUES(175, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-22 07:50:00', '2015-09-23 16:00:00', NULL, 100, '2015-09-22 07:34:16', '2015-09-22 07:34:16', NULL);
INSERT INTO `we_booking` VALUES(176, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-23 06:23:00', '2015-09-23 16:00:00', NULL, 100, '2015-09-22 07:34:16', '2015-09-22 07:34:16', NULL);
INSERT INTO `we_booking` VALUES(177, 'seat', 40, '0', '0.00', '', 0, NULL, '1111', '2015-09-29 16:00:00', '2015-10-28 16:00:00', NULL, 101, '2015-09-22 08:14:11', '2015-09-22 08:14:11', NULL);
INSERT INTO `we_booking` VALUES(178, 'seat', 37, '0', '0.00', '', 0, NULL, 'cxs', '2015-11-17 16:00:00', '2015-12-16 16:00:00', NULL, 102, '2015-09-22 08:15:58', '2015-09-22 08:15:58', NULL);
INSERT INTO `we_booking` VALUES(179, 'seat', 38, '0', '0.00', '', 0, NULL, 'QQQ', '2015-11-17 16:00:00', '2015-12-16 16:00:00', NULL, 102, '2015-09-22 08:15:58', '2015-09-22 08:15:58', NULL);
INSERT INTO `we_booking` VALUES(180, 'seat', 40, '0', '0.00', '', 0, NULL, '1111', '2015-11-17 16:00:00', '2015-12-16 16:00:00', NULL, 102, '2015-09-22 08:15:58', '2015-09-22 08:15:58', NULL);
INSERT INTO `we_booking` VALUES(181, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-09-28 16:00:00', '2015-09-29 16:00:00', NULL, 103, '2015-09-22 08:19:15', '2015-09-22 08:19:15', NULL);
INSERT INTO `we_booking` VALUES(182, 'seat', 37, '0', '0.00', '', 0, NULL, 'cxs', '2015-09-28 16:00:00', '2015-09-29 16:00:00', NULL, 103, '2015-09-22 08:19:15', '2015-09-22 08:19:15', NULL);
INSERT INTO `we_booking` VALUES(183, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-09-28 16:00:00', '2015-09-29 16:00:00', NULL, 104, '2015-09-22 08:21:57', '2015-09-22 08:21:57', NULL);
INSERT INTO `we_booking` VALUES(184, 'seat', 37, '0', '0.00', '', 0, NULL, 'cxs', '2015-09-28 16:00:00', '2015-09-29 16:00:00', NULL, 104, '2015-09-22 08:21:57', '2015-09-22 08:21:57', NULL);
INSERT INTO `we_booking` VALUES(185, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-09-28 16:00:00', '2015-09-29 16:00:00', NULL, 105, '2015-09-22 08:22:55', '2015-09-22 08:22:55', NULL);
INSERT INTO `we_booking` VALUES(186, 'seat', 37, '0', '0.00', '', 0, NULL, 'cxs', '2015-09-28 16:00:00', '2015-09-29 16:00:00', NULL, 105, '2015-09-22 08:22:55', '2015-09-22 08:22:55', NULL);
INSERT INTO `we_booking` VALUES(187, 'seat', 37, '0', '0.00', '', 0, NULL, 'cxs', '2016-02-10 16:00:00', '2016-05-11 16:00:00', NULL, 106, '2015-09-22 08:24:43', '2015-09-22 08:24:43', NULL);
INSERT INTO `we_booking` VALUES(188, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2016-06-14 16:00:00', '2016-09-25 16:00:00', NULL, 107, '2015-09-22 08:54:07', '2015-09-22 08:54:07', NULL);
INSERT INTO `we_booking` VALUES(189, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-28 06:39:49', '2015-09-28 16:00:00', NULL, 108, '2015-09-22 09:33:43', '2015-09-22 09:33:43', NULL);
INSERT INTO `we_booking` VALUES(190, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-28 06:38:51', '2015-09-29 16:00:00', NULL, 108, '2015-09-22 09:33:43', '2015-09-22 09:33:43', NULL);
INSERT INTO `we_booking` VALUES(191, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-25 07:30:00', '2015-09-26 08:00:00', NULL, 109, '2015-09-22 09:35:13', '2015-09-22 09:35:13', NULL);
INSERT INTO `we_booking` VALUES(192, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-25 04:00:00', '2015-09-25 04:30:00', NULL, 109, '2015-09-22 09:35:13', '2015-09-22 09:35:13', NULL);
INSERT INTO `we_booking` VALUES(193, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-09-29 16:00:00', '2015-10-27 16:00:00', NULL, 110, '2015-09-24 01:21:38', '2015-09-24 01:21:38', NULL);
INSERT INTO `we_booking` VALUES(194, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-09-29 16:00:00', '2015-10-05 16:00:00', NULL, 111, '2015-09-24 02:12:23', '2015-09-24 02:12:23', NULL);
INSERT INTO `we_booking` VALUES(195, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2020-09-29 16:00:00', '2021-11-27 16:00:00', NULL, 112, '2015-09-24 02:22:09', '2015-09-24 02:22:09', NULL);
INSERT INTO `we_booking` VALUES(196, 'seat', 56, '0', '0.00', '', 0, NULL, '商品', '2015-09-28 16:00:00', '2015-10-05 16:00:00', NULL, 113, '2015-09-24 03:28:54', '2015-09-24 03:28:54', NULL);
INSERT INTO `we_booking` VALUES(197, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-10-01 16:00:00', '2015-10-31 16:00:00', NULL, 114, '2015-09-24 06:24:31', '2015-09-24 06:24:31', NULL);
INSERT INTO `we_booking` VALUES(198, 'seat', 52, '0', '0.00', '', 0, NULL, '红色', '2015-09-29 16:00:00', '2016-02-26 16:00:00', NULL, 115, '2015-09-25 03:12:27', '2015-09-25 03:12:27', NULL);
INSERT INTO `we_booking` VALUES(199, 'seat', 55, '0', '0.00', '', 0, NULL, '娱乐', '2015-09-29 16:00:00', '2016-02-26 16:00:00', NULL, 116, '2015-09-25 03:14:50', '2015-09-25 03:14:50', NULL);
INSERT INTO `we_booking` VALUES(200, 'seat', 50, '0', '0.00', '', 0, NULL, '一栋', '2015-09-27 16:00:00', '2015-10-27 16:00:00', NULL, 117, '2015-09-25 03:18:25', '2015-09-25 03:18:25', NULL);
INSERT INTO `we_booking` VALUES(201, 'seat', 58, '0', '0.00', '', 0, NULL, '1111111', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 118, '2015-09-25 06:00:17', '2015-09-25 06:00:17', NULL);
INSERT INTO `we_booking` VALUES(202, 'seat', 51, '0', '0.00', '', 0, NULL, '二栋', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 119, '2015-09-25 06:02:00', '2015-09-25 06:02:00', NULL);
INSERT INTO `we_booking` VALUES(203, 'seat', 52, '0', '0.00', '', 0, NULL, '红色', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 119, '2015-09-25 06:02:00', '2015-09-25 06:02:00', NULL);
INSERT INTO `we_booking` VALUES(204, 'seat', 54, '0', '0.00', '', 0, NULL, '办公', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 119, '2015-09-25 06:02:00', '2015-09-25 06:02:00', NULL);
INSERT INTO `we_booking` VALUES(205, 'seat', 56, '0', '0.00', '', 0, NULL, '商品', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 119, '2015-09-25 06:02:00', '2015-09-25 06:02:00', NULL);
INSERT INTO `we_booking` VALUES(206, 'seat', 57, '0', '0.00', '', 0, NULL, '栏2', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 119, '2015-09-25 06:02:00', '2015-09-25 06:02:00', NULL);
INSERT INTO `we_booking` VALUES(207, 'seat', 40, '0', '0.00', '', 0, NULL, '1111', '2015-09-27 16:00:00', '2015-10-27 16:00:00', NULL, 120, '2015-09-25 06:06:05', '2015-09-25 06:06:05', NULL);
INSERT INTO `we_booking` VALUES(208, 'seat', 50, '0', '0.00', '', 0, NULL, '一栋', '2015-09-27 16:00:00', '2015-10-27 16:00:00', NULL, 120, '2015-09-25 06:06:05', '2015-09-25 06:06:05', NULL);
INSERT INTO `we_booking` VALUES(209, 'seat', 51, '0', '0.00', '', 0, NULL, '二栋', '2015-09-27 16:00:00', '2015-10-27 16:00:00', NULL, 120, '2015-09-25 06:06:05', '2015-09-25 06:06:05', NULL);
INSERT INTO `we_booking` VALUES(210, 'seat', 54, '0', '0.00', '', 0, NULL, '办公', '2015-09-29 16:00:00', '2015-10-29 16:00:00', NULL, 121, '2015-09-25 06:06:39', '2015-09-25 06:06:39', NULL);
INSERT INTO `we_booking` VALUES(211, 'seat', 50, '0', '0.00', '', 0, NULL, '一栋', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 122, '2015-09-25 06:58:32', '2015-09-25 06:58:32', NULL);
INSERT INTO `we_booking` VALUES(212, 'seat', 51, '0', '0.00', '', 0, NULL, '二栋', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 122, '2015-09-25 06:58:32', '2015-09-25 06:58:32', NULL);
INSERT INTO `we_booking` VALUES(213, 'seat', 52, '0', '0.00', '', 0, NULL, '红色', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 122, '2015-09-25 06:58:32', '2015-09-25 06:58:32', NULL);
INSERT INTO `we_booking` VALUES(214, 'seat', 53, '0', '0.00', '', 0, NULL, '学习', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 122, '2015-09-25 06:58:32', '2015-09-25 06:58:32', NULL);
INSERT INTO `we_booking` VALUES(215, 'seat', 54, '0', '0.00', '', 0, NULL, '办公', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 122, '2015-09-25 06:58:32', '2015-09-25 06:58:32', NULL);
INSERT INTO `we_booking` VALUES(216, 'seat', 50, '0', '0.00', '', 0, NULL, '一栋', '2015-09-28 16:00:00', '2015-10-28 16:00:00', NULL, 123, '2015-09-25 06:59:49', '2015-09-25 06:59:49', NULL);
INSERT INTO `we_booking` VALUES(217, 'seat', 51, '0', '0.00', '', 0, NULL, '二栋', '2015-09-28 16:00:00', '2015-10-28 16:00:00', NULL, 123, '2015-09-25 06:59:49', '2015-09-25 06:59:49', NULL);
INSERT INTO `we_booking` VALUES(218, 'seat', 50, '0', '0.00', '', 0, NULL, '一栋', '2015-09-28 16:00:00', '2015-10-28 16:00:00', NULL, 124, '2015-09-25 07:04:06', '2015-09-25 07:04:06', NULL);
INSERT INTO `we_booking` VALUES(219, 'seat', 51, '0', '0.00', '', 0, NULL, '二栋', '2015-09-28 16:00:00', '2015-10-28 16:00:00', NULL, 124, '2015-09-25 07:04:06', '2015-09-25 07:04:06', NULL);
INSERT INTO `we_booking` VALUES(220, 'seat', 50, '0', '0.00', '', 0, NULL, '一栋', '2015-09-28 16:00:00', '2015-10-28 16:00:00', NULL, 125, '2015-09-25 07:14:40', '2015-09-25 07:14:40', NULL);
INSERT INTO `we_booking` VALUES(221, 'seat', 51, '0', '0.00', '', 0, NULL, '二栋', '2015-09-28 16:00:00', '2015-10-28 16:00:00', NULL, 125, '2015-09-25 07:14:40', '2015-09-25 07:14:40', NULL);
INSERT INTO `we_booking` VALUES(222, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-25 09:50:00', '2015-09-25 16:00:00', NULL, 126, '2015-09-25 08:43:50', '2015-09-25 08:43:50', NULL);
INSERT INTO `we_booking` VALUES(223, 'room', 131, '0', '0.00', '', 0, NULL, '', '2015-09-26 06:23:00', '2015-09-26 16:00:00', NULL, 126, '2015-09-25 08:43:50', '2015-09-25 08:43:50', NULL);
INSERT INTO `we_booking` VALUES(224, 'seat', 58, '0', '0.00', '', 0, NULL, '1111111', '2015-09-28 16:00:00', '2015-11-27 16:00:00', NULL, 127, '2015-09-28 08:04:33', '2015-09-28 08:04:33', NULL);
INSERT INTO `we_booking` VALUES(225, 'seat', 59, '0', '0.00', '', 0, NULL, 'asdad', '2015-09-28 16:00:00', '2015-11-27 16:00:00', NULL, 127, '2015-09-28 08:04:33', '2015-09-28 08:04:33', NULL);
INSERT INTO `we_booking` VALUES(226, 'seat', 57, '0', '0.00', '', 0, NULL, '栏2', '2015-09-29 16:00:00', '2015-11-28 16:00:00', NULL, 128, '2015-09-28 08:05:44', '2015-09-28 08:05:44', NULL);
INSERT INTO `we_booking` VALUES(227, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-10 06:00:00', '2015-10-10 06:30:00', 1, 129, '2015-10-07 06:21:22', '2015-10-07 06:21:22', NULL);
INSERT INTO `we_booking` VALUES(228, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-10 06:30:00', '2015-10-10 07:00:00', 1, 129, '2015-10-07 06:21:22', '2015-10-07 06:21:22', NULL);
INSERT INTO `we_booking` VALUES(229, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-10 07:00:00', '2015-10-10 07:30:00', 1, 130, '2015-10-07 06:24:17', '2015-10-07 06:24:17', NULL);
INSERT INTO `we_booking` VALUES(230, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-10 10:30:00', '2015-10-10 11:00:00', 1, 130, '2015-10-07 06:24:17', '2015-10-07 06:24:17', NULL);
INSERT INTO `we_booking` VALUES(231, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-11 07:00:00', '2015-10-11 07:30:00', 1, 131, '2015-10-07 08:24:07', '2015-10-07 08:24:07', NULL);
INSERT INTO `we_booking` VALUES(232, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-11 10:30:00', '2015-10-11 11:00:00', 1, 131, '2015-10-07 08:24:07', '2015-10-07 08:24:07', NULL);
INSERT INTO `we_booking` VALUES(233, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-11 07:00:00', '2015-10-11 07:30:00', 1, 132, '2015-10-07 08:54:01', '2015-10-07 08:54:01', NULL);
INSERT INTO `we_booking` VALUES(234, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-11 10:30:00', '2015-10-11 11:00:00', 1, 132, '2015-10-07 08:54:01', '2015-10-07 08:54:01', NULL);
INSERT INTO `we_booking` VALUES(235, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-12 07:00:00', '2015-10-12 07:30:00', 1, 133, '2015-10-07 09:03:04', '2015-10-07 09:03:04', NULL);
INSERT INTO `we_booking` VALUES(236, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 07:00:00', '2015-10-13 07:30:00', 1, 134, '2015-10-07 09:17:24', '2015-10-07 09:17:24', NULL);
INSERT INTO `we_booking` VALUES(237, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 02:00:00', '2015-10-25 02:30:00', 1, 135, '2015-10-08 02:01:08', '2015-10-08 02:01:08', NULL);
INSERT INTO `we_booking` VALUES(238, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 06:30:00', '2015-10-25 07:00:00', 1, 135, '2015-10-08 02:01:08', '2015-10-08 02:01:08', NULL);
INSERT INTO `we_booking` VALUES(239, 'seat', 53, '0', '0.00', '', 0, NULL, '学习', '2015-10-08 16:00:00', '2015-11-07 16:00:00', NULL, 136, '2015-10-08 02:19:16', '2015-10-08 02:19:16', NULL);
INSERT INTO `we_booking` VALUES(240, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 02:00:00', '2015-10-25 02:30:00', 1, 137, '2015-10-08 02:28:51', '2015-10-08 02:28:51', NULL);
INSERT INTO `we_booking` VALUES(241, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 06:30:00', '2015-10-25 07:00:00', 1, 137, '2015-10-08 02:28:51', '2015-10-08 02:28:51', NULL);
INSERT INTO `we_booking` VALUES(242, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 02:00:00', '2015-10-25 02:30:00', 1, 138, '2015-10-08 02:45:08', '2015-10-08 02:45:08', NULL);
INSERT INTO `we_booking` VALUES(243, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 06:30:00', '2015-10-25 07:00:00', 1, 138, '2015-10-08 02:45:08', '2015-10-08 02:45:08', NULL);
INSERT INTO `we_booking` VALUES(244, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 02:00:00', '2015-10-25 02:30:00', 1, 139, '2015-10-08 03:08:12', '2015-10-08 03:08:12', NULL);
INSERT INTO `we_booking` VALUES(245, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 06:30:00', '2015-10-25 07:00:00', 1, 139, '2015-10-08 03:08:12', '2015-10-08 03:08:12', NULL);
INSERT INTO `we_booking` VALUES(246, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-08 06:00:00', '2015-10-08 06:30:00', 1, 140, '2015-10-08 03:20:35', '2015-10-08 03:20:35', NULL);
INSERT INTO `we_booking` VALUES(247, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 06:30:00', '2015-10-25 07:00:00', 1, 140, '2015-10-08 03:20:35', '2015-10-08 03:20:35', NULL);
INSERT INTO `we_booking` VALUES(248, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-08 06:00:00', '2015-10-08 06:30:00', 1, 141, '2015-10-08 03:22:43', '2015-10-08 03:22:43', NULL);
INSERT INTO `we_booking` VALUES(249, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-08 06:30:00', '2015-10-08 07:00:00', 1, 142, '2015-10-08 03:24:30', '2015-10-08 03:24:30', NULL);
INSERT INTO `we_booking` VALUES(250, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-08 07:00:00', '2015-10-08 07:30:00', 1, 143, '2015-10-08 03:30:43', '2015-10-08 03:30:43', NULL);
INSERT INTO `we_booking` VALUES(251, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 09:00:00', '2015-10-25 09:30:00', 1, 144, '2015-10-08 04:06:15', '2015-10-08 04:06:15', NULL);
INSERT INTO `we_booking` VALUES(252, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-25 09:30:00', '2015-10-25 10:00:00', 1, 144, '2015-10-08 04:06:15', '2015-10-08 04:06:15', NULL);
INSERT INTO `we_booking` VALUES(253, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-08 06:00:00', '2015-10-08 06:30:00', 1, 145, '2015-10-08 05:39:28', '2015-10-08 05:39:28', NULL);
INSERT INTO `we_booking` VALUES(254, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-08 16:00:00', '2015-10-08 16:30:00', 1, 146, '2015-10-08 06:40:48', '2015-10-08 06:40:48', NULL);
INSERT INTO `we_booking` VALUES(255, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-11-11 16:00:00', '2015-11-11 16:30:00', 1, 148, '2015-10-09 09:07:43', '2015-10-09 09:07:43', NULL);
INSERT INTO `we_booking` VALUES(256, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-17 16:00:00', '2015-10-17 16:30:00', 1, 149, '2015-10-09 09:14:00', '2015-10-09 09:14:00', NULL);
INSERT INTO `we_booking` VALUES(257, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-17 17:00:00', '2015-10-17 17:30:00', 1, 149, '2015-10-09 09:14:00', '2015-10-09 09:14:00', NULL);
INSERT INTO `we_booking` VALUES(258, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-17 16:00:00', '2015-10-17 16:30:00', 1, 150, '2015-10-09 09:36:57', '2015-10-09 09:36:57', NULL);
INSERT INTO `we_booking` VALUES(259, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-17 17:00:00', '2015-10-17 17:30:00', 1, 150, '2015-10-09 09:36:57', '2015-10-09 09:36:57', NULL);
INSERT INTO `we_booking` VALUES(260, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-09 16:00:00', '2015-10-09 16:30:00', 1, 151, '2015-10-09 09:43:26', '2015-10-09 09:43:26', NULL);
INSERT INTO `we_booking` VALUES(261, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-09 16:00:00', '2015-10-09 16:30:00', 1, 152, '2015-10-09 10:58:48', '2015-10-09 10:58:48', NULL);
INSERT INTO `we_booking` VALUES(262, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-09 17:00:00', '2015-10-09 17:30:00', 1, 152, '2015-10-09 10:58:48', '2015-10-09 10:58:48', NULL);
INSERT INTO `we_booking` VALUES(263, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-22 16:00:00', '2015-10-22 16:30:00', 1, 153, '2015-10-09 11:09:37', '2015-10-09 11:09:37', NULL);
INSERT INTO `we_booking` VALUES(264, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-22 17:00:00', '2015-10-22 17:30:00', 1, 153, '2015-10-09 11:09:37', '2015-10-09 11:09:37', NULL);
INSERT INTO `we_booking` VALUES(265, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-09 16:00:00', '2015-10-09 16:30:00', 1, 154, '2015-10-09 11:09:59', '2015-10-09 11:09:59', NULL);
INSERT INTO `we_booking` VALUES(266, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-09 17:00:00', '2015-10-09 17:30:00', 1, 154, '2015-10-09 11:09:59', '2015-10-09 11:09:59', NULL);
INSERT INTO `we_booking` VALUES(267, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-16 16:00:00', '2015-10-16 16:30:00', 1, 155, '2015-10-09 11:10:21', '2015-10-09 11:10:21', NULL);
INSERT INTO `we_booking` VALUES(268, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-16 17:00:00', '2015-10-16 17:30:00', 1, 155, '2015-10-09 11:10:21', '2015-10-09 11:10:21', NULL);
INSERT INTO `we_booking` VALUES(269, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-16 16:30:00', '2015-10-16 17:00:00', 1, 155, '2015-10-09 11:10:21', '2015-10-09 11:10:21', NULL);
INSERT INTO `we_booking` VALUES(270, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-16 17:30:00', '2015-10-16 18:00:00', 1, 155, '2015-10-09 11:10:21', '2015-10-09 11:10:21', NULL);
INSERT INTO `we_booking` VALUES(271, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-16 18:30:00', '2015-10-16 19:00:00', 1, 155, '2015-10-09 11:10:21', '2015-10-09 11:10:21', NULL);
INSERT INTO `we_booking` VALUES(272, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-30 16:00:00', '2015-10-30 16:30:00', 1, 156, '2015-10-09 11:10:40', '2015-10-09 11:10:40', NULL);
INSERT INTO `we_booking` VALUES(273, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-30 17:00:00', '2015-10-30 17:30:00', 1, 156, '2015-10-09 11:10:40', '2015-10-09 11:10:40', NULL);
INSERT INTO `we_booking` VALUES(274, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-30 16:30:00', '2015-10-30 17:00:00', 1, 156, '2015-10-09 11:10:40', '2015-10-09 11:10:40', NULL);
INSERT INTO `we_booking` VALUES(275, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-30 17:30:00', '2015-10-30 18:00:00', 1, 156, '2015-10-09 11:10:40', '2015-10-09 11:10:40', NULL);
INSERT INTO `we_booking` VALUES(276, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-30 18:30:00', '2015-10-30 19:00:00', 1, 156, '2015-10-09 11:10:40', '2015-10-09 11:10:40', NULL);
INSERT INTO `we_booking` VALUES(277, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-11-08 16:00:00', '2015-11-08 16:30:00', 1, 157, '2015-10-09 11:12:16', '2015-10-09 11:12:16', NULL);
INSERT INTO `we_booking` VALUES(278, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-11-08 17:00:00', '2015-11-08 17:30:00', 1, 157, '2015-10-09 11:12:16', '2015-10-09 11:12:16', NULL);
INSERT INTO `we_booking` VALUES(279, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-11-08 18:00:00', '2015-11-08 18:30:00', 1, 157, '2015-10-09 11:12:16', '2015-10-09 11:12:16', NULL);
INSERT INTO `we_booking` VALUES(280, 'room', 1029, '0', '0.00', '', 0, NULL, '', '2015-11-30 16:00:00', '2015-11-30 16:30:00', 1, 158, '2015-10-09 11:14:08', '2015-10-09 11:14:08', NULL);
INSERT INTO `we_booking` VALUES(281, 'room', 1029, '0', '0.00', '', 0, NULL, '', '2015-11-30 17:00:00', '2015-11-30 17:30:00', 1, 158, '2015-10-09 11:14:08', '2015-10-09 11:14:08', NULL);
INSERT INTO `we_booking` VALUES(282, 'room', 1029, '0', '0.00', '', 0, NULL, '', '2015-11-30 17:30:00', '2015-11-30 18:00:00', 1, 158, '2015-10-09 11:14:08', '2015-10-09 11:14:08', NULL);
INSERT INTO `we_booking` VALUES(283, 'room', 1029, '0', '0.00', '', 0, NULL, '', '2015-11-30 16:30:00', '2015-11-30 17:00:00', 1, 158, '2015-10-09 11:14:08', '2015-10-09 11:14:08', NULL);
INSERT INTO `we_booking` VALUES(284, 'room', 1028, '0', '0.00', '', 0, NULL, '', '2015-12-04 16:00:00', '2015-12-04 16:30:00', 1, 159, '2015-10-09 11:15:22', '2015-10-09 11:15:22', NULL);
INSERT INTO `we_booking` VALUES(285, 'room', 1028, '0', '0.00', '', 0, NULL, '', '2015-12-04 17:00:00', '2015-12-04 17:30:00', 1, 159, '2015-10-09 11:15:22', '2015-10-09 11:15:22', NULL);
INSERT INTO `we_booking` VALUES(286, 'room', 1028, '0', '0.00', '', 0, NULL, '', '2015-12-04 16:30:00', '2015-12-04 17:00:00', 1, 159, '2015-10-09 11:15:22', '2015-10-09 11:15:22', NULL);
INSERT INTO `we_booking` VALUES(287, 'room', 1028, '0', '0.00', '', 0, NULL, '', '2015-12-04 17:30:00', '2015-12-04 18:00:00', 1, 159, '2015-10-09 11:15:22', '2015-10-09 11:15:22', NULL);
INSERT INTO `we_booking` VALUES(288, 'room', 1028, '0', '0.00', '', 0, NULL, '', '2015-12-04 18:30:00', '2015-12-04 19:00:00', 1, 159, '2015-10-09 11:15:22', '2015-10-09 11:15:22', NULL);
INSERT INTO `we_booking` VALUES(289, 'room', 1028, '0', '0.00', '', 0, NULL, '', '2015-12-04 18:00:00', '2015-12-04 18:30:00', 1, 159, '2015-10-09 11:15:22', '2015-10-09 11:15:22', NULL);
INSERT INTO `we_booking` VALUES(290, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-04 16:00:00', '2015-12-04 16:30:00', 1, 160, '2015-10-09 11:16:46', '2015-10-09 11:16:46', NULL);
INSERT INTO `we_booking` VALUES(291, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-04 17:00:00', '2015-12-04 17:30:00', 1, 160, '2015-10-09 11:16:46', '2015-10-09 11:16:46', NULL);
INSERT INTO `we_booking` VALUES(292, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-04 16:30:00', '2015-12-04 17:00:00', 1, 160, '2015-10-09 11:16:46', '2015-10-09 11:16:46', NULL);
INSERT INTO `we_booking` VALUES(293, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-04 17:30:00', '2015-12-04 18:00:00', 1, 160, '2015-10-09 11:16:46', '2015-10-09 11:16:46', NULL);
INSERT INTO `we_booking` VALUES(294, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-04 18:30:00', '2015-12-04 19:00:00', 1, 160, '2015-10-09 11:16:46', '2015-10-09 11:16:46', NULL);
INSERT INTO `we_booking` VALUES(295, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-04 18:00:00', '2015-12-04 18:30:00', 1, 160, '2015-10-09 11:16:46', '2015-10-09 11:16:46', NULL);
INSERT INTO `we_booking` VALUES(296, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-12 16:00:00', '2015-10-12 16:30:00', 1, 161, '2015-10-12 02:08:34', '2015-10-12 02:08:34', NULL);
INSERT INTO `we_booking` VALUES(297, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-12 16:30:00', '2015-10-12 17:00:00', 1, 161, '2015-10-12 02:08:34', '2015-10-12 02:08:34', NULL);
INSERT INTO `we_booking` VALUES(298, 'seat', 61, '0', '0.00', '', 0, NULL, '34242123', '2015-10-13 16:00:00', '2015-11-12 16:00:00', NULL, 162, '2015-10-12 02:54:52', '2015-10-12 02:54:52', NULL);
INSERT INTO `we_booking` VALUES(299, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-12 14:30:00', '2015-10-12 15:00:00', 1, 164, '2015-10-12 07:03:00', '2015-10-12 07:03:00', NULL);
INSERT INTO `we_booking` VALUES(300, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-12 15:00:00', '2015-10-12 15:30:00', 1, 164, '2015-10-12 07:03:00', '2015-10-12 07:03:00', NULL);
INSERT INTO `we_booking` VALUES(301, 'room', 137, '0', '0.00', '', 0, NULL, '', '2015-10-12 15:30:00', '2015-10-12 16:00:00', 1, 165, '2015-10-12 08:00:56', '2015-10-12 08:00:56', NULL);
INSERT INTO `we_booking` VALUES(302, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-12 16:30:00', '2015-10-12 17:00:00', 1, 166, '2015-10-12 09:05:46', '2015-10-12 09:05:46', NULL);
INSERT INTO `we_booking` VALUES(303, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-12 15:30:00', '2015-10-12 16:00:00', 1, 167, '2015-10-12 09:07:40', '2015-10-12 09:07:40', NULL);
INSERT INTO `we_booking` VALUES(304, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-10-12 16:00:00', '2015-10-12 16:30:00', 1, 168, '2015-10-12 09:09:25', '2015-10-12 09:09:25', NULL);
INSERT INTO `we_booking` VALUES(305, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:00:00', '2015-10-13 15:30:00', 1, 168, '2015-10-12 09:09:25', '2015-10-12 09:09:25', NULL);
INSERT INTO `we_booking` VALUES(306, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 168, '2015-10-12 09:09:25', '2015-10-12 09:09:25', NULL);
INSERT INTO `we_booking` VALUES(307, 'room', 1019, '0', '0.00', '', 0, NULL, '', '2015-10-15 02:30:00', '2015-10-15 03:00:00', 1, 169, '2015-10-12 09:11:59', '2015-10-12 09:11:59', NULL);
INSERT INTO `we_booking` VALUES(308, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2015-10-15 02:30:00', '2015-10-15 03:00:00', 1, 170, '2015-10-12 09:12:03', '2015-10-12 09:12:03', NULL);
INSERT INTO `we_booking` VALUES(309, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2015-10-15 03:00:00', '2015-10-15 03:30:00', 1, 171, '2015-10-12 09:12:18', '2015-10-12 09:12:18', NULL);
INSERT INTO `we_booking` VALUES(310, 'room', 1029, '0', '0.00', '', 0, NULL, '', '2015-10-13 14:00:00', '2015-10-13 14:30:00', 1, 180, '2015-10-13 02:11:52', '2015-10-13 02:11:52', NULL);
INSERT INTO `we_booking` VALUES(311, 'room', 1029, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:00:00', '2015-10-13 15:30:00', 1, 180, '2015-10-13 02:11:52', '2015-10-13 02:11:52', NULL);
INSERT INTO `we_booking` VALUES(312, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 07:00:00', '2015-10-13 07:30:00', 1, 181, '2015-10-13 05:20:35', '2015-10-13 05:20:35', NULL);
INSERT INTO `we_booking` VALUES(313, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 07:00:00', '2015-10-13 07:30:00', 1, 182, '2015-10-13 05:44:19', '2015-10-13 05:44:19', NULL);
INSERT INTO `we_booking` VALUES(314, 'room', 1030, '0', '0.00', '', 0, NULL, '', '2015-10-13 14:30:00', '2015-10-13 15:00:00', 1, 183, '2015-10-13 06:11:50', '2015-10-13 06:11:50', NULL);
INSERT INTO `we_booking` VALUES(315, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 184, '2015-10-13 06:12:01', '2015-10-13 06:12:01', NULL);
INSERT INTO `we_booking` VALUES(316, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:00:00', '2015-10-13 15:30:00', 1, 184, '2015-10-13 06:12:01', '2015-10-13 06:12:01', NULL);
INSERT INTO `we_booking` VALUES(317, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 14:00:00', '2015-10-13 14:30:00', 1, 184, '2015-10-13 06:12:01', '2015-10-13 06:12:01', NULL);
INSERT INTO `we_booking` VALUES(318, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 13:00:00', '2015-10-13 13:30:00', 1, 184, '2015-10-13 06:12:01', '2015-10-13 06:12:01', NULL);
INSERT INTO `we_booking` VALUES(319, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 14:30:00', '2015-10-13 15:00:00', 1, 184, '2015-10-13 06:12:01', '2015-10-13 06:12:01', NULL);
INSERT INTO `we_booking` VALUES(320, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 13:30:00', '2015-10-13 14:00:00', 1, 184, '2015-10-13 06:12:01', '2015-10-13 06:12:01', NULL);
INSERT INTO `we_booking` VALUES(321, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 12:00:00', '2015-10-13 12:30:00', 1, 184, '2015-10-13 06:12:01', '2015-10-13 06:12:01', NULL);
INSERT INTO `we_booking` VALUES(322, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 12:30:00', '2015-10-13 13:00:00', 1, 184, '2015-10-13 06:12:01', '2015-10-13 06:12:01', NULL);
INSERT INTO `we_booking` VALUES(323, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 185, '2015-10-13 06:18:42', '2015-10-13 06:18:42', NULL);
INSERT INTO `we_booking` VALUES(324, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-12 16:30:00', '2015-11-12 17:00:00', 1, 186, '2015-10-13 06:39:55', '2015-10-13 06:39:55', NULL);
INSERT INTO `we_booking` VALUES(325, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-12 18:30:00', '2015-11-12 19:00:00', 1, 187, '2015-10-13 06:40:06', '2015-10-13 06:40:06', NULL);
INSERT INTO `we_booking` VALUES(326, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 188, '2015-10-13 07:01:41', '2015-10-13 07:01:41', NULL);
INSERT INTO `we_booking` VALUES(327, 'room', 1021, '0', '0.00', '', 0, NULL, '', '2015-11-12 17:30:00', '2015-11-12 18:00:00', 1, 189, '2015-10-13 07:40:15', '2015-10-13 07:40:15', NULL);
INSERT INTO `we_booking` VALUES(328, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 18:30:00', '2015-11-10 19:00:00', 1, 190, '2015-10-13 07:40:31', '2015-10-13 07:40:31', NULL);
INSERT INTO `we_booking` VALUES(329, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 19:30:00', '2015-11-10 20:00:00', 1, 190, '2015-10-13 07:40:31', '2015-10-13 07:40:31', NULL);
INSERT INTO `we_booking` VALUES(330, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 191, '2015-10-13 08:39:46', '2015-10-13 08:39:46', NULL);
INSERT INTO `we_booking` VALUES(331, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 192, '2015-10-13 09:53:26', '2015-10-13 09:53:26', NULL);
INSERT INTO `we_booking` VALUES(332, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-10-22 16:00:00', '2015-10-22 16:30:00', 1, 193, '2015-10-13 10:31:43', '2015-10-13 10:31:43', NULL);
INSERT INTO `we_booking` VALUES(333, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 194, '2015-10-13 11:20:56', '2015-10-13 11:20:56', NULL);
INSERT INTO `we_booking` VALUES(334, 'room', 1029, '0', '0.00', '', 0, NULL, '', '2015-12-13 16:00:00', '2015-12-13 16:30:00', 1, 195, '2015-10-13 11:34:37', '2015-10-13 11:34:37', NULL);
INSERT INTO `we_booking` VALUES(335, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-12-13 16:00:00', '2015-12-13 16:30:00', 1, 196, '2015-10-13 11:34:46', '2015-10-13 11:34:46', NULL);
INSERT INTO `we_booking` VALUES(336, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-12-13 17:00:00', '2015-12-13 17:30:00', 1, 196, '2015-10-13 11:34:46', '2015-10-13 11:34:46', NULL);
INSERT INTO `we_booking` VALUES(337, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-12-13 17:30:00', '2015-12-13 18:00:00', 1, 196, '2015-10-13 11:34:46', '2015-10-13 11:34:46', NULL);
INSERT INTO `we_booking` VALUES(338, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-12-13 18:30:00', '2015-12-13 19:00:00', 1, 196, '2015-10-13 11:34:46', '2015-10-13 11:34:46', NULL);
INSERT INTO `we_booking` VALUES(339, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-12-13 18:00:00', '2015-12-13 18:30:00', 1, 196, '2015-10-13 11:34:46', '2015-10-13 11:34:46', NULL);
INSERT INTO `we_booking` VALUES(340, 'room', 1019, '0', '0.00', '', 0, NULL, '', '2015-11-18 18:30:00', '2015-11-18 19:00:00', 1, 197, '2015-10-13 11:50:36', '2015-10-13 11:50:36', NULL);
INSERT INTO `we_booking` VALUES(341, 'room', 1019, '0', '0.00', '', 0, NULL, '', '2015-11-18 19:30:00', '2015-11-18 20:00:00', 1, 197, '2015-10-13 11:50:36', '2015-10-13 11:50:36', NULL);
INSERT INTO `we_booking` VALUES(342, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 198, '2015-10-13 13:34:37', '2015-10-13 13:34:37', NULL);
INSERT INTO `we_booking` VALUES(343, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-13 15:30:00', '2015-10-13 16:00:00', 1, 199, '2015-10-13 14:56:43', '2015-10-13 14:56:43', NULL);
INSERT INTO `we_booking` VALUES(344, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-13 16:30:00', '2015-12-13 17:00:00', 1, 200, '2015-10-14 02:00:32', '2015-10-14 02:00:32', NULL);
INSERT INTO `we_booking` VALUES(345, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-13 16:30:00', '2015-11-13 17:00:00', 1, 201, '2015-10-14 02:06:34', '2015-10-14 02:06:34', NULL);
INSERT INTO `we_booking` VALUES(346, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-11 19:30:00', '2015-12-11 20:00:00', 1, 202, '2015-10-14 02:27:49', '2015-10-14 02:27:49', NULL);
INSERT INTO `we_booking` VALUES(347, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-11 20:30:00', '2015-12-11 21:00:00', 1, 202, '2015-10-14 02:27:49', '2015-10-14 02:27:49', NULL);
INSERT INTO `we_booking` VALUES(348, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-11 16:30:00', '2015-12-11 17:00:00', 1, 203, '2015-10-14 02:31:20', '2015-10-14 02:31:20', NULL);
INSERT INTO `we_booking` VALUES(349, 'room', 1019, '0', '0.00', '', 0, NULL, '', '2015-11-13 16:30:00', '2015-11-13 17:00:00', 1, 204, '2015-10-14 02:36:44', '2015-10-14 02:36:44', NULL);
INSERT INTO `we_booking` VALUES(350, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-10-14 14:30:00', '2015-10-14 15:00:00', 1, 205, '2015-10-14 02:42:52', '2015-10-14 02:42:52', NULL);
INSERT INTO `we_booking` VALUES(351, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-10-14 14:00:00', '2015-10-14 14:30:00', 1, 206, '2015-10-14 02:43:16', '2015-10-14 02:43:16', NULL);
INSERT INTO `we_booking` VALUES(352, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-10-14 13:00:00', '2015-10-14 13:30:00', 1, 206, '2015-10-14 02:43:16', '2015-10-14 02:43:16', NULL);
INSERT INTO `we_booking` VALUES(353, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-10-14 12:00:00', '2015-10-14 12:30:00', 1, 206, '2015-10-14 02:43:16', '2015-10-14 02:43:16', NULL);
INSERT INTO `we_booking` VALUES(354, 'room', 1030, '0', '0.00', '', 0, NULL, '', '2015-10-14 14:30:00', '2015-10-14 15:00:00', 1, 207, '2015-10-14 03:29:30', '2015-10-14 03:29:30', NULL);
INSERT INTO `we_booking` VALUES(355, 'seat', 57, '0', '0.00', '', 0, NULL, '栏2', '2015-10-14 16:00:00', '2016-09-08 16:00:00', NULL, 208, '2015-10-14 03:39:52', '2015-10-14 03:39:52', NULL);
INSERT INTO `we_booking` VALUES(356, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 20:30:00', '2015-10-14 21:00:00', 1, 209, '2015-10-14 03:57:14', '2015-10-14 03:57:14', NULL);
INSERT INTO `we_booking` VALUES(357, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 21:30:00', '2015-10-14 22:00:00', 1, 209, '2015-10-14 03:57:14', '2015-10-14 03:57:14', NULL);
INSERT INTO `we_booking` VALUES(358, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 19:30:00', '2015-10-14 20:00:00', 1, 209, '2015-10-14 03:57:14', '2015-10-14 03:57:14', NULL);
INSERT INTO `we_booking` VALUES(359, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 19:00:00', '2015-10-14 19:30:00', 1, 209, '2015-10-14 03:57:14', '2015-10-14 03:57:14', NULL);
INSERT INTO `we_booking` VALUES(360, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 20:00:00', '2015-10-14 20:30:00', 1, 209, '2015-10-14 03:57:14', '2015-10-14 03:57:14', NULL);
INSERT INTO `we_booking` VALUES(361, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 21:00:00', '2015-10-14 21:30:00', 1, 209, '2015-10-14 03:57:14', '2015-10-14 03:57:14', NULL);
INSERT INTO `we_booking` VALUES(362, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 06:00:00', '2015-10-14 06:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(363, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 07:00:00', '2015-10-14 07:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(364, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 08:00:00', '2015-10-14 08:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(365, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 06:30:00', '2015-10-14 07:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(366, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 07:30:00', '2015-10-14 08:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(367, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 08:30:00', '2015-10-14 09:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(368, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 09:30:00', '2015-10-14 10:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(369, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 09:00:00', '2015-10-14 09:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(370, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 10:00:00', '2015-10-14 10:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(371, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 11:00:00', '2015-10-14 11:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(372, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 10:30:00', '2015-10-14 11:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(373, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 11:30:00', '2015-10-14 12:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(374, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 12:30:00', '2015-10-14 13:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(375, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 12:00:00', '2015-10-14 12:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(376, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 13:00:00', '2015-10-14 13:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(377, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 13:30:00', '2015-10-14 14:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(378, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 14:30:00', '2015-10-14 15:00:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(379, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 14:00:00', '2015-10-14 14:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(380, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:00:00', '2015-10-14 15:30:00', 1, 210, '2015-10-14 04:14:15', '2015-10-14 04:14:15', NULL);
INSERT INTO `we_booking` VALUES(381, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 18:00:00', '2015-10-14 18:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(382, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 17:00:00', '2015-10-14 17:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(383, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 16:00:00', '2015-10-14 16:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(384, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 16:30:00', '2015-10-14 17:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(385, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 17:30:00', '2015-10-14 18:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(386, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 18:30:00', '2015-10-14 19:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(387, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 19:30:00', '2015-10-14 20:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(388, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 19:00:00', '2015-10-14 19:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(389, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 20:00:00', '2015-10-14 20:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(390, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 20:30:00', '2015-10-14 21:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(391, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 21:30:00', '2015-10-14 22:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(392, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 21:00:00', '2015-10-14 21:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(393, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 22:30:00', '2015-10-14 23:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(394, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 23:30:00', '2015-10-15 00:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(395, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 22:00:00', '2015-10-14 22:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(396, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 23:00:00', '2015-10-14 23:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(397, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 00:00:00', '2015-10-15 00:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(398, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 00:30:00', '2015-10-15 01:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(399, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 01:00:00', '2015-10-15 01:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(400, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 01:30:00', '2015-10-15 02:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(401, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 02:00:00', '2015-10-15 02:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(402, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 02:30:00', '2015-10-15 03:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(403, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 03:00:00', '2015-10-15 03:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(404, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 03:30:00', '2015-10-15 04:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(405, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 04:00:00', '2015-10-15 04:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(406, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 04:30:00', '2015-10-15 05:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(407, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 05:00:00', '2015-10-15 05:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(408, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 05:30:00', '2015-10-15 06:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(409, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 06:00:00', '2015-10-15 06:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(410, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 06:30:00', '2015-10-15 07:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(411, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 07:00:00', '2015-10-15 07:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(412, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 07:30:00', '2015-10-15 08:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(413, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 08:00:00', '2015-10-15 08:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(414, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 08:30:00', '2015-10-15 09:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(415, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 09:00:00', '2015-10-15 09:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(416, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 09:30:00', '2015-10-15 10:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(417, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 10:00:00', '2015-10-15 10:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(418, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 10:30:00', '2015-10-15 11:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(419, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 11:00:00', '2015-10-15 11:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(420, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 11:30:00', '2015-10-15 12:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(421, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 12:00:00', '2015-10-15 12:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(422, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 12:30:00', '2015-10-15 13:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(423, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 13:30:00', '2015-10-15 14:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(424, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 14:00:00', '2015-10-15 14:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(425, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 13:00:00', '2015-10-15 13:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(426, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 15:00:00', '2015-10-15 15:30:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(427, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 15:30:00', '2015-10-15 16:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(428, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 14:30:00', '2015-10-15 15:00:00', 1, 211, '2015-10-14 05:04:28', '2015-10-14 05:04:28', NULL);
INSERT INTO `we_booking` VALUES(429, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 16:00:00', '2017-12-22 16:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(430, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 17:00:00', '2017-12-22 17:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(431, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 16:30:00', '2017-12-22 17:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(432, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 17:30:00', '2017-12-22 18:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(433, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 18:00:00', '2017-12-22 18:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(434, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 18:30:00', '2017-12-22 19:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(435, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 19:00:00', '2017-12-22 19:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(436, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 19:30:00', '2017-12-22 20:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(437, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 20:00:00', '2017-12-22 20:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(438, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 20:30:00', '2017-12-22 21:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(439, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 21:00:00', '2017-12-22 21:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(440, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 21:30:00', '2017-12-22 22:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(441, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 22:00:00', '2017-12-22 22:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(442, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 22:30:00', '2017-12-22 23:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(443, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 23:00:00', '2017-12-22 23:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(444, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-22 23:30:00', '2017-12-23 00:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(445, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 00:00:00', '2017-12-23 00:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(446, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 00:30:00', '2017-12-23 01:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(447, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 01:00:00', '2017-12-23 01:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(448, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 01:30:00', '2017-12-23 02:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(449, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 02:00:00', '2017-12-23 02:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(450, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 02:30:00', '2017-12-23 03:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(451, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 03:00:00', '2017-12-23 03:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(452, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 03:30:00', '2017-12-23 04:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(453, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 04:00:00', '2017-12-23 04:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(454, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 04:30:00', '2017-12-23 05:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(455, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 05:00:00', '2017-12-23 05:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(456, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 05:30:00', '2017-12-23 06:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(457, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 06:00:00', '2017-12-23 06:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(458, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 06:30:00', '2017-12-23 07:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(459, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 07:00:00', '2017-12-23 07:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(460, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 07:30:00', '2017-12-23 08:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(461, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 08:00:00', '2017-12-23 08:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(462, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 08:30:00', '2017-12-23 09:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(463, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 09:00:00', '2017-12-23 09:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(464, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 09:30:00', '2017-12-23 10:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(465, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 10:30:00', '2017-12-23 11:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(466, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 10:00:00', '2017-12-23 10:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(467, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 11:00:00', '2017-12-23 11:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(468, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 11:30:00', '2017-12-23 12:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(469, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 12:00:00', '2017-12-23 12:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(470, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 12:30:00', '2017-12-23 13:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(471, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 13:00:00', '2017-12-23 13:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(472, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 13:30:00', '2017-12-23 14:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(473, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 14:30:00', '2017-12-23 15:00:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(474, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 14:00:00', '2017-12-23 14:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(475, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2017-12-23 15:00:00', '2017-12-23 15:30:00', 1, 220, '2015-10-14 05:16:37', '2015-10-14 05:16:37', NULL);
INSERT INTO `we_booking` VALUES(476, 'room', 1030, '0', '0.00', '', 0, NULL, '', '2016-05-14 19:30:00', '2016-05-14 20:00:00', 1, 221, '2015-10-14 05:25:47', '2015-10-14 05:25:47', NULL);
INSERT INTO `we_booking` VALUES(477, 'room', 1030, '0', '0.00', '', 0, NULL, '', '2016-05-15 15:30:00', '2016-05-15 16:00:00', 1, 221, '2015-10-14 05:25:47', '2015-10-14 05:25:47', NULL);
INSERT INTO `we_booking` VALUES(478, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2016-05-15 15:30:00', '2016-05-15 16:00:00', 1, 222, '2015-10-14 05:26:42', '2015-10-14 05:26:42', NULL);
INSERT INTO `we_booking` VALUES(479, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-11-13 17:30:00', '2015-11-13 18:00:00', 1, 223, '2015-10-14 05:27:21', '2015-10-14 05:27:21', NULL);
INSERT INTO `we_booking` VALUES(480, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2016-05-15 14:30:00', '2016-05-15 15:00:00', 1, 224, '2015-10-14 05:27:39', '2015-10-14 05:27:39', NULL);
INSERT INTO `we_booking` VALUES(481, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2016-05-15 10:00:00', '2016-05-15 10:30:00', 1, 225, '2015-10-14 05:28:29', '2015-10-14 05:28:29', NULL);
INSERT INTO `we_booking` VALUES(482, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2016-05-15 15:00:00', '2016-05-15 15:30:00', 1, 226, '2015-10-14 05:29:05', '2015-10-14 05:29:05', NULL);
INSERT INTO `we_booking` VALUES(483, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2016-05-15 14:30:00', '2016-05-15 15:00:00', 1, 227, '2015-10-14 05:30:01', '2015-10-14 05:30:01', NULL);
INSERT INTO `we_booking` VALUES(484, 'room', 1019, '0', '0.00', '', 0, NULL, '', '2015-11-13 18:30:00', '2015-11-13 19:00:00', 1, 228, '2015-10-14 05:36:09', '2015-10-14 05:36:09', NULL);
INSERT INTO `we_booking` VALUES(485, 'room', 1019, '0', '0.00', '', 0, NULL, '', '2015-11-13 19:30:00', '2015-11-13 20:00:00', 1, 228, '2015-10-14 05:36:09', '2015-10-14 05:36:09', NULL);
INSERT INTO `we_booking` VALUES(486, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-14 16:30:00', '2015-11-14 17:00:00', 1, 229, '2015-10-14 05:47:52', '2015-10-14 05:47:52', NULL);
INSERT INTO `we_booking` VALUES(487, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-14 17:30:00', '2015-11-14 18:00:00', 1, 229, '2015-10-14 05:47:52', '2015-10-14 05:47:52', NULL);
INSERT INTO `we_booking` VALUES(488, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-12-13 17:30:00', '2015-12-13 18:00:00', 1, 230, '2015-10-14 05:48:22', '2015-10-14 05:48:22', NULL);
INSERT INTO `we_booking` VALUES(489, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-13 16:30:00', '2015-11-13 17:00:00', 1, 231, '2015-10-14 06:12:49', '2015-10-14 06:12:49', NULL);
INSERT INTO `we_booking` VALUES(490, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-12-13 16:30:00', '2015-12-13 17:00:00', 1, 232, '2015-10-14 06:12:56', '2015-10-14 06:12:56', NULL);
INSERT INTO `we_booking` VALUES(491, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2016-01-18 17:30:00', '2016-01-18 18:00:00', 1, 233, '2015-10-14 06:20:25', '2015-10-14 06:20:25', NULL);
INSERT INTO `we_booking` VALUES(492, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:30:00', '2015-10-14 16:00:00', 1, 234, '2015-10-14 06:49:06', '2015-10-14 06:49:06', NULL);
INSERT INTO `we_booking` VALUES(493, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-18 16:00:00', '2015-10-18 16:30:00', 1, 235, '2015-10-14 07:03:17', '2015-10-14 07:03:17', NULL);
INSERT INTO `we_booking` VALUES(494, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-18 16:30:00', '2015-10-18 17:00:00', 1, 235, '2015-10-14 07:03:17', '2015-10-14 07:03:17', NULL);
INSERT INTO `we_booking` VALUES(495, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-13 16:30:00', '2015-11-13 17:00:00', 1, 236, '2015-10-14 07:03:35', '2015-10-14 07:03:35', NULL);
INSERT INTO `we_booking` VALUES(496, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-13 17:00:00', '2015-11-13 17:30:00', 1, 237, '2015-10-14 07:04:44', '2015-10-14 07:04:44', NULL);
INSERT INTO `we_booking` VALUES(497, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-13 18:00:00', '2015-11-13 18:30:00', 1, 237, '2015-10-14 07:04:44', '2015-10-14 07:04:44', NULL);
INSERT INTO `we_booking` VALUES(498, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-13 19:00:00', '2015-11-13 19:30:00', 1, 237, '2015-10-14 07:04:44', '2015-10-14 07:04:44', NULL);
INSERT INTO `we_booking` VALUES(499, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2015-11-16 16:30:00', '2015-11-16 17:00:00', 1, 238, '2015-10-14 07:16:30', '2015-10-14 07:16:30', NULL);
INSERT INTO `we_booking` VALUES(500, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:30:00', '2015-10-14 16:00:00', 1, 239, '2015-10-14 07:28:37', '2015-10-14 07:28:37', NULL);
INSERT INTO `we_booking` VALUES(501, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-12-26 16:30:00', '2015-12-26 17:00:00', 1, 240, '2015-10-14 07:41:22', '2015-10-14 07:41:22', NULL);
INSERT INTO `we_booking` VALUES(502, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-18 16:00:00', '2015-10-18 16:30:00', 1, 241, '2015-10-14 07:46:01', '2015-10-14 07:46:01', NULL);
INSERT INTO `we_booking` VALUES(503, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-16 16:00:00', '2015-10-16 16:30:00', 1, 242, '2015-10-14 07:46:11', '2015-10-14 07:46:11', NULL);
INSERT INTO `we_booking` VALUES(504, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-16 16:30:00', '2015-10-16 17:00:00', 1, 243, '2015-10-14 07:46:20', '2015-10-14 07:46:20', NULL);
INSERT INTO `we_booking` VALUES(505, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-12-13 16:00:00', '2015-12-13 16:30:00', 1, 244, '2015-10-14 07:46:46', '2015-10-14 07:46:46', NULL);
INSERT INTO `we_booking` VALUES(506, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-10-14 09:30:00', '2015-10-14 10:00:00', 1, 245, '2015-10-14 07:47:29', '2015-10-14 07:47:29', NULL);
INSERT INTO `we_booking` VALUES(507, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-19 16:00:00', '2015-11-19 16:30:00', 1, 246, '2015-10-14 07:49:16', '2015-10-14 07:49:16', NULL);
INSERT INTO `we_booking` VALUES(508, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-11-19 17:00:00', '2015-11-19 17:30:00', 1, 246, '2015-10-14 07:49:16', '2015-10-14 07:49:16', NULL);
INSERT INTO `we_booking` VALUES(509, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-10-14 14:30:00', '2015-10-14 15:00:00', 1, 247, '2015-10-14 07:49:39', '2015-10-14 07:49:39', NULL);
INSERT INTO `we_booking` VALUES(510, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-12-14 15:00:00', '2015-12-14 15:30:00', 1, 248, '2015-10-14 07:52:50', '2015-10-14 07:52:50', NULL);
INSERT INTO `we_booking` VALUES(511, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-11-13 17:30:00', '2015-11-13 18:00:00', 1, 249, '2015-10-14 08:15:10', '2015-10-14 08:15:10', NULL);
INSERT INTO `we_booking` VALUES(512, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-11-13 18:30:00', '2015-11-13 19:00:00', 1, 249, '2015-10-14 08:15:10', '2015-10-14 08:15:10', NULL);
INSERT INTO `we_booking` VALUES(513, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-12-13 16:00:00', '2015-12-13 16:30:00', 1, 250, '2015-10-14 08:15:54', '2015-10-14 08:15:54', NULL);
INSERT INTO `we_booking` VALUES(514, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-13 16:30:00', '2015-12-13 17:00:00', 1, 251, '2015-10-14 08:16:07', '2015-10-14 08:16:07', NULL);
INSERT INTO `we_booking` VALUES(515, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-12-13 16:30:00', '2015-12-13 17:00:00', 1, 252, '2015-10-14 08:16:28', '2015-10-14 08:16:28', NULL);
INSERT INTO `we_booking` VALUES(516, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-12-13 18:30:00', '2015-12-13 19:00:00', 1, 253, '2015-10-14 08:17:06', '2015-10-14 08:17:06', NULL);
INSERT INTO `we_booking` VALUES(517, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-11-13 13:30:00', '2015-11-13 14:00:00', 1, 254, '2015-10-14 08:17:19', '2015-10-14 08:17:19', NULL);
INSERT INTO `we_booking` VALUES(518, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-11-13 13:00:00', '2015-11-13 13:30:00', 1, 254, '2015-10-14 08:17:19', '2015-10-14 08:17:19', NULL);
INSERT INTO `we_booking` VALUES(519, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-10-14 13:30:00', '2015-10-14 14:00:00', 1, 255, '2015-10-14 08:19:25', '2015-10-14 08:19:25', NULL);
INSERT INTO `we_booking` VALUES(520, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-14 14:00:00', '2015-12-14 14:30:00', 1, 256, '2015-10-14 08:19:44', '2015-10-14 08:19:44', NULL);
INSERT INTO `we_booking` VALUES(521, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:30:00', '2015-10-14 16:00:00', 1, 257, '2015-10-14 08:34:10', '2015-10-14 08:34:10', NULL);
INSERT INTO `we_booking` VALUES(522, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:30:00', '2015-10-14 16:00:00', 1, 258, '2015-10-14 08:46:07', '2015-10-14 08:46:07', NULL);
INSERT INTO `we_booking` VALUES(523, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:30:00', '2015-10-14 16:00:00', 1, 259, '2015-10-14 09:13:51', '2015-10-14 09:13:51', NULL);
INSERT INTO `we_booking` VALUES(524, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-12-14 14:30:00', '2015-12-14 15:00:00', 1, 260, '2015-10-14 09:18:58', '2015-10-14 09:18:58', NULL);
INSERT INTO `we_booking` VALUES(525, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:00:00', '2015-10-14 15:30:00', 1, 261, '2015-10-14 09:21:11', '2015-10-14 09:21:11', NULL);
INSERT INTO `we_booking` VALUES(526, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:30:00', '2015-10-14 16:00:00', 1, 262, '2015-10-14 09:54:12', '2015-10-14 09:54:12', NULL);
INSERT INTO `we_booking` VALUES(527, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:30:00', '2015-10-14 16:00:00', 1, 263, '2015-10-14 10:01:38', '2015-10-14 10:01:38', NULL);
INSERT INTO `we_booking` VALUES(528, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-31 15:30:00', '2015-10-31 16:00:00', 1, 264, '2015-10-14 10:02:39', '2015-10-14 10:02:39', NULL);
INSERT INTO `we_booking` VALUES(529, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 16:00:00', '2015-10-15 16:30:00', 1, 265, '2015-10-14 10:08:34', '2015-10-14 10:08:34', NULL);
INSERT INTO `we_booking` VALUES(530, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:00:00', '2015-10-15 17:30:00', 1, 266, '2015-10-14 10:09:11', '2015-10-14 10:09:11', NULL);
INSERT INTO `we_booking` VALUES(531, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-14 15:30:00', '2015-10-14 16:00:00', 1, 267, '2015-10-14 11:39:43', '2015-10-14 11:39:43', NULL);
INSERT INTO `we_booking` VALUES(532, 'room', 1019, '0', '0.00', '', 0, NULL, '', '2015-11-14 16:30:00', '2015-11-14 17:00:00', 1, 268, '2015-10-15 01:59:13', '2015-10-15 01:59:13', NULL);
INSERT INTO `we_booking` VALUES(533, 'room', 1019, '0', '0.00', '', 0, NULL, '', '2015-11-14 17:30:00', '2015-11-14 18:00:00', 1, 268, '2015-10-15 01:59:13', '2015-10-15 01:59:13', NULL);
INSERT INTO `we_booking` VALUES(534, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-10-16 16:30:00', '2015-10-16 17:00:00', 1, 269, '2015-10-15 02:00:33', '2015-10-15 02:00:33', NULL);
INSERT INTO `we_booking` VALUES(535, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-10-16 17:30:00', '2015-10-16 18:00:00', 1, 269, '2015-10-15 02:00:33', '2015-10-15 02:00:33', NULL);
INSERT INTO `we_booking` VALUES(536, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-11-14 16:30:00', '2015-11-14 17:00:00', 1, 270, '2015-10-15 02:01:22', '2015-10-15 02:01:22', NULL);
INSERT INTO `we_booking` VALUES(537, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-11-14 17:30:00', '2015-11-14 18:00:00', 1, 270, '2015-10-15 02:01:22', '2015-10-15 02:01:22', NULL);
INSERT INTO `we_booking` VALUES(538, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-10-14 16:00:00', '2015-11-13 16:00:00', NULL, 271, '2015-10-15 02:35:56', '2015-10-15 02:35:56', NULL);
INSERT INTO `we_booking` VALUES(539, 'seat', 52, '0', '0.00', '', 0, NULL, '红色', '2015-10-14 16:00:00', '2015-11-13 16:00:00', NULL, 272, '2015-10-15 02:39:34', '2015-10-15 02:39:34', NULL);
INSERT INTO `we_booking` VALUES(540, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-12-19 05:30:00', '2015-12-19 06:00:00', 1, 273, '2015-10-15 02:39:16', '2015-10-15 02:39:16', NULL);
INSERT INTO `we_booking` VALUES(541, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-12-19 06:30:00', '2015-12-19 07:00:00', 1, 273, '2015-10-15 02:39:16', '2015-10-15 02:39:16', NULL);
INSERT INTO `we_booking` VALUES(542, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-17 22:30:00', '2015-10-17 23:00:00', 1, 274, '2015-10-15 05:58:33', '2015-10-15 05:58:33', NULL);
INSERT INTO `we_booking` VALUES(543, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-17 22:30:00', '2015-10-17 23:00:00', 1, 274, '2015-10-15 05:58:33', '2015-10-15 05:58:33', NULL);
INSERT INTO `we_booking` VALUES(544, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:30:00', '2015-10-15 18:00:00', 1, 275, '2015-10-15 06:17:32', '2015-10-15 06:17:32', NULL);
INSERT INTO `we_booking` VALUES(545, 'room', 1032, '0', '0.00', '', 0, NULL, '', '2015-12-16 16:00:00', '2015-12-16 16:30:00', 1, 276, '2015-10-15 06:34:49', '2015-10-15 06:34:49', NULL);
INSERT INTO `we_booking` VALUES(546, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:30:00', '2015-10-15 18:00:00', 1, 277, '2015-10-15 06:37:06', '2015-10-15 06:37:06', NULL);
INSERT INTO `we_booking` VALUES(547, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-16 05:25:01', '2015-10-22 16:00:00', 1, 278, '2015-10-15 06:37:35', '2015-10-15 06:37:35', NULL);
INSERT INTO `we_booking` VALUES(548, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:30:00', '2015-10-15 18:00:00', 1, 279, '2015-10-15 06:57:50', '2015-10-15 06:57:50', NULL);
INSERT INTO `we_booking` VALUES(549, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:30:00', '2015-10-15 18:00:00', 1, 280, '2015-10-15 07:58:30', '2015-10-15 07:58:30', NULL);
INSERT INTO `we_booking` VALUES(550, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-12-10 17:30:00', '2015-12-10 18:00:00', 1, 281, '2015-10-15 08:05:46', '2015-10-15 08:05:46', NULL);
INSERT INTO `we_booking` VALUES(551, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-12-10 18:30:00', '2015-12-10 19:00:00', 1, 281, '2015-10-15 08:05:46', '2015-10-15 08:05:46', NULL);
INSERT INTO `we_booking` VALUES(552, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 16:30:00', '2015-10-15 17:00:00', 1, 282, '2015-10-15 08:35:14', '2015-10-15 08:35:14', NULL);
INSERT INTO `we_booking` VALUES(553, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:30:00', '2015-10-15 18:00:00', 1, 283, '2015-10-15 08:50:05', '2015-10-15 08:50:05', NULL);
INSERT INTO `we_booking` VALUES(554, 'room', 1051, '0', '0.00', '', 0, NULL, '', '2015-10-15 15:30:00', '2015-10-15 16:00:00', 1, 284, '2015-10-15 08:58:05', '2015-10-15 08:58:05', NULL);
INSERT INTO `we_booking` VALUES(555, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 16:30:00', '2015-10-15 17:00:00', 1, 285, '2015-10-15 10:05:15', '2015-10-15 10:05:15', NULL);
INSERT INTO `we_booking` VALUES(556, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:30:00', '2015-10-15 18:00:00', 1, 286, '2015-10-15 10:33:25', '2015-10-15 10:33:25', NULL);
INSERT INTO `we_booking` VALUES(557, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:30:00', '2015-10-15 18:00:00', 1, 287, '2015-10-15 10:51:51', '2015-10-15 10:51:51', NULL);
INSERT INTO `we_booking` VALUES(558, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-10-15 17:30:00', '2015-10-15 18:00:00', 1, 288, '2015-10-15 11:07:55', '2015-10-15 11:07:55', NULL);
INSERT INTO `we_booking` VALUES(559, 'seat', 80, '0', '0.00', '', 0, NULL, '123', '2015-10-15 16:00:00', '2015-11-14 16:00:00', NULL, 289, '2015-10-16 01:25:12', '2015-10-16 01:25:12', NULL);
INSERT INTO `we_booking` VALUES(560, 'seat', 79, '0', '0.00', '', 0, NULL, 'C1', '2015-10-15 16:00:00', '2015-11-14 16:00:00', NULL, 290, '2015-10-16 01:37:04', '2015-10-16 01:37:04', NULL);
INSERT INTO `we_booking` VALUES(561, 'seat', 79, '0', '0.00', '', 0, NULL, 'C1', '2015-10-15 16:00:00', '2015-11-14 16:00:00', NULL, 291, '2015-10-16 01:37:30', '2015-10-16 01:37:30', NULL);
INSERT INTO `we_booking` VALUES(562, 'seat', 58, '0', '0.00', '', 0, NULL, '1111111', '2015-10-23 16:00:00', '2015-11-22 16:00:00', NULL, 292, '2015-10-16 05:39:00', '2015-10-16 05:39:00', NULL);
INSERT INTO `we_booking` VALUES(563, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-10-23 16:00:00', '2015-11-22 16:00:00', NULL, 293, '2015-10-16 05:41:38', '2015-10-16 05:41:38', NULL);
INSERT INTO `we_booking` VALUES(564, 'seat', 57, '0', '0.00', '', 0, NULL, '栏2', '2015-10-15 16:00:00', '2015-11-14 16:00:00', NULL, 294, '2015-10-16 05:41:46', '2015-10-16 05:41:46', NULL);
INSERT INTO `we_booking` VALUES(565, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-10-23 16:00:00', '2015-11-22 16:00:00', NULL, 295, '2015-10-16 05:42:25', '2015-10-16 05:42:25', NULL);
INSERT INTO `we_booking` VALUES(566, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-10-30 16:00:00', '2015-11-29 16:00:00', NULL, 296, '2015-10-16 06:01:13', '2015-10-16 06:01:13', NULL);
INSERT INTO `we_booking` VALUES(567, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-10-30 16:00:00', '2015-11-29 16:00:00', NULL, 297, '2015-10-16 06:09:55', '2015-10-16 06:09:55', NULL);
INSERT INTO `we_booking` VALUES(568, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2015-10-16 15:30:00', '2015-10-16 16:00:00', 1, 298, '2015-10-16 06:27:37', '2015-10-16 06:27:37', NULL);
INSERT INTO `we_booking` VALUES(569, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-10-16 15:30:00', '2015-10-16 16:00:00', 1, 299, '2015-10-16 06:40:18', '2015-10-16 06:40:18', NULL);
INSERT INTO `we_booking` VALUES(570, 'room', 1030, '0', '0.00', '', 0, NULL, '', '2015-10-16 15:30:00', '2015-10-16 16:00:00', 1, 300, '2015-10-16 07:47:24', '2015-10-16 07:47:24', NULL);
INSERT INTO `we_booking` VALUES(571, 'room', 1047, '0', '0.00', '', 0, NULL, '', '2015-10-16 15:30:00', '2015-10-16 16:00:00', 1, 301, '2015-10-16 07:47:56', '2015-10-16 07:47:56', NULL);
INSERT INTO `we_booking` VALUES(572, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-16 17:30:00', '2015-10-16 18:00:00', 1, 302, '2015-10-16 08:19:34', '2015-10-16 08:19:34', NULL);
INSERT INTO `we_booking` VALUES(573, 'room', 1062, '0', '0.00', '', 0, NULL, '', '2015-10-17 16:00:00', '2015-10-17 16:30:00', 1, 303, '2015-10-16 08:24:01', '2015-10-16 08:24:01', NULL);
INSERT INTO `we_booking` VALUES(574, 'room', 1062, '0', '0.00', '', 0, NULL, '', '2015-10-17 17:00:00', '2015-10-17 17:30:00', 1, 303, '2015-10-16 08:24:01', '2015-10-16 08:24:01', NULL);
INSERT INTO `we_booking` VALUES(575, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-16 17:30:00', '2015-10-16 18:00:00', 1, 304, '2015-10-16 08:37:57', '2015-10-16 08:37:57', NULL);
INSERT INTO `we_booking` VALUES(576, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-16 18:00:00', '2015-10-16 18:30:00', 1, 305, '2015-10-16 08:46:16', '2015-10-16 08:46:16', NULL);
INSERT INTO `we_booking` VALUES(577, 'seat', 40, '0', '0.00', '', 0, NULL, '1111', '2015-10-15 16:00:00', '2015-11-14 16:00:00', NULL, 306, '2015-10-16 10:01:45', '2015-10-16 10:01:45', NULL);
INSERT INTO `we_booking` VALUES(578, 'seat', 59, '0', '0.00', '', 0, NULL, 'asdad', '2015-10-15 16:00:00', '2015-11-14 16:00:00', NULL, 307, '2015-10-16 10:05:14', '2015-10-16 10:05:14', NULL);
INSERT INTO `we_booking` VALUES(579, 'room', 1021, '0', '0.00', '', 0, NULL, '', '2015-10-16 17:30:00', '2015-10-16 18:00:00', 1, 308, '2015-10-16 11:55:47', '2015-10-16 11:55:47', NULL);
INSERT INTO `we_booking` VALUES(580, 'seat', 40, '0', '0.00', '', 0, NULL, '1111', '2015-10-19 16:00:00', '2015-11-18 16:00:00', NULL, 309, '2015-10-19 00:47:37', '2015-10-19 00:47:37', NULL);
INSERT INTO `we_booking` VALUES(581, 'seat', 59, '0', '0.00', '', 0, NULL, 'asdad', '2015-10-20 16:00:00', '2015-11-19 16:00:00', NULL, 310, '2015-10-19 00:48:16', '2015-10-19 00:48:16', NULL);
INSERT INTO `we_booking` VALUES(582, 'seat', 60, '0', '0.00', '', 0, NULL, '34242', '2015-10-20 16:00:00', '2015-11-19 16:00:00', NULL, 310, '2015-10-19 00:48:16', '2015-10-19 00:48:16', NULL);
INSERT INTO `we_booking` VALUES(583, 'seat', 61, '0', '0.00', '', 0, NULL, 'sdsds', '2015-10-18 16:00:00', '2015-11-17 16:00:00', NULL, 311, '2015-10-19 00:50:09', '2015-10-19 00:50:09', NULL);
INSERT INTO `we_booking` VALUES(584, 'seat', 58, '0', '0.00', '', 0, NULL, '1111111', '2015-10-18 16:00:00', '2015-11-17 16:00:00', NULL, 312, '2015-10-19 03:02:05', '2015-10-19 03:02:05', NULL);
INSERT INTO `we_booking` VALUES(585, 'seat', 59, '0', '0.00', '', 0, NULL, 'asdad', '2015-10-18 16:00:00', '2015-11-17 16:00:00', NULL, 312, '2015-10-19 03:02:05', '2015-10-19 03:02:05', NULL);
INSERT INTO `we_booking` VALUES(586, 'seat', 61, '0', '0.00', '', 0, NULL, 'sdsds', '2015-10-19 16:00:00', '2015-12-18 16:00:00', NULL, 313, '2015-10-19 04:28:14', '2015-10-19 04:28:14', NULL);
INSERT INTO `we_booking` VALUES(587, 'seat', 63, '0', '0.00', '', 0, NULL, 'sfsfdf', '2015-10-19 16:00:00', '2015-12-18 16:00:00', NULL, 313, '2015-10-19 04:28:14', '2015-10-19 04:28:14', NULL);
INSERT INTO `we_booking` VALUES(588, 'seat', 74, '0', '0.00', '', 0, NULL, 'A1234', '2015-10-19 16:00:00', '2015-11-18 16:00:00', NULL, 314, '2015-10-19 04:36:15', '2015-10-19 04:36:15', NULL);
INSERT INTO `we_booking` VALUES(589, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-10-19 16:00:00', '2015-12-18 16:00:00', NULL, 315, '2015-10-19 04:37:25', '2015-10-19 04:37:25', NULL);
INSERT INTO `we_booking` VALUES(590, 'seat', 40, '0', '0.00', '', 0, NULL, '1111', '2015-10-19 16:00:00', '2015-12-18 16:00:00', NULL, 315, '2015-10-19 04:37:25', '2015-10-19 04:37:25', NULL);
INSERT INTO `we_booking` VALUES(591, 'seat', 61, '0', '0.00', '', 0, NULL, 'sdsds', '2015-10-19 16:00:00', '2015-11-18 16:00:00', NULL, 316, '2015-10-19 04:46:10', '2015-10-19 04:46:10', NULL);
INSERT INTO `we_booking` VALUES(592, 'seat', 82, '0', '0.00', '', 0, NULL, 'A123-01', '2015-10-18 16:00:00', '2015-11-17 16:00:00', NULL, 317, '2015-10-19 06:37:43', '2015-10-19 06:37:43', NULL);
INSERT INTO `we_booking` VALUES(593, 'seat', 83, '0', '0.00', '', 0, NULL, '红色', '2015-10-18 16:00:00', '2015-11-17 16:00:00', NULL, 317, '2015-10-19 06:37:43', '2015-10-19 06:37:43', NULL);
INSERT INTO `we_booking` VALUES(594, 'seat', 58, '0', '0.00', '', 0, NULL, '1111111', '2015-10-19 16:00:00', '2015-12-18 16:00:00', 61, 318, '2015-10-19 06:58:53', '2015-10-19 06:58:53', NULL);
INSERT INTO `we_booking` VALUES(595, 'seat', 59, '0', '0.00', '', 0, NULL, 'asdad', '2015-10-19 16:00:00', '2015-12-18 16:00:00', 61, 318, '2015-10-19 06:58:53', '2015-10-19 06:58:53', NULL);
INSERT INTO `we_booking` VALUES(596, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-21 00:30:00', '2015-10-21 01:00:00', 1, 319, '2015-10-20 05:57:00', '2015-10-20 05:57:00', NULL);
INSERT INTO `we_booking` VALUES(597, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-21 01:00:00', '2015-10-21 01:30:00', 1, 319, '2015-10-20 05:57:00', '2015-10-20 05:57:00', NULL);
INSERT INTO `we_booking` VALUES(598, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-21 01:30:00', '2015-10-21 02:00:00', 1, 319, '2015-10-20 05:57:00', '2015-10-20 05:57:00', NULL);
INSERT INTO `we_booking` VALUES(599, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-22 16:30:00', '2015-12-22 17:00:00', 1, 320, '2015-10-20 09:23:45', '2015-10-20 09:23:45', NULL);
INSERT INTO `we_booking` VALUES(600, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-12-22 17:30:00', '2015-12-22 18:00:00', 1, 320, '2015-10-20 09:23:45', '2015-10-20 09:23:45', NULL);
INSERT INTO `we_booking` VALUES(601, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-10-22 17:30:00', '2015-10-22 18:00:00', 1, 321, '2015-10-21 05:43:44', '2015-10-21 05:43:44', NULL);
INSERT INTO `we_booking` VALUES(602, 'room', 1023, '0', '0.00', '', 0, NULL, '', '2015-10-22 18:30:00', '2015-10-22 19:00:00', 1, 321, '2015-10-21 05:43:44', '2015-10-21 05:43:44', NULL);
INSERT INTO `we_booking` VALUES(603, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-23 16:30:00', '2015-10-23 17:00:00', 1, 322, '2015-10-21 08:46:47', '2015-10-21 08:46:47', NULL);
INSERT INTO `we_booking` VALUES(604, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-22 17:30:00', '2015-10-22 18:00:00', 1, 323, '2015-10-21 09:02:02', '2015-10-21 09:02:02', NULL);
INSERT INTO `we_booking` VALUES(605, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2015-11-20 18:30:00', '2015-11-20 19:00:00', 1, 324, '2015-10-21 09:53:16', '2015-10-21 09:53:16', NULL);
INSERT INTO `we_booking` VALUES(606, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-11-21 17:00:00', '2015-11-21 17:30:00', 1, 452, '2015-10-22 04:03:49', '2015-10-22 04:03:49', NULL);
INSERT INTO `we_booking` VALUES(607, 'room', 1021, '0', '0.00', '', 0, NULL, '', '2015-10-22 18:30:00', '2015-10-22 19:00:00', 1, 453, '2015-10-22 04:06:17', '2015-10-22 04:06:17', NULL);
INSERT INTO `we_booking` VALUES(608, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-21 18:30:00', '2015-11-21 19:00:00', 1, 454, '2015-10-22 04:06:53', '2015-10-22 04:06:53', NULL);
INSERT INTO `we_booking` VALUES(609, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-23 15:30:00', '2015-10-23 16:00:00', 1, 462, '2015-10-22 05:50:59', '2015-10-22 05:50:59', NULL);
INSERT INTO `we_booking` VALUES(610, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-10-23 15:30:00', '2015-10-23 16:00:00', 1, 471, '2015-10-22 06:08:46', '2015-10-22 06:08:46', NULL);
INSERT INTO `we_booking` VALUES(611, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-23 15:00:00', '2015-10-23 15:30:00', 1, 472, '2015-10-22 06:26:26', '2015-10-22 06:26:26', NULL);
INSERT INTO `we_booking` VALUES(612, 'room', 1022, '0', '0.00', '', 0, NULL, '', '2015-10-23 15:30:00', '2015-10-23 16:00:00', 1, 473, '2015-10-22 06:39:30', '2015-10-22 06:39:30', NULL);
INSERT INTO `we_booking` VALUES(613, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-23 16:30:00', '2015-10-23 17:00:00', 1, 474, '2015-10-22 06:45:27', '2015-10-22 06:45:27', NULL);
INSERT INTO `we_booking` VALUES(614, 'room', 1061, '0', '0.00', '', 0, NULL, '', '2015-10-22 15:30:00', '2015-10-22 16:00:00', 1, 475, '2015-10-22 06:56:33', '2015-10-22 06:56:33', NULL);
INSERT INTO `we_booking` VALUES(615, 'room', 1020, '0', '0.00', '', 0, NULL, '', '2015-10-22 15:30:00', '2015-10-22 16:00:00', 1, 477, '2015-10-22 07:27:18', '2015-10-22 07:27:18', NULL);
INSERT INTO `we_booking` VALUES(616, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-22 17:30:00', '2015-10-22 18:00:00', 1, 480, '2015-10-22 09:34:53', '2015-10-22 09:34:53', NULL);
INSERT INTO `we_booking` VALUES(617, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-22 16:30:00', '2015-10-22 17:00:00', 1, 481, '2015-10-22 10:10:05', '2015-10-22 10:10:05', NULL);
INSERT INTO `we_booking` VALUES(618, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-22 16:30:00', '2015-10-22 17:00:00', 1, 482, '2015-10-22 10:34:00', '2015-10-22 10:34:00', NULL);
INSERT INTO `we_booking` VALUES(619, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-10-22 17:30:00', '2015-10-22 18:00:00', 1, 483, '2015-10-22 10:48:02', '2015-10-22 10:48:02', NULL);
INSERT INTO `we_booking` VALUES(620, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-22 15:30:00', '2015-10-22 16:00:00', 1, 484, '2015-10-22 11:16:24', '2015-10-22 11:16:24', NULL);
INSERT INTO `we_booking` VALUES(621, 'room', 1021, '0', '0.00', '', 0, NULL, '', '2015-10-22 16:30:00', '2015-10-22 17:00:00', 1, 485, '2015-10-22 11:29:39', '2015-10-22 11:29:39', NULL);
INSERT INTO `we_booking` VALUES(622, 'room', 1024, '0', '0.00', '', 0, NULL, '', '2015-10-22 16:30:00', '2015-10-22 17:00:00', 1, 486, '2015-10-22 11:45:01', '2015-10-22 11:45:01', NULL);
INSERT INTO `we_booking` VALUES(623, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-10-22 16:30:00', '2015-10-22 17:00:00', 1, 487, '2015-10-22 12:16:44', '2015-10-22 12:16:44', NULL);
INSERT INTO `we_booking` VALUES(624, 'room', 1004, '0', '0.00', '', 0, NULL, '', '2015-11-01 02:30:00', '2015-11-01 18:00:00', 1, 488, '2015-10-22 12:28:17', '2015-10-22 12:28:17', NULL);
INSERT INTO `we_booking` VALUES(625, 'seat', 34, '0', '0.00', '', 0, NULL, 'K2', '2015-10-22 16:00:00', '2015-11-21 16:00:00', 1, 489, '2015-10-23 03:32:26', '2015-10-23 03:32:26', NULL);
INSERT INTO `we_booking` VALUES(626, 'seat', 40, '0', '0.00', '', 0, NULL, '1111', '2015-11-18 16:00:00', '2016-01-17 16:00:00', 1, 512, '2015-10-28 06:03:56', '2015-10-28 06:03:56', NULL);
INSERT INTO `we_booking` VALUES(627, 'seat', 40, '0', '0.00', '', 0, NULL, '1111', '2015-10-29 16:00:00', '2015-11-28 16:00:00', 1, 513, '2015-10-28 07:27:06', '2015-10-28 07:27:06', NULL);
INSERT INTO `we_booking` VALUES(628, 'room', 1004, '0', '0.00', '', 0, NULL, '', '2015-11-25 09:50:00', '2015-12-25 16:00:00', 1, 514, '2015-11-02 11:28:10', '2015-11-02 11:28:10', NULL);
INSERT INTO `we_booking` VALUES(629, 'room', 1004, '0', '0.00', '', 0, NULL, '', '2015-12-27 09:50:00', '2015-12-27 10:50:00', 1, 515, '2015-11-02 11:28:10', '2015-11-02 11:28:10', NULL);
INSERT INTO `we_booking` VALUES(634, 'room', 1047, '0', '0.00', '', 0, NULL, '', '2015-11-03 02:00:00', '2015-11-03 02:30:00', 1, 519, '2015-11-03 01:18:11', '2015-11-03 01:18:11', NULL);
INSERT INTO `we_booking` VALUES(635, 'room', 1064, '0', '0.00', '', 0, NULL, '', '2015-11-03 02:00:00', '2015-11-03 02:30:00', 1, 520, '2015-11-03 01:21:03', '2015-11-03 01:21:03', NULL);
INSERT INTO `we_booking` VALUES(632, 'seat', 51, '0', '0.00', '', 0, NULL, '二栋', '2015-11-10 16:00:00', '2015-12-10 16:00:00', 1, 517, '2015-11-02 09:12:04', '2015-11-02 09:12:04', NULL);
INSERT INTO `we_booking` VALUES(633, 'seat', 50, '0', '0.00', '', 0, NULL, '一栋', '2015-11-12 16:00:00', '2015-12-12 16:00:00', 1, 518, '2015-11-02 10:53:57', '2015-11-02 10:53:57', NULL);
INSERT INTO `we_booking` VALUES(636, 'room', 1064, '0', '0.00', '', 0, NULL, '', '2015-11-03 03:00:00', '2015-11-03 03:30:00', 1, 521, '2015-11-03 01:23:29', '2015-11-03 01:23:29', NULL);
INSERT INTO `we_booking` VALUES(637, 'room', 1064, '0', '0.00', '', 0, NULL, '', '2015-11-03 04:00:00', '2015-11-03 04:30:00', 1, 522, '2015-11-03 01:31:18', '2015-11-03 01:31:18', NULL);
INSERT INTO `we_booking` VALUES(638, 'room', 1064, '0', '0.00', '', 0, NULL, '', '2015-11-03 05:00:00', '2015-11-03 05:30:00', 1, 523, '2015-11-03 02:10:40', '2015-11-03 02:10:40', NULL);
INSERT INTO `we_booking` VALUES(639, 'room', 1064, '0', '0.00', '', 0, NULL, '', '2015-11-03 06:00:00', '2015-11-03 06:30:00', 1, 524, '2015-11-03 02:17:36', '2015-11-03 02:17:36', NULL);
INSERT INTO `we_booking` VALUES(640, 'room', 1064, '0', '0.00', '', 0, NULL, '', '2015-11-03 07:00:00', '2015-11-03 07:30:00', 1, 525, '2015-11-03 02:35:48', '2015-11-03 02:35:48', NULL);
INSERT INTO `we_booking` VALUES(641, 'room', 1064, '0', '0.00', '', 0, NULL, '', '2015-11-03 08:00:00', '2015-11-03 08:30:00', 1, 526, '2015-11-03 02:40:10', '2015-11-03 02:40:10', NULL);
INSERT INTO `we_booking` VALUES(642, 'room', 1064, '0', '0.00', '', 0, NULL, '', '2015-11-03 09:00:00', '2015-11-03 09:30:00', 1, 527, '2015-11-03 02:43:41', '2015-11-03 02:43:41', NULL);
INSERT INTO `we_booking` VALUES(643, 'seat', 60, '0', '0.00', '', 0, NULL, '34242', '2015-11-04 16:00:00', '2015-12-04 16:00:00', 1, 528, '2015-11-03 11:37:21', '2015-11-03 11:37:21', NULL);
INSERT INTO `we_booking` VALUES(644, 'room', 1004, '0', '0.00', '', 0, NULL, '', '2015-12-27 11:00:00', '2015-12-27 11:30:00', 1, 529, '2015-11-03 11:52:10', '2015-11-03 11:52:10', NULL);
INSERT INTO `we_booking` VALUES(645, 'room', 1004, '0', '0.00', '', 0, NULL, '', '2015-12-27 11:30:00', '2015-12-27 12:00:00', 1, 529, '2015-11-03 11:52:10', '2015-11-03 11:52:10', NULL);
INSERT INTO `we_booking` VALUES(646, 'room', 1057, '0', '0.00', '', 0, NULL, '', '2015-12-28 12:00:00', '2015-12-28 12:30:00', 1, 530, '2015-11-03 11:56:52', '2015-11-03 11:56:52', NULL);
INSERT INTO `we_booking` VALUES(647, 'room', 1057, '0', '0.00', '', 0, NULL, '', '2015-12-27 11:30:00', '2015-12-27 12:00:00', 1, 530, '2015-11-03 11:56:52', '2015-11-03 11:56:52', NULL);
INSERT INTO `we_booking` VALUES(648, 'room', 1004, '0', '0.00', '', 0, NULL, '', '2015-12-27 11:00:00', '2015-12-27 11:30:00', 1, 531, '2015-11-04 02:49:49', '2015-11-04 02:49:49', NULL);
INSERT INTO `we_booking` VALUES(649, 'room', 1004, '0', '0.00', '', 0, NULL, '', '2015-12-27 11:30:00', '2015-12-27 12:00:00', 1, 531, '2015-11-04 02:49:49', '2015-11-04 02:49:49', NULL);
INSERT INTO `we_booking` VALUES(657, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 15:30:00', '2015-11-04 16:00:00', 1, 537, '2015-11-04 06:56:06', '2015-11-04 06:56:06', NULL);
INSERT INTO `we_booking` VALUES(656, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2016-11-03 18:00:00', '2016-11-03 18:30:00', 1, 536, '2015-11-04 06:37:34', '2015-11-04 06:37:34', NULL);
INSERT INTO `we_booking` VALUES(655, 'room', 1007, '0', '0.00', '', 0, NULL, '', '2015-12-03 17:30:00', '2015-12-03 18:00:00', 1, 535, '2015-11-04 05:59:14', '2015-11-04 05:59:14', NULL);
INSERT INTO `we_booking` VALUES(654, 'room', 1010, '0', '0.00', '', 0, NULL, '', '2015-11-05 15:30:00', '2015-11-05 16:00:00', 1, 534, '2015-11-04 05:58:25', '2015-11-04 05:58:25', NULL);
INSERT INTO `we_booking` VALUES(658, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 15:00:00', '2015-11-04 15:30:00', 1, 538, '2015-11-04 07:01:32', '2015-11-04 07:01:32', NULL);
INSERT INTO `we_booking` VALUES(659, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 15:30:00', '2015-11-04 16:00:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(660, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 15:00:00', '2015-11-04 15:30:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(661, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 14:00:00', '2015-11-04 14:30:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(662, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 14:30:00', '2015-11-04 15:00:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(663, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 13:00:00', '2015-11-04 13:30:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(664, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 13:30:00', '2015-11-04 14:00:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(665, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 12:00:00', '2015-11-04 12:30:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(666, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 12:30:00', '2015-11-04 13:00:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(667, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 11:00:00', '2015-11-04 11:30:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(668, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-17 11:30:00', '2015-11-17 12:00:00', 1, 539, '2015-11-04 07:30:46', '2015-11-04 07:30:46', NULL);
INSERT INTO `we_booking` VALUES(669, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 15:30:00', '2015-11-04 16:00:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(670, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 15:00:00', '2015-11-10 15:30:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(671, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 14:00:00', '2015-11-10 14:30:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(672, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 14:30:00', '2015-11-10 15:00:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(673, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 13:30:00', '2015-11-10 14:00:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(674, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 13:00:00', '2015-11-10 13:30:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(675, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 12:00:00', '2015-11-10 12:30:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(676, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-08 12:30:00', '2015-11-08 13:00:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(677, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 11:30:00', '2015-11-10 12:00:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(678, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 11:00:00', '2015-11-10 11:30:00', 1, 540, '2015-11-04 07:47:36', '2015-11-04 07:47:36', NULL);
INSERT INTO `we_booking` VALUES(679, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-10 15:30:00', '2015-11-09 16:00:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(680, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-09 15:00:00', '2015-11-09 15:30:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(681, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-11 14:00:00', '2015-11-11 14:30:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(682, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-11 14:30:00', '2015-11-11 15:00:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(683, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-04 13:30:00', '2015-11-04 14:00:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(684, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-09 13:00:00', '2015-11-09 13:30:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(685, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-06 12:00:00', '2015-11-06 12:30:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(686, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-06 12:30:00', '2015-11-06 13:00:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(687, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-06 11:00:00', '2015-11-06 11:30:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(688, 'room', 1003, '0', '0.00', '', 0, NULL, '', '2015-11-17 11:30:00', '2015-11-17 12:00:00', 1, 541, '2015-11-04 08:03:32', '2015-11-04 08:03:32', NULL);
INSERT INTO `we_booking` VALUES(689, 'room', 1021, '0', '0.00', '', 0, NULL, '', '2015-11-06 17:30:00', '2015-11-06 18:00:00', 1, 542, '2015-11-04 08:49:46', '2015-11-04 08:49:46', NULL);
INSERT INTO `we_booking` VALUES(690, 'room', 1021, '0', '0.00', '', 0, NULL, '', '2015-11-07 18:30:00', '2015-11-07 19:00:00', 1, 542, '2015-11-04 08:49:46', '2015-11-04 08:49:46', NULL);
INSERT INTO `we_booking` VALUES(691, 'room', 1029, '0', '2131.00', 'boardroom', 35, NULL, '', '2015-11-06 16:00:00', '2015-11-06 16:30:00', 1, 543, '2015-11-05 06:37:34', '2015-11-05 06:37:34', NULL);
INSERT INTO `we_booking` VALUES(692, 'room', 1029, 'A004', '2131.00', 'boardroom', 35, '/data/uploads/1444265272_Hydrangeas.jpg', '', '2015-11-07 16:00:00', '2015-11-07 16:30:00', 1, 544, '2015-11-05 06:40:31', '2015-11-05 06:40:31', NULL);
INSERT INTO `we_booking` VALUES(693, 'room', 1029, 'A004', '2131.00', 'boardroom', 35, '/data/uploads/1444265272_Hydrangeas.jpg', '', '2015-11-19 16:00:00', '2015-11-19 16:30:00', 1, 579, '2015-11-18 06:43:34', '2015-11-18 06:43:34', NULL);
INSERT INTO `we_booking` VALUES(694, 'seat', 50, '0', '0.00', '', 0, NULL, '一栋', '2015-12-23 16:00:00', '2016-01-22 16:00:00', 1, 580, '2015-12-24 08:10:51', '2015-12-24 08:10:51', NULL);
INSERT INTO `we_booking` VALUES(695, 'seat', 51, '0', '0.00', '', 0, NULL, '二栋', '2015-12-23 16:00:00', '2016-01-22 16:00:00', 1, 581, '2015-12-24 08:22:05', '2015-12-24 08:22:05', NULL);
INSERT INTO `we_booking` VALUES(696, 'seat', 34, 'A111', '0.00', '', 0, NULL, 'K2', '2015-12-24 16:00:00', '2016-01-23 16:00:00', 1, 582, '2015-12-24 08:42:52', '2015-12-24 08:42:52', NULL);
INSERT INTO `we_booking` VALUES(697, 'seat', 40, 'B001', '0.00', '', 0, NULL, '1111', '2015-12-24 16:00:00', '2016-01-23 16:00:00', 1, 582, '2015-12-24 08:42:52', '2015-12-24 08:42:52', NULL);
INSERT INTO `we_booking` VALUES(698, 'seat', 54, 'B002', '0.00', '', 0, NULL, '办公', '2015-12-24 16:00:00', '2016-01-23 16:00:00', 1, 582, '2015-12-24 08:42:52', '2015-12-24 08:42:52', NULL);
INSERT INTO `we_booking` VALUES(699, 'seat', 55, 'B002', '0.00', '', 0, NULL, '娱乐', '2015-12-24 16:00:00', '2016-01-23 16:00:00', 1, 582, '2015-12-24 08:42:52', '2015-12-24 08:42:52', NULL);
INSERT INTO `we_booking` VALUES(700, 'seat', 56, 'B002', '0.00', '', 0, NULL, '商品', '2015-12-24 16:00:00', '2016-01-23 16:00:00', 1, 582, '2015-12-24 08:42:52', '2015-12-24 08:42:52', NULL);
INSERT INTO `we_booking` VALUES(701, 'seat', 57, 'B001', '0.00', '', 0, NULL, '栏2', '2015-12-24 16:00:00', '2016-01-23 16:00:00', 1, 582, '2015-12-24 08:42:52', '2015-12-24 08:42:52', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_charging`
--

TRUNCATE TABLE `we_charging`;
--
-- 转存表中的数据 `we_charging`
--

INSERT INTO `we_charging` VALUES(1, 1, '朱元璋', '5.00', '2015-10-22 03:19:33', '2015-10-27 06:00:00', 1, 0, 501, '2015-09-08 06:12:33', '2015-09-08 06:12:36', NULL);
INSERT INTO `we_charging` VALUES(2, 1, '张张', '5.00', '2015-09-14 06:43:20', '2015-10-27 06:00:00', 19, 0, 501, '2015-11-02 11:28:10', '2015-11-02 11:28:10', NULL);
INSERT INTO `we_charging` VALUES(214, 3, '朱元璋', '5.00', '2015-10-26 10:00:00', '2015-10-27 06:00:00', 1, 2, 469, '2015-10-26 10:36:03', '2015-10-26 10:36:03', NULL);
INSERT INTO `we_charging` VALUES(218, 1, '朱元璋', '5.00', '2015-10-27 05:27:48', '2015-10-27 06:00:00', 1, 2, 501, '2015-11-02 11:28:10', '2015-11-02 11:28:10', NULL);
INSERT INTO `we_charging` VALUES(222, 1, '朱元璋', '5.00', '2015-10-27 00:00:00', '2015-10-27 03:00:00', 1, 2, 504, '2015-10-27 05:47:17', '2015-10-27 05:47:17', NULL);
INSERT INTO `we_charging` VALUES(223, 1, '朱元璋', '5.00', '2015-10-27 04:00:00', '2015-10-27 07:00:00', 1, 2, 511, '2015-10-27 04:00:00', '2015-10-27 04:00:00', NULL);
INSERT INTO `we_charging` VALUES(225, 1, '朱元璋', '5.00', '2015-10-27 08:19:17', '2015-10-27 08:21:47', 1, 2, 506, '2015-10-27 08:19:30', '2015-10-27 08:19:30', NULL);
INSERT INTO `we_charging` VALUES(227, 1, '朱元璋', '5.00', '2015-10-27 08:40:11', '2015-10-27 08:50:35', 1, 2, 509, '2015-10-27 08:49:01', '2015-10-27 08:49:01', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_charging_type`
--

TRUNCATE TABLE `we_charging_type`;
--
-- 转存表中的数据 `we_charging_type`
--

INSERT INTO `we_charging_type` VALUES(1, '洗浴', '5.00', '采用最新淋浴系统，给你别样的体验。', '2015-09-08 06:11:02', '2015-10-16 07:01:53', NULL);
INSERT INTO `we_charging_type` VALUES(2, '上网', '6.00', NULL, '2015-09-09 06:02:03', '2015-09-14 03:53:19', '2015-10-22 08:15:41');
INSERT INTO `we_charging_type` VALUES(3, '睡眠舱', '5.00', '安静，舒适，整洁。', '2015-09-14 04:25:47', '2015-10-16 07:02:06', NULL);
INSERT INTO `we_charging_type` VALUES(8, 'cs2', '0.00', NULL, '2015-09-16 05:26:17', '2015-09-16 05:26:17', '2015-10-22 08:15:20');
INSERT INTO `we_charging_type` VALUES(9, 'cs3', '0.00', NULL, '2015-09-16 05:26:43', '2015-09-16 05:26:43', '2015-10-22 08:15:24');
INSERT INTO `we_charging_type` VALUES(10, 'cs4', '0.00', NULL, '2015-09-16 05:26:52', '2015-09-16 05:26:52', '2015-10-22 08:15:26');
INSERT INTO `we_charging_type` VALUES(11, 'cs5', '0.00', NULL, '2015-09-16 05:27:03', '2015-09-16 05:27:03', '2015-10-22 08:15:28');
INSERT INTO `we_charging_type` VALUES(12, 'cs6', '20.00', NULL, '2015-09-16 05:27:19', '2015-09-17 07:44:04', '2015-10-22 08:15:30');
INSERT INTO `we_charging_type` VALUES(13, 'cs7', '33.00', '', '2015-09-16 05:27:30', '2015-09-25 00:59:34', '2015-10-22 08:15:33');
INSERT INTO `we_charging_type` VALUES(16, '111', '0.00', '', '2015-09-18 06:37:41', '2015-09-24 07:48:04', '2015-10-22 08:15:35');
INSERT INTO `we_charging_type` VALUES(17, '888', '2.00', '', '2015-09-23 01:19:16', '2015-10-21 08:25:37', '2015-10-22 08:15:37');
INSERT INTO `we_charging_type` VALUES(18, '12', '8.00', NULL, '2015-10-23 07:32:13', '2015-10-23 07:32:16', '2015-10-23 08:20:52');

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

INSERT INTO `we_company` VALUES(15, '02级1班', '', '2015-09-01 01:04:06', '2016-05-11 13:09:19', NULL);
INSERT INTO `we_company` VALUES(19, '02级2班', '', '2015-09-16 01:22:32', '2016-05-11 13:09:30', NULL);
INSERT INTO `we_company` VALUES(22, '03级2班', 'aaa', '2015-09-16 07:22:04', '2016-05-11 13:09:54', NULL);
INSERT INTO `we_company` VALUES(20, '03级1班', 'ttt', '2015-09-16 01:38:59', '2016-05-11 13:09:42', NULL);
INSERT INTO `we_company` VALUES(33, 'cs1', '', '2015-09-25 02:26:08', '2015-10-16 01:20:15', '2015-10-16 01:20:15');
INSERT INTO `we_company` VALUES(37, 'as', 'saf', '2015-10-14 08:32:54', '2015-10-14 08:33:17', '2015-10-14 08:33:17');
INSERT INTO `we_company` VALUES(39, 'asfasg', 'sdag', '2015-10-14 09:00:46', '2015-10-14 09:01:20', '2015-10-14 09:01:20');
INSERT INTO `we_company` VALUES(29, '04级1班', '', '2015-09-17 03:13:16', '2016-05-11 13:10:06', NULL);
INSERT INTO `we_company` VALUES(38, 'asfas', 'aga', '2015-10-14 08:33:00', '2015-10-14 08:33:12', '2015-10-14 08:33:12');
INSERT INTO `we_company` VALUES(30, '04级2班', '1', '2015-09-24 06:29:49', '2016-05-11 13:10:20', NULL);
INSERT INTO `we_company` VALUES(31, '新闻网易', '2', '2015-09-24 06:30:20', '2016-05-10 12:22:58', '2016-05-10 12:22:58');
INSERT INTO `we_company` VALUES(40, 'cs1', '', '2015-10-16 01:20:20', '2016-05-10 12:23:00', '2016-05-10 12:23:00');
INSERT INTO `we_company` VALUES(36, '名称名称名称', '名称名称名称名称', '2015-10-14 08:31:28', '2015-10-14 08:33:17', '2015-10-14 08:33:17');
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_equpt`
--

TRUNCATE TABLE `we_equpt`;
--
-- 转存表中的数据 `we_equpt`
--

INSERT INTO `we_equpt` VALUES(1, 1, 1, '2015-10-20 08:36:03', '2015-10-21 08:36:07', NULL);
INSERT INTO `we_equpt` VALUES(2, 7, 1, '2015-10-13 08:36:20', '2015-10-23 08:13:02', '2015-10-23 08:13:02');
INSERT INTO `we_equpt` VALUES(3, 337, 3, '2015-10-19 08:36:35', '2015-10-22 11:01:49', '2015-10-22 11:01:49');
INSERT INTO `we_equpt` VALUES(4, 3, 1, '2015-10-21 09:38:00', '2015-10-21 09:38:00', NULL);
INSERT INTO `we_equpt` VALUES(5, 4, 1, '2015-10-21 09:38:00', '2015-10-21 09:38:00', NULL);
INSERT INTO `we_equpt` VALUES(6, 5, 1, '2015-10-21 11:18:23', '2015-10-21 11:18:23', NULL);
INSERT INTO `we_equpt` VALUES(7, 6, 1, '2015-10-21 11:18:23', '2015-10-21 11:18:23', NULL);
INSERT INTO `we_equpt` VALUES(8, 2, 1, '2015-10-21 11:22:10', '2015-10-21 11:22:10', NULL);
INSERT INTO `we_equpt` VALUES(9, 8, 1, '2015-10-21 11:22:10', '2015-10-21 11:22:10', NULL);
INSERT INTO `we_equpt` VALUES(10, 9, 1, '2015-10-21 11:22:10', '2015-10-21 11:22:10', NULL);
INSERT INTO `we_equpt` VALUES(11, 10, 1, '2015-10-21 11:22:10', '2015-10-23 08:12:28', '2015-10-23 08:12:28');
INSERT INTO `we_equpt` VALUES(12, 11, 1, '2015-10-21 11:26:03', '2015-10-21 11:26:03', NULL);
INSERT INTO `we_equpt` VALUES(13, 12, 1, '2015-10-21 11:26:03', '2015-10-22 01:41:25', '2015-10-22 01:41:25');
INSERT INTO `we_equpt` VALUES(14, 12, 1, '2015-10-21 11:26:03', '2015-10-21 11:26:03', NULL);
INSERT INTO `we_equpt` VALUES(15, 13, 1, '2015-10-21 11:26:03', '2015-10-21 11:26:03', NULL);
INSERT INTO `we_equpt` VALUES(16, 14, 1, '2015-10-21 11:26:03', '2015-10-21 11:26:03', NULL);
INSERT INTO `we_equpt` VALUES(17, 16, 1, '2015-10-21 11:26:03', '2015-10-22 01:27:59', '2015-10-22 01:27:59');
INSERT INTO `we_equpt` VALUES(18, 15, 1, '2015-10-21 11:26:03', '2015-10-23 08:12:28', '2015-10-23 08:12:28');
INSERT INTO `we_equpt` VALUES(19, 16, 1, '2015-10-21 11:26:03', '2015-10-21 11:26:03', NULL);
INSERT INTO `we_equpt` VALUES(20, 334, 3, '2015-10-22 00:56:31', '2015-10-22 01:29:47', '2015-10-22 01:29:47');
INSERT INTO `we_equpt` VALUES(21, 335, 3, '2015-10-22 00:56:31', '2015-10-22 10:43:16', '2015-10-22 10:43:16');
INSERT INTO `we_equpt` VALUES(22, 17, 1, '2015-10-22 01:28:40', '2015-10-22 01:28:40', NULL);
INSERT INTO `we_equpt` VALUES(23, 339, 3, '2015-10-22 01:29:47', '2015-10-23 01:43:28', '2015-10-23 01:43:28');
INSERT INTO `we_equpt` VALUES(24, 18, 1, '2015-10-22 01:41:25', '2015-10-22 01:41:25', NULL);
INSERT INTO `we_equpt` VALUES(25, 21, 1, '2015-10-22 02:03:10', '2015-10-22 02:03:10', NULL);
INSERT INTO `we_equpt` VALUES(26, 201, 3, '2015-10-23 01:43:51', '2015-10-23 06:12:41', '2015-10-23 06:12:41');
INSERT INTO `we_equpt` VALUES(27, 40, 3, '2015-10-23 01:43:51', '2015-10-23 01:43:51', NULL);
INSERT INTO `we_equpt` VALUES(28, 39, 3, '2015-10-23 01:43:51', '2015-10-23 01:43:51', NULL);
INSERT INTO `we_equpt` VALUES(29, 203, 3, '2015-10-23 01:43:51', '2015-10-23 06:21:53', '2015-10-23 06:21:53');
INSERT INTO `we_equpt` VALUES(30, 205, 3, '2015-10-23 01:43:51', '2015-10-23 01:56:59', '2015-10-23 01:56:59');
INSERT INTO `we_equpt` VALUES(31, 38, 3, '2015-10-23 01:45:01', '2015-10-23 01:45:01', NULL);
INSERT INTO `we_equpt` VALUES(32, 20, 1, '2015-10-23 01:46:31', '2015-10-23 01:46:31', NULL);
INSERT INTO `we_equpt` VALUES(33, 205, 3, '2015-10-23 01:48:55', '2015-10-23 06:12:42', '2015-10-23 06:12:42');
INSERT INTO `we_equpt` VALUES(34, 37, 3, '2015-10-23 01:50:20', '2015-10-23 01:50:20', NULL);
INSERT INTO `we_equpt` VALUES(35, 36, 3, '2015-10-23 06:21:53', '2015-10-23 06:21:53', NULL);
INSERT INTO `we_equpt` VALUES(36, 35, 3, '2015-10-23 06:21:53', '2015-10-23 06:21:53', NULL);
INSERT INTO `we_equpt` VALUES(37, 34, 3, '2015-10-23 08:06:17', '2015-10-30 07:33:54', '2015-10-30 07:33:54');
INSERT INTO `we_equpt` VALUES(38, 22, 1, '2015-10-23 08:12:28', '2015-10-23 08:12:28', NULL);
INSERT INTO `we_equpt` VALUES(39, 10, 1, '2015-10-23 08:12:28', '2015-10-23 08:12:28', NULL);
INSERT INTO `we_equpt` VALUES(40, 430254, 3, '2015-10-27 08:03:01', '2015-10-27 08:03:01', NULL);
INSERT INTO `we_equpt` VALUES(41, 889, 3, '2015-10-30 07:34:34', '2015-10-30 07:34:34', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_fact`
--

TRUNCATE TABLE `we_fact`;
--
-- 转存表中的数据 `we_fact`
--

INSERT INTO `we_fact` VALUES(1, '洗澡(fact)', '10.00', '2015-09-01 06:34:20', '2015-09-01 06:34:28', NULL);
INSERT INTO `we_fact` VALUES(2, '住宿', '50.00', '2015-09-08 02:09:11', '0000-00-00 00:00:00', NULL);

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
--
-- 转存表中的数据 `we_floor`
--

INSERT INTO `we_floor` VALUES(61, '12323', '/data/uploads/1462853889_226415.png', NULL, NULL, 0, NULL, NULL, '2015-09-23 07:57:19', '2016-05-10 04:18:09');
INSERT INTO `we_floor` VALUES(63, '123132', '/data/uploads/1462853881_87973.png', NULL, NULL, 0, NULL, NULL, '2015-09-23 08:10:10', '2016-05-10 04:18:01');
INSERT INTO `we_floor` VALUES(88, 'dddd', '/data/uploads/1462853898_283139.png', 0, NULL, 0, NULL, NULL, '2015-10-23 06:41:02', '2016-05-10 04:18:18');
INSERT INTO `we_floor` VALUES(79, 'A301', '/data/uploads/1462853867_486901.png', NULL, NULL, 0, NULL, NULL, '2015-10-13 10:14:42', '2016-05-10 04:17:47');

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
--
-- 转存表中的数据 `we_floor_room_mst`
--

INSERT INTO `we_floor_room_mst` VALUES(1, 'L1', 'map-img.png', 1, '西服 休闲装 鞋 金银珠宝', 0, NULL, NULL, '0000-00-00 00:00:00', '2015-07-15 07:18:33');
INSERT INTO `we_floor_room_mst` VALUES(3, 'L2', 'map-imgB1.png', 2, '运动服饰 女鞋 黄金饰品 化妆品', 0, NULL, NULL, '0000-00-00 00:00:00', '2015-07-15 07:18:35');

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
--
-- 转存表中的数据 `we_floor_store`
--

INSERT INTO `we_floor_store` VALUES('1_1', 1, 33, '101', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_2', 1, 35, '102', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('2_1', 3, 53, '201', '2015-07-22 09:25:53', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('2_2', 3, 59, '202', '2015-07-22 09:25:53', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_3', 1, 31, '103', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_4', 1, 34, '104', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_5', 1, 32, '105', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_6', 1, 41, '106', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_7', 1, 44, '107', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_8', 1, 45, '108', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_9', 1, 46, '109', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('1_10', 1, 47, '110', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('2_3', 3, 43, '203', '2015-07-22 09:33:29', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('2_4', 3, 61, '204', '2015-07-22 09:33:29', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_floor_store` VALUES('2_5', 3, 62, '205', '2015-07-22 09:33:29', '0000-00-00 00:00:00', NULL);

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
--
-- 转存表中的数据 `we_goods`
--

INSERT INTO `we_goods` VALUES(8, 0, '147', '123', '11.00', '', '/data/uploads/1447058688_Lighthouse.jpg', '2015-11-10 03:22:17', '2015-11-10 03:21:11', NULL);
INSERT INTO `we_goods` VALUES(11, 0, 'sa', 'kele', '12.00', '', '/data/uploads/1447131917_Desert.jpg', '2015-11-10 05:27:52', '2015-11-10 05:24:18', NULL);
INSERT INTO `we_goods` VALUES(12, 0, '11', '11', '5.00', '', '', '2015-11-10 05:31:35', '2015-11-10 05:30:29', NULL);
INSERT INTO `we_goods` VALUES(13, 0, '11', '11wwwww', '5.00', '', '', '2015-11-10 10:41:23', '2015-11-10 10:41:23', NULL);
INSERT INTO `we_goods` VALUES(14, 0, '12', '256', '5.00', '', '', '2015-11-11 01:39:09', '2015-11-11 01:38:04', NULL);
INSERT INTO `we_goods` VALUES(15, 0, '11', '12', '5.00', '', '', '2015-11-11 02:17:12', '2015-11-11 02:01:45', NULL);
INSERT INTO `we_goods` VALUES(16, 0, '12', '12', '5.00', '', '', '2015-11-11 02:02:04', '2015-11-11 02:02:04', NULL);
INSERT INTO `we_goods` VALUES(27, 0, '13', '123', '111.00', '', '', '2015-11-12 03:13:42', '2015-11-11 03:52:14', NULL);
INSERT INTO `we_goods` VALUES(18, 0, '1471', '11', '5.00', '', '', '2015-11-11 02:50:54', '2015-11-11 02:50:54', NULL);
INSERT INTO `we_goods` VALUES(19, 0, '11', '12', '5.00', '', '', '2015-11-11 02:51:33', '2015-11-11 02:51:33', NULL);
INSERT INTO `we_goods` VALUES(28, 0, '13', '123', '111.00', '', '/data/uploads/1463026840_812000.png', '2016-05-12 04:20:40', '2016-05-12 04:20:40', NULL);
INSERT INTO `we_goods` VALUES(21, 0, '11', '256', '5.00', '', '', '2015-11-11 03:35:03', '2015-11-11 03:35:03', NULL);
INSERT INTO `we_goods` VALUES(22, 0, '11', 'kele', '5.00', '', '', '2015-11-11 03:36:16', '2015-11-11 03:36:16', NULL);
INSERT INTO `we_goods` VALUES(23, 0, '1471', 'kele', '5.00', '', '', '2015-11-11 03:36:32', '2015-11-11 03:36:32', NULL);
INSERT INTO `we_goods` VALUES(24, 0, '147111', 'kele', '1111.00', '', '', '2015-11-11 03:50:21', '2015-11-11 03:43:54', NULL);
INSERT INTO `we_goods` VALUES(25, 0, '1471', '111', '154.00', '', '', '2015-11-11 03:51:58', '2015-11-11 03:51:58', NULL);

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
--
-- 转存表中的数据 `we_member`
--

INSERT INTO `we_member` VALUES(1, 'admin', NULL, '$2y$10$1UGHtJ2g18FFnK0RPkKfT.7950Txelib8vJzFlDqHQsWDB6OPSaeG', 'admin', 1, 0, '2015-09-23 08:25:08', '127.0.0.1', 319, 0, NULL, 'Ljr1NxGNQInVmqvnUnTWrC4Vqu6McY82lJ9hG52LWD73fzHMMacVaY32WmMC', '2015-09-23 08:25:08', '0000-00-00 00:00:00', NULL, '175.00', NULL, NULL);
INSERT INTO `we_member` VALUES(18, '12345543', '15222329536', '$2y$10$XrtqjjhLYzQSR9f6dgYTqON3tAPnjQVt/AJEpn6Bft16k0Y.0J6Oe', NULL, 1, 0, '2015-09-10 06:17:06', '127.0.0.1', 2, 0, '店铺用户', 'MvyRuwIh2TpYFJTQIVdu5l0lIlKV8MkTyzSvj03OGlxGH8I4tg7O7cIEarHP', '2015-09-16 02:16:53', '2015-08-31 08:40:56', NULL, '643.00', '天津恒通', NULL);
INSERT INTO `we_member` VALUES(19, 'asdw', '11111111111', '$2y$10$xLluwxVriaRZInTXmfoqz.gvor.AUdeqsfe3jtVflWsMCvWD/hqX2', NULL, 0, 0, '2015-09-16 02:10:46', '127.0.0.1', 1, 0, NULL, '62xS4BCxZYHiZM6aPZDCJQHS4EG9tnPmZAJA4PIgC9BtRcqFR0xK1kr4Vwqc', '2015-09-16 02:10:58', '2015-08-31 08:58:27', NULL, '606.00', 'dfg ', NULL);
INSERT INTO `we_member` VALUES(26, '', '15233658478', '$2y$10$VMnQmwtdDO51uflbhbRf6e2oLe7hmAb8cjUofWh/CyM0TWCWMFQy.', NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2015-09-16 01:26:46', '2015-09-16 01:26:15', NULL, '33.00', '上海仪表', NULL);
INSERT INTO `we_member` VALUES(27, '', '12333212341', '$2y$10$1VVkFbaetXbwTvjAbG7om.5DsC/nvQgaZQh12hhd9BBm26VEqWXjy', NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2015-09-16 02:42:10', '2015-09-16 02:42:10', NULL, NULL, '', NULL);
INSERT INTO `we_member` VALUES(28, '', '13214111111', '$2y$10$sLUjQqrIGyShfAUEVHUBPOffqLBljAf5JsQ4djP69uC/zPYwXwL3C', NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2015-09-16 02:43:46', '2015-09-16 02:43:46', NULL, NULL, '', NULL);
INSERT INTO `we_member` VALUES(29, '', '11111112222', '$2y$10$oNG89Bjj/hRGtNPwOz6lb.0zTpQA6yqiXS4kOy.XPOntABeAHvyp6', NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2015-09-16 03:59:47', '2015-09-16 03:59:47', NULL, NULL, '', NULL);
INSERT INTO `we_member` VALUES(30, '', '15555555555', '$2y$10$xJSOayKDWZwvYFc5xxTeCuIANLPCY2L3bgl73Ynzme63QWu.fCfm2', NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2015-09-16 05:32:44', '2015-09-16 05:32:44', NULL, NULL, '1212', NULL);
INSERT INTO `we_member` VALUES(31, '', '13333333333', '$2y$10$URLr9UYGgv2jf2bZ.IdZze7L0OwLGGq6f1fz2WJKoIs6eaqOYVfaK', NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2015-09-16 05:33:01', '2015-09-16 05:33:01', NULL, NULL, '1212', NULL);
INSERT INTO `we_member` VALUES(32, '', '13999999999', '$2y$10$Vs0zOG38C9wm4BDzkHUXCOzMXyuxH6znd/AOH0yiq2bhLBJiN.rUW', NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2015-09-16 05:33:20', '2015-09-16 05:33:20', NULL, NULL, '1212', NULL);
INSERT INTO `we_member` VALUES(33, '', '18888888888', '$2y$10$FVcorZMOwaswutOIf78Ra.ql.5.fYqh5W5Tuubd.phGsLA8sjmRE2', NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2015-09-16 05:41:49', '2015-09-16 05:41:49', NULL, NULL, '1212', NULL);

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
  `status` tinyint(3) UNSIGNED DEFAULT '99' COMMENT '订单状态（0：未出勤；1：已出勤；2:迟到；99:未记入）',
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
  `check_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间（软删除）',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `buyer_phone` (`buyer_phone`,`attendance_date`)
) ENGINE=InnoDB AUTO_INCREMENT=678 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_order`
--

TRUNCATE TABLE `we_order`;
--
-- 转存表中的数据 `we_order`
--

INSERT INTO `we_order` VALUES(650, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161111', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(651, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161112', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(652, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161113', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(653, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161114', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(654, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161115', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(655, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161116', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(656, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161117', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(657, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161118', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(658, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161119', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(659, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161120', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(660, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161121', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(661, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161122', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(662, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161123', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(663, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161124', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(664, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161125', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(665, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161126', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(666, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161127', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(667, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161128', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(668, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161129', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(669, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '18622185062', '', NULL, NULL, NULL, '0.00', '20161130', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(670, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20161111', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(671, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20161112', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(672, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20161113', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(673, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20161114', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(674, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20161115', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(675, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20161116', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(676, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20161117', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);
INSERT INTO `we_order` VALUES(677, '', NULL, 0, NULL, 99, 0, NULL, NULL, NULL, '11111111111', '', NULL, NULL, NULL, '0.00', '20161118', '0000-00-00 00:00:00', '2016-05-14 06:27:18', '2016-05-14 06:27:18', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_order_change_log`
--

TRUNCATE TABLE `we_order_change_log`;
--
-- 转存表中的数据 `we_order_change_log`
--

INSERT INTO `we_order_change_log` VALUES(16, 28, '{"order_amount1":"300.00","order_amount2":"500"}', '{"status1":0,"status2":"1"}', '2015-09-15 05:34:56', '2015-09-15 05:34:56', '2015-09-15 05:35:03');
INSERT INTO `we_order_change_log` VALUES(17, 28, '{"order_amount1":"500.00","order_amount2":"500.00"}', '{"status1":1,"status2":"1"}', '2015-09-15 07:15:47', '2015-09-15 07:15:47', '2015-09-15 07:15:55');
INSERT INTO `we_order_change_log` VALUES(18, 1, '{"order_amount1":"5.00","order_amount2":"200"}', '{"status1":1,"status2":"0"}', '2015-09-15 07:52:07', '2015-09-15 07:52:07', '2015-09-15 07:52:15');
INSERT INTO `we_order_change_log` VALUES(19, 18, '{"order_amount1":"200.00","order_amount2":"200.00"}', '{"status1":1,"status2":null}', '2015-09-16 01:53:25', '2015-09-16 01:53:25', '2015-09-16 01:53:32');
INSERT INTO `we_order_change_log` VALUES(20, 18, '{"order_amount1":"200.00","order_amount2":"200.00"}', '{"status1":1,"status2":null}', '2015-09-16 01:53:28', '2015-09-16 01:53:28', '2015-09-16 01:53:35');
INSERT INTO `we_order_change_log` VALUES(21, 18, '{"order_amount1":"200.00","order_amount2":"200.00"}', '{"status1":1,"status2":null}', '2015-09-16 01:53:30', '2015-09-16 01:53:30', '2015-09-16 01:53:37');
INSERT INTO `we_order_change_log` VALUES(22, 18, '{"order_amount1":"200.00","order_amount2":"200.00"}', '{"status1":1,"status2":null}', '2015-09-16 01:53:35', '2015-09-16 01:53:35', '2015-09-16 01:53:42');
INSERT INTO `we_order_change_log` VALUES(23, 18, '{"order_amount1":"200.00","order_amount2":"200.00"}', '{"status1":1,"status2":null}', '2015-09-16 01:53:41', '2015-09-16 01:53:41', '2015-09-16 01:53:47');
INSERT INTO `we_order_change_log` VALUES(24, 18, '{"order_amount1":"200.00","order_amount2":"200.00"}', '{"status1":1,"status2":"1"}', '2015-09-16 02:03:09', '2015-09-16 02:03:09', '2015-09-16 02:03:16');
INSERT INTO `we_order_change_log` VALUES(25, 18, '{"order_amount1":"200.00","order_amount2":"200.00"}', '{"status1":1,"status2":"0"}', '2015-09-16 06:53:50', '2015-09-16 06:53:50', '2015-09-16 06:53:58');
INSERT INTO `we_order_change_log` VALUES(26, 1, '{"order_amount1":"200.00","order_amount2":"20.00"}', '{"status1":0,"status2":"0"}', '2015-09-16 06:56:26', '2015-09-16 06:56:26', '2015-09-16 06:56:35');
INSERT INTO `we_order_change_log` VALUES(27, 15, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":1,"status2":"1"}', '2015-09-17 06:55:11', '2015-09-17 06:55:11', '2015-09-17 06:55:17');
INSERT INTO `we_order_change_log` VALUES(28, 92, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":0,"status2":"1"}', '2015-09-21 00:47:59', '2015-09-21 00:47:59', '2015-09-21 00:48:03');
INSERT INTO `we_order_change_log` VALUES(29, 114, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":0,"status2":"1"}', '2015-09-24 06:25:03', '2015-09-24 06:25:03', '2015-09-24 06:24:54');
INSERT INTO `we_order_change_log` VALUES(30, 112, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":0,"status2":"1"}', '2015-09-25 03:06:12', '2015-09-25 03:06:12', '2015-09-25 03:06:12');
INSERT INTO `we_order_change_log` VALUES(31, 123, '{"order_amount1":"0.00","order_amount2":"a"}', '{"status1":0,"status2":"0"}', '2015-09-25 07:02:28', '2015-09-25 07:02:28', '2015-09-25 07:02:23');
INSERT INTO `we_order_change_log` VALUES(32, 125, '{"order_amount1":"0.00","order_amount2":"abc"}', '{"status1":0,"status2":"0"}', '2015-09-25 07:45:20', '2015-09-25 07:45:20', '2015-09-25 07:45:20');
INSERT INTO `we_order_change_log` VALUES(33, 125, '{"order_amount1":"0.00","order_amount2":"234"}', '{"status1":0,"status2":"0"}', '2015-09-25 07:45:26', '2015-09-25 07:45:26', '2015-09-25 07:45:26');
INSERT INTO `we_order_change_log` VALUES(34, 125, '{"order_amount1":"234.00","order_amount2":"abc"}', '{"status1":0,"status2":"0"}', '2015-09-25 07:45:37', '2015-09-25 07:45:37', '2015-09-25 07:45:37');
INSERT INTO `we_order_change_log` VALUES(35, 125, '{"order_amount1":"234.00","order_amount2":"abc"}', '{"status1":0,"status2":"0"}', '2015-09-25 07:45:44', '2015-09-25 07:45:44', '2015-09-25 07:45:44');
INSERT INTO `we_order_change_log` VALUES(36, 125, '{"order_amount1":"234.00","order_amount2":"abc"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:23:40', '2015-09-25 08:23:40', '2015-09-25 08:23:39');
INSERT INTO `we_order_change_log` VALUES(37, 125, '{"order_amount1":"234.00","order_amount2":"abc"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:23:44', '2015-09-25 08:23:44', '2015-09-25 08:23:43');
INSERT INTO `we_order_change_log` VALUES(38, 125, '{"order_amount1":"234.00","order_amount2":"abc"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:23:47', '2015-09-25 08:23:47', '2015-09-25 08:23:46');
INSERT INTO `we_order_change_log` VALUES(39, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:24', '2015-09-25 08:36:24', '2015-09-25 08:36:23');
INSERT INTO `we_order_change_log` VALUES(40, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:27', '2015-09-25 08:36:27', '2015-09-25 08:36:26');
INSERT INTO `we_order_change_log` VALUES(41, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:30', '2015-09-25 08:36:30', '2015-09-25 08:36:29');
INSERT INTO `we_order_change_log` VALUES(42, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:33', '2015-09-25 08:36:33', '2015-09-25 08:36:32');
INSERT INTO `we_order_change_log` VALUES(43, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:36', '2015-09-25 08:36:36', '2015-09-25 08:36:35');
INSERT INTO `we_order_change_log` VALUES(44, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:39', '2015-09-25 08:36:39', '2015-09-25 08:36:38');
INSERT INTO `we_order_change_log` VALUES(45, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:42', '2015-09-25 08:36:42', '2015-09-25 08:36:41');
INSERT INTO `we_order_change_log` VALUES(46, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:45', '2015-09-25 08:36:45', '2015-09-25 08:36:44');
INSERT INTO `we_order_change_log` VALUES(47, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:49', '2015-09-25 08:36:49', '2015-09-25 08:36:48');
INSERT INTO `we_order_change_log` VALUES(48, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:52', '2015-09-25 08:36:52', '2015-09-25 08:36:51');
INSERT INTO `we_order_change_log` VALUES(49, 125, '{"order_amount1":"234.00","order_amount2":""}', '{"status1":0,"status2":"0"}', '2015-09-25 08:36:56', '2015-09-25 08:36:56', '2015-09-25 08:36:55');
INSERT INTO `we_order_change_log` VALUES(50, 125, '{"order_amount1":"234.00","order_amount2":"20"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:37:01', '2015-09-25 08:37:01', '2015-09-25 08:37:00');
INSERT INTO `we_order_change_log` VALUES(51, 125, '{"order_amount1":"20.00","order_amount2":"s"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:40:07', '2015-09-25 08:40:07', '2015-09-25 08:40:06');
INSERT INTO `we_order_change_log` VALUES(52, 125, '{"order_amount1":"20.00","order_amount2":"s"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:40:10', '2015-09-25 08:40:10', '2015-09-25 08:40:09');
INSERT INTO `we_order_change_log` VALUES(53, 125, '{"order_amount1":"20.00","order_amount2":"s"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:43:34', '2015-09-25 08:43:34', '2015-09-25 08:43:33');
INSERT INTO `we_order_change_log` VALUES(54, 125, '{"order_amount1":"20.00","order_amount2":"r"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:43:40', '2015-09-25 08:43:40', '2015-09-25 08:43:39');
INSERT INTO `we_order_change_log` VALUES(55, 125, '{"order_amount1":"20.00","order_amount2":"20.00"}', '{"status1":0,"status2":"0"}', '2015-09-25 08:50:09', '2015-09-25 08:50:09', '2015-09-25 08:50:08');
INSERT INTO `we_order_change_log` VALUES(56, 126, '{"order_amount1":"80.00","order_amount2":"80.00"}', '{"status1":0,"status2":"0"}', '2015-09-25 09:25:45', '2015-09-25 09:25:45', '2015-09-25 09:25:44');
INSERT INTO `we_order_change_log` VALUES(57, 128, '{"order_amount1":"0.00","order_amount2":"1231"}', '{"status1":0,"status2":"0"}', '2015-09-28 08:06:24', '2015-09-28 08:06:24', '2015-09-28 08:06:25');
INSERT INTO `we_order_change_log` VALUES(58, 123, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":0,"status2":"0"}', '2015-09-29 02:36:15', '2015-09-29 02:36:15', '2015-09-29 02:36:11');
INSERT INTO `we_order_change_log` VALUES(59, 126, '{"order_amount1":"80.00","order_amount2":"111"}', '{"status1":0,"status2":"0"}', '2015-10-12 01:25:49', '2015-10-12 01:25:49', '2015-10-12 01:25:28');
INSERT INTO `we_order_change_log` VALUES(60, 160, '{"order_amount1":"2160.00","order_amount2":"2160.00"}', '{"status1":0,"status2":"0"}', '2015-10-12 01:38:11', '2015-10-12 01:38:11', '2015-10-12 01:37:54');
INSERT INTO `we_order_change_log` VALUES(61, 108, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":1,"status2":"0"}', '2015-10-12 09:04:11', '2015-10-12 09:04:11', '2015-10-12 09:04:11');
INSERT INTO `we_order_change_log` VALUES(62, 129, '{"order_amount1":"20.00","order_amount2":"20.00"}', '{"status1":1,"status2":"0"}', '2015-10-12 09:04:24', '2015-10-12 09:04:24', '2015-10-12 09:04:24');
INSERT INTO `we_order_change_log` VALUES(63, 144, '{"order_amount1":"20.00","order_amount2":"20.00"}', '{"status1":1,"status2":"0"}', '2015-10-14 02:20:03', '2015-10-14 02:20:03', '2015-10-14 02:20:03');
INSERT INTO `we_order_change_log` VALUES(64, 130, '{"order_amount1":"20.00","order_amount2":"20.00"}', '{"status1":1,"status2":"0"}', '2015-10-14 02:20:38', '2015-10-14 02:20:38', '2015-10-14 02:20:38');
INSERT INTO `we_order_change_log` VALUES(65, 131, '{"order_amount1":"20.00","order_amount2":"20.00"}', '{"status1":1,"status2":"0"}', '2015-10-14 03:45:15', '2015-10-14 03:45:15', '2015-10-14 03:45:04');
INSERT INTO `we_order_change_log` VALUES(66, 132, '{"order_amount1":"20.00","order_amount2":"20.00"}', '{"status1":0,"status2":"1"}', '2015-10-14 03:45:29', '2015-10-14 03:45:29', '2015-10-14 03:45:18');
INSERT INTO `we_order_change_log` VALUES(67, 126, '{"order_amount1":"111.00","order_amount2":"111.00"}', '{"status1":1,"status2":"0"}', '2015-10-14 03:51:49', '2015-10-14 03:51:49', '2015-10-14 03:51:49');
INSERT INTO `we_order_change_log` VALUES(68, 208, '{"order_amount1":"0.00","order_amount2":"12"}', '{"status1":1,"status2":"0"}', '2015-10-14 08:07:44', '2015-10-14 08:07:44', '2015-10-14 08:07:44');
INSERT INTO `we_order_change_log` VALUES(69, 132, '{"order_amount1":"20.00","order_amount2":"220.00"}', '{"status1":1,"status2":"0"}', '2015-10-14 08:08:01', '2015-10-14 08:08:01', '2015-10-14 08:08:01');
INSERT INTO `we_order_change_log` VALUES(70, 126, '{"order_amount1":"111.00","order_amount2":"111.00"}', '{"status1":0,"status2":"1"}', '2015-10-14 08:08:12', '2015-10-14 08:08:12', '2015-10-14 08:08:12');
INSERT INTO `we_order_change_log` VALUES(71, 126, '{"order_amount1":"111.00","order_amount2":"1213"}', '{"status1":1,"status2":"0"}', '2015-10-14 08:08:36', '2015-10-14 08:08:36', '2015-10-14 08:08:36');
INSERT INTO `we_order_change_log` VALUES(72, 132, '{"order_amount1":"220.00","order_amount2":"12"}', '{"status1":0,"status2":"1"}', '2015-10-14 08:09:16', '2015-10-14 08:09:16', '2015-10-14 08:09:16');
INSERT INTO `we_order_change_log` VALUES(73, 132, '{"order_amount1":"12.00","order_amount2":"123"}', '{"status1":1,"status2":"1"}', '2015-10-14 08:09:24', '2015-10-14 08:09:24', '2015-10-14 08:09:24');
INSERT INTO `we_order_change_log` VALUES(74, 126, '{"order_amount1":"1213.00","order_amount2":"1213.00"}', '{"status1":0,"status2":"1"}', '2015-10-14 08:09:34', '2015-10-14 08:09:34', '2015-10-14 08:09:34');
INSERT INTO `we_order_change_log` VALUES(75, 201, '{"order_amount1":"123123.00","order_amount2":"123123.00"}', '{"status1":1,"status2":"0"}', '2015-10-14 09:19:41', '2015-10-14 09:19:41', '2015-10-14 09:19:41');
INSERT INTO `we_order_change_log` VALUES(76, 259, '{"order_amount1":"320.00","order_amount2":"320.00"}', '{"status1":0,"status2":"1"}', '2015-10-14 09:19:58', '2015-10-14 09:19:58', '2015-10-14 09:19:58');
INSERT INTO `we_order_change_log` VALUES(77, 259, '{"order_amount1":"320.00","order_amount2":"320.00"}', '{"status1":1,"status2":"0"}', '2015-10-14 09:20:11', '2015-10-14 09:20:11', '2015-10-14 09:20:11');
INSERT INTO `we_order_change_log` VALUES(78, 273, '{"order_amount1":"420.00","order_amount2":"0.01"}', '{"status1":0,"status2":"0"}', '2015-10-15 02:48:41', '2015-10-15 02:48:41', '2015-10-15 02:48:41');
INSERT INTO `we_order_change_log` VALUES(79, 217, '{"order_amount1":"16450.00","order_amount2":"44"}', '{"status1":1,"status2":"1"}', '2015-10-15 06:34:51', '2015-10-15 06:34:51', '2015-10-15 06:34:33');
INSERT INTO `we_order_change_log` VALUES(80, 280, '{"order_amount1":"10.00","order_amount2":"0.01"}', '{"status1":0,"status2":"0"}', '2015-10-15 07:59:04', '2015-10-15 07:59:04', '2015-10-15 07:59:04');
INSERT INTO `we_order_change_log` VALUES(81, 289, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":0,"status2":"1"}', '2015-10-16 01:25:23', '2015-10-16 01:25:23', '2015-10-16 01:24:59');
INSERT INTO `we_order_change_log` VALUES(82, 290, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":0,"status2":"1"}', '2015-10-16 01:37:42', '2015-10-16 01:37:42', '2015-10-16 01:37:20');
INSERT INTO `we_order_change_log` VALUES(83, 294, '{"order_amount1":"0.00","order_amount2":"0.00"}', '{"status1":0,"status2":"1"}', '2015-10-16 05:42:51', '2015-10-16 05:42:51', '2015-10-16 05:42:32');
INSERT INTO `we_order_change_log` VALUES(84, 302, '{"order_amount1":"10.00","order_amount2":"0.01"}', '{"status1":0,"status2":"0"}', '2015-10-16 08:19:48', '2015-10-16 08:19:48', '2015-10-16 08:19:48');
INSERT INTO `we_order_change_log` VALUES(85, 304, '{"order_amount1":"10.00","order_amount2":"0.01"}', '{"status1":0,"status2":"0"}', '2015-10-16 08:38:48', '2015-10-16 08:38:48', '2015-10-16 08:38:48');
INSERT INTO `we_order_change_log` VALUES(86, 317, '{"order_amount1":"1000.00","order_amount2":"1000.00"}', '{"status1":0,"status2":"1"}', '2015-10-19 06:38:06', '2015-10-19 06:38:06', '2015-10-19 06:37:44');
INSERT INTO `we_order_change_log` VALUES(87, 126, '{"order_amount1":"1213.00","order_amount2":"1213.00"}', '{"status1":1,"status2":"0"}', '2015-10-19 06:47:25', '2015-10-19 06:47:25', '2015-10-19 06:47:03');
INSERT INTO `we_order_change_log` VALUES(88, 126, '{"order_amount1":"1213.00","order_amount2":"1213.00"}', '{"status1":0,"status2":"1"}', '2015-10-19 06:47:39', '2015-10-19 06:47:39', '2015-10-19 06:47:17');
INSERT INTO `we_order_change_log` VALUES(89, 481, '{"order_amount1":"10.00","order_amount2":"0.01"}', '{"status1":0,"status2":"0"}', '2015-10-22 10:10:25', '2015-10-22 10:10:25', '2015-10-22 10:10:25');
INSERT INTO `we_order_change_log` VALUES(90, 482, '{"order_amount1":"123123.00","order_amount2":"0.01"}', '{"status1":0,"status2":"0"}', '2015-10-22 10:34:25', '2015-10-22 10:34:25', '2015-10-22 10:34:25');
INSERT INTO `we_order_change_log` VALUES(91, 483, '{"order_amount1":"123123.00","order_amount2":"0.01"}', '{"status1":0,"status2":"0"}', '2015-10-22 10:48:14', '2015-10-22 10:48:14', '2015-10-22 10:48:14');
INSERT INTO `we_order_change_log` VALUES(92, 488, '{"order_amount1":"10.00","order_amount2":"0.01"}', '{"status1":0,"status2":"0"}', '2015-10-22 12:28:36', '2015-10-22 12:28:36', '2015-10-22 12:28:36');
INSERT INTO `we_order_change_log` VALUES(93, 517, '{"order_amount1":"600.00","order_amount2":"600.00"}', '{"status1":0,"status2":"0"}', '2015-11-02 09:21:02', '2015-11-02 09:21:02', '2015-11-02 09:20:46');
INSERT INTO `we_order_change_log` VALUES(94, 518, '{"order_amount1":"600.00","order_amount2":"600.00"}', '{"status1":0,"status2":"1"}', '2015-11-02 10:54:34', '2015-11-02 10:54:34', '2015-11-02 10:54:19');
INSERT INTO `we_order_change_log` VALUES(95, 518, '{"order_amount1":"600.00","order_amount2":"600.00"}', '{"status1":1,"status2":"1"}', '2015-11-02 10:54:44', '2015-11-02 10:54:44', '2015-11-02 10:54:28');
INSERT INTO `we_order_change_log` VALUES(96, 518, '{"order_amount1":"600.00","order_amount2":"600.00"}', '{"status1":1,"status2":"1"}', '2015-11-02 10:55:45', '2015-11-02 10:55:45', '2015-11-02 10:55:30');
INSERT INTO `we_order_change_log` VALUES(97, 518, '{"order_amount1":"600.00","order_amount2":"600.00"}', '{"status1":1,"status2":"1"}', '2015-11-02 10:56:05', '2015-11-02 10:56:05', '2015-11-02 10:55:50');
INSERT INTO `we_order_change_log` VALUES(98, 518, '{"order_amount1":"600.00","order_amount2":"600.00"}', '{"status1":1,"status2":"1"}', '2015-11-02 10:56:31', '2015-11-02 10:56:31', '2015-11-02 10:56:16');
INSERT INTO `we_order_change_log` VALUES(99, 513, '{"order_amount1":"400.00","order_amount2":"400.00"}', '{"status1":1,"status2":"0"}', '2015-11-02 10:57:43', '2015-11-02 10:57:43', '2015-11-02 10:57:28');
INSERT INTO `we_order_change_log` VALUES(100, 518, '{"order_amount1":"600.00","order_amount2":"600.00"}', '{"status1":1,"status2":"0"}', '2015-11-02 10:59:47', '2015-11-02 10:59:47', '2015-11-02 10:59:32');
INSERT INTO `we_order_change_log` VALUES(101, 518, '{"order_amount1":"600.00","order_amount2":"600.00"}', '{"status1":0,"status2":"1"}', '2015-11-02 11:01:57', '2015-11-02 11:01:57', '2015-11-02 11:01:42');
INSERT INTO `we_order_change_log` VALUES(102, 574, '{"order_amount1":"24.00","order_amount2":"24.00"}', '{"status1":1,"status2":"1"}', '2015-11-13 05:44:18', '2015-11-13 05:44:18', '2015-11-13 05:45:21');

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
--
-- 转存表中的数据 `we_order_goods`
--

INSERT INTO `we_order_goods` VALUES(1, 4, 2, 'wqe', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '34', '56.00', 0);
INSERT INTO `we_order_goods` VALUES(2, 570, 11, 'kele', NULL, '2015-11-12 07:56:49', '2015-11-12 07:56:49', NULL, 'sa', '12.00', 1);
INSERT INTO `we_order_goods` VALUES(3, 571, 11, 'kele', NULL, '2015-11-12 07:57:27', '2015-11-12 07:57:27', NULL, 'sa', '12.00', 1);
INSERT INTO `we_order_goods` VALUES(4, 572, 11, 'kele', NULL, '2015-11-12 10:06:11', '2015-11-12 10:06:11', NULL, 'sa', '12.00', 1);
INSERT INTO `we_order_goods` VALUES(5, 573, 26, '123', NULL, '2015-11-12 10:06:32', '2015-11-12 10:06:32', NULL, '13', '111.00', 1);
INSERT INTO `we_order_goods` VALUES(6, 574, 11, 'kele', NULL, '2015-11-12 10:21:25', '2015-11-12 10:21:25', NULL, 'sa', '12.00', 1);
INSERT INTO `we_order_goods` VALUES(7, 575, 11, 'kele', NULL, '2015-11-18 03:26:52', '2015-11-18 03:26:52', NULL, 'sa', '12.00', 1);
INSERT INTO `we_order_goods` VALUES(8, 576, 11, 'kele', NULL, '2015-11-18 05:48:41', '2015-11-18 05:48:41', NULL, 'sa', '12.00', 1);
INSERT INTO `we_order_goods` VALUES(9, 577, 11, 'kele', NULL, '2015-11-19 09:02:49', '2015-11-18 06:04:08', NULL, 'nike', '12.00', 1);
INSERT INTO `we_order_goods` VALUES(10, 578, 11, 'kele', NULL, '2015-11-19 08:52:52', '2015-11-18 06:15:50', NULL, 'nike', '12.00', 1);

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
--
-- 转存表中的数据 `we_payment`
--

INSERT INTO `we_payment` VALUES(1, '微信', '', '{"3":"2","4":"5"}', 1, 1, 0, '2015-08-21 01:14:33', '2015-10-14 07:21:45', NULL);
INSERT INTO `we_payment` VALUES(3, '支付宝', '', '{"partner":"2088021772382684","seller":"3084143655@qq.com","privateKey":"MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBAN3ZkUHr1j30vT+DjXFkxTiWJCSfUN2F1ZRBnLr8HNsJzoTRVq4OwIlJfDSe0uzgrf/Ti8O3MaZNQlbXqUCtz78UerAW42sYgcZWgwPk89Et5060SBBzQmpHzPIfS9BpkHLAx8oLomsz2ZkeI+xmvQZ1hh52rMB/AdsMBtxjcH1vAgMBAAECgYBupGxycRk3axDbVVO8guJtd0vtS9t7r5y2RQbSppwJjdmGmhTd2BOkJJciczeE1gVReoLRCFNlulBkmUgbLtRVbSMB9g3jy7dU/zfPIkMx8I7B7WdQTqrJCwq+nL8W9FPqzB1jIELYVVZZ8NpCFuzKojtmVEbfpeyw0Uhb8QErWQJBAPWTXmfg7dcwdYPT73rlk8IEEFo9o/Tqq0Sc+bnY7+gu4j0oDlRWzTs7Wkr0AOHf4CGaORM2fZZB7xalESjWwC0CQQDnRF/UDs+LdyPseDAd4C8nIUOZHthQS7PIQC2Y9uCyq8hjyrkcTy0XDp0h7pVEkbJIoIFhQm1yvLhmAHersNmLAkA+8MdofmjXF293GzGs4Pxu5JXAWz4TfrXovwbuUCCk9Kc9n2+UxC6TuNGallFHkxah5iIsv3GOulVqC2KLggb9AkAzIPmyr0eRRNjLWdMBd+PU2dTREHGwZtwrZIzwKXyJ49KcxV/hc1u7oj55Fv8nNrLcvad88iuyVyjJXEcYzTN7AkA90DlFJvPaQ3Q89NDCQULzuENb/wIJQEReBvhpVvDMx4qyZAOkVC7cRGlsLtAymeVqNzgNbfPnRPoZYKrgxmtB","notifyURL":"http://fandaoi.cn/api/alipay"}', 1, 1, 0, '2015-08-21 01:11:22', '2015-10-09 07:19:41', NULL);
INSERT INTO `we_payment` VALUES(24, '余额', '', '{"id":"123","key":"1234"}', 1, 1, 0, '2015-09-25 07:56:20', '2015-10-23 03:43:53', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=1067 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_room`
--

TRUNCATE TABLE `we_room`;
--
-- 转存表中的数据 `we_room`
--

INSERT INTO `we_room` VALUES(131, 'C001', NULL, 41, 10, '40.00', 'photography', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-14 04:47:25', '2015-09-23 08:18:54');
INSERT INTO `we_room` VALUES(135, 'C002', NULL, 44, 20, '20.00', 'photography', '很凉快', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-16 05:16:28', '2015-09-16 05:16:28');
INSERT INTO `we_room` VALUES(137, 'A001', NULL, 42, 11, '11.00', 'boardroom', '11', '4456', NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2015-10-12 09:32:36', '2015-09-16 05:19:37', '2015-10-12 09:32:36');
INSERT INTO `we_room` VALUES(1002, 'C003', NULL, 53, 10, '10.00', 'photography', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-23 07:38:56', '2015-09-23 07:38:56');
INSERT INTO `we_room` VALUES(1003, 'A203', NULL, 49, 100, '10.00', 'boardroom', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-23 07:46:14', '2015-09-23 07:46:14');
INSERT INTO `we_room` VALUES(1004, 'C004', NULL, 57, 211, '1.00', 'photography', '123', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-23 07:53:34', '2015-09-23 07:53:34');
INSERT INTO `we_room` VALUES(1005, 'B001', 4, 61, 31313, '31.00', 'workshop', '1313', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-23 08:05:11', '2015-09-23 08:05:11');
INSERT INTO `we_room` VALUES(1006, 'B002', 2, 61, 12313, '123123.00', 'workshop', '123123', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-23 09:29:43', '2015-10-19 04:40:07');
INSERT INTO `we_room` VALUES(1007, 'A002', NULL, 63, 123123, '123123.00', 'boardroom', '12313', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:13:06', '2015-09-24 04:18:55', '2016-05-14 07:13:06');
INSERT INTO `we_room` VALUES(1008, 'B003', 2, 61, 55, '663.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-24 04:50:23', '2015-10-19 04:40:22');
INSERT INTO `we_room` VALUES(1009, 'B004', 2, 63, 5856, '565.00', 'workshop', '56', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-24 04:52:56', '2015-10-19 04:52:11');
INSERT INTO `we_room` VALUES(1010, 'D001', NULL, 61, 2131232131, '123123.00', 'roadshow', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:13:06', '2015-09-24 05:32:51', '2016-05-14 07:13:06');
INSERT INTO `we_room` VALUES(1011, 'B005', 2, 61, 11, '11.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-24 07:02:29', '2015-10-19 04:52:04');
INSERT INTO `we_room` VALUES(1012, 'C005', NULL, 61, 11, '11.00', 'photography', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2015-10-14 08:51:24', '2015-09-25 05:47:58', '2015-10-14 08:51:24');
INSERT INTO `we_room` VALUES(1013, 'B006', 2, 61, 111, '11.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-09-25 05:52:44', '2015-10-19 04:40:43');
INSERT INTO `we_room` VALUES(1016, 'C006', NULL, 61, 21313131, '12313.00', 'photography', '21313', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2015-10-14 08:51:38', '2015-09-25 07:06:33', '2015-10-14 08:51:38');
INSERT INTO `we_room` VALUES(1031, 'A111', 2, 61, 2, '4.00', 'workshop', 'd', '/data/uploads/1444718286_Koala.jpg', NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-13 06:38:06', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1019, 'A010', NULL, 61, 10, '300.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:13:06', '2015-10-07 06:01:30', '2016-05-14 07:13:06');
INSERT INTO `we_room` VALUES(1020, 'A011', NULL, 61, 20, '350.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:13:06', '2015-10-07 06:03:11', '2016-05-14 07:13:06');
INSERT INTO `we_room` VALUES(1021, 'A013', NULL, 61, 30, '500.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:13:06', '2015-10-07 06:03:31', '2016-05-14 07:13:06');
INSERT INTO `we_room` VALUES(1022, 'A014', NULL, 61, 35, '360.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:13:06', '2015-10-07 06:03:52', '2016-05-14 07:13:06');
INSERT INTO `we_room` VALUES(1023, 'A015', NULL, 61, 55, '210.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-07 06:04:15', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1024, 'A016', NULL, 61, 22, '320.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-07 06:04:31', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1028, 'A003', 4, 61, 1233, '12.00', 'workshop', '12313123', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-08 00:43:40', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1029, 'A004', NULL, 61, 35, '2131.00', 'boardroom', '231', '/data/uploads/1444265272_Hydrangeas.jpg', NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-08 00:47:11', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1030, 'A005', NULL, 61, 231, '213123.00', 'boardroom', '123123', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-08 01:20:15', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1032, '12312131', 0, 61, 12, '0.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-13 08:26:05', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1033, '4541', 4, 63, 5, '0.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-13 08:39:14', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1034, '4546', 0, 61, 34, '0.00', 'roadshow', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-13 08:39:36', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1035, 'A1', 2, 79, 123, '0.00', 'workshop', '2', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:50', '2015-10-13 10:17:37', '2016-05-14 07:12:50');
INSERT INTO `we_room` VALUES(1036, 'A789', 2, 61, 6, '0.00', 'workshop', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-14 07:32:40', '2015-10-14 07:32:40');
INSERT INTO `we_room` VALUES(1039, 'A799', 2, 79, 6, '0.00', 'workshop', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-14 07:49:31', '2015-10-14 07:49:31');
INSERT INTO `we_room` VALUES(1043, 'A777', 2, 61, 5, '0.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-15 03:14:36', '2015-10-15 03:14:36');
INSERT INTO `we_room` VALUES(1041, 'A401', 7, 61, 123, '0.00', 'workshop', '123', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-14 08:00:38', '2015-10-14 08:00:38');
INSERT INTO `we_room` VALUES(1047, 'A456', 0, 79, 55, NULL, 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-15 05:38:20', '2015-10-15 05:38:20');
INSERT INTO `we_room` VALUES(1048, 'A789', 4, 79, 6, '0.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-15 05:38:54', '2015-10-15 05:38:54');
INSERT INTO `we_room` VALUES(1049, 'A666', 5, 79, 4, '0.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-15 05:44:03', '2015-10-15 05:44:03');
INSERT INTO `we_room` VALUES(1050, 'A786', 0, 79, 4, '0.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-15 05:45:08', '2015-10-15 05:45:08');
INSERT INTO `we_room` VALUES(1051, '123', 0, 61, 123, '0.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2015-10-16 01:21:59', '2015-10-15 05:45:25', '2015-10-16 01:21:59');
INSERT INTO `we_room` VALUES(1052, '123', 0, 63, 123, '1.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:41', '2015-10-15 05:46:10', '2016-05-14 07:12:41');
INSERT INTO `we_room` VALUES(1053, 'A9876', 0, 79, 5, '0.00', 'photography', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:23', '2015-10-15 05:51:18', '2016-05-14 07:12:23');
INSERT INTO `we_room` VALUES(1054, 'A235', 2, 63, 5, '0.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-15 05:52:04', '2015-10-15 05:52:04');
INSERT INTO `we_room` VALUES(1055, 'A123', 9, 61, 12, '0.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:23', '2015-10-15 06:01:31', '2016-05-14 07:12:23');
INSERT INTO `we_room` VALUES(1056, 'A123', 0, 79, 12, '0.00', 'photography', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, NULL, '2015-10-15 06:02:15', '2015-10-15 06:19:03');
INSERT INTO `we_room` VALUES(1057, '123', 0, 61, 123, '0.00', 'boardroom', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:23', '2015-10-16 01:22:09', '2016-05-14 07:12:23');
INSERT INTO `we_room` VALUES(1058, '1234', 0, 79, 1, '0.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2015-10-16 02:17:35', '2015-10-16 02:16:28', '2015-10-16 02:17:35');
INSERT INTO `we_room` VALUES(1059, '1234', 0, 79, 1, '0.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2015-10-16 02:18:23', '2015-10-16 02:18:06', '2015-10-16 02:18:23');
INSERT INTO `we_room` VALUES(1060, 'csa', 0, 61, 11, '0.00', 'boardroom', '', '/data/uploads/1446704073_Penguins.jpg', NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:23', '2015-10-16 03:04:59', '2016-05-14 07:12:23');
INSERT INTO `we_room` VALUES(1061, 'b258', 2, 61, 12, '10.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:23', '2015-10-16 03:47:37', '2016-05-14 07:12:23');
INSERT INTO `we_room` VALUES(1062, 'A1112', 0, 79, 50, '0.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:23', '2015-10-16 08:21:33', '2016-05-14 07:12:23');
INSERT INTO `we_room` VALUES(1063, '3123123123', 0, 61, 1231312, '0.00', 'boardroom', NULL, NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:11:08', '2015-10-16 08:26:27', '2016-05-14 07:11:08');
INSERT INTO `we_room` VALUES(1064, 'B021', 2, 61, 10, '20.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', NULL, 0, NULL, NULL, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:11:04', '2015-10-16 11:49:01', '2016-05-14 07:11:04');
INSERT INTO `we_room` VALUES(1065, 'Awomen', 4, 61, 12, '0.00', 'workshop', '1144122', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:23', '2015-10-23 07:25:41', '2016-05-14 07:12:23');
INSERT INTO `we_room` VALUES(1066, 'A99999', 2, 61, 99, '0.00', 'workshop', '', NULL, NULL, '', '', '', 0, 0, '0.00', 0, '', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, '', '', '', '', '', 1, 0, 1, '2016-05-14 07:12:23', '2015-11-04 09:16:23', '2016-05-14 07:12:23');

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
--
-- 转存表中的数据 `we_room_company_mst`
--

INSERT INTO `we_room_company_mst` VALUES('1_1', 1, 33, '101', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_2', 1, 35, '102', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('2_1', 3, 53, '201', '2015-07-22 09:25:53', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('2_2', 3, 59, '202', '2015-07-22 09:25:53', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_3', 1, 31, '103', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_4', 1, 34, '104', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_5', 1, 32, '105', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_6', 1, 41, '106', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_7', 1, 44, '107', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_8', 1, 45, '108', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_9', 1, 46, '109', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('1_10', 1, 47, '110', '2015-07-22 08:40:31', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('2_3', 3, 43, '203', '2015-07-22 09:33:29', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('2_4', 3, 61, '204', '2015-07-22 09:33:29', '0000-00-00 00:00:00', NULL);
INSERT INTO `we_room_company_mst` VALUES('2_5', 3, 62, '205', '2015-07-22 09:33:29', '0000-00-00 00:00:00', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_seat`
--

TRUNCATE TABLE `we_seat`;
--
-- 转存表中的数据 `we_seat`
--

INSERT INTO `we_seat` VALUES(34, 'K2', 1031, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(40, '1111', 1005, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(50, '一栋', 1006, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(51, '二栋', 1006, '2016-05-14 07:12:10', '2016-05-14 07:12:10', '2016-05-14 07:12:10');
INSERT INTO `we_seat` VALUES(52, '红色', 1006, '2015-10-16 01:20:48', '2015-10-16 01:21:10', '2015-10-16 01:21:10');
INSERT INTO `we_seat` VALUES(53, '学习', 1006, '2016-05-14 07:12:10', '2016-05-14 07:12:10', '2016-05-14 07:12:10');
INSERT INTO `we_seat` VALUES(54, '办公', 1006, '2016-05-14 07:12:10', '2016-05-14 07:12:10', '2016-05-14 07:12:10');
INSERT INTO `we_seat` VALUES(55, '娱乐', 1006, '2016-05-14 07:12:10', '2016-05-14 07:12:10', '2016-05-14 07:12:10');
INSERT INTO `we_seat` VALUES(56, '商品', 1006, '2016-05-14 07:12:10', '2016-05-14 07:12:10', '2016-05-14 07:12:10');
INSERT INTO `we_seat` VALUES(57, '栏2', 1005, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(58, '1111111', 1008, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(59, 'asdad', 1011, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(60, '34242', 1009, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(61, 'sdsds', 1065, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(68, '111', 1006, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(69, '22', 1006, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(70, '11', 1006, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(71, '1111', 1006, '2016-05-14 07:12:05', '2016-05-14 07:12:05', '2016-05-14 07:12:05');
INSERT INTO `we_seat` VALUES(72, '234', 1006, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(73, '1123', 1006, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(74, 'A1234', 1035, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(75, '1234', 1036, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(76, 'sad', 1039, '2015-10-14 08:54:24', '2015-10-14 08:54:24', '2015-10-14 08:54:24');
INSERT INTO `we_seat` VALUES(77, 'wqrwqe', 1006, '2015-10-14 08:55:03', '2015-10-14 08:55:03', '2015-10-14 08:55:03');
INSERT INTO `we_seat` VALUES(78, 'safsgf', 1008, '2015-10-14 08:58:07', '2015-10-14 08:58:07', '2015-10-14 08:58:07');
INSERT INTO `we_seat` VALUES(79, 'C1', 1041, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(80, '123', 1041, '2015-10-16 01:25:16', '2015-10-16 01:25:40', '2015-10-16 01:25:40');
INSERT INTO `we_seat` VALUES(81, 'sss', 1008, '2015-10-15 07:19:41', '2015-10-15 07:19:59', '2015-10-15 07:19:59');
INSERT INTO `we_seat` VALUES(82, 'A123-01', 1055, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(83, '红色', 1006, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');
INSERT INTO `we_seat` VALUES(84, '1234', 1005, '2015-10-16 02:19:18', '2015-10-16 02:19:37', '2015-10-16 02:19:37');
INSERT INTO `we_seat` VALUES(85, '1234', 1005, '2016-05-14 07:11:58', '2016-05-14 07:11:58', '2016-05-14 07:11:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_seat_type`
--

TRUNCATE TABLE `we_seat_type`;
--
-- 转存表中的数据 `we_seat_type`
--

INSERT INTO `we_seat_type` VALUES(1, 'ss', '5.00', '2015-10-12 08:09:35', '2015-10-12 08:12:28', '2015-10-12 08:12:28');
INSERT INTO `we_seat_type` VALUES(2, '二楼标准式', '600.00', '2015-10-12 08:12:40', '2015-10-16 07:06:54', NULL);
INSERT INTO `we_seat_type` VALUES(3, '77', '77.00', '2015-10-12 08:12:51', '2015-10-13 01:38:44', '2015-10-13 01:38:44');
INSERT INTO `we_seat_type` VALUES(4, '二楼开放式', '400.00', '2015-10-13 01:38:56', '2015-10-16 07:07:08', NULL);
INSERT INTO `we_seat_type` VALUES(5, '一楼标准式', '600.00', '2015-10-13 02:40:00', '2015-10-16 07:10:05', NULL);
INSERT INTO `we_seat_type` VALUES(7, '一楼标准式2', '600.00', '2015-10-13 04:17:23', '2015-10-16 07:09:15', NULL);
INSERT INTO `we_seat_type` VALUES(8, 'qqweerq', '0.00', '2015-10-14 08:59:12', '2015-10-14 08:59:18', '2015-10-14 08:59:18');
INSERT INTO `we_seat_type` VALUES(9, '一楼开放式', '400.00', '2015-10-16 00:55:34', '2015-10-19 04:47:38', NULL);
INSERT INTO `we_seat_type` VALUES(10, 'test', '0.00', '2015-10-16 01:44:12', '2015-10-16 01:44:21', '2015-10-16 01:44:21');
INSERT INTO `we_seat_type` VALUES(11, 'test', '0.00', '2015-10-16 01:44:51', '2015-10-16 01:47:28', '2015-10-16 01:47:28');

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
--
-- 转存表中的数据 `we_setting`
--

INSERT INTO `we_setting` VALUES(1, 'admin_logo', '/data/uploads/1437543963_WEshop-LOGO.png', NULL, '2015-07-22 05:46:03', '2015-07-20 05:59:09');
INSERT INTO `we_setting` VALUES(2, 'cnzz', 'hello world!', NULL, '2015-08-25 02:46:48', '2015-08-25 02:46:48');
INSERT INTO `we_setting` VALUES(3, 'about_us', '公司成立于2015年，总部位于北京朝阳区，联系电话：13888888888', NULL, '2015-10-16 07:06:59', '2015-09-04 02:53:14');
INSERT INTO `we_setting` VALUES(61, 'android', '{"version_number":"2.1.1","update_url":"http:\\/\\/fandaoi.cn\\/data\\/FourWork3.1.apk","version_message":"\\u5168\\u65b0\\u7248\\u672c\\uff0c\\u4fee\\u590d\\u4e86\\u4e4b\\u524d\\u7248\\u672c\\u7684\\u76f8\\u5173BUG"}', NULL, '2015-10-23 08:34:58', '2015-09-08 01:04:03');
INSERT INTO `we_setting` VALUES(41, 'ios', '{"version_number":"2.1.1","update_url":"http:\\/\\/172.23.7.6\\/admin\\/setting\\/edition_ios","version_message":"\\u5168\\u65b0\\u7248\\u672c\\uff0c\\u4fee\\u590d\\u4e86\\u4e4b\\u524d\\u7248\\u672c\\u7684\\u76f8\\u5173BUG"}', NULL, '2015-10-16 07:00:22', '2015-09-04 02:54:16');
INSERT INTO `we_setting` VALUES(5, 'protocol', '您只有完全同意下列所有服务条款并完成注册程序，才能成为用户并使用相应服务。您在使用各项服务之前，应仔细阅读本用户协议。\n', NULL, '2015-10-16 07:03:26', '2015-09-04 02:53:38');
INSERT INTO `we_setting` VALUES(7, 'wifi_pw', 'dayuzhou1234', NULL, '2015-10-14 07:44:15', '2015-09-04 02:53:50');
INSERT INTO `we_setting` VALUES(73, 'weather', '[{"weather_name":"\\u96e8\\u5929","weather_remind":"\\u4eca\\u65e5\\u6709\\u96e8\\uff0c\\u8bf7\\u9884\\u5907\\u96e8\\u5177"},{"weather_name":"\\u5927\\u98ce","weather_remind":"\\u5927\\u98ce\\u964d\\u6e29\\uff0c\\u6ce8\\u610f\\u4fdd\\u6696"}]', NULL, '2015-10-23 02:01:32', '0000-00-00 00:00:00');
INSERT INTO `we_setting` VALUES(33, 'store', '[{"store_name":"adidas","store_code":"123321"},{"store_name":"nike","store_code":"564456"}]', NULL, '2015-11-19 08:26:36', '2015-11-19 06:56:11');

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

INSERT INTO `we_students` VALUES(27, '', '18622111236', '$2y$10$mOpLeHmxa9vOqTqjVz0Q.eiipgKWO72aASyQqeh/qs74Hjikrkj1i', '小白', 0, '11111122', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-11 13:50:10', '2016-05-11 11:55:22', NULL, '0.00', '0.00', '04级2班', 0, NULL, '/data/uploads/1462974610_170374.png', '');
INSERT INTO `we_students` VALUES(29, '', '11111111112', '$2y$10$Nwoki2BhLpGXvkAK21QAK.HDCuwA0O8queTc5z3o8qcbk6lAsYl22', '小王', 0, '222', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-12 01:02:05', '2016-05-11 12:47:16', NULL, '0.00', '0.00', '04级1班', 0, NULL, '/data/uploads/1463014925_169340.png', '');
INSERT INTO `we_students` VALUES(30, '', '88888888888', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲8', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-18 02:33:02', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '/data/audio/1463538782_133228.mp3');
INSERT INTO `we_students` VALUES(34, '', '88888888881', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲1', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:38:50', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(35, '', '88888888882', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲2', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:42:07', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(36, '', '88888888883', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲3', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:42:15', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(37, '', '88888888884', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲4', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:42:22', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(38, '', '88888888885', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲5', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:42:30', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(39, '', '88888888886', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲6', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:42:38', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(40, '', '88888888887', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲7', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:42:47', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(41, '', '88888888889', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲9', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:42:56', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(42, '', '88888888890', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲10', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:43:03', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(43, '', '88888888891', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲11', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:43:14', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(44, '', '88888888892', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲12', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:43:24', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(45, '', '88888888893', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲13', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:43:35', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');
INSERT INTO `we_students` VALUES(46, '', '88888888894', '$2y$10$ClpLdH9V2vF6C7FEi8QlE.HjKeIT71p5XfcGpV86yfxraTwKqdlm6', '小洲14', 0, '231', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-14 06:43:42', '2016-05-11 13:05:28', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463207610_495247.png', '');

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
  KEY `user_name` (`user_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=625 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `we_users`
--

TRUNCATE TABLE `we_users`;
--
-- 转存表中的数据 `we_users`
--

INSERT INTO `we_users` VALUES(1, 'admin', '66666666666', '$2y$10$enOQEgLB3kBq1yqP6q5Ll.Xbk9RMFmvzRpNT1hGe5tw4FRep1/FoG', '管理员', 0, '4432524', 1, 0, '2016-05-18 09:29:27', '::1', 206, 0, NULL, 'jmhK4AFqQYK4otvOLZaXHzlGpTMSGbJhDmbDLYKmEX5pQj8edOCpvwuH70Bs', '2016-05-18 09:29:27', '2015-10-16 09:42:26', NULL, '20.00', '0.00', '无', NULL, '', '', '');
INSERT INTO `we_users` VALUES(19, 'wang', '13444448888', '$2y$10$x8JA.lXBU6whuslRnd/yHOtY0w6Qiup4Ta2ezMYjWv7vwIHNcySAe', '王校长', 123456, '00000002', 1, 0, '2015-11-23 04:51:23', '127.0.0.1', 3, 0, NULL, 'zjaS9m33e5Ea103fpB4Xd64qt8w8Xy5dCd6cljNC0PqFBAnHjE2Mcpb6Vcm9', '2016-05-12 06:00:27', '2015-10-27 07:12:16', NULL, '2852.00', '3.00', '无', 0, NULL, '/data/uploads/1463032827_205046.png', '');
INSERT INTO `we_users` VALUES(30, 'zhou', '15555555555', '$2y$10$72z/QDHgMxYTslW4TUCEguyUSC/9dPmLT29dyOqJo0apRfTIjuNF6', '周会计', 0, '0', 1, 0, '2015-11-03 13:09:41', '127.0.0.1', 4, 0, NULL, 'j6R1AsSW2vTt6rIpS6hBLYlOkdPHvULknXBQDXlpwLlv0xQoMYPWnnPmfHy0', '2016-05-10 12:33:37', '2015-09-16 05:32:44', NULL, NULL, NULL, '无', NULL, '', '', '');
INSERT INTO `we_users` VALUES(58, '', '13865478963', '$2y$10$Kshvs969pF9XTqcrxRXqDutfP44EnkzLlPbOMz5GRIGgcWi79/Ieq', '董老师', 0, '4512121', 0, 0, '2016-05-14 06:14:06', '::1', 1, 0, NULL, 'n1YmR8i4vwrrVAYWi0R6nkDyJKBRqXx4Wi1uQv40dlGeWpCTnA6xBP4IK3cA', '2016-05-14 06:14:16', '2015-09-28 03:36:26', NULL, NULL, NULL, '04级1班', NULL, NULL, '', '');
INSERT INTO `we_users` VALUES(59, '', '13865478964', '$2y$10$Djw6N9etlOaTmxcQMEsK9eS2VnHQhfHkUrwAL7apSaEN3htVU1MOS', '王老师', 0, '4125123', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-11 13:11:01', '2015-09-28 03:36:55', NULL, NULL, NULL, '02级2班', NULL, NULL, '', '');
INSERT INTO `we_users` VALUES(61, '', '11111111111', '$2y$10$it0PK23th./5GRc5/Pd3Wemy14P7sWcYuOffVHD3tT17vaqop2Nti', '李老师', 0, '133434', 0, 0, '2016-05-14 06:21:07', '::1', 2, 0, NULL, '594QzXIbTdZWk6zn3fBVwJAaVbbl1VDgiZvJLScy71awMMuALoLqz94iCyEo', '2016-05-14 06:21:12', '2015-09-29 08:21:06', NULL, NULL, '40.00', '04级2班', NULL, NULL, '', '');
INSERT INTO `we_users` VALUES(620, '', '15620743937', '$2y$10$6vSSEsGzpJJcLficOlns6eRH5lwIthhmVmax.0Uychpl.StEKG1P6', '张老师', 0, '123123', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-11 13:10:43', '2015-10-08 02:58:11', NULL, '1186.00', '200.00', '03级1班', NULL, NULL, '', '');
INSERT INTO `we_users` VALUES(622, '', '18622185062', '$2y$10$eZxBc6TswvQgrW6LMVRbe.q1OirNXee1VxLFxp8uYN1J7WovSTW1G', '白老师', 0, '2123674', 0, 0, '2016-05-16 12:34:05', '::1', 29, 0, NULL, 'ymV83m2J42L1Ng9mvUY2wypOfzNWIsR1ivof70KpCQP1eTYQKF8KyG5owkGS', '2016-05-16 12:34:05', '2016-05-11 11:42:17', NULL, '0.00', '0.00', '03级1班', 0, NULL, '/data/uploads/1463032813_758014.png', '/data/audio/1463538782_133228.mp3');
INSERT INTO `we_users` VALUES(623, '', '18711111111', '$2y$10$xfx.DIF8Z.bpveVwZ3jHquksMe9aJWQNaI6YTDc8oZKMzm.NhNlq6', '刘老师', 0, '111', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-11 13:58:46', '2016-05-11 13:58:46', NULL, '0.00', '0.00', '02级2班', 0, NULL, '/data/uploads/1462975126_206987.png', '');
INSERT INTO `we_users` VALUES(624, '', '19211111111', '$2y$10$97MSiSED7DTggjNXTZMX4O/EII2gO0PwsgqKM5ZFeBKFUt9Cx514e', '凉老师', 0, '22', 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2016-05-12 13:16:50', '2016-05-11 14:11:11', NULL, '0.00', '0.00', '04级1班', 0, NULL, '/data/uploads/1463059010_805466.png', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
