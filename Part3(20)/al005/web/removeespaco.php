<html>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    $codigo = $_REQUEST['codigo'];
    $morada_alugavel = $morada;
    $codigo_alugavel = $codigo;
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");
        $sql = "DELETE FROM espaco WHERE morada=? AND codigo=?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo));
        $db->query("commit;");

        $db->query("start transaction;");
        $sql = "DELETE FROM alugavel WHERE morada=? AND codigo=?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo));
        $db->query("commit;");

        $db = null;
        echo("<p>Espaco removido com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");

        echo("<p>Este espaco nao pode ser removido.</p><p>Nao podem ser removidos espacos com postos ou com ofertas.</p>");

    }
    echo("<td><a href=\"espacos.php\">Voltar para a lista de Espacos</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
