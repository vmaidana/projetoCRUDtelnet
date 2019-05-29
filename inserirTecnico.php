<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inserir Técnico</title>
    <!--css menu-->
    <link rel="stylesheet" href="menu.css"> 
    <!--css header-->
    <link rel="stylesheet" href="header.css">
</head>
<body>
    <header style="padding: 10px">
        <div style="float: left; background-color:darkred; color:snow; padding:5px">
            <h1>TELNET</h1>
        </div>
        <!--menu-->
        <nav id="menu">
            <ol> 
                <li><a href="cadastroTecnico.html">cadastrar técnico</a></li>
                <li><a href="listaTecnicos.php">Listar técnicos</a></li>
            </ol>
        </nav>
        <!--fim menu-->
    </header>

    <div style="padding: 60px">
        <!--div transição-->
    </div>

    <!--div php-->
    <div style="background-color: rgba(216, 229, 240, 0.3); border: 1px solid rgba(147, 184, 189, 0.8); padding: 10px">
    <?php

        // atribuindo as variáveis para inserção na tabela
        $nome = $_POST["nome"];
        $dataNascimento = $_POST["dataNascimento"];
        $rg = $_POST["rg"];
        $cpf = $_POST["cpf"];
        $cep = $_POST["cep"];
        $rua = $_POST["rua"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $estado = $_POST["estado"];
        $cidade = $_POST["cidade"];
        $email = $_POST["email"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        // tentando o insert na tabela
        try {
            require_once "conexao.php";
            $sql = "INSERT INTO tecnicos (nome, nascimento, rg, cpf, cep, rua, numero, complemento, bairro, estado, cidade, email, login, senha)
                VALUES('$nome', '$dataNascimento', '$rg', '$cpf','$cep', '$rua', '$numero', '$complemento', '$bairro', '$estado', '$cidade', '$email', '$login', '$senha')";
            $conn->exec($sql);
            echo "<h1 align=center>Salvo com sucesso</h1>";
        } // fim do try
        catch(PDOException $e)
        {
            echo $sql . "<h2>Erro:" . $e->getMessage() . "</h2>";
        }
        // encerrar conexão
        $conn = NULL;

    ?>
</body>
</html>

