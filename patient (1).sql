-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 11:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_master`
--

CREATE TABLE `appoinment_master` (
  `LoanActiveId` int(11) NOT NULL,
  `fkempId` int(50) NOT NULL,
  `fkmemberId` bigint(22) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `LoanAmount` int(50) DEFAULT NULL,
  `FirstDeduction` int(50) DEFAULT NULL,
  `Week` int(50) DEFAULT NULL,
  `Amount` int(50) DEFAULT NULL,
  `DandRakkam` int(50) DEFAULT NULL,
  `IsActive` int(50) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0,
  `is_on` tinyint(4) DEFAULT 1,
  `is_active` tinyint(4) DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `delete_remark` varchar(200) DEFAULT NULL,
  `last_changed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `appoinment_master`
--

INSERT INTO `appoinment_master` (`LoanActiveId`, `fkempId`, `fkmemberId`, `startDate`, `LoanAmount`, `FirstDeduction`, `Week`, `Amount`, `DandRakkam`, `IsActive`, `is_default`, `is_on`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted_date`, `deleted_by`, `delete_remark`, `last_changed`) VALUES
(1, 3, 2, '2024-09-20', 5000, 1000, 4, 1000, 0, 1, 0, 1, 1, '2024-09-20 11:19:35', 3, NULL, NULL, NULL, NULL, NULL, '2024-09-20 09:19:35'),
(2, 1, 3, '2024-09-20', 5000, 2000, 3, 1000, 0, 0, 0, 1, 1, '2024-09-20 11:27:00', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-20 09:27:00'),
(3, 3, 4, '2024-09-20', 5000, 1000, 4, 1000, 0, 0, 0, 1, 1, '2024-09-20 13:13:02', 3, NULL, NULL, NULL, NULL, NULL, '2024-09-20 11:13:02'),
(4, 1, 6, '2024-09-21', 5000, 1000, 4, 1000, 0, 1, 0, 1, 1, '2024-09-21 09:16:08', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-21 07:16:08'),
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, '2024-09-23 08:43:14', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-23 06:43:14'),
(6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, '2024-09-23 08:44:34', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-23 06:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE `employee_master` (
  `employeeId` bigint(50) NOT NULL,
  `employeeCode` varchar(20) DEFAULT NULL,
  `fknametitleId` int(5) DEFAULT NULL,
  `employeeName` varchar(50) DEFAULT NULL,
  `employeedob` date DEFAULT NULL,
  `employeemarkOfIdentity` varchar(250) DEFAULT NULL,
  `fkGenderId` int(10) DEFAULT NULL,
  `employeeNominee` varchar(250) DEFAULT NULL,
  `employeerelationNominee` varchar(250) DEFAULT NULL,
  `fkbloodGroupId` bigint(20) DEFAULT NULL,
  `fkmaritalStatusId` bigint(20) DEFAULT NULL,
  `currentAddress` varchar(250) DEFAULT NULL,
  `currentLandmark` varchar(100) DEFAULT NULL,
  `currentPinCode` varchar(10) DEFAULT NULL,
  `currentPlace` varchar(50) DEFAULT NULL,
  `currentTaluka` varchar(50) DEFAULT NULL,
  `currentDistrict` varchar(50) DEFAULT NULL,
  `currentfkStateId` int(10) DEFAULT NULL,
  `currentCountry` varchar(50) DEFAULT NULL,
  `isPermanentAddressSame` tinyint(1) DEFAULT NULL,
  `permanentAddress` varchar(250) DEFAULT NULL,
  `permanentLandmark` varchar(100) DEFAULT NULL,
  `permanentPinCode` varchar(50) DEFAULT NULL,
  `permanentPlace` varchar(50) DEFAULT NULL,
  `permanentTaluka` varchar(50) DEFAULT NULL,
  `permanentDistrict` varchar(50) DEFAULT NULL,
  `permanentfkStateId` varchar(50) DEFAULT NULL,
  `permanentCountry` varchar(50) DEFAULT NULL,
  `employeecontact1` bigint(12) DEFAULT NULL,
  `employeecontact2` bigint(12) DEFAULT NULL,
  `employeeemail` varchar(50) DEFAULT NULL,
  `employeefbLink` varchar(50) DEFAULT NULL,
  `employeelinkedInLink` varchar(50) DEFAULT NULL,
  `employeegPlusLink` varchar(50) DEFAULT NULL,
  `fkbranchId` bigint(20) DEFAULT NULL,
  `fkdepartmentId` bigint(20) DEFAULT NULL,
  `fkServiceStatusId` bigint(20) DEFAULT NULL,
  `fkemploymentStatusId` int(10) DEFAULT NULL,
  `joiningDate` date DEFAULT NULL,
  `fkjobTypeId` bigint(20) DEFAULT NULL,
  `fksalaryGradeId` bigint(20) DEFAULT NULL,
  `fkdesignationId` bigint(20) DEFAULT NULL,
  `professionalTaxForfkStateId` int(10) DEFAULT NULL,
  `fkemployeeId` bigint(20) DEFAULT NULL,
  `fkattendanceTypeId` varchar(20) DEFAULT NULL,
  `employeeBankName` varchar(50) DEFAULT NULL,
  `employeeBankBranchName` varchar(50) DEFAULT NULL,
  `employeeBankAccountNo` varchar(50) DEFAULT NULL,
  `employeeBankAccountHolderName` varchar(50) DEFAULT NULL,
  `employeeBankIfscCode` varchar(50) DEFAULT NULL,
  `employeeBankMicrCode` varchar(50) DEFAULT NULL,
  `employeeisIncentive` tinyint(1) DEFAULT NULL,
  `employeeActive` tinyint(1) DEFAULT NULL,
  `employeeAdharNumber` varchar(20) DEFAULT NULL,
  `employeePanNumber` varchar(20) DEFAULT NULL,
  `employeePfAccountNumber` varchar(20) DEFAULT NULL,
  `employeeEsiAccountNumber` varchar(20) DEFAULT NULL,
  `employeeBankPassbookFile` varchar(50) DEFAULT NULL,
  `employeeAdharFile` varchar(50) DEFAULT NULL,
  `employeePanFile` varchar(50) DEFAULT NULL,
  `employeePfAccountFile` varchar(50) DEFAULT NULL,
  `employeeEsiAccountFile` varchar(50) DEFAULT NULL,
  `employeeDigitalSignatureFile` varchar(50) DEFAULT NULL,
  `employeeprofilePhotoFile` varchar(50) DEFAULT NULL,
  `employeeisAdvance` tinyint(1) DEFAULT NULL,
  `employeeresignReason` varchar(500) DEFAULT NULL,
  `employeeToken` varchar(100) DEFAULT NULL,
  `employeeisBalance` tinyint(1) DEFAULT NULL,
  `employeeresignDate` date DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0,
  `is_on` tinyint(4) DEFAULT 1,
  `is_active` tinyint(4) DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `delete_remark` varchar(200) DEFAULT NULL,
  `last_changed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`employeeId`, `employeeCode`, `fknametitleId`, `employeeName`, `employeedob`, `employeemarkOfIdentity`, `fkGenderId`, `employeeNominee`, `employeerelationNominee`, `fkbloodGroupId`, `fkmaritalStatusId`, `currentAddress`, `currentLandmark`, `currentPinCode`, `currentPlace`, `currentTaluka`, `currentDistrict`, `currentfkStateId`, `currentCountry`, `isPermanentAddressSame`, `permanentAddress`, `permanentLandmark`, `permanentPinCode`, `permanentPlace`, `permanentTaluka`, `permanentDistrict`, `permanentfkStateId`, `permanentCountry`, `employeecontact1`, `employeecontact2`, `employeeemail`, `employeefbLink`, `employeelinkedInLink`, `employeegPlusLink`, `fkbranchId`, `fkdepartmentId`, `fkServiceStatusId`, `fkemploymentStatusId`, `joiningDate`, `fkjobTypeId`, `fksalaryGradeId`, `fkdesignationId`, `professionalTaxForfkStateId`, `fkemployeeId`, `fkattendanceTypeId`, `employeeBankName`, `employeeBankBranchName`, `employeeBankAccountNo`, `employeeBankAccountHolderName`, `employeeBankIfscCode`, `employeeBankMicrCode`, `employeeisIncentive`, `employeeActive`, `employeeAdharNumber`, `employeePanNumber`, `employeePfAccountNumber`, `employeeEsiAccountNumber`, `employeeBankPassbookFile`, `employeeAdharFile`, `employeePanFile`, `employeePfAccountFile`, `employeeEsiAccountFile`, `employeeDigitalSignatureFile`, `employeeprofilePhotoFile`, `employeeisAdvance`, `employeeresignReason`, `employeeToken`, `employeeisBalance`, `employeeresignDate`, `is_default`, `is_on`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted_date`, `deleted_by`, `delete_remark`, `last_changed`) VALUES
(1, 'EMPLY_1', 1, 'Yash huzurbazar', '1995-08-09', '', 2, '', '', 5, 2, '', '', '', NULL, '', '', 0, '', NULL, '   ', '', '', NULL, '', '', '0', '', 0, 0, '', '', '', '', 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, NULL, '2022-01-03 07:44:28', 1, NULL, NULL, NULL, '2021-11-23 11:30:21'),
(2, 'EMPLY_16', 3, 'Ashwini jadhav', '2020-01-21', '', NULL, '', '', 0, NULL, '', '', '', NULL, '', '', 0, '', NULL, ' ', '', '', NULL, '', '', '', '', 0, 0, '', '', '', '', 1, 1, 1, 1, '2022-01-03', 2, 2, 3, 2, 2, '1', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, NULL, '2022-01-03 08:22:49', 1, NULL, NULL, NULL, '2021-11-23 11:30:21'),
(3, 'EMPLY_28', 1, 'Sangram nangare', '2020-02-02', 'hii', 1, 'miss nangare', 'Wife', 2, 1, 'kolhapur', '416001', '416001', NULL, 'test', 'test', 9, 'India', 1, 'kolhapur', '416001', '416001', NULL, 'test', 'test', '9', 'India', 7854557755, 7854557755, 'test@gmail.com', '', '', '', 1, 2, 1, 1, '2021-05-12', 0, 3, 4, 3, 1, '1', '1', '1', '1', '1', '1', '1', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, NULL, '2021-12-12 09:19:06', 1, NULL, NULL, NULL, '2021-11-23 11:33:47'),
(10, NULL, 1, 'test11', '2021-11-11', 'modle on left hand11', 2, 'atest11', 'mother11', 1, 1, 'kagal 11', 'kagal11', '4160111', NULL, 'kgala11', 'kolhapur 1', 9, 'India 11', NULL, 'kagal 11       ', 'kagal11', '4160111', NULL, 'kgala11', 'kolhapur 1', '9', 'India 11', 7020898851, 7020898851, 'test1@gmail.com', '1http://localhost/phpmyadmin/sql.php?db=hospitalne', '1http://localhost/phpmyadmin/sql.php?db=hospitalne', '1http://localhost/phpmyadmin/sql.php?db=hospitalne', 2, 1, 6, 1, '2021-12-05', 1, 1, 1, 1, 1, '1', '1hdfc bank', '1hdfc bank', '101010101010', '1Name', '1hdfc bank01010', '1hdfc bank01010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '2021-12-11 07:55:14', 1, '2022-01-03 10:18:03', 1, NULL, NULL, NULL, '2021-12-11 06:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE `emp_master` (
  `EmpId` int(11) NOT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `mobileNo` bigint(22) DEFAULT NULL,
  `email` varchar(22) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `fkgenderId` bigint(22) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `AttachFile` varchar(20) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0,
  `is_on` tinyint(4) DEFAULT 1,
  `is_active` tinyint(4) DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `delete_remark` varchar(200) DEFAULT NULL,
  `last_changed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emp_master`
--

INSERT INTO `emp_master` (`EmpId`, `userName`, `mobileNo`, `email`, `password`, `fkgenderId`, `dateOfBirth`, `AttachFile`, `is_default`, `is_on`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted_date`, `deleted_by`, `delete_remark`, `last_changed`) VALUES
(1, 'Rajesh', 1234432123, 'rajesh@189.com', '12', 1, '0000-00-00', '1253612881.jpg', 0, 1, 1, '2024-08-24 13:34:05', 1, NULL, NULL, NULL, NULL, NULL, '2024-08-24 11:30:03'),
(2, 'Yesh', 1234567890, 'yesh@123.com', '12', 1, '2024-08-24', '1253612882.jpg', 0, 1, 1, '2024-08-24 13:34:05', 1, NULL, NULL, NULL, NULL, NULL, '2024-08-24 11:34:05'),
(3, 'Prashant', 5678904321, 'prashant@123', '12', 1, '2024-08-31', '1253612883.jpg', 0, 1, 1, '2024-08-30 07:45:54', 1, NULL, NULL, NULL, NULL, NULL, '2024-08-30 05:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `gender_master`
--

CREATE TABLE `gender_master` (
  `genderId` int(10) NOT NULL,
  `genderName` varchar(100) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0,
  `is_on` tinyint(4) DEFAULT 1,
  `is_active` tinyint(4) DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `delete_remark` varchar(200) DEFAULT NULL,
  `last_changed` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gender_master`
--

INSERT INTO `gender_master` (`genderId`, `genderName`, `is_default`, `is_on`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted_date`, `deleted_by`, `delete_remark`, `last_changed`) VALUES
(1, 'Male', 0, 1, 1, '2020-07-26 12:26:57', NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-26 10:26:57'),
(2, 'Female', 0, 1, 1, '2020-07-26 12:27:09', NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-26 10:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `members_master`
--

CREATE TABLE `members_master` (
  `memberId` int(11) NOT NULL,
  `fkempId` bigint(22) NOT NULL,
  `memberName` varchar(20) DEFAULT NULL,
  `mobileNo` bigint(22) DEFAULT NULL,
  `wtsAppNo` int(50) DEFAULT NULL,
  `Address` varchar(22) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `adharNo` int(50) DEFAULT NULL,
  `Nondani` int(50) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0,
  `is_on` tinyint(4) DEFAULT 1,
  `is_active` tinyint(4) DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `delete_remark` varchar(200) DEFAULT NULL,
  `last_changed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `members_master`
--

INSERT INTO `members_master` (`memberId`, `fkempId`, `memberName`, `mobileNo`, `wtsAppNo`, `Address`, `dateOfBirth`, `adharNo`, `Nondani`, `is_default`, `is_on`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted_date`, `deleted_by`, `delete_remark`, `last_changed`) VALUES
(1, 1, 'Sudhir mali', 5678904321, 2147483647, '', '2024-09-19', 0, 0, 0, 1, 1, '2024-09-19 09:01:43', 1, '2024-09-19 09:06:11', NULL, NULL, NULL, NULL, '2024-09-19 07:01:43'),
(2, 1, 'Asif Netke', 5678904332, 2147483637, '', '2024-09-19', 0, 0, 0, 1, 1, '2024-09-19 09:02:04', 1, '2024-09-19 09:13:27', NULL, NULL, NULL, NULL, '2024-09-19 07:02:04'),
(3, 1, 'Sunil Mali', 2332234668, 2147483647, 'Pune', '2024-09-19', 2147483647, 600, 0, 1, 1, '2024-09-19 09:14:48', 1, '2024-09-19 09:29:02', NULL, NULL, NULL, NULL, '2024-09-19 07:14:48'),
(4, 1, 'Nagesh Naik', 4567536789, 2147483647, 'Kolhapur', '2024-09-19', 2147483647, 400, 0, 1, 1, '2024-09-19 09:16:05', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-19 07:16:05'),
(5, 1, 'Sohail Mulla', 2345678909, 2147483647, 'Pune', '2024-09-19', 0, 0, 0, 1, 1, '2024-09-19 09:16:44', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-19 07:16:44'),
(6, 1, 'Siddik Mulla', 1111111111, 1111111111, '', '2024-09-19', 0, 0, 0, 1, 1, '2024-09-19 09:23:41', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-19 07:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `table_master`
--

CREATE TABLE `table_master` (
  `TableID` bigint(50) NOT NULL,
  `fkempId` int(50) NOT NULL,
  `fkLoanId` int(100) DEFAULT NULL,
  `fkmemberId` int(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `PaidDate` date DEFAULT NULL,
  `HaptaAmount` int(250) DEFAULT NULL,
  `PaidHaptaAmount` int(50) DEFAULT NULL,
  `dandRakkam` int(50) DEFAULT NULL,
  `PaidDandAmount` int(50) DEFAULT NULL,
  `IsActive` int(50) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0,
  `is_on` tinyint(4) DEFAULT 1,
  `is_active` tinyint(4) DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `delete_remark` varchar(200) DEFAULT NULL,
  `last_changed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_master`
--

INSERT INTO `table_master` (`TableID`, `fkempId`, `fkLoanId`, `fkmemberId`, `Date`, `PaidDate`, `HaptaAmount`, `PaidHaptaAmount`, `dandRakkam`, `PaidDandAmount`, `IsActive`, `is_default`, `is_on`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted_date`, `deleted_by`, `delete_remark`, `last_changed`) VALUES
(1, 3, 1, 2, '2024-09-20', '2024-09-21', 1000, 2000, 0, 2000, NULL, 0, 1, 1, '2024-09-20 11:19:35', 3, '2024-09-20 12:49:40', 1, NULL, NULL, NULL, '2024-09-20 09:19:35'),
(2, 3, 1, 2, '2024-09-27', '2024-09-22', 1000, 2000, 0, 2000, NULL, 0, 1, 1, '2024-09-20 11:19:35', 3, '2024-09-20 12:49:40', 3, NULL, NULL, NULL, '2024-09-20 09:19:35'),
(3, 3, 1, 2, '2024-10-04', '2024-09-22', 1000, 200, 0, 200, NULL, 0, 1, 1, '2024-09-20 11:19:35', 3, '2024-09-20 12:49:40', 3, NULL, NULL, NULL, '2024-09-20 09:19:35'),
(4, 3, 1, 2, '2024-10-11', '0000-00-00', 2000, 0, 0, 0, NULL, 0, 1, 1, '2024-09-20 11:19:35', 3, '2024-09-20 12:49:40', 0, NULL, NULL, NULL, '2024-09-20 09:19:35'),
(5, 1, 2, 3, '2024-09-20', '2024-09-05', 1000, 1000, 0, 1000, NULL, 0, 1, 1, '2024-09-20 11:27:00', 1, '2024-09-21 08:59:39', 1, NULL, NULL, NULL, '2024-09-20 09:27:00'),
(6, 1, 2, 3, '2024-09-27', '2024-09-29', 1000, 600, 0, 600, NULL, 0, 1, 1, '2024-09-20 11:27:00', 1, '2024-09-21 08:59:39', 1, NULL, NULL, NULL, '2024-09-20 09:27:00'),
(7, 1, 2, 3, '2024-10-04', '0000-00-00', 1200, 0, 0, 0, NULL, 0, 1, 1, '2024-09-20 11:27:00', 1, '2024-09-21 08:59:39', 0, NULL, NULL, NULL, '2024-09-20 09:27:00'),
(8, 3, 3, 4, '2024-09-20', '2024-09-22', 1000, 2000, 0, 2000, NULL, 0, 1, 1, '2024-09-20 13:13:02', 3, '2024-09-20 13:15:14', 1, NULL, NULL, NULL, '2024-09-20 11:13:02'),
(9, 3, 3, 4, '2024-09-27', '2024-09-22', 1000, 200, 0, 200, NULL, 0, 1, 1, '2024-09-20 13:13:02', 3, '2024-09-20 13:15:14', 1, NULL, NULL, NULL, '2024-09-20 11:13:02'),
(10, 3, 3, 4, '2024-10-04', '0000-00-00', 1000, 0, 0, 0, NULL, 0, 1, 1, '2024-09-20 13:13:02', 3, '2024-09-20 13:15:14', 0, NULL, NULL, NULL, '2024-09-20 11:13:02'),
(11, 3, 3, 4, '2024-10-11', '0000-00-00', 1200, 0, 0, 0, NULL, 0, 1, 1, '2024-09-20 13:13:02', 3, '2024-09-20 13:15:14', 0, NULL, NULL, NULL, '2024-09-20 11:13:02'),
(12, 1, 4, 6, '2024-09-21', '2024-09-22', 1000, 500, 0, 500, NULL, 0, 1, 1, '2024-09-21 09:16:08', 1, '2024-09-21 09:28:58', 1, NULL, NULL, NULL, '2024-09-21 07:16:08'),
(13, 1, 4, 6, '2024-09-28', '2024-09-22', 1000, 400, 0, 4000, NULL, 0, 1, 1, '2024-09-21 09:16:08', 1, '2024-09-21 09:28:58', 1, NULL, NULL, NULL, '2024-09-21 07:16:08'),
(14, 1, 4, 6, '2024-10-05', '2024-09-22', 1000, 600, 0, 600, NULL, 0, 1, 1, '2024-09-21 09:16:08', 1, '2024-09-21 09:28:58', 1, NULL, NULL, NULL, '2024-09-21 07:16:08'),
(15, 1, 4, 6, '2024-10-12', '0000-00-00', 1000, 0, 0, 0, NULL, 0, 1, 1, '2024-09-21 09:16:08', 1, '2024-09-21 09:28:58', 0, NULL, NULL, NULL, '2024-09-21 07:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `transection_master`
--

CREATE TABLE `transection_master` (
  `transectionId` bigint(50) NOT NULL,
  `senderId` bigint(100) DEFAULT NULL,
  `reciverId` bigint(100) DEFAULT NULL,
  `amount` bigint(250) DEFAULT NULL,
  `transectionDate` date DEFAULT NULL,
  `transectionDescription` varchar(100) DEFAULT NULL,
  `Verify` bigint(50) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0,
  `is_on` tinyint(4) DEFAULT 1,
  `is_active` tinyint(4) DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `delete_remark` varchar(200) DEFAULT NULL,
  `last_changed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transection_master`
--

INSERT INTO `transection_master` (`transectionId`, `senderId`, `reciverId`, `amount`, `transectionDate`, `transectionDescription`, `Verify`, `is_default`, `is_on`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted_date`, `deleted_by`, `delete_remark`, `last_changed`) VALUES
(1, 3, 1, 5000, '2024-09-25', 'GPay', 1, 0, 1, 1, '2024-09-25 12:27:05', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-25 10:27:05'),
(2, 3, 2, 4000, '2024-09-26', 'ppay', 0, 0, 1, 1, '2024-09-26 08:19:57', 1, NULL, NULL, NULL, NULL, NULL, '2024-09-26 06:19:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinment_master`
--
ALTER TABLE `appoinment_master`
  ADD PRIMARY KEY (`LoanActiveId`);

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD PRIMARY KEY (`EmpId`);

--
-- Indexes for table `gender_master`
--
ALTER TABLE `gender_master`
  ADD PRIMARY KEY (`genderId`);

--
-- Indexes for table `members_master`
--
ALTER TABLE `members_master`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `table_master`
--
ALTER TABLE `table_master`
  ADD PRIMARY KEY (`TableID`);

--
-- Indexes for table `transection_master`
--
ALTER TABLE `transection_master`
  ADD PRIMARY KEY (`transectionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinment_master`
--
ALTER TABLE `appoinment_master`
  MODIFY `LoanActiveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
  MODIFY `employeeId` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_master`
--
ALTER TABLE `emp_master`
  MODIFY `EmpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender_master`
--
ALTER TABLE `gender_master`
  MODIFY `genderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members_master`
--
ALTER TABLE `members_master`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_master`
--
ALTER TABLE `table_master`
  MODIFY `TableID` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transection_master`
--
ALTER TABLE `transection_master`
  MODIFY `transectionId` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
