<html>
    <body>
    <h3>Base de Dados - Projecto Parte 3 - AL005</h3>
    <h3>Inicio</h3>
<?php
    try
    {
        echo("<table border=\"0\" cellspacing=\"10\">\n");

        echo("<tr>\n");
        echo("<td><a href=\"edificios.php\">Adicionar ou Remover Edificios</a></td>\n");
        echo("</tr>\n");
        echo("<tr>\n");
        echo("<td><a href=\"espacos.php\">Adicionar ou Remover Espacos</a></td>\n");
        echo("</tr>\n");
        echo("<tr>\n");
        echo("<td><a href=\"postos.php\">Adicionar ou Remover Postos</a></td>\n");
        echo("</tr>\n");
        echo("<tr>\n");
        echo("<td><a href=\"ofertas.php\">Adicionar ou Remover Oferta</a></td>\n");
        echo("</tr>\n");
        echo("<tr>\n");
        echo("<td><a href=\"reservaoferta.php\">Criar Reserva</a></td>\n");
        echo("</tr>\n");
        echo("<tr>\n");
        echo("<td><a href=\"pagarreserva.php\">Pagar Reserva</a></td>\n");
        echo("</tr>\n");
        echo("<tr>\n");
        echo("<td><a href=\"escolheedificiototal.php\">Total realizado pelos Edificios</a></td>\n");
        echo("</tr>\n");

        echo("</table>\n");
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    </body>
</html>
