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

 Date: 18/04/2019 00:37:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE yefh_school;
USE yefh_school;
-- ----------------------------
-- Table structure for yefh_class
-- ----------------------------
DROP TABLE IF EXISTS `yefh_class`;
CREATE TABLE `yefh_class`  (
  `stu_class` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stu_year` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `major_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`stu_class`) USING BTREE,
  INDEX `major_name`(`major_name`) USING BTREE,
  CONSTRAINT `yefh_class_ibfk_1` FOREIGN KEY (`major_name`) REFERENCES `yefh_major` (`major_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yefh_class
-- ----------------------------
INSERT INTO `yefh_class` VALUES ('动漫制作3-1', '2016', '动漫制作');
INSERT INTO `yefh_class` VALUES ('计算机应用技术3-3', '2017', '计算机应用技术');
INSERT INTO `yefh_class` VALUES ('计算机网络技术3-2', '2017', '计算机应用技术');
INSERT INTO `yefh_class` VALUES ('软件技术3-2', '2017', '软件技术');
INSERT INTO `yefh_class` VALUES ('软件技术3-3', '2017', '软件技术');

-- ----------------------------
-- Table structure for yefh_course
-- ----------------------------
DROP TABLE IF EXISTS `yefh_course`;
CREATE TABLE `yefh_course`  (
  `c_id` int(11) NOT NULL,
  `c_code` char(7) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `c_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `c_grade` int(4) NOT NULL,
  `major_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `c_term` int(1) NOT NULL,
  `c_point` float NOT NULL,
  `c_weekh` float NOT NULL,
  `c_week` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `c_totalh` float NOT NULL,
  `c_type` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `c_exam` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`c_id`) USING BTREE,
  INDEX `major_name`(`major_name`) USING BTREE,
  CONSTRAINT `yefh_course_ibfk_1` FOREIGN KEY (`major_name`) REFERENCES `yefh_major` (`major_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yefh_course
-- ----------------------------
INSERT INTO `yefh_course` VALUES (1, '3001456', 'Web项目应用', 2017, '计算机应用技术', 4, 3, 4, '01-18', 56, '专业核心课', '过程性考核');
INSERT INTO `yefh_course` VALUES (2, '3001457', 'Android开发', 2017, '软件技术', 4, 3, 4, '01-18', 56, '专业基础课', '集中考试');
INSERT INTO `yefh_course` VALUES (3, '3001458', '网络安全管理', 2017, '计算机应用技术', 4, 3, 4, '01-18', 56, '专业核心课', '过程性考核');
INSERT INTO `yefh_course` VALUES (4, '3001459', 'linux操作系统', 2017, '计算机应用技术', 4, 3, 4, '01-18', 56, '专业核心课', '过程性考核');
INSERT INTO `yefh_course` VALUES (5, '3001460', '智能家居控制技术应用', 2017, '计算机应用技术', 4, 3, 4, '01-14', 30, '专业基础课', '过程性考核');
INSERT INTO `yefh_course` VALUES (6, '3001461', 'C语言编程', 2017, '软件技术', 4, 3, 4, '01-18', 56, '专业核心课', '集中考试');

-- ----------------------------
-- Table structure for yefh_dep
-- ----------------------------
DROP TABLE IF EXISTS `yefh_dep`;
CREATE TABLE `yefh_dep`  (
  `dep_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`dep_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yefh_dep
-- ----------------------------
INSERT INTO `yefh_dep` VALUES ('数字媒体学院');
INSERT INTO `yefh_dep` VALUES ('计算机学院');
INSERT INTO `yefh_dep` VALUES ('软件工程学院');

-- ----------------------------
-- Table structure for yefh_major
-- ----------------------------
DROP TABLE IF EXISTS `yefh_major`;
CREATE TABLE `yefh_major`  (
  `major_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `major_lenght` int(1) NOT NULL,
  `dep_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`major_name`) USING BTREE,
  INDEX `dep_name`(`dep_name`) USING BTREE,
  CONSTRAINT `yefh_major_ibfk_1` FOREIGN KEY (`dep_name`) REFERENCES `yefh_dep` (`dep_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yefh_major
-- ----------------------------
INSERT INTO `yefh_major` VALUES ('动漫制作', 3, '数字媒体学院');
INSERT INTO `yefh_major` VALUES ('计算机应用技术', 3, '计算机学院');
INSERT INTO `yefh_major` VALUES ('计算机网络技术', 3, '计算机学院');
INSERT INTO `yefh_major` VALUES ('软件技术', 3, '软件工程学院');

-- ----------------------------
-- Table structure for yefh_score
-- ----------------------------
DROP TABLE IF EXISTS `yefh_score`;
CREATE TABLE `yefh_score`  (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NULL DEFAULT NULL,
  `stu_id` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sc_normal` float NULL DEFAULT NULL,
  `sc_lab` float NULL DEFAULT NULL,
  `sc_midterm` float NULL DEFAULT NULL,
  `sc_final` float NULL DEFAULT NULL,
  `sc_overall` float NULL DEFAULT NULL,
  `sc_makeup` float NULL DEFAULT NULL,
  `sc_again` float NULL DEFAULT NULL,
  PRIMARY KEY (`sc_id`) USING BTREE,
  INDEX `task_id`(`task_id`) USING BTREE,
  INDEX `stu_id`(`stu_id`) USING BTREE,
  CONSTRAINT `yefh_score_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `yefh_task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yefh_score_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `yefh_stu` (`stu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for yefh_stu
-- ----------------------------
DROP TABLE IF EXISTS `yefh_stu`;
CREATE TABLE `yefh_stu`  (
  `stu_id` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stu_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stu_pa` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stu_class` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `avatar` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`stu_id`) USING BTREE,
  INDEX `stu_class`(`stu_class`) USING BTREE,
  CONSTRAINT `yefh_stu_ibfk_1` FOREIGN KEY (`stu_class`) REFERENCES `yefh_class` (`stu_class`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for yefh_task
-- ----------------------------
DROP TABLE IF EXISTS `yefh_task`;
CREATE TABLE `yefh_task`  (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `te_id` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `c_id` int(11) NOT NULL,
  `stu_class` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `task_term` char(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `task_time` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `task_room` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`task_id`) USING BTREE,
  INDEX `te_id`(`te_id`) USING BTREE,
  INDEX `c_id`(`c_id`) USING BTREE,
  INDEX `stu_class`(`stu_class`) USING BTREE,
  CONSTRAINT `yefh_task_ibfk_1` FOREIGN KEY (`te_id`) REFERENCES `yefh_te` (`te_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yefh_task_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `yefh_course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yefh_task_ibfk_3` FOREIGN KEY (`stu_class`) REFERENCES `yefh_class` (`stu_class`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yefh_task
-- ----------------------------
INSERT INTO `yefh_task` VALUES (1, '1542314', 1, '计算机应用技术3-3', '181902', '周五1-4', '知行楼7-501外');
INSERT INTO `yefh_task` VALUES (2, '1215478', 2, '计算机应用技术3-3', '181902', '周二1-4', '知行楼7-503内');
INSERT INTO `yefh_task` VALUES (3, '1021545', 3, '计算机应用技术3-3', '181902', '周三1-4', '知行楼5-504外');
INSERT INTO `yefh_task` VALUES (4, '1021545', 4, '计算机应用技术3-3', '181902', '周四1-4', '知行楼7-501外');
INSERT INTO `yefh_task` VALUES (5, '1215478', 5, '计算机应用技术3-3', '181902', '周一1-4', '知行楼7-302外');
INSERT INTO `yefh_task` VALUES (6, '1478549', 6, '软件技术3-2', '181902', '周一5-8', '知行楼5-304外');

-- ----------------------------
-- Table structure for yefh_te
-- ----------------------------
DROP TABLE IF EXISTS `yefh_te`;
CREATE TABLE `yefh_te`  (
  `te_id` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `te_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `te_pa` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dep_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `avatar` varchar(55) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`te_id`) USING BTREE,
  INDEX `dep_name`(`dep_name`) USING BTREE,
  CONSTRAINT `yefh_te_ibfk_1` FOREIGN KEY (`dep_name`) REFERENCES `yefh_dep` (`dep_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yefh_te
-- ----------------------------
INSERT INTO `yefh_te` VALUES ('1021545', '汪伟明', '71b3b26aaa319e0cdf6fdb8429c112b0', '计算机学院','te');
INSERT INTO `yefh_te` VALUES ('1215478', '唐琪', 'e10adc3949ba59abbe56e057f20f883e', '计算机学院','te');
INSERT INTO `yefh_te` VALUES ('1245474', '何思文', 'e10adc3949ba59abbe56e057f20f883e', '计算机学院','te');
INSERT INTO `yefh_te` VALUES ('1478549', '吴稳', 'e10adc3949ba59abbe56e057f20f883e', '软件工程学院','te');
INSERT INTO `yefh_te` VALUES ('1542314', '桂荣枝', 'e10adc3949ba59abbe56e057f20f883e', '计算机学院','te');

SET FOREIGN_KEY_CHECKS = 1;
