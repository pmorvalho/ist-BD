<html>
    <body>
    <h3>Total por cada espaco do Edificio</h3>
<?php
    $morada = $_REQUEST['morada'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;

        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT codigo, total FROM (
          SELECT morada, codigo, SUM(montante_total) as total
          FROM
            (SELECT morada, codigo, 0 as montante_total FROM espaco
            UNION
            (SELECT morada, codigo_espaco as codigo, SUM(montante) AS montante_total
            FROM (SELECT morada, codigo, tarifa*DATEDIFF(data_fim,data_inicio) AS montante
                  FROM (SELECT numero
            	  		    FROM paga
            	  		    WHERE YEAR(data) = '2016') pagas_2016 NATURAL JOIN aluga NATURAL JOIN oferta
                 ) oferta_montante NATURAL JOIN (SELECT morada, codigo, codigo_espaco
            			                               FROM posto UNION (SELECT morada, codigo, codigo AS codigo_espaco
            					   							                             FROM espaco)
                                                ) uniao_postos_espacos
          GROUP BY morada, uniao_postos_espacos.codigo_espaco)) t
          GROUP BY morada, codigo) espacos
        WHERE espacos.morada='$morada';";

        $result = $db->query($sql);

        echo("<table border=\"0\" cellspacing=\"10\">\n");
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['codigo']}</td>\n");
            echo("<td>{$row['total']}</td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");

        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
    echo("<td><a href=\"escolheedificiototal.php\">Voltar para Totais realizados pelos Edificios</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
