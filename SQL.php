<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographs</title>
</head>
<body style="background-color: grey; text-align:center;">
    <h1>Random Photograph in Database</h1>
    <br>


        <tbody>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "rsbhogal";

            $connection = new mysqli($host, $user, $password, $database);

            if ($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM Photograph ORDER BY RAND() LIMIT 1";
            $sq = "SELECT * FROM Photograph";
            $result = $connection->query($sql);
            $result2 = $connection->query($sq);
            

            if (!$result){
                die("Invalid query: " . $connection->error);
            }

            while($row = $result-> fetch_assoc())
            { 


                echo "<img src=". $row["picture_url"] ." width=". 600 ." height=". 600 ." >";
                echo "<br>";
                echo "<p style='font-size:1.5em'>$row[subject], $row[location]</p>";


                




            }
            $total = 0;

            while($row = $result2-> fetch_assoc())
            { 
                $total = $total + 1;

            }

            echo '<br><br>';
            echo "<p style='font-size:1.5em'>Total images in database: $total</p>";
            
            ?>
        </tbody>
    </table>
</body>
</html>
