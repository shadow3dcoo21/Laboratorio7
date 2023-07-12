create database enfermeria ;
use enfermeria;

create table pacientes(
    id_paciente int auto_increment,
    nombre_apellido varchar(200),
    carrera varchar(100),
    lugar_nacimiento varchar(100),
    fecha_nacimiento date,
    hora_entrada varchar(12),
    hora_salida varchar(12),
    celular varchar(12),
    constraint pk_id_paciente primary key (id_paciente)

);

