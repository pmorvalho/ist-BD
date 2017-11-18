<html>
    <body>
<?php
    $codigo = $_REQUEST['codigo'];
    $morada = $_REQUEST['morada'];
    $foto = $_REQUEST['foto'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");
        $sql = "INSERT INTO alugavel (morada, codigo, foto) VALUES (?,?,?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo, $foto));
        $db->query("commit;");

        $db->query("start transaction;");
        $sql = "INSERT INTO espaco (morada, codigo) VALUES (?,?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo));
        $db->query("commit;");

        $db = null;
        echo("<p>Espaco adicionado com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
    echo("<td><a href=\"espacos.php\">Voltar para a lista de Espacos</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
