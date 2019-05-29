<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Técnicos</title>
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
                
            </ol>
        </nav>
        <!--fim menu-->
    </header>

    <div style="padding: 60px">
        <!--div transição-->
    </div>

    <!--div php-->
    <div style="background-color: rgba(216, 229, 240, 0.3); border: 1px solid rgba(147, 184, 189, 0.8); padding: 10px">
        <h1 align="center">LISTA DE TÉCNICOS</h1>
        
        <!--inicio bloco php-->
        <?php

            require_once "conexao.php";

            $sqlRev = $conn->prepare('SELECT * FROM tecnicos');
            $sqlRev->execute();

            // cabeçalho tabela
            echo "<table border=2px align=center><tr><td>ID</td><td>Nome</td><td>Data de Nascimento</td><td>RG</td><td>CPF</td><td>Rua</td><td>Número</td><td>Bairro</td><td>Cidade</td><td>email</td><td colspan=2 align=center>opções</td>";
            // tabela dinâmica com while
            while ($registro = $sqlRev->fetch(PDO::FETCH_ASSOC)) { 
                echo "<tr><td>".$registro["id_tecnicos"]."</td>". 
                    "<td>".$registro["nome"]."</td>". 
                    "<td>".$registro["nascimento"]."</td>". 
                    "<td>".$registro["RG"]."</td>". 
                    "<td>".$registro["cpf"]."</td>".
                    "<td>".$registro["rua"]."</td>". 
                    "<td>".$registro["numero"]."</td>". 
                    "<td>".$registro["bairro"]."</td>". 
                    "<td>".$registro["cidade"]."</td>".  
                    "<td>".$registro["email"]."</td>". 
                    "<td><a href='editarTecnico.php?id=".$registro["id_tecnicos"]."'>editar</a></td>".
                    "<td><a href='excluirTecnico.php?id=".$registro["id_tecnicos"]."'>excluir</a></td>".
                    "</tr>";} // fim while
                echo "</table>";

            $conn = NULL;

        ?>
        <!--fim bloco php-->

    </div>
    <!--fim div php-->
    
</body>
</html>
