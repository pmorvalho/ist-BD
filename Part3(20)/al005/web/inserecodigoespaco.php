<html>
    <body>
        <h3>Escolha o codigo e a fotografia do seu espaco</h3>
        <form action="insereespaco.php" method="post">
            <p><input type="hidden" name="morada" value="<?=$_REQUEST['morada']?>"/></p>
            <p>Codigo: <input type="text" name="codigo"/></p>
            <p>Fotografia: <input type="text" name="foto"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>
