<?php
include 'toolbar.php';
?>
<form action="./controllers/controller.php?folder=<?= $_GET['folder']; ?>" method="POST">
    <div class="row">
        <div class="col text-center">
            <i class="material-icons" style="font-size: 80px;">add</i>
        </div>
    </div>
    <div class="form-group">
        <label for="name">Nombres</label>
        <input type="text" class="form-control" id="name" name="nombre" autofocus placeholder="Tus nombres" required>
    </div>
    <div class="form-group">
        <label for="email">Puesto</label>
        <input type="text" class="form-control" id="puesto" name="puesto" placeholder="tu Puesto" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Tu e-mail" required>
    </div>
    <div class="form-group">
        <label for="email">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required>
    </div>
    <div class="form-group">
        <label for="email">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
    </div>
    <div class="form-group text-center">
        <input type="submit" name="create" value="Crear" class="btn btn-primary">
    </div>
    <div class="form-group text-center">
        <?php
        if (isset($_GET['success'])) {
            ?>
            <div class="alert alert-success">
                El usuario ha sido creado.
            </div>
            <?php  header ("Location:./index.php?page=users&folder=users");?>
            <?php
        } else if (isset($_GET['error'])) {
            ?>
            <div class="alert alert-danger">
                Ha ocurrido un error al crear el usario, por favor intente de nuevo.
            </div>
            <?php
        }
        ?>
    </div>
</form>