--MODIFICACION TABLA ENTIDAD RECEPTORA
--Eliminacion FK contacto
alter table entidad_receptora drop foreign key contacto_fk;

--Borrado de columna contacto en entidad receptora
alter table entidad_receptora drop column contacto_id;

--MODIFICACION TABLA DONANTE

--Eliminacion FK contacto
alter table donante drop foreign key contacto_donante_fk;
--Borrado de columna contacto en donante
alter table donante drop column contacto_id;

--AGREGADO DE COLUMNAS A TABLA DONANTE
alter table donante add column (apellido_contacto varchar(50));
alter table donante add column (nombre_contacto varchar(50));
alter table donante add column (telefono_contacto varchar(30));
alter table donante add column (mail_contacto varchar(50));
alter table donante add column (domicilio_contacto varchar(200));


--BORRADO TABLA CONTACTO
drop table contacto;


--MODIFICACION DE TABLAS PARA AUTOCREMENTAR LOS PK

alter table donante modify id integer auto_increment;
alter table estado_entidad modify id integer auto_increment;
alter table necesidad_entidad modify id integer auto_increment;
alter table servicio_prestado modify id integer auto_increment;
alter table entidad_receptora modify id integer auto_increment;
alter table detalle_alimento modify id integer auto_increment;









