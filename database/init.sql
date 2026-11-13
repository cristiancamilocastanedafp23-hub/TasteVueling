-- Creamos la base de datos si no existe, y las dos lineas
-- de abajo es para que lea caracteres especiales como la Ñ
CREATE DATABASE IF NOT EXISTS `mysql-tastevueling`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- Indicamos que use la base de datos
USE `mysql-tastevueling`;

-- Desactivamos las claves primarias ya que ciertas tablas dependen de tablas padres,
-- entonces si las tienen activas no podemos borrarlas
SET FOREIGN_KEY_CHECKS = 0;

-- Borramos las tablas 
DROP TABLE IF EXISTS pedido_detalle_ingrediente;
DROP TABLE IF EXISTS pedido_detalle;
DROP TABLE IF EXISTS pedidos;
DROP TABLE IF EXISTS oferta_producto;
DROP TABLE IF EXISTS ofertas;
DROP TABLE IF EXISTS producto_ingrediente;
DROP TABLE IF EXISTS ingredientes;
DROP TABLE IF EXISTS productos;
DROP TABLE IF EXISTS categorias;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS 
-- Volvemos a activar las tablas primarias
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

CREATE TABLE `productos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `categoria_id` int NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) NOT NULL,
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

ALTER TABLE `producto_ingrediente` ADD FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

ALTER TABLE `producto_ingrediente` ADD FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes` (`id`);

ALTER TABLE `oferta_producto` ADD FOREIGN KEY (`oferta_id`) REFERENCES `ofertas` (`id`);

ALTER TABLE `oferta_producto` ADD FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

ALTER TABLE `pedidos` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

ALTER TABLE `pedido_detalle` ADD FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);

ALTER TABLE `pedido_detalle` ADD FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

ALTER TABLE `pedido_detalle_ingrediente` ADD FOREIGN KEY (`pedido_detalle_id`) REFERENCES `pedido_detalle` (`id`);

ALTER TABLE `pedido_detalle_ingrediente` ADD FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes` (`id`);

-- Insercción de las categorías en la BBDD, en mi caso las categorías
-- serán continentes
INSERT INTO `categorias` (`nombre`, `descripcion`, `activa`) VALUES
('Europa', 'Especialidades continentales y cocina mediterránea', 1),
('África', 'Sabores tradicionales del continente africano', 1),
('Norte América', 'Sabores icónicos norteamericanos', 1),
('Ásia', 'Platos orientales y aromas especiados', 1),
('Sur América', 'Gastronomía rica en sazón y tradición sudamericana', 1);

-- Insercción de los productos
INSERT INTO productos (categoria_id, nombre, descripcion, precio, tipo, imagen, activo)
VALUES
  (1, 'PUCHERO', 'Receta tradicional cocinada a fuego lento con carnes selectas, garbanzos tiernos, verduras de temporada y un reconfortante caldo casero lleno de sabor.', 15, 'plato', 'puchero.jpg', true),
  (1, 'CURRYWURST', 'Sabrosa salchicha alemana troceada y dorada a la plancha, bañada en una suave salsa casera de curry ketchup y especias tradicionales.', 12, 'plato', 'currywurst.jpg', true),
  (1, 'TARTA-SACHER', 'Tradicional bizcocho de chocolate negro relleno de una fina capa de mermelada de albaricoque y cubierto con una suave y brillante cobertura de chocolate puro.', 9, 'postre', 'tarta-sacher.jpg', true),
  (2, 'JOLLOF', 'Tradicional arroz africano cocinado a fuego lento en una rica base de tomate, pimientos rojos y especias aromáticas, con un delicioso toque ahumado y sabroso.', 9, 'plato', 'arroz-jollof.jpg', true),
  (2, 'MAAFÉ', 'Famoso estofado del oeste de África cocinado a fuego lento en una rica y cremosa salsa de cacahuete y tomate, acompañado de verduras de temporada y especias aromáticas.', 8, 'plato', 'maafe.jpg', true),
  (2, 'CUSCÚS', 'Plato magrebí de fina sémola de trigo al vapor, acompañado de tiernas verduras de temporada, garbanzos y un reconfortante caldo especiado.', 11, 'plato', 'cuscus.jpg', true),
  (2, 'NGALAKH', 'Delicioso postre tradicional senegalés a base de sémola de mijo, bañado en una suave crema de cacahuete, fruta de baobab (bouye), agua de flor de azahar y pasas.', 7, 'postre', 'ngalakh.jpg', true),
  (3, 'BURGUER AMERICANA', 'Jugosa carne de vacuno a la parrilla, acompañada de queso cheddar fundido, bacón crujiente, lechuga, tomate y nuestra salsa especial en suave pan brioche.', 11, 'plato', 'burguer.jpg', true),
  (3, 'BBQ RIBS', 'Tiernas costillas de cerdo horneadas lentamente, bañadas en nuestra salsa barbacoa ahumada casera y glaseadas a la parrilla hasta conseguir un acabado jugoso y caramelizado.', 16, 'plato', 'bbq.jpg', true),
  (3, 'TACOS AL PASTOR', 'Icónicos tacos mexicanos de jugosa carne de cerdo adobada en achiote y especias, cocinada al trompo y servida con piña asada, cebolla picada y cilantro fresco.', 12, 'plato', 'tacos.jpg', true),
  (3, 'APPLE PIE', 'Clásica tarta americana de masa crujiente y dorada, rellena de tiernas manzanas horneadas a fuego lento con canela, azúcar moreno y un toque de mantequilla.', 10, 'postre', 'apple-pie.jpg', true),
  (4, 'SUSHI', 'Delicados bocados de arroz sazonado con vinagre de arroz, acompañados de selectos cortes de pescado fresco de alta calidad, mariscos y alga nori crujiente.', 13, 'plato', 'sushi.jpg', true),
  (4, 'PADTHAI', 'Fideos de arroz salteados al wok con brotes de soja, huevo, cacahuetes picados y toque de lima, bañados en una sabrosa salsa agridulce de tamarindo.', 10, 'plato', 'padthai.jpg', true),
  (4, 'BIBIMBAP', 'Vibrante plato coreano a base de arroz, cubierto con una colorida selección de verduras salteadas, jugosa carne marinada, huevo frito y la distintiva salsa picante gochujang.', 14, 'plato', 'bibimbap.jpg', true),
  (4, 'MOCHI', 'Tradicional dulce japonés de textura suave y elástica elaborado con harina de arroz glutinoso, relleno de una delicada pasta de judía roja dulce (anko) o helado.', 8, 'postre', 'mochis.jpg', true),
  (5, 'CEVICHE', 'Emblemático plato peruano de pescado blanco fresco marinado al momento en leche de tigre y lima, acompañado de cebolla morada, ají, maíz cancha crujiente y boniato dulce.', 9, 'plato', 'ceviche.jpg', true),
  (5, 'FEIJOADA', 'Tradicional guiso brasileño de frijoles negros cocinados a fuego lento con una selección de carnes de cerdo especiadas, servido con arroz blanco, farofa crujiente y rodajas de naranja.', 12, 'plato', 'feijoada.jpg', true),
  (5, 'BANDEJA PAISA', 'Abundante plato colombiano compuesto por carne picada, chicharrón crujiente, frijoles rojos, arroz blanco, huevo frito, plátano maduro, chorizo, arepa y aguacate.', 15, 'plato', 'bandeja-paisa.jpg', true),
  (5, 'ALFAJORES', 'Delicados alfajores artesanales de galleta suave y desmenuzable, rellenos de un cremoso dulce de leche casero y rebozados con coco rallado o azúcar glas.', 7, 'postre', 'alfajores.jpg', true),
  (5, 'MATE', 'Tradicional infusión argentina de yerba mate servida en calabaza con bombilla. Destaca por su sabor herbal, profundo y ligeramente amargo, repleta de antioxidantes y energía natural.', 5, 'bebida', 'mate.jpg', true),
  (5, 'CAIPIRIÑA SIN ALCOHOL', 'El cóctel más icónico de Brasil, elaborado a base de lima fresca majada con azúcar y abundante hielo picado. Una bebida cítrica, dulce y profundamente refrescante.', 3, 'bebida', 'caipirina.jpg', true),
  (1, 'CERVEZA ALEMANA', 'Tradicional cerveza artesanal alemana elaborada según la ley de pureza, de cuerpo equilibrado, color dorado brillante y una espuma cremosa con notas de malta y lúpulo aromático.', 4, 'bebida', 'cerveza.jpg', true),
  (4, 'SAKE', 'Vino japonés elaborado a partir de la fermentación del arroz, de perfil suave, elegante y ligeramente afrutado, ideal para servirse templada o fría junto a platos asiáticos.', 6, 'bebida', 'sake.jpg', true);