<?php
$bdd = 'mysql:host=127.0.0.1;dbname=ComparOperator';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($bdd, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print 'erreur!:' . $e->getMessage() . '<br/>';
    die('');
}

function loadClass($classe)
{
  require_once '../classes/'.
		$classe . '.php'; 
}

spl_autoload_register('loadClass'); 

$adminManager =new AdminManager($pdo); 
 
if (isset($_POST['firstname'])&& isset($_POST['lastname']) && isset($_POST['password'])&& empty($_POST['password2'])) {
$newAdmin = new Admin(['firstname'=>$_POST['firstname'], 'lastname'=>$_POST['lastname'], 'password'=>$_POST['password']]);
$verificationNameAdmin =  $adminManager->getAdmin($newAdmin); 
if (!$verificationNameAdmin) {
    var_dump('mot passe incorrecte');
    //header("location: connect_admin.php?error= Le nom d'utilisateur est incorrecte!");
} 
else {
    $verificationPassword = $adminManager->verificationPassword($newAdmin, $_POST['password']); 
  
    if ($verificationPassword) {
        var_dump( 'connecte');
        //header('location: connect_admin.php?message=Salut '.$_POST['firstname'].' You are connected !');
    } else {
        var_dump( 'mal nom mot passe ');
        //header("location: connect_admin.php?error=Le mot de passe ou le nom d'utilisateur est incorrecte!");
    }
    }
   
}

else if(isset($_POST['firstname'])&& isset($_POST['lastname']) && isset($_POST['password'])&&isset($_POST['password2'])){
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password!= $password2) {
        var_dump('verification mots passes');
        //header("location: creatAdmin.php?error=Les mots de passe ne correspondent pas, réessayez!");
    }else {
        $newAdmin = new Admin(['firstname'=>$_POST['firstname'], 'lastname'=>$_POST['lastname'], 'password'=>$_POST['password']]);
        $verificationNameAdmin =  $adminManager->getAdmin($newAdmin); 
        if ( $verificationNameAdmin->rowCount() > 0) {
            var_dump('existe nom'); 
            //header("location: creatAdmin.php?error=Le pseudo existe déjà");
        }
        else{
            $creationAdmin =  $adminManager->createAdmin($newAdmin); 
        }
           

            if ($creationAdmin) {
                var_dump('inscription reussi');
                //header("location: creatAdmin.php?success=Votre inscription a réussi!");

            } else {
                var_dump('probleme');
                //header("location: creatAdmin.php.?error=Un problème est survenu!");
        }
    }  
}


 
?>