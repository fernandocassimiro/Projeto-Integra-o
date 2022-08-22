<?php include('connection.php');

$slq = "SELECT * FROM rel_visita";
$stmt = mysqli_query($con, $slq);
$dados = [];
$i = 0;
while($row = mysqli_fetch_assoc($stmt)){
    $dados[$i]['id'] = $row['id'];
    $dados[$i]['Matricula'] = $row['Matricula'];
    $dados[$i]['MCI'] = $row['MCI'];
    $dados[$i]['Pref_Reg'] = $row['Pref_Reg'];
    $dados[$i]['Dia'] = $row['Dia'];
    $dados[$i]['Hora'] = $row['Hora'];
    $dados[$i]['Cargo_Sol'] = $row['Cargo_Sol'];
    $dados[$i]['Inf_Compl'] = $row['Inf_Compl'];

    $i++;
}
require_once('exportaxls.php');
$export = new Export();

if(isset($_GET['export']) && $_GET['export'] == 'excel'){

    $export->excel('Base de Registros de Visitas', $_GET['fileName'], $dados);

}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="_css/estiloformulario.css"/>

    <!-- Bootstrap CSS     -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.css"/>

    
<!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/af-2.3.7/date-1.1.0/r-2.2.9/rg-1.1.3/sc-2.0.4/sp-1.3.0/datatables.min.css"/>
-->
</head>



    <title>Projeto Integracao</title>



  
  <body>

  <header id="cabecalho">
    
    <hgroup>
    
    <img id = "icone" src="_img/projeto_integra.png"> 
    <nav id="titulo">
    
    <h1>Base de Registros de Visitas</h1>
    
    </nav>
    </hgroup>
    
    
</header>
   
<section> 

  <div class="container-fluid">


<div class="row">
    <div class="container">
      <div class="row">
      <div class="col-md-20">
      
      </div>
    
      <div class="col-md-30">

      <div style="margin: 10px 140px 20px 750px;">

      <a><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addregistromodal" >Adicionar Registro</button></a>
      <a href="?export=excel&&fileName=relvisitas"> <button type="button" class="btn btn-secondary btn-sm btn btn-success" >Gerar Excel</button></a>
     
      </div>
 

        </div>

        

        </div>

               <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-20">
                        <table id="example" class="table">
                            <thead>
                            <th>id</th>
                            <th>Matricula</th>
                            <th>MCI</th>
                            <th>Pref_Sol</th>
                            <th>Dia</th>
                            <th>Hora</th>
                            <th>Cargo_Sol</th>
                            <th>Inf_Compl</th>
                            <th>Opções</th>
                            </thead>
                            <tbody>
                                
                            </tbody>


                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
 
 <script type="text/javascript"> 

$('#example').DataTable({

  "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'fetch_data.php',
          'type':'post',
        },
        'fnCreatedRow':function(nRow,aData,iDataIndex)
        {
         
          $(nRow).attr('id', aData[0]);

        },
          'columnDefs': [{
          'target':[0,5],
          'orderable' :false,
        }]
      });

   

      $(document).on('submit','#novoregistro',function(e){
      e.preventDefault();
    
      var Matricula = $('#inputmatricula').val();
       var MCI = $('#inputmci').val();
       var Pref_Reg = $('#inputprefixo').val();
       var Dia = $('#inputdata').val();
      var Hora = $('#inputhora').val();
      var Cargo_Sol =  $('#inputcargo').val();
      var Inf_Compl = $('#inputinf_compl').val();

     
      if(Matricula != '' && MCI != '' && Pref_Reg != '' && Dia != '' && Hora != '' && Cargo_Sol  != '' && Inf_Compl != '') 
      {
       $.ajax({
         url:"novo_reg.php",
         type:"post",
         data:{Matricula:Matricula,MCI:MCI,Pref_Reg:Pref_Reg,Dia:Dia,Hora:Hora,Cargo_Sol:Cargo_Sol,Inf_Compl:Inf_Compl},
         success:function(data)
         {
           var json = JSON.parse(data)
           var status = json.status;
           if(status=='true')
           {
            mytable =$('#example').DataTable();
            mytable.draw();
            $('#inputmatricula').val('');
            $('#inputmci').val('');
            $('#inputprefixo').val('');
            $('#inputdata').val('');
            $('#inputhora').val('');
            $('#inputcargo').val('');
            $('#inputinf_compl').val('');
            $('#addUserModal').modal('hide');
          }
          else
          {
            alert('Falha na gravação');
          }
        }
      });
     }
     else {
      alert('Todos os Campos devem ser preenchidos');
    }
  });

  $(document).on('click', '.editBtn', function(event){

    var id = $(this).data('id');
    var trid = $(this).closest('tr').attr('id');
    $.ajax({
      url:"editaregistro.php",
      data:{id:id},
      type:'post',
      success:function(data)
      {
       
        var json= JSON.parse(data);
        $('#id').val(json.id);
        $('#trid').val(trid);
        $('#_inputmatricula').val(json.Matricula);
        $('#_inputmci').val(json.MCI);
        $('#_inputprefixo').val(json.Pref_Reg);
        $('#_inputdata').val(json.Dia);
        $('#_inputhora').val(json.Hora);
        $('#_inputcargo').val(json.Cargo_Sol);
        $('#_inputinf_compl').val(json.Inf_Compl);
        $('#editaregistromodal').modal('show');

      }

    });



  });

$(document).on('submit', '#updatereg', function(){

  var id = $('#id').val();
  var trid = $('#trid').val();
  var Matricula = $('#_inputmatricula').val();
  var MCI = $('#_inputmci').val();
  var Pref_Reg = $('#_inputprefixo').val();
  var Dia = $('#_inputdata').val();
  var Hora = $('#_inputhora').val();
  var Cargo_Sol = $('#_inputcargo').val();
  var Inf_Compl = $('#_inputinf_compl').val();
  location.reload();

  $.ajax({

    url:"update_reg.php",
    data:{id:id,Matricula:Matricula,MCI:MCI,Pref_Reg:Pref_Reg,Dia:Dia,Hora:Hora,Cargo_Sol:Cargo_Sol,Inf_Compl:Inf_Compl},
    type:'post',
    success:function(data)
    {
      var json=JSON.parse(data);
      status =json.status;
      if(status=='true')
      
      {
       table = $('#example').DataTable();
       var button= '<a href="javascript:void();" class="btn btn-sm btn-info" data-id="' + id + '">Editar</a> <a href="javascript:void();" class="btn btn-sm btn-danger" data-id="' + id + '">Limpar</a>';
      var row = table.row("[id='" + trid +"']");
      row.row("[id='" + trid + "']").data([id,Matricula,MCI,Pref_Reg,Dia,Hora,Cargo_Sol,Inf_Compl,button]);
      $('#editaregistromodal').modal('hide');
      
      
      }
       else
       {
        alert('failed');

       }

    }

  });

});

$(document).on('click', '.btnDelete', function(event)

{
   var id = $(this).data('id');
   $.ajax({
     url: "delete_reg.php",
     data:{id:id},
     type:"post",
     success: function(data)
     {
       var json = JSON.parse(data);
       var status = json.status;
       if(status=='success')
       {
        alert ('Confirma a exclusão do Registro ?');
         $('#' + id).closest('tr').remove();
        
         }
       else 
       {
         alert ('failed');
       }

     }
    });

});



</script>




<div class="modal fade" id="addregistromodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"  >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Visita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <form id="novoregistro" action="" >
           
            <div class="form-group row">
              <label for="inputmatricula" class="col-sm-2 col-form-label">Matricula</label>
              <div class="col-sm-10">
                <input type="text" name="matricula" class="form-control" id="inputmatricula" value="">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputmci" class="col-sm-2 col-form-label">MCI</label>
              <div class="col-sm-10">
                <input type="text" name="mci" class="form-control" id="inputmci" value="">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputprefixo" class="col-sm-2 col-form-label">Prefixo</label>
              <div class="col-sm-10">
                <input type="text" name="Prefixo" class="form-control" id="inputprefixo" value="">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputData" class="col-sm-2 col-form-label">Data</label>
              <div class="col-sm-10">
                <input type="date" name="Data" class="form-control" id="inputdata" value="">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputhora" class="col-sm-2 col-form-label">Hora</label>
              <div class="col-sm-10">
                <input type="time" name="Hora" class="form-control" id="inputhora" value="">
              </div>
            </div>

             <div class="form-group row">
              <label for="inputcargo" class="col-sm-2 col-form-label">Cargo</label>
              <div class="col-sm-10">
                <select name="cargo" id="inputcargo"> 
                    <option>Gerente Geral</option>
                    <option>Gerente Relacinamento</option>
                </select>
               </div>
            </div>

            <div class="form-group row">
              <label for="inputinf_compl" class="col-sm-2 col-form-label">Inf. Compl.</label>
              <div class="col-sm-10">
              <textarea name="InfCompl" id="inputinf_compl" cols="38" rows="3"> </textarea>
              </div>
            </div>
            
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Gravar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>

          </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editaregistromodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"  >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <form id="updatereg" action="javascript:void()," method="post" >
           
            <div class="form-group row">
             <input type="hidden" id="id" name="id" value="">
             <input type="hidden" id="trid" name="trmci" value="">

              <label for="inputmatricula" class="col-sm-2 col-form-label">Matricula</label>
              <div class="col-sm-10">
                <input type="text" name="_inputmatricula" class="form-control" id="_inputmatricula" value="">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputmci" class="col-sm-2 col-form-label">MCI</label>
              <div class="col-sm-10">
                <input type="text" name="_inputmci" class="form-control" id="_inputmci" value="">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputprefixo" class="col-sm-2 col-form-label">Prefixo</label>
              <div class="col-sm-10">
                <input type="text" name="_inputprefixo" class="form-control" id="_inputprefixo" value="">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputData" class="col-sm-2 col-form-label">Data</label>
              <div class="col-sm-10">
                <input type="date" name="_inputdata" class="form-control" id="_inputdata" value="">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputhora" class="col-sm-2 col-form-label">Hora</label>
              <div class="col-sm-10">
                <input type="time" name="_inputhora" class="form-control" id="_inputhora" value="">
              </div>
            </div>

             <div class="form-group row">
              <label for="inputcargo" class="col-sm-2 col-form-label">Cargo</label>
              <div class="col-sm-10">
                <select name="_inputcargo" id="_inputcargo"> 
                    <option>Gerente Geral</option>
                    <option>Gerente Relacinamento</option>
                </select>
               </div>
            </div>

            <div class="form-group row">
              <label for="inputinf_compl" class="col-sm-2 col-form-label">Inf. Compl.</label>
              <div class="col-sm-10">
              <textarea name="_inputinf_compl" id="_inputinf_compl" cols="38" rows="3"> </textarea>
              </div>
            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary">Gravar</button>
            
            </div>
            
          </form>
  
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

</section>


</body>
</html>