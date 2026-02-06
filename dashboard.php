<?php
 session_start();
 if(!isset($_SESSION['user_id'])){
    header("location: login.php");
    exit;
 }
$perfil = $_SESSION['user_perfil'];

switch($perfil){
    case 'gestor':
        header("location: gestor_dashboard.php");
        break;
    
    case 'tecnico' :
        header("location: tecnico_dashboard.php");
        break;

    case 'solicitante' :
        header("location: solicitante_dashboard.php");
        break;
    
    default:
        session_destroy();
        header("location: login.php?error=perfil_inval");
        break;
}
exit;