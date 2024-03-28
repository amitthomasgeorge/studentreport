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
    $var20=$_SESSION["ktid"];
        if(isset($_POST["updates"])){
            $codes=$_POST["option1"];
            $mark=$_POST["marks"];
            $yop=$_POST["year"];
            require_once "database.php";
            if($mark)
            {
                $sql="UPDATE summary SET score='$mark',pass='$yop' WHERE id='$var20' AND sem='$codes'";
                $result=mysqli_query($conn,$sql);
                if($result){
                    echo "updated successfully";
                }
                header('Location:dash.php');
            }
            else
            {
                header('Location:dash.php');  
            }
         }
        ?>
        <form action="mark.php" method="POST">
        <select name="option1">
            <?php
            session_start();
            $var20=$_SESSION["ktid"];
            require_once "database.php";
            $sql="SELECT sem from summary where id='$var20' and score IS NULL";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                echo "
                <option>" . $row["sem"] . "</option>
                ";
            }
            ?>
         </select>
         <div class="form-group">
            <input type="text" name="marks" placeholder="Enter Mark">
        </div>
        <div class="form-group">
            <input type="text" name="year" placeholder="Year Pass">
        </div>
         <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Update" name="updates">
        </div>
        </form>
    </div>
</body>
</html>