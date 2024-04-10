CREATE DATABASE Chambas_BD;
USE Chambas_BD;

DROP DATABASE Chambas_BD;

CREATE TABLE Roles(
	Id int auto_increment primary key,
    Rol varchar(25) not null
    );
    INSERT INTO Roles (`Rol`) VALUES ('Contratista');
	INSERT INTO Roles (`Rol`) VALUES ('Trabajador');
    
CREATE TABLE Usuario(
	Id int AUTO_INCREMENT PRIMARY KEY,
    Nombre varchar(50) not null,
    Usuario varchar(50) not null,
    Contraseña varchar(100) not null,
    Chambeando bit,
    Id_Contratista int,
    Id_Rol int not null,
    constraint fk_usuarios_rol foreign key
	(Id_Rol) references Roles(Id),
    constraint fk_contratista foreign key
	(Id_Contratista) references Usuario(Id)
);
INSERT INTO Usuario (`Nombre`,`Usuario`,`Contraseña`,`Id_Rol`) VALUES ('Luis','Henry','123456','1');
INSERT INTO Usuario (`Nombre`,`Usuario`,`Contraseña`,`Id_Rol`) VALUES ('Cristian','Cris','123456','2');
UPDATE Usuario SET Chambeando=cast(0 as signed) where Id_Rol=2;
select * from Usuario where Chambeando=0 AND Id_Rol=2;
insert into Usuario (Nombre,Usuario,Contraseña,Id_Rol,Chambeando) values ('Ayala','Ayala',123456,2,0);

update Usuario set Id_Contratista=1, Chambeando=cast(1 as signed) where Id=5;

UPDATE Usuario SET Id_Contratista=1, Chambeando=cast(1 as signed) where Id=2;
UPDATE Usuario SET Id_Contratista=3, Chambeando=cast(1 as signed) where Id=4;
UPDATE Usuario SET Id_Contratista=3, Chambeando=cast(1 as signed) where Id=4;
UPDATE Usuario SET Id_Contratista=NULL,Chambeando=cast(0 as signed)  Where Id=4;
INSERT INTO Usuario (`Nombre`, `Usuario`, `Contraseña`, `Chambeando`, `Id_Rol`) VALUES ('Enrique', 'Luis', '123456', cast(0 as signed), '2');

CREATE TABLE Evidencias(
	Id int auto_increment primary key,
    Foto longblob not null,
    Descripcion varchar(400) not null,
    Id_Trabajador int not null,
    constraint fk_trabajador_evidencia foreign key
	(Id_Trabajador) references Usuario(Id)
);
select * from Evidencias;
select * from Valoraciones where Id_Contratista=1;
CREATE TABLE Valoraciones(
	Id int auto_increment primary key,
    Id_Contratista int not null,
    Id_Trabajador int not null,
    Comentarios varchar(400),
    Calificacion tinyint not null,
    constraint fk_contratista_valoracion foreign key
	(Id_Contratista) references Usuario(Id),
    constraint fk_trabajador_valoracion foreign key
	(Id_Trabajador) references Usuario(Id)
);
INSERT INTO Evidencias (Foto, Descripcion, Id_Trabajador)
VALUES ('133', 'poco comun', 1);
select Usuario.Usuario, Valoraciones.Comentarios, Valoraciones.Calificacion from Valoraciones inner join Usuario on Valoraciones.Id_Contratista=Usuario.Id where Valoraciones.Id_Trabajador=1;
select * from Usuario;
select * from Evidencias;
select * from Valoraciones;
select * from Roles;
select * from Valoraciones where Id_Trabajador =1;
USE Chambas_BD;

select avg(Calificacion) from Valoraciones where Id_Trabajador =1;
select * from Usuario where Id_Contratista = 3;
SELECT * FROM Usuario WHERE Id = 4;
ALTER TABLE Evidencias
ADD Fecha datetime;

-- sin where
SELECT u1.Nombre AS contratado, u2.Nombre AS contratista
FROM Usuario u1
INNER JOIN Usuario u2 ON u1.Id_Contratista = u2.Id;

-- con where 
SELECT u1.Nombre AS contratado, u2.Nombre AS contratista
FROM Usuario u1
INNER JOIN Usuario u2 ON u1.Id_Contratista = u2.Id WHERE u1.Id = 1;

SELECT usuario.Id, usuario.Nombre, Evidencias.Descripcion, Evidencias.Fecha FROM Usuario
INNER JOIN Evidencias ON usuario.Nombre = Evidencias.Id;

SELECT Evidencias.Id, Evidencias.Foto, Evidencias.Descripcion, Evidencias.Fecha, Usuario.Id, Usuario.Nombre FROM Evidencias
INNER JOIN Usuario ON evidencias.Id_Trabajador = Usuario.Id;

SELECT Evidencias.Id, Evidencias.Descripcion, Usuario.Nombre FROM Evidencias
    INNER JOIN Usuario ON evidencias.Id_Trabajador = Usuario.Id  WHERE Evidencias.Id = 5;

SELECT evidencias.Id, obras.Obra, evidencias.FechaEvidencia, usuarios.usuario,
		evidencias.Evidencia, evidencias.Aceptada, evidencias.Comentarios FROM evidencias
                        INNER JOIN usuarios ON evidencias.Id_Usuario = usuarios.Id
                        INNER JOIN obras ON evidencias.Id_Obra = obras.Id ORDER BY evidencias.Id DESC;

INSERT INTO Evidencias (Foto, Descripcion, Id_Trabajador)
VALUES ('133', 'poco comun', 1);
UPDATE Evidencias SET Foto='123', Descripcion='ya es noche', Id_Trabajador=5, Fecha='2023-02-02'WHERE Id=5;
DELETE FROM Evidencias WHERE Id=1;