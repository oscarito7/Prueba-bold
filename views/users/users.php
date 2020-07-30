<?php

include './models/users.php';
$user = new Users();

//Si utiliza el filtro de busqueda
if (isset($search)) {
    $users = $user->getUsersBySearch($dataSearch);
} else {
    //Trae todos los usuarios
    $dataSearch = NULL;
    $users = $user->getUsers();
}

$title = "Listado de Usuarios";
include 'toolbar.php';
?>
<div class="row">
    <div class="col text-center">
        <i class="material-icons" style="font-size: 80px;">people</i>
    </div>
</div>
<div class="row">
    <div class="col">
        <form action="./index.php" method="post" accept-charset="utf-8" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="dataSearch" autofocus required placeholder="Buscador"
                       value="<?= $dataSearch; ?>">
            </div>

            <button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>
        </form>
    </div>
</div>
<div class="table-responsive">
    <table class="table  table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">puesto</th>
            <th class="text-center">E-mail</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Accion</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if (count($users) > 0) {

            foreach ($users as $column => $value) {
                ?>

                <tr id="row<?= $value['id']; ?>">
                    <td><?= $value['id']; ?></td>
                    <td><?= $value['nombre']; ?></td>
                    <td><?= $value['puesto']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td><?= $value['direccion']; ?></td>
                    <td><?= $value['telefono']; ?></td>


                    <td class="text-center">
                        <a href="./index.php?page=edit&id=<?= $value['id'] ?>&folder=users"
                           title="Editar usuario: <?= $value['name'] . ' ' . $value['puesto'] ?>">
                            <i class="material-icons btn_edit">edit</i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="#" onclick="objUser.deleteUser(<?= $value["id"] ?>)" id="btnDeleteUser"
                           title="Borrar usuario: <?= $value['name'] . ' ' . $value['puesto'] ?>">
                            <i class="material-icons btn_delete">delete_forever</i>
                        </a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">
                    <div class="alert alert-info">
                        No se encontraron usuarios.
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        <div class="alert alert-success" id="msgSuccess" style="display: none;"></div>
        <div class="alert alert-danger" id="msgDanger" style="display: none;"></div>
    </div>
</div>