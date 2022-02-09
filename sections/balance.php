<?php 
    include "../crud/sessionTimeout.php";
    include "../crud/functions.php";
    
    $function = new Functions;
    if (isset($_POST['exit'])) {
        $function->exitSession();
    }
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../style/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <title>Online ATM - Balance</title>
</head>

<body>
    <main class="form-signin border shadow bg-white rounded">
        <form method="post">
            <h1 class="h3 mb-4 fw-normal text-center">Online ATM</h1>
            
            <p class="form-control text-center">Balance: <?php echo "₱". (double)$_SESSION['user']['balance'] ?> </p>

            <button onclick="return confirm('Are you sure you want to exit?')" type="submit" class="w-100 btn btn-danger" name="exit">Exit</button>
            <a href="home.php" class="mt-2 w-100 btn btn-primary">Go Back</a>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>