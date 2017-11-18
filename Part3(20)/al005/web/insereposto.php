<html>
    <body>
<?php
    $codigo_espaco = $_REQUEST['codigo_espaco'];
    $morada = $_REQUEST['morada'];
    $codigo = $_REQUEST['codigo'];
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
        $sql = "INSERT INTO posto (morada, codigo, codigo_espaco) VALUES (?, ?, ?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo, $codigo_espaco));
        $db->query("commit;");

        $db = null;
        echo("<p>Posto adicionado com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
    echo("<td><a href=\"postos.php\">Voltar para a lista de Postos</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
