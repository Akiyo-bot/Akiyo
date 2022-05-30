<?php session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Akiyo
        </title>
    </head>
<body>

    <h1>Bienvenue sur votre profils</h1>
    <?php
    if(isset($_COOKIE['user']) && (isset($_COOKIE['date']))) {
    ?> 

    <p>Votre Email : <?= $_COOKIE['user']; ?></p>
    <?php
    } else {
        echo "Merci de vous connecter";
    }
    ?> 

<?php
       
       include './includes/database.php';
       global $db;

?>

<h1>Loggin</h1>
    <form method="post">
    <input type="text" name="lemailanduser" id="lemailanduser" placeholder="Votre email ou pseudo" required><br/>
    <input type="password" name="lpassword" id="lpassword" placeholder="Votre password" required><br/>
       <input type="submit" name="formlogin" id="formlogin" value="Login">
    </form>

    <?php include './includes/login.php' ?>

    <h1>Signin</h1>
    <form method="post">
    <input type="email" name="email" id="email" placeholder="Votre email" required><br/>
    <input type="text" name="users" id="users" placeholder="Votre pseudo" required><br/>
    <input type="password" name="password" id="password" placeholder="Votre password" required><br/>
    <input type="cpassword" name="cpassword" id="cpassword" placeholder=" Confirmervotre password" required><br/>
        <input type="submit" name="formsend" id="formsend" value="Signin">
    </form>
<?php include './includes/signin.php' ?>
</body>
</html>