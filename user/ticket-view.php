<?php if(isset($_SESSION['nombre']) && isset($_SESSION['tipo'])){
        

        if(isset($_POST['fecha_ticket']) && isset($_POST['name_ticket']) && isset($_POST['email_ticket'])){

          /*Este codigo nos servira para generar un numero diferente para cada tarea*/
          $codigo = ""; 
          $longitud = 2; 
          for ($i=1; $i<=$longitud; $i++){ 
            $numero = rand(0,9); 
            $codigo .= $numero; 
          } 
          $num=Mysql::consulta("SELECT id FROM ticket");
          $numero_filas = mysqli_num_rows($num);

          $numero_filas_total=$numero_filas+1;
          $id_ticket="TK".$codigo."N".$numero_filas_total;
          /*Fin codigo numero de tarea*/


          $fecha_ticket= MysqlQuery::RequestPost('fecha_ticket');
          $nombre_ticket= MysqlQuery::RequestPost('name_ticket');
          $email_ticket=MysqlQuery::RequestPost('email_ticket');
          $avance_ticket=MysqlQuery::RequestPost('avance_ticket');
          $asunto_ticket=MysqlQuery::RequestPost('asunto_ticket');        
          $mensaje_ticket=MysqlQuery::RequestPost('mensaje_ticket');
          $estado_ticket="Pendiente";
          if(MysqlQuery::Guardar("ticket","fecha,nombre_usuario,email_cliente,avance,asunto,mensaje,estado_ticket,serie,solucion", "'$fecha_ticket','$nombre_ticket','$email_ticket','$avance_ticket','$asunto_ticket','$mensaje_ticket', '$estado_ticket','$id_ticket',''")){

            
            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">TAREA CREADA</h4>
                    <p class="text-center">
                        Tarea creado con exito '.$_SESSION['nombre'].'<br>Tarea ID es: <strong>'.$id_ticket.'</strong>
                    </p>
                </div>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido crear la tarea. Por favor intente nuevamente.
                    </p>
                </div>
            ';
          }
        }
?>
        <div class="container">
          <div class="row well">
            <div class="col-sm-3">
              <img src="img/ticket.png" class="img-responsive" alt="Image">
            </div>
            <div class="col-sm-9 lead">
              <h2 class="text-info">¿Cómo abrir una nueva Tarea?</h2>
              <p>Para abrir una nueva tarea deberá de llenar todos los campos de el siguiente formulario. Usted podra verificar el estado de su tarea mediante la <strong>Tarea ID</strong> que se le proporcionara a usted cuando llene y nos envie el siguiente formulario.</p>
            </div>
          </div><!--fin row 1-->

          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title text-center"><strong><i class="fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;Tarea</strong></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-4 text-center">
                      <br><br><br>
                      <p class="text-primary text-justify">Por favor llene todos los datos de este formulario</p>
                    </div>
                    <div class="col-sm-8">
                      <form class="form-horizontal" role="form" action="" method="POST">
                          <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="fechainput" placeholder="Fecha" name="fecha_ticket" required="" readonly>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Nombre de Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Nombre" required="" pattern="[a-zA-Z ]{1,30}" name="name_ticket" title="Nombre Apellido" value="<?php echo $_SESSION['nombre_completo']; ?>" >
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email_ticket" required="" title="Ejemplo@dominio.com" value="<?php echo $_SESSION['email']; ?>" >
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Porcentaje de Avance</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <select class="form-control" name="avance_ticket">
                                  <option value="0">0</option>
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="30">30</option>
                                  <option value="40">40</option>
                                  <option value="50">50</option>
                                  <option value="60">60</option>
                                  <option value="70">70</option>
                                  <option value="80">80</option>
                                  <option value="90">90</option>
                                  <option value="100">100</option>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Título</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Título" name="asunto_ticket" required="">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Descripción</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Describa brevemente que realizara en su tarea" name="mensaje_ticket" required=""></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Abrir tarea</button>
                          </div>
                        </div>
                             </fieldset> 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php
}else{
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="./img/Stop.png" alt="Image" class="img-responsive"/><br>
                <img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
                
            </div>
            <div class="col-sm-7 text-center">
                <h1 class="text-danger">Lo sentimos esta página es solamente para usuarios registrados</h1>
                <h3 class="text-info">Inicia sesión para poder acceder</h3>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
    </div>
<?php
}
?>
<script type="text/javascript">
  $(document).ready(function(){
      $("#fechainput").datepicker();
  });
</script>