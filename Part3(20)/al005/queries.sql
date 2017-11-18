-- quais os espacos com postos que nunca foram alugados
-- ve os postos que foram alugados, 'imprime' so os espacos dos postos que nao tao nessa tabela
SELECT DISTINCT morada, codigo_espaco AS codigo
FROM posto
WHERE (codigo, morada) NOT IN (
  SELECT codigo, morada
  FROM aluga NATURAL JOIN (SELECT numero
  	                       FROM estado
  	                       WHERE estado = "Aceite") aceites
  );

-- quais edificios com numero de reservas superior a media

SELECT morada
FROM aluga
GROUP BY morada
HAVING COUNT(*) > (SELECT AVG(num_reservas) AS media_moradas
                   FROM (SELECT morada, COUNT(*) AS num_reservas
                         FROM aluga
                         GROUP BY morada) contagem_moradas);

-- quais utilizadores cujos alugaveis foram fiscalizados sempre pelo mesmo fiscal
SELECT nif
FROM arrenda NATURAL JOIN fiscaliza
GROUP BY nif
HAVING COUNT(DISTINCT id) = 1;


-- qual o montante total realizado (pago) por cada espaco durante o ano 2016 (postos tambem contam)
SELECT morada, codigo, SUM(montante_total) as total
FROM
  (SELECT morada, codigo, 0 as montante_total FROM espaco
  UNION
  (SELECT morada, codigo_espaco as codigo, SUM(montante) AS montante_total
  FROM (SELECT morada, codigo, tarifa*DATEDIFF(data_fim,data_inicio) AS montante
        FROM (SELECT numero
  	  		    FROM paga
  	  		    WHERE YEAR(data) = "2016") pagas_2016 NATURAL JOIN aluga NATURAL JOIN oferta
       ) oferta_montante NATURAL JOIN (SELECT morada, codigo, codigo_espaco
  			                               FROM posto UNION (SELECT morada, codigo, codigo AS codigo_espaco
  					   							                             FROM espaco)
                                      ) uniao_postos_espacos
GROUP BY morada, uniao_postos_espacos.codigo_espaco)) t
GROUP BY morada, codigo;


-- quais os espacos de trabalho cujos postos nele contidos foram todos alugados
SELECT DISTINCT morada, codigo_espaco AS codigo
FROM posto
WHERE (morada, codigo_espaco) NOT IN (
      SELECT DISTINCT morada, codigo_espaco
      FROM posto
      WHERE (codigo, morada) NOT IN (
            SELECT codigo, morada
            FROM aluga NATURAL JOIN (SELECT numero
        						                 FROM estado
        						                 WHERE estado = "Aceite") aceites
                                    ));
