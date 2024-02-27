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
            padding: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
        if (isset($_POST["submit"])){
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordr = $_POST["rpassword"];
            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
            $error = array();
            if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordr))
            {
                array_push($error,"All fields are required");
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                array_push($error,"Email is not valid");
            }
            if(strlen($password) < 8)
            {
                array_push($error,"Password must be atlest 8 characters");
            }
            if($password !== $passwordr)
            {
                array_push($error,"Password doesnot match");
            }
            require_once "database.php";
            $sql="SELECT * FROM registration where email='$email'";
            $result=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($result);
            if($rowcount > 0)
            {
                array_push($error,"Email already exist");
            }
            if(count($error) > 0)
            {
                foreach ($error as $err) {
                    echo "<div class='alert alert-danger'>$err</div>";
                }
            }
            else
            {
                require_once "database.php";
                $sql = "INSERT INTO registration (full_name,email,password) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt)
                {
                  mysqli_stmt_bind_param($stmt,"sss",$fullName,$email,$password);
                  mysqli_stmt_execute($stmt);
                  echo "<div class='alert alert-success'>You have registered successfully</div>";
                }
                else
                {
                    die("something went wrong");
                }
            }
        }
        ?>
    <form action="new.php" method="POST">   
    <div class="form-group">
            <input type="text" name="fullname" placeholder="Full Name">
        </div>
        <div class="form-group">
            <input type="text" name="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Enter password">
        </div>
        <div class="form-group">
            <input type="password" name="rpassword" placeholder="RE-Enter Password">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
        </div>
     </form>
     <div><p>Already registered <a href="login.php">Login here</a></p></div>
    </div>
</body>
</html>