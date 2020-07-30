<?php

  include './models/users.php';
  $title="Listado de Usuarios";

  $user     = new Users();
  $id       = isset($_GET['id'])?$_GET['id']:null;
  $users    = $user->getUserById($id);
  $name     = '';
  $lastName = '';
  $email    = '';
  if($users){
    $name     =$users[0]['name'];
    $lastName =$users[0]['last_name'];
    $email    =$users[0]['email'];
  }

	include 'toolbar.php';
?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">edit</i>
    </div>
  </div>
    <div class="form-group">
        <label for="name">Nombres</label>
        <input type="text" class="form-control" id="name" name="nombre" autofocus placeholder="Tus nombres" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Tu e-mail" required>
    </div>
    <div class="form-group">
        <label for="email">Direccion</label>
        <input type="text" class="form-control" id="email" name="direccion" placeholder="Direccion" required>
    </div>
    <div class="form-group">
        <label for="email">Telefono</label>
        <input type="text" class="form-control" id="email" name="telefono" placeholder="Telefono" required>
    </div>
  <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				La informacion ha sido actualizada.
			</div>
            <?php  header ("Location:./index.php?page=users&folder=users");?>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar la información, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
  <input type="hidden" name="id" value="<?php echo $id ?>">
</form>