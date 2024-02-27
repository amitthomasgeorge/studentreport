<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            padding:200px;
        }
        .boxcontainer{
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container boxcontainer">
        <?php
        if(isset($_POST["submit"])){
            $id = $_POST["ktuid"];
            session_start();
            $_SESSION["ktid"]= $id;
            header('Location: dash.php');
        }
        ?>
    <form action="register.php" method="POST">   
    <div class="form-group">
            <input type="text" name="ktuid" placeholder="Enter ID">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
        </div>
    </div>
    </form>
</body>
</html>