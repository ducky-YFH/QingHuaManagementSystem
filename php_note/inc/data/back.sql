/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80015
 Source Host           : localhost:3306
 Source Schema         : yefh_school

 Target Server Type    : MySQL
 Target Server Version : 80015
 File Encoding         : 65001

 Date: 04/06/2019 09:47:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for yefh_back
-- ----------------------------
DROP TABLE IF EXISTS `yefh_back`;
CREATE TABLE `yefh_back`  (
  `admin_id` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_pa` char(55) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yefh_back
-- ----------------------------
INSERT INTO `yefh_back` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

SET FOREIGN_KEY_CHECKS = 1;
