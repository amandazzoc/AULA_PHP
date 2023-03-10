<?php include("../models/conexao.php") ?>
<?php include("blades/header.php") ?>

<?php
$varIdAluno = $_GET["id_aluno"];
$query = mysqli_query($conexao, "SELECT * FROM alunos WHERE codigo = $varIdAluno ");
while ($exibe = mysqli_fetch_array($query)) {
    ?>

    <form action="../controllers/atualizar.php" method="post">
        <input type="hidden" name="alunoCodigo" value="<?php echo $exibe[0] ?>"><br>
        <label>Nome</label>
        <input type="text" name="alunoNome" value="<?php echo $exibe[1] ?>"><br>
        <label>Cidade</label>
        <input type="text" name="alunoCidade" value="<?php echo $exibe[2] ?>"><br>
        <label>Sexo</label>

        M<input type="radio" name="alunoSexo" value="M" <?php echo ($exibe[3] == 'M') ? 'checked' : "" ?>>
        F<input type="radio" name="alunoSexo" value="F" <?php echo ($exibe[3] == 'F') ? 'checked' : "" ?>><br>

        <input type="submit" value="Atualizar">
    </form>
<?php } ?>
<?php include("blades/footer.php") ?>