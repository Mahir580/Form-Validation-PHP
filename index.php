<?php

require("Validation.php");

if(isset($_POST["submit"])){
    //validate entities
    $validation=new UserValidator($_POST);
    $errors=$validation->validateForm();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <div class="new-user">
        <h2>Create new user</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

            <label>Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($_POST["username"]) ?>">
            <span><?php echo $errors["username"] ?? "" ?></span>

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($_POST["email"]) ?>">
            <span><?php echo $errors["email"] ?? "" ?></span>

            <label>Password:</label>
            <input type="text" name="password" value="<?php echo htmlspecialchars($_POST["password"]) ?>">
            <span><?php echo $errors["password"] ?? "" ?></span>

            <input type="submit" value="submit" name="submit">
        </form>
    </div>

</body>
</html>