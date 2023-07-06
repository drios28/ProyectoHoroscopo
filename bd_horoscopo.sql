-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 08:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_horoscopo`
--

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `signo_tradicional` varchar(100) NOT NULL,
  `prediccion_tradicional` text NOT NULL,
  `signo_chino` varchar(100) NOT NULL,
  `prediccion_chino` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `fecha_nacimiento`, `signo_tradicional`, `prediccion_tradicional`, `signo_chino`, `prediccion_chino`) VALUES
(3, 'Daryl', '2023-07-06', 'Cáncer', 'El enfoque estará en tu hogar y familia. Dedica tiempo a cultivar relaciones cercanas y crear un ambiente armonioso en casa. Escucha tus instintos y cuida tu bienestar emocional.', 'Conejo', 'El Conejo es conocido por su amabilidad y habilidades diplomáticas. En este año, es importante mantener la armonía en tus relaciones personales y profesionales. Sé comprensivo y busca soluciones pacíficas.');

-- --------------------------------------------------------

--
-- Table structure for table `zodiaco_chino`
--

CREATE TABLE `zodiaco_chino` (
  `id` int(10) NOT NULL,
  `signo` varchar(100) NOT NULL,
  `prediccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zodiaco_chino`
--

INSERT INTO `zodiaco_chino` (`id`, `signo`, `prediccion`) VALUES
(1, 'Rata', 'La Rata es un signo inteligente y astuto. En este período, se te presentarán oportunidades para demostrar tu ingenio y habilidades. Mantén tu enfoque y trabaja duro para lograr tus metas.'),
(2, 'Buey', 'El Buey representa la tenacidad y la determinación. En este año, es importante que te mantengas firme en tus objetivos y no te desalientes por los desafíos que puedan surgir. Con perseverancia, alcanzarás el éxito.'),
(3, 'Tigre', 'El Tigre es un signo audaz y valiente. En este período, se presentarán oportunidades para que muestres tu coraje y tomes riesgos calculados. Confía en ti mismo y aprovecha las situaciones favorables.'),
(4, 'Conejo', 'El Conejo es conocido por su amabilidad y habilidades diplomáticas. En este año, es importante mantener la armonía en tus relaciones personales y profesionales. Sé comprensivo y busca soluciones pacíficas.'),
(5, 'Dragón', 'El Dragón representa el poder y la pasión. En este período, se te presentarán oportunidades para destacar y brillar en tus proyectos. Confía en tus habilidades y dirige tu energía hacia metas ambiciosas.'),
(6, 'Serpiente', 'La Serpiente es astuta y perspicaz. En este año, es importante que confíes en tu intuición y observes las oportunidades que se presenten. Mantén una actitud cautelosa y toma decisiones informadas.'),
(7, 'Caballo', 'El Caballo es enérgico y libre. En este período, se te presentarán oportunidades para aventurarte en nuevas direcciones. Aprovecha tu entusiasmo y adopta un enfoque audaz para lograr tus metas.'),
(8, 'Cabra', 'La Cabra es creativa y compasiva. En este año, es importante que te conectes con tu lado artístico y expreses tu sensibilidad. Cultiva relaciones cercanas y muestra empatía hacia los demás.'),
(9, 'Mono', 'El Mono es ingenioso y versátil. En este período, se te presentarán oportunidades para demostrar tu agudeza mental y adaptabilidad. Sé flexible en tus enfoques y aprovecha tu creatividad para superar los desafíos.'),
(10, 'Gallo', 'El Gallo es valiente y enérgico. En este año, es importante que confíes en tus habilidades y tomes la iniciativa. Establece metas claras y trabaja con determinación para alcanzar el éxito.'),
(11, 'Perro', 'El Perro es leal y protector. En este período, es importante que cuides de tus seres queridos y te mantengas fiel a tus principios. Aprovecha tu intuición para tomar decisiones sólidas'),
(12, 'Cerdo', 'El Cerdo es amable y generoso. En este año, es importante que te enfoques en las relaciones cercanas y en el bienestar de los demás. Cultiva la gratitud y disfruta de los momentos de tranquilidad y felicidad.'),
(13, '', ''),
(14, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `zodiaco_tradicional`
--

CREATE TABLE `zodiaco_tradicional` (
  `id` int(10) NOT NULL,
  `signo` varchar(100) NOT NULL,
  `prediccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zodiaco_tradicional`
--

INSERT INTO `zodiaco_tradicional` (`id`, `signo`, `prediccion`) VALUES
(1, 'Capricornio', 'La disciplina y la perseverancia serán esenciales para alcanzar tus objetivos. Establece metas claras y trabaja de manera constante hacia ellas. Presta atención a tu vida personal y busca el equilibrio.'),
(2, 'Acuario', 'La creatividad y la originalidad serán tus fortalezas en este período. Busca formas innovadoras de expresarte y conecta con personas afines. Presta atención a tu bienestar mental y emocional.'),
(3, 'Piscis', 'Tu intuición estará en alza. Escuchar tus instintos y seguir tu corazón te llevará por el camino correcto. Presta atención a tu mundo interior y busca momentos de tranquilidad y conexión espiritual.'),
(4, 'Aries', 'Se avecinan cambios positivos en tu vida. Aprovecha tu energía y determinación para perseguir tus metas. Enfócate en el equilibrio entre el trabajo y la vida personal.'),
(5, 'Tauro ', 'Este es un buen momento para establecer bases sólidas en tu vida. Presta atención a tu salud y bienestar. Las relaciones personales y el amor serán destacados durante este período.'),
(6, 'Géminis', 'La comunicación será clave para ti en los próximos tiempos. Es un buen momento para establecer conexiones significativas y expresar tus ideas. Mantén una mente abierta y sé flexible.'),
(7, 'Cáncer', 'El enfoque estará en tu hogar y familia. Dedica tiempo a cultivar relaciones cercanas y crear un ambiente armonioso en casa. Escucha tus instintos y cuida tu bienestar emocional.'),
(8, 'Leo', 'Tu creatividad y confianza estarán en alza. Aprovecha estas cualidades para destacar en tu carrera o proyectos personales. Presta atención a tu vida amorosa y social.'),
(9, 'Virgo', 'La organización y el enfoque serán cruciales en este período. Dedica tiempo a la planificación y establecimiento de metas realistas. Cuida tu salud física y mental.'),
(10, 'Libra', 'Las relaciones y la armonía serán importantes para ti. Busca el equilibrio en tus relaciones personales y profesionales. También es un buen momento para mejorar tu apariencia y estilo.'),
(11, 'Escorpio', 'Se presentarán oportunidades para la transformación y el crecimiento personal. Aprovecha tu intuición y profundiza en tus pasiones. Mantén una mentalidad positiva y enfócate en tus metas a largo plazo.'),
(12, 'Sagitario', 'Este es un buen momento para explorar nuevas experiencias y expandir tus horizontes. Viajes, estudios y aventuras estarán favorecidos. Mantén una actitud optimista y confía en tu intuición.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zodiaco_chino`
--
ALTER TABLE `zodiaco_chino`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zodiaco_tradicional`
--
ALTER TABLE `zodiaco_tradicional`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zodiaco_chino`
--
ALTER TABLE `zodiaco_chino`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `zodiaco_tradicional`
--
ALTER TABLE `zodiaco_tradicional`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
