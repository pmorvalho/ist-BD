<html>
    <body>
        <h3>Criar uma Oferta</h3>
        <form action="updatereserva.php" method="post">
            <p><input type="hidden" name="numero" value="<?=$_REQUEST['numero']?>"/></p>
            <p>Metodo de Pagamento: <input type="text" name="metodo"/></p>
            <p>Data de Pagamento: <input type="text" name="data"/></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>
