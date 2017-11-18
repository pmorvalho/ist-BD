<html>
    <body>
        <h3>Escolha o codigo e fotografia do seu posto</h3>
        <form action="insereposto.php" method="post">
            <p><input type="hidden" name="morada" value="<?=$_REQUEST['morada']?>"/></p>
            <p><input type="hidden" name="codigo_espaco" value="<?=$_REQUEST['codigo_espaco']?>"/></p>
            <p>Codigo: <input type="text" name="codigo"/></p>
            <p>Fotografia: <input type="text" name="foto"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>
