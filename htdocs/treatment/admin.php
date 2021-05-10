<?php
session_start();
include '../config/db.php';
include '../config/autoload.php';

$AdminManager =new AdminManager($pdo); 
 
if (isset($_POST['firstname'])&& isset($_POST['lastname']) && isset($_POST['password'])&& empty($_POST['password2'])) {
$newAdmin = new Admin(['firstname'=>$_POST['firstname'], 'lastname'=>$_POST['lastname'], 'password'=>$_POST['password']]);
$verificationNameAdmin =  $AdminManager->getAdmin($newAdmin); 
if (!$verificationNameAdmin) {
    header("location:../admin/admin.php?error= Le nom d'utilisateur est incorrecte!");
} 
else {
    $verificationPassword = $AdminManager->verificationPassword($newAdmin, $_POST['password']); 
  
    if ($verificationPassword) {
        header('location:../admin/AdminModification.php?message=Salut '.$_POST['firstname'].' You are connected !');
        $_SESSION['firstname'] = $_POST['firstname'];
    } else {
        header("location:../admin/admin.php?error=Le mot de passe ou le nom d'utilisateur est incorrecte!");
    }
    }
   
}

else if(isset($_POST['firstname'])&& isset($_POST['lastname']) && isset($_POST['password'])&&isset($_POST['password2'])){
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password!= $password2) {
        header("location:../admin/admin.php?error=Les mots de passe ne correspondent pas, réessayez!");
    }else {
        $newAdmin = new Admin(['firstname'=>$_POST['firstname'], 'lastname'=>$_POST['lastname'], 'password'=>$_POST['password']]);
        $verificationNameAdmin =  $AdminManager->getAdmin($newAdmin); 
        if ( $verificationNameAdmin->rowCount() > 0) {
            header("location:../admin/admin.php?error=Le Nom et Prénom existe déjà");
        }
        else{
            $creationAdmin =  $AdminManager->createAdmin($newAdmin); 
        }
           

            if ($creationAdmin) {
                header("location:../admin/AdminModification.php?message=Votre inscription a réussi!");

            } else {
                header("location:../admin/admin.php.?error=Un problème est survenu!");
        }
    }  
}


 
?>