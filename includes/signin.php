
<?php
if(isset($_POST['formsend'])) {

    extract($_POST);

    if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($users) ) {


        if($password === $cpassword) {
            $options = [
                'cost' => 12,
            ];
            $hashpass=  password_hash($password, PASSWORD_BCRYPT, $options);
            //email
            $c =$db->prepare("SELECT email FROM users WHERE email = :email");
            $c->execute(['email' => $email]);
            $result = $c->rowCount();
            //User
            $c1 =$db->prepare("SELECT pseudo FROM users WHERE users = :pseudo");
            $c1->execute(['users' => $users]);
            $result1 = $c1->rowCount();

            if($result == 0 || $result1 == 0) {
                $q = $db->prepare("INSERT INTO users(pseudo, email,password) VALUES(:pseudo,:email,:password)");
                $q->execute([
                    'email' => $email,
                    'pseudo' => $users,
                    'password' => $hashpass
                ]);
                
                echo "Le compte a été crée";
                header("Refresh:1");
            } else {
                echo " Cette utilisateur existe deja";
            }
            
        } else {
            echo "Les champs ne sont pas bien replis";
        }

    }

}
?>