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
        $sql = "INSERT INTO edificio (morada) VALUES (?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada));
        $db->query("commit;");

        $db = null;
        echo("<p>Edificio adicionado com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
    echo("<td><a href=\"edificios.php\">Voltar para a lista de Edificios</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
