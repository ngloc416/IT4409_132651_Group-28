<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <?php
        $server = 'localhost';
        $user = 'root';
        $pass = 'toan2k97lhp';
        $mydb = 'lab4';
        $connect = mysqli_connect($server, $user, $pass, $mydb);
        if (!$connect){
            die ("Failed connection");
        }
        else{
            $item = $_GET['item'];
            $SQLcmd = 'SELECT * FROM products WHERE Product_desc = "'. $item .'" ';
        }
        if (mysqli_query($connect, $SQLcmd)){
            print '<font size="4" color="blue" > Product Data<br>';
            print "The query is <i>$SQLcmd</i></font>";

            $result = mysqli_query($connect, $SQLcmd);
            print '<table border="1">';
            print '<tr>';
            print '<td><p>Num</p></td>';
            print '<td><p>Product</p></td>';
            print '<td><p>Cost</p></td>';
            print '<td><p>Weight</p></td>';
            print '<td><p>Count</p></td>';
            print '</tr>';
            
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    print '<tr>';
                    print '<td>'.$row['ProductID'].'</td>';
                    print '<td>'.$row['Product_desc'].'</td>';
                    print '<td>'.$row['Cost'].'</td>';
                    print '<td>'.$row['Weight'].'</td>';
                    print '<td>'.$row['Numn'].'</td>';
                    print '</tr>';
                }
            }
            print '</table>';
        }
        else{
            die ("Failed Query");
        }
        mysqli_close($connect);
    ?>
</body>
</html>