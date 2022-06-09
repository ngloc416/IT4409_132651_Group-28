<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php
        $server = 'localhost';
        $user = 'root';
        $pass = 'toan2k97lhp';
        $mydb = 'lab4';
        $table_name = 'Products';
        $connect = mysqli_connect($server, $user, $pass, $mydb);
        if (!$connect){
            die ("Failed connection");
        }
        else{
            if (array_key_exists("item",$_GET)){
                $item = $_GET["item"];
                $weight = $_GET["weight"];
                $cost = $_GET["cost"];
                $number = $_GET["number"];
                echo $item;
            }
            $SQLcmd = "INSERT INTO $table_name VALUES(
                null, '$item', $cost, $weight, $number
            )";
        }
        mysqli_select_db($connect, $mydb);
        if (mysqli_query($connect, $SQLcmd)){
            print 'The query is '.$SQLcmd;
            print '<br>Insert into '.$table_name.' was successful!';
        }
        else{
            die ("Failed query");
        }
        mysqli_close($connect);
    ?>
</body>
</html>