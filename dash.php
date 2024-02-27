<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            background-image: linear-gradient(to right,red,blue);
        }
        .information{
            width:800px;
             padding: 50px;
             margin-bottom:40px;
             margin-top:10px;
             margin-left:320px;
             box-shadow:  rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
             background-color: white;
             position: relative;
        }
        .gridview{
            display:grid;
            grid-template-columns: auto auto auto;
            column-gap: 80px;
            row-gap: 20px;
        }
        .infocontainer{
            background-color: white;
        }
    </style>
    
</head>
<body>
    <div class="information gridview">
        <?php
        session_start();
        $var11=$_SESSION["ktid"];
        require_once "database.php";
        $sql="SELECT * FROM info WHERE kid='$var11'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "
            <div><label>Name:" . $row["name"] . "</label></div>
            <div><label>Age:" . $row["age"] . "</label></div>
            <div><label>Sex:" . $row["sex"] . "</label></div>
            <div><label>KTU ID: " . $row["kid"] . "</label></div>
            <div><label>University:" . $row["uty"] . "</label></div>
            <div><label>DateOfAdm:" . $row["doa"] . "</label></div>
            ";
        }
        ?>
     </div>
    <div class="container infocontainer">
        <table class="table table-bordered text-center">
        <thead class="bg-dark text-white">
            <tr>
                <th> SEMESTER </th>
                <th> MARKS </th>
                <th> TOTAL </th>
                <th> STATUS </th>

            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            $var1=$_SESSION["ktid"];
            require_once "database.php";
            $sql="SELECT sem,score,tscore from summary where id='$var1'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $var2=$row["sem"];
                if ($row["score"])
                {
                    echo "<tr>
                    <td>$var2</td>
                    <td>" . $row["score"] . "</td>
                    <td>" . $row["tscore"] . "</td>
                    <td> PASS </td>
                    </tr>
                    ";
                }
                else
                {
                    echo "<tr>
                    <td><a href='$var2.php'>$var2</a></td>
                    <td>" . $row["score"] . "</td>
                    <td>" . $row["tscore"] . "</td>
                    <td>FAIL</td>
                    </tr>
                    ";
                }
            }
            ?>
        </tbody>
        </table>
        <div>
        <?php
        require_once "database.php";
        session_start();
        $sql="SELECT sem from summary WHERE id='$var1' AND score IS NULL";
        $result=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);
        if($rowcount < 0)
        {
            echo "SEMESTER TO BE CLEARED ";
        }
        else
        {
            echo "SEMESTER TO BE CLEARED ";
        }
        while($row=mysqli_fetch_assoc($result))
        {
            echo "
            <label>" . $row["sem"] . "</label>
            ";
        }
        ?>
        </div>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>
</html>