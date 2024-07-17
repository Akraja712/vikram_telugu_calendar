-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 12:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telugu_calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `abdhikam`
--

CREATE TABLE `abdhikam` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT '',
  `year` year(4) DEFAULT NULL,
  `text1` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abdhikam`
--

INSERT INTO `abdhikam` (`id`, `month`, `year`, `text1`) VALUES
(1, 'March', 2023, 'Hello Everone');

-- --------------------------------------------------------

--
-- Table structure for table `abdhikam_variant`
--

CREATE TABLE `abdhikam_variant` (
  `id` int(11) NOT NULL,
  `abdhikam_id` int(11) DEFAULT NULL,
  `date_month` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abdhikam_variant`
--

INSERT INTO `abdhikam_variant` (`id`, `abdhikam_id`, `date_month`, `description`) VALUES
(1, 1, '23,March', 'Reading is important for many reasons, such as learning new things'),
(2, 1, '24,March', 'Expanding the mind and boosting imagination. Many people also read for pleasure, which in turn can help the read...'),
(3, 1, '25,March', 'Many people also read for pleasure, which in turn can help the read...');

-- --------------------------------------------------------

--
-- Table structure for table `aksharalu`
--

CREATE TABLE `aksharalu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aksharalu`
--

INSERT INTO `aksharalu` (`id`, `title`, `description`) VALUES
(1, 'అచ్చులు', 'అ, ఆ, ఇ, ఈ, ఉ, ఊ, ఎ, ఏ, ఐ, ఒ, ఓ, ఔ,'),
(2, 'హల్లులు', 'క, ఖ, గ, ఘ, ఙ\r\nచ, ౘ, ఛ, జ, ౙ, ఝ, ఞ\r\nట, ఠ, డ, ఢ, ణ\r\nత, థ, ద, ధ, న\r\nప, ఫ, బ, భ, మ'),
(3, 'ఉభయాక్షరములు', 'సున్న - O\r\nఅరసున్న -  ఁ\r\nవిసర్గ -  ః\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ankelu`
--

CREATE TABLE `ankelu` (
  `id` int(11) NOT NULL,
  `title1` text DEFAULT NULL,
  `title2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ankelu`
--

INSERT INTO `ankelu` (`id`, `title1`, `title2`) VALUES
(1, '2', '౨'),
(2, '1', '౧');

-- --------------------------------------------------------

--
-- Table structure for table `audios`
--

CREATE TABLE `audios` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `lyrics` text DEFAULT NULL,
  `audio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audios`
--

INSERT INTO `audios` (`id`, `title`, `image`, `lyrics`, `audio`) VALUES
(3, 'Hanuman Chalisa', 'upload/audio/1665680859.4811.png', 'జయ హనుమాన జ్ఞాన గుణ సాగర ।\r\nజయ కపీశ తిహు లోక ఉజాగర ॥ 1 ॥\r\n\r\nరామదూత అతులిత బలధామా ।\r\nఅంజని పుత్ర పవనసుత నామా ॥ 2 ॥\r\n\r\nమహావీర విక్రమ బజరంగీ ।\r\nకుమతి నివార సుమతి కే సంగీ ॥3 ॥\r\n\r\nకంచన వరణ విరాజ సువేశా ।\r\nకానన కుండల కుంచిత కేశా ॥ 4 ॥\r\n\r\nహాథవజ్ర ఔ ధ్వజా విరాజై ।\r\nకాంథే మూంజ జనేవూ సాజై ॥ 5॥\r\n\r\nశంకర సువన కేసరీ నందన ।\r\nతేజ ప్రతాప మహాజగ వందన ॥ 6 ॥\r\n\r\nవిద్యావాన గుణీ అతి చాతుర ।\r\nరామ కాజ కరివే కో ఆతుర ॥ 7 ॥\r\n\r\nప్రభు చరిత్ర సునివే కో రసియా ।\r\nరామలఖన సీతా మన బసియా ॥ 8॥\r\n\r\nసూక్ష్మ రూపధరి సియహి దిఖావా ।\r\nవికట రూపధరి లంక జలావా ॥ 9 ॥\r\n\r\nభీమ రూపధరి అసుర సంహారే ।\r\nరామచంద్ర కే కాజ సంవారే ॥ 10 ॥\r\n\r\nలాయ సంజీవన లఖన జియాయే ।\r\nశ్రీ రఘువీర హరషి ఉరలాయే ॥ 11 ॥\r\n\r\nరఘుపతి కీన్హీ బహుత బడాయీ ।\r\nతుమ మమ ప్రియ భరత సమ భాయీ ॥ 12 ॥\r\n\r\nసహస్ర వదన తుమ్హరో యశగావై ।\r\nఅస కహి శ్రీపతి కంఠ లగావై ॥ 13 ॥\r\n\r\nసనకాదిక బ్రహ్మాది మునీశా ।\r\nనారద శారద సహిత అహీశా ॥ 14 ॥\r\n\r\nయమ కుబేర దిగపాల జహాం తే ।\r\nకవి కోవిద కహి సకే కహాం తే ॥ 15 ॥\r\n\r\nతుమ ఉపకార సుగ్రీవహి కీన్హా ।\r\nరామ మిలాయ రాజపద దీన్హా ॥ 16 ॥\r\n\r\nతుమ్హరో మంత్ర విభీషణ మానా ।\r\nలంకేశ్వర భయే సబ జగ జానా ॥ 17 ॥\r\n\r\nయుగ సహస్ర యోజన పర భానూ ।\r\nలీల్యో తాహి మధుర ఫల జానూ ॥ 18 ॥\r\n\r\nప్రభు ముద్రికా మేలి ముఖ మాహీ ।\r\nజలధి లాంఘి గయే అచరజ నాహీ ॥ 19 ॥\r\n\r\nదుర్గమ కాజ జగత కే జేతే ।\r\nసుగమ అనుగ్రహ తుమ్హరే తేతే ॥ 20 ॥\r\n\r\nరామ దుఆరే తుమ రఖవారే ।\r\nహోత న ఆజ్ఞా బిను పైసారే ॥ 21 ॥\r\n\r\nసబ సుఖ లహై తుమ్హారీ శరణా ।\r\nతుమ రక్షక కాహూ కో డర నా ॥ 22 ॥\r\n\r\nఆపన తేజ సమ్హారో ఆపై ।\r\nతీనోం లోక హాంక తే కాంపై ॥ 23 ॥\r\n\r\nభూత పిశాచ నికట నహి ఆవై ।\r\nమహవీర జబ నామ సునావై ॥ 24 ॥\r\n\r\nనాసై రోగ హరై సబ పీరా ।\r\nజపత నిరంతర హనుమత వీరా ॥ 25 ॥\r\n\r\nసంకట సే హనుమాన ఛుడావై ।\r\nమన క్రమ వచన ధ్యాన జో లావై ॥ 26 ॥\r\n\r\nసబ పర రామ తపస్వీ రాజా ।\r\nతినకే కాజ సకల తుమ సాజా ॥ 27 ॥\r\n\r\nఔర మనోరధ జో కోయి లావై ।\r\nతాసు అమిత జీవన ఫల పావై ॥ 28 ॥\r\n\r\nచారో యుగ ప్రతాప తుమ్హారా ।\r\nహై ప్రసిద్ధ జగత ఉజియారా ॥ 29 ॥\r\n\r\nసాధు సంత కే తుమ రఖవారే ।\r\nఅసుర నికందన రామ దులారే ॥ 30 ॥\r\n\r\nఅష్ఠసిద్ధి నవ నిధి కే దాతా ।\r\nఅస వర దీన్హ జానకీ మాతా ॥ 31 ॥\r\n\r\nరామ రసాయన తుమ్హారే పాసా ।\r\nసదా రహో రఘుపతి కే దాసా ॥ 32 ॥\r\n\r\nతుమ్హరే భజన రామకో పావై ।\r\nజన్మ జన్మ కే దుఖ బిసరావై ॥ 33 ॥\r\n\r\nఅంత కాల రఘుపతి పురజాయీ ।\r\nజహాం జన్మ హరిభక్త కహాయీ ॥ 34 ॥\r\n\r\nఔర దేవతా చిత్త న ధరయీ ।\r\nహనుమత సేయి సర్వ సుఖ కరయీ ॥ 35 ॥\r\n\r\nసంకట క(హ)టై మిటై సబ పీరా ।\r\nజో సుమిరై హనుమత బల వీరా ॥ 36 ॥\r\n\r\nజై జై జై హనుమాన గోసాయీ ।\r\nకృపా కరహు గురుదేవ కీ నాయీ ॥ 37 ॥\r\n\r\nజో శత వార పాఠ కర కోయీ ।\r\nఛూటహి బంది మహా సుఖ హోయీ ॥ 38 ॥\r\n\r\nజో యహ పడై హనుమాన చాలీసా ।\r\nహోయ సిద్ధి సాఖీ గౌరీశా ॥ 39 ॥\r\n\r\nతులసీదాస సదా హరి చేరా ।\r\nకీజై నాథ హృదయ మహ డేరా ॥ 40 ॥', 'upload/mp3/1665680655.8756.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `balli_sasthram`
--

CREATE TABLE `balli_sasthram` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `subtitle1` text DEFAULT NULL,
  `subdescription1a` text DEFAULT NULL,
  `subdescription1b` text DEFAULT NULL,
  `subtitle2` text DEFAULT NULL,
  `subdescription2a` text DEFAULT NULL,
  `subdescription2b` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balli_sasthram`
--

INSERT INTO `balli_sasthram` (`id`, `title`, `description`, `subtitle1`, `subdescription1a`, `subdescription1b`, `subtitle2`, `subdescription2a`, `subdescription2b`) VALUES
(1, 'బల్లి శాస్త్రం స్త్రీలకు', 'స్త్రీలు ఎక్కువగా వంటగదిలోనే ఉంటారు, బల్లులు కూడా అక్కడే ఎక్కువగా ఉంటాయి. దీని ఆధారంగా స్త్రీలపైనే బల్లి ఎక్కువగా పడే అవకాశం ఉంది. స్త్రీల శరీరం పై ఎక్కడ పడితే లాభం ఎక్కడ పడితే లాభం లాంటి విషయాలను తెలుసుకుందాం.', 'స్త్రీల శరీర భాగం', 'తలపై', 'కొప్పు పై', 'అశుభం', 'మరణ భయం', 'రోగాల భయం');

-- --------------------------------------------------------

--
-- Table structure for table `bhagawatham`
--

CREATE TABLE `bhagawatham` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhagawatham`
--

INSERT INTO `bhagawatham` (`id`, `title`) VALUES
(1, 'Bhagawatham Padhyalu'),
(2, 'Bhagawatham Animuthyamulu');

-- --------------------------------------------------------

--
-- Table structure for table `bhagawatham_menu`
--

CREATE TABLE `bhagawatham_menu` (
  `id` int(11) NOT NULL,
  `bhagawatham_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhagawatham_menu`
--

INSERT INTO `bhagawatham_menu` (`id`, `bhagawatham_id`, `title`) VALUES
(1, 1, 'Bhagawatham Part-1'),
(2, 1, 'Bhagawatham Part-2'),
(3, 2, 'Bhagawatham Part-3');

-- --------------------------------------------------------

--
-- Table structure for table `bhagawatham_submenu`
--

CREATE TABLE `bhagawatham_submenu` (
  `id` int(11) NOT NULL,
  `bhagawatham_id` int(11) DEFAULT 0,
  `bhagawatham_menu_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhagawatham_submenu`
--

INSERT INTO `bhagawatham_submenu` (`id`, `bhagawatham_id`, `bhagawatham_menu_id`, `title`, `description`) VALUES
(1, 1, 2, 'Shakthi', 'ఇరానియన్ కేలండెరు: ఇరాన్, ఆప్ఘనిస్తాన్ లలో ఉపయోగించబడుతుంది.\r\nహెబ్ర్యూ కేలండరు : ప్రపంచంలో వున్న యూదులు ఉపయోగిస్తారు.');

-- --------------------------------------------------------

--
-- Table structure for table `bhagawath_geetha`
--

CREATE TABLE `bhagawath_geetha` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhagawath_geetha`
--

INSERT INTO `bhagawath_geetha` (`id`, `title`) VALUES
(1, 'fgfgf');

-- --------------------------------------------------------

--
-- Table structure for table `bhagawath_geetha_menu`
--

CREATE TABLE `bhagawath_geetha_menu` (
  `id` int(11) NOT NULL,
  `bhagawath_geetha_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhagawath_geetha_menu`
--

INSERT INTO `bhagawath_geetha_menu` (`id`, `bhagawath_geetha_id`, `title`) VALUES
(1, 1, 'Jalabula');

-- --------------------------------------------------------

--
-- Table structure for table `bhagawath_geetha_submenu`
--

CREATE TABLE `bhagawath_geetha_submenu` (
  `id` int(11) NOT NULL,
  `bhagawath_geetha_id` int(11) DEFAULT 0,
  `bhagawath_geetha_menu_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhagawath_geetha_submenu`
--

INSERT INTO `bhagawath_geetha_submenu` (`id`, `bhagawath_geetha_id`, `bhagawath_geetha_menu_id`, `title`, `description`) VALUES
(1, 1, 1, 'Shakthi', 'పంజాబీ కేలండరు: విక్రమాదిత్యశకం నుండి వచ్చిన బిక్రమి కేలండరు ఆధారంగా రూపొందించబడి క్రీ.పూ 57 నుండి మొదలయింది.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `bhargava_panchangam`
--

CREATE TABLE `bhargava_panchangam` (
  `id` int(11) NOT NULL,
  `day` text DEFAULT '',
  `time` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhargava_panchangam`
--

INSERT INTO `bhargava_panchangam` (`id`, `day`, `time`, `description`) VALUES
(1, 'Wednesday', '08:00 - 08:24', 'It is one of the official scripts of the Indian Republic. The Telugu script is also widely used for writing Sanskrit texts');

-- --------------------------------------------------------

--
-- Table structure for table `bhargava_timeslots`
--

CREATE TABLE `bhargava_timeslots` (
  `id` int(11) NOT NULL,
  `time` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bhargava_timeslots`
--

INSERT INTO `bhargava_timeslots` (`id`, `time`) VALUES
(1, '06:00 - 06:24'),
(2, '06:24 - 06:48'),
(3, '06:48 - 07:12'),
(4, '07:12 - 07:36'),
(5, '07:36 - 08:00'),
(6, '08:00 - 08:24'),
(7, '08:24 - 08:48'),
(8, '08:48 - 09:12'),
(9, '09:12 - 09:36'),
(10, '09:36 - 10:00'),
(11, '10:00 - 10:24'),
(12, '10:24 - 10:48'),
(13, '10:48 - 11:12'),
(14, '11:12 - 11:36'),
(15, '11:36 - 12:00'),
(16, '12:00 - 12:24'),
(17, '12:24 - 12:48'),
(18, '12:48 - 01:12'),
(19, '01:12 - 01:36'),
(20, '01:36 - 02:00'),
(21, '02:00 - 02:24'),
(22, '02:24 - 02:48'),
(23, '02:48 - 03:12'),
(24, '03:12 - 03:36'),
(25, '03:36 - 04:00'),
(26, '04:00 - 04:24'),
(27, '04:24 - 04:48'),
(28, '04:48 - 05:12'),
(29, '05:12 - 05:36'),
(30, '05:36 - 06:00');

-- --------------------------------------------------------

--
-- Table structure for table `child_birth`
--

CREATE TABLE `child_birth` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT '',
  `year` year(4) DEFAULT NULL,
  `text1` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_birth`
--

INSERT INTO `child_birth` (`id`, `month`, `year`, `text1`) VALUES
(1, 'March', 2023, 'Hello Everone');

-- --------------------------------------------------------

--
-- Table structure for table `child_birth_variant`
--

CREATE TABLE `child_birth_variant` (
  `id` int(11) NOT NULL,
  `child_birth_id` int(11) DEFAULT NULL,
  `date_month` text DEFAULT '',
  `sub_title` text DEFAULT '',
  `sub_description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_birth_variant`
--

INSERT INTO `child_birth_variant` (`id`, `child_birth_id`, `date_month`, `sub_title`, `sub_description`) VALUES
(1, 1, '22,March', 'తెలుగు', 'తెలుగు అనేది ద్రావిడ భాషల కుటుంబానికి చెందిన భాష. దీనిని మాట్లాడే ప్రజలు ప్రధానంగా ఆంధ్ర, తెలంగాణాలో ఉన్నారు. ఇది ఆ రాష్ట్రాలలో అధికార భాష. భారతదేశంలో ఒకటి కంటే ఎక్కువ రాష్ట్రాల్లో ప్రాథమిక అధికారిక భాషా హోదా కలిగిన కొద్ది భాషలలో హిందీ, బెంగాలీలతో పాటు ఇది కూడా ఉంది.'),
(2, 1, '23,March', 'పేరు వ్యుత్పత్తి', 'మరొక కథనం ప్రకారం తెనుగు అనేది ప్రోటో-ద్రావిడ పదం *తెన్ (\"దక్షిణం\") [21] నుండి \"దక్షిణం/దక్షిణ దిశలో నివసించిన ప్రజలు\" (సంస్కృతం, ప్రాకృతం మాట్లాడే ప్రజలకు సంబంధించి) నుండి ఉద్భవించింది. తెలుగు అనే పేరు \"ఎన్\" నుండి \"ఎల్\" ప్రత్యామ్నాయం ఫలితంగా వచ్చింది. '),
(3, 1, '24,March', 'తెలుగులో టైప్ ', 'ఇన్‌పుట్ సాధనాలు వెబ్‌లో ఎక్కడైనా మీరు ఎంచుకునే భాషలో టైప్ చేయడాన్ని సులభం చేస్తాయి. మరింత తెలుసుకోండి\r\n\r\nదీన్ని ప్రయత్నించడానికి, దిగువ మీ భాషను మరియు ఇన్‌పుట్ సాధనాన్ని ఎంచుకుని, టైప్ చేయడాన్ని మొదలుపెట్టండి.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `daily_horoscope`
--

CREATE TABLE `daily_horoscope` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `rasi` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_horoscope`
--

INSERT INTO `daily_horoscope` (`id`, `date`, `rasi`, `description`) VALUES
(1, '2022-09-27', 'Mesham', 'అందమైన సున్నితము కమ్మని సువాసన, ఉన్న కాంతివంతమైన పూవు వలె, మీ ఆశ వికసిస్తుంది. ఈరోజు మీకు, బోలెడు ఆర్థిక పథకాలను ప్రెజెంట్ చేస్తారు. కమిట్ అయేముందుగా వాటి మంచి చెడ్డలను పరిశీలించండి. మీఛార్మింగ్ వ్యక్తిత్వం, ప్రవర్తన మీకు క్రొత్త స్నేహితులను పొందడానికి, సహాయ పడతాయి. మీరు కరెక్టే అనిచెప్పుకోడానికి మీజీవితభాగస్వామితో గొడవ పడతారు.అయినప్పటికీ మీ భాగస్వామి మిమ్ములను అర్ధంచేసుకుని మిమ్ములను సముదయిస్తారు. పెండింగ్ లో ఉన్న ప్రాజెక్ట్ లు, పథకాలు కదిలి ఫైనల్ షేప్ కి వస్తాయి. క్రొత్త ఆలోచనలను పరీక్షించడానికి సరియైన సమయం. మీరు ఈ రోజు మీ జీవిత భాగస్వామితో కలిసి మరోసారి ప్రేమలో పడనున్నారు. ఎందుకంటే ఆమె/అతను అందుకు పూర్తిగా అర్హులు.\r\n\r\n'),
(2, '2022-10-06', 'Mesham', 'మీరు యోగాతో,ధ్యానంతో రోజుని ప్రారంభించండి.ఇది మీకు చాలా అనుకూలిస్తుంది మరియు మీయొక్క శక్తిని రోజంతా ఉండేలా చేస్తుంది. ఇతరులకి వారి ఆర్ధికవసరాలకు అప్పు ఎవ్వరు ఇవ్వకపోయినప్పటికీ మీరు వారిఅవసరాలకు ధనాన్ని అప్పుగా ఇస్తారు. ఇతరులను మురిపించే మీ గుణం మెప్పును పొందే మీ సామర్థ్యం రివార్డ్ లను తెస్తుంది. బహుకాలంగా మిమ్మల్ని వేధిస్తున్న ఒంటరితనం మీ ఆత్మీయులు దొరకడంతో ముగింపుకి వస్తుంది. ఈరోజు మీ కళాదృష్టి, సృజనాత్మకత ఎంతో మెప్పును పొందుతుంది, ఎదురుచూడనన్ని రివార్డులను తెస్తుంది. ఈరాశికి చెందిన పిల్లలు రోజుమొత్తము ఆటలుఆడటానికి మక్కువ చూపుతారు.తల్లితండ్రులు వారిపట్ల జాగురూపకతతో వ్యవహరించాలి,లేనిచో వారికి దెబ్బలుతగిలే ప్రమాదం ఉన్నది. మీకో విషయం తెలుసా? మీ భాగస్వామి నిజమైన ఏంజెల్! నమ్మరా? కాస్త గమనించండి. ఈ రోజు మీకు ఈ వాస్తవం తెలిసిరావడం ఖాయం.\r\n\r\n'),
(3, '2023-03-15', 'Mesham', 'మిమ్మల్ని ప్రశాంతంగా, కూల్ గా ఉంచగల పనులలో నిమగ్నమవండి. చిరకాలంగా వసూలవని బాకీలు వసూలు కావడం వలన ఆర్థిక పరిస్థితి మెరుగుపడుతుంది. మిత్రులతో గడిపే సాయంత్రాలు, లేదా షాపింగ్ ఎక్కువ సంతోషదాయకమే కాక ఉద్వేగభరిత ఉత్సాహాన్ని ఇస్తాయి. ప్రతిరోజూ ప్రేమలో పడడం అనే స్వభావాన్ని మార్చుకొండి. మీరూపురేఖలను, వ్యక్తిత్వాన్ని, మెరుగు పరుచుకోవడానికి, చేసిన పరిశ్రమ మీకు సంతృప్తిని కలిగిస్తుంది. వైవాహిక జీవితంలో క్లిష్టతరమైన దశ తర్వాత ఈ రోజు మీకు కాస్త ఉపశమనాన్ని కలిగిస్తుంది. మీరు ఈరోజు అన్నిభాదలను మర్చిపోతారు,సృజనాత్మకంగా ఆలోచించటానికి ప్రయత్నిస్తారు.'),
(4, '2023-03-17', 'Karkatakam', 'zbfn');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `day` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `festival` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`id`, `date`, `festival`) VALUES
(1, '2022-09-07', 'Diwali'),
(2, '2022-10-08', 'Pongal'),
(3, '2022-10-10', 'pooja'),
(4, '2022-09-22', 'Festival \r\nfestival\r\nfestival\r\nfestival\r\nfestivalfestival\r\nfestival\r\nfestival\r\nfestival\r\n'),
(5, '2022-09-22', 'Festival '),
(6, '2022-09-23', 'Festival '),
(7, '2022-09-24', 'Festival '),
(8, '2022-09-25', 'Festival '),
(9, '2022-09-26', 'Festival '),
(10, '2022-09-27', 'Festival '),
(11, '2022-09-28', 'Festival '),
(12, '2022-09-29', 'Festival '),
(13, '2022-09-22', 'Festival ');

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `title`, `description`) VALUES
(1, 'ఆపిల్', 'Every NIGHT eat one apple before sleep');

-- --------------------------------------------------------

--
-- Table structure for table `gowri`
--

CREATE TABLE `gowri` (
  `id` int(11) NOT NULL,
  `day` text DEFAULT '\'\'',
  `time` text DEFAULT NULL,
  `morning` text DEFAULT '',
  `night` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gowri`
--

INSERT INTO `gowri` (`id`, `day`, `time`, `morning`, `night`) VALUES
(1, 'Tuesday', '07:30-09:00', 'This is your test', 'Hello Test');

-- --------------------------------------------------------

--
-- Table structure for table `gowri_timeslots`
--

CREATE TABLE `gowri_timeslots` (
  `id` int(11) NOT NULL,
  `time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gowri_timeslots`
--

INSERT INTO `gowri_timeslots` (`id`, `time`) VALUES
(1, '06:00 - 07:30'),
(2, '07:30 - 09:00'),
(3, '09:00 - 10:30'),
(4, '10:30 - 12:00'),
(5, '12:00 - 01:30'),
(6, '01:30 - 03:00'),
(7, '03:00 - 04:30'),
(8, '04:30 - 06:00');

-- --------------------------------------------------------

--
-- Table structure for table `grahalu`
--

CREATE TABLE `grahalu` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grahalu`
--

INSERT INTO `grahalu` (`id`, `name`, `image`) VALUES
(1, 'Grahalu', 'upload/grahalu/7838-2022-10-06.jpg'),
(2, 'Nakshatharalu', 'upload/grahalu/0109-2022-10-09.jpg'),
(3, 'Rudhraksha', 'upload/grahalu/3675-2022-10-09.png'),
(4, 'Nakshathralu  Vrukshalu', 'upload/grahalu/3130-2022-10-09.jpg'),
(5, 'నక్షత్ర గాయత్రి మంత్రాలు', 'upload/grahalu/4256-2022-10-09.jpg'),
(6, 'Janma Thedhilu Batti Rudhraksha', 'upload/grahalu/4603-2022-10-09.jpg'),
(7, 'Janma Nakshathram Dharincha valsina Rudhrasha', 'upload/grahalu/7666-2022-10-09.png'),
(8, ' Navarathnalu Dharinchalsina Nakshthramulu', 'upload/grahalu/0897-2022-10-09.png');

-- --------------------------------------------------------

--
-- Table structure for table `grahalu_submenu`
--

CREATE TABLE `grahalu_submenu` (
  `id` int(11) NOT NULL,
  `grahalu_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grahalu_submenu`
--

INSERT INTO `grahalu_submenu` (`id`, `grahalu_id`, `name`, `image`) VALUES
(1, 1, 'Nakshathramulu', 'upload/grahalu_submenu/1665054820.3623.jpg'),
(2, 1, 'Grahalu', 'upload/grahalu_submenu/4550-2022-10-06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `grahalu_tab`
--

CREATE TABLE `grahalu_tab` (
  `id` int(11) NOT NULL,
  `grahalu_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grahalu_tab`
--

INSERT INTO `grahalu_tab` (`id`, `grahalu_id`, `subcategory_id`, `title`, `description`) VALUES
(1, 1, 2, 'నవగ్రహాలు', 'హిందూమతంలో,ఆచారాలలో నవగ్రహాలు లేదా తొమ్మిది గ్రహాలకు చాలా ప్రాముఖ్యత ఉంది. నవగ్రహాలు ప్రతి వ్యక్తి యొక్క జీవితాన్ని నిర్ణయించటంలో ప్రధాన పాత్ర పోషిస్తాయని నమ్ముతారు… హిందూమతంలో,ఆచారాలలో నవగ్రహాలు లేదా తొమ్మిది గ్రహాలకు చాలా ప్రాముఖ్యత ఉంది. నవగ్రహాలు ప్రతి వ్యక్తి యొక్క జీవితాన్ని నిర్ణయించటంలో ప్రధాన పాత్ర పోషిస్తాయని నమ్ముతారు. ఈ నవగ్రహాలు సూర్యుడు, చంద్రుడు, మంగళ ( కుజుడు), బుధుడు, బృహస్పతి(గురుగ్రహం), శుక్ర (శుక్రుడు) ,శని, రాహువు (ఉత్తర మరుగుజ్జు బిలం) మరియు కేతువు(దక్షిణ మరుగుజ్జు బిలం). ఈ తొమ్మిది గ్రహాలు మనుషుల జీవితాలను నియంత్రిస్తాయని, జీవితంలో ఎదుర్కొనే మంచి చెడులను నిర్ణయిస్తాయని నమ్ముతారు.');

-- --------------------------------------------------------

--
-- Table structure for table `grahalu_tab_variant`
--

CREATE TABLE `grahalu_tab_variant` (
  `id` int(11) NOT NULL,
  `grahalu_tab_id` int(11) DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `sub_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grahalu_tab_variant`
--

INSERT INTO `grahalu_tab_variant` (`id`, `grahalu_tab_id`, `sub_title`, `sub_description`) VALUES
(1, 1, 'సూర్యుడు ', 'తూర్పువైపు తిరిగి ఉండే నవగ్రహాలలో సూర్యుడు మధ్య స్థానంలో ఉంటాడు. రవి అని కూడా పిలవబడే సూర్యుడు సింహరాశికి అధిదేవుడు. సూర్యుడి వాహనం ఏడు గుర్రాలు నడిపే రథం. ఈ ఏడు గుర్రాలు ఇంద్రధనుస్సులోని రంగులు (తెల్లటి కాంతిలోని ఏడురంగులు) మరియు వారంలో ఏడురోజులకు ప్రతీక. ఆయన రోజు రవివారం లేదా ఆదివారం, రంగు ఎరుపు మరియు రత్నం కెంపు. మంచి ఆరోగ్యకరమైన జీవితానికి సూర్యనమస్కారాలు చేయటం మంచిది. ఒరిస్సాలోని కోణార్క్ ఆలయం మరియు తమిళనాడులోని కుంభకోణం వద్దనున్న సూర్యనార్ కోవిల్ సూర్యుడికి సంబంధించి దేశంలో రెండు ముఖ్య ఆలయాలు.\r\n'),
(3, 1, 'కుజుడు', 'అంగారకుడుగా కూడా పిలవబడే మంగళ దేవుడు నాలుగు చేతులతో ఉగ్రంగా కన్పించే దేవత. ఈయనను పృథ్వీ లేదా భూమికి కొడుకుగా భావిస్తారు. కుజగ్రహాన్ని వేడిగా ఉండే గ్రహంగా మరియు ధర్మానికి రక్షకుడిగా భావిస్తారు. ఆయన తన రెండు చేతులలో ఆయుధాలతో మరియు మరో రెండు చేతులు అభయ, వరద ముద్రలు కలిగి ఉంటాయి. మేషరాశి (మేదం) మరియు వృశ్చిక రాశులు(వృశ్చిగం)(ఏరిస్ మరియు స్కార్పియో రాశులు) మంగళ లేదా కుజ గ్రహం ఆధీనంలో ఉంటాయి. ఆయన కండరాల వ్యవస్థ, ముక్కు, నుదురు, రక్తప్రసరణ వ్యవస్థలను నియంత్రిస్తాడు. అతని వాహనం ర్యామ్ (ఒక రకమైన గొర్రె) మరియు రంగు ఎరుపు. వారం మంగళవారం మరియు రత్నం పగడం. తమిళనాడులోని సిర్కఝి వద్ద నున్న పుల్లిరుక్కువేలూర్ వైదీశ్వరన్ కోయిల్ కుజ గ్రహానికి చెందిన ప్రముఖ ఆలయాలలో ఒకటి.');

-- --------------------------------------------------------

--
-- Table structure for table `grahanam`
--

CREATE TABLE `grahanam` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grahanam`
--

INSERT INTO `grahanam` (`id`, `title`, `description`) VALUES
(1, 'Everyone Likes this', ' The journey had begun several days earlier, when on July 16th, the Apollo 11 launched from Earth headed into outer space');

-- --------------------------------------------------------

--
-- Table structure for table `guninthalu`
--

CREATE TABLE `guninthalu` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guninthalu`
--

INSERT INTO `guninthalu` (`id`, `description`) VALUES
(1, 'క, కా,కి, కీ, కు, క, కృ, కౄ, కె, కే, కై, కొ, కో, కౌ, కం, కః\r\nఖ, ఖా, ఖి, ఖీ, ఖు, ఖూ, ఖృ, ఖౄ, ఖె, ఖే, ఖై, ఖొ, ఖో, ఖౌ, ఖం, ఖః\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT '',
  `year` year(4) DEFAULT NULL,
  `title` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hora_chakram`
--

CREATE TABLE `hora_chakram` (
  `id` int(11) NOT NULL,
  `day` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `morning` text DEFAULT '',
  `night` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hora_chakram`
--

INSERT INTO `hora_chakram` (`id`, `day`, `time`, `morning`, `night`) VALUES
(1, 'Thursday', '08:00 - 09:00', '2024', 'This is hora chjakram'),
(2, 'Thursday', '11:00 - 12:00', 'Rajathi rajs', 'dsdsdsdsds');

-- --------------------------------------------------------

--
-- Table structure for table `hora_timeslots`
--

CREATE TABLE `hora_timeslots` (
  `id` int(11) NOT NULL,
  `time` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hora_timeslots`
--

INSERT INTO `hora_timeslots` (`id`, `time`) VALUES
(1, '06:00 - 07:00'),
(2, '07:00 - 08:00'),
(3, '08:00 - 09:00'),
(4, '09:00 - 10:00'),
(5, '10:00 - 11:00'),
(6, '11:00 - 12:00'),
(7, '12:00 - 01:00'),
(8, '01:00 - 02:00'),
(9, '02:00 - 03:00'),
(10, '03:00 - 04:00'),
(11, '04:00 - 05:00'),
(12, '05:00 - 06:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_category_id`, `name`, `image`, `status`) VALUES
(1, 13, 'Lord Siva', 'upload/images/siva1.jpeg', 0),
(2, 13, 'Kailasa', 'upload/images/siva2.jpg', 0),
(3, 15, 'Hanuman Good Morning', 'upload/images/3437-2022-10-18.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_category`
--

CREATE TABLE `image_category` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_category`
--

INSERT INTO `image_category` (`id`, `name`, `image`, `status`, `last_updated`, `date_created`) VALUES
(13, 'Sivan', 'upload/images/siva.jpg', NULL, NULL, NULL),
(14, 'Murugan', 'upload/images/murugan.jpg', NULL, NULL, NULL),
(15, 'Good Morning', 'upload/images/3379-2022-10-18.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `important_days`
--

CREATE TABLE `important_days` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT '',
  `year` year(4) DEFAULT NULL,
  `title` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kaki_sasthram`
--

CREATE TABLE `kaki_sasthram` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kaki_sasthram`
--

INSERT INTO `kaki_sasthram` (`id`, `title`, `description`) VALUES
(1, 'కాకి శాస్త్రం', 'కాకి తన్నితే అశుభం అంటారు. కాకి ఇంటి ముందు వచ్చి అరుస్తే చుట్టాలు వస్తారని అంటారు. ఇలా కాకి మన దగ్గరికి వచ్చి చేసే పనుల వల్ల శుభాలు, అశుభాలు జరుగుతాయని శాస్త్రం చెబుతుంది.\r\nఇలాంటి కాకి శాస్త్రాన్ని గతంలో మన పూర్వీకులు, పెద్దలు చదివేవారు. ప్రస్తుతం ఈ కాకి శాస్త్రాన్ని ఎవరూ పట్టించుకోవడం లేదు. అయితే ముందుజాగ్రత్తగా కాకి శాస్త్రం గురించి తెలుసుకోవడం ఎంతకైనా మంచిదే.'),
(2, 'అతిథి రాకకు సంకేతం', 'ఇంటి ముందు కాకులు వచ్చి గట్టిగా అరిస్తే.. మరికొంత సేపట్లో ఇంటికి బంధువులు రాబోతున్నారని పెద్దలు చెప్పేవారు. ఇది ఎన్ని సార్లు నిజమైందో గమనించిన వారికే తెలియాలి.'),
(3, 'సంతానం', 'పెళ్లి భోజనంలో ఉన్న స్వీట్లను కాకి తన ముక్కుతో పట్టుకొని లటుక్కున ఎగిరిపోతే ఆ పెళ్లి చేసుకున్న జంటకు త్వరలోనే పండండి అందమైన బిడ్డ జన్మించనుందని శాస్త్రం చెబుతుంది.\r\n\r\n'),
(4, 'లక్ష్మీ అనుగ్రహం ఉంటుంది ', 'ఎవరి ఇంట్లోనైనా నీటితో ఉన్న కుండపో వాలితే ఆ ఇంటికి త్వరలోనే లక్ష్మీదేవి రాబోతోందని, అంటే సంపద మెండుగా లభించనుందని అర్ధం.\r\n\r\n'),
(5, 'డబ్బుకు కొరత ఉండదు', 'ప్రతీ రోజూ కాకికి ఆహారం పెడితే ఐశ్వర్యం లభిస్తుందని. ఆ ఇంటికి ఎప్పుడూ మంచి జరుగుతుందని సూచన.\r\n\r\n'),
(6, 'అందమైన భార్య', 'కాకి నోటినుంచి తెలుపు లేదా పసుపు రంగు స్వీట్స్ జారిపడి మీద పడితే అతనికి త్వరలో ఓ అందమైన అమ్మాయితో వివాహం జరగబోతోందని శాస్త్రం చెబుతుంది.\r\n\r\n'),
(7, 'త్వరలో పనులు విజయవంతమవుతాయి', 'మీరు ఏదైనా పని పూర్తి చేయడానికి వెళ్లేటప్పుడుు కాకి దక్షిణం నుంచి ఉత్తరం వైపు, లేదా తూర్పు నుంచి పడమర వైపుకు ముక్కుతో స్వీట్స్ పట్టుకొని వెళ్తంటే మీ పని త్వరలో విజయవంతంగా పూర్తవుతుందని సంకేతం.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kalalu`
--

CREATE TABLE `kalalu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kalalu`
--

INSERT INTO `kalalu` (`id`, `title`, `description`) VALUES
(1, 'భారతీయ సంస్కృతిలో 64 కళలు', 'మన భారతీయ సంస్కృతిలో 64 కళలు లేక విద్యలు ఉన్నాయని మనకు తెలుసు , అవేమిటో ఇప్పుడు చూద్దాం. మొదట 64 విద్యలను తెలియజేసే శ్లోకం\r\n'),
(2, 'వేదములు', 'ఋగ్వేదము, యజుర్వేదము , సామవేదము , అధర్వణ వేదము అనేవి మనకు నాలుగు వేదాలు\r\n'),
(3, 'వేదాంగములు', 'వేదములకు సంబంధించిన ఆరు శాస్త్రములు (1. శిక్షలు 2. వ్యాకరణము 3. ఛందస్సు 4. జ్యోతిషము 5. నిరుక్తము 6. కల్పములు అని ఆరు వేదాంగములు ( శాస్త్రములు )\r\n'),
(4, 'ఇతిహాసములు', 'రామాయణ , మహాభారత , భాగవతం పురాణాదులు.');

-- --------------------------------------------------------

--
-- Table structure for table `karanam`
--

CREATE TABLE `karanam` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karanam`
--

INSERT INTO `karanam` (`id`, `description`) VALUES
(4, 'భారతీయ క్రీడాకారిణి. శ్రీకాకుళానికి చెందిన వెయిట్‌ లిఫ్టింగ్‌ క్రీడాకారిణి. ఆమె 2000 సిడ్నీ ఒలింపిక్ పతకం సాధించి ప్రసిద్ధురాలయ్యింది. 2000 సంవత్సరంలో జరిగిన సిడ్నీ ఒలంపిక్స్ లో ఈమె వెయిట్ లిఫ్టింగ్ విభాగంలో భారతదేశం తరపున కాంస్య పతకం సాధించింది.\r\n\r\nబీబీసీ శతవసంతాల ఏడాది సందర్భంగా 2022 మార్చి మాసంలో కరణం మల్లీశ్వరికి ‘బీబీసీ లైఫ్‌ టైమ్‌ అచీవ్‌మెంట్‌ (జీవన సాఫల్యం)’ అవార్డు ప్రకటించారు.');

-- --------------------------------------------------------

--
-- Table structure for table `karthi_vrusti`
--

CREATE TABLE `karthi_vrusti` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT '',
  `year` year(4) DEFAULT NULL,
  `text1` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karthi_vrusti`
--

INSERT INTO `karthi_vrusti` (`id`, `month`, `year`, `text1`) VALUES
(2, 'March', 2023, 'TEHNAD');

-- --------------------------------------------------------

--
-- Table structure for table `karthi_vrusti_variant`
--

CREATE TABLE `karthi_vrusti_variant` (
  `id` int(11) NOT NULL,
  `karthi_vrusti_id` int(11) DEFAULT NULL,
  `date_month` text DEFAULT '',
  `karthi` text DEFAULT '',
  `nakshathram` text DEFAULT '',
  `pravesham` text DEFAULT '',
  `rashi` text DEFAULT '',
  `ganam` text DEFAULT '',
  `karthi_result` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karthi_vrusti_variant`
--

INSERT INTO `karthi_vrusti_variant` (`id`, `karthi_vrusti_id`, `date_month`, `karthi`, `nakshathram`, `pravesham`, `rashi`, `ganam`, `karthi_result`) VALUES
(1, 2, '20,March', 'hcjcjv', 'cfwf', 'grwgg', 'grgr', 'r3rr', 'oyuyt'),
(2, 2, '21,March', 'gtth', '6u77i7', '8o8o8', 'bhtyj', 'yuuku', 'jyjuk');

-- --------------------------------------------------------

--
-- Table structure for table `kolathalu`
--

CREATE TABLE `kolathalu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `subtitle1` text DEFAULT NULL,
  `subdescription1` text DEFAULT NULL,
  `subtitle2` text DEFAULT NULL,
  `subdescription2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kolathalu`
--

INSERT INTO `kolathalu` (`id`, `title`, `subtitle1`, `subdescription1`, `subtitle2`, `subdescription2`) VALUES
(1, 'కాలం కాలమానాలు', 'సెకను', 'అతి చిన్న ప్రమాణం', '1000 సంవత్సరాలు', 'శత వర్షం లేదా శతాబ్దం'),
(2, 'కాలం తెలుగు కాలమానం', '60 పలంలు', '3 ఋతువులు లేదా 6 నెలలు', 'ఝాము', '1 సెకనులో 34,000వ వంతు');

-- --------------------------------------------------------

--
-- Table structure for table `kukutasasthram_menu`
--

CREATE TABLE `kukutasasthram_menu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `star` text DEFAULT NULL,
  `winning` text DEFAULT NULL,
  `lossing` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kukutasasthram_menu`
--

INSERT INTO `kukutasasthram_menu` (`id`, `title`, `description`, `star`, `winning`, `lossing`) VALUES
(1, 'కోడి పుంజులు, రకాలు', 'కోడి పుంజులు చాలా రకాలుంటాయి, అయితే వాటిని పలు రకాలుగా ఈ కుక్కుట శాస్త్రం విభజించింది. ఈకల రంగుని బట్టి కుక్కుట శాస్త్రం కోడిపుంజు రకాలను, జాతులను చెబెతుంది.', 'five star', 'you can win you can win you can win ', 'you can loss you can loss you can loss');

-- --------------------------------------------------------

--
-- Table structure for table `kukuta_sasthram`
--

CREATE TABLE `kukuta_sasthram` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kukuta_sasthram`
--

INSERT INTO `kukuta_sasthram` (`id`, `title`, `description`) VALUES
(1, 'కుక్కుట శాస్త్రం', 'కుక్కుట శాస్త్రం అంటే ఏంటి అనుకుంటున్నారా..? మనుషులకు పంచాంగ శాస్త్రం ఉన్నట్టే, కోళ్లకు కూడా ప్రత్యేక పంచాంగ శాస్త్రం ఉంది దాన్నే కుక్కుట శాస్త్రం అంటారు. కోడి పందాల్లో పందెకాసేవాళ్లకు ఈ కుక్కుట శాస్త్రం ఒక ఆయుధం లాంటిది. యుద్ధానికి భగవద్గీతలాగా, కోళ్ల పందాలకు ఈ కుక్కుట శాస్త్రం అని చెప్పుకోవచ్చు. ఈ కుక్కుట శాస్త్రం గురించి మరిన్న విషయాలను ఈ ఆర్టికల్ లో మీకు వివరిస్తాము.');

-- --------------------------------------------------------

--
-- Table structure for table `lagnam`
--

CREATE TABLE `lagnam` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lagnam`
--

INSERT INTO `lagnam` (`id`, `title`, `description`) VALUES
(1, 'లగ్నం', 'జ్యోతిష శాస్త్రంలో లగ్నం ప్రధాన మైనది. లగ్నం శిశువు పుట్టిన సమయాన్ని ఆధారంగా చేసుకుని నిర్ణయించ బడుతుంది. ఒక రాత్రి ఒక పగటి సమయంలో మొత్తం పన్నెండు లగ్నాలు ఆవృత్తం ఔతాయి. సాధారణంగా సూర్యుడు మేషరాశి ప్రవేశ కాలం అయిన మేష సంక్రాంతి నుండి ఉదయకాలమున మేష లగ్నంతో ప్రారంభం ఔతాయి. ఒక లగ్న కాలం రెండున్నర ఘడియలు. ప్రస్తుత కాలంలో రెండు గంటల సమయం. అంటే నూట ఇరవై నిముషాలు. '),
(2, 'లగ్నలు', 'చైత్రము\r\nవైశాఖము\r\nజ్యేష్ఠము\r\nఆషాఢము\r\nశ్రావణము\r\nభాద్రపదము\r\nఆశ్వీయుజము\r\nకార్తీకము\r\nమార్గశిరము\r\nపుష్యము\r\nమాఘము\r\nఫాల్గుణము');

-- --------------------------------------------------------

--
-- Table structure for table `mahabharatham`
--

CREATE TABLE `mahabharatham` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahabharatham`
--

INSERT INTO `mahabharatham` (`id`, `title`) VALUES
(1, 'మహా భారతం గురించి'),
(2, '1. అది పర్వం ( 26 )');

-- --------------------------------------------------------

--
-- Table structure for table `mahabharatham_menu`
--

CREATE TABLE `mahabharatham_menu` (
  `id` int(11) NOT NULL,
  `mahabharatham_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahabharatham_menu`
--

INSERT INTO `mahabharatham_menu` (`id`, `mahabharatham_id`, `title`) VALUES
(1, 1, 'ఇతిహాస కవులు');

-- --------------------------------------------------------

--
-- Table structure for table `mahabharatham_submenu`
--

CREATE TABLE `mahabharatham_submenu` (
  `id` int(11) NOT NULL,
  `mahabharatham_id` int(11) DEFAULT 0,
  `mahabharatham_menu_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahabharatham_submenu`
--

INSERT INTO `mahabharatham_submenu` (`id`, `mahabharatham_id`, `mahabharatham_menu_id`, `title`, `description`) VALUES
(1, 1, 1, 'ఇతిహాస కవులు ', 'తెలుగు అనువాదం, అర్థం, నిర్వచనం, వివరణ మరియు సంబంధిత పదాలు మరియు ఫోటో ఉదాహరణలు - మీరు ఇక్కడ చదువుకోవచ్చు.');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_horoscope`
--

CREATE TABLE `monthly_horoscope` (
  `id` int(11) NOT NULL,
  `rasi` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `month` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monthly_horoscope`
--

INSERT INTO `monthly_horoscope` (`id`, `rasi`, `year`, `month`, `description`) VALUES
(1, 'Mesham', 2023, 'March', 'స్థానికులు సహజంగా జన్మించిన నాయకులు, మరియు ఈ నెల వారి నాయకత్వ నాణ్యతను పెంపొందించడం ద్వారా వారి కెరీర్‌లో విజయాన్ని అందిస్తుంది. ఒక వైపు, పని చేసే ఉద్యోగులు మిశ్రమ ఫలితాలను పొందుతారు, మరోవైపు, మేషం వ్యాపారులు తమ వ్యాపారాన్ని విస్తరించడం ద్వారా లాభాలను పొందుతారు. మేషరాశి వ్యాపారులు విదేశీ కంపెనీల నుండి కూడా లాభపడవచ్చు.ఐదవ ఇంట్లో సూర్యుడు మరియు శుక్రుడు కలయిక ఈ నెలలో మేషరాశి విద్యార్థులకు అనుకూలమైన ఫలితాలను ఇస్తుంది.నెల మొదటి అర్ధ భాగంలో పరీక్షలలో బాగా రాణిస్తారు. మీరు మీ ఉపాధ్యాయుల మద్దతును పొందుతారు మరియు మీ అన్ని ప్రాజెక్ట్‌లు మరియు సిలబస్‌లను సమయానికి పూర్తి చేస్తారు.ప్రేమికులకు ఈ మాసం బాగానే ఉంటుంది. ఐదవ ఇంట్లో సూర్యుడితో శుక్రుడు ఉండటం వల్ల సంబంధంలో ప్రేమ పెరుగుతుంది, కానీ సూర్యుడు మీ స్వభావాన్ని చేదుగా మారుస్తాడు, దీని కారణంగా మీ ప్రియమైనవారితో విభేదాలు తలెత్తవచ్చు. వివాహిత స్థానికులకు, కేతువు ఉనికిని మీ జీవిత భాగస్వామితో వాగ్వాదానికి గురి చేస్తుంది. ఈ సమయంలో మీరు మీ కోపాన్ని అదుపులో ఉంచుకోవడానికి ప్రయత్నించాలి మరియు మీ జీవిత భాగస్వామి కోసం కొంత సమయాన్ని వెచ్చించండి.కుటుంబ జీవితం పరంగా మేష రాశి వారికి సెప్టెంబర్ మంచి నెలగా ఉంటుంది.కుటుంబ సభ్యులతో మీ పూర్వపు విభేదాలన్నింటినీ ముగించడానికి మరియు వారితో మీ సంబంధాన్ని బలోపేతం చేయడానికి ఇది ఒక సమయం.మీరు విహారయాత్రకు వెళ్లడం ద్వారా మీ కుటుంబంతో సమయాన్ని గడపాలని కూడా ప్లాన్ చేయవచ్చు.మేష రాశి వారు ఈ నెలలో ఆర్థిక పరంగా కూడా అదృష్టవంతులు. మీ రెండవ ఇంట్లో అంగారకుడు ఉండటం వల్ల, మీరు ఎక్కడి నుండైనా అకస్మాత్తుగా డబ్బు అందుకోవచ్చు. మీ డబ్బు ఎక్కడైనా నిలిచిపోయి ఉంటే, మీరు ఈ నెలలో దాన్ని తిరిగి పొందుతారు. అయితే, ఆరోగ్యం యొక్క దృక్కోణం నుండి ఈ నెల తక్కువ అనుకూలంగా ఉంటుంది. వివిధ గ్రహాల యొక్క అశుభ స్థానం మీరు గాయపడగల పరిస్థితిని సూచిస్తుంది. దీనితో పాటు, మారుతున్న వాతావరణంతో మీ ఆరోగ్యం క్షీణించవచ్చు. కాబట్టి వీలైనంత వరకు మీ ఆహారపు అలవాట్లను జాగ్రత్తగా చూసుకోండి.');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `month_festivals`
--

CREATE TABLE `month_festivals` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT '',
  `year` year(4) DEFAULT NULL,
  `title` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month_panchangam`
--

CREATE TABLE `month_panchangam` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT '',
  `year` text DEFAULT '',
  `text1` text DEFAULT NULL,
  `pournami` text DEFAULT NULL,
  `amavasya` text DEFAULT NULL,
  `akadhashi` text DEFAULT NULL,
  `pradhosha` text DEFAULT NULL,
  `shasti` text DEFAULT NULL,
  `chavithi` text DEFAULT NULL,
  `masa_shiva_Rathri` text DEFAULT NULL,
  `sankatahara_chathurdhi` text DEFAULT NULL,
  `festivals` text DEFAULT NULL,
  `holiday` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `month_panchangam`
--

INSERT INTO `month_panchangam` (`id`, `month`, `year`, `text1`, `pournami`, `amavasya`, `akadhashi`, `pradhosha`, `shasti`, `chavithi`, `masa_shiva_Rathri`, `sankatahara_chathurdhi`, `festivals`, `holiday`) VALUES
(1, 'February', '2022', 'DIVAKAR', 'dwd', 'scvadfv', 'eveae', 'efeafqf', 'dgrgqg', 'b nv h', 'fbfbb', '.;oikfyjt', 'Ramjan,Holi,nxahxhi', 'Ramjan\r\nSecond Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `moudya_dhinam`
--

CREATE TABLE `moudya_dhinam` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moudya_dhinam`
--

INSERT INTO `moudya_dhinam` (`id`, `title`, `description`) VALUES
(1, 'This Desers', 'Sunset is the time of day when our sky meets the outer space solar winds. There are blue, pink, and purple swirls, spinning and twisting, like clouds of balloons caught in a whirlwind.');

-- --------------------------------------------------------

--
-- Table structure for table `muhurtham`
--

CREATE TABLE `muhurtham` (
  `id` int(11) NOT NULL,
  `muhurtham` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muhurtham`
--

INSERT INTO `muhurtham` (`id`, `muhurtham`) VALUES
(2, 'Vehicle Muhurtham'),
(3, 'Vivaha Muhurtham');

-- --------------------------------------------------------

--
-- Table structure for table `muhurtham_tab`
--

CREATE TABLE `muhurtham_tab` (
  `id` int(11) NOT NULL,
  `muhurtham_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muhurtham_tab`
--

INSERT INTO `muhurtham_tab` (`id`, `muhurtham_id`, `title`, `description`) VALUES
(3, 3, 'Hello Tamil', 'Every Second is gives a Hour');

-- --------------------------------------------------------

--
-- Table structure for table `nakshatralu`
--

CREATE TABLE `nakshatralu` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nakshatralu`
--

INSERT INTO `nakshatralu` (`id`, `name`, `image`) VALUES
(1, 'kadaga nakshahra', 'upload/nakshatralu/5585-2022-10-08.jpg'),
(3, 'dsds', 'upload/nakshatralu/0536-2022-10-09.jpg'),
(4, 'vrukhi', 'upload/nakshatralu/2979-2022-10-09.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nakshatralu_tab`
--

CREATE TABLE `nakshatralu_tab` (
  `id` int(11) NOT NULL,
  `nakshatralu_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nakshatralu_tab`
--

INSERT INTO `nakshatralu_tab` (`id`, `nakshatralu_id`, `title`, `description`) VALUES
(1, 1, 'hello', 'this is main of nakshatralu');

-- --------------------------------------------------------

--
-- Table structure for table `nakshatralu_tab_variant`
--

CREATE TABLE `nakshatralu_tab_variant` (
  `id` int(11) NOT NULL,
  `nakshatralu_tab_id` int(11) DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `sub_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nakshatralu_tab_variant`
--

INSERT INTO `nakshatralu_tab_variant` (`id`, `nakshatralu_tab_id`, `sub_title`, `sub_description`) VALUES
(1, 1, 'welcome', 'this is bchfhh'),
(3, 1, 'hixhx', 'x wjx');

-- --------------------------------------------------------

--
-- Table structure for table `navagrahalu`
--

CREATE TABLE `navagrahalu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navagrahalu`
--

INSERT INTO `navagrahalu` (`id`, `title`, `description`) VALUES
(1, 'సూర్యుడు', 'ఆత్మ, రాజయోగం, పదోన్నతి, పితృయోగం.'),
(2, 'చంద్రుడు', 'మనసు, రాణి యోగం, మాతృత్వం.'),
(3, 'కుజుడు', 'శక్తి, విశ్వాసం, అహంకారం\r\n'),
(4, 'బుధుడు', 'వ్యవహార నైపుణ్యం'),
(5, 'గురుడు', 'విద్యా బోధన\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `nava_grahams`
--

CREATE TABLE `nava_grahams` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nava_grahams`
--

INSERT INTO `nava_grahams` (`id`, `name`) VALUES
(1, 'Rahuvu'),
(2, 'Gurudu'),
(3, 'Bhudhudu'),
(4, 'Shani'),
(5, 'Suryudu'),
(6, 'Shukrudu'),
(7, 'Kethuvu'),
(8, 'Kujudu'),
(9, 'Chandhrudu');

-- --------------------------------------------------------

--
-- Table structure for table `nava_graha_pravesham`
--

CREATE TABLE `nava_graha_pravesham` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT '',
  `title` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nava_graha_pravesham`
--

INSERT INTO `nava_graha_pravesham` (`id`, `name`, `title`, `description`) VALUES
(1, 'Kethuvu', 'fxhthjt', 'thcdgtjnyfjug,i nntjtyjt nmhthsr');

-- --------------------------------------------------------

--
-- Table structure for table `neti_articles`
--

CREATE TABLE `neti_articles` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `neti_articles`
--

INSERT INTO `neti_articles` (`id`, `title`, `description`, `image`) VALUES
(1, 'Sivanath', 'శివుని నీలకంఠం. ఆదియోగి అయిన శివునికి ఉన్న ఎన్నో నామాలలో \"నీలకంఠుడు\" అనే నామం ఒకటి. · మహా ...', 'upload/articles/9681-2022-11-08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `old_articles`
--

CREATE TABLE `old_articles` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `old_articles`
--

INSERT INTO `old_articles` (`id`, `title`, `description`, `image`) VALUES
(1, 'The God of tourer', 'డా.యం.ఎన్.చార్య- శ్రీమన్నారాయణ ఉపాసకులు ,ప్రముఖ అంతర్జాతీయ జ్యోతిష పండితులు -9440611151\r\nజ్ఞాననిధి , జ్యోతిష అభిజ్ఞ , జ్యోతిష మూహూర్త సార్వభౌమ\"ఉగాది స్వర్ణ కంకణ సన్మాన పురస్కార గ్రహీత\"\r\nఎం.ఏ జ్యోతిషం - పి.హెచ్.డి \"గోల్డ్ మెడల్\" ,ఎం.ఏ తెలుగు (ఏల్) , ఎం. ఏ సంస.', 'upload/articles/9602-2022-11-08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pakshamulu`
--

CREATE TABLE `pakshamulu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pakshamulu`
--

INSERT INTO `pakshamulu` (`id`, `title`, `description`, `image`) VALUES
(1, 'పక్షం', 'తెలుగు నెలలు పన్నెండు. నెలకు ముప్పై రోజులు. పదిహేను రోజులు ఒక పక్షం. ప్రతి నెల శుక్ల పక్ష పాడ్యమి (అమావాస్య తర్వాత వచ్చే తిథి) తో మొదలై అమావాస్యతో ముగుస్తుంది.ప్రతి నెలలో రెండు పక్షాలు ఉంటాయి:', 'upload/pakshamulu/1667379825.9112.jpg'),
(2, 'శుక్ల పక్షం ', ' శుక్ల పక్షం లేదా శుద్ధ పక్షం (ప్రతి నెల మొదటి తిథి పాడ్యమి నుంచి పౌర్ణమి వరకు) : రోజు రోజుకూ చంద్రుడితో పాటు వెన్నెల పెరిగి రాత్రుళ్ళు తెల్లగా, కాంతివంతంగా అవుతాయి. (శుక్లం అంటే తెలుపు అని అర్థం).', 'upload/pakshamulu/3063-2022-11-02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `panchangam`
--

CREATE TABLE `panchangam` (
  `id` int(11) NOT NULL,
  `date` text DEFAULT NULL,
  `sunrise` text DEFAULT NULL,
  `sunset` text DEFAULT NULL,
  `moonrise` text DEFAULT NULL,
  `moonset` text DEFAULT NULL,
  `text1` text DEFAULT NULL,
  `text2` text DEFAULT NULL,
  `text3` text DEFAULT NULL,
  `text4` text DEFAULT NULL,
  `text5` text DEFAULT NULL,
  `text6` text DEFAULT NULL,
  `festivals` text DEFAULT NULL,
  `thidhi` text DEFAULT NULL,
  `nakshatram` text DEFAULT NULL,
  `yogam` text DEFAULT NULL,
  `karanam` text DEFAULT NULL,
  `abhijith_muhurtham` text DEFAULT NULL,
  `bhrama_muhurtham` text DEFAULT NULL,
  `amrutha_kalam` text DEFAULT NULL,
  `rahukalam` text DEFAULT NULL,
  `yamakandam` text DEFAULT NULL,
  `dhurmuhurtham` text DEFAULT NULL,
  `varjyam` text DEFAULT NULL,
  `gulika` text DEFAULT NULL,
  `hc1` text DEFAULT NULL,
  `hc2` text DEFAULT NULL,
  `hc3` text DEFAULT NULL,
  `hc4` text DEFAULT NULL,
  `hc5` text DEFAULT NULL,
  `hc6` text DEFAULT NULL,
  `hc7` text DEFAULT NULL,
  `hc8` text DEFAULT NULL,
  `hc9` text DEFAULT NULL,
  `hc10` text DEFAULT NULL,
  `hc11` text DEFAULT NULL,
  `hc12` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panchangam`
--

INSERT INTO `panchangam` (`id`, `date`, `sunrise`, `sunset`, `moonrise`, `moonset`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `festivals`, `thidhi`, `nakshatram`, `yogam`, `karanam`, `abhijith_muhurtham`, `bhrama_muhurtham`, `amrutha_kalam`, `rahukalam`, `yamakandam`, `dhurmuhurtham`, `varjyam`, `gulika`, `hc1`, `hc2`, `hc3`, `hc4`, `hc5`, `hc6`, `hc7`, `hc8`, `hc9`, `hc10`, `hc11`, `hc12`) VALUES
(1, '2022-09-17', '06:07', '06:15', '23:22', '12:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2022-09-22', '21:36', '21:36', '21:36', '21:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2022-09-18', '23:54', '23:54', '23:54', '23:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2022-09-23', '06:08', '18:06', '03:42', '16:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '0000-00-00', 'sunrise', 'sunset', 'moonrise', 'moonset', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2022-09-07', '13:25', '14:05', '11:48', '22:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2023-01-01', '12:05', '12:04', '13:06', '10:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2023-03-09', '11:24 PM', '01:34 PM', '03:45 AM', '07:12 PM', 'Hello', 'Hi', 'This is yours', 'I smmsm', 'check this', 'yggwdgd', 'hhrhh55', '1', '2', '34', '4', NULL, NULL, '5', '6', '7', '8', '9', '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2023-03-08', '11:24 PM', '01:34 PM', '03:45 AM', '07:12 PM', 'Hi', 'Everyone', 'This is yours', 'I smmsm', 'check this', 'Thank You', 'Holi', '05:00 AM', '06:20 AM', '07:12 AM', '02:22 AM', '04:59 AM', '05:24 PM', '21:08 AM', '20:10 AM', '10:37 AM', '01:47 PM', '02:22 PM', '02:22 PM', 'Hi', 'Dhool', 'test', 'Dummy', 'Holi', 'Jolly', 'Dubai', 'Bangalore', 'Kujarat', 'Mumbai', 'Thumps up', 'Keep'),
(10, '2023-03-04', 'jgkugk', 'umum', 'evr', 'ngbd', 'dwc', 'cwac', 'ccw', 'sce', 'ecec', 'hjb,vhd', 'dvfbrh', 'brb', 'ynyfmm', 'kuk', 'yjnfxb', 'frhbthtjkyu', 'tjtdyuff', 'ykyj', 'j', 'tdthd', 'gdntng', 'vzdvxfnbdnnthdtbs', 'vzdvxfnbdnnthdtbs', 'cbvn', 'gnhmh', 'mnmj,', 'j,n,h x', 'cszdvjyngn', 'ngcnnyjjgge', 'dgrhi7yn', 'vdvbg', 'dzsda', 'hhfghb', 'fbfhthc', 'xvdvdcf'),
(11, '2023-03-17', '11:24 PM', '01:34 PM', '03:45 AM', '07:12 PM', 'dv', 'vef', 'efef', 'dvf', 'vsv', 'vsv', 'vvrg', 'cs', 'dc', 'cc', 'cccs', 'dwdd', 'qsqdda', 'xss', 'fffw', 'd2ee2', 'fef', 'ef3', 'ef3', 'e2e2', 's3e2e2', 'www', 'e2e2', 'zasq', 'xwwdw', 'csdwdf', ',kuj', 'ffe', 'y6', 'yyjy', '7u6fe');

-- --------------------------------------------------------

--
-- Table structure for table `panchangam_variant`
--

CREATE TABLE `panchangam_variant` (
  `id` int(11) NOT NULL,
  `panchangam_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panchangam_variant`
--

INSERT INTO `panchangam_variant` (`id`, `panchangam_id`, `title`, `description`) VALUES
(1, 1, '01-01-2022', 'Diwali ugadi'),
(19, 1, 'వారము ', '                                                                                                                                                                                                                                                                          శనివారము'),
(20, 1, 'నక్షత్రం', '                              రోహిణి  : సెప్టెంబర్ 16 09:55 AM - సెప్టెంబర్ 17 12:21PM మృగశిర    : సెప్టెంబర్ 17 12:21 PM - సెప్టెంబర్ 18 03:11 PM'),
(21, 1, 'యోగం ', '                                  వజ్రము 05:50 AM'),
(22, 1, 'కరణం ', '                       భధ్ర 01:03 AM, భవ 02:14 PM'),
(24, 1, 'యమగండము ', '                               02:00 PM - 03:41 PM'),
(25, 1, 'వర్జ్యం  ', '                               06:37 PM - 08:24 PM'),
(26, 1, 'గుళికా ', '                          ఉ. 10:30 - సా. 2:00, అష్టమి '),
(28, 3, 'Test', 'Test'),
(29, 4, '23 - భాద్రపద - శుభకృతు - దక్షిణాయనం', 'ప్రదోష వ్రతం - మాఘ స్మారక'),
(30, 4, 'వారపు రోజు', 'శుక్రవారం'),
(31, 4, 'తిథి', 'త్రయోదశి : Sep 23 1:17 am to Sep 24 2:31 am \r\nతుర్దశి : Sep 24 2:31 am to Sep 25 3:12 am'),
(32, 4, 'నక్షత్రం', 'మఖ: Sep 23 2:03 am to Sep 24 3:50 am\r\nపుబ్బ: Sep 24 3:50 am to Sep 25 5:07 am'),
(33, 4, 'యోగం', 'సిద్ధ: Sep 22 9:44 am to Sep 23 9:55 am\r\nసాధ్య: Sep 23 9:55 am to Sep 24 9:42 am'),
(34, 4, 'కరణం', 'గరజ: Sep 23 1:18 am to Sep 23 1:58 pm\r\nవనిజ: Sep 23 1:58 pm to Sep 24 2:31 am\r\nవిష్టి: Sep 24 2:31 am to Sep 24 2:55 pm'),
(35, 4, 'అభిజిత్ ముహుర్తాలు', '11:44 am to 12:32 pm'),
(36, 4, 'అమృతకాలము', '1:16 AM to 2:59 am'),
(37, 4, 'బ్రహ్మ ముహూర్తం', '4:32 am to 5:20 am'),
(38, 4, 'రాహు', '10:38 am to 12:08 pm'),
(39, 4, 'యమగండం', '3:08 pm to 4:38 pm'),
(40, 4, 'గుళికా', '7:38 am to 9:08 am'),
(41, 4, 'దుర్ముహూర్తం', '8:32 am to 9:20 am\r\n12:32 pm to 1:20 pm'),
(42, 4, 'వర్జ్యం', '12:16 pm – 1:57 pm'),
(43, 7, 'నక్షత్రం', 'Karanam'),
(44, 8, 'DJOWJDOW', 'efrrrrgrgr'),
(45, 8, 'test', 'cvvfvrvrv'),
(46, 9, 'sample', 'You can see all data\'s in that project'),
(47, 10, 'vdv', 'dvdvrgd');

-- --------------------------------------------------------

--
-- Table structure for table `pilli_sasthram`
--

CREATE TABLE `pilli_sasthram` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pilli_sasthram`
--

INSERT INTO `pilli_sasthram` (`id`, `title`, `description`) VALUES
(1, 'పిల్లి శాస్త్రం', 'పిల్లి చిన్న మాంసాహార క్షీరదం యొక్క దేశీయ జాతి. హిందూమతంలో పిల్లులను పూజించే జంతువుగా కూడా పరిగణిస్తారు, ఎందుకంటే మురుగ భగవానుని స్త్రీ అవతారమైన మాతా షష్టి దేవి వాహనం పిల్లి.\r\n\r\nపిల్లులు చాలా తెలివైన జంతువులు, మరియు వారు కుక్కల మాదిరిగానే తమ యజమానులను ఇష్');

-- --------------------------------------------------------

--
-- Table structure for table `poojalu`
--

CREATE TABLE `poojalu` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poojalu`
--

INSERT INTO `poojalu` (`id`, `name`, `image`) VALUES
(1, 'Pooja Vidhanam', 'upload/poojalu/1664872627.3071.jpg'),
(2, 'Nithya Parayana Slokalu', 'upload/poojalu/4565-2022-10-05.jpg'),
(3, 'Sakala Pooja Vidhanam', 'upload/poojalu/9575-2022-10-05.png'),
(4, 'Asttothra Setha Namavali', 'upload/poojalu/9057-2022-10-05.jpg'),
(5, 'Asttottara Setah Nama Sosthram', 'upload/poojalu/0273-2022-10-05.jpeg'),
(6, 'Nomulu - Vrathalu', 'upload/poojalu/8175-2022-10-05.jpg'),
(7, 'Govinda Namalu', 'upload/poojalu/4961-2022-10-05.png');

-- --------------------------------------------------------

--
-- Table structure for table `poojalu_submenu`
--

CREATE TABLE `poojalu_submenu` (
  `id` int(11) NOT NULL,
  `poojalu_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poojalu_submenu`
--

INSERT INTO `poojalu_submenu` (`id`, `poojalu_id`, `name`, `image`) VALUES
(1, 1, 'Nithya Pooja Vidhanam', 'upload/poojalu_submenu/5899-2022-10-04.jpg'),
(2, 2, 'Nithya Parayana Slokalu', 'upload/poojalu_submenu/4602-2022-10-05.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `poojalu_tab`
--

CREATE TABLE `poojalu_tab` (
  `id` int(11) NOT NULL,
  `poojalu_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poojalu_tab`
--

INSERT INTO `poojalu_tab` (`id`, `poojalu_id`, `subcategory_id`, `title`, `description`) VALUES
(1, 1, 1, 'నిత్య పూజా విధానం', 'ప్రతి దేవుని (దేవత) పూజకు ముందుగా గణపతి పూజ చేసి అనంతరం మీరు ఏ దేవుని పూజిస్తారో ఆ దేవుని పూజించవలెను.');

-- --------------------------------------------------------

--
-- Table structure for table `poojalu_tab_variant`
--

CREATE TABLE `poojalu_tab_variant` (
  `id` int(11) NOT NULL,
  `poojalu_tab_id` int(11) DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `sub_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poojalu_tab_variant`
--

INSERT INTO `poojalu_tab_variant` (`id`, `poojalu_tab_id`, `sub_title`, `sub_description`) VALUES
(1, 1, 'వినాయకుని శ్లోకం:', 'శుక్లాం బరదరం విష్ణుం శశి వర్ణం చతుర్భుజం\r\nప్రసన్న వదనం ధ్యాయేత్ సర్వ విఘ్నోప శాంతయే\r\nఅగజానన పద్మార్కం గజానన మహర్నిశం\r\nఅనేకదంతం భక్తానాం ఏకదంతం ఉపాస్మహే.\r\n***\r\nవక్ర తుండ మహా కాయ సూర్య కోటి సమ ప్రభ\r\nనిర్విఘ్నం కురుమే దేవ సర్వ కార్యేషు సర్వదా\r\nఓమ్ శ్రీ మహా గణాధి పతయే నమః\r\n( అని నమఃస్కారం చేసుకోవాలి )\r\n***'),
(3, 1, 'దీపారాధన వెలిగించేటప్పుడు శ్లోకం:', '( యీ క్రింది మంత్రమును చెప్పుతూ దీపమును ఏకాహారతి తోటి దీపం వెలిగించాలి )\r\nభోదీప దేవి రూపస్త్వం,\r\nకర్మ సాక్షిహ్య విఘ్ణకృత్,\r\nయావత్ పూజాం కరిష్యామి,\r\nతావత్వం సుస్థిరో భవ.\r\nదీపారాధన ముహూర్తః సుమూహూర్తోస్తు\r\n( పై శ్లోకం చదువుకుంటూ దీపారాధన కుంది కి పసుపు, కుంకుమ, అక్షంతలు, పూలతో పూజ చెయ్యాలి. )\r\n***');

-- --------------------------------------------------------

--
-- Table structure for table `prasadhams`
--

CREATE TABLE `prasadhams` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prasadhams`
--

INSERT INTO `prasadhams` (`id`, `title`, `description`) VALUES
(1, 'Laddu', 'This is made from Tirupati');

-- --------------------------------------------------------

--
-- Table structure for table `pushpalu`
--

CREATE TABLE `pushpalu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pushpalu`
--

INSERT INTO `pushpalu` (`id`, `title`, `description`) VALUES
(1, 'Hi Bot ', 'This is the fullfilled by the pushpalu');

-- --------------------------------------------------------

--
-- Table structure for table `rahukalams`
--

CREATE TABLE `rahukalams` (
  `id` int(11) NOT NULL,
  `year` text DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `rahukalam` text DEFAULT NULL,
  `yamangandam` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rahukalams`
--

INSERT INTO `rahukalams` (`id`, `year`, `day`, `rahukalam`, `yamangandam`) VALUES
(1, '2021', NULL, 'Rahukalam', 'you have at 8.00 pm '),
(2, '2022', 'Sunday', 'sdsds', 'sdsds');

-- --------------------------------------------------------

--
-- Table structure for table `rahu_yamagandam`
--

CREATE TABLE `rahu_yamagandam` (
  `id` int(11) NOT NULL,
  `day` text DEFAULT '',
  `rahu` text DEFAULT '',
  `yamagandam` text DEFAULT '\'\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rahu_yamagandam`
--

INSERT INTO `rahu_yamagandam` (`id`, `day`, `rahu`, `yamagandam`) VALUES
(1, 'Wednesday', 'Hello Everyone', 'Today 5:40 PM - 6:00 PM ');

-- --------------------------------------------------------

--
-- Table structure for table `ramayanam`
--

CREATE TABLE `ramayanam` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ramayanam`
--

INSERT INTO `ramayanam` (`id`, `title`) VALUES
(1, 'బాల కాండ'),
(2, 'అయోధ్య కండ');

-- --------------------------------------------------------

--
-- Table structure for table `ramayanam_menu`
--

CREATE TABLE `ramayanam_menu` (
  `id` int(11) NOT NULL,
  `ramayanam_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ramayanam_menu`
--

INSERT INTO `ramayanam_menu` (`id`, `ramayanam_id`, `title`) VALUES
(1, 1, 'రామాయణము ప్రాముఖ్యత'),
(2, 1, 'రామాయణం -1వ భాగం'),
(3, 2, 'రామాయణం -22వ భాగం');

-- --------------------------------------------------------

--
-- Table structure for table `ramayanam_submenu`
--

CREATE TABLE `ramayanam_submenu` (
  `id` int(11) NOT NULL,
  `ramayanam_id` int(11) DEFAULT 0,
  `ramayanam_menu_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ramayanam_submenu`
--

INSERT INTO `ramayanam_submenu` (`id`, `ramayanam_id`, `ramayanam_menu_id`, `title`, `description`) VALUES
(1, 1, 1, 'రామాయణము ప్రాముఖ్యత', '24,000 శ్లోకాలతో కూడిన రామాయణం భారతదేశంలో, హిందూ ధర్మం చరిత్ర, సంస్కృతి, నడవడిక, నమ్మకాలు, ఆచారాలపై అనితరమైన ప్రభావం కలిగిఉంది. రామాయణంలో శ్రీ సీతారాముల పవిత్ర చరిత్ర వర్ణింపబడింది. తండ్రీకొడుకులు, భార్యాభర్తలు, అన్నదమ్ములు, యజమాని-సేవకులు, మిత్రులు, రాజు-ప్రజలు, భగవంతుడు-భక్తుడు - వీరందరి మధ్య గల సంబంధబాంధవ్యములు, ప్రవర్తనా విధానములు రామాయణములో చెప్పబడినవి. చాలా మంది అభిప్రాయములో రామాయణములోని పాత్రలు ఆదర్శ జీవనమునకు ప్రమాణముగా స్వీకరింపవచ్చును.\r\n\r\nవాల్మీకి రామాయణమే గాక, వేదవ్యాసుని ఆధ్యాత్మ రామాయణము, భవభూతి ఉత్తర రామచరితము పేరెన్నిక గన్నవి. ఇతర భారతీయ భాషలలో తులసీదాసు రామచరిత మానసము (కడీ బోలీ), కంబ రామాయణము (తమిళం), రంగనాధరామాయణం, రామాయణ కల్పవృక్షము, మందరము (తెలుగు) వంటి అనేక కావ్యాలు ప్రాచుర్యం పొందాయి. ఇంక రామాయణములోని పాత్రలు, సంఘటనలు, భావములు, తత్త్వాలు అంతర్గతంగా నున్న పురాణాలు, కథలు, కావ్యాలు, పాటలు అన్ని భారతీయ భాషలలోను లెక్కకు మిక్కిలిగా ఉన్నాయి. కాని వాల్మీకి రామాయణమే ప్రధాన ప్రమాణముగా సర్వత్రా అంగీకరింప బడుతున్నది. ఆదికవి వాల్మీకి ప్రార్థన సంప్రదాయంగా చాలామంది కవులు స్మరిస్తారు.\r\n\r\nకూజంతమ్ రామరామేతి మధురమ్ మధురాక్షరమ్\r\nఆరుహ్య కవితా శాఖాం వందే వాల్మీకి కోకిలమ్\r\nకావ్యం రామాయణం సీతాయాశ్చరితమ్ మహత్\r\nపౌలస్త్య వధమిత్యేవ, చకార చరిత వ్రత:'),
(3, 1, 2, 'రామాయణం భారతదేశంలో', 'ఒక నాడు నారద మహర్షి వాల్మీకి ఆశ్రమమునకు వస్తాడు. అప్పుడు వాల్మీకి నారదుడిని ఒక ప్రశ్న అడుగుతాడు.\r\n\r\nకఃను అస్మిన్ సాంప్రతం లోకే గుణవాన్ కః చ వీర్యవాన్\r\n\r\nధర్మజ్ఞః చ కృతజ్ఞః చ సత్యవాక్యో దృఢ వ్రతః\r\n\r\nఈ కాలం లో, ఈ లోకంలో గుణవంతుడు, యుద్ధంలో శత్రువుని ధైర్యంగా జయించగల్గిన వాడు, ధర్మవంతుడు, చేసిన మేలు మరువని వాడు, ఎల్లప్పుడు సత్యమునే పలికేవాడు, అనుకున్న పనిని దృఢ సంకల్పంతో చేసేవాడు ఎవడయిన ఉన్నడా..? ఉంటే వాని గురించి చెప్పు అని అడుగుతాడు.\r\n\r\nఅవియే కాక అన్ని భూతములయందు దయ కలవాడు, విద్వాంసుడు, సమర్ధుడు, ప్రియదర్శనుడు, కోపాన్ని జయించినవాడు, అసూయలేనివాడు... అలా 16 గుణములు చెప్పి అవన్ని ఉన్నవాడు ఈ భూమి మీద ఉన్నడా అని వాల్మికి మహర్షి అడుగుతాడు.\r\n\r\nఅప్పుడు నారదుడు ఇట్లా చెబుతాడు.\r\n\r\nమహర్షీ, మీరు అడిగిన గుణములు గొప్ప చక్రవర్తులకే అసంభవము. ఇక మామూలు మనుష్యులు సంగతి చెప్పనేల..!\r\n\r\nకానీ అలాంటి ఒక మనుష్యుని గురించి నేను మీకు చెపుతాను అని ఈ విధముగా చెప్పనారంభించెను.'),
(4, 2, 3, 'సుమారు ఒక నూరు', '\"ఓరీ కిరాతకుడా! క్రౌంచ దంపతులలో కామమోహితమగు ఒకదానిని చంపి, నీవు శాశ్వతమగు అపకీర్తిని పొందితివి\"\r\n\r\nశోక పరితప్త హృదయముతో ఆయన ఉచ్ఛరించిన ఈ మాటలు ఛందో బద్ధముగా నున్న మొదటి శ్లోకమని, అది రామాయణం వినుటవలన తటస్థించెనని సంస్కృత సాహిత్య చరిత్రలో నమ్మకము. ఆప్పుడు బ్రహ్మ దేవుడు వాల్మీకికి ఆ శ్లోక విశిష్టతను తెలిపి, శ్రీ రామ చరిత్రను కావ్య రూపమున రచింపుమని ప్రేరేపించెను. లోకములయందు పర్వతములు, నదులు ఉన్నంత కాలము ఆ రామాయణ కావ్యము ప్రకాశించునని దీవించెను.');

-- --------------------------------------------------------

--
-- Table structure for table `rashulu`
--

CREATE TABLE `rashulu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rashulu`
--

INSERT INTO `rashulu` (`id`, `title`, `description`) VALUES
(1, 'మేషరాశి', 'మార్చి 21 నుండి ఏప్రిల్‌ 20'),
(2, 'వృషభరాశి', 'ఏప్రిల్‌ 21 నుండి మే 20'),
(3, 'మిథునరాశి', 'మే 21 నుండి జూన్‌ 21');

-- --------------------------------------------------------

--
-- Table structure for table `rasi_names`
--

CREATE TABLE `rasi_names` (
  `id` int(11) NOT NULL,
  `rasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rasi_names`
--

INSERT INTO `rasi_names` (`id`, `rasi`) VALUES
(1, 'Mesham'),
(2, 'Vrushabham'),
(3, 'Midhunam'),
(4, 'Karkatakam'),
(5, 'Simham'),
(6, 'Kanya'),
(7, 'Thula'),
(8, 'Vruschikam'),
(9, 'Dhanussu'),
(10, 'Makaram'),
(11, 'Kumbham'),
(12, 'Meenam');

-- --------------------------------------------------------

--
-- Table structure for table `ruthuvulu`
--

CREATE TABLE `ruthuvulu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruthuvulu`
--

INSERT INTO `ruthuvulu` (`id`, `title`, `description`) VALUES
(1, 'వసంతఋతువు', 'కాలాలు : Spring\r\nచంద్రమాన మాసాలు : చైత్రం, వైశాఖం\r\nఆంగ్ల నెలలు : ఏప్రిల్13 నుండి జూన్ 10\r\nలక్షణాలు : సుమారు 20-30 డిగ్రీల ఉష్ణోగ్రత ; వివాహాల కాలం\r\nపండగలు : ఉగాది, శ్రీరామ నవమి, వైశాఖి, హనుమజ్జయంతి'),
(2, 'గ్రీష్మఋతువు', 'కాలాలు : Spring\r\nచంద్రమాన మాసాలు : చైత్రం, వైశాఖం\r\nఆంగ్ల నెలలు : ఏప్రిల్13 నుండి జూన్ 10\r\nలక్షణాలు : సుమారు 20-30 డిగ్రీల ఉష్ణోగ్రత ; వివాహాల కాలం\r\nపండగలు : ఉగాది, శ్రీరామ నవమి, వైశాఖి, హనుమజ్జయంతి');

-- --------------------------------------------------------

--
-- Table structure for table `sakunalu`
--

CREATE TABLE `sakunalu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sakunalu`
--

INSERT INTO `sakunalu` (`id`, `title`, `description`) VALUES
(1, 'శకునం', 'శకునం (Omen) అనగా జరగబోవు పని గురించిన సంజ్ఞ. కొన్ని వస్తువులు, కొందరు వ్యక్తులు శుభ శకునాలు గాను కొన్ని అశుభ శకునాలు గానూ భావిస్తారు. శకునాల శాస్త్రీయత ప్రశ్నార్ధకమైనందువల్ల హేతువాదులు శకునాలను పట్టించుకోవటాన్ని మూఢ నమ్మకంగా కొట్టిపారేస్తారు. అయితే మానవ చరిత్రలో, జానపద వాజ్ఞ్మయంలో శకునాలకు చాలా ప్రధానపాత్ర ఉన్నది.'),
(2, 'శకున శాస్త్రం', 'సువాసినీ, వేశ్య, ఇద్దరు బ్రాహ్మణులు, దండ(కఱ్ఱ)ధారుడగు శూద్రుడు, మంగళవాద్యం, పండ్లు, పూలు, గొడుగు, చామరము, గుఱ్ఱము, ఏనుగు, ఎద్దు, పూర్ణ కుంభము, చెరకు, అన్నము, పాలు, పెరుగు, మాంసము, కల్లుకుండ, పొగ లేని మంట, తేనె, చలువ వస్త్రములు, అక్షంతలు, వీణ, మద్దెల, శంఖము, వధూవరులు, ఘంటానాదము, జయ శబ్దము, మంగళప్రదవస్తువులు, ఎదురుగా వచ్చిన చల్లని పిల్లగాలి, అనుకూలమగు పశ్చాత్తాపము మెదలగు శకునములు శుభఫలితములనిచ్చును.');

-- --------------------------------------------------------

--
-- Table structure for table `sakuna_settings`
--

CREATE TABLE `sakuna_settings` (
  `id` int(11) NOT NULL,
  `sakunalu_image` text DEFAULT NULL,
  `balli_image` text DEFAULT NULL,
  `kaki_image` text DEFAULT NULL,
  `kukuta_image` text DEFAULT NULL,
  `sasthram_image` text DEFAULT NULL,
  `pilli_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sakuna_settings`
--

INSERT INTO `sakuna_settings` (`id`, `sakunalu_image`, `balli_image`, `kaki_image`, `kukuta_image`, `sasthram_image`, `pilli_image`) VALUES
(1, 'upload/images/1673336613.0952.jpg', 'upload/images/1673336613.1024.jpg', 'upload/images/1673336613.1097.jpg', 'upload/images/1673336613.1156.jpg', 'upload/images/1673336613.1206.jpg', 'upload/images/1673336613.1256.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `telecast_image` text DEFAULT NULL,
  `image_tab` text DEFAULT NULL,
  `video_tab` text DEFAULT NULL,
  `gowri_image` text DEFAULT NULL,
  `chakram_image` text DEFAULT NULL,
  `thidhi_image` text DEFAULT NULL,
  `karanam_image` text DEFAULT NULL,
  `rahukalam_image` text DEFAULT NULL,
  `yogam_image` text DEFAULT NULL,
  `neti_arti_image` text DEFAULT NULL,
  `old_arti_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `image`, `telecast_image`, `image_tab`, `video_tab`, `gowri_image`, `chakram_image`, `thidhi_image`, `karanam_image`, `rahukalam_image`, `yogam_image`, `neti_arti_image`, `old_arti_image`) VALUES
(1, 'upload/images/1673330070.0423.jpg', 'upload/images/1673329904.0496.jpg', 'upload/images/1673330860.3241.jpg', 'upload/images/1673330814.954.jpg', 'upload/images/1673333783.7859.jpg', 'upload/images/1673333783.8415.jpg', 'upload/images/1673333783.8478.jpg', 'upload/images/1673333783.8528.png', 'upload/images/1673333842.3831.jpg', 'upload/images/1673333783.8614.jpg', 'upload/images/1673506692.1389.jpg', 'upload/images/1673506769.2568.png');

-- --------------------------------------------------------

--
-- Table structure for table `shivapuranam`
--

CREATE TABLE `shivapuranam` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shivapuranam`
--

INSERT INTO `shivapuranam` (`id`, `title`) VALUES
(1, 'Eesa'),
(2, 'Eswaran Kovil');

-- --------------------------------------------------------

--
-- Table structure for table `shivapuranam_menu`
--

CREATE TABLE `shivapuranam_menu` (
  `id` int(11) NOT NULL,
  `shivapuranam_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shivapuranam_menu`
--

INSERT INTO `shivapuranam_menu` (`id`, `shivapuranam_id`, `title`, `description`) VALUES
(1, 1, 'Coimbatore', 'గమనాలపై ఆధారపడి తయారుచేసింది. ఈ కేలండరు ప్రస్తుతం ఎక్కువగా ముస్లింలు ఉపయోగించే ఇస్లామీయ కేలండరుకు మూలం.'),
(2, 1, 'sds', 'dsdsds');

-- --------------------------------------------------------

--
-- Table structure for table `subha_muhurtham`
--

CREATE TABLE `subha_muhurtham` (
  `id` int(11) NOT NULL,
  `month` text DEFAULT '',
  `year` year(4) DEFAULT NULL,
  `text1` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subha_muhurtham`
--

INSERT INTO `subha_muhurtham` (`id`, `month`, `year`, `text1`) VALUES
(1, 'January', 2023, 'Summa Kizhi');

-- --------------------------------------------------------

--
-- Table structure for table `subha_muhurtham_variant`
--

CREATE TABLE `subha_muhurtham_variant` (
  `id` int(11) NOT NULL,
  `subha_muhurtham_id` int(11) DEFAULT NULL,
  `date_month` text DEFAULT '',
  `description` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subha_muhurtham_variant`
--

INSERT INTO `subha_muhurtham_variant` (`id`, `subha_muhurtham_id`, `date_month`, `description`) VALUES
(1, 1, '09,March', 'మీరు తెలుగులో టైప్ చేయాలనుకుంటే మరియు తెలుగులో ఎలా టైప్ చేయాలో మీకు తెలియకపోతే లేదా మీరు తెలుగులో టైప్ చేయడం కష్టంగా ఉంటే, మీరు మా సాధనాన్ని '),
(2, 1, '10,March', 'దయచేసి మీ స్నేహితులు మరియు బంధువులతో భాగస్వామ్యం చేయడం మర్చిపోవద్దు.'),
(3, 1, '11,March', ' ఇంగ్లీష్లో ఆ పదాన్ని టైప్ చేయండి మరియు ఇది స్వంతంగా సొంతగా తెలుగులోకి మార్చబడుతుంది. మీరు ఈ ఉపకరణాన్ని కావాలనుకుంటే');

-- --------------------------------------------------------

--
-- Table structure for table `telugu_months`
--

CREATE TABLE `telugu_months` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telugu_months`
--

INSERT INTO `telugu_months` (`id`, `title`, `description`) VALUES
(1, 'తెలుగు నెలలు', 'తెలుగు నెలలు పన్నెండు. నెలకు ముప్పై రోజులు. పదిహేను రోజులు ఒక పక్షం. ప్రతి నెల శుక్ల పక్ష పాడ్యమి (అమావాస్య తర్వాత వచ్చే తిథి) తో మొదలై అమావాస్యతో ముగుస్తుంది.ప్రతి నెలలో రెండు పక్షాలు ఉంటాయి:'),
(2, 'శుక్ల పక్షం ', 'లేదా శుద్ధ పక్షం (ప్రతి నెల మొదటి తిథి పాడ్యమి నుంచి పౌర్ణమి వరకు) : రోజు రోజుకూ చంద్రుడితో పాటు వెన్నెల పెరిగి రాత్రుళ్ళు తెల్లగా, కాంతివంతంగా అవుతాయి. (శుక్లం అంటే తెలుపు అని అర్థం'),
(3, ' కృష్ణ పక్షం', 'లేదా బహుళ పక్షం (ప్రతి నెల పున్నమి తరువాత వచ్చే పాడ్యమి తిథి నుంచి అమావాస్య వరకు) : రోజు రోజుకూ చంద్రుడితో పాటు వెన్నెల తరిగి రాత్రుళ్ళు నల్లగా చీకటితో నిండుతాయి. (కృష్ణ అంటే నలుపు అని అర్థం).'),
(4, 'తెలుగు నెలలు', 'చైత్రము\r\nవైశాఖము\r\nజ్యేష్ఠము\r\nఆషాఢము\r\nశ్రావణము\r\nభాద్రపదము\r\nఆశ్వీయుజము\r\nకార్తీకము\r\nమార్గశిరము\r\nపుష్యము\r\nమాఘము\r\nఫాల్గుణము');

-- --------------------------------------------------------

--
-- Table structure for table `telugu_samkrutham`
--

CREATE TABLE `telugu_samkrutham` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telugu_samkrutham`
--

INSERT INTO `telugu_samkrutham` (`id`, `title`, `image`) VALUES
(1, 'Telugu Years', 'upload/images/1673505296.6581.jpg'),
(2, 'Telugu Months', 'upload/images/1673505296.6581.jpg'),
(3, 'Telugu Weeks', 'upload/images/1673505296.6581.jpg'),
(4, 'Ankelu', 'upload/images/1673505296.6581.jpg'),
(5, 'Aksharalu', 'upload/images/1673505296.6581.jpg'),
(6, 'Guninthalu', 'upload/images/1673505296.6581.jpg'),
(7, 'Rashulu', 'upload/images/1673505296.6581.jpg'),
(8, '64 Kalalu', 'upload/images/1673505296.6581.jpg'),
(9, 'Vruthulu', 'upload/images/1673505296.6581.jpg'),
(10, 'Navagrahalu', 'upload/images/1673505296.6581.jpg'),
(11, 'Ruthuvulu', 'upload/images/1673505296.6581.jpg'),
(12, 'Kolathalu', 'upload/images/1673505296.6581.jpg'),
(13, 'Pakshamulu', 'upload/images/1673505296.6581.jpg'),
(14, 'Lagnam', 'upload/images/1673505296.6581.jpg'),
(15, 'Thidhi Addhi', 'upload/images/1673505296.6581.jpg'),
(16, 'Pushpalu', 'upload/images/1673505296.6581.jpg'),
(17, 'Fruit Names', 'upload/images/1673505296.6581.jpg'),
(18, 'Prasadham Names', 'upload/images/1673505296.6581.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `telugu_sethakamulu`
--

CREATE TABLE `telugu_sethakamulu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telugu_sethakamulu`
--

INSERT INTO `telugu_sethakamulu` (`id`, `title`) VALUES
(1, 'Sumathi Sethakam'),
(2, 'Kumara Sethakam'),
(3, 'ljhbopik');

-- --------------------------------------------------------

--
-- Table structure for table `telugu_sethakamulu_menu`
--

CREATE TABLE `telugu_sethakamulu_menu` (
  `id` int(11) NOT NULL,
  `telugu_sethakamulu_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telugu_sethakamulu_menu`
--

INSERT INTO `telugu_sethakamulu_menu` (`id`, `telugu_sethakamulu_id`, `title`) VALUES
(1, 1, 'Vruthi');

-- --------------------------------------------------------

--
-- Table structure for table `telugu_sethakamulu_submenu`
--

CREATE TABLE `telugu_sethakamulu_submenu` (
  `id` int(11) NOT NULL,
  `telugu_sethakamulu_id` int(11) DEFAULT 0,
  `telugu_sethakamulu_menu_id` int(11) DEFAULT 0,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telugu_sethakamulu_submenu`
--

INSERT INTO `telugu_sethakamulu_submenu` (`id`, `telugu_sethakamulu_id`, `telugu_sethakamulu_menu_id`, `title`, `description`) VALUES
(1, 1, 1, 'Central', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit');

-- --------------------------------------------------------

--
-- Table structure for table `telugu_weeks`
--

CREATE TABLE `telugu_weeks` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telugu_weeks`
--

INSERT INTO `telugu_weeks` (`id`, `title`, `description`) VALUES
(1, 'ఆదివారము', 'భానువారము'),
(2, 'సోమవారము', 'ఇందువారము'),
(3, 'మంగళవారము', 'భౌమవారము');

-- --------------------------------------------------------

--
-- Table structure for table `telugu_years`
--

CREATE TABLE `telugu_years` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telugu_years`
--

INSERT INTO `telugu_years` (`id`, `title`, `description`) VALUES
(1, 'ప్రభవ ', '1901,1910,2010,2100'),
(2, 'విభవ', '1901,1910,2010,2100');

-- --------------------------------------------------------

--
-- Table structure for table `thidhi`
--

CREATE TABLE `thidhi` (
  `id` int(11) NOT NULL,
  `year` text DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thidhi`
--

INSERT INTO `thidhi` (`id`, `year`, `month`) VALUES
(1, '2021', NULL),
(2, '2023', 'Saturday'),
(3, '2022', 'May');

-- --------------------------------------------------------

--
-- Table structure for table `thidhi_addhi`
--

CREATE TABLE `thidhi_addhi` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thidhi_addhi`
--

INSERT INTO `thidhi_addhi` (`id`, `title`, `description`) VALUES
(1, '1. పాడ్యమి', 'అధిదేవత : శ్రద్ధ\r\nచేయతగిన కార్యములు : శ్రద్ధతో పనిచేయుట, పనులయందు ఫలితములు\r\nఫలితములు : దర్పం, అపురూపమైన విద్య, అధికారం, శక్తి, తెలివి వలన కలుగు దర్పం. గుర్తింపు కొరకు గొప్ప కొరకు పాటుపడుట నివారించని ఎడల పేదరికం సంభవించును');

-- --------------------------------------------------------

--
-- Table structure for table `thidhi_variant`
--

CREATE TABLE `thidhi_variant` (
  `id` int(11) NOT NULL,
  `thidhi_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thidhi_variant`
--

INSERT INTO `thidhi_variant` (`id`, `thidhi_id`, `title`, `description`) VALUES
(1, 1, 'Good morning', 'this is variant1'),
(3, 2, 'dsds', 'sdsd'),
(4, 2, 'sds', 'dsds'),
(5, 3, 'sdsd', 'sdsdsd');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `link`) VALUES
(1, 'TTD Live Darshanam', 'https://www.mslivestream.com/ttd/');

-- --------------------------------------------------------

--
-- Table structure for table `video_category`
--

CREATE TABLE `video_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_category`
--

INSERT INTO `video_category` (`id`, `name`, `image`) VALUES
(2, 'trererecxcx', 'upload/video-category/6705-2022-10-18.jpg'),
(3, 'Good Night ', 'upload/video-category/0990-2022-10-18.jpg'),
(4, 'Diwali', 'upload/video-category/3632-2022-10-18.jpg'),
(5, 'Dasara', 'upload/video-category/1087-2022-10-18.jpg'),
(6, 'Sankranthi', 'upload/video-category/6161-2022-10-18.jpg'),
(7, 'Ugadhi', 'upload/video-category/7452-2022-10-18.jpg'),
(8, 'Chavithi', 'upload/video-category/5985-2022-10-18.jpg'),
(9, 'Shasti', 'upload/video-category/1454-2022-10-18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `video_post`
--

CREATE TABLE `video_post` (
  `id` int(11) NOT NULL,
  `video_category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `video` text DEFAULT NULL,
  `downloads` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_post`
--

INSERT INTO `video_post` (`id`, `video_category_id`, `name`, `video`, `downloads`) VALUES
(1, 1, 'sdssdsds', 'upload/videos/1666080909.249.mp4', 0),
(2, 2, 'www', 'upload/videos/1666080909.249.mp4', 0),
(3, 2, 'dfdfd', 'upload/videos/-2022-10-18.mp4', 0),
(4, 3, 'Status', 'upload/videos/-2022-10-18.mp4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vruthulu`
--

CREATE TABLE `vruthulu` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vruthulu`
--

INSERT INTO `vruthulu` (`id`, `title`, `description`) VALUES
(2, 'వ్యవసాయం', 'వ్యవసాయదారుడు'),
(3, 'ఉపాధ్యాయ', 'ఉపాధ్యాయుడు'),
(4, 'వైద్యం', 'వైద్యుడు');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_horoscope`
--

CREATE TABLE `weekly_horoscope` (
  `id` int(11) NOT NULL,
  `rasi` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekly_horoscope`
--

INSERT INTO `weekly_horoscope` (`id`, `rasi`, `year`, `month`, `week`, `description`) VALUES
(1, 'Mesham', '2023', 'March', 'Mar-13,2023_to_Mar-19,2023', 'జీవితానికి నిజమైన మూలధనం ఒత్తిడిని దాటవేయడం మరియు చుట్టుపక్కల వ్యక్తులతో జీవితాన్ని ఆస్వాదించడం అని ఈ వారం మీరు అర్థం చేసుకుంటారు. మీరు ఈ వారం మీ జీవితంలో ఈ విషయాన్ని స్వీకరిస్తారు. దీని కారణంగా ఇంట్లో మరియు మీ కార్యాలయంలో మెరుగైన వాతావరణం మరియు ఆరోగ్యాన్ని పొందడం కోసం మీ మనస్సును రిలాక్స్‌గా ఉంచడానికి మీరు చాలా జోకులు వేస్తారు. ఈ వారం, ఆరవ ఇంట్లో చంద్రుని స్థానం మీరు ఇతరుల అడుగుజాడలను అనుసరించి ఏదైనా పెట్టుబడి పెడితే, ఆర్థిక నష్టం దాదాపు ఖాయమని వివరిస్తుంది. అందువల్ల, మీ డబ్బును ఇతరుల ఆజ్ఞపై ఎక్కడా ఉంచకుండా మరియు తెలివిగా వ్యవహరించండి. ఇంటి సభ్యుల సలహా ఈ వారం అదనపు డబ్బు సంపాదించడంలో మీకు సహాయపడే అవకాశాలు ఉన్నాయి, ఇది మీ మనస్సును ఆహ్లాదపరుస్తుంది. అలాగే, మీరు మీ కుటుంబ సభ్యుల కోసం బహిరంగంగా ఖర్చు చేయడం మరియు వారి కోసం బహుమతులు కొనుగోలు చేయడం కనిపిస్తుంది.ఉన్నందున ఈ వారంలో మీ శ్రమ మీకు ఫలిస్తుంది కాబట్టి మీ ఆదాయంలో ఇంక్రిమెంట్లు పొందే బలమైన అవకాశాలు ఉన్నాయి శని 11వ ఇంట్లో ఇది మీకు అర్హమైన అన్ని క్రెడిట్‌లను పొందడానికి మీకు సహాయం చేస్తుంది. అయితే, మీరు ఏ పనిని అసంపూర్తిగా ఉంచవద్దని సూచించారు, లేకపోతే మీరు సమస్యలను ఎదుర్కోవచ్చు. ఈ వారం, విద్యార్థులు తమ అధ్యాయాలను లేదా ఏదైనా పాఠాన్ని సవరించే పనిని రేపటికి వాయిదా వేయడం ఎవరికీ ఫలించదని బాగా అర్థం చేసుకోవాలి. ఎందుకంటే ఇలా చేస్తున్నప్పుడు, వారం చివరి నాటికి అనేక పనులు పేరుకుపోతాయి, ఇది అదనపు బాధ్యతగా ఉపయోగపడుతుంది. కాబట్టి మీరు కూడా ఆలస్యం చేయకుండా మీ ఉపాధ్యాయుల సహాయంతో వాటిని సవరించడం ప్రారంభించండి.\r\nపరిహారము: బహిరంగ ప్రదేశాలలో లేదా దేవాలయంలో మొక్కలు నాటండి');

-- --------------------------------------------------------

--
-- Table structure for table `yearly_horoscope`
--

CREATE TABLE `yearly_horoscope` (
  `id` int(11) NOT NULL,
  `rasi` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `adhayam` text DEFAULT '\'\'',
  `vyayam` text DEFAULT '',
  `rajapujyam` text DEFAULT '',
  `aavamanam` text DEFAULT '',
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yearly_horoscope_variant`
--

CREATE TABLE `yearly_horoscope_variant` (
  `id` int(11) NOT NULL,
  `yearly_horoscope_id` int(11) DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `sub_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `year` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`) VALUES
(1, '2021'),
(2, '2022'),
(3, '2023'),
(4, '2024'),
(5, '2025');

-- --------------------------------------------------------

--
-- Table structure for table `yogam`
--

CREATE TABLE `yogam` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yogam`
--

INSERT INTO `yogam` (`id`, `description`) VALUES
(2, 'Hi World! You are something special to me');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abdhikam`
--
ALTER TABLE `abdhikam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abdhikam_variant`
--
ALTER TABLE `abdhikam_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aksharalu`
--
ALTER TABLE `aksharalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ankelu`
--
ALTER TABLE `ankelu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balli_sasthram`
--
ALTER TABLE `balli_sasthram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhagawatham`
--
ALTER TABLE `bhagawatham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhagawatham_menu`
--
ALTER TABLE `bhagawatham_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhagawatham_submenu`
--
ALTER TABLE `bhagawatham_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhagawath_geetha`
--
ALTER TABLE `bhagawath_geetha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhagawath_geetha_menu`
--
ALTER TABLE `bhagawath_geetha_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhagawath_geetha_submenu`
--
ALTER TABLE `bhagawath_geetha_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhargava_panchangam`
--
ALTER TABLE `bhargava_panchangam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhargava_timeslots`
--
ALTER TABLE `bhargava_timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_birth`
--
ALTER TABLE `child_birth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_birth_variant`
--
ALTER TABLE `child_birth_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_horoscope`
--
ALTER TABLE `daily_horoscope`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gowri`
--
ALTER TABLE `gowri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gowri_timeslots`
--
ALTER TABLE `gowri_timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grahalu`
--
ALTER TABLE `grahalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grahalu_submenu`
--
ALTER TABLE `grahalu_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grahalu_tab`
--
ALTER TABLE `grahalu_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grahalu_tab_variant`
--
ALTER TABLE `grahalu_tab_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grahanam`
--
ALTER TABLE `grahanam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guninthalu`
--
ALTER TABLE `guninthalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hora_chakram`
--
ALTER TABLE `hora_chakram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hora_timeslots`
--
ALTER TABLE `hora_timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_category`
--
ALTER TABLE `image_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `important_days`
--
ALTER TABLE `important_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaki_sasthram`
--
ALTER TABLE `kaki_sasthram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kalalu`
--
ALTER TABLE `kalalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karanam`
--
ALTER TABLE `karanam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karthi_vrusti`
--
ALTER TABLE `karthi_vrusti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karthi_vrusti_variant`
--
ALTER TABLE `karthi_vrusti_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kolathalu`
--
ALTER TABLE `kolathalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kukutasasthram_menu`
--
ALTER TABLE `kukutasasthram_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kukuta_sasthram`
--
ALTER TABLE `kukuta_sasthram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lagnam`
--
ALTER TABLE `lagnam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahabharatham`
--
ALTER TABLE `mahabharatham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahabharatham_menu`
--
ALTER TABLE `mahabharatham_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahabharatham_submenu`
--
ALTER TABLE `mahabharatham_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_horoscope`
--
ALTER TABLE `monthly_horoscope`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_festivals`
--
ALTER TABLE `month_festivals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_panchangam`
--
ALTER TABLE `month_panchangam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moudya_dhinam`
--
ALTER TABLE `moudya_dhinam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muhurtham`
--
ALTER TABLE `muhurtham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muhurtham_tab`
--
ALTER TABLE `muhurtham_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nakshatralu`
--
ALTER TABLE `nakshatralu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nakshatralu_tab`
--
ALTER TABLE `nakshatralu_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nakshatralu_tab_variant`
--
ALTER TABLE `nakshatralu_tab_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navagrahalu`
--
ALTER TABLE `navagrahalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nava_grahams`
--
ALTER TABLE `nava_grahams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nava_graha_pravesham`
--
ALTER TABLE `nava_graha_pravesham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neti_articles`
--
ALTER TABLE `neti_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_articles`
--
ALTER TABLE `old_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakshamulu`
--
ALTER TABLE `pakshamulu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panchangam`
--
ALTER TABLE `panchangam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panchangam_variant`
--
ALTER TABLE `panchangam_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilli_sasthram`
--
ALTER TABLE `pilli_sasthram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poojalu`
--
ALTER TABLE `poojalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poojalu_submenu`
--
ALTER TABLE `poojalu_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poojalu_tab`
--
ALTER TABLE `poojalu_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poojalu_tab_variant`
--
ALTER TABLE `poojalu_tab_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prasadhams`
--
ALTER TABLE `prasadhams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pushpalu`
--
ALTER TABLE `pushpalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rahukalams`
--
ALTER TABLE `rahukalams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rahu_yamagandam`
--
ALTER TABLE `rahu_yamagandam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ramayanam`
--
ALTER TABLE `ramayanam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ramayanam_menu`
--
ALTER TABLE `ramayanam_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ramayanam_submenu`
--
ALTER TABLE `ramayanam_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rashulu`
--
ALTER TABLE `rashulu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rasi_names`
--
ALTER TABLE `rasi_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruthuvulu`
--
ALTER TABLE `ruthuvulu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sakunalu`
--
ALTER TABLE `sakunalu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sakuna_settings`
--
ALTER TABLE `sakuna_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shivapuranam`
--
ALTER TABLE `shivapuranam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shivapuranam_menu`
--
ALTER TABLE `shivapuranam_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subha_muhurtham`
--
ALTER TABLE `subha_muhurtham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subha_muhurtham_variant`
--
ALTER TABLE `subha_muhurtham_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telugu_months`
--
ALTER TABLE `telugu_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telugu_samkrutham`
--
ALTER TABLE `telugu_samkrutham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telugu_sethakamulu`
--
ALTER TABLE `telugu_sethakamulu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telugu_sethakamulu_menu`
--
ALTER TABLE `telugu_sethakamulu_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telugu_sethakamulu_submenu`
--
ALTER TABLE `telugu_sethakamulu_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telugu_weeks`
--
ALTER TABLE `telugu_weeks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telugu_years`
--
ALTER TABLE `telugu_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thidhi`
--
ALTER TABLE `thidhi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thidhi_addhi`
--
ALTER TABLE `thidhi_addhi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thidhi_variant`
--
ALTER TABLE `thidhi_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_category`
--
ALTER TABLE `video_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_post`
--
ALTER TABLE `video_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vruthulu`
--
ALTER TABLE `vruthulu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_horoscope`
--
ALTER TABLE `weekly_horoscope`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearly_horoscope`
--
ALTER TABLE `yearly_horoscope`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearly_horoscope_variant`
--
ALTER TABLE `yearly_horoscope_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yogam`
--
ALTER TABLE `yogam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abdhikam`
--
ALTER TABLE `abdhikam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `abdhikam_variant`
--
ALTER TABLE `abdhikam_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aksharalu`
--
ALTER TABLE `aksharalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ankelu`
--
ALTER TABLE `ankelu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `audios`
--
ALTER TABLE `audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `balli_sasthram`
--
ALTER TABLE `balli_sasthram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bhagawatham`
--
ALTER TABLE `bhagawatham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bhagawatham_menu`
--
ALTER TABLE `bhagawatham_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bhagawatham_submenu`
--
ALTER TABLE `bhagawatham_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bhagawath_geetha`
--
ALTER TABLE `bhagawath_geetha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bhagawath_geetha_menu`
--
ALTER TABLE `bhagawath_geetha_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bhagawath_geetha_submenu`
--
ALTER TABLE `bhagawath_geetha_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bhargava_panchangam`
--
ALTER TABLE `bhargava_panchangam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bhargava_timeslots`
--
ALTER TABLE `bhargava_timeslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `child_birth`
--
ALTER TABLE `child_birth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child_birth_variant`
--
ALTER TABLE `child_birth_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daily_horoscope`
--
ALTER TABLE `daily_horoscope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gowri`
--
ALTER TABLE `gowri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gowri_timeslots`
--
ALTER TABLE `gowri_timeslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grahalu`
--
ALTER TABLE `grahalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grahalu_submenu`
--
ALTER TABLE `grahalu_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grahalu_tab`
--
ALTER TABLE `grahalu_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grahalu_tab_variant`
--
ALTER TABLE `grahalu_tab_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grahanam`
--
ALTER TABLE `grahanam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guninthalu`
--
ALTER TABLE `guninthalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hora_chakram`
--
ALTER TABLE `hora_chakram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hora_timeslots`
--
ALTER TABLE `hora_timeslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image_category`
--
ALTER TABLE `image_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `important_days`
--
ALTER TABLE `important_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kaki_sasthram`
--
ALTER TABLE `kaki_sasthram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kalalu`
--
ALTER TABLE `kalalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karanam`
--
ALTER TABLE `karanam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karthi_vrusti`
--
ALTER TABLE `karthi_vrusti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karthi_vrusti_variant`
--
ALTER TABLE `karthi_vrusti_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kolathalu`
--
ALTER TABLE `kolathalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kukutasasthram_menu`
--
ALTER TABLE `kukutasasthram_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kukuta_sasthram`
--
ALTER TABLE `kukuta_sasthram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lagnam`
--
ALTER TABLE `lagnam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahabharatham`
--
ALTER TABLE `mahabharatham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahabharatham_menu`
--
ALTER TABLE `mahabharatham_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahabharatham_submenu`
--
ALTER TABLE `mahabharatham_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monthly_horoscope`
--
ALTER TABLE `monthly_horoscope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `month_festivals`
--
ALTER TABLE `month_festivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `month_panchangam`
--
ALTER TABLE `month_panchangam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `moudya_dhinam`
--
ALTER TABLE `moudya_dhinam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `muhurtham`
--
ALTER TABLE `muhurtham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `muhurtham_tab`
--
ALTER TABLE `muhurtham_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nakshatralu`
--
ALTER TABLE `nakshatralu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nakshatralu_tab`
--
ALTER TABLE `nakshatralu_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nakshatralu_tab_variant`
--
ALTER TABLE `nakshatralu_tab_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `navagrahalu`
--
ALTER TABLE `navagrahalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nava_grahams`
--
ALTER TABLE `nava_grahams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nava_graha_pravesham`
--
ALTER TABLE `nava_graha_pravesham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `neti_articles`
--
ALTER TABLE `neti_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `old_articles`
--
ALTER TABLE `old_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pakshamulu`
--
ALTER TABLE `pakshamulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panchangam`
--
ALTER TABLE `panchangam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `panchangam_variant`
--
ALTER TABLE `panchangam_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pilli_sasthram`
--
ALTER TABLE `pilli_sasthram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `poojalu`
--
ALTER TABLE `poojalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `poojalu_submenu`
--
ALTER TABLE `poojalu_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poojalu_tab`
--
ALTER TABLE `poojalu_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `poojalu_tab_variant`
--
ALTER TABLE `poojalu_tab_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prasadhams`
--
ALTER TABLE `prasadhams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pushpalu`
--
ALTER TABLE `pushpalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rahukalams`
--
ALTER TABLE `rahukalams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rahu_yamagandam`
--
ALTER TABLE `rahu_yamagandam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ramayanam`
--
ALTER TABLE `ramayanam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ramayanam_menu`
--
ALTER TABLE `ramayanam_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ramayanam_submenu`
--
ALTER TABLE `ramayanam_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rashulu`
--
ALTER TABLE `rashulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rasi_names`
--
ALTER TABLE `rasi_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ruthuvulu`
--
ALTER TABLE `ruthuvulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sakunalu`
--
ALTER TABLE `sakunalu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sakuna_settings`
--
ALTER TABLE `sakuna_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shivapuranam`
--
ALTER TABLE `shivapuranam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shivapuranam_menu`
--
ALTER TABLE `shivapuranam_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subha_muhurtham`
--
ALTER TABLE `subha_muhurtham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subha_muhurtham_variant`
--
ALTER TABLE `subha_muhurtham_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `telugu_months`
--
ALTER TABLE `telugu_months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `telugu_samkrutham`
--
ALTER TABLE `telugu_samkrutham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `telugu_sethakamulu`
--
ALTER TABLE `telugu_sethakamulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `telugu_sethakamulu_menu`
--
ALTER TABLE `telugu_sethakamulu_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `telugu_sethakamulu_submenu`
--
ALTER TABLE `telugu_sethakamulu_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `telugu_weeks`
--
ALTER TABLE `telugu_weeks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `telugu_years`
--
ALTER TABLE `telugu_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thidhi`
--
ALTER TABLE `thidhi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thidhi_addhi`
--
ALTER TABLE `thidhi_addhi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thidhi_variant`
--
ALTER TABLE `thidhi_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_category`
--
ALTER TABLE `video_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `video_post`
--
ALTER TABLE `video_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vruthulu`
--
ALTER TABLE `vruthulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `weekly_horoscope`
--
ALTER TABLE `weekly_horoscope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yearly_horoscope`
--
ALTER TABLE `yearly_horoscope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yearly_horoscope_variant`
--
ALTER TABLE `yearly_horoscope_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yogam`
--
ALTER TABLE `yogam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
