<html>
    <body>
    <h3>Escolher Utilizador</h3>
<?php
    $morada = $_REQUEST['morada'];
    $codigo = $_REQUEST['codigo'];
    $data_inicio = $_REQUEST['data_inicio'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM user;";
        $result = $db->query($sql);

        echo("<table border=\"0\" cellspacing=\"10\">\n");
        echo("<tr><td><b>NIF</b></td><td><b>Nome</b></td><td><b>Telefone</b></td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['nif']}</td>\n");
            echo("<td>{$row['nome']}</td>\n");
            echo("<td>{$row['telefone']}</td>\n");
            echo("<td><a href=\"inserenumeroreserva.php?nif={$row['nif']}&morada=$morada&codigo=$codigo&data_inicio=$data_inicio\">Escolher Utilizador</a></td>\n");
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
