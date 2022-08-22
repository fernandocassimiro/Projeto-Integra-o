<?php include("../../../includes/login.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prospecção Integrada BB</title>

    <link rel="stylesheet" type="text/css" href="_css/estiloformulario.css"/>
	 <link href="/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../chats/vendor/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
  
   
    
</head>
<body>
   


<header id="cabecalho">
    
    <hgroup>
    
    <img id = "icone" src="_img/projeto_integra.png"> 
    <nav id="titulo">
    <h1>Resultado das Visitas para Prospecção</h1>
    </nav>
    </hgroup>
    
    
</header>

<section>
<div class="container container-sm">
   <div class="row">
   <div class="col">
    <div class="card mt-2">
	<div class="card-body">
	<form method="post" id="fContato" action="processa.php">

        <fieldset> <legend style="border-bottom: 1px solid black;"> <i class="fa fa-edit"></i>Informar o Resultado da Visita:</legend>
           
            <div class="form-group mt-2">
            <p> Matricula:<br> <input type="text" name="tMat" id="cMat" size="10" maxlength="10" value="<?= $matricula; ?>" disabled placeholder="Inserir Mat." class="form-control" />  </p> 
            </div>
            <div class="form-group">
            <p>MCI da PJ: <br> <input type="text" name="tMci" id="cMCI" size="10" maxlength="9" placeholder="Inserir MCI da pessoa jurídica." class="form-control"  /> </p>
            </div>
            <div class="form-group">
            <p>Nome do Representante: <br> <input type="text" name="tNome" id="cNome" class="form-control"  /> </p>
            </div>
            <div class="form-group">
            <p>Cargo: <br> <input type="text" name="tCargo" id="cCargo" class="form-control"  /> </p>
            </div>
            <div class="form-group">
            <p>Quantidade de Contas Prospectadas: <br> <input type="text" name="tQuant" id="cQuant" size="10" maxlength="9" class="form-control"  /> </p>
            </div>
            <div class="form-group">
            <p>Outros produtos além da abertura de contas: <br> 
            <input type="text" name="tProduto" id="cProduto" class="form-control"  /> </p>
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
            <p> Informações Complementares: <br> <textarea name="tInf" id="cInf" cols="45" rows="3" class="form-control" > </textarea></p>
            </div>

            <p > <input  type="submit" class="btn btn-dark" value="REGISTRAR"> </p>

            

        </fieldset>



    </form>

    </section>

    <footer id="rodape">
    <p> Super PF II </br>
    <a href="" target="_blank"></a> 
    </footer>

</div></div></div></div>
</div>


  <script src="../../chats/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../../chats/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../../../js/datatables.min.js"></script>
</body>
</html>
