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
            echo "<h1 align=center>Técnico cadastrado com sucesso</h1>";
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

