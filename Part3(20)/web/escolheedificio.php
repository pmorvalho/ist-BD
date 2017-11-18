<html>
    <body>
    <h3>Escolha qual o edifico onde quer o seu espaco</h3>
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
        echo("<tr><td><b>Morada</b></td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td><a href=\"inserecodigoespaco.php?morada={$row['morada']}\">Escolher Edificio</a></td>\n");
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
