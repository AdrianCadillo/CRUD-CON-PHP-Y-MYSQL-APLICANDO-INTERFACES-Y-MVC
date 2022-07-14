<?php
require '../setting/conexion.php';
require '../model/PermisoModelo.php';
require '../controller/PermisoController.php';
include 'layout/menu.php';
include 'mensaje/alerta.php';
?>

<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 200px;">
        <div class="col-xl-7 col-lg-7 col-md-8 col-sm-9 col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Crear nuevos Roles</h3>
                </div>
                <form action="" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="namerol" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-outline-success" value="guardar" name="save-btn">Guardar cambios
                            <i class="fas fa-save"></i>
                        </button>
                        <br>
                        <?php
                        if($mensaje==''){
                          if(isset($_SESSION['mensajes'])){
                            if($_SESSION['mensajes']=='vacio'){
                               MessageBox($mensaje,"Complete el campo vacio","vacio","danger"); 
                            } 
                           } 
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>