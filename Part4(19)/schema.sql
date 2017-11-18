drop table if exists reserva_dimension;
drop table if exists user_dimension;
drop table if exists localizacao_dimension;
drop table if exists tempo_dimension;
drop table if exists data_dimension;

create table user_dimension (
	nif varchar(9) not null unique,
    nome varchar(80) not null,
    telefone varchar(26) not null,
    primary key(nif)
);

create table localizacao_dimension (
	localizacao_id varchar(765) not null unique,
	morada varchar(255) not null,
	codigo_espaco varchar(255) not null,
	codigo_posto varchar(255),
	primary key(localizacao_id)
);

create table tempo_dimension (
	tempo_id int not null unique,
	hora_do_dia int not null,
	minuto_do_dia int not null,
	minuto_da_hora int not null,
	primary key(tempo_id)
);

create table data_dimension (
	data_id int not null unique,
	ano int not null,
	semestre int not null,
	mes_do_ano int not null,
	semana_do_ano int not null,
	dia_do_ano int not null,
	dia_do_mes int not null,
	dia_da_semana varchar(10) not null,
	primary key(data_id)
);

create table reserva_dimension (
	reserva_id varchar(255) not null unique,
	tempo_id int not null,
	data_id int not null,
	nif varchar(9) not null,
	localizacao_id varchar(765) not null,
	duracao int not null,
	montante_pago numeric(20,4) not null,
	primary key(tempo_id, data_id, nif, localizacao_id),
	foreign key(tempo_id) references tempo_dimension(tempo_id),
	foreign key(data_id) references data_dimension(data_id),
	foreign key(nif) references user_dimension(nif),
	foreign key(localizacao_id) references localizacao_dimension(localizacao_id)
);