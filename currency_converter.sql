-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 10:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `currency_converter`
--

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rates`
--

CREATE TABLE `exchange_rates` (
  `currency` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `mid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`currency`, `code`, `mid`) VALUES
('bat (Tajlandia)', 'THB', 0.117),
('dolar amerykański', 'USD', 4.068),
('dolar australijski', 'AUD', 2.7928),
('dolar Hongkongu', 'HKD', 0.5204),
('dolar kanadyjski', 'CAD', 3.0827),
('dolar nowozelandzki', 'NZD', 2.5329),
('dolar singapurski', 'SGD', 3.0352),
('euro', 'EUR', 4.4457),
('forint (Węgry)', 'HUF', 0.011891),
('frank szwajcarski', 'CHF', 4.5464),
('funt szterling', 'GBP', 5.214),
('hrywna (Ukraina)', 'UAH', 0.1102),
('jen (Japonia)', 'JPY', 0.028671),
('korona czeska', 'CZK', 0.1872),
('korona duńska', 'DKK', 0.5967),
('korona islandzka', 'ISK', 0.029777),
('korona norweska', 'NOK', 0.3832),
('korona szwedzka', 'SEK', 0.3806),
('lej rumuński', 'RON', 0.8964),
('lew (Bułgaria)', 'BGN', 2.273),
('lira turecka', 'TRY', 0.1718),
('nowy izraelski szekel', 'ILS', 1.1289),
('peso chilijskie', 'CLP', 0.00512),
('peso filipińskie', 'PHP', 0.073),
('peso meksykańskie', 'MXN', 0.2381),
('rand (Republika Południowej Afryki)', 'ZAR', 0.2238),
('real (Brazylia)', 'BRL', 0.8439),
('ringgit (Malezja)', 'MYR', 0.8794),
('rupia indonezyjska', 'IDR', 0.0002713),
('rupia indyjska', 'INR', 0.049654),
('won południowokoreański', 'KRW', 0.003175),
('yuan renminbi (Chiny)', 'CNY', 0.5684),
('SDR (MFW)', 'XDR', 5.4359),
('afgani (Afganistan)', 'AFN', 0.04814),
('ariary (Madagaskar)', 'MGA', 0.000918),
('balboa (Panama)', 'PAB', 4.1393),
('birr etiopski', 'ETB', 0.0754),
('boliwar soberano (Wenezuela)', 'VES', 0.1536),
('boliwiano (Boliwia)', 'BOB', 0.5984),
('colon kostarykański', 'CRC', 0.00765),
('colon salwadorski', 'SVC', 0.4734),
('cordoba oro (Nikaragua)', 'NIO', 0.1133),
('dalasi (Gambia)', 'GMD', 0.0662),
('denar (Macedonia Północna)', 'MKD', 0.072578),
('dinar algierski', 'DZD', 0.030437),
('dinar bahrajski', 'BHD', 10.9919),
('dinar iracki', 'IQD', 0.003163),
('dinar jordański', 'JOD', 5.8417),
('dinar kuwejcki', 'KWD', 13.4846),
('dinar libijski', 'LYD', 0.8606),
('dinar serbski', 'RSD', 0.0381),
('dinar tunezyjski', 'TND', 1.337),
('dirham marokański', 'MAD', 0.4108),
('dirham ZEA (Zjednoczone Emiraty Arabskie)', 'AED', 1.1283),
('dobra (Wyspy Świętego Tomasza i Książęca)', 'STN', 0.1807),
('dolar bahamski', 'BSD', 4.1393),
('dolar barbadoski', 'BBD', 2.0524),
('dolar belizeński', 'BZD', 2.0559),
('dolar brunejski', 'BND', 3.0886),
('dolar Fidżi', 'FJD', 1.8717),
('dolar gujański', 'GYD', 0.019594),
('dolar jamajski', 'JMD', 0.0268),
('dolar liberyjski', 'LRD', 0.0233),
('dolar namibijski', 'NAD', 0.2236),
('dolar surinamski', 'SRD', 0.1109),
('dolar Trynidadu i Tobago', 'TTD', 0.6112),
('dolar wschodniokaraibski', 'XCD', 1.5287),
('dolar Wysp Salomona', 'SBD', 0.4876),
('dolar Zimbabwe', 'ZWL', 0.000628),
('dong (Wietnam)', 'VND', 0.00017629),
('dram (Armenia)', 'AMD', 0.010702),
('escudo Zielonego Przylądka', 'CVE', 0.0404),
('florin arubański', 'AWG', 2.2896),
('frank burundyjski', 'BIF', 0.001467),
('frank CFA BCEAO ', 'XOF', 0.006824),
('frank CFA BEAC', 'XAF', 0.006707),
('frank CFP  ', 'XPF', 0.037458),
('frank Dżibuti', 'DJF', 0.023275),
('frank gwinejski', 'GNF', 0.000482),
('frank Komorów', 'KMF', 0.009084),
('frank kongijski (Dem. Republika Konga)', 'CDF', 0.001769),
('frank rwandyjski', 'RWF', 0.00364),
('funt egipski', 'EGP', 0.1341),
('funt gibraltarski', 'GIP', 5.2298),
('funt libański', 'LBP', 0.000276),
('funt południowosudański', 'SSP', 0.004328),
('funt sudański', 'SDG', 0.0069),
('funt syryjski', 'SYP', 0.0016),
('Ghana cedi ', 'GHS', 0.3651),
('gourde (Haiti)', 'HTG', 0.0297),
('guarani (Paragwaj)', 'PYG', 0.000572),
('gulden Antyli Holenderskich', 'ANG', 2.2994),
('kina (Papua-Nowa Gwinea)', 'PGK', 1.1529),
('kip (Laos)', 'LAK', 0.000227),
('kwacha malawijska', 'MWK', 0.004037),
('kwacha zambijska', 'ZMW', 0.2184),
('kwanza (Angola)', 'AOA', 0.006),
('kyat (Myanmar, Birma)', 'MMK', 0.001973),
('lari (Gruzja)', 'GEL', 1.5847),
('lej Mołdawii', 'MDL', 0.2325),
('lek (Albania)', 'ALL', 0.041721),
('lempira (Honduras)', 'HNL', 0.1691),
('leone (Sierra Leone)', 'SLE', 0.1826),
('lilangeni (Eswatini)', 'SZL', 0.2235),
('loti (Lesotho)', 'LSL', 0.2235),
('manat azerbejdżański', 'AZN', 2.4377),
('metical (Mozambik)', 'MZN', 0.0645),
('naira (Nigeria)', 'NGN', 0.008953),
('nakfa (Erytrea)', 'ERN', 0.2749),
('nowy dolar tajwański', 'TWD', 0.1348),
('nowy manat (Turkmenistan)', 'TMT', 1.1845),
('ouguiya (Mauretania)', 'MRU', 0.1203);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `amount` float NOT NULL,
  `from_code` varchar(255) NOT NULL,
  `to_code` varchar(255) NOT NULL,
  `result` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`amount`, `from_code`, `to_code`, `result`) VALUES
(10, 'CAD', 'HUF', 2592.46),
(167, 'NOK', 'UAH', 580.711);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
