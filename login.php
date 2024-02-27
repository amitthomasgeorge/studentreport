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
    </style>
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST["submit"])){
            $email = $_POST["email"];
            $pass=$_POST["password"];
            require_once "database.php";
            $sql="SELECT email,password FROM registration where email='$email'";
            $result=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($result);
            $row=mysqli_fetch_assoc($result);
            if($rowcount > 0 AND $row["email"]==$email AND $row["password"]==$pass){
                header('Location:register.php');
            }
            else{
                echo "<div class='alert alert-danger'>INVALID EMAIL OR PASSWORD</div>";
            }
        }
        ?>
    <form action="login.php" method="POST">   
    <div class="form-group">
            <input type="text" name="email" placeholder="Enter Mail">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Enter password">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
        </div>
    </div>
    </form>
</body>
</html>