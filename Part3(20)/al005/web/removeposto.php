<html>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    $codigo = $_REQUEST['codigo'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");
        $sql = "DELETE FROM posto WHERE morada=? AND codigo=?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo));
        $db->query("commit;");

        $db->query("start transaction;");
        $sql = "DELETE FROM alugavel WHERE morada=? AND codigo=?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo));
        $db->query("commit;");

        $db = null;
        echo("<p>Posto removido com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");

        echo("<p>Este posto nao pode ser removido.</p><p>Nao podem ser removidos postos com ofertas.</p>");
    }
    echo("<td><a href=\"postos.php\">Voltar para a lista de Postos</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
