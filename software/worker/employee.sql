-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-12-07 13:28:53
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
-- 数据库： `2021150168_se`
--

-- --------------------------------------------------------

--
-- 表的结构 `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `ID` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Birthdate` varchar(10) NOT NULL,
  `Dep` varchar(10) NOT NULL,
  `Pos` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `employee`
--

INSERT INTO `employee` (`ID`, `Name`, `Birthdate`, `Dep`, `Pos`) VALUES
('0987654321', '甲', '1999-07-22', '综合部', '实习生'),
('1047964535', '乙', '2023-10-25', '人事部', '员工'),
('1234567890', '王五', '1978-12-12', '人事部', '员工'),
('1928371923', '丙', '2023-12-07', '销售部', '员工'),
('1997081106', '李四', '1878-10-01', '销售部', '部门经理'),
('1999023004', '张三', '1879-05-23', '销售部', '员工'),
('2352352352', '丁', '2023-10-13', '技术部', '员工'),
('2453625463', '戊', '2023-10-25', '技术部', '员工'),
('3745683745', '已', '2023-11-15', '技术部', '部门经理'),
('8374872562', '庚', '2023-11-23', '综合部', '部门经理');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
