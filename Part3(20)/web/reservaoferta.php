<html>
    <body>
    <h3>Criar Reserva</h3>
<?php
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM oferta;";
        $result = $db->query($sql);

        echo("<table border=\"0\" cellspacing=\"10\">\n");
        echo("<tr><td><b>Morada</b></td><td><b>Codigo</b></td><td><b>Data inicio</b></td><td><b>Data Fim</b></td><td><b>Tarifa</b></td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td>{$row['codigo']}</td>\n");
            echo("<td>{$row['data_inicio']}</td>\n");
            echo("<td>{$row['data_fim']}</td>\n");
            echo("<td>{$row['tarifa']}</td>\n");
            echo("<td><a href=\"escolheutilizador.php?morada={$row['morada']}&codigo={$row['codigo']}&data_inicio={$row['data_inicio']}\">Criar Reserva</a></td>\n");
            echo("</tr>\n");
        }
        echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
        echo("</table>\n");

        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    </body>
</html>
