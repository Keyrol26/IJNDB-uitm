-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 08:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo6`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergys`
--

CREATE TABLE `allergys` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `update_date` date DEFAULT NULL,
  `allergen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allergen_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `episode_id` int(10) UNSIGNED NOT NULL,
  `res_rowid` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `appt_rowid` int(10) UNSIGNED NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `appointment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billinpatients`
--

CREATE TABLE `billinpatients` (
  `mrn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payor_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payor_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `bill_amount` decimal(13,2) DEFAULT NULL,
  `deposit_amount` decimal(13,2) DEFAULT NULL,
  `payment_amount` decimal(13,2) DEFAULT NULL,
  `letter` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billoutpatients`
--

CREATE TABLE `billoutpatients` (
  `mrn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payor_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payor_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `bill_amount` decimal(13,2) DEFAULT NULL,
  `deposit_amount` decimal(13,2) DEFAULT NULL,
  `payment_amount` decimal(13,2) DEFAULT NULL,
  `letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `episode_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `payor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payor_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payor_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `bill_amount` decimal(13,2) DEFAULT NULL,
  `deposit_amount` decimal(13,2) DEFAULT NULL,
  `payment_amount` decimal(13,2) DEFAULT NULL,
  `letter` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elabs`
--

CREATE TABLE `elabs` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `episode_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `fasting` tinyint(4) DEFAULT NULL,
  `expected_appointment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rp` tinyint(4) DEFAULT NULL,
  `lft` tinyint(4) DEFAULT NULL,
  `fsl` tinyint(4) DEFAULT NULL,
  `fbs_rbs` tinyint(4) DEFAULT NULL,
  `fbc` tinyint(4) DEFAULT NULL,
  `hba1c` tinyint(4) DEFAULT NULL,
  `inr` tinyint(4) DEFAULT NULL,
  `ufeme` tinyint(4) DEFAULT NULL,
  `tft` tinyint(4) DEFAULT NULL,
  `ft3` tinyint(4) DEFAULT NULL,
  `sero` tinyint(4) DEFAULT NULL,
  `hscrp` tinyint(4) DEFAULT NULL,
  `cardiac_marker` tinyint(4) NOT NULL,
  `mircroalbumin` tinyint(4) DEFAULT NULL,
  `probnp` tinyint(4) DEFAULT NULL,
  `iron_studies` tinyint(4) DEFAULT NULL,
  `vit_b12` tinyint(4) DEFAULT NULL,
  `cea` tinyint(4) DEFAULT NULL,
  `psa` tinyint(4) DEFAULT NULL,
  `afp` tinyint(4) DEFAULT NULL,
  `ca125` tinyint(4) DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fasting_1` tinyint(4) DEFAULT NULL,
  `expected_appointment_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rp_1` tinyint(4) DEFAULT NULL,
  `lft_1` tinyint(4) DEFAULT NULL,
  `fsl_1` tinyint(4) DEFAULT NULL,
  `fbs_rbs_1` tinyint(4) DEFAULT NULL,
  `fbc_1` tinyint(4) DEFAULT NULL,
  `hba1c_1` tinyint(4) DEFAULT NULL,
  `inr_1` tinyint(4) DEFAULT NULL,
  `ufeme_1` tinyint(4) DEFAULT NULL,
  `tft_1` tinyint(4) DEFAULT NULL,
  `ft3_1` tinyint(4) DEFAULT NULL,
  `sero_1` tinyint(4) DEFAULT NULL,
  `hscrp_1` tinyint(4) DEFAULT NULL,
  `cardiac_marker_1` tinyint(4) DEFAULT NULL,
  `mircroalbumin_1` tinyint(4) DEFAULT NULL,
  `probnp_1` tinyint(4) DEFAULT NULL,
  `iron_studies_1` tinyint(4) DEFAULT NULL,
  `vit_b12_1` tinyint(4) DEFAULT NULL,
  `cea_1` tinyint(4) DEFAULT NULL,
  `psa_1` tinyint(4) DEFAULT NULL,
  `afp_1` tinyint(4) DEFAULT NULL,
  `ca125_1` tinyint(4) DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `req_doctor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `creation_time` time DEFAULT NULL,
  `creation_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_update_date` date DEFAULT NULL,
  `last_update_time` time DEFAULT NULL,
  `last_update_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `episode_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `episode_date` date DEFAULT NULL,
  `episode_time` time DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visittype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discipline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admissioncategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gl_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dischargedate` date DEFAULT NULL,
  `dischargetime` time DEFAULT NULL,
  `provosionaldiagnosis` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicallocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estdischargedate` date DEFAULT NULL,
  `estdischargetime` time DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referralhospital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referralsource` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(10) UNSIGNED NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hospital`, `logo`) VALUES
(1, 'IJN', 0x89504e470d0a1a0a0000000d494844520000007d0000007d08060000008f806c250000001974455874536f6674776172650041646f626520496d616765526561647971c9653c000006864944415478daec9c5d4f1c5518c70fb0cbdb12de5a4010102ca612b5a5d8dea049d71b6f34d1f4a6f1c6b61fc0543e81f11360e307287c034cbcd1a4e9a2d198a82d35346a6c0569d30a8b306c58ea96423cffd973d66599dd9dd9997d9bfdff92c9eccecb99d9f37f9ee73ce7ec9911821042082184104208218410420821841042082184104208218410420821841042082184104208218410420821841042483551e7971ff2d1ad7838ed6ba75c263c2876512e86fef2f9642842d14b27e88412520b7b5eadf5f652632883000b6a0d8330a4612c5274e7e2621951c28ea8a5da5851cb825a2f569231d4955160edb9e795d0e11a684e232a42c01822d2100c5f8b9e2172d8a336b7da595486505223a82bb2d0234ae0f7e4f23e35cecbbc5cbe5006b05235a22b8f86c0976a246417b329988321781d01ea3c141be1faaa12bc939a79da534004b8e6553258e781d897e9d5a5f57e29fe6c59449762c3a367aab44b55eda0bd9f96e2cf97447415c6670af5ec5f6e2d8bedaddd23db875fec112f8cf6524ee79e3fed34ec071c26689fc8e563377709c1a3ebdb47b61fef6ba784ce81e3dd96da7c26d79fda4df8ea1d78f74db78293a2015d6e2a9ddc8bae123508eecbc194fa674f454b6c4d04133baeca698a6f96fba74c28e12fbb125d1570ddcf5db0a6dd2d31b8f495685fbfefaa9ce13b5f8ac1bb5fbb2a03e7f72cffe8a608e8743d9ff0011b827bcaa9c911b1b7b77f647b6ba8a9aaa3855b6f47a469d9fedbab5b82f0225bd72e902743f79c8eae902fa345baf8851048c4bdbead19a9a3e5bf7bd93cbd6821fddb1b772db3f7f1d786c4f8ab4339bb74a150b3f8e6c692ed6b217aa0dc1aed0a762a1dcfe46dd355582f5bd2a6bb7499cb6e3ce1b82c9cf3f30ff7c4a3879b55a3948721de4ceeacda77ab44eeaadf4c1ed1a386b99453743500e3bbae59ae2811fc77a7a2ee3511eaf6bac8703e4faf5ac14f4d8e8a8141e715a6fbe7814465887f1068b4ec1db8e919644c1ab53f0c5be98c9dec179db2675068fb1db4c89ed1770f6dae8a674d6dc21818177b729d6a7b636ba255b6bf3bdd43390daafbc11db3ec446b97f867e8744a5408d9f5f857b1dbf19c78d2de270e1a8259cbc018008e4714581b9b721d0d7c23baddfe74dfbdefcccf9b5200545ea3f2202450d80f51b01ef83d7228a96a8fde170f5f79db3c0765e8c19c4e291cb6677a69ba58ba7c94b17afa5dd378301003ef8551e05e62bd279282643437d8af05c7f1384f9751703d647c5ff4b3e8a8f4b6cd07e6a22bbd29be75683f2a18fb20122a7ae5f50b223a7acedcdeb3f29329320487c046ffb8b95d1b003eeba5ffb788b986a07f4c7d688a9a34baef4d83c0b5211cca81b0ba0cecc335b441613b8e83d0fa3e50b61332e7eb0732761a32fe47848f26440c373f112fb5c44def84d80062a14221aef62254f63159f9c7946741a4e8c8b994b83817868005dbb4d7a31c2d92793de9dd0dfb4f536520a483b5b137cc308ff39f5f4a0ed7a2c938686834ef0dc26b30140bb16118b8d6e397c3a9fbc6f9e6bdc8e605cd820d2276c2fb5c3145efe86acd3a90522cd1cfb61b42ac1b6605c25b50797bcd6da9716e7863d293ffffaec5d24447ce9a9ebe2fdbde0d59860eaf3aeca67fc675acca7874329c8a303836d673c23cb625961412c7237f382eef0bc7205f48bf96369e0d69540ec2fb5ce686ba2cd9deed7265f2b946ec7a7a3bb28ec85df8604a6cacc72cf737d51f88772ebe797420447a0bb0e93159132d7825448448e9613beb008c7d2f750b8661cfd84de4ae88e4dfa99e0fc5feb5bc2e56ff8c66dd6f189e8f418bc481f59f895e543c044ef7683b9975890437948ef6b2770cd24b6f9f1645f8970d0325569e4c3c27eb34aafa1c19df6c364b2115cf955c3366ebf3a4fa5a78a3dcbfa2a33344296d86f47c53a4f34e975205bc55ce3e7cb0312093384e9ccc97b441273b73e26d8dc8a9361ec2bb9e0d8bae19b270fb823798ffb343f860b0c1d1b93584a3d9b0259ff75e4cb275d97497ce87444431e7bda77b3dc2089f70292b2bc2c5132e05ffe1a22e38cf67d94aeed9d70a15dbb5e81989de2c9f5a2d6a465e594fad5ab4f9faf9f492bf8800033f18f1b302c96095a15f5050b9cfa7579a0154294513ba64a25b180184e73b670ef7add14e2fb86da72b56748b281016b5f776a9052db6efdf2ee5600c80ef91ab25d1f31803df18594ba2db348cf4e6a118ef86ad0a41092184104208218410420821841042082184104208218410420821841042082184104208218410420821841042082184f88fff0418006860fc4f725cd1ab0000000049454e44ae426082),
(2, 'IJNPH', 0x89504e470d0a1a0a0000000d4948445200000019000000190806000000c4e985630000001974455874536f6674776172650041646f626520496d616765526561647971c9653c000002874944415478dae4553f68136114ffee123425095e1da44391b8ea609c0c7448330822684fd0d96610ba84c64157cde4e0d00417379359c1134128a1f6320806849e83b39f505c8a4d6a2da4bde0f9de77efce2f9f97a4249b3e78f7ddbdfbeefdbef77b7f8eb17f45b428e3e537d7b2b098f4c841adf6f5b7dd480f2bb9325c97244b833dfb501f0a42ced740171557085003a047a1e5e915837debadb18efb159eee8066a4fd0e6801c0ba032004b0096a8c885c7cdce66e46dadb150e3fef235059da5b079022dec402cb8dbb671f2fa40fd7cfcfb82dd7d39cdd7eaca79c0e650ef4eaf7036fafff4b38c7832540dbecccc975b673d4966836d8c7ed9a88e4c9fbbc41a7ca2a0e796b3fd1d87163ab11d1d9405d01280b0ef18abeaf4344485f1ef4354452c5973ae87204004a269feed9b05e229a64f173566a72a22bf87e995d489f02e70501b492f3b0307442ad903a4ab2b3b74e1f6c81f284ee59d2bb6a78576a7645047fa40c119a126d4b48d7e2fd85962d1f33b0c1da91a872367ecc543a7d9d93838741d2a110b842b90db485116ba39a0840be4495e6cbdd644789f89c5271168070aa36ae8f69d69be424103ce973855643d84a4db41505804ffd5e5040234180328780643173a9c39a026e8a3e2b3511e09368e864d81d8d719130ca5751b6cd9fe81baa0d6495d6bcc84532eee706468c7e9c01074075d1d5fee911d4c68a236a06cb3a90542c64217edc494a11cd423160656da1edb6f6d37ae1a5c2be9272c4d98377e101f4092677d8b8deac662ad1046003799c04c48ec88fff4bc0c98c13c2afb4c941883627e2554374bf3f6ad8b4913031fcfefe0554876d8eb32965fb288e3de30cfd734e017291d60a38b7c66d9e26927b909f2afbafe4b7000300e2a2e675f70848900000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Table structure for table `icls`
--

CREATE TABLE `icls` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `episode_id` int(10) UNSIGNED NOT NULL,
  `icl_id` int(10) UNSIGNED NOT NULL,
  `scheduled_date` date DEFAULT NULL,
  `procedure_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waiting_days` int(11) DEFAULT NULL,
  `consultant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinical_specialist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anaesthesia_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `financial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `investigation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial_assessment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fasting_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tea` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fluid` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_time_call` time DEFAULT NULL,
  `cath_registration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial_procedure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_proc_1st` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_proc_2nd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_proc_3rd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `morbidity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morbidity_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mortality` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mortality_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dtbt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dtbt_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vascular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vascular_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overall_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratorys`
--

CREATE TABLE `laboratorys` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `episode_id` int(10) UNSIGNED NOT NULL,
  `oeord_rowid` int(10) UNSIGNED NOT NULL,
  `oeori_rowid` int(10) UNSIGNED NOT NULL,
  `lab_no1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_decs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `collection_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_time` time DEFAULT NULL,
  `result_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_time` time DEFAULT NULL,
  `specimens` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_set` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `episode_id` int(10) UNSIGNED NOT NULL,
  `oeord_rowid` int(10) UNSIGNED NOT NULL,
  `oeori_rowid` int(10) UNSIGNED NOT NULL,
  `order_item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_decs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `dose_qtt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiving_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mhds`
--

CREATE TABLE `mhds` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `episode_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverqtt` int(11) DEFAULT NULL,
  `recruitdate` date DEFAULT NULL,
  `deliverydate` date DEFAULT NULL,
  `approxdate` date DEFAULT NULL,
  `pickupdate` date DEFAULT NULL,
  `trackingno` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `canceldate` date DEFAULT NULL,
  `actiondate` date DEFAULT NULL,
  `holddate` date DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homeno` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ots`
--

CREATE TABLE `ots` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `episode_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `op_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_theatre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `op_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `op_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surgeon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks_1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_reason` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anaestheatist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_date` date DEFAULT NULL,
  `waiting_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrn` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `mrnp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdpa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pchc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `newic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oldic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passportno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maritalstat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `race` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctzenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residential` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrntype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bluelistflag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homeno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medrecordlocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deceased` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deceaseddate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pmrmrndispose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subsidydatas`
--

CREATE TABLE `subsidydatas` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `episode_no` varchar(255) DEFAULT NULL,
  `invoice` decimal(10,2) DEFAULT NULL,
  `bayaran` decimal(10,2) DEFAULT NULL,
  `subsidi` decimal(10,2) DEFAULT NULL,
  `kounsel` date DEFAULT NULL,
  `tarikh_masuk` date DEFAULT NULL,
  `tarikh_keluar` date DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `catatan` varchar(500) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subsidydependents`
--

CREATE TABLE `subsidydependents` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perhubungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subsidydocs`
--

CREATE TABLE `subsidydocs` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikh` date DEFAULT NULL,
  `rujukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subsidys`
--

CREATE TABLE `subsidys` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `nama_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeno_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officeno_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_temuduga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_temuduga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan_temuduga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_temuduga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeno_temuduga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officeno_temuduga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_temuduga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebab` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebab_lain` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kediaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kemudahan_asas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prosedur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kos_anggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mampu_dibayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taksiran_tarikh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_pesakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_semakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `updatetime` datetime NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `updatetime`, `Status`) VALUES
(1, '2023-01-09 08:49:42', 'Updated');

-- --------------------------------------------------------

--
-- Table structure for table `updates_1`
--

CREATE TABLE `updates_1` (
  `id` int(11) NOT NULL,
  `updatetime` datetime NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates_1`
--

INSERT INTO `updates_1` (`id`, `updatetime`, `Status`) VALUES
(1, '2023-01-09 15:10:01', 'Updated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$KkSBT9T6IRMRf6cLQ6MFMOEwFq7STrneIUCmM130q3p7rbXdA7Jg.', NULL, '2022-11-15 19:38:26', '2022-11-15 19:38:26'),
(2, 'admin', '44935', NULL, '2022-11-15 19:38:26', '2022-11-15 19:38:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergys`
--
ALTER TABLE `allergys`
  ADD KEY `allergys_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_episode_id_foreign` (`episode_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_patient_id_foreign` (`patient_id`),
  ADD KEY `bills_episode_id_foreign` (`episode_id`);

--
-- Indexes for table `elabs`
--
ALTER TABLE `elabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elabs_patient_id_foreign` (`patient_id`),
  ADD KEY `elabs_episode_id_foreign` (`episode_id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_patientid_foreign` (`patient_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hospital`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `icls`
--
ALTER TABLE `icls`
  ADD KEY `icls_patient_id_foreign` (`patient_id`),
  ADD KEY `icls_episode_id_foreign` (`episode_id`);

--
-- Indexes for table `laboratorys`
--
ALTER TABLE `laboratorys`
  ADD KEY `laboratorys_patient_id_foreign` (`patient_id`),
  ADD KEY `laboratorys_episode_id_foreign` (`episode_id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD KEY `medications_patient_id_foreign` (`patient_id`),
  ADD KEY `medications_episode_id_foreign` (`episode_id`);

--
-- Indexes for table `mhds`
--
ALTER TABLE `mhds`
  ADD KEY `mhds_patientid_foreign` (`patient_id`),
  ADD KEY `mhds_episodeid_foreign` (`episode_no`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ots`
--
ALTER TABLE `ots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ots_patient_id_foreign` (`patient_id`),
  ADD KEY `ots_episode_id_foreign` (`episode_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_hospital_foreign` (`hospital`);

--
-- Indexes for table `subsidydatas`
--
ALTER TABLE `subsidydatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subsidydatas_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `subsidydependents`
--
ALTER TABLE `subsidydependents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subsidydependents_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `subsidydocs`
--
ALTER TABLE `subsidydocs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subsidydocs_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `subsidys`
--
ALTER TABLE `subsidys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subsidys_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates_1`
--
ALTER TABLE `updates_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elabs`
--
ALTER TABLE `elabs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ots`
--
ALTER TABLE `ots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subsidydatas`
--
ALTER TABLE `subsidydatas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subsidydependents`
--
ALTER TABLE `subsidydependents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subsidydocs`
--
ALTER TABLE `subsidydocs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subsidys`
--
ALTER TABLE `subsidys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `updates_1`
--
ALTER TABLE `updates_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allergys`
--
ALTER TABLE `allergys`
  ADD CONSTRAINT `allergys_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_episode_id_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_episode_id_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `elabs`
--
ALTER TABLE `elabs`
  ADD CONSTRAINT `elabs_episode_id_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `elabs_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_patientid_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `icls`
--
ALTER TABLE `icls`
  ADD CONSTRAINT `icls_episode_id_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `icls_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laboratorys`
--
ALTER TABLE `laboratorys`
  ADD CONSTRAINT `laboratorys_episode_id_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laboratorys_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `medications_episode_id_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medications_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mhds`
--
ALTER TABLE `mhds`
  ADD CONSTRAINT `mhds_patientid_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ots`
--
ALTER TABLE `ots`
  ADD CONSTRAINT `ots_episode_id_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ots_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `hospital` FOREIGN KEY (`hospital`) REFERENCES `hospitals` (`hospital`) ON DELETE CASCADE,
  ADD CONSTRAINT `patients_hospital_foreign` FOREIGN KEY (`hospital`) REFERENCES `hospitals` (`hospital`) ON DELETE CASCADE;

--
-- Constraints for table `subsidydatas`
--
ALTER TABLE `subsidydatas`
  ADD CONSTRAINT `subsidydatas_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subsidydependents`
--
ALTER TABLE `subsidydependents`
  ADD CONSTRAINT `subsidydependents_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subsidydocs`
--
ALTER TABLE `subsidydocs`
  ADD CONSTRAINT `subsidydocs_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subsidys`
--
ALTER TABLE `subsidys`
  ADD CONSTRAINT `subsidys_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
