-- popular a tabela user_dimension com as informacoes da tabela user
INSERT INTO user_dimension SELECT * FROM user;

-- popular a tabela localizacao_dimension com as informacoes dos postos e espacos existentes nas tabelas posto e espaco
INSERT INTO localizacao_dimension
  SELECT concat(morada, codigo) AS localizacao_id , morada,
  codigo AS codigo_espaco, null AS codigo_posto FROM espaco
UNION
  SELECT concat(morada, codigo_espaco, codigo) AS localizacao_id, morada,
  codigo_espaco, codigo AS codigo_posto FROM posto;

-- Procedure que popula a tabela data_dimension que tem todas as datas de 2016 e 2017
DROP PROCEDURE IF EXISTS load_date_dimension;
DELIMITER //
CREATE PROCEDURE load_date_dimension()
  BEGIN
    SET @data_inicio = '2016-01-01';
    SET @data_fim = '2017-12-31';
    SET @data = @data_inicio;

    WHILE @data <= @data_fim DO
      IF quarter(@data) <= 2
        THEN SET @semestre = 1;
        ELSE SET @semestre = 2;
      END IF;
      INSERT INTO data_dimension VALUES(
        date_format(@data, "%Y%m%d"),
        year(@data),
        @semestre,
        month(@data),
        week(@data),
        dayofyear(@data),
        day(@data),
        dayname(@data)
      );
      SET @data = date_add(@data, INTERVAL 1 DAY);
    END WHILE;
  END //

CALL load_date_dimension()//

-- Procedure que popula a tabela tempo_dimension que tem todos os minutos e horas de um dia
DROP PROCEDURE IF EXISTS load_time_dimension;
CREATE PROCEDURE load_time_dimension()
  BEGIN
    SET @tempo_inicio = '00:00';
    SET @tempo_fim = '23:59:59';
    SET @tempo = @tempo_inicio;
    SET @minuto_dia = 0;
    WHILE @tempo <= @tempo_fim DO
      INSERT INTO tempo_dimension VALUES(
        time_format(@tempo, "%H%i"),
        hour(@tempo),
        @minuto_dia,
        minute(@tempo)
      );
      SET @tempo = addtime(@tempo, '00:01');
      SET @minuto_dia = hour(@tempo)*60 + minute(@tempo);
    END WHILE;
  END //

CALL load_time_dimension()//

DELIMITER ;

-- query que popula a tabela reserva_dimension
INSERT INTO reserva_dimension
	SELECT numero AS reserva_id, time_format(data, "%H%i") AS tempo_id, date_format(data,"%Y%m%d")
  AS data_id, nif, concat(morada,codigo) AS localizacao_id, DATEDIFF(data_fim,data_inicio)
  AS duracao, DATEDIFF(data_fim,data_inicio)*tarifa AS montante_pago
  FROM oferta NATURAL JOIN aluga NATURAL JOIN paga NATURAL JOIN espaco
  WHERE 2015 < YEAR(data) and YEAR(data) < 2018
UNION
  SELECT numero AS reserva_id, time_format(data, "%H%i") AS tempo_id, date_format(data,"%Y%m%d")
  AS data_id, nif, concat(morada,codigo_espaco, codigo) AS localizacao_id, DATEDIFF(data_fim,data_inicio)
  AS duracao, DATEDIFF(data_fim,data_inicio)*tarifa AS montante_pago
  FROM oferta NATURAL JOIN aluga NATURAL JOIN paga NATURAL JOIN posto
  WHERE 2015 < YEAR(data) and YEAR(data) < 2018;
