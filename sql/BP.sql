create table ISOP_ModoContratacion (
id_modo int identity primary key,
descripcion varchar(250) not null,
activo bit default 1);

create table ISOP_LugarEjecucion (
id_lugar int identity primary key,
descripcion varchar(250) not null,
activo bit default 1);

SET IDENTITY_INSERT [dbo].ISOP_ModoContratacion ON 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (0,'Concurso Abierto'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (1,'Concurso Abierto Anunciado Internacionalmente'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (2,'Concurso Cerrado'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (3,'Consulta de Precios'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (4,'Contratacion Directa con Acto Motivado - Numeral 1'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (5,'Contratacion Directa con Acto Motivado - Numeral 2'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (6,'Contratacion Directa con Acto Motivado - Numeral 3'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (7,'Contratacion Directa con Acto Motivado - Numeral 4'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (8,'Contratacion Directa con Acto Motivado - Numeral 5'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (9,'Contratacion Directa con Acto Motivado - Numeral 6'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (10,'Contratacion Directa con Acto Motivado - Numeral 7'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (11,'Contratacion Directa con Acto Motivado - Numeral 8'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (12,'Contratacion Directa con Acto Motivado - Numeral 9'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (13,'Contratacion Directa con Acto Motivado - Numeral 10'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (14,'Contratacion Directa con Acto Motivado - Numeral 11'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (15,'Contratacion Directa con Acto Motivado - Numeral 12'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (16,'Contratacion Directa sin Acto Motivado - Numeral 1'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (17,'Contratacion Directa sin Acto Motivado - Numeral 2'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (18,'Contratacion Directa sin Acto Motivado - Numeral 3'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (19,'Emergencia Comprobada - Art. 78'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (20,'Exclusión de las Modalidades de Selección - Numeral 1'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (21,'Exclusión de las Modalidades de Selección - Numeral 2'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (22,'Exclusión de las Modalidades de Selección - Numeral 3'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (23,'Exclusión de las Modalidades de Selección - Numeral 4'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (24,'Exclusión de las Modalidades de Selección - Numeral 5'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (25,'Exclusión de las Modalidades de Selección - Numeral 6'); 
 INSERT INTO ISOP_ModoContratacion(id_modo,descripcion) VALUES (26,'Exclusión de las Modalidades de Selección - Numeral 7'); 
SET IDENTITY_INSERT [dbo].ISOP_ModoContratacion OFF

SET IDENTITY_INSERT [dbo].ISOP_LugarEjecucion ON 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (2,'Amazonas'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (3,'Anzoátegui'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (4,'Apure'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (5,'Aragua'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (6,'Barinas'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (7,'Bolívar'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (8,'Carabobo'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (9,'Cojedes'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (10,'Delta Amacuro'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (1,'Distrito Capital'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (25,'Extranjero'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (11,'Falcón'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (12,'Guárico'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (13,'Lara'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (14,'Mérida'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (15,'Miranda'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (16,'Monagas'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (17,'Nueva Esparta'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (18,'Portuguesa'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (19,'Sucre'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (20,'Táchira'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (21,'Trujillo'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (24,'Vargas'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (22,'Yaracuy'); 
 INSERT INTO ISOP_LugarEjecucion(id_lugar,descripcion) VALUES (23,'Zulia'); 
SET IDENTITY_INSERT [dbo].ISOP_LugarEjecucion OFF
