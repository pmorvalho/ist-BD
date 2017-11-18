  SELECT AVG(montante_pago) AS valor_medio_pago, dia_do_mes, mes_do_ano, codigo_espaco, codigo_posto
  FROM  reserva_dimension NATURAL JOIN data_dimension NATURAL JOIN localizacao_dimension
  GROUP BY codigo_espaco, codigo_posto, dia_do_mes, mes_do_ano WITH rollup
UNION
  SELECT AVG(montante_pago) AS valor_medio_pago, dia_do_mes, mes_do_ano, codigo_espaco, codigo_posto
  FROM  reserva_dimension NATURAL JOIN data_dimension natural join localizacao_dimension
  GROUP BY codigo_posto, dia_do_mes, mes_do_ano, codigo_espaco WITH rollup
UNION
  SELECT AVG(montante_pago) AS valor_medio_pago, dia_do_mes, mes_do_ano, codigo_espaco, codigo_posto
  FROM  reserva_dimension NATURAL JOIN data_dimension NATURAL JOIN localizacao_dimension
  GROUP BY dia_do_mes, mes_do_ano, codigo_espaco, codigo_posto WITH rollup
UNION
  SELECT AVG(montante_pago) AS valor_medio_pago, dia_do_mes, mes_do_ano, codigo_espaco, codigo_posto
  FROM  reserva_dimension NATURAL JOIN data_dimension NATURAL JOIN localizacao_dimension
  GROUP BY mes_do_ano, codigo_espaco, codigo_posto, dia_do_mes WITH rollup
UNION
  SELECT AVG(montante_pago) AS valor_medio_pago, dia_do_mes, mes_do_ano, codigo_espaco, codigo_posto
  FROM  reserva_dimension NATURAL JOIN data_dimension NATURAL JOIN localizacao_dimension
  GROUP BY codigo_espaco, dia_do_mes, codigo_posto, mes_do_ano WITH rollup
UNION
  SELECT AVG(montante_pago) AS valor_medio_pago, dia_do_mes, mes_do_ano, codigo_espaco, codigo_posto
  FROM  reserva_dimension NATURAL JOIN data_dimension NATURAL JOIN localizacao_dimension
  GROUP BY codigo_posto, mes_do_ano, codigo_espaco, dia_do_mes WITH rollup;
