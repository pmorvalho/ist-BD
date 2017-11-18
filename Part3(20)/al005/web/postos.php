<html>
    <body>
    <h3>Postos</h3>
<?php
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM posto;";
        $result = $db->query($sql);

        echo("<table border=\"0\" cellspacing=\"10\">\n");
        echo("<tr><td><a href=\"escolheespaco.php\">Adicionar Posto</a></td></tr>\n");
        echo("<tr><td><b>Morada</b></td><td><b>Codigo</b></td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td>{$row['codigo']}</td>\n");
            echo("<td><a href=\"removeposto.php?morada={$row['morada']}&codigo={$row['codigo']}\">Remover Posto</a></td>\n");
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
