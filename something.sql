-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2024 a las 10:54:14
-- Versión del servidor: 8.0.39
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `something`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int NOT NULL,
  `id_post` int DEFAULT NULL,
  `id_users` int DEFAULT NULL,
  `users` varchar(100) DEFAULT NULL,
  `comentary` text,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `users` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `users`, `password`, `email`, `img_url`) VALUES
(3, 'High', '$2y$10$X03rk7q179aQkSmgRT8XV.Z2KeM5PVkfiawhAd1uVUZcrEX5bC0JO', 'correo@correo.com', '1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `id_users` int DEFAULT NULL,
  `users` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `img_url` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `post` text,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `id_users`, `users`, `title`, `img_url`, `category`, `post`, `date_time`) VALUES
(1, NULL, 'PeterPan', 'Post Proof', 'malaga.jpg', 'Post', 'Podemos encontrar grandes divergencias entre la forma de hablar de los jóvenes en la actualidad y la de sus abuelos. Pero, las diferencias no se encuentran solo en el tipo de léxico que utilizan sino también en la pronunciación. El español de Málaga está muy vivo, avanza y evoluciona con mayor rapidez que en otros puntos del país. Existen algunas características propias del lenguaje malagueño como es el ceceo (pronunciación de la \"s\" con sonido de \"z\") que está desapareciendo, probablemente por la presión social y la eliminación de la \"s\" final. El habla malagueña, igual que la andaluza, tiende a la simplificación. Cada día se busca más la economía del lenguaje y del esfuerzo, sin afectar a la comprensión. De ahí, la supresión de la \"s\" final de las palabras, uno de los procesos lingüísticos más característicos y extendidos en Málaga. En este aspecto, por tanto, los hablantes de Málaga buscan acercarse a la pronunciación del español estándar, que consideran como el modelo ideal. El proceso se detecta a partir de los años 50 del siglo pasado y se ha extendido de manera muy rápida. Es en ese momento cuando sesear y, en especial, cecear comenzaron a perder reconocimiento social y a ser considerado como un signo de clase baja. Y la presión social ha ganado la batalla. En cuanto al vocabulario, hay que tener siempre en cuenta que el origen social, educativo y, por supuesto, la barrera generacional son datos muy influyentes en lo que a la frecuencia de uso de algunas expresiones se refiere. No obstante, ahora no nos centraremos en diferenciar estos aspectos sino que ofreceremos un breve glosario de palabras que podemos escuchar con mucha frecuencia en nuestras calles.', '2024-10-15 20:48:20'),
(2, NULL, 'Ale', 'Get Proof', NULL, 'Get', 'Don Quijote de la Manchaa​ es una novela escrita por el español Miguel de Cervantes Saavedra. Publicada su primera parte con el título de El ingenioso hidalgo don Quijote de la Mancha a comienzos de 1605, es la obra más destacada de la literatura española y una de las principales de la literatura universal.1', '2024-10-16 11:55:34'),
(3, 3, 'High', 'Curso01', 'html5.png', 'Html', 'HTML, acrónimo en inglés de HyperText Markup Language (\'lenguaje de marcado de hipertexto\'), hace referencia al lenguaje de marcado utilizado en la creación de páginas web. Este estándar que sirve de referencia del software que interactúa con la elaboración de páginas web en sus diferentes versiones. Define una estructura básica y un código (denominado código HTML) para la presentación de contenido de una página web, que incluye texto, imágenes, videos, juegos, entre otros elementos. Este estándar es gestionado por el World Wide Web Consortium (W3C) o Consorcio WWW, una organización dedicada a la estandarización de la mayoría de las tecnologías asociadas a la web, especialmente en lo relacionado con su escritura e interpretación. HTML se considera el lenguaje web más importante y su invención crucial para el surgimiento, desarrollo y expansión de la World Wide Web (WWW). Es el estándar que prevalece en la visualización de páginas web y es adoptado por todos los navegadores actuales.1​\r\n\r\nEl lenguaje HTML se fundamenta en la diferenciación como filosofía de desarrollo. Para añadir elementos externos a una página como imágenes, vídeos o scripts, no se incrustan directamente en el código de la página. En su lugar, se realiza una referencia a la ubicación de cada elemento mediante texto. De este modo, la página web contiene solamente texto, dejando al navegador web (intérprete del código) la labor de unir todos los elementos y visualizar la página final. Al ser un estándar, HTML pretende ser un lenguaje que permita que cualquier página web escrita en una determinada versión, pueda ser interpretada de manera uniforme (siguiendo el estándar) por cualquier navegador web actualizado. ', '2024-10-16 18:13:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
