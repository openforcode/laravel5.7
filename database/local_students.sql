/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 80013
 Source Host           : localhost:3306
 Source Schema         : laravel

 Target Server Type    : MySQL
 Target Server Version : 80013
 File Encoding         : 65001

 Date: 31/01/2019 17:20:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for local_students
-- ----------------------------
DROP TABLE IF EXISTS `local_students`;
CREATE TABLE `local_students`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL,
  `status` smallint(1) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of local_students
-- ----------------------------
INSERT INTO `local_students` VALUES (1, 'jime', 'desc', '2019-01-29 10:42:59', '2019-01-30 14:41:02', 0);
INSERT INTO `local_students` VALUES (2, 'loose', 'favarate fruit ', '2019-01-29 14:41:36', NULL, 1);
INSERT INTO `local_students` VALUES (3, 'kaven', 'you can you do', '2019-01-31 15:55:04', NULL, 0);
INSERT INTO `local_students` VALUES (4, 'mary', 'no zuo no die', '2019-01-17 15:55:26', NULL, 1);
INSERT INTO `local_students` VALUES (5, 'fuck', 'fuck you ', '2019-01-08 15:55:41', NULL, 1);
INSERT INTO `local_students` VALUES (6, '周伯通', '中文测试', '2019-01-31 09:13:20', '2019-01-31 09:13:20', 0);

SET FOREIGN_KEY_CHECKS = 1;
