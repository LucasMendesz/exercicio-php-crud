<?php
if(isset($_POST['enviar']) ) {
	 require_once "../src/funcoes-alunos.php";

	 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	 $primeira = filter_input(INPUT_POST, 'primeira', FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
	 $segunda = filter_input(INPUT_POST, 'segunda', FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);

	 $media = ($primeira + $segunda) /2;

	 if ($primeira >= 7) {
        $situacao = "Aprovado"; 
	 } else  {
		 $situacao = "Reprovado";
	 };
	   

	 inserirAlunos($conexao, $nome, $primeira, $segunda, $media, $situacao);

	 header("location:visualizar.php");
};

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">

<style>
	body{
		background-color: #f3f3f3;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
	margin: 10px;
	}
	.container h1{
		text-align: center;
	}
</style>

</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <h2>Utilize o formulário abaixo para cadastrar um novo aluno.</h2>
	<form action="#" method="post">

    <p> <label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome" required></p>
        
    <p> <label for="primeira">Primeira nota:</label>
	    <input type="number" name="primeira" id="primeira" step="0.1" min="0.0" max="10" required></p>
	    
	<p> <label for="segunda">Segunda nota:</label>
	    <input type="number" name="segunda" id="segunda" step="0.1" min="0.0" max="10" required></p>
	    
      <button name="enviar">Cadastrar aluno</button>
	</form>
    <hr>

    <p><a href="../index.php">Voltar ao início</a></p>
	<p><a href="../index.php">Home</a></p>
</div>
</body>
</html>