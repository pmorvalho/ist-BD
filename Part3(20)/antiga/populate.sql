-- nif, nome, tel
insert into user values (123456789, 'Joao', 910000000);
insert into user values (234567891, 'Pedro', 910000001);
insert into user values (345678912, 'Miguel', 910000002);
insert into user values (456789123, 'Antonio', 910000003);
insert into user values (567891234, 'Rogerio', 910000004);
insert into user values (678912345, 'Alberto', 910000005);

-- id, empresa
insert into fiscal values (001, 'Oracle');
insert into fiscal values (002, 'Facebook');
insert into fiscal values (003, 'Oracle');
insert into fiscal values (004, 'Google');

-- morada
insert into edificio values ('Av Joao XXI');
insert into edificio values ('Av Roma');
insert into edificio values ('Av Igreja');
insert into edificio values ('Av Brasil');

-- morada, codigo, foto
insert into alugavel values ('Av Joao XXI', 00001, 'foto1');
insert into alugavel values ('Av Joao XXI', 00002, 'foto2');
insert into alugavel values ('Av Joao XXI', 00003, 'foto3');
insert into alugavel values ('Av Joao XXI', 00004, 'foto4');
insert into alugavel values ('Av Roma', 00005, 'foto5');
insert into alugavel values ('Av Roma', 00006, 'foto6');
insert into alugavel values ('Av Roma', 00007, 'foto7');
insert into alugavel values ('Av Igreja', 00008, 'foto8');
insert into alugavel values ('Av Brasil', 00009, 'foto9');

-- morada, codigo, nif
insert into arrenda values ('Av Joao XXI', 00001, 567891234);
insert into arrenda values ('Av Joao XXI', 00002, 567891234);
insert into arrenda values ('Av Joao XXI', 00003, 567891234);
insert into arrenda values ('Av Joao XXI', 00004, 567891234);
insert into arrenda values ('Av Roma', 00005, 678912345);
insert into arrenda values ('Av Roma', 00006, 678912345);
insert into arrenda values ('Av Roma', 00007, 678912345);
insert into arrenda values ('Av Igreja', 00008, 567891234);
insert into arrenda values ('Av Brasil', 00009, 678912345);

-- id(fiscal), morada, codigo
insert into fiscaliza values (001,'Av Joao XXI', 00001);
insert into fiscaliza values (001,'Av Joao XXI', 00002);
insert into fiscaliza values (001,'Av Joao XXI', 00003);
insert into fiscaliza values (001,'Av Joao XXI', 00004);
insert into fiscaliza values (002,'Av Roma', 00005);
insert into fiscaliza values (002,'Av Roma', 00006);
insert into fiscaliza values (004,'Av Roma', 00007);
insert into fiscaliza values (001,'Av Igreja', 00008);
insert into fiscaliza values (003,'Av Brasil', 00009);

-- morada, codigo
insert into espaco values ('Av Joao XXI', 00001);
insert into espaco values ('Av Joao XXI', 00004);
insert into espaco values ('Av Roma', 00005);
insert into espaco values ('Av Igreja', 00008);
insert into espaco values ('Av Brasil', 00009);

-- morada, codigo, espaco_codigo
insert into posto values ('Av Joao XXI', 00002, 00001);
insert into posto values ('Av Joao XXI', 00003, 00001);
insert into posto values ('Av Roma', 00006, 00005);
insert into posto values ('Av Roma', 00007, 00005);

-- morada, codigo, data_inicio, data_fim, tarifa
insert into oferta values ('Av Joao XXI', 00001, '2016-01-01', '2016-01-30', 15.00);
insert into oferta values ('Av Joao XXI', 00002, '2016-01-02', '2016-01-30', 5.00);
insert into oferta values ('Av Joao XXI', 00003, '2016-01-03', '2016-01-30', 7.00);
insert into oferta values ('Av Joao XXI', 00004, '2016-01-04', '2016-01-30', 10.00);
insert into oferta values ('Av Roma', 00005, '2016-01-05', '2016-01-30', 10.50);
insert into oferta values ('Av Roma', 00006, '2016-01-06', '2016-01-30', 3.50);
insert into oferta values ('Av Roma', 00007, '2016-01-07', '2016-01-30', 7.50);
insert into oferta values ('Av Igreja', 00008, '2016-01-08', '2016-01-30', 15.00);
insert into oferta values ('Av Brasil', 00009, '2016-01-09', '2016-01-30', 2.50);
insert into oferta values ('Av Joao XXI', 00001, '2016-02-01', '2016-02-27', 15.00);

-- numero
insert into reserva values (10001);
insert into reserva values (10002);
insert into reserva values (10003);
insert into reserva values (10004);
insert into reserva values (10005);
insert into reserva values (10006);

-- morada, codigo, data_inicio, nif, numero_reserva
insert into aluga values ('Av Joao XXI', 00001, '2016-01-01', 123456789, 10001);
insert into aluga values ('Av Joao XXI', 00002, '2016-01-02', 234567891, 10002);
insert into aluga values ('Av Joao XXI', 00003, '2016-01-03', 345678912, 10003);
insert into aluga values ('Av Roma', 00005, '2016-01-05', 456789123, 10004);
insert into aluga values ('Av Roma', 00006, '2016-01-06', 456789123, 10005);
insert into aluga values ('Av Igreja', 00008, '2016-01-08', 123456789, 10006);

-- numero_reserva, data, metodo
insert into paga values (10002, '2016-1-5', 'dinheiro');
insert into paga values (10005, '2016-1-6', 'dinheiro');

-- numero_reserva, data, estado
insert into estado values (10001, '2015-12-30', 'pendente');
insert into estado values (10001, '2016-01-01', 'aceite');

insert into estado values (10002, '2015-12-30', 'pendente');
insert into estado values (10002, '2016-01-01', 'aceite');
insert into estado values (10002, '2016-01-02', 'paga');

insert into estado values (10003, '2016-01-02', 'pendente');
insert into estado values (10003, '2016-01-03', 'aceite');

insert into estado values (10004, '2016-01-04', 'pendente');
insert into estado values (10004, '2016-01-05', 'aceite');

insert into estado values (10005, '2016-01-04', 'pendente');
insert into estado values (10005, '2016-01-05', 'aceite');
insert into estado values (10005, '2016-01-06', 'paga');

insert into estado values (10006, '2016-01-07', 'pendente');
insert into estado values (10006, '2016-01-08', 'aceite');