<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>


</head>

<body>


    <?php
       if(isset($_SESSION['login']))
       {

            echo $_SESSION['login'];
            unset($_SESSION['login']);
       }
    ?>
    <br />


    <div class="login">
    <h1 style="text-align: center;">LOGIN</h1>

    <form id="signin" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="submit" value="signin">Sign In</button>
    </form>
    </div>

    <?php
    // Check whether the submit button is clicked or not
    if (isset($_POST['submit'])) {
        // Process for login
        // 1. Get the data from the login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // 2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        // 3. Execute the query
        $res = mysqli_query($conn, $sql);

        // 4. Check the number of rows returned
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            // User available, login successful
            $_SESSION['login'] = "<div class='success'>Login successful!</div>";
            // Redirect to home page/dashboard
            header('location:'.SITEURL.'admin/');
        }
        else {
            // User not available, login failed
            $_SESSION['login'] = "<div class='error text-center'>Login failed. Invalid username or password.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
    ?>
</body>

</html>
