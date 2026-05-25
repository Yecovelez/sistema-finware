-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2026 a las 00:55:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_finware`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_creacion`) VALUES
(5, 'MOUSE', 'INALAMBRICO', 35000.00, 28, '2026-05-10 22:13:50'),
(6, 'USB', '64 gb', 22000.00, 21, '2026-05-10 22:27:43'),
(7, 'teclado gamer', 'inalambrico', 80000.00, 50, '2026-05-10 22:47:51'),
(8, 'Laptop Pro 15', 'Procesador i7, 16GB RAM, 512GB SSD', 1200.00, 15, '2026-05-10 22:50:30'),
(9, 'Mouse Ergonómico', 'Mouse inalámbrico con sensor óptico de 1600 DPI', 25.50, 50, '2026-05-10 22:50:30'),
(10, 'Teclado Mecánico RGB', 'Switches azules, retroiluminación personalizada', 85.00, 30, '2026-05-10 22:50:30'),
(11, 'Monitor 27 Pulgadas', 'Resolución 4K UHD, panel IPS, 144Hz', 350.00, 10, '2026-05-10 22:50:30'),
(12, 'Disco Duro Externo 2TB', 'Conexión USB 3.0, alta velocidad de transferencia', 75.00, 40, '2026-05-10 22:50:30'),
(13, 'Auriculares Gaming 7.1', 'Sonido envolvente, micrófono con cancelación de ruido', 60.00, 25, '2026-05-10 22:50:30'),
(14, 'Cámara Web 1080p', 'Enfoque automático, ideal para streaming y reuniones', 45.00, 20, '2026-05-10 22:50:30'),
(15, 'Impresora Láser Color', 'Conectividad Wi-Fi, impresión doble cara automática', 210.00, 8, '2026-05-10 22:50:30'),
(16, 'Router Wi-Fi 6', 'Doble banda, alta cobertura para el hogar', 110.00, 15, '2026-05-10 22:50:30'),
(17, 'Silla Ergonómica Oficina', 'Soporte lumbar ajustable, malla transpirable', 180.00, 12, '2026-05-10 22:50:30'),
(18, 'Tablet 10 Pulgadas', 'Pantalla Retina, 64GB almacenamiento, Wi-Fi', 299.00, 18, '2026-05-10 22:50:30'),
(20, 'Reloj Inteligente Sport', 'GPS integrado, monitor de ritmo cardíaco', 130.00, 35, '2026-05-10 22:50:30'),
(21, 'Memoria RAM 8GB DDR4', 'Frecuencia 3200MHz, disipador de calor aluminio', 40.00, 60, '2026-05-10 22:50:30'),
(22, 'Tarjeta de Video RTX 3060', '12GB GDDR6, Ray Tracing, Triple Fan', 380.00, 5, '2026-05-10 22:50:30'),
(23, 'Fuente de Poder 750W', 'Certificación 80 Plus Gold, modular', 95.00, 14, '2026-05-10 22:50:30'),
(24, 'Gabinete ATX Gaming', 'Panel lateral de vidrio templado, 3 ventiladores RGB', 70.00, 10, '2026-05-10 22:50:30'),
(25, 'Micrófono de Condensador', 'Patrón cardioide, ideal para podcasts y voz', 55.00, 20, '2026-05-10 22:50:30'),
(26, 'Altavoces Bluetooth 5.0', 'Sonido estéreo 20W, batería de 10 horas', 35.00, 45, '2026-05-10 22:50:30'),
(27, 'Cargador Rápido 65W', 'Puerto USB-C, compatible con laptops y móviles', 30.00, 50, '2026-05-10 22:50:30'),
(28, 'Hub USB-C 7 en 1', 'Salida HDMI 4K, lectores SD y puertos USB 3.0', 40.00, 30, '2026-05-10 22:50:30'),
(29, 'Mando Inalámbrico PC', 'Diseño ergonómico, compatible con Windows y Android', 50.00, 25, '2026-05-10 22:50:30'),
(30, 'Escáner de Documentos', 'Alta velocidad, digitalización a doble cara', 150.00, 5, '2026-05-10 22:50:30'),
(31, 'Repetidor Wi-Fi', 'Fácil configuración, amplia el rango de señal', 20.00, 40, '2026-05-10 22:50:30'),
(32, 'Soporte para Laptop', 'Aluminio ajustable, mejora la postura', 25.00, 30, '2026-05-10 22:50:30'),
(33, 'Alfombrilla XL RGB', 'Superficie de tela suave, base antideslizante', 18.00, 50, '2026-05-10 22:50:30'),
(34, 'Disco SSD 1TB NVMe', 'Velocidad de lectura hasta 3500 MB/s', 90.00, 25, '2026-05-10 22:50:30'),
(35, 'Webcam Cubierta Privacidad', 'Full HD 1080p con tapa para lente', 35.00, 20, '2026-05-10 22:50:30'),
(36, 'Mini PC Desktop', 'Procesador Ryzen 5, 8GB RAM, 256GB SSD', 420.00, 8, '2026-05-10 22:50:30'),
(37, 'Cable HDMI 2.1 2m', 'Soporta resolución 8K a 60Hz', 15.00, 100, '2026-05-10 22:50:30'),
(38, 'Base Enfriadora Laptop', '4 ventiladores silenciosos, luz LED azul', 22.00, 35, '2026-05-10 22:50:30'),
(39, 'Adaptador Bluetooth USB', 'Conexión 5.0 estable para periféricos', 12.00, 80, '2026-05-10 22:50:30'),
(40, 'Kit de Limpieza Pantallas', 'Líquido especial y paño de microfibra', 8.00, 150, '2026-05-10 22:50:30'),
(41, 'Puntero Láser Presentación', 'Control remoto inalámbrico para diapositivas', 15.00, 40, '2026-05-10 22:50:30'),
(42, 'Lámpara de Escritorio LED', 'Diferentes niveles de brillo y carga USB', 28.00, 25, '2026-05-10 22:50:30'),
(43, 'Soporte de Monitor Doble', 'Brazo ajustable para dos pantallas', 65.00, 10, '2026-05-10 22:50:30'),
(44, 'Batería Externa 20000mAh', 'Carga rápida, múltiples puertos de salida', 45.00, 30, '2026-05-10 22:50:30'),
(45, 'Pasta Térmica Alta Calidad', 'Mejora la refrigeración del procesador', 10.00, 100, '2026-05-10 22:50:30'),
(46, 'Capturadora de Video 4K', 'Entrada HDMI para grabación de consolas', 120.00, 7, '2026-05-10 22:50:30'),
(47, 'Proyector Portátil HD', 'Conexión Wi-Fi, 3000 lúmenes', 250.00, 6, '2026-05-10 22:50:30'),
(48, 'Tarjeta SD 128GB Class 10', 'Ideal para cámaras y almacenamiento extra', 25.00, 60, '2026-05-10 22:50:30'),
(49, 'Mochila para Laptop 17', 'Compartimentos acolchados, material impermeable', 55.00, 20, '2026-05-10 22:50:30'),
(50, 'Auriculares In-Ear TWS', 'Cancelación activa de ruido, estuche de carga', 70.00, 40, '2026-05-10 22:50:30'),
(51, 'Estación de Carga Múltiple', 'Carga hasta 6 dispositivos simultáneamente', 35.00, 25, '2026-05-10 22:50:30'),
(52, 'Teclado Numérico Externo', 'Ideal para laptops sin teclado extendido', 15.00, 50, '2026-05-10 22:50:30'),
(53, 'Cámara de Seguridad Wi-Fi', 'Visión nocturna, audio bidireccional', 45.00, 15, '2026-05-10 22:50:30'),
(54, 'Candado para Laptop Kensington', 'Cable de acero para seguridad física', 20.00, 30, '2026-05-10 22:50:30'),
(55, 'Lector de Huellas USB', 'Seguridad biométrica para Windows Hello', 30.00, 20, '2026-05-10 22:50:30'),
(56, 'Organizador de Cables', 'Kit de clips y fundas protectoras', 12.00, 100, '2026-05-10 22:50:30'),
(57, 'Adaptador DisplayPort a HDMI', 'Conversor de señal estable', 10.00, 60, '2026-05-10 22:50:30'),
(58, 'Gafas Filtro Luz Azul', 'Protección para largas horas frente al monitor', 25.00, 45, '2026-05-10 22:50:30'),
(59, 'SSD Externo 500GB', 'Resistente a golpes, tamaño bolsillo', 65.00, 15, '2026-05-10 22:50:30'),
(60, 'Sistema de Sonido 2.1', 'Subwoofer potente para PC', 80.00, 10, '2026-05-10 22:50:30'),
(61, 'Micrófono Lavalier Solapa', 'Conexión 3.5mm para móviles y cámaras', 15.00, 50, '2026-05-10 22:50:30'),
(62, 'Soporte Celular Escritorio', 'Ángulo ajustable, base estable', 10.00, 100, '2026-05-10 22:50:30'),
(63, 'Tarjeta de Red PCIe Wi-Fi', 'Doble banda con antenas externas', 35.00, 15, '2026-05-10 22:50:30'),
(64, 'Ventilador Chasis 120mm', 'Silencioso con iluminación ARGB', 15.00, 40, '2026-05-10 22:50:30'),
(65, 'Controlador de Ventiladores', 'Pantalla LCD para control de temperatura', 25.00, 10, '2026-05-10 22:50:30'),
(66, 'Switch Red 5 Puertos', 'Gigabit Ethernet para oficina', 22.00, 20, '2026-05-10 22:50:30'),
(67, 'Extensor HDMI por Ethernet', 'Transmisión hasta 50 metros', 45.00, 8, '2026-05-10 22:50:30'),
(68, 'Kit Herramientas PC', 'Destornilladores de precisión y pinzas', 30.00, 15, '2026-05-10 22:50:30'),
(69, 'Brazalete Antiestático', 'Protección para manipulación de hardware', 8.00, 100, '2026-05-10 22:50:30'),
(70, 'Pasta de Soldadura 50g', 'Para reparaciones electrónicas', 12.00, 50, '2026-05-10 22:50:30'),
(71, 'Multímetro Digital', 'Medición de voltaje y resistencia', 35.00, 12, '2026-05-10 22:50:30'),
(72, 'Lupa con Luz LED', 'Ideal para soldadura y microcomponentes', 20.00, 10, '2026-05-10 22:50:30'),
(73, 'Tarjeta Sonido USB 7.1', 'Adaptador externo plug and play', 15.00, 40, '2026-05-10 22:50:30'),
(74, 'Cable Ethernet Cat7 10m', 'Alta velocidad blindado', 18.00, 50, '2026-05-10 22:50:30'),
(75, 'Divisor de Audio 3.5mm', 'Permite conectar dos auriculares', 5.00, 150, '2026-05-10 22:50:30'),
(76, 'Soporte Auriculares Madera', 'Diseño elegante para escritorio', 25.00, 15, '2026-05-10 22:50:30'),
(77, 'Webcam Ring Light', 'Luz integrada para mejores videollamadas', 50.00, 12, '2026-05-10 22:50:30'),
(78, 'Smart Plug Wi-Fi', 'Control de encendido desde el móvil', 18.00, 30, '2026-05-10 22:50:30'),
(79, 'Bombilla Inteligente RGB', 'Compatible con Alexa y Google Home', 15.00, 50, '2026-05-10 22:50:30'),
(80, 'Tira LED RGB 5m', 'Control remoto y adhesivo 3M', 20.00, 40, '2026-05-10 22:50:30'),
(81, 'Sensor Movimiento Zigbee', 'Para domótica y seguridad', 25.00, 15, '2026-05-10 22:50:30'),
(82, 'Hub Inteligente Domótica', 'Central de control para dispositivos', 60.00, 5, '2026-05-10 22:50:30'),
(83, 'Cargador Inalámbrico Qi', 'Carga rápida 15W superficie cuero', 25.00, 30, '2026-05-10 22:50:30'),
(84, 'Reloj Despertador Digital', 'Con carga inalámbrica y temperatura', 30.00, 20, '2026-05-10 22:50:30'),
(85, 'Marco Digital 10 Pulgadas', 'Reproducción de fotos y videos', 85.00, 8, '2026-05-10 22:50:30'),
(86, 'Balanza Inteligente BT', 'Mide grasa corporal y masa muscular', 35.00, 15, '2026-05-10 22:50:30'),
(87, 'Termómetro Higrómetro BT', 'Control de clima desde el móvil', 12.00, 40, '2026-05-10 22:50:30'),
(88, 'Cerradura Inteligente BT', 'Acceso por código o aplicación', 150.00, 4, '2026-05-10 22:50:30'),
(89, 'Cámara Instantánea', 'Fotos físicas al momento', 90.00, 10, '2026-05-10 22:50:30'),
(90, 'Película Cámara Instax', 'Pack de 20 hojas', 20.00, 60, '2026-05-10 22:50:30'),
(91, 'Trípode Cámara Profesional', 'Altura 1.5m, aluminio ligero', 45.00, 15, '2026-05-10 22:50:30'),
(92, 'Anillo de Luz 10 Pulgadas', 'Para maquillaje y selfies con soporte', 25.00, 30, '2026-05-10 22:50:30'),
(93, 'Micrófono Direccional DSLR', 'Mejora el audio de grabaciones video', 60.00, 10, '2026-05-10 22:50:30'),
(94, 'Filtro Polarizador 58mm', 'Elimina reflejos en fotografía', 15.00, 20, '2026-05-10 22:50:30'),
(95, 'Bolsa Estanca Celular', 'Protección contra el agua IPX8', 10.00, 100, '2026-05-10 22:50:30'),
(96, 'Localizador Bluetooth', 'Para encontrar llaves o billetera', 25.00, 30, '2026-05-10 22:50:30'),
(97, 'Lector Libros Electrónicos', 'Pantalla tinta electrónica 6 pulgadas', 130.00, 12, '2026-05-10 22:50:30'),
(98, 'Funda Tablet Universal', 'Material resistente y función soporte', 15.00, 40, '2026-05-10 22:50:30'),
(99, 'Teclado Bluetooth Delgado', 'Compatible con tablets y móviles', 28.00, 35, '2026-05-10 22:50:30'),
(100, 'Lápiz Óptico Capacitivo', 'Alta precisión para dibujo digital', 20.00, 50, '2026-05-10 22:50:30'),
(101, 'Adaptador Corriente Viaje', 'Universal para más de 150 países', 18.00, 40, '2026-05-10 22:50:30'),
(102, 'Báscula de Cocina Digital', 'Alta precisión hasta 5kg', 15.00, 30, '2026-05-10 22:50:30'),
(103, 'Espumador Leche Eléctrico', 'Para café profesional en casa', 12.00, 50, '2026-05-10 22:50:30'),
(104, 'Molino Café Automático', 'Molienda ajustable en segundos', 35.00, 15, '2026-05-10 22:50:30'),
(105, 'Taza Térmica USB', 'Mantiene la bebida caliente', 20.00, 25, '2026-05-10 22:50:30'),
(106, 'Ventilador USB Escritorio', 'Potente y silencioso para verano', 10.00, 60, '2026-05-10 22:50:30'),
(107, 'Calentador Pies Eléctrico', 'Ideal para trabajar en invierno', 30.00, 10, '2026-05-10 22:50:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
