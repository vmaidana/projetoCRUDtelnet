<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Técnico</title>
    <!--css menu-->
    <link rel="stylesheet" href="menu.css"> 
    <!--css formulário-->
    <link rel="stylesheet" href="formulario.css">
    <!--css header-->
    <link rel="stylesheet" href="header.css">
    <!--script busca cep-->
    <script type="text/javascript" src="buscaCep.js"></script>
</head>

<body>

    <header style="padding: 10px">
        <div style="float: left; background-color:darkred; color:snow; padding:5px">
        <h1>TELNET</h1>
        </div>
        <!--menu-->
        <nav id="menu">
            <ol> 
                <li><a href="index.php">Listar técnicos</a></li>
            </ol>
        </nav>
        <!--fim menu-->
    </header>

    <div style="padding: 60px">
        <!--div transição-->
    </div>

     <!--div do formulario php-->
    <div id="formulario">

        <!--inicio bloco php-->
        <?php

            require_once "conexao.php";
            //pegar o id
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                try {
                    //selecionar o registro na tabela
                    $sql = $conn->prepare('SELECT * FROM tecnicos WHERE id_tecnicos='.$id);
                    $sql->execute();
                
                if ($registro = $sql->fetch(PDO::FETCH_ASSOC)) {    
                //mostrar o formulario com os campos preenchidos

        ?>
        <!--fim bloco php-->

        <form action="updateTecnico.php" method="POST"> 
        <!--inicio formulario-->
            <h1>ATUALIZAR CADASTRO DE TÉCNICO</h1>
            <fieldset>                
                <legend>Dados Pessoais</legend> <!--seção de dados pessoais-->
                <!--início tabela dados pessoais-->
                <table cellspacing="10"> 
                <tr>
                    <input type="hidden" name="id_tecnicos" value="<?php echo $registro["id_tecnicos"]; ?>">
                    <td>
                    <label for="nome">Nome Completo: </label>
                    </td>
                    <td align="left">
                    <input type="text" name="nome" size="40" value="<?php echo $registro["nome"]; ?>"> <!--nome-->
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Nascimento: </label> 
                    </td>
                    <td align="left">
                    <input type="date" name="dataNascimento" value="<?php echo $registro["nascimento"]; ?>"> <!--data de nascimento-->
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="rg">RG: </label> 
                    </td>
                    <td align="left">
                    <input type="text" name="rg" size="12" maxlength="12" value="<?php echo $registro["RG"]; ?>"> <!--RG-->
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>CPF:</label> 
                    </td>
                    <td align="left">
                    <input type="text" name="cpf" size="12" maxlength="12" value="<?php echo $registro["cpf"]; ?>"> <!--CPF-->
                    </td>
                </tr>
                </table>
                <!--fim tabela dados pessoais-->
            </fieldset>
            <br />
            <fieldset>
                <legend>Dados de Endereço</legend> <!--seção de endereço-->
                <!--início tabel endereço-->   
                <table cellspacing="10">                 
                        <td>
                            <label for="cep" style="font-weight:bold" >Insira o CEP:</label> 
                        </td>
                        <td align="left">
                            <!--cep quando inserido busca o resto das informações-->
                            <input type="text" name="cep" id ="cep" size="10" maxlength="9" value="<?php echo $registro["cep"]; ?>" onblur="pesquisacep(this.value);"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="rua">Rua:</label> 
                        </td>
                        <td align="left">
                            <input type="text" name="rua" id="rua" size="30" value="<?php echo $registro["rua"]; ?>"> <!--rua-->
                        </td>
                        <td>
                            <label for="numero">Numero:</label> 
                        </td>
                        <td align="left">
                            <input type="text" name="numero" size="5" maxlength="5" value="<?php echo $registro["numero"]; ?>"> <!--número-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="complemento">Complemento:</label> 
                        </td>
                        <td align="left">
                            <input type="text" name="complemento" size="10" maxlength="10" value="<?php echo $registro["complemento"]; ?>"> <!--complemento-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="bairro">Bairro: </label> 
                        </td>
                        <td align="left">
                            <input type="text" name="bairro" id="bairro" size="30" value="<?php echo $registro["bairro"]; ?>"> <!--bairro-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="estado">Estado:</label> 
                        </td>
                        <td align="left">
                            <input type="text" name="estado" id="estado" size="2" value="<?php echo $registro["estado"]; ?>">  <!--estado-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cidade">Cidade: </label> 
                        </td>
                        <td align="left">
                            <input type="text" name="cidade" id="cidade" size="30" value="<?php echo $registro["cidade"]; ?>"> <!--cidade-->
                        </td>
                    </tr>
                </table>
                <!--fim tabela endereço-->
            </fieldset>
            <br/>
            <fieldset>
                <legend>Dados de login</legend> <!--seção de dados de login-->
                <!--início tabela login-->
                <table cellspacing="10">
                    <tr>
                        <td>
                            <label for="email">E-mail: </label> 
                        </td>
                        <td align="left">
                            <input type="text" name="email" size="31" maxlength="35" value="<?php echo $registro["email"]; ?>"> <!--email--> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="login">Login de usuário: </label> 
                        </td>
                        <td align="left">
                            <input type="text" name="login" value="<?php echo $registro["login"]; ?>"> <!--login-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="senha">Senha: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="senha" maxlength="12" size="10" value="<?php echo $registro["senha"]; ?>"> <!--senha-->
                        </td>
                    </tr>
                </table>
                <!--fim tabela login-->
            </fieldset>
            <br />
            <input type="submit" value="Atualizar"> <!--atualizar-->
            <input type="reset" value="Limpar"> <!--limpar-->
        </form>
        <!--fim formulario-->

        <!--inicio bloco php-->
        <?php
            }
            //ao clicar em atualizar, chamar a pagina de update

            }//fim do try

            catch(PDOException $e)
            {
                echo $sql . "<h2>Erro:" . $e->getMessage() . "</h2>";
            }
            $conn = null;
            } else {
            echo "<h2> Não foi possível selecionar o registro</h2>";
            }
        ?>
        <!--fim bloco php-->

    </div> 
    <!--fim div do formulario php-->
    
</body>
</html>