<html>
    <body>
    <h3>Pagar Reserva</h3>
<?php
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM aluga NATURAL JOIN
        (SELECT numero FROM estado e WHERE e.numero NOT IN (SELECT numero FROM estado WHERE estado = 'Paga')) aceites;";
        $result = $db->query($sql);

        echo("<table border=\"0\" cellspacing=\"10\">\n");
        echo("<tr><td><b>Morada</b></td><td><b>Codigo</b></td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td>{$row['codigo']}</td>\n");
            echo("<td>{$row['data_inicio']}</td>\n");
            echo("<td>{$row['nif']}</td>\n");
            echo("<td>{$row['numero']}</td>\n");
            echo("<td><a href=\"inseredadospaga.php?numero={$row['numero']}&metodo='Paypal'\">Pagar</a></td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");

        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
