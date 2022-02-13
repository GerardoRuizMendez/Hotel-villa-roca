CREATE DATABASE villaRoca;
USE villaRoca;

CREATE TABLE Cliente(
id_cliente int(11) not null primary key auto_increment,
    nombre varchar(20) not null,
    ap_paterno varchar(20),
    ap_materno varchar(20),
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
    codigo varchar(20),
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
