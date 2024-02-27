<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            padding:100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>RESULT OF S1</h1>
        <a href="back.php" class="btn btn-primary">BACK</a>
        <table class="table table-bordered text-center">
            <thead class="bg-dark text-white">
                <tr>
                    <th>CODE</th>
                    <th>CREDIT</th>
                    <th>GRADE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                $var3=$_SESSION["ktid"];
                require_once "database.php";
                $sql="SELECT code,credit,grade from s1 where ktu='$var3'";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>
                    <td>" . $row["code"] . "</td>
                    <td>" . $row["credit"] . "</td>
                    <td>" . $row["grade"] . "</td>
                    ";
                }
                ?>
            </tbody>
        </table>
        <a href="edit.php" class="btn btn-primary">EDIT</a>
    </div>
</body>
</html>