 <?php
    require '../setting/conexion.php';
    require '../model/PermisoModelo.php';
    require '../controller/PermisoController.php';
    include 'layout/menu.php';
    include 'mensaje/alerta.php';
   
    session_start();
    ?>

 <div class="container-fluid">
     <div class="row justify-content-center align-items-center" style="height: 200px;">
         <div class="col-xl-11 col-lg-9 col-md-11 col-sm-11 col-12">
         <br>   
         <div class="card shadow">
                 <div class="card-header">
                     <h3>Listado de Roles</h3>
                 </div>
                 <div class="card-body">
                        <a  class="btn btn-primary col-xl-2 col-lg-2 col-md-3 col-sm-4 col-5" href="create.php" role="button"><i class="fas fa-circle-plus"></i> Nuevo</a>
                       
                       <?php
                         if($mensaje=='eliminado')
                         MessageBox($mensaje,"Rol eliminado correctamente","","success");
                         else
                         if($mensaje==''){
                            $miMensaje="";
                            if(isset($_SESSION['mensaje'])){
                             if($_SESSION['mensaje']=='success'){
                                MessageBox($mensaje,"Rol modificado correctamente","success","success"); 
                             }else{
                                if($_SESSION['mensaje']=='existe'){
                                    MessageBox($mensaje,"Rol ya existe, imposible modificar ):","existe","warning"); 
                                }else{
                                    MessageBox($mensaje,"Error al modificar los datos ","error","danger"); 
                                }
                             }
                            }
                            if(isset($_SESSION['mensajes'])){
                                if($_SESSION['mensajes']=='success'){
                                   MessageBox($mensaje,"Rol creado correctamente","success","success"); 
                                }else{
                                   if($_SESSION['mensajes']=='existe'){
                                       MessageBox($mensaje,"Rol ya existe, imposible registrar duplicados ):","existe","warning"); 
                                   }else{
                                       MessageBox($mensaje,"Error al registrar los datos ","error","danger"); 
                                   }
                                }
                               } 
                         }
                        ?>

                     <table class="table table-striped table-inverse table-responsive">
                         <thead class="thead-inverse">
                             <tr>
                                 <th>IITEM</th>
                                 <th style="width: 800px;">NOMBRE ROL</th>
                                 <th class="text-center">ACCIONES</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $item = 0;
                                foreach ($Mis_Permisos as $permiso) {
                                    $item += 1;
                                ?>
                                 <tr>
                                     <td><?php echo $item; ?></td>
                                     <td><?php echo $permiso['nombre_rol']; ?></td>
                                     <td>
                                      <div class="container">
                                       <div class="row justify-content-center">
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-12 m-2">
                                        <a name="" id="" class="btn btn-warning btn-sm" href="editar.php?id=<?php echo $permiso['id_rol']; ?>" role="button">
                                             <i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-12 m-2">
                                        <form action="" method="post">
                                        <input type="text" hidden value="<?php echo $permiso['id_rol'];?>" name="id">
                                        <button type="submit" name="btn-delete" class="btn btn-danger btn-sm" value="delete"> <i class="fas fa-trash-alt"></i></button>    
                                        </form>
                                        </div>
                                       </div>
                                      </div>
                                     </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>