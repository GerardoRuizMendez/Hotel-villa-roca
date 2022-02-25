CREATE DATABASE villaRoca;
USE villaRoca;

CREATE TABLE Cliente(
id_cliente int(11) not null primary key AUTO_INCREMENT,
    nombre varchar(20) not null,
    telefono varchar(20) not null,
    email varchar(50) not null
);

CREATE TABLE Tipo_habitacion(
	id_tipo int(11) not null primary key auto_increment,
    nombre varchar(20) not null
);

CREATE TABLE Disponibilidad(
	id_disponibilidad int(11) not null primary key auto_increment,
    nombre varchar(20) not null
);

CREATE TABLE Habitacion(
	id_habitacion int(11) not null primary key auto_increment,
    numero varchar(20) not null,
    precio int(11) not null,
    id_tipo int(11),
    id_disponibilidad int(11),
    FOREIGN KEY (id_tipo) REFERENCES Tipo_habitacion(id_tipo)
    ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (id_disponibilidad) REFERENCES Disponibilidad(id_disponibilidad)
    ON UPDATE CASCADE ON DELETE SET NULL
);

CREATE TABLE Reservacion(
	id_reservacion int(11) not null primary key auto_increment,
    fecha_ingreso DATETIME not null,
    fecha_salida DATETIME,
    total int(11) not null,
    descuento int(11) not null,
    id_cliente int(11),
    id_habitacion int(11),
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente)
    ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (id_habitacion) REFERENCES Habitacion(id_habitacion)
    ON UPDATE CASCADE ON DELETE SET NULL
);

CREATE TABLE Recepcionista(
	id_recepcionista int(11) not null primary key auto_increment,
    nombre varchar(20) not null,
    ap_paterno varchar(20) not null,
    ap_materno varchar(20),
    direccion varchar(255) not null,
    telefono varchar(20) not null,
    RFC varchar(15) not null
);

create table administradores(
	id int(11) not null primary key auto_increment,
    nombre varchar(20) not null,
    password varchar(255) not null,
rol varchar(20) not null
);

INSERT INTO administradores VALUES(null, "Gerardo", "1234", "admin");

INSERT INTO disponibilidad VALUES(null, "activa");
INSERT INTO disponibilidad VALUES(null, "mantenimiento");

INSERT INTO tipo_habitacion VALUES(null, "una cama");
INSERT INTO tipo_habitacion VALUES(null, "dos camas");
INSERT INTO tipo_habitacion VALUES(null, "semi suite");
INSERT INTO tipo_habitacion VALUES(null, "suite");

INSERT INTO habitacion VALUES(null, "P1H1", 200, 1,1);
INSERT INTO habitacion VALUES(null, "P1H2", 200, 1,1);
INSERT INTO habitacion VALUES(null, "P1H3", 200, 1,1);
INSERT INTO habitacion VALUES(null, "P1H4", 300, 2,1);
INSERT INTO habitacion VALUES(null, "P1H5", 300, 2,1);
INSERT INTO habitacion VALUES(null, "P2H1", 200, 1,1);
INSERT INTO habitacion VALUES(null, "P2H2", 200, 1,1);
INSERT INTO habitacion VALUES(null, "P2H3", 200, 1,1);
INSERT INTO habitacion VALUES(null, "P2H4", 300, 2,1);
INSERT INTO habitacion VALUES(null, "P2H5", 300, 2,1);
INSERT INTO habitacion VALUES(null, "P3H1", 500, 3,1);
INSERT INTO habitacion VALUES(null, "P3H2", 1000, 4,1);
