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
    ?>
    
    <!--script com feedback e retorno para página de listagem-->
    <script type="text/javascript">
        alert ("Cadastro atualizado com sucesso");
        document.location.href="index.php"
    </script>

<?php
    // encerrar conexão
    $conn = NULL;

?>
</div>
<!--fim div php-->

</body>
</html>
