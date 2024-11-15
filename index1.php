<?php
$con = mysqli_connect("localhost", "root", "", "base2");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $cin = $_POST['cin'];

    $QU1 = "SELECT * FROM info_users where cin='$cin' and email='$email';";
    $exec = mysqli_query($con, $QU1);
    $res = mysqli_num_rows($exec);
    if ($res > 0) {
        session_start();
        $_SESSION['cin']=$cin;
        $_SESSION['email']=  $email;
        header("Location: index.php");
    } else {
        header("Location: index1.php");
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        justify-content: center;
        padding-top: 30px;
        font-size: 15px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-weight: 600;
    }

    .fileperso {
        width: 500px;
        height: 200px;
        border: solid 1px black;
        justify-content: center;
        display: flex;
        align-items: center;
        flex-direction: column;
        font-size: 17px;
    }

    .fileperso form {
        width: 60px;
        justify-content: space-evenly;
        display: flex;
        height: 90%;
        align-items: center;
        flex-direction: column;
    }

    .fileperso form input {
        width: 300px;
        height: 30px;
        padding: 10px 0 0 15px;
        font-size: 16px;
    }

    .fileperso form button {
        width: 200px;
        font-size: 16px;
        height: 30px;
    }
</style>

<body>
    <div class="fileperso">
        <form action="" method="post">
            <input type="email" name="email" placeholder="email">
            <input type="text" name="cin" placeholder="c.i.n">
            <button type="submit">submit</button>
        </form>
    </div>
</body>

</html>