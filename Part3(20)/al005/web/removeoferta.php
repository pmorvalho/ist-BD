<html>
    <body>
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

        $db->query("start transaction;");
        $sql = "DELETE FROM oferta WHERE morada=? AND codigo=? AND data_inicio=?;";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo, $data_inicio));
        $db->query("commit;");

        $db = null;
        echo("<p>Oferta removida com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");

        echo("<p>Esta oferta nao pode ser removida.</p><p>Nao podem ser removidas ofertas com reservas.</p>");

    }
    echo("<td><a href=\"ofertas.php\">Voltar para a lista de Ofertas</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
