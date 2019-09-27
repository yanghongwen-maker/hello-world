-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-05-26 02:35:57
-- 服务器版本： 5.7.15
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tmlog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_article`
--

CREATE TABLE `tb_article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` mediumtext NOT NULL COMMENT '内容',
  `author` varchar(64) NOT NULL COMMENT '作者',
  `time` int(11) NOT NULL COMMENT '发表时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_article`
--

INSERT INTO `tb_article` (`id`, `title`, `content`, `author`, `time`) VALUES
(1, 'iOS狂暴之路---视图控制器(UIViewController)使用详解', '在之前的一片文章中已经介绍了 从iOS的第一个应用中能学习到哪些知识点 在那篇文章中主要介绍了一个iOS程序的启动过程和应用的几大对象，以及应用的生命周期，同时也介绍了应用中的控制器知识点，介绍了其生命周期方法，那么对于一个iOS应用一般都是会包含多个页面，而每个页面就是一个控制器，一个控制器一般都是关系到一个UIView的，但是我们在真正使用这些控制器的时候会发现，多个页面之间的跳转关系该如何控制。在之前的文章知道一个应用对应一个窗口对象UIWindow，每个窗口都有一个根控制器对象，那么如果一个应用有多个控制器该如何管理这些控制器呢？那么就是本文需要介绍的重点了。', 'asfea ', 2345),
(4, 'dt ', '<p>\r\n							请填写内容						</p>', '123', 1487221585),
(5, 's44444444444444444444444444444444444444444', '<p>\r\n							请填写内容						</p>', '123', 1487233599),
(6, 'fjyctsre', '<p>\r\n										请填写内容<img src=\"/ueditor/php/upload/image/20170217/1487299294207000.jpg\" title=\"1487299294207000.jpg\" alt=\"1d7c3211eba65ca6b328d7f28e10ecc6.jpg\"/>\r\n									</p>', '123', 1487299295),
(7, '	sjrth				', '<p>										</p><p><br/></p><p>sessswwwwssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</p><p>2222222222222222222222222222</p><p><br/></p><p>									</p>', '1231', 1487312166),
(8, 'Android Things专题 1.前世今生 					', '<p>文｜ 谷歌开发者技术专家, 物联网方向 (IOT GDE) 王玉成(York Wang)<br/><br/><span style=\"white-space: pre;\">	</span>2016 年 12 月，Google 发布了 Developer Preview 版的 Android Things，该平台为利用 Android 这一世界上最受支持的操作系统的强大功能构建物联网产品铺平了广阔的道路。但它并不是一个全新的操作系统，而是通过同样是 Google 开发的物联网操作系统 Brillo 改进优化的一个操作系统。。今天，就跟大家说说 Android Things 的前世与今生，以及它与Brillo的渊源，到底它解决了什么问题？<br/>&nbsp;<br/><span style=\"white-space: pre;\">	</span>想知道为什么人们需要 Android Things，就要首先搞清楚什么是物联网：<br/><span style=\"white-space: pre;\">	</span>以前我们在聊到物联网的话题时，只知道物联网使我们的生活更智能、更方便、更高效。可以方便地控制智能设备。<br/><br/><span style=\"white-space: pre;\">	</span>即使最简单的控制设备，也会要求物联网具有三个最基本层次，每个层次的功能有所不同，春节刚过，我们就以春节回家为例，来说说物联网的这几个层次和它的功能能力。</p>', 'ccy', 1487725845),
(10, '京东分布式数据库系统演进之路 ', '<p>关于数据库的使用，在京东有几个趋势，早期在京东主要用SqlServer及Oracle也有少量采用MySQL，随着业务发展技术积累及使用成本等因素，很多业务都开始使用MySQL，包括早期使用SqlServer及Oracle的很多核心业务也都渐渐的开始迁移到MySQL，单机的MySQL往往无法支撑这类业务，需要考分布式的解决方案，另外原本使用MySQL的业务随着数据量及访问量的增加也会遇到瓶颈最终也会考虑采用分布式解决的方案，整个京东发展趋势如图1所示。</p><p><br/></p><p>图片描述</p><p><br/></p><p><img src=\"/ueditor/php/upload/image/20170222/1487732992576110.png\" title=\"1487732992576110.png\" alt=\"20170222085336553.png\"/></p><p>图1 业务使用数据库演变趋势</p><p><br/></p><p>分布式的数据库解决方案有很多种，在各个互联网公司使用得也是非常的普遍，本质上就是将数据拆开存储在多个节点上从而缓解单节点的压力，业务层面也可以根据业务特点自行进行拆分，如图2所示，假设有一张user表，以ID为拆分键，假设拆分成两份，最简单的就是奇数ID的数据落到一个存储节点上，偶数ID的数据落到另外一个存储节点上，实际部署示意图如图3所示。</p><p><br/></p><p>除了业务层面做拆分，也可以考虑采用较为通用的一些解决方案，主要分为两类，一类是客户端解决方案，这种方案是在业务应用中引入特定的客户端包，通过该客户端包完成数据的拆分查询及结果汇总等操作，这种方案对业务有一定侵入性，随着业务应用实例部署的数量比较大，数据库端可能会面临连接数压力比较大的问题，另外版本升级也比较困难，优点是链路较短，从应用实例直接到数据库。</p><p><br/></p><p>图片描述</p><p><img src=\"/ueditor/php/upload/image/20170222/1487733008579132.png\" title=\"1487733008579132.png\" alt=\"20170222085404288.png\"/></p><p><br/></p><p>图2 数据拆分示意图</p><p><br/></p><p>另一类是中间件的解决方案，这种方案是提供兼容数据库传输协议及语法规范的代理，业务在连接中间件的时候可以直接使用传统的JDBC等客户端，从而大大减轻了业务开发层面的负担，弊端是中间件的开发难度会比客户端方案稍微高一点，另外网络传输链路上多走了一段，理论上对性能略有影响，实际使用环境中这些系统都是在机房内网访问，这种网络上的影响完全可以忽略不计。</p><p><br/></p><p>图片描述</p><p><br/></p><p><br/></p><p>图3 系统部署示意图</p><p><br/></p><p>根据上述分析，为了更好的支撑京东大量的大规模数据量的业务，我们开发了一套兼容MySQL协议的分布式数据库的中间件解决方案，我们称之为JProxy，这套方案经过了多次的演变最终完成并支撑了京东全集团的去Oracle/Sqlserver任务。</p><p><br/></p><p>JProxy第一个版本如图4所示，每个JProxy都会有一个配置文件，我们会在配置文件中配置相应业务的库表拆分信息及路由信息， JProxy接收到SQL以后会对SQL进行解析再根据路由信息决定SQL是否需要重写及该发往哪些节点，等各节点结果返回以后再将结果汇总按照MySQL传输协议返回给应用。</p><p><br/></p><p>结合上文的例子，当用户查询user这张表时假设SQL语句是select * from user where id = 1 or id = 2，当收到这条SQL以后，JProxy会将SQL拆分为select * from user where id=1 及select * from user where id = 2， 再分别把这两条sql语句发往后端的节点上，最后将两个节点上获取到的两条记录一并返回给应用。</p><p><br/></p><p>这种方案在业务库表比较少的时候是可行的，随着业务的发展库表的数量可能会不断增加，尤其是针对去Oracle的业务在切换数据库的时候可能是一次切换几张表，下一次再切换另外几张表，这就要求经常修改配置文件。另外JProxy在部署的时候至少需要部署两份甚至多份，如图5所示，此时面临一个问题是如何保证所有的配置文件在不断修改的过程中是完全一致的。在早期运维过程中，我们靠人工修改完一份配置文件，再将相应的配置文件拷贝给其他的JProxy，确保JProxy配置文件内容一致，这个过程心智负担较重且容易出错。</p><p><br/></p>', 'ccy', 1487733011),
(11, '系统测试', '<p>系统测试中</p>', '常春', 1493345111),
(12, '专门为餐厅研发的微软平板 只有欧洲和中东才有		', '<p>【<strong>PConline 资讯</strong>】近日，在微软Build 2017大会上，微软推出了全新的运行Windows 10 IoT Core的Kodisoft交互式平板。这是一款专门为餐厅设计的平板电脑，但在用途上能实现的东西更多，不仅仅局限于餐厅。</p><p>　这款平板使用了一块4K级别的显示屏，搭载了英特尔酷睿i7处理器和GTX 1070显卡。在这款平板电脑上可以进行国际象棋、桌上冰球这一类型的游戏，或者是进行虚拟拼图。除此之外，顾客还可以用它来向餐厅内的另外一名顾客送礼物，如为其购买一杯饮料。</p>', 'cc', 1494816687);

-- --------------------------------------------------------

--
-- 表的结构 `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `art_id` int(10) UNSIGNED NOT NULL COMMENT '文章ID',
  `username` varchar(32) NOT NULL COMMENT '用户名',
  `content` text NOT NULL COMMENT '内容',
  `time` int(10) UNSIGNED NOT NULL COMMENT '发表时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_comment`
--

INSERT INTO `tb_comment` (`id`, `art_id`, `username`, `content`, `time`) VALUES
(1, 2, '19', '111111111111111111111111111111111111', 1111111),
(2, 2, '19', '\r\n请填写内容faaaaaaaaaaaaa\r\n\r\n', 1487233199),
(3, 2, '19', '<p>\r\n							请填写内容agrrrrrrrrrrrrrrrrrrrrrr</p>', 1487233376),
(4, 2, '123', '<p>\r\n							请填写内容afweeeeeeeeeeeeeeeee</p>', 1487233502),
(5, 3, '123', '<p>\r\n							请填写内容srrrrrrrzzzzzzz</p>', 1487233587),
(6, 5, '123', '<p>\r\n							请填写内容4ey5555555555555555555555555555555555555</p>', 1487233610),
(7, 5, '123', '<p>\r\n							请填写内容afw</p>', 1487234872),
(8, 2, '123', '<p>\r\n							请填写内容统计信息寻寻寻寻寻寻寻寻寻</p>', 1487238141),
(9, 7, '1231', '<p>\r\n							请填写内容awwwwwwwwwwwwwwww</p>', 1487312227),
(10, 1, 'ccy', '<p>\r\n							请填写内容到家了数据库的健康两居室空间的反馈</p>', 1487725380),
(11, 1, 'ccy', '<p>\r\n							请填写内容第三方科技发大水了就分手了富家大室昆仑决受打击了看都放假了</p>', 1487725406),
(30, 8, 'ccy', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;讲解非常详细，透彻，值得一读。<img src=\"http://img.baidu.com/hi/jx2/j_0048.gif\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</p>', 1494749454),
(13, 7, 'ccy', '<p>\r\n							请填写内容<img src=\"/ueditor/php/upload/image/20170222/1487732778384765.jpg\" title=\"1487732778384765.jpg\" alt=\"ly.jpg\"/>\r\n						</p>', 1487732782),
(17, 7, '常春', '<p>\r\n							请填写内容<img src=\"/ueditor/php/upload/image/20170428/1493347690701904.jpg\" title=\"1493347690701904.jpg\" alt=\"1815a78cddd5c686f1f70f0e29f1_600_600_c1.jpg\"/></p>', 1493347696),
(21, 7, '常春', '<p>\r\n							请填写内容<img src=\"/ueditor/php/upload/image/20170428/1493347775367919.jpg\" title=\"1493347775367919.jpg\" alt=\"23_092434_7.jpg\"/>\r\n						</p>', 1493347776),
(22, 7, '常春', '<p>\r\n							请填写内容						</p>', 1493347784),
(23, 7, '常春', '<p>\r\n							请填写内容						</p>', 1493347789),
(27, 1, '常春', '<p>\r\n							请填写内容\r\n的生日好地方<img title=\"1493348085287231.png\" alt=\"0.png\" src=\"/ueditor/php/upload/image/20170428/1493348085287231.png\"/>						</p>', 1493348086),
(28, 9, '常春', '<p>\r\n							请填写内容<img src=\"/ueditor/php/upload/image/20170428/1493349031606262.png\" title=\"1493349031606262.png\" alt=\"0.png\"/>\r\n						</p>', 1493349032);

-- --------------------------------------------------------

--
-- 表的结构 `tb_friend`
--

CREATE TABLE `tb_friend` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL COMMENT '好友姓名',
  `username` varchar(64) NOT NULL COMMENT '用户名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_friend`
--

INSERT INTO `tb_friend` (`id`, `name`, `username`) VALUES
(4, '123', '123'),
(5, '邮箱验证wq', '123'),
(6, '123456', 'ccy'),
(7, '123', 'ccy'),
(8, '常春', '常春'),
(9, 'ccy', '常春'),
(10, 'cc', 'cc');

-- --------------------------------------------------------

--
-- 表的结构 `tb_notice`
--

CREATE TABLE `tb_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `time` int(11) NOT NULL COMMENT '发表时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_notice`
--

INSERT INTO `tb_notice` (`id`, `title`, `content`, `time`) VALUES
(1, '课时安排', '注：\r\n1、开课前会有短信提醒或者邮件提醒，还请报名的时候填写正确的手机号码及邮箱地址\r\n2、开课后2-3个工作日内会上传本节课的视频回放，请无法观看直播视频的同学放心，回放视频不限时观看，届时请到报名页观看回放即可', 56);

-- --------------------------------------------------------

--
-- 表的结构 `tb_pic`
--

CREATE TABLE `tb_pic` (
  `id` int(11) NOT NULL,
  `url` int(11) NOT NULL COMMENT '图片地址',
  `username` int(11) NOT NULL COMMENT '用户名'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL COMMENT '用户名',
  `userpwd` varchar(64) NOT NULL COMMENT '用户密码',
  `re_time` int(11) NOT NULL COMMENT '注册时间',
  `re_ip` varchar(32) NOT NULL COMMENT '注册IP',
  `authority` int(1) NOT NULL COMMENT '用户权限'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `userpwd`, `re_time`, `re_ip`, `authority`) VALUES
(19, '123', '12', 1487148810, '::1', 0),
(20, '123456', '123', 1487311927, '::1', 0),
(21, '1231', '123', 1487312089, '::1', 0),
(22, 'ccy', '654321', 1487725331, '::1', 0),
(23, 'zyb', '123456', 1489999561, '::1', 0),
(24, 'zwl', '123456', 1489999684, '::1', 0),
(25, '常春', '123456', 1493344783, '::1', 0),
(26, 'cc', '123456', 1494748941, '::1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tb_userdetail`
--

CREATE TABLE `tb_userdetail` (
  `userid` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthday` int(10) DEFAULT NULL,
  `province` varchar(32) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'nophoto.gif',
  `sex` varchar(32) DEFAULT NULL,
  `qq` int(10) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL,
  `introduce` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_userdetail`
--

INSERT INTO `tb_userdetail` (`userid`, `nickname`, `email`, `birthday`, `province`, `city`, `photo`, `sex`, `qq`, `sign`, `introduce`) VALUES
(19, '安慰法t ', '5953578@qq.com', 123456, '0', '0', '201702170131231226.jpg', 'm', 2564, '123wertwrtwtw', '123'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'qerweyq', '5953578@qq.com', 0, '0', '0', '201702170637289859.gif', 'w', 0, '', ''),
(22, '常常', '29058@qq.com', 1990, '0', '0', '201705140811338395.jpg', 'w', 390, '人生无非是，快乐的时候大笑，难过的时候哭泣，接着就是继续过下去。', ''),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '心心', '29058514@qq.com', 0, '0', '0', '201704280314241066.jpg', 'w', 29058514, '做最好的自己', ''),
(26, NULL, NULL, NULL, NULL, NULL, 'nophoto.gif', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_article`
--
ALTER TABLE `tb_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_friend`
--
ALTER TABLE `tb_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_notice`
--
ALTER TABLE `tb_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pic`
--
ALTER TABLE `tb_pic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`url`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_userdetail`
--
ALTER TABLE `tb_userdetail`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tb_article`
--
ALTER TABLE `tb_article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `tb_friend`
--
ALTER TABLE `tb_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `tb_notice`
--
ALTER TABLE `tb_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tb_pic`
--
ALTER TABLE `tb_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
