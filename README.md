# **Tienda virtual**

es un ejemplo de tienda virtual y los paso para que puedas empezar a utilizarla son los siguientes:



1. instálala preferentemente xampp o cualquier servidor local.

2. pega todos los archivos en C:\xampp\htdocs\

3. creamos una base de datos tienda virtual y ejecutamos el siguiente código.

   ```
   SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
   START TRANSACTION;
   SET time_zone = "+00:00";
   
   
   /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
   /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
   /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
   /*!40101 SET NAMES utf8mb4 */;
   
   --
   -- Base de datos: `tiendavirtual`
   --
   
   -- --------------------------------------------------------
   
   --
   -- Estructura de tabla para la tabla `categorias`
   --
   
   CREATE TABLE `categorias` (
     `idcategoria` int(11) NOT NULL,
     `descripcion` varchar(50) NOT NULL
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   
   -- --------------------------------------------------------
   
   --
   -- Estructura de tabla para la tabla `chat`
   --
   
   CREATE TABLE `chat` (
     `idchat` int(12) NOT NULL,
     `fecha` datetime DEFAULT NULL,
     `idcliente` int(12) DEFAULT NULL,
     `tipo` int(1) DEFAULT NULL COMMENT '1 enviado por el cliente 2 \nrespuesta',
     `mensaje` varchar(200) DEFAULT NULL
   ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
   
   -- --------------------------------------------------------
   
   --
   -- Estructura de tabla para la tabla `clientes`
   --
   
   CREATE TABLE `clientes` (
     `idclientes` int(11) NOT NULL,
     `email` varchar(100) DEFAULT NULL,
     `password` varchar(100) DEFAULT NULL,
     `nombre` varchar(100) DEFAULT NULL,
     `fechaalta` datetime DEFAULT NULL
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   
   -- --------------------------------------------------------
   
   --
   -- Estructura de tabla para la tabla `contacto`
   --
   
   CREATE TABLE `contacto` (
     `idcont` int(11) NOT NULL,
     `fecha` datetime DEFAULT NULL,
     `nombre` varchar(100) DEFAULT NULL,
     `email` varchar(100) DEFAULT NULL,
     `telefono` varchar(100) DEFAULT NULL,
     `mensaje` varchar(200) DEFAULT NULL
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   
   -- --------------------------------------------------------
   
   --
   -- Estructura de tabla para la tabla `detallepedido`
   --
   
   CREATE TABLE `detallepedido` (
     `idpedido` varchar(300) DEFAULT NULL,
     `idproducto` varchar(200) DEFAULT NULL,
     `cantidad` varchar(100) DEFAULT NULL,
     `precio` double DEFAULT NULL
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   
   -- --------------------------------------------------------
   
   --
   -- Estructura de tabla para la tabla `pedido`
   --
   
   CREATE TABLE `pedido` (
     `idpedido` varchar(300) NOT NULL,
     `fecha` datetime DEFAULT NULL,
     `idcliente` int(11) DEFAULT NULL,
     `recibe` varchar(200) DEFAULT NULL,
     `calle` varchar(100) DEFAULT NULL,
     `colonia` varchar(100) DEFAULT NULL,
     `estado` varchar(50) DEFAULT NULL,
     `municipio` varchar(50) DEFAULT NULL,
     `cp` varchar(10) DEFAULT NULL,
     `telefono` varchar(200) DEFAULT NULL
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   
   -- --------------------------------------------------------
   
   --
   -- Estructura de tabla para la tabla `productos`
   --
   
   CREATE TABLE `productos` (
     `idproducto` int(11) NOT NULL,
     `descripcion` varchar(100) NOT NULL,
     `precio` float(15,2) NOT NULL,
     `urlimagen` varchar(100) NOT NULL,
     `idcategoria` int(11) NOT NULL
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   
   --
   -- Índices para tablas volcadas
   --
   
   --
   -- Indices de la tabla `chat`
   --
   ALTER TABLE `chat`
     ADD PRIMARY KEY (`idchat`);
   
   --
   -- Indices de la tabla `clientes`
   --
   ALTER TABLE `clientes`
     ADD PRIMARY KEY (`idclientes`);
   
   --
   -- Indices de la tabla `contacto`
   --
   ALTER TABLE `contacto`
     ADD PRIMARY KEY (`idcont`);
   
   --
   -- Indices de la tabla `pedido`
   --
   ALTER TABLE `pedido`
     ADD PRIMARY KEY (`idpedido`);
   
   --
   -- AUTO_INCREMENT de las tablas volcadas
   --
   
   --
   -- AUTO_INCREMENT de la tabla `chat`
   --
   ALTER TABLE `chat`
     MODIFY `idchat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
   
   --
   -- AUTO_INCREMENT de la tabla `clientes`
   --
   ALTER TABLE `clientes`
     MODIFY `idclientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
   
   --
   -- AUTO_INCREMENT de la tabla `contacto`
   --
   ALTER TABLE `contacto`
     MODIFY `idcont` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
   COMMIT;
   
   /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
   /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
   /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
   
   ```

   

4. modifica todas las cadenas de conexión que encuentres si consideras necesario.

5. ahora solo abre tu índex y crea un usuario para poder simular compras, pedidos y mas.  