DROP DATABASE IF EXISTS hookahsolid;

CREATE DATABASE hookahsolid;

USE hookahsolid;

CREATE TABLE usuario (
	id_usuario INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	apellidos VARCHAR(80) NOT NULL,
	correo VARCHAR(80) UNIQUE NOT NULL,
	password VARCHAR(40) NOT NULL,
	direccion VARCHAR(200) NOT NULL,
	ciudad VARCHAR(50) NOT NULL,
	telefono VARCHAR(9),
	permisos VARCHAR(15),
	PRIMARY KEY(id_usuario)
);

CREATE TABLE producto (
	id_producto INT NOT NULL AUTO_INCREMENT,
	nombreprod VARCHAR(80) NOT NULL,
	tipo VARCHAR(50) NOT NULL,
	precio INT NOT NULL,
	descripcion VARCHAR(200),
	marca VARCHAR(50),
	imagen VARCHAR(100),
	PRIMARY KEY(id_producto)
);

CREATE TABLE pedido (
	id_pedido INT NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	fecha DATE NOT NULL,
	preciototal INT NOT NULL,
	PRIMARY KEY(id_pedido),
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE cesta (
	id_usuario INT NOT NULL,
	id_producto INT NOT NULL,
	cantidad INT NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
	FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
	PRIMARY KEY (id_usuario, id_producto)
);

CREATE TABLE contiene (
	id_producto INT NOT NULL,
	id_pedido INT NOT NULL,
	cantidad INT NOT NULL,
	FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
	FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
	PRIMARY KEY (id_producto, id_pedido)
);

INSERT INTO `hookahsolid`.`usuario` VALUES (NULL, 'Daniel', 'De la Fuente Hernandez', 'danidelafuente86@gmail.com', MD5('solidwork'), 'Calle Hermanos Machado, 5', 'Sevilla', '628830833', 'Admin');
INSERT INTO `hookahsolid`.`usuario` VALUES (NULL, 'Carlos', 'Martinez Romero', 'carlos1m2r3@hotmail.com', MD5('cmr1234'), 'Calle Lopez de Gomara, 2', 'Sevilla', '644418929', 'user');
INSERT INTO `hookahsolid`.`usuario` VALUES (NULL, 'Antonio', 'Perez Lopez', 'antonioperlop@hotmail.com', MD5('1234'), 'Calle Genova, 3', 'Sevilla', '644552552', 'user');

INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Kaya Glory PN480 Frosted Firebowl', 'cachimba', '70', 'Kaya Glory PN480 Frosted Firebowl', 'Kaya', 'kaya-glory-pn480-frosted-firebowl.jpg');
INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Starbuzz USA Atlantis', 'cachimba', '180', 'Starbuzz USA Atlantis', 'Starbuzz', 'starbuzz-usa-atlantis-hookah-stem.jpg');
INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Art Hookah Temple 45', 'cachimba', '250', 'Art Hookah Temple 45', 'Art Hookah', 'art-hookah-temple-45.jpg');
INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Coco Nara Carbon Natural 20 u.', 'carbon', '3', 'Coco Nara Carbon Natural 20 u.', 'Coco Nara', 'coco-nara-natural-hookah-coals-20-pcs.jpg');
INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Coco Nara Carbon Natural 120 u.', 'carbon', '12', 'Coco Nara Carbon Natural 120 u.', 'Coco Nara', 'coco-nara-natural-hookah-coals-120-pcs.jpg');
INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Fantasia Air Flow Carbon Natural 45 u.', 'carbon', '9', 'Fantasia Air Flow Carbon Natural 45 u.', 'Fantasia', 'fantasia-air-flow-coconut-charcoal-45pcs.jpg');
INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Kaloud Lotus', 'accesorio', '35', 'Kaloud Lotus ', 'Kaloud', 'kaloud-lotus-hookah-bowl-screen.jpg');
INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Kaloud Samsaris', 'accesorio', '25', 'Kaloud Samsaris Cazoleta', 'Kaloud', 'kaloud-samsaris-hookah-bowl.jpg');
INSERT INTO `hookahsolid`.`producto` VALUES (NULL, 'Social Smoke Pro Series Hose', 'accesorio', '10', 'Social Smoke Pro Series Hose Manguera', 'Social Smoke', 'social-smoke-professional-lounge-hose.jpg');
