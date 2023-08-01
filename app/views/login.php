<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div id="loginPage">
        <p><?php echo $this->wrongCredentials  ?></p>
        <div id="passwordLoginFormContainer">
            <form id="passwordLoginForm" action = "/login" method="post">
                <label for="username">Username</label>
                <input type="text" name="username">
                <label for="password">Password</label>
                <input type="password" name="password">
                <input type="submit" value="login" name="login" id="loginButton">
            </form>
        </div>
    </div>
</body>
</html>