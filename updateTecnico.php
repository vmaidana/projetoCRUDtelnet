<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Técnico</title>
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

        // atribuindo as variáveis para update da tabela
        $id = $_POST["id_tecnicos"];
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

        require_once "conexao.php";

        // fazendo update na tabela
        $sql = $conn->prepare("UPDATE tecnicos SET 
            nome='".$nome."', nascimento='".$dataNascimento."', rg='".$rg."', cpf ='".$cpf."', cep='".$cep."', rua='".$rua."', numero ='".$numero.
            "', complemento='".$complemento."', bairro='".$bairro."', estado ='".$estado."', cidade='".$cidade."', email='".$email."', login ='".$login.
            "', senha='".$senha."' WHERE id_tecnicos=".$id
        );
        $sql->execute();

        echo "<h1 align=center>Atualizado com sucesso!</h1><br>";
        // encerrar conexão
        $conn = NULL;

    ?>
    </div>
    <!--fim div php-->
    
</body>
</html>
