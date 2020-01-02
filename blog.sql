/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : blog

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 02/01/2020 15:04:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bl_articles
-- ----------------------------
DROP TABLE IF EXISTS `bl_articles`;
CREATE TABLE `bl_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `keywords` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `author` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `create_time` timestamp(4) NULL DEFAULT NULL,
  `click` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  `cate_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `indexTitle` (`title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bl_articles
-- ----------------------------
BEGIN;
INSERT INTO `bl_articles` VALUES (12, 'Mac 安装tp框架', 'tp框架', '1. 进入项目对应的目录中\r\n\r\n    cd www\r\n		\r\n2.引入最新的tp框架\r\n\r\n    composer create-project topthink/think 项目名称\r\n		\r\n3.引入tp5.1的框架\r\n\r\n    composer create-project topthink/think=5.1.* 项目名称', 'GoodWin', '2019-12-31 00:00:00.0000', 4, 1, 0);
COMMIT;

-- ----------------------------
-- Table structure for bl_category
-- ----------------------------
DROP TABLE IF EXISTS `bl_category`;
CREATE TABLE `bl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bl_category
-- ----------------------------
BEGIN;
INSERT INTO `bl_category` VALUES (1, 'Coding');
INSERT INTO `bl_category` VALUES (2, 'Database');
INSERT INTO `bl_category` VALUES (3, 'Linux/OS X');
INSERT INTO `bl_category` VALUES (4, 'Go');
COMMIT;

-- ----------------------------
-- Table structure for bl_login
-- ----------------------------
DROP TABLE IF EXISTS `bl_login`;
CREATE TABLE `bl_login` (
  `hh` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for bl_tags
-- ----------------------------
DROP TABLE IF EXISTS `bl_tags`;
CREATE TABLE `bl_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

SET FOREIGN_KEY_CHECKS = 1;
