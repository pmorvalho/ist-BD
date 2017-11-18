<html>
    <body>
    <h3>Edificios</h3>
<?php
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM edificio;";
        $result = $db->query($sql);

        echo("<table border=\"0\" cellspacing=\"10\">\n");
        echo("<tr><td><a href=\"inseremorada.php\">Adicionar Edificio</a></td></tr>\n");
        echo("<tr><td><b>Morada</b></td></tr>\n");

        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td><a href=\"removeedificio.php?morada={$row['morada']}\">Remover Edificio</a></td>\n");
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
