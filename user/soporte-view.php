<div class="container">
  <div class="row well">
    <div class="col-sm-3">
      <img src="img/tux_repair.png" class="img-responsive" alt="Image">
    </div>
    <div class="col-sm-9 lead">
      <h2 class="text-info">Bienvenido al centro de Tareas</h2>
      <p>Es muy facil de usar, si usted tiene una tarea que hacer puede crearla en esta página o por su defecto puede consultar su tarea mediante su <strong>Tarea ID</strong>.</p>
    </div>
  </div><!--fin row 1-->

  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading text-center"><i class="fa fa-file-text"></i>&nbsp;<strong>Nueva Tarea</strong></div>
        <div class="panel-body text-center">
          <img src="./img/new_ticket.png" alt="">
          <h4>Abrir un nueva tarea</h4>
          <p class="text-justify">Crea una nueva tarea, Si desea actualizar una tarea ya realizada utiliza el formulario de la derecha <em>Comprobar estado de Tarea</em>, solamente los <strong>usuarios registrados</strong> pueden abrir una nueva Tarea.</p>
          <p>Para abrir una nueva <strong>tarea</strong> has click en el siguiente boton</p>
          <a type="button" class="btn btn-info" href="./index.php?view=ticket">Nueva Tarea</a>
        </div>
      </div>
    </div><!--fin col-md-6-->
    
    <div class="col-sm-6">
      <div class="panel panel-danger">
        <div class="panel-heading text-center"><i class="fa fa-link"></i>&nbsp;<strong>Comprobar estado de la tarea</strong></div>
        <div class="panel-body text-center">
          <img src="./img/old_ticket.png" alt="">
          <h4>Consultar tarea</h4>
          <form class="form-horizontal" role="form" method="GET" action="./index.php">
            <input type="hidden" name="view" value="ticketcon">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email_consul" placeholder="Email" required="">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label">ID Ticket</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_consul" placeholder="ID Ticket" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Consultar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!--fin col-md-6-->
  </div><!--fin row 2-->
</div><!--fin container-->