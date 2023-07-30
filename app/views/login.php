<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="session_login_system/public/css/login.css">
    <title>Document</title>
</head>
<body>
    <div id="loginPage">
        <p id="hello">hello</p>
        <div id="passwordLoginFormContainer">
            <form id="passwordLoginForm" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="username">Username</label>
                <input type="text" name="username">
                <label for="password">Password</label>
                <input type="password" name="password">
                <input type="submit" value="login">
            </form>
        </div>
    </div>
</body>
</html>