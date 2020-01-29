-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 06:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olongapo2`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` int(10) UNSIGNED NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old` text COLLATE utf8mb4_unicode_ci,
  `new` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `type`, `auditable_id`, `auditable_type`, `old`, `new`, `user_id`, `route`, `ip_address`, `created_at`) VALUES
('01478a93-2b0a-4650-b644-dab6f14efe2a', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uDbOr1QwxEOyQ18Ezh9owa3dKVQKoZTCRboDq3pIaeqZeNUX5ohVREI2V0xr\"}', '{\"remember_token\":\"r4NxLOeidyMq14JLSEeIW94rGt4byI3HxzyHCa9CHw1cBJ868gF24GwxrhP0\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 18:54:41'),
('015a05ce-3e57-4446-a6e2-1443f0c2a26c', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"K1A3QWIfbUZDf3E9nXf4yr1W6BnPIf3WGtabqtiywIq8BctfL4yEmEPOJFtK\"}', '{\"remember_token\":\"BBXj7AQPX9rea4fhXUYYQEuN1z4tVr6XIAzadm33irmBvt6nhRA7LHwD2WxK\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 19:54:29'),
('01e94322-52dd-4ff5-af83-7d51dd17b4f0', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"C3mauBqiScwbuOC8jmiIXXLSn4EC8V0H1nHQIArNIJqW13fKWavMpxtylg7t\"}', '{\"remember_token\":\"PgwhNhQqhRrUyjhSt3UotCookftLGCH04vafeB5T0shEAkaiUBp8r43OCPry\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-05-02 23:43:51'),
('02031df5-5fc8-4051-804f-5876456883ab', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"u2m9n1tS9QsY8A7i6tHLgMA7AoDHzMmXUQfzug41OG0rlkfxe9u0YqQ26XmI\"}', '{\"remember_token\":\"4Ma0hy3EmFdQTitKG6D6wCXtXDNxpBm7xpLhBND5o9wdegL7XEle72637N8I\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:12:30'),
('02216b49-eed3-4757-8f16-7e0142b00907', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"XZHf5aUmmZLMxnGbU8EW4VnuGw5ZZxqFIpoXzZz0mOTrfd2j1gQIZ1NTKziV\"}', '{\"remember_token\":\"fZVSHSS9kNXSeT51rNtoGdKVa8pdcFYWK6pXa4wgPAoP9nhAf8rliIKtj0dW\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-11 22:08:57'),
('0269d61a-3cbc-4c79-b654-813bddb1c719', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"LaPwtsSPFqVHIaduaOdF41FD2nmrz7VXMtVSoXBXbytknLQfeO22fIoF8ulB\"}', '{\"remember_token\":\"cXUF46J10cx3PB4kS5j11i5MPUvFsSC54ZDHP2ETnvfRAvT0cBCGZGTjF4BY\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-22 17:58:29'),
('02816969-9585-4088-88f8-9703cb6bb465', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qizDZhD5lucFiF6cccQDS9Y2bGASTmKZKDSHFYHPvpZb72JgJndHm8s5lQaD\"}', '{\"remember_token\":\"X3tv8ouRvQUBDDEii0bcqrm8ibPRpVBGQmH1nnLAR1bMmUHmUJ7GaJG2xGUN\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 04:29:40'),
('02c73297-32f2-4b92-94c7-434316d13d45', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"v2nuwdQR72LV46DWcR1F3RcwWcCBDSr6sxd44mghGF0ZEklZaafGVk0kdVJA\"}', '{\"remember_token\":\"0MjJD04zItyd4FoImbybqTJgylxsAZ1Blv6f6I9vllvHeMG6soaZr44ORcSL\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:01:51'),
('02ecede2-986c-453f-8447-75aff783f8cf', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"tfP4TW0RFsT3t2RhtW4HKQFSpBtXV5b612rucUjWt9woCCeG9YzUbLwpWqsS\"}', '{\"remember_token\":\"tEZ6I0eGKUeFi4t9IcdyTSFcxBWp6BGb6qzFr10LisHPWHMhckaASSv3Ho2H\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 22:04:49'),
('02fdf6e6-5ee7-49f7-9cf8-2b5056d6e18f', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"EZEkZRxrR6fFKug01U4OEFgU7pBeMz6aYPMYCceAyevksYzPVGV2BJvqg4gW\"}', '{\"remember_token\":\"ONWsx8UCcJ2vxNiToswZ17OcYHRU38ISIwvdwPSdC9JZeg7bgsVy9uLwgUfk\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 22:50:28'),
('036ff5c4-91d6-43d8-b5b4-c7052bedb3e2', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"UTEy3rRkCsXFk8NgxazfZ37MuGplAGAktFp7c8US0EhI2kU6hM7oJnoxmgYM\"}', '{\"remember_token\":\"anC44uTQwW7G6nKr4b8l1ycefqgwWAsXy28BKh5ELD0E5OJXAhJkdHrnZdnf\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 00:34:45'),
('03db8627-2d26-4b26-8438-af9089147599', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"y8WSOeOwqowsavhB2g3xFEOj5jcsnrRTHAaLQa3BxTmKlMyX1DrY4tkKlc48\"}', '{\"remember_token\":\"3fvZZsuixfnklTBtk6QWRnk0gNzLeP059scrogSlnjx3RnkHRIrGCcXZzc0j\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:12:24'),
('040648d8-fa4a-4061-9f2a-9ad78d74b7b3', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"fdFozjdg0ftEaWeBAJ3oB7lmPZJbRRD1UtMe0CnOPFs1cB2oIAafKyARrVVg\"}', '{\"remember_token\":\"kRXt7EOkvETudO9jeexsRP3Hhg5Epi78u6SERUYRUZCNrC0otERDhmuq8ORi\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:31:59'),
('047dbe41-23d6-4e06-a3c0-4e938eba8858', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"n9MAXiyRqqviTiiOKeYAT9Nb5wddsQdcEyAXRznt7ylfm7eCF3cHAzdKkCre\"}', '{\"remember_token\":\"y8WSOeOwqowsavhB2g3xFEOj5jcsnrRTHAaLQa3BxTmKlMyX1DrY4tkKlc48\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 18:45:05'),
('04ebc322-2949-406b-a06c-314258e9a00e', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BTobePewYWLMo3eQDRQK30kzv7AqUC8Tc14CaTgSJoRBJfweWh1hStuH2pm4\"}', '{\"remember_token\":\"ZbVOXqkaq1vEi7OJ5DSbF42658gqy1lPfcZ0y2aKImVkzy04cV1fQfKMRtzp\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 18:05:41'),
('04f71c5f-5078-4e43-90ba-fe7c13fc87f3', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"pTv7xw7nnVdrLtVLvKU5dvpmExrSCpFRtiVQOp8Q3QB8v3v1oPRkmPYoMy8n\"}', '{\"remember_token\":\"TcKIz8JUaxtqtAvmgLXjoiW1pLToCW7bKIXG23lfpSaNjP9FxP7vU7dd3vo9\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 17:33:51'),
('0528fedb-017f-44e0-baf5-bd52d6a90b7a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"hIIlfHDtZgzGvTo01UWfiCHeJp7krbHiHodD9WgXiQJRK82MLgbWNIIrPha9\"}', '{\"remember_token\":\"sDw8026N7V9ty7ZTwTGFa6XDewu9O3QbTDzZ9EHtfZw9EV64kLunIhbz9etl\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 16:10:30'),
('0539e109-4959-4e14-bd40-99d2ba11f8c0', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TcKIz8JUaxtqtAvmgLXjoiW1pLToCW7bKIXG23lfpSaNjP9FxP7vU7dd3vo9\"}', '{\"remember_token\":\"dPh6yMxG6I8PljxTAP2xIgsEn2aYyDKFLKrzO096gPyX4DvsvoVJpS5dGfX9\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 22:55:06'),
('067be185-51c1-46c2-8ed3-16a0908de12d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"9xmasuNZfXfsiqNuHXnYplASv2U06MLcOHX14feFtxeL6nSENmOi8rTREDzl\"}', '{\"remember_token\":\"a8Rmg2jlaJN1DiVTcgyhfAjygRljzHLK8uI9PviC3P5trS4iYVUjgaNMtnYm\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-22 18:15:53'),
('0711ed39-66d0-40db-975d-e1c2bfb24fa3', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"DYWItJTIbBcI9WdlxJsE9vReHAwPmO10ywLrcIefbvFLlH9nNqxyf7Wf2mLA\"}', '{\"remember_token\":\"B3Wbk4K7T883OCOY5ujlxd7mVG4QlsGdKErlJOlBVPMqDMhk8PfQDq8mGAhq\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:11:41'),
('07545bcf-82c4-462a-adac-58ce73b2955b', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"m04IcljNF3EZxKSMXUzYvYwSMBbdC1ayRTkOzCebfpSvq1hb8VMKFqccDdPC\"}', '{\"remember_token\":\"rwtLdhId7lwPJcwyc3nLWDXCdeRU1LgWjXwiXnQqUA9e0HRfRRao0B1A7GPd\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:11:45'),
('082433fe-daa9-4043-ac09-bd8d7ab4a862', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"jJXDTdHv1Cj8QCLAK9NmdC23kq6mjWy3354cxPvSCRFVzobyfzlwT7c0qbx9\"}', '{\"remember_token\":\"7BI7VCuujBRGFbOqaPS5f6CuToDDVF8IfFUiU5GMEuQFciXQTfKa5D5VctEl\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:54:14'),
('087056e7-b7e6-490b-bf85-f2c3b1e3b3aa', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Az5unlY0lFTiTFNX8j4yf3uPoOumJclD6HqHEUKZftfqeF809SLcg8FHqTTv\"}', '{\"remember_token\":\"hIIlfHDtZgzGvTo01UWfiCHeJp7krbHiHodD9WgXiQJRK82MLgbWNIIrPha9\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 23:06:26'),
('088f9b5e-7b6f-4558-a0af-495744c52b81', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ib0Bm2O5aebKkMgKVdujRpYARSqLgHWowqGqzTz6kE7O8GwVDQ5OToVm5hC8\"}', '{\"remember_token\":\"wlZGfubUEJTwzOBv7TrrVQrb7ENe3tSQUyazqS5zy8VFXL3kCe4mv3wjdcke\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 16:30:55'),
('09e3c335-ca33-4889-888c-75ed3e981046', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wbdxtz3zKYAV2LSyWe87aR3B2Ci9A45Z3fEwHr1Cr2F80UOWWxdESV1YKwph\"}', '{\"remember_token\":\"5vrCGg34zjXkJMWk2IbVqy1CmqXUJsCsw36VpOdsBDaIOxYqMD0EN0mbU60G\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-10-15 00:26:05'),
('0a70239d-962a-4d0d-acab-3125359df355', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"puzagXuCZ0fjsNlDCg2Q86ltZ9RygxC2Z40PAFernL3vuMbV6XehLMylVEsa\"}', '{\"remember_token\":\"tl6feyJBWdq037OQOBvCA1uablAG98sgoHQqEHMpTeJWOhAyyK70BfzcQW6x\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 17:58:20'),
('0a822071-472c-47ee-a740-257ee2a80a2b', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"fA6fGfq4yZL4Vpbi4NSWUGIAGN3eNrTM6JDTziqdicfxy5IqmthKVAqxn7k0\"}', '{\"remember_token\":\"5rsAITvA7ns9O4Ly7ZlArYCcVhqcq820sNL8Wy0JTGuOdx9HjTnZzyabyJqT\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:23:44'),
('0c094222-1d4b-4995-bb43-f09611628f8e', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"gLLkOJtaE93SYfNo3bUDCI4fP0oiOvGv3IbnsR7EIy1uUJxDItAFuWZ10J33\"}', '{\"remember_token\":\"ZhAhNRVSROvUWRS8CViZl9OUwJ5DehzAWeMtBMt1DlaOFORLkRxGFT79pdMs\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:51:47'),
('0c1afdd2-9ae9-4dd6-a96a-cb539225b05d', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"c5uTeGs3zS5E2zsqN5NYTHPKy4YgLW2nOGmRgkNWmA0wOsGM3qbKBD2Gc6h1\"}', '{\"remember_token\":\"EZEkZRxrR6fFKug01U4OEFgU7pBeMz6aYPMYCceAyevksYzPVGV2BJvqg4gW\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 20:16:06'),
('0cfb4975-6d6e-4628-a583-beee8cdc6562', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"8z3iv7yVlEAbii0Nqrj9OcCRsNIVBYwTqPFQP5tJc1CEmMGYp2ND9RKGYDZv\"}', '{\"remember_token\":\"66s2WBRPEVtigHC0csBz1HEkndUTA98ZxM83FqoLru9rAqbvfY1HgNuPOuEZ\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:42:50'),
('0cff4c60-614c-4237-a686-1c22e12a4371', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"FFhH81KdIuFOgiinCv5fZ0MF3SfFU7j4mDN8H4hwhTqLIaTETxwtQMvdAHwx\"}', '{\"remember_token\":\"uzUd3epp9YusTL6NFyltASH3qPSGc7i4GvM0EdtrooZ0RzzUDqKYIFDE0Ii7\"}', '6', 'http://localhost/olongapo/public/logout', '::1', '2018-01-29 23:12:17'),
('0d8fa9bb-e76b-4b89-8437-0b8c849caa26', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"cXUF46J10cx3PB4kS5j11i5MPUvFsSC54ZDHP2ETnvfRAvT0cBCGZGTjF4BY\"}', '{\"remember_token\":\"i7JVHkagNir5zKhrq2B0L3OI1IssZ1Z1mdMEOHQuomBerDt0OdvCOoxBTisd\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-22 17:58:47'),
('0e441fb2-1862-455a-9135-41aa012de2e9', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"GY5tMCgAqzxbs46frvYTJmiJG33zbjLJNc1topt24GT4cp3kCYbLyvlRIlVZ\"}', '{\"remember_token\":\"5l1ZNhjo7QKrwiIBiJIoS6WTtMoh0ypErXFRGWveYECvy3b27kcqaIbo8YhS\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-11 23:31:16'),
('0e8e134a-d6c0-4af1-9bfa-87f302dbe6a4', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"FqMoEEEKxKVpAbBp0qaIovAYDLFXNWDXMYGnY9nsxJkEIaHRKFL37uyewfEn\"}', '{\"remember_token\":\"iWjYmP6PPgosQiq90MYzZNOTSVtmVUY6RVBJVHbcjrZX9SRrAw882kSvPHXC\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-05 23:57:14'),
('0e9f864a-34e9-4098-9fd9-3e030b1550ab', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"k2gyCJZuFIIHUw3K6hlxQOVQWNEIfQulobqTuStZA8LCDGik9y0NQ0eHkLk7\"}', '{\"remember_token\":\"igdo8gGQ6bgelpcIq93qOHjsoGkeD1gDGuULWqcChxChXe2U5rZmisIgxu0D\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 17:33:35'),
('10919523-465c-4d36-b2ed-c6a5f7f973b9', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"eCLlvPpAq9H0GdAZlFavUErAHr2d1HchllaY3roMr5Bm8N9ofk3m2sULAz4P\"}', '{\"remember_token\":\"lavWEMDeyPHCAMngnpXuF2Dgueth0uoulGhc6OH7ySJTwjWRbQbOBgda726f\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-19 00:14:58'),
('1094d9e5-160d-4118-95ba-240d63dae6e7', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"zsGFC693Gp7Ek8ARReo47h1DRE0diypEJGQE4yO3dbs9R3locgBSIR9OZtnr\"}', '{\"remember_token\":\"yP6cTuTc2RqvqMxvJlu7nNiIGS9kitqzWR6SEyQd3A7bEJkdWilFNr6i5ihp\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:42:22'),
('111aafa4-d373-4703-aaac-10eef4e878b9', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"fMcBUrmePgWUtt4eWSkg3t34j9u1LIP1V1EUt1ND6fPTHG2u3RHMih21JLPC\"}', '{\"remember_token\":\"soqPzRfZcxPl7Q6Ue1HPAoLyIHzMlvLlVceRuSDpZBSqPe9MSzC86SSJyHPJ\"}', '6', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 00:46:26'),
('1156e796-f227-4262-b621-78d3f3488969', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5DQM8Eepaqi2aaHXLg1foyPVG9PRQkoYl7MhFjIj9TH9DhIR1bZP9QWwQMuz\"}', '{\"remember_token\":\"eRg8L7pK23R2F2myKYeXt9mXUJgwZrNgTZs50dublKrGNrM45HTkqrlAOIZQ\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 01:00:12'),
('118b842b-9d83-4635-82c3-4b54b33f6e2e', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"NH08pbDOTIpMfwUqnbqgnsi1Umb1mJxv0YUGpevQTk0zZ0JUQKpClBJ76rVI\"}', '{\"remember_token\":\"xfd0u74w3PGwsNe8rE3aTW42EzvIESDoat04zC40Kp7wT4jzN9n5bX6NViPG\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 17:06:32'),
('119ba056-1816-4174-8914-c53ea478960f', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"mjH3JHoxJPLLXv2LatiH2B0C3uiPT9wKlZpiBFB4c2dWBAbhmrKGzjHvAwdo\"}', '{\"remember_token\":\"RqqzXIApuOyVR159Y97RP9SRo0t6mF7h6Tqpmyse8IEnGdEYJIRO5pst67wB\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 01:02:08'),
('11aed274-3cea-419a-8c35-7ecd594dc412', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BCGQne3gkZ4kla8Mn3vyZUkMuf8RaesgsNsEZsUyZlPorXYjniVPqj9gwYb3\"}', '{\"remember_token\":\"qwHOFjopDBDygApFqti6RQYCc0IBiURD7a1E6ywPHsbYWJITloJ6AUrKgX28\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:39:28'),
('11aeda56-d884-44c2-b94c-9776c806c963', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"8olGgr2KIY7dtqXOFHc6e99J9OQxCTYQnjmutM4A946xb9c7kBi8boIFLbdX\"}', '{\"remember_token\":\"38L7H1n7Ov0eRRjZza6TRUImEij5V4QHFzZWTZmknCYKgzCfGcGQ2fNMp83y\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:02:11'),
('11eecd84-d5c3-4f5d-9b53-5a13d3374efc', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"7oqRgonzseOkwJrfweHdAEF1qQ84EvBzZxRVAPSRZc39XMqOaLF4ewt3tSy1\"}', '{\"remember_token\":\"HywbQotLOEDRgwedV22z4CtkCz2cxXPUDBEIQ4ALMeo8BZMxNxiIHBlzMTSv\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 08:27:06'),
('1222746d-6db5-4790-a35c-ea175e74d320', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kRXt7EOkvETudO9jeexsRP3Hhg5Epi78u6SERUYRUZCNrC0otERDhmuq8ORi\"}', '{\"remember_token\":\"bWl0QycB7chCi5DdbdQgRNeHZvA5eht04kOnvV7ye6efeTYf6uQEGuRPyL3C\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:36:41'),
('124c11b1-f18e-4a6b-b6cc-9447431b381b', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"abpVSmpM9u4tyo8s0h2tPk339KCRr2TbzULDthz0atKBvU8n0HF9JqY1Lijv\"}', '{\"remember_token\":\"CRkqAY1u2RpV6YorasSusznCMMNI1oeC66wHZZ7NcGHCR2zczwh5xYubr0xp\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 22:43:50'),
('13e3975c-9b61-4df6-b7a9-fdb78c4eb5c3', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BzjbDhJ5kyydO0xMlu3ZdaVUehldSG9zFGfA0SJxZNIcwaIKYWQ5oOMRTiRL\"}', '{\"remember_token\":\"GX1iZq1nQIhjBmPbB07NejoT3B4QnQ95SzwrCzYh3VaKXyjRKjZMBIk44QeY\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 21:17:24'),
('13f0ea2b-114e-47d0-8a11-993ac5f9baad', 'updated', 13, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"X2QYzzaxBn2QIqCh9OxLzbXuXI4ey8vV4IGgou4hmJhwEqbUIHB3uyLRLX7C\"}', '{\"remember_token\":\"wjyofjc4yBexBLFBQ1TWjEthvoKmnq1fcDLHc7xD3A1jLqt6CSHMiuvSyucN\"}', '13', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:55:28'),
('14310047-5111-48f0-9988-5bc69cee9950', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"q6kqFN9r1i0xeZRcs56vVbI7wUhD9zqIsUMqnXHgBXSDcoYL0HqIlWX4IKaC\"}', '{\"remember_token\":\"JlHz1IWqrGe1vwL0c1tg0wJeq7AES7TbkgEuM0733rk7pPnISzWo6xHHPT2T\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 00:19:43'),
('1469138b-4b53-46bb-bc20-19e1040129df', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"iZBnwkFg3zgPGgFN5SCrlNEtQS63MivgQybPsNIxtp30s9hLfTUkyq4tbjZD\"}', '{\"remember_token\":\"0bAPitFBrlCtVLeL9yGwZ0yRUyldPRkJw09mFsUOLB938Ige23rQumuVzwGb\"}', '4', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:19:02'),
('15364847-0803-473a-a44a-790e6b768d6c', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"tZpfG0JaUTs4UQwW6RoGNsVnbiDmEySWQNa9cBqj8MDZeIikl9wlrRnr53J7\"}', '{\"remember_token\":\"pVtgRBKXCUvBC2viGo4ItgyBjVE5V6xiLQ31DOtP9RXHtyhObSphwUGsSSZC\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-18 18:35:02'),
('15cdedce-9fe0-416a-999a-60db437d7bfc', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BoxXcRRYVx8dmnNuMzqCK3Ua7NIDvK4Kd4PxZAwoKdeqLbusSmpbwekdYeJ9\"}', '{\"remember_token\":\"VdrDBXn6xXLoUJD9oQK1wdLrH4lx1lZ0EY1DfpnqLPT3tXbWJ1Vk2uUozGMW\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-03 23:40:50'),
('160efada-2f83-4ee8-940d-7829619ff882', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"YrySnXmjSrOlOpilIlENQf5Ep4VgGubLiAYjIy8E13qZs9yZlyOH0uF5Bn3n\"}', '{\"remember_token\":\"0ekJ4FPU2AEXH6ls2VJo6HkyZ0lrW3qXmdGxjdRB38OlzVg3TDTjTNDHphDT\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:14:51'),
('16179650-a2d0-4bf1-843f-9df52f1c14e5', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5QW9wsd2xDYmnq3Jd9uuNafzvzAVFu5jPhxO9qGN0kc1CdZ6LZSD2j8DrHsk\"}', '{\"remember_token\":\"9e2wwxKfzhnGUEKXnU5sMzYTq9wfme5qDMFkM84Xn984emnCRS3F783ba2aC\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-06 00:04:54'),
('16464dc0-776c-42e5-831d-76148e866ee4', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"NdFMBOBkLdSDn8St4zvcNSowvpxJQ8PJwx4Ja6UTzwLTzMoJs16FYGPILPZG\"}', '{\"remember_token\":\"miVCxkQnhl4hlYkwUJORgznLcOLJXSLQgKpV8edGyIpXSwo7etvojeGhZ3Lx\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 23:39:50'),
('17244441-9808-48c0-8917-67a9d696cdf8', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kWDgy6bcbi2ufnxTSRR07KsdWiFptyTPIdOMS9GRHpBJ64KUaerAldPhWs7S\"}', '{\"remember_token\":\"YrySnXmjSrOlOpilIlENQf5Ep4VgGubLiAYjIy8E13qZs9yZlyOH0uF5Bn3n\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:13:00'),
('17585ef2-7b1f-4fb0-9f39-8825ce7f4c67', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"80dhFBR0lSKwL9TMWQiQwl2RZs8URVXsDULgGe1l5C7CHfkddtpHSbjdJldw\"}', '{\"remember_token\":\"PUlDkwvgMkdsNfifkpZXOcgDi8SoICln6wB5Z60IyYW48i5zv0Xg898wBeMg\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 15:56:24'),
('176e1547-b264-4d74-b11a-9b9ffbb993fd', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wFTitOJb7uX2Ia8lZlrx6sRSGL7e0g7lhsKoKJ6FwkQDmGmbFx38aFSzU3vC\"}', '{\"remember_token\":\"c7l3c7ELLYbyiBdMt7UcZExzsou6z04SYiARB0AkFXoMXmxFR1mYzD9jDLDi\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:55:54'),
('1791ca6e-0972-40f5-bb91-27d87f3074b1', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"NrHemuZ8LiwZG8SOkpHtDoezsGNXRGLZWb61jyZ6cVRzE6GV5WoUWqXMV1rv\"}', '{\"remember_token\":\"LLkwh3VQZYNtT9DAYlVAf2PcanTKbaLMnVZfX7Eu2XszQj6kCv50y7inOv2L\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:54:26'),
('17cfe8b1-370c-4d84-9d7e-615b85e8ddd4', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Myy4ZT1MEsX4RFNRnm9HQEWh58XmDloEtlTWtQsDQHUMIKuOIxB3e70VXkYT\"}', '{\"remember_token\":\"vK3g1EGFPLOrLCfMUK3z5qhoTEdkKEpTBUPRD4HDemwptVIf5GBQ92gTG1FD\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 17:19:46'),
('18624be7-38db-44e7-948b-39878ac77c96', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qZn3JrKwZkzn1z1tgDABa0NyoBk676UfGGKu19aO21viyRWwrkyjC4GyFyAK\"}', '{\"remember_token\":\"ib0Bm2O5aebKkMgKVdujRpYARSqLgHWowqGqzTz6kE7O8GwVDQ5OToVm5hC8\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:38:25'),
('187013c6-6e1a-4fdc-85cc-4c809e9f3edd', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"evnoDyBvNtyYtrDozq5FJfqYUZBQD3RCNd8sf70XY1uvDPZKWo0XIVCTID5M\"}', '{\"remember_token\":\"11H36SNeVnkr9rfFlRxjhYcn5Wz0UlKPNAwyRZ0eZyOrg8rDvsywdMTV8p4j\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-05 23:58:32'),
('1886fdbb-b8e9-47a4-80d1-4b432bcf5596', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"aE5OccFKyjZJB89lIIBodYyqXNSGqvkytcD7SxIOTZj2LGaM239T2g39BoM5\"}', '{\"remember_token\":\"fA6fGfq4yZL4Vpbi4NSWUGIAGN3eNrTM6JDTziqdicfxy5IqmthKVAqxn7k0\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:21:38'),
('18988b34-298c-4004-a2dd-274f51de4cf4', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"cd58G19HOpVQdHZM3Rh2m45lEReXT1qydCtfL3KQa4p95275buDdtqqoZD0M\"}', '{\"remember_token\":\"8iqbNfIn5K8oUuXyzquXgOet5gdWgCwEm6xiROSckc0k80mo5S0IcpIsG4py\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 18:16:52'),
('18d1f8f1-7338-4715-8084-46a6fd1ce6e8', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Hcc3zvJp4PFbV2q7hZIGdnQlkHTtE9MggSJzCEHgaBpSI1VgcIa4kIYZsROu\"}', '{\"remember_token\":\"KkZmhaWaNYhMrcoEnn4vWJVQM8MfmJHgL8MLtGoewGmPggCxweVdc7AOIMdE\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:07:07'),
('18eca3e0-e83d-4b90-a2be-3784655c2c49', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0kFd2Kzc3YarsnRxnZV5uzvzejdIGKb9l25q9aKQNOEpOGdTNtOtkhFJxGxa\"}', '{\"remember_token\":\"CUjADWhdbFi1OTIycEQdSEEGgOQvmdyAEKXhfnz9mzK6bJo86i4OtLIWnn6J\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:42:57'),
('18f69863-9f1a-4146-96e2-76864f457102', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Z5b4ElmGQNirA6olTKjkQw0yfb23BmEclFwvx0Zh8GINFMNFGmkyJ8etzvYs\"}', '{\"remember_token\":\"b28eKUbx7fY5moaF2NGpDs6MaYajLXPYrX7mh7b9XI4D7CPSqm3lhEujG2ej\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:59:03'),
('18ffa116-a010-4ad4-8c9b-0560f16548d1', 'updated', 13, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"ZbBqarQZOuEiEvSuJTvYAu9wR0ogf2E4cCwz4p8PjZTBuLPfUA0NVK7ovTP2\"}', '13', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:27:20'),
('19f92ff6-874e-4ab2-a7ba-73464f34a4d6', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"P9GgAmcIo2Q1XthhoEDoWQYs2SA9EWClix1gy5sjVVVXNq0vmKKCMmVbCGHG\"}', '{\"remember_token\":\"XAzdgJwVE2owoC7adKqvkCymcKXGs5B3chVrdWK8krdZzxoyis4SbBEOBSpR\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-02 18:46:04'),
('1aa14079-18b8-41c5-867b-980acc2e2262', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0bAPitFBrlCtVLeL9yGwZ0yRUyldPRkJw09mFsUOLB938Ige23rQumuVzwGb\"}', '{\"remember_token\":\"jVmC9Z89Cpdb2geatOs8OkKW87JO5uK8GB9JzSycZL5yWXxBwABfRo1MWJpN\"}', '4', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:24:07'),
('1b793a43-1277-407a-ad6d-5caaf6da8374', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"x5eqzQYX465LVf0HqCdtjlB6CAg1HkgzKIkepcY15OJzaavE3r9S5Y25EMLB\"}', '{\"remember_token\":\"C3mauBqiScwbuOC8jmiIXXLSn4EC8V0H1nHQIArNIJqW13fKWavMpxtylg7t\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 17:53:55'),
('1bb87b7f-48ea-497c-8045-a61762188328', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"MeHd2CE3OW6fYxDwkaay5AVKbnNpV5AgUnHTCtHXGU1ZDvaAhrt87kYW4n7Y\"}', '{\"remember_token\":\"SaawRPjBiHdcwaHvPFbnVvqmGsRhQRZNJcYezXTYhhZKWbT56JyYyOq2Njtk\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:51:44'),
('1c9ac92f-cb86-4099-9ae0-3ee5ba5f92b0', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"zGChD5Fnw0vRpCk1MBaw9LOaDkU49NxjJP0k8Kr0c38HNvlpKTVmBxXDsEhk\"}', '{\"remember_token\":\"RfXe49cHBz0byW0Zdkg5VITFVEY2wxx1VpQ8cui5LRF5GjvIgWHkMmiOJ4Lc\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-18 17:35:17'),
('1d811871-a958-4f74-b71e-883994cc96ec', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"NioYGGRujntdMz4061lWYh3GD9MEB26QwODvI48wdOo0vS3aL9Q5A6WbPyEA\"}', '{\"remember_token\":\"2C7RlpYjAE1DwXJMwVCjV5Lt9LKWzQuyN6Fon1DtCRx8ev9i8SHfnE3NlY9X\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:15:08'),
('1da52f2c-3861-4b78-ab78-e90a1e8a3581', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uMosRsP4mp3ulP94UsCQ0FZ4rzqqzSbVyK5J53MHkT6iPVoC9AGwb5uFq3HP\"}', '{\"remember_token\":\"i9mfuE2c0qy0SkUti7TJDgXB9CFKRrQpiGWAkZnJVyxCV6Oh0aH3vybjoQHQ\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-17 22:58:38'),
('1dc10706-4d91-4b0a-a4c8-0a38bbd8f072', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bRRukr3JOMZr9cjFChoYkgbZhsWwmiFM7cNnzYDBnXpVkkr64qiTdRcDxtW5\"}', '{\"remember_token\":\"Ez9ELubbub2M1FCsMUMvJDjgucJ7gLwV5jBYFnG54yPEGQLa7rZoCG7rgqoA\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 19:55:27'),
('1dc1b7ba-db7e-4255-83a4-2d9a8dcf37db', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"XrJf3zZ2nnU0dHBSZmSNrNwamUD6o6ItH1NvnOYd4VAYJwPzfvOEZU8P858H\"}', '{\"remember_token\":\"0NgL7xjAt4IVCuAdQypPDNYyQpOUPVgbbI7Rt6Bo5TVJ4WORNtrmsSe6bsow\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:39:45'),
('1e54ce2e-daa4-4171-9422-8a7ca32949b7', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"M9LaONy6mZbdLj0HfBBR9Autj3yyb3M4tRDrSQWTch56dGKGSznE2SjXfNVy\"}', '{\"remember_token\":\"x1DZuldgW7hbp4it9IvCfbXnuToURYSqcg61GF00lb6upllMrFaoPIEeIciL\"}', '5', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 23:00:31'),
('1ec915f4-6800-42db-a56a-79a7c8b3d93f', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Mz8rkj982KaMBb8hySq0tuArxAcyoKHGIHnL65FfLo2hYeXo66owivdnETi0\"}', '{\"remember_token\":\"Gpf9vbsFK6lqFINMiWJLyRyEfA67Keey9whY5gNuOqs9sGLLa235iPaqH6zo\"}', '4', 'http://192.168.2.15/gso_olongapo/public/logout', '192.168.2.147', '2019-02-06 23:18:12'),
('1f67d342-a6fb-4f91-9734-402166431733', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"a49eQuHk6MDp17XP1ratR0uOBENgxtaaMYpp3P70IbazuU42SiPrn3hRVtsS\"}', '{\"remember_token\":\"Rkv1pn5mS0OkDDAZgEHX183U7azY4mG8YgerCmt6UHRbdb6wUT3xJyIbhTw4\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:59:31'),
('20066209-735f-4587-8e8a-9e89998d24f2', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"UTEy3rRkCsXFk8NgxazfZ37MuGplAGAktFp7c8US0EhI2kU6hM7oJnoxmgYM\"}', '1', 'http://137.7.22.80/olongapo/public/logout', '137.7.22.80', '2018-02-20 01:17:29'),
('2038dcc5-ebbe-4fc6-8cd4-0704805074e8', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"V9omXAM5erfb0OSaUhDq5zYJ8MqMfdEEwF5iouROxCgOuD75Qq9l3hDkjvrS\"}', '{\"remember_token\":\"BTobePewYWLMo3eQDRQK30kzv7AqUC8Tc14CaTgSJoRBJfweWh1hStuH2pm4\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 16:59:51'),
('2146ac0d-cdf0-4231-b869-bf829e4cc3f7', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"pS3tKJ1oLbVbZuGYcjb7681YIIo5w22T6FgIldBun3qKxVqzkYrIWkgnpSwy\"}', '{\"remember_token\":\"KJNAy3nW4PzeLqorT2j12JwAFheKuqknArzcPn69p5YvKmDi4MitiqjTjDy0\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 19:47:32'),
('21704159-0cbe-4de6-a7e4-37b6140347f9', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"HywbQotLOEDRgwedV22z4CtkCz2cxXPUDBEIQ4ALMeo8BZMxNxiIHBlzMTSv\"}', '{\"remember_token\":\"eV3uBn9wz4bTemTQwIs9q4m5nFA5AhWTCe4gH375lgY1As3Ee0L990T8ogpI\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 21:57:22'),
('23e69c8a-75c5-4bfe-9449-a9c035749adc', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Og0vbfSSdokr3zhzH1eWJ1l3Z7EjVuzGAe5d5wm6jTNcFAbjAQLRClOt08zD\"}', '{\"remember_token\":\"nGcebD4AxxBxkzUYJSV6TBvO9U0Uijv0UAyO9ihFwMJzt4TYV1Qv95Y3d7SZ\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 17:34:39'),
('24944da0-5dc1-40a8-83cc-d58a19275dbe', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ioIsF79eBNIseQSMOB16vKoo5Jic5XXMeoXqNjzXLyHaGryjz3gZczgyCRvm\"}', '{\"remember_token\":\"tfP4TW0RFsT3t2RhtW4HKQFSpBtXV5b612rucUjWt9woCCeG9YzUbLwpWqsS\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:57:29'),
('24cae963-6193-4d29-8ee4-9d806f305d5b', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"LdZpzNE2GjVn94ruSyrMRiLHg6PgjQXwVzySSrwaRhr8md4NkoWl5inI7iZC\"}', '{\"remember_token\":\"SRrLPMridPg1sOfAsOqt7FknvMEbEBTPQxONRf5Z8bvhy9wFtxRcGsjzP1Mm\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 00:59:30'),
('2595a839-f96f-4a6b-ab30-e84c65712cec', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"i9mfuE2c0qy0SkUti7TJDgXB9CFKRrQpiGWAkZnJVyxCV6Oh0aH3vybjoQHQ\"}', '{\"remember_token\":\"l06apGimOFawxrdqnEKf6Usgz4s5R1PEht7JeGcpytNVzCZ0AzxIbfK6IcfW\"}', '2', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:36:26'),
('25b12dca-d401-44ed-95ee-2a00a78e7018', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ADVQZmFpqEjP3XT5D7zvqrPHDRwTh25sXhZuK7jV06NllK9uDnwuIVXkMfWb\"}', '{\"remember_token\":\"PwyUYQxOS3VlMgsSz8qkpOHsYYLG7Y72oxj5vr1FraN5Lstwp7Z4UARgSnj5\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 00:41:37'),
('25c6ee54-9e48-4134-85e6-5493cbdbd82e', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ABH1laofHwINsSUdqLbUdBRA3qkqi18amGK8MewWQddoflymwSS9R7smBo3z\"}', '{\"remember_token\":\"AIN03h9QkLXEtmYfgz2kcxJbozde6HSxyZNaZKVM5GVcrpFv0FJEHLKKdUHf\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 20:55:28'),
('262dbbc7-e3af-4bce-a229-f2ddcace0161', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"2dreoXDZ4iJXBMV6TEuu6iy8IfvL25zNquTOrJWpgsCB4oeqkxYzniSzlcfc\"}', '{\"remember_token\":\"LTgMRE89ucpz2ngwHQWR0ysvq3iGMrz3HkwHZErjlyfllX30yCw8T3Tp5NtR\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 23:57:20'),
('27158f49-0d5f-47d8-9609-9f07de00da42', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"iLqERgawDGe1ZpNDV1uWFAnAemWbth7kV3LfU5GKZ5asT7TqguhyU5HI1UCy\"}', '{\"remember_token\":\"BHaoK6Jb0wRLRR0pRFXmZ1tg2rp4dkLh74kfcPuhouHHfbOsyyDWfPytHb3k\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 21:17:48'),
('273d320b-57a9-4a05-bf2d-c1fb622e3cb8', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wDA6x1qZqvGFgVhCkjpKj2KwWu6cqVg4N3OOFq5Lc9tXMHwrjjb89rtKYtGC\"}', '{\"remember_token\":\"d2yyjLvjZ5y0tvGDhf8IUpYlYPeJnuRC5q6u9hpOmZ5QTohngTd8bXdnNd9h\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 18:44:03'),
('27a4ae43-73ac-4b79-b188-b3ff9b477c52', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"zWoFnMB58novZw0OwwedCZRIBROa2s8uevQF3PA4Lh3K7xryS8yVEhRsZoCu\"}', '{\"remember_token\":\"ru1MQvYPoHhLWD3Gzto3AFUSejV2CInrSE41pln4QMeQ0MQrvu352Y2LaoLH\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:31:56'),
('2852fdba-64fe-427d-9ebe-0b4bf81d1894', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"sO6Lgglchg43oM9J5RawaEU3eODvfP0i3bxXaWuc21ac6kWt2ElkUITPiz9U\"}', '{\"remember_token\":\"894RwgpvXUlQsY4JrAIY3IvUtveiQQO04uspF01s124zK51AeADIDPXk0KPG\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 23:58:22'),
('289ab946-3310-4c97-8c38-69b9fbbb8dce', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"rgUYqRlMEcJQXHCI5ViaseKIqyvDBgSkIHOjngrSaWe5lbiOdhte3OQKNyQy\"}', '{\"remember_token\":\"NOJT5TN5l123Uk3WgGBDo0F71bu4cpp42gno0bMvFSYwNpwMgiGZKhoVc5MF\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 04:03:44'),
('28be5526-ccd5-4840-bad6-4cfce554b2c3', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"SRgIz45bliQRiFJ7jhTjNOLUu4vTUqaMfi9VFL0qtHWfCWqLtMROXcuT6rdf\"}', '{\"remember_token\":\"E5Rgb1jCVY1VX1yxXopstEBHoQ3hrRKEJl7XafduFD2fOkddFshWUbL94cR6\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-01 18:07:00'),
('292e77b0-1a8a-4dfd-9d4d-5cfbb1b47c9a', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"km0OgtXMSz1mUabLM9SdQffiAuIJPUAuWx5I7XS29wD0wPJwNDhIz7kgCi0q\"}', '{\"remember_token\":\"5qur6P06psn7Z352b6fJ2V1fosGWbgWYHSMNyGaIRdWjSJtQymE2KirUakib\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-01 21:58:54'),
('297c50ff-3c9f-4c92-a9a7-444f94f7f333', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"yHcher4g36xE5iZKmjXFFIRQ3q9rX9abBE8C9vZ9oZPvC6YmNa2JY60uE48u\"}', '{\"remember_token\":\"Sh6C9QDNNX2h4T3v0ORMOC9sPGoIRhFvwyBpfd33rJjdoeIyRvj2R3GNVYZr\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 22:46:02'),
('2a876fbb-d147-4c7d-afb5-337fa4089a98', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4M1ZMTX7rEkzaPiYFYxivwYBEU9e7Hcm5szF6u5w41rtu9eT0xMdnJWsJJEz\"}', '{\"remember_token\":\"WEG4E6OE2QMwRmzdUFnFegQsoTMhmjwheQksPxSxLaqDOa5cODgwx7ooexd2\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:50:14'),
('2a93e631-8656-4f3a-a6e2-5b7e95f38839', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"8iqbNfIn5K8oUuXyzquXgOet5gdWgCwEm6xiROSckc0k80mo5S0IcpIsG4py\"}', '{\"remember_token\":\"3l8Iu9Fusl0NTG3o8jclvVc0h4IT2Z1Ag0j7fuSYVrO7QM3akc02dPUcsQuE\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 19:46:17'),
('2b18f18c-67f8-4897-9cf8-234fd2271fa9', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"a8Rmg2jlaJN1DiVTcgyhfAjygRljzHLK8uI9PviC3P5trS4iYVUjgaNMtnYm\"}', '{\"remember_token\":\"kxgMd2JnuDOVG95f1DIUKXcgVLIAqKPFOrtIjfI3jKOBacHTzlbjcai7jtcv\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 18:52:37'),
('2bcf2fc9-35df-4927-bd5c-e027b5192378', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KqPaMldYnx1uW0GXHGo25hVpbk0IBaSLPzeR7sMSs8ryZRaGx915SpBOEBL5\"}', '{\"remember_token\":\"uj1r3K16lrrvX7yqPB7uG2SV6HARDRLSSfVqpbW0vrHZ3k9EXfh6hOHwGEIL\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-17 17:49:51'),
('2c8d9baf-5d87-478a-81bf-8a6e4b240530', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"H7RH6y1Hg3bHRKzBYeBvGn0gQ0rqjIirG8xVbFklzsygUm0ezw31oTFj8eV3\"}', '{\"remember_token\":\"b0cWxU4YBISTuz3cH9ieZoMF19fNteCTQ345duNt1PhHWD5EbHvK3NhNa4eR\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-19 18:18:53'),
('2d0d91b5-7253-4324-969e-3488b4316327', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"FbfYq0oVDflgHHA73OtfVs4kNTIspmBFxtF33sKCBU9z7uuTmAOjgSIPXJQG\"}', '{\"remember_token\":\"TSTt3Pnmb5c9JefeYJ0rMiDBrFRGIckhanRChC35weSXIPqtrd9iLfq1bgCb\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 18:03:45'),
('2db8766d-b8f0-4b71-9fe3-0b0015503870', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"mX4nTZIVZ7q522TH2Wx7qiMW8em4N3UTqACJq3mXpreEo6DsuYtvWGw1UKvz\"}', '{\"remember_token\":\"q3qHzeljKkL5qIz7qxJcIMXcx2BqFS7wSLlSr3pDwmBYmHsinrKWWETfICG7\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 18:01:32'),
('2ed4e7d7-5ef8-4b02-b027-98263ff47cc4', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"tt9JRXEsbkkasuyWbj83HUmUO2pgAvFUjtlqOc5cofqHrWmCyLedw7DvR9fk\"}', '{\"remember_token\":\"3ekacTLLe2f8dA7ZRaMP7RYDPcwBdVJCqnSb7sPLVEOHXrYQvtdyJS1iXXJ5\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:59:07'),
('2f104bb1-46a7-494c-8319-d74cddcbea95', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"vHATUYfjEjRNiuJlppKeIeFRzvWFpzyk3oEllNVnLn4Y0nixdsI8TCVROjZe\"}', '{\"remember_token\":\"K1A3QWIfbUZDf3E9nXf4yr1W6BnPIf3WGtabqtiywIq8BctfL4yEmEPOJFtK\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 18:19:02'),
('30042d7d-a6b1-4cac-b314-3fee7f039760', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Ciy4pfoQQ04opunpKFwOiJEKtGp9JJ1AYWuSBq3ab3twGDw2F8G3dUjttkRj\"}', '{\"remember_token\":\"1Tq42yqqumD4wB9Fd8BWZ43syJqapU0Fy4ypEog1U1SisGA30tlKnHGUeRX2\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-14 22:28:05'),
('3012ac80-5a25-44cf-bdbb-d7e3213a8b27', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"LCdNk3ppluZAuBM2O0nXwD9Gh7TZGsbruBSL1Ofw5VkqYymblrsLJ8rLJ7Jk\"}', '{\"remember_token\":\"FqMoEEEKxKVpAbBp0qaIovAYDLFXNWDXMYGnY9nsxJkEIaHRKFL37uyewfEn\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 00:04:45'),
('309df5c6-06a9-4dd1-a3cf-eeca628ecac8', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"NOJT5TN5l123Uk3WgGBDo0F71bu4cpp42gno0bMvFSYwNpwMgiGZKhoVc5MF\"}', '{\"remember_token\":\"XZHf5aUmmZLMxnGbU8EW4VnuGw5ZZxqFIpoXzZz0mOTrfd2j1gQIZ1NTKziV\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 22:15:48'),
('310483f8-4a38-4841-a4ec-d372e063bc31', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"hYkqybOfY5GF3yOhbii6397FH1NRFHcc3QbKi2UYdekESit3tRC2UYiMSYOR\"}', '{\"remember_token\":\"XCQWLaxXNX9tiIiPNShy4OLBCp5ZSf81bs4ToymcfRyOoZJ9IBeYzyxYduOs\"}', '8', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 07:45:54'),
('3178d403-ef58-4473-9edb-47492ffb3156', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"oiUOIQtj9BxRK1jz9eOkTTdRyZAPSDjFmXED4jfhxnT8sOsQkODiDFBeM6py\"}', '{\"remember_token\":\"2SNC1rIHsyO6FOE14XezLem9Y1GrNf1sdOOSRIbjf9otWWpHGsywD7cJsjJj\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-03 23:44:43'),
('31dba159-dce0-420a-965c-1ca089837178', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PIRH7PfEQWXIREFRxr63oalC9VFt4JsHxPVUcP6R0HgL1zvp1KHrTdqefY58\"}', '{\"remember_token\":\"kw2JAIUa3dRKeslN3I5dYwf0ea6D9vcQltYPvc1OykgBay0Yz8YmP4Ls2sA1\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 00:48:07'),
('32ea88db-e14d-4f5e-bf63-6619048e2bc8', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"WgZf0shehDApClzQ1e2rg48TxCiWdKetbIvkDpfIFf9sO7VFPCiQsM7LA0o1\"}', '{\"remember_token\":\"JVQHcJkofNeaZs8YyQZew7bDP48bgVt0tBt0NmPcLezb6U7B19WZvNG7FZog\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:05:05'),
('33256589-8d2d-4ff1-b93c-c320eb7e48f9', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Pv5EfK9dmJwwjsctyrD398kzYAv8Ripi6qI3IBUexb1NXr5kI9NDJP2oJPoI\"}', '{\"remember_token\":\"V9omXAM5erfb0OSaUhDq5zYJ8MqMfdEEwF5iouROxCgOuD75Qq9l3hDkjvrS\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 19:34:16'),
('337804ac-cb02-4808-9d64-783a5fff385e', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"L2rf8ID2g5XzEgoGJoQs2hpSNx7Arm9tapKQHrnD76hJJoFcEUttE7y1otIN\"}', '{\"remember_token\":\"5ypixHOpOS0NrTOz4YBt0XHUNeOywR2KSNuzTycGnWdLZprKeoOVKS3sNprP\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:48:15'),
('337d7bfb-7edb-45ea-bb30-215d5855ccae', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"a0sTi808mKpLJZbvCbpvXugkeBjYKpN7fStdkIOdWrfYZl9r6Ne22FhptlTv\"}', '{\"remember_token\":\"lwnGGle92BuKqEzWENuyeUXRXobqnOc5CDS39wnNJyeUPpl63BZVqIw7VXZe\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:08:35'),
('338c3793-0b91-44b0-970d-1f0ae023aa37', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"z1T6Ct68XKyJ6oqe9UnT4CCs0FtROOmZk01dBLfmRYYSZDH9ju3FTHC81HVV\"}', '{\"remember_token\":\"cFjBhpdccXQJtrCtqgV9a2pl3SfZLY3FRhkpYWXAhPbRFwbWRhw9VyShm4cq\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:56:30'),
('34cbec47-b74f-4247-9e81-9471b0930b6b', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"7eqOKXOks8zRUTeVJkbB5Qg1wkRaEe4u6gRD87tGfLVZ1WFqHiwuaZHQdeTk\"}', '{\"remember_token\":\"I6N4fRSveRjlQUniCPxNQyj1eHFJmdm9RgpDjgX4Cpw3ob19EErzd1tks0F7\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-18 23:22:09'),
('355e0c9e-80ad-4bb8-b3c5-5f03b2131ecc', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"9J5aB5h30qj0g8q6oLdFamHUwoN9eJ4mCgMq7gtopMeQDOY8hFlbAOj2vOWQ\"}', '{\"remember_token\":\"BtLq5OEwJzymOm6DSSNmYY9uHRnEt95fby4Laxj2aKbgDMfo3lZxp1xHyRkt\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:54:14'),
('357a52aa-127e-4300-a8e9-1cbcded640b2', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"oP5HGitXOgGo1V7zimHzEFW3vFJSWXOIGQPHxzyWJKHxEXBsudYQE3wPUC8t\"}', '{\"remember_token\":\"bUqULxo40LJXa4gIk0zz6pWNUBCy8FzHy3IMm0Gh5v6XzCIQ3062HmyFmKyp\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 22:13:10'),
('357e2bf2-7d2f-45d0-82be-2e9d34a2a500', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3FrMzo8d2kNpqaPOkEYkTh7gDYgtwXXCp1YPKoBY8oauA6pnHs2shmQHjtmF\"}', '{\"remember_token\":\"kmglkfK4PezaEGAdlooE4VoZpMdr4HqK0zoRRsmNrUAQwNweCUkHMXQabCzU\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:38:00'),
('35852150-9549-4686-8102-94c9fb4b5f7f', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"3AJbABnY7xr7Or9RaWMShnCQDPCkeKvLgvvLtHT95b8ax9WPhNexL89j5bmS\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:29:56'),
('35cda55e-8804-4f30-a26f-0a29137bd5c8', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ZePvCFHqcJigYqmJLjNqxUgiFJhUbv0UWn4W7daAaosebjAgxCn2kGLYA1kH\"}', '{\"remember_token\":\"Z42D2q5798uSw6LFNxbbDHdWVoGmcvcjgtBHWK0wXf7yh9gi8Bhdn6mGcJoC\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 19:52:34'),
('364f920b-2400-43e5-ab1b-0a09c79bdb1f', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kgmAbke8zNJrhLGzN3S1pGXpTtyLskDWWhsUL0GDvzu6LrIsicJ1NiCthQHW\"}', '{\"remember_token\":\"NrHemuZ8LiwZG8SOkpHtDoezsGNXRGLZWb61jyZ6cVRzE6GV5WoUWqXMV1rv\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:47:30'),
('3979db77-1caa-4ea8-8ffc-d84867734260', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"o2mnV5R3HecsJHne5BqjUOOrc5oOPahGQevjF7oP1JNCPEPJbCs6CZDtQOU1\"}', '{\"remember_token\":\"wlMrjar2m0TQqMn30UlZu4V1lpZuhbLGaHEaZ2JGAYI5q3VBweopmgqStJE0\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 23:18:28'),
('3a0881e5-5ffa-4edf-819c-a40f677f5f47', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"orDRICWkv5IKUGvSZ6wcWmMScwSbXvFW7jEug1g3RcrGWZ3jEOTIuDbuTSVh\"}', '{\"remember_token\":\"Pokw8zKnwtWlPrViL3fMv2V8WnHAHOCN6mw4qn8KKopdrv7rNy3CdkHZmPvI\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 18:20:05'),
('3a1ae42e-68da-45de-8709-419305e68380', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bUqULxo40LJXa4gIk0zz6pWNUBCy8FzHy3IMm0Gh5v6XzCIQ3062HmyFmKyp\"}', '{\"remember_token\":\"1bjGftT9DpIqwC8VrCFOODEEG26pAoAOe78XdVXuwigaHQFNZMAaSx75Fadb\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-14 18:08:35'),
('3aa6c4c0-9227-43da-82f0-4759de0ac0ae', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"I4eWdnsjFq8OexpVpHkZyTfP7f1r8dcRW8TqAXkPtLnCnPfPLwPvRFUOwfzv\"}', '{\"remember_token\":\"OXrOega0gjmNfal60fvxwMf8rON86oz8p0vFkrwyW5J9nxQnOh8WCceDMJD5\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 01:01:29'),
('3b1cb4ee-9eb1-42a8-b501-0d4ea2686138', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TgJg0VG4fwRTsjvA90YllIBy4k0mXccU59EAuoeULX8ZkCI17lu93xXAZXMY\"}', '{\"remember_token\":\"G5QQOSiNO8Tr77R3TISAe0046wtWXtDC043KGvhh6wOwxuxfXy2k7OfCcMYz\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:47:21'),
('3b7b45e8-9741-4de4-8c6d-c88609172f95', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Klv9or5vcLBEMpfT2is5AAEZ73Qug1Oyy8Ins3b2jwJFRlZyP5O7psOtLKnc\"}', '{\"remember_token\":\"NH08pbDOTIpMfwUqnbqgnsi1Umb1mJxv0YUGpevQTk0zZ0JUQKpClBJ76rVI\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 22:43:03'),
('3bdac1e9-82f9-4a2f-ae37-8b5e67674d30', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"n8zjIcdI03QhYB9VBLDUjPk2yBDVZum5FKQ4n7kNG5an2ymUo6c8Rn0AbBN6\"}', '{\"remember_token\":\"9xmasuNZfXfsiqNuHXnYplASv2U06MLcOHX14feFtxeL6nSENmOi8rTREDzl\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 18:55:47'),
('3c845968-4ac2-4d77-91fd-ed3a2cfdf43e', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"R4cuiLGYQ3sBsK5V0KeL88cFPTUYoI9lhUesQCz0PhazXOluHiMqWrjigTIJ\"}', '{\"remember_token\":\"vHATUYfjEjRNiuJlppKeIeFRzvWFpzyk3oEllNVnLn4Y0nixdsI8TCVROjZe\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 17:10:01'),
('3d26cbbc-69e5-4035-9fc5-f59954e3bffd', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OLBsaWmVL9d8zCRg1xEB7h98QzVVKFk7qHH29Nk8gqBVdWwW5OT38bh5AbvG\"}', '{\"remember_token\":\"FbfYq0oVDflgHHA73OtfVs4kNTIspmBFxtF33sKCBU9z7uuTmAOjgSIPXJQG\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 23:44:58'),
('3d9d1957-a8e0-41af-a46c-42eb7a855f3d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"rIVTDrzWDaCviNPPsvJQuRkZcsN2APqBalS5qeutRGZrdTmrFSIM5CPNACGj\"}', '{\"remember_token\":\"YCVwYZxa8TgRho3PwYCuPaIla4Teh5e2gSilDtrIgfxKtSqWBg2pD9Jgzc5b\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-03 00:40:30'),
('3dbb335f-7ee6-4170-9e97-6e46c1cbe34e', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"HiDPMRLs5RDWDM9LcT5UOvsKsCVYt4X1LkUErXITF1QCn1EGiS2L16RhOHa6\"}', '{\"remember_token\":\"1sWPV3r2D5ILE8fxSzE8VhJ4D0wCUDk5rmSdByu0hlP0L01qTulS8d08oJNh\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-16 19:57:50'),
('3dc42996-910c-4192-b7a2-f3888023ed76', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5ypixHOpOS0NrTOz4YBt0XHUNeOywR2KSNuzTycGnWdLZprKeoOVKS3sNprP\"}', '{\"remember_token\":\"NkiaMrx7GMHbJZBlCvitOh53PERa53HFX563EWFf1dXjCr59PWaF4u14SzPK\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:54:10');
INSERT INTO `audits` (`id`, `type`, `auditable_id`, `auditable_type`, `old`, `new`, `user_id`, `route`, `ip_address`, `created_at`) VALUES
('3dea99de-23af-4ee9-b06a-a141a929fbfa', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"9e8zfFynPlK5y2BRFE78Ta0mGZ458qONLDOdznuWMW8bixoGyGmW0L3eDpoL\"}', '{\"remember_token\":\"AvNLhHeqbhSSAskRe2T0458BjbCiDVdzBBYJYHO7GW0DnzXU170RjNq4Sua7\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-04 18:26:02'),
('3e7a5d2f-b281-479c-a89f-c54a6f77c0d9', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5qur6P06psn7Z352b6fJ2V1fosGWbgWYHSMNyGaIRdWjSJtQymE2KirUakib\"}', '{\"remember_token\":\"q6kqFN9r1i0xeZRcs56vVbI7wUhD9zqIsUMqnXHgBXSDcoYL0HqIlWX4IKaC\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-04 17:39:52'),
('3eb89880-153b-48a7-9277-47ef7f0e86e8', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"FFhH81KdIuFOgiinCv5fZ0MF3SfFU7j4mDN8H4hwhTqLIaTETxwtQMvdAHwx\"}', '6', 'http://localhost/olongapo/public/logout', '::1', '2018-01-22 23:26:25'),
('3eebd854-9051-4408-920f-acf8475c7e3e', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"k7SjlLhxCcg2wTQ1d01rpya3sttvgcQmB2D68V1pagjJP2qiMYczMoncW8xO\"}', '{\"remember_token\":\"4GWmLG3Pz2HlXn8Jt1syEyyogUspDfpTrImBLMMzhllGpLJFFfPtCADvwu5L\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:36:44'),
('3eebf2ba-e23b-4357-8061-78345085f44d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"149X9YxSOgYI82GQitjb79ICAk3BbHsiFX4aOIpS1LvgnpH1SS1Q9JLa1efS\"}', '{\"remember_token\":\"sQg7zpXwPdUVKLYjM87v47nAtLVFkoCXOhfhfVD0m8Rd9BPrnT44T4D0kQwz\"}', '3', 'http://localhost/gso_olongapo2/public/logout', '::1', '2019-03-13 22:51:03'),
('3ef865d9-2caf-450a-8095-f31830e0c9c4', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"zcfluSYbtzD7eOL2OmLNHAO4nVc5F65zxgdVncOfPop9KzLqGYDoHZ6zmxor\"}', '{\"remember_token\":\"2tVoQoCWtn2Nfavj4fOJistQ2BzyItKdBlPXQKNdZWktu0JNRHbU6ADy7eeH\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-11 19:17:30'),
('3f12da6c-9d4c-4562-96e5-7d7fc2428a8b', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qDNzRaxihjcdcC7VtdEraxTDW09ElvK19RBB4nnmIrMtEQCLCyyQHF5EhpNA\"}', '{\"remember_token\":\"orDRICWkv5IKUGvSZ6wcWmMScwSbXvFW7jEug1g3RcrGWZ3jEOTIuDbuTSVh\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 17:41:10'),
('3f1af797-7ee3-415f-abcb-f8dc04e64fc2', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"WhGVVYrcsMHdT2QbmyljEJbJ72zyWnrYQIFoyiYsDAaWLzxpUEiy55KPAZwx\"}', '{\"remember_token\":\"Z5b4ElmGQNirA6olTKjkQw0yfb23BmEclFwvx0Zh8GINFMNFGmkyJ8etzvYs\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:41:38'),
('40e0c525-6290-462e-9155-56e7a19b7184', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ScJHOknz6MKnKKIuKNOETBqgvur2naojgALCGvh2zr30YCLCaya07ysixSsY\"}', '{\"remember_token\":\"nvxSUoDXMPbbOlnvGWhVWenILtTLJDmbaCQ1is7JcDH2WMqykLYLJ3gj7QNF\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 08:14:32'),
('41249529-bfbd-4a3d-a658-b5bfa291035d', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"HVQZ6OXePD7sC7QoZnvIKkZJD68ZTqbeiA6IfPNMDwJlxSOLrytjOEY268d8\"}', '{\"remember_token\":\"O14Y8cLJkbWskLrO5aegPf0L4AXdFNlpBkmXATlw6RJST5TUiy1WRMlV0iEw\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 19:29:20'),
('42b2af3d-3d7a-4621-aa97-fa611f1b26e8', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PD1p6BHQ53nGoLlfp3gUPabxriA68pLdF3hVJayyS895JMTiPrzyTZlwq8xb\"}', '{\"remember_token\":\"8UlrnFPAYUNoDep6UIzQg6qiYX34FjZbBiZ8nhXKKcTPjKqDp56bJ77SYKK6\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-21 17:25:17'),
('4313fcc4-2595-4e71-849d-fa2d2eb1b1fd', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"q3Ftu8WHWa4CdFtUvkZJXnmBV6YXfTj09MthztUtymi5VkkLVQusKyiQlU2Z\"}', '{\"remember_token\":\"FV2aqC9mtJ0krz2nsLLjgLJYgWbBltnu9Gsg854zEohp7HmDenvvLnW3com7\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-10-29 21:10:22'),
('43518d89-ba33-4ff0-9c62-cc19ae6c1adf', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qCU99PKSiKW5YGwnwsvFICnqPQoi2jz2zfhbRcgYvRmf0aDnqUCBlS0QCVDE\"}', '{\"remember_token\":\"4wxkxN5XqkGAOynwn2TRFjOcUgeadbEslt8Bx3FoqhnIIQ7NSay01AWyudVC\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 18:04:02'),
('43ea24bd-82fb-4539-95ae-72d16904e4fa', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Ryi6kJaqwuw1zpDdA3LynHVNz3lubzhmK3n3sHrr3ntut2TrQVlGvG0aNhup\"}', '{\"remember_token\":\"yHcher4g36xE5iZKmjXFFIRQ3q9rX9abBE8C9vZ9oZPvC6YmNa2JY60uE48u\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 22:07:51'),
('44753d32-3a1b-4a87-8ff0-343c226834eb', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0g5xi7PldaCM1btI7oynJEP5lcFFUuC222cXsCn9qQH7meWxe5UxfkTUZEW2\"}', '{\"remember_token\":\"80dhFBR0lSKwL9TMWQiQwl2RZs8URVXsDULgGe1l5C7CHfkddtpHSbjdJldw\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 00:59:07'),
('44846138-b685-4964-a9a5-7b6054b6e22f', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TLD90HdScZFoZ8DzsbL1zvUPoJJJXTYF9bbYzFz1hSB94TZSGKtD4ZP7KfWK\"}', '{\"remember_token\":\"TUSFdmug0zUiZmeckSxxO9UGbMnzTsWkFlRfTZ8gIzgAtIlIkn3WLU9E0PeI\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:08:58'),
('4647992d-c503-4da7-9964-9e4b99cb103d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ghlcTsWoUNUlYStlwnN0oS05qdF4X4NdPAjEqovpkSeR5Cg7c8LehUMvtcP5\"}', '{\"remember_token\":\"4CfZ3yTAuKwnI0XtEsPrbCOQYAP5hCZj6keR8aiWmEAVDPlz4irrascyc8X2\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-01 22:29:51'),
('469f4b39-abcf-4ae9-b874-eaada1f68fe1', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"oFS3QoHwdyf2kOT9s20tv4CoLPMg9vSfpAOWrwZmIV4zzBBVvmbA1MIKzWtM\"}', '{\"remember_token\":\"xnIQpHFhQYQt1gQUxNp6ypFpgdtIfnR9i8ags3RWzon2LaffYaTMmWWLH3Aw\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:16:22'),
('47a8b851-c456-47e0-bbd9-f835763f79fb', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"igdo8gGQ6bgelpcIq93qOHjsoGkeD1gDGuULWqcChxChXe2U5rZmisIgxu0D\"}', '{\"remember_token\":\"bbRHXwg1Kv7C1eaM9erE8uM3FDmvswQEYcmeOe0OujLntzfpM1zHsHIhnOR0\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 22:54:54'),
('48b8654f-499b-4d89-92a4-239d0ed98b8a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"siImWqBDXAugNzQ18nWZaWYQBLckzDbUM3atI8OQ0jf7lyPYrSvF4RNatw5d\"}', '{\"remember_token\":\"ucA58uscYrP08v1f4wXMLEORqaG4GARZnzt1kSVAkO7wMJovdEgmcrvRVSNk\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:50:01'),
('49107b21-8058-4517-8afa-5c00a3491934', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"9wztaDYfAewjUBxtxtZwxRA9Ebvc8Kagssq0XFu41rNBZcAYWQtK4RyL5uPQ\"}', '{\"remember_token\":\"p3OkhxNGpgSq4Zp3yFqnBAxYPi3l4YEvgoV3wVPeFacUJNlogA4yqxa6pJtT\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:57:53'),
('494e499c-967b-48e2-ad4b-90f33b82df4e', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"eumn17cjdTJTlpbfy1gM75gZGw8iildUzOY0qsTQtIa94wWr1sQjQ5MmaNWD\"}', '{\"remember_token\":\"BceK2rCxycOdpVhXh4iI2WnmuhGewB7ZmttJhCGrGM1bIRQhpdRMwvB8RHae\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-22 17:59:23'),
('4b00a398-4d39-4493-9318-3d5ca08c5646', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wlZGfubUEJTwzOBv7TrrVQrb7ENe3tSQUyazqS5zy8VFXL3kCe4mv3wjdcke\"}', '{\"remember_token\":\"LQ9zWpqhMRrQpGNOcLEf6uugnvB0VcvIxfs9Xvlljt6Ld1BIO2f7ZMTfExC9\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 16:33:37'),
('4b037795-31e3-4cb1-a5e3-b1795054af1d', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"c7l3c7ELLYbyiBdMt7UcZExzsou6z04SYiARB0AkFXoMXmxFR1mYzD9jDLDi\"}', '{\"remember_token\":\"Ryi6kJaqwuw1zpDdA3LynHVNz3lubzhmK3n3sHrr3ntut2TrQVlGvG0aNhup\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:59:30'),
('4b420cfa-731d-4ecd-94f0-98e79276a737', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bzzqD3tPEnhNZJjDQN8OY8TJRcbzGhjGQLvLEnYZYUGfvpEESXIsIGlO1lmZ\"}', '{\"remember_token\":\"XO2rZMZdKGifAvUwOTlHUHbbytsf0enF6AjSwJ0jlQY3KCxgTCaa0uvzQ6tu\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:13:44'),
('4b770812-c55b-4476-9bee-3ac50943babb', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"m1g0cdrNWqnl7LenBwjrByKHBa8notBFBDJp8scTZ6vq6ZT6xMhT0JC8uPg2\"}', '{\"remember_token\":\"Z5bdDeiUv1wv4RNUDg1sD2LuKWWrtNMFBsZRUG8ulUCxHH5ZXwZFmlnHSv7A\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-02 21:49:27'),
('4bd755dd-4683-4c25-8221-49c9683e0490', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"RIlgrw00clZ6XYpJAfJXxbsOvdMOe3PhjHMvwTD82lKUYXbfwNnlUdvhMzp5\"}', '{\"remember_token\":\"LCdNk3ppluZAuBM2O0nXwD9Gh7TZGsbruBSL1Ofw5VkqYymblrsLJ8rLJ7Jk\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-18 19:13:06'),
('4c2fd586-eb44-4413-a400-78c61e99f0e3', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PVOkArE3WlIowkQOXCD69OSuz5UoWlUnFJOP7FNmgWpsKTUl4KuszmQhcYCx\"}', '{\"remember_token\":\"3dDC8u1IuFWGulWzJvqbAXLDDgciAkdSWYtNjnRb9bVS7a8VHsZrMQhMjye9\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-13 16:58:47'),
('4ccd6d02-e8f6-4e0b-ba9f-be779fadf7b6', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Wcepj2dHpJDeDvmY5yr8podzcmD0ECCHfi0zWxRnGHctQqxjRoVReOSSR4od\"}', '{\"remember_token\":\"82DYsWPZSLNs6HtpX29ctaRfaHFS78ooWRNTZ1oLnEaNVH90Lp63OPVV8TkF\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-02 19:03:42'),
('4d4ba1df-4eaf-4280-85d2-21cfabdbe650', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"fE1BTpMuuCYoIpFWStt5d6oEL27PXhiw59mOUIrDTdVekSySwlLSUGLej8Ql\"}', '{\"remember_token\":\"RhNe1hPENioHTUKH4zbtOeliBMXGv21J6mPCDmBsyFGXVnIg8ilka923uLFM\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 22:30:21'),
('4d71c207-1c76-4929-9397-a9689e05ed8b', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3ekacTLLe2f8dA7ZRaMP7RYDPcwBdVJCqnSb7sPLVEOHXrYQvtdyJS1iXXJ5\"}', '{\"remember_token\":\"DYWItJTIbBcI9WdlxJsE9vReHAwPmO10ywLrcIefbvFLlH9nNqxyf7Wf2mLA\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 11:00:36'),
('4de4aceb-2d1d-4db3-be6d-c8f63900af90', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"C76Y4emzhmGWANj7DvPFfd8mjTsTnr4oz9CD1NJkD2IxQW27naegTNqoMkOP\"}', '{\"remember_token\":\"qZn3JrKwZkzn1z1tgDABa0NyoBk676UfGGKu19aO21viyRWwrkyjC4GyFyAK\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:30:42'),
('4e35213f-46fa-4bb3-8f43-7796115d8ab3', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0ekJ4FPU2AEXH6ls2VJo6HkyZ0lrW3qXmdGxjdRB38OlzVg3TDTjTNDHphDT\"}', '{\"remember_token\":\"zsGFC693Gp7Ek8ARReo47h1DRE0diypEJGQE4yO3dbs9R3locgBSIR9OZtnr\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:40:56'),
('4e520f26-561f-4b8e-8e30-2c9422e0b746', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"IQeifsntW5BWT16YH9FjVKToJdh37CxBPaXdHhVltexoeQO0emjdM59xxTj8\"}', '{\"remember_token\":\"AZeED6FtMF15tzN6uIb2KzF5HlzvPe53rkNLny2VtmvcU9VduGttZzeOSSzU\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 21:31:08'),
('4e61b1f5-5c9e-47aa-b362-4e89aa9e4378', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"l1W6gBHWZgPcajUS4mlZIvRtgGvcKs7mkVxclhNqojC69m25Vp42aHAil0GG\"}', '{\"remember_token\":\"oIojP487sehB4sIrBx4K9zprXQvT4HutkohbC1OgnmPzickO8wKTXh4wwDXi\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-21 18:16:20'),
('4e7049f2-5b6e-43d7-891b-a23ea9c82814', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0n9udTrALJ8eRSvbre8SSvcXxe0g9eCbrSCJaYB2JIeDZ5YrhlWeXoiPo2p2\"}', '{\"remember_token\":\"NInFxja8yD7NvgDYd3or7uN79tDISzJzEZsXdbpjnIC9jhdGhQHKgNoIa8Ku\"}', '4', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:31:44'),
('4ebfc461-0c1a-4402-bc7a-1ef1ded26139', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"S9ndZzhCQzwnmHVh20VWGbOnMimD1cyYzwuoIxq6bx3EJYkypGbmuMRrhUr7\"}', '{\"remember_token\":\"WaFXsHXPD9RA4sPWMdeiHnpTsl3t311ngdv1tTdaDIF1XbbFrpYI847YERtV\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-11 22:08:27'),
('4ed8a858-e38e-46fe-a14c-8b48cd46b8db', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"lfA9sHpgsTHbf8z3GNQzaVFgidR7m0eS5YJwvGv9wIHDnWNHJlFsfGlVcGBJ\"}', '{\"remember_token\":\"mO7WxYZO1efv5Uo5t3Z1efSPx3EXOgS4OdlqLynZQAxIpCc1GlOklWs7QUJc\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-13 18:00:07'),
('4f222a47-b53a-4712-98d9-41ce0c6a3f8d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"pSZEzqrw6SdPKTPwb9fOWPgHJ9UIA97P3sjUQmJSpWZL8cFAbiJEOEEmoPQ6\"}', '{\"remember_token\":\"05ugxhlKAQhQb2B7knX4svVrpH2uaWwECLvi5rOxYi3GI2XarziAAjX1Xzg3\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:36:11'),
('4fdc43a6-18a3-432c-a355-3fd000f676dc', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"QcZdatnkV81Vyldr31IMQ3dUylQC8tLCJGTSTj3XW9PjLbihAjNbc32RN9yc\"}', '{\"remember_token\":\"1y8r0fSz1fTXo7PlDgjO485quu8uGE74oOylwtrJPrcbRfnfa03PlZFiMEuM\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:29:29'),
('5020fdf9-7332-4fa5-93e2-27e26c1c025e', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"b1DhxO05VQvKYkW5VQcycgY8lFSbleF6kTHZYGOtNNxkmg9LpDM04fXPigTh\"}', '{\"remember_token\":\"qDNzRaxihjcdcC7VtdEraxTDW09ElvK19RBB4nnmIrMtEQCLCyyQHF5EhpNA\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:52:27'),
('50c0df26-f10a-4ddc-ba09-6e80ef33e87a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"JVQHcJkofNeaZs8YyQZew7bDP48bgVt0tBt0NmPcLezb6U7B19WZvNG7FZog\"}', '{\"remember_token\":\"Gx4d0hULj0Dr4CBhG4oynI98FfoiZ2JVjN0VfukP2iIlD35WZ9L5tJFNOJQp\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:19:21'),
('5108c582-0900-4357-a3f0-97ce811f8b83', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"mHuRxh7rs5r9rfSu5Wh9Y1MsHYf1SeYDf9EzMMZhsaTKZHCw7n4iNiUfz9wY\"}', '{\"remember_token\":\"JMUpcJvncwTiERAsHecDzM5nVTYNosapmGBRu6ujnwK2PzR8zJPINAJuVAf8\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 21:24:55'),
('51109c89-d3fc-4bbc-a724-f1aa65825b51', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"X3tv8ouRvQUBDDEii0bcqrm8ibPRpVBGQmH1nnLAR1bMmUHmUJ7GaJG2xGUN\"}', '{\"remember_token\":\"UiStI2qNueYjy4HAYPSiJxTdwYmrBoiOCXNbG11894dcfDuSaEpHJCMZYd3c\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-11 23:31:27'),
('51378dcb-0445-4e77-84ac-421f8a1c049c', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"LyLne95relKkQ04wfWhcIvpYlsA66VTlDljxU1osBksjIlYUAoaPPl1es2Dk\"}', '{\"remember_token\":\"9mqdXyyrqnCrAiKc4kJ6pSqgDkWoYlnpksazHRXvjj9zhboAuuYwd2ppy1yj\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 23:20:30'),
('5160e84d-017e-4ae3-a688-e74ae62988b0', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"7g7YvDDoOn3WhWLYQQYsCPSamzfQCwCi6lmRpgg1c7zoVMLNEEUuNxMl2PJU\"}', '{\"remember_token\":\"fETMxNyRE5A4q352iEKGRld70oBuY5Nu9gfZ876ABmHvW45KZsjnXzaavazu\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-14 18:05:45'),
('52fc733a-5cc5-4ede-b1c5-9ceee17525f2', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"CIt2jynWLuXkFVXv5bc0PjEGCY0zwxx4YiIAkVpCrHqpCYptXCKV7kRk2aIc\"}', '{\"remember_token\":\"zcfluSYbtzD7eOL2OmLNHAO4nVc5F65zxgdVncOfPop9KzLqGYDoHZ6zmxor\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 17:55:20'),
('53527925-825e-4e06-a4fc-ba617f7c9769', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PDiSkfYzRH2HSG3O1v8O2e6CxzNGPi1cZVyp8xO9BQINsKs9dFolg7kTWu7o\"}', '{\"remember_token\":\"UTOUpB6vptPrXQ5vYsnFkv11lyjMjOBM3PTkMGX8t2aCPS0BMKt38PJumQus\"}', '8', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:31:19'),
('53dbc8c8-a195-479a-bf74-10012cf8d862', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"xNRJV4bITWeoThLDbrapJyMBOVilNa3mRjitUe24BFYc46Q4dJTmi1JNCulF\"}', '{\"remember_token\":\"cHjLvMlRH6pbZm73PaQSt7gZ2b5cKwXnJ6dB9XYJkd3is6SXOYStJ8p21KOr\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 04:03:03'),
('5522ed8b-eb33-4376-ac38-719168cbc192', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"km1PjyehAt6Tz7eW9mjkepxwmT54jwcMFOolVQ5bG0NQnwiXBkPMk5WXiTi3\"}', '{\"remember_token\":\"PD1p6BHQ53nGoLlfp3gUPabxriA68pLdF3hVJayyS895JMTiPrzyTZlwq8xb\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-19 00:13:29'),
('55589f15-6041-42c4-a7bf-c806776fdfdf', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"w6doWE1Y1wSWG9MaEfK9eC5jEOH6NE0hEO8vHbkHX7fhgdriDNBtJGNZQUnx\"}', '{\"remember_token\":\"5avIdSbBaEWGTwnt2yACMOxLPxHAOuFzQkRL1YSfSoYIcCGWZR9IdUZ7pReD\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-18 17:47:48'),
('5579687e-8093-4394-ab74-8944e5bd06f2', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"bYWOtsp8oWrOTKf3d3swxc8lxinCHZwnQ4Rd220WCrOAKIoJxyo8oTiX02mH\"}', '8', 'http://localhost/olongapo/public/logout', '::1', '2018-01-22 23:27:12'),
('56489080-fcd8-48e8-9132-e155f64fd027', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"FQVVKyNiZuBfOplpOPbJMMhTLWFWUBatEoM83bBmqODn5oWbiTU8DQNPN9tq\"}', '{\"remember_token\":\"h5FDiqTUTuauy8P2vfkf5SMYgj17VAwEOlBIuCCwzyPEaOXWOgWEBkASh4Ge\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-25 22:58:56'),
('573f241e-7829-4b18-abf1-a15afe19a392', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"dPh6yMxG6I8PljxTAP2xIgsEn2aYyDKFLKrzO096gPyX4DvsvoVJpS5dGfX9\"}', '{\"remember_token\":\"cR61XZ2QKQZRMYGpEPaUdbpiBjkaH9MTpbY6FVMLceT5vfDEjBOo8uD1zQf6\"}', '3', 'http://137.7.22.80/olongapo/public/logout', '137.7.22.80', '2018-02-20 01:19:06'),
('5745daf0-da26-4037-95cd-6e539926d0d7', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bcfqA1K64CK641huJYS50DCyQQ6oSZFuSatthagpVaLa4ga5JNK320f7LUCz\"}', '{\"remember_token\":\"uaPxBj0RN2rmG5nIvtBMZQfdCsWAsMOLoRJXrdJxJb2A7qWnwSmCMfiuUXdh\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 17:48:48'),
('5783992f-340a-4c15-bff8-97854678eff0', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kWideLsKu8Bjn09kAN7gAb7My9ptbLvdQ9NYe8CxbJSmZaZ4yri9MFJN1NTE\"}', '{\"remember_token\":\"BQ9toYMX6rMNl7Ptld4YiDBqP7NhE6oM82YUaoVcZGj9t4RZTSuRmDdulobt\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-11 19:18:00'),
('582ad61f-764a-4955-87db-88516b219c1a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"AXN5BaQscPyHlP1vbV5U4RBOYqGJ3B5TjJsTMK2JFBqsoVOtt5CvunNYLn6m\"}', '{\"remember_token\":\"FQVVKyNiZuBfOplpOPbJMMhTLWFWUBatEoM83bBmqODn5oWbiTU8DQNPN9tq\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:44:53'),
('5891d12b-ddfa-44b0-b917-e13e6dfdff2e', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"b10nHSl82hVnRLQ614i0teYjykZTHNk6W14U12mOSCLUkhX0AuCw9vAgCl1d\"}', '{\"remember_token\":\"TLD90HdScZFoZ8DzsbL1zvUPoJJJXTYF9bbYzFz1hSB94TZSGKtD4ZP7KfWK\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 16:38:53'),
('59d71e64-d463-4e71-a030-dccde08a0de8', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"jr7LWRmKwMWI9gPIDBV4kieMGRQ9nHUdIEAlNhjjBC9JoSI1ypcjNb0UZ7nV\"}', '{\"remember_token\":\"RcLUvvsIDLXjFhlAaye6MuQDQklT52IK0U2ijhOHFQHQrniYNI5KpCg5s1IE\"}', '5', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 00:06:34'),
('5a091f99-b8ff-45e0-813b-2361a9b9e02f', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"oIojP487sehB4sIrBx4K9zprXQvT4HutkohbC1OgnmPzickO8wKTXh4wwDXi\"}', '{\"remember_token\":\"RIlgrw00clZ6XYpJAfJXxbsOvdMOe3PhjHMvwTD82lKUYXbfwNnlUdvhMzp5\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-23 18:35:32'),
('5a15e972-afba-4243-9015-782686a1de70', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"WpmBKfwttJM2HtsF1Q0bZ26Ee5SOIGNZmhNgBA60q6lDQ6hjE08kF9n5Zlsx\"}', '{\"remember_token\":\"hhA1YkJIPWrTOGIXvmpatEouQ8bJb2Qn9xzCueD55vNNcIgrx9g1JklptjyU\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 20:14:24'),
('5a1f37a4-6492-4f80-b387-9fc6e94c6583', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"q9jqaJqsQQphk9NFihfHAbhHkz7hFhrrCp3V1EHGSkKo2RarSnAaiPnZjvLt\"}', '{\"remember_token\":\"puzagXuCZ0fjsNlDCg2Q86ltZ9RygxC2Z40PAFernL3vuMbV6XehLMylVEsa\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 17:50:56'),
('5a5368c6-f065-4051-94e7-d6d2edd291bc', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ZhAhNRVSROvUWRS8CViZl9OUwJ5DehzAWeMtBMt1DlaOFORLkRxGFT79pdMs\"}', '{\"remember_token\":\"xoyjzycfSjQzTMQIYb6EMt6bXdBEv8bokt8zdnCQAgEr2FAvgSN2NcntQb5c\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:58:17'),
('5a91505e-b96c-48c1-9f96-b04941c192b9', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kmvkuFAZ3ImoEtKGxvnylCjZO5RBCwDraNdTjrveBekYQQFbui3uTPbyQRAW\"}', '{\"remember_token\":\"DuDZXLbbf0d3NpXXJGhILrXYk0iFvORf2UKyA7crAiaRaJKltK2TezEfZyVi\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 16:27:13'),
('5b7f2094-49ee-4274-897b-245860b373ae', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"jjj90s9Lh3h5qJ4JuqYLCq3kUCG5vpEone68djR71mVfVkwGBb0s7twWTXAA\"}', '{\"remember_token\":\"uDbOr1QwxEOyQ18Ezh9owa3dKVQKoZTCRboDq3pIaeqZeNUX5ohVREI2V0xr\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 17:40:47'),
('5b86e56a-393a-46ef-b658-af3c9057b743', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wXyRDsIRbUjfsyR3SJOCmGlzQWh2bgW8DFkZfnQkluLzK53xTB0Xk5QlimcW\"}', '{\"remember_token\":\"3sVoeF8dlYjVnbP6HuJi8zV2irn4yaAwSn5GUycaATKJhCKHYF5DykeGjWk1\"}', '8', 'http://localhost/gso_olongapo2/public/logout', '::1', '2019-07-19 00:03:14'),
('5cb2bd2f-5c1f-4a12-b02d-70f0df0d090d', 'created', 39, 'Modules\\Template\\Entities\\MainNavigation', '[]', '{\"group_id\":\"9\",\"title\":\"Set PPMP\",\"route\":\"147\",\"parent\":\"0\",\"arangement\":\"2\",\"properties\":\"{\\\"i\\\":{\\\"class\\\":\\\"fa fa-id-card\\\"}}\"}', '1', 'http://localhost/gso_olongapo/public/template/add-main-menus', '::1', '2019-08-15 17:58:40'),
('5ceb1d72-1018-4494-b6c7-0d1404f91731', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"SIHTOq9atxTWgKKnGOU947rzrD6BJfhywSJ7AwEjQw1evQbMIVVhBq2bwctP\"}', '{\"remember_token\":\"wbdxtz3zKYAV2LSyWe87aR3B2Ci9A45Z3fEwHr1Cr2F80UOWWxdESV1YKwph\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-09-19 23:12:17'),
('5d3ae12f-e18d-46e2-930e-5789313ca0ab', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"lwnGGle92BuKqEzWENuyeUXRXobqnOc5CDS39wnNJyeUPpl63BZVqIw7VXZe\"}', '{\"remember_token\":\"TgJg0VG4fwRTsjvA90YllIBy4k0mXccU59EAuoeULX8ZkCI17lu93xXAZXMY\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:12:45'),
('5dd47d1c-825e-4ada-852b-908c6c92508f', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"UTOUpB6vptPrXQ5vYsnFkv11lyjMjOBM3PTkMGX8t2aCPS0BMKt38PJumQus\"}', '{\"remember_token\":\"m1g0cdrNWqnl7LenBwjrByKHBa8notBFBDJp8scTZ6vq6ZT6xMhT0JC8uPg2\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 23:06:37'),
('5e094fcb-d851-4d3a-9c14-9888930622b1', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PUlDkwvgMkdsNfifkpZXOcgDi8SoICln6wB5Z60IyYW48i5zv0Xg898wBeMg\"}', '{\"remember_token\":\"cd58G19HOpVQdHZM3Rh2m45lEReXT1qydCtfL3KQa4p95275buDdtqqoZD0M\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 17:07:17'),
('5ec0d1da-6465-497b-8df9-db2f01fc72e5', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"22JE52BfKLXRlYp5GHSocx0e1tnln1V43lwAEcpeQ3qgcnsrZPPTpR6kgVvs\"}', '{\"remember_token\":\"8z3iv7yVlEAbii0Nqrj9OcCRsNIVBYwTqPFQP5tJc1CEmMGYp2ND9RKGYDZv\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:40:34'),
('5f206694-73da-4040-9369-16e8e574f015', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"gzTmG6vcLnysREGKlRCdZY4cniPs7HmvnjT3GWQdm1JmZrNtgrCohHBqxKy2\"}', '{\"remember_token\":\"dZAGb2QbD4qeOaCEVVFIC6DuA2AD6dkPxXKNmiLYzFEcVPIPQ4g7tuPbasKd\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:53:05'),
('60e637f0-ddaf-4ffd-8b3b-db912432f3f9', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bhgc5oF1KeIMcZh8Q1WbGz6tBoOyWhbIJ5v4qWlv7g3Ykmci7sSYjI4mlrlw\"}', '{\"remember_token\":\"ABH1laofHwINsSUdqLbUdBRA3qkqi18amGK8MewWQddoflymwSS9R7smBo3z\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:40:32'),
('613c36d8-8d8d-4666-bcb3-2457d52acd1e', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"SaawRPjBiHdcwaHvPFbnVvqmGsRhQRZNJcYezXTYhhZKWbT56JyYyOq2Njtk\"}', '{\"remember_token\":\"jJXDTdHv1Cj8QCLAK9NmdC23kq6mjWy3354cxPvSCRFVzobyfzlwT7c0qbx9\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:52:07'),
('628cc0fe-be4d-4dbc-892e-5b5f278061ef', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"aA5pBqaSTLFC8wSOzTsA7iWn431ogGa5Ygqqx8qSdwykKG6BGisOnsodxga6\"}', '{\"remember_token\":\"gjpu4zTLuwJ6bQKeM133Krv9Ri2NRwgDZcrm4gBhAK5YrdSfjl9lYvWca8bx\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-23 18:34:21'),
('62c34c48-e8e5-46ef-830a-25510c1579a9', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"2c4OtrC8KAA1KjyIKFRHXb9YvEa5sBlVHxdlgjE3PJvTFS7E8zurIIpSy7XW\"}', '{\"remember_token\":\"kgmAbke8zNJrhLGzN3S1pGXpTtyLskDWWhsUL0GDvzu6LrIsicJ1NiCthQHW\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:28:06'),
('6331ab30-dfd7-4276-88a0-7b553b760730', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"DBZugSVnO7u7cr80xLwC3oY5BKCfsZsB2f4MOrJz5PUo8hzt9mqUgWq9NRt3\"}', '{\"remember_token\":\"cvIHZDOJFZynn3nXoOTJJgZLHr8EVQ1cjFdvw5Ob1SUevvoLUUQjCkE7Ip34\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 00:58:36'),
('633e9689-d3c4-4e10-afa6-5ca71f0bfe6d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"tZLUnGRNXKObC1ZAnF3LqSTVe2GA1aFMvPHa01hHoCAK1WH3kaHYXcFz1cGQ\"}', '{\"remember_token\":\"Myy4ZT1MEsX4RFNRnm9HQEWh58XmDloEtlTWtQsDQHUMIKuOIxB3e70VXkYT\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 00:55:17'),
('6437e93a-7ca8-4715-ab15-91fa723a127e', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4Uiy06QHyvsloNh4dkmwnpfrv7X1eWxEKua62tXaTQKJf3id2PK7CiCCPvBq\"}', '{\"remember_token\":\"tpzGyDExem90pDAM4av1N1FzA7S4YRkI8ED7LaeQr32M9JGHMNuRfkf0YD8j\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-09-09 21:52:37'),
('64433110-6145-4e99-8392-6fe6af0b3849', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"7wAk2m4z8KjHenAC7uHzx03WpzYbKOuYCzuYLPR5txquAa8ebXnTi9MLvUrr\"}', '{\"remember_token\":\"kWDgy6bcbi2ufnxTSRR07KsdWiFptyTPIdOMS9GRHpBJ64KUaerAldPhWs7S\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 18:41:04'),
('649f3077-23e6-4ed0-9cef-f711d8a198a4', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ucA58uscYrP08v1f4wXMLEORqaG4GARZnzt1kSVAkO7wMJovdEgmcrvRVSNk\"}', '{\"remember_token\":\"QUwEEEJisfzDZ4AXhLDofUwdXXxtbtkYYue0tQ1bdVPIdvRUDkXBKkfga0Sq\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:52:17'),
('64c87a4c-77db-4ea4-98f7-43784976e535', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"J4oViRQ9SFKnjpMzRdmBigQg3sgPzptp2cA1lVMAz7T4xA3seWuG1aByClfb\"}', '{\"remember_token\":\"zGChD5Fnw0vRpCk1MBaw9LOaDkU49NxjJP0k8Kr0c38HNvlpKTVmBxXDsEhk\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-16 21:07:49'),
('64ddeb04-87f5-4671-a343-334b6bdb779d', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"fykjrZoxBo1af8glNjDVrD73F6YtvtOS9idGiOqGsz9oHDd7aHE52vmr3WVM\"}', '{\"remember_token\":\"OYFYkKorW2vEYokoh8xEh61nfuzj70Y1mHpahXLZQqc1j6TcWvKqPibyYtsC\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:08:04'),
('64e0ae05-df87-48df-9370-b8c82f4ed08d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"GEgXvlIZchOD8RMPFrjL7XcGo7TkybrfMnXTc1aI2s9j1BF6i1m7FHTROnfP\"}', '{\"remember_token\":\"evnoDyBvNtyYtrDozq5FJfqYUZBQD3RCNd8sf70XY1uvDPZKWo0XIVCTID5M\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-05 23:53:54'),
('6503918b-87f4-4d2c-a55b-ed3a8464ee69', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TsMZmhXxxnJ8k4pGxfmU70GU5nyocfHM0ZvHq9p6LPCE5DP9zf5cZ6TpxZtw\"}', '{\"remember_token\":\"MSDXkrQd1aNUdgWFSGeKlX4S7I8FzhsoFkZTTrRVQhAuUvP8BRLV1BsV51wD\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:11:19'),
('65b3a6a7-5eb8-4851-85c9-83f9ef32c2cd', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"NInFxja8yD7NvgDYd3or7uN79tDISzJzEZsXdbpjnIC9jhdGhQHKgNoIa8Ku\"}', '{\"remember_token\":\"SAtHVFhW47CZmsHUtKA3LA9MKB8uYsghcxr24YF0kJ4rS7UZdO8UwTDrmHhW\"}', '4', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:49:52'),
('66534ac7-63dc-4dd4-9992-ee15ccc3d488', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"fETMxNyRE5A4q352iEKGRld70oBuY5Nu9gfZ876ABmHvW45KZsjnXzaavazu\"}', '{\"remember_token\":\"V0XA3kvKfSoC3YyuyC7Z2EXKBsXWmHjKgvCLFetKgxLQd4XJj5yNRyAY6lLg\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-14 18:08:03'),
('66d2b148-0ce2-4151-ad7a-10a61f1350c1', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"MqQ63xhdBbNYHvTEWmdfm0lpULSjWyHYIyvInDKC7ogH8UFpNnmMYCVK74Xo\"}', '{\"remember_token\":\"0Iv9hEVgsEKqhGWlXODBRgvZx5CZezaXR8tHn4l9x79VhStNdMaILVHIw7O1\"}', '5', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:32:39'),
('66f9b93a-bf8c-4e3d-b2ca-ef19397d405d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kxgMd2JnuDOVG95f1DIUKXcgVLIAqKPFOrtIjfI3jKOBacHTzlbjcai7jtcv\"}', '{\"remember_token\":\"s9Yn43TbnZGkOoUAg3ItbvuVQn1nTTEMx8pQQ2CtzdFepWovQ0A1lFtVFO9d\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:06:08'),
('6750dbe0-213f-4699-b309-c154de761556', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"hvwVik8NV2A8Wrx6KJjJ0YildJqkNpK0UUBmsoMHTbvIS2E1BX0XG89hliOg\"}', '5', 'http://localhost/olongapo/public/logout', '::1', '2018-01-30 00:17:28'),
('67a0143a-30ec-4c4b-b5de-67b1e1d5666f', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"XOK8clLde2OdvSsmgQltUFs0KQGIrsg1BIDDkzFUCJOA6KhC6UGYTP1sIFng\"}', '{\"remember_token\":\"qCU99PKSiKW5YGwnwsvFICnqPQoi2jz2zfhbRcgYvRmf0aDnqUCBlS0QCVDE\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 16:59:52'),
('67f5e589-94b4-4ac1-a23b-71a335e70559', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"9S72rScjvnXS7MqRH528k7AOgC6wcwgGLsPTU5TbF5aSFYMY5JLy0l20NhU6\"}', '{\"remember_token\":\"kmvkuFAZ3ImoEtKGxvnylCjZO5RBCwDraNdTjrveBekYQQFbui3uTPbyQRAW\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 16:12:10'),
('68321581-8d6f-445a-99be-5bdfb881dc82', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KERgzxDypYhJZ32LOewJqRevAqi5tYKc67x0SF18NyyaM00me3l8In3rihq0\"}', '{\"remember_token\":\"eumn17cjdTJTlpbfy1gM75gZGw8iildUzOY0qsTQtIa94wWr1sQjQ5MmaNWD\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:24:11'),
('687c6e1f-ff65-45c6-af01-b9c040f55ad8', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"G335TnFs8QdDf5hX3ouh9TLFxhfxzgeRdA7WJGWA1mylJ6SwtDwHf7GorBQR\"}', '{\"remember_token\":\"iZBnwkFg3zgPGgFN5SCrlNEtQS63MivgQybPsNIxtp30s9hLfTUkyq4tbjZD\"}', '4', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:18:37'),
('688366ef-c80d-4869-91cb-0a562b265af8', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Gpf9vbsFK6lqFINMiWJLyRyEfA67Keey9whY5gNuOqs9sGLLa235iPaqH6zo\"}', '{\"remember_token\":\"kQFk6Zy3JnJE3xYFLlS6ClFsUIi9YtjokRXssU9gxIRxz8HuiIvnBhC2c47u\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-11 23:26:51'),
('69c500e2-d56b-4eb6-b81d-28f603d9cef7', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"lavWEMDeyPHCAMngnpXuF2Dgueth0uoulGhc6OH7ySJTwjWRbQbOBgda726f\"}', '{\"remember_token\":\"w6doWE1Y1wSWG9MaEfK9eC5jEOH6NE0hEO8vHbkHX7fhgdriDNBtJGNZQUnx\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-21 18:32:07'),
('6a7f5b0c-473a-46de-aea0-19dd4b841656', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"JxScU7iYdCcxywsM0fRwLgDZdRDb51DJUmeUzzFr05eCDItpEcuz7hsXCPaO\"}', '{\"remember_token\":\"WPaaN3YEIwzQ3b6yCGJPhuSGMHxu4ex0MEki6K30FOBdNS05QQE3RG53xsnw\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:41:24'),
('6a8cf364-bef0-4d2d-b3e1-6244024238cb', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"b0cWxU4YBISTuz3cH9ieZoMF19fNteCTQ345duNt1PhHWD5EbHvK3NhNa4eR\"}', '{\"remember_token\":\"OlcxtxPd6RHLMrKhQvcYf63HJx78O7FOQPC1y1geFQKak9a2OtU17GYwegSZ\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:13:46'),
('6afdb6a2-8d4a-41ec-b680-41cb4d08ffa6', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4GWmLG3Pz2HlXn8Jt1syEyyogUspDfpTrImBLMMzhllGpLJFFfPtCADvwu5L\"}', '{\"remember_token\":\"9J5aB5h30qj0g8q6oLdFamHUwoN9eJ4mCgMq7gtopMeQDOY8hFlbAOj2vOWQ\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:41:59'),
('6b1ba922-35ad-432c-a993-b5885b8384fe', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"lHG31GpfK4h081PqAeoBQhLqUVlaSBee6aqNyzVzyWqAURs6wJCsJgh6p5DN\"}', '{\"remember_token\":\"ozLCP1Co7mmZcZoJw7Qovnn3KwxVkpAWA24QZzNSGMIXfnEQkfG2tRmqQnWy\"}', '4', 'http://localhost/gso_olongapo2/public/logout', '::1', '2019-07-19 00:03:25'),
('6b3e2b76-1984-4bd3-90ca-48aae2425dd5', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"hpNkckMX8AEGO7QVkeQfnaQSIfy34hnYO6lE7JxbvRQifw7lJohEse6MgQQu\"}', '{\"remember_token\":\"x3G5bNbX9xF6rx3vXW1Pcpxcf37lZuxwKjmArWkfHHtvfR1Aw3q0fa5Gku9M\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:32:19'),
('6bae920b-df3f-4456-a4d3-594ce464aef3', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OYFYkKorW2vEYokoh8xEh61nfuzj70Y1mHpahXLZQqc1j6TcWvKqPibyYtsC\"}', '{\"remember_token\":\"hJOlJMCwl83PNj2Hq2kMyKdaQp24IAAw6aehBj4FoAwRDYu8J7eD6M3N1pFi\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:09:09'),
('6d5e1749-e14c-4760-89b3-00cd60bb1400', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4cvItAdsRHvz8FphYk5lVcEAwq5ADpc4nyPRA5onzGHsPMQk5zUq84VX4SeH\"}', '{\"remember_token\":\"lneRaJcJLmaKvP6cgVAludYBAVEL8Liu6MFo5qYbvTXv06OKk51PWw67Y4kF\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:13:06'),
('6e261c73-9ad5-4569-893e-182fbbf83d3f', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"oRiOx6lvcEMqUFruc0lTrRBwPBuqnz9lbjrakgF221OxWFXfGqL19U0IF2D3\"}', '{\"remember_token\":\"k2gyCJZuFIIHUw3K6hlxQOVQWNEIfQulobqTuStZA8LCDGik9y0NQ0eHkLk7\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 07:34:31'),
('6eca23b8-6561-47b3-ac32-535d226ce2c2', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kaNQN7ysyAsnrLkp6UZqY2SjhABgAGoa7icbj6j4mwdepofrFjPaZhc4bW0H\"}', '{\"remember_token\":\"k7SjlLhxCcg2wTQ1d01rpya3sttvgcQmB2D68V1pagjJP2qiMYczMoncW8xO\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 23:22:23'),
('6eefc6bd-2394-441f-ada7-377baa9e6ee3', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"JnLRgtXL0FdDOe6h5q77JiG5Zf95idTerXPuiMPnJnvZhatTjuwJGOrIUjKg\"}', '{\"remember_token\":\"TouI3x8qHQQ6VaUK6KAgkvHKIGffMYigrOXxCmVbn07m9aaaVw95vo5GeMbv\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-16 17:44:18'),
('6f0c2812-2b05-4409-9034-de486f094407', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"cvIHZDOJFZynn3nXoOTJJgZLHr8EVQ1cjFdvw5Ob1SUevvoLUUQjCkE7Ip34\"}', '{\"remember_token\":\"brnZlmWd1ic3rs9sjwyqgImHp6QGTct4rjRK7SK5NLjDViaupCcCSAEQe2LB\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 00:59:55'),
('6f70fa3d-769c-46a6-a650-ad414715af8c', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"nvxSUoDXMPbbOlnvGWhVWenILtTLJDmbaCQ1is7JcDH2WMqykLYLJ3gj7QNF\"}', '{\"remember_token\":\"9wztaDYfAewjUBxtxtZwxRA9Ebvc8Kagssq0XFu41rNBZcAYWQtK4RyL5uPQ\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:53:24'),
('7074d7a5-7286-440f-b8f8-4c82dd4dbbea', 'created', 12, 'Modules\\Template\\Entities\\UserCredentials', '[]', '{\"ucrd_realname\":\"Danalex\",\"ucrd_username\":\"danalex\",\"ucrd_email\":\"danalex@gmail.com\",\"group_id\":\"2\"}', '1', 'http://localhost/gso_olongapo/public/administrator/Users-Store', '::1', '2020-01-21 00:22:22'),
('7193bb6f-7c21-4797-9c04-09030bf73990', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"xfd0u74w3PGwsNe8rE3aTW42EzvIESDoat04zC40Kp7wT4jzN9n5bX6NViPG\"}', '{\"remember_token\":\"mHJsb8oQ4jRdyPGrhYlgp1OMfP2WWszBwy9Vk7mBRaIOVlx6u44AUsiBjQmH\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 21:32:06'),
('71aedb6b-02a1-41ba-8a36-19317b02dea7', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"iWjYmP6PPgosQiq90MYzZNOTSVtmVUY6RVBJVHbcjrZX9SRrAw882kSvPHXC\"}', '{\"remember_token\":\"OrRT6kfGg7tnW0F13Fpta4GXSv9k5jnqaMa6kRqDIESJbJCY5VvrzyPD4U1c\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-06 00:08:40'),
('720093c4-5fc7-4486-8168-dae70f4a1225', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"QA00xCMweuxzNOHaLMTcMbyC0G8JAwATcSmp9J0lWVgPRzgMe23J9OEhofNz\"}', '{\"remember_token\":\"6cK3jH1h6HFlhaPC8TopLXx6CjCt4WaErcn0uSwOIKSRBN93QuzFnSAyhrl1\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 00:46:24'),
('72e7d753-0dd2-4446-b709-4c62b382dd24', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"x2FRJtWasLLR5KBVoXSfEDvgtrFLgJi4sGRx2vApp3Y5yeKoI8tpjrfRBif6\"}', '{\"remember_token\":\"pRzI7j1zaQVwMNDYd73jhwWu5pUpmU8M13crFGtyccmIRsqRphXCFqDSHKAw\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:47:53'),
('73a54353-7832-4c4e-bab0-de2affd49b35', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wb91f41bdEIJgAkARXKD29TrTLfwgzq1W7lmwWoL4aVpJJ0oVH1XqmzIhl97\"}', '{\"remember_token\":\"TQzVzl0Q5JEKHccpgKCUxLW6xfQCsIIjAse3cGKiDH8rkCcp6V9RdHs2f2DQ\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 19:57:37'),
('73d0412b-f3ec-48ce-a78c-314157aa00cb', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3l8Iu9Fusl0NTG3o8jclvVc0h4IT2Z1Ag0j7fuSYVrO7QM3akc02dPUcsQuE\"}', '{\"remember_token\":\"1OhDFqQvHnTmM3H9bTg3bVe1uWE4FdOd0jLxiicVWrFDmeTUolMYtTo1EmIf\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 17:12:52'),
('7527f0a6-7479-4371-8749-e0a061e92030', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"q3qHzeljKkL5qIz7qxJcIMXcx2BqFS7wSLlSr3pDwmBYmHsinrKWWETfICG7\"}', '{\"remember_token\":\"bhgc5oF1KeIMcZh8Q1WbGz6tBoOyWhbIJ5v4qWlv7g3Ykmci7sSYjI4mlrlw\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 18:56:48'),
('7578166a-be1c-47fe-9c6d-c9c63bb1f77b', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TouI3x8qHQQ6VaUK6KAgkvHKIGffMYigrOXxCmVbn07m9aaaVw95vo5GeMbv\"}', '{\"remember_token\":\"J4oViRQ9SFKnjpMzRdmBigQg3sgPzptp2cA1lVMAz7T4xA3seWuG1aByClfb\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-16 18:18:29'),
('7666b639-a440-494a-b8f4-28a0852f9c63', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TxhtU3MWlY8tyihvL0cR5eT1vELbbKvefjTdmvudrPXk5HhlqKK9vzyAP5Te\"}', '{\"remember_token\":\"utRDpYTph29kCYHm9pgwHlZg2v0H1O4nAnO48MMFaj4S0Wes5MUrnkrvTBWc\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 18:07:50'),
('76abf8f3-453b-49e8-aea8-89dccb605458', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bbRHXwg1Kv7C1eaM9erE8uM3FDmvswQEYcmeOe0OujLntzfpM1zHsHIhnOR0\"}', '{\"remember_token\":\"c8tU70ZhH0LE3GmFQg0eLtHUYBODYQzkdLPPMe9Aw94w3oZWlDaPRUru1RC3\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 22:55:14'),
('77231118-bb80-4a45-ad82-75b3fc3ba6b5', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"NGj0ed6r0VcSOSLCSGUN93RCiNlgXUN5k8KFxteeXtCtpYPePxUcOQIdm5sA\"}', '{\"remember_token\":\"SCMmTI6anfvJAIOCO1vER92GTWBZxMO8LlE3dCz0pg9PluRSMmvPDUWHrbN3\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:26:22'),
('776b9c27-6df2-4846-b842-6aaaa639bb11', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"WA4IG8C4J0yepHikAWiy3c7J6PXeKd3jjPSezvhqhVDkaG80sSoMIMJOm0eq\"}', '{\"remember_token\":\"nEEi5eqS3BcfIRsaOgRzmq9dfcuumOUbdSACX2BkDmXYsOSS31USoQAgMFo2\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:28:00'),
('77c8d9f8-428f-4f9f-a3bd-45e8e5623814', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"7ki8OVfAIKXsakvRhIbu9ejMVhmA1czvYCgB20341Kufys1cXhRqDGhB8WY3\"}', '{\"remember_token\":\"5DQM8Eepaqi2aaHXLg1foyPVG9PRQkoYl7MhFjIj9TH9DhIR1bZP9QWwQMuz\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 00:47:31'),
('7858edf9-7a8e-4d8f-8335-6627e12f69f6', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uaPxBj0RN2rmG5nIvtBMZQfdCsWAsMOLoRJXrdJxJb2A7qWnwSmCMfiuUXdh\"}', '{\"remember_token\":\"oP5HGitXOgGo1V7zimHzEFW3vFJSWXOIGQPHxzyWJKHxEXBsudYQE3wPUC8t\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 21:41:09'),
('789d0ca4-35bc-4a4b-8407-1b6a50a6d596', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"gjpu4zTLuwJ6bQKeM133Krv9Ri2NRwgDZcrm4gBhAK5YrdSfjl9lYvWca8bx\"}', '{\"remember_token\":\"Ers4WqNRckYvbahkWLouWIAUGcgg0hzWDmWUNr4csO1hrxromO1CspNO59Qn\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-28 18:33:29'),
('7955fbda-a937-4a3a-b64f-2c6a743b90f5', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Xo2eMWvyLsVakHvz2Cc3l66qt174jhA61DoqNxl5ut1b4C1zeMsCM5kHoWki\"}', '{\"remember_token\":\"wwwembqmZDntaTAd1vic48XJKtK76otDKZChEw4fzOscrm2tYRWmG5hQzFHx\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:47:16'),
('79f32076-8398-4753-9e61-3cf9298a795b', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"pRzI7j1zaQVwMNDYd73jhwWu5pUpmU8M13crFGtyccmIRsqRphXCFqDSHKAw\"}', '{\"remember_token\":\"ADVQZmFpqEjP3XT5D7zvqrPHDRwTh25sXhZuK7jV06NllK9uDnwuIVXkMfWb\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:51:00'),
('7ae4310e-c8fe-4794-9a35-66b23cc68ef9', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"38L7H1n7Ov0eRRjZza6TRUImEij5V4QHFzZWTZmknCYKgzCfGcGQ2fNMp83y\"}', '{\"remember_token\":\"4LR0UcaTYhKmYZfLpuAQEpv1XoKSLB3h1WC9MiYuOrT77y0avNMTHccxR00H\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:06:21'),
('7aff888a-44a9-40ec-81bc-a7371f8d32f6', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"anC44uTQwW7G6nKr4b8l1ycefqgwWAsXy28BKh5ELD0E5OJXAhJkdHrnZdnf\"}', '{\"remember_token\":\"PIRH7PfEQWXIREFRxr63oalC9VFt4JsHxPVUcP6R0HgL1zvp1KHrTdqefY58\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-09-09 21:53:15'),
('7b46706c-e874-4740-a66a-d8f80bcb4bd1', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"lS6slARxl4BqfLgD7ALM4DTM54ghbCsrupFMqixKgAuXscvVDWKFlEOi1skO\"}', '{\"remember_token\":\"wDA6x1qZqvGFgVhCkjpKj2KwWu6cqVg4N3OOFq5Lc9tXMHwrjjb89rtKYtGC\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-05 23:41:34'),
('7b83bb11-3a57-4c3f-ada9-35aa6c06b920', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4YVacvhglo9HBvNOz72b9bYTJBMkNXY0wxarpIRgcQl87JMH8HaBeY37Nke4\"}', '{\"remember_token\":\"9S72rScjvnXS7MqRH528k7AOgC6wcwgGLsPTU5TbF5aSFYMY5JLy0l20NhU6\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:13:46'),
('7b9c09c4-890d-4aab-8f9e-24965b42052e', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TSTt3Pnmb5c9JefeYJ0rMiDBrFRGIckhanRChC35weSXIPqtrd9iLfq1bgCb\"}', '{\"remember_token\":\"nKuFLCcjqydx6CAgq2gwdiXVQmuAZI34NGc8msmQ6PFRLE5SkMzQ4HH2TVVT\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 19:57:48'),
('7bbf9d07-7bf0-4516-84f6-8e2b422dedcb', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"pVtgRBKXCUvBC2viGo4ItgyBjVE5V6xiLQ31DOtP9RXHtyhObSphwUGsSSZC\"}', '{\"remember_token\":\"FfbGBJQ1RodcuCYlzgPphut0IZaicsyhskjmBMcjpqQ9BhsHBIqfLlBRnBme\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-18 19:34:23'),
('7bccc854-24f4-4152-9638-d7a756cd4c32', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"mSKjx5gzo4mnd8tRZiO6NgBB33EzTVYYITYpXRf2h8TPjdZfnfCFECzAqLVi\"}', '{\"remember_token\":\"c2rNLQswLWfyM6ABPj2fDObjNVwWWlrKo4a1uxAVcnISJBtaLvhP7UdZsGPt\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 00:34:05'),
('7bdf36e2-4f3b-4316-b02d-73af8961eb71', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"rwtLdhId7lwPJcwyc3nLWDXCdeRU1LgWjXwiXnQqUA9e0HRfRRao0B1A7GPd\"}', '{\"remember_token\":\"yFelVqLJhyeadcMvkZrgs2lItMEq7iOJb5yR3Z9gTcNcjrOPOPuBQr23VWmT\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:34:51'),
('7bfbd5c1-069e-43b4-b129-1bf524db91ed', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"CRkqAY1u2RpV6YorasSusznCMMNI1oeC66wHZZ7NcGHCR2zczwh5xYubr0xp\"}', '{\"remember_token\":\"q4e7Y2Ot5JSqOfKtVn93XTlwRoPZDd8QMssfKp2zx1Izb1sp96CZCqst7txo\"}', '5', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:16:06'),
('7c19b02c-84cb-482d-a263-bf9c1f839009', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qVaBrVYjULNGIki7uX1SamhqJfw96JSV1C9nhXAzaWc6d3i7LOhNgalxjvdh\"}', '{\"remember_token\":\"Hcc3zvJp4PFbV2q7hZIGdnQlkHTtE9MggSJzCEHgaBpSI1VgcIa4kIYZsROu\"}', '11', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:12:01');
INSERT INTO `audits` (`id`, `type`, `auditable_id`, `auditable_type`, `old`, `new`, `user_id`, `route`, `ip_address`, `created_at`) VALUES
('7ce9c757-bcef-4981-ad06-c57220299e80', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TQzVzl0Q5JEKHccpgKCUxLW6xfQCsIIjAse3cGKiDH8rkCcp6V9RdHs2f2DQ\"}', '{\"remember_token\":\"8deNMhRMhDHNUW6BzF7kVFLIwTcGs7DBoqka4n8G1yPiYO8w0p9s9vPhlGqO\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 22:38:15'),
('7dee2463-0617-4a06-bc5b-13197c8f1039', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"rpPmb4Y78FnY45mvmBm7z7Mqs566sgEnFRETNOVvPnj9r03xnvY3fFXpTpqB\"}', '{\"remember_token\":\"lfA9sHpgsTHbf8z3GNQzaVFgidR7m0eS5YJwvGv9wIHDnWNHJlFsfGlVcGBJ\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-05-20 17:54:26'),
('7def0b6c-1c56-4139-a23e-50d6539fa31a', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bYWOtsp8oWrOTKf3d3swxc8lxinCHZwnQ4Rd220WCrOAKIoJxyo8oTiX02mH\"}', '{\"remember_token\":\"1K6rlD7ENO2py4aw8EhuxPDgATeCW4vRZbaRtb1aUTeIEHZIMKd0mEttCAmz\"}', '8', 'http://localhost/olongapo/public/logout', '::1', '2018-01-29 23:12:42'),
('7ee36f18-163d-4479-96cb-013c5f2cb2f4', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KNkwhAqnYxhuQIWhNiqvGjY9f7u6LB83o05xcszHv0koKcODS3G4O3ilZuWU\"}', '{\"remember_token\":\"ZcisMF3Msmr2CBgXOBriIPDbdx1FOIN5FkbtOf01paOCDI2CfZASsY6x52OG\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-11 23:28:39'),
('7f901081-df79-4f09-bf51-f538e7a57a46', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Aagr7rNRrD10Eol2fGVttaCiO5UwYqE3whxdOMlrpirFRbpGaFN5tVoobNET\"}', '{\"remember_token\":\"KdFGiyEx8XauanB5udx0wXGzAsuE0RDFrAAKNBzJC1J4L2JMdLIxB5iptyPZ\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:47:07'),
('807ecd14-490c-4255-bab7-f95c1801d402', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"J6TRhYzAgrSE4WPp7IBo25Tcr5C0MGTsKoL1XvXWQ0VX6fPnM46ioB1k6SQj\"}', '{\"remember_token\":\"L2rf8ID2g5XzEgoGJoQs2hpSNx7Arm9tapKQHrnD76hJJoFcEUttE7y1otIN\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:42:09'),
('80c138c1-e2e1-4b59-b07a-5b0fa30759ce', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"8UlrnFPAYUNoDep6UIzQg6qiYX34FjZbBiZ8nhXKKcTPjKqDp56bJ77SYKK6\"}', '{\"remember_token\":\"flrhPkUIlJt15LWvqP6BvQ4yUsz3P9TEuyFdXafGIgWuFzdeEfQdPoPWEGzL\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-21 17:31:01'),
('813aa13b-9a44-44bb-a058-c300c19ef46a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"x3G5bNbX9xF6rx3vXW1Pcpxcf37lZuxwKjmArWkfHHtvfR1Aw3q0fa5Gku9M\"}', '{\"remember_token\":\"25bvvJv9Tqz3s5k3GniNyygmBl5NgHiUp8ZiqivgV9ZYY1T4BDeIlwnFlu1c\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:33:02'),
('824a4748-76a0-4691-bd8b-dd868f3df70e', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"U2EtRxITutos2xycnrbtSrDhVUYg2w5H8BqyNjJ89E5Dyl7h2cwu3gt074VX\"}', '{\"remember_token\":\"geM2EZEvhNkdHBfbmryhLb7jmDWxE7S57EpxnvP7losy51g4MyxG9abMNHyQ\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:31:31'),
('82a58013-2d85-4042-9bad-6cb2bb213b7f', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5H7QusfHsqvDjApROTiqAwV5k9yZW9BXYaPF1PNtCZtJdQftzGIq8F1ReFnk\"}', '{\"remember_token\":\"sO6Lgglchg43oM9J5RawaEU3eODvfP0i3bxXaWuc21ac6kWt2ElkUITPiz9U\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 23:03:56'),
('82a6415f-dc52-4bf2-9403-112741a93d46', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"AeZ9QAWhWoLnLRUc1s9avvqQeActCXVhos2fN9Bt3cUopRhx3tXlGEyYpHsh\"}', '{\"remember_token\":\"BCGQne3gkZ4kla8Mn3vyZUkMuf8RaesgsNsEZsUyZlPorXYjniVPqj9gwYb3\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:35:51'),
('82c2cd7e-9dee-48e5-b29d-d902d044750e', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Gx4d0hULj0Dr4CBhG4oynI98FfoiZ2JVjN0VfukP2iIlD35WZ9L5tJFNOJQp\"}', '{\"remember_token\":\"pSZEzqrw6SdPKTPwb9fOWPgHJ9UIA97P3sjUQmJSpWZL8cFAbiJEOEEmoPQ6\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:30:49'),
('82ed3ca2-e414-4347-903c-c91cd3fceb47', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uS5wtNBntKgBhmrf4i1lLrB9t9QCr1EGwObQQSs4C83OhdWbDbEIYyFueOJI\"}', '{\"remember_token\":\"3JWvebLYZSxQzsasT6zkh63lBZLIN8sddJN8z7s45tMvNtu9Rq3FI7zgMFKD\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-25 23:03:52'),
('8308b87a-1c4a-4516-9e58-4a53f6d76ca0', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kmglkfK4PezaEGAdlooE4VoZpMdr4HqK0zoRRsmNrUAQwNweCUkHMXQabCzU\"}', '{\"remember_token\":\"Xo2eMWvyLsVakHvz2Cc3l66qt174jhA61DoqNxl5ut1b4C1zeMsCM5kHoWki\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:43:50'),
('837e817d-9503-4c39-8076-7a1936c78405', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Ms83jJGL61cnUveS7MCNcWRaIPWf1CSktAgvC3VxQeZLjSFAAh7oI2F1LHIg\"}', '{\"remember_token\":\"R4cuiLGYQ3sBsK5V0KeL88cFPTUYoI9lhUesQCz0PhazXOluHiMqWrjigTIJ\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 21:34:02'),
('8471183e-d12f-4ac8-8adb-d86f151dc350', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"XiAk20QED85VGQWaT3dhfNdJN4hzkkiDo6K9eeTt4xO1k1caALyhvQwOjmrq\"}', '{\"remember_token\":\"qVaBrVYjULNGIki7uX1SamhqJfw96JSV1C9nhXAzaWc6d3i7LOhNgalxjvdh\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:52:40'),
('848b0c5a-7efc-44bc-9a19-44a8402aff0e', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OZOVrpKIEkTPQgZ8rgZfoXkw8L1KhTWmgZnawZUjKlsRzOJsQ80Y515C4ggi\"}', '{\"remember_token\":\"UwuV4KlHjwjQC6dkmHOtN2EV7UIUR98k9F8N1gZ6aepLSvFYgfxBFMsT7npx\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-18 17:44:02'),
('84ae474a-979b-4c0f-b624-768cbe0592c8', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"82DYsWPZSLNs6HtpX29ctaRfaHFS78ooWRNTZ1oLnEaNVH90Lp63OPVV8TkF\"}', '{\"remember_token\":\"hp9UUsqfgY31uy8kKJLG4LXiKAHR5e7gXaMSACJ2WDfZJhmL2o1jrj9XPOkb\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-02 21:06:15'),
('85442df8-e91b-4867-a5ec-1aff0ba1e257', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3fvZZsuixfnklTBtk6QWRnk0gNzLeP059scrogSlnjx3RnkHRIrGCcXZzc0j\"}', '{\"remember_token\":\"LyLne95relKkQ04wfWhcIvpYlsA66VTlDljxU1osBksjIlYUAoaPPl1es2Dk\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:16:00'),
('854dab95-6403-4547-baa7-9010c4ea1003', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"x8mA9WkfVAbIVhhfwSgLyfZZYmx403GTnTd32XB3MBrqqoQEeRZL8wf3fZuT\"}', '{\"remember_token\":\"0kFd2Kzc3YarsnRxnZV5uzvzejdIGKb9l25q9aKQNOEpOGdTNtOtkhFJxGxa\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:37:09'),
('8552e5e7-be83-41eb-8777-7aea94fe0094', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wB4DtJbWzXtVUdiLcLD9jEdBjmh5kjUPF6EdChRVZJYMY6WHrd8Od7DLhvP1\"}', '{\"remember_token\":\"I2GeZli7hRtmuiLLMaLjtdJ9Xywih5mrfcjdGmLuazUX41e2uA1CAW8HyN0t\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 18:08:37'),
('8564138f-b8ae-4929-915a-88f949e7801a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bayX3XADs2whQUVIeAEp2Fq5SgXU4v0jQ9ABl6bFmffwsNeYjjo27E4q87PK\"}', '{\"remember_token\":\"mSKjx5gzo4mnd8tRZiO6NgBB33EzTVYYITYpXRf2h8TPjdZfnfCFECzAqLVi\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 00:22:25'),
('85a5e4dc-73f2-4383-9e3a-4d36f94dd0c8', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"LQ9zWpqhMRrQpGNOcLEf6uugnvB0VcvIxfs9Xvlljt6Ld1BIO2f7ZMTfExC9\"}', '{\"remember_token\":\"5Zi8gyhileCybzwtf8eP21CZpKIztgKT0VdT32DzXJNmhtPEVgYPr3GWTGCX\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 16:36:13'),
('85bef2f7-a524-4f86-88ec-506d7cd0f9f1', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"XsYucmriE6zTG9MLlRU6ArV2tSOqdLVq1BtPZJrJEOUjGZ2c7ALJ9SAyq4sr\"}', '{\"remember_token\":\"VIWkVFVLXvLSjLXKqHlOlDJ6HcxoK84j47DtAKPUOtgJMRFNjLC7yWdsn3S2\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 17:53:01'),
('8610bb12-345c-4d65-abaf-9325958fe57d', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"SRrLPMridPg1sOfAsOqt7FknvMEbEBTPQxONRf5Z8bvhy9wFtxRcGsjzP1Mm\"}', '{\"remember_token\":\"uR8ToZeodc5uJdz7dDRgpVzTcCtVraHYcBCcwK5NJznDF0JEb75xSxV9w33i\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 17:08:00'),
('8681bff2-e1de-4746-a555-9cae9b7505d6', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TUSFdmug0zUiZmeckSxxO9UGbMnzTsWkFlRfTZ8gIzgAtIlIkn3WLU9E0PeI\"}', '{\"remember_token\":\"4cvItAdsRHvz8FphYk5lVcEAwq5ADpc4nyPRA5onzGHsPMQk5zUq84VX4SeH\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:11:10'),
('86980de4-472c-4aec-8b9f-d19b69743c90', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"CLRqwHLQYMqbVxR04xGoc92FbKT70cRBILD15eU7aa8cGJRFR2ee81PgaPM3\"}', '{\"remember_token\":\"ZDLJHL8A8aXhvoTqFh5hXdduJERjvfbAHW7ViHX5Et4kEnZ7T5WlA6RqTI6P\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 22:32:19'),
('870c65ff-ad0a-49f0-9e9c-70b8fe0dd409', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OvbXik91QqxXezUsjR6NvlWaAiRq4seNkYgJI0LTnkjWdnGfwo3auKPZOvoK\"}', '{\"remember_token\":\"wH1uWvOBuPNTi6iMHjkKQZQZcTEVnKQJ0zzFplP1k1U8FVl9dmK6NEoOQx19\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:53:07'),
('87781f82-bdbf-4ca0-9eab-05db74e367db', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"HYuzZAveLAlUZnF7K93xEyVFCAQPP76RFayJKgUdn5b9WSkMHJrxV124Yuek\"}', '{\"remember_token\":\"OvbXik91QqxXezUsjR6NvlWaAiRq4seNkYgJI0LTnkjWdnGfwo3auKPZOvoK\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:04:53'),
('87784d6f-9ee1-47f8-a632-11a9535b60dd', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wYjd5zkk4PbFRIlV3mMTEcCqRlMyRidBUcdeMZU2ubPeB4GT0OxBbtwO13hO\"}', '{\"remember_token\":\"Tduf0SYE2gTk5RH9Wk266b6FL38lNmRyzm73MsnvRmyj6jd9xyBluo1RyHld\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 04:28:53'),
('87c2a9f5-7e2f-406c-ad4f-06587033be44', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"CUjADWhdbFi1OTIycEQdSEEGgOQvmdyAEKXhfnz9mzK6bJo86i4OtLIWnn6J\"}', '{\"remember_token\":\"2f5oDS4UBuLjFhmLrOlivh1Ts6hh0mDFBL9KIzgc7ZRxaQaFyNi6WvE4mGXv\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:55:13'),
('87f67e1e-b5ed-49de-a585-31bfff53aa4d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ldGUjlrTR9IXWl3WZxvyIDs28qTRV1JCjFozhpEyQmi3R5hE0IXv9JQ7ohcC\"}', '{\"remember_token\":\"CIt2jynWLuXkFVXv5bc0PjEGCY0zwxx4YiIAkVpCrHqpCYptXCKV7kRk2aIc\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 17:18:23'),
('88663fab-78e6-4ee3-bb39-44ac06d6daeb', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"b28eKUbx7fY5moaF2NGpDs6MaYajLXPYrX7mh7b9XI4D7CPSqm3lhEujG2ej\"}', '{\"remember_token\":\"qYTGwm7mFBCYaqo8YIqyCxz71BcLhhS26mkpVbG2uzyizHPgspfNyjL2S47v\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 20:56:19'),
('8947bb6f-5a46-40cd-b001-9d37e8f0bda5', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"z6hu61EG0dibhzqQ1W9EgNtUew1y33QZ6G1A9x4DlyDecxZxPz2zh2zFcVbk\"}', '{\"remember_token\":\"XrJf3zZ2nnU0dHBSZmSNrNwamUD6o6ItH1NvnOYd4VAYJwPzfvOEZU8P858H\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:32:56'),
('896b6f30-e454-4252-8c36-3683349b9762', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4MqTBjgCKCjfz012VXM6jFHUxM8pYBlBf7wTNEza6CQd1xET8NUiDDIWoSZ6\"}', '{\"remember_token\":\"VwVjAaVBb5GHOyQNS9BpFJKnPGH49STnU0BVQGrr52DkHqo15PoSFoQNiEs0\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:32:31'),
('89f8f235-99ba-4028-8243-ff63c7a2a548', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"cFjBhpdccXQJtrCtqgV9a2pl3SfZLY3FRhkpYWXAhPbRFwbWRhw9VyShm4cq\"}', '{\"remember_token\":\"CLRqwHLQYMqbVxR04xGoc92FbKT70cRBILD15eU7aa8cGJRFR2ee81PgaPM3\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 22:25:50'),
('8a06af7b-98dc-4a5a-bca9-7dd44987eefb', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"FZqAWzbNrGWtFfxwhIFShB7tIzq1uCCjR7AJvNd3PXSxqpClHYKy5RG5Yr12\"}', '{\"remember_token\":\"ZePvCFHqcJigYqmJLjNqxUgiFJhUbv0UWn4W7daAaosebjAgxCn2kGLYA1kH\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 18:25:10'),
('8a16e988-23a2-4c01-ad61-722d7af8dcd8', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"jYg9Pb5U2BFLJPcUA6OE7XUSDaMYL0nZCR5yMTNi8jdNhPNA8R7EmC4X6Guz\"}', '{\"remember_token\":\"abpVSmpM9u4tyo8s0h2tPk339KCRr2TbzULDthz0atKBvU8n0HF9JqY1Lijv\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 19:00:43'),
('8a719738-6ed4-4bec-9970-8f2e52e25abe', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0OzHtqAaWO5HzANvHkXUrBN09Gbu5QYnPSbmcjSpbseegVh119D6mLC9SNAz\"}', '{\"remember_token\":\"zqzdykZAmYBKkwt34BWzXjm74TLp9RZK6CVsXn39Ty25iZrnHadI899woWMy\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-29 21:41:12'),
('8a76e60e-74f1-4d57-970c-d563dd7eea8a', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"nD1qvLQXfS6ecGxAlvCZODOnWtExvYrc7RbPODsPyhZgMWn6Ivu7rEunLIn3\"}', '{\"remember_token\":\"lS6slARxl4BqfLgD7ALM4DTM54ghbCsrupFMqixKgAuXscvVDWKFlEOi1skO\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-04 18:21:41'),
('8ad724c9-4ae2-45f6-9f18-fc1b8edd5f6c', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"wb91f41bdEIJgAkARXKD29TrTLfwgzq1W7lmwWoL4aVpJJ0oVH1XqmzIhl97\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-01-29 23:13:13'),
('8afc63a6-2de4-40e0-9993-7baddeb39d41', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"c8tU70ZhH0LE3GmFQg0eLtHUYBODYQzkdLPPMe9Aw94w3oZWlDaPRUru1RC3\"}', '{\"remember_token\":\"fdFozjdg0ftEaWeBAJ3oB7lmPZJbRRD1UtMe0CnOPFs1cB2oIAafKyARrVVg\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2019-01-22 02:12:40'),
('8b89e2cd-aca3-4bdd-b258-1457896511da', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"SAtHVFhW47CZmsHUtKA3LA9MKB8uYsghcxr24YF0kJ4rS7UZdO8UwTDrmHhW\"}', '{\"remember_token\":\"fykjrZoxBo1af8glNjDVrD73F6YtvtOS9idGiOqGsz9oHDd7aHE52vmr3WVM\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-25 23:06:12'),
('8bd4e8db-a416-4f21-b525-146bb1dfc03a', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"CiBOUlDssi2UldwYGKxtcUu1jNAtB8ttQqEWuDOS2KVMbkvcWn6Y7X1JeEj6\"}', '{\"remember_token\":\"TNtSGvTNSJuqg8l8ZoUH8LL5UcdLpHnIj7YTv3k2AF3T8d2GW51p6T6F6St1\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:53:29'),
('8d8ab2e5-51f6-4205-93fc-98af2219810d', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"glFKVLH8qeT79V3kHptxtvTTQLT3Lhh0HlvgeLioeXO9aVmTVUpQY7u58vsz\"}', '{\"remember_token\":\"z0wGGlgC4NCi5KhQ4ljnauKQLb4ybI2bpTXGPSBropN2P5jvialtIMY8S5zw\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-02 22:01:47'),
('8e10b03f-847a-4c5c-b880-0f61269ad242', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Qe8KjBKn6xnQD8aR2MwSAxkLZcAmmcBvqKhHaAJS5yDnUPcAUFB6SaXB50PH\"}', '{\"remember_token\":\"2c4OtrC8KAA1KjyIKFRHXb9YvEa5sBlVHxdlgjE3PJvTFS7E8zurIIpSy7XW\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:02:53'),
('8f582077-9f3f-4c15-b7d5-a227e7d8f795', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"DUiJ5SeQKDfVFHNX24ktXRWHHWbubdYifthmRq7WOHoUfcAfc0zHzo1Njscx\"}', '{\"remember_token\":\"5H7QusfHsqvDjApROTiqAwV5k9yZW9BXYaPF1PNtCZtJdQftzGIq8F1ReFnk\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 22:11:29'),
('8f867d91-5bab-4a36-83f5-db29eecec757', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"e6VuIkNmKQAS6axx8sppSfsWiPlQniUxh7reAMkj8HcMWVtt5ItITZVkR7js\"}', '{\"remember_token\":\"DVXfMubWTv5xGNkh7OdrfdGL9dZmnDC9Lf6vy2v0H9CoyYpASXBkpYHpU8Dd\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:08:51'),
('8faef9f5-a798-4d3f-9523-8327dfbb69ce', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"2irHYbhWoTQj0zAJitZNF74YxMnM6juNFSyfGCjLSZnfuqXirvV8sImK8SvW\"}', '{\"remember_token\":\"obdbDUNC8NRUJUJsFw19ZoAiuZkeL7jjZHutoOKAJKobHyA2fOFIxesteLzS\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 17:56:31'),
('8fcbd33e-48e3-4546-b57b-805fbe2395f5', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"utRDpYTph29kCYHm9pgwHlZg2v0H1O4nAnO48MMFaj4S0Wes5MUrnkrvTBWc\"}', '{\"remember_token\":\"WA4IG8C4J0yepHikAWiy3c7J6PXeKd3jjPSezvhqhVDkaG80sSoMIMJOm0eq\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 23:25:42'),
('8fdad4e3-9fa7-4ac9-b3a9-e6b92d0833c8', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"7BI7VCuujBRGFbOqaPS5f6CuToDDVF8IfFUiU5GMEuQFciXQTfKa5D5VctEl\"}', '{\"remember_token\":\"wYjd5zkk4PbFRIlV3mMTEcCqRlMyRidBUcdeMZU2ubPeB4GT0OxBbtwO13hO\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 04:03:22'),
('8ff684c4-004d-4291-981e-fa8dfde3688b', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"l69ndqle94BRPwuLuaLfRycX751EYmKYXtdN5lxgH9A0b1kFWCUsSzMSebVV\"}', '{\"remember_token\":\"4MqTBjgCKCjfz012VXM6jFHUxM8pYBlBf7wTNEza6CQd1xET8NUiDDIWoSZ6\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:26:23'),
('90e25dcf-8bd0-4943-816e-d072e445a20a', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3JWvebLYZSxQzsasT6zkh63lBZLIN8sddJN8z7s45tMvNtu9Rq3FI7zgMFKD\"}', '{\"remember_token\":\"6SyWaea6nmGFqFQHZrX829Vca00zOheC89birzfaM6tBTchWNZebZGqtAtcF\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:33:47'),
('90edf4c2-0b5b-4313-b3f4-e4c381ff6dc8', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"mFDs00VA9HGN9hASE2U0WDjgkwyBgFQbsSXOXpQIYGJbN6JMLWpVOTlIhdvc\"}', '{\"remember_token\":\"KSvqiLDsYAbdtyVgnI9lTue9NHQWA2dBFjgOfSiq2UXgRRCf3uSTbBSYqHmy\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 12:05:26'),
('912ef116-496a-4bc6-9bb4-02b2b7110752', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uR8ToZeodc5uJdz7dDRgpVzTcCtVraHYcBCcwK5NJznDF0JEb75xSxV9w33i\"}', '{\"remember_token\":\"4sxkfW8kX9Py5oTmKm3rUSTOjsPqCw9B4Zt0GD0ZqeljU2A34awossCpZfJw\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 17:11:42'),
('92206def-6f7c-4572-910e-d55de9bf41ff', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"tEZ6I0eGKUeFi4t9IcdyTSFcxBWp6BGb6qzFr10LisHPWHMhckaASSv3Ho2H\"}', '{\"remember_token\":\"bRRukr3JOMZr9cjFChoYkgbZhsWwmiFM7cNnzYDBnXpVkkr64qiTdRcDxtW5\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 22:54:53'),
('9223df5d-01d9-49f9-8713-aedc75733a71', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KkZmhaWaNYhMrcoEnn4vWJVQM8MfmJHgL8MLtGoewGmPggCxweVdc7AOIMdE\"}', '{\"remember_token\":\"glFKVLH8qeT79V3kHptxtvTTQLT3Lhh0HlvgeLioeXO9aVmTVUpQY7u58vsz\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-02 21:51:05'),
('923759fd-94c6-4d67-9e43-4d68db7bbbc0', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"dNu3bjLTjdrJpu0RmG1a39u8W6wt30KmdBkBZ6N2QmIBKssFSEW9UutveVTs\"}', '{\"remember_token\":\"HYWyVinzWhEX5g31nEoswk7cUCjau515mkCJHpbj0qpgwywFXF9AAfGw8QLs\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:35:12'),
('9403ba35-142e-48a7-b03b-291b90aeec29', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"fZVSHSS9kNXSeT51rNtoGdKVa8pdcFYWK6pXa4wgPAoP9nhAf8rliIKtj0dW\"}', '{\"remember_token\":\"j9FPbqTunjO4zQ7gqarWDs9lDhoRbodTGvEg56ZHI0YLMUBRlAgH7vuOUQ4g\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-11 23:19:44'),
('94247985-d3a0-4f9a-8864-269729c82fe2', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3sVoeF8dlYjVnbP6HuJi8zV2irn4yaAwSn5GUycaATKJhCKHYF5DykeGjWk1\"}', '{\"remember_token\":\"o2mnV5R3HecsJHne5BqjUOOrc5oOPahGQevjF7oP1JNCPEPJbCs6CZDtQOU1\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-23 18:35:03'),
('947eeae5-adb5-4fec-9ed4-7e951e88a38b', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"piAn7xpgpFaV9csywQzNyDMiSp5rTra6hb7s121pR6LkyIG5JsQLdBZJHyEg\"}', '{\"remember_token\":\"gLLkOJtaE93SYfNo3bUDCI4fP0oiOvGv3IbnsR7EIy1uUJxDItAFuWZ10J33\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 23:40:38'),
('94b0ac67-d167-4557-87c8-e7ba1414d887', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BgND2fqVhJAEu3gp1ofA5pS3gbRIxOR1Ra3pQRptPmKYyR04G4IXYIBhuJyn\"}', '{\"remember_token\":\"LdZpzNE2GjVn94ruSyrMRiLHg6PgjQXwVzySSrwaRhr8md4NkoWl5inI7iZC\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 21:34:39'),
('951685cd-68f8-4a23-91a2-50855e382501', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OKl1jkHQBfbdB4HSZR81bYGOOqGVA6FcsDFRjHVyjYW2NNSUbhsngUW0muS7\"}', '{\"remember_token\":\"pTv7xw7nnVdrLtVLvKU5dvpmExrSCpFRtiVQOp8Q3QB8v3v1oPRkmPYoMy8n\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 07:48:11'),
('952cb88a-96dc-44b1-9fd6-1b118f6997e4', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"05ugxhlKAQhQb2B7knX4svVrpH2uaWwECLvi5rOxYi3GI2XarziAAjX1Xzg3\"}', '{\"remember_token\":\"vKJQtzE3hczwxzr9PSqji5Q8RHf0vOQK9pWkwHzg2E0JLMDUexhjhq450VuG\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:40:43'),
('954c3a2c-1178-4b35-80f6-29bdb8df4af6', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"31uScPjKODLtfH0Td3G7ddt9P7rdOANE48746iRpUiZOIdFBzbAkRDctpJYp\"}', '{\"remember_token\":\"XiAk20QED85VGQWaT3dhfNdJN4hzkkiDo6K9eeTt4xO1k1caALyhvQwOjmrq\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 08:59:45'),
('9551d15f-b66c-40eb-9fc4-c0dba804d2e9', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"sQg7zpXwPdUVKLYjM87v47nAtLVFkoCXOhfhfVD0m8Rd9BPrnT44T4D0kQwz\"}', '{\"remember_token\":\"JEv38fdDZp96PsL6a0Ks7XP73ujDKiv7CnhBsRFImy3PZafUte45Xh7Awc30\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-14 19:29:33'),
('95c46e4c-12fa-41a9-a70c-2ef2320830f8', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"MepMDfE7QnrR4JWM93RC8y4r7cxPGbrsIlBn4Qiw6gQYPDSpQRRfy2Uh8sct\"}', '{\"remember_token\":\"wB4DtJbWzXtVUdiLcLD9jEdBjmh5kjUPF6EdChRVZJYMY6WHrd8Od7DLhvP1\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 17:35:45'),
('9717c334-9bfa-40af-950f-62bcf80297d0', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PxnDy9OAwAsHVFeXNjqstzfgdcGC7qyIrsdWQ1dIjxU9ok00Qp1i9t82Qz4H\"}', '{\"remember_token\":\"Az5unlY0lFTiTFNX8j4yf3uPoOumJclD6HqHEUKZftfqeF809SLcg8FHqTTv\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:16:28'),
('97294dd1-671b-4d9a-8c1b-21491358925c', 'updated', 5, 'Modules\\Template\\Entities\\MainNavigation', '{\"title\":\"Inventory PPE\",\"properties\":\"{\\\"li\\\" : {\\\"class\\\":\\\"animatenavs\\\"},\\\"i\\\" : {\\\"class\\\":\\\"fa fa-navicon\\\"}}\"}', '{\"title\":\"Purchase Order PPE\",\"properties\":\"{\\\"li\\\":{\\\"class\\\":\\\"animatenavs\\\"},\\\"i\\\":{\\\"class\\\":\\\"fa fa-navicon\\\"}}\"}', '1', 'http://localhost/gso_olongapo/public/template/check-main-menus', '::1', '2019-12-04 23:11:20'),
('9858914d-46fe-4cc7-9b22-65297838415c', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"geM2EZEvhNkdHBfbmryhLb7jmDWxE7S57EpxnvP7losy51g4MyxG9abMNHyQ\"}', '{\"remember_token\":\"KjZgrnZ8az4b28N8xj7YZMpXQfxpDuLRLr1yhAVLNIKlbdF9fIU4rcjcir9u\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:52:45'),
('988ef93a-6b61-46bc-8b8a-e9d45b1e5d9f', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0NgL7xjAt4IVCuAdQypPDNYyQpOUPVgbbI7Rt6Bo5TVJ4WORNtrmsSe6bsow\"}', '{\"remember_token\":\"a0sTi808mKpLJZbvCbpvXugkeBjYKpN7fStdkIOdWrfYZl9r6Ne22FhptlTv\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 16:37:48'),
('989ef4ae-0864-40a4-ac9b-c35a1742407b', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ru1MQvYPoHhLWD3Gzto3AFUSejV2CInrSE41pln4QMeQ0MQrvu352Y2LaoLH\"}', '{\"remember_token\":\"3FrMzo8d2kNpqaPOkEYkTh7gDYgtwXXCp1YPKoBY8oauA6pnHs2shmQHjtmF\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:36:12'),
('98b14ab1-0c79-4dbf-b73d-67aadc3b5eec', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KWRbX2Y8ZdAv25qvLy4wTLnTIudqOKKeGQJLPVBrXieTN6USRc68SE5eqwT9\"}', '{\"remember_token\":\"KERgzxDypYhJZ32LOewJqRevAqi5tYKc67x0SF18NyyaM00me3l8In3rihq0\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:23:11'),
('98d2a267-c0a3-4486-a990-090fe562e534', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kQFk6Zy3JnJE3xYFLlS6ClFsUIi9YtjokRXssU9gxIRxz8HuiIvnBhC2c47u\"}', '{\"remember_token\":\"c5uTeGs3zS5E2zsqN5NYTHPKy4YgLW2nOGmRgkNWmA0wOsGM3qbKBD2Gc6h1\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 19:52:56'),
('997f2624-ecba-4ca7-ba84-fe22b273e126', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"VIWkVFVLXvLSjLXKqHlOlDJ6HcxoK84j47DtAKPUOtgJMRFNjLC7yWdsn3S2\"}', '{\"remember_token\":\"3gbgok5DzZ12POeNQByAxRU6fmqHUEpZ45I7yLzGyO1tnTYMufpQ0h7QhH9D\"}', '11', 'http://localhost/gso_olongapo2/public/logout', '::1', '2019-07-19 00:02:44'),
('99b5ca9e-6504-404b-8169-5101dfa36ab0', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"eO3bSI0Q1yB5c3wUpgmvsfvBLOPmJ6ibJScE2pscnbIfaqa44j2bhcZRW27l\"}', '{\"remember_token\":\"x8mA9WkfVAbIVhhfwSgLyfZZYmx403GTnTd32XB3MBrqqoQEeRZL8wf3fZuT\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:14:29'),
('99c87269-2855-4231-8bcd-a3b30942eab2', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"s9Yn43TbnZGkOoUAg3ItbvuVQn1nTTEMx8pQQ2CtzdFepWovQ0A1lFtVFO9d\"}', '{\"remember_token\":\"z1T6Ct68XKyJ6oqe9UnT4CCs0FtROOmZk01dBLfmRYYSZDH9ju3FTHC81HVV\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:45:17'),
('9a1b6641-2266-43c0-b2b9-dfbd5cb7c486', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"nGcebD4AxxBxkzUYJSV6TBvO9U0Uijv0UAyO9ihFwMJzt4TYV1Qv95Y3d7SZ\"}', '{\"remember_token\":\"jYg9Pb5U2BFLJPcUA6OE7XUSDaMYL0nZCR5yMTNi8jdNhPNA8R7EmC4X6Guz\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 17:47:34'),
('9c8a4cf6-7335-43dc-87a8-c9e5f2b40bfa', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"GUbWIzLpcS0E6TYpiPmA8DQusVE0voPAxS1wmkMeLTGtftb8saKdJx5Ky5YJ\"}', '{\"remember_token\":\"bayX3XADs2whQUVIeAEp2Fq5SgXU4v0jQ9ABl6bFmffwsNeYjjo27E4q87PK\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 00:19:14'),
('9cec4ec2-d6e8-4d4d-acf3-9ebff5db3c63', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ViOZJiFuDY9YOKjK1NpmLgoaMXRQhyer51fQApMEQQ4gWYEg1Atl3T1mrnDd\"}', '{\"remember_token\":\"ZCA87K3aFZV1vskpiOXGyXIUJwpLb1Ag9vSwQLGEB3WfVwTSRf6uiPzAuHrj\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 22:12:53'),
('9d6c4e93-91bd-49a9-b742-6ed7bcd7a1df', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"1bjGftT9DpIqwC8VrCFOODEEG26pAoAOe78XdVXuwigaHQFNZMAaSx75Fadb\"}', '{\"remember_token\":\"Ciy4pfoQQ04opunpKFwOiJEKtGp9JJ1AYWuSBq3ab3twGDw2F8G3dUjttkRj\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-14 19:30:31'),
('9d8eadd6-17e6-4eff-ba53-86189b78522d', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"i7JVHkagNir5zKhrq2B0L3OI1IssZ1Z1mdMEOHQuomBerDt0OdvCOoxBTisd\"}', '{\"remember_token\":\"jtiJq4N89BRC11rj6TsNcLNW5xKZnrICdXijFlKFbTkFo0sr597kaW0Lpgkg\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 19:30:17'),
('9e1a0f72-d194-4182-a8ab-2007acfedce5', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qYTGwm7mFBCYaqo8YIqyCxz71BcLhhS26mkpVbG2uzyizHPgspfNyjL2S47v\"}', '{\"remember_token\":\"v2nuwdQR72LV46DWcR1F3RcwWcCBDSr6sxd44mghGF0ZEklZaafGVk0kdVJA\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:00:33'),
('9e3364d2-8b26-443c-aae5-eba42cf41c6d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"QUwEEEJisfzDZ4AXhLDofUwdXXxtbtkYYue0tQ1bdVPIdvRUDkXBKkfga0Sq\"}', '{\"remember_token\":\"RQ7rZysWoUdX8QCjiKhXj8n3SHOa3DRHV31klbNUtca2KVeitoevNUo6TGa0\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 00:21:38'),
('9e7817be-01f0-464c-92c9-bbb7bb0945f6', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"rgSqoJE7cXmpvJGKN89zm7vybE6w1rpHoBhym1pYpwr8VlZwSfFnLxtY7yr5\"}', '{\"remember_token\":\"Og0vbfSSdokr3zhzH1eWJ1l3Z7EjVuzGAe5d5wm6jTNcFAbjAQLRClOt08zD\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 01:05:23'),
('9ed12a26-757b-4180-9be2-53b7401ce007', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"66s2WBRPEVtigHC0csBz1HEkndUTA98ZxM83FqoLru9rAqbvfY1HgNuPOuEZ\"}', '{\"remember_token\":\"TsMZmhXxxnJ8k4pGxfmU70GU5nyocfHM0ZvHq9p6LPCE5DP9zf5cZ6TpxZtw\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:58:50'),
('9ef38eb0-add7-4bcb-8f1c-0aa9968f0894', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Jb6tP5Kt7tyvN6VkhQJ1Wt21Etv8sDkjsgWnxbxY7JARf0s2viTceA6rFgIO\"}', '{\"remember_token\":\"hYkqybOfY5GF3yOhbii6397FH1NRFHcc3QbKi2UYdekESit3tRC2UYiMSYOR\"}', '8', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 05:24:00'),
('9f4c61fe-a8b0-460b-8b83-ffe25719fe8e', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uWrIHJWMdJnfyAjBCZgwpsV9pv4kn5FAxoFpHXG3cUt2H0wzWqqFhQGEMyNS\"}', '{\"remember_token\":\"gzTmG6vcLnysREGKlRCdZY4cniPs7HmvnjT3GWQdm1JmZrNtgrCohHBqxKy2\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 09:01:20'),
('9fbdc97a-0718-4ec2-92af-2de33d7ce69e', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"aWqZDCjZyb9xI1O8z9Hyds5nBcBR0Y1hYezUjdcI9ZhmicVgzdEsnuRkv8CQ\"}', '{\"remember_token\":\"C76Y4emzhmGWANj7DvPFfd8mjTsTnr4oz9CD1NJkD2IxQW27naegTNqoMkOP\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:21:23'),
('9fdabf47-4e70-4aa4-820a-59c0025e5347', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"tl6feyJBWdq037OQOBvCA1uablAG98sgoHQqEHMpTeJWOhAyyK70BfzcQW6x\"}', '{\"remember_token\":\"DUiJ5SeQKDfVFHNX24ktXRWHHWbubdYifthmRq7WOHoUfcAfc0zHzo1Njscx\"}', '4', 'http://192.168.2.145/olongapo/public/logout', '192.168.2.2', '2018-02-05 18:46:22'),
('a04859cf-ebbd-4ac3-9222-1742b7264195', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"VdrDBXn6xXLoUJD9oQK1wdLrH4lx1lZ0EY1DfpnqLPT3tXbWJ1Vk2uUozGMW\"}', '{\"remember_token\":\"oiUOIQtj9BxRK1jz9eOkTTdRyZAPSDjFmXED4jfhxnT8sOsQkODiDFBeM6py\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-03 23:41:45'),
('a0e5a67c-c89d-4075-9291-494499926625', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"XCQWLaxXNX9tiIiPNShy4OLBCp5ZSf81bs4ToymcfRyOoZJ9IBeYzyxYduOs\"}', '{\"remember_token\":\"U2EtRxITutos2xycnrbtSrDhVUYg2w5H8BqyNjJ89E5Dyl7h2cwu3gt074VX\"}', '8', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 17:32:58'),
('a1ca96f6-5eb6-4d92-9b66-76a1d024e41a', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Z5bdDeiUv1wv4RNUDg1sD2LuKWWrtNMFBsZRUG8ulUCxHH5ZXwZFmlnHSv7A\"}', '{\"remember_token\":\"vlKqEgAwL6QoASty8ZgiQUmqJy69oNDnd0IN6j2GakiKfV7M2hv7AZTRMduu\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-02 22:00:57'),
('a212aa14-4ebb-4f28-9f45-e1d1484f4d62', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"X7O7tu9rsYGqFSagZCSges90bEj5gXQYRV4JcTk55Tz5yQbr7t2Rwl3iw5W1\"}', '{\"remember_token\":\"LaPwtsSPFqVHIaduaOdF41FD2nmrz7VXMtVSoXBXbytknLQfeO22fIoF8ulB\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:26:28'),
('a2c64803-489c-4e16-8576-fe22c5fc83b0', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"894RwgpvXUlQsY4JrAIY3IvUtveiQQO04uspF01s124zK51AeADIDPXk0KPG\"}', '{\"remember_token\":\"dGdm6OE4ubLkSj4UVCENQpGR6txHapLZt5Koa6W4iUJ2AdqOba1FefPeegEi\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 23:58:50'),
('a32a70c0-aa55-4697-acaf-d8b477c97f0f', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"RhNe1hPENioHTUKH4zbtOeliBMXGv21J6mPCDmBsyFGXVnIg8ilka923uLFM\"}', '{\"remember_token\":\"I4eWdnsjFq8OexpVpHkZyTfP7f1r8dcRW8TqAXkPtLnCnPfPLwPvRFUOwfzv\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 00:50:30'),
('a3774ebd-36aa-44bf-83f9-3079b317276a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"74NcAZGO79HiAB1h3JVrIYgimS9nwktkBPXiUqyTDlqhuFXrqagJQFwUZOWK\"}', '{\"remember_token\":\"V5EuSy76X5SaUANF7Rqso12jlgxfxOB1hQDuhBSX9523cOlbwtiWr08Fn6ri\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:48:56'),
('a38c0aa1-96d2-493f-9e68-546cfd361b06', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uI0gzptIw5DXIh06ThZMqLVRITZsXbfWxBlq4M5r4LFGDO5rZ82WyYaFxJ69\"}', '{\"remember_token\":\"31uScPjKODLtfH0Td3G7ddt9P7rdOANE48746iRpUiZOIdFBzbAkRDctpJYp\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 08:30:45'),
('a3ac0dca-9424-43ef-b08d-240d3f203cfa', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KBW3y3Ncgn2yfsbfZvuEaZz190k7PqZUXNrwHMX7O4xwU3U3Ln8rWaPzMJWr\"}', '{\"remember_token\":\"kWideLsKu8Bjn09kAN7gAb7My9ptbLvdQ9NYe8CxbJSmZaZ4yri9MFJN1NTE\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 17:57:19'),
('a3f3cd3b-b595-4b55-8671-68c454ea9e3f', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"tuBcXJxcQ5KPtkAQa2NM2HiyDNF7EiBBBuvA1ygAkeInD0dPLoX7flJ3fbfZ\"}', '{\"remember_token\":\"IQeifsntW5BWT16YH9FjVKToJdh37CxBPaXdHhVltexoeQO0emjdM59xxTj8\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 20:00:17'),
('a5183a6f-e063-41f4-b387-e43e111bfa4a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uj1r3K16lrrvX7yqPB7uG2SV6HARDRLSSfVqpbW0vrHZ3k9EXfh6hOHwGEIL\"}', '{\"remember_token\":\"H7RH6y1Hg3bHRKzBYeBvGn0gQ0rqjIirG8xVbFklzsygUm0ezw31oTFj8eV3\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-19 18:18:32'),
('a5759a48-5885-437f-b1a0-2ada80e547e7', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bWl0QycB7chCi5DdbdQgRNeHZvA5eht04kOnvV7ye6efeTYf6uQEGuRPyL3C\"}', '{\"remember_token\":\"7wAk2m4z8KjHenAC7uHzx03WpzYbKOuYCzuYLPR5txquAa8ebXnTi9MLvUrr\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:50:44'),
('a6222a5f-eb67-4523-a4c4-ae9e8ef3335f', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"RQ7rZysWoUdX8QCjiKhXj8n3SHOa3DRHV31klbNUtca2KVeitoevNUo6TGa0\"}', '{\"remember_token\":\"rmKp0RmaqVr8L2FmHoQC6ULUn5XVSLWgvn2gN2iEuK9GfdKvG6kwm6kKZAf5\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 17:13:37'),
('a6373220-1d70-4c56-ae1a-64fd3bb2499d', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Mhk1Lo8Yl2ZafkmewqL7fKtM1wxes69OpLlLfLJAvGe4PXLn7i94AUPbZiMB\"}', '{\"remember_token\":\"x5eqzQYX465LVf0HqCdtjlB6CAg1HkgzKIkepcY15OJzaavE3r9S5Y25EMLB\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 16:24:39'),
('a6607278-5b6a-4b3f-8b33-b73c1ae4da6d', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"dGdm6OE4ubLkSj4UVCENQpGR6txHapLZt5Koa6W4iUJ2AdqOba1FefPeegEi\"}', '{\"remember_token\":\"oRiOx6lvcEMqUFruc0lTrRBwPBuqnz9lbjrakgF221OxWFXfGqL19U0IF2D3\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 00:06:39'),
('a789bdca-bab6-4854-a088-12822a434447', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"UiStI2qNueYjy4HAYPSiJxTdwYmrBoiOCXNbG11894dcfDuSaEpHJCMZYd3c\"}', '{\"remember_token\":\"kHxZKCF127i5lHE6r0xS8UoKC12bSWlGil8mMubmE2Al3EvjeHHSuZEvXkQm\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:11:21'),
('a79b9025-b39e-4677-963d-082ef3a737b6', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"l4BWRRSJyjah6qJcxz621UhzWDzhxzZcNvWV5adzti2dVeB1nl4fTfb8mFUC\"}', '{\"remember_token\":\"siImWqBDXAugNzQ18nWZaWYQBLckzDbUM3atI8OQ0jf7lyPYrSvF4RNatw5d\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:36:32'),
('a7f51190-a3ba-4428-8967-01cccedffcc9', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ys1fbYW7ouOi0soXSoaYavYI2FN9aMkMpVUsZliIzDqeEzT4LSObOCeHpeDI\"}', '{\"remember_token\":\"0n9udTrALJ8eRSvbre8SSvcXxe0g9eCbrSCJaYB2JIeDZ5YrhlWeXoiPo2p2\"}', '4', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:29:58'),
('a8c63c00-d21a-4e4d-99bc-dd2225ae7fd7', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"pfsTPyjJUASMHTaGdgIeHVvG0r7LfaccOmFQYU1gptcDUMalneuPW5BBCsVo\"}', '{\"remember_token\":\"4Uiy06QHyvsloNh4dkmwnpfrv7X1eWxEKua62tXaTQKJf3id2PK7CiCCPvBq\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-09-05 22:25:58'),
('a8dc9c86-8547-4b33-b4c5-e8ff4f9bc0d1', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"25bvvJv9Tqz3s5k3GniNyygmBl5NgHiUp8ZiqivgV9ZYY1T4BDeIlwnFlu1c\"}', '{\"remember_token\":\"AXN5BaQscPyHlP1vbV5U4RBOYqGJ3B5TjJsTMK2JFBqsoVOtt5CvunNYLn6m\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:33:59'),
('a960a674-87c5-48e1-8f95-72072c1a5ec5', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"95P1wVciYKrxtvEVSVUHBIUgkckXxEgg1BTviYtRFL20VyVgu4aRy9IHSL5E\"}', '{\"remember_token\":\"kkpGA3Cs3MRpR6JAkWm122l8xAlPs1tfQnaSYGbmxkLGGY8glbBT5N5w8TlJ\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 01:03:29'),
('a9eb11cb-759c-4d23-bd0d-46a52a46daf4', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Ez9ELubbub2M1FCsMUMvJDjgucJ7gLwV5jBYFnG54yPEGQLa7rZoCG7rgqoA\"}', '{\"remember_token\":\"Ms83jJGL61cnUveS7MCNcWRaIPWf1CSktAgvC3VxQeZLjSFAAh7oI2F1LHIg\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 20:54:48'),
('a9f58c6a-6650-4448-9144-86effe16e75f', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"GX1iZq1nQIhjBmPbB07NejoT3B4QnQ95SzwrCzYh3VaKXyjRKjZMBIk44QeY\"}', '{\"remember_token\":\"fE1BTpMuuCYoIpFWStt5d6oEL27PXhiw59mOUIrDTdVekSySwlLSUGLej8Ql\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 21:47:17'),
('aa01f280-96a4-4c0c-ab1a-eb783505e584', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"jWp0dU1zYlVMjQaOJ5671I6W1opUx4ey4tFngwYvXoJQUQ9d1rsPsKlEakJr\"}', '{\"remember_token\":\"NioYGGRujntdMz4061lWYh3GD9MEB26QwODvI48wdOo0vS3aL9Q5A6WbPyEA\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:10:58'),
('aab57614-433f-4d73-a694-c0ab981e3052', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"1y8r0fSz1fTXo7PlDgjO485quu8uGE74oOylwtrJPrcbRfnfa03PlZFiMEuM\"}', '{\"remember_token\":\"hpNkckMX8AEGO7QVkeQfnaQSIfy34hnYO6lE7JxbvRQifw7lJohEse6MgQQu\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:30:20'),
('ab1e9dd9-d004-4873-852e-8f8307bf5c64', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Me39u5Xior2khMHbB3uiPU0O4Qt2NAManePWdNcNwLnDQRgKcMG7VmdrS6wH\"}', '{\"remember_token\":\"rgUYqRlMEcJQXHCI5ViaseKIqyvDBgSkIHOjngrSaWe5lbiOdhte3OQKNyQy\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 04:01:59'),
('abbe1ec1-d4eb-4276-8389-3b015dd617ed', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"FfbGBJQ1RodcuCYlzgPphut0IZaicsyhskjmBMcjpqQ9BhsHBIqfLlBRnBme\"}', '{\"remember_token\":\"lHG31GpfK4h081PqAeoBQhLqUVlaSBee6aqNyzVzyWqAURs6wJCsJgh6p5DN\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-18 23:20:09'),
('abef4ff9-a1d1-4413-9ac4-8baf6e644548', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"I2GeZli7hRtmuiLLMaLjtdJ9Xywih5mrfcjdGmLuazUX41e2uA1CAW8HyN0t\"}', '{\"remember_token\":\"SgyzIV3rCzF7onWR9HL3KYr11WClZr2PjzJG6tOmVHOanuwAiWSp5BzuonIz\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 19:29:33'),
('abf3893e-1bee-4b7f-ae4c-51612ea8af32', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Bxmv1bD1UkqzJyc3TyYSKZPA2b9m6JQGQYogooUogE1KrchZtFWeVaj3KAn5\"}', '{\"remember_token\":\"l1W6gBHWZgPcajUS4mlZIvRtgGvcKs7mkVxclhNqojC69m25Vp42aHAil0GG\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-19 00:13:57'),
('ac237b8a-0e0c-465d-8f38-1c9a893b008a', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ukfFzUtbXaFUwq40AFo8g0ZU35s0yqhplFNYQitQoAA6z3b02bqWhIpUISGM\"}', '{\"remember_token\":\"qizDZhD5lucFiF6cccQDS9Y2bGASTmKZKDSHFYHPvpZb72JgJndHm8s5lQaD\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 04:08:20'),
('ace11fe0-e2b9-4c70-b444-66a3df3a4569', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BBXj7AQPX9rea4fhXUYYQEuN1z4tVr6XIAzadm33irmBvt6nhRA7LHwD2WxK\"}', '{\"remember_token\":\"HVQZ6OXePD7sC7QoZnvIKkZJD68ZTqbeiA6IfPNMDwJlxSOLrytjOEY268d8\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 18:07:17'),
('ad043b36-cde3-45cf-b369-e1c42f65e4c8', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"YCVwYZxa8TgRho3PwYCuPaIla4Teh5e2gSilDtrIgfxKtSqWBg2pD9Jgzc5b\"}', '{\"remember_token\":\"BoxXcRRYVx8dmnNuMzqCK3Ua7NIDvK4Kd4PxZAwoKdeqLbusSmpbwekdYeJ9\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-03 21:28:56'),
('ad8670e5-2c59-4725-b2a6-f5879d423f36', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qbM4NBaikMOXXqLQst8D5WSpBjn2CPdcPa2ZCkBKodiw0MbEabgXeGFRcBhW\"}', '{\"remember_token\":\"DBZugSVnO7u7cr80xLwC3oY5BKCfsZsB2f4MOrJz5PUo8hzt9mqUgWq9NRt3\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 22:36:55'),
('adcf37b4-c123-4816-8548-9e7eadd00eb9', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"JlHz1IWqrGe1vwL0c1tg0wJeq7AES7TbkgEuM0733rk7pPnISzWo6xHHPT2T\"}', '{\"remember_token\":\"2HzDUBXFrJUWlKKWTiaarGSkX1uGdYAzossommqB9yIktGaWAkjBDOdGwqAe\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 16:51:27'),
('adf4f1af-72c5-410a-98bf-41251029b6ec', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"MSDXkrQd1aNUdgWFSGeKlX4S7I8FzhsoFkZTTrRVQhAuUvP8BRLV1BsV51wD\"}', '{\"remember_token\":\"xNRJV4bITWeoThLDbrapJyMBOVilNa3mRjitUe24BFYc46Q4dJTmi1JNCulF\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:51:32'),
('ae55e71e-0a2c-4ec4-892d-d176e5c1da6d', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"jm9cmQJvxdBEMkKZlnwq0rSC9O0JvvueZ2YwgZbC6ERtNgXRvyZTqwJadJmz\"}', '{\"remember_token\":\"Klv9or5vcLBEMpfT2is5AAEZ73Qug1Oyy8Ins3b2jwJFRlZyP5O7psOtLKnc\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:22:41'),
('af68cd5c-42e8-4c7b-8231-19031ca1a36d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"DVXfMubWTv5xGNkh7OdrfdGL9dZmnDC9Lf6vy2v0H9CoyYpASXBkpYHpU8Dd\"}', '{\"remember_token\":\"PxnDy9OAwAsHVFeXNjqstzfgdcGC7qyIrsdWQ1dIjxU9ok00Qp1i9t82Qz4H\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:13:19'),
('afe01d2a-d1b6-48cc-b135-13dcde12a672', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4sxkfW8kX9Py5oTmKm3rUSTOjsPqCw9B4Zt0GD0ZqeljU2A34awossCpZfJw\"}', '{\"remember_token\":\"FZqAWzbNrGWtFfxwhIFShB7tIzq1uCCjR7AJvNd3PXSxqpClHYKy5RG5Yr12\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 18:18:21'),
('b0933223-7c39-4279-a333-e144f0c894ab', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4LR0UcaTYhKmYZfLpuAQEpv1XoKSLB3h1WC9MiYuOrT77y0avNMTHccxR00H\"}', '{\"remember_token\":\"eO3bSI0Q1yB5c3wUpgmvsfvBLOPmJ6ibJScE2pscnbIfaqa44j2bhcZRW27l\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:13:13'),
('b20ece5a-1cd8-451c-901f-94be6707fb64', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"2tVoQoCWtn2Nfavj4fOJistQ2BzyItKdBlPXQKNdZWktu0JNRHbU6ADy7eeH\"}', '{\"remember_token\":\"klUUlGgKCKOR8BNHVDee1rqGZvsNtxrZA8wgOvhvJJUiM9Yl8kgTxcStQPeY\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-05-02 23:39:13'),
('b24fe984-34af-4e86-a4fd-03ff95fe7751', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Ers4WqNRckYvbahkWLouWIAUGcgg0hzWDmWUNr4csO1hrxromO1CspNO59Qn\"}', '{\"remember_token\":\"SRgIz45bliQRiFJ7jhTjNOLUu4vTUqaMfi9VFL0qtHWfCWqLtMROXcuT6rdf\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-29 16:55:15'),
('b327fb90-0080-440e-bc63-6051864e28bb', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"obdbDUNC8NRUJUJsFw19ZoAiuZkeL7jjZHutoOKAJKobHyA2fOFIxesteLzS\"}', '{\"remember_token\":\"OZNDKWjpmDif51IyC9UPIcqqdmRHoZRZHeosNLr0ZCNd1B0TjlKMVEdbEmdT\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-11 19:18:18'),
('b329a42e-7b7e-46d0-8d64-09885dd08c82', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"hJOlJMCwl83PNj2Hq2kMyKdaQp24IAAw6aehBj4FoAwRDYu8J7eD6M3N1pFi\"}', '{\"remember_token\":\"4YVacvhglo9HBvNOz72b9bYTJBMkNXY0wxarpIRgcQl87JMH8HaBeY37Nke4\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:11:48'),
('b40074a1-5a6f-480b-8add-b27bbd410ea5', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PgwhNhQqhRrUyjhSt3UotCookftLGCH04vafeB5T0shEAkaiUBp8r43OCPry\"}', '{\"remember_token\":\"s9wvNqwypHKpoCRSjh5haoWOLWJP1Rk7JCyKchqNpfaVpq1Wx5j5iVoi41FC\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-05-20 17:53:39'),
('b413badf-c078-494e-a194-74b448a6ae1f', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"7MG9FTZ34G9lIgp4BSfJ78ZFlJoi8rr6PLHGkmkMIn1DoA9leKi1DwglBSBp\"}', '{\"remember_token\":\"M9LaONy6mZbdLj0HfBBR9Autj3yyb3M4tRDrSQWTch56dGKGSznE2SjXfNVy\"}', '5', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 17:34:19'),
('b51107ca-d3dc-4745-b718-611d5bf265d2', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"jVmC9Z89Cpdb2geatOs8OkKW87JO5uK8GB9JzSycZL5yWXxBwABfRo1MWJpN\"}', '{\"remember_token\":\"ys1fbYW7ouOi0soXSoaYavYI2FN9aMkMpVUsZliIzDqeEzT4LSObOCeHpeDI\"}', '4', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:28:14'),
('b56d56fc-2388-45af-a11c-d41662e6b913', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"YV39NVqK84No1YEMJpn9lXguRYadDXczALJNxlMq8NdnEfoybvKlYyXXMMOC\"}', '{\"remember_token\":\"95P1wVciYKrxtvEVSVUHBIUgkckXxEgg1BTviYtRFL20VyVgu4aRy9IHSL5E\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-15 17:57:07');
INSERT INTO `audits` (`id`, `type`, `auditable_id`, `auditable_type`, `old`, `new`, `user_id`, `route`, `ip_address`, `created_at`) VALUES
('b612f26c-731d-4b79-b7bf-08d5e1bd8188', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"N7tf3jc93Nxg9Sul5Eizsw6ZrxtWNikwPHvGHmviQ1QsAHTdYAMUmPdc2OAU\"}', '{\"remember_token\":\"0g5xi7PldaCM1btI7oynJEP5lcFFUuC222cXsCn9qQH7meWxe5UxfkTUZEW2\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 22:47:36'),
('b69302f2-0d47-44ca-bdde-3f9097c93063', 'updated', 12, 'Modules\\Template\\Entities\\UserCredentials', '{\"group_id\":2}', '{\"group_id\":\"7\"}', '1', 'http://localhost/gso_olongapo/public/administrator/Users-update/12', '::1', '2020-01-21 00:23:09'),
('b7065753-4646-498d-bd11-4ed148cd94e8', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kkpGA3Cs3MRpR6JAkWm122l8xAlPs1tfQnaSYGbmxkLGGY8glbBT5N5w8TlJ\"}', '{\"remember_token\":\"ij9tJ8AGTpK6W1ad1ee9meJfmxAY5ETAuOAnXyCUELyJ7O3trJSKNpJHWJ6W\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-03 23:57:45'),
('b75373cf-a9b0-45ae-824e-104de28d2734', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uzUd3epp9YusTL6NFyltASH3qPSGc7i4GvM0EdtrooZ0RzzUDqKYIFDE0Ii7\"}', '{\"remember_token\":\"fMcBUrmePgWUtt4eWSkg3t34j9u1LIP1V1EUt1ND6fPTHG2u3RHMih21JLPC\"}', '6', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 22:16:49'),
('b853cad9-9874-4348-8d92-328ecebe4fc7', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5avIdSbBaEWGTwnt2yACMOxLPxHAOuFzQkRL1YSfSoYIcCGWZR9IdUZ7pReD\"}', '{\"remember_token\":\"5QW9wsd2xDYmnq3Jd9uuNafzvzAVFu5jPhxO9qGN0kc1CdZ6LZSD2j8DrHsk\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-18 19:47:43'),
('b8674589-9c87-405a-b062-7b4151dbf165', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"yljE8GwyZ7eXFew4vd4mvi8Rj8hqcuDDXuxleW8S45ro5wYgEwfdlvIiul1y\"}', '{\"remember_token\":\"0OzHtqAaWO5HzANvHkXUrBN09Gbu5QYnPSbmcjSpbseegVh119D6mLC9SNAz\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-29 16:36:17'),
('b91fbe88-0e37-4a18-9a49-2042b7191df2', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5vrCGg34zjXkJMWk2IbVqy1CmqXUJsCsw36VpOdsBDaIOxYqMD0EN0mbU60G\"}', '{\"remember_token\":\"nD1qvLQXfS6ecGxAlvCZODOnWtExvYrc7RbPODsPyhZgMWn6Ivu7rEunLIn3\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-03 23:40:12'),
('b92cb798-eb56-419c-85ac-c70d194ef95e', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"s9wvNqwypHKpoCRSjh5haoWOLWJP1Rk7JCyKchqNpfaVpq1Wx5j5iVoi41FC\"}', '{\"remember_token\":\"wXyRDsIRbUjfsyR3SJOCmGlzQWh2bgW8DFkZfnQkluLzK53xTB0Xk5QlimcW\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-16 18:12:44'),
('b97ac798-3942-49fc-98bf-8254f96b3488', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"2C7RlpYjAE1DwXJMwVCjV5Lt9LKWzQuyN6Fon1DtCRx8ev9i8SHfnE3NlY9X\"}', '{\"remember_token\":\"uK0LsifgYkuqBw8Osq40eKKWaAqHqURGMkPHsHHfmwwvcEKn68WfLBrWpRPs\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 00:18:04'),
('b992b0ba-e15b-466f-bf0f-1ee2076e8003', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"nKuFLCcjqydx6CAgq2gwdiXVQmuAZI34NGc8msmQ6PFRLE5SkMzQ4HH2TVVT\"}', '{\"remember_token\":\"G7WEpR5b6JfHYkPT2QLEw2wjMdSYDUJSu5gCbxr4AN0qjlDm6Tx7VlTMSVqr\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 20:55:50'),
('ba4e9119-3fc9-4f8d-a81a-66cdfac42d07', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"h5FDiqTUTuauy8P2vfkf5SMYgj17VAwEOlBIuCCwzyPEaOXWOgWEBkASh4Ge\"}', '{\"remember_token\":\"1joqlUdA2YJpwMueZwQL3E75oiFi76b6Kst2SxkytrFPdT9lbmYhxFN0cEec\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-25 23:03:21'),
('ba810e9d-9bc9-4d75-b1bf-ea5e7ec26db9', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OrRT6kfGg7tnW0F13Fpta4GXSv9k5jnqaMa6kRqDIESJbJCY5VvrzyPD4U1c\"}', '{\"remember_token\":\"rUuR1YZhZHNKffEoSxan2eW0XpowWoWX2y5Iq9do0oXueErBRZ3wWrZ1Hxmf\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:07:53'),
('ba9b047a-63b7-4cb8-942f-564d2916476d', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"1Tq42yqqumD4wB9Fd8BWZ43syJqapU0Fy4ypEog1U1SisGA30tlKnHGUeRX2\"}', '{\"remember_token\":\"G335TnFs8QdDf5hX3ouh9TLFxhfxzgeRdA7WJGWA1mylJ6SwtDwHf7GorBQR\"}', '4', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:12:42'),
('bb5a5a1f-d51b-4b79-a2ca-cd41fd5d75c8', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"2f5oDS4UBuLjFhmLrOlivh1Ts6hh0mDFBL9KIzgc7ZRxaQaFyNi6WvE4mGXv\"}', '{\"remember_token\":\"x2FRJtWasLLR5KBVoXSfEDvgtrFLgJi4sGRx2vApp3Y5yeKoI8tpjrfRBif6\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:42:48'),
('bbea43fa-2f41-4da7-b6c0-804357cd69dd', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"I32TKE1Qzf1dkHMuvi1KydzS2FwpnZSMwDfSu2AbwW8k6X6B8sFIUDkXDqQD\"}', '{\"remember_token\":\"7ki8OVfAIKXsakvRhIbu9ejMVhmA1czvYCgB20341Kufys1cXhRqDGhB8WY3\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:09:22'),
('bd329587-8fef-4313-80ef-6e6d3256c1ed', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"1K6rlD7ENO2py4aw8EhuxPDgATeCW4vRZbaRtb1aUTeIEHZIMKd0mEttCAmz\"}', '{\"remember_token\":\"Jb6tP5Kt7tyvN6VkhQJ1Wt21Etv8sDkjsgWnxbxY7JARf0s2viTceA6rFgIO\"}', '8', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 17:46:54'),
('bd6edd26-7fa8-4e91-b9a6-b23aa29f4a4d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"tpzGyDExem90pDAM4av1N1FzA7S4YRkI8ED7LaeQr32M9JGHMNuRfkf0YD8j\"}', '{\"remember_token\":\"q3Ftu8WHWa4CdFtUvkZJXnmBV6YXfTj09MthztUtymi5VkkLVQusKyiQlU2Z\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-09-09 23:01:15'),
('be26e4c7-4bc3-4bcc-88a5-140bdbdcdfb9', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Ma2cVXVy11e6I9m5IzoKo0JR5tmodcGr4ag0Xnp4lCnzHPKaEEUigxfnhylD\"}', '{\"remember_token\":\"lyWRrjQSr8ZKb28TJjfjeH6P1ngVFNp6nbOPnBANkle39A9qC3NT6XJnbIGo\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:22:22'),
('beff718a-602d-4202-bda0-9bec51353981', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0Iv9hEVgsEKqhGWlXODBRgvZx5CZezaXR8tHn4l9x79VhStNdMaILVHIw7O1\"}', '{\"remember_token\":\"o5w7B470QfJpP1py3mf2aoTsJEEOKS379wos6KEqPKTwkeBptwYPtKb1iVdF\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-25 23:01:58'),
('bf14353d-6ff6-42a9-ad1d-13c3ae33a8e1', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"LTgMRE89ucpz2ngwHQWR0ysvq3iGMrz3HkwHZErjlyfllX30yCw8T3Tp5NtR\"}', '{\"remember_token\":\"OKl1jkHQBfbdB4HSZR81bYGOOqGVA6FcsDFRjHVyjYW2NNSUbhsngUW0muS7\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 05:22:15'),
('bfe12a0b-39d5-472a-a83b-2a8e5ed601ca', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"GcYyjiqonW6PBC6Bva9zkatbRVdbdsi7YRX7gOyZukyvdvKxtCUyV5sdfG3V\"}', '{\"remember_token\":\"I32TKE1Qzf1dkHMuvi1KydzS2FwpnZSMwDfSu2AbwW8k6X6B8sFIUDkXDqQD\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 18:45:26'),
('bffb8cb4-479a-4612-b4ef-c2399a3f0c51', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"uI0gzptIw5DXIh06ThZMqLVRITZsXbfWxBlq4M5r4LFGDO5rZ82WyYaFxJ69\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 08:27:58'),
('bffcdcff-7135-49dc-b5bb-ee24dc5da864', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"bhyWMzVBxXkQuiau6UzJfv87GkqU6voRlw0oMuHbgExRlEvIJzaIgtxDYoyd\"}', '{\"remember_token\":\"AeZ9QAWhWoLnLRUc1s9avvqQeActCXVhos2fN9Bt3cUopRhx3tXlGEyYpHsh\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 23:23:36'),
('c0588e5a-4765-433b-8fb5-b133404b515e', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"G5QQOSiNO8Tr77R3TISAe0046wtWXtDC043KGvhh6wOwxuxfXy2k7OfCcMYz\"}', '{\"remember_token\":\"Aagr7rNRrD10Eol2fGVttaCiO5UwYqE3whxdOMlrpirFRbpGaFN5tVoobNET\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-22 18:19:28'),
('c0b980e1-cfff-47ae-972a-08a2e703f053', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"cR61XZ2QKQZRMYGpEPaUdbpiBjkaH9MTpbY6FVMLceT5vfDEjBOo8uD1zQf6\"}', '{\"remember_token\":\"l69ndqle94BRPwuLuaLfRycX751EYmKYXtdN5lxgH9A0b1kFWCUsSzMSebVV\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2019-01-22 02:11:31'),
('c120bf85-6fc2-4266-8027-d25e0c868fe4', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"nF3PbKlSu2BcneAdC989M1lqpV7xsqwZdpnSLWAgReQflEPsn0w8UVbM71Na\"}', '{\"remember_token\":\"QA00xCMweuxzNOHaLMTcMbyC0G8JAwATcSmp9J0lWVgPRzgMe23J9OEhofNz\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 23:40:59'),
('c175238d-f0be-40dd-8844-2cb287a3252b', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Rkv1pn5mS0OkDDAZgEHX183U7azY4mG8YgerCmt6UHRbdb6wUT3xJyIbhTw4\"}', '{\"remember_token\":\"esmAbTjx3l7IjYj3v8LlunkI15XoA5um8lNn0zojgjwT4HjPGRvli3XC8Xpg\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:01:21'),
('c20c56c7-7d58-4d3e-911e-cefb9e2190fa', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kw2JAIUa3dRKeslN3I5dYwf0ea6D9vcQltYPvc1OykgBay0Yz8YmP4Ls2sA1\"}', '{\"remember_token\":\"a49eQuHk6MDp17XP1ratR0uOBENgxtaaMYpp3P70IbazuU42SiPrn3hRVtsS\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-13 19:42:28'),
('c22d3d41-6a41-4e59-945b-69f88a011fb3', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"lneRaJcJLmaKvP6cgVAludYBAVEL8Liu6MFo5qYbvTXv06OKk51PWw67Y4kF\"}', '{\"remember_token\":\"CiBOUlDssi2UldwYGKxtcUu1jNAtB8ttQqEWuDOS2KVMbkvcWn6Y7X1JeEj6\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:41:24'),
('c2684964-4bab-4806-a874-eedf10d8084a', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KjZgrnZ8az4b28N8xj7YZMpXQfxpDuLRLr1yhAVLNIKlbdF9fIU4rcjcir9u\"}', '{\"remember_token\":\"u2m9n1tS9QsY8A7i6tHLgMA7AoDHzMmXUQfzug41OG0rlkfxe9u0YqQ26XmI\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 17:57:14'),
('c31271e2-019c-4ef4-94df-72221702855c', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"cHjLvMlRH6pbZm73PaQSt7gZ2b5cKwXnJ6dB9XYJkd3is6SXOYStJ8p21KOr\"}', '{\"remember_token\":\"S9ndZzhCQzwnmHVh20VWGbOnMimD1cyYzwuoIxq6bx3EJYkypGbmuMRrhUr7\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 22:51:10'),
('c38971e7-4e40-4cf1-851a-1b99f7129666', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"zqzdykZAmYBKkwt34BWzXjm74TLp9RZK6CVsXn39Ty25iZrnHadI899woWMy\"}', '{\"remember_token\":\"ghlcTsWoUNUlYStlwnN0oS05qdF4X4NdPAjEqovpkSeR5Cg7c8LehUMvtcP5\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-01 21:59:09'),
('c44e237e-eec6-4e85-930a-43a06cdb5751', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"HYWyVinzWhEX5g31nEoswk7cUCjau515mkCJHpbj0qpgwywFXF9AAfGw8QLs\"}', '{\"remember_token\":\"jjj90s9Lh3h5qJ4JuqYLCq3kUCG5vpEone68djR71mVfVkwGBb0s7twWTXAA\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:51:07'),
('c5047561-d539-4bf5-a840-984574be3228', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"hhLeNlwZtRM00rZBh3QehFLgUYJvl51n25ChjKuJLkQ7nQJ0tPN2H0Hg0NFE\"}', '{\"remember_token\":\"mHuRxh7rs5r9rfSu5Wh9Y1MsHYf1SeYDf9EzMMZhsaTKZHCw7n4iNiUfz9wY\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 19:29:43'),
('c5342f93-00bb-4b0c-9347-b1a8c6e7c52b', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"WaFXsHXPD9RA4sPWMdeiHnpTsl3t311ngdv1tTdaDIF1XbbFrpYI847YERtV\"}', '{\"remember_token\":\"KNkwhAqnYxhuQIWhNiqvGjY9f7u6LB83o05xcszHv0koKcODS3G4O3ilZuWU\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-11 22:11:05'),
('c53c02ed-bd83-419a-9a8e-e780aeccc039', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ij9tJ8AGTpK6W1ad1ee9meJfmxAY5ETAuOAnXyCUELyJ7O3trJSKNpJHWJ6W\"}', '{\"remember_token\":\"dp6oP0hzw7YfHkhLZoJzsrr7wLHwZz0T61DaCb98XOzYOI43yExJesYUetLG\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-05 23:51:59'),
('c5509d14-eaa7-4331-a5e1-c1310209e499', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"lyWRrjQSr8ZKb28TJjfjeH6P1ngVFNp6nbOPnBANkle39A9qC3NT6XJnbIGo\"}', '{\"remember_token\":\"ukfFzUtbXaFUwq40AFo8g0ZU35s0yqhplFNYQitQoAA6z3b02bqWhIpUISGM\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:53:42'),
('c5598c14-0aa1-4228-b8b3-f291d73e8650', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"EsDnCa4FEKJ9gicOlWw0X92ICXszdDLeHYXQBdbX78BD1Dx5BTA1dWDqBrGa\"}', '{\"remember_token\":\"7g7YvDDoOn3WhWLYQQYsCPSamzfQCwCi6lmRpgg1c7zoVMLNEEUuNxMl2PJU\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 22:45:11'),
('c5bf1514-41c9-4837-8ac3-d545069c91c6', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"V0XA3kvKfSoC3YyuyC7Z2EXKBsXWmHjKgvCLFetKgxLQd4XJj5yNRyAY6lLg\"}', '{\"remember_token\":\"PDiSkfYzRH2HSG3O1v8O2e6CxzNGPi1cZVyp8xO9BQINsKs9dFolg7kTWu7o\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-17 17:51:17'),
('c5fdec59-6279-414d-9c82-a4d2938f153a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"yFelVqLJhyeadcMvkZrgs2lItMEq7iOJb5yR3Z9gTcNcjrOPOPuBQr23VWmT\"}', '{\"remember_token\":\"n8zjIcdI03QhYB9VBLDUjPk2yBDVZum5FKQ4n7kNG5an2ymUo6c8Rn0AbBN6\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:42:09'),
('c603b47a-3776-4907-831f-16961176b9d2', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"flrhPkUIlJt15LWvqP6BvQ4yUsz3P9TEuyFdXafGIgWuFzdeEfQdPoPWEGzL\"}', '{\"remember_token\":\"yljE8GwyZ7eXFew4vd4mvi8Rj8hqcuDDXuxleW8S45ro5wYgEwfdlvIiul1y\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-23 19:21:04'),
('c73909b8-b191-423a-a652-6d5c15f0211b', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"0MjJD04zItyd4FoImbybqTJgylxsAZ1Blv6f6I9vllvHeMG6soaZr44ORcSL\"}', '{\"remember_token\":\"Qe8KjBKn6xnQD8aR2MwSAxkLZcAmmcBvqKhHaAJS5yDnUPcAUFB6SaXB50PH\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:02:38'),
('c7b1369b-03b2-4b91-ae02-24fd706f7be1', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"rmKp0RmaqVr8L2FmHoQC6ULUn5XVSLWgvn2gN2iEuK9GfdKvG6kwm6kKZAf5\"}', '{\"remember_token\":\"aWqZDCjZyb9xI1O8z9Hyds5nBcBR0Y1hYezUjdcI9ZhmicVgzdEsnuRkv8CQ\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 23:33:28'),
('c829795c-e5ef-467e-abed-b0da7388bc61', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"vlKqEgAwL6QoASty8ZgiQUmqJy69oNDnd0IN6j2GakiKfV7M2hv7AZTRMduu\"}', '{\"remember_token\":\"Mhk1Lo8Yl2ZafkmewqL7fKtM1wxes69OpLlLfLJAvGe4PXLn7i94AUPbZiMB\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 16:11:23'),
('c897dfcb-058c-4100-829d-bae1ff56910a', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wlMrjar2m0TQqMn30UlZu4V1lpZuhbLGaHEaZ2JGAYI5q3VBweopmgqStJE0\"}', '{\"remember_token\":\"mX4nTZIVZ7q522TH2Wx7qiMW8em4N3UTqACJq3mXpreEo6DsuYtvWGw1UKvz\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-13 21:01:54'),
('c962d574-b179-44e0-b93b-f349a5f71da5', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KdFGiyEx8XauanB5udx0wXGzAsuE0RDFrAAKNBzJC1J4L2JMdLIxB5iptyPZ\"}', '{\"remember_token\":\"ioIsF79eBNIseQSMOB16vKoo5Jic5XXMeoXqNjzXLyHaGryjz3gZczgyCRvm\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:54:45'),
('c96d5c12-c1bd-49df-922d-803c2c172701', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"RcLUvvsIDLXjFhlAaye6MuQDQklT52IK0U2ijhOHFQHQrniYNI5KpCg5s1IE\"}', '{\"remember_token\":\"paJkISdjkdzDqzICc61QUnLHxjEloV38hlKylOEWfVuz4kXh1btKs2PCmu5A\"}', '5', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 00:28:06'),
('c9cadc16-4673-47e1-87ce-fdad0595ddf4', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"suPa8LQ8AnJPJ9iNsdofh10vAlyd8Jg0SbA4qA1FS2mlU81zZwZRE7NHKxPz\"}', '{\"remember_token\":\"JxScU7iYdCcxywsM0fRwLgDZdRDb51DJUmeUzzFr05eCDItpEcuz7hsXCPaO\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:16:36'),
('c9f499b1-59d1-4e67-8c62-ed5fdf90288d', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"yCNti2TtEVL3bA0Ge8jFkG6X7Jh2z14STQ2BqQWtN7MRYVcywhHgvB7rljKJ\"}', '{\"remember_token\":\"WhGVVYrcsMHdT2QbmyljEJbJ72zyWnrYQIFoyiYsDAaWLzxpUEiy55KPAZwx\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:38:34'),
('ca011f8c-92a0-44ee-8db4-3642d187f2ed', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ZbVOXqkaq1vEi7OJ5DSbF42658gqy1lPfcZ0y2aKImVkzy04cV1fQfKMRtzp\"}', '{\"remember_token\":\"hhLeNlwZtRM00rZBh3QehFLgUYJvl51n25ChjKuJLkQ7nQJ0tPN2H0Hg0NFE\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-28 18:51:34'),
('ca0e05b2-ce39-4118-a99b-0aba388b9bb2', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"q4e7Y2Ot5JSqOfKtVn93XTlwRoPZDd8QMssfKp2zx1Izb1sp96CZCqst7txo\"}', '{\"remember_token\":\"MqQ63xhdBbNYHvTEWmdfm0lpULSjWyHYIyvInDKC7ogH8UFpNnmMYCVK74Xo\"}', '5', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:27:12'),
('caca9935-6b38-4a6d-bfa5-64d27a50c5c5', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5rsAITvA7ns9O4Ly7ZlArYCcVhqcq820sNL8Wy0JTGuOdx9HjTnZzyabyJqT\"}', '{\"remember_token\":\"Y4gUYFwPWUzXMfiYX4AHF3tZBlnVFMqyUHYXC6JSkgL291W853lbu5Q3qxe9\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 18:58:39'),
('cad62733-679e-4320-98cf-eedd3a215bc8', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ahZC8US9OwrIkBLcmjbXuj300Qdduo62Tk9m3EdY7HYJrccVUy4UZj1Un03p\"}', '{\"remember_token\":\"aE5OccFKyjZJB89lIIBodYyqXNSGqvkytcD7SxIOTZj2LGaM239T2g39BoM5\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 17:23:03'),
('cb3d59d9-6867-4b89-be45-ec1e96d0ffaa', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PaURAuUTnLTm8Tf9gpLOY6NukCDKghSZFA2Y8DEIUAaaQQUE0RDMgLFohB6O\"}', '{\"remember_token\":\"mFDs00VA9HGN9hASE2U0WDjgkwyBgFQbsSXOXpQIYGJbN6JMLWpVOTlIhdvc\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 11:00:55'),
('cb71be4e-e45a-4500-aa2b-453122141ca8', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KSvqiLDsYAbdtyVgnI9lTue9NHQWA2dBFjgOfSiq2UXgRRCf3uSTbBSYqHmy\"}', '{\"remember_token\":\"4M1ZMTX7rEkzaPiYFYxivwYBEU9e7Hcm5szF6u5w41rtu9eT0xMdnJWsJJEz\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:12:02'),
('cb89ab95-a124-4d7b-8d4d-a5be996fe446', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wH1uWvOBuPNTi6iMHjkKQZQZcTEVnKQJ0zzFplP1k1U8FVl9dmK6NEoOQx19\"}', '{\"remember_token\":\"P9GgAmcIo2Q1XthhoEDoWQYs2SA9EWClix1gy5sjVVVXNq0vmKKCMmVbCGHG\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 23:06:08'),
('cbbff64b-b916-4052-92af-5fdf45d4bd16', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"q9jqaJqsQQphk9NFihfHAbhHkz7hFhrrCp3V1EHGSkKo2RarSnAaiPnZjvLt\"}', '4', 'http://localhost/olongapo/public/logout', '::1', '2018-01-22 23:33:18'),
('cca2f4bf-9958-4017-8bc3-0ab4f92726bd', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Z42D2q5798uSw6LFNxbbDHdWVoGmcvcjgtBHWK0wXf7yh9gi8Bhdn6mGcJoC\"}', '{\"remember_token\":\"MepMDfE7QnrR4JWM93RC8y4r7cxPGbrsIlBn4Qiw6gQYPDSpQRRfy2Uh8sct\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 19:55:16'),
('ccb4bf56-48b7-412d-96e2-dd514b750892', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TZsldMWbizxn8LTaXXkK2OcgBGOaHbq7oZBKTChuWcPvEOfBOSu47q07ebpt\"}', '{\"remember_token\":\"8olGgr2KIY7dtqXOFHc6e99J9OQxCTYQnjmutM4A946xb9c7kBi8boIFLbdX\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:42:29'),
('cd03ff99-4213-47d6-947c-baefa4d7046c', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"eV3uBn9wz4bTemTQwIs9q4m5nFA5AhWTCe4gH375lgY1As3Ee0L990T8ogpI\"}', '{\"remember_token\":\"uS5wtNBntKgBhmrf4i1lLrB9t9QCr1EGwObQQSs4C83OhdWbDbEIYyFueOJI\"}', '6', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:47:51'),
('cdc59130-1b21-4421-8243-4c0624d80738', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"G7WEpR5b6JfHYkPT2QLEw2wjMdSYDUJSu5gCbxr4AN0qjlDm6Tx7VlTMSVqr\"}', '{\"remember_token\":\"BgND2fqVhJAEu3gp1ofA5pS3gbRIxOR1Ra3pQRptPmKYyR04G4IXYIBhuJyn\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 21:32:33'),
('ce00e74c-3ec1-4996-ad53-c92d4cdf06dd', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"hp9UUsqfgY31uy8kKJLG4LXiKAHR5e7gXaMSACJ2WDfZJhmL2o1jrj9XPOkb\"}', '{\"remember_token\":\"4Q2pdu9CSqwJ5wri55efIxXCl41pNb1WlRIq7TcbwCXQsHO3sSXt7JMNsAqu\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-04 21:27:48'),
('ce820b08-d3a8-4a91-a969-1616ef78344b', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"yP6cTuTc2RqvqMxvJlu7nNiIGS9kitqzWR6SEyQd3A7bEJkdWilFNr6i5ihp\"}', '{\"remember_token\":\"4Z5FJmqBNYyPKJFieN0qi0NLuGW6q7D2HmByLSPU0SaWTCCpQIZHjJs6iKKv\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:43:01'),
('cec5a2a8-7ed9-4444-9b22-1fb7f98b289d', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wrHy9NXDxiZc4eLFLKBT4VC4GdiECOXUzK172ohgCUhiRadQdfbgQoTlWg5e\"}', '{\"remember_token\":\"KWRbX2Y8ZdAv25qvLy4wTLnTIudqOKKeGQJLPVBrXieTN6USRc68SE5eqwT9\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:22:36'),
('cf5fa7d9-9c9e-4281-9c16-cf66bca29a4b', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Y4gUYFwPWUzXMfiYX4AHF3tZBlnVFMqyUHYXC6JSkgL291W853lbu5Q3qxe9\"}', '{\"remember_token\":\"jm9cmQJvxdBEMkKZlnwq0rSC9O0JvvueZ2YwgZbC6ERtNgXRvyZTqwJadJmz\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 19:19:52'),
('cf8b5a18-3ac8-41cb-8875-89f946b42470', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3dDC8u1IuFWGulWzJvqbAXLDDgciAkdSWYtNjnRb9bVS7a8VHsZrMQhMjye9\"}', '{\"remember_token\":\"JnLRgtXL0FdDOe6h5q77JiG5Zf95idTerXPuiMPnJnvZhatTjuwJGOrIUjKg\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-16 23:18:52'),
('cfc5ed5d-a5b2-44e3-b104-4ff665a931f7', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Bxsjzl9Xc3eMD6I1xWI8X02c34LZjHDyTDwah4PdhQELiOYIdm9lBz3X17qt\"}', '{\"remember_token\":\"suPa8LQ8AnJPJ9iNsdofh10vAlyd8Jg0SbA4qA1FS2mlU81zZwZRE7NHKxPz\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:15:21'),
('cfc9359b-c532-4c23-9d37-686bd5f2ea27', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3AJbABnY7xr7Or9RaWMShnCQDPCkeKvLgvvLtHT95b8ax9WPhNexL89j5bmS\"}', '{\"remember_token\":\"bzzqD3tPEnhNZJjDQN8OY8TJRcbzGhjGQLvLEnYZYUGfvpEESXIsIGlO1lmZ\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:43:11'),
('d0099297-7a20-4a99-87b7-d94e8718d693', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5l1ZNhjo7QKrwiIBiJIoS6WTtMoh0ypErXFRGWveYECvy3b27kcqaIbo8YhS\"}', '{\"remember_token\":\"uMosRsP4mp3ulP94UsCQ0FZ4rzqqzSbVyK5J53MHkT6iPVoC9AGwb5uFq3HP\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-17 17:48:40'),
('d0971f03-24e3-490d-a318-e1e05cc4312c', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"A2WwlP4GK03OKWklu7b3ZYeWkAGcILhK2qN0flS7qcIXp8ApDux2Z6imi9Qn\"}', '{\"remember_token\":\"Bxsjzl9Xc3eMD6I1xWI8X02c34LZjHDyTDwah4PdhQELiOYIdm9lBz3X17qt\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:13:21'),
('d0f657a4-0635-4a52-a6d0-8c710d9361cb', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"AZeED6FtMF15tzN6uIb2KzF5HlzvPe53rkNLny2VtmvcU9VduGttZzeOSSzU\"}', '{\"remember_token\":\"qbM4NBaikMOXXqLQst8D5WSpBjn2CPdcPa2ZCkBKodiw0MbEabgXeGFRcBhW\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 21:33:17'),
('d1492739-34b2-4e85-a9e6-8d2ee134919c', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"UwuV4KlHjwjQC6dkmHOtN2EV7UIUR98k9F8N1gZ6aepLSvFYgfxBFMsT7npx\"}', '{\"remember_token\":\"GUbWIzLpcS0E6TYpiPmA8DQusVE0voPAxS1wmkMeLTGtftb8saKdJx5Ky5YJ\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 00:17:33'),
('d1a63300-cadf-4d37-bf84-8e5434004cff', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"nEEi5eqS3BcfIRsaOgRzmq9dfcuumOUbdSACX2BkDmXYsOSS31USoQAgMFo2\"}', '{\"remember_token\":\"GZBTVe9DHGTOa0YZxjvZAlDalURmwXxU0OieQozF84XZY19MzKZ9wLagJYHT\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:33:41'),
('d1c43da2-b081-4c0f-8716-c29ec6e6bb94', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"RqqzXIApuOyVR159Y97RP9SRo0t6mF7h6Tqpmyse8IEnGdEYJIRO5pst67wB\"}', '{\"remember_token\":\"bcfqA1K64CK641huJYS50DCyQQ6oSZFuSatthagpVaLa4ga5JNK320f7LUCz\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 01:02:23'),
('d28167b1-18ea-4d90-a906-e0a82940102f', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"l06apGimOFawxrdqnEKf6Usgz4s5R1PEht7JeGcpytNVzCZ0AzxIbfK6IcfW\"}', '{\"remember_token\":\"HYuzZAveLAlUZnF7K93xEyVFCAQPP76RFayJKgUdn5b9WSkMHJrxV124Yuek\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-25 23:07:16'),
('d291cb4d-dd6f-4ad3-8811-45a41fda4b44', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"dZAGb2QbD4qeOaCEVVFIC6DuA2AD6dkPxXKNmiLYzFEcVPIPQ4g7tuPbasKd\"}', '{\"remember_token\":\"tt9JRXEsbkkasuyWbj83HUmUO2pgAvFUjtlqOc5cofqHrWmCyLedw7DvR9fk\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:57:35'),
('d36f2519-1af5-4d82-9e62-68e5167f97c4', 'updated', 12, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":null}', '{\"remember_token\":\"6AKA4ypzVgXWnkLCeWmMeBDpRG5EOxPYg51JyYYQrmQoqQe5loQK62iui9W7\"}', '12', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 00:22:46'),
('d3fa2f42-404f-484b-af18-403e7d14d7f2', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"XAzdgJwVE2owoC7adKqvkCymcKXGs5B3chVrdWK8krdZzxoyis4SbBEOBSpR\"}', '{\"remember_token\":\"Wcepj2dHpJDeDvmY5yr8podzcmD0ECCHfi0zWxRnGHctQqxjRoVReOSSR4od\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-02 19:01:25'),
('d4246cd9-7043-403c-be8c-34b3795e8781', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uETHvuzzpRsB5y3BLJgr2HjuzRlbQOmma15dEbav0apHXZi9jW1UZEoA02RX\"}', '{\"remember_token\":\"rgSqoJE7cXmpvJGKN89zm7vybE6w1rpHoBhym1pYpwr8VlZwSfFnLxtY7yr5\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:34:26'),
('d44fb14f-440b-4673-a949-8df813ca697a', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"xnIQpHFhQYQt1gQUxNp6ypFpgdtIfnR9i8ags3RWzon2LaffYaTMmWWLH3Aw\"}', '{\"remember_token\":\"J6TRhYzAgrSE4WPp7IBo25Tcr5C0MGTsKoL1XvXWQ0VX6fPnM46ioB1k6SQj\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:22:15'),
('d4570c75-dbfa-4985-b91d-63d110267798', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"DuDZXLbbf0d3NpXXJGhILrXYk0iFvORf2UKyA7crAiaRaJKltK2TezEfZyVi\"}', '{\"remember_token\":\"KBW3y3Ncgn2yfsbfZvuEaZz190k7PqZUXNrwHMX7O4xwU3U3Ln8rWaPzMJWr\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 17:54:32'),
('d4ee6002-086e-4922-8a93-31472777aba3', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Tduf0SYE2gTk5RH9Wk266b6FL38lNmRyzm73MsnvRmyj6jd9xyBluo1RyHld\"}', '{\"remember_token\":\"Mz8rkj982KaMBb8hySq0tuArxAcyoKHGIHnL65FfLo2hYeXo66owivdnETi0\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 22:08:26'),
('d5676fd2-f666-4851-9f69-56205bf9ae36', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"2HzDUBXFrJUWlKKWTiaarGSkX1uGdYAzossommqB9yIktGaWAkjBDOdGwqAe\"}', '{\"remember_token\":\"SIHTOq9atxTWgKKnGOU947rzrD6BJfhywSJ7AwEjQw1evQbMIVVhBq2bwctP\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-09-16 22:26:42'),
('d623e1db-2d98-4156-9e4b-c8680db60506', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"esmAbTjx3l7IjYj3v8LlunkI15XoA5um8lNn0zojgjwT4HjPGRvli3XC8Xpg\"}', '{\"remember_token\":\"kotX65wf1trGhV2IqBRpI4ZFiKItjOEUU3aa1FP76x3ItHWTDbst4P6QbXHM\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:06:45'),
('d646fa7d-6df7-4d02-8d52-f96e0f7d7735', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"x1DZuldgW7hbp4it9IvCfbXnuToURYSqcg61GF00lb6upllMrFaoPIEeIciL\"}', '{\"remember_token\":\"dNu3bjLTjdrJpu0RmG1a39u8W6wt30KmdBkBZ6N2QmIBKssFSEW9UutveVTs\"}', '5', 'http://localhost/olongapo/public/logout', '::1', '2019-01-22 03:15:26'),
('d6ca76be-a82a-4ba3-9755-92ec56e745d3', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4Z5FJmqBNYyPKJFieN0qi0NLuGW6q7D2HmByLSPU0SaWTCCpQIZHjJs6iKKv\"}', '{\"remember_token\":\"uWrIHJWMdJnfyAjBCZgwpsV9pv4kn5FAxoFpHXG3cUt2H0wzWqqFhQGEMyNS\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:48:35'),
('d752ae2f-e503-4f7a-8baf-d11b32416385', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"9mqdXyyrqnCrAiKc4kJ6pSqgDkWoYlnpksazHRXvjj9zhboAuuYwd2ppy1yj\"}', '{\"remember_token\":\"MQYy0nqshKD4aJZvJCsvFfjGjIKz4bROlzvZ91ForeGDk5MU22v2oMtJWB6k\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-13 19:43:05'),
('d77d90a5-a74e-400b-b87d-63c7d2f45014', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"mO7WxYZO1efv5Uo5t3Z1efSPx3EXOgS4OdlqLynZQAxIpCc1GlOklWs7QUJc\"}', '{\"remember_token\":\"tZpfG0JaUTs4UQwW6RoGNsVnbiDmEySWQNa9cBqj8MDZeIikl9wlrRnr53J7\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-16 23:19:30'),
('d78cb4ac-f4a3-4810-b3c5-a1b7ff1bbdcb', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"z0wGGlgC4NCi5KhQ4ljnauKQLb4ybI2bpTXGPSBropN2P5jvialtIMY8S5zw\"}', '{\"remember_token\":\"XsYucmriE6zTG9MLlRU6ArV2tSOqdLVq1BtPZJrJEOUjGZ2c7ALJ9SAyq4sr\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 16:26:37'),
('d8064b6a-c2b7-4dc7-b8ae-875755e0ab62', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qwHOFjopDBDygApFqti6RQYCc0IBiURD7a1E6ywPHsbYWJITloJ6AUrKgX28\"}', '{\"remember_token\":\"TZsldMWbizxn8LTaXXkK2OcgBGOaHbq7oZBKTChuWcPvEOfBOSu47q07ebpt\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-14 19:41:03'),
('d8366bdc-32ae-43ce-bb4a-8ba7546b1609', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kHxZKCF127i5lHE6r0xS8UoKC12bSWlGil8mMubmE2Al3EvjeHHSuZEvXkQm\"}', '{\"remember_token\":\"NGj0ed6r0VcSOSLCSGUN93RCiNlgXUN5k8KFxteeXtCtpYPePxUcOQIdm5sA\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:12:07'),
('d99b3b84-db51-4517-beef-5d446c300208', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"TNtSGvTNSJuqg8l8ZoUH8LL5UcdLpHnIj7YTv3k2AF3T8d2GW51p6T6F6St1\"}', '{\"remember_token\":\"erIKBqAdGLCGhpF4jOoqTyEhFUqmac1lXo4oSsWtEi2VgopiTbkgykYvw2aq\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:23:48'),
('d9ffb436-163a-44c3-9f88-b8f98ab94a44', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"WEG4E6OE2QMwRmzdUFnFegQsoTMhmjwheQksPxSxLaqDOa5cODgwx7ooexd2\"}', '{\"remember_token\":\"Me39u5Xior2khMHbB3uiPU0O4Qt2NAManePWdNcNwLnDQRgKcMG7VmdrS6wH\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:52:34'),
('da034784-ecde-446c-a661-d25bdf267c06', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wwwembqmZDntaTAd1vic48XJKtK76otDKZChEw4fzOscrm2tYRWmG5hQzFHx\"}', '{\"remember_token\":\"ahZC8US9OwrIkBLcmjbXuj300Qdduo62Tk9m3EdY7HYJrccVUy4UZj1Un03p\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 16:35:44'),
('da8a0c46-f7e0-400a-8836-df60b13c42fd', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"rUuR1YZhZHNKffEoSxan2eW0XpowWoWX2y5Iq9do0oXueErBRZ3wWrZ1Hxmf\"}', '{\"remember_token\":\"jWp0dU1zYlVMjQaOJ5671I6W1opUx4ey4tFngwYvXoJQUQ9d1rsPsKlEakJr\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:08:12'),
('dae59f93-10f5-46d9-a907-829d3fc2c7f4', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"6SyWaea6nmGFqFQHZrX829Vca00zOheC89birzfaM6tBTchWNZebZGqtAtcF\"}', '{\"remember_token\":\"X7O7tu9rsYGqFSagZCSges90bEj5gXQYRV4JcTk55Tz5yQbr7t2Rwl3iw5W1\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 00:57:33'),
('dcf30404-efd5-4185-9923-d3939bf62ef0', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"11H36SNeVnkr9rfFlRxjhYcn5Wz0UlKPNAwyRZ0eZyOrg8rDvsywdMTV8p4j\"}', '{\"remember_token\":\"n9MAXiyRqqviTiiOKeYAT9Nb5wddsQdcEyAXRznt7ylfm7eCF3cHAzdKkCre\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-06 00:09:52'),
('dd9989b5-0e97-4061-ac17-d912323aa5b1', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ZCA87K3aFZV1vskpiOXGyXIUJwpLb1Ag9vSwQLGEB3WfVwTSRf6uiPzAuHrj\"}', '{\"remember_token\":\"149X9YxSOgYI82GQitjb79ICAk3BbHsiFX4aOIpS1LvgnpH1SS1Q9JLa1efS\"}', '3', 'http://localhost/gso_olongapo2/public/logout', '::1', '2019-03-13 22:48:59'),
('ddfebba5-f5aa-43f1-8b47-4352cb45db01', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"GZBTVe9DHGTOa0YZxjvZAlDalURmwXxU0OieQozF84XZY19MzKZ9wLagJYHT\"}', '{\"remember_token\":\"b10nHSl82hVnRLQ614i0teYjykZTHNk6W14U12mOSCLUkhX0AuCw9vAgCl1d\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 16:32:06'),
('de34f91a-44ea-4cd0-9067-2e3b622f63ba', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"B3Wbk4K7T883OCOY5ujlxd7mVG4QlsGdKErlJOlBVPMqDMhk8PfQDq8mGAhq\"}', '{\"remember_token\":\"MeHd2CE3OW6fYxDwkaay5AVKbnNpV5AgUnHTCtHXGU1ZDvaAhrt87kYW4n7Y\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-27 03:43:31'),
('de920695-0af3-45a3-ad2a-b51050db9d60', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OXrOega0gjmNfal60fvxwMf8rON86oz8p0vFkrwyW5J9nxQnOh8WCceDMJD5\"}', '{\"remember_token\":\"EsDnCa4FEKJ9gicOlWw0X92ICXszdDLeHYXQBdbX78BD1Dx5BTA1dWDqBrGa\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 21:40:21'),
('def4240d-5095-4114-9f59-5777ca976b41', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"G58H7sPmRr6Js55TkepptWNv14nuvTppmPPp8S0wHF0Hu6XgEPX9YqF9fOMY\"}', '{\"remember_token\":\"7eqOKXOks8zRUTeVJkbB5Qg1wkRaEe4u6gRD87tGfLVZ1WFqHiwuaZHQdeTk\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-18 22:52:21'),
('df124611-cef9-4637-8287-44d3e2532899', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"AIN03h9QkLXEtmYfgz2kcxJbozde6HSxyZNaZKVM5GVcrpFv0FJEHLKKdUHf\"}', '{\"remember_token\":\"zWoFnMB58novZw0OwwedCZRIBROa2s8uevQF3PA4Lh3K7xryS8yVEhRsZoCu\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 21:13:51'),
('df528931-853c-49a5-ad1a-2e3357bb0612', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"erIKBqAdGLCGhpF4jOoqTyEhFUqmac1lXo4oSsWtEi2VgopiTbkgykYvw2aq\"}', '{\"remember_token\":\"wFTitOJb7uX2Ia8lZlrx6sRSGL7e0g7lhsKoKJ6FwkQDmGmbFx38aFSzU3vC\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 21:48:32'),
('e091e8ff-6901-40db-bccf-cff32a7d858a', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"dp6oP0hzw7YfHkhLZoJzsrr7wLHwZz0T61DaCb98XOzYOI43yExJesYUetLG\"}', '{\"remember_token\":\"GcYyjiqonW6PBC6Bva9zkatbRVdbdsi7YRX7gOyZukyvdvKxtCUyV5sdfG3V\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-05 23:54:13'),
('e0a6b20f-9960-4281-ab41-cc1cb840fbd2', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"NkiaMrx7GMHbJZBlCvitOh53PERa53HFX563EWFf1dXjCr59PWaF4u14SzPK\"}', '{\"remember_token\":\"Ma2cVXVy11e6I9m5IzoKo0JR5tmodcGr4ag0Xnp4lCnzHPKaEEUigxfnhylD\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 11:00:01'),
('e11cf2e0-505a-444e-81a8-f57f427667f6', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BQ9toYMX6rMNl7Ptld4YiDBqP7NhE6oM82YUaoVcZGj9t4RZTSuRmDdulobt\"}', '{\"remember_token\":\"rpPmb4Y78FnY45mvmBm7z7Mqs566sgEnFRETNOVvPnj9r03xnvY3fFXpTpqB\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-05-02 23:44:23'),
('e1717a9b-9d73-4068-a213-013561575105', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"MQYy0nqshKD4aJZvJCsvFfjGjIKz4bROlzvZ91ForeGDk5MU22v2oMtJWB6k\"}', '{\"remember_token\":\"yCNti2TtEVL3bA0Ge8jFkG6X7Jh2z14STQ2BqQWtN7MRYVcywhHgvB7rljKJ\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-13 21:02:14'),
('e17d2991-788f-44e8-b612-e2be52dc6d0f', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"RfXe49cHBz0byW0Zdkg5VITFVEY2wxx1VpQ8cui5LRF5GjvIgWHkMmiOJ4Lc\"}', '{\"remember_token\":\"BNR4qkFJ6L82ryev9HbfMBznH1fRtwyi7Dy0merMT0UUkdVPV35DYpOdOOBP\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-18 18:54:37'),
('e1f15328-0601-4d80-b0a8-bd62af93cfc4', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"sDw8026N7V9ty7ZTwTGFa6XDewu9O3QbTDzZ9EHtfZw9EV64kLunIhbz9etl\"}', '{\"remember_token\":\"qaF8L35J1b2K6d9ZOqX51BYH9DuHU22MDmAt6DJIuOPHcuhc3LNdOgOoSt1S\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 16:16:26'),
('e1fa7c8c-0187-4b21-b728-657f19b1ec5f', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BtLq5OEwJzymOm6DSSNmYY9uHRnEt95fby4Laxj2aKbgDMfo3lZxp1xHyRkt\"}', '{\"remember_token\":\"z6hu61EG0dibhzqQ1W9EgNtUew1y33QZ6G1A9x4DlyDecxZxPz2zh2zFcVbk\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 00:02:10'),
('e2e8584d-38f0-4425-b697-3df2d97f8052', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BNR4qkFJ6L82ryev9HbfMBznH1fRtwyi7Dy0merMT0UUkdVPV35DYpOdOOBP\"}', '{\"remember_token\":\"G58H7sPmRr6Js55TkepptWNv14nuvTppmPPp8S0wHF0Hu6XgEPX9YqF9fOMY\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-18 22:40:52'),
('e356c252-f64e-4bdf-9892-d7fbfc9274eb', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"wI36diad2rmwYdsUpt0BFmS7H80uXURZnCr0zlbOIT3LbUydlBDzQEwybbj4\"}', '{\"remember_token\":\"nFhEp34fnahE26j37jKuxMdfp8ZS8zxvIvKgb3mKrZ9EFv1pHoqbbomy6mXY\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 17:08:37'),
('e3be0b1c-331c-4fbd-abcb-a25bdf443c12', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Sh6C9QDNNX2h4T3v0ORMOC9sPGoIRhFvwyBpfd33rJjdoeIyRvj2R3GNVYZr\"}', '{\"remember_token\":\"OLBsaWmVL9d8zCRg1xEB7h98QzVVKFk7qHH29Nk8gqBVdWwW5OT38bh5AbvG\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 23:19:07'),
('e3dece1a-7643-4635-83f9-0a2715db1ade', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"SCMmTI6anfvJAIOCO1vER92GTWBZxMO8LlE3dCz0pg9PluRSMmvPDUWHrbN3\"}', '{\"remember_token\":\"uETHvuzzpRsB5y3BLJgr2HjuzRlbQOmma15dEbav0apHXZi9jW1UZEoA02RX\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:30:27'),
('e4962b6b-3c1b-4465-abe1-c154b8b4e33a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"c2rNLQswLWfyM6ABPj2fDObjNVwWWlrKo4a1uxAVcnISJBtaLvhP7UdZsGPt\"}', '{\"remember_token\":\"pfsTPyjJUASMHTaGdgIeHVvG0r7LfaccOmFQYU1gptcDUMalneuPW5BBCsVo\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-19 01:01:10'),
('e49ae539-e065-47ec-92ac-2446ff334c62', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"d2yyjLvjZ5y0tvGDhf8IUpYlYPeJnuRC5q6u9hpOmZ5QTohngTd8bXdnNd9h\"}', '{\"remember_token\":\"nF3PbKlSu2BcneAdC989M1lqpV7xsqwZdpnSLWAgReQflEPsn0w8UVbM71Na\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:07:35'),
('e4f79786-20c7-4032-bb65-f707dfc506ab', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"9e2wwxKfzhnGUEKXnU5sMzYTq9wfme5qDMFkM84Xn984emnCRS3F783ba2aC\"}', '{\"remember_token\":\"kaNQN7ysyAsnrLkp6UZqY2SjhABgAGoa7icbj6j4mwdepofrFjPaZhc4bW0H\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-08 19:14:10'),
('e622ec74-e63a-43a5-a2c3-cda0fec22e89', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"1sWPV3r2D5ILE8fxSzE8VhJ4D0wCUDk5rmSdByu0hlP0L01qTulS8d08oJNh\"}', '{\"remember_token\":\"aA5pBqaSTLFC8wSOzTsA7iWn431ogGa5Ygqqx8qSdwykKG6BGisOnsodxga6\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-07-16 21:54:48'),
('e624ad6f-fd6e-4911-ac81-f61ba5c138d7', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"PwyUYQxOS3VlMgsSz8qkpOHsYYLG7Y72oxj5vr1FraN5Lstwp7Z4UARgSnj5\"}', '{\"remember_token\":\"TxhtU3MWlY8tyihvL0cR5eT1vELbbKvefjTdmvudrPXk5HhlqKK9vzyAP5Te\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-20 16:50:03'),
('e69f6f0f-8611-48ed-b112-762e7bc1eeed', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"qaF8L35J1b2K6d9ZOqX51BYH9DuHU22MDmAt6DJIuOPHcuhc3LNdOgOoSt1S\"}', '{\"remember_token\":\"ldGUjlrTR9IXWl3WZxvyIDs28qTRV1JCjFozhpEyQmi3R5hE0IXv9JQ7ohcC\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-10 16:27:35'),
('e6c36b7d-bd90-4122-bc2a-215bd0cf1f36', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"o5w7B470QfJpP1py3mf2aoTsJEEOKS379wos6KEqPKTwkeBptwYPtKb1iVdF\"}', '{\"remember_token\":\"2irHYbhWoTQj0zAJitZNF74YxMnM6juNFSyfGCjLSZnfuqXirvV8sImK8SvW\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-04-01 19:10:25'),
('e7e8a11c-e3ef-4690-94ad-859639e14055', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ONWsx8UCcJ2vxNiToswZ17OcYHRU38ISIwvdwPSdC9JZeg7bgsVy9uLwgUfk\"}', '{\"remember_token\":\"mjH3JHoxJPLLXv2LatiH2B0C3uiPT9wKlZpiBFB4c2dWBAbhmrKGzjHvAwdo\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 23:38:07'),
('e82a1f39-f25c-4357-aba8-cf4ef162c88d', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"hvwVik8NV2A8Wrx6KJjJ0YildJqkNpK0UUBmsoMHTbvIS2E1BX0XG89hliOg\"}', '{\"remember_token\":\"jr7LWRmKwMWI9gPIDBV4kieMGRQ9nHUdIEAlNhjjBC9JoSI1ypcjNb0UZ7nV\"}', '5', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 22:23:00'),
('e8cfe00c-2bfe-4a40-80d4-bb957e53741c', 'updated', 1, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"kotX65wf1trGhV2IqBRpI4ZFiKItjOEUU3aa1FP76x3ItHWTDbst4P6QbXHM\"}', '{\"remember_token\":\"wrHy9NXDxiZc4eLFLKBT4VC4GdiECOXUzK172ohgCUhiRadQdfbgQoTlWg5e\"}', '1', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:46:15'),
('e8d79986-68e8-4767-ab48-90a9e61e83d2', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"2SNC1rIHsyO6FOE14XezLem9Y1GrNf1sdOOSRIbjf9otWWpHGsywD7cJsjJj\"}', '{\"remember_token\":\"PVOkArE3WlIowkQOXCD69OSuz5UoWlUnFJOP7FNmgWpsKTUl4KuszmQhcYCx\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-12 19:37:00'),
('e9443c50-5b66-4d2a-a509-aab842ee3509', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"I6N4fRSveRjlQUniCPxNQyj1eHFJmdm9RgpDjgX4Cpw3ob19EErzd1tks0F7\"}', '{\"remember_token\":\"km1PjyehAt6Tz7eW9mjkepxwmT54jwcMFOolVQ5bG0NQnwiXBkPMk5WXiTi3\"}', '3', 'http://localhost/gso_olongapo2/public/logout', '::1', '2019-07-19 00:02:22'),
('e9ecc30c-c4f8-4a42-9343-5668e9ac4428', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"jgkGQfItIRq1lmSoSbBv3JNnYi5Ctzu76mH8egkc3BVusydPgyFLrH4ufbsA\"}', '{\"remember_token\":\"QcZdatnkV81Vyldr31IMQ3dUylQC8tLCJGTSTj3XW9PjLbihAjNbc32RN9yc\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:25:43'),
('e9f269b7-0b8b-47c7-94cc-be57bd38d7b2', 'updated', 6, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"soqPzRfZcxPl7Q6Ue1HPAoLyIHzMlvLlVceRuSDpZBSqPe9MSzC86SSJyHPJ\"}', '{\"remember_token\":\"7oqRgonzseOkwJrfweHdAEF1qQ84EvBzZxRVAPSRZc39XMqOaLF4ewt3tSy1\"}', '6', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:54:41'),
('ea8021fc-129b-4059-afc1-0bf3e403a69b', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ZcisMF3Msmr2CBgXOBriIPDbdx1FOIN5FkbtOf01paOCDI2CfZASsY6x52OG\"}', '{\"remember_token\":\"pS3tKJ1oLbVbZuGYcjb7681YIIo5w22T6FgIldBun3qKxVqzkYrIWkgnpSwy\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 16:13:16'),
('eaab33df-ba91-4c62-a3ce-77944dcd1faa', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"6cK3jH1h6HFlhaPC8TopLXx6CjCt4WaErcn0uSwOIKSRBN93QuzFnSAyhrl1\"}', '{\"remember_token\":\"NdFMBOBkLdSDn8St4zvcNSowvpxJQ8PJwx4Ja6UTzwLTzMoJs16FYGPILPZG\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-10 00:19:53'),
('eae1fe20-46ea-4807-93d2-ed008dcb08dc', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"Pokw8zKnwtWlPrViL3fMv2V8WnHAHOCN6mw4qn8KKopdrv7rNy3CdkHZmPvI\"}', '{\"remember_token\":\"A2WwlP4GK03OKWklu7b3ZYeWkAGcILhK2qN0flS7qcIXp8ApDux2Z6imi9Qn\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:11:07'),
('eb7b22eb-4e16-47c2-983a-7b5fe96443fc', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"r4NxLOeidyMq14JLSEeIW94rGt4byI3HxzyHCa9CHw1cBJ868gF24GwxrhP0\"}', '{\"remember_token\":\"oFS3QoHwdyf2kOT9s20tv4CoLPMg9vSfpAOWrwZmIV4zzBBVvmbA1MIKzWtM\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:14:29'),
('ec153de9-3297-4452-9118-cc8d7c84ba40', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"brnZlmWd1ic3rs9sjwyqgImHp6QGTct4rjRK7SK5NLjDViaupCcCSAEQe2LB\"}', '{\"remember_token\":\"wI36diad2rmwYdsUpt0BFmS7H80uXURZnCr0zlbOIT3LbUydlBDzQEwybbj4\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 17:06:09'),
('ec7d09da-c27f-4484-9421-6c2ca15636e6', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"5Zi8gyhileCybzwtf8eP21CZpKIztgKT0VdT32DzXJNmhtPEVgYPr3GWTGCX\"}', '{\"remember_token\":\"m04IcljNF3EZxKSMXUzYvYwSMBbdC1ayRTkOzCebfpSvq1hb8VMKFqccDdPC\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:08:07'),
('ecee2f2a-394e-4648-8006-364898cfe00b', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"s3SZdtd1sneVKsHbUKVJAV08DbNKwte2uIgiXUEgT40v99NMU7RecjnVp7Di\"}', '{\"remember_token\":\"gHTxdlOJnpYAVKXZbVmo01DaIbLMuu1deSWUbwVWCvx1KKsczBMs61VVA3cA\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 19:05:03'),
('eecc4c46-e12a-4a81-af8c-30aac21d1089', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"mHJsb8oQ4jRdyPGrhYlgp1OMfP2WWszBwy9Vk7mBRaIOVlx6u44AUsiBjQmH\"}', '{\"remember_token\":\"N7tf3jc93Nxg9Sul5Eizsw6ZrxtWNikwPHvGHmviQ1QsAHTdYAMUmPdc2OAU\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 22:11:03'),
('ef7b8f6b-d202-4a1e-a19b-91f3f9b73501', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"FCprxno1TaeFDWJSm3Jr8LzpQOwzwU7P9hBN9bfYvmB39lL1cADpH9OnFFtD\"}', '{\"remember_token\":\"GEgXvlIZchOD8RMPFrjL7XcGo7TkybrfMnXTc1aI2s9j1BF6i1m7FHTROnfP\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-05 23:44:52');
INSERT INTO `audits` (`id`, `type`, `auditable_id`, `auditable_type`, `old`, `new`, `user_id`, `route`, `ip_address`, `created_at`) VALUES
('f035e5a3-8b61-4e0f-a2ef-721be12612c0', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"uK0LsifgYkuqBw8Osq40eKKWaAqHqURGMkPHsHHfmwwvcEKn68WfLBrWpRPs\"}', '{\"remember_token\":\"bhyWMzVBxXkQuiau6UzJfv87GkqU6voRlw0oMuHbgExRlEvIJzaIgtxDYoyd\"}', '4', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-09 23:19:30'),
('f08770f1-3a9c-4a24-9eca-751dcafe2fd6', 'updated', 11, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"3gbgok5DzZ12POeNQByAxRU6fmqHUEpZ45I7yLzGyO1tnTYMufpQ0h7QhH9D\"}', '{\"remember_token\":\"YV39NVqK84No1YEMJpn9lXguRYadDXczALJNxlMq8NdnEfoybvKlYyXXMMOC\"}', '11', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-04 23:55:50'),
('f1114a65-6737-4ce9-806c-f836cb13b9f0', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4Q2pdu9CSqwJ5wri55efIxXCl41pNb1WlRIq7TcbwCXQsHO3sSXt7JMNsAqu\"}', '{\"remember_token\":\"HiDPMRLs5RDWDM9LcT5UOvsKsCVYt4X1LkUErXITF1QCn1EGiS2L16RhOHa6\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-13 18:01:09'),
('f1511462-0411-41bc-b30f-16e480440c5a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OlcxtxPd6RHLMrKhQvcYf63HJx78O7FOQPC1y1geFQKak9a2OtU17GYwegSZ\"}', '{\"remember_token\":\"jgkGQfItIRq1lmSoSbBv3JNnYi5Ctzu76mH8egkc3BVusydPgyFLrH4ufbsA\"}', '3', 'http://192.168.2.2/gso_olongapo/public/logout', '192.168.2.121', '2019-03-25 22:25:16'),
('f180ae54-7206-49f1-9d66-36180efcce22', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"JEv38fdDZp96PsL6a0Ks7XP73ujDKiv7CnhBsRFImy3PZafUte45Xh7Awc30\"}', '{\"remember_token\":\"KqPaMldYnx1uW0GXHGo25hVpbk0IBaSLPzeR7sMSs8ryZRaGx915SpBOEBL5\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-14 22:27:32'),
('f1da7633-ea05-4224-83e6-e04cfcf87125', 'updated', 13, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ZbBqarQZOuEiEvSuJTvYAu9wR0ogf2E4cCwz4p8PjZTBuLPfUA0NVK7ovTP2\"}', '{\"remember_token\":\"X2QYzzaxBn2QIqCh9OxLzbXuXI4ey8vV4IGgou4hmJhwEqbUIHB3uyLRLX7C\"}', '13', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-21 17:35:46'),
('f20168a9-8ad6-476e-bf9f-323c474afb2e', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"BHaoK6Jb0wRLRR0pRFXmZ1tg2rp4dkLh74kfcPuhouHHfbOsyyDWfPytHb3k\"}', '{\"remember_token\":\"WgZf0shehDApClzQ1e2rg48TxCiWdKetbIvkDpfIFf9sO7VFPCiQsM7LA0o1\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 22:18:58'),
('f2965e98-8a4b-4d06-9234-dbf6bac80e04', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"E5Rgb1jCVY1VX1yxXopstEBHoQ3hrRKEJl7XafduFD2fOkddFshWUbL94cR6\"}', '{\"remember_token\":\"km0OgtXMSz1mUabLM9SdQffiAuIJPUAuWx5I7XS29wD0wPJwNDhIz7kgCi0q\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-01 18:15:03'),
('f2a9fc15-fdce-42aa-944a-4fd6c15ea6a6', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4wxkxN5XqkGAOynwn2TRFjOcUgeadbEslt8Bx3FoqhnIIQ7NSay01AWyudVC\"}', '{\"remember_token\":\"tuBcXJxcQ5KPtkAQa2NM2HiyDNF7EiBBBuvA1ygAkeInD0dPLoX7flJ3fbfZ\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-26 19:59:48'),
('f2b1511a-b395-4b48-97dc-407470440865', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"8deNMhRMhDHNUW6BzF7kVFLIwTcGs7DBoqka4n8G1yPiYO8w0p9s9vPhlGqO\"}', '{\"remember_token\":\"2dreoXDZ4iJXBMV6TEuu6iy8IfvL25zNquTOrJWpgsCB4oeqkxYzniSzlcfc\"}', '3', 'http://localhost/olongapo/public/logout', '::1', '2018-02-05 22:40:21'),
('f2f0dc2e-4422-490e-9bd7-0bddbc14900a', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"gHTxdlOJnpYAVKXZbVmo01DaIbLMuu1deSWUbwVWCvx1KKsczBMs61VVA3cA\"}', '{\"remember_token\":\"ViOZJiFuDY9YOKjK1NpmLgoaMXRQhyer51fQApMEQQ4gWYEg1Atl3T1mrnDd\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 21:38:19'),
('f306e1fa-686a-44ff-a79b-015912afa86c', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"WPaaN3YEIwzQ3b6yCGJPhuSGMHxu4ex0MEki6K30FOBdNS05QQE3RG53xsnw\"}', '{\"remember_token\":\"74NcAZGO79HiAB1h3JVrIYgimS9nwktkBPXiUqyTDlqhuFXrqagJQFwUZOWK\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:42:49'),
('f30b293b-986f-4426-a2bd-b71cc9a7e52c', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"vKJQtzE3hczwxzr9PSqji5Q8RHf0vOQK9pWkwHzg2E0JLMDUexhjhq450VuG\"}', '{\"remember_token\":\"tZLUnGRNXKObC1ZAnF3LqSTVe2GA1aFMvPHa01hHoCAK1WH3kaHYXcFz1cGQ\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 00:44:16'),
('f31d3458-0e5c-4dd8-826b-757de4dee13b', 'created', 40, 'Modules\\Template\\Entities\\MainNavigation', '[]', '{\"group_id\":\"3\",\"title\":\"Status\",\"route\":\"emp.status\",\"parent\":\"0\",\"arangement\":\"8\",\"properties\":\"{\\\"i\\\":{\\\"class\\\":\\\"fa fa-id-card\\\"}}\"}', '1', 'http://localhost/gso_olongapo/public/template/add-main-menus', '::1', '2019-09-09 21:53:11'),
('f3b72cb1-c2df-426e-ad3e-f3b42426693c', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"hhA1YkJIPWrTOGIXvmpatEouQ8bJb2Qn9xzCueD55vNNcIgrx9g1JklptjyU\"}', '{\"remember_token\":\"iLqERgawDGe1ZpNDV1uWFAnAemWbth7kV3LfU5GKZ5asT7TqguhyU5HI1UCy\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 21:13:41'),
('f3ec7635-20ba-4050-8228-b28f26e445b0', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"KJNAy3nW4PzeLqorT2j12JwAFheKuqknArzcPn69p5YvKmDi4MitiqjTjDy0\"}', '{\"remember_token\":\"BzjbDhJ5kyydO0xMlu3ZdaVUehldSG9zFGfA0SJxZNIcwaIKYWQ5oOMRTiRL\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 20:11:55'),
('f4cec243-8863-48a6-b8be-d89a7c60cae6', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"xoyjzycfSjQzTMQIYb6EMt6bXdBEv8bokt8zdnCQAgEr2FAvgSN2NcntQb5c\"}', '{\"remember_token\":\"T9oGhisbuaQeWzAobqafxj0gXl3bgBiXpefYPsTJztA5b9vU8RHCLJURZ7ya\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 11:01:06'),
('f4f247bf-ee01-4775-b92c-bd02c664195e', 'updated', 4, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ozLCP1Co7mmZcZoJw7Qovnn3KwxVkpAWA24QZzNSGMIXfnEQkfG2tRmqQnWy\"}', '{\"remember_token\":\"Bxmv1bD1UkqzJyc3TyYSKZPA2b9m6JQGQYogooUogE1KrchZtFWeVaj3KAn5\"}', '4', 'http://localhost/gso_olongapo2/public/logout', '::1', '2019-07-19 00:04:10'),
('f564702e-3f35-43fa-81a2-8f771524131c', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"T9oGhisbuaQeWzAobqafxj0gXl3bgBiXpefYPsTJztA5b9vU8RHCLJURZ7ya\"}', '{\"remember_token\":\"GY5tMCgAqzxbs46frvYTJmiJG33zbjLJNc1topt24GT4cp3kCYbLyvlRIlVZ\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 12:16:41'),
('f5a538be-3f96-49f0-994c-688e7df98142', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"LLkwh3VQZYNtT9DAYlVAf2PcanTKbaLMnVZfX7Eu2XszQj6kCv50y7inOv2L\"}', '{\"remember_token\":\"l4BWRRSJyjah6qJcxz621UhzWDzhxzZcNvWV5adzti2dVeB1nl4fTfb8mFUC\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-19 23:35:07'),
('f60aa537-e9d8-4fd1-bed1-2edfdfaa5adc', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"j9FPbqTunjO4zQ7gqarWDs9lDhoRbodTGvEg56ZHI0YLMUBRlAgH7vuOUQ4g\"}', '{\"remember_token\":\"WpmBKfwttJM2HtsF1Q0bZ26Ee5SOIGNZmhNgBA60q6lDQ6hjE08kF9n5Zlsx\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-12 16:42:23'),
('f6a5fdb5-e124-4ce5-9fa0-9fd36a335580', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"vK3g1EGFPLOrLCfMUK3z5qhoTEdkKEpTBUPRD4HDemwptVIf5GBQ92gTG1FD\"}', '{\"remember_token\":\"s3SZdtd1sneVKsHbUKVJAV08DbNKwte2uIgiXUEgT40v99NMU7RecjnVp7Di\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-13 18:56:40'),
('f7ae6b87-7ad8-4efa-9e78-2c0374082249', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"p3OkhxNGpgSq4Zp3yFqnBAxYPi3l4YEvgoV3wVPeFacUJNlogA4yqxa6pJtT\"}', '{\"remember_token\":\"PaURAuUTnLTm8Tf9gpLOY6NukCDKghSZFA2Y8DEIUAaaQQUE0RDMgLFohB6O\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-24 10:59:27'),
('f82e7134-e8fc-4eef-be95-afe0658b4e04', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"VwVjAaVBb5GHOyQNS9BpFJKnPGH49STnU0BVQGrr52DkHqo15PoSFoQNiEs0\"}', '{\"remember_token\":\"b1DhxO05VQvKYkW5VQcycgY8lFSbleF6kTHZYGOtNNxkmg9LpDM04fXPigTh\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 01:38:02'),
('f9105e00-aadd-437e-ad31-d2f4a44a1a55', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"klUUlGgKCKOR8BNHVDee1rqGZvsNtxrZA8wgOvhvJJUiM9Yl8kgTxcStQPeY\"}', '{\"remember_token\":\"rIVTDrzWDaCviNPPsvJQuRkZcsN2APqBalS5qeutRGZrdTmrFSIM5CPNACGj\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-05-20 17:50:25'),
('f9b04bb1-8fb8-4d70-9202-6c04fef38d69', 'updated', 39, 'Modules\\Template\\Entities\\MainNavigation', '{\"route\":\"147\"}', '{\"route\":\"bac.ppmp_pr_lists\"}', '1', 'http://localhost/gso_olongapo/public/template/check-main-menus', '::1', '2019-12-09 00:48:04'),
('f9f58caa-e29a-4a7d-94d4-127e1747cec2', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"ZDLJHL8A8aXhvoTqFh5hXdduJERjvfbAHW7ViHX5Et4kEnZ7T5WlA6RqTI6P\"}', '{\"remember_token\":\"XOK8clLde2OdvSsmgQltUFs0KQGIrsg1BIDDkzFUCJOA6KhC6UGYTP1sIFng\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-23 22:47:46'),
('fa95fe4b-d216-4908-82b5-ba00b1205d14', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"nFhEp34fnahE26j37jKuxMdfp8ZS8zxvIvKgb3mKrZ9EFv1pHoqbbomy6mXY\"}', '{\"remember_token\":\"Pv5EfK9dmJwwjsctyrD398kzYAv8Ripi6qI3IBUexb1NXr5kI9NDJP2oJPoI\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2020-01-27 18:17:04'),
('fb9eb2a5-954b-427e-91eb-6f4785eb36c5', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"paJkISdjkdzDqzICc61QUnLHxjEloV38hlKylOEWfVuz4kXh1btKs2PCmu5A\"}', '{\"remember_token\":\"7MG9FTZ34G9lIgp4BSfJ78ZFlJoi8rr6PLHGkmkMIn1DoA9leKi1DwglBSBp\"}', '5', 'http://localhost/olongapo/public/logout', '::1', '2018-02-06 08:23:35'),
('fbb5993e-db94-4966-aab9-24a1a1dd2dfb', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4CfZ3yTAuKwnI0XtEsPrbCOQYAP5hCZj6keR8aiWmEAVDPlz4irrascyc8X2\"}', '{\"remember_token\":\"9e8zfFynPlK5y2BRFE78Ta0mGZ458qONLDOdznuWMW8bixoGyGmW0L3eDpoL\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-04 17:41:44'),
('fbb8fc80-9b87-44b7-b990-00e3610f3baa', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"1joqlUdA2YJpwMueZwQL3E75oiFi76b6Kst2SxkytrFPdT9lbmYhxFN0cEec\"}', '{\"remember_token\":\"e6VuIkNmKQAS6axx8sppSfsWiPlQniUxh7reAMkj8HcMWVtt5ItITZVkR7js\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-03-25 23:12:06'),
('fcdb55d5-dfdb-4a1f-8270-da15cda7ee56', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"V5EuSy76X5SaUANF7Rqso12jlgxfxOB1hQDuhBSX9523cOlbwtiWr08Fn6ri\"}', '{\"remember_token\":\"ScJHOknz6MKnKKIuKNOETBqgvur2naojgALCGvh2zr30YCLCaya07ysixSsY\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 20:28:23'),
('feab7eb0-edae-43ea-a551-6257611a2592', 'updated', 8, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"4Ma0hy3EmFdQTitKG6D6wCXtXDNxpBm7xpLhBND5o9wdegL7XEle72637N8I\"}', '{\"remember_token\":\"22JE52BfKLXRlYp5GHSocx0e1tnln1V43lwAEcpeQ3qgcnsrZPPTpR6kgVvs\"}', '8', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:21:47'),
('fee9dcd5-5724-441a-ab34-046f94deb344', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"FV2aqC9mtJ0krz2nsLLjgLJYgWbBltnu9Gsg854zEohp7HmDenvvLnW3com7\"}', '{\"remember_token\":\"FCprxno1TaeFDWJSm3Jr8LzpQOwzwU7P9hBN9bfYvmB39lL1cADpH9OnFFtD\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-12-04 18:22:42'),
('ff5e3579-9b16-4303-86c6-14690d65bf67', 'updated', 5, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"OZNDKWjpmDif51IyC9UPIcqqdmRHoZRZHeosNLr0ZCNd1B0TjlKMVEdbEmdT\"}', '{\"remember_token\":\"eCLlvPpAq9H0GdAZlFavUErAHr2d1HchllaY3roMr5Bm8N9ofk3m2sULAz4P\"}', '5', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-06-13 17:59:28'),
('ff87adba-58ac-4ca5-a71f-898d22be673f', 'updated', 2, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"XO2rZMZdKGifAvUwOTlHUHbbytsf0enF6AjSwJ0jlQY3KCxgTCaa0uvzQ6tu\"}', '{\"remember_token\":\"piAn7xpgpFaV9csywQzNyDMiSp5rTra6hb7s121pR6LkyIG5JsQLdBZJHyEg\"}', '2', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-01-23 19:28:11'),
('ffa90169-f953-416d-8851-e9eef4c097bb', 'updated', 3, 'Modules\\Template\\Entities\\UserCredentials', '{\"remember_token\":\"AvNLhHeqbhSSAskRe2T0458BjbCiDVdzBBYJYHO7GW0DnzXU170RjNq4Sua7\"}', '{\"remember_token\":\"OZOVrpKIEkTPQgZ8rgZfoXkw8L1KhTWmgZnawZUjKlsRzOJsQ80Y515C4ggi\"}', '3', 'http://localhost/gso_olongapo/public/logout', '::1', '2019-08-04 22:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `bms_olngp_dept_purchase_request`
--

CREATE TABLE `bms_olngp_dept_purchase_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL COMMENT 'refer to olongapo_subdepartment',
  `requestor_user_id` int(11) NOT NULL COMMENT 'refer to olongapo_employee_list',
  `pr_purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pr_date` date NOT NULL,
  `pr_purelyconsumption` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `bms_olngp_dept_purchase_request_items`
--

CREATE TABLE `bms_olngp_dept_purchase_request_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_pr_id` int(11) NOT NULL COMMENT 'refer to bms_olngp_dept_purchase_request',
  `pr_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pr_qty` decimal(11,2) NOT NULL,
  `pr_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pr_unit_price` decimal(11,2) NOT NULL,
  `pr_total_price` decimal(11,2) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_info`
--

CREATE TABLE `inventory_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `control_no` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_order_no` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recieved_from_id` int(11) NOT NULL,
  `received_by_id` int(11) NOT NULL,
  `accountable_id` int(11) NOT NULL,
  `inv_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_code` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `item_desc`, `item_qty`, `item_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Shabu', 50, 19, NULL, NULL, NULL),
(2, 'Marijuana', 100, 2, NULL, NULL, NULL),
(3, 'dfdgfd', 1, 3, NULL, NULL, NULL),
(4, 'Chart holder', 41, 92, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_rcved_by_info`
--

CREATE TABLE `inventory_rcved_by_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `date_received` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_rcved_from_info`
--

CREATE TABLE `inventory_rcved_from_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `date_received` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `inv_gsoprop_code_category`
--

CREATE TABLE `inv_gsoprop_code_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `desc` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_family` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inv_gsoprop_code_category`
--

INSERT INTO `inv_gsoprop_code_category` (`id`, `desc`, `code_family`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Office Supplies', 1, NULL, NULL, NULL),
(2, 'Medical, Dental, and Laboratory Supplies', 2, NULL, NULL, NULL),
(3, 'Military, Police and Traffic Supplies', 3, NULL, NULL, NULL),
(4, 'School Supplies', 4, NULL, NULL, NULL),
(5, 'Hospital Supplies', 5, NULL, NULL, NULL),
(6, 'Agricultural and Marine Supplies', 6, NULL, NULL, NULL),
(7, 'Maintenance Supplies', 7, NULL, NULL, NULL),
(8, 'Other Inventories', 8, NULL, NULL, NULL),
(9, 'Sample', 9, NULL, '2019-04-01 19:23:04', '2019-04-01 19:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `inv_gsoprop_code_list`
--

CREATE TABLE `inv_gsoprop_code_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `gsocode_cat_id` int(11) NOT NULL COMMENT 'refer to inv_gsoprop_code_category id',
  `desc` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useful_life` int(11) NOT NULL,
  `code_no` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inv_gsoprop_code_list`
--

INSERT INTO `inv_gsoprop_code_list` (`id`, `gsocode_cat_id`, `desc`, `useful_life`, `code_no`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blackboard/White Board/Corkboard', 1, 1, NULL, NULL, NULL),
(2, 1, 'Cutter', 2, 2, NULL, NULL, NULL),
(3, 1, 'Desk Tray', 3, 3, NULL, NULL, NULL),
(4, 1, 'Letter Template', 4, 4, NULL, NULL, NULL),
(5, 1, 'Mechanical Pencil', 5, 5, NULL, NULL, NULL),
(6, 1, 'Calculator (small)', 6, 6, NULL, NULL, NULL),
(7, 1, 'Tech Pen', 7, 7, NULL, NULL, NULL),
(8, 1, 'Pencil Sharpener/Sharpener', 8, 8, NULL, NULL, NULL),
(9, 1, 'Puncher', 9, 9, NULL, NULL, NULL),
(10, 1, 'Measuring Set', 10, 10, NULL, NULL, NULL),
(11, 1, 'Scissor (office)', 11, 11, NULL, NULL, NULL),
(12, 1, 'Staple wire remover', 12, 12, NULL, NULL, NULL),
(13, 1, 'Stapler', 13, 13, NULL, NULL, NULL),
(14, 1, 'Tape dispenser', 14, 14, NULL, NULL, NULL),
(15, 1, 'Flashdrive/Memory Card', 15, 15, NULL, NULL, NULL),
(16, 1, 'Monobloc Chairs', 16, 16, NULL, NULL, NULL),
(17, 1, 'Monobloc Tables', 17, 17, NULL, NULL, NULL),
(18, 1, 'Brochure/Magazine/Newspaper Rack', 18, 18, NULL, NULL, NULL),
(19, 2, 'Amalgam Carrier', 1, 1, NULL, NULL, NULL),
(20, 2, 'Ambo/Ambu Bag', 2, 2, NULL, NULL, NULL),
(21, 2, 'Baking Pan', 3, 3, NULL, NULL, NULL),
(22, 2, 'Basic (kidnet, et al)', 4, 4, NULL, NULL, NULL),
(23, 2, 'Bed sheets', 5, 5, NULL, NULL, NULL),
(24, 2, 'Blade holder', 6, 6, NULL, NULL, NULL),
(25, 2, 'Bone chisel/File', 7, 7, NULL, NULL, NULL),
(26, 2, 'Clam, Towel', 8, 8, NULL, NULL, NULL),
(27, 2, 'Dental syringe', 9, 9, NULL, NULL, NULL),
(28, 2, 'Depressor, tongue', 10, 10, NULL, NULL, NULL),
(29, 2, 'Excavator', 11, 11, NULL, NULL, NULL),
(30, 2, 'Explorer, dental periosteal', 12, 12, NULL, NULL, NULL),
(31, 2, 'Flashlight', 13, 13, NULL, NULL, NULL),
(32, 2, 'Footstool', 14, 14, NULL, NULL, NULL),
(33, 2, 'Forceps', 15, 15, NULL, NULL, NULL),
(34, 2, 'Gowns', 16, 16, NULL, NULL, NULL),
(35, 2, 'Jar', 17, 17, NULL, NULL, NULL),
(36, 2, 'Kerosene lamp/Burner', 18, 18, NULL, NULL, NULL),
(37, 2, 'Kettle', 19, 19, NULL, NULL, NULL),
(38, 2, 'Knife', 20, 20, NULL, NULL, NULL),
(39, 2, 'Screen Protector', 21, 21, NULL, NULL, NULL),
(40, 2, 'Mortar & Pestle', 22, 22, NULL, NULL, NULL),
(41, 2, 'Mouth Mirror', 23, 23, NULL, NULL, NULL),
(42, 2, 'Needle holder', 24, 24, NULL, NULL, NULL),
(43, 2, 'Scaler', 25, 25, NULL, NULL, NULL),
(44, 2, 'Steam inhalator', 26, 26, NULL, NULL, NULL),
(45, 2, 'Surgical Mallet', 27, 27, NULL, NULL, NULL),
(46, 2, 'Tackle/Tool box', 28, 28, NULL, NULL, NULL),
(47, 2, 'Tong', 29, 29, NULL, NULL, NULL),
(48, 2, 'Tracheotomy Tube', 30, 30, NULL, NULL, NULL),
(49, 2, 'Tray (medical)', 31, 31, NULL, NULL, NULL),
(50, 2, 'Utility cart/Troller', 32, 32, NULL, NULL, NULL),
(51, 2, 'Utility/IV stand', 33, 33, NULL, NULL, NULL),
(52, 2, 'Weighing Scale', 34, 34, NULL, NULL, NULL),
(53, 2, 'Enema Can', 35, 35, NULL, NULL, NULL),
(54, 2, 'OB Stetrical set', 36, 36, NULL, NULL, NULL),
(55, 2, 'Dental Straight Stout Elevator', 37, 37, NULL, NULL, NULL),
(56, 2, 'Speculum', 38, 38, NULL, NULL, NULL),
(57, 2, 'Scissor (medical)', 39, 39, NULL, NULL, NULL),
(58, 2, 'Container/Dressing Jar', 40, 40, NULL, NULL, NULL),
(59, 2, 'Thermometer', 41, 41, NULL, NULL, NULL),
(60, 3, 'Hose Key', 1, 1, NULL, NULL, NULL),
(61, 3, 'Helmet/Safety hat', 2, 2, NULL, NULL, NULL),
(62, 3, 'Bayonet', 3, 3, NULL, NULL, NULL),
(63, 3, 'Blanket', 4, 4, NULL, NULL, NULL),
(64, 3, 'Boots/Combat shoes/Safety shoes', 5, 5, NULL, NULL, NULL),
(65, 3, 'Bullet Proof/Traffic Vest', 6, 6, NULL, NULL, NULL),
(66, 3, 'Compass', 7, 7, NULL, NULL, NULL),
(67, 3, 'Handcuffs', 8, 8, NULL, NULL, NULL),
(68, 3, 'Jungle bolo', 9, 9, NULL, NULL, NULL),
(69, 3, 'Medical kit', 10, 10, NULL, NULL, NULL),
(70, 3, 'Melanguer Mousse', 11, 11, NULL, NULL, NULL),
(71, 3, 'Goggles(night vision)', 12, 12, NULL, NULL, NULL),
(72, 3, 'Pillow & pillow case', 13, 13, NULL, NULL, NULL),
(73, 3, 'Pistol Belt', 14, 14, NULL, NULL, NULL),
(74, 3, 'Probaton', 15, 15, NULL, NULL, NULL),
(75, 3, 'Radio Battery Pack', 16, 16, NULL, NULL, NULL),
(76, 3, 'Raincoats', 17, 17, NULL, NULL, NULL),
(77, 3, 'Sword', 18, 18, NULL, NULL, NULL),
(78, 3, 'Telescope', 19, 19, NULL, NULL, NULL),
(79, 3, 'Tent', 20, 20, NULL, NULL, NULL),
(80, 3, 'Truncheons', 21, 21, NULL, NULL, NULL),
(81, 3, 'Gun Holster', 22, 22, NULL, NULL, NULL),
(82, 3, 'Shield', 23, 23, NULL, NULL, NULL),
(83, 3, 'Metal Container', 24, 24, NULL, NULL, NULL),
(84, 3, 'Body Wet Suit/coverall', 25, 25, NULL, NULL, NULL),
(85, 3, 'Traffic Wands', 26, 26, NULL, NULL, NULL),
(86, 3, 'Safety gloves', 27, 27, NULL, NULL, NULL),
(87, 4, 'Textbooks', 1, 1, NULL, NULL, NULL),
(88, 4, 'Instructional Material', 2, 2, NULL, NULL, NULL),
(89, 4, 'Chairs', 3, 3, NULL, NULL, NULL),
(90, 4, 'Desks', 4, 4, NULL, NULL, NULL),
(91, 4, 'Tables', 5, 5, NULL, NULL, NULL),
(92, 5, 'Chart holder', 1, 1, NULL, NULL, NULL),
(93, 5, 'Cups & Saucer', 2, 2, NULL, NULL, NULL),
(94, 5, 'Dinner plates', 3, 3, NULL, NULL, NULL),
(95, 5, 'Emergency light', 4, 4, NULL, NULL, NULL),
(96, 5, 'Pitcher & Glass Confectionary', 5, 5, NULL, NULL, NULL),
(97, 5, 'Rugs, Carpets & Mats', 6, 6, NULL, NULL, NULL),
(98, 5, 'Spoon & forks', 7, 7, NULL, NULL, NULL),
(99, 5, 'Stool', 8, 8, NULL, NULL, NULL),
(100, 5, 'Tea set/Coffee set', 9, 9, NULL, NULL, NULL),
(101, 6, 'Chopping board', 1, 1, NULL, NULL, NULL),
(102, 6, 'Cooking pot', 2, 2, NULL, NULL, NULL),
(103, 6, 'Padlock/Key holder', 3, 3, NULL, NULL, NULL),
(104, 6, 'Waterer', 4, 4, NULL, NULL, NULL),
(105, 6, 'Water Jug', 5, 5, NULL, NULL, NULL),
(106, 6, 'Water hose/Air hose', 6, 6, NULL, NULL, NULL),
(107, 6, 'Cage', 7, 7, NULL, NULL, NULL),
(108, 6, 'Net', 8, 8, NULL, NULL, NULL),
(109, 7, 'Chisel', 1, 1, NULL, NULL, NULL),
(110, 7, 'Dust pan', 2, 2, NULL, NULL, NULL),
(111, 7, 'Extension Cord', 3, 3, NULL, NULL, NULL),
(112, 7, 'Hammer', 4, 4, NULL, NULL, NULL),
(113, 7, 'Long nose pliers', 5, 5, NULL, NULL, NULL),
(114, 7, 'Mop handle/Push broom', 6, 6, NULL, NULL, NULL),
(115, 7, 'Pail', 7, 7, NULL, NULL, NULL),
(116, 7, 'Paint Roller/brush', 8, 8, NULL, NULL, NULL),
(117, 7, 'Plane', 9, 9, NULL, NULL, NULL),
(118, 7, 'Saw', 10, 10, NULL, NULL, NULL),
(119, 7, 'Trash can/Waste basket', 11, 11, NULL, NULL, NULL),
(120, 7, 'Crowbar', 12, 12, NULL, NULL, NULL),
(121, 7, 'Screw Driver', 13, 13, NULL, NULL, NULL),
(122, 7, 'Side Cutter', 14, 14, NULL, NULL, NULL),
(123, 7, 'Vice Grip', 15, 15, NULL, NULL, NULL),
(124, 8, 'Computer Screen', 1, 1, NULL, NULL, NULL),
(125, 8, 'Diskette Storage', 2, 2, NULL, NULL, NULL),
(126, 8, 'Mouse/mouse pad', 3, 3, NULL, NULL, NULL),
(127, 8, 'Printer Cable', 4, 4, NULL, NULL, NULL),
(128, 8, 'Printer Head', 5, 5, NULL, NULL, NULL),
(129, 8, 'Surge Protector', 6, 6, NULL, NULL, NULL),
(130, 8, 'Computer keyboard', 7, 7, NULL, NULL, NULL),
(131, 8, 'Projector pen', 8, 8, NULL, NULL, NULL),
(132, 9, 'Sample', 1, 1, NULL, '2019-04-01 19:23:24', '2019-04-01 19:23:24'),
(133, 9, 'Sample', 1, 2, NULL, '2019-04-01 19:23:24', '2019-04-01 19:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `inv_invoice_info`
--

CREATE TABLE `inv_invoice_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_supplier_id` int(11) NOT NULL COMMENT 'supplier',
  `date_invoice` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `inv_ppe_code_category`
--

CREATE TABLE `inv_ppe_code_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `desc` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inv_ppe_code_category`
--

INSERT INTO `inv_ppe_code_category` (`id`, `desc`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Land and Land Improvement', NULL, NULL, NULL),
(2, 'Building', NULL, NULL, NULL),
(3, 'Office Equipment, Furniture and Fixture', NULL, NULL, NULL),
(4, 'Machinery & Equipment', NULL, NULL, NULL),
(5, 'Transportation Equipment', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inv_ppe_code_list`
--

CREATE TABLE `inv_ppe_code_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `ppe_cat_id` int(11) NOT NULL,
  `ppe_subcat_id` int(11) NOT NULL,
  `desc` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_no` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inv_ppe_code_list`
--

INSERT INTO `inv_ppe_code_list` (`id`, `ppe_cat_id`, `ppe_subcat_id`, `desc`, `code_no`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Land', 0, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(2, 2, 2, 'Office Building', 0, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(3, 2, 3, 'School Building', 0, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(4, 2, 4, 'Hospital and Health Center', 0, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(5, 2, 5, 'Market and Slaughterhouse', 0, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(6, 2, 6, 'Office Building', 0, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(7, 3, 7, 'Adding Machine', 0, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(8, 3, 7, 'Check Writer', 1, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(9, 3, 7, 'Clock', 2, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(10, 3, 7, 'Copy machine', 3, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(11, 3, 7, 'Dry seal', 4, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(12, 3, 7, 'Paper Cutter', 5, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(13, 3, 7, 'Electric Fan', 6, NULL, '2018-01-22 23:21:58', '2018-01-22 23:21:58'),
(14, 3, 7, 'ID Puncher', 7, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(15, 3, 7, 'Lamination machine', 8, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(16, 3, 7, 'Mimeographing/Photo offset', 9, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(17, 3, 7, 'Money counter/Money Detector', 10, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(18, 3, 7, 'Paper Shredder', 11, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(19, 3, 7, 'Projector', 12, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(20, 3, 7, 'Safety Vault', 13, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(21, 3, 7, 'Stamp/Numbering Machine', 14, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(22, 3, 7, 'Typewriters/Wheelwriter', 15, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(23, 3, 7, 'Projector Screen', 16, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(24, 3, 7, 'Air conditioner', 17, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(25, 3, 7, 'Refrigerator/Freezer', 18, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(26, 3, 7, 'Bundy Clock', 19, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(27, 3, 7, 'Video/Digital Camera', 20, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(28, 3, 7, 'Tripod', 21, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(29, 3, 7, 'Stencil Duplicator', 22, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(30, 3, 7, 'Fingerprint Machine', 23, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(31, 3, 7, 'Voice Recorder', 24, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(32, 3, 7, 'Cash Box', 25, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(33, 3, 7, 'Air Condenser', 26, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(34, 3, 7, 'Video Mixer', 27, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(35, 3, 7, 'Power Adaptor', 28, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(36, 3, 7, 'Barcode Reader', 29, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(37, 3, 7, 'Signature Pag Replacement', 30, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(38, 3, 8, 'Bench', 0, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(39, 3, 8, 'Filing Cabinet', 1, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(40, 3, 8, 'Chair', 2, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(41, 3, 8, 'Chandelier', 3, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(42, 3, 8, 'Coffee/Dining table/Canteen table', 4, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(43, 3, 8, 'Griller', 5, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(44, 3, 8, 'Divider', 6, NULL, '2018-01-22 23:21:59', '2018-01-22 23:21:59'),
(45, 3, 8, 'DVD', 7, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(46, 3, 8, 'Faucet/Sink/Hand Dryer', 8, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(47, 3, 8, 'Cabinet', 9, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(48, 3, 8, 'Head phone', 10, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(49, 3, 8, 'Heater', 11, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(50, 3, 8, 'Iron/Iron board', 12, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(51, 3, 8, 'Karaoke', 13, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(52, 3, 8, 'Kitchen Furniture/Equipment', 14, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(53, 3, 8, 'Lamp', 15, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(54, 3, 8, 'Locker', 16, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(55, 3, 8, 'Mannequin', 17, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(56, 3, 8, 'Musical instrument', 18, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(57, 3, 8, 'Painting/Picture/Portrait', 19, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(58, 3, 8, 'Frame', 20, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(59, 3, 8, 'Podium', 21, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(60, 3, 8, 'Rack/Dough bin', 22, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(61, 3, 8, 'Sweing machine', 23, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(62, 3, 8, 'Shelf', 24, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(63, 3, 8, 'Sofat Set/Sala set', 25, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(64, 3, 8, 'Table', 26, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(65, 3, 8, 'Thermos/Airpot', 27, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(66, 3, 8, 'Venetian blind/curtains', 28, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(67, 3, 8, 'Washing machine/dryer', 29, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(68, 3, 8, 'Water dispenser', 30, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(69, 3, 8, 'Water purifier', 31, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(70, 3, 8, 'Wardrobe, Cabinet', 32, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(71, 3, 8, 'Cassette/Component', 33, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(72, 3, 8, 'Decorative material/Map', 34, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(73, 3, 8, 'Television', 35, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(74, 3, 8, 'Gavel', 36, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(75, 3, 8, 'Spotlight', 37, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(76, 3, 8, 'Lanters', 38, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(77, 3, 8, 'Drawer', 39, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(78, 3, 9, 'AVR/Regulator', 0, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(79, 3, 9, 'Cable Tester', 1, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(80, 3, 9, 'Computer Set', 2, NULL, '2018-01-22 23:22:00', '2018-01-22 23:22:00'),
(81, 3, 9, 'Computer Monitor', 3, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(82, 3, 9, 'Computer table', 4, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(83, 3, 9, 'Hub', 5, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(84, 3, 9, 'Printer', 6, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(85, 3, 9, 'Robotics', 7, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(86, 3, 9, 'Scanner', 8, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(87, 3, 9, 'Server', 9, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(88, 3, 9, 'Software', 10, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(89, 3, 9, 'UPS', 11, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(90, 3, 9, 'CPU & Parts', 12, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(91, 3, 9, 'Laptop', 13, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(92, 3, 9, 'Language Lab System', 14, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(93, 3, 9, 'Console Kinetic', 15, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(94, 3, 9, 'Circuit Logic Tester', 16, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(95, 3, 9, 'Pentrack/Tablet', 17, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(96, 3, 9, 'Laptop Battery', 18, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(97, 3, 9, 'External HD', 19, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(98, 3, 9, 'Power bank', 20, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(99, 3, 10, 'Books', 0, NULL, '2018-01-22 23:22:01', '2018-01-22 23:22:01'),
(100, 4, 11, 'Garden Equipment', 0, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(101, 4, 11, 'Grass cutter', 1, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(102, 4, 11, 'Lawn mower', 2, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(103, 4, 11, 'Shovel', 3, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(104, 4, 11, 'Tree Prunner', 4, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(105, 4, 11, 'Water Gear', 5, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(106, 4, 11, 'Wheelbarrow', 6, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(107, 4, 11, 'Rake', 7, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(108, 4, 12, 'Cell phone', 0, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(109, 4, 12, 'Fax machine', 1, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(110, 4, 12, 'Telephone/Telephone Accessories', 2, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(111, 4, 12, 'Antenna', 3, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(112, 4, 12, 'Base radio', 4, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(113, 4, 12, 'Charger', 5, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(114, 4, 12, 'GPS', 6, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(115, 4, 12, 'Intercom', 7, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(116, 4, 12, 'Light tower', 8, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(117, 4, 12, 'Megaphone', 9, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(118, 4, 12, 'Microphone/Microphone Stand', 10, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(119, 4, 12, 'Pagin/PA System', 11, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(120, 4, 12, 'Repeater', 12, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(121, 4, 12, 'Sound System', 13, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(122, 4, 12, 'Speaker', 14, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(123, 4, 12, 'Switch board', 15, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(124, 4, 12, 'Transceiver', 16, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(125, 4, 12, 'Surveillance Camera', 17, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(126, 4, 13, 'Cargo Carrier', 0, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(127, 4, 13, 'Construction Vehicle', 1, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(128, 4, 13, 'Payloader', 2, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(129, 4, 13, 'Truck', 3, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(130, 4, 13, 'Dredging Machine', 4, NULL, '2018-01-22 23:22:02', '2018-01-22 23:22:02'),
(131, 4, 13, 'Trailer', 5, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(132, 4, 13, 'Compactor', 6, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(133, 4, 13, 'Pulverizer', 7, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(134, 4, 13, 'Bulldozer', 8, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(135, 4, 13, 'Water Truck', 9, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(136, 4, 14, 'Axe', 0, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(137, 4, 14, 'Flame redundant', 1, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(138, 4, 14, 'Fire Alarm', 2, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(139, 4, 14, 'Fire extinguisher', 3, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(140, 4, 14, 'Fire hose', 4, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(141, 4, 14, 'Fire Safety Protection', 5, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(142, 4, 14, 'Ladder', 6, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(143, 4, 14, 'Nozzle/Nozzle Accessories', 7, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(144, 4, 14, 'Signage', 8, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(145, 4, 14, 'Pink Poles', 9, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(146, 4, 14, 'Rescue Equipment', 10, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(147, 4, 14, 'Revolving light', 11, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(148, 4, 14, 'Safety harness', 12, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(149, 4, 14, 'Siren/Car blinker', 13, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(150, 4, 14, 'Tow Reel w/ fire launch', 14, NULL, '2018-01-22 23:22:03', '2018-01-22 23:22:03'),
(151, 4, 14, 'Fire hose hood', 15, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(152, 4, 14, 'Container', 16, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(153, 4, 14, 'Bridge of hose', 17, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(154, 4, 14, 'Respiratory Device', 18, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(155, 4, 14, 'Respiratory Testing Device', 19, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(156, 4, 14, 'Bi-Tubes', 20, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(157, 4, 14, 'Reel for Hoses', 21, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(158, 4, 14, 'High Pressure Instrument', 22, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(159, 4, 14, 'Towing Bar', 23, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(160, 4, 14, 'Early Warning Device', 24, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(161, 4, 14, 'Hydraulic/Vacuum Valve', 25, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(162, 4, 14, 'Pressure Gauge', 26, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(163, 4, 14, 'Quick Adjust Assembly', 27, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(164, 4, 14, 'Pendant Control Assembly', 28, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(165, 4, 15, 'Anesthesia Machine', 0, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(166, 4, 15, 'Colcoscopy', 1, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(167, 4, 15, 'Endoscopy', 2, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(168, 4, 15, 'Examination table', 3, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(169, 4, 15, 'Hospital Bed/Bed/Double deck/foam', 4, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(170, 4, 15, 'incubator', 5, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(171, 4, 15, 'Centrifuge Machine', 6, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(172, 4, 15, 'Laryngoscope', 7, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(173, 4, 15, 'Microscope', 8, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(174, 4, 15, 'Nebulizer', 9, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(175, 4, 15, 'Oxygen tank', 10, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(176, 4, 15, 'Sphygmomanometer (BP Apparatus)', 11, NULL, '2018-01-22 23:22:04', '2018-01-22 23:22:04'),
(177, 4, 15, 'Sterilizer', 12, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(178, 4, 15, 'Stretcher', 13, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(179, 4, 15, 'Suction Maching', 14, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(180, 4, 15, 'Mayo Steel', 15, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(181, 4, 15, 'Wheel chair', 16, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(182, 4, 15, 'Overbed table', 17, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(183, 4, 15, 'E cart/trolley', 18, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(184, 4, 15, 'Bedside table/cabinet', 19, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(185, 4, 15, 'Oxygen Gauge', 20, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(186, 4, 15, 'Walking Frame/Stick', 21, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(187, 4, 15, 'Commode chairs', 22, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(188, 4, 15, 'Digital Thermostat', 23, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(189, 4, 15, 'Hamper/Draper', 24, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(190, 4, 15, 'Medicine Cabinet', 25, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(191, 4, 15, 'Water Bath', 26, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(192, 4, 15, 'Laboratory Monitor', 27, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(193, 4, 15, 'Cast Trimmer/Cutter', 28, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(194, 4, 15, 'Instrument Table', 29, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(195, 4, 15, 'Cautery Machine', 30, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(196, 4, 15, 'Proctoscope', 31, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(197, 4, 15, 'Lithotriptor', 32, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(198, 4, 15, 'Dermatone', 33, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(199, 4, 16, 'Computed Tomography scan maching', 0, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(200, 4, 16, 'Dental Equipment', 1, NULL, '2018-01-22 23:22:05', '2018-01-22 23:22:05'),
(201, 4, 16, 'ECG', 2, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(202, 4, 16, 'Laboratory Equipment', 3, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(203, 4, 16, 'Magnetic Resonance Imaging', 4, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(204, 4, 16, 'Medical Equipment', 5, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(205, 4, 16, 'Ultrasound Equipment', 6, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(206, 4, 16, 'X ray', 7, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(207, 4, 16, 'Defibrillator', 8, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(208, 4, 16, 'Operating table', 9, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(209, 4, 16, 'Negatoscope', 10, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(210, 4, 16, 'Hemodialysis Machine', 11, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(211, 4, 16, 'Microtome', 12, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(212, 4, 16, 'Hot Plate Stirrer', 13, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(213, 4, 16, 'Otoscope', 14, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(214, 4, 16, 'Infusion Pump', 15, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(215, 4, 16, 'Colonoscopy', 16, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(216, 4, 16, 'Autoclave', 17, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(217, 4, 16, 'Syringe Pump', 18, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(218, 4, 16, 'Patient Monitor', 19, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(219, 4, 16, 'Cardiac Monitor', 20, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(220, 4, 16, 'Rotator', 21, NULL, '2018-01-22 23:22:06', '2018-01-22 23:22:06'),
(221, 4, 16, 'blood Warmer', 22, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(222, 4, 16, 'Cryostat', 23, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(223, 4, 16, 'Treadmill Machine', 24, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(224, 4, 16, 'Pulse Oximete', 25, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(225, 4, 16, 'Insufflation Machine', 26, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(226, 4, 16, 'Fetal Monitor', 27, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(227, 4, 16, 'Film Processor', 28, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(228, 4, 16, 'X-Ray Transformer', 29, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(229, 4, 16, 'Laboratory Oven', 30, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(230, 4, 16, 'Microtome', 31, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(231, 4, 16, 'Hygrometer', 32, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(232, 4, 17, 'Archery', 0, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(233, 4, 17, 'Arnis Equipment', 1, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(234, 4, 17, 'Athletic Equipment', 2, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(235, 4, 17, 'Badminton Equipment', 3, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(236, 4, 17, 'Basketball Equipment', 4, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(237, 4, 17, 'Boxing Equipment', 5, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(238, 4, 17, 'Chess set', 6, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(239, 4, 17, 'Electric score board', 7, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(240, 4, 17, 'Fixed barbell', 8, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(241, 4, 17, 'Flag/Flag pole stand', 9, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(242, 4, 17, 'Football Equipment', 10, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(243, 4, 17, 'Billiards', 11, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(244, 4, 17, 'Gymnastic Equipment', 12, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(245, 4, 17, 'Judo Mat', 13, NULL, '2018-01-22 23:22:07', '2018-01-22 23:22:07'),
(246, 4, 17, 'Rifle', 14, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(247, 4, 17, 'Scrabble', 15, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(248, 4, 17, 'Sepaktakraw Equipment', 16, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(249, 4, 17, 'Soccer Equipment', 17, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(250, 4, 17, 'Softball/Baseball Equipment', 18, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(251, 4, 17, 'Stationary Bicycle', 19, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(252, 4, 17, 'Stop watch', 20, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(253, 4, 17, 'Swimming Equipment', 21, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(254, 4, 17, 'Table tennis Equipment', 22, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(255, 4, 17, 'Taekwondo Equipment', 23, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(256, 4, 17, 'Tennis Equipment', 24, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(257, 4, 17, 'Volleyball Equipment', 25, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(258, 4, 17, 'Helmet', 26, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(259, 4, 18, 'Ammeter', 0, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(260, 4, 18, 'Caliper', 1, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(261, 4, 18, 'Car radio/Truck radio', 2, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(262, 4, 18, 'Electronic Device', 3, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(263, 4, 18, 'KWH/PH/VOLTAGE Meter', 4, NULL, '2018-01-22 23:22:08', '2018-01-22 23:22:08'),
(264, 4, 18, 'Lettering set/Drawing Material', 5, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(265, 4, 18, 'Metal detector', 6, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(266, 4, 18, 'Micrometer', 7, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(267, 4, 18, 'Multi tester', 8, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(268, 4, 18, 'Running Number Machine', 9, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(269, 4, 18, 'Buzzer', 10, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(270, 4, 18, 'Transformer', 11, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(271, 4, 18, 'Insulator tester', 12, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(272, 4, 18, 'Load Logger', 13, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(273, 4, 18, 'Data Logger', 14, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(274, 4, 18, 'Ion Meter', 15, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(275, 4, 18, 'Fault Indicator', 16, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(276, 4, 18, 'Transformer Relay', 17, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(277, 4, 18, 'Voltage Monitor', 18, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(278, 4, 18, 'Total Station', 19, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(279, 4, 18, 'Hasty Search Kit', 20, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(280, 4, 19, 'Air compressor', 0, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(281, 4, 19, 'Axiel Blower', 1, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(282, 4, 19, 'Binding/Indicator Machine', 2, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(283, 4, 19, 'Canopy/Canvas/Tent', 3, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(284, 4, 19, 'Carpentry tools', 4, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(285, 4, 19, 'Chainsaw', 5, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(286, 4, 19, 'Circular saw machine/Crosscut saw', 6, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(287, 4, 19, 'Compactor (plate)', 7, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(288, 4, 19, 'Cutters', 8, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(289, 4, 19, 'Electric drill', 9, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(290, 4, 19, 'Escalator', 10, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(291, 4, 19, 'Floor Polisher', 11, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(292, 4, 19, 'Gas tank', 12, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(293, 4, 19, 'Generator', 13, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(294, 4, 19, 'Grease gun', 14, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(295, 4, 19, 'Grinder', 15, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(296, 4, 19, 'Gun Tucker', 16, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(297, 4, 19, 'Hand tools', 17, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(298, 4, 19, 'Industrial Mixer', 18, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(299, 4, 19, 'Jack', 19, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(300, 4, 19, 'Measuring Tape', 20, NULL, '2018-01-22 23:22:09', '2018-01-22 23:22:09'),
(301, 4, 19, 'Mop squeezer', 21, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(302, 4, 19, 'Planner machine', 22, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(303, 4, 19, 'Plastic sealer', 23, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(304, 4, 19, 'Platform balance', 24, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(305, 4, 19, 'Power Supply', 25, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(306, 4, 19, 'Pressure Washer/Roller', 26, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(307, 4, 19, 'Pump', 27, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(308, 4, 19, 'Sanding machine', 28, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(309, 4, 19, 'Scaffolding', 29, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(310, 4, 19, 'Inverter', 30, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(311, 4, 19, 'Soldering gun', 31, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(312, 4, 19, 'Spotlight', 32, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(313, 4, 19, 'Sprayer/Separator', 33, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(314, 4, 19, 'Riverter', 34, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(315, 4, 19, 'Hook stick', 35, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(316, 4, 19, 'Utility Equipment', 36, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(317, 4, 19, 'Utility Hammer', 37, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(318, 4, 19, 'Vacuum cleaner', 38, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(319, 4, 19, 'Hot stick', 39, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(320, 4, 19, 'Water Tank', 40, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(321, 4, 19, 'Welding machine', 41, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(322, 4, 19, 'Welding outfit', 42, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(323, 4, 19, 'Wrench', 43, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(324, 4, 19, 'Clamp Stick', 44, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(325, 4, 19, 'Hydraulic Crimper', 45, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(326, 4, 19, 'Shredder', 46, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(327, 4, 19, 'Metal Railings', 47, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(328, 4, 19, 'Smoke Machine', 48, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(329, 4, 19, 'Misting Machine', 49, NULL, '2018-01-22 23:22:10', '2018-01-22 23:22:10'),
(330, 4, 19, 'Oil Filtering Machine', 50, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(331, 4, 19, 'Power Fuse', 51, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(332, 4, 19, 'Vacuum Flask', 52, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(333, 4, 19, 'Switch Gears', 53, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(334, 4, 19, 'Sealer Machine', 54, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(335, 4, 19, 'Portalet', 55, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(336, 4, 19, 'Diggint Tools', 56, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(337, 4, 19, 'Techno Test', 57, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(338, 4, 19, 'Buggy', 58, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(339, 4, 19, 'Equipment/Construction Trolley', 59, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(340, 4, 19, 'Push Cart', 60, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(341, 4, 19, 'Waste Bin', 61, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(342, 4, 19, 'Container Van', 62, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(343, 4, 19, 'Steel Frame Structure', 63, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(344, 4, 19, 'Pulverizer', 64, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(345, 4, 19, 'Heat Blower', 65, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(346, 4, 19, 'Cottage', 66, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(347, 4, 19, 'Baler', 67, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(348, 4, 19, 'Perforator', 68, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(349, 4, 19, 'Waste Hopper', 69, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(350, 4, 19, 'Composting Drum', 70, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(351, 4, 19, 'Conveyor', 71, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(352, 4, 19, 'Screener', 72, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(353, 4, 19, 'MRF Equipment', 73, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(354, 5, 20, 'Ambulance', 0, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(355, 5, 20, 'Car', 1, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(356, 5, 20, 'Jeep/AUV', 2, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(357, 5, 20, 'Motorcycle', 3, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(358, 5, 20, 'Multi-Cab', 4, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(359, 5, 20, 'SUV', 5, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(360, 5, 20, 'Van', 6, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(361, 5, 20, 'LCD Mobile Display Truck', 7, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(362, 5, 20, 'Fire Truck', 8, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(363, 5, 20, 'Pick-Up', 9, NULL, '2018-01-22 23:22:11', '2018-01-22 23:22:11'),
(364, 5, 21, 'Boats', 0, NULL, '2018-01-22 23:22:12', '2018-01-22 23:22:12'),
(365, 5, 22, 'Bicycle', 0, NULL, '2018-01-22 23:22:12', '2018-01-22 23:22:12'),
(366, 5, 23, 'Airplane', 0, NULL, '2018-01-22 23:22:12', '2018-01-22 23:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `inv_ppe_code_subcategory`
--

CREATE TABLE `inv_ppe_code_subcategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `ppe_cat_id` int(11) NOT NULL,
  `desc` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_coa` int(11) NOT NULL,
  `code_family` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inv_ppe_code_subcategory`
--

INSERT INTO `inv_ppe_code_subcategory` (`id`, `ppe_cat_id`, `desc`, `code_coa`, `code_family`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Land', 201, 1, NULL, NULL, NULL),
(2, 2, 'Office Buildings', 211, 2, NULL, NULL, NULL),
(3, 2, 'School Buildings', 212, 3, NULL, NULL, NULL),
(4, 2, 'Hospitals and Health Centers', 213, 4, NULL, NULL, NULL),
(5, 2, 'Markets and Slaughterhouses', 214, 5, NULL, NULL, NULL),
(6, 2, 'Other Structures', 215, 6, NULL, NULL, NULL),
(7, 3, 'Office Equipment', 221, 7, NULL, NULL, NULL),
(8, 3, 'Furniture & Fixtures', 222, 8, NULL, NULL, NULL),
(9, 3, 'IT Equipment & Software', 223, 9, NULL, NULL, NULL),
(10, 3, 'Library Books', 224, 10, NULL, NULL, NULL),
(11, 4, 'Agricultural, Fishery & Forestry Equipment', 227, 11, NULL, NULL, NULL),
(12, 4, 'Communication Equipment', 229, 12, NULL, NULL, NULL),
(13, 4, 'Construction & Heavy Eqpt', 230, 13, NULL, NULL, NULL),
(14, 4, 'Fire Fighting Equipment & Accessories', 231, 14, NULL, NULL, NULL),
(15, 4, 'Hospital Equipment', 232, 15, NULL, NULL, NULL),
(16, 4, 'Medical, Dental & Laboratory Equipment', 233, 16, NULL, NULL, NULL),
(17, 4, 'Sports Equipment', 235, 17, NULL, NULL, NULL),
(18, 4, 'Technical & Scientific Equipment', 236, 18, NULL, NULL, NULL),
(19, 4, 'Other Machinery & Equipment', 240, 19, NULL, NULL, NULL),
(20, 5, 'Moto Vehicles', 241, 20, NULL, NULL, NULL),
(21, 5, 'Watercrafts', 244, 21, NULL, NULL, NULL),
(22, 5, 'Other Transportation Equipment', 0, 22, NULL, NULL, NULL),
(23, 5, 'Aircraft', 248, 23, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_01_28_110705_create_audits_table', 1),
(2, '2017_03_09_091746_olongapo_prchse_oder_list', 2),
(3, '2017_03_10_092957_create_purchase_order', 2),
(4, '2017_03_09_034718_olongapo_prchse_request', 3),
(5, '2017_03_09_045813_olongapo_prchse_request_list', 3),
(6, '2017_10_26_062004_olongapo_prchase_request_items', 3),
(7, '2016_12_21_145601_create_dnlx_user_group', 4),
(8, '2016_12_21_145852_create_dnlx_user_credentials', 4),
(9, '2017_01_14_023420_create_main_navigation_table', 4),
(10, '2017_01_14_023843_create_sub_navigation_table', 4),
(11, '2017_05_23_034546_user_logging_timeline', 4),
(12, '2017_01_30_130601_create_inventory_info', 5),
(13, '2017_01_30_130833_create_inventory_rcved_from_info', 5),
(14, '2017_01_30_130925_create_inventory_rcved_by_info', 5),
(15, '2017_01_30_130950_create_inventory_items', 5),
(16, '2017_01_30_131053_create_employee', 5),
(17, '2017_01_30_131117_create_department', 5),
(18, '2017_01_30_131204_create_position', 5),
(19, '2017_01_30_131602_create_inventory_gsoproprty_code_category', 5),
(20, '2017_01_30_131835_create_inventory_gso_property_code_list', 5),
(21, '2017_01_30_131945_create_inventory_invoice_info', 5),
(22, '2017_01_30_132016_create_supplier_info', 5),
(23, '2017_01_30_132117_create_supplier_type', 5),
(24, '2017_01_31_024855_create_ppe_code_category', 5),
(25, '2017_01_31_024903_create_ppe_code_subcategory', 5),
(26, '2017_01_31_024913_create_ppe_code_list', 5),
(27, '2017_02_01_070724_create_supplier_address_info', 5),
(28, '2017_02_01_070909_create_supplier_contact_info', 5),
(29, '2017_06_02_033432_ppe-monthly-report', 5),
(30, '2017_06_02_054208_ppe-monthly-report-items', 5),
(31, '2017_07_04_015239_create_gso_template', 6),
(32, '2017_08_01_024411_create_procurement_method', 6),
(33, '2017_08_01_055248_create_pr_signee', 6),
(34, '2017_03_09_023106_create_dept_sub_code', 7),
(35, '2017_10_04_090958_create_settings_holidays', 7),
(36, '2017_04_03_065401_create_obr', 8),
(37, '2017_04_05_084503_create_bac_control_info', 8),
(38, '2017_04_05_084616_create_bac_source_fund', 8),
(39, '2017_04_05_084635_create_bac_category', 8),
(40, '2017_04_05_084646_create_bac_type', 8),
(41, '2017_04_07_005217_create_bac_templates', 8),
(42, '2017_04_24_015611_create_olongapo_approved_supllier', 8),
(43, '2017_05_09_052803_create_bids_awards_committee', 8),
(44, '2017_05_09_062300_create_bids_awards_committee_aprroved_by', 8),
(45, '2017_05_09_062753_create_bids_awards_committee_attested_by', 8),
(46, '2017_10_03_023337_create_purchase_item_category_group', 8),
(47, '2017_10_03_023526_create_purchase_item_category', 8),
(48, '2017_10_03_023544_create_purchase_items', 8),
(49, '2017_10_03_023606_create_purchase_item_ppmp', 8),
(50, '2017_10_05_011110_create_purchase_item_ppmp_upload', 8),
(51, '2017_10_05_083821_create_purchase_item_ppmp_approval', 8),
(52, '2017_10_23_054223_create_pr_post_inspection', 8),
(53, '2017_10_23_054432_create_pr_post_inspection_items', 8),
(56, '2017_03_14_034134_create_employee_list', 10),
(57, '2017_04_20_082909_create_olongapo_abstrct', 11),
(58, '2017_04_20_083332_create_olongapo_abstrct_pubbid', 11),
(59, '2017_04_20_083503_create_olongapo_abstrct_pubbid_apprved', 11),
(60, '2017_04_20_083608_create_olongapo_abstrct_pubbid_items', 11),
(61, '2017_10_26_084026_create_olongapo_abstrct_signee', 11),
(62, '2019_01_24_145802_create_po_requisition_number_table', 12),
(63, '2019_01_24_145848_create_po_acceptance_issuance_table', 12),
(64, '2017_06_22_085244_create_dept_purchase_request', 13),
(65, '2017_06_22_085519_create_dept_purchase_request_items', 13),
(66, '2019_03_13_024232_olongapo_purchase_request_edit', 14),
(67, '2019_03_18_004420_update_dept_purchase_request', 15),
(68, '2019_07_30_034832_update_ppemnthlyitems_table', 16),
(69, '2019_09_17_020626_update_ppe-monthly-report-items', 17);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_absctrct`
--

CREATE TABLE `olongapo_absctrct` (
  `id` int(10) UNSIGNED NOT NULL,
  `prno_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_no',
  `control_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstrct_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_absctrct_pubbid`
--

CREATE TABLE `olongapo_absctrct_pubbid` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL COMMENT 'refer to supplier_info',
  `abstrct_id` int(11) NOT NULL COMMENT 'refer to olongapo_absctrct',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_absctrct_pubbid_apprved`
--

CREATE TABLE `olongapo_absctrct_pubbid_apprved` (
  `id` int(10) UNSIGNED NOT NULL,
  `pr_no` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_no',
  `pr_item_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_items',
  `suppbid` int(11) NOT NULL COMMENT 'refer to olongapo_absctrct_pubbid_item_suppbid',
  `pubbid` int(11) NOT NULL COMMENT 'refer to olongapo_absctrct_pubbid',
  `date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_absctrct_pubbid_item_suppbid`
--

CREATE TABLE `olongapo_absctrct_pubbid_item_suppbid` (
  `id` int(10) UNSIGNED NOT NULL,
  `absctrct_id` int(11) NOT NULL COMMENT 'refer to olongapo_absctrct',
  `pr_item_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_items',
  `pubbid_id` int(11) NOT NULL COMMENT 'refer to olongapo_absctrct_pubbid',
  `unit_price` decimal(25,2) NOT NULL,
  `total_price` decimal(25,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_absctrct_signee`
--

CREATE TABLE `olongapo_absctrct_signee` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'refer to olongapo_employee',
  `position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_absctrct_signee`
--

INSERT INTO `olongapo_absctrct_signee` (`id`, `name`, `position`, `created_at`, `updated_at`) VALUES
(1, 'SHIELLA PADILLA', 'Secretary to the Mayor', NULL, '2020-01-26 19:39:12'),
(2, 'Alf Dickinsons', 'OIC-City Engineer', NULL, '2019-08-18 19:13:47'),
(3, 'Abel Anderson', 'City Budget Office', NULL, '2018-02-05 22:10:54'),
(4, 'Beatrice Moen', 'City Administrator', NULL, '2018-02-05 22:10:54'),
(5, 'Bonnie Wuckert', 'OIC GSO', NULL, '2018-02-05 22:10:54'),
(6, 'Angelica Ritchiesssss', 'City Legal Office', NULL, '2019-08-18 19:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_approved_supplier`
--

CREATE TABLE `olongapo_approved_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `pr_no` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_no',
  `supp_id` int(11) NOT NULL COMMENT 'refer to supplier_info',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_awards_committee`
--

CREATE TABLE `olongapo_bac_awards_committee` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'refer to olongapo_employee_list',
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_bacposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_bac_awards_committee`
--

INSERT INTO `olongapo_bac_awards_committee` (`id`, `employee_id`, `employee_name`, `employee_bacposition`, `sequence`, `department`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 63, 'Abel Anderson', '2', '', 'Bids and Awards Committee', '2018-02-05 17:28:26', '2018-02-05 17:22:52', '2018-02-05 17:28:26'),
(2, 131, 'Alison Koepp', '3', '', 'Bids and Awards Committee', NULL, '2018-02-05 17:28:56', '2018-02-05 17:28:56'),
(3, 225, 'Alf Dickinson', '4', '', 'Bids and Awards Committee', NULL, '2018-02-05 17:29:09', '2018-02-05 17:29:09'),
(4, 63, 'Abel Anderson', '5', '', 'Bids and Awards Committee', NULL, '2018-02-05 17:29:26', '2018-02-05 17:29:26'),
(5, 14, 'Beatrice Moen', '6', '', 'Bids and Awards Committee', NULL, '2018-02-05 17:29:41', '2018-02-05 17:29:41'),
(6, 94, 'Bonnie Wuckert', '7', '', 'Bids and Awards Committee', NULL, '2018-02-05 17:29:55', '2018-02-05 17:29:55'),
(7, 51, 'Angelica Ritchie', '8', '', 'Bids and Awards Committee', NULL, '2018-02-05 17:30:06', '2018-02-05 17:30:06'),
(8, 0, 'asdasd', '16', '', 'Bids and Awards Committee', '2020-01-20 19:12:26', '2020-01-20 19:12:03', '2020-01-20 19:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_awards_committee_approved_by`
--

CREATE TABLE `olongapo_bac_awards_committee_approved_by` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'refer to olongapo_employee_list',
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_bacposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_bac_awards_committee_approved_by`
--

INSERT INTO `olongapo_bac_awards_committee_approved_by` (`id`, `employee_id`, `employee_name`, `employee_bacposition`, `sequence`, `department`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 95, 'Andreanne Jenkins', '9', '', 'Bids and Awards Committee', '2019-03-25 22:48:55', '2018-02-05 17:30:29', '2019-03-25 22:48:55'),
(2, 58, 'Aniyah Veum', '10', '', 'Bids and Awards Committee', '2020-01-20 17:32:28', '2018-02-05 17:30:46', '2020-01-20 17:32:28'),
(3, 63, 'Abel Anderson', '13', '', 'Bids and Awards Committee', '2020-01-20 17:32:31', '2019-03-25 22:48:50', '2020-01-20 17:32:31'),
(4, 35, 'Baron Herman', '9', '', 'Bids and Awards Committee', '2020-01-20 17:33:41', '2020-01-20 17:33:32', '2020-01-20 17:33:41'),
(5, 0, 'ATTY. ROLEN C. PAULINO, JR.', '15', '', 'Bids and Awards Committee', '2020-01-20 19:32:12', '2020-01-20 18:22:17', '2020-01-20 19:32:12'),
(6, 0, 'SHIELA R. PADILLA', '10', '', 'Bids and Awards Committee', '2020-01-20 19:32:09', '2020-01-20 18:54:18', '2020-01-20 19:32:09'),
(7, 0, 'SHIELA R. PADILLA', '10', '', 'Bids and Awards Committee', '2020-01-20 19:45:18', '2020-01-20 19:32:31', '2020-01-20 19:45:18'),
(8, 0, 'ATTY. ROLEN C. PAULINO, JR.', '9', '', 'Bids and Awards Committee', '2020-01-20 19:45:21', '2020-01-20 19:33:04', '2020-01-20 19:45:21'),
(9, 0, 'ATTY. ROLEN C. PAULINO, JR.', '9', '', 'Bids and Awards Committee', NULL, '2020-01-20 19:45:55', '2020-01-20 19:45:55'),
(10, 0, 'SHEILA R. PADILLA', '10', '', 'Bids and Awards Committee', NULL, '2020-01-20 19:46:17', '2020-01-20 19:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_awards_committee_attested_by`
--

CREATE TABLE `olongapo_bac_awards_committee_attested_by` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'refer to olongapo_employee_list',
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_bacposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_bac_awards_committee_attested_by`
--

INSERT INTO `olongapo_bac_awards_committee_attested_by` (`id`, `employee_id`, `employee_name`, `employee_bacposition`, `sequence`, `department`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 240, 'Bernice Pacocha', '11', '', 'Bids and Awards Committee', NULL, '2018-02-05 17:31:06', '2018-02-05 17:31:06'),
(2, 0, 'asd', '16', '', 'Bids and Awards Committee', '2020-01-20 19:12:38', '2020-01-20 19:12:08', '2020-01-20 19:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_category`
--

CREATE TABLE `olongapo_bac_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_bac_category`
--

INSERT INTO `olongapo_bac_category` (`id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Advertising Agency Services', NULL, NULL, NULL),
(2, 'Agricultural Chemicals', NULL, NULL, NULL),
(3, 'Agricultural Machinery and Equipment', NULL, NULL, NULL),
(4, 'Agricultural Products (Seeds, Seedlings, Plants)', NULL, NULL, NULL),
(5, 'Airconditioning and Airconditioning System', NULL, NULL, NULL),
(6, 'Airconditioning Maintenance Services', NULL, NULL, NULL),
(7, 'Aircraft Spare Parts', NULL, NULL, NULL),
(8, 'Ammunitions and Explosives', NULL, NULL, NULL),
(9, 'Animal Feeds', NULL, NULL, NULL),
(10, 'Appliances', NULL, NULL, NULL),
(11, 'Architectural Design', NULL, NULL, NULL),
(12, 'Arts and Crafts Accessories and Supplies', NULL, NULL, NULL),
(13, 'Audio and Visual Equipment', NULL, NULL, NULL),
(14, 'Automation Equipment', NULL, NULL, NULL),
(15, 'Aviation Products', NULL, NULL, NULL),
(16, 'Bedclothes, Linens and Towels', NULL, NULL, NULL),
(17, 'Beverages', NULL, NULL, NULL),
(18, 'Books, Maps and other Publications', NULL, NULL, NULL),
(19, 'CAD Services', NULL, NULL, NULL),
(20, 'Cargo Forwading and Hauling Services', NULL, NULL, NULL),
(21, 'Catering Services', NULL, NULL, NULL),
(22, 'Chemical Detergents', NULL, NULL, NULL),
(23, 'Chemical and Chemical Products', NULL, NULL, NULL),
(24, 'Communication Equipment', NULL, NULL, NULL),
(25, 'Communication Equipment & Parts and Accessories', NULL, NULL, NULL),
(26, 'Computer Furniture', NULL, NULL, NULL),
(27, 'Construction Equipment', NULL, NULL, NULL),
(28, 'Construction Management Services', NULL, NULL, NULL),
(29, 'Construction Materials and Supplies', NULL, NULL, NULL),
(30, 'Construction Projects', NULL, NULL, NULL),
(31, 'Consulting Services', NULL, NULL, NULL),
(32, 'Corporate Giveaways', NULL, NULL, NULL),
(33, 'Dairy Products', NULL, NULL, NULL),
(34, 'Diagnostic and Laboratory Services', NULL, NULL, NULL),
(35, 'Drugs and Medicines', NULL, NULL, NULL),
(36, 'Educational Materials and Supplies', NULL, NULL, NULL),
(37, 'Electrical Supplies', NULL, NULL, NULL),
(38, 'Electrical Systems and Lightning Components', NULL, NULL, NULL),
(39, 'Electronic Parts and Components', NULL, NULL, NULL),
(40, 'Engineering and Laboratory Testing Equipment', NULL, NULL, NULL),
(41, 'Environmental Health/Safety Equipment', NULL, NULL, NULL),
(42, 'Events Management', NULL, NULL, NULL),
(43, 'Fertilizers', NULL, NULL, NULL),
(44, 'Fire Fighting & Rescue and Safety Equipment', NULL, NULL, NULL),
(45, 'Furnitures & Fixtures', NULL, NULL, NULL),
(46, 'Flags', NULL, NULL, NULL),
(47, 'Food Processing Equipment', NULL, NULL, NULL),
(48, 'Food Stuff', NULL, NULL, NULL),
(49, 'Freight Forwader Services', NULL, NULL, NULL),
(50, 'Fuels/Fuel Additives & Lubricants & Anti Corrosive', NULL, NULL, NULL),
(51, 'Furniture & Fixtures', NULL, NULL, NULL),
(52, 'Furniture Parts and Accessories', NULL, NULL, NULL),
(53, 'Games and Toys', NULL, NULL, NULL),
(54, 'Gaming Equipment and Paraphernalia', NULL, NULL, NULL),
(55, 'Garments', NULL, NULL, NULL),
(56, 'General Contractor', NULL, NULL, NULL),
(57, 'General Engineering Services', NULL, NULL, NULL),
(58, 'General Merchandise', NULL, NULL, NULL),
(59, 'General Repair and Maintenance Services', NULL, NULL, NULL),
(60, 'Geotechnical Instrumentation', NULL, NULL, NULL),
(61, 'Grocery Items', NULL, NULL, NULL),
(62, 'Guns and Weapons', NULL, NULL, NULL),
(63, 'Hardware and Construction Supplies', NULL, NULL, NULL),
(64, 'Hospital/Medical Equipment', NULL, NULL, NULL),
(65, 'Hotel and Lodging and Meeting Facilities', NULL, NULL, NULL),
(66, 'Hydrological Instruments', NULL, NULL, NULL),
(67, 'Industrial Machinery and Equipment', NULL, NULL, NULL),
(68, 'Industrial Pumps and Compressors', NULL, NULL, NULL),
(69, 'Industrial Safety Equipment', NULL, NULL, NULL),
(70, 'Information Technology', NULL, NULL, NULL),
(71, 'Information Technology Parts & accessories & Perip', NULL, NULL, NULL),
(72, 'Institutional Food Services Equipment', NULL, NULL, NULL),
(73, 'Internet Services', NULL, NULL, NULL),
(74, 'Investigative Equipment', NULL, NULL, NULL),
(75, 'IT Broadcasting and Telecommunications', NULL, NULL, NULL),
(76, 'Janitorial Equipment', NULL, NULL, NULL),
(77, 'Janitorial Services', NULL, NULL, NULL),
(78, 'Janitorial Supplies', NULL, NULL, NULL),
(79, 'Kitchenware', NULL, NULL, NULL),
(80, 'Laboratory Supplies and Equipment', NULL, NULL, NULL),
(81, 'Laundry Services', NULL, NULL, NULL),
(82, 'Lease and Rental', NULL, NULL, NULL),
(83, 'Lifting Equipment and Accessories', NULL, NULL, NULL),
(84, 'Live Animals (Livestock, Birds, Live Fish & etc.,)', NULL, NULL, NULL),
(85, 'Machine Tools', NULL, NULL, NULL),
(86, 'Mail and Cargo Transport Services', NULL, NULL, NULL),
(87, 'Mailing Tools', NULL, NULL, NULL),
(88, 'Marine Transport', NULL, NULL, NULL),
(89, 'Maritime Spare Parts', NULL, NULL, NULL),
(90, 'Market Research Services', NULL, NULL, NULL),
(91, 'Medical and Dental Equipment', NULL, NULL, NULL),
(92, 'Medical Supplies and Laboratory Instrument', NULL, NULL, NULL),
(93, 'Metal Fabrication', NULL, NULL, NULL),
(94, 'Meteorological Equipments and instruments', NULL, NULL, NULL),
(95, 'Mining Equipment and Supplies', NULL, NULL, NULL),
(96, 'Musical Instrument Parts and Accessories', NULL, NULL, NULL),
(97, 'Musical Instruments', NULL, NULL, NULL),
(98, 'Navigation Equipment', NULL, NULL, NULL),
(99, 'Newspaper', NULL, NULL, NULL),
(100, 'Office Equipment', NULL, NULL, NULL),
(101, 'Office Equipment Parts and Accessories', NULL, NULL, NULL),
(102, 'Office Supplies and Devices', NULL, NULL, NULL),
(103, 'Oil/Heat Chemical Resistant Rubber', NULL, NULL, NULL),
(104, 'Ordinance Products', NULL, NULL, NULL),
(105, 'Packaging Supplies and Materials', NULL, NULL, NULL),
(106, 'Personal Care Products', NULL, NULL, NULL),
(107, 'Pest Control Services', NULL, NULL, NULL),
(108, 'Photographic Equipment', NULL, NULL, NULL),
(109, 'Photographic Parts, Supplies and Accessories', NULL, NULL, NULL),
(110, 'Photography Services', NULL, NULL, NULL),
(111, 'Plastic Products', NULL, NULL, NULL),
(112, 'Power Generating Sets', NULL, NULL, NULL),
(113, 'Preserved or Processed Foods', NULL, NULL, NULL),
(114, 'Print and Broadcast and Aerial Advertising', NULL, NULL, NULL),
(115, 'Printing Services', NULL, NULL, NULL),
(116, 'Printing Supplies', NULL, NULL, NULL),
(117, 'Public Relations Programs or Services', NULL, NULL, NULL),
(118, 'Purses, handbags and bags', NULL, NULL, NULL),
(119, 'Quartermaster Items', NULL, NULL, NULL),
(120, 'Radiological/Diagnostic Equipment', NULL, NULL, NULL),
(121, 'Reproduction Services', NULL, NULL, NULL),
(122, 'Rice Miling Services', NULL, NULL, NULL),
(123, 'Safety and Occupational Products', NULL, NULL, NULL),
(124, 'Sale of Property or Building', NULL, NULL, NULL),
(125, 'Security Services', NULL, NULL, NULL),
(126, 'Security Surveillance and Detection Equipment', NULL, NULL, NULL),
(127, 'Services', NULL, NULL, NULL),
(128, 'Signage and Accessories', NULL, NULL, NULL),
(129, 'Sporting Goods', NULL, NULL, NULL),
(130, 'Structured Cabling', NULL, NULL, NULL),
(131, 'Surveying Instruments', NULL, NULL, NULL),
(132, 'Surveying Services', NULL, NULL, NULL),
(133, 'Systems Integration', NULL, NULL, NULL),
(134, 'Telecommunications Engineering', NULL, NULL, NULL),
(135, 'Telecommunications Provider', NULL, NULL, NULL),
(136, 'Textiles', NULL, NULL, NULL),
(137, 'Timepieces and Jewerly and Gemstone Products', NULL, NULL, NULL),
(138, 'Tokens and Awards', NULL, NULL, NULL),
(139, 'Traffic Control Systems', NULL, NULL, NULL),
(140, 'Transmission and Distribution Lines', NULL, NULL, NULL),
(141, 'Transportation and Communication Services', NULL, NULL, NULL),
(142, 'Travel, Food, Lodging and Entertainment Services', NULL, NULL, NULL),
(143, 'Vehicle Parts and Accessories', NULL, NULL, NULL),
(144, 'Vehicle Repair and Maintenance', NULL, NULL, NULL),
(145, 'Vehicles', NULL, NULL, NULL),
(146, 'Veterinary Products and Supplies', NULL, NULL, NULL),
(147, 'Video Production Services', NULL, NULL, NULL),
(148, 'Waste Management and Recycling', NULL, NULL, NULL),
(149, 'Water and Waste Water Treatment Supply & Disposal', NULL, NULL, NULL),
(150, 'Water Service Connection Materials/Fittings', NULL, NULL, NULL),
(151, 'Well Drilling and Construction Services', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_control_info`
--

CREATE TABLE `olongapo_bac_control_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `bac_control_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prno_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_no',
  `bac_date` date NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `sourcefund_id` int(11) NOT NULL COMMENT 'refer to olongapo_bac_source_fund',
  `category_id` int(11) NOT NULL COMMENT 'refer to olongapo_bac_category',
  `apprved_pubbid_id` int(11) NOT NULL COMMENT 'refer to olongapo_absctrct_pubbid_apprved',
  `bac_type_id` int(11) NOT NULL COMMENT 'refer to olongapo_bac_type',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_source_fund`
--

CREATE TABLE `olongapo_bac_source_fund` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_bac_source_fund`
--

INSERT INTO `olongapo_bac_source_fund` (`id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Representation Expenses', NULL, NULL, NULL),
(2, 'Other Supplies and Materials Expenses', NULL, NULL, NULL),
(3, 'Other Maintainance and Operating Expenses', NULL, NULL, NULL),
(4, 'Office Supplies and Devices', NULL, NULL, NULL),
(5, 'Motor Vehicles', NULL, NULL, NULL),
(6, 'Furniture and Fixture', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_template`
--

CREATE TABLE `olongapo_bac_template` (
  `id` int(10) UNSIGNED NOT NULL,
  `template_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_bac_template`
--

INSERT INTO `olongapo_bac_template` (`id`, `template_desc`, `template`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Shopping Negotiated (R)', '\"<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 12px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;WHEREAS<\\/strong>, pursuant to Section 10, Rule IV of the Amended IRR-A, all procurement shall be done through competitive bidding (<em>meaning, the procuring entities shall adopt public bidding as the general mode of procurement<\\/em>), except that subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in this Act, the procuring entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in Sections 48-53 of this IRR-A.<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 12px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, one of the alternative methods of procurement is through&nbsp;<strong>SHOPPING<\\/strong>&nbsp;provided Section&nbsp;<strong>52.1<\\/strong>&nbsp;of the IRR-A which shall be resorted to in any of the following conditions:<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 60px;\\\"><span style=\\\"font-size: 12px;\\\">&nbsp;A.&nbsp; &nbsp; &nbsp; When there is an unforeseen contingency requiring immediate purchase:&nbsp; &nbsp; Provided, however, That the amount shall not exceed Two Hundred Thousand Pesos (P200,000);&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 60px;\\\"><span style=\\\"font-size: 12px;\\\">B.&nbsp; &nbsp; &nbsp; Procurement of ordinary or regular office supplies and equipment not available in the Procurement Service involving an amount not exceeding One Million Pesos (P1,000,000): Provided, however, That the Procurement does not result in Splitting of Contracts: Provided, further, That at least three (3) price quotations from bona fide suppliers shall be obtained.<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 60px;\\\"><span style=\\\"font-size: 12px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 12px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>,&nbsp;<strong>Section 53. Negotiated Procurement<\\/strong>&nbsp;&ndash; a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;<em>&nbsp;53.9.2- \\\"The Thresholds prescribed in Annex \\\"H\\\" of this IRR shall be subject to the periodic review by the GPPB. For this purpose, the GPPB shall be authorized to increase or decrease the said amount in order to reflect the changes in economic conditions &amp; for other justifiable reasons.\\\"<\\/em><strong>(Labor Amount Php 19,000.00)<\\/strong>.<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 12px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 12px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;WHEREAS<\\/strong>,&nbsp;<span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span>&nbsp;has a request for item(s) particularly described&nbsp;&nbsp;as per&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span>&nbsp;dated&nbsp;<span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span>&nbsp;&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 12px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, the General Services Officer, acting as Head, Secretariat for Bids and Awards Committee (BAC), has&nbsp;certified that the above items(s) is\\/are not available in the procurement service;<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 12px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 12px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, per enclosed abstract of Canvass&nbsp;&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;with office at&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_addr]<\\/span>&nbsp;meets the case in letter&nbsp; (a) above.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 12px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;WHEREAS<\\/strong>, the Approved Budget for this Contract (ABC) amounts to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify; padding-left: 30px;\\\"><span style=\\\"font-size: 12px;\\\"><strong>&nbsp; &nbsp;NOW THEREFORE,<\\/strong>&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;shopping with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span>.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify; padding-left: 30px;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify; padding-left: 30px;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 12px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'SN (R)', NULL, '2018-01-29 23:22:12', '2020-01-20 22:08:36'),
(2, 'Shopping Negotiated (SV)', '\"<p><span style=\\\"font-size: 14px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, pursuant to Section 10, Rule IV of the Amended IRR-A, all procurement shall be done through competitive bidding (<em>meaning, the procuring entities shall adopt public bidding as the general mode of procurement<\\/em>), except that subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in this Act, the procuring entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in Sections 48-53 of this IRR-A.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;WHEREAS<\\/strong>, one of the alternative methods of procurement is through&nbsp;<strong>SHOPPING<\\/strong>&nbsp;provided Section&nbsp;<strong>52.1<\\/strong>&nbsp;of the IRR-A which shall be resorted to in any of the following conditions:<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 14px;\\\">a. When there is an unforeseen contingency requiring immediate purchase:&nbsp; &nbsp; Provided, however, That the amount shall not exceed One Hundred Thousand Pesos (P100,000); or<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 14px;\\\">b. Procurement of ordinary or regular office supplies and equipment not available in the Procurement Service involving an amount not exceeding Five Hundred Thousand Pesos (P500,000): Provided, however, That the Procurement does not result in Splitting of Contracts: Provided, further, That at least three (3) price quotations from bona fide suppliers shall be obtained.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; <\\/strong>&nbsp;<strong>WHEREAS, Section 53. Negotiated Procurement<\\/strong> &ndash; a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp; Small Value Procurement - where the amount is One Hundred Thousand Pesos (P100,000.00) and below; Provided, however, that the procurement does not result in splitting of contracts, further that the procurement does not fall under Shopping; (item no.4)<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;WHEREAS<\\/strong>,&nbsp;<span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span>&nbsp;has a request for item(s) particularly described&nbsp;&nbsp;as per&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span>&nbsp;dated&nbsp;<span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span>&nbsp;&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\"><strong>&nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, the General Services Officer, acting as Head, Secretariat for Bids and Awards Committee (BAC), has&nbsp;certified that the above items(s) is\\/are not available in the procurement service;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;WHEREAS<\\/strong>, per enclosed abstract of Canvass&nbsp;&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;with office at&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_addr]<\\/span>&nbsp;meets the case in letter&nbsp; (a) above<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;WHEREAS<\\/strong>, the Approved Budget for this Contract (ABC) amounts to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 14px;\\\"><strong>&nbsp; &nbsp; &nbsp; NOW THEREFORE,<\\/strong>&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;shopping with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span>.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 14px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 14px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 14px;\\\">&nbsp;<\\/span><\\/p>\"', 'SN (SV)', NULL, '2018-02-05 01:35:09', '2020-01-20 21:43:35'),
(3, 'NEGOTIATED REPAIR3(NEW)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WHEREAS<\\/strong>, the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184<\\/strong>, otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;&nbsp; 53.9.2-<em> \\\"The Thresholds prescribed in Annex \\\"H\\\" of this IRR shall be subject to the periodic review by the GPPB. For this purpose, the GPPB shall be authorized to increase or decrease the said amount in order to reflect the changes in economic conditions &amp; for other justifiable reasons.\\\"<\\/em><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/em> <strong>WHEREAS<\\/strong>, the<span style=\\\"text-decoration: underline;\\\"> [dept_name] <\\/span>has requested for items particularly described per [pr_no] &nbsp;&nbsp; dated [prno_date] and directly negotiate with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp; &nbsp; [bac_categ]<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to&nbsp;<span style=\\\"text-decoration: underline;\\\"> [pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;NOW THEREFORE<\\/strong>,&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this <span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>. <\\/span><\\/p>\"', 'NR', NULL, '2018-02-05 21:25:43', '2018-02-06 22:39:13'),
(4, 'NEGOTIATED-(EmergencyCases)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted <strong>all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;<strong> Emergency case 53.2<\\/strong> - In case of imminent danger to life or property during a state of calamity, or when time is of the essence arising from natural or man-made calamities or other causes where immediate action is necessary to prevent damage to or loss of life or property, or to restore vital public services, infrastructure facilities &amp; other public utilities. In case of infrastructure projects, the procuring entity has the option to undertake the project through negotiated procurement or by administration or, in high securit risk areas, through the AFP. <strong>(Sangguniang Panlungsod: Resoslution No; 98 -Series of 2013)<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong><em>&nbsp;&nbsp;&nbsp;&nbsp;<\\/em><\\/strong>&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated [prno_date] and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp; [bac_categ]<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>WHEREAS<\\/strong>,&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement<\\/strong>:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE<\\/strong>,&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; <\\/strong><strong>&nbsp;APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;[current_date]<span style=\\\"text-decoration: underline;\\\">.<\\/span><\\/span><\\/p>\"', 'N(EC)', NULL, '2018-02-05 21:49:55', '2018-02-06 22:41:35'),
(5, 'NEGOTIATED-PAKYAW', '\"<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted <strong>all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;<strong> Section 53.9 - Small Value Procurement - 53.9.1 -<\\/strong> The Procuring entity shall draw up a list of at least three (3) suppliers, contractors, or consultant of known qualifications which will be invited to submit proposals, un the case of goods &amp; <strong>infrastructure projects,<\\/strong> or curriculum vitae, in the case of consulting services.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><em>&nbsp; &nbsp; &nbsp; &nbsp; <\\/em><strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp;&nbsp;[bac_categ]<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the Approved Budget for this Contract(ABC) amounts to [pr_total_amount]<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>,&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement<\\/strong>:<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE<\\/strong>,&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'NP', NULL, '2018-02-05 21:55:38', '2018-02-06 22:42:15'),
(6, 'NEGOTIATED-AgencytoAgency', '\"<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp; <strong>Agency-to-Agency-<\\/strong> Procurement of infrastructure projects, consulting services, and goods from another agency of the GOP, such as the PS-DBM, which is tasked with a centralized procurement of Common-Use Supplies for the GOP in accordance with Letters of Instruction No. 755 and Executive Order No. 359, series of 1989.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp; Appendix 6 of Implementing Guidelines of Agency-To-Agency Agreements-<\\/strong> <em>The end-user unit shall undertake a Cost-benfit analysis, taking into consideration the following factors: prevailing standard cost for the project in the market, absorptive capacity of the Servicing Agency, and such other factors. Based on the assessment and recommendation of the end-user unit, the BAC shall issue a resolution recommending the use of Agency-to-Agency Agreement to the head of the Procuring Agency. Upon approval of the BAC resolution, the Procuring Agency shall enter into a Memorandum of Agreement (MOA) with the Servicing Agency. Pursuant to Section 5 (c), the MOA shall reflect the Agreement of the parties with regard to the posting of a performance bond and\\/or a warranty security.<\\/em><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> <\\/em>with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru <strong>Negotiated Procurement<\\/strong> with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span> amounting to&nbsp;<u>[pr_total_amount]<\\/u><\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;[current_date].<\\/span><\\/p>\"', 'N-AtA', NULL, '2018-02-05 21:58:14', '2018-02-06 22:43:54'),
(7, 'NEGOTIATED-RepeatOrder', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted <strong>all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 51. Repeat Order &ndash;<\\/strong> When provided for in th e Annual Procurement Plan, Repeat Order may be allowed wherein the Procuring Entity directly procures Goods from the previous winning bidder whenever there arises a need to replenish goods procured under a contact previous awarded through Competitive Bidding, subject to post-qualification process prescribed in the bidding Documents and provided all the following conditions are present:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a.&nbsp; The unit price nust be equal to or lower than that provided in the original contract;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b.&nbsp;&nbsp; The repeat order does not result in splitting of requisitions or purchase oders;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c.&nbsp;&nbsp; Escept in special circumtances defined in the IRR, the repeat order shall be availed of only within six (6) months from the date of the Notice to Proceed arising from the original&nbsp;&nbsp;&nbsp; contract; and<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d.&nbsp;&nbsp; The repeat order shall not exceed twenty-five percent (25%) of the quantity of each item of the original contract;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BID Amount&nbsp; Php 4,079,964.00<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 25%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Php 1,543,420.00<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru <strong>Repeat Order<\\/strong> with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span> amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span>.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\"', 'N-RO', NULL, '2018-02-05 22:01:07', '2018-02-06 07:25:27'),
(8, 'NEGOTIATED-Supplemental', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;<strong> Section 53.4.-Adjacent or Contiguous-<\\/strong><em>Where the subject contract is adjacent or contiguous to an on-going Infrastructure Project or Consulting Service where the consultants have unique experience and expertise to deliver the required servrce: Provide however, that(a) the original contract is the result of a Competitive Bidding;(b) the subject contract to be negotiated has similar or ralated scopes of work;(c) it is within the contracting capacity of the contractor\\/consultant;(d) the contractor\\/consultant uses the same prices or lower unit prices as in the original contract less mobilization cost;(e) the amount involved does not excedd the amount of the ongoing project; and (f) the contractor\\/consultant has no slippage\\/delay: Provided, further, That negotiations for the procurement are commenced before the expiry of the original contract.<\\/em><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;<\\/em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; with office at <span style=\\\"text-decoration: underline;\\\">[company_addr]<\\/span>&nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE<\\/strong>,&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with&nbsp;[company_name]&nbsp;amounting to&nbsp;[pr_total_amount].<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; APPROVED<\\/strong><strong> UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date].<\\/span><\\/span><\\/p>\"', 'N-S', NULL, '2018-02-05 22:05:14', '2018-02-06 22:47:06'),
(9, 'NEGOTIATED-SmallValueConsulting', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp; <strong>Section 53.9 - Small Value Procurement -<\\/strong> Where the procurement does not fall under shopping in Sec 52 of this IRR and the amount involved does not exceed the thresholds prescribed in Annex \\\"H\\\" of this IRR: 53.9.1-The procuring entity shall draw up a list at least three (3) suppliers, contractors, or consultants of known qualifications which will be invited to submit proposals, in the case of goods &amp; infrastructure projects, or <strong>curriculum vitae,<\\/strong> in the case of consulting services.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;<\\/em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>NOW THEREFORE<\\/strong>,&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with&nbsp;[company_name]&nbsp;amounting to&nbsp;[pr_total_amount].<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; APPROVED<\\/strong><strong>&nbsp;UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'N-SVC', NULL, '2018-02-05 22:07:16', '2018-02-06 22:47:44'),
(10, 'NEGOTIATED-SmallValue(New)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp; WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted <strong>all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable <strong>supplier only:&nbsp; Section 53.9 - Small Value Procurement -<\\/strong> where the amount is Five Hundred Thousand Pesos (P500,000.00) and below; Provided, however, that the procurement does not result in splitting of contracts, further that the procurement does not fall under Shopping;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <\\/em><strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per<span style=\\\"text-decoration: underline;\\\"> [pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp; &nbsp; <span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE<\\/strong>,&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;[current_date].<\\/span><\\/p>\"', 'N-SV(N)', NULL, '2018-02-05 22:11:43', '2018-02-06 22:48:16');
INSERT INTO `olongapo_bac_template` (`id`, `template_desc`, `template`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 'NEGOTIATED RENTAL-3-15-2014 (N)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only: <strong>53.9.2-<\\/strong> <em>\\\"The Thresholds prescribed in Annex \\\"H\\\" of this IRR shall be subject to the periodic review by the GPPB. For this purpose, the GPPB shall be authorized to increase or decrease the said amount in order to reflect the changes in economic conditions &amp; for other justifiable reasons.\\\"<\\/em><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <\\/em><strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with<span style=\\\"text-decoration: underline;\\\"> [company_name]&nbsp;<\\/span> &nbsp; <span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <\\/strong>Incidental expenses on Trucking or Rental of Van, Car, Jeep and Equipment, Bus or Hotel Accomodation conducted in the exigency of services<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE<\\/strong>,&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with&nbsp;[company_name]&nbsp;amounting to&nbsp;[pr_total_amount].<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'NR-(N)', NULL, '2018-02-05 22:16:37', '2018-02-06 22:48:58'),
(12, 'NEGOTIATED MEALS (NEW)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:<strong> 53.9.2-<\\/strong> <em>\\\"The Thresholds prescribed in Annex \\\"H\\\" of this IRR shall be subject to the periodic review by the GPPB. For this purpose, the GPPB shall be authorized to increase or decrease the said amount in order to reflect the changes in economic conditions &amp; for other justifiable reasons.\\\"<\\/em><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <\\/em><strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with<span style=\\\"text-decoration: underline;\\\"> [<\\/span>company_name]&nbsp; &nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Incidental expenses on merienda \\/ snacks or meals in the middle of conference \\/ dialogue \\/ meeting \\/,etc. conducted in the exigency of services<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE<\\/strong>,&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'NM(N)', NULL, '2018-02-05 22:19:03', '2018-02-06 22:49:20'),
(13, 'SHOPPING (50K)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> pursuant to Section 10, Rule IV of the Amended IRR-A, all procurement shall be done through competitive bidding<em> (meaning, the procuring entities shall adopt public bidding as the general mode of procurement)<\\/em>, except that subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in this Act, the procuring entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in Sections 48-53 of this IRR-A.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> one of the alternative methods of procurement is through <strong>SHOPPING<\\/strong> provided Section 52 of the IRR-A which shall be resorted to in any of the following conditions:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; i.&nbsp; When there is an unforeseen contingency requiring immediate purchase:&nbsp;&nbsp;&nbsp; Under Section 52.1 (a) of the IRR; or<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. RFQ\'s w\\/ ABC\'s equal to Fifty Thousand Pesos (Php 50,000.00) and below<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;<\\/em>&nbsp;&nbsp;<strong>&nbsp;&nbsp; WHEREAS,<\\/strong> the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; <span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the General Services Officer, acting as Head, Secretariat for Bids and Awards Committee (BAC), has certified that the above items(s) is\\/are not available in the procurement service;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp; WHEREAS,<\\/strong> per enclosed abstract of Canvasswith office at<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span> meets the case in letter<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span> &nbsp;&nbsp; <\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'S(50K)', NULL, '2018-02-05 22:27:10', '2018-02-06 07:20:31'),
(14, 'SHOPPING (NEW)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> pursuant to Section 10, Rule IV of the Amended IRR-A, all procurement shall be done through competitive bidding <em>(meaning, the procuring entities shall adopt public bidding as the general mode of procurement)<\\/em>, except that subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in this Act, the procuring entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in Sections 48-53 of this IRR-A.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, one of the alternative methods of procurement is through <strong>SHOPPING<\\/strong> provided <strong>Section 52.1.<\\/strong> of the IRR-A which shall be resorted to in any of the following conditions:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>a.<\\/strong> When there is an unforeseen contingency requiring immediate purchase:&nbsp;&nbsp;&nbsp; Provided, however, That the amount shall not exceed Two Hundred Thousand Pesos (P200,000); or<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> b.<\\/strong> Procurement of ordinary or regular office supplies and equipment not available in the Procurement Service involving an amount not exceeding One Million Pesos (P1000,000): Provided, however, That the Procurement does not result in Splitting of Contracts: Provided, <strong>52.2.<\\/strong> The phase\\\"ordinary or regular office supplies\\\" shall be understood to include those supplies, commodities or materials which, depending on the procuring entity\'s mandate and nature of operations further, <strong>52.3.<\\/strong> Under Section 52.1 (b) of this IRR, at least three (3) price quotations from bona fide suppliers shall be obtained.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp; <\\/strong><\\/em><strong>WHEREAS,<\\/strong> the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> &nbsp; &nbsp;&nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp; WHEREAS,<\\/strong> the Head Secretariat for Bids and Awards Committee (BAC), has certified that the above items(s) &nbsp;is\\/are not available in the procurement service;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp; WHEREAS,<\\/strong> per enclosed abstract of Canvass <u>[company_name]<\\/u>&nbsp;with office at <u>[company_addr]&nbsp;<\\/u>meets the case in letter&nbsp;<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span> &nbsp;&nbsp; <\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru shopping with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span> amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'S(N)', NULL, '2018-02-05 22:28:55', '2018-02-06 22:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_template2`
--

CREATE TABLE `olongapo_bac_template2` (
  `id` int(10) UNSIGNED NOT NULL,
  `template_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_bac_template2`
--

INSERT INTO `olongapo_bac_template2` (`id`, `template_desc`, `template`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Shopping Negotiated (R)', '\"<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, pursuant to Section 10, Rule IV of the Amended IRR-A, all procurement shall be done through competitive bidding (<em>meaning, the procuring entities shall adopt public bidding as the general mode of procurement<\\/em>), except that subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in this Act, the procuring entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in Sections 48-53 of this IRR-A.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;WHEREAS<\\/strong>, one of the alternative methods of procurement is through <strong>SHOPPING<\\/strong> provided Section <strong>52.1<\\/strong> of the IRR-A which shall be resorted to in any of the following conditions:<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 13px;\\\">a. When there is an unforeseen contingency requiring immediate purchase:&nbsp; &nbsp; Provided, however, That the amount shall not exceed Two Hundred Thousand Pesos (P200,000); or<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 13px;\\\">b. Procurement of ordinary or regular office supplies and equipment not available in the Procurement Service involving an amount not exceeding One Million Pesos (P1,000,000): Provided, however, That the Procurement does not result in Splitting of Contracts: Provided, further, That at least three (3) price quotations from bona fide suppliers shall be obtained.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;WHEREAS<\\/strong>, <strong>Section 53. Negotiated Procurement<\\/strong> &ndash; a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;<em> 53.9.2- \\\"The Thresholds prescribed in Annex \\\"H\\\" of this IRR shall be subject to the periodic review by the GPPB. For this purpose, the GPPB shall be authorized to increase or decrease the said amount in order to reflect the changes in economic conditions &amp; for other justifiable reasons.\\\"<\\/em><strong>(Labor Amount Php 19,000.00)<\\/strong>.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;WHEREAS<\\/strong>,&nbsp;<span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span>&nbsp;has a request for item(s) particularly described&nbsp;&nbsp;as per&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span>&nbsp;dated&nbsp;<span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span>&nbsp;&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, the General Services Officer, acting as Head, Secretariat for Bids and Awards Committee (BAC), has&nbsp;certified that the above items(s) is\\/are not available in the procurement service;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;WHEREAS<\\/strong>, per enclosed abstract of Canvass&nbsp; <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;with office at&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_addr]<\\/span> meets the case in letter&nbsp; (a) above<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;WHEREAS<\\/strong>, the Approved Budget for this Contract (ABC) amounts to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; NOW THEREFORE,<\\/strong>&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;shopping with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span>.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\"', 'SN (R)', NULL, '2018-01-29 23:22:12', '2018-02-06 09:05:47'),
(2, 'Shopping Negotiated (SV)', '\"<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, pursuant to Section 10, Rule IV of the Amended IRR-A, all procurement shall be done through competitive bidding (<em>meaning, the procuring entities shall adopt public bidding as the general mode of procurement<\\/em>), except that subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in this Act, the procuring entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in Sections 48-53 of this IRR-A.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;WHEREAS<\\/strong>, one of the alternative methods of procurement is through&nbsp;<strong>SHOPPING<\\/strong>&nbsp;provided Section&nbsp;<strong>52.1<\\/strong>&nbsp;of the IRR-A which shall be resorted to in any of the following conditions:<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 13px;\\\">a. When there is an unforeseen contingency requiring immediate purchase:&nbsp; &nbsp; Provided, however, That the amount shall not exceed One Hundred Thousand Pesos (P100,000); or<\\/span><\\/p>\\r\\n<p style=\\\"padding-left: 30px;\\\"><span style=\\\"font-size: 13px;\\\">b. Procurement of ordinary or regular office supplies and equipment not available in the Procurement Service involving an amount not exceeding Five Hundred Thousand Pesos (P500,000): Provided, however, That the Procurement does not result in Splitting of Contracts: Provided, further, That at least three (3) price quotations from bona fide suppliers shall be obtained.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; <\\/strong>&nbsp;<strong>WHEREAS, Section 53. Negotiated Procurement<\\/strong> &ndash; a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp; Small Value Procurement - where the amount is One Hundred Thousand Pesos (P100,000.00) and below; Provided, however, that the procurement does not result in splitting of contracts, further that the procurement does not fall under Shopping; (item no.4)<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;WHEREAS<\\/strong>,&nbsp;<span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span>&nbsp;has a request for item(s) particularly described&nbsp;&nbsp;as per&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span>&nbsp;dated&nbsp;<span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span>&nbsp;&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; WHEREAS<\\/strong>, the General Services Officer, acting as Head, Secretariat for Bids and Awards Committee (BAC), has&nbsp;certified that the above items(s) is\\/are not available in the procurement service;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;WHEREAS<\\/strong>, per enclosed abstract of Canvass&nbsp;&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;with office at&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_addr]<\\/span>&nbsp;meets the case in letter&nbsp; (a) above<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;WHEREAS<\\/strong>, the Approved Budget for this Contract (ABC) amounts to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; NOW THEREFORE,<\\/strong>&nbsp;with the unanimous accord of the members of the&nbsp;<strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong>&nbsp;shopping with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp;amounting to&nbsp;<span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span>.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\"', 'SN (SV)', NULL, '2018-02-05 01:35:09', '2018-02-06 09:07:11'),
(3, 'NEGOTIATED REPAIR3(NEW)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WHEREAS<\\/strong>, the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184<\\/strong>, otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;&nbsp; 53.9.2-<em> \\\"The Thresholds prescribed in Annex \\\"H\\\" of this IRR shall be subject to the periodic review by the GPPB. For this purpose, the GPPB shall be authorized to increase or decrease the said amount in order to reflect the changes in economic conditions &amp; for other justifiable reasons.\\\"<\\/em><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/em> <strong>WHEREAS<\\/strong>, the<span style=\\\"text-decoration: underline;\\\"> [dept_name] <\\/span>has requested for items particularly described per [pr_no] &nbsp;&nbsp; dated [prno_date] and directly negotiate with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp; &nbsp; [bac_categ]<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to&nbsp;<span style=\\\"text-decoration: underline;\\\"> [pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to [pr_total_amount].<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this <span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>. <\\/span><\\/p>\"', 'NR', NULL, '2018-02-05 21:25:43', '2018-02-06 06:39:52'),
(4, 'NEGOTIATED-(EmergencyCases)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted <strong>all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;<strong> Emergency case 53.2<\\/strong> - In case of imminent danger to life or property during a state of calamity, or when time is of the essence arising from natural or man-made calamities or other causes where immediate action is necessary to prevent damage to or loss of life or property, or to restore vital public services, infrastructure facilities &amp; other public utilities. In case of infrastructure projects, the procuring entity has the option to undertake the project through negotiated procurement or by administration or, in high securit risk areas, through the AFP. <strong>(Sangguniang Panlungsod: Resoslution No; 98 -Series of 2013)<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong><em>&nbsp;&nbsp;&nbsp;&nbsp;<\\/em><\\/strong>&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated [prno_date] and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp; [bac_categ]<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>WHEREAS<\\/strong>,&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement<\\/strong>:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE<\\/strong>, with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; <\\/strong><strong>&nbsp;APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;[current_date]<span style=\\\"text-decoration: underline;\\\">.<\\/span><\\/span><\\/p>\"', 'N(EC)', NULL, '2018-02-05 21:49:55', '2018-02-06 06:47:54'),
(5, 'NEGOTIATED-PAKYAW', '\"<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted <strong>all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;<strong> Section 53.9 - Small Value Procurement - 53.9.1 -<\\/strong> The Procuring entity shall draw up a list of at least three (3) suppliers, contractors, or consultant of known qualifications which will be invited to submit proposals, un the case of goods &amp; <strong>infrastructure projects,<\\/strong> or curriculum vitae, in the case of consulting services.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><em>&nbsp; &nbsp; &nbsp; &nbsp; <\\/em><strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp;&nbsp;[bac_categ]<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the Approved Budget for this Contract(ABC) amounts to [pr_total_amount]<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>,&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement<\\/strong>:<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE<\\/strong>, with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'NP', NULL, '2018-02-05 21:55:38', '2018-02-06 06:45:22'),
(6, 'NEGOTIATED-AgencytoAgency', '\"<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp; <strong>Agency-to-Agency-<\\/strong> Procurement of infrastructure projects, consulting services, and goods from another agency of the GOP, such as the PS-DBM, which is tasked with a centralized procurement of Common-Use Supplies for the GOP in accordance with Letters of Instruction No. 755 and Executive Order No. 359, series of 1989.<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp; Appendix 6 of Implementing Guidelines of Agency-To-Agency Agreements-<\\/strong> <em>The end-user unit shall undertake a Cost-benfit analysis, taking into consideration the following factors: prevailing standard cost for the project in the market, absorptive capacity of the Servicing Agency, and such other factors. Based on the assessment and recommendation of the end-user unit, the BAC shall issue a resolution recommending the use of Agency-to-Agency Agreement to the head of the Procuring Agency. Upon approval of the BAC resolution, the Procuring Agency shall enter into a Memorandum of Agreement (MOA) with the Servicing Agency. Pursuant to Section 5 (c), the MOA shall reflect the Agreement of the parties with regard to the posting of a performance bond and\\/or a warranty security.<\\/em><\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> <\\/em>with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru <strong>Negotiated Procurement<\\/strong> with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span> from the month of&nbsp;<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span><\\/span><\\/p>\\r\\n<p>&nbsp;<\\/p>\\r\\n<p><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;[current_date].<\\/span><\\/p>\"', 'N-AtA', NULL, '2018-02-05 21:58:14', '2018-02-06 07:25:08'),
(7, 'NEGOTIATED-RepeatOrder', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted <strong>all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 51. Repeat Order &ndash;<\\/strong> When provided for in th e Annual Procurement Plan, Repeat Order may be allowed wherein the Procuring Entity directly procures Goods from the previous winning bidder whenever there arises a need to replenish goods procured under a contact previous awarded through Competitive Bidding, subject to post-qualification process prescribed in the bidding Documents and provided all the following conditions are present:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a.&nbsp; The unit price nust be equal to or lower than that provided in the original contract;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b.&nbsp;&nbsp; The repeat order does not result in splitting of requisitions or purchase oders;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c.&nbsp;&nbsp; Escept in special circumtances defined in the IRR, the repeat order shall be availed of only within six (6) months from the date of the Notice to Proceed arising from the original&nbsp;&nbsp;&nbsp; contract; and<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d.&nbsp;&nbsp; The repeat order shall not exceed twenty-five percent (25%) of the quantity of each item of the original contract;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BID Amount&nbsp; Php 4,079,964.00<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 25%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Php 1,543,420.00<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru <strong>Repeat Order<\\/strong> with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span> amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span>.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\"', 'N-RO', NULL, '2018-02-05 22:01:07', '2018-02-06 07:25:27'),
(8, 'NEGOTIATED-Supplemental', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp;<strong> Section 53.4.-Adjacent or Contiguous-<\\/strong><em>Where the subject contract is adjacent or contiguous to an on-going Infrastructure Project or Consulting Service where the consultants have unique experience and expertise to deliver the required servrce: Provide however, that(a) the original contract is the result of a Competitive Bidding;(b) the subject contract to be negotiated has similar or ralated scopes of work;(c) it is within the contracting capacity of the contractor\\/consultant;(d) the contractor\\/consultant uses the same prices or lower unit prices as in the original contract less mobilization cost;(e) the amount involved does not excedd the amount of the ongoing project; and (f) the contractor\\/consultant has no slippage\\/delay: Provided, further, That negotiations for the procurement are commenced before the expiry of the original contract.<\\/em><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;<\\/em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; <span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; APPROVED<\\/strong><strong> UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date].<\\/span><\\/span><\\/p>\"', 'N-S', NULL, '2018-02-05 22:05:14', '2018-02-06 06:57:51'),
(9, 'NEGOTIATED-SmallValueConsulting', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:&nbsp; <strong>Section 53.9 - Small Value Procurement -<\\/strong> Where the procurement does not fall under shopping in Sec 52 of this IRR and the amount involved does not exceed the thresholds prescribed in Annex \\\"H\\\" of this IRR: 53.9.1-The procuring entity shall draw up a list at least three (3) suppliers, contractors, or consultants of known qualifications which will be invited to submit proposals, in the case of goods &amp; infrastructure projects, or <strong>curriculum vitae,<\\/strong> in the case of consulting services.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;<\\/em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with <span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; APPROVED<\\/strong><strong>&nbsp;UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'N-SVC', NULL, '2018-02-05 22:07:16', '2018-02-06 07:00:20'),
(10, 'NEGOTIATED-SmallValue(New)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp; WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted <strong>all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable <strong>supplier only:&nbsp; Section 53.9 - Small Value Procurement -<\\/strong> where the amount is Five Hundred Thousand Pesos (P500,000.00) and below; Provided, however, that the procurement does not result in splitting of contracts, further that the procurement does not fall under Shopping;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <\\/em><strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per<span style=\\\"text-decoration: underline;\\\"> [pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp; &nbsp; <span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;[current_date].<\\/span><\\/p>\"', 'N-SV(N)', NULL, '2018-02-05 22:11:43', '2018-02-06 07:04:41');
INSERT INTO `olongapo_bac_template2` (`id`, `template_desc`, `template`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 'NEGOTIATED RENTAL-3-15-2014 (N)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only: <strong>53.9.2-<\\/strong> <em>\\\"The Thresholds prescribed in Annex \\\"H\\\" of this IRR shall be subject to the periodic review by the GPPB. For this purpose, the GPPB shall be authorized to increase or decrease the said amount in order to reflect the changes in economic conditions &amp; for other justifiable reasons.\\\"<\\/em><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <\\/em><strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with<span style=\\\"text-decoration: underline;\\\"> [company_name]&nbsp;<\\/span> &nbsp; <span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <\\/strong>Incidental expenses on Trucking or Rental of Van, Car, Jeep and Equipment, Bus or Hotel Accomodation conducted in the exigency of services<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru <strong>Negotiated Procurement<\\/strong> with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'NR-(N)', NULL, '2018-02-05 22:16:37', '2018-02-06 07:06:43'),
(12, 'NEGOTIATED MEALS (NEW)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the City of Olongapo, through the issuance of Order No. 31, Series of&nbsp; 2004, has adopted<strong> all applicable provisions of the Implementing Rules and Regulations &ndash; A (IRR &ndash; A) of Republic Act (RA) No. 9184,<\\/strong> otherwise known as the <strong>Government Procurement Act;<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, ARTICLE XVI Section 48. Alternative Methods -<\\/strong> Subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in the RA No. 9184, the Procuring Entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in this Rule;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS, Section 53. Negotiated Procurement &ndash;<\\/strong> a method of procurement of goods whereby the procuring entity directly negotiates a contract with a technically, legally and financially capable supplier only:<strong> 53.9.2-<\\/strong> <em>\\\"The Thresholds prescribed in Annex \\\"H\\\" of this IRR shall be subject to the periodic review by the GPPB. For this purpose, the GPPB shall be authorized to increase or decrease the said amount in order to reflect the changes in economic conditions &amp; for other justifiable reasons.\\\"<\\/em><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <\\/em><strong>WHEREAS<\\/strong>, the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with<span style=\\\"text-decoration: underline;\\\"> [<\\/span>company_name]&nbsp; &nbsp;<span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong>&nbsp;&nbsp; the procurement&nbsp; of&nbsp; the&nbsp; said&nbsp;&nbsp; item&nbsp;&nbsp; is&nbsp;&nbsp; necessary&nbsp;&nbsp; to&nbsp;&nbsp; maintain&nbsp;&nbsp; the&nbsp;&nbsp;&nbsp; operational effectiveness&nbsp; of&nbsp;&nbsp; the&nbsp;&nbsp; concerned&nbsp;&nbsp; office\\/department&nbsp;&nbsp; which&nbsp;&nbsp; necessitates&nbsp;&nbsp; entering into&nbsp;&nbsp;&nbsp; <strong>Negotiated&nbsp; Procurement:<\\/strong><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Incidental expenses on merienda \\/ snacks or meals in the middle of conference \\/ dialogue \\/ meeting \\/,etc. conducted in the exigency of services<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'NM(N)', NULL, '2018-02-05 22:19:03', '2018-02-06 07:10:50'),
(13, 'SHOPPING (50K)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> WHEREAS,<\\/strong> pursuant to Section 10, Rule IV of the Amended IRR-A, all procurement shall be done through competitive bidding<em> (meaning, the procuring entities shall adopt public bidding as the general mode of procurement)<\\/em>, except that subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in this Act, the procuring entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in Sections 48-53 of this IRR-A.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> one of the alternative methods of procurement is through <strong>SHOPPING<\\/strong> provided Section 52 of the IRR-A which shall be resorted to in any of the following conditions:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; i.&nbsp; When there is an unforeseen contingency requiring immediate purchase:&nbsp;&nbsp;&nbsp; Under Section 52.1 (a) of the IRR; or<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. RFQ\'s w\\/ ABC\'s equal to Fifty Thousand Pesos (Php 50,000.00) and below<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;<\\/em>&nbsp;&nbsp;<strong>&nbsp;&nbsp; WHEREAS,<\\/strong> the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; <span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the General Services Officer, acting as Head, Secretariat for Bids and Awards Committee (BAC), has certified that the above items(s) is\\/are not available in the procurement service;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp; WHEREAS,<\\/strong> per enclosed abstract of Canvasswith office at<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span> meets the case in letter<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span> &nbsp;&nbsp; <\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'S(50K)', NULL, '2018-02-05 22:27:10', '2018-02-06 07:20:31'),
(14, 'SHOPPING (NEW)', '\"<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> pursuant to Section 10, Rule IV of the Amended IRR-A, all procurement shall be done through competitive bidding <em>(meaning, the procuring entities shall adopt public bidding as the general mode of procurement)<\\/em>, except that subject to the prior approval of the head of the procuring entity or his duly authorized representative, and whenever justified by the conditions provided in this Act, the procuring entity may, in order to promote economy and efficiency, resort to any of the alternative methods of procurement provided in Sections 48-53 of this IRR-A.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS<\\/strong>, one of the alternative methods of procurement is through <strong>SHOPPING<\\/strong> provided <strong>Section 52.1.<\\/strong> of the IRR-A which shall be resorted to in any of the following conditions:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>a.<\\/strong> When there is an unforeseen contingency requiring immediate purchase:&nbsp;&nbsp;&nbsp; Provided, however, That the amount shall not exceed Two Hundred Thousand Pesos (P200,000); or<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> b.<\\/strong> Procurement of ordinary or regular office supplies and equipment not available in the Procurement Service involving an amount not exceeding One Million Pesos (P1000,000): Provided, however, That the Procurement does not result in Splitting of Contracts: Provided, <strong>52.2.<\\/strong> The phase\\\"ordinary or regular office supplies\\\" shall be understood to include those supplies, commodities or materials which, depending on the procuring entity\'s mandate and nature of operations further, <strong>52.3.<\\/strong> Under Section 52.1 (b) of this IRR, at least three (3) price quotations from bona fide suppliers shall be obtained.<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp; <\\/strong><\\/em><strong>WHEREAS,<\\/strong> the <span style=\\\"text-decoration: underline;\\\">[dept_name]<\\/span> has requested for items particularly described per <span style=\\\"text-decoration: underline;\\\">[pr_no]<\\/span> &nbsp;&nbsp; dated <span style=\\\"text-decoration: underline;\\\">[prno_date]<\\/span> and directly negotiate with&nbsp;<span style=\\\"text-decoration: underline;\\\">[company_name]<\\/span>&nbsp; &nbsp; <span style=\\\"text-decoration: underline;\\\">[bac_categ]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp; WHEREAS,<\\/strong> the Head Secretariat for Bids and Awards Committee (BAC), has certified that the above items(s) &nbsp;is\\/are not available in the procurement service;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp; WHEREAS,<\\/strong> per enclosed abstract of Canvass&nbsp;<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<\\/span> with office at&nbsp;<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span> meets the case in letter&nbsp;<span style=\\\"text-decoration: underline;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<\\/span> &nbsp;&nbsp; <\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>WHEREAS,<\\/strong> the Approved Budget for this Contract(ABC) amounts to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount]<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;<\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> NOW THEREFORE,<\\/strong> with the unanimous accord of the members of the <strong>BIDS AND AWARDS COMMITTEE (BAC)<\\/strong> be it solved as it is hereby resolved to recommend the procurement and award of the&nbsp; abovementioned goods thru Negotiated Procurement with 00\\/01\\/1900 amounting to <span style=\\\"text-decoration: underline;\\\">[pr_total_amount].<\\/span><\\/span><\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">&nbsp;<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\"><span style=\\\"font-size: 13px;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>APPROVED UNANIMOUSLY<\\/strong>&nbsp;on this&nbsp;<span style=\\\"text-decoration: underline;\\\">[current_date]<\\/span>.<\\/span><\\/p>\"', 'S(N)', NULL, '2018-02-05 22:28:55', '2018-02-06 07:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_bac_type`
--

CREATE TABLE `olongapo_bac_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_bac_type`
--

INSERT INTO `olongapo_bac_type` (`id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SHOPPING', NULL, NULL, NULL),
(2, 'NEGOTIATED', NULL, NULL, NULL),
(3, 'PUBLIC BIDDING', NULL, NULL, NULL),
(4, 'DIRECT CONTRACT', NULL, NULL, NULL),
(5, 'REPEAT ORDER', NULL, NULL, NULL),
(6, 'EMERGENCY CASES', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_department`
--

CREATE TABLE `olongapo_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_code` int(11) NOT NULL,
  `dept_desc` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_department`
--

INSERT INTO `olongapo_department` (`id`, `dept_code`, `dept_desc`, `year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'City Accounting Department', '2018', NULL, '2018-01-22 23:21:43', '2018-01-22 23:21:43'),
(2, 2, 'City Administrator\'s Office', '2018', NULL, '2018-01-22 23:21:43', '2018-01-22 23:21:43'),
(3, 3, 'City Assessor\'s Office', '2018', NULL, '2018-01-22 23:21:43', '2018-01-22 23:21:43'),
(4, 4, 'City Budget Office', '2018', NULL, '2018-01-22 23:21:43', '2018-01-22 23:21:43'),
(5, 5, 'City Civil Registry Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(6, 6, 'City Council\'s Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(7, 7, 'City Engineering Department', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(8, 8, 'City Agriculture Department', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(9, 9, 'City Health Department', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(10, 10, 'City Legal Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(11, 11, 'City Mayor\'s Office - Admin', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(12, 12, 'City Planning and Development Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(13, 13, 'City Population Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(14, 14, 'City Treasurer\'s Office ', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(15, 15, 'Olongapo City Public Market EBB', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(16, 16, 'James L. Gordon Avenue Market and Mall', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(17, 17, 'City Veterinary Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(18, 18, 'City Social Welfare and Development Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(19, 19, 'Environmental Sanitation Management Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(20, 20, 'General Services Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(21, 21, 'Gordon College', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(22, 22, 'James L. Gordon Memorial Hospital', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(23, 23, 'N-PNP - Olongapo City Police Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(24, 24, 'N-BFP Bureau of Fire Protection', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(25, 25, 'N-COA Commission on Audit', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(26, 26, 'N-COMELEC Commission On Election', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(27, 27, 'N-DILG Department of Interior and Local Government', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(28, 28, 'N-CPO City Prosecutor\'s Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(29, 29, 'N-MTCC Municipal Trial Court in the City Branch 1 to 5', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(30, 30, 'N-RTC Regional Trial Court 72 , 73', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(31, 31, 'N-DEPED Department Of Education', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_employee`
--

CREATE TABLE `olongapo_employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_employee_list`
--

CREATE TABLE `olongapo_employee_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(11) NOT NULL COMMENT 'refer to olongapo_subdepartment',
  `position_id` int(11) NOT NULL COMMENT 'refer to olongapo_position',
  `fname` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ename` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('f','m') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bdate` date DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_employee_list`
--

INSERT INTO `olongapo_employee_list` (`id`, `dept_id`, `position_id`, `fname`, `lname`, `mname`, `ename`, `sex`, `bdate`, `mobile`, `email`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 43, 0, 'Enrico', 'Pacocha', 'Breanne', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 30, 0, 'Cristal', 'Sporer', 'Antonette', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 41, 0, 'Travon', 'Brekke', 'Teagan', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 52, 0, 'Leopoldo', 'Marvin', 'Gia', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 42, 0, 'Oscar', 'Dooley', 'Kristina', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 29, 0, 'Sim', 'Huel', 'Marilou', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 27, 0, 'Arlie', 'Schmeler', 'Tiana', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 36, 0, 'Murray', 'Legros', 'Shemar', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 13, 0, 'Electa', 'Hegmann', 'Liliane', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 17, 0, 'Rod', 'Lindgren', 'Elta', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 4, 0, 'Joannie', 'Bailey', 'Abbey', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 41, 0, 'Ryann', 'Cormier', 'Sunny', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 36, 0, 'Deshaun', 'Powlowski', 'Lavinia', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 25, 0, 'Beatrice', 'Moen', 'Asa', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 25, 0, 'Kacey', 'Koepp', 'Earlene', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 27, 0, 'Ida', 'Schulist', 'Rubye', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, 0, 'Colt', 'Legros', 'Shaina', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 40, 0, 'Paula', 'Jaskolski', 'Thalia', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 2, 0, 'Darrion', 'Haag', 'Sabryna', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 60, 0, 'Terrence', 'Mohr', 'Elda', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 7, 0, 'Forrest', 'Leuschke', 'Bridgette', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 3, 0, 'Theresia', 'Willms', 'Celine', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 51, 0, 'Marlee', 'Jast', 'Abbey', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 38, 0, 'Rory', 'Parisian', 'Annabelle', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 35, 0, 'Johnathan', 'Stanton', 'Emely', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 61, 0, 'Paolo', 'Vandervort', 'Nia', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 32, 0, 'Emma', 'Collier', 'Lura', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 4, 0, 'Frederick', 'Fadel', 'Elizabeth', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 48, 0, 'Kacie', 'Rosenbaum', 'Vicenta', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 31, 0, 'Shakira', 'Gorczany', 'Elenor', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 51, 0, 'Gaston', 'Gibson', 'Savannah', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 40, 0, 'Marcelo', 'Champlin', 'Brandy', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 21, 0, 'Magdalena', 'Kunde', 'Tyra', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 4, 0, 'Ramiro', 'Schiller', 'Marquise', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 60, 0, 'Baron', 'Herman', 'Deja', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 60, 0, 'Fermin', 'Prohaska', 'Elva', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 39, 0, 'Willard', 'Legros', 'Margarett', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 10, 0, 'Sylvia', 'Donnelly', 'Kamille', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 23, 0, 'Halle', 'Bayer', 'Betsy', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 55, 0, 'Orion', 'Price', 'Kaitlin', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 34, 0, 'Mara', 'Kuphal', 'Clotilde', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 32, 0, 'Claude', 'Hayes', 'Fae', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 24, 0, 'Mariana', 'Bogan', 'Victoria', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 32, 0, 'Dell', 'Kiehn', 'Luisa', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 59, 0, 'Kelly', 'Maggio', 'Jaclyn', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 16, 0, 'Sheila', 'Lueilwitz', 'Marilie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 49, 0, 'Emmitt', 'Mills', 'Noemy', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 14, 0, 'Garnet', 'Jaskolski', 'Santina', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 52, 0, 'Ferne', 'Kautzer', 'Mercedes', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 21, 0, 'Aron', 'McClure', 'Amya', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 52, 0, 'Angelica', 'Ritchie', 'Mara', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 10, 0, 'Ryder', 'Reinger', 'Naomi', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 30, 0, 'Adolf', 'Lebsack', 'Neoma', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 29, 0, 'Efren', 'Kozey', 'Henriette', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 27, 0, 'Linda', 'Gaylord', 'Arlene', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 41, 0, 'Kristian', 'Corwin', 'Sandra', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 39, 0, 'Jovan', 'Crooks', 'Samantha', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 4, 0, 'Aniyah', 'Veum', 'Maymie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 24, 0, 'Quinn', 'Lueilwitz', 'Audie', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 57, 0, 'Cheyenne', 'Jerde', 'Daisha', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 15, 0, 'Aubrey', 'Kutch', 'Vada', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 42, 0, 'Scarlett', 'Strosin', 'Rhoda', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(63, 38, 0, 'Abel', 'Anderson', 'Meaghan', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(64, 28, 0, 'Coleman', 'Ruecker', 'Cydney', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 44, 0, 'Alexane', 'Kirlin', 'Dianna', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(66, 22, 0, 'Tyler', 'Leuschke', 'Katharina', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 51, 0, 'Brody', 'Dietrich', 'Crystel', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(68, 40, 0, 'Kamron', 'Kreiger', 'Kallie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(69, 13, 0, 'Deshaun', 'Hansen', 'Alessia', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(70, 59, 0, 'Lisette', 'Leffler', 'Shanny', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(71, 43, 0, 'Deshaun', 'Waters', 'Alisha', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(72, 46, 0, 'Valerie', 'Sawayn', 'Jessyca', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(73, 16, 0, 'Antonette', 'Stiedemann', 'Hailee', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(74, 17, 0, 'Darrell', 'Bins', 'Mandy', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(75, 17, 0, 'Michel', 'Hackett', 'Marielle', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(76, 22, 0, 'Chauncey', 'Ritchie', 'Pascale', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(77, 9, 0, 'Candace', 'Nicolas', 'Hildegard', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(78, 50, 0, 'Makenna', 'Tremblay', 'Beverly', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(79, 51, 0, 'Carleton', 'Thiel', 'Arianna', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(80, 62, 0, 'Woodrow', 'Wilkinson', 'Kaitlyn', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(81, 57, 0, 'Vidal', 'Beahan', 'Noemi', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(82, 31, 0, 'Bella', 'Yost', 'Izabella', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(83, 46, 0, 'Sigrid', 'Kuhlman', 'Kara', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(84, 17, 0, 'Roselyn', 'Brekke', 'Daniella', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(85, 11, 0, 'Casey', 'Hoppe', 'Georgette', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(86, 40, 0, 'Weston', 'Kris', 'Genesis', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(87, 28, 0, 'Johnpaul', 'Franecki', 'Florence', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(88, 6, 0, 'Eloy', 'Jakubowski', 'Thora', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(89, 25, 0, 'Rhoda', 'Block', 'Yasmine', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(90, 21, 0, 'Jaleel', 'Schroeder', 'Alba', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(91, 15, 0, 'Raymond', 'Herzog', 'Nella', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(92, 4, 0, 'Constantin', 'Heaney', 'Kira', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(93, 50, 0, 'Cathryn', 'Boyer', 'Loraine', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(94, 31, 0, 'Bonnie', 'Wuckert', 'Kiarra', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(95, 62, 0, 'Andreanne', 'Jenkins', 'Electa', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(96, 3, 0, 'Rasheed', 'Koch', 'Marilyne', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(97, 4, 0, 'Zachary', 'Anderson', 'Izabella', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(98, 31, 0, 'Oran', 'Satterfield', 'Samara', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(99, 10, 0, 'Eldred', 'McDermott', 'Katelin', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(100, 43, 0, 'Cicero', 'Kuhlman', 'Eleanora', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(101, 44, 0, 'Lysanne', 'McCullough', 'Colleen', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(102, 44, 0, 'Guadalupe', 'Gottlieb', 'Brielle', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(103, 46, 0, 'Roscoe', 'Paucek', 'Glenda', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(104, 43, 0, 'Marty', 'Moen', 'Cheyenne', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(105, 23, 0, 'Pearline', 'Dickens', 'Laisha', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(106, 32, 0, 'Jaylan', 'Bernier', 'Aida', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(107, 8, 0, 'Sallie', 'Halvorson', 'Dora', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(108, 59, 0, 'Selena', 'Douglas', 'Vivianne', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(109, 27, 0, 'Ebba', 'Langosh', 'Lila', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(110, 41, 0, 'Vincent', 'Wuckert', 'Lottie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(111, 57, 0, 'Berniece', 'Medhurst', 'Esmeralda', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(112, 43, 0, 'Jeff', 'Bins', 'Eve', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(113, 10, 0, 'Erik', 'Gorczany', 'Princess', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(114, 7, 0, 'Theresia', 'Kihn', 'Violette', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(115, 12, 0, 'Gardner', 'Hyatt', 'Helena', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(116, 4, 0, 'Cecil', 'Batz', 'Tania', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(117, 36, 0, 'Velma', 'Crist', 'Isobel', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(118, 32, 0, 'Norval', 'Spencer', 'Tamara', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(119, 42, 0, 'Eliezer', 'Kling', 'Jacky', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(120, 32, 0, 'Terrill', 'Ziemann', 'Madelyn', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(121, 7, 0, 'Elwyn', 'Halvorson', 'Lexi', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(122, 19, 0, 'Eddie', 'Morissette', 'Palma', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(123, 14, 0, 'Viviane', 'Halvorson', 'Alessandra', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(124, 5, 0, 'Cordia', 'Bradtke', 'Cristal', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(125, 43, 0, 'Twila', 'Gibson', 'Ruthie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(126, 46, 0, 'Lue', 'Leuschke', 'Dandre', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(127, 62, 0, 'Stephanie', 'Keebler', 'Katelyn', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(128, 42, 0, 'Devon', 'Marks', 'Jolie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(129, 40, 0, 'Nora', 'Schaefer', 'Dandre', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(130, 18, 0, 'Antwon', 'Heaney', 'Kaci', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(131, 6, 0, 'Alison', 'Koepp', 'Helene', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(132, 37, 0, 'Wendell', 'Padberg', 'Neha', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(133, 1, 0, 'Cleta', 'Koch', 'Meghan', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(134, 39, 0, 'Alize', 'Heathcote', 'Gail', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(135, 59, 0, 'Claude', 'Jaskolski', 'Iliana', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(136, 30, 0, 'Ike', 'Champlin', 'Pinkie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(137, 36, 0, 'Gerhard', 'Beer', 'Shirley', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(138, 45, 0, 'Keshaun', 'Block', 'Cleora', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(139, 40, 0, 'Mariela', 'Weber', 'Veronica', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(140, 17, 0, 'Myrna', 'Aufderhar', 'Claudia', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(141, 1, 0, 'Sherman', 'Bergnaum', 'Anika', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(142, 17, 0, 'Lucie', 'Kunze', 'Ruthie', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(143, 22, 0, 'Jeromy', 'Jenkins', 'Lilly', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(144, 11, 0, 'Reva', 'Bailey', 'Maxie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(145, 15, 0, 'Graham', 'Farrell', 'Santina', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(146, 23, 0, 'Antoinette', 'Crooks', 'Imelda', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(147, 29, 0, 'Rodrigo', 'Nolan', 'Burnice', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(148, 8, 0, 'Pierre', 'Glover', 'Lempi', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(149, 1, 0, 'Jaclyn', 'Dietrich', 'Iva', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(150, 48, 0, 'Lavada', 'Schmeler', 'Ida', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(151, 44, 0, 'Jeramie', 'Hand', 'Adelle', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(152, 51, 0, 'Orin', 'Sanford', 'Anita', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(153, 16, 0, 'Franco', 'Oberbrunner', 'Aleen', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(154, 29, 0, 'Iva', 'Bashirian', 'Karelle', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(155, 47, 0, 'Danyka', 'Okuneva', 'Molly', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(156, 57, 0, 'Ralph', 'Hudson', 'Opal', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(157, 20, 0, 'Parker', 'Kuhlman', 'Reta', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(158, 14, 0, 'Anahi', 'Grant', 'Valentine', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(159, 37, 0, 'Guillermo', 'Kessler', 'Margot', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(160, 1, 0, 'Marielle', 'Kovacek', 'Georgianna', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(161, 62, 0, 'Glen', 'Konopelski', 'Meagan', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(162, 53, 0, 'Talia', 'Herzog', 'Helen', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(163, 60, 0, 'Tobin', 'Heaney', 'Lois', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(164, 27, 0, 'Trever', 'Greenfelder', 'Liana', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(165, 58, 0, 'Lenny', 'Hane', 'Mellie', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(166, 62, 0, 'Martina', 'Roberts', 'Dasia', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(167, 28, 0, 'Mylene', 'Hessel', 'Bryana', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(168, 42, 0, 'Mara', 'Hand', 'Graciela', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(169, 58, 0, 'Brannon', 'Conn', 'Ayla', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(170, 54, 0, 'Laisha', 'Buckridge', 'Valentine', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(171, 55, 0, 'Marcus', 'Kilback', 'Mayra', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(172, 50, 0, 'Quinten', 'West', 'Juliana', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(173, 26, 0, 'Hattie', 'Satterfield', 'Leila', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(174, 19, 0, 'Jaqueline', 'Jacobs', 'Lizzie', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(175, 25, 0, 'Brennon', 'Mitchell', 'Ashleigh', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(176, 33, 0, 'Lonny', 'Okuneva', 'Abbey', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(177, 42, 0, 'Javonte', 'Bernhard', 'Emelie', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(178, 3, 0, 'Alda', 'Rath', 'Abagail', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(179, 10, 0, 'Priscilla', 'Prosacco', 'Sienna', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(180, 25, 0, 'Henry', 'Kris', 'Meggie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(181, 53, 0, 'Henriette', 'Nienow', 'Shana', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(182, 7, 0, 'Ardella', 'Berge', 'Dorothy', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(183, 59, 0, 'Dax', 'Emard', 'Eda', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(184, 57, 0, 'Russell', 'Eichmann', 'Madilyn', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(185, 54, 0, 'Ivory', 'Kovacek', 'Dessie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(186, 40, 0, 'Terrill', 'Hagenes', 'Juliana', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(187, 20, 0, 'Jamel', 'Gaylord', 'Kira', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(188, 27, 0, 'King', 'Douglas', 'Zora', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(189, 59, 0, 'Sunny', 'Gaylord', 'Hortense', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(190, 23, 0, 'Kayleigh', 'Homenick', 'Lois', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(191, 58, 0, 'Josiane', 'Hamill', 'Simone', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(192, 50, 0, 'Jace', 'Konopelski', 'Bert', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(193, 49, 0, 'Granville', 'Kuhlman', 'Ethelyn', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(194, 30, 0, 'Dillan', 'Hartmann', 'Carolyne', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(195, 29, 0, 'Daisy', 'Davis', 'Roberta', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(196, 9, 0, 'Kaya', 'Franecki', 'Jennyfer', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(197, 61, 0, 'Genevieve', 'Steuber', 'Kimberly', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(198, 30, 0, 'Giles', 'Leuschke', 'Kaylin', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(199, 59, 0, 'Olga', 'Altenwerth', 'Telly', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(200, 20, 0, 'Nathanael', 'Aufderhar', 'Tomasa', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(201, 60, 0, 'Anita', 'Klein', 'Princess', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(202, 5, 0, 'Eveline', 'Thompson', 'Otilia', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(203, 23, 0, 'Cruz', 'Kris', 'Iliana', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(204, 61, 0, 'Ray', 'Ritchie', 'Belle', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(205, 41, 0, 'Federico', 'Littel', 'Aisha', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(206, 1, 0, 'Boris', 'Stoltenberg', 'Ida', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(207, 34, 0, 'Fletcher', 'Fahey', 'Marlene', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(208, 30, 0, 'Elisabeth', 'Anderson', 'Polly', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(209, 8, 0, 'Concepcion', 'Halvorson', 'Kaylah', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(210, 55, 0, 'Herbert', 'Kilback', 'Opal', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(211, 32, 0, 'Maud', 'Dare', 'Yadira', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(212, 19, 0, 'Lavern', 'Lang', 'Rubye', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(213, 34, 0, 'London', 'Muller', 'Creola', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(214, 23, 0, 'Ryann', 'Stokes', 'Candice', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(215, 17, 0, 'Nyah', 'Lemke', 'Shyanne', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(216, 20, 0, 'Jada', 'Kessler', 'Queenie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(217, 10, 0, 'Luigi', 'Gislason', 'Noelia', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(218, 24, 0, 'Jamel', 'Kuphal', 'Onie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(219, 29, 0, 'Lucy', 'Zboncak', 'Krystel', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(220, 8, 0, 'Magdalena', 'Kirlin', 'Jackeline', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(221, 55, 0, 'Casimer', 'Legros', 'Shaina', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(222, 35, 0, 'Ivah', 'Dietrich', 'Evelyn', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(223, 12, 0, 'Delphia', 'Dibbert', 'Lola', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(224, 55, 0, 'Alysa', 'Russel', 'Destiny', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(225, 59, 0, 'Alf', 'Dickinson', 'Monique', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(226, 39, 0, 'Antonetta', 'Thompson', 'Lacy', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(227, 2, 0, 'Emmett', 'Wunsch', 'Mercedes', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(228, 4, 0, 'Mariano', 'Bahringer', 'Mya', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(229, 15, 0, 'Koby', 'Thiel', 'Neoma', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(230, 54, 0, 'Gerhard', 'Wolf', 'Catherine', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(231, 8, 0, 'Rhoda', 'Funk', 'Erica', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(232, 11, 0, 'Newell', 'Halvorson', 'Velva', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(233, 57, 0, 'Andrew', 'Kunde', 'Sonia', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(234, 61, 0, 'Evert', 'Kshlerin', 'Angelica', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(235, 47, 0, 'Robert', 'Altenwerth', 'Katharina', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(236, 8, 0, 'Ivah', 'Cole', 'Stefanie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(237, 59, 0, 'Gregorio', 'Mraz', 'Oma', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(238, 15, 0, 'Stefan', 'Glover', 'Ines', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(239, 20, 0, 'Geraldine', 'Brekke', 'Frederique', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(240, 41, 0, 'Bernice', 'Pacocha', 'Cindy', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(241, 34, 0, 'Kassandra', 'Stiedemann', 'Sharon', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(242, 19, 0, 'Hanna', 'Haag', 'Cheyenne', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(243, 55, 0, 'Christop', 'Schulist', 'Ashly', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(244, 14, 0, 'Lenny', 'Buckridge', 'Carolyn', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(245, 15, 0, 'Pasquale', 'Collier', 'Jaquelin', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(246, 42, 0, 'Gay', 'Bosco', 'Coralie', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(247, 39, 0, 'Marty', 'Walter', 'Madonna', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(248, 41, 0, 'Mireille', 'Monahan', 'Pansy', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(249, 8, 0, 'Torey', 'Goyette', 'Alba', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(250, 34, 0, 'Edna', 'DuBuque', 'Lysanne', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(251, 9, 0, 'Geovany', 'Breitenberg', 'Raina', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(252, 3, 0, 'Roma', 'Rowe', 'Allison', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(253, 53, 0, 'Marshall', 'Metz', 'Yazmin', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(254, 32, 0, 'Quincy', 'Mraz', 'Candice', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(255, 11, 0, 'Gino', 'Borer', 'Evangeline', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(256, 18, 0, 'Melba', 'Friesen', 'Rubie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(257, 48, 0, 'Nash', 'Mitchell', 'Betty', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(258, 62, 0, 'Georgianna', 'Harris', 'Sadye', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(259, 11, 0, 'Aniya', 'Howe', 'Nakia', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(260, 62, 0, 'Rey', 'Marquardt', 'Shyanne', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(261, 48, 0, 'Creola', 'Thompson', 'Felicity', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(262, 5, 0, 'Kamren', 'Sporer', 'Ava', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(263, 38, 0, 'Tyrese', 'Lang', 'Noemi', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(264, 29, 0, 'Kaleb', 'Stroman', 'Ivory', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(265, 53, 0, 'Nova', 'Heaney', 'Rebeka', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(266, 13, 0, 'Rebecca', 'Langosh', 'Vivianne', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(267, 56, 0, 'Trey', 'O\'Connell', 'Clarissa', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(268, 26, 0, 'Sylvia', 'McClure', 'Leola', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(269, 36, 0, 'Janick', 'Halvorson', 'Vivien', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(270, 57, 0, 'Moriah', 'Sawayn', 'Chelsie', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(271, 7, 0, 'Nicholaus', 'Kub', 'Eudora', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(272, 18, 0, 'Jessie', 'Nicolas', 'Pascale', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(273, 8, 0, 'Erwin', 'Hills', 'Bethel', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(274, 22, 0, 'Jovani', 'Lubowitz', 'Karianne', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(275, 37, 0, 'Wilfredo', 'Yundt', 'Margot', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(276, 43, 0, 'Eloisa', 'Abshire', 'Kristina', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(277, 55, 0, 'Jamaal', 'Mueller', 'Bianka', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(278, 48, 0, 'Shirley', 'Marvin', 'Meghan', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(279, 60, 0, 'Vicente', 'Runte', 'Retta', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(280, 33, 0, 'Theron', 'O\'Connell', 'Myriam', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(281, 13, 0, 'Cleora', 'Ledner', 'Lily', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(282, 24, 0, 'Kiera', 'Heidenreich', 'Helga', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(283, 53, 0, 'Dereck', 'Jones', 'Therese', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(284, 62, 0, 'Rita', 'Funk', 'Nedra', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(285, 48, 0, 'Nicole', 'Hills', 'Estell', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(286, 24, 0, 'Kailee', 'Hane', 'Karli', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(287, 50, 0, 'Jedediah', 'Gorczany', 'Kaitlin', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(288, 7, 0, 'Domenico', 'Johnson', 'Alessandra', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(289, 58, 0, 'Kurtis', 'Lebsack', 'Charity', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(290, 14, 0, 'Trinity', 'Bode', 'Karianne', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(291, 56, 0, 'Elliott', 'Schmeler', 'May', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(292, 16, 0, 'Bertram', 'Grady', 'Rubie', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(293, 21, 0, 'Norma', 'Zemlak', 'Lynn', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(294, 17, 0, 'Marguerite', 'Prosacco', 'Sandra', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(295, 15, 0, 'Jimmie', 'Mitchell', 'Marcelle', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(296, 26, 0, 'Isaias', 'Nitzsche', 'Elmira', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(297, 11, 0, 'Cleveland', 'Jacobs', 'Idella', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(298, 34, 0, 'Shad', 'Huels', 'Elinor', NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(299, 32, 0, 'Craig', 'Boyer', 'Amy', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(300, 21, 0, 'Iliana', 'Beatty', 'Shakira', NULL, 'f', NULL, NULL, NULL, NULL, NULL, NULL),
(301, 48, 1, 'John', 'Doe', 'D', NULL, 'm', '2003-01-01', '09121234511', 'johndoe@johndoe.com', NULL, '2018-01-22 23:26:02', '2019-04-02 17:04:28'),
(302, 20, 12, 'Jane', 'Doe', 'D', NULL, 'f', '1990-01-21', '091023456789', 'janedoe@gmail.com', NULL, '2019-01-24 08:26:33', '2019-01-24 08:26:33'),
(303, 1, 13, 'First', 'Last', 'Middle', NULL, 'm', '1969-04-01', '0909090909', 'mail@mail.com', NULL, '2019-04-01 22:51:12', '2019-04-01 22:51:12'),
(304, 32, 6, 'Mmm', 'mmmm', 'mmm', NULL, 'm', '2003-08-06', '09090909095', 'mial@mail.com', NULL, '2019-04-01 23:09:04', '2019-04-01 23:09:04'),
(305, 40, 14, 'Padas', 'Padas', 'Padas', NULL, 'f', '1969-04-01', '123456798', 'mail5@mail.com', NULL, '2019-08-19 16:37:29', '2019-08-19 16:37:29'),
(306, 18, 17, 'Danalex', 'Danalex', 'D.', NULL, 'm', '2004-12-01', '09091213311', 'danalex@gmail.com', NULL, '2020-01-21 00:26:14', '2020-01-21 00:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_gso_template`
--

CREATE TABLE `olongapo_gso_template` (
  `id` int(10) UNSIGNED NOT NULL,
  `template_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_gso_template`
--

INSERT INTO `olongapo_gso_template` (`id`, `template_desc`, `template`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'gso_temp', '\"<p style=\\\"text-align: justify;\\\">This certifies that [locatorname] with address at the [address], has been subjected to an <strong>ENVIRONMENT AND SANITATION INSPECTION<\\/strong> and has been found to be in compliance with existing applicable Philippine Environmental and Sanitation Laws and Regulations.<br \\/> <br \\/> The John Hay Management Corporation (JHMC) through the Environment and Asset Management Department (EAMD) issues this clearance for the issuance of a Permit-to-Operate (PTO) inside the John Hay Special Economic Zone (JHSEZ). Periodic I nspection of premises will be conducted by the EAMD. Non-compliance with any of the environmentaland sanitation laws will be sufficient ground for the revocation of the certificate.<br \\/> <br \\/> Issued this [day] of [month], [yearinwords] at Camp John Hay, Baguio City, Philippines.<\\/p><table style=\\\"width: 698px; height: 69px;\\\"><tbody><tr><td style=\\\"width: 352px; text-align: center;\\\">[signature_0]<\\/td><td style=\\\"width: 344px; text-align: center;\\\">[signature_1]<\\/td><\\/tr><tr><td style=\\\"width: 352px; text-align: center;\\\">[approval_0]<\\/td><td style=\\\"width: 344px; text-align: center;\\\">&nbsp;[approval_1]<\\/td><\\/tr><tr><td style=\\\"width: 352px; text-align: center;\\\">[position_0]<\\/td><td style=\\\"width: 344px; text-align: center;\\\">&nbsp;[position_1]<\\/td><\\/tr><\\/tbody><\\/table><p>&nbsp;<\\/p><table style=\\\"border-collapse: collapse; height: 107px; width: 720px; border: 1px solid black;\\\"><tbody><tr style=\\\"height: 109px; border-color: #000000;\\\"><td style=\\\"width: 238px; height: 109px; border: 1px solid #000000; text-align: center;\\\"><strong>THIS CEC SHOULD BE DISPLAYED CONSPICUOUS PLACE IN THE OFFICE<\\/strong><\\/td><td style=\\\"width: 184px; height: 109px; border: 1px solid #000000; text-align: center;\\\"><p><strong>Certificate No.:<\\/strong><\\/p><p>[certno]<\\/p><\\/td><td style=\\\"width: 147px; height: 109px; border: 1px solid black; text-align: center;\\\"><p><strong>Date Issued: <\\/strong><\\/p><p>[validfrom]<\\/p><\\/td><td style=\\\"width: 150px; height: 109px; border: 1px solid #000000;\\\"><p style=\\\"text-align: center;\\\"><strong>Valid Until:<\\/strong><\\/p><p style=\\\"text-align: center;\\\">[validuntil]<\\/p><\\/td><\\/tr><\\/tbody><\\/table><table style=\\\"width: 344px; height: 142px;\\\"><tbody><tr style=\\\"height: 23px;\\\"><td style=\\\"width: 116px; height: 23px;\\\">Amount<\\/td><td style=\\\"width: 26px; height: 23px;\\\">:<\\/td><td style=\\\"width: 200px; height: 20px; text-align: left;\\\">[amount]<\\/td><\\/tr><tr style=\\\"height: 15px;\\\"><td style=\\\"width: 116px; height: 15px;\\\">O.R. No.<\\/td><td style=\\\"width: 26px; height: 15px;\\\">:<\\/td><td style=\\\"width: 200px; height: 15px; text-align: left;\\\">[orno]<\\/td><\\/tr><tr style=\\\"height: 13px;\\\"><td style=\\\"width: 116px; height: 13px;\\\">Date<\\/td><td style=\\\"width: 26px; height: 13px;\\\">:<\\/td><td style=\\\"width: 200px; height: 13px; text-align: left;\\\">[datepaid]<\\/td><\\/tr><\\/tbody><\\/table><p><em>Note: The application for the renewal of this certificate shall be field one (1) to fifteen (15) days prior to its expiry date<\\/em><\\/p>\"', 'gso', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_holiday`
--

CREATE TABLE `olongapo_holiday` (
  `id` int(10) UNSIGNED NOT NULL,
  `holiday` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_obr`
--

CREATE TABLE `olongapo_obr` (
  `id` int(10) UNSIGNED NOT NULL,
  `obr_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obr_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_position`
--

CREATE TABLE `olongapo_position` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_position`
--

INSERT INTO `olongapo_position` (`id`, `title`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tester', NULL, '2018-01-22 23:26:02', '2018-01-22 23:26:02'),
(2, 'Mayor', NULL, '2018-02-05 17:22:52', '2018-02-05 17:22:52'),
(3, 'Secretary to the Mayor/End User', NULL, '2018-02-05 17:28:56', '2018-02-05 17:28:56'),
(4, 'BAC Member-OIC-City Engineer', NULL, '2018-02-05 17:29:09', '2018-02-05 17:29:09'),
(5, 'BAC Member-City Budget Office', NULL, '2018-02-05 17:29:26', '2018-02-05 17:29:26'),
(6, 'BAC Vice Chairman-City Administrator', NULL, '2018-02-05 17:29:41', '2018-02-05 17:29:41'),
(7, 'BAC Member-OIC GSO', NULL, '2018-02-05 17:29:55', '2018-02-05 17:29:55'),
(8, 'BAC Chairman-City Legal Office', NULL, '2018-02-05 17:30:06', '2018-02-05 17:30:06'),
(9, 'City Mayor', NULL, '2018-02-05 17:30:29', '2018-02-05 17:30:29'),
(10, 'Secretary to the Mayor', NULL, '2018-02-05 17:30:46', '2018-02-05 17:30:46'),
(11, 'Head BAC Secretariat', NULL, '2018-02-05 17:31:06', '2018-02-05 17:31:06'),
(12, 'Encoders', NULL, '2019-01-24 08:26:33', '2019-01-24 08:26:33'),
(13, 'Acting City Mayor', NULL, '2019-03-25 22:48:50', '2019-03-25 22:48:50'),
(14, 'POsitio', NULL, '2019-08-19 16:37:29', '2019-08-19 16:37:29'),
(15, 'CITY MAYOR', NULL, '2020-01-20 18:22:16', '2020-01-20 18:22:16'),
(16, 'asd', NULL, '2020-01-20 19:12:03', '2020-01-20 19:12:03'),
(17, 'Admin Aide II', NULL, '2020-01-21 00:26:14', '2020-01-21 00:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_ppe_mnthly_report`
--

CREATE TABLE `olongapo_ppe_mnthly_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pono_id` int(11) DEFAULT NULL,
  `date_log` date NOT NULL,
  `inv_control_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Supply or Equipement',
  `department` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_ppe_mnthly_report`
--

INSERT INTO `olongapo_ppe_mnthly_report` (`id`, `po_no`, `pono_id`, `date_log`, `inv_control_no`, `type`, `department`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '2019-03-26', 'S-1903-0001', 'Supplies', 1, NULL, '2019-03-25 22:24:52', '2019-03-25 22:24:52'),
(2, NULL, NULL, '2019-03-26', 'S-1903-0002', 'Supplies', 1, NULL, '2019-03-25 22:25:06', '2019-03-25 22:25:06'),
(3, NULL, NULL, '2019-03-26', 'S-1903-0003', 'Supplies', 2, NULL, '2019-03-25 22:29:07', '2019-03-25 22:29:07'),
(4, NULL, NULL, '2019-03-26', 'S-1903-0004', 'Supplies', 2, NULL, '2019-03-25 22:29:25', '2019-03-25 22:29:25'),
(5, NULL, NULL, '2019-04-02', 'S-1904-0001', 'Supplies', 49, NULL, '2019-04-01 19:17:22', '2019-04-01 19:17:22'),
(6, '2-19-03-29-001', 2, '2019-04-12', 'S-1904-0002', 'Supplies', 2, NULL, '2019-04-11 16:53:22', '2019-04-11 16:53:22'),
(7, '11.16-19-04-11-001', 14, '2019-07-24', 'S-1907-0001', 'Supplies', 48, NULL, '2019-07-23 17:22:25', '2019-07-23 17:22:25'),
(8, '19-20-0-0101-105', NULL, '2019-07-27', 'S-1907-0002', 'Supplies', 8, NULL, '2019-07-29 22:25:26', '2019-07-29 22:25:26'),
(9, '4-19-03-25-003', 22, '2019-12-06', 'S-1912-0001', 'Supplies', 4, NULL, '2019-12-06 00:16:29', '2019-12-06 00:16:29'),
(10, '4-19-03-25-003', 22, '2019-12-06', 'S-1912-0001', 'Supplies', 4, NULL, '2019-12-06 00:25:30', '2019-12-06 00:25:30'),
(11, '11.16-19-01-25-000', 18, '2019-12-06', 'S-1912-0003', 'Supplies', 48, NULL, '2019-12-06 00:30:00', '2019-12-06 00:30:00'),
(12, '11.16-19-03-12-004', 19, '2019-12-09', 'E-1912-0001', 'Equipement', 48, NULL, '2019-12-08 19:21:50', '2019-12-08 19:21:50'),
(13, '11.16-19-03-12-004', 19, '2019-12-09', 'E-1912-0001', 'Equipement', 48, NULL, '2019-12-08 19:22:19', '2019-12-08 19:22:19'),
(14, '11.16-19-03-12-004', 19, '2019-12-09', 'E-1912-0001', 'Equipement', 48, NULL, '2019-12-08 19:23:10', '2019-12-08 19:23:10'),
(15, '11.16-19-03-12-004', 19, '2019-12-09', 'S-1912-0004', 'Supplies', 48, NULL, '2019-12-08 19:30:55', '2019-12-08 19:30:55'),
(16, '11.16-19-03-25-005', 21, '2019-12-09', 'S-1912-0005', 'Supplies', 48, NULL, '2019-12-08 19:32:04', '2019-12-08 19:32:04'),
(17, '11.16-19-03-25-005', 21, '2019-12-09', 'S-1912-0005', 'Supplies', 48, NULL, '2019-12-08 19:32:25', '2019-12-08 19:32:25'),
(18, '11.16-19-03-25-005', 21, '2019-12-09', 'S-1912-0005', 'Supplies', 48, NULL, '2019-12-08 19:33:15', '2019-12-08 19:33:15'),
(19, '4-19-03-12-006', 23, '2019-12-09', 'S-1912-0008', 'Supplies', 4, NULL, '2019-12-08 19:36:59', '2019-12-08 19:36:59'),
(20, '4-19-03-12-006', 23, '2019-12-09', 'S-1912-0008', 'Supplies', 4, NULL, '2019-12-08 19:37:31', '2019-12-08 19:37:31'),
(21, '4-19-03-12-006', 23, '2019-12-09', 'S-1912-0010', 'Supplies', 4, NULL, '2019-12-08 19:39:03', '2019-12-08 19:39:03'),
(22, '4-19-03-12-006', 23, '2019-12-09', 'S-1912-0010', 'Supplies', 4, NULL, '2019-12-08 19:39:09', '2019-12-08 19:39:09'),
(23, '4-19-03-12-006', 23, '2019-12-09', 'S-1912-0010', 'Supplies', 4, NULL, '2019-12-08 19:39:23', '2019-12-08 19:39:23'),
(24, '4-19-03-12-006', 23, '2019-12-09', 'S-1912-0010', 'Supplies', 4, NULL, '2019-12-08 19:55:08', '2019-12-08 19:55:08'),
(25, '11.16-19-12-10-000', 24, '2019-12-10', 'S-1912-0014', 'Supplies', 48, NULL, '2019-12-09 23:27:00', '2019-12-09 23:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_ppe_mnthly_report_items`
--

CREATE TABLE `olongapo_ppe_mnthly_report_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `ppe_mnthly_id` int(11) NOT NULL COMMENT 'Refer to olongapo_ppe_mnthly_report',
  `prno_item_id` int(11) DEFAULT NULL,
  `item_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` decimal(11,2) DEFAULT NULL,
  `unit_value` decimal(11,2) DEFAULT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_value` decimal(11,2) DEFAULT NULL,
  `accountable_person` int(11) DEFAULT NULL COMMENT 'Refer to olongapo_employee_list',
  `department` int(11) DEFAULT NULL COMMENT 'Refer to olongapo_subdepartment',
  `supplier` int(11) DEFAULT NULL COMMENT 'Refer to supplier_info',
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_ppe_mnthly_report_items`
--

INSERT INTO `olongapo_ppe_mnthly_report_items` (`id`, `ppe_mnthly_id`, `prno_item_id`, `item_desc`, `property_code`, `po_no`, `qty`, `unit_value`, `unit`, `total_value`, `accountable_person`, `department`, `supplier`, `invoice`, `deleted_at`, `created_at`, `updated_at`, `location`, `account_group`) VALUES
(1, 1, 1, 'Ball Pen', '02.510', '19-1-0-0328-000', '200.00', '200.00', 'pieces', '40000.00', 11, 1, 431, '00001', NULL, NULL, NULL, '0', '2'),
(2, 1, 2, 'Notebook', '02.41', '19-1-0-0328-000', '100.00', '100.00', 'pieces', '10000.00', 106, 1, 431, '00002', NULL, NULL, NULL, '0', '1'),
(3, 2, 3, 'Sticky Notes', '01.51', '19-1-0-0328-000', '500.00', '500.00', 'pad', '250000.00', 11, 1, 741, '00003', NULL, NULL, NULL, '0', '1'),
(4, 3, 5, 'Monitor', '03.56', '19-2-0-0328-002', '12.00', '12.00', 'units', '144.00', 276, 2, 233, '00003', NULL, NULL, NULL, '0', '1'),
(5, 4, 4, 'Mouse', '02.11', '19-2-0-0328-002', '11.00', '11.00', 'units', '121.00', 106, 2, 353, '0007', NULL, NULL, NULL, '0', '1'),
(6, 4, 6, 'System Unit', '01.51', '19-2-0-0328-002', '12.00', '12.00', 'units', '144.00', 112, 2, 353, '0008', NULL, NULL, NULL, '0', '1'),
(7, 5, 10, 'Water bottles', '04.42', '19-11-17-0411-000', '69.00', '69.00', 'bottles', '4761.00', NULL, 49, 27, 'asdasd', NULL, NULL, '2019-07-29 22:59:56', '', '1'),
(8, 5, 11, 'Water Dispenser', '01.54', '19-11-17-0411-000', '3.00', '3.00', 'units', '9.00', NULL, 49, 27, '5557', NULL, NULL, '2019-07-29 22:59:56', '', '1'),
(9, 6, 7, 'Keyboard', '01.57', '2-19-03-29-001', '10.00', '10.00', 'units', '100.00', 63, 2, 186, '1111', NULL, NULL, NULL, '0', '1'),
(10, 7, 21, 'Ceiling fan', '03.21', '19-11-16-0425-000', '5.00', '5.00', 'pieces', '25.00', 81, 48, 14, '122', NULL, NULL, '2019-12-06 19:41:53', '0', NULL),
(11, 8, NULL, 'Sample', '05.11', '19-20-0-0101-105', '1.00', '1.00', 'kg', '1.00', 276, 8, 13, '456', NULL, NULL, NULL, 'I', '1'),
(12, 10, 87, 'Shabu', '07.13', '4-19-03-25-003', '50.00', '50.00', 'kilograms', '2500.00', 122, 4, 4, 'asdasd', NULL, NULL, NULL, '0', '4'),
(13, 10, 88, 'Marijuana', '09.12', '4-19-03-25-003', '100.00', '100.00', 'kilograms', '10000.00', 97, 4, 4, '1221211212', NULL, NULL, NULL, '0', '6'),
(14, 11, 83, 'dfdgfd', '10.45', '11.16-19-01-25-000', '1.00', '1.00', 'gallons', '1.00', 200, 48, 28, '1', NULL, NULL, NULL, 'Balay', '8'),
(15, 12, 84, '4555', '02.51', '11.16-19-03-12-004', '1.00', '1.00', 'boxes', '1.00', 208, 48, 11, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(16, 13, 84, '4555', '02.51', '11.16-19-03-12-004', '1.00', '1.00', 'boxes', '1.00', 208, 48, 11, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(17, 14, 84, '4555', '02.51', '11.16-19-03-12-004', '1.00', '1.00', 'boxes', '1.00', 208, 48, 11, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(18, 15, 84, '4555', '02.51', '11.16-19-03-12-004', '1.00', '1.00', 'boxes', '1.00', 97, 48, 11, '1', NULL, NULL, NULL, 'Balay', NULL),
(19, 16, 86, 'fghjkl;', '02.51', '11.16-19-03-25-005', '1.00', '1.00', 'grams', '1.00', 276, 48, 14, '1', NULL, NULL, NULL, 'Balay', NULL),
(20, 17, 86, 'fghjkl;', '02.51', '11.16-19-03-25-005', '1.00', '1.00', 'grams', '1.00', 276, 48, 14, '1', NULL, NULL, NULL, 'Balay', NULL),
(21, 18, 86, 'fghjkl;', '02.51', '11.16-19-03-25-005', '1.00', '1.00', 'grams', '1.00', 276, 48, 14, '1', NULL, NULL, NULL, 'Balay', NULL),
(22, 19, 89, 'Test item 1', '02.51', '4-19-03-12-006', '40.00', '40.00', 'bottles', '1600.00', 235, 4, 2, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(23, 20, 89, 'Test item 1', '02.51', '4-19-03-12-006', '40.00', '40.00', 'bottles', '1600.00', 235, 4, 2, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(24, 21, 89, 'Test item 1', '02.51', '4-19-03-12-006', '40.00', '40.00', 'bottles', '1600.00', NULL, 4, 2, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(25, 22, 89, 'Test item 1', '02.51', '4-19-03-12-006', '40.00', '40.00', 'bottles', '1600.00', NULL, 4, 2, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(26, 23, 89, 'Test item 1', '02.51', '4-19-03-12-006', '40.00', '40.00', 'bottles', '1600.00', NULL, 4, 2, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(27, 24, 89, 'Test item 1', '02.51', '4-19-03-12-006', '40.00', '40.00', 'bottles', '1600.00', NULL, 4, 2, 'asdasd', NULL, NULL, NULL, 'Balay', NULL),
(28, 25, 90, 'xxxxxxxxxxxxxxxxxxxx', NULL, '11.16-19-12-10-000', '12.00', '12.00', 'bottles', '144.00', NULL, 48, 42, '123', NULL, NULL, NULL, '452', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_procurement_method`
--

CREATE TABLE `olongapo_procurement_method` (
  `id` int(10) UNSIGNED NOT NULL,
  `proc_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proc_min_value` int(11) NOT NULL,
  `proc_max_value` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_procurement_method`
--

INSERT INTO `olongapo_procurement_method` (`id`, `proc_title`, `proc_min_value`, `proc_max_value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Shopping', 12, 15, NULL, '2020-01-19 21:33:42', '2020-01-19 21:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_items`
--

CREATE TABLE `olongapo_purchase_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_items_category',
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_item_category`
--

CREATE TABLE `olongapo_purchase_item_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_items_category_group',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_item_category_group`
--

CREATE TABLE `olongapo_purchase_item_category_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_item_ppmp`
--

CREATE TABLE `olongapo_purchase_item_ppmp` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_items',
  `category_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_items_category',
  `group_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_items_category_group',
  `subdept_id` int(11) NOT NULL COMMENT 'refer to olongapo_subdepartment',
  `unit_price` decimal(11,2) NOT NULL,
  `quantity` decimal(11,2) NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_item_ppmp_upload`
--

CREATE TABLE `olongapo_purchase_item_ppmp_upload` (
  `id` int(10) UNSIGNED NOT NULL,
  `subdept_id` int(11) NOT NULL COMMENT 'refer to olongapo_subdepartment',
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_upload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_order_acceptance_issuance`
--

CREATE TABLE `olongapo_purchase_order_acceptance_issuance` (
  `id` int(10) UNSIGNED NOT NULL,
  `pono_id` int(11) NOT NULL COMMENT 'PR ORDER ID',
  `aai_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aai_date` date NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_order_items`
--

CREATE TABLE `olongapo_purchase_order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `prno_id` int(11) NOT NULL COMMENT 'Purchase Request ID',
  `pono_id` int(11) NOT NULL COMMENT 'olongapo_purchase_order_no',
  `pr_item_id` int(11) NOT NULL COMMENT 'olongapo_purchase_request_items',
  `po_amount` decimal(11,2) NOT NULL,
  `po_total` decimal(11,2) NOT NULL,
  `po_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_order_no`
--

CREATE TABLE `olongapo_purchase_order_no` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL COMMENT 'Department ID',
  `po_date` date NOT NULL,
  `prno_id` int(11) NOT NULL,
  `bac_control_id` int(11) NOT NULL,
  `date_logged` date NOT NULL,
  `date_receive` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `prop_officer` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_inspect` date DEFAULT NULL,
  `insp` int(1) DEFAULT NULL,
  `insp_officer` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_order_requisition_number`
--

CREATE TABLE `olongapo_purchase_order_requisition_number` (
  `id` int(10) UNSIGNED NOT NULL,
  `pono_id` int(11) NOT NULL COMMENT 'PR ORDER ID',
  `ris_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ris_date` date NOT NULL,
  `issued_by` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_des` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_des` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_request_items`
--

CREATE TABLE `olongapo_purchase_request_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `prno_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_no',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` decimal(11,2) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_request_items_category`
--

CREATE TABLE `olongapo_purchase_request_items_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_items_category_group',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_request_no`
--

CREATE TABLE `olongapo_purchase_request_no` (
  `id` int(10) UNSIGNED NOT NULL,
  `requested_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'refer to olongapo_employee_list',
  `designated_req` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_avail` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_avail` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_app` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT 'ROLEN C. PAULINO/SHEILA R. PADILLA',
  `designation_app` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT 'CITY MAYOR/Secretary to the Mayor',
  `pr_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dept_id` int(11) NOT NULL COMMENT 'Department ID',
  `obr_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'refer to olongapo_obr',
  `sai_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sai_date` date NOT NULL,
  `pr_date` date NOT NULL,
  `pr_date_dept` date NOT NULL,
  `proc_type` int(11) NOT NULL COMMENT 'refer to olongapo_procurement_method',
  `pr_count` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `pr_purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pr_purelyconsumption` tinyint(1) NOT NULL,
  `added_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iau_verified` int(11) NOT NULL,
  `iau_vdate` date NOT NULL,
  `budget_verified` int(11) NOT NULL,
  `budget_vdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_request_post_inspection`
--

CREATE TABLE `olongapo_purchase_request_post_inspection` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_no_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_no',
  `equimentmodel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelplate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daterepair` date NOT NULL,
  `post_inspection_report_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_address_repair_store` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inspection_report` date NOT NULL,
  `date_lto_reg` date NOT NULL,
  `date_acquired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_request_post_inspection_items`
--

CREATE TABLE `olongapo_purchase_request_post_inspection_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_inspect_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_post_inspection',
  `item_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_items',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_request_ppmp_approval`
--

CREATE TABLE `olongapo_purchase_request_ppmp_approval` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_no_id` int(11) NOT NULL COMMENT 'refer to olongapo_purchase_request_no',
  `status` tinyint(1) NOT NULL,
  `ppmp_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppmp_date` date NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_purchase_request_signee`
--

CREATE TABLE `olongapo_purchase_request_signee` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_department` int(11) NOT NULL,
  `year_signee_start` int(11) NOT NULL,
  `year_signee_end` int(11) NOT NULL,
  `type_of_signee` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_purchase_request_signee`
--

INSERT INTO `olongapo_purchase_request_signee` (`id`, `full_name`, `position`, `emp_department`, `year_signee_start`, `year_signee_end`, `type_of_signee`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Rolen C. Paulino Jr.', 'City Mayor', 0, 2020, 2021, 1, NULL, '2019-03-25 22:37:13', '2020-01-23 17:17:15'),
(2, 'Shiela R. Padilla', 'Secretary To The Mayor', 0, 2020, 2021, 1, NULL, '2019-03-25 22:37:38', '2020-01-23 17:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_subdepartment`
--

CREATE TABLE `olongapo_subdepartment` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_id` int(11) NOT NULL COMMENT 'refer to olongapo_department',
  `subdept_code` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_desc` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_subdepartment`
--

INSERT INTO `olongapo_subdepartment` (`id`, `dept_id`, `subdept_code`, `dept_desc`, `year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '0', 'City Accounting Department', '2018', NULL, '2018-01-22 23:21:43', '2018-01-22 23:21:43'),
(2, 2, '0', 'City Administrator\'s Office', '2018', NULL, '2018-01-22 23:21:43', '2018-01-22 23:21:43'),
(3, 3, '0', 'City Assessor\'s Office', '2018', NULL, '2018-01-22 23:21:43', '2018-01-22 23:21:43'),
(4, 4, '0', 'City Budget Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(5, 5, '0', 'City Civil Registry Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(6, 6, '0', 'City Council\'s Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(7, 7, '0', 'City Engineering Department', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(8, 8, '0', 'City Agriculture Department', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(9, 9, '0', 'City Health Department', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(10, 10, '0', 'City Legal Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(11, 11, '0', 'City Mayor\'s Office - Admin', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(12, 12, '0', 'City Planning and Development Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(13, 13, '0', 'City Population Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(14, 14, '0', 'City Treasurer\'s Office ', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(15, 15, '0', 'Olongapo City Public Market EBB', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(16, 16, '0', 'James L. Gordon Avenue Market and Mall', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(17, 17, '0', 'City Veterinary Office', '2018', NULL, '2018-01-22 23:21:44', '2018-01-22 23:21:44'),
(18, 18, '0', 'City Social Welfare and Development Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(19, 19, '0', 'Environmental Sanitation Management Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(20, 20, '0', 'General Services Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(21, 21, '0', 'Gordon College', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(22, 22, '0', 'James L. Gordon Memorial Hospital', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(23, 23, '0', 'N-PNP - Olongapo City Police Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(24, 24, '0', 'N-BFP Bureau of Fire Protection', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(25, 25, '0', 'N-COA Commission on Audit', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(26, 26, '0', 'N-COMELEC Commission On Election', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(27, 27, '0', 'N-DILG Department of Interior and Local Government', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(28, 28, '0', 'N-CPO City Prosecutor\'s Office', '2018', NULL, '2018-01-22 23:21:45', '2018-01-22 23:21:45'),
(29, 29, '0', 'N-MTCC Municipal Trial Court in the City Branch 1 to 5', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(30, 30, '0', 'N-RTC Regional Trial Court 72 , 73', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(31, 31, '0', 'N-DEPED Department Of Education', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(32, 2, '1', 'City Administrator - HRM Personnel Division', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(33, 11, '1', 'CMO - Bids and Awards Committee / SBAC', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(34, 11, '2', 'CMO - Building Administrator\'s Office ', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(35, 11, '3', 'CMO - CSSU', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(36, 11, '4', 'CMO - Task Force', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(37, 11, '5', 'CMO - Internal Audit Unit', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(38, 11, '6', 'CMO - Public Library', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(39, 11, '7', 'CMO - Special Event', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(40, 11, '8', 'CMO - Beautification Parks and Plaza', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(41, 11, '9', 'CMO - Barangay Affairs Office', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(42, 11, '10', 'CMO - Business Permit Section', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(43, 11, '11', 'CMO - City Sport & Youth Development Office', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(44, 11, '12', 'CMO - City Dissaster Risk Reduction and Management Office', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(45, 11, '13', 'CMO - ID Section', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(46, 11, '14', 'CMO - Livelihood Coop and Devt Office', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(47, 11, '15', 'CMO - Manpower Devt & Skills Training Center', '2018', NULL, '2018-01-22 23:21:46', '2018-01-22 23:21:46'),
(48, 11, '16', 'CMO - Management Information System', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(49, 11, '17', 'CMO - Olongapo City Museum', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(50, 11, '18', 'CMO - OSCA Senior Citizen', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(51, 11, '19', 'CMO - Office of Traffice Management and Public Safety', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(52, 11, '20', 'CMO - Public Affairs Office', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(53, 11, '21', 'CMO - Public Employment Service Office', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(54, 11, '22', 'CMO - PhilHealth Indigent Unit / Office', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(55, 11, '23', 'CMO - People Law Enforcement Board', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(56, 11, '24', 'CMO - Tourism and Convention Center', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(57, 11, '25', 'CMO - UBSP Reach Up', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(58, 12, '1', 'CPDO - Systematic Adjudication and Land Titling Project Office', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(59, 18, '1', 'CSWDO - Center for Women', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(60, 18, '2', 'CSWDO - Center for Youth', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(61, 18, '3', 'CSWDO - Social Development Center', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47'),
(62, 18, '4', 'CSWDO - Persons with Disability Affairs Office', '2018', NULL, '2018-01-22 23:21:47', '2018-01-22 23:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_tmpl_main_navigation`
--

CREATE TABLE `olongapo_tmpl_main_navigation` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL COMMENT 'refer to olongapo_user_groups',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 no subs , 1 parent with subs',
  `arangement` int(10) UNSIGNED NOT NULL COMMENT 'arangement of the navigation',
  `properties` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_tmpl_main_navigation`
--

INSERT INTO `olongapo_tmpl_main_navigation` (`id`, `group_id`, `title`, `route`, `parent`, `arangement`, `properties`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Navigations', 'admin.navigations', '0', 1, '{\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(2, 1, 'Groups', 'admin.group_list', '0', 2, '{\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(3, 1, 'Users', 'admin.user_list', '0', 3, '{\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(4, 2, 'PPE MONTHLY REPORT', 'inventory.ppe-monthly-report', '0', 1, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(5, 2, 'Purchase Order PPE', 'inventory.ppe', '0', 1, '{\"li\":{\"class\":\"animatenavs\"},\"i\":{\"class\":\"fa fa-navicon\"}}', NULL, '2019-12-04 23:11:19', NULL),
(6, 2, 'Employee List', 'emp.list', '0', 1, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(7, 2, 'GSO CODES', 'inventory.gso_code', '0', 3, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(8, 2, 'PPE CODES', 'inventory.ppe_code', '0', 4, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(9, 2, 'Supplier', 'bac.supplier_list', '0', 3, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(10, 3, 'Supplier', 'bac.supplier_list', '0', 3, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(11, 3, 'Purchase Order', 'po.index', '0', 1, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(12, 3, 'BAC List', 'pr.no-pono', '0', 2, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-list\"}}', NULL, NULL, NULL),
(13, 3, 'Purchase Request', 'pr.index', '0', 3, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-th-list\"}}', NULL, NULL, NULL),
(14, 3, 'Department Code', 'dept.code', '0', 4, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-building-o\"}}', NULL, NULL, NULL),
(15, 4, 'Abstract List', 'bac.pr_list', '0', 1, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-files-o\"}}', NULL, NULL, NULL),
(16, 4, 'BAC LIST', 'bac.index', '0', 2, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(17, 4, 'BAC Templates', 'bac.templates', '0', 3, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-file-o\"}}', NULL, NULL, NULL),
(18, 4, 'BIDS AND AWARDS COMMITTEE', 'bac.awards_committee', '0', 3, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(19, 4, 'BAC Category', 'bac.category', '0', 4, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-list-alt\"}}', NULL, NULL, NULL),
(20, 4, 'BAC Source of Fund', 'bac.sof_i', '0', 4, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-money\"}}', NULL, NULL, NULL),
(21, 4, 'Supplier List', 'bac.supplier_list', '0', 4, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-list\"}}', NULL, NULL, NULL),
(22, 4, 'Employee List', 'emp.list', '0', 1, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-address-book\"}}', NULL, NULL, NULL),
(23, 4, 'PPMP Approval', 'bac.ppmp_pr_lists', '0', 9, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-thumbs-up\"}}', NULL, NULL, NULL),
(24, 4, 'Set PPMP', 'bac.ppmp', '0', 10, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-file-excel-o\"}}', NULL, NULL, NULL),
(25, 4, 'Post Inspection', 'bac.inspection', '0', 11, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-file\"}}', NULL, NULL, NULL),
(26, 5, 'Purchase Request', 'absctrct.pr_list', '0', 2, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-th-list\"}}', NULL, NULL, NULL),
(27, 5, 'Abstract List', 'absctrct.index', '0', 3, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-list-ol\"}}', NULL, NULL, NULL),
(28, 5, 'Supplier List', 'bac.supplier_list', '0', 4, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(29, 5, 'Abstarct Signee', 'absctrct.signee', '0', 5, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-pencil\"}}', NULL, NULL, NULL),
(30, 6, 'Department User List', 'gso_assistant.dept_user_list', '0', 2, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(31, 6, 'GSO Template', 'gso.templates', '0', 2, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-file-text-o\"}}', NULL, NULL, NULL),
(32, 6, 'BID AND AWARDS COMMITTEE', 'gso_assistant.committee_list', '0', 2, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(33, 6, 'Settings', 'gso_assistant.settings', '1', 2, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-group\"}}', NULL, NULL, NULL),
(34, 7, 'Purchase Request', 'dept.purchase_request', '0', 1, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(35, 2, 'GENERATE REPORT', 'inventory.ppe-monthly-report-generate', '0', 5, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(36, 3, 'Requisition and Issue Slip', 'po.requisition-issue-slip', '0', 5, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-building-o\"}}', NULL, NULL, NULL),
(37, 3, 'PO Acceptance', 'po.po-acceptance', '0', 6, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-building-o\"}}', NULL, NULL, NULL),
(38, 9, 'Department PR', 'dept.purchase_request', '0', 1, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL),
(39, 9, 'Set PPMP', 'bac.ppmp_pr_lists', '0', 2, '{\"i\":{\"class\":\"fa fa-id-card\"}}', '2019-08-15 17:58:40', '2019-12-09 00:48:04', NULL),
(40, 3, 'Status', 'emp.status', '0', 8, '{\"i\":{\"class\":\"fa fa-id-card\"}}', '2019-09-09 21:53:11', '2019-09-09 21:53:11', NULL),
(41, 2, 'Inventory Items', 'inventory.items', '0', 8, '{\"li\" : {\"class\":\"animatenavs\"},\"i\" : {\"class\":\"fa fa-navicon\"}}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_tmpl_sub_navigation`
--

CREATE TABLE `olongapo_tmpl_sub_navigation` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL COMMENT 'refer to olongapo_tmpl_main_navigation',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arangement` int(10) UNSIGNED NOT NULL COMMENT 'arangement of the navigation',
  `properties` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_tmpl_sub_navigation`
--

INSERT INTO `olongapo_tmpl_sub_navigation` (`id`, `parent_id`, `title`, `route`, `arangement`, `properties`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Group-List', 'admin.group_list', 1, '{\"i\" : {\"class\":\"fa fa-home\"}}', NULL, NULL, NULL),
(2, 33, 'PROCUREMENT METHOD', 'gso_assistant.proc_methods', 1, '{\"i\" : {\"class\":\"fa fa-group\"},\"a\" : {\"class\":\"hvr-underline-from-left\"}}', NULL, NULL, NULL),
(3, 33, 'Purchase Request Signee', 'gso_assistant.pr_signee', 2, '{\"i\" : {\"class\":\"fa fa-group\"},\"a\" : {\"class\":\"hvr-underline-from-left\"}}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_user_credentials`
--

CREATE TABLE `olongapo_user_credentials` (
  `id` int(10) UNSIGNED NOT NULL,
  `ucrd_realname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ucrd_username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'refer to olongapo_employee_list',
  `ucrd_email` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'should be the same as jhmc_user_contact_info email',
  `group_id` int(10) UNSIGNED NOT NULL COMMENT 'refer to olongapo_user_groups',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_user_credentials`
--

INSERT INTO `olongapo_user_credentials` (`id`, `ucrd_realname`, `ucrd_username`, `password`, `employee_id`, `ucrd_email`, `group_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `is_approved`) VALUES
(1, 'Administrator', 'root', '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq', 1, 'root@mail.com', 1, 'BceK2rCxycOdpVhXh4iI2WnmuhGewB7ZmttJhCGrGM1bIRQhpdRMwvB8RHae', '2018-01-22 23:21:17', NULL, NULL, 1),
(2, 'Invetory', 'inventory_root', '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq', 2, 'invetory_root@mail.com', 2, 'miVCxkQnhl4hlYkwUJORgznLcOLJXSLQgKpV8edGyIpXSwo7etvojeGhZ3Lx', '2018-01-22 23:21:17', NULL, NULL, 1),
(3, 'Purchase Request and Order', 'popr_root', '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq', 3, 'popr_root@mail.com', 3, 'JMUpcJvncwTiERAsHecDzM5nVTYNosapmGBRu6ujnwK2PzR8zJPINAJuVAf8', '2018-01-22 23:21:56', NULL, NULL, 1),
(4, 'Bids and Awards Committee', 'bac_root', '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq', 4, 'bac_root@mail.com', 4, 'SgyzIV3rCzF7onWR9HL3KYr11WClZr2PjzJG6tOmVHOanuwAiWSp5BzuonIz', '2018-01-22 23:21:56', NULL, NULL, 1),
(5, 'Absctract of Records', 'abstrct_root', '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq', 5, 'abstrct_root@mail.com', 5, 'O14Y8cLJkbWskLrO5aegPf0L4AXdFNlpBkmXATlw6RJST5TUiy1WRMlV0iEw', '2018-01-22 23:21:56', NULL, NULL, 1),
(6, 'GSO Assistant Officer', 'gso_assistant', '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq', 6, 'gso_assistant@mail.com', 6, 'jtiJq4N89BRC11rj6TsNcLNW5xKZnrICdXijFlKFbTkFo0sr597kaW0Lpgkg', '2018-01-22 23:21:56', NULL, NULL, 1),
(7, 'GSO MANAGER', 'gso_manager', '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq', 8, 'gso_manager@mail.com', 8, NULL, '2018-01-22 23:21:56', NULL, NULL, 1),
(8, 'John d Doe', 'johndoe', '$2y$10$WqjzLmPY5XhAobtJGPtKB.SREYfp4pa6ORY7mocSn5Bam79QRSqKW', 301, NULL, 7, '1OhDFqQvHnTmM3H9bTg3bVe1uWE4FdOd0jLxiicVWrFDmeTUolMYtTo1EmIf', '2018-01-22 23:26:02', '2018-01-22 23:26:02', NULL, 0),
(11, 'GSO-DEPARTMENT', 'gso_department', '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq', 302, NULL, 9, 'eRg8L7pK23R2F2myKYeXt9mXUJgwZrNgTZs50dublKrGNrM45HTkqrlAOIZQ', '2019-01-24 08:26:33', '2019-01-24 08:26:33', NULL, 0),
(12, 'Danalex', 'danalex', '$2y$10$hiUUE2EMd8uC5/SS/B2jGOzcgKGXBwdL54s/PVKl.GiSDFJ4C9TAC', 0, 'danalex@gmail.com', 7, '6AKA4ypzVgXWnkLCeWmMeBDpRG5EOxPYg51JyYYQrmQoqQe5loQK62iui9W7', '2020-01-21 00:22:22', '2020-01-21 00:23:09', NULL, 0),
(13, 'Danalex D. Danalex', 'danalex_root', '$2y$10$bxpWqP5BFV1gYjkQ8Rr8hehTOF7A8wC.X9GpBiBz8JUyAtvA9wYCa', 306, NULL, 7, 'wjyofjc4yBexBLFBQ1TWjEthvoKmnq1fcDLHc7xD3A1jLqt6CSHMiuvSyucN', '2020-01-21 00:26:14', '2020-01-21 00:26:14', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_user_groups`
--

CREATE TABLE `olongapo_user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `ugrp_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugrp_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugrp_homepage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `olongapo_user_groups`
--

INSERT INTO `olongapo_user_groups` (`id`, `ugrp_name`, `ugrp_description`, `ugrp_homepage`, `created_at`, `updated_at`) VALUES
(1, 'Administrators', 'Privileged users', 'admin.index', NULL, NULL),
(2, 'Inventory', 'None Priveledge users ', 'inventory.index', NULL, NULL),
(3, 'PurchaseRequestOrder', 'Privileged users', 'pr.index', NULL, NULL),
(4, 'Bids and Awards Committee', 'Privileged users', 'bac.index', NULL, NULL),
(5, 'Abstract of Records', 'Privileged users', 'bac.index', NULL, NULL),
(6, 'GSO Assistant Officer', 'Department users', 'gso.index', NULL, NULL),
(7, 'Department', 'Department', 'dept.index', NULL, NULL),
(8, 'GSO Manager', 'GSO Manager', 'gsomngr.index', NULL, NULL),
(9, 'GSO - Departments', 'GSO-Departments', 'dept.index', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `olongapo_user_logging`
--

CREATE TABLE `olongapo_user_logging` (
  `id` int(10) UNSIGNED NOT NULL,
  `credential_id` int(10) UNSIGNED NOT NULL COMMENT 'refer to olongapo_user_credentials',
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `login_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_mac_addr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_address`
--

CREATE TABLE `supplier_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL COMMENT 'refer to supplier_info id',
  `province` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_mun` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brgy` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `supplier_address`
--

INSERT INTO `supplier_address` (`id`, `supplier_id`, `province`, `city_mun`, `brgy`, `details`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, NULL, NULL, '58 Arthur St., W.B.B., Olongapo City', NULL, NULL, NULL),
(2, 16, NULL, NULL, NULL, 'Maharlika Highway, Poblacion, Talavera, Nueva Ecija', NULL, NULL, NULL),
(3, 18, NULL, NULL, NULL, '13 Arthur St., W.B.B., Olongapo City', NULL, NULL, NULL),
(4, 19, NULL, NULL, NULL, '133 Salvador St., Baesa, Caloocan City', NULL, NULL, NULL),
(5, 20, NULL, NULL, NULL, '8-25th E.B.B., Olongapo City', NULL, NULL, NULL),
(6, 27, NULL, NULL, NULL, '25 Kessing St., New asinan, Olongapo City', NULL, NULL, NULL),
(7, 28, NULL, NULL, NULL, '4-23rd St., E.B.B., Olongapo City', NULL, NULL, NULL),
(8, 30, NULL, NULL, NULL, '156 A Juan St., Salapan, San Juan City', NULL, NULL, NULL),
(9, 35, NULL, NULL, NULL, 'Golden City Imus Cavite', NULL, NULL, NULL),
(10, 41, NULL, NULL, NULL, 'Brgy. N.S. Amoranto, Quezon City', NULL, NULL, NULL),
(11, 42, NULL, NULL, NULL, '#4-23rd St., E.B.B., Olongapo City', NULL, NULL, NULL),
(12, 45, NULL, NULL, NULL, 'Quiapo, Manila', NULL, NULL, NULL),
(13, 52, NULL, NULL, NULL, 'JL Gordon Market, Gordon Ave., Pag-asa, Olongapo City', NULL, NULL, NULL),
(14, 53, NULL, NULL, NULL, '34 Fontaine St., E.B.B., Olongapo City', NULL, NULL, NULL),
(15, 54, NULL, NULL, NULL, '47-14th St., East Tapinac, Olongapo City', NULL, NULL, NULL),
(16, 61, NULL, NULL, NULL, '5-26th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(17, 65, NULL, NULL, NULL, '82 Banaba St., Bo. Barretto, Olongapo City', NULL, NULL, NULL),
(18, 73, NULL, NULL, NULL, 'Rizal St., San Nicolas, Angeles City', NULL, NULL, NULL),
(19, 77, NULL, NULL, NULL, '2714 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(20, 80, NULL, NULL, NULL, '20-22ND St., W.B.B., Olongapo City', NULL, NULL, NULL),
(21, 82, NULL, NULL, NULL, '2765 Rizal Ave., W.B.B., Olongapo City', NULL, NULL, NULL),
(22, 87, NULL, NULL, NULL, 'Olongapo City', NULL, NULL, NULL),
(23, 90, NULL, NULL, NULL, '40 22nd St., W.B.B., Olongapo City', NULL, NULL, NULL),
(24, 91, NULL, NULL, NULL, '4107 R. Magsaysay Blvd.  Sta. Mesa, Manila', NULL, NULL, NULL),
(25, 92, NULL, NULL, NULL, '391 Banawe St., Sto Domingo, Quezon City', NULL, NULL, NULL),
(26, 95, NULL, NULL, NULL, '64 Quezon Ave., Quezon City', NULL, NULL, NULL),
(27, 96, NULL, NULL, NULL, '8837 Sampaloc Ave., San Antonio Village, Makati City', NULL, NULL, NULL),
(28, 98, NULL, NULL, NULL, 'National Hi-way, Calapacuan Subic, Zambales', NULL, NULL, NULL),
(29, 106, NULL, NULL, NULL, 'Unit 17B Strata 2000 Bldg. F. Ortigas Jr. Rd. Ortigas Center, Pasig City', NULL, NULL, NULL),
(30, 107, NULL, NULL, NULL, 'Sto. Tomas, City of San Fernando, Pampanga', NULL, NULL, NULL),
(31, 108, NULL, NULL, NULL, '254 Rizal Ave., East Tapinac, Olongapo City', NULL, NULL, NULL),
(32, 109, NULL, NULL, NULL, 'Calasiao, Pangasinan', NULL, NULL, NULL),
(33, 111, NULL, NULL, NULL, 'Project 8, Quezon City', NULL, NULL, NULL),
(34, 112, NULL, NULL, NULL, '47 A. Pablo St., Karuhatan, Valenzuela City', NULL, NULL, NULL),
(35, 123, NULL, NULL, NULL, '11 Barretto St., E.B.B., Olongapo City', NULL, NULL, NULL),
(36, 125, NULL, NULL, NULL, '4 CBMU Upper Kalaklan, Olongapo City', NULL, NULL, NULL),
(37, 130, NULL, NULL, NULL, 'San Fernando, Pampanga', NULL, NULL, NULL),
(38, 131, NULL, NULL, NULL, 'San Pablo, Laguna City', NULL, NULL, NULL),
(39, 133, NULL, NULL, NULL, 'Bacoor, Cavite', NULL, NULL, NULL),
(40, 136, NULL, NULL, NULL, '737 National Rd., San Juan, San Fernando, Pampanga', NULL, NULL, NULL),
(41, 143, NULL, NULL, NULL, 'Unit 7-C Suntree Tower, Meralco Ave., Brgy. San Antonio, Ortigas Center, Pasig City', NULL, NULL, NULL),
(42, 144, NULL, NULL, NULL, 'Brgy. San Antonio Bi�an City Laguna', NULL, NULL, NULL),
(43, 145, NULL, NULL, NULL, 'Harbor Point Mall Branch, SBFZ', NULL, NULL, NULL),
(44, 149, NULL, NULL, NULL, '22 National Highway, Kalaklan, Olongapo City', NULL, NULL, NULL),
(45, 151, NULL, NULL, NULL, 'Natianal Hi-way, Bo. Barretto, Olongapo City', NULL, NULL, NULL),
(46, 153, NULL, NULL, NULL, '131 Norton St., New Kalalake, Olongapo City', NULL, NULL, NULL),
(47, 157, NULL, NULL, NULL, '87 Rizal Ave., New Banicain, Olongapo City', NULL, NULL, NULL),
(48, 158, NULL, NULL, NULL, 'Cubao Quezon City', NULL, NULL, NULL),
(49, 164, NULL, NULL, NULL, '2nd Flr., Harbor Point Mall Rizal Highway, SBFZ', NULL, NULL, NULL),
(50, 169, NULL, NULL, NULL, '1365 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(51, 170, NULL, NULL, NULL, '1365 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(52, 171, NULL, NULL, NULL, '1365 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(53, 172, NULL, NULL, NULL, '1455 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(54, 174, NULL, NULL, NULL, 'Balanga City, Bataan', NULL, NULL, NULL),
(55, 175, NULL, NULL, NULL, '66 Stanford ST., Cubao, Quezon City', NULL, NULL, NULL),
(56, 181, NULL, NULL, NULL, '2718 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(57, 183, NULL, NULL, NULL, '1170-8 Pasong Tamo St., Makati City', NULL, NULL, NULL),
(58, 184, NULL, NULL, NULL, 'G/F Brickly One Condo, 1372 Cor. Centro St., Espa�a, Sampaloc, Manila', NULL, NULL, NULL),
(59, 195, NULL, NULL, NULL, 'Baliuag Bulacan', NULL, NULL, NULL),
(60, 196, NULL, NULL, NULL, 'Bagong Nayon, Baliwag, Bulacan', NULL, NULL, NULL),
(61, 198, NULL, NULL, NULL, '1981 Rizal Ave., W.B.B., Olongapo City', NULL, NULL, NULL),
(62, 199, NULL, NULL, NULL, '2067 Rizal Ave., W.B.B., Olongapo City', NULL, NULL, NULL),
(63, 204, NULL, NULL, NULL, '2596 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(64, 205, NULL, NULL, NULL, '2596 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(65, 208, NULL, NULL, NULL, '46 Makabayan St.,  Brgy. Obrero, Quezon City', NULL, NULL, NULL),
(66, 209, NULL, NULL, NULL, 'Subic Bay Freeport Zone', NULL, NULL, NULL),
(67, 217, NULL, NULL, NULL, 'G/F Globe Bldg., Quezon Blvd., Sta Cruz, Manila', NULL, NULL, NULL),
(68, 218, NULL, NULL, NULL, 'Iba Zambales', NULL, NULL, NULL),
(69, 222, NULL, NULL, NULL, '32 Otero Ave., Mabayuan, Olongapo City', NULL, NULL, NULL),
(70, 223, NULL, NULL, NULL, '16 Mt. Apo, East Tapinac, Olongapo City', NULL, NULL, NULL),
(71, 232, NULL, NULL, NULL, 'Ayala Alabang Mandaluyong City', NULL, NULL, NULL),
(72, 233, NULL, NULL, NULL, '2089 C.M. Recto Ave., Quiapo, Manila', NULL, NULL, NULL),
(73, 234, NULL, NULL, NULL, '283 del Monte Ave., Brgy. Manresa, Quezon City', NULL, NULL, NULL),
(74, 241, NULL, NULL, NULL, '26th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(75, 245, NULL, NULL, NULL, '32 Gen. Conception St., Caloocan City', NULL, NULL, NULL),
(76, 249, NULL, NULL, NULL, '8618 Upper De Guzman Gordon Heights, Olongapo City', NULL, NULL, NULL),
(77, 254, NULL, NULL, NULL, 'Tala Orani, Bataan', NULL, NULL, NULL),
(78, 255, NULL, NULL, NULL, '87, National Highway, Kalaklan, Olongapo City', NULL, NULL, NULL),
(79, 256, NULL, NULL, NULL, 'Quezon City', NULL, NULL, NULL),
(80, 261, NULL, NULL, NULL, '2726 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(81, 263, NULL, NULL, NULL, '28 Corpuz St., West Tapinac, Olongapo City', NULL, NULL, NULL),
(82, 266, NULL, NULL, NULL, 'Sampaguita St., Sta Rita, Olongapo City', NULL, NULL, NULL),
(83, 268, NULL, NULL, NULL, 'Raloos St., Quezon City', NULL, NULL, NULL),
(84, 269, NULL, NULL, NULL, '5-1st St., East Tapinac, New Asinan, Olongapo City', NULL, NULL, NULL),
(85, 270, NULL, NULL, NULL, 'Rallos St., Quezon City', NULL, NULL, NULL),
(86, 274, NULL, NULL, NULL, 'Lot 34 Blk 3, Mayumi St., Brgy Sta. Rita, Olongapo City', NULL, NULL, NULL),
(87, 278, NULL, NULL, NULL, '5-Rangang St., Brgy. Manresa, Quezon City', NULL, NULL, NULL),
(88, 279, NULL, NULL, NULL, 'San Antonio, Pasig City', NULL, NULL, NULL),
(89, 281, NULL, NULL, NULL, '1255 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(90, 283, NULL, NULL, NULL, '336 Fitration Sta. Rita, Olongapo City', NULL, NULL, NULL),
(91, 289, NULL, NULL, NULL, '2706 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(92, 290, NULL, NULL, NULL, '1750 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(93, 293, NULL, NULL, NULL, '42 Barretto St., E.B.B., Olongapo City', NULL, NULL, NULL),
(94, 298, NULL, NULL, NULL, '7636 Guijo cor., Sacred Heart St., San Antonio Village, Makati City', NULL, NULL, NULL),
(95, 300, NULL, NULL, NULL, '1 Caron St. W.B.B., Olongapo City', NULL, NULL, NULL),
(96, 302, NULL, NULL, NULL, '2043 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(97, 309, NULL, NULL, NULL, '153 Gordon Ave., Brgy. Kalalake, Olongapo City', NULL, NULL, NULL),
(98, 311, NULL, NULL, NULL, 'Bo. Barretto, Olongapo City', NULL, NULL, NULL),
(99, 312, NULL, NULL, NULL, 'Mangan-Vaca, Executive Village Subic, Zambales', NULL, NULL, NULL),
(100, 315, NULL, NULL, NULL, '3-23rd St., E.B.B., Olongapo City', NULL, NULL, NULL),
(101, 324, NULL, NULL, NULL, '33 23rd St., W.B.B., Olongapo City', NULL, NULL, NULL),
(102, 326, NULL, NULL, NULL, '33-23rd St., W.B.B., Olongapo City', NULL, NULL, NULL),
(103, 335, NULL, NULL, NULL, 'Para�aque City', NULL, NULL, NULL),
(104, 339, NULL, NULL, NULL, '105 S. Reyes St., Villa Miguela, Pinagbuhatan, Pasig City', NULL, NULL, NULL),
(105, 341, NULL, NULL, NULL, '1690 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(106, 351, NULL, NULL, NULL, '5/F Ortigas Bldg., Ortigas Ave., Pasig City', NULL, NULL, NULL),
(107, 353, NULL, NULL, NULL, '2256 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(108, 358, NULL, NULL, NULL, '615 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(109, 362, NULL, NULL, NULL, 'Ortigas Center, Pasig City', NULL, NULL, NULL),
(110, 364, NULL, NULL, NULL, '15 Gordon Ave., Pag-asa, Olongapo City', NULL, NULL, NULL),
(111, 366, NULL, NULL, NULL, 'Paco Manila', NULL, NULL, NULL),
(112, 369, NULL, NULL, NULL, '667 G. Puyat St., Brgy. 309 Zone 030, Quiapo, Manila', NULL, NULL, NULL),
(113, 374, NULL, NULL, NULL, '673 Amapola St., Sta Rita, Olongapo City', NULL, NULL, NULL),
(114, 377, NULL, NULL, NULL, '673 Amapola St., Sta Rita, Olongapo City', NULL, NULL, NULL),
(115, 380, NULL, NULL, NULL, 'Jose Abad Santos Ave., CSFP', NULL, NULL, NULL),
(116, 382, NULL, NULL, NULL, '64-18th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(117, 384, NULL, NULL, NULL, '11 Arthur St., W.B.B., Olongapo City', NULL, NULL, NULL),
(118, 388, NULL, NULL, NULL, 'Ortigas, Pasig City', NULL, NULL, NULL),
(119, 392, NULL, NULL, NULL, 'Olongapo City', NULL, NULL, NULL),
(120, 395, NULL, NULL, NULL, '809 Ritz Rd., E. Rodriguez Sr. Le Mariche Subd. Kalusugan, Dist IV Quezon City', NULL, NULL, NULL),
(121, 400, NULL, NULL, NULL, '18A Brill St., W.B.B., Olongapo City', NULL, NULL, NULL),
(122, 408, NULL, NULL, NULL, '155 Panay Ave., Quezon City', NULL, NULL, NULL),
(123, 409, NULL, NULL, NULL, '155 Panay Ave. Quezon City', NULL, NULL, NULL),
(124, 411, NULL, NULL, NULL, 'Iram, New cabalan, Olongapo City', NULL, NULL, NULL),
(125, 412, NULL, NULL, NULL, 'Manila', NULL, NULL, NULL),
(126, 415, NULL, NULL, NULL, 'Cainta, Rizal', NULL, NULL, NULL),
(127, 421, NULL, NULL, NULL, '1515 Rizal Ave., West Tapinac, Olongapo', NULL, NULL, NULL),
(128, 422, NULL, NULL, NULL, '9-29th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(129, 423, NULL, NULL, NULL, 'Lot 12, Unit K, Commitment St., SBIP Phase I, SBFZ', NULL, NULL, NULL),
(130, 424, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(131, 425, NULL, NULL, NULL, '103B-Hansen St., East Tapinac, Olongapo City', NULL, NULL, NULL),
(132, 430, NULL, NULL, NULL, 'Purok 5, Old Cabalan, Olongapo City', NULL, NULL, NULL),
(133, 431, NULL, NULL, NULL, 'Stall 5-16 JLGPM&M Pag-asa, Olongapo City', NULL, NULL, NULL),
(134, 433, NULL, NULL, NULL, '179 Rizal San Nicolas Castillejos, Zambales', NULL, NULL, NULL),
(135, 434, NULL, NULL, NULL, '# 1 Harris St., E.B.B., Olongapo City', NULL, NULL, NULL),
(136, 435, NULL, NULL, NULL, '1155 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(137, 436, NULL, NULL, NULL, '109 Fendler St., East Tapinac, Olongapo City', NULL, NULL, NULL),
(138, 441, NULL, NULL, NULL, '20-Magsaysay Drive, Olongapo City', NULL, NULL, NULL),
(139, 444, NULL, NULL, NULL, '2596 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(140, 448, NULL, NULL, NULL, 'Subic Zambales', NULL, NULL, NULL),
(141, 455, NULL, NULL, NULL, '12-4th St., West Tapinac, Olongapo City', NULL, NULL, NULL),
(142, 458, NULL, NULL, NULL, '2698 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(143, 473, NULL, NULL, NULL, '1 Harris, E.B.B., Olongapo City', NULL, NULL, NULL),
(144, 479, NULL, NULL, NULL, 'No. 65 Rizal Ave., New Banicain, Olongapo City', NULL, NULL, NULL),
(145, 487, NULL, NULL, NULL, '12-20th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(146, 488, NULL, NULL, NULL, 'Gatiawin Arayat Pampanga', NULL, NULL, NULL),
(147, 490, NULL, NULL, NULL, 'Makati City', NULL, NULL, NULL),
(148, 491, NULL, NULL, NULL, 'Bagong Silang, Caloocan City', NULL, NULL, NULL),
(149, 497, NULL, NULL, NULL, '33 18th St. E.B.B., Olongapo City', NULL, NULL, NULL),
(150, 499, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(151, 507, NULL, NULL, NULL, '2701 Rizal Ave., W.B.B., Olongapo City', NULL, NULL, NULL),
(152, 510, NULL, NULL, NULL, '66 Gallegher 10th St., East Tapinac, Olongapo City', NULL, NULL, NULL),
(153, 514, NULL, NULL, NULL, '5 Ragang St., Banawe, Quezon City', NULL, NULL, NULL),
(154, 517, NULL, NULL, NULL, '1779 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(155, 523, NULL, NULL, NULL, 'Culiat, Tandang Sora, Quezon City', NULL, NULL, NULL),
(156, 525, NULL, NULL, NULL, '103-B Hansen St., East Tapinac, Olongapo City', NULL, NULL, NULL),
(157, 526, NULL, NULL, NULL, '2067K-21st St., W.B.B., Olongapo City', NULL, NULL, NULL),
(158, 528, NULL, NULL, NULL, 'San Vicente Apalit Pampanga', NULL, NULL, NULL),
(159, 529, NULL, NULL, NULL, '1014 San Vicente, Apalit Pampanga', NULL, NULL, NULL),
(160, 530, NULL, NULL, NULL, '1014 San Vicente Apalit, Pampanga', NULL, NULL, NULL),
(161, 532, NULL, NULL, NULL, '776 Aurora Boulevard Cor., Boston St., Cubao, Quezon City', NULL, NULL, NULL),
(162, 537, NULL, NULL, NULL, '110 Fendler, East Tapinac, Olongapo City', NULL, NULL, NULL),
(163, 538, NULL, NULL, NULL, '110 Fendler, East Tapinac, Olongapo City', NULL, NULL, NULL),
(164, 539, NULL, NULL, NULL, '2450 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(165, 543, NULL, NULL, NULL, '31-23rd St., W.B.B., Olongapo City', NULL, NULL, NULL),
(166, 547, NULL, NULL, NULL, '126-A Malakas St., Diliman, Quezon City', NULL, NULL, NULL),
(167, 554, NULL, NULL, NULL, 'Brgy. 415 Sampaloc, Metro Manila', NULL, NULL, NULL),
(168, 556, NULL, NULL, NULL, 'City of San Fernando, Pampanga', NULL, NULL, NULL),
(169, 558, NULL, NULL, NULL, 'Mac Arthur Hi-way Dolores San Fernando Pampanga', NULL, NULL, NULL),
(170, 563, NULL, NULL, NULL, '67 Elica�o St., E.B.B., Olongapo City', NULL, NULL, NULL),
(171, 570, NULL, NULL, NULL, '38-23rd St., W.B.B., Olongapo City', NULL, NULL, NULL),
(172, 571, NULL, NULL, NULL, '9 Mabini St., E.B.B., Olongapo City', NULL, NULL, NULL),
(173, 574, NULL, NULL, NULL, 'Lumanbayan, Calapan City Oriental Mindoro', NULL, NULL, NULL),
(174, 575, NULL, NULL, NULL, '1435 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(175, 580, NULL, NULL, NULL, '23-24th St. W.B.B., Olongapo City', NULL, NULL, NULL),
(176, 582, NULL, NULL, NULL, 'Sta Monica Subd., Subic, Zambales', NULL, NULL, NULL),
(177, 586, NULL, NULL, NULL, 'Unit A Inmed Bldg., 1407 Rizal Ave., Brgy. 334 Zone 033 Sta. Cruz, Manila', NULL, NULL, NULL),
(178, 590, NULL, NULL, NULL, '23-24th St. W.B.B., Olongapo City', NULL, NULL, NULL),
(179, 593, NULL, NULL, NULL, 'MC DONALD\'s', NULL, NULL, NULL),
(180, 600, NULL, NULL, NULL, 'City of San Fernando Pampanga', NULL, NULL, NULL),
(181, 601, NULL, NULL, NULL, '8th Ave., Villa Julita SBVD., San Fernando Pampanga', NULL, NULL, NULL),
(182, 602, NULL, NULL, NULL, 'Edsa, Mandaluyong City', NULL, NULL, NULL),
(183, 603, NULL, NULL, NULL, '89 Rizal Ave., New Banicain, Olongapo City', NULL, NULL, NULL),
(184, 604, NULL, NULL, NULL, 'Quezon City', NULL, NULL, NULL),
(185, 605, NULL, NULL, NULL, '1-15th St. Joseph Compound Tabun, Angeles City', NULL, NULL, NULL),
(186, 608, NULL, NULL, NULL, 'Balubad Porac, Pampanga', NULL, NULL, NULL),
(187, 609, NULL, NULL, NULL, 'Balubad Porac, Pampanga', NULL, NULL, NULL),
(188, 612, NULL, NULL, NULL, 'Taguig, Metro Manila', NULL, NULL, NULL),
(189, 613, NULL, NULL, NULL, '149 Avocado St., Sta Rita, Olongapo City', NULL, NULL, NULL),
(190, 614, NULL, NULL, NULL, '10 National Highway, Calapandayan, Subic', NULL, NULL, NULL),
(191, 615, NULL, NULL, NULL, '3 Rodriguez St., New Kalalake, Olongapo City', NULL, NULL, NULL),
(192, 616, NULL, NULL, NULL, '195 Lower Kalaklan, Olongapo City', NULL, NULL, NULL),
(193, 623, NULL, NULL, NULL, '129 National Rd.,Lower Kalaklan, Olongapo City', NULL, NULL, NULL),
(194, 631, NULL, NULL, NULL, '3/F MRL Tower No.124 Malaks St., Central District Diliman, Quezon City', NULL, NULL, NULL),
(195, 633, NULL, NULL, NULL, '22 Upper Kalaklan, Olongapo City', NULL, NULL, NULL),
(196, 634, NULL, NULL, NULL, 'Stall 12 Pag-asa Market, Olongapo City', NULL, NULL, NULL),
(197, 635, NULL, NULL, NULL, '19 Arthur St., W.B.B., Olongapo City', NULL, NULL, NULL),
(198, 638, NULL, NULL, NULL, '19 Arthur, W.B.B., Olongapo City', NULL, NULL, NULL),
(199, 639, NULL, NULL, NULL, 'Harbor Point, SBFZ', NULL, NULL, NULL),
(200, 647, NULL, NULL, NULL, '12 Ohio St., Upper Kalaklan, Olongapo City', NULL, NULL, NULL),
(201, 652, NULL, NULL, NULL, '1939 Rizal Ave., W.B.B., Olongapo City', NULL, NULL, NULL),
(202, 654, NULL, NULL, NULL, '18 Magsaysay Drive, New Asinan, Olongapo City', NULL, NULL, NULL),
(203, 656, NULL, NULL, NULL, 'Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(204, 657, NULL, NULL, NULL, '595 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(205, 661, NULL, NULL, NULL, '2733 Rizal Ave., W.B.B., Olongapo City', NULL, NULL, NULL),
(206, 663, NULL, NULL, NULL, '#4 23rd St., E.B.B., Olongapo City', NULL, NULL, NULL),
(207, 667, NULL, NULL, NULL, 'Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(208, 668, NULL, NULL, NULL, '38 R. Magsaysay Drive East Tapinac, Olongapo City', NULL, NULL, NULL),
(209, 669, NULL, NULL, NULL, '22 Barretto St., E.B.B., Olongapo', NULL, NULL, NULL),
(210, 670, NULL, NULL, NULL, '22 Barretto St., E.B.B., Olongapo', NULL, NULL, NULL),
(211, 674, NULL, NULL, NULL, '15-20th E.B.B., Olongapo City', NULL, NULL, NULL),
(212, 685, NULL, NULL, NULL, '1599 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(213, 687, NULL, NULL, NULL, '2710 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(214, 691, NULL, NULL, NULL, 'NO BUSINESS PERMIT', NULL, NULL, NULL),
(215, 699, NULL, NULL, NULL, 'Space No. 2062-2063 Harbor Point Mall, SBFZ', NULL, NULL, NULL),
(216, 700, NULL, NULL, NULL, 'Makati City', NULL, NULL, NULL),
(217, 705, NULL, NULL, NULL, '225 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(218, 707, NULL, NULL, NULL, 'City of San Fernando Pampanga', NULL, NULL, NULL),
(219, 709, NULL, NULL, NULL, '32-18th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(220, 712, NULL, NULL, NULL, '1752, Dian St., Palanan Makati City', NULL, NULL, NULL),
(221, 713, NULL, NULL, NULL, 'City of San Fernando Pampanga', NULL, NULL, NULL),
(222, 716, NULL, NULL, NULL, 'Harbor Point, SBFZ', NULL, NULL, NULL),
(223, 726, NULL, NULL, NULL, 'Quezon City', NULL, NULL, NULL),
(224, 728, NULL, NULL, NULL, '148 Otero Ave., Mabayuan, Olongapo City', NULL, NULL, NULL),
(225, 730, NULL, NULL, NULL, '3-B 1st New Asinan, Olongapo City', NULL, NULL, NULL),
(226, 731, NULL, NULL, NULL, '2nd Fl. RII Bldg. 136 Malakas St., Diliman, Quezon City', NULL, NULL, NULL),
(227, 732, NULL, NULL, NULL, 'Olongapo City', NULL, NULL, NULL),
(228, 735, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(229, 736, NULL, NULL, NULL, '8 Kessing St., New Asinan, Olongapo City', NULL, NULL, NULL),
(230, 738, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(231, 739, NULL, NULL, NULL, 'Davsan Subd., Sindalan, City of San Fernando Pampanga', NULL, NULL, NULL),
(232, 745, NULL, NULL, NULL, '200 C, Raymundo Ave., Pasig City', NULL, NULL, NULL),
(233, 747, NULL, NULL, NULL, 'Pasig City', NULL, NULL, NULL),
(234, 750, NULL, NULL, NULL, 'Brgy. Camilmil, Calapan City, Oriental Mindoro', NULL, NULL, NULL),
(235, 751, NULL, NULL, NULL, 'Purok 10 Sta. Lucia, City of San Fernando Pampanga', NULL, NULL, NULL),
(236, 756, NULL, NULL, NULL, '40 18th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(237, 757, NULL, NULL, NULL, '157 Avocado St. Sta Rita, Olongapo City', NULL, NULL, NULL),
(238, 762, NULL, NULL, NULL, '1190 Rizal Ave., East Tapinac, Olongapo City', NULL, NULL, NULL),
(239, 763, NULL, NULL, NULL, '553 Florentino Torres, Sta Cruz, Manila', NULL, NULL, NULL),
(240, 764, NULL, NULL, NULL, '2/F China Plaza Bldg., 1036-1038 Ongpin St., Sta Cruz Manila', NULL, NULL, NULL),
(241, 767, NULL, NULL, NULL, '7-26th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(242, 770, NULL, NULL, NULL, 'Sto. Cristo, Angeles City', NULL, NULL, NULL),
(243, 772, NULL, NULL, NULL, '58-11th St., WestTapinac, Olongapo City', NULL, NULL, NULL),
(244, 777, NULL, NULL, NULL, '37 Balagtas St., cor. Apitong St., Marikina Heights, Marikina City', NULL, NULL, NULL),
(245, 780, NULL, NULL, NULL, '18-C Herbosa Street, Tondo Manila', NULL, NULL, NULL),
(246, 784, NULL, NULL, NULL, 'Caloocan City', NULL, NULL, NULL),
(247, 788, NULL, NULL, NULL, 'Rizal Ave., E.B.B, Olongapo City', NULL, NULL, NULL),
(248, 792, NULL, NULL, NULL, 'Pag-asa, Olongapo City', NULL, NULL, NULL),
(249, 807, NULL, NULL, NULL, '4 Purok 2 San Pedro, Hagonoy Bulacan', NULL, NULL, NULL),
(250, 810, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(251, 812, NULL, NULL, NULL, '9801 A-B-C Mabalacat Techno Center, Paralayunan Mabalacat Pampanga', NULL, NULL, NULL),
(252, 813, NULL, NULL, NULL, 'Timog Park Angeles', NULL, NULL, NULL),
(253, 814, NULL, NULL, NULL, 'Mabalacat, Pampanga', NULL, NULL, NULL),
(254, 815, NULL, NULL, NULL, '1150 Rizal Ave., East Tapinac, Olongapo City', NULL, NULL, NULL),
(255, 818, NULL, NULL, NULL, '57-18th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(256, 820, NULL, NULL, NULL, '12-A-26th St., E.B.B., Olongapo City', NULL, NULL, NULL),
(257, 821, NULL, NULL, NULL, 'Damsite, Lower Sibul, Natl Highway, W.B.B., Olongapo City ', NULL, NULL, NULL),
(258, 825, NULL, NULL, NULL, 'B.Mendoza St., Sto Rosario, City of San Fernando, Pampanga', NULL, NULL, NULL),
(259, 829, NULL, NULL, NULL, '90 Otero, Ave., Mabayuan, Olongapo City', NULL, NULL, NULL),
(260, 830, NULL, NULL, NULL, '3F Josemar Bldg. Mandaluyng City', NULL, NULL, NULL),
(261, 832, NULL, NULL, NULL, 'City of San Fernando Pampanga', NULL, NULL, NULL),
(262, 834, NULL, NULL, NULL, 'Iba Zambales', NULL, NULL, NULL),
(263, 836, NULL, NULL, NULL, '2F Global Enterprises Bldg., H.V. Dela Costa Salcedo VLG Makati City', NULL, NULL, NULL),
(264, 837, NULL, NULL, NULL, '2nd Fl. Global Enterprise Bldg. H.V. Dela Costa St., Salgado Village, Makati City', NULL, NULL, NULL),
(265, 843, NULL, NULL, NULL, 'Bldg 8162 Lot2 Boton Area, SBFZ', NULL, NULL, NULL),
(266, 846, NULL, NULL, NULL, '115 Kessing St., New Kalalake, Olongapo City', NULL, NULL, NULL),
(267, 847, NULL, NULL, NULL, 'Meycauayan, Bulacan', NULL, NULL, NULL),
(268, 849, NULL, NULL, NULL, 'Purok 1 Baliti, City of San Fernando, Pampanga', NULL, NULL, NULL),
(269, 852, NULL, NULL, NULL, '2704 Rizal Ave., E.B.B., Olongapo City', NULL, NULL, NULL),
(270, 854, NULL, NULL, NULL, '32 Barretto St., E.B.B., Olongapo City', NULL, NULL, NULL),
(271, 856, NULL, NULL, NULL, 'Quezon City Manila', NULL, NULL, NULL),
(272, 859, NULL, NULL, NULL, '443 Mercurio Ext., Mabayuan, Olongapo City', NULL, NULL, NULL),
(273, 860, NULL, NULL, NULL, 'SM City Olongapo ', NULL, NULL, NULL),
(274, 864, NULL, NULL, NULL, 'Bacolod City', NULL, NULL, NULL),
(275, 865, NULL, NULL, NULL, 'Block 4, Lot 5 & 6 7th St., Capitol Subd., Brgy 7, Bacolod City', NULL, NULL, NULL),
(276, 868, NULL, NULL, NULL, 'Blk. 5 Lot 64 Sunrays Village, Guyong, Sta. Maria, Bulacan', NULL, NULL, NULL),
(277, 873, NULL, NULL, NULL, 'West Tapinac, Olongapo City', NULL, NULL, NULL),
(278, 876, NULL, NULL, NULL, '655 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(279, 880, NULL, NULL, NULL, '6 Caron St., W.B.B., Olongapo City', NULL, NULL, NULL),
(280, 904, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(281, 905, NULL, NULL, NULL, '40 National Hi-way, Barretto, Olongapo City', NULL, NULL, NULL),
(282, 914, NULL, NULL, NULL, 'Harbor Point, SBFZ', NULL, NULL, NULL),
(283, 915, NULL, NULL, NULL, 'Para�aque City', NULL, NULL, NULL),
(284, 916, NULL, NULL, NULL, '62A Innovative St. Subic Bay Gateway Park, SBFZ', NULL, NULL, NULL),
(285, 919, NULL, NULL, NULL, 'Tala Orani, Bataan', NULL, NULL, NULL),
(286, 922, NULL, NULL, NULL, '16 Mt. Apo St., East Tapinac, Olongapo City', NULL, NULL, NULL),
(287, 928, NULL, NULL, NULL, 'Sta. Monica, Lubao, Pampanga', NULL, NULL, NULL),
(288, 932, NULL, NULL, NULL, 'Afable St., E.B.B., Olongapo City', NULL, NULL, NULL),
(289, 933, NULL, NULL, NULL, 'Benedictine Nuns, salong, Calapan City Mindoro', NULL, NULL, NULL),
(290, 936, NULL, NULL, NULL, '1840 Rizal Ave., EBB, Olongapo City', NULL, NULL, NULL),
(291, 938, NULL, NULL, NULL, 'Mc Arthur Hi-way, San Isidro, City of San Fernando Pampanga', NULL, NULL, NULL),
(292, 939, NULL, NULL, NULL, 'Mc arthur Hi-way, San Isidro, City of San Fernando Pampanga', NULL, NULL, NULL),
(293, 941, NULL, NULL, NULL, '1647 Taft Ave., Malate Manila', NULL, NULL, NULL),
(294, 943, NULL, NULL, NULL, '#12 Mahiyain St., Sikatuna Village, Quezon City', NULL, NULL, NULL),
(295, 949, NULL, NULL, NULL, '39-21st St., W.B.B., Olongapo City', NULL, NULL, NULL),
(296, 954, NULL, NULL, NULL, 'Sitio Matang EB, Hi-way, Hanjin, Cawag, Subic, Zambales', NULL, NULL, NULL),
(297, 956, NULL, NULL, NULL, 'Makati City', NULL, NULL, NULL),
(298, 958, NULL, NULL, NULL, '1 Harris St., E.B.B., Olongapo City', NULL, NULL, NULL),
(299, 959, NULL, NULL, NULL, '1 Harris, E.B.B., Olongapo City', NULL, NULL, NULL),
(300, 966, NULL, NULL, NULL, 'Unit C LRDC Annex Bldg #141 A Sgt. Esguerra Ave.,Quezon City', NULL, NULL, NULL),
(301, 967, NULL, NULL, NULL, '66 United St., Mandaluyong City', NULL, NULL, NULL),
(302, 972, NULL, NULL, NULL, '84 Calapandayan, Subic Zambales', NULL, NULL, NULL),
(303, 973, NULL, NULL, NULL, '50  Gordon Ave., Olongapo city', NULL, NULL, NULL),
(304, 975, NULL, NULL, NULL, 'City of San Fernando Pampanga', NULL, NULL, NULL),
(305, 980, NULL, NULL, NULL, '23 Arthur, W.B.B., Olongapo City', NULL, NULL, NULL),
(306, 983, NULL, NULL, NULL, '8 Afable St., E.B.B., Olongapo City', NULL, NULL, NULL),
(307, 988, NULL, NULL, NULL, 'B12-L3-P3, Dizon Estate, San Agustin, San Fernando City Pampanga', NULL, NULL, NULL),
(308, 989, NULL, NULL, NULL, 'Sinabacan Candelaria Zambales 2212', NULL, NULL, NULL),
(309, 990, NULL, NULL, NULL, 'Gilmore ave., New Manila, Quezon City', NULL, NULL, NULL),
(310, 993, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(311, 995, NULL, NULL, NULL, '1295 Rizal Ave., West Tapinac, Olongapo City', NULL, NULL, NULL),
(312, 1005, NULL, NULL, NULL, '6-B C.C. Benitez St., Cubao, Quezon City', NULL, NULL, NULL),
(313, 1006, NULL, NULL, NULL, 'Brgy. Bugnay Diadi Nueva Vizcaya', NULL, NULL, NULL),
(314, 1007, NULL, NULL, NULL, 'San Juan, Castillejos, zambales', NULL, NULL, NULL),
(315, 1017, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(316, 1018, NULL, NULL, NULL, 'Timog Subd., Angeles City', NULL, NULL, NULL),
(317, 1019, NULL, NULL, NULL, 'E-21st St., E.B.B., Olongapo City', NULL, NULL, NULL),
(318, 1021, NULL, NULL, NULL, '14-21st ST., E.B.B., Olongapo City', NULL, NULL, NULL),
(319, 1030, NULL, NULL, NULL, 'Cabuyao, Laguna', NULL, NULL, NULL),
(320, 1032, NULL, NULL, NULL, '40 Elica�o St., E.B.B., Olongapo City', NULL, NULL, NULL),
(321, 1033, NULL, NULL, NULL, 'SBFZ', NULL, NULL, NULL),
(322, 1044, NULL, NULL, NULL, '2725 Rizal Ave., W.B.B., Olongapo City', NULL, NULL, NULL),
(323, 1045, NULL, NULL, NULL, 'Baguio', NULL, '2019-04-01 19:22:24', '2019-04-01 19:22:24'),
(324, 1, NULL, NULL, NULL, 'Baguio', NULL, '2019-07-16 21:35:36', '2019-07-16 21:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contact`
--

CREATE TABLE `supplier_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL COMMENT 'refer to supplier_info id',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_info`
--

CREATE TABLE `supplier_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `supplier_info`
--

INSERT INTO `supplier_info` (`id`, `title`, `desc`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '244 AUTO GLASS & ALUMINUM', '244 AUTO GLASS & ALUMINUM', 3, NULL, NULL, NULL),
(2, '310 F. Lara St., Tibag, Baliuag, Bulacan', '310 F. Lara St., Tibag, Baliuag, Bulacan', 1, NULL, NULL, NULL),
(3, '36 MONTHS IT SOLUTIONS', '36 MONTHS IT SOLUTIONS', 2, NULL, NULL, NULL),
(4, '3J\'s HARDWARE', '3J\'s HARDWARE', 1, NULL, NULL, NULL),
(5, '4 A\'s AUTO REPAIR & PARTS', '4 A\'s AUTO REPAIR & PARTS', 1, NULL, NULL, NULL),
(6, '4 WHEEL AUTO SUPPLY', '4 WHEEL AUTO SUPPLY', 2, NULL, NULL, NULL),
(7, '4A\'s AUTO REPAIR & SERVICES', '4A\'s AUTO REPAIR & SERVICES', 2, NULL, NULL, NULL),
(8, '515CT CAR CARE CENTER', '515CT CAR CARE CENTER', 3, NULL, NULL, NULL),
(9, '515CT CAR CARE CENTER', '515CT CAR CARE CENTER', 1, NULL, NULL, NULL),
(10, '7-ELEVEN', '7-ELEVEN', 3, NULL, NULL, NULL),
(11, '868 NEW MABUHAY TRADE & BUSINESS INC.', '868 NEW MABUHAY TRADE & BUSINESS INC.', 3, NULL, NULL, NULL),
(12, 'A & Z CAF�', 'A & Z CAF�', 2, NULL, NULL, NULL),
(13, 'A.J. & A.L. LAPTOP GADGETS TRADING', 'A.J. & A.L. LAPTOP GADGETS TRADING', 2, NULL, NULL, NULL),
(14, 'A.L.D. REFRIGERATION AIR CONDITIONING SERVICE', 'A.L.D. REFRIGERATION AIR CONDITIONING SERVICE', 1, NULL, NULL, NULL),
(15, 'A.P. LIM ENTERPRISE', 'A.P. LIM ENTERPRISE', 1, NULL, NULL, NULL),
(16, 'A-1 AGRO FERTILIZERS & CHEMICAL SUPPLY', 'A-1 AGRO FERTILIZERS & CHEMICAL SUPPLY', 1, NULL, NULL, NULL),
(17, 'AARON\'S PRINTING PRESS', 'AARON\'S PRINTING PRESS', 3, NULL, NULL, NULL),
(18, 'AB DIZON ENTERPRISES', 'AB DIZON ENTERPRISES', 2, NULL, NULL, NULL),
(19, 'ABJAR COLLECTION\'S', 'ABJAR COLLECTION\'S', 1, NULL, NULL, NULL),
(20, 'ACE EMPIRE TRADING', 'ACE EMPIRE TRADING', 1, NULL, NULL, NULL),
(21, 'ACE HARDWARE', 'ACE HARDWARE', 3, NULL, NULL, NULL),
(22, 'ACS CYCLE PARTS', 'ACS CYCLE PARTS', 1, NULL, NULL, NULL),
(23, 'ACTION LABS IT SERVICES', 'ACTION LABS IT SERVICES', 3, NULL, NULL, NULL),
(24, 'ADVENT INDUSTRIAL MACHENERIES, PARTS & SERVICES', 'ADVENT INDUSTRIAL MACHENERIES, PARTS & SERVICES', 1, NULL, NULL, NULL),
(25, 'AELS ELECTRONICS REPAIR SHOP', 'AELS ELECTRONICS REPAIR SHOP', 3, NULL, NULL, NULL),
(26, 'AGI\'S LAUNDRY SERVICES', 'AGI\'S LAUNDRY SERVICES', 2, NULL, NULL, NULL),
(27, 'AGUA BIYAYA WATER REFILLING STATION', 'AGUA BIYAYA WATER REFILLING STATION', 1, NULL, NULL, NULL),
(28, 'AIDA\'S SANTOS RAMIREZ TRADING', 'AIDA\'S SANTOS RAMIREZ TRADING', 2, NULL, NULL, NULL),
(29, 'AIM HIGH SECURITY & WATCHMAN AGENCY', 'AIM HIGH SECURITY & WATCHMAN AGENCY', 3, NULL, NULL, NULL),
(30, 'AKINTO MARKETING CORP.', 'AKINTO MARKETING CORP.', 2, NULL, NULL, NULL),
(31, 'AKY TRADING & GEN. MDSE', 'AKY TRADING & GEN. MDSE', 1, NULL, NULL, NULL),
(32, 'ALDICONS TRADING INC.', 'ALDICONS TRADING INC.', 2, NULL, NULL, NULL),
(33, 'ALDRICH INDUSTRIAL REPAIR', 'ALDRICH INDUSTRIAL REPAIR', 2, NULL, NULL, NULL),
(34, 'ALDRICH INDUSTRIAL REPAIR & SERVICE', 'ALDRICH INDUSTRIAL REPAIR & SERVICE', 2, NULL, NULL, NULL),
(35, 'ALDRIN MEDIC MARKETING SERVICES', 'ALDRIN MEDIC MARKETING SERVICES', 1, NULL, NULL, NULL),
(36, 'ALEN VINCI ELECTRONICS & TRADING CENTER', 'ALEN VINCI ELECTRONICS & TRADING CENTER', 3, NULL, NULL, NULL),
(37, 'ALICE VARIETY & FROZEN PRODUCT', 'ALICE VARIETY & FROZEN PRODUCT', 3, NULL, NULL, NULL),
(38, 'ALL RECOGNITION GIFT-DAU BRANCH', 'ALL RECOGNITION GIFT-DAU BRANCH', 1, NULL, NULL, NULL),
(39, 'ALL-IN-GEN. MDSE. ', 'ALL-IN-GEN. MDSE. ', 3, NULL, NULL, NULL),
(40, 'ALMCO CAR CARE SERVICE CENTRE', 'ALMCO CAR CARE SERVICE CENTRE', 3, NULL, NULL, NULL),
(41, 'ALPHAMED PHARMA', 'ALPHAMED PHARMA', 3, NULL, NULL, NULL),
(42, 'AMASAN LETTER PRESS & OFFSET PRINTING', 'AMASAN LETTER PRESS & OFFSET PRINTING', 2, NULL, NULL, NULL),
(43, 'AMBEN AUTO ELEC. & CAR AIRCON SHOP', 'AMBEN AUTO ELEC. & CAR AIRCON SHOP', 2, NULL, NULL, NULL),
(44, 'ANALYTE TRADING', 'ANALYTE TRADING', 3, NULL, NULL, NULL),
(45, 'ANGEL MUSIC AND SPORTS CENTER', 'ANGEL MUSIC AND SPORTS CENTER', 1, NULL, NULL, NULL),
(46, 'ANGEL TOUCHE\'S INKS & PRINTS', 'ANGEL TOUCHE\'S INKS & PRINTS', 3, NULL, NULL, NULL),
(47, 'ANGEL TOY HOUSE', 'ANGEL TOY HOUSE', 3, NULL, NULL, NULL),
(48, 'ANGELES HONRADE STORE', 'ANGELES HONRADE STORE', 3, NULL, NULL, NULL),
(49, 'ANGEL\'S BURGER', 'ANGEL\'S BURGER', 1, NULL, NULL, NULL),
(50, 'ANNE RAQUEL\'S HILLSIDE RESORT, INC.', 'ANNE RAQUEL\'S HILLSIDE RESORT, INC.', 3, NULL, NULL, NULL),
(51, 'ANNROB TRADING', 'ANNROB TRADING', 1, NULL, NULL, NULL),
(52, 'ANTHONY PASIA DRY GOODS', 'ANTHONY PASIA DRY GOODS', 2, NULL, NULL, NULL),
(53, 'APR GENERAL MERCHANDISE', 'APR GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(54, 'AQUAPIK PURIFIED WATER REFILLING STATION', 'AQUAPIK PURIFIED WATER REFILLING STATION', 1, NULL, NULL, NULL),
(55, 'ARISTOCRAT RESTAURANT', 'ARISTOCRAT RESTAURANT', 1, NULL, NULL, NULL),
(56, 'ARISTOCRAT SUBIC HOMES FOOD, INC.', 'ARISTOCRAT SUBIC HOMES FOOD, INC.', 3, NULL, NULL, NULL),
(57, 'ARJ FOOD CORP.(RED RIBBON)', 'ARJ FOOD CORP.(RED RIBBON)', 2, NULL, NULL, NULL),
(58, 'ARJ FOOD CORPORATION', 'ARJ FOOD CORPORATION', 1, NULL, NULL, NULL),
(59, 'ARLENE\'S INN', 'ARLENE\'S INN', 2, NULL, NULL, NULL),
(60, 'ARLENE\'S INN 3', 'ARLENE\'S INN 3', 2, NULL, NULL, NULL),
(61, 'ARMAK RADIATOR REPAIR SHOP', 'ARMAK RADIATOR REPAIR SHOP', 1, NULL, NULL, NULL),
(62, 'ARMALEEN CELLPHONE & ACCESSORIES TRADING', 'ARMALEEN CELLPHONE & ACCESSORIES TRADING', 3, NULL, NULL, NULL),
(63, 'ARMAN\'S MUSICAL INSTRUMENT REPAIR SHOP', 'ARMAN\'S MUSICAL INSTRUMENT REPAIR SHOP', 3, NULL, NULL, NULL),
(64, 'ART SPEED PRINT GRAPHICS', 'ART SPEED PRINT GRAPHICS', 2, NULL, NULL, NULL),
(65, 'ASAYSI TRADING', 'ASAYSI TRADING', 3, NULL, NULL, NULL),
(66, 'ATAW MARKETING', 'ATAW MARKETING', 3, NULL, NULL, NULL),
(67, 'ATAW MARKETING', 'ATAW MARKETING', 2, NULL, NULL, NULL),
(68, 'AUDIO FREQUENCY LIGHTS & SOUNDS', 'AUDIO FREQUENCY LIGHTS & SOUNDS', 2, NULL, NULL, NULL),
(69, 'AUREN CRYSTAL RICE DEALER', 'AUREN CRYSTAL RICE DEALER', 3, NULL, NULL, NULL),
(70, 'AUS TRADING', 'AUS TRADING', 1, NULL, NULL, NULL),
(71, 'AUSTIN WATER REFILLING STATION', 'AUSTIN WATER REFILLING STATION', 3, NULL, NULL, NULL),
(72, 'AZE T-SHIRT PRINTING', 'AZE T-SHIRT PRINTING', 2, NULL, NULL, NULL),
(73, 'B & K TRADING', 'B & K TRADING', 3, NULL, NULL, NULL),
(74, 'BABIERA & INFORNON GEN. MDSE ', 'BABIERA & INFORNON GEN. MDSE ', 2, NULL, NULL, NULL),
(75, 'BABY ANGEL\'S CANTEEN', 'BABY ANGEL\'S CANTEEN', 2, NULL, NULL, NULL),
(76, 'BABYLYN\'S GENERAL MERCHANDISE', 'BABYLYN\'S GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(77, 'BACON MARKETING', 'BACON MARKETING', 1, NULL, NULL, NULL),
(78, 'BAGUMBAYAN VOLUNTEERS OF OLONGAPO CITY, INC.', 'BAGUMBAYAN VOLUNTEERS OF OLONGAPO CITY, INC.', 3, NULL, NULL, NULL),
(79, 'BALANGA-OLONGAPO TRANSPORT SERVICE COOP', 'BALANGA-OLONGAPO TRANSPORT SERVICE COOP', 2, NULL, NULL, NULL),
(80, 'BALUYOT FLOWER SHOP', 'BALUYOT FLOWER SHOP', 3, NULL, NULL, NULL),
(81, 'BAXLEY TAILOR SHOP', 'BAXLEY TAILOR SHOP', 3, NULL, NULL, NULL),
(82, 'BAY CALIBRATION & DIESEL SERVICE SHOP', 'BAY CALIBRATION & DIESEL SERVICE SHOP', 2, NULL, NULL, NULL),
(83, 'BAY PRESS (SUBIC) CORP.', 'BAY PRESS (SUBIC) CORP.', 3, NULL, NULL, NULL),
(84, 'BAYFRESH REFILLING STATION', 'BAYFRESH REFILLING STATION', 2, NULL, NULL, NULL),
(85, 'BAYFRONT HOTEL', 'BAYFRONT HOTEL', 1, NULL, NULL, NULL),
(86, 'BCM PEST MANAGEMENT SYSTEMS', 'BCM PEST MANAGEMENT SYSTEMS', 1, NULL, NULL, NULL),
(87, 'BCR TRUCKING', 'BCR TRUCKING', 3, NULL, NULL, NULL),
(88, 'BEA\'S KITCHEN', 'BEA\'S KITCHEN', 2, NULL, NULL, NULL),
(89, 'BENGDEG RENT A CAR', 'BENGDEG RENT A CAR', 3, NULL, NULL, NULL),
(90, 'BENIEL\'S VARIETY STORE', 'BENIEL\'S VARIETY STORE', 2, NULL, NULL, NULL),
(91, 'BENJIE\'S MUSIC HAUS', 'BENJIE\'S MUSIC HAUS', 1, NULL, NULL, NULL),
(92, 'BEN\'S OK CAR ACCESSORIES & PARTS CENTER', 'BEN\'S OK CAR ACCESSORIES & PARTS CENTER', 3, NULL, NULL, NULL),
(93, 'BERNIE\'S MUFFLER WELDING SHOP', 'BERNIE\'S MUFFLER WELDING SHOP', 3, NULL, NULL, NULL),
(94, 'BERTZ CAR WASH', 'BERTZ CAR WASH', 2, NULL, NULL, NULL),
(95, 'BIOCARE HEALTH RESOURCES', 'BIOCARE HEALTH RESOURCES', 2, NULL, NULL, NULL),
(96, 'BIOMAXX RESOURCES, INC.', 'BIOMAXX RESOURCES, INC.', 3, NULL, NULL, NULL),
(97, 'BIYAYA CANTEEN & CATERING SERVICES', 'BIYAYA CANTEEN & CATERING SERVICES', 2, NULL, NULL, NULL),
(98, 'BJ ROOF CENTER & METAL FABRICATION', 'BJ ROOF CENTER & METAL FABRICATION', 2, NULL, NULL, NULL),
(99, 'BLACKBEARD SEAFOOD ISLAND RESTAURANT', 'BLACKBEARD SEAFOOD ISLAND RESTAURANT', 3, NULL, NULL, NULL),
(100, 'BLADE ASIA, INC.', 'BLADE ASIA, INC.', 2, NULL, NULL, NULL),
(101, 'BLUE CRYSTAL WATER REFILLING STATION', 'BLUE CRYSTAL WATER REFILLING STATION', 3, NULL, NULL, NULL),
(102, 'BLUE ROCK CORPORATION', 'BLUE ROCK CORPORATION', 2, NULL, NULL, NULL),
(103, 'BON\'S RESTAURANT', 'BON\'S RESTAURANT', 1, NULL, NULL, NULL),
(104, 'BREAD SMILE BAKESHOP', 'BREAD SMILE BAKESHOP', 1, NULL, NULL, NULL),
(105, 'BRENTWOOD APARTELLE', 'BRENTWOOD APARTELLE', 1, NULL, NULL, NULL),
(106, 'BRITTON DISTRIBUTIONS, INC.', 'BRITTON DISTRIBUTIONS, INC.', 1, NULL, NULL, NULL),
(107, 'BRIXMED PHARMACEUTICALS', 'BRIXMED PHARMACEUTICALS', 3, NULL, NULL, NULL),
(108, 'BRP PENTAGRAPH ADVERTISING', 'BRP PENTAGRAPH ADVERTISING', 1, NULL, NULL, NULL),
(109, 'BRYCE ENTERPRISES', 'BRYCE ENTERPRISES', 1, NULL, NULL, NULL),
(110, 'BUENAFE PROGRESSIVE RELIABLE EMPLOYMENT & SECURITY SER. AGENCY', 'BUENAFE PROGRESSIVE RELIABLE EMPLOYMENT & SECURITY SER. AGENCY', 2, NULL, NULL, NULL),
(111, 'BUGHAW GENERAL MERCHANDISE', 'BUGHAW GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(112, 'BUILDMATE MARKETING', 'BUILDMATE MARKETING', 3, NULL, NULL, NULL),
(113, 'BULGOGI BROTHERS, SUBIC RESTO CORP.', 'BULGOGI BROTHERS, SUBIC RESTO CORP.', 1, NULL, NULL, NULL),
(114, 'BUMA SUBIC HOTEL', 'BUMA SUBIC HOTEL', 2, NULL, NULL, NULL),
(115, 'BUMA SUBIC RESTAURANT', 'BUMA SUBIC RESTAURANT', 3, NULL, NULL, NULL),
(116, 'BUREAU OF INTERNAL REVENUE', 'BUREAU OF INTERNAL REVENUE', 3, NULL, NULL, NULL),
(117, 'BURGER KING', 'BURGER KING', 3, NULL, NULL, NULL),
(118, 'BVM BIOMEDICAL TRADING', 'BVM BIOMEDICAL TRADING', 1, NULL, NULL, NULL),
(119, 'BY THE SEA RESORT RESTAURANT', 'BY THE SEA RESORT RESTAURANT', 1, NULL, NULL, NULL),
(120, 'C&E PUBLISHING, INC.', 'C&E PUBLISHING, INC.', 3, NULL, NULL, NULL),
(121, 'C.G. CALIBRATION CENTER', 'C.G. CALIBRATION CENTER', 2, NULL, NULL, NULL),
(122, 'C.M. SANTIAGO ADS', 'C.M. SANTIAGO ADS', 1, NULL, NULL, NULL),
(123, 'C.M. SANTIAGO ADVERTISING', 'C.M. SANTIAGO ADVERTISING', 3, NULL, NULL, NULL),
(124, 'CABALEN RESTAURANT', 'CABALEN RESTAURANT', 1, NULL, NULL, NULL),
(125, 'CALOOCAN GAS CORPORATION', 'CALOOCAN GAS CORPORATION', 3, NULL, NULL, NULL),
(126, 'CALOOCAN SALES CENTER INC.', 'CALOOCAN SALES CENTER INC.', 3, NULL, NULL, NULL),
(127, 'CALTEX SERVICE STATION ', 'CALTEX SERVICE STATION ', 2, NULL, NULL, NULL),
(128, 'CAMAYAN BEACH RESORT HOTEL', 'CAMAYAN BEACH RESORT HOTEL', 1, NULL, NULL, NULL),
(129, 'CAMAYAN RESORT', 'CAMAYAN RESORT', 2, NULL, NULL, NULL),
(130, 'CAPSMAKER INC.', 'CAPSMAKER INC.', 1, NULL, NULL, NULL),
(131, 'CARELINE ENTERPRISES', 'CARELINE ENTERPRISES', 2, NULL, NULL, NULL),
(132, 'CARESTREAM', 'CARESTREAM', 3, NULL, NULL, NULL),
(133, 'CAREWAY ENTERPRISES', 'CAREWAY ENTERPRISES', 2, NULL, NULL, NULL),
(134, 'CARLSHEY RTW', 'CARLSHEY RTW', 3, NULL, NULL, NULL),
(135, 'CARWOLRD SUBIC, INC.', 'CARWOLRD SUBIC, INC.', 2, NULL, NULL, NULL),
(136, 'CASA ENZO AUTOMOTIVE SERVICE CENTER', 'CASA ENZO AUTOMOTIVE SERVICE CENTER', 2, NULL, NULL, NULL),
(137, 'CASANDIG WELDING & MUFFLER SHOP', 'CASANDIG WELDING & MUFFLER SHOP', 1, NULL, NULL, NULL),
(138, 'CATALOGUE SALES & SERVICES, INC.', 'CATALOGUE SALES & SERVICES, INC.', 3, NULL, NULL, NULL),
(139, 'CATCOR RENT A CAR', 'CATCOR RENT A CAR', 3, NULL, NULL, NULL),
(140, 'CATHAY DRUG, INC.', 'CATHAY DRUG, INC.', 3, NULL, NULL, NULL),
(141, 'CATLETTE\'S BEADS & CRAFTS SHOP', 'CATLETTE\'S BEADS & CRAFTS SHOP', 2, NULL, NULL, NULL),
(142, 'CB TAMPENGCO CONSTRUCTION & SUPPLY', 'CB TAMPENGCO CONSTRUCTION & SUPPLY', 3, NULL, NULL, NULL),
(143, 'CCGA REAL ESTATE SERVICES & ADVISORY', 'CCGA REAL ESTATE SERVICES & ADVISORY', 2, NULL, NULL, NULL),
(144, 'CCS BIOMEDICAL TRADING', 'CCS BIOMEDICAL TRADING', 2, NULL, NULL, NULL),
(145, 'CD R KING GEN. MDSE', 'CD R KING GEN. MDSE', 3, NULL, NULL, NULL),
(146, 'CD-R KING GENERAL MERCHANDISE', 'CD-R KING GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(147, 'CENTERPNT FOODS CORP/DUNKIN\' DONATS', 'CENTERPNT FOODS CORP/DUNKIN\' DONATS', 3, NULL, NULL, NULL),
(148, 'CENTRELLE ENTERPRISES', 'CENTRELLE ENTERPRISES', 3, NULL, NULL, NULL),
(149, 'CENTRO AUTO SUPPLY', 'CENTRO AUTO SUPPLY', 3, NULL, NULL, NULL),
(150, 'CES\'T LA VIE APARTELLE', 'CES\'T LA VIE APARTELLE', 3, NULL, NULL, NULL),
(151, 'CHAIN E BUILDERS', 'CHAIN E BUILDERS', 3, NULL, NULL, NULL),
(152, 'CHATO\'S PHOTO OLONGAPO', 'CHATO\'S PHOTO OLONGAPO', 1, NULL, NULL, NULL),
(153, 'CHEDDA GENERAL MERCHANDISE', 'CHEDDA GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(154, 'CHEF SAMURAI SUSHI & SAKE', 'CHEF SAMURAI SUSHI & SAKE', 1, NULL, NULL, NULL),
(155, 'CHEF\'S AVE. CANTEEN & CATERING', 'CHEF\'S AVE. CANTEEN & CATERING', 1, NULL, NULL, NULL),
(156, 'CHEF\'S AVENUE', 'CHEF\'S AVENUE', 2, NULL, NULL, NULL),
(157, 'CHELOUDEN DRUG STORE', 'CHELOUDEN DRUG STORE', 2, NULL, NULL, NULL),
(158, 'CHESS ARBITERS UNION OF THE PHIL.', 'CHESS ARBITERS UNION OF THE PHIL.', 2, NULL, NULL, NULL),
(159, 'CHOAS FOR EVERYTHING SUPERMART', 'CHOAS FOR EVERYTHING SUPERMART', 2, NULL, NULL, NULL),
(160, 'CHOWKING AYALA HARBOR POINT', 'CHOWKING AYALA HARBOR POINT', 2, NULL, NULL, NULL),
(161, 'CHOWKING OLONGAPO RIZAL', 'CHOWKING OLONGAPO RIZAL', 2, NULL, NULL, NULL),
(162, 'CHOWKING SUBIC', 'CHOWKING SUBIC', 1, NULL, NULL, NULL),
(163, 'CHOWKING-OLONGAPO', 'CHOWKING-OLONGAPO', 3, NULL, NULL, NULL),
(164, 'CHRIS SPORTS SUBIC INC.', 'CHRIS SPORTS SUBIC INC.', 2, NULL, NULL, NULL),
(165, 'CIANNO\'S CANTEEN & CATERING SERVICES', 'CIANNO\'S CANTEEN & CATERING SERVICES', 2, NULL, NULL, NULL),
(166, 'CI-CAP GLASS ALUMINUM SUPPLY', 'CI-CAP GLASS ALUMINUM SUPPLY', 1, NULL, NULL, NULL),
(167, 'CINDY KELLY HOTEL', 'CINDY KELLY HOTEL', 3, NULL, NULL, NULL),
(168, 'CIRCLE J GENERAL STORES', 'CIRCLE J GENERAL STORES', 2, NULL, NULL, NULL),
(169, 'CITY GOVERNMENT OF PAMPANGA', 'CITY GOVERNMENT OF PAMPANGA', 1, NULL, NULL, NULL),
(170, 'CITY HOME APPLIANCE & FURNITURE', 'CITY HOME APPLIANCE & FURNITURE', 3, NULL, NULL, NULL),
(171, 'CITY HOMES APPLIANCE & FURNITURES CENTER', 'CITY HOMES APPLIANCE & FURNITURES CENTER', 3, NULL, NULL, NULL),
(172, 'CJR GRAPHICS AND PRINTING', 'CJR GRAPHICS AND PRINTING', 2, NULL, NULL, NULL),
(173, 'CLAUDIALICIOUS FOOD VENTURES INC.', 'CLAUDIALICIOUS FOOD VENTURES INC.', 1, NULL, NULL, NULL),
(174, 'CLEARVUE PHARMACEUTICAL', 'CLEARVUE PHARMACEUTICAL', 3, NULL, NULL, NULL),
(175, 'CLOISONNE CHEMICAL PRODUCTS, INC.', 'CLOISONNE CHEMICAL PRODUCTS, INC.', 3, NULL, NULL, NULL),
(176, 'CLOVERHOUSE FURNISING', 'CLOVERHOUSE FURNISING', 3, NULL, NULL, NULL),
(177, 'CLUB MOROCCO', 'CLUB MOROCCO', 1, NULL, NULL, NULL),
(178, 'COCOLIME RESTAURANT', 'COCOLIME RESTAURANT', 2, NULL, NULL, NULL),
(179, 'COCOLIME RESTAURANT', 'COCOLIME RESTAURANT', 2, NULL, NULL, NULL),
(180, 'COFFEE SHOP RESTAURANT', 'COFFEE SHOP RESTAURANT', 3, NULL, NULL, NULL),
(181, 'COLORCHECK PAINT ENTERPRISES', 'COLORCHECK PAINT ENTERPRISES', 2, NULL, NULL, NULL),
(182, 'COLORITE MARKETING', 'COLORITE MARKETING', 1, NULL, NULL, NULL),
(183, 'COLORITE MARKETING CORPORATION', 'COLORITE MARKETING CORPORATION', 3, NULL, NULL, NULL),
(184, 'COLORPRINT CLASSIC, INC.', 'COLORPRINT CLASSIC, INC.', 2, NULL, NULL, NULL),
(185, 'COLORVIEW CATV, INC', 'COLORVIEW CATV, INC', 1, NULL, NULL, NULL),
(186, 'COMMUTER AUTO SUPPLY', 'COMMUTER AUTO SUPPLY', 3, NULL, NULL, NULL),
(187, 'CONCORDE', 'CONCORDE', 1, NULL, NULL, NULL),
(188, 'CONDOTEL ASUNCION', 'CONDOTEL ASUNCION', 3, NULL, NULL, NULL),
(189, 'CONSTANCIA CABALAR RICE DEALER', 'CONSTANCIA CABALAR RICE DEALER', 2, NULL, NULL, NULL),
(190, 'CONSUMMARE  INC.', 'CONSUMMARE  INC.', 2, NULL, NULL, NULL),
(191, 'COPYLINK ENTERPRISES INC.', 'COPYLINK ENTERPRISES INC.', 3, NULL, NULL, NULL),
(192, 'COPYRITE INC.', 'COPYRITE INC.', 1, NULL, NULL, NULL),
(193, 'CORDS ENTERPRISE', 'CORDS ENTERPRISE', 1, NULL, NULL, NULL),
(194, 'CORK ROOM BISTRO', 'CORK ROOM BISTRO', 1, NULL, NULL, NULL),
(195, 'CORNERSTONE GOODS & GENERAL MERCHANDISE', 'CORNERSTONE GOODS & GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(196, 'CORNERSTONE SPORTING GOOD & GENERAL MERCHANDISE', 'CORNERSTONE SPORTING GOOD & GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(197, 'CORONA SUPPLY CO., INC.', 'CORONA SUPPLY CO., INC.', 1, NULL, NULL, NULL),
(198, 'CPN DRY GOODS', 'CPN DRY GOODS', 2, NULL, NULL, NULL),
(199, 'CPT PHOTO CENTER', 'CPT PHOTO CENTER', 3, NULL, NULL, NULL),
(200, 'CREA8TIVE PHOTOGRAPHY', 'CREA8TIVE PHOTOGRAPHY', 1, NULL, NULL, NULL),
(201, 'CRIS RUBBER STAMP-DRY SEAL', 'CRIS RUBBER STAMP-DRY SEAL', 1, NULL, NULL, NULL),
(202, 'CRISTINA\'S FLOWER SHOP', 'CRISTINA\'S FLOWER SHOP', 3, NULL, NULL, NULL),
(203, 'CRUISER MOTOR CYCLE PARTS & SERVICE', 'CRUISER MOTOR CYCLE PARTS & SERVICE', 1, NULL, NULL, NULL),
(204, 'CRUISER MOTOR CYCLE PARTS & SERVICE', 'CRUISER MOTOR CYCLE PARTS & SERVICE', 1, NULL, NULL, NULL),
(205, 'CRUISER MOTOR CYCLE PARTS & SERVICE', 'CRUISER MOTOR CYCLE PARTS & SERVICE', 2, NULL, NULL, NULL),
(206, 'CTC MOTORCYCLE PART & ACCESSORIES', 'CTC MOTORCYCLE PART & ACCESSORIES', 2, NULL, NULL, NULL),
(207, 'CTC\'S VUNCANIZING SHOP', 'CTC\'S VUNCANIZING SHOP', 2, NULL, NULL, NULL),
(208, 'CTERRY ENTERPRISES', 'CTERRY ENTERPRISES', 3, NULL, NULL, NULL),
(209, 'CW CARWORLD SUBIC, INC.', 'CW CARWORLD SUBIC, INC.', 2, NULL, NULL, NULL),
(210, 'CYBERTECH ROOFING INTERNATIONAL CORP.', 'CYBERTECH ROOFING INTERNATIONAL CORP.', 3, NULL, NULL, NULL),
(211, 'D\' AMARILLO TAILOR SHOP', 'D\' AMARILLO TAILOR SHOP', 2, NULL, NULL, NULL),
(212, 'D\' PESTER\'S', 'D\' PESTER\'S', 1, NULL, NULL, NULL),
(213, 'D. LIBUNAO GAS MANUFACTURING CORP.', 'D. LIBUNAO GAS MANUFACTURING CORP.', 2, NULL, NULL, NULL),
(214, 'DADDY ED\'S RESTAURANT & CONVENIENT STORE', 'DADDY ED\'S RESTAURANT & CONVENIENT STORE', 1, NULL, NULL, NULL),
(215, 'DADS, KAMAYAN, SAISAKI', 'DADS, KAMAYAN, SAISAKI', 2, NULL, NULL, NULL),
(216, 'DAJOBO-ACE TRADING', 'DAJOBO-ACE TRADING', 2, NULL, NULL, NULL),
(217, 'DAN-BETH GENERAL MERCHANDISE', 'DAN-BETH GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(218, 'DANE DEGALA CASTILLO PHARMACY', 'DANE DEGALA CASTILLO PHARMACY', 2, NULL, NULL, NULL),
(219, 'DANG RIC\'S CARINDERIA', 'DANG RIC\'S CARINDERIA', 3, NULL, NULL, NULL),
(220, 'DANJEN PANSIT MALABON', 'DANJEN PANSIT MALABON', 1, NULL, NULL, NULL),
(221, 'DARTECH COMMERCIAL & INDUSTRIAL TRADING', 'DARTECH COMMERCIAL & INDUSTRIAL TRADING', 2, NULL, NULL, NULL),
(222, 'DASH GENERAL MERCHANDISE', 'DASH GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(223, 'DATAWORX OFFICE SOLUTION', 'DATAWORX OFFICE SOLUTION', 2, NULL, NULL, NULL),
(224, 'DATAWORX OFFICE SOLUTIONS CORP.', 'DATAWORX OFFICE SOLUTIONS CORP.', 2, NULL, NULL, NULL),
(225, 'DAY & NIGHT LAUNDRY', 'DAY & NIGHT LAUNDRY', 1, NULL, NULL, NULL),
(226, 'DAY & NIGHT LAUNDRY & DRY CLEANERS', 'DAY & NIGHT LAUNDRY & DRY CLEANERS', 3, NULL, NULL, NULL),
(227, 'DAYRIT\'S KITCHEN & GRILL', 'DAYRIT\'S KITCHEN & GRILL', 1, NULL, NULL, NULL),
(228, 'DCB TRADING', 'DCB TRADING', 3, NULL, NULL, NULL),
(229, 'DDS GENERAL SERVICES ', 'DDS GENERAL SERVICES ', 3, NULL, NULL, NULL),
(230, 'DE LEON MOBILE', 'DE LEON MOBILE', 3, NULL, NULL, NULL),
(231, 'DE PESTER\'S PEST MANAGEMENT', 'DE PESTER\'S PEST MANAGEMENT', 3, NULL, NULL, NULL),
(232, 'DEGA INTERNATIONAL PHARMA', 'DEGA INTERNATIONAL PHARMA', 3, NULL, NULL, NULL),
(233, 'DEL COMPUTER ENGRAVING SERVICES', 'DEL COMPUTER ENGRAVING SERVICES', 1, NULL, NULL, NULL),
(234, 'DEL MONTE LAND TRANSPORT BUS CO., INC.', 'DEL MONTE LAND TRANSPORT BUS CO., INC.', 3, NULL, NULL, NULL),
(235, 'DEL ROSARIO MARKETING', 'DEL ROSARIO MARKETING', 1, NULL, NULL, NULL),
(236, 'DEL ROSARIO MARKETING', 'DEL ROSARIO MARKETING', 2, NULL, NULL, NULL),
(237, 'DENISE PARES HAUS, ET. AL.', 'DENISE PARES HAUS, ET. AL.', 1, NULL, NULL, NULL),
(238, 'DEPED EMPLOYEES COOPERATIVE', 'DEPED EMPLOYEES COOPERATIVE', 1, NULL, NULL, NULL),
(239, 'D\'FOURTH RENT A CAR', 'D\'FOURTH RENT A CAR', 3, NULL, NULL, NULL),
(240, 'DHEL\'S CALIBRATION', 'DHEL\'S CALIBRATION', 1, NULL, NULL, NULL),
(241, 'DHUSTIN AUTO WORKS', 'DHUSTIN AUTO WORKS', 3, NULL, NULL, NULL),
(242, 'DIZON ENTERPRISES', 'DIZON ENTERPRISES', 3, NULL, NULL, NULL),
(243, 'DIZON LUMBER, HARDWARE & ELECTRICAL SUPPLY', 'DIZON LUMBER, HARDWARE & ELECTRICAL SUPPLY', 1, NULL, NULL, NULL),
(244, 'DJ PARADISE RESORT, INC.', 'DJ PARADISE RESORT, INC.', 1, NULL, NULL, NULL),
(245, 'DMC COLUMBUS MARKETING PHILS., INC.', 'DMC COLUMBUS MARKETING PHILS., INC.', 3, NULL, NULL, NULL),
(246, 'DOKIK\'S FOOD CORP.', 'DOKIK\'S FOOD CORP.', 1, NULL, NULL, NULL),
(247, 'DON GILBERTO P. ROMULO FARMER\'S TRAINING CENTER', 'DON GILBERTO P. ROMULO FARMER\'S TRAINING CENTER', 1, NULL, NULL, NULL),
(248, 'DPI-DIORELLA PRINTSHOP INT\'L CORP.', 'DPI-DIORELLA PRINTSHOP INT\'L CORP.', 3, NULL, NULL, NULL),
(249, 'DREAM OUT LOUD EVENTS & MARKETING', 'DREAM OUT LOUD EVENTS & MARKETING', 1, NULL, NULL, NULL),
(250, 'DUENAS SEPTIC TANK SERVICE', 'DUENAS SEPTIC TANK SERVICE', 2, NULL, NULL, NULL),
(251, 'DUE�AS SEPTIC TANK SERVICES', 'DUE�AS SEPTIC TANK SERVICES', 1, NULL, NULL, NULL),
(252, 'DUNKIN\' DONUTS', 'DUNKIN\' DONUTS', 2, NULL, NULL, NULL),
(253, 'DURAN MARKETING', 'DURAN MARKETING', 3, NULL, NULL, NULL),
(254, 'DUYAN PENSION HOUSE', 'DUYAN PENSION HOUSE', 3, NULL, NULL, NULL),
(255, 'DXE MARKETING', 'DXE MARKETING', 2, NULL, NULL, NULL),
(256, 'E.C.S. EATERY & FOOD SERVICES', 'E.C.S. EATERY & FOOD SERVICES', 1, NULL, NULL, NULL),
(257, 'E.M. PAULE TRADING', 'E.M. PAULE TRADING', 1, NULL, NULL, NULL),
(258, 'E.R.T. GENERAL MERCHANDISE', 'E.R.T. GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(259, 'E2 & I ENTERPRISES', 'E2 & I ENTERPRISES', 3, NULL, NULL, NULL),
(260, 'EASTERN MACHINE WORKS, INC.', 'EASTERN MACHINE WORKS, INC.', 2, NULL, NULL, NULL),
(261, 'EBB TIRE CENTER & SERVICES', 'EBB TIRE CENTER & SERVICES', 2, NULL, NULL, NULL),
(262, 'EC SOLIMAN, JR. CONSTRUCTION &  TRADING', 'EC SOLIMAN, JR. CONSTRUCTION &  TRADING', 3, NULL, NULL, NULL),
(263, 'EDMAG CONSTRUCTION SERVICES', 'EDMAG CONSTRUCTION SERVICES', 3, NULL, NULL, NULL),
(264, 'EDWIN & ROSE VARIETY STORE', 'EDWIN & ROSE VARIETY STORE', 2, NULL, NULL, NULL),
(265, 'EFREN MORALES AUTO REPAIR', 'EFREN MORALES AUTO REPAIR', 2, NULL, NULL, NULL),
(266, 'EJ WEST WING CANTEEN', 'EJ WEST WING CANTEEN', 1, NULL, NULL, NULL),
(267, 'EL-DO-RA-MI CONSTRUCTION & SERVICES CO.', 'EL-DO-RA-MI CONSTRUCTION & SERVICES CO.', 2, NULL, NULL, NULL),
(268, 'ELEMENTS DESIGN AND PRINT', 'ELEMENTS DESIGN AND PRINT', 2, NULL, NULL, NULL),
(269, 'ELEVEN FOURTEEN MARKETING', 'ELEVEN FOURTEEN MARKETING', 3, NULL, NULL, NULL),
(270, 'ELIN PHARMACEUTICALS, INC.', 'ELIN PHARMACEUTICALS, INC.', 3, NULL, NULL, NULL),
(271, 'ELLEN\'S LIQUOR\'S WINES & GEN. MDSE.', 'ELLEN\'S LIQUOR\'S WINES & GEN. MDSE.', 3, NULL, NULL, NULL),
(272, 'EM & ER CONVENIENCE STORE CORP.', 'EM & ER CONVENIENCE STORE CORP.', 1, NULL, NULL, NULL),
(273, 'EMARIZ CREATIONS', 'EMARIZ CREATIONS', 1, NULL, NULL, NULL),
(274, 'EMCON GENERAL MERCHANDISE', 'EMCON GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(275, 'EMERALD CANVASS & UPHOLSTERY', 'EMERALD CANVASS & UPHOLSTERY', 3, NULL, NULL, NULL),
(276, 'EMER\'S UPHOLSTERY SUPPLY', 'EMER\'S UPHOLSTERY SUPPLY', 1, NULL, NULL, NULL),
(277, 'EM\'S AUTO SUPPLY', 'EM\'S AUTO SUPPLY', 3, NULL, NULL, NULL),
(278, 'EMZWEI TRADING, INC.', 'EMZWEI TRADING, INC.', 2, NULL, NULL, NULL),
(279, 'ENDURE MEDICAL, INC.', 'ENDURE MEDICAL, INC.', 1, NULL, NULL, NULL),
(280, 'ENGR. ARNOLD SORIANO', 'ENGR. ARNOLD SORIANO', 2, NULL, NULL, NULL),
(281, 'ENIGMA TECHNOLOGIES', 'ENIGMA TECHNOLOGIES', 2, NULL, NULL, NULL),
(282, 'ERWIN GONZALES GOWNS & BLOSSOM', 'ERWIN GONZALES GOWNS & BLOSSOM', 3, NULL, NULL, NULL),
(283, 'ESAI HARDWARE', 'ESAI HARDWARE', 2, NULL, NULL, NULL),
(284, 'ESCALA\'S VARIETY STORE', 'ESCALA\'S VARIETY STORE', 3, NULL, NULL, NULL),
(285, 'ESCO PHILIPPINES, INC.', 'ESCO PHILIPPINES, INC.', 1, NULL, NULL, NULL),
(286, 'ESPADA GRILLS AND AQUA PRODUCTS', 'ESPADA GRILLS AND AQUA PRODUCTS', 1, NULL, NULL, NULL),
(287, 'ESTER DACIO FASTFOOD', 'ESTER DACIO FASTFOOD', 2, NULL, NULL, NULL),
(288, 'ESTER M. DACIO FAST FOOD', 'ESTER M. DACIO FAST FOOD', 2, NULL, NULL, NULL),
(289, 'ETERNITY AUTO PARTS', 'ETERNITY AUTO PARTS', 1, NULL, NULL, NULL),
(290, 'EVELYN\'S GEN. MDSE.', 'EVELYN\'S GEN. MDSE.', 1, NULL, NULL, NULL),
(291, 'EVERGREEN SEPTIC TANK SERVICES', 'EVERGREEN SEPTIC TANK SERVICES', 2, NULL, NULL, NULL),
(292, 'EVERGREEN SEPTIC TANK SERVICES', 'EVERGREEN SEPTIC TANK SERVICES', 3, NULL, NULL, NULL),
(293, 'EXAL\'S RICE & POULTRY', 'EXAL\'S RICE & POULTRY', 2, NULL, NULL, NULL),
(294, 'EXCELTECH PHILKOR TRADING CORP.', 'EXCELTECH PHILKOR TRADING CORP.', 2, NULL, NULL, NULL),
(295, 'EXPRESSIONS STATIONERY SHOP, INC.', 'EXPRESSIONS STATIONERY SHOP, INC.', 3, NULL, NULL, NULL),
(296, 'EXSAN ENTERPRISES', 'EXSAN ENTERPRISES', 3, NULL, NULL, NULL),
(297, 'EXTREME EXPRESSO CAF�', 'EXTREME EXPRESSO CAF�', 1, NULL, NULL, NULL),
(298, 'F & J DE JESUS, INCORPORATED', 'F & J DE JESUS, INCORPORATED', 3, NULL, NULL, NULL),
(299, 'F.B. BRAKE CLUTCH', 'F.B. BRAKE CLUTCH', 1, NULL, NULL, NULL),
(300, 'F.B. DE GUZMAN WELDING SHOP', 'F.B. DE GUZMAN WELDING SHOP', 2, NULL, NULL, NULL),
(301, 'F7 CREATIVES PRINTRADE SUPPLIES & SERVICES', 'F7 CREATIVES PRINTRADE SUPPLIES & SERVICES', 2, NULL, NULL, NULL),
(302, 'FABULOUS JEANS & SHIRTS & GEN. MDSE', 'FABULOUS JEANS & SHIRTS & GEN. MDSE', 1, NULL, NULL, NULL),
(303, 'FABULUOS JEANS & SHIRT GEN. MDSE.', 'FABULUOS JEANS & SHIRT GEN. MDSE.', 1, NULL, NULL, NULL),
(304, 'FABULUOS JEANS & SHIRTS & GEN. MDSE.', 'FABULUOS JEANS & SHIRTS & GEN. MDSE.', 1, NULL, NULL, NULL),
(305, 'FACUNDO\'S JEANS & SHIRTS & GEN. MDSE.', 'FACUNDO\'S JEANS & SHIRTS & GEN. MDSE.', 3, NULL, NULL, NULL),
(306, 'FAJARDO CATERING', 'FAJARDO CATERING', 3, NULL, NULL, NULL),
(307, 'FAJARDO\'S CANTEEN', 'FAJARDO\'S CANTEEN', 1, NULL, NULL, NULL),
(308, 'FARMACIA MARIA ESPERANZA', 'FARMACIA MARIA ESPERANZA', 3, NULL, NULL, NULL),
(309, 'FEDDAIRE SALES & GENERAL SERVICES', 'FEDDAIRE SALES & GENERAL SERVICES', 1, NULL, NULL, NULL),
(310, 'FEDERAL PEST CONTROL', 'FEDERAL PEST CONTROL', 1, NULL, NULL, NULL),
(311, 'FERMIDA CONSTRUCTION SERVICES & SUPPLY', 'FERMIDA CONSTRUCTION SERVICES & SUPPLY', 2, NULL, NULL, NULL),
(312, 'FERMIDA GENERAL MERCHANDISE', 'FERMIDA GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(313, 'FERMIDA GENERAL MERCHANDISING', 'FERMIDA GENERAL MERCHANDISING', 2, NULL, NULL, NULL),
(314, 'FESTIVA DINING CORP.', 'FESTIVA DINING CORP.', 3, NULL, NULL, NULL),
(315, 'FG TRADING', 'FG TRADING', 2, NULL, NULL, NULL),
(316, 'FIESTA 889 HYPER MART', 'FIESTA 889 HYPER MART', 1, NULL, NULL, NULL),
(317, 'FIRST BUSINESS MACHINE', 'FIRST BUSINESS MACHINE', 1, NULL, NULL, NULL),
(318, 'FIRST SUBIC FOOD VENTURES CORP.', 'FIRST SUBIC FOOD VENTURES CORP.', 1, NULL, NULL, NULL),
(319, 'FIVE STAR PHOTOGRAPHY', 'FIVE STAR PHOTOGRAPHY', 2, NULL, NULL, NULL),
(320, 'FLOWER\'S ETC., BY ASTRUD', 'FLOWER\'S ETC., BY ASTRUD', 1, NULL, NULL, NULL),
(321, 'FOODLINK RESOURCE & MANAGEMENT, INC.', 'FOODLINK RESOURCE & MANAGEMENT, INC.', 2, NULL, NULL, NULL),
(322, 'FORD SUBIC', 'FORD SUBIC', 3, NULL, NULL, NULL),
(323, 'FOTON PAMPANGA CORPORATION', 'FOTON PAMPANGA CORPORATION', 1, NULL, NULL, NULL),
(324, 'FRANCE CY RICE STORE', 'FRANCE CY RICE STORE', 1, NULL, NULL, NULL),
(325, 'FRANCIS MERCHANDISING', 'FRANCIS MERCHANDISING', 3, NULL, NULL, NULL),
(326, 'FRANCIS REF. & REPAIR SHOP-BRANCH I', 'FRANCIS REF. & REPAIR SHOP-BRANCH I', 3, NULL, NULL, NULL),
(327, 'FRANCISCO & CY RICE STORE', 'FRANCISCO & CY RICE STORE', 3, NULL, NULL, NULL),
(328, 'FRANCISCO RICE STORE', 'FRANCISCO RICE STORE', 3, NULL, NULL, NULL),
(329, 'FRD FOOD & SPICES, INC.', 'FRD FOOD & SPICES, INC.', 3, NULL, NULL, NULL),
(330, 'FREEPORT EXCHANGE', 'FREEPORT EXCHANGE', 2, NULL, NULL, NULL),
(331, 'FREEPORT MANSION GARDEN HOTEL', 'FREEPORT MANSION GARDEN HOTEL', 1, NULL, NULL, NULL),
(332, 'FREEPORT OIL', 'FREEPORT OIL', 3, NULL, NULL, NULL),
(333, 'FRONTLAKE INC.', 'FRONTLAKE INC.', 2, NULL, NULL, NULL),
(334, 'FRONTLAKE, INC.', 'FRONTLAKE, INC.', 3, NULL, NULL, NULL),
(335, 'G.A. LACUNA RICE RETAILER', 'G.A. LACUNA RICE RETAILER', 2, NULL, NULL, NULL),
(336, 'GAIETY CARMS TRADING', 'GAIETY CARMS TRADING', 2, NULL, NULL, NULL),
(337, 'GAIHARZL RADIATOR REPAIR SHOP', 'GAIHARZL RADIATOR REPAIR SHOP', 1, NULL, NULL, NULL),
(338, 'GALVAN\'S  FOOD CATERING SERVICES ', 'GALVAN\'S  FOOD CATERING SERVICES ', 1, NULL, NULL, NULL),
(339, 'GAMEVILLE CORPORATION', 'GAMEVILLE CORPORATION', 1, NULL, NULL, NULL),
(340, 'GAMEWERKZ', 'GAMEWERKZ', 1, NULL, NULL, NULL),
(341, 'GAPENAS FOOD HAUS', 'GAPENAS FOOD HAUS', 1, NULL, NULL, NULL),
(342, 'GARBES-DIZON GOODYEAR AUTO CARE', 'GARBES-DIZON GOODYEAR AUTO CARE', 2, NULL, NULL, NULL),
(343, 'GARBES-DIZON SERVITEK', 'GARBES-DIZON SERVITEK', 2, NULL, NULL, NULL),
(344, 'GARBES-DIZON SERVITEK', 'GARBES-DIZON SERVITEK', 1, NULL, NULL, NULL),
(345, 'GARBES-DIZON TIRE & SERVICE CENTRE', 'GARBES-DIZON TIRE & SERVICE CENTRE', 2, NULL, NULL, NULL),
(346, 'GC AUTO SUPPLY', 'GC AUTO SUPPLY', 3, NULL, NULL, NULL),
(347, 'GCLT GENERAL MERCHANDIZING', 'GCLT GENERAL MERCHANDIZING', 2, NULL, NULL, NULL),
(348, 'GEAR UP MOTORCYCLE', 'GEAR UP MOTORCYCLE', 2, NULL, NULL, NULL),
(349, 'GENTRIC TRADING', 'GENTRIC TRADING', 1, NULL, NULL, NULL),
(350, 'GERRY\'S GRILL', 'GERRY\'S GRILL', 2, NULL, NULL, NULL),
(351, 'GETZ BROS. PHILS., INC.', 'GETZ BROS. PHILS., INC.', 2, NULL, NULL, NULL),
(352, 'GIDEONCOMP MERCHANDISING', 'GIDEONCOMP MERCHANDISING', 1, NULL, NULL, NULL),
(353, 'GIGATRON COMPUTER CENTER', 'GIGATRON COMPUTER CENTER', 2, NULL, NULL, NULL),
(354, 'GINA\'S JOLAND PORTRAIT', 'GINA\'S JOLAND PORTRAIT', 1, NULL, NULL, NULL),
(355, 'GLOBAL HOTEL & LEISURE PROPERTIES, INC.', 'GLOBAL HOTEL & LEISURE PROPERTIES, INC.', 3, NULL, NULL, NULL),
(356, 'GLOBAL HOTEL & LEISURE PROPERTIES, INC.', 'GLOBAL HOTEL & LEISURE PROPERTIES, INC.', 2, NULL, NULL, NULL),
(357, 'GMA2 PRINTING & SERVICES', 'GMA2 PRINTING & SERVICES', 2, NULL, NULL, NULL),
(358, 'GOLDEN DRAGON RESTAURANT', 'GOLDEN DRAGON RESTAURANT', 2, NULL, NULL, NULL),
(359, 'GOLDEN STATE ALUMINUM GLASS & GEN. MDSE.', 'GOLDEN STATE ALUMINUM GLASS & GEN. MDSE.', 3, NULL, NULL, NULL),
(360, 'GOLDEN TRADE ENTERPRISES', 'GOLDEN TRADE ENTERPRISES', 1, NULL, NULL, NULL),
(361, 'GOLDENCRAFTS ENTERPRISES', 'GOLDENCRAFTS ENTERPRISES', 1, NULL, NULL, NULL),
(362, 'GOLDILOCKS BAKESHOP', 'GOLDILOCKS BAKESHOP', 1, NULL, NULL, NULL),
(363, 'GOODFELLOW PHARMA CORP.', 'GOODFELLOW PHARMA CORP.', 2, NULL, NULL, NULL),
(364, 'GOODYEAR HARDWARE & ELECTRICAL SUPPLY', 'GOODYEAR HARDWARE & ELECTRICAL SUPPLY', 1, NULL, NULL, NULL),
(365, 'GOURMET GARAGE and DELICATESSEN', 'GOURMET GARAGE and DELICATESSEN', 2, NULL, NULL, NULL),
(366, 'GRACEL COMMERCIAL', 'GRACEL COMMERCIAL', 1, NULL, NULL, NULL),
(367, 'GRAND MAHLE CORPORATION', 'GRAND MAHLE CORPORATION', 3, NULL, NULL, NULL),
(368, 'GRAND PHOTOGRAPHERS ASSOCIATION-Olongapo City Group Inc.', 'GRAND PHOTOGRAPHERS ASSOCIATION-Olongapo City Group Inc.', 2, NULL, NULL, NULL),
(369, 'GRAND SEAS HOTEL', 'GRAND SEAS HOTEL', 3, NULL, NULL, NULL),
(370, 'GRANDERS SPORTS CENTER', 'GRANDERS SPORTS CENTER', 3, NULL, NULL, NULL),
(371, 'GRANDERS SPORTS CENTER', 'GRANDERS SPORTS CENTER', 1, NULL, NULL, NULL),
(372, 'GREENSUN AUTOMOTIVE ENTERPRISES, INC. NISSAN BATAAN', 'GREENSUN AUTOMOTIVE ENTERPRISES, INC. NISSAN BATAAN', 1, NULL, NULL, NULL),
(373, 'GREENWICH', 'GREENWICH', 1, NULL, NULL, NULL),
(374, 'GREGG\'S WOODCRAFT', 'GREGG\'S WOODCRAFT', 2, NULL, NULL, NULL),
(375, 'GREGORIO Z. ROBLES', 'GREGORIO Z. ROBLES', 2, NULL, NULL, NULL),
(376, 'GUERRERO CENTER CYCLE PARTS', 'GUERRERO CENTER CYCLE PARTS', 1, NULL, NULL, NULL),
(377, 'GUERRERO CENTER CYCLE PARTS', 'GUERRERO CENTER CYCLE PARTS', 1, NULL, NULL, NULL),
(378, 'GV AD VENTURES, INC.', 'GV AD VENTURES, INC.', 2, NULL, NULL, NULL),
(379, 'H.J. EXPRESS RENT A CAR', 'H.J. EXPRESS RENT A CAR', 1, NULL, NULL, NULL),
(380, 'HAIMA CARS PAMPANGA', 'HAIMA CARS PAMPANGA', 2, NULL, NULL, NULL),
(381, 'HAPAG KAINAN SA 18th ST. E.B.B.', 'HAPAG KAINAN SA 18th ST. E.B.B.', 1, NULL, NULL, NULL),
(382, 'HAPPY VALLEY SUPERMARKET', 'HAPPY VALLEY SUPERMARKET', 3, NULL, NULL, NULL),
(383, 'HARRIS VARIETY STORE', 'HARRIS VARIETY STORE', 3, NULL, NULL, NULL),
(384, 'HBW GENERAL MERCHANDISE', 'HBW GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(385, 'HERALDO CABRIDO/MT. PINATUBO MEDIA SURVIVORS', 'HERALDO CABRIDO/MT. PINATUBO MEDIA SURVIVORS', 1, NULL, NULL, NULL),
(386, 'HERMES CARINDERIA', 'HERMES CARINDERIA', 2, NULL, NULL, NULL),
(387, 'HERMIES DRY GOODS', 'HERMIES DRY GOODS', 2, NULL, NULL, NULL),
(388, 'HIMEX CORPORATION', 'HIMEX CORPORATION', 1, NULL, NULL, NULL),
(389, 'HLURB NORTHERN TAGALOG REGION (NTR)', 'HLURB NORTHERN TAGALOG REGION (NTR)', 1, NULL, NULL, NULL),
(390, 'HOLLYS', 'HOLLYS', 3, NULL, NULL, NULL),
(391, 'HONRADEZ COPY SYSTEM', 'HONRADEZ COPY SYSTEM', 1, NULL, NULL, NULL),
(392, 'HONRADEZ COPY SYSTEM', 'HONRADEZ COPY SYSTEM', 1, NULL, NULL, NULL),
(393, 'HOTSHOTS BURGER SUBIC CORP.', 'HOTSHOTS BURGER SUBIC CORP.', 1, NULL, NULL, NULL),
(394, 'HOTSHOTS BURGER SUBIC CORP.', 'HOTSHOTS BURGER SUBIC CORP.', 1, NULL, NULL, NULL),
(395, 'HRRP TRADING', 'HRRP TRADING', 2, NULL, NULL, NULL),
(396, 'HUBERT ENTERPRISE', 'HUBERT ENTERPRISE', 2, NULL, NULL, NULL),
(397, 'IBONROP MARKETING', 'IBONROP MARKETING', 3, NULL, NULL, NULL),
(398, 'I-DAS GENERAL MERCHANDISE', 'I-DAS GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(399, 'ILOCANDIA DROPS REFILLING STATION', 'ILOCANDIA DROPS REFILLING STATION', 3, NULL, NULL, NULL),
(400, 'INFINITY EVENTS & FLOWER SHOP', 'INFINITY EVENTS & FLOWER SHOP', 3, NULL, NULL, NULL),
(401, 'INFOMAX ENTERPRISE-BRANCH III', 'INFOMAX ENTERPRISE-BRANCH III', 3, NULL, NULL, NULL),
(402, 'INK STATION BY BETCHAAZ', 'INK STATION BY BETCHAAZ', 3, NULL, NULL, NULL),
(403, 'INK STATION BY BETCHAAZ', 'INK STATION BY BETCHAAZ', 2, NULL, NULL, NULL),
(404, 'INNOGEN PHARM', 'INNOGEN PHARM', 2, NULL, NULL, NULL),
(405, 'INNOVASCEND', 'INNOVASCEND', 2, NULL, NULL, NULL),
(406, 'INTERGRATED PHARMACEUTICAL INC.', 'INTERGRATED PHARMACEUTICAL INC.', 2, NULL, NULL, NULL),
(407, 'INTERNATIONAL FREEPORT TRADERS, INC.', 'INTERNATIONAL FREEPORT TRADERS, INC.', 2, NULL, NULL, NULL),
(408, 'INTERNATIONAL HEAVY EQUIPMENT CORP.', 'INTERNATIONAL HEAVY EQUIPMENT CORP.', 3, NULL, NULL, NULL),
(409, 'INTERNATIONAL HEAVY EQUIPMENT CORP.', 'INTERNATIONAL HEAVY EQUIPMENT CORP.', 3, NULL, NULL, NULL),
(410, 'INVENEX INCORPORATED', 'INVENEX INCORPORATED', 1, NULL, NULL, NULL),
(411, 'IRAM TRIBAL MULTI-PURPOSE COOPERATIVE', 'IRAM TRIBAL MULTI-PURPOSE COOPERATIVE', 1, NULL, NULL, NULL),
(412, 'IRON SIGTHED TACTICAL GEAR SHOP', 'IRON SIGTHED TACTICAL GEAR SHOP', 2, NULL, NULL, NULL),
(413, 'ISLAND\'S FANTASY SOUVENIR & RTW', 'ISLAND\'S FANTASY SOUVENIR & RTW', 1, NULL, NULL, NULL),
(414, 'ISUZU PAMPANGA', 'ISUZU PAMPANGA', 2, NULL, NULL, NULL),
(415, 'IZER GENERAL MERCHANDISE', 'IZER GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(416, 'J.T.C MARKETING', 'J.T.C MARKETING', 2, NULL, NULL, NULL),
(417, 'J.T.C. MARKETING', 'J.T.C. MARKETING', 1, NULL, NULL, NULL),
(418, 'JA DIOCES PALAY BUYING & RICE RETAILING', 'JA DIOCES PALAY BUYING & RICE RETAILING', 2, NULL, NULL, NULL),
(419, 'JACER VULCANIZING SHOP', 'JACER VULCANIZING SHOP', 1, NULL, NULL, NULL),
(420, 'JAKE\'S FOOTWEAR', 'JAKE\'S FOOTWEAR', 1, NULL, NULL, NULL),
(421, 'JAMES BICYCLE & MOTOR PARTS', 'JAMES BICYCLE & MOTOR PARTS', 1, NULL, NULL, NULL),
(422, 'JAMES UY MOTOR REWINDING', 'JAMES UY MOTOR REWINDING', 2, NULL, NULL, NULL),
(423, 'JAMJLE EQUIPMENTS & GENERAL MERCHANDISE', 'JAMJLE EQUIPMENTS & GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(424, 'JAMJLE PROPERTIES SUBIC & DEV\'T CORP.', 'JAMJLE PROPERTIES SUBIC & DEV\'T CORP.', 2, NULL, NULL, NULL),
(425, 'JANSAM TRADING', 'JANSAM TRADING', 1, NULL, NULL, NULL),
(426, 'JAPAN HOME, INC.', 'JAPAN HOME, INC.', 1, NULL, NULL, NULL),
(427, 'JASCOLICE TRADING', 'JASCOLICE TRADING', 1, NULL, NULL, NULL),
(428, 'JASCOLINE TRADING', 'JASCOLINE TRADING', 1, NULL, NULL, NULL),
(429, 'JASMIN PRESIOUS JADE HOTEL', 'JASMIN PRESIOUS JADE HOTEL', 1, NULL, NULL, NULL),
(430, 'JASON FRONDA', 'JASON FRONDA', 3, NULL, NULL, NULL),
(431, 'JAT ADS ADVERTISING & SUPPLIES', 'JAT ADS ADVERTISING & SUPPLIES', 3, NULL, NULL, NULL),
(432, 'JAY AUTO PAINTSHOP', 'JAY AUTO PAINTSHOP', 1, NULL, NULL, NULL),
(433, 'JAY-CZAR PRINTING & BINDING SERVICES', 'JAY-CZAR PRINTING & BINDING SERVICES', 3, NULL, NULL, NULL),
(434, 'JBV ADVERTISING', 'JBV ADVERTISING', 3, NULL, NULL, NULL),
(435, 'JC FURNITURE & APPLIANCES SALES', 'JC FURNITURE & APPLIANCES SALES', 2, NULL, NULL, NULL),
(436, 'JC MARKETING', 'JC MARKETING', 2, NULL, NULL, NULL),
(437, 'JC VILLANUEVA MACHINE WORKS', 'JC VILLANUEVA MACHINE WORKS', 3, NULL, NULL, NULL),
(438, 'JEANELL GENERAL MERCHANDISE', 'JEANELL GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(439, 'JECT GENERAL MERCHANDISING', 'JECT GENERAL MERCHANDISING', 2, NULL, NULL, NULL),
(440, 'JEDDA\'S AUTO REPAIR SHOP', 'JEDDA\'S AUTO REPAIR SHOP', 3, NULL, NULL, NULL),
(441, 'JELEEBEE SUPERMART', 'JELEEBEE SUPERMART', 2, NULL, NULL, NULL),
(442, 'JELEEBEE VAN SERVICES', 'JELEEBEE VAN SERVICES', 1, NULL, NULL, NULL),
(443, 'JE\'S AUTO SUPPLY', 'JE\'S AUTO SUPPLY', 1, NULL, NULL, NULL),
(444, 'JET MASTER ACCESSORIES & PARTS', 'JET MASTER ACCESSORIES & PARTS', 3, NULL, NULL, NULL),
(445, 'JHAN PAULE\'S DINNER & TAKE OUT', 'JHAN PAULE\'S DINNER & TAKE OUT', 1, NULL, NULL, NULL),
(446, 'JHUN CARS UPHOLSTERY', 'JHUN CARS UPHOLSTERY', 1, NULL, NULL, NULL),
(447, 'JHUN ELECTRICAL SHOP', 'JHUN ELECTRICAL SHOP', 1, NULL, NULL, NULL),
(448, 'JHUN\'S RENT A CAR', 'JHUN\'S RENT A CAR', 2, NULL, NULL, NULL),
(449, 'JJ HARDWARE & CYCLE PARTS', 'JJ HARDWARE & CYCLE PARTS', 2, NULL, NULL, NULL),
(450, 'JJ LACEBAL CONSTRUCTION', 'JJ LACEBAL CONSTRUCTION', 3, NULL, NULL, NULL),
(451, 'JJ PRINTING PRESS', 'JJ PRINTING PRESS', 2, NULL, NULL, NULL),
(452, 'JJL GLASS & ALUMINUM SUPPLY', 'JJL GLASS & ALUMINUM SUPPLY', 3, NULL, NULL, NULL),
(453, 'JLGMHESC', 'JLGMHESC', 3, NULL, NULL, NULL),
(454, 'JM DIGITAL PRODUCTION', 'JM DIGITAL PRODUCTION', 2, NULL, NULL, NULL),
(455, 'JMN ENTERPRISE', 'JMN ENTERPRISE', 1, NULL, NULL, NULL),
(456, 'JODEL REPAIR SHOP', 'JODEL REPAIR SHOP', 1, NULL, NULL, NULL),
(457, 'JODEL REPAIR SHOP', 'JODEL REPAIR SHOP', 1, NULL, NULL, NULL),
(458, 'JODEL\'S REAPIR SHOP', 'JODEL\'S REAPIR SHOP', 2, NULL, NULL, NULL),
(459, 'JODEL\'S REPAIR SHOP', 'JODEL\'S REPAIR SHOP', 1, NULL, NULL, NULL),
(460, 'JOENIS AUTO SUPPLY', 'JOENIS AUTO SUPPLY', 1, NULL, NULL, NULL),
(461, 'JOEY T. MARANTAN SCHOOL SUPPLIES', 'JOEY T. MARANTAN SCHOOL SUPPLIES', 3, NULL, NULL, NULL),
(462, 'JOFOX COMPUTER REPAIR & SERVICES', 'JOFOX COMPUTER REPAIR & SERVICES', 1, NULL, NULL, NULL),
(463, 'JOHAN\'S ADVENTURE DIVE CENTER', 'JOHAN\'S ADVENTURE DIVE CENTER', 3, NULL, NULL, NULL),
(464, 'JOHAN\'S ROOMS & RESTAURANT', 'JOHAN\'S ROOMS & RESTAURANT', 2, NULL, NULL, NULL),
(465, 'JOHN GRAPHIC IMAGE ADVERTISING', 'JOHN GRAPHIC IMAGE ADVERTISING', 1, NULL, NULL, NULL),
(466, 'JOJO\'S RUBBER STAMP & DRY SEAL', 'JOJO\'S RUBBER STAMP & DRY SEAL', 3, NULL, NULL, NULL),
(467, 'JOLIBEE FOODS CORP.', 'JOLIBEE FOODS CORP.', 3, NULL, NULL, NULL),
(468, 'JOLLIBEE OLONGAPO TRIANGLE', 'JOLLIBEE OLONGAPO TRIANGLE', 1, NULL, NULL, NULL),
(469, 'JOLLIBEE OLONGAPO/UP LINE FOODS CORP.', 'JOLLIBEE OLONGAPO/UP LINE FOODS CORP.', 1, NULL, NULL, NULL),
(470, 'JOLLIBEE SUBIC BAY', 'JOLLIBEE SUBIC BAY', 1, NULL, NULL, NULL),
(471, 'JOLLIBEE SUBIC-LOT 21', 'JOLLIBEE SUBIC-LOT 21', 3, NULL, NULL, NULL),
(472, 'JOLLIBEE ULO NG APO', 'JOLLIBEE ULO NG APO', 3, NULL, NULL, NULL),
(473, 'JORGE TORRES/TVD ADVERTISING', 'JORGE TORRES/TVD ADVERTISING', 3, NULL, NULL, NULL),
(474, 'JOSEFINA\'S NEWSPAPER DISTRIBUTOR', 'JOSEFINA\'S NEWSPAPER DISTRIBUTOR', 3, NULL, NULL, NULL),
(475, 'JOVEN LANSANG VARIETY STORE', 'JOVEN LANSANG VARIETY STORE', 2, NULL, NULL, NULL),
(476, 'JOYFOODS CORP.', 'JOYFOODS CORP.', 1, NULL, NULL, NULL),
(477, 'JP&R CONCEPT ENGINEERING & SUPPLY', 'JP&R CONCEPT ENGINEERING & SUPPLY', 2, NULL, NULL, NULL),
(478, 'JRA LIGHTS & SOUNDS', 'JRA LIGHTS & SOUNDS', 3, NULL, NULL, NULL),
(479, 'JRJ PHARMA MED. GALLERY & GEN. MDSE.', 'JRJ PHARMA MED. GALLERY & GEN. MDSE.', 2, NULL, NULL, NULL),
(480, 'JTC MARKETING', 'JTC MARKETING', 3, NULL, NULL, NULL),
(481, 'JUJACAS PRINTING PRESS', 'JUJACAS PRINTING PRESS', 1, NULL, NULL, NULL),
(482, 'JULIES BAKESHOP', 'JULIES BAKESHOP', 2, NULL, NULL, NULL),
(483, 'JULIE\'S GLASS & ALUMINUM SUPPLY', 'JULIE\'S GLASS & ALUMINUM SUPPLY', 1, NULL, NULL, NULL),
(484, 'JUNLING UPHOLSTERY SHOP', 'JUNLING UPHOLSTERY SHOP', 1, NULL, NULL, NULL),
(485, 'JUN\'S BALLOONS', 'JUN\'S BALLOONS', 1, NULL, NULL, NULL),
(486, 'JUVILEE DRAPERY & TAILOR SHOP', 'JUVILEE DRAPERY & TAILOR SHOP', 1, NULL, NULL, NULL),
(487, 'JV SPRINTER AUTO SUPPLY', 'JV SPRINTER AUTO SUPPLY', 3, NULL, NULL, NULL),
(488, 'JV\'s PRINTING PRESS', 'JV\'s PRINTING PRESS', 3, NULL, NULL, NULL),
(489, 'KCF TRADING', 'KCF TRADING', 3, NULL, NULL, NULL),
(490, 'KELVIN AIRE AIR CON & REF. SERVICES', 'KELVIN AIRE AIR CON & REF. SERVICES', 1, NULL, NULL, NULL),
(491, 'KENDRAKE GENERAL MERCHANDISE', 'KENDRAKE GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(492, 'KFC SM OLONGAPO', 'KFC SM OLONGAPO', 3, NULL, NULL, NULL),
(493, 'KHENT AIRCONDITION & REFRIGERARION SHOP', 'KHENT AIRCONDITION & REFRIGERARION SHOP', 3, NULL, NULL, NULL),
(494, 'KIA PAMPANGA', 'KIA PAMPANGA', 3, NULL, NULL, NULL),
(495, 'KIEL MIKO PIZZA HAUS', 'KIEL MIKO PIZZA HAUS', 1, NULL, NULL, NULL),
(496, 'KIMONO KEN CORP.', 'KIMONO KEN CORP.', 2, NULL, NULL, NULL),
(497, 'KING NJP GENERAL MERCHANDISE', 'KING NJP GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(498, 'KING\'S BAKESHOP BRANCH 1', 'KING\'S BAKESHOP BRANCH 1', 2, NULL, NULL, NULL),
(499, 'KITCHEN TOMATO', 'KITCHEN TOMATO', 3, NULL, NULL, NULL),
(500, 'KITZIE\'S NATIVE CUISINE RESTAURANT', 'KITZIE\'S NATIVE CUISINE RESTAURANT', 3, NULL, NULL, NULL),
(501, 'K-ONE ANGELES SHOPPING CENTER', 'K-ONE ANGELES SHOPPING CENTER', 2, NULL, NULL, NULL),
(502, 'KONG\'S RESTAURANT', 'KONG\'S RESTAURANT', 2, NULL, NULL, NULL),
(503, 'KONG\'S TAVERN', 'KONG\'S TAVERN', 1, NULL, NULL, NULL),
(504, 'KOPYERS GEN. MERCHANDISE', 'KOPYERS GEN. MERCHANDISE', 3, NULL, NULL, NULL),
(505, 'KOPYERS GENERAL MERCHANDISE', 'KOPYERS GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(506, 'KOPYRICH COPY CENTER', 'KOPYRICH COPY CENTER', 2, NULL, NULL, NULL),
(507, 'KSERVICO TRADE INC.,', 'KSERVICO TRADE INC.,', 1, NULL, NULL, NULL),
(508, 'K-SPORTING GOODS & GENERAL MERCHANDISE', 'K-SPORTING GOODS & GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(509, 'KUSINA NI ALING JOSEFINA BASI', 'KUSINA NI ALING JOSEFINA BASI', 3, NULL, NULL, NULL),
(510, 'L & D MOTORS', 'L & D MOTORS', 3, NULL, NULL, NULL),
(511, 'L n G AUTO SUPPLY', 'L n G AUTO SUPPLY', 1, NULL, NULL, NULL),
(512, 'L&D Motors', 'L&D Motors', 1, NULL, NULL, NULL),
(513, 'LAFFS BITES & DRINKS, INC.', 'LAFFS BITES & DRINKS, INC.', 3, NULL, NULL, NULL),
(514, 'LALYN\'S PRINTSTATION', 'LALYN\'S PRINTSTATION', 2, NULL, NULL, NULL),
(515, 'LAND MANAGEMENT BUREAU', 'LAND MANAGEMENT BUREAU', 2, NULL, NULL, NULL),
(516, 'LARRAH PRINTRADE SERVICES & SUPPLIES', 'LARRAH PRINTRADE SERVICES & SUPPLIES', 1, NULL, NULL, NULL),
(517, 'LARRAH PRINTRADE SERVICES & SUPPLIES', 'LARRAH PRINTRADE SERVICES & SUPPLIES', 2, NULL, NULL, NULL),
(518, 'LC LUMBER & HARDWARE', 'LC LUMBER & HARDWARE', 2, NULL, NULL, NULL),
(519, 'LEXSTAR GRAPHIC ARTS', 'LEXSTAR GRAPHIC ARTS', 1, NULL, NULL, NULL),
(520, 'LIBAY\'S HALO-HALO SA GAPO', 'LIBAY\'S HALO-HALO SA GAPO', 1, NULL, NULL, NULL),
(521, 'LIBERTY\'S EMBROIDERY & BALLCAPS', 'LIBERTY\'S EMBROIDERY & BALLCAPS', 1, NULL, NULL, NULL),
(522, 'LIGHT HOUSE MARINA RESORT', 'LIGHT HOUSE MARINA RESORT', 3, NULL, NULL, NULL),
(523, 'LINMER PHARMA, INC.', 'LINMER PHARMA, INC.', 1, NULL, NULL, NULL),
(524, 'LIVESOUNDS! LIGHTS & SOUNDS', 'LIVESOUNDS! LIGHTS & SOUNDS', 3, NULL, NULL, NULL),
(525, 'LJS PRINTRADE SUPPLIES & SERVICES', 'LJS PRINTRADE SUPPLIES & SERVICES', 3, NULL, NULL, NULL),
(526, 'LLACUNA\'S KEY SHOP & RUBBER STAMP', 'LLACUNA\'S KEY SHOP & RUBBER STAMP', 1, NULL, NULL, NULL),
(527, 'LLACUNA\'S KEY SHOP & RUBBER STAMP', 'LLACUNA\'S KEY SHOP & RUBBER STAMP', 1, NULL, NULL, NULL),
(528, 'LLACU�A\'S KEY SHOP & RUBBER STAMP', 'LLACU�A\'S KEY SHOP & RUBBER STAMP', 3, NULL, NULL, NULL),
(529, 'LOIS LEMBER LOUIE GENERAL MECHANDISE', 'LOIS LEMBER LOUIE GENERAL MECHANDISE', 2, NULL, NULL, NULL),
(530, 'LOIS LEMBER LOUIE GENERAL MERCHANDISE', 'LOIS LEMBER LOUIE GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(531, 'LOIS MCLOUIE METALCRAFT', 'LOIS MCLOUIE METALCRAFT', 1, NULL, NULL, NULL),
(532, 'LORIMAR PUBLISHING, INC.', 'LORIMAR PUBLISHING, INC.', 2, NULL, NULL, NULL),
(533, 'LORWINS GENERAL MERCHANDISE', 'LORWINS GENERAL MERCHANDISE', 3, NULL, NULL, NULL),
(534, 'LOS POLLUELOS LECHON', 'LOS POLLUELOS LECHON', 2, NULL, NULL, NULL),
(535, 'LUCKY C CYCLE SUPPLY', 'LUCKY C CYCLE SUPPLY', 2, NULL, NULL, NULL),
(536, 'LUCKY GIA METAL WORKS & RECAP CENTER', 'LUCKY GIA METAL WORKS & RECAP CENTER', 3, NULL, NULL, NULL),
(537, 'LUCKY RJ MOTORCYCLE PARTS & ACCESSORIES', 'LUCKY RJ MOTORCYCLE PARTS & ACCESSORIES', 3, NULL, NULL, NULL),
(538, 'LUCKY RJ MOTORCYCLE PARTS & ACCESSORIES', 'LUCKY RJ MOTORCYCLE PARTS & ACCESSORIES', 3, NULL, NULL, NULL),
(539, 'LUCKYMATE COLOR GENERAL MERCHANDISE', 'LUCKYMATE COLOR GENERAL MERCHANDISE', 3, NULL, NULL, NULL),
(540, 'LURING\'S BARBEQUE HOUSE CORP.', 'LURING\'S BARBEQUE HOUSE CORP.', 1, NULL, NULL, NULL),
(541, 'M & H (SUBIC), INC.', 'M & H (SUBIC), INC.', 1, NULL, NULL, NULL),
(542, 'M & M XEROX COPY', 'M & M XEROX COPY', 3, NULL, NULL, NULL),
(543, 'M & M XEROZ COPY', 'M & M XEROZ COPY', 3, NULL, NULL, NULL),
(544, 'M PANGILINAN VARIETY STORE', 'M PANGILINAN VARIETY STORE', 3, NULL, NULL, NULL),
(545, 'M.A.C. PERFORMANCE', 'M.A.C. PERFORMANCE', 1, NULL, NULL, NULL),
(546, 'M.A.G. INTERNET SHOP', 'M.A.G. INTERNET SHOP', 1, NULL, NULL, NULL),
(547, 'M.A.G. INTERNET SHOP', 'M.A.G. INTERNET SHOP', 3, NULL, NULL, NULL),
(548, 'M21 GAS INC.', 'M21 GAS INC.', 3, NULL, NULL, NULL),
(549, 'M22 TRADING', 'M22 TRADING', 2, NULL, NULL, NULL),
(550, 'MABBIE GENERAL MERCHANDISE', 'MABBIE GENERAL MERCHANDISE', 3, NULL, NULL, NULL),
(551, 'MABUHAY KAIN DITO', 'MABUHAY KAIN DITO', 1, NULL, NULL, NULL),
(552, 'MAGGIE\'S BALOON', 'MAGGIE\'S BALOON', 1, NULL, NULL, NULL),
(553, 'MAIL & MORE BUSINESS SERVICES, INC.', 'MAIL & MORE BUSINESS SERVICES, INC.', 3, NULL, NULL, NULL),
(554, 'MALEX TRADING', 'MALEX TRADING', 3, NULL, NULL, NULL),
(555, 'MALLARE\'S BICYCLE STORE', 'MALLARE\'S BICYCLE STORE', 3, NULL, NULL, NULL),
(556, 'MAMA CILA\'S SARI-SARI STORE', 'MAMA CILA\'S SARI-SARI STORE', 1, NULL, NULL, NULL),
(557, 'MAMOU\'S CAF�', 'MAMOU\'S CAF�', 1, NULL, NULL, NULL),
(558, 'MANABAT TRADING CORP.', 'MANABAT TRADING CORP.', 1, NULL, NULL, NULL),
(559, 'MANANQUIL AUTO SUPPLY', 'MANANQUIL AUTO SUPPLY', 2, NULL, NULL, NULL),
(560, 'MANBUILT AUTO DEVELOPMENT', 'MANBUILT AUTO DEVELOPMENT', 3, NULL, NULL, NULL),
(561, 'MANG INASAL', 'MANG INASAL', 3, NULL, NULL, NULL),
(562, 'MANGO VALLEY HOTEL', 'MANGO VALLEY HOTEL', 2, NULL, NULL, NULL),
(563, 'MANILA MERCHANDISING', 'MANILA MERCHANDISING', 2, NULL, NULL, NULL),
(564, 'MANILA SEEDLING BANK FOUNDATION, INC.', 'MANILA SEEDLING BANK FOUNDATION, INC.', 2, NULL, NULL, NULL),
(565, 'MANSION BAKESHOP', 'MANSION BAKESHOP', 1, NULL, NULL, NULL),
(566, 'MANSION HARDWARE', 'MANSION HARDWARE', 3, NULL, NULL, NULL),
(567, 'MANSION HOTEL', 'MANSION HOTEL', 1, NULL, NULL, NULL),
(568, 'MANSION RESTAURANT', 'MANSION RESTAURANT', 2, NULL, NULL, NULL),
(569, 'MANUEL ZENAIDA RICE RETAILER', 'MANUEL ZENAIDA RICE RETAILER', 1, NULL, NULL, NULL),
(570, 'MAPCAR TRADING', 'MAPCAR TRADING', 2, NULL, NULL, NULL),
(571, 'MARCKKI SHIRT SHOP', 'MARCKKI SHIRT SHOP', 1, NULL, NULL, NULL),
(572, 'MARIA CECILIA LEGASPI GAYATIN MERCHANDISE', 'MARIA CECILIA LEGASPI GAYATIN MERCHANDISE', 1, NULL, NULL, NULL),
(573, 'MARIETTA\'S MEAT STALL', 'MARIETTA\'S MEAT STALL', 1, NULL, NULL, NULL),
(574, 'MARITONI\'S FOOD CATERING SERVICES', 'MARITONI\'S FOOD CATERING SERVICES', 3, NULL, NULL, NULL),
(575, 'MARK ANTHONY LEGASPI ENTERPRISES', 'MARK ANTHONY LEGASPI ENTERPRISES', 3, NULL, NULL, NULL),
(576, 'MARK ANTHONY LEGASPI ENTERPRISES', 'MARK ANTHONY LEGASPI ENTERPRISES', 3, NULL, NULL, NULL),
(577, 'MARK T. QUIJANO', 'MARK T. QUIJANO', 1, NULL, NULL, NULL),
(578, 'MARK\'S A/C SYSTEM', 'MARK\'S A/C SYSTEM', 2, NULL, NULL, NULL),
(579, 'MARK\'S AIRCONDITIONING SYSTEM', 'MARK\'S AIRCONDITIONING SYSTEM', 1, NULL, NULL, NULL),
(580, 'MARLYN FLOWER SHOP', 'MARLYN FLOWER SHOP', 2, NULL, NULL, NULL),
(581, 'MARLYN FLOWERSHOP', 'MARLYN FLOWERSHOP', 2, NULL, NULL, NULL),
(582, 'MARLYN\'S GARMENT', 'MARLYN\'S GARMENT', 3, NULL, NULL, NULL),
(583, 'MARS AUTO PARTS SUPPLY', 'MARS AUTO PARTS SUPPLY', 3, NULL, NULL, NULL),
(584, 'MART ONE', 'MART ONE', 2, NULL, NULL, NULL),
(585, 'MARTI PRINTER', 'MARTI PRINTER', 2, NULL, NULL, NULL),
(586, 'MARZAN PHARMA CORPORATION', 'MARZAN PHARMA CORPORATION', 2, NULL, NULL, NULL),
(587, 'MASTER HARDWARE', 'MASTER HARDWARE', 2, NULL, NULL, NULL),
(588, 'MASTER LUMBER', 'MASTER LUMBER', 2, NULL, NULL, NULL),
(589, 'MATIAS PRESS', 'MATIAS PRESS', 3, NULL, NULL, NULL),
(590, 'MAX FLOWERS SHOP', 'MAX FLOWERS SHOP', 1, NULL, NULL, NULL),
(591, 'MAX\'S RESTAURANT', 'MAX\'S RESTAURANT', 2, NULL, NULL, NULL),
(592, 'MC DONALD\'S McArthur Maimpis Branch', 'MC DONALD\'S McArthur Maimpis Branch', 1, NULL, NULL, NULL),
(593, 'MC DONALD\'S OLONGAPO-RIZAL', 'MC DONALD\'S OLONGAPO-RIZAL', 2, NULL, NULL, NULL),
(594, 'MC DONALD\'S OLONGAPO MAGSAYSAY', 'MC DONALD\'S OLONGAPO MAGSAYSAY', 1, NULL, NULL, NULL),
(595, 'MC DONALD\'S SUBIC BAY GATEWAY RIZAL HIGHWAY', 'MC DONALD\'S SUBIC BAY GATEWAY RIZAL HIGHWAY', 2, NULL, NULL, NULL),
(596, 'MC RENT A CAR', 'MC RENT A CAR', 2, NULL, NULL, NULL),
(597, 'MCKOI UPHOLSTERY SHOP', 'MCKOI UPHOLSTERY SHOP', 2, NULL, NULL, NULL),
(598, 'MEAT PLUS CAF�', 'MEAT PLUS CAF�', 3, NULL, NULL, NULL),
(599, 'MEDECIA ENTERPRISES', 'MEDECIA ENTERPRISES', 3, NULL, NULL, NULL),
(600, 'MEDICAL CENTER TRAINING CORP.', 'MEDICAL CENTER TRAINING CORP.', 3, NULL, NULL, NULL),
(601, 'MEDICEL ENTERPRISES', 'MEDICEL ENTERPRISES', 3, NULL, NULL, NULL),
(602, 'MEDICOTEK INC.', 'MEDICOTEK INC.', 3, NULL, NULL, NULL),
(603, 'MEDIGREEN PHARMACY', 'MEDIGREEN PHARMACY', 3, NULL, NULL, NULL),
(604, 'MEDISAFE PHILIPPINES, INC.', 'MEDISAFE PHILIPPINES, INC.', 2, NULL, NULL, NULL),
(605, 'MEDISETH ENTERPRISE', 'MEDISETH ENTERPRISE', 3, NULL, NULL, NULL),
(606, 'MEGAMAR MOTORS PHILIPPINES INC.', 'MEGAMAR MOTORS PHILIPPINES INC.', 1, NULL, NULL, NULL),
(607, 'MEGAMAR MOTORS PHILS. INC.', 'MEGAMAR MOTORS PHILS. INC.', 1, NULL, NULL, NULL);
INSERT INTO `supplier_info` (`id`, `title`, `desc`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(608, 'MEGATSAI', 'MEGATSAI', 2, NULL, NULL, NULL),
(609, 'MEKENI  FOOD CORPORATION', 'MEKENI  FOOD CORPORATION', 1, NULL, NULL, NULL),
(610, 'MEKENI FOOD CORP.', 'MEKENI FOOD CORP.', 3, NULL, NULL, NULL),
(611, 'MER-VIL FASTFOOD', 'MER-VIL FASTFOOD', 1, NULL, NULL, NULL),
(612, 'METRO DRUG', 'METRO DRUG', 3, NULL, NULL, NULL),
(613, 'MICHKYLE TRADING', 'MICHKYLE TRADING', 3, NULL, NULL, NULL),
(614, 'MIGUEL\'S FISHING SUPPLY & GENERAL MERCHANDISE', 'MIGUEL\'S FISHING SUPPLY & GENERAL MERCHANDISE', 3, NULL, NULL, NULL),
(615, 'MILAGROS SONZA\'S TRUCKING SERVICES', 'MILAGROS SONZA\'S TRUCKING SERVICES', 3, NULL, NULL, NULL),
(616, 'MILLENIUM TIRE CORPORATION', 'MILLENIUM TIRE CORPORATION', 1, NULL, NULL, NULL),
(617, 'MILLER\'S FURNITURE COLLECTION', 'MILLER\'S FURNITURE COLLECTION', 2, NULL, NULL, NULL),
(618, 'MINI KONG\'S EXPRESS RESTAURANT', 'MINI KONG\'S EXPRESS RESTAURANT', 3, NULL, NULL, NULL),
(619, 'MINI STOP', 'MINI STOP', 1, NULL, NULL, NULL),
(620, 'MM CASTILLO GENERAL MERCHANDISE', 'MM CASTILLO GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(621, 'MOCA BLENDS', 'MOCA BLENDS', 2, NULL, NULL, NULL),
(622, 'MON-MON TIRE SURPLUS & VULCANIZING SHOP', 'MON-MON TIRE SURPLUS & VULCANIZING SHOP', 3, NULL, NULL, NULL),
(623, 'MONTON ENTERPRISES', 'MONTON ENTERPRISES', 1, NULL, NULL, NULL),
(624, 'MOONBAY MARINA LEISURE RESORT', 'MOONBAY MARINA LEISURE RESORT', 1, NULL, NULL, NULL),
(625, 'MOONBAY MARINA RESTAURANT', 'MOONBAY MARINA RESTAURANT', 2, NULL, NULL, NULL),
(626, 'MOONBAY MARINA VILLAS', 'MOONBAY MARINA VILLAS', 2, NULL, NULL, NULL),
(627, 'MORATA GLASS & ALUMINUM SUPPLY', 'MORATA GLASS & ALUMINUM SUPPLY', 3, NULL, NULL, NULL),
(628, 'MOUNTAIN WOODS INN, INC.', 'MOUNTAIN WOODS INN, INC.', 2, NULL, NULL, NULL),
(629, 'MR JOSE YAMSON', 'MR JOSE YAMSON', 3, NULL, NULL, NULL),
(630, 'MR. FIX IT', 'MR. FIX IT', 3, NULL, NULL, NULL),
(631, 'MRL CYBERTEC CORPORATION', 'MRL CYBERTEC CORPORATION', 1, NULL, NULL, NULL),
(632, 'MRY AUTO SUPPLY', 'MRY AUTO SUPPLY', 2, NULL, NULL, NULL),
(633, 'MRY AUTO SUPPLY-BRANCH I', 'MRY AUTO SUPPLY-BRANCH I', 1, NULL, NULL, NULL),
(634, 'MSE SIGN SHOP', 'MSE SIGN SHOP', 3, NULL, NULL, NULL),
(635, 'MUSTARD SEED SYSTEM CORPORATION', 'MUSTARD SEED SYSTEM CORPORATION', 1, NULL, NULL, NULL),
(636, 'MVV INTERNET CAF�', 'MVV INTERNET CAF�', 3, NULL, NULL, NULL),
(637, 'MVV WATER REFILLING STATION', 'MVV WATER REFILLING STATION', 1, NULL, NULL, NULL),
(638, 'MVV WATER REFILLING STATION', 'MVV WATER REFILLING STATION', 3, NULL, NULL, NULL),
(639, 'MVW WATER REFILLING STATION', 'MVW WATER REFILLING STATION', 3, NULL, NULL, NULL),
(640, 'MY MOMMY\'S HOUSE OF KARE-KARE', 'MY MOMMY\'S HOUSE OF KARE-KARE', 3, NULL, NULL, NULL),
(641, 'NATIONAL BOOK STORE', 'NATIONAL BOOK STORE', 3, NULL, NULL, NULL),
(642, 'NATIONAL BOOKSTORE SM OLONGAPO', 'NATIONAL BOOKSTORE SM OLONGAPO', 3, NULL, NULL, NULL),
(643, 'NATIONAL STATISTICS OFFICE', 'NATIONAL STATISTICS OFFICE', 3, NULL, NULL, NULL),
(644, 'NAUTILUS DIVE & SPORTS CENTER CORP.', 'NAUTILUS DIVE & SPORTS CENTER CORP.', 2, NULL, NULL, NULL),
(645, 'NAVAL BAKERY & MERCHANDISING', 'NAVAL BAKERY & MERCHANDISING', 3, NULL, NULL, NULL),
(646, 'NEBS FOOD & REFRESHMENT', 'NEBS FOOD & REFRESHMENT', 3, NULL, NULL, NULL),
(647, 'NEW CHERRY BLOSSOM CATERING SERVICES', 'NEW CHERRY BLOSSOM CATERING SERVICES', 2, NULL, NULL, NULL),
(648, 'NEW CITY GLASS & ALUMINUM', 'NEW CITY GLASS & ALUMINUM', 2, NULL, NULL, NULL),
(649, 'NEW FENG HUANG RESTAURANT', 'NEW FENG HUANG RESTAURANT', 2, NULL, NULL, NULL),
(650, 'NEW HAPPY VALLEY SUPERSTORE', 'NEW HAPPY VALLEY SUPERSTORE', 3, NULL, NULL, NULL),
(651, 'NEW RAPRAP TRUCKING SERVICES', 'NEW RAPRAP TRUCKING SERVICES', 1, NULL, NULL, NULL),
(652, 'NEW SHELL MARINA SERVICE STATION', 'NEW SHELL MARINA SERVICE STATION', 3, NULL, NULL, NULL),
(653, 'NEWCARD ENTERPRISES', 'NEWCARD ENTERPRISES', 2, NULL, NULL, NULL),
(654, 'NEWSTAR SHOPPING MART INC.', 'NEWSTAR SHOPPING MART INC.', 3, NULL, NULL, NULL),
(655, 'NEXT FRONTIER TRANSPORT SERVICE', 'NEXT FRONTIER TRANSPORT SERVICE', 2, NULL, NULL, NULL),
(656, 'NGE HARDWARE & COSTRUCTION SUPPLY', 'NGE HARDWARE & COSTRUCTION SUPPLY', 1, NULL, NULL, NULL),
(657, 'NGE TRADING', 'NGE TRADING', 3, NULL, NULL, NULL),
(658, 'NICCO\'S RESTAURANT', 'NICCO\'S RESTAURANT', 1, NULL, NULL, NULL),
(659, 'NICOLAS MERCHANDISING', 'NICOLAS MERCHANDISING', 1, NULL, NULL, NULL),
(660, 'NICO\'S CAR WASH', 'NICO\'S CAR WASH', 2, NULL, NULL, NULL),
(661, 'NIDAS AUTO SUPPLY', 'NIDAS AUTO SUPPLY', 2, NULL, NULL, NULL),
(662, 'NIHONRYORI SAKURA REST.', 'NIHONRYORI SAKURA REST.', 3, NULL, NULL, NULL),
(663, 'NIKKA TRADING', 'NIKKA TRADING', 2, NULL, NULL, NULL),
(664, 'NIKKI AND MOM\'S KITCHEN', 'NIKKI AND MOM\'S KITCHEN', 3, NULL, NULL, NULL),
(665, 'NISSAN BATAAN', 'NISSAN BATAAN', 1, NULL, NULL, NULL),
(666, 'NISSAN PAMPANGA', 'NISSAN PAMPANGA', 3, NULL, NULL, NULL),
(667, 'NOEL KEY SHOP & RUBBER STAM', 'NOEL KEY SHOP & RUBBER STAM', 3, NULL, NULL, NULL),
(668, 'NORBIE\'S PRINTS AND GRAPIX CENTER', 'NORBIE\'S PRINTS AND GRAPIX CENTER', 1, NULL, NULL, NULL),
(669, 'NORDSMAIRE HARDWARE', 'NORDSMAIRE HARDWARE', 2, NULL, NULL, NULL),
(670, 'NORTHVIEW GLASS & ALUMINUM SUPPLY', 'NORTHVIEW GLASS & ALUMINUM SUPPLY', 1, NULL, NULL, NULL),
(671, 'NORTHVIEW TRADING', 'NORTHVIEW TRADING', 1, NULL, NULL, NULL),
(672, 'NOVELEAH FASTFOOD', 'NOVELEAH FASTFOOD', 3, NULL, NULL, NULL),
(673, 'NT GLOBAL INC.', 'NT GLOBAL INC.', 2, NULL, NULL, NULL),
(674, 'NUHAUS LOGISTICS INC.', 'NUHAUS LOGISTICS INC.', 3, NULL, NULL, NULL),
(675, 'NVA GENERAL MERCHANDISE', 'NVA GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(676, 'O.B.P. TRADING', 'O.B.P. TRADING', 1, NULL, NULL, NULL),
(677, 'OCAMPO\'S OLONGAPO', 'OCAMPO\'S OLONGAPO', 3, NULL, NULL, NULL),
(678, 'OCEAN VIEW BEACH RESORT', 'OCEAN VIEW BEACH RESORT', 1, NULL, NULL, NULL),
(679, 'OCGEMPC', 'OCGEMPC', 3, NULL, NULL, NULL),
(680, 'OFFICE WAREHOUSE INC.', 'OFFICE WAREHOUSE INC.', 1, NULL, NULL, NULL),
(681, 'OLDIES BUT GOODIES AND BASIC MODES BAND', 'OLDIES BUT GOODIES AND BASIC MODES BAND', 1, NULL, NULL, NULL),
(682, 'OLONGAPO CADD & PLOTTING CENTER', 'OLONGAPO CADD & PLOTTING CENTER', 1, NULL, NULL, NULL),
(683, 'OLONGAPO CADD & PLOTTING CENTER', 'OLONGAPO CADD & PLOTTING CENTER', 2, NULL, NULL, NULL),
(684, 'OLONGAPO CALTEX SERVICE STATION', 'OLONGAPO CALTEX SERVICE STATION', 2, NULL, NULL, NULL),
(685, 'OLONGAPO CALTEX SERVICE STATION', 'OLONGAPO CALTEX SERVICE STATION', 3, NULL, NULL, NULL),
(686, 'Olongapo City Convention Center', 'Olongapo City Convention Center', 1, NULL, NULL, NULL),
(687, 'OLONGAPO COMMUTER AUTO SUPPLY  ', 'OLONGAPO COMMUTER AUTO SUPPLY  ', 1, NULL, NULL, NULL),
(688, 'OLONGAPO EXPRESS', 'OLONGAPO EXPRESS', 2, NULL, NULL, NULL),
(689, 'OLONGAPO GAS CORP.', 'OLONGAPO GAS CORP.', 1, NULL, NULL, NULL),
(690, 'OLONGAPO GAS CORPORATION', 'OLONGAPO GAS CORPORATION', 2, NULL, NULL, NULL),
(691, 'OLONGAPO GLOBAL TRAINING CENTER', 'OLONGAPO GLOBAL TRAINING CENTER', 3, NULL, NULL, NULL),
(692, 'Olongapo Line Foods Corp./Jollibee', 'Olongapo Line Foods Corp./Jollibee', 1, NULL, NULL, NULL),
(693, 'OLONGAPO LIVELIHOOD SUPPORT SYSTEM', 'OLONGAPO LIVELIHOOD SUPPORT SYSTEM', 1, NULL, NULL, NULL),
(694, 'OLONGAPO PIONEER BUSINESS MACHINE', 'OLONGAPO PIONEER BUSINESS MACHINE', 1, NULL, NULL, NULL),
(695, 'OLONGAPO RICO\'S RESTAURANT', 'OLONGAPO RICO\'S RESTAURANT', 2, NULL, NULL, NULL),
(696, 'OLONGAPO RICO\'S RESTAURANT', 'OLONGAPO RICO\'S RESTAURANT', 3, NULL, NULL, NULL),
(697, 'OLONGAPO TRAVEL LODGE', 'OLONGAPO TRAVEL LODGE', 3, NULL, NULL, NULL),
(698, 'OLONGAPO WIMPY\'S FOOD PLAZA NO. 2', 'OLONGAPO WIMPY\'S FOOD PLAZA NO. 2', 3, NULL, NULL, NULL),
(699, 'ONE MALL\'O POLY WORLD, INC.', 'ONE MALL\'O POLY WORLD, INC.', 1, NULL, NULL, NULL),
(700, 'ORIENT FREIGHT INTERNATIONAL INC.', 'ORIENT FREIGHT INTERNATIONAL INC.', 3, NULL, NULL, NULL),
(701, 'OSCSMTSC, INC.', 'OSCSMTSC, INC.', 3, NULL, NULL, NULL),
(702, 'OUR TODAYS WATER ALKALINE PURE & MIN WATER STATION', 'OUR TODAYS WATER ALKALINE PURE & MIN WATER STATION', 2, NULL, NULL, NULL),
(703, 'OWEL AUTO ELECTRICAL & CAR AIRCON SHOP', 'OWEL AUTO ELECTRICAL & CAR AIRCON SHOP', 2, NULL, NULL, NULL),
(704, 'OWEN\'S REFRIGERATION & CAR AIRCON SERVICES', 'OWEN\'S REFRIGERATION & CAR AIRCON SERVICES', 3, NULL, NULL, NULL),
(705, 'PACLA HYDRAULIC HOUSE', 'PACLA HYDRAULIC HOUSE', 3, NULL, NULL, NULL),
(706, 'PAINT PLUS COLOUR\'S GEN. MERCHANDISE', 'PAINT PLUS COLOUR\'S GEN. MERCHANDISE', 3, NULL, NULL, NULL),
(707, 'PAMPANGA HOSPITAL PRODUCTS', 'PAMPANGA HOSPITAL PRODUCTS', 2, NULL, NULL, NULL),
(708, 'PANCAKE HOUSE, INC.', 'PANCAKE HOUSE, INC.', 1, NULL, NULL, NULL),
(709, 'PANDAYAN BOOKSHOP INC.', 'PANDAYAN BOOKSHOP INC.', 2, NULL, NULL, NULL),
(710, 'PANGILINAN VARIETY STORE', 'PANGILINAN VARIETY STORE', 3, NULL, NULL, NULL),
(711, 'PARADIGM TOP-NOTCH TRADING', 'PARADIGM TOP-NOTCH TRADING', 3, NULL, NULL, NULL),
(712, 'PARFON PRINTING SERVICES', 'PARFON PRINTING SERVICES', 2, NULL, NULL, NULL),
(713, 'PATIENT CARE CORPORATION', 'PATIENT CARE CORPORATION', 3, NULL, NULL, NULL),
(714, 'PAULYN\'S CATERING', 'PAULYN\'S CATERING', 3, NULL, NULL, NULL),
(715, 'PAULYN\'S CATERING', 'PAULYN\'S CATERING', 1, NULL, NULL, NULL),
(716, 'PAYLESS FOOT SPECIALTY RETAILERS, INC.', 'PAYLESS FOOT SPECIALTY RETAILERS, INC.', 3, NULL, NULL, NULL),
(717, 'PC LIVE', 'PC LIVE', 1, NULL, NULL, NULL),
(718, 'PC OK COMPUTERS', 'PC OK COMPUTERS', 2, NULL, NULL, NULL),
(719, 'PC OK COMPUTERS', 'PC OK COMPUTERS', 1, NULL, NULL, NULL),
(720, 'PDJ\'s TRADING', 'PDJ\'s TRADING', 3, NULL, NULL, NULL),
(721, 'PEDRO CRUZ VARIETY STORE', 'PEDRO CRUZ VARIETY STORE', 3, NULL, NULL, NULL),
(722, 'PENTAGRAPH ADVERTISING', 'PENTAGRAPH ADVERTISING', 1, NULL, NULL, NULL),
(723, 'PERLY\'S VARIETY STORE', 'PERLY\'S VARIETY STORE', 1, NULL, NULL, NULL),
(724, 'PERT CYCLE PARTS', 'PERT CYCLE PARTS', 1, NULL, NULL, NULL),
(725, 'PESIMO ELECTRICAL PARTS SUPPLY', 'PESIMO ELECTRICAL PARTS SUPPLY', 3, NULL, NULL, NULL),
(726, 'PHIL-AM MART APPLIANCES, FURNITURE & GASUL DEALER', 'PHIL-AM MART APPLIANCES, FURNITURE & GASUL DEALER', 1, NULL, NULL, NULL),
(727, 'PHIL-AM MART GASUL DEALER', 'PHIL-AM MART GASUL DEALER', 1, NULL, NULL, NULL),
(728, 'PHIL-AM MART-OUTLET 3', 'PHIL-AM MART-OUTLET 3', 1, NULL, NULL, NULL),
(729, 'PHILCOPY CORP.-OLONGAPO BRANCH', 'PHILCOPY CORP.-OLONGAPO BRANCH', 3, NULL, NULL, NULL),
(730, 'PHILCOPY CORPORATION-OLONGAPO BRANCH', 'PHILCOPY CORPORATION-OLONGAPO BRANCH', 2, NULL, NULL, NULL),
(731, 'PHILECOLOGY SYSTEMS CORPORATION', 'PHILECOLOGY SYSTEMS CORPORATION', 3, NULL, NULL, NULL),
(732, 'PHILIPPINE STATISTICS AUTHORITY', 'PHILIPPINE STATISTICS AUTHORITY', 2, NULL, NULL, NULL),
(733, 'PHOTOGENICS DIGITAL PHOTOGRAPHY', 'PHOTOGENICS DIGITAL PHOTOGRAPHY', 3, NULL, NULL, NULL),
(734, 'PHOTOLINE ENTERPRISES CORP.', 'PHOTOLINE ENTERPRISES CORP.', 3, NULL, NULL, NULL),
(735, 'PICTURE CITY', 'PICTURE CITY', 3, NULL, NULL, NULL),
(736, 'PMR TRADING', 'PMR TRADING', 3, NULL, NULL, NULL),
(737, 'POWERBOOKS SPECIALTY STORE', 'POWERBOOKS SPECIALTY STORE', 3, NULL, NULL, NULL),
(738, 'PPCI SUBIC, INC.', 'PPCI SUBIC, INC.', 2, NULL, NULL, NULL),
(739, 'PRE-ANS ENTERPRISES', 'PRE-ANS ENTERPRISES', 2, NULL, NULL, NULL),
(740, 'PRECISION TEK', 'PRECISION TEK', 2, NULL, NULL, NULL),
(741, 'PRINT IMPRESS SUPPLIES & SERVICES', 'PRINT IMPRESS SUPPLIES & SERVICES', 3, NULL, NULL, NULL),
(742, 'PRINTON PRESS', 'PRINTON PRESS', 2, NULL, NULL, NULL),
(743, 'PRO WORX ENGINEERING SERVICES', 'PRO WORX ENGINEERING SERVICES', 1, NULL, NULL, NULL),
(744, 'PROFAIR TRADE DEV\'T AGENCY SC LTD., CO.', 'PROFAIR TRADE DEV\'T AGENCY SC LTD., CO.', 1, NULL, NULL, NULL),
(745, 'PROGRESSIVE MEDICAL CORPORATION', 'PROGRESSIVE MEDICAL CORPORATION', 3, NULL, NULL, NULL),
(746, 'PROJECT R AUTO SHOP', 'PROJECT R AUTO SHOP', 2, NULL, NULL, NULL),
(747, 'PSI PSYCHOLOGICAL TESTING AND RESEARCH SERVICES', 'PSI PSYCHOLOGICAL TESTING AND RESEARCH SERVICES', 1, NULL, NULL, NULL),
(748, 'PTS LPG OUTLET', 'PTS LPG OUTLET', 3, NULL, NULL, NULL),
(749, 'PUREGOLD DUTY FREE SUBIC, INC.', 'PUREGOLD DUTY FREE SUBIC, INC.', 3, NULL, NULL, NULL),
(750, 'PUREGOLD PRICE CLUB, INC.', 'PUREGOLD PRICE CLUB, INC.', 2, NULL, NULL, NULL),
(751, 'QUIMAN TRADING', 'QUIMAN TRADING', 2, NULL, NULL, NULL),
(752, 'R & SOL RTW & STORE', 'R & SOL RTW & STORE', 1, NULL, NULL, NULL),
(753, 'R CT CAR2 AUTO SHOP', 'R CT CAR2 AUTO SHOP', 2, NULL, NULL, NULL),
(754, 'R CT CAR2 AUTO SHOP', 'R CT CAR2 AUTO SHOP', 2, NULL, NULL, NULL),
(755, 'R CT CAR2 AUTO SHOP', 'R CT CAR2 AUTO SHOP', 2, NULL, NULL, NULL),
(756, 'R IGNACIO HARDWARE & CONSTRUCTION SUPPLY', 'R IGNACIO HARDWARE & CONSTRUCTION SUPPLY', 2, NULL, NULL, NULL),
(757, 'R IGNACIO TRADING', 'R IGNACIO TRADING', 3, NULL, NULL, NULL),
(758, 'R. OCAMPO GENERAL MERCHANDISE', 'R. OCAMPO GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(759, 'R.A.G. AUTO PARTS', 'R.A.G. AUTO PARTS', 3, NULL, NULL, NULL),
(760, 'R.C.S. TRAVELLING PEDDLER', 'R.C.S. TRAVELLING PEDDLER', 1, NULL, NULL, NULL),
(761, 'R.C.S. TRAVELLING PEDDLER', 'R.C.S. TRAVELLING PEDDLER', 2, NULL, NULL, NULL),
(762, 'R.E.E.M VARIETY STORE', 'R.E.E.M VARIETY STORE', 1, NULL, NULL, NULL),
(763, 'RADIOTEC COMMUNICATIONS INCORPORATED', 'RADIOTEC COMMUNICATIONS INCORPORATED', 1, NULL, NULL, NULL),
(764, 'RADIOTECH COMMUNICATION, INC.', 'RADIOTECH COMMUNICATION, INC.', 1, NULL, NULL, NULL),
(765, 'RALI\'S GRILL AND BAR', 'RALI\'S GRILL AND BAR', 3, NULL, NULL, NULL),
(766, 'RAM SAM GEN. MERCHANDISE', 'RAM SAM GEN. MERCHANDISE', 3, NULL, NULL, NULL),
(767, 'RAMON ROSEMARIE ELECTRICAL SHOP & SUPPLY', 'RAMON ROSEMARIE ELECTRICAL SHOP & SUPPLY', 3, NULL, NULL, NULL),
(768, 'RANZ ALL WEATHER LAUNDRY SERVICES', 'RANZ ALL WEATHER LAUNDRY SERVICES', 1, NULL, NULL, NULL),
(769, 'RANZ ALL WEATHER LAUNDRY SERVICES', 'RANZ ALL WEATHER LAUNDRY SERVICES', 3, NULL, NULL, NULL),
(770, 'RAPID and PRECISE DIAGNOSTIC AND MEDICAL SUPPLIES', 'RAPID and PRECISE DIAGNOSTIC AND MEDICAL SUPPLIES', 3, NULL, NULL, NULL),
(771, 'RAYVEN\'S FLOWERS', 'RAYVEN\'S FLOWERS', 2, NULL, NULL, NULL),
(772, 'RB AUTO WORKS', 'RB AUTO WORKS', 1, NULL, NULL, NULL),
(773, 'RBGM MEDICAL ENTERPRISES', 'RBGM MEDICAL ENTERPRISES', 3, NULL, NULL, NULL),
(774, 'RCT CAR2 AUTO SHOP', 'RCT CAR2 AUTO SHOP', 3, NULL, NULL, NULL),
(775, 'RCTF TRADING', 'RCTF TRADING', 3, NULL, NULL, NULL),
(776, 'RDF MEATSHOP INC.', 'RDF MEATSHOP INC.', 1, NULL, NULL, NULL),
(777, 'READY FORM INC.', 'READY FORM INC.', 2, NULL, NULL, NULL),
(778, 'REAL ESTATE LESSOR', 'REAL ESTATE LESSOR', 2, NULL, NULL, NULL),
(779, 'RED RIBBON BAKESHOP OLONGAPO BRANCH', 'RED RIBBON BAKESHOP OLONGAPO BRANCH', 3, NULL, NULL, NULL),
(780, 'RENATO S. RIBOT', 'RENATO S. RIBOT', 1, NULL, NULL, NULL),
(781, 'RENE\'s LOCKSMITH & RUBBER', 'RENE\'s LOCKSMITH & RUBBER', 3, NULL, NULL, NULL),
(782, 'RENE\'S LOCKSMITH & RUBBER STAMP', 'RENE\'S LOCKSMITH & RUBBER STAMP', 2, NULL, NULL, NULL),
(783, 'REYES BARBECUE', 'REYES BARBECUE', 1, NULL, NULL, NULL),
(784, 'RG TROPHY RONEENA INC.', 'RG TROPHY RONEENA INC.', 1, NULL, NULL, NULL),
(785, 'RICH MIX LIGHTS & SOUNDS', 'RICH MIX LIGHTS & SOUNDS', 1, NULL, NULL, NULL),
(786, 'RICOS FASTFOOD & RESTAURANT', 'RICOS FASTFOOD & RESTAURANT', 3, NULL, NULL, NULL),
(787, 'RICOS FOOD VENTURES II', 'RICOS FOOD VENTURES II', 3, NULL, NULL, NULL),
(788, 'RIZMER AUTO SUPPLY', 'RIZMER AUTO SUPPLY', 2, NULL, NULL, NULL),
(789, 'ROD & SOL RTW', 'ROD & SOL RTW', 2, NULL, NULL, NULL),
(790, 'ROGERS ELECTRICAL AIRCON SERVICES & SUPPLY', 'ROGERS ELECTRICAL AIRCON SERVICES & SUPPLY', 2, NULL, NULL, NULL),
(791, 'ROGER\'S ELECTRICAL AIRCON SERVICES& SUPPLY', 'ROGER\'S ELECTRICAL AIRCON SERVICES& SUPPLY', 1, NULL, NULL, NULL),
(792, 'ROLLY & CYNTHIA HOUSE OF', 'ROLLY & CYNTHIA HOUSE OF', 1, NULL, NULL, NULL),
(793, 'ROLLY &CYNTHIA HOUSE & CURTAINS', 'ROLLY &CYNTHIA HOUSE & CURTAINS', 1, NULL, NULL, NULL),
(794, 'RONA\'S EDUCATIONAL SUPPLY', 'RONA\'S EDUCATIONAL SUPPLY', 2, NULL, NULL, NULL),
(795, 'RONA\'S EDUCATIONAL SUPPLY', 'RONA\'S EDUCATIONAL SUPPLY', 3, NULL, NULL, NULL),
(796, 'RONEENA INCORPORATED', 'RONEENA INCORPORATED', 1, NULL, NULL, NULL),
(797, 'RONNETTE\'S EDUCATIONAL SUPPLY', 'RONNETTE\'S EDUCATIONAL SUPPLY', 2, NULL, NULL, NULL),
(798, 'RONS FURNITURE INNOVATOR', 'RONS FURNITURE INNOVATOR', 2, NULL, NULL, NULL),
(799, 'ROSARIO CABRIOUS-PROPIETOR TABITHA FOOD SHOP', 'ROSARIO CABRIOUS-PROPIETOR TABITHA FOOD SHOP', 3, NULL, NULL, NULL),
(800, 'ROXAS LOCKSMITH', 'ROXAS LOCKSMITH', 1, NULL, NULL, NULL),
(801, 'ROYAL DUTY FREE SHOP', 'ROYAL DUTY FREE SHOP', 2, NULL, NULL, NULL),
(802, 'ROYCE MOTOR CENTER INC.', 'ROYCE MOTOR CENTER INC.', 2, NULL, NULL, NULL),
(803, 'RPR CONSTRUCTION & GENERAL SERVICES', 'RPR CONSTRUCTION & GENERAL SERVICES', 2, NULL, NULL, NULL),
(804, 'RRL MARIKINA MARKETING CENTER INC.', 'RRL MARIKINA MARKETING CENTER INC.', 3, NULL, NULL, NULL),
(805, 'RTD AIR CONDITIONING SERVICES', 'RTD AIR CONDITIONING SERVICES', 1, NULL, NULL, NULL),
(806, 'RUEL SAN DIEGO DRESS & TAILORING SHOP', 'RUEL SAN DIEGO DRESS & TAILORING SHOP', 3, NULL, NULL, NULL),
(807, 'RVJ TRAVEL TOUR & SERVICES', 'RVJ TRAVEL TOUR & SERVICES', 3, NULL, NULL, NULL),
(808, 'S & R FOOD SERVICE', 'S & R FOOD SERVICE', 2, NULL, NULL, NULL),
(809, 'S & S  MARKETING BRANCH 1', 'S & S  MARKETING BRANCH 1', 2, NULL, NULL, NULL),
(810, 'SACHI SUBIC, INC.', 'SACHI SUBIC, INC.', 2, NULL, NULL, NULL),
(811, 'SAFETYMATE INDUSTRIAL PRODUCTS', 'SAFETYMATE INDUSTRIAL PRODUCTS', 2, NULL, NULL, NULL),
(812, 'SAFEWASTE INCORPORATED', 'SAFEWASTE INCORPORATED', 1, NULL, NULL, NULL),
(813, 'SAFEWASTE MARKETING', 'SAFEWASTE MARKETING', 3, NULL, NULL, NULL),
(814, 'SAFEWASTE MARKETING', 'SAFEWASTE MARKETING', 2, NULL, NULL, NULL),
(815, 'SAINT FRANCIS GARDEN CENTER T', 'SAINT FRANCIS GARDEN CENTER T', 2, NULL, NULL, NULL),
(816, 'SAINT FX MULTI-MEDIA STUDIO', 'SAINT FX MULTI-MEDIA STUDIO', 1, NULL, NULL, NULL),
(817, 'SAKURA RESTAURANT', 'SAKURA RESTAURANT', 1, NULL, NULL, NULL),
(818, 'SALLES STEEL FABRICATION & BUILDERS', 'SALLES STEEL FABRICATION & BUILDERS', 2, NULL, NULL, NULL),
(819, 'SAMERBY TRADING', 'SAMERBY TRADING', 3, NULL, NULL, NULL),
(820, 'SAMERBY TRADING', 'SAMERBY TRADING', 1, NULL, NULL, NULL),
(821, 'SAMMY TRADING & GENERAL SERVICES', 'SAMMY TRADING & GENERAL SERVICES', 3, NULL, NULL, NULL),
(822, 'SAMMY\'S TRADING & GEN. SERVICES', 'SAMMY\'S TRADING & GEN. SERVICES', 3, NULL, NULL, NULL),
(823, 'SAM\'S PIZZA', 'SAM\'S PIZZA', 3, NULL, NULL, NULL),
(824, 'SAN DIEGO TAILORING SHOP', 'SAN DIEGO TAILORING SHOP', 1, NULL, NULL, NULL),
(825, 'SAN FERNANDO ELEMENTARY SCHOOL TEACHERS M.P.C.', 'SAN FERNANDO ELEMENTARY SCHOOL TEACHERS M.P.C.', 3, NULL, NULL, NULL),
(826, 'SANBER AUTO PARTS', 'SANBER AUTO PARTS', 2, NULL, NULL, NULL),
(827, 'SANCAPA VARIETY STORE', 'SANCAPA VARIETY STORE', 1, NULL, NULL, NULL),
(828, 'SANCAPA VARIETY STORE', 'SANCAPA VARIETY STORE', 2, NULL, NULL, NULL),
(829, 'SANLIE T-SHIRTS GARMENTS', 'SANLIE T-SHIRTS GARMENTS', 1, NULL, NULL, NULL),
(830, 'SANNOVEX PHARMACEUTICAL', 'SANNOVEX PHARMACEUTICAL', 1, NULL, NULL, NULL),
(831, 'SANTOL COMPUTER WORLD PLUS', 'SANTOL COMPUTER WORLD PLUS', 3, NULL, NULL, NULL),
(832, 'SANVEN MEDICAL ENTERPRISES', 'SANVEN MEDICAL ENTERPRISES', 3, NULL, NULL, NULL),
(833, 'SARI SARI STORE', 'SARI SARI STORE', 3, NULL, NULL, NULL),
(834, 'SARMIENTO PEST CONTROL SERVICES', 'SARMIENTO PEST CONTROL SERVICES', 3, NULL, NULL, NULL),
(835, 'SAVER\'S DIGITAL HUB APPLIANCE DEPOT', 'SAVER\'S DIGITAL HUB APPLIANCE DEPOT', 3, NULL, NULL, NULL),
(836, 'SAVIOR MEDEVICES INC.', 'SAVIOR MEDEVICES INC.', 2, NULL, NULL, NULL),
(837, 'SAVIOUR MEDEVICES, INC.', 'SAVIOUR MEDEVICES, INC.', 3, NULL, NULL, NULL),
(838, 'SBWVMPCI', 'SBWVMPCI', 2, NULL, NULL, NULL),
(839, 'SC FOOD CORPORATION', 'SC FOOD CORPORATION', 3, NULL, NULL, NULL),
(840, 'SCANDINASIA VIKINGS CORPORATION', 'SCANDINASIA VIKINGS CORPORATION', 2, NULL, NULL, NULL),
(841, 'SCENTDLE ENTERPRISE', 'SCENTDLE ENTERPRISE', 2, NULL, NULL, NULL),
(842, 'SCHOOLMART EDUCATION SUPPLY & GEN. MDSE.', 'SCHOOLMART EDUCATION SUPPLY & GEN. MDSE.', 3, NULL, NULL, NULL),
(843, 'SEA MARINE SUBIC WORTHY SERVICES & TRADING CORP.', 'SEA MARINE SUBIC WORTHY SERVICES & TRADING CORP.', 1, NULL, NULL, NULL),
(844, 'SEAFOOD BY THE BAY', 'SEAFOOD BY THE BAY', 2, NULL, NULL, NULL),
(845, 'SEE LAI TRADING', 'SEE LAI TRADING', 1, NULL, NULL, NULL),
(846, 'SEE-LAI TRADING', 'SEE-LAI TRADING', 2, NULL, NULL, NULL),
(847, 'SENSORMEDICS ENTERPRISES', 'SENSORMEDICS ENTERPRISES', 1, NULL, NULL, NULL),
(848, 'SERVANT ARTS & SIGNS', 'SERVANT ARTS & SIGNS', 3, NULL, NULL, NULL),
(849, 'SFP VILLA ALFREDO\'S RESORT CORPORATION', 'SFP VILLA ALFREDO\'S RESORT CORPORATION', 3, NULL, NULL, NULL),
(850, 'SGS PHILIPPINES, INC.', 'SGS PHILIPPINES, INC.', 1, NULL, NULL, NULL),
(851, 'SHAKEYS PIZZA RESTAURANT', 'SHAKEYS PIZZA RESTAURANT', 2, NULL, NULL, NULL),
(852, 'SHAN GENERAL MERCHANDISE', 'SHAN GENERAL MERCHANDISE', 3, NULL, NULL, NULL),
(853, 'SHENG CHI DRUGSTORE', 'SHENG CHI DRUGSTORE', 3, NULL, NULL, NULL),
(854, 'SHOP & CARRY EXPRESSMART', 'SHOP & CARRY EXPRESSMART', 3, NULL, NULL, NULL),
(855, 'SILANGAN CANVAS & UPHOLSTERY', 'SILANGAN CANVAS & UPHOLSTERY', 2, NULL, NULL, NULL),
(856, 'SILVER SKY ENTERPRISES', 'SILVER SKY ENTERPRISES', 2, NULL, NULL, NULL),
(857, 'SIZZLING PLATE', 'SIZZLING PLATE', 3, NULL, NULL, NULL),
(858, 'SJ ART WORK & SIGN', 'SJ ART WORK & SIGN', 1, NULL, NULL, NULL),
(859, 'SJC VAN & CAR FOR RENT', 'SJC VAN & CAR FOR RENT', 1, NULL, NULL, NULL),
(860, 'SM APPLIANCE CENTER ', 'SM APPLIANCE CENTER ', 3, NULL, NULL, NULL),
(861, 'SM DEPARTMENT STORE OLONGAPO', 'SM DEPARTMENT STORE OLONGAPO', 2, NULL, NULL, NULL),
(862, 'SM DEPARTMENT STORE OLONGAPO', 'SM DEPARTMENT STORE OLONGAPO', 2, NULL, NULL, NULL),
(863, 'SM SUPERMARKET-OLONGAPO', 'SM SUPERMARKET-OLONGAPO', 1, NULL, NULL, NULL),
(864, 'SMARTGUARD PHILIPPINES', 'SMARTGUARD PHILIPPINES', 3, NULL, NULL, NULL),
(865, 'SMARTGUARD PHILIPPINES, INC.', 'SMARTGUARD PHILIPPINES, INC.', 3, NULL, NULL, NULL),
(866, 'SOL RTW VARIETY STORE', 'SOL RTW VARIETY STORE', 3, NULL, NULL, NULL),
(867, 'SOLAR FLEX MARKETING', 'SOLAR FLEX MARKETING', 3, NULL, NULL, NULL),
(868, 'SOLAR ICE ENTERPRISES', 'SOLAR ICE ENTERPRISES', 3, NULL, NULL, NULL),
(869, 'SOLAR LED STREET LIGHTING SYSTEM', 'SOLAR LED STREET LIGHTING SYSTEM', 3, NULL, NULL, NULL),
(870, 'SOLID METAL ENGRAVING SHOP', 'SOLID METAL ENGRAVING SHOP', 3, NULL, NULL, NULL),
(871, 'SON\'S WEN FASTFOOD', 'SON\'S WEN FASTFOOD', 2, NULL, NULL, NULL),
(872, 'SON\'S WEN FASTFOOD', 'SON\'S WEN FASTFOOD', 3, NULL, NULL, NULL),
(873, 'SOPIMUS PRINTNET SOLUTIONS', 'SOPIMUS PRINTNET SOLUTIONS', 2, NULL, NULL, NULL),
(874, 'SPARE AUTO SUPPLY', 'SPARE AUTO SUPPLY', 2, NULL, NULL, NULL),
(875, 'SPEED LANE TRANSPORT & SERVICES', 'SPEED LANE TRANSPORT & SERVICES', 2, NULL, NULL, NULL),
(876, 'SPEED PRINT GRAPHICS', 'SPEED PRINT GRAPHICS', 3, NULL, NULL, NULL),
(877, 'SPEEDPRINT GRAPHICS', 'SPEEDPRINT GRAPHICS', 2, NULL, NULL, NULL),
(878, 'SPEEDPRINT GRAPHICS', 'SPEEDPRINT GRAPHICS', 3, NULL, NULL, NULL),
(879, 'SRM AUTO REPAIR SHOP', 'SRM AUTO REPAIR SHOP', 2, NULL, NULL, NULL),
(880, 'ST FRANCIS GARDEN CENTER', 'ST FRANCIS GARDEN CENTER', 1, NULL, NULL, NULL),
(881, 'STA ANA ENTERPRISES', 'STA ANA ENTERPRISES', 1, NULL, NULL, NULL),
(882, 'STA MONICA GLASS & ALUMINUM', 'STA MONICA GLASS & ALUMINUM', 2, NULL, NULL, NULL),
(883, 'STA RITA VULCANIZING', 'STA RITA VULCANIZING', 3, NULL, NULL, NULL),
(884, 'STA. RITA FILTRATION GATE OPERATORS & DRIVERS ASSOCIATION OF OLONGAPO CITY (YELLOW JEEP) INC.', 'STA. RITA FILTRATION GATE OPERATORS & DRIVERS ASSOCIATION OF OLONGAPO CITY (YELLOW JEEP) INC.', 2, NULL, NULL, NULL),
(885, 'STANDARD BLUE AURO SUPPLY', 'STANDARD BLUE AURO SUPPLY', 2, NULL, NULL, NULL),
(886, 'STARBUCKS COFFEE', 'STARBUCKS COFFEE', 3, NULL, NULL, NULL),
(887, 'SUBIC ADS ', 'SUBIC ADS ', 2, NULL, NULL, NULL),
(888, 'SUBIC AMUSEMENT ENTERPRISES INC.', 'SUBIC AMUSEMENT ENTERPRISES INC.', 1, NULL, NULL, NULL),
(889, 'SUBIC AUTO RESTORATION & GEN. MDSE.', 'SUBIC AUTO RESTORATION & GEN. MDSE.', 3, NULL, NULL, NULL),
(890, 'SUBIC BAY EXPLORATORIUM, INC.', 'SUBIC BAY EXPLORATORIUM, INC.', 3, NULL, NULL, NULL),
(891, 'SUBIC BAY SILK SCREEN PRINTING', 'SUBIC BAY SILK SCREEN PRINTING', 3, NULL, NULL, NULL),
(892, 'SUBIC BAY TRAVELERS HOTEL & EVENT CENTER INC.', 'SUBIC BAY TRAVELERS HOTEL & EVENT CENTER INC.', 3, NULL, NULL, NULL),
(893, 'SUBIC BAY VAN TRANSPORT DRIVERS & OPRTS ASSOC INC.', 'SUBIC BAY VAN TRANSPORT DRIVERS & OPRTS ASSOC INC.', 2, NULL, NULL, NULL),
(894, 'SUBIC BAY VENEZIA HOTEL & RESTAURANT', 'SUBIC BAY VENEZIA HOTEL & RESTAURANT', 1, NULL, NULL, NULL),
(895, 'SUBIC BAY VENEZIZ HOTEL', 'SUBIC BAY VENEZIZ HOTEL', 2, NULL, NULL, NULL),
(896, 'SUBIC BAY YATCH CLUB', 'SUBIC BAY YATCH CLUB', 3, NULL, NULL, NULL),
(897, 'SUBIC BISTRO AMERICANO CORP.', 'SUBIC BISTRO AMERICANO CORP.', 2, NULL, NULL, NULL),
(898, 'SUBIC CAWAG UPLAND FARMER\'S ASS\'N (SCUFA), INC.', 'SUBIC CAWAG UPLAND FARMER\'S ASS\'N (SCUFA), INC.', 1, NULL, NULL, NULL),
(899, 'SUBIC COASTAL DEV. CORP.', 'SUBIC COASTAL DEV. CORP.', 3, NULL, NULL, NULL),
(900, 'SUBIC DUTY FREE SHOP, INC.', 'SUBIC DUTY FREE SHOP, INC.', 3, NULL, NULL, NULL),
(901, 'SUBIC FORTUNE HONGKONG SEAFOOD RESTAURANT', 'SUBIC FORTUNE HONGKONG SEAFOOD RESTAURANT', 2, NULL, NULL, NULL),
(902, 'SUBIC HOMES INC.', 'SUBIC HOMES INC.', 2, NULL, NULL, NULL),
(903, 'SUBIC INTERNATIONAL HOTEL CORP.', 'SUBIC INTERNATIONAL HOTEL CORP.', 1, NULL, NULL, NULL),
(904, 'SUBIC KOREAN HOTEL & RESTAURANT & GEN. MDSE. INC.', 'SUBIC KOREAN HOTEL & RESTAURANT & GEN. MDSE. INC.', 1, NULL, NULL, NULL),
(905, 'SUBIC LIGHTHOUSE CONST. & DEV\'T CORP.', 'SUBIC LIGHTHOUSE CONST. & DEV\'T CORP.', 2, NULL, NULL, NULL),
(906, 'SUBIC RESIDENCIA\'S', 'SUBIC RESIDENCIA\'S', 1, NULL, NULL, NULL),
(907, 'SUBICWATER & SEWERAGE CO., INC.', 'SUBICWATER & SEWERAGE CO., INC.', 2, NULL, NULL, NULL),
(908, 'SUBIK AIR SALES & GENERAL SERVICES', 'SUBIK AIR SALES & GENERAL SERVICES', 1, NULL, NULL, NULL),
(909, 'SUNLIGHT GLASS & ALUMINUM SUPPLY', 'SUNLIGHT GLASS & ALUMINUM SUPPLY', 2, NULL, NULL, NULL),
(910, 'SUNNY SMILE FOOD CORP.', 'SUNNY SMILE FOOD CORP.', 2, NULL, NULL, NULL),
(911, 'SWEET TOOTH CORP.(GOLDILOCKS)', 'SWEET TOOTH CORP.(GOLDILOCKS)', 3, NULL, NULL, NULL),
(912, 'SXY GENERAL MERCHANDISE', 'SXY GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(913, 'SYNERGY SALES INT\'L CORP.', 'SYNERGY SALES INT\'L CORP.', 2, NULL, NULL, NULL),
(914, 'T.H.E. ELECTRONICS BOUTIQUE INC. GENERAL MERCHANDISE', 'T.H.E. ELECTRONICS BOUTIQUE INC. GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(915, 'TACTICAL OPTION GENERAL MERCHANDISE', 'TACTICAL OPTION GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(916, 'TAIJIMAN INTERNATIONAL VENTURES', 'TAIJIMAN INTERNATIONAL VENTURES', 1, NULL, NULL, NULL),
(917, 'TAMAYO\'S TRADING & MACHINE SHOP', 'TAMAYO\'S TRADING & MACHINE SHOP', 3, NULL, NULL, NULL),
(918, 'TAMPENGCO CONSTRUCTION & SUPPLIES', 'TAMPENGCO CONSTRUCTION & SUPPLIES', 1, NULL, NULL, NULL),
(919, 'TANAWIN BED & BREAKFAST', 'TANAWIN BED & BREAKFAST', 1, NULL, NULL, NULL),
(920, 'TAUTON WELDING SHOP', 'TAUTON WELDING SHOP', 2, NULL, NULL, NULL),
(921, 'TEARDROPS PURIFIED DRINKING WATER', 'TEARDROPS PURIFIED DRINKING WATER', 2, NULL, NULL, NULL),
(922, 'TELETRONICS COMPUTERS & ELECTRONICS', 'TELETRONICS COMPUTERS & ELECTRONICS', 2, NULL, NULL, NULL),
(923, 'TEMPURA JAPANESE GRILL', 'TEMPURA JAPANESE GRILL', 2, NULL, NULL, NULL),
(924, 'TERIYAKI BOY', 'TERIYAKI BOY', 1, NULL, NULL, NULL),
(925, 'TESTON MARKETING', 'TESTON MARKETING', 1, NULL, NULL, NULL),
(926, 'TEXAS JOE\'S HOUSE OF RIBS AND TJ\'S SALOON', 'TEXAS JOE\'S HOUSE OF RIBS AND TJ\'S SALOON', 3, NULL, NULL, NULL),
(927, 'THABBY\'S CATERING SERVICES', 'THABBY\'S CATERING SERVICES', 1, NULL, NULL, NULL),
(928, 'THAN-THAN\'S FARM RESORT', 'THAN-THAN\'S FARM RESORT', 3, NULL, NULL, NULL),
(929, 'THE DIY SHOP CORP.', 'THE DIY SHOP CORP.', 3, NULL, NULL, NULL),
(930, 'THE LIGHTHOUSE MARINA RESORT', 'THE LIGHTHOUSE MARINA RESORT', 1, NULL, NULL, NULL),
(931, 'THE UNIFIED IT DISTRIBUTION-OLONGAPO INC.', 'THE UNIFIED IT DISTRIBUTION-OLONGAPO INC.', 3, NULL, NULL, NULL),
(932, 'THREE J\'S HARDWARE & CONSTRUCTION SUPPLY', 'THREE J\'S HARDWARE & CONSTRUCTION SUPPLY', 2, NULL, NULL, NULL),
(933, 'TINEE WATER REFILLING STATION', 'TINEE WATER REFILLING STATION', 1, NULL, NULL, NULL),
(934, 'TINIO\'S DRYGOODS', 'TINIO\'S DRYGOODS', 1, NULL, NULL, NULL),
(935, 'TIVAS HOMEMADE PRODUCT', 'TIVAS HOMEMADE PRODUCT', 3, NULL, NULL, NULL),
(936, 'TIXSPS FEATURES ENTERPRISES', 'TIXSPS FEATURES ENTERPRISES', 2, NULL, NULL, NULL),
(937, 'TOLENTINO UPHOLSTERY SHOP', 'TOLENTINO UPHOLSTERY SHOP', 3, NULL, NULL, NULL),
(938, 'TOMIE\'S MOTOR WORKS', 'TOMIE\'S MOTOR WORKS', 3, NULL, NULL, NULL),
(939, 'TOMIE\'S MOTOR WORKS', 'TOMIE\'S MOTOR WORKS', 2, NULL, NULL, NULL),
(940, 'TONY AND ANN\'S CATERING SERVICES', 'TONY AND ANN\'S CATERING SERVICES', 2, NULL, NULL, NULL),
(941, 'TOP COMS MARKETING', 'TOP COMS MARKETING', 3, NULL, NULL, NULL),
(942, 'TORING\'S DRY GOODS', 'TORING\'S DRY GOODS', 1, NULL, NULL, NULL),
(943, 'TOWER MEDICAL', 'TOWER MEDICAL', 3, NULL, NULL, NULL),
(944, 'TOYOTA BALINTAWAK', 'TOYOTA BALINTAWAK', 3, NULL, NULL, NULL),
(945, 'TOYOTA SAN FERNANDO PAMPANGA INC.', 'TOYOTA SAN FERNANDO PAMPANGA INC.', 2, NULL, NULL, NULL),
(946, 'TOYOTA SAN FERNANDO PAMPANGA INC.', 'TOYOTA SAN FERNANDO PAMPANGA INC.', 2, NULL, NULL, NULL),
(947, 'TRAVEL LODGE', 'TRAVEL LODGE', 1, NULL, NULL, NULL),
(948, 'TRI STAR RENT-A-CAR', 'TRI STAR RENT-A-CAR', 1, NULL, NULL, NULL),
(949, 'TRIANGLE ACE LUMBER & HARDWARE', 'TRIANGLE ACE LUMBER & HARDWARE', 2, NULL, NULL, NULL),
(950, 'TRIANGLE ACE LUMBER & HARDWARE', 'TRIANGLE ACE LUMBER & HARDWARE', 1, NULL, NULL, NULL),
(951, 'TRICKSHOT BADMINTON COURT', 'TRICKSHOT BADMINTON COURT', 3, NULL, NULL, NULL),
(952, 'TRIPLE W. CYCLE & LUBE PARTS', 'TRIPLE W. CYCLE & LUBE PARTS', 2, NULL, NULL, NULL),
(953, 'TROPICAL BAY RESTAURANT & CATERING', 'TROPICAL BAY RESTAURANT & CATERING', 1, NULL, NULL, NULL),
(954, 'TTNJ GENERAL MERCHANDISE', 'TTNJ GENERAL MERCHANDISE', 3, NULL, NULL, NULL),
(955, 'TUMMYTUMS FOODS CORPORATION', 'TUMMYTUMS FOODS CORPORATION', 3, NULL, NULL, NULL),
(956, 'TUV RHEINLAND PHILIPPINES', 'TUV RHEINLAND PHILIPPINES', 1, NULL, NULL, NULL),
(957, 'TUV RHEINLAND PHILIPPINES INC.', 'TUV RHEINLAND PHILIPPINES INC.', 2, NULL, NULL, NULL),
(958, 'TVD ADVERTISING', 'TVD ADVERTISING', 1, NULL, NULL, NULL),
(959, 'TVD ADVERTISING', 'TVD ADVERTISING', 2, NULL, NULL, NULL),
(960, 'TWIN LLKITCHENETTE', 'TWIN LLKITCHENETTE', 2, NULL, NULL, NULL),
(961, 'U-BIX SUBIC BAY CORPORATION', 'U-BIX SUBIC BAY CORPORATION', 3, NULL, NULL, NULL),
(962, 'ULANDAY FLOWER SHOP', 'ULANDAY FLOWER SHOP', 1, NULL, NULL, NULL),
(963, 'ULO NG APO VISION ELECTRONICS & GEN. MDSE.', 'ULO NG APO VISION ELECTRONICS & GEN. MDSE.', 2, NULL, NULL, NULL),
(964, 'ULTRA KIT GENERAL MERCHANDISE', 'ULTRA KIT GENERAL MERCHANDISE', 2, NULL, NULL, NULL),
(965, 'UNITECH INDUSTRIAL SALES INC.', 'UNITECH INDUSTRIAL SALES INC.', 3, NULL, NULL, NULL),
(966, 'UNITED DIAGNOSTIC SUPPLY', 'UNITED DIAGNOSTIC SUPPLY', 2, NULL, NULL, NULL),
(967, 'UNITED LABORATORIES INC.', 'UNITED LABORATORIES INC.', 1, NULL, NULL, NULL),
(968, 'UNIVERSAL CAR RENTAL', 'UNIVERSAL CAR RENTAL', 2, NULL, NULL, NULL),
(969, 'UNIVERSAL MAGAZINE EXCHANGE CORP.', 'UNIVERSAL MAGAZINE EXCHANGE CORP.', 1, NULL, NULL, NULL),
(970, 'uniZENTRO APPLIANCE & FURNITURE STORE', 'uniZENTRO APPLIANCE & FURNITURE STORE', 1, NULL, NULL, NULL),
(971, 'USA PENTAGRAPH ADVERTISING', 'USA PENTAGRAPH ADVERTISING', 1, NULL, NULL, NULL),
(972, 'V�B BUILDERS', 'V�B BUILDERS', 1, NULL, NULL, NULL),
(973, 'V8 DESIGN STUDIO', 'V8 DESIGN STUDIO', 3, NULL, NULL, NULL),
(974, 'VALENZUELA MOTOR SHOP', 'VALENZUELA MOTOR SHOP', 1, NULL, NULL, NULL),
(975, 'VALLERY ENTERPRISES', 'VALLERY ENTERPRISES', 2, NULL, NULL, NULL),
(976, 'VANILLA ICE PEARL', 'VANILLA ICE PEARL', 1, NULL, NULL, NULL),
(977, 'VANS BONG STORE', 'VANS BONG STORE', 2, NULL, NULL, NULL),
(978, 'VASCO\'S HOTEL & RESTAURANT', 'VASCO\'S HOTEL & RESTAURANT', 3, NULL, NULL, NULL),
(979, 'VELUE TRANS', 'VELUE TRANS', 2, NULL, NULL, NULL),
(980, 'VERCON\'S SUPERMARKET & DEPARTMENT STORE', 'VERCON\'S SUPERMARKET & DEPARTMENT STORE', 2, NULL, NULL, NULL),
(981, 'VIADOMA ENTERPRISES', 'VIADOMA ENTERPRISES', 2, NULL, NULL, NULL),
(982, 'VICARISH PUBLICATION AND TRADING INC.', 'VICARISH PUBLICATION AND TRADING INC.', 1, NULL, NULL, NULL),
(983, 'VICTORIA TRADING', 'VICTORIA TRADING', 2, NULL, NULL, NULL),
(984, 'VICTORY LINER INC.', 'VICTORY LINER INC.', 1, NULL, NULL, NULL),
(985, 'VILLA CARMEN RESORT, HOTEL & RESTAURANT', 'VILLA CARMEN RESORT, HOTEL & RESTAURANT', 1, NULL, NULL, NULL),
(986, 'VIRGILIO GONZALES MUSICAL INSTRUMENT REPAIR SHOP & DEALER OF KINDS OF INSTRUMENT', 'VIRGILIO GONZALES MUSICAL INSTRUMENT REPAIR SHOP & DEALER OF KINDS OF INSTRUMENT', 2, NULL, NULL, NULL),
(987, 'VISTA RENT A CAR', 'VISTA RENT A CAR', 1, NULL, NULL, NULL),
(988, 'VIZON ENTERPRISES', 'VIZON ENTERPRISES', 3, NULL, NULL, NULL),
(989, 'VME ENVIRONMENT SERVICES', 'VME ENVIRONMENT SERVICES', 2, NULL, NULL, NULL),
(990, 'WAF BROS. TECHNOLOGIES PHILS. INC.', 'WAF BROS. TECHNOLOGIES PHILS. INC.', 2, NULL, NULL, NULL),
(991, 'WALLGREEN INDUSTRIAL VENTURES CORP.', 'WALLGREEN INDUSTRIAL VENTURES CORP.', 1, NULL, NULL, NULL),
(992, 'WALLGREEN INDUSTRIAL VENTURES CORP.', 'WALLGREEN INDUSTRIAL VENTURES CORP.', 1, NULL, NULL, NULL),
(993, 'WATERCRAFT VENTURE, CORPORATION', 'WATERCRAFT VENTURE, CORPORATION', 2, NULL, NULL, NULL),
(994, 'WBT GEN. MERCHANDISE', 'WBT GEN. MERCHANDISE', 1, NULL, NULL, NULL),
(995, 'WBT GEN. MERCHANDIZE', 'WBT GEN. MERCHANDIZE', 2, NULL, NULL, NULL),
(996, 'WE CARE DRUG-OLONGAPO BRANCH', 'WE CARE DRUG-OLONGAPO BRANCH', 2, NULL, NULL, NULL),
(997, 'WE CARE DRUG-OLONGAPO BRANCH II', 'WE CARE DRUG-OLONGAPO BRANCH II', 2, NULL, NULL, NULL),
(998, 'WELLCOM TELECOM SUPERMARKET INC.', 'WELLCOM TELECOM SUPERMARKET INC.', 2, NULL, NULL, NULL),
(999, 'WHITEROCK WATERPARK & BEACH RESORT', 'WHITEROCK WATERPARK & BEACH RESORT', 1, NULL, NULL, NULL),
(1000, 'WILD ORCHID BEACH RESORT', 'WILD ORCHID BEACH RESORT', 2, NULL, NULL, NULL),
(1001, 'WILJOY PHOTO SHOP', 'WILJOY PHOTO SHOP', 1, NULL, NULL, NULL),
(1002, 'WILLIS  RESTAURANT', 'WILLIS  RESTAURANT', 2, NULL, NULL, NULL),
(1003, 'WILMA\'S EATERY CORNER', 'WILMA\'S EATERY CORNER', 2, NULL, NULL, NULL),
(1004, 'WIMPY\'S BURGER & ICE CREAM PARLOR', 'WIMPY\'S BURGER & ICE CREAM PARLOR', 3, NULL, NULL, NULL),
(1005, 'WINDSHEAR INT\'L. PHIL., INC.', 'WINDSHEAR INT\'L. PHIL., INC.', 1, NULL, NULL, NULL),
(1006, 'WM ENTERPRISES', 'WM ENTERPRISES', 3, NULL, NULL, NULL),
(1007, 'WORTHY BROTHER PHARMA, INC.', 'WORTHY BROTHER PHARMA, INC.', 3, NULL, NULL, NULL),
(1008, 'XAVE-NET DRY GOODS', 'XAVE-NET DRY GOODS', 1, NULL, NULL, NULL),
(1009, 'XEROGRAFIX BUSINESS PRODUCTS & SERVICES, INC.', 'XEROGRAFIX BUSINESS PRODUCTS & SERVICES, INC.', 2, NULL, NULL, NULL),
(1010, 'XTREMELY XPRESSO CAF�', 'XTREMELY XPRESSO CAF�', 2, NULL, NULL, NULL),
(1011, 'XYLIDINE ENTERPRISES', 'XYLIDINE ENTERPRISES', 1, NULL, NULL, NULL),
(1012, 'YAMANARI AUTO SUPPLY', 'YAMANARI AUTO SUPPLY', 1, NULL, NULL, NULL),
(1013, 'YBC SUPERMARKET', 'YBC SUPERMARKET', 3, NULL, NULL, NULL),
(1014, 'YELLOW CAB PIZZA', 'YELLOW CAB PIZZA', 3, NULL, NULL, NULL),
(1015, 'YOKOHAMA PRECISION TEK MOTOR SERV. CORP.', 'YOKOHAMA PRECISION TEK MOTOR SERV. CORP.', 2, NULL, NULL, NULL),
(1016, 'YOLLY\'S VARIETY STORE', 'YOLLY\'S VARIETY STORE', 3, NULL, NULL, NULL),
(1017, 'YUAN JAPANESE FOODS', 'YUAN JAPANESE FOODS', 3, NULL, NULL, NULL),
(1018, 'ZAFIRE DISTRIBUTORS, INC.', 'ZAFIRE DISTRIBUTORS, INC.', 1, NULL, NULL, NULL),
(1019, 'ZAMBALES HARDWARE', 'ZAMBALES HARDWARE', 3, NULL, NULL, NULL),
(1020, 'ZAMBALES HERALD', 'ZAMBALES HERALD', 2, NULL, NULL, NULL),
(1021, 'ZAMBALES SOLID CONSTRUCTION SUPPLY', 'ZAMBALES SOLID CONSTRUCTION SUPPLY', 1, NULL, NULL, NULL),
(1022, 'ZAMBALES SOLID CONSTRUCTION SUPPLY', 'ZAMBALES SOLID CONSTRUCTION SUPPLY', 3, NULL, NULL, NULL),
(1023, 'ZAMODCA TRANSPORT SERVICE COOP., INC.', 'ZAMODCA TRANSPORT SERVICE COOP., INC.', 1, NULL, NULL, NULL),
(1024, 'ZAMODCA TRANSPORT SERVICE COOP., INC.', 'ZAMODCA TRANSPORT SERVICE COOP., INC.', 3, NULL, NULL, NULL),
(1025, 'ZENAIDA R. JAVIER COINS & COMMEMORATIVE ITEMS', 'ZENAIDA R. JAVIER COINS & COMMEMORATIVE ITEMS', 3, NULL, NULL, NULL),
(1026, 'ZENCO FOOTSTEP', 'ZENCO FOOTSTEP', 1, NULL, NULL, NULL),
(1027, 'ZEP RENT A CAR', 'ZEP RENT A CAR', 1, NULL, NULL, NULL),
(1028, 'ZILD ENTERPRISES', 'ZILD ENTERPRISES', 2, NULL, NULL, NULL),
(1029, 'ZSARIZ\'S ENTERPRISES', 'ZSARIZ\'S ENTERPRISES', 2, NULL, NULL, NULL),
(1030, 'ZUELLIG PHARMA CORP.', 'ZUELLIG PHARMA CORP.', 2, NULL, NULL, NULL),
(1031, 'L & L TROPIACAL BAY RESTAURANT', 'L & L TROPIACAL BAY RESTAURANT', 1, NULL, NULL, NULL),
(1032, 'NAD A.R.A GENERAL MERCHANDISE', 'NAD A.R.A GENERAL MERCHANDISE', 1, NULL, NULL, NULL),
(1033, 'LUCKY DALE SUBIC INTERNATIONAL INC.', 'LUCKY DALE SUBIC INTERNATIONAL INC.', 3, NULL, NULL, NULL),
(1034, 'SUZUKI AUTO PAMPANGA', 'SUZUKI AUTO PAMPANGA', 1, NULL, NULL, NULL),
(1035, 'INDUSTRIAL & TRANSPORT EQUIPMENT, INC. PAMPANGA', 'INDUSTRIAL & TRANSPORT EQUIPMENT, INC. PAMPANGA', 2, NULL, NULL, NULL),
(1036, 'WIMPY\'S FOOD PLAZA NO. 2', 'WIMPY\'S FOOD PLAZA NO. 2', 3, NULL, NULL, NULL),
(1037, 'CRONEWOOD, INC.', 'CRONEWOOD, INC.', 3, NULL, NULL, NULL),
(1038, 'JOLLIBEE', 'JOLLIBEE', 1, NULL, NULL, NULL),
(1039, 'BALIWAG LECHON MANOK INC.', 'BALIWAG LECHON MANOK INC.', 1, NULL, NULL, NULL),
(1040, 'RAINBOW LAND HOTEL', 'RAINBOW LAND HOTEL', 1, NULL, NULL, NULL),
(1041, 'SUBIC BERRINGER HOTELS AND RESORTS INC.', 'SUBIC BERRINGER HOTELS AND RESORTS INC.', 1, NULL, NULL, NULL),
(1042, 'SUBIC BAY WORKERS/VOLUNTEERS MULTI-PURPOSE COOPERATIVE', 'SUBIC BAY WORKERS/VOLUNTEERS MULTI-PURPOSE COOPERATIVE', 2, NULL, NULL, NULL),
(1043, 'BARTLE BEYL, INC.', 'BARTLE BEYL, INC.', 2, NULL, NULL, NULL),
(1044, 'GUANZON MERCHANDISING CORPORATION', 'GUANZON MERCHANDISING CORPORATION', 3, NULL, NULL, NULL),
(1045, 'Sample Company', 'Sample Company', NULL, NULL, '2019-04-01 19:22:24', '2019-04-01 19:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_type`
--

CREATE TABLE `supplier_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `supplier_type`
--

INSERT INTO `supplier_type` (`id`, `desc`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Service Business', NULL, NULL, NULL),
(2, 'Merchandising Business', NULL, NULL, NULL),
(3, 'Manufacturing  Business', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_id_auditable_type_index` (`auditable_id`,`auditable_type`(191));

--
-- Indexes for table `bms_olngp_dept_purchase_request`
--
ALTER TABLE `bms_olngp_dept_purchase_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bms_olngp_dept_purchase_request` (`id`,`department_id`,`requestor_user_id`,`pr_date`);

--
-- Indexes for table `bms_olngp_dept_purchase_request_items`
--
ALTER TABLE `bms_olngp_dept_purchase_request_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_info`
--
ALTER TABLE `inventory_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_info` (`control_no`,`purchase_order_no`,`invoice_no`,`recieved_from_id`,`received_by_id`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_items` (`item_qty`);

--
-- Indexes for table `inventory_rcved_by_info`
--
ALTER TABLE `inventory_rcved_by_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_rcved_by_info` (`f_name`,`l_name`,`m_name`,`e_name`,`position`,`date_received`);

--
-- Indexes for table `inventory_rcved_from_info`
--
ALTER TABLE `inventory_rcved_from_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_rcved_from_info` (`f_name`,`l_name`,`m_name`,`e_name`,`position`,`date_received`);

--
-- Indexes for table `inv_gsoprop_code_category`
--
ALTER TABLE `inv_gsoprop_code_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_gsoprop_code_category` (`id`,`desc`,`code_family`);

--
-- Indexes for table `inv_gsoprop_code_list`
--
ALTER TABLE `inv_gsoprop_code_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_gsoprop_code_list` (`gsocode_cat_id`,`desc`,`useful_life`,`code_no`);

--
-- Indexes for table `inv_invoice_info`
--
ALTER TABLE `inv_invoice_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_invoice_info` (`invoice_supplier_id`,`date_invoice`);

--
-- Indexes for table `inv_ppe_code_category`
--
ALTER TABLE `inv_ppe_code_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_ppe_code_category` (`id`,`desc`);

--
-- Indexes for table `inv_ppe_code_list`
--
ALTER TABLE `inv_ppe_code_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_ppe_code_list` (`ppe_cat_id`,`desc`,`code_no`);

--
-- Indexes for table `inv_ppe_code_subcategory`
--
ALTER TABLE `inv_ppe_code_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_ppe_code_subcategory` (`ppe_cat_id`,`desc`,`code_coa`,`code_family`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_absctrct`
--
ALTER TABLE `olongapo_absctrct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_absctrct` (`prno_id`,`control_no`,`abstrct_date`);

--
-- Indexes for table `olongapo_absctrct_pubbid`
--
ALTER TABLE `olongapo_absctrct_pubbid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_absctrct_pubbid` (`supplier_id`,`abstrct_id`);

--
-- Indexes for table `olongapo_absctrct_pubbid_apprved`
--
ALTER TABLE `olongapo_absctrct_pubbid_apprved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_absctrct_pubbid_apprved` (`date`,`pr_no`);

--
-- Indexes for table `olongapo_absctrct_pubbid_item_suppbid`
--
ALTER TABLE `olongapo_absctrct_pubbid_item_suppbid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_absctrct_pubbid_item_suppbid` (`absctrct_id`,`pr_item_id`,`pubbid_id`,`unit_price`,`total_price`);

--
-- Indexes for table `olongapo_absctrct_signee`
--
ALTER TABLE `olongapo_absctrct_signee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_approved_supplier`
--
ALTER TABLE `olongapo_approved_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_approved_supplier` (`pr_no`,`supp_id`);

--
-- Indexes for table `olongapo_bac_awards_committee`
--
ALTER TABLE `olongapo_bac_awards_committee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_bac_awards_committee` (`employee_id`);

--
-- Indexes for table `olongapo_bac_awards_committee_approved_by`
--
ALTER TABLE `olongapo_bac_awards_committee_approved_by`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_bac_awards_committee_approved_by` (`employee_id`);

--
-- Indexes for table `olongapo_bac_awards_committee_attested_by`
--
ALTER TABLE `olongapo_bac_awards_committee_attested_by`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_bac_awards_committee_attested_by` (`employee_id`);

--
-- Indexes for table `olongapo_bac_category`
--
ALTER TABLE `olongapo_bac_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_bac_control_info`
--
ALTER TABLE `olongapo_bac_control_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_bac_control_info` (`bac_control_no`(191),`prno_id`,`bac_date`,`amount`,`sourcefund_id`,`category_id`,`bac_type_id`);

--
-- Indexes for table `olongapo_bac_source_fund`
--
ALTER TABLE `olongapo_bac_source_fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_bac_template`
--
ALTER TABLE `olongapo_bac_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_bac_template2`
--
ALTER TABLE `olongapo_bac_template2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_bac_type`
--
ALTER TABLE `olongapo_bac_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_department`
--
ALTER TABLE `olongapo_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_department` (`dept_code`,`dept_desc`,`year`);

--
-- Indexes for table `olongapo_employee`
--
ALTER TABLE `olongapo_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_employee` (`f_name`,`l_name`,`m_name`,`e_name`,`mobile_number`,`position_id`);

--
-- Indexes for table `olongapo_employee_list`
--
ALTER TABLE `olongapo_employee_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_employee_list` (`dept_id`,`fname`,`lname`,`mname`,`sex`);

--
-- Indexes for table `olongapo_gso_template`
--
ALTER TABLE `olongapo_gso_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_holiday`
--
ALTER TABLE `olongapo_holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_obr`
--
ALTER TABLE `olongapo_obr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_obr` (`obr_no`(191),`obr_date`);

--
-- Indexes for table `olongapo_position`
--
ALTER TABLE `olongapo_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_ppe_mnthly_report`
--
ALTER TABLE `olongapo_ppe_mnthly_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_ppe_mnthly_report_items`
--
ALTER TABLE `olongapo_ppe_mnthly_report_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_procurement_method`
--
ALTER TABLE `olongapo_procurement_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_items`
--
ALTER TABLE `olongapo_purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_item_category`
--
ALTER TABLE `olongapo_purchase_item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_item_category_group`
--
ALTER TABLE `olongapo_purchase_item_category_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_item_ppmp`
--
ALTER TABLE `olongapo_purchase_item_ppmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_purchase_item_ppmp` (`id`,`item_id`,`category_id`,`group_id`,`subdept_id`);

--
-- Indexes for table `olongapo_purchase_item_ppmp_upload`
--
ALTER TABLE `olongapo_purchase_item_ppmp_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_purchase_item_ppmp_upload` (`subdept_id`);

--
-- Indexes for table `olongapo_purchase_order_acceptance_issuance`
--
ALTER TABLE `olongapo_purchase_order_acceptance_issuance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_order_items`
--
ALTER TABLE `olongapo_purchase_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_purchase_order_items` (`prno_id`,`pono_id`,`pr_item_id`);

--
-- Indexes for table `olongapo_purchase_order_no`
--
ALTER TABLE `olongapo_purchase_order_no`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_purchase_order_no` (`po_date`,`prno_id`,`dept_id`);

--
-- Indexes for table `olongapo_purchase_order_requisition_number`
--
ALTER TABLE `olongapo_purchase_order_requisition_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_request_items`
--
ALTER TABLE `olongapo_purchase_request_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_request_items_category`
--
ALTER TABLE `olongapo_purchase_request_items_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_purchase_request_items_category_group` (`group_id`);

--
-- Indexes for table `olongapo_purchase_request_no`
--
ALTER TABLE `olongapo_purchase_request_no`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_purchase_request_no` (`pr_date`,`pr_no`(191),`dept_id`,`obr_id`(191));

--
-- Indexes for table `olongapo_purchase_request_post_inspection`
--
ALTER TABLE `olongapo_purchase_request_post_inspection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_request_post_inspection_items`
--
ALTER TABLE `olongapo_purchase_request_post_inspection_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_request_ppmp_approval`
--
ALTER TABLE `olongapo_purchase_request_ppmp_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_purchase_request_signee`
--
ALTER TABLE `olongapo_purchase_request_signee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olongapo_subdepartment`
--
ALTER TABLE `olongapo_subdepartment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_subdepartment` (`subdept_code`,`dept_desc`,`year`,`dept_id`);

--
-- Indexes for table `olongapo_tmpl_main_navigation`
--
ALTER TABLE `olongapo_tmpl_main_navigation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_tmpl_main_navigation` (`id`,`title`,`route`,`parent`,`arangement`);

--
-- Indexes for table `olongapo_tmpl_sub_navigation`
--
ALTER TABLE `olongapo_tmpl_sub_navigation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_tmpl_sub_navigation` (`id`,`parent_id`,`title`,`route`,`arangement`);

--
-- Indexes for table `olongapo_user_credentials`
--
ALTER TABLE `olongapo_user_credentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `olongapo_user_credentials_ucrd_username_unique` (`ucrd_username`),
  ADD UNIQUE KEY `olongapo_user_credentials_employee_id_unique` (`employee_id`),
  ADD UNIQUE KEY `olongapo_user_credentials_ucrd_email_unique` (`ucrd_email`),
  ADD KEY `olongapo_user_credentials` (`id`,`group_id`,`ucrd_realname`,`ucrd_username`,`ucrd_email`);

--
-- Indexes for table `olongapo_user_groups`
--
ALTER TABLE `olongapo_user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `olongapo_user_groups_ugrp_name_unique` (`ugrp_name`),
  ADD KEY `olongapo_user_groups_key` (`id`,`ugrp_homepage`(191));

--
-- Indexes for table `olongapo_user_logging`
--
ALTER TABLE `olongapo_user_logging`
  ADD PRIMARY KEY (`id`),
  ADD KEY `olongapo_user_logging` (`id`,`credential_id`,`login_time`,`logout_time`,`login_ip`(191),`login_mac_addr`(191));

--
-- Indexes for table `supplier_address`
--
ALTER TABLE `supplier_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_address` (`supplier_id`,`province`,`city_mun`,`brgy`);

--
-- Indexes for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_contact` (`supplier_id`,`type`);

--
-- Indexes for table `supplier_info`
--
ALTER TABLE `supplier_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_info` (`title`,`type`);

--
-- Indexes for table `supplier_type`
--
ALTER TABLE `supplier_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_type` (`desc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bms_olngp_dept_purchase_request`
--
ALTER TABLE `bms_olngp_dept_purchase_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bms_olngp_dept_purchase_request_items`
--
ALTER TABLE `bms_olngp_dept_purchase_request_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_info`
--
ALTER TABLE `inventory_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory_rcved_by_info`
--
ALTER TABLE `inventory_rcved_by_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_rcved_from_info`
--
ALTER TABLE `inventory_rcved_from_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_gsoprop_code_category`
--
ALTER TABLE `inv_gsoprop_code_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inv_gsoprop_code_list`
--
ALTER TABLE `inv_gsoprop_code_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `inv_invoice_info`
--
ALTER TABLE `inv_invoice_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_ppe_code_category`
--
ALTER TABLE `inv_ppe_code_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inv_ppe_code_list`
--
ALTER TABLE `inv_ppe_code_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `inv_ppe_code_subcategory`
--
ALTER TABLE `inv_ppe_code_subcategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `olongapo_absctrct`
--
ALTER TABLE `olongapo_absctrct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_absctrct_pubbid`
--
ALTER TABLE `olongapo_absctrct_pubbid`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_absctrct_pubbid_apprved`
--
ALTER TABLE `olongapo_absctrct_pubbid_apprved`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_absctrct_pubbid_item_suppbid`
--
ALTER TABLE `olongapo_absctrct_pubbid_item_suppbid`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_absctrct_signee`
--
ALTER TABLE `olongapo_absctrct_signee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `olongapo_approved_supplier`
--
ALTER TABLE `olongapo_approved_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_bac_awards_committee`
--
ALTER TABLE `olongapo_bac_awards_committee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `olongapo_bac_awards_committee_approved_by`
--
ALTER TABLE `olongapo_bac_awards_committee_approved_by`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `olongapo_bac_awards_committee_attested_by`
--
ALTER TABLE `olongapo_bac_awards_committee_attested_by`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `olongapo_bac_category`
--
ALTER TABLE `olongapo_bac_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `olongapo_bac_control_info`
--
ALTER TABLE `olongapo_bac_control_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_bac_source_fund`
--
ALTER TABLE `olongapo_bac_source_fund`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `olongapo_bac_template`
--
ALTER TABLE `olongapo_bac_template`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `olongapo_bac_template2`
--
ALTER TABLE `olongapo_bac_template2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `olongapo_bac_type`
--
ALTER TABLE `olongapo_bac_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `olongapo_department`
--
ALTER TABLE `olongapo_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `olongapo_employee`
--
ALTER TABLE `olongapo_employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_employee_list`
--
ALTER TABLE `olongapo_employee_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `olongapo_gso_template`
--
ALTER TABLE `olongapo_gso_template`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `olongapo_holiday`
--
ALTER TABLE `olongapo_holiday`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_obr`
--
ALTER TABLE `olongapo_obr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_position`
--
ALTER TABLE `olongapo_position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `olongapo_ppe_mnthly_report`
--
ALTER TABLE `olongapo_ppe_mnthly_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `olongapo_ppe_mnthly_report_items`
--
ALTER TABLE `olongapo_ppe_mnthly_report_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `olongapo_procurement_method`
--
ALTER TABLE `olongapo_procurement_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `olongapo_purchase_items`
--
ALTER TABLE `olongapo_purchase_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_item_category`
--
ALTER TABLE `olongapo_purchase_item_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_item_category_group`
--
ALTER TABLE `olongapo_purchase_item_category_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_item_ppmp`
--
ALTER TABLE `olongapo_purchase_item_ppmp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_item_ppmp_upload`
--
ALTER TABLE `olongapo_purchase_item_ppmp_upload`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_order_acceptance_issuance`
--
ALTER TABLE `olongapo_purchase_order_acceptance_issuance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_order_items`
--
ALTER TABLE `olongapo_purchase_order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_order_no`
--
ALTER TABLE `olongapo_purchase_order_no`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_order_requisition_number`
--
ALTER TABLE `olongapo_purchase_order_requisition_number`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_request_items`
--
ALTER TABLE `olongapo_purchase_request_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_request_items_category`
--
ALTER TABLE `olongapo_purchase_request_items_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_request_no`
--
ALTER TABLE `olongapo_purchase_request_no`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_request_post_inspection`
--
ALTER TABLE `olongapo_purchase_request_post_inspection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_request_post_inspection_items`
--
ALTER TABLE `olongapo_purchase_request_post_inspection_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_request_ppmp_approval`
--
ALTER TABLE `olongapo_purchase_request_ppmp_approval`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olongapo_purchase_request_signee`
--
ALTER TABLE `olongapo_purchase_request_signee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `olongapo_subdepartment`
--
ALTER TABLE `olongapo_subdepartment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `olongapo_tmpl_main_navigation`
--
ALTER TABLE `olongapo_tmpl_main_navigation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `olongapo_tmpl_sub_navigation`
--
ALTER TABLE `olongapo_tmpl_sub_navigation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `olongapo_user_credentials`
--
ALTER TABLE `olongapo_user_credentials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `olongapo_user_groups`
--
ALTER TABLE `olongapo_user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `olongapo_user_logging`
--
ALTER TABLE `olongapo_user_logging`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_address`
--
ALTER TABLE `supplier_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_info`
--
ALTER TABLE `supplier_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1046;

--
-- AUTO_INCREMENT for table `supplier_type`
--
ALTER TABLE `supplier_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
