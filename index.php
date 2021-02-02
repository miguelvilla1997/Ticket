<?php
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> Tickets</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
      
	<!-- LIBRERIAS BOOTSTRAP-->
 
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        
</head>
        
        
<body>
    
    <div class="container">
        <h2 style="text-align: center;">Sistema de Tickets.</h2>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Agregar</button>
            
           <div class="input-group-append">
               <input class="form-control " type="search" placeholder="Search" aria-label="Search">
               
           </div>
        </nav>
       
        <div class="table-responsive-lg"id="tabla">
            <table class="table table-primary" >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Recurrente</th>
                <th scope="col">Nro.Documento</th>
                <th scope="col">Tipo de Reclamo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <?php
                $sql= "SELECT * FROM tickets";
                $result= mysqli_query($conex, $sql);
                while ($row = mysqli_fetch_row($result)) {
            ?>
        <tbody>
            <tr>
                <th scope="row"><?php                    echo $row[0]?></th>
                <td><?php                    echo $row[1]?></td>
                <td><?php                    echo $row[2]?></td>
                <td><?php                    echo $row[3]?></td>
                <td><?php                    echo $row[4]?></td>
                <td><button
                        type="button"
                        class="btn btn-outline-success btn-rounded"
                        data-mdb-ripple-color="dark"
                        data-toggle="modal" data-target="#exampleModalEdit">
                        Editar
                    </button>
                    <button
                        type="button"
                        class="btn btn-outline-danger btn-rounded"
                        data-mdb-ripple-color="dark"
                        >
                        Eliminar
                    </button></td>
                
            </tr>
            <?php
                }
            ?>
        </tbody>
        </table>
        
    </div>
  
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="exampleInputDate">Fecha de Ticket</label>
                                <input type="date" class="form-control" id="exampleInputDate" placeholder="Fecha de ticket" required="true">
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputRecurrente">Recurrente(Nombre,Apellido.)</label>
                                <input type="text" class="form-control" id="exampleInputRecurrente" placeholder="Recurrente" pattern="^[A-Z][a-z]+([,][A-Z][a-z]+)[.]$"required="true">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputDocumento">Nro.Documento</label>
                                <input type="text" class="form-control" id="exampleInputDocumento" placeholder="Documento"required="true">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputTipoReclamo">Tipo Reclamo</label>
                                <input type="text" class="form-control" id="exampleInputTipoReclamo" placeholder="Tipo Reclamo"required="true">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputReclamo">Reclamo</label>
                                <textarea type="textarea" class="form-control" id="exampleInputReclamo" placeholder="Reclamo" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="guardarModal" class="btn btn-primary"data-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelEdit">Actualizar Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputDateEdit">Fecha de Ticket</label>
                                <input type="date" class="form-control" id="exampleInputDateEdit" placeholder="Fecha de ticket" required="true">
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputRecurrenteEdit">Recurrente(Nombre,Apellido.)</label>
                                <input type="text" class="form-control" id="exampleInputRecurrenteEdit" placeholder="Recurrente" pattern="^[A-Z][a-z]+([,][A-Z][a-z]+)[.]$"required="true">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputDocumentoEdit">Nro.Documento</label>
                                <input type="text" class="form-control" id="exampleInputDocumentoEdit" placeholder="Documento"required="true">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputTipoReclamoEdit">Tipo Reclamo</label>
                                <input type="text" class="form-control" id="exampleInputTipoReclamoEdit" placeholder="Tipo Reclamo"required="true">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputReclamoEdit">Reclamo</label>
                                <textarea type="textarea" class="form-control" id="exampleInputReclamoEdit" placeholder="Reclamo" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="editarModal" class="btn btn-primary"data-dismiss="modal">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
   
    <script type="text/javascript">
        function agregar(recurrente,fecha,tipoReclamo,nroDocumento,reclamo){
    data = "Recurrente="+ recurrente +
            "& Fecha=" + fecha + 
            "& Tipo_Reclamo=" + tipoReclamo +
            "& Nro_Documento=" + nroDocumento +
            "& Reclamo=" + reclamo;
    $.ajax({
        type:"POST",
        url:'insert.php',
        data:data,
        success: function (r) {
            if(r){
                $('#tabla').load(' #tabla');
                Swal.fire(
                    'Guardado!',
                    'El registro se ha guardado con exito!',
                    'success');
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ocurrió un error'
                });
            }
        },
        
    });
    
    
            
}
        $(document).ready(function(){
          $('#guardarModal').on('click',function(){
            var recurrente = document.getElementById('exampleInputRecurrente').value;
            var fecha =document.getElementById('exampleInputDate').value;
            var tipoReclamo =document.getElementById('exampleInputTipoReclamo').value;
            var nroDocumento =document.getElementById('exampleInputDocumento').value;
            var reclamo =document.getElementById('exampleInputReclamo').value;
           // if (recurrente != "" && fecha != ""&& tipoReclamo != ""&& nroDocumento != ""&& reclamo != "") {
                agregar(recurrente,fecha,tipoReclamo,nroDocumento,reclamo);      
            //}
            
        });  
        });
        
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('#editarModal').on('click',function(){
            recurrente =$('#exampleInputRecurrenteEdit').val();
            fecha =$('#exampleInputDateEdit').val();
            tipoReclamo =$('#exampleInputTipoReclamoEdit').val();
            nroDocumento =$('#exampleInputDocumentoEdit').val();
            reclamo =$('#exampleInputReclamoEdit').val();
            if (recurrente != "" && fecha != ""&& tipoReclamo != ""&& nroDocumento != ""&& reclamo != "") {
                agregar(recurrente,fecha,tipoReclamo,nroDocumento,reclamo); 
            }
        });
   
        });
      
    </script>
    
</body>
</html>


