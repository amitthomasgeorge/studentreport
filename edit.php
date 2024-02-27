<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php
    session_start();
    $var4=$_SESSION["ktid"];
        if(isset($_POST["updates"])){
            $codes=$_POST["option1"];
            $grades=$_POST["grade"];
            require_once "database.php";
            $sql="UPDATE s1 SET grade='$grades' WHERE ktu='$var4' and code='$codes'";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "updated successfully";
            }
            header('Location:S1.php');
         }
        ?>
        <form action="edit.php" method="POST">
         <select name="option1">
            <?php
            session_start();
            $var13=$_SESSION["ktid"];
            require_once "database.php";
            $sql="SELECT code from s1 where ktu='$var13'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                echo "
                <option>" . $row["code"] . "</option>
                ";
            }
            ?>
         </select>
         <div class="form-group">
            <input type="text" name="grade" placeholder="Enter Grade">
        </div>
         <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Update" name="updates">
        </div>
        </form>
    </div>
</body>
</html>