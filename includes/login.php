<?php

if(isset($_POST['formlogin']))
{
    
    extract($_POST);

    if(!empty($lemailanduser) && !empty($lpassword)){
        //email
        $q =$db->prepare("SELECT * FROM users WHERE email = :email");
        $q->execute(['email' => $lemailanduser]);
        $result = $q->fetch();
        //users
        $q1 =$db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
        $q1->execute(['pseudo' => $lemailanduser]);
        $result1 = $q1->fetch();

    if($result == true || $result1 == true){
        //le compte existe

        if($result == true ) {
            $resulta = $result;
        } elseif($result1 == true) {
            $resulta = $result1;
        }

        $hpassword = $resulta['password'];
        if(password_verify($lpassword, $resulta['password'])){
            echo"Le mots de passe est bon";
            setcookie('user', $resulta['pseudo'], time() + (30 * 24 * 3600));
            setcookie('date', $resulta['date'], time() + (30 * 24 * 3600));
            header("Refresh:1");

        } else {
            echo "Le compte " . $lemailanduser . " n'existe pas...";
        }
        } else {
            echo "Le compte " . $lemailanduser . " n'existe pas...";
        }
    } else {
        echo 'Merci de completer les champs';
    }
}
?>