-- quais os espacos com postos que nunca foram alugados
-- ve os postos que foram alugados, 'imprime' so os espacos dos postos que nao tao nessa tabela
SELECT DISTINCT morada AS espaco_morada, codigo_espaco AS espaco_codigo
FROM posto p
WHERE (p.codigo, p.morada) NOT IN (
  SELECT codigo, morada
  FROM aluga NATURAL JOIN (SELECT numero AS numero
  						   FROM estado
  						   WHERE estado = "Aceite") aceites
  );

-- quais edificios com numero de reservas superior a media

SELECT morada AS edificio_morada
FROM aluga
GROUP BY morada
HAVING COUNT(*) > (SELECT AVG(num_reservas) AS media_moradas
                    FROM (SELECT morada, COUNT(*) AS num_reservas
                      FROM aluga
                      GROUP BY morada
                    )contagem_moradas);

-- quais utilizadores cujos alugaveis foram fiscalizados sempre pelo mesmo palhaco
SELECT nif
FROM arrenda  NATURAL JOIN (SELECT id, morada, codigo
							FROM fiscaliza) f
GROUP BY nif
HAVING COUNT(DISTINCT id) = 1;


-- qual o montante total realizado (pago) por cada espaco durante o ano 2016 (postos tambem contam)
SELECT morada, codigo_espaco, SUM(montante) AS montante_total
FROM (SELECT morada, codigo, tarifa*DATEDIFF(data_fim,data_inicio) AS montante
      FROM (SELECT morada, codigo, data_inicio
	          FROM (SELECT numero
	  		          FROM paga
	  		          WHERE YEAR(data) = "2016") pagas_2016 NATURAL JOIN aluga) p_a NATURAL JOIN oferta
     ) oferta_montante NATURAL JOIN
		 (SELECT morada, codigo, codigo_espaco
			FROM (SELECT morada, codigo, codigo_espaco
					  FROM posto) postos UNION (SELECT morada, codigo, codigo AS codigo_espaco
					   							            FROM espaco)
     ) uniao_postos_espacos
GROUP BY morada, uniao_postos_espacos.codigo_espaco;


-- quais os espacos de trabalho cujos postos nele contidos foram todos alugados
SELECT DISTINCT p1.morada AS espaco_morada, p1.codigo_espaco AS espaco_codigo
FROM posto p1
WHERE (p1.morada, p1.codigo_espaco) NOT IN (
      SELECT DISTINCT p2.morada, p2.codigo_espaco
      FROM posto p2
      WHERE (p2.codigo, p2.morada) NOT IN (
        SELECT codigo, morada
        FROM aluga NATURAL JOIN (SELECT numero
        						 FROM estado
        						 WHERE estado = "aceite") aceites
        ));
