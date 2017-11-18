<html>
    <body>
        <h3>Criar Reserva</h3>
        <form action="inserereserva.php" method="post">
            <p><input type="hidden" name="morada" value="<?=$_REQUEST['morada']?>"/></p>
            <p><input type="hidden" name="codigo" value="<?=$_REQUEST['codigo']?>"/></p>
            <p><input type="hidden" name="data_inicio" value="<?=$_REQUEST['data_inicio']?>"/></p>
            <p><input type="hidden" name="nif" value="<?=$_REQUEST['nif']?>"/></p>
            <p>Numero da Reserva: <input type="text" name="numero"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>
