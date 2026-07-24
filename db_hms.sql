-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2026 at 11:46 AM
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
-- Database: `db_hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bed_mst`
--

CREATE TABLE `bed_mst` (
  `bed_id` bigint(20) NOT NULL,
  `ward_id` bigint(20) NOT NULL,
  `bed_no` bigint(20) NOT NULL,
  `bed_info` text NOT NULL,
  `bed_regdate` varchar(15) NOT NULL,
  `bed_regtime` varchar(15) NOT NULL,
  `bed_regby` bigint(20) NOT NULL,
  `bed_disb_date` varchar(15) NOT NULL,
  `bed_disb_time` varchar(15) NOT NULL,
  `bed_disb_by` bigint(20) NOT NULL,
  `bed_disb_reason` text NOT NULL,
  `bed_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bed_mst`
--

INSERT INTO `bed_mst` (`bed_id`, `ward_id`, `bed_no`, `bed_info`, `bed_regdate`, `bed_regtime`, `bed_regby`, `bed_disb_date`, `bed_disb_time`, `bed_disb_by`, `bed_disb_reason`, `bed_status`) VALUES
(1, 1, 1, 'Bed Info.\r\n', '22-01-2024', '08:20 AM', 100100, '2023-10-10', '00:00', 100101, 'afd', 1),
(2, 4, 2, 'bed info', '03-03-2025', '11:28 AM', 100100, '2025-03-03', '11:28', 100101, 'info', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept_mst`
--

CREATE TABLE `dept_mst` (
  `dept_id` bigint(20) NOT NULL,
  `hosp_id` bigint(20) DEFAULT NULL,
  `dept_name` text DEFAULT NULL,
  `dept_desc` text DEFAULT NULL,
  `dept_pno` varchar(15) DEFAULT NULL,
  `dept_email` text DEFAULT NULL,
  `dept_hod_id` bigint(20) DEFAULT NULL,
  `dept_regdate` varchar(15) DEFAULT NULL,
  `dept_regtime` varchar(15) DEFAULT NULL,
  `dept_regby` bigint(20) DEFAULT NULL,
  `dept_deldate` varchar(15) DEFAULT NULL,
  `dept_deltime` varchar(15) DEFAULT NULL,
  `dept_delby` bigint(20) DEFAULT NULL,
  `dept_delreason` text DEFAULT NULL,
  `dept_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_mst`
--

INSERT INTO `dept_mst` (`dept_id`, `hosp_id`, `dept_name`, `dept_desc`, `dept_pno`, `dept_email`, `dept_hod_id`, `dept_regdate`, `dept_regtime`, `dept_regby`, `dept_deldate`, `dept_deltime`, `dept_delby`, `dept_delreason`, `dept_status`) VALUES
(1, 3, 'test dept it', 'Information Technologic Department', '8149181700', 'it@gmail.com', 100100, '21-12-2023', '11:03 AM', 100100, '19-01-2024', '10:59 AM', 100100, 'tedst ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_mst`
--

CREATE TABLE `doctor_mst` (
  `doc_id` bigint(20) NOT NULL,
  `hosp_id` bigint(20) NOT NULL,
  `doc_fname` varchar(30) NOT NULL,
  `doc_mname` varchar(30) NOT NULL,
  `doc_lname` varchar(30) NOT NULL,
  `doc_gender` varchar(15) NOT NULL,
  `doc_dob` varchar(15) NOT NULL,
  `doc_doj` varchar(15) NOT NULL,
  `doc_desc` text NOT NULL,
  `doc_qualif` text NOT NULL,
  `doc_mobileno` int(11) NOT NULL,
  `doc_state` varchar(15) NOT NULL,
  `doc_city` varchar(30) NOT NULL,
  `doc_pin` int(11) NOT NULL,
  `doc_add` text NOT NULL,
  `doc_photo` text NOT NULL,
  `doc_certif_img` text NOT NULL,
  `doc_email` text NOT NULL,
  `doc_specl` text NOT NULL,
  `doc_regdate` varchar(15) NOT NULL,
  `doc_regtime` varchar(15) NOT NULL,
  `doc_regby` bigint(20) NOT NULL,
  `doc_deldate` varchar(15) NOT NULL,
  `doc_deltime` varchar(15) NOT NULL,
  `doc_delby` bigint(20) NOT NULL,
  `doc_delreason` text NOT NULL,
  `doc_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_mst`
--

INSERT INTO `doctor_mst` (`doc_id`, `hosp_id`, `doc_fname`, `doc_mname`, `doc_lname`, `doc_gender`, `doc_dob`, `doc_doj`, `doc_desc`, `doc_qualif`, `doc_mobileno`, `doc_state`, `doc_city`, `doc_pin`, `doc_add`, `doc_photo`, `doc_certif_img`, `doc_email`, `doc_specl`, `doc_regdate`, `doc_regtime`, `doc_regby`, `doc_deldate`, `doc_deltime`, `doc_delby`, `doc_delreason`, `doc_status`) VALUES
(1, 1, '', '', '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', '', 100100, '23-07-2026', '04:06 PM', 100100, 'na', 0),
(2, 3, 'Akash', 'suresh', 'Kulkarni', '', '2024-01-01', '2023-02-01', 'doctor Description', 'Doctor Qualification', 2147483647, 'Maharashtra', 'Aurangabad', 431005, 'Aurngabad', '1.png', '3.png', 'support@ashokintellignece.com', 'doctor Speciality', '22-01-2024', '09:51 PM', 0, '', '', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_mst`
--

CREATE TABLE `emp_mst` (
  `emp_id` bigint(20) NOT NULL,
  `hosp_id` bigint(20) NOT NULL,
  `dept_id` bigint(20) NOT NULL,
  `emp_fname` text NOT NULL,
  `emp_mname` text NOT NULL,
  `emp_lname` text NOT NULL,
  `emp_pno` varchar(10) NOT NULL,
  `emp_email` text NOT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `emp_add` text NOT NULL,
  `emp_state` text NOT NULL,
  `emp_city` text NOT NULL,
  `emp_pin` int(11) NOT NULL,
  `emp_photo` text NOT NULL,
  `emp_dob` varchar(15) NOT NULL,
  `emp_mari_status` varchar(15) NOT NULL,
  `emp_qualif` text NOT NULL,
  `emp_doj` varchar(15) NOT NULL,
  `emp_emg_cont_per` text NOT NULL,
  `emp_emg_cont_per_no` varchar(15) NOT NULL,
  `emp_regdate` varchar(15) NOT NULL,
  `emp_regtime` varchar(15) NOT NULL,
  `emp_regby` bigint(20) NOT NULL,
  `emp_deldate` varchar(15) NOT NULL,
  `emp_deltime` varchar(15) NOT NULL,
  `emp_delreason` text NOT NULL,
  `emp_status` int(11) NOT NULL DEFAULT 1,
  `emp_code` bigint(20) NOT NULL,
  `emp_delby` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_mst`
--

INSERT INTO `emp_mst` (`emp_id`, `hosp_id`, `dept_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_pno`, `emp_email`, `emp_gender`, `emp_add`, `emp_state`, `emp_city`, `emp_pin`, `emp_photo`, `emp_dob`, `emp_mari_status`, `emp_qualif`, `emp_doj`, `emp_emg_cont_per`, `emp_emg_cont_per_no`, `emp_regdate`, `emp_regtime`, `emp_regby`, `emp_deldate`, `emp_deltime`, `emp_delreason`, `emp_status`, `emp_code`, `emp_delby`) VALUES
(1, 3, 1, 'Kaustubh', 'Ashok', 'Khadke', '8149181700', 'thekaustubhkhadke@gmail.com', 'Male', 'Emp Address\r\n', 'Maharashtra', 'Pune', 431005, '1.png', '1994-03-20', 'Marrid', 'MCA', '2021-01-11', 'Rajashri', '9421305427', '19-01-2024', '11:08 AM', 100100, '19-01-2024', '11:09 AM', 'test', 1, 100100, 100100);

-- --------------------------------------------------------

--
-- Table structure for table `hosp_mst`
--

CREATE TABLE `hosp_mst` (
  `hosp_id` bigint(20) NOT NULL,
  `hosp_name` text DEFAULT NULL,
  `hosp_desc` text DEFAULT NULL,
  `hosp_logo` varchar(15) DEFAULT NULL,
  `hosp_pno` varchar(15) DEFAULT NULL,
  `hosp_email` text DEFAULT NULL,
  `hosp_state` text DEFAULT NULL,
  `hosp_city` text DEFAULT NULL,
  `hosp_pin` int(6) DEFAULT NULL,
  `hosp_add` text DEFAULT NULL,
  `hosp_owner` text DEFAULT NULL,
  `hosp_lic` text DEFAULT NULL,
  `hosp_hospregdate` varchar(15) DEFAULT NULL,
  `hosp_regdate` varchar(15) DEFAULT NULL,
  `hosp_regtime` varchar(15) DEFAULT NULL,
  `hosp_regby` bigint(20) DEFAULT NULL,
  `hosp_deldate` varchar(15) DEFAULT NULL,
  `hosp_deltime` varchar(15) DEFAULT NULL,
  `hosp_delby` bigint(20) DEFAULT NULL,
  `hosp_delreason` text DEFAULT NULL,
  `hosp_status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hosp_mst`
--

INSERT INTO `hosp_mst` (`hosp_id`, `hosp_name`, `hosp_desc`, `hosp_logo`, `hosp_pno`, `hosp_email`, `hosp_state`, `hosp_city`, `hosp_pin`, `hosp_add`, `hosp_owner`, `hosp_lic`, `hosp_hospregdate`, `hosp_regdate`, `hosp_regtime`, `hosp_regby`, `hosp_deldate`, `hosp_deltime`, `hosp_delby`, `hosp_delreason`, `hosp_status`) VALUES
(1, 'Vishal Hospital', 'Kishna Great Hospital', NULL, '8149181700', 'thekaustubhkhadke@gmail.com', 'Maharashtra', 'Aurangabad', 431005, 'Near NSBT ', 'Krishna Ghuge', 'ID587458KdE', '2023-12-18', '18-12-2023', '12:25 PM', 100100, '20-12-2023', '11:52 AM', 100100, 'customer closed', 0),
(2, 'Krishna Hospital', 'test', NULL, '41', 'thekaustubhkhadke@gmail.com', 'sdsd', '55', 54, 'dwe', 'Krishna Ghuge', 'ID587458KdE', '2023-12-19', '19-12-2023', '10:14 AM', 100100, '19-01-2024', '10:54 AM', 100100, 'test', 0),
(3, 'Medicare', 'Multicare hospital', 'hampi.jpg', '8149181700', 'ackhadke@gmail.com', 'Maharashtra', 'Sambhaji Nagar', 431005, 'Chistiya chowk', 'Vaibhav', 'Mdi5525Care', '2023-12-19', '19-12-2023', '11:28 AM', 100100, '06-11-2025', '05:28 PM', 100100, 'timepass', 0),
(4, 'Sun hospital', 'Cancer, Heart, specialist hospital', 'lotus.png', '90292038093', 'sun@gmail.com', 'Madhya Pradesh', 'Indore', 1003, 'Indore', 'Jakson Smith', 'yes', '2025-11-06', '06-11-2025', '05:27 PM', 100100, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_mst`
--

CREATE TABLE `inventory_mst` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `supplier` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `price_per_unit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_mst`
--

INSERT INTO `inventory_mst` (`item_id`, `item_name`, `category`, `quantity`, `supplier`, `expiry_date`, `price_per_unit`) VALUES
(6, 'Anti-inflammator', 'tablet', 60, 'Ajanta Pharma', '2026-08-18', 50.00),
(7, 'Amoxicillin', 'Topical medicines.', 80, 'serum Pharma', '2026-06-05', 120.00),
(8, 'Nembutal', 'tablet', 50, 'AB world med', '2027-02-24', 750.00),
(9, 'Valium', 'tablet', 70, 'serum Pharma', '2026-06-16', 250.00);

-- --------------------------------------------------------

--
-- Table structure for table `patient_assign_mat`
--

CREATE TABLE `patient_assign_mat` (
  `pam_id` bigint(20) NOT NULL,
  `p_id` bigint(20) NOT NULL,
  `ward_id` bigint(20) NOT NULL,
  `bed_id` bigint(20) NOT NULL,
  `doc_id` bigint(20) NOT NULL,
  `pam_applic_from_date` varchar(15) NOT NULL,
  `pam_applic_from_time` varchar(15) NOT NULL,
  `pam_applic_to_date` varchar(15) NOT NULL,
  `pam_applic_to_time` varchar(15) NOT NULL,
  `pam_regdate` varchar(15) NOT NULL,
  `pam_regtime` varchar(15) NOT NULL,
  `pam_regby` bigint(20) NOT NULL,
  `pam_reason` text NOT NULL,
  `pam_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_assign_mat`
--

INSERT INTO `patient_assign_mat` (`pam_id`, `p_id`, `ward_id`, `bed_id`, `doc_id`, `pam_applic_from_date`, `pam_applic_from_time`, `pam_applic_to_date`, `pam_applic_to_time`, `pam_regdate`, `pam_regtime`, `pam_regby`, `pam_reason`, `pam_status`) VALUES
(1, 1, 4, 1, 1, '2024-01-01', '01:00', '2024-01-01', '01:00', '22-01-2024', '06:43 PM', 100100, 'Delete Reason\r\n', 0),
(2, 3, 4, 2, 2, '2025-03-03', '03:46', '2025-03-05', '05:46', '03-03-2025', '11:47 AM', 100100, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_in_out`
--

CREATE TABLE `patient_in_out` (
  `pio_in` bigint(20) NOT NULL,
  `p_id` bigint(20) NOT NULL,
  `pio_indate` varchar(15) NOT NULL,
  `pio_intime` varchar(15) NOT NULL,
  `pio_in_adm_resn` text NOT NULL,
  `pio_in_by` bigint(20) NOT NULL,
  `pio_outdate` varchar(15) NOT NULL,
  `pio_outtime` varchar(15) NOT NULL,
  `pio_out_reason` text NOT NULL,
  `pio_out_by` varchar(15) NOT NULL,
  `pio_regdate` varchar(15) NOT NULL,
  `pio_regtime` varchar(15) NOT NULL,
  `pio_regby` bigint(20) NOT NULL,
  `pio_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_in_out`
--

INSERT INTO `patient_in_out` (`pio_in`, `p_id`, `pio_indate`, `pio_intime`, `pio_in_adm_resn`, `pio_in_by`, `pio_outdate`, `pio_outtime`, `pio_out_reason`, `pio_out_by`, `pio_regdate`, `pio_regtime`, `pio_regby`, `pio_status`) VALUES
(1, 1, '2024-01-01', '01:01', '0', 100100, '2025-03-05', '00:31', ' RECOVER', '', '21-01-2024', '01:39 PM', 100100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_mst`
--

CREATE TABLE `patient_mst` (
  `p_id` bigint(20) NOT NULL,
  `p_fname` text DEFAULT NULL,
  `p_mname` text DEFAULT NULL,
  `p_lname` text DEFAULT NULL,
  `p_dob` varchar(15) DEFAULT NULL,
  `p_gender` varchar(10) DEFAULT NULL,
  `p_state` text DEFAULT NULL,
  `p_city` text DEFAULT NULL,
  `p_pin` int(6) DEFAULT NULL,
  `p_add` text DEFAULT NULL,
  `p_mobilno` varchar(15) DEFAULT NULL,
  `p_email` text DEFAULT NULL,
  `p_marital_status` varchar(15) DEFAULT NULL,
  `p_occup` text DEFAULT NULL,
  `p_blood_grp` varchar(10) DEFAULT NULL,
  `p_aadharno` varchar(20) DEFAULT NULL,
  `p_idproof` varchar(15) DEFAULT NULL,
  `p_emg_cont_per` text DEFAULT NULL,
  `p_emg_cont_per_no` varchar(15) DEFAULT NULL,
  `p_emg_cont_relat` varchar(20) DEFAULT NULL,
  `p_photo` varchar(15) DEFAULT NULL,
  `p_regdate` varchar(15) DEFAULT NULL,
  `p_regtime` varchar(15) DEFAULT NULL,
  `p_regby` bigint(20) DEFAULT NULL,
  `p_deldate` varchar(15) DEFAULT NULL,
  `p_deltime` varchar(15) DEFAULT NULL,
  `p_delby` bigint(20) DEFAULT NULL,
  `p_delreason` text DEFAULT NULL,
  `p_status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_mst`
--

INSERT INTO `patient_mst` (`p_id`, `p_fname`, `p_mname`, `p_lname`, `p_dob`, `p_gender`, `p_state`, `p_city`, `p_pin`, `p_add`, `p_mobilno`, `p_email`, `p_marital_status`, `p_occup`, `p_blood_grp`, `p_aadharno`, `p_idproof`, `p_emg_cont_per`, `p_emg_cont_per_no`, `p_emg_cont_relat`, `p_photo`, `p_regdate`, `p_regtime`, `p_regby`, `p_deldate`, `p_deltime`, `p_delby`, `p_delreason`, `p_status`) VALUES
(1, 'Jef', 'ruswelt', 'jhon', '2024-01-06', 'female', 'maharashtra', 'shambajinagar', 156156, 'adxcwSACAWSC', '01561561651', 'rajaleamruta21@gmail.com', 'unmarried', 'none', 'b+', '1564856184231', NULL, 'sai', '156156156561', 'none', NULL, '22-12-2023', '12:39 PM', NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Avinash', 'vijay', 'kumar', '2024-01-01', 'Male', 'Maharashtra', 'Aurangabad', 431005, 'test address', '8149181700', 'avinash@gmail.com', 'Unmarried', 'Job', 'A+', '544654564', '1.png', 'ashok khadke', '9421305427', 'Kaka', '8.png', '21-01-2024', '08:59 AM', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Vasuki', 'Dhruv', 'Patil', '2025-03-12', 'MALE', 'Maharashtra', 'MUMBAI', 6, 'MUMBAI, Worli', '9571199495', 'vasu@gmail.com', 'Single', 'Employee', 'AB-', '9898 6465 7898', '111303351.jpg', '9678991199', '9678991199', '9678881194', '111303351.jpg', '03-03-2025', '11:43 AM', NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_opration`
--

CREATE TABLE `patient_opration` (
  `po_id` int(11) NOT NULL,
  `pio_in` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `po_name` varchar(255) DEFAULT NULL,
  `po_desc` text DEFAULT NULL,
  `po_result` text DEFAULT NULL,
  `po_remark` text DEFAULT NULL,
  `po_regdate` varchar(20) DEFAULT NULL,
  `po_regtime` varchar(20) DEFAULT NULL,
  `po_by` int(11) DEFAULT NULL,
  `po_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_prescription`
--

CREATE TABLE `patient_prescription` (
  `pp_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `pp_health_issue` varchar(255) DEFAULT NULL,
  `pp_medicine_name` varchar(255) DEFAULT NULL,
  `pp_medicine_for_days` varchar(50) DEFAULT NULL,
  `pp_medi_befo_aftr` varchar(50) DEFAULT NULL,
  `pp_medi_time` varchar(100) DEFAULT NULL,
  `pp_medicine_total` varchar(50) DEFAULT NULL,
  `pp_medine_eat_drink_count` varchar(50) DEFAULT NULL,
  `pp_nextvisitdate` date DEFAULT NULL,
  `pp_precautions` text DEFAULT NULL,
  `pp_photo` varchar(255) DEFAULT NULL,
  `pp_regdate` varchar(20) DEFAULT NULL,
  `pp_regtime` varchar(20) DEFAULT NULL,
  `pp_regby` int(11) DEFAULT NULL,
  `pp_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_prescription`
--

INSERT INTO `patient_prescription` (`pp_id`, `doc_id`, `pp_health_issue`, `pp_medicine_name`, `pp_medicine_for_days`, `pp_medi_befo_aftr`, `pp_medi_time`, `pp_medicine_total`, `pp_medine_eat_drink_count`, `pp_nextvisitdate`, `pp_precautions`, `pp_photo`, `pp_regdate`, `pp_regtime`, `pp_regby`, `pp_status`) VALUES
(1, 2, 'fever', 'abc', '12', 'Before Meal', '19:05', '8', '10', '2026-07-23', 'NA', NULL, '23-07-2026', '04:06 PM', 100100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_treatment`
--

CREATE TABLE `patient_treatment` (
  `pt_id` int(11) NOT NULL,
  `pio_in` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `tretm_title` varchar(255) DEFAULT NULL,
  `tretm_desc` text DEFAULT NULL,
  `tretm_time` varchar(20) DEFAULT NULL,
  `tretm_date` date DEFAULT NULL,
  `tretm_remark` text DEFAULT NULL,
  `tretm_regdate` varchar(20) DEFAULT NULL,
  `tretm_regtime` varchar(20) DEFAULT NULL,
  `tretm_regby` int(11) DEFAULT NULL,
  `tretm_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_doc_matrix`
--

CREATE TABLE `shift_doc_matrix` (
  `sdm_id` bigint(20) NOT NULL,
  `doc_id` bigint(20) NOT NULL,
  `shift_id` bigint(20) NOT NULL,
  `sdm_aplic_from_date` varchar(15) NOT NULL,
  `sdm_aplic_to_date` varchar(15) NOT NULL,
  `sdm_aplic_reason` text NOT NULL,
  `sdm_regby` bigint(20) NOT NULL,
  `sdm_regdate` varchar(15) NOT NULL,
  `sdm_regtime` varchar(15) NOT NULL,
  `sdm_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_emp_matrix`
--

CREATE TABLE `shift_emp_matrix` (
  `sem_id` bigint(20) NOT NULL,
  `emp_id` bigint(20) DEFAULT NULL,
  `shift_id` bigint(20) DEFAULT NULL,
  `sem_aplic_from_date` varchar(15) DEFAULT NULL,
  `sem_aplic_to_date` varchar(15) DEFAULT NULL,
  `sem_aplic_reason` text DEFAULT NULL,
  `sem_regby` bigint(20) DEFAULT NULL,
  `sem_regdate` varchar(15) DEFAULT NULL,
  `sem_regtime` varchar(15) DEFAULT NULL,
  `sem_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift_emp_matrix`
--

INSERT INTO `shift_emp_matrix` (`sem_id`, `emp_id`, `shift_id`, `sem_aplic_from_date`, `sem_aplic_to_date`, `sem_aplic_reason`, `sem_regby`, `sem_regdate`, `sem_regtime`, `sem_status`) VALUES
(1, 1, 2, '2024-01-01', '2024-12-31', 'Applicable reason\r\n', 100100, '19-01-2024', '11:37 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shift_mst`
--

CREATE TABLE `shift_mst` (
  `shift_id` bigint(20) NOT NULL,
  `hosp_id` bigint(20) DEFAULT NULL,
  `shift_name` text DEFAULT NULL,
  `shift_desc` text DEFAULT NULL,
  `shift_start_time` varchar(15) DEFAULT NULL,
  `shift_end_time` varchar(15) DEFAULT NULL,
  `shift_total_time_in_hr` varchar(15) DEFAULT NULL,
  `shift_regdate` varchar(15) DEFAULT NULL,
  `shift_regtime` varchar(15) DEFAULT NULL,
  `shift_regby` bigint(20) DEFAULT NULL,
  `shift_deldate` varchar(15) DEFAULT NULL,
  `shift_deltime` varchar(15) DEFAULT NULL,
  `shift_delby` bigint(20) DEFAULT NULL,
  `shift_delreason` text DEFAULT NULL,
  `shift_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift_mst`
--

INSERT INTO `shift_mst` (`shift_id`, `hosp_id`, `shift_name`, `shift_desc`, `shift_start_time`, `shift_end_time`, `shift_total_time_in_hr`, `shift_regdate`, `shift_regtime`, `shift_regby`, `shift_deldate`, `shift_deltime`, `shift_delby`, `shift_delreason`, `shift_status`) VALUES
(1, 3, 'Second Shift', 'Morning Shift', '07:00', '15:30', '8', '21-12-2023', '11:31 AM', 100100, '21-12-2023', '11:32 AM', 100100, 'Delete Reason', 1),
(2, 3, 'First Shift', 'test', '07:00', '15:30', '8', '19-01-2024', '11:01 AM', 100100, '19-01-2024', '11:02 AM', 100100, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_mst`
--

CREATE TABLE `supplier_mst` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` varchar(50) DEFAULT NULL,
  `supplier_email` varchar(100) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_mst`
--

INSERT INTO `supplier_mst` (`supplier_id`, `supplier_name`, `supplier_contact`, `supplier_email`, `item_id`) VALUES
(5, 'Dhoot supplier', '9572266459', 'dhoot@gmail.com', 6),
(7, 'Aero Chain', '9661199955', 'aerochain@gmail.com', 9),
(8, 'DLF', '9571199459', 'dlf@gmail.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_mst`
--

CREATE TABLE `visitor_mst` (
  `visitor_id` int(11) NOT NULL,
  `visitor_name` varchar(100) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `p_fname` varchar(100) DEFAULT NULL,
  `p_lname` varchar(100) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `rel_with_patient` varchar(100) DEFAULT NULL,
  `c_no` varchar(20) DEFAULT NULL,
  `visitor_status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_mst`
--

INSERT INTO `visitor_mst` (`visitor_id`, `visitor_name`, `patient_id`, `p_fname`, `p_lname`, `visit_date`, `rel_with_patient`, `c_no`, `visitor_status`) VALUES
(1, 'Kunal', 156, 'Avinash', 'kumar', '2026-07-23', 'brother', '9579911940', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ward_mst`
--

CREATE TABLE `ward_mst` (
  `ward_id` bigint(20) NOT NULL,
  `hosp_id` bigint(20) DEFAULT NULL,
  `ward_name` text DEFAULT NULL,
  `ward_floor` text DEFAULT NULL,
  `ward_no_of_bed` varchar(15) DEFAULT NULL,
  `ward_desc` text DEFAULT NULL,
  `ward_regdate` varchar(15) DEFAULT NULL,
  `ward_regtime` varchar(15) DEFAULT NULL,
  `ward_regby` bigint(20) DEFAULT NULL,
  `ward_disb_date` varchar(15) DEFAULT NULL,
  `ward_disb_time` varchar(15) DEFAULT NULL,
  `ward_disb_by` bigint(20) DEFAULT NULL,
  `ward_disb_reason` text DEFAULT NULL,
  `ward_status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ward_mst`
--

INSERT INTO `ward_mst` (`ward_id`, `hosp_id`, `ward_name`, `ward_floor`, `ward_no_of_bed`, `ward_desc`, `ward_regdate`, `ward_regtime`, `ward_regby`, `ward_disb_date`, `ward_disb_time`, `ward_disb_by`, `ward_disb_reason`, `ward_status`) VALUES
(1, 1, 'wsdfgh', '1', '12', 'sdfghjkl;\'', '22-12-2023', '11:17 AM', 100100, '22-12-2023', '12:34 PM', 100100, 'hmko nhi aara', 1),
(2, 1, 'cancer', '04', '18', 'asdfghj', '22-12-2023', '12:04 PM', 100100, '22-12-2023', '12:41 PM', 100100, 'ham seh na ho payega', 0),
(3, 1, 'surgery', '4', '50', 'zinda mar jana ... aur uske nsbt zindabad', '22-12-2023', '12:40 PM', 100100, NULL, NULL, NULL, NULL, 1),
(4, 1, 'ICU', '04', '20', 'ventilator wale', '22-12-2023', '01:06 PM', 100100, NULL, NULL, NULL, NULL, 1),
(5, NULL, 'Surgery', '2', '8', 'Koi Zinda nhi ja payega', '22-12-2023', '01:58 PM', 100100, NULL, NULL, NULL, NULL, 1),
(6, NULL, 'Ward Name', '2', '250', 'Ward Desc', '21-01-2024', '03:50 PM', 100100, NULL, NULL, NULL, NULL, 1),
(7, NULL, 'Cancer ICU', '4', '50', 'Only for ward masters', '03-03-2025', '11:27 AM', 100100, '03-03-2025', '11:27 AM', 100100, 'the modification', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bed_mst`
--
ALTER TABLE `bed_mst`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `dept_mst`
--
ALTER TABLE `dept_mst`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `doctor_mst`
--
ALTER TABLE `doctor_mst`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `emp_mst`
--
ALTER TABLE `emp_mst`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `hosp_mst`
--
ALTER TABLE `hosp_mst`
  ADD PRIMARY KEY (`hosp_id`);

--
-- Indexes for table `inventory_mst`
--
ALTER TABLE `inventory_mst`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `patient_assign_mat`
--
ALTER TABLE `patient_assign_mat`
  ADD PRIMARY KEY (`pam_id`);

--
-- Indexes for table `patient_in_out`
--
ALTER TABLE `patient_in_out`
  ADD PRIMARY KEY (`pio_in`);

--
-- Indexes for table `patient_mst`
--
ALTER TABLE `patient_mst`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `patient_opration`
--
ALTER TABLE `patient_opration`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `patient_prescription`
--
ALTER TABLE `patient_prescription`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `patient_treatment`
--
ALTER TABLE `patient_treatment`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `shift_doc_matrix`
--
ALTER TABLE `shift_doc_matrix`
  ADD PRIMARY KEY (`sdm_id`);

--
-- Indexes for table `shift_emp_matrix`
--
ALTER TABLE `shift_emp_matrix`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `shift_mst`
--
ALTER TABLE `shift_mst`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `supplier_mst`
--
ALTER TABLE `supplier_mst`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `visitor_mst`
--
ALTER TABLE `visitor_mst`
  ADD PRIMARY KEY (`visitor_id`);

--
-- Indexes for table `ward_mst`
--
ALTER TABLE `ward_mst`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bed_mst`
--
ALTER TABLE `bed_mst`
  MODIFY `bed_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dept_mst`
--
ALTER TABLE `dept_mst`
  MODIFY `dept_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_mst`
--
ALTER TABLE `doctor_mst`
  MODIFY `doc_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_mst`
--
ALTER TABLE `emp_mst`
  MODIFY `emp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hosp_mst`
--
ALTER TABLE `hosp_mst`
  MODIFY `hosp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory_mst`
--
ALTER TABLE `inventory_mst`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_assign_mat`
--
ALTER TABLE `patient_assign_mat`
  MODIFY `pam_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_in_out`
--
ALTER TABLE `patient_in_out`
  MODIFY `pio_in` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_mst`
--
ALTER TABLE `patient_mst`
  MODIFY `p_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_opration`
--
ALTER TABLE `patient_opration`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_prescription`
--
ALTER TABLE `patient_prescription`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_treatment`
--
ALTER TABLE `patient_treatment`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_doc_matrix`
--
ALTER TABLE `shift_doc_matrix`
  MODIFY `sdm_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_emp_matrix`
--
ALTER TABLE `shift_emp_matrix`
  MODIFY `sem_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shift_mst`
--
ALTER TABLE `shift_mst`
  MODIFY `shift_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_mst`
--
ALTER TABLE `supplier_mst`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `visitor_mst`
--
ALTER TABLE `visitor_mst`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ward_mst`
--
ALTER TABLE `ward_mst`
  MODIFY `ward_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
