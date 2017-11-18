<html>
    <body>
        <h3>Criar uma Oferta</h3>
        <form action="insereoferta.php" method="post">
            <p><input type="hidden" name="morada" value="<?=$_REQUEST['morada']?>"/></p>
            <p><input type="hidden" name="codigo" value="<?=$_REQUEST['codigo']?>"/></p>
            <p>Data inicio: <input type="text" name="data_inicio"/></p>
            <p>Data fim: <input type="text" name="data_fim"/></p>
            <p>Tarifa Diaria: <input type="text" name="tarifa"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>
