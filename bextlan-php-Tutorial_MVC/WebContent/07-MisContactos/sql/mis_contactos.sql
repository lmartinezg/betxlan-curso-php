/* Comentario en SQL */

/*
Otro comentario 
ocupando varias líneas
*/

/*	
ENGINE=MyISAM ==> Tablas planas 
ENGINE=InnoDB ==> Tablas relacionales

Buscar info:
Modelo Entidad-Relación
Normalización de BBDD

*/

CREATE DATABASE mis_contactos DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

USE mis_contactos;

CREATE TABLE contactos (
	email VARCHAR(50) NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	sexo CHAR(1),
	nacimiento DATE,
	telefono VARCHAR(13),
	pais VARCHAR(50) NOT NULL,
	imagen VARCHAR(50),
	PRIMARY KEY(email),
	FULLTEXT KEY buscador(email, nombre, sexo, telefono, pais)
	) ENGINE=MyISAM;
	
CREATE TABLE pais (
	id_pais INT NOT NULL AUTO_INCREMENT,
	pais VARCHAR(50) NOT NULL,
	PRIMARY KEY(id_pais)
	) ENGINE=MyISAM;

INSERT INTO pais (id_pais, pais) VALUES
	(1, "México"),
	(2, "Colombia"),
	(3, "Guatemala"),
	(4, "España"),
	(5, "Brasil"),
	(6, "Uruguay"),
	(7, "Perú"),
	(8, "Argentina"),
	(9, "Chile"),
	(10, "Paraguay"),
	(11, "Honduras"),
	(12, "El Salvador"),
	(13, "Nicaragua"),
	(14, "Costa Rica"),
	(15, "Panamá"),
	(16, "Venezuela"),
	(17, "Ecuador"),
	(18, "Bolivia"),
	(19, "Canadá"),
	(20, "Estados Unidos"),
	(21, "Groenlandia"),
	(22, "República Dominicana"),
	(23, "Haití"),
	(24, "Cuba"),
	(25, "Belice"),
	(26, "Reino Unido"),
	(27, "Francia"),
	(28, "Alemania"),
	(29, "Italia"),
	(30, "Japón"),
	(31, "China"),
	(32, "Egipto"),
	(33, "Sudáfrica"),
	(34, "Australia"),
	(35, "Nueva Zelanda");
	