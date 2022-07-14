<?php
// mensaje personalizado
function MessageBox($alertaMensaje,$message,$TipoMensaje,$classtipo){
        if ($alertaMensaje == "eliminado") {
            echo '<div class="p-3">
        <div class="alert alert-'.$classtipo.'" role="alert">
        <b>'.$message.'</b></div><div>';
        }else{
         if($alertaMensaje==""){
            echo "<div class='p-2'>";
          if( isset($_SESSION['mensaje']) and $_SESSION['mensaje'] ==$TipoMensaje){
              echo '
              <div class="alert alert-'.$classtipo.'" role="alert">
              <b>'.$message.'</b></div>';
          } 
          if(isset($_SESSION['mensajes']) and $_SESSION['mensajes'] ==$TipoMensaje){
            echo '
            <div class="alert alert-'.$classtipo.'" role="alert">
            <b>'.$message.'</b></div>';
        } 
        
        }
         echo "</div>"; 
         if(isset($_SESSION['mensaje']) || isset($_SESSION['mensajes']))
         unset($_SESSION['mensaje']);/// destruimos el message alert de guardada en session
         unset($_SESSION['mensajes']);
    }
}
?>

 