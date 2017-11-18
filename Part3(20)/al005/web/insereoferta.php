<html>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    $codigo = $_REQUEST['codigo'];
    $data_inicio = $_REQUEST['data_inicio'];
    $data_fim = $_REQUEST['data_fim'];
    $tarifa = $_REQUEST['tarifa'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");
        $sql = "INSERT INTO oferta (morada, codigo, data_inicio, data_fim, tarifa) VALUES (?,?,?,?,?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo, $data_inicio, $data_fim, $tarifa));
        $db->query("commit;");

        $db = null;
        echo("<p>Oferta adicionada com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
    echo("<td><a href=\"ofertas.php\">Voltar para a lista de Ofertas</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
