<?php include("models/conexao.php") ?>
<?php include("views/blades/header.php"); ?>
<a href="views/cadastro.php">cadastrar</a>
<form action="index.php" method="post">
<hr>
<Input type="text" size="25" name="buscar"><input type="submit" value="Buscar">
<hr>
</form>
<?php
 if(empty($_POST["buscar"])){ 
    echo "sem resultados";
}
    else{ 
    $varBuscar =  $_POST["buscar"];
?>
<table border="1" width="500px">
    <tr>
        <td>Frase</td>
        <td>Editar</td>
        <td>Excluir</td>
    </tr>

    <?php
   
    $query = mysqli_query($conexao, "SELECT * FROM alunos where nome like '%$varBuscar%'");
    while ($exibe = mysqli_fetch_array($query)) {
        $vogal = ($exibe[3] == "m") ? "o" : "a"; //se $exibe 3a coluna for igual a M entao exiba O, senao exiba A
        ?>

        <tr>
            <td>
                <?php echo strtoupper($vogal) . " alun$vogal <b> " . $exibe[1] . "</b> mora na cidade de <b>" . $exibe[2] . " </b>" ?>
                <!-- exibir a primeira vogal (a ou o), depois mudar a ultima vogal do alunX e exibir o aluno na primeira coluna($exibe[1]) -->
            </td>
            <td><a href="views/cadastroAtualiza.php?id_aluno=<?php echo $exibe[0] ?>">Editar</a></td>
            <td><a href="controllers/deletar.php?id_aluno=<?php echo $exibe[0] ?>">Excluir</a></td>
        </tr>

    <?php } ?>
</table>
<?php } ?>


<?php include("views/blades/footer.php"); ?>