<?php
$NameFile=basename($_SERVER['PHP_SELF'],".php");
/// llamamos a la logica de negocio
if($NameFile!='PermisoController'){

$ModeloPermiso = new Permiso();
/**
 * MOSTRAR DATOS
 */
$mensaje="";

/**
 * Pagina de listar, osea el index
 */
if($NameFile=='index'){
$Mis_Permisos=$ModeloPermiso->getShowPermisos();
/**
 * REGISTRAR
 */
if(isset($_POST['btn-save']) && isset($_POST['namerol'])){
if($_POST['btn-save']=='save-permiso'){
$Name_rol = $_POST['namerol'];
if($ModeloPermiso->saveRol($Name_rol)==1){
$mensaje = "Rol creado correctamente";
$Mis_Permisos=$ModeloPermiso->getShowPermisos();
}else{
if($ModeloPermiso->saveRol($Name_rol)==2){
$mensaje ="Ya existe este rol";
}else{
    $mensaje ="Error al crear rol";
}
}
}
}
/**
 * MODIFICAR
 */
if(isset($_POST['btn-modificar'])){
    if($_POST['btn-modificar']=='modificar-permiso'){
        $mensaje="soy el boton de modificar los permisos";
    }
}
/**
 * ELIMINAR
 */
if(isset($_POST['btn-delete'])){
    if($_POST['btn-delete']=='delete'){
     $ID=$_POST['id'];
     if($ModeloPermiso->destroy($ID)==1)
     $mensaje ="eliminado";
     else
     $mensaje="error";
     $Mis_Permisos=$ModeloPermiso->getShowPermisos();
    }
}
}

/// pagina de editar
if ($NameFile == 'editar') {
    if (isset($_GET['id'])) {
        $ID = $_GET['id'];
        $Mi_Rol_X_Id = $ModeloPermiso->findById(QUERYEDITAR, $ID);
    } else {
        header("Location:./");
    }

    if(isset($_POST['modificar-btn']) and isset($_GET['id'])){
     if($_POST['modificar-btn']=='btn-modify'){
     session_start();
      $ID=$_GET['id'];
      $NombreRol =$_POST['namerol'];
      $datos=[$NombreRol,$ID];
      if(!empty($NombreRol)){
        if($ModeloPermiso->update(QUERYMODIFY,$datos)==1){
            $_SESSION['mensaje']='success';
            }else{
             if($ModeloPermiso->update(QUERYMODIFY,$datos)==2){
              $_SESSION['mensaje']='existe';           
             }else{
              $_SESSION['mensaje']='error';
             }
            }
            $mensaje="modificado";
            header("Location:./");
      }else{
          $_SESSION['mensaje']="vacio";
      }
       
     }
    }
}

/**
 * CREAR
 */

 if($NameFile=='create'){
   if(isset($_POST['save-btn'])  and isset($_POST['namerol'])){
    if($_POST['save-btn'] == 'guardar'){
    session_start();
    $NameRol = $_POST['namerol'];
    if(!empty($NameRol)){
        if($ModeloPermiso->saveRol($NameRol)==1){
            $_SESSION['mensajes']='success';   
        }else{
            if($ModeloPermiso->saveRol($NameRol)==2){
                $_SESSION['mensajes']='existe';       
            }else{
                $_SESSION['mensajes']='error';       
            }
        } 
        $mensaje="Registro";
        header("Location:./");
    }else{
        $_SESSION['mensajes']='vacio'; 
    }
    }
   }
 }

}else{
header("Location:../view/");
}