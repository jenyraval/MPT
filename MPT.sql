-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2022 at 09:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MPT`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `scope` text NOT NULL,
  `totalpentest` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `size` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`id`, `title`, `type`, `scope`, `totalpentest`, `score`, `size`, `description`) VALUES
(1, 'FinOps', 'WebAPI', 'Timebound', NULL, NULL, 'Medium', 'Financial operations box, for managing and calculating overall expense and taxes with respect to sales.'),
(2, 'TravelX', 'MobileApp', 'Default', NULL, NULL, 'Small', 'TravelX is new mobile application in order to manage employee business travels. '),
(3, 'Sales Proposal Tracker', 'API', 'Extensive', NULL, NULL, 'Large', 'These APIs automatically tracks and creates analytics for the sales leads generated.'),
(4, 'HRM', 'ConfigReview', 'Default', NULL, NULL, 'Small', 'HR management box of linux');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `assetname` text NOT NULL,
  `high` int(11) NOT NULL,
  `medium` int(11) NOT NULL,
  `low` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `assetname`, `high`, `medium`, `low`, `total`) VALUES
(1, 'FinOps', 12, 2, 4, 18),
(2, 'TravelX', 2, 1, 2, 5),
(3, 'Sales Proposal Tracker', 1, 2, 2, 5),
(4, 'HRM', 12, 2, 4, 18);

-- --------------------------------------------------------

--
-- Table structure for table `issuedetails`
--

CREATE TABLE `issuedetails` (
  `id` int(11) NOT NULL,
  `assetname` text NOT NULL,
  `issuename` text NOT NULL,
  `description` text NOT NULL,
  `sev` text NOT NULL,
  `remediation` text NOT NULL,
  `status` text NOT NULL DEFAULT 'Pending Fix'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuedetails`
--

INSERT INTO `issuedetails` (`id`, `assetname`, `issuename`, `description`, `sev`, `remediation`, `status`) VALUES
(1, 'FinOps', 'User role can view, create and delete Organization Settings', 'Privilege escalation occurs when a user gets access to more resources or functionality than they are normally allowed, and such elevation or changes should have been prevented by the application.', 'High', 'Ensure that proper authorization mechanisms are implemented and no privileged actions could be performed by unprivileged users.', 'Pending Fix'),
(2, 'FinOps', 'CORS Misconfiguration', 'Cross Origin Resource Sharing or CORS is a mechanism that enables a web browser to perform \"cross-domain\" requests using the XMLHttpRequest L2 API in a controlled manner.', 'Medium', 'Origin & Access-Control-Allow-Origin: The Origin header is always sent by the browser in a CORS request and indicates the origin of the request. ', 'Pending Fix'),
(3, 'FinOps', 'Components with Known Vulnerabilities', 'the application is using jQuery version 2.2.4 which are affected by known vulnerabilities.', 'Medium', 'As a best practice, keep all software up to date, especially if there exists a known vulnerability or weakness associated with an older version.', 'Risk Accepted'),
(4, 'FinOps', 'Weak Cipher Suites Supported', 'Due to historic export restrictions of high grade cryptography, legacy and new web servers are often able and configured to handle weak cryptographic options.', 'Low', 'Disable insecure cipher suites', 'Pending Fix'),
(5, 'FinOps', 'XSS', 'Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites.', 'High', 'Always input or output-encode all data coming into or out of the application.', 'Pending Fix'),
(6, 'FinOps', 'Unrestricted File Upload', 'The consequences of unrestricted file upload can vary, including complete system takeover, an overloaded file system or database, forwarding attacks to back-end systems.', 'High', 'Restrict file types accepted for upload', 'Closed'),
(7, 'FinOps', 'Unrestricted File Upload', 'The consequences of unrestricted file upload can vary, including complete system takeover, an overloaded file system or database, forwarding attacks to back-end systems.', 'High', 'Restrict file types accepted for upload', 'Pending Fix'),
(8, 'TravelX', 'BSQL Injection', 'A SQL injection attack consists of insertion or “injection” of a SQL query via the input data from the client to the application.', 'High', 'Use of Prepared Statements (with Parameterized Queries) is recommended', 'Pending Fix'),
(9, 'TravelX', 'IDOR', 'The application allows any authenticated user to access any details from other users', 'Medium', 'Each use of a direct object reference from an untrusted source must include an access control check to ensure the user is authorized for the requested object.', 'Pending Fix'),
(10, 'TravelX', 'Weak Cipher Suites Supported', 'Due to historic export restrictions of high grade cryptography, legacy and new web servers are often able and configured to handle weak cryptographic options.', 'Low', 'Disable insecure cipher suites', 'Pending Fix'),
(11, 'TravelX', 'XSS', 'Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites.', 'High', 'Always input or output-encode all data coming into or out of the application.', 'Pending Fix'),
(12, 'TravelX', 'Username Enumeration', 'The app provides different responses to incoming requests in a way that allows an attacker to determine system state information', 'Low', 'Ensure that the application does not reveal existing user names and any data associated with them', 'Pending Fix'),
(13, 'TravelX', 'Username Enumeration', 'The app provides different responses to incoming requests in a way that allows an attacker to determine system state information', 'Low', 'Ensure that the application does not reveal existing user names and any data associated with them', 'Pending Fix'),
(14, 'Sales Proposal Tracker', 'XSS', 'Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites.', 'High', 'Always input or output-encode all data coming into or out of the application.', 'Closed'),
(15, 'Sales Proposal Tracker', 'IDOR', 'The application allows any authenticated user to access any details from other users', 'Medium', 'Each use of a direct object reference from an untrusted source must include an access control check to ensure the user is authorized for the requested object.', 'Pending Fix'),
(16, 'Sales Proposal Tracker', 'CORS Misconfiguration', 'Cross Origin Resource Sharing or CORS is a mechanism that enables a web browser to perform \"cross-domain\" requests using the XMLHttpRequest L2 API in a controlled manner.', 'Medium', 'Origin & Access-Control-Allow-Origin: The Origin header is always sent by the browser in a CORS request and indicates the origin of the request. ', 'Pending Fix'),
(17, 'Sales Proposal Tracker', 'Weak Cipher Suites Supported', 'Due to historic export restrictions of high grade cryptography, legacy and new web servers are often able and configured to handle weak cryptographic options.', 'Low', 'Disable insecure cipher suites', 'Pending Fix'),
(18, 'Sales Proposal Tracker', 'Username Enumeration', 'The app provides different responses to incoming requests in a way that allows an attacker to determine system state information', 'Low', 'Ensure that the application does not reveal existing user names and any data associated with them', 'Pending Fix'),
(19, 'Sales Proposal Tracker', 'Username Enumeration', 'The app provides different responses to incoming requests in a way that allows an attacker to determine system state information', 'Low', 'Ensure that the application does not reveal existing user names and any data associated with them', 'Pending Fix'),
(20, 'HRM', 'User role can view, create and delete Organization Settings', 'Privilege escalation occurs when a user gets access to more resources or functionality than they are normally allowed, and such elevation or changes should have been prevented by the application.', 'High', 'Ensure that proper authorization mechanisms are implemented and no privileged actions could be performed by unprivileged users.', 'Pending Fix'),
(21, 'HRM', 'CORS Misconfiguration', 'Cross Origin Resource Sharing or CORS is a mechanism that enables a web browser to perform \"cross-domain\" requests using the XMLHttpRequest L2 API in a controlled manner.', 'Medium', 'Origin & Access-Control-Allow-Origin: The Origin header is always sent by the browser in a CORS request and indicates the origin of the request. ', 'Triaging'),
(22, 'HRM', 'Components with Known Vulnerabilities', 'the application is using jQuery version 2.2.4 which are affected by known vulnerabilities.', 'Medium', 'As a best practice, keep all software up to date, especially if there exists a known vulnerability or weakness associated with an older version.', 'Pending Fix'),
(23, 'HRM', 'Weak Cipher Suites Supported', 'Due to historic export restrictions of high grade cryptography, legacy and new web servers are often able and configured to handle weak cryptographic options.', 'Low', 'Disable insecure cipher suites', 'Pending Fix'),
(24, 'HRM', 'XSS', 'Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites.', 'High', 'Always input or output-encode all data coming into or out of the application.', 'Pending Fix'),
(25, 'HRM', 'Unrestricted File Upload', 'The consequences of unrestricted file upload can vary, including complete system takeover, an overloaded file system or database, forwarding attacks to back-end systems.', 'High', 'Restrict file types accepted for upload', 'Pending Fix'),
(26, 'HRM', 'Unrestricted File Upload', 'The consequences of unrestricted file upload can vary, including complete system takeover, an overloaded file system or database, forwarding attacks to back-end systems.', 'High', 'Restrict file types accepted for upload', 'Pending Fix');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pentest`
--

CREATE TABLE `pentest` (
  `id` int(11) NOT NULL,
  `assetname` text NOT NULL,
  `targets` longtext NOT NULL,
  `type` text NOT NULL,
  `focus` text NOT NULL,
  `creds` text NOT NULL,
  `roles` text NOT NULL,
  `notes` longtext NOT NULL,
  `tech` text NOT NULL,
  `env` text NOT NULL,
  `whitelisting` text NOT NULL,
  `sens` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `scope` text NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pentest`
--

INSERT INTO `pentest` (`id`, `assetname`, `targets`, `type`, `focus`, `creds`, `roles`, `notes`, `tech`, `env`, `whitelisting`, `sens`, `startdate`, `enddate`, `scope`, `size`) VALUES
(1, 'FinOps', 'https://organisation.finops.io/\r\nhttp://finops.in/', 'WebAPI', 'OWASP top 10', 'SignUp & Create', '1. Admin, 2. BU, 3. Analyst', 'Contains sensitive information and data from sensitive business units, do not try active or persistent exploits.', 'php,mysql', 'prod', 'No', 'No', '2022-08-17', '2022-08-31', 'Timebound', 'Medium'),
(2, 'TravelX', 'http://travel.internal.com:443', 'MobileApp', 'OWASP top 10, SANS top 25', 'Connect with SPOC for credentials', '1. Admin, 2.User', 'It has issues around BOLA implementation.', 'python, flatter, react, timescaleDB', 'preprod', 'No', 'Yes', '2022-09-02', '2022-09-09', 'Default', 'Small'),
(3, 'Sales Proposal Tracker', 'https://sales.prop.us/', 'API', 'OWASP API top 10', 'SignUp & Create', '1. Admin, 2. Caller', 'Open API spec can be found at respective swagger directory', 'php,mysql,jQuery', 'qa', 'No', 'Yes', '2022-09-01', '2022-09-30', 'Extensive', 'Large'),
(4, 'HRM', 'http://www.orghrm.us/', 'ConfigReview', 'CIS benchmark', 'No Authentication Required', '1. root', 'Linux box', '*nix', 'qa', 'Yes', 'Yes', '2022-08-09', '2022-08-11', 'Timebound', 'Small');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuedetails`
--
ALTER TABLE `issuedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pentest`
--
ALTER TABLE `pentest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issuedetails`
--
ALTER TABLE `issuedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pentest`
--
ALTER TABLE `pentest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
