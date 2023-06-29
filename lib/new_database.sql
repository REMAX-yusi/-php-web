-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-06-29 03:09:38
-- 服务器版本： 8.0.31
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `new_database`
--

-- --------------------------------------------------------

--
-- 表的结构 `im_collect`
--

DROP TABLE IF EXISTS `im_collect`;
CREATE TABLE IF NOT EXISTS `im_collect` (
  `id` int NOT NULL COMMENT '收藏id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '番剧名称',
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '番剧图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `im_collect`
--

INSERT INTO `im_collect` (`id`, `name`, `img`) VALUES
(5, '为美好的世界献上祝福', 'http://localhost/web/static/file/suqing/suqing.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `im_fans`
--

DROP TABLE IF EXISTS `im_fans`;
CREATE TABLE IF NOT EXISTS `im_fans` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '番剧id',
  `name` varchar(100) COLLATE utf8mb4_bin NOT NULL COMMENT '番剧名称',
  `episode` int NOT NULL COMMENT '集数',
  `date` date NOT NULL COMMENT '番剧发行日期',
  `introduce` varchar(200) COLLATE utf8mb4_bin NOT NULL COMMENT '番剧简介',
  `img` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '番剧图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `im_fans`
--

INSERT INTO `im_fans` (`id`, `name`, `episode`, `date`, `introduce`, `img`) VALUES
(1, '杀戮天使', 16, '2018-07-06', '「拜托你，杀了我」\r\n\r\n「帮我一起从这里出去吧。那样的话，我就会杀了你」\r\n\r\n在这两人之间的奇妙羁绊，随着那「荒诞的约定」而逐渐加深。\r\n\r\n究竟，这里是什么地方。\r\n\r\n两人为何被囚禁于此，等待着两人的命运又是如何。\r\n\r\n为了从密闭大楼逃出的抱死觉悟之行，揭开了序幕……!\r\n\r\n两人最终是否能够坚守「约定」，并且安全的逃出这栋大楼?', 'http://localhost/web/static/file/slts/slts.jpg'),
(2, '卫宫家今天的饭', 13, '2017-12-31', '「Fate」×「料理」＝「温柔」\r\n\r\n谁都可以做出来的卫宫士郎的料理。\r\n\r\n卫宫士郎得意的料理，冬木的居民和从者们沉浸在温馨的气氛中。附有详细的食谱，都看着士郎料理的同调 开始（Trace on）吧!', 'http://localhost/web/static/file/wgjjtdf/wgjjtdf.jpg'),
(3, '魔女之旅', 12, '2020-10-02', '某个地方有个正在旅行的魔女，她的名字是伊蕾娜。\r\n身为旅人，在很长很长的旅途中，她与形形色色的国家与人们邂逅。\r\n\r\n只允许魔法师入境的国家、\r\n最喜欢肌肉的壮汉、\r\n在死亡深渊等待恋人归来的青年、\r\n独自留守国家早已灭亡的公主…\r\n\r\n最后，还有她身为魔女的至今为止与从今以后。\r\n和莫名其妙、滑稽可笑的人们相遇，接触某人美丽的日常生活，魔女日复一日编织出相逢与离别的故事。', 'http://localhost/web/static/file/mnzl/mnzl.png'),
(4, 'DARLING in the FRANXX', 24, '2018-01-13', '他们拥有梦想。\r\n总有一天，飞向广阔天空的梦想。\r\n知晓被玻璃遮盖的这片天空有多么遥远。\r\n\r\n遥远的未来。\r\n人类在荒废的大地上建设了移动要塞都市“种植园”，并讴歌着文明。\r\n\r\n在那当中建造的驾驶员居住设施“米斯特汀”[1]，通称“鸟笼”。\r\n孩子们就住在那里。\r\n对外面的世界一无所知。\r\n对自由的天空一无所知。\r\n他们被告知的使命，只有战斗而已。\r\n\r\n敌人是一切都被谜团覆盖的巨大生命体“叫', 'http://localhost/web/static/file/DARLING/DARLING.JPG'),
(5, '为美好的世界献上祝福', 11, '2016-01-13', '热爱游戏的家里蹲少年·佐藤和真的人生，\r\n因在交通事故中舍己救人（?!）（被拖拉机吓死）而轻易闭幕……\r\n本该是这样，但当他醒来之时，眼前有一位自称是女神的美少女（智障）。\r\n“喂，我有点好事要告诉你。要去异世界吗？只带一样你喜欢的东西，没问题喔。”\r\n“那，我就带着你好了。”\r\n由此开始，在异世界转生的和真的魔王讨伐大冒险开始了……\r\n\r\n虽然是这么想的，但他却为了获得衣食住行而开始劳动！', 'http://localhost/web/static/file/suqing/suqing.jpg'),
(6, 'Assault Lily', 12, '2020-10-01', '近未来的地球出现名为「Huge」的未知生命体，人类面临毁灭的危机。\r\n\r\n全世界为了对抗「Huge」而团结一心，并成功开发了集合了科学与魔法的力量、名为「Charm」的决战兵器。「Charm」对于十几岁的少女显现出高同步率，而能够操纵「Charm」的少女被称作「莉莉（Lily）」并逐渐被视为英雄。为了对抗「Huge」而成立的「莉莉」养成机构「园圃（Garden）」设立于世界各地，并作为据点成为守护', 'http://localhost/web/static/file/assaultlily/assaultlily.jpg'),
(7, 'Fate/stay night Unlimited Blade Works', 26, '2014-10-04', '圣杯是传说中可实现持有者一切愿望的宝物。而为了得到圣杯的仪式就被称为圣杯战争。 参加圣杯战争的7名由圣杯选出的魔术师被称为Master，与7名被称为Servant的使魔订定契约。他们是由圣杯选择的七位英灵，被分为七个职阶，以使魔的身份被召唤出来。能获得圣杯的只有一组，这7组人马各自为了成为最后的那一组而互相残杀。 卫宫切嗣的养子卫宫士郎，偶然地与servant中的剑士Saber（セイバー）订定契约', 'http://localhost/web/static/file/fateubw/fateubw.jpg'),
(8, 'Fate Zero', 25, '2011-10-01', '为了得到“圣杯”能实现一切愿望的奇迹之术，七名魔术师召唤七名英灵发起一场圣战。他们必须奋战到底，因为最终只有一人可以获得“圣杯”的力量－－“圣杯战争”就此展开。这场圣战并没有因为过去的三次战役而平息；如今，第四次战役即将开火。魔术师们带着必胜的决心，聚集到被称为“冬木”的战场迎接这神圣的战役。然而，他们之中却有一人不明白自己到底为何而战。他就是──言峰绮礼。言峰绮礼不能理解自己为什么被选中，并被赋', 'http://localhost/web/static/file/fatezero/fatezero.jpg'),
(9, 'Happy Sugar Life', 12, '2018-07-14', '松坂砂糖有了喜欢的人只要和那个人互相接触，心里就会涌起非常甜蜜的心情这肯定就是「爱」了吧，她这么想道为了守护这份感情，无论做出什么都可以被原谅去欺骗、去侵犯、去掠夺、去杀害也是可以的哟', 'http://localhost/web/static/file/happysugarlife/happysugarlife.jpg'),
(10, '游戏人生', 12, '2014-04-09', '\r\n“听说游戏玩家兄妹要征服幻想世界。”空与白既是尼特族又是家里蹲，但是在网络上却是被奉为都市传说的天才游戏玩家兄妹。称呼现实世界为“烂游戏”的两人，某一天被自称是“神”的少年召唤至异世界，那是个战争为神所禁止，“游戏决定一切”的世界─没错，甚至连国界也一样。被其他种族逼至绝境，只剩下最后都市的“人类种”，空与白这两个废人兄妹能够成为这异世界之中的“人类救世主”吗？“——来吧，游戏开始了。” ', 'http://localhost/web/static/file/nogamenolife/nogamenolife.jpg'),
(11, '约定的梦幻岛', 12, '2019-01-09', '仰慕的母亲并非亲生母亲。一起生活的他们并非兄弟。Grace=Field House是没有父母的孩子们居住的地方。虽然没有血缘关系，但妈妈和38个兄弟都度过了幸福的每一天，这是不可替代的家。但是，他们的日常在某一天突然宣告结束…', 'http://localhost/web/static/file/yddmhd/yddmhd.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `im_history`
--

DROP TABLE IF EXISTS `im_history`;
CREATE TABLE IF NOT EXISTS `im_history` (
  `id` int NOT NULL COMMENT '观看id',
  `name` varchar(100) COLLATE utf8mb4_bin NOT NULL COMMENT '番剧名称',
  `img` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '番剧图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `im_history`
--

INSERT INTO `im_history` (`id`, `name`, `img`) VALUES
(5, '为美好的世界献上祝福', 'http://localhost/web/static/file/suqing/suqing.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `im_user`
--

DROP TABLE IF EXISTS `im_user`;
CREATE TABLE IF NOT EXISTS `im_user` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '用户名',
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '密码',
  `create_time` int NOT NULL COMMENT '创建时间',
  `sex` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '性别',
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '邮箱',
  `QQ` int NOT NULL COMMENT 'QQ号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COMMENT='用户表';

--
-- 转存表中的数据 `im_user`
--

INSERT INTO `im_user` (`id`, `username`, `password`, `create_time`, `sex`, `mail`, `QQ`) VALUES
(1, 'guanli', '123456', 1687872715, '1', '12345678@qq.com', 1234567891),
(2, 'guanli2', '123456', 1687872715, '1', '12345678@qq.com', 1234567891);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
