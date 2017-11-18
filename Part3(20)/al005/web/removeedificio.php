<html>
    <body>
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

        $db->query("start transaction;");
        $sql = "DELETE FROM edificio WHERE morada=?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada));
        $db->query("commit;");

        $db = null;
        echo("<p>Edificio removido com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");

        echo("<p>Este edificio nao pode ser removido.</p><p>Nao podem ser removidos edificios com espacos ou postos.</p>");

    }
    echo("<td><a href=\"edificios.php\">Voltar para a lista de Edificios</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
