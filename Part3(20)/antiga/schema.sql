/* Para apagar as tabelas, tirar isto de comentario e comentar o resto */
 drop table aluga;
 drop table paga;
 drop table estado;
 drop table reserva;
 drop table oferta;
 drop table posto;
 drop table espaco;
 drop table fiscaliza;
 drop table fiscal;
 drop table arrenda;
 drop table alugavel;
 drop table edificio;
 drop table user;


create table user
   (user_nif integer not null unique,
    user_nome varchar(255) not null,
    user_telefone integer not null,
    primary key(user_nif));

create table fiscal
   (fiscal_id integer not null unique,
    fiscal_empresa varchar(255)	not null,
    primary key(fiscal_id));

create table edificio
   (edificio_morada varchar(255) not null unique,
    primary key(edificio_morada));

create table alugavel
   (alugavel_morada varchar(255) not null,
    alugavel_codigo integer	not null,
    alugavel_foto varchar(255) not null,
    primary key(alugavel_morada, alugavel_codigo),
    foreign key(alugavel_morada) references edificio(edificio_morada) ON DELETE CASCADE);

create table arrenda
   (arrenda_morada varchar(255) not null,
    arrenda_codigo integer not null,
    arrenda_nif integer	not null,
    primary key(arrenda_morada, arrenda_codigo),
    foreign key(arrenda_morada, arrenda_codigo) references alugavel(alugavel_morada,alugavel_codigo),
    foreign key(arrenda_nif) references user(user_nif) ON DELETE CASCADE);

create table fiscaliza
   (fiscaliza_id integer not null,
    fiscaliza_morada varchar(255) not null,
    fiscaliza_codigo integer not null,
    primary key(fiscaliza_id, fiscaliza_morada, fiscaliza_codigo),
    foreign key(fiscaliza_id) references fiscal(fiscal_id),
    foreign key(fiscaliza_morada, fiscaliza_codigo) references arrenda(arrenda_morada, arrenda_codigo) ON DELETE CASCADE);

create table espaco
   (espaco_morada varchar(255) not null,
    espaco_codigo integer not null,
    primary key(espaco_morada, espaco_codigo),
    foreign key(espaco_morada, espaco_codigo) references alugavel(alugavel_morada,alugavel_codigo) ON DELETE CASCADE);

create table posto
   (posto_morada varchar(255) not null,
    posto_codigo integer not null,
    posto_codigo_espaco integer not null,
    primary key(posto_morada, posto_codigo),
    foreign key(posto_morada, posto_codigo) references alugavel(alugavel_morada,alugavel_codigo),
    foreign key(posto_morada, posto_codigo_espaco) references espaco(espaco_morada,espaco_codigo) ON DELETE CASCADE);

create table oferta
   (oferta_morada varchar(255)	not null,
    oferta_codigo integer not null,
    oferta_data_inicio date	not null,
    oferta_data_fim date not null,
    oferta_tarifa numeric(20,2)	not null,
    primary key(oferta_morada, oferta_codigo, oferta_data_inicio),
    foreign key(oferta_morada, oferta_codigo) references alugavel(alugavel_morada,alugavel_codigo) ON DELETE CASCADE);

create table reserva
   (reserva_numero integer not null unique,
    primary key(reserva_numero));

create table aluga
   (aluga_morada varchar(255) not null,
    aluga_codigo integer not null,
    aluga_data_inicio date not null,
    aluga_nif integer not null,
    aluga_numero integer not null,
    primary key(aluga_morada, aluga_codigo, aluga_data_inicio, aluga_nif, aluga_numero),
    foreign key(aluga_morada, aluga_codigo, aluga_data_inicio) references oferta(oferta_morada,oferta_codigo, oferta_data_inicio),
    foreign key(aluga_nif) references user(user_nif),
    foreign key(aluga_numero) references reserva(reserva_numero) ON DELETE CASCADE);

create table paga
   (paga_numero integer	not null,
    paga_data date not null,
    paga_metodo varchar(255) not null,
    primary key(paga_numero),
    foreign key(paga_numero) references reserva(reserva_numero) ON DELETE CASCADE);

create table estado
   (estado_numero integer not null,
    estado_timestamp timestamp not null,
    estado_estado varchar(255) not null,
    primary key(estado_numero, estado_timestamp),
    foreign key(estado_numero) references reserva(reserva_numero) ON DELETE CASCADE);
