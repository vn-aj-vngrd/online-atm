<?php
session_start();
include "crud/initUsers.php";
include "crud/functions.php";

if ($_SESSION['active'] == true) {
    header("Location: sections/home.php");
}

$function = new Functions;
if (isset($_POST['submit'])) {
    $function->loginValidation();
}

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <title>Online ATM - Login</title>
</head>

<body>
    <main class="form-signin border shadow bg-white rounded">
        <form method="post">
            <h1 class="h3 mb-4 fw-normal text-center">Online ATM</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="accNo" placeholder="Card Number" required>
                <label>Account Number</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="pin" placeholder="Pin" required>
                <label>Pin</label>
            </div>

            <button type="submit" class="w-100 mt-2 btn btn-lg btn-primary" name="submit">Enter</button>

            <?php 
                if(isset($_SESSION['msg'])) {
                    echo "<div class = 'mt-2 text-center text-danger'>". $_SESSION['msg'] ."</div>";
                    unset($_SESSION['msg']);
                }
            ?>

        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>