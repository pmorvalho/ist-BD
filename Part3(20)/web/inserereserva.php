<html>
    <body>
<?php
    $morada = $_REQUEST['morada'];
    $codigo = $_REQUEST['codigo'];
    $data_inicio = $_REQUEST['data_inicio'];
    $nif = $_REQUEST['nif'];
    $numero = $_REQUEST['numero'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");
        $sql = "INSERT INTO reserva (numero) VALUES (?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($numero));
        $db->query("commit;");

        $db->query("start transaction;");
        $sql = "INSERT INTO aluga (morada, codigo, data_inicio, nif, numero) VALUES (?, ?, ?, ?, ?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($morada, $codigo, $data_inicio, $nif, $numero));
        $db->query("commit;");

        $db->query("start transaction;");
        $sql = "INSERT INTO estado (numero, time_stamp, estado) VALUES (?, (SELECT NOW()), 'Aceite');";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($numero));
        $db->query("commit;");

        $db = null;
        echo("<p>Reserva feita com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
    echo("<td><a href=\"reservaoferta.php\">Voltar para a lista de Ofertas</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
