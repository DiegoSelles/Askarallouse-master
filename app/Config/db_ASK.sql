
CREATE DATABASE cakephp;
/*CREATE DATABASE ebsxjflv_igd;*/

CREATE USER 'cakephpuser'@'localhost' IDENTIFIED BY 'cakephppass';
/*CREATE USER 'ebsxj_igd'@'localhost' IDENTIFIED BY 'VilarTheBoss2015';*/

GRANT ALL PRIVILEGES ON cakephp.* TO cakephpuser@'localhost' IDENTIFIED BY "cakephppass";
/*GRANT ALL PRIVILEGES ON ebsxjflv_igd.* TO 'ebsxj_igd'@'localhost';*/

USE cakephp;
/*USE ebsxjflv_igd;*/



CREATE TABLE IF NOT EXISTS `users` (
	id INT UNSIGNED AUTO_INCREMENT,
	username VARCHAR(20) NOT NULL UNIQUE,
	name VARCHAR(30) NOT NULL,
	surname VARCHAR(50) NOT NULL,	
	password VARCHAR(255) NOT NULL,
	email VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `posts` (
  	id INT UNSIGNED AUTO_INCREMENT,
	title TEXT NOT NULL,
	content TEXT,
  	modDate TIMESTAMP NOT NULL,
	initDate TIMESTAMP,
	state TINYINT(1),
	category ENUM ('Electrónica', 'Informática', 'Telefonía', 'Deportes', 'Mascotas', 'Juegos', 'Motor', 'Otros'),
	user_id INT UNSIGNED,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `responses` (
	id INT UNSIGNED AUTO_INCREMENT,
	content TEXT NOT NULL,
  	modDate TIMESTAMP NOT NULL,	
	initDate TIMESTAMP,
	utility TINYINT(1),
	user_id INTEGER UNSIGNED,	
	post_id INTEGER UNSIGNED,		
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `responses_users` (
	id INT UNSIGNED AUTO_INCREMENT,
	user_id INTEGER UNSIGNED,
	response_id INTEGER UNSIGNED,
	vote TINYINT(1),
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE posts
	ADD FOREIGN KEY (user_id)
	REFERENCES users (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

ALTER TABLE responses
	ADD FOREIGN KEY (user_id) 
	REFERENCES users (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	ADD FOREIGN KEY (post_id) 
	REFERENCES posts (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

ALTER TABLE responses_users
	ADD FOREIGN KEY (user_id) 
	REFERENCES users (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	ADD FOREIGN KEY (response_id) 
	REFERENCES responses (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

INSERT INTO `users` (`id`, `username`, `name`, `surname`, `password`, `email`) VALUES (NULL, 'mltallon', 'Manuel', 'Lorenzo Tallón', '123456', 'mlorenzotallon@gmail.com'), 
(NULL, 'IGD1989', 'Isaac', 'González Domínguez', '123456', 'igdx1989@gmail.com'),
(NULL, 'drselles', 'Diego', 'Rodríguez Sellés', '123456', 'diegoselles10@gmail.com');

INSERT INTO `posts` (`id`, `title`, `content`, `modDate`, `initDate`, `state`, `category`, `user_id`) VALUES 
(NULL, '¿Como configurar apache en Xampp?', 'Necesito saber como cambiar el puerto de apache en Xampp', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, NULL, '1'), 
(NULL, '¿Como crear una página web?', 'Hola, quisiera saber cuales son los primeros pasos para hacer una página web.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, NULL, '1'), 
(NULL, '¿Como robar la contraseña del WiFi de mi vecino?', 'Hola, quisiera saber como robar la contraseña de la WiFi de mi vecino. Se la he pedido amablemente pero se ha negado a compartirla.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, NULL, '5'), 
(NULL, '¿Como crear un PDF?', 'Tengo un trabajo en Word y no se como convertirlo a PDF', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, NULL, '5'), 
(NULL, '¿Como declaro una variable en C++?', 'He empezado un tutorial pero no me han enseñado a declarar variables en C++.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, NULL, '6')
(NULL, '¿Como hacer una copia de mi disco duro?', 'Ya he fotocopiado mi disco duro, pero no se como puedo obtener los datos de esta copia. Ayudenme gracias.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, NULL, '6');

INSERT INTO `responses` (`id`, `content`, `modDate`, `initDate`, `utility`, `user_id`, `post_id`) VALUES 
(NULL, 'Debes dirigirte al archivo httpd.conf y ahí cambias el puerto.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '5', '1'), 
(NULL, 'Dirigite al panel de XAMPP ahi encontrarás la respuesta.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '6', '1'), 
(NULL, 'Mirate un tutorial en YouTube. Programa en CakePhp, puedes consultar los tutoriales de edson mollericona.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '5', '2'), 
(NULL, 'Es dificil responder a esta pregunta.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '6', '2'), 
(NULL, 'Utiliza WifiSlax, es muy intuitivo', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '1', '3'), 
(NULL, 'Paga el internet y deja de robar.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '6', '3'), 
(NULL, 'Cuando guardas el documento, puedes seleccionar la opcion de guardarlo en PDF.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '1', '4'), 
(NULL, '¿En serio preguntas eso?', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '6', '4'), 
(NULL, 'Es imposible que no te hayan explicado eso, si estas mirando un tutorial en YouTube.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '1', '5'), 
(NULL, 'Supongo que cuando ves el tutorial, él declara variables, puedes aprender de ahí.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '5', '5')
(NULL, 'Madre mía, como pilotas en el asunto.', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '1', '6'), 
(NULL, '¿De donde te has escapado?', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', NULL, '5', '6');

INSERT INTO `responses_users` (`id`, `user_id`, `response_id`, `vote`) VALUES 
(NULL, '5', '1', '1'), 
(NULL, '6', '1', '1'),
(NULL, '5', '3', '0'), 
(NULL, '1', '4', '1'), 
(NULL, '5', '5', '1'), 
(NULL, '6', '6', '0'), 
(NULL, '5', '7', '0'), 
(NULL, '1', '7', '1'), 
(NULL, '6', '9', '1'), 
(NULL, '5', '10', '0'), 
(NULL, '6', '11', '1'), 
(NULL, '5', '12', '0');







/* 3ª ENTREGA
CREATE TABLE IF NOT EXISTS `tags` (
  	id INT(10) NOT NULL AUTO_INCREMENT,
	electrónica ENUM ('Imagen', 'Sonido', 'Otros electrónica'),
	informática ENUM ('Ordenadores', 'Microsoft Windows', 'Linux', 'Mac OS', 'Hardware', 'Software', 'Drivers', 'Tablets', 'Otros informática'),
	telefonía ENUM ('IOS', 'Android', 'Windows Phone', 'Otros telefonía'),
	deportes ENUM ('Fútbol', 'Baloncesto', 'Tenis', 'Balonmano', 'Formula 1', 'Motociclismo', 'Otros deportes'),
	mascotas ENUM ('Perros', 'Gatos', 'Pájaros', 'Peces', 'Caballos', 'Veterinarios', 'Otros animales'),
	juegos ENUM ('Videoconsolas', 'Videojuegos', 'Juegos de mesa', 'Otros juegos'),
	motor ENUM ('Coches', 'Motos', 'Caravanas', 'Camiones', 'Vehículos agrícolas', 'Repuestos', 'Otros motor'),	
	otros VARCHAR(25),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `posts_tags` (
	id INT(10) NOT NULL AUTO_INCREMENT,
  	tag_id INTEGER NOT NULL,
	post_id INTEGER NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `favorites` (
	id INT(10) NOT NULL AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	post_id INTEGER NOT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `visits` (
	id INT(10) NOT NULL AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	post_id INTEGER NOT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `smsPrivados` (
	id INT(10) NOT NULL AUTO_INCREMENT,
	user_e INTEGER NOT NULL,
	user_r INTEGER NOT NULL,
	head VARCHAR(30),
	body VARCHAR(255),
	inbox TINYINT(1),
	outbox TINYINT(1),
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE posts_tags
	ADD FOREIGN KEY (tag_id) 
	REFERENCES tags (id),
	ADD FOREIGN KEY (post_id) 
	REFERENCES posts (id);

ALTER TABLE favorites
	ADD FOREIGN KEY (user_id) 
	REFERENCES users (id)
	ON DELETE CASCADE
  	ON UPDATE CASCADE,
	ADD FOREIGN KEY (post_id) 
	REFERENCES posts (id)
	ON DELETE CASCADE
  	ON UPDATE CASCADE;

ALTER TABLE visits
	ADD FOREIGN KEY (user_id) 
	REFERENCES users (id),
	ADD FOREIGN KEY (post_id) 
	REFERENCES posts (id)
	ON DELETE CASCADE
  	ON UPDATE CASCADE;

ALTER TABLE smsPrivados
	ADD FOREIGN KEY (user_e) 
	REFERENCES users (id),
	ADD FOREIGN KEY (user_r) 
	REFERENCES users (id);
*/

