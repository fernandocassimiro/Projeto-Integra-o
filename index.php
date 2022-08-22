<?php include("../../includes/login.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prospecção Integrada BB</title>
    <link rel="stylesheet" type="text/css" href="_css/estiloformulario.css"/>
	 <link href="/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../../chats/vendor/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
   
    
</head>
<body>
   


<header id="cabecalho">
    
    <hgroup>
    
    <img id = "icone" src="_img/projeto_integra.png"> 
    <nav id="titulo">
    <h1>Formulario das Visitas para Prospecção</h1>
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

        <fieldset> <legend style="border-bottom: 1px solid black;"> <i class="fa fa-edit"></i> Dados da Visita</legend>
           
            <div class="form-group mt-2">
            <p> Matricula:<br> <input type="text" name="tMat" id="cMat" size="10" maxlength="10" value="<?= $matricula; ?>" disabled placeholder="Inserir Mat." class="form-control" />  </p> 
            </div>
            <div class="form-group">
            <p>MCI do Cliente: <br> <input type="text" name="tMci" id="cMCI" size="10" maxlength="9" placeholder="Inserir MCI." class="form-control"  /> </p>
            </div>
            <div class="form-group">
            <p>Agencia Solicitante: <br> <input type="text" name="tAgeSte" id="cAgeSte" size="10" maxlength="4" placeholder="Prefixo." class="form-control"  /> </p>
            </div>
            <div class="form-group">
            <p>Data: <br> <input type="date" name="tDia" id="cDia" class="form-control"  /> </p>
            </div>
            <div class="form-group">
            <p>Hora: <br> <input type="time" name="tHora" id="chora" class="form-control"  /> </p>
            </div>
            <div class="form-group">
            <p>Cargo Solicitado: <br> 
            <select name="tCargo" id="CCargo" class="form-control" > 
                    <option>Gerente Geral</option>
                    <option>Gerente Relacinamento</option>
                </select> </p>
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
            <p> Informações Complementares: <br> <textarea name="tVisr" id="cVisr" cols="45" rows="3" class="form-control" > </textarea></p>
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
