/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : atest

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-08-08 18:24:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for s_user
-- ----------------------------
DROP TABLE IF EXISTS `s_user`;
CREATE TABLE `s_user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL COMMENT '类型',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s_user
-- ----------------------------
INSERT INTO `s_user` VALUES ('1', 'aa', '123456', '1', '1');
INSERT INTO `s_user` VALUES ('2', 'ss', '123456', '1', '2');
INSERT INTO `s_user` VALUES ('3', 'dd', '123456', '1', '1');
INSERT INTO `s_user` VALUES ('4', 'ff', '123456', '1', '2');
INSERT INTO `s_user` VALUES ('5', 'gg', '123456', '1', '1');
INSERT INTO `s_user` VALUES ('6', 'hh', '123456', '1', '2');
INSERT INTO `s_user` VALUES ('7', 'jj', '123456', '1', '2');
INSERT INTO `s_user` VALUES ('8', 'kk', '123456', '1', '2');
