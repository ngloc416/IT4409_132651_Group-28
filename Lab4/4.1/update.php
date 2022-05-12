<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <?php
        print '<p color="blue">Select Product We Just Sold</p>';
        $server = 'localhost';
        $user = 'root';
        $pass = 'toan2k97lhp';
        $mydb = 'lab4';
        $connect = mysqli_connect($server, $user, $pass, $mydb);
        if (!$connect){
            die ("Failed connection");
        }
        else{
            $SQLcmd = 'SELECT * FROM products';
        }
        $result = mysqli_query($connect, $SQLcmd);
        print '<form action="update_result.php" method="GET">
                <div>';
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                print '<input type="radio" name="product_desc" value="'.$row['Product_desc'].'">'.$row['Product_desc'];
            }
        }
        print '</div>';
        print '<div><input type="submit" value="Submit">
                    <input type="reset" value="Reset"></div>';
        print '</form>';

        print '<table border="1">';
        print '<tr>';
        print '<td><p>Num</p></td>';
        print '<td><p>Product</p></td>';
        print '<td><p>Cost</p></td>';
        print '<td><p>Weight</p></td>';
        print '<td><p>Count</p></td>';
        print '</tr>';

        $result = mysqli_query($connect, $SQLcmd);
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
        mysqli_close($connect);
    ?>
</body>
</html>