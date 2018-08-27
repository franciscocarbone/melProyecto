--Creacion de tablas
create table estado_entidad (id int primary key, descripcion varchar(20));

create table necesidad_entidad(id integer primary key,descripcion varchar(15));

create table servicio_prestado(id integer primary key,descripcion varchar(100));

create table alimento(codigo varchar(10) primary key, descripcion varchar(100));

create table contacto( id integer primary key, apellido varchar(50),nombre varchar(50),
telefono varchar(30),mail varchar(30));

create table donante (id integer primary key,razon_social varchar(100),contacto_id integer);

create table alimento_donante(detalle_alimento_id integer,donante_id integer,
cantidad integer, primary key(detalle_alimento_id,donante_id));

create table entidad_receptora(id integer primary key,razon_social varchar(100),telefono varchar(30), domicilio varchar(200), estado_entidad_id integer,necesidad_entidad_id integer,contacto_id integer,servicio_prestado_id integer);

create table detalle_alimento(id integer primary key, alimento_codigo varchar(10),fecha_vencimiento date,contenido varchar(200), peso_paquete real(6,2),stock integer,reservado integer);

--Creacion de FK's

alter table entidad_receptora add constraint estado_entidad_fk foreign key(estado_entidad_id) references estado_entidad(id);

alter table entidad_receptora add constraint necesidad_entidad_fk foreign key(necesidad_entidad_id) references necesidad_entidad(id);

alter table entidad_receptora add constraint contacto_fk foreign key(contacto_id) references contacto(id);

alter table entidad_receptora add constraint servicio_prestado_fk foreign key(servicio_prestado_id) references servicio_prestado(id);

alter table detalle_alimento add constraint alimento_codigo_fk foreign key(alimento_codigo) references alimento(codigo);

alter table donante add constraint contacto_donante_fk foreign key(contacto_id) references contacto(id);

alter table alimento_donante add constraint detalle_alimento_fk foreign key(detalle_alimento_id) references detalle_alimento(id);

alter table alimento_donante add constraint donante_fk foreign key(donante_id) references donante(id);


--Creacion de indices

create index estado_entidad_idx on entidad_receptora(estado_entidad_id);

create index necesidad_entidad_idx on entidad_receptora(necesidad_entidad_id);

create index contacto_idx on entidad_receptora(contacto_id);

create index servicio_prestado_idx on entidad_receptora(servicio_prestado_id);

create index alimento_codigo_idx on detalle_alimento(alimento_codigo);

create index donante_contacto_idx on donante(contacto_id);

create index detalle_alimento_idx on alimento_donante(detalle_alimento_id);

create index donante_idx on alimento_donante(donante_id);














