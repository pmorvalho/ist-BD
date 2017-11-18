<html>
    <body>
<?php
    $numero = $_REQUEST['numero'];
    $data = $_REQUEST['data'];
    $metodo = $_REQUEST['metodo'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181151";
        $password = "bd2016";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");
        $sql = "INSERT INTO paga (numero,data,metodo) VALUES (?,?,?);";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($numero, $data, $metodo));
        $db->query("commit;");

        $db->query("start transaction;");
        $sql = "INSERT INTO estado (numero,time_stamp,estado) VALUES (?,(SELECT NOW()),'Paga');";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($numero));
        $db->query("commit;");

        $db = null;
        echo("<p>Oferta paga com sucesso!</p>");
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
        echo("<p>Inseriu uma data de pagamento invalida!</p><p>Ja existe um estado desta reserva com um timestamp superior a data de pagamento requerida.</p>");
    }
    echo("<td><a href=\"pagarreserva.php\">Voltar para Pagamento de Reservas</a></td>\n");
    echo("<td><a href=\"inicio.php\">Voltar para o inicio</a></td>\n");
?>
    </body>
</html>
