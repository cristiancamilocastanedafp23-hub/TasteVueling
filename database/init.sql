-- Creamos la base de datos si no existe, y las dos líneas
-- de abajo son para que lea caracteres especiales como la Ñ
CREATE DATABASE IF NOT EXISTS `mysql-tastevueling`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- Indicamos que use la base de datos
USE `mysql-tastevueling`;

-- Desactivamos las claves foráneas temporalmente para poder borrar
-- las tablas sin conflictos de dependencia con tablas padre
SET FOREIGN_KEY_CHECKS = 0;

-- Borramos las tablas si existen
DROP TABLE IF EXISTS `pedido_detalle_ingrediente`;
DROP TABLE IF EXISTS `pedido_detalle`;
DROP TABLE IF EXISTS `pedidos`;
DROP TABLE IF EXISTS `oferta_producto`;
DROP TABLE IF EXISTS `ofertas`;
DROP TABLE IF EXISTS `producto_ingrediente`;
DROP TABLE IF EXISTS `ingredientes`;
DROP TABLE IF EXISTS `productos`;
DROP TABLE IF EXISTS `tipo`;
DROP TABLE IF EXISTS `categorias`;
DROP TABLE IF EXISTS `usuarios`;

-- Volvemos a activar las claves foráneas
SET FOREIGN_KEY_CHECKS = 1;

-- Creamos las tablas
CREATE TABLE `usuarios` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(20),
  `direccion` varchar(255),
  `fecha_nacimiento` date,
  `rol` varchar(20) NOT NULL DEFAULT 'usuario' COMMENT 'Valores: usuario, admin',
  `fecha_registro` datetime NOT NULL DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `categorias` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) UNIQUE NOT NULL,
  `descripcion` text,
  `activa` boolean NOT NULL DEFAULT true
);

CREATE TABLE `tipo` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL
);

CREATE TABLE `productos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `categoria_id` int NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `tipo_id` int NOT NULL,
  `imagen` varchar(255),
  `activo` boolean NOT NULL DEFAULT true
);

CREATE TABLE `ingredientes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) UNIQUE NOT NULL,
  `precio_extra` decimal(10,2) NOT NULL DEFAULT 0,
  `activo` boolean NOT NULL DEFAULT true
);

CREATE TABLE `producto_ingrediente` (
  `producto_id` int NOT NULL,
  `ingrediente_id` int NOT NULL,
  `cantidad` decimal(10,2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`producto_id`, `ingrediente_id`)
);

CREATE TABLE `ofertas` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text,
  `tipo` varchar(20) NOT NULL COMMENT 'Valores: descuento, 2x1, combo, codigo',
  `valor` decimal(10,2),
  `codigo` varchar(50) UNIQUE,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime,
  `activa` boolean NOT NULL DEFAULT true
);

CREATE TABLE `oferta_producto` (
  `oferta_id` int NOT NULL,
  `producto_id` int NOT NULL,
  PRIMARY KEY (`oferta_id`, `producto_id`)
);

CREATE TABLE `pedidos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente' COMMENT 'Valores: pendiente, confirmado, preparando, enviado, entregado, cancelado',
  `fecha_pedido` datetime NOT NULL DEFAULT (CURRENT_TIMESTAMP),
  `subtotal` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0,
  `total` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL DEFAULT 'simulado',
  `estado_pago` varchar(20) NOT NULL DEFAULT 'pendiente' COMMENT 'Valores: pendiente, pagado, fallido'
);

CREATE TABLE `pedido_detalle` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `pedido_id` int NOT NULL,
  `producto_id` int,
  `nombre_producto` varchar(150) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal` decimal(10,2) NOT NULL COMMENT 'CHECK cantidad > 0 y precio_unitario >= 0'
);

CREATE TABLE `pedido_detalle_ingrediente` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `pedido_detalle_id` int NOT NULL,
  `ingrediente_id` int,
  `nombre_ingrediente` varchar(100) NOT NULL,
  `precio_extra` decimal(10,2) NOT NULL DEFAULT 0,
  `accion` varchar(20) NOT NULL COMMENT 'Valores: incluido, quitado, añadido'
);

-- Creamos las relaciones entre las tablas
ALTER TABLE `productos` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

ALTER TABLE `productos` ADD CONSTRAINT `fk_productos_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`);

ALTER TABLE `producto_ingrediente` ADD FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

ALTER TABLE `producto_ingrediente` ADD FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes` (`id`);

ALTER TABLE `oferta_producto` ADD FOREIGN KEY (`oferta_id`) REFERENCES `ofertas` (`id`);

ALTER TABLE `oferta_producto` ADD FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

ALTER TABLE `pedidos` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

ALTER TABLE `pedido_detalle` ADD FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);

ALTER TABLE `pedido_detalle` ADD FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

ALTER TABLE `pedido_detalle_ingrediente` ADD FOREIGN KEY (`pedido_detalle_id`) REFERENCES `pedido_detalle` (`id`);

ALTER TABLE `pedido_detalle_ingrediente` ADD FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes` (`id`);

-- Inserción de las categorías en la BBDD (continentes)
INSERT INTO `categorias` (`nombre`, `descripcion`, `activa`) VALUES
('EUROPA', 'Especialidades continentales y cocina mediterránea', 1),
('ÁFRICA', 'Sabores tradicionales del continente africano', 1),
('NORTE-AMÉRICA', 'Sabores icónicos norteamericanos', 1),
('ÁSIA', 'Platos orientales y aromas especiados', 1),
('SUR-AMÉRICA', 'Gastronomía rica en sazón y tradición sudamericana', 1);

-- Inserción de los tipos de producto
INSERT INTO `tipo` (`nombre`) VALUES
('Plato'),
('Postre'),
('Bebida');

-- Inserción de los productos
INSERT INTO `productos` (`categoria_id`, `nombre`, `descripcion`, `precio`, `tipo_id`, `imagen`, `activo`) VALUES
  (1, 'RISOTTO', 'Cremoso arroz elaborado a fuego lento con setas silvestres salteadas, queso parmesano recién rallado y un toque de perejil fresco.', 12.00, 1, 'risotto.webp', true),
  (1, 'PUCHERO', 'Receta tradicional cocinada a fuego lento con carnes selectas, garbanzos tiernos, verduras de temporada y un reconfortante caldo casero lleno de sabor.', 15.00, 1, 'puchero.webp', true),
  (1, 'CURRYWURST', 'Sabrosa salchicha alemana troceada y dorada a la plancha, bañada en una suave salsa casera de curry ketchup y especias tradicionales.', 10.00, 1, 'currywurst.webp', true),
  (1, 'TARTA-SACHER', 'Tradicional bizcocho de chocolate negro relleno de una fina capa de mermelada de albaricoque y cubierto con una suave y brillante cobertura de chocolate puro.', 9.00, 2, 'tarta-sacher.webp', true),
  (2, 'JOLLOF', 'Tradicional arroz africano cocinado a fuego lento en una rica base de tomate, pimientos rojos y especias aromáticas, con un delicioso toque ahumado y sabroso.', 9.00, 1, 'arroz-jollof.webp', true),
  (2, 'MAAFÉ', 'Famoso estofado del oeste de África cocinado a fuego lento en una rica y cremosa salsa de cacahuete y tomate, acompañado de verduras de temporada y especias aromáticas.', 8.00, 1, 'maafe.webp', true),
  (2, 'CUSCÚS', 'Plato magrebí de fina sémola de trigo al vapor, acompañado de tiernas verduras de temporada, garbanzos y un reconfortante caldo especiado.', 11.00, 1, 'cuscus.webp', true),
  (2, 'NGALAKH', 'Delicioso postre tradicional senegalés a base de sémola de mijo, bañado en una suave crema de cacahuete, fruta de baobab (bouye), agua de flor de azahar y pasas.', 7.00, 2, 'ngalakh.webp', true),
  (3, 'BURGUER AMERICANA', 'Jugosa carne de vacuno a la parrilla, acompañada de queso cheddar fundido, bacón crujiente, lechuga, tomate y nuestra salsa especial en suave pan brioche.', 11.00, 1, 'burguer.webp', true),
  (3, 'BBQ RIBS', 'Tiernas costillas de cerdo horneadas lentamente, bañadas en nuestra salsa barbacoa ahumada casera y glaseadas a la parrilla hasta conseguir un acabado jugoso y caramelizado.', 16.00, 1, 'bbq.webp', true),
  (3, 'TACOS AL PASTOR', 'Icónicos tacos mexicanos de jugosa carne de cerdo adobada en achiote y especias, cocinada al trompo y servida con piña asada, cebolla picada y cilantro fresco.', 12.00, 1, 'tacos.webp', true),
  (3, 'APPLE PIE', 'Clásica tarta americana de masa crujiente y dorada, rellena de tiernas manzanas horneadas a fuego lento con canela, azúcar moreno y un toque de mantequilla.', 10.00, 2, 'apple-pie.webp', true),
  (4, 'SUSHI', 'Delicados bocados de arroz sazonado con vinagre de arroz, acompañados de selectos cortes de pescado fresco de alta calidad, mariscos y alga nori crujiente.', 13.00, 1, 'sushi.webp', true),
  (4, 'PADTHAI', 'Fideos de arroz salteados al wok con brotes de soja, huevo, cacahuetes picados y toque de lima, bañados en una sabrosa salsa agridulce de tamarindo.', 10.00, 1, 'padthai.webp', true),
  (4, 'BIBIMBAP', 'Vibrante plato coreano a base de arroz, cubierto con una colorida selección de verduras salteadas, jugosa carne marinada, huevo frito y la distintiva salsa picante gochujang.', 14.00, 1, 'bibimbap.webp', true),
  (4, 'MOCHI', 'Tradicional dulce japonés de textura suave y elástica elaborado con harina de arroz glutinoso, relleno de una delicada pasta de judía roja dulce (anko) o helado.', 8.00, 2, 'mochis.webp', true),
  (5, 'CEVICHE', 'Emblemático plato peruano de pescado blanco fresco marinado al momento en leche de tigre y lima, acompañado de cebolla morada, ají, maíz cancha crujiente y boniato dulce.', 9.00, 1, 'ceviche.webp', true),
  (5, 'FEIJOADA', 'Tradicional guiso brasileño de frijoles negros cocinados a fuego lento con una selección de carnes de cerdo especiadas, servido con arroz blanco, farofa crujiente y rodajas de naranja.', 12.00, 1, 'feijoada.webp', true),
  (5, 'BANDEJA PAISA', 'Abundante plato colombiano compuesto por carne picada, chicharrón crujiente, frijoles rojos, arroz blanco, huevo frito, plátano maduro, chorizo, arepa y aguacate.', 15.00, 1, 'bandeja-paisa.webp', true),
  (5, 'ALFAJORES', 'Delicados alfajores artesanales de galleta suave y desmenuzable, rellenos de un cremoso dulce de leche casero y rebozados con coco rallado o azúcar glas.', 7.00, 2, 'alfajores.webp', true),
  (5, 'CAIPIRIÑA SIN ALCOHOL', 'El cóctel más icónico de Brasil, elaborado a base de lima fresca majada con azúcar y abundante hielo picado. Una bebida cítrica, dulce y profundamente refrescante.', 3.00, 3, 'caipirina.webp', true),
  (1, 'CERVEZA ALEMANA', 'Tradicional cerveza artesanal alemana elaborada según la ley de pureza, de cuerpo equilibrado, color dorado brillante y una espuma cremosa con notas de malta y lúpulo aromático.', 4.00, 3, 'cerveza.webp', true),
  (4, 'SAKE', 'Vino japonés elaborado a partir de la fermentación del arroz, de perfil suave, elegante y ligeramente afrutado, ideal para servirse templada o fría junto a platos asiáticos.', 6.00, 3, 'sake.webp', true),
  (2, 'BISSAP', 'Bebida tradicional senegalesa a base de infusión de flor de Jamaica y menta fresca, con el equilibrio perfecto entre acidez, dulzor y un aroma herbal irresistible.', 5.00, 3, 'bissap.webp', true),
  (3, 'CAESAR', 'Icónico cóctel canadiense a base de vodka y jugo de Clamato, aderezado con salsa Perrins, lima y un toque picante, servido en vaso escarchado con sal de apio, rama de apio fresco y brocheta aperitivo.', 4.00, 3, 'caesar.webp', true);