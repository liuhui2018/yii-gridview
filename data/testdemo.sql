/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 80023
 Source Host           : localhost:3306
 Source Schema         : testdemo

 Target Server Type    : MySQL
 Target Server Version : 80023
 File Encoding         : 65001

 Date: 06/07/2022 16:26:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `code` char(3) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
  `t_status` enum('ok','hold') CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL DEFAULT 'ok',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of supplier
-- ----------------------------
BEGIN;
INSERT INTO `supplier` VALUES (1, '中国', 'A', 'ok');
INSERT INTO `supplier` VALUES (2, '美国', 'B', 'ok');
INSERT INTO `supplier` VALUES (3, '德国', 'C', 'ok');
INSERT INTO `supplier` VALUES (4, '俄罗斯', 'D', 'ok');
INSERT INTO `supplier` VALUES (5, '英国', 'E', 'ok');
INSERT INTO `supplier` VALUES (6, '法国', 'F', 'hold');
INSERT INTO `supplier` VALUES (7, '瑞典', 'G', 'ok');
INSERT INTO `supplier` VALUES (8, '印度', 'H', 'ok');
INSERT INTO `supplier` VALUES (9, '西班牙', 'I', 'ok');
INSERT INTO `supplier` VALUES (10, '韩国', 'J', 'ok');
INSERT INTO `supplier` VALUES (11, '越南', 'K', 'ok');
INSERT INTO `supplier` VALUES (12, '缅甸', 'L', 'ok');
INSERT INTO `supplier` VALUES (13, '日本', 'M', 'ok');
INSERT INTO `supplier` VALUES (14, '泰国', 'N', 'ok');
INSERT INTO `supplier` VALUES (15, '加拿大', 'O', 'ok');
INSERT INTO `supplier` VALUES (16, '以色列', 'P', 'ok');
INSERT INTO `supplier` VALUES (17, '阿富汗', 'Q', 'ok');
INSERT INTO `supplier` VALUES (18, '伊拉克', 'R', 'ok');
INSERT INTO `supplier` VALUES (19, '捷克', 'S', 'ok');
INSERT INTO `supplier` VALUES (20, '保加利亚', 'T', 'ok');
INSERT INTO `supplier` VALUES (21, '乌克兰', 'U', 'ok');
INSERT INTO `supplier` VALUES (22, '丹麦', 'V', 'ok');
INSERT INTO `supplier` VALUES (23, '芬兰', 'W', 'ok');
INSERT INTO `supplier` VALUES (24, '巴西', 'X', 'ok');
INSERT INTO `supplier` VALUES (25, '墨西哥', 'Y', 'ok');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
