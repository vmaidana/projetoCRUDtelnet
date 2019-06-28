<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir Técnico</title>
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

    // pegar o id
    if(isset($_GET ["id"])){
        $id = $_GET ["id"];  

        try {
            require_once "conexao.php";
            // excluir o registro na tabela
            $sql = $conn->prepare("DELETE FROM tecnicos WHERE id_tecnicos=".$id);
            $sql->execute();
            if($sql->rowCount()>0){
                ?>

                    <!--script com feedback e retorno para página de listagem-->
                    <script type="text/javascript">
                    alert ("Técnico excluído com sucesso");
                    document.location.href="index.php"
                    </script>

                <?php
            }
            else
                echo "<h1 align=center>Não foi possível excluir</h1>";
        
        }//fim do try
      
        catch(PDOException $e) {
            echo $sql . "<h2>Erro:" . $e->getMessage() . "</h2>";
        }
        // encerrar conexão
        $conn = null;
    }
    ?>
    </div>
    <!--fim div php-->

</body>
</html>