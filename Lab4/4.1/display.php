<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Data</title>
</head>
<body>
    <?php
        $server = 'localhost';
        $user = 'root';
        $pass = 'toan2k97lhp';
        $mydb = 'lab4';
        $table_name = 'products';
        $connect = mysqli_connect($server, $user, $pass, $mydb);
        if (!$connect){
            die ("Failed connection");
        }
        else{
            $SQLcmd = "SELECT * FROM $table_name";
        }
        if (mysqli_query($connect, $SQLcmd)){
            print '<font size="4" color="blue" > Display</font><br>';
            print 'The query is '.$SQLcmd;

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
        mysqli_close($connect);
    ?>
</body>
</html>