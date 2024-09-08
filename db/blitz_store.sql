-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2017 at 09:31 AM
-- Server version: 5.6.31
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blitz_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `ac_code` int(11) NOT NULL AUTO_INCREMENT,
  `ac_name` varchar(255) NOT NULL,
  `ac_group_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`ac_code`),
  KEY `ac_group_code` (`ac_group_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ac_code`, `ac_name`, `ac_group_code`) VALUES
(29, 'HDFC Bank Account', 23),
(30, 'ICICI Bank Account', 23),
(31, 'Conveyance Paid', 42),
(32, 'Electricity Exp', 42),
(33, 'Computer maintenance', 42),
(34, 'Alteration Charges', 41),
(35, 'Rebate & Discount', 41),
(38, 'Petty Cash', 42),
(39, 'Lorrey freight', 40),
(41, 'Wages a/c', 40),
(42, 'Arjun Kumar Capital Account', 43),
(43, 'Computer', 44),
(45, 'Purchase account', 39),
(46, 'Sale Account', 40),
(50, 'Salary Account', 42),
(51, 'Power And Fuel Account', 40),
(52, 'Expenses', 41);

-- --------------------------------------------------------

--
-- Table structure for table `account_group`
--

CREATE TABLE IF NOT EXISTS `account_group` (
  `ac_group_code` int(11) NOT NULL AUTO_INCREMENT,
  `ac_group_name` varchar(255) NOT NULL,
  `main_ac_group_code` int(11) NOT NULL,
  PRIMARY KEY (`ac_group_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `account_group`
--

INSERT INTO `account_group` (`ac_group_code`, `ac_group_name`, `main_ac_group_code`) VALUES
(21, 'Purchase Account', 3),
(22, 'Sale Account', 3),
(23, 'Bank Account', 1),
(26, 'Closing Stock', 1),
(27, 'Cash in Hand', 1),
(28, 'Sundry Debtors', 1),
(29, 'Investment', 1),
(30, 'Deposit', 1),
(31, 'Loans and Advances', 1),
(32, 'Bank OD', 6),
(33, 'Duties and Taxes', 6),
(34, 'Unsecure Loans', 2),
(35, 'Provisions', 6),
(36, 'Secured Loans', 2),
(37, 'Sundry Creditors', 6),
(38, 'Suspense Account', 4),
(39, 'Direct Income', 3),
(40, 'Direct Expense', 3),
(41, 'Indirect Income', 5),
(42, 'Indirect Expense', 5),
(43, 'Capital Account', 9),
(44, 'Fixed Asset', 7),
(45, 'Current Asset ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--

CREATE TABLE IF NOT EXISTS `account_transaction` (
  `act_id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_code` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`act_id`),
  KEY `tid` (`tid`),
  KEY `type_id` (`type_id`),
  KEY `ac_code` (`ac_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `account_transaction`
--

INSERT INTO `account_transaction` (`act_id`, `ac_code`, `tid`, `type_id`, `branch_id`) VALUES
(1, 45, 1, 1, 0),
(2, 45, 2, 1, 0),
(3, 46, 3, 2, 0),
(4, 45, 4, 1, 0),
(5, 45, 5, 1, 0),
(6, 45, 6, 1, 0),
(7, 45, 7, 1, 0),
(8, 45, 8, 1, 0),
(9, 45, 9, 1, 0),
(10, 45, 10, 1, 0),
(11, 45, 1, 1, 0),
(12, 46, 2, 2, 0),
(13, 46, 3, 2, 0),
(14, 45, 4, 1, 0),
(15, 45, 5, 1, 0),
(16, 45, 6, 1, 0),
(17, 45, 1, 1, 0),
(18, 46, 2, 2, 0),
(19, 46, 3, 2, 0),
(20, 46, 4, 2, 0),
(21, 46, 5, 2, 0),
(22, 45, 6, 1, 0),
(23, 45, 7, 1, 0),
(24, 46, 8, 2, 0),
(25, 46, 9, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank_book`
--

CREATE TABLE IF NOT EXISTS `bank_book` (
  `bb_code` int(11) NOT NULL AUTO_INCREMENT,
  `bb_no` int(11) NOT NULL,
  `ac_code` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`bb_code`),
  KEY `tid` (`tid`),
  KEY `type_id` (`type_id`),
  KEY `ac_code` (`ac_code`),
  KEY `bb_no` (`bb_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bank_book`
--

INSERT INTO `bank_book` (`bb_code`, `bb_no`, `ac_code`, `tid`, `type_id`, `branch_id`) VALUES
(1, 0, 45, 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch_attendance`
--

CREATE TABLE IF NOT EXISTS `branch_attendance` (
  `ba_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`ba_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

CREATE TABLE IF NOT EXISTS `business_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`id`, `business_name`, `mobile_no`, `email_id`, `address`) VALUES
(1, 'Blitzkriegsolutions', '1234567890', 'asif@blitzkriegsolution.com', 'Indranagar');

-- --------------------------------------------------------

--
-- Table structure for table `cash_book`
--

CREATE TABLE IF NOT EXISTS `cash_book` (
  `cb_code` int(11) NOT NULL AUTO_INCREMENT,
  `cb_no` int(11) NOT NULL,
  `ac_code` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`cb_code`),
  KEY `tid` (`tid`),
  KEY `type_id` (`type_id`),
  KEY `ac_code` (`ac_code`),
  KEY `cb_no` (`cb_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cash_book`
--

INSERT INTO `cash_book` (`cb_code`, `cb_no`, `ac_code`, `tid`, `type_id`, `branch_id`) VALUES
(1, 0, 45, 1, 1, 0),
(2, 0, 46, 2, 2, 0),
(3, 0, 46, 3, 2, 0),
(4, 0, 46, 4, 2, 0),
(5, 0, 46, 5, 2, 0),
(6, 0, 45, 7, 1, 0),
(7, 0, 46, 8, 2, 0),
(8, 0, 46, 9, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `mobile_no`, `email_id`, `address`) VALUES
(1, 'Demo Business', '1234567890', 'asif@blitzkriegsolution.com', 'Lalbagh'),
(2, 'blitz', '9934634486', 'asif@blitzkriegsolution.com', 'Lalbagh');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `mobile_no`, `email_id`, `address`) VALUES
(1, 'Asif Nomani', '7411120880', 'asif@blitzkriegsolution.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fee`
--

CREATE TABLE IF NOT EXISTS `custom_fee` (
  `cfee_id` int(11) NOT NULL AUTO_INCREMENT,
  `cfee_name` text NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`cfee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `day_book`
--

CREATE TABLE IF NOT EXISTS `day_book` (
  `db_code` int(11) NOT NULL AUTO_INCREMENT,
  `ac_code` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`db_code`),
  KEY `ac_code` (`ac_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `day_book`
--

INSERT INTO `day_book` (`db_code`, `ac_code`, `tid`, `type_id`, `branch_id`) VALUES
(1, 45, 1, 1, 0),
(2, 46, 2, 2, 0),
(3, 46, 3, 2, 0),
(4, 46, 4, 2, 0),
(5, 46, 5, 2, 0),
(6, 45, 6, 1, 0),
(7, 45, 7, 1, 0),
(8, 46, 8, 2, 0),
(9, 46, 9, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `adhar_card` int(11) NOT NULL,
  `pan_card` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `wife_name` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `experiance` varchar(255) NOT NULL,
  `teac_traning` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `permanant_add` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mob_no` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `liscence_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `is_staff` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE IF NOT EXISTS `employee_attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `attend_date` date NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`attendance_id`, `branch_id`, `attend_date`) VALUES
(1, 0, '2017-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `emp_type`
--

CREATE TABLE IF NOT EXISTS `emp_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_type_name` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expenses_name` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `entry_date` date NOT NULL,
  `remarks` text NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `cheque_date` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `narration` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `images`, `username`, `name`, `email_id`, `address`, `mobile_no`, `password`, `user_type`, `is_admin`) VALUES
(1, '', 'admin', '', '', '', '', 'admin', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE IF NOT EXISTS `login_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL,
  `login_time` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`id`, `username`, `password`, `correct`, `login_time`, `ip`) VALUES
(1, 'admin', 'admin', 'Correct', '2017-01-03 11:10:36', '61.12.65.46'),
(2, 'admin', 'admin', 'Correct', '2017-01-03 02:04:54', '61.12.65.46'),
(3, 'admin', 'admin', 'Correct', '2017-01-03 04:27:07', '61.12.65.46'),
(4, 'admin', 'admin', 'Correct', '2017-01-04 11:16:57', '61.12.65.46'),
(5, 'admin', 'admin', 'Correct', '2017-01-04 12:05:31', '61.12.65.46');

-- --------------------------------------------------------

--
-- Table structure for table `payment_book`
--

CREATE TABLE IF NOT EXISTS `payment_book` (
  `pb_id` int(11) NOT NULL AUTO_INCREMENT,
  `pb_no` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `cheque_no` int(11) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `tmode` varchar(255) NOT NULL,
  PRIMARY KEY (`pb_id`,`pb_no`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `myprice` double NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `packing` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `product_name`, `quantity`, `price`, `myprice`, `status`, `category_id`, `product_desc`, `packing`) VALUES
(1, 'AC 500', 'Air Pump', 0, 175, 0, 0, 1, '', 'Single Outlet'),
(2, 'AC 9602', 'Air Pump', 0, 257, 0, 0, 1, '', 'Double Outlet'),
(3, 'AC 9603', 'Air Pump', 0, 465, 0, 0, 1, '', 'Double Outlet  Mouse Type with regulator'),
(4, 'AC 9906', 'Air Pump', 0, 1255, 0, 0, 1, '', 'Six Outlet Mouse Type with regulator'),
(5, 'AC 9908', 'Air Pump', 0, 2145, 0, 0, 1, '', 'Eight outlet Mouse Type with regulator'),
(6, 'LP 20', 'Noise free Air Pump', 0, 3146, 0, 0, 1, '', '6 Outlets 1500 lt/hr'),
(7, 'LP 40', 'Noise free Air Pump', 0, 4225, 0, 0, 1, '', '12 Outlets 3000 lt/hr'),
(8, 'LP 60  ', 'Noise free Air Pump', 0, 5506, 0, 0, 1, '', '14 Outlets 4200 lt/hr'),
(9, 'LP 100', 'Noise free Air Pump', 0, 7709, 0, 0, 1, '', '33 Outlets 8400 lt/hr'),
(10, 'Penguin2400', 'Vertical Submersible Pump', 0, 1573, 0, 0, 1, '', '2400 lt/hr'),
(11, 'Penguin3200', 'Vertical Submersible Pump', 0, 2145, 0, 0, 1, '', '3200 lt/hr'),
(12, 'ACD8800A', 'A/C D/C air pump', 0, 2717, 0, 0, 1, '', 'Double Outlet');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`) VALUES
(1, 'AIR PUMP/ BLOWER'),
(2, 'POWERHEADS'),
(3, 'FILTERS'),
(4, 'AQUARIUM TUBE'),
(5, 'SPOTLIGHTS'),
(6, 'THERMOMETER'),
(7, 'AQUARIUM CABINETS');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_bill_no` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `truck_no` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_mobile_no` varchar(255) NOT NULL,
  `tot_cash_amt` double NOT NULL,
  `net_cash_amt` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `payment_amount` double NOT NULL,
  `remarks` text NOT NULL,
  `entry_data` date NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `cheque_date` date NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_date` date NOT NULL,
  `delete_record` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `company_bill_no`, `company_id`, `truck_no`, `driver_name`, `driver_mobile_no`, `tot_cash_amt`, `net_cash_amt`, `tax`, `discount`, `payment_amount`, `remarks`, `entry_data`, `payment_mode`, `cheque_no`, `cheque_date`, `bank_name`, `narration`, `entrytime`, `delete_date`, `delete_record`) VALUES
(1, '', 1, '', '', '', 50000, 49500, 10, 5000, 500, '', '2017-01-03', 'cash', '', '0000-00-00', '', '', '2017-01-03 05:56:23', '0000-00-00', 0),
(2, '', 1, '', '', '', 50000, 54450, 10, 500, 450, '', '2017-01-03', 'bank', '', '0000-00-00', '', '', '2017-01-03 08:46:30', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment`
--

CREATE TABLE IF NOT EXISTS `purchase_payment` (
  `purchase_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `payment_amount` double NOT NULL,
  `remarks` text NOT NULL,
  `entry_data` date NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `cheque_date` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `narration` text NOT NULL,
  `delete_record` int(11) NOT NULL,
  PRIMARY KEY (`purchase_payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchase_payment`
--

INSERT INTO `purchase_payment` (`purchase_payment_id`, `purchase_id`, `payment_amount`, `remarks`, `entry_data`, `payment_mode`, `cheque_no`, `cheque_date`, `bank_name`, `narration`, `delete_record`) VALUES
(1, 1, 500, '', '2017-01-03', 'cash', '', '2017-01-03', '', '', 0),
(2, 2, 450, '', '2017-01-03', 'bank', '', '2017-01-03', '', '', 0),
(3, 2, 4000, '', '2017-01-03', 'cash', '', '2017-01-03', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE IF NOT EXISTS `purchase_product` (
  `purchase_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `delete_record` int(11) NOT NULL,
  PRIMARY KEY (`purchase_product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `purchase_product`
--

INSERT INTO `purchase_product` (`purchase_product_id`, `purchase_id`, `category_id`, `product_id`, `quantity`, `price`, `delete_record`) VALUES
(1, 1, 1, 1, 100, 500, 0),
(2, 2, 2, 2, 500, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `van_no` varchar(255) NOT NULL,
  `tot_cash_amt` double NOT NULL,
  `net_cash_amt` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `payment_amount` double NOT NULL,
  `remark` text NOT NULL,
  `entry_data` date NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `cheque_date` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_record` int(11) NOT NULL,
  `delete_date` date NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `customer_id`, `van_no`, `tot_cash_amt`, `net_cash_amt`, `tax`, `discount`, `payment_amount`, `remark`, `entry_data`, `payment_mode`, `cheque_no`, `cheque_date`, `bank_name`, `narration`, `entrytime`, `delete_record`, `delete_date`) VALUES
(1, 1, '', 800, 770, 10, 100, 70, '', '2017-01-03', '', '', '', '', '', '2017-01-03 06:04:03', 0, '0000-00-00'),
(2, 1, '', 4000, 4000, 0, 0, 0, '', '2017-01-03', '', '', '', '', '', '2017-01-03 08:52:32', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_payment`
--

CREATE TABLE IF NOT EXISTS `sale_payment` (
  `sale_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `payment_amount` double NOT NULL,
  `remark` text NOT NULL,
  `entry_data` date NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `cheque_date` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `narration` text NOT NULL,
  `delete_record` int(11) NOT NULL,
  PRIMARY KEY (`sale_payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sale_payment`
--

INSERT INTO `sale_payment` (`sale_payment_id`, `sale_id`, `payment_amount`, `remark`, `entry_data`, `payment_mode`, `cheque_no`, `cheque_date`, `bank_name`, `narration`, `delete_record`) VALUES
(1, 1, 70, '', '2017-01-03', 'cash', '', '2017-01-03', '', '', 0),
(2, 1, 100, '', '2017-01-03', 'cash', '', '2017-01-03', '', '', 0),
(3, 1, 50, '', '2017-01-03', 'cash', '', '2017-01-03', '', '', 0),
(4, 1, 10, '', '2017-01-03', 'cash', '', '2017-01-03', '', '', 0),
(5, 2, 0, '', '2017-01-03', 'cash', '', '2017-01-03', '', '', 0),
(6, 2, 1000, '', '2017-01-03', 'cash', '', '2017-01-03', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_product`
--

CREATE TABLE IF NOT EXISTS `sale_product` (
  `sale_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `myprice` double NOT NULL,
  `delete_record` int(11) NOT NULL,
  PRIMARY KEY (`sale_product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sale_product`
--

INSERT INTO `sale_product` (`sale_product_id`, `sale_id`, `category_id`, `product_id`, `quantity`, `price`, `myprice`, `delete_record`) VALUES
(1, 1, 1, 1, 2, 400, 300, 0),
(2, 2, 2, 2, 10, 400, 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_product_return`
--

CREATE TABLE IF NOT EXISTS `sale_product_return` (
  `sale_return_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`sale_return_product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_return`
--

CREATE TABLE IF NOT EXISTS `sale_return` (
  `sale_return_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `tot_cash_amt` double NOT NULL,
  `net_cash_amt` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `payment_amount` double NOT NULL,
  `remark` text NOT NULL,
  `entry_data` date NOT NULL,
  PRIMARY KEY (`sale_return_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `cur_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `narration` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `fee_id` int(11) DEFAULT NULL,
  `sale_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `expenses_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `adv_id` int(11) NOT NULL,
  `ac_code` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `delete_record` int(11) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `fee_id` (`fee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `date`, `amount`, `cur_date`, `narration`, `payment_mode`, `fee_id`, `sale_id`, `purchase_id`, `expenses_id`, `branch_id`, `payment_id`, `adv_id`, `ac_code`, `type_id`, `delete_record`) VALUES
(1, '2017-01-03', 500, '2017-01-03 05:56:23', 'Purchase Payment', 'cash', 1, 0, 1, 0, 0, 0, 0, 45, 1, 0),
(2, '2017-01-03', 70, '2017-01-03 06:04:03', 'Sale Payment', 'cash', 1, 1, 0, 0, 0, 0, 0, 46, 2, 0),
(3, '2017-01-03', 100, '2017-01-03 06:05:06', 'Sale Payment', 'cash', 1, 1, 0, 0, 0, 0, 0, 46, 2, 0),
(4, '2017-01-03', 50, '2017-01-03 07:32:37', 'Sale Payment', 'cash', 1, 1, 0, 0, 0, 0, 0, 46, 2, 0),
(5, '2017-01-03', 10, '2017-01-03 07:34:13', 'Sale Payment', 'cash', 1, 1, 0, 0, 0, 0, 0, 46, 2, 0),
(6, '2017-01-03', 450, '2017-01-03 08:46:30', 'Purchase Payment', 'bank', 2, 0, 2, 0, 0, 0, 0, 45, 1, 0),
(7, '2017-01-03', 4000, '2017-01-03 08:47:36', 'Purchase Payment', '', 2, 0, 2, 0, 0, 0, 0, 45, 1, 0),
(8, '2017-01-03', 0, '2017-01-03 08:52:32', 'Sale Payment', 'cash', 2, 2, 0, 0, 0, 0, 0, 46, 2, 0),
(9, '2017-01-03', 1000, '2017-01-03 08:55:11', 'Sale Payment', 'cash', 2, 2, 0, 0, 0, 0, 0, 46, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `drcr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toby` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`type_id`, `drcr`, `toby`) VALUES
(1, 'Debit', 'To'),
(2, 'Credit', 'By');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_book`
--
ALTER TABLE `bank_book`
  ADD CONSTRAINT `bank_book_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `transaction` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
