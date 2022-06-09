<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
<?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $mydb = 'lab4';
        $table_name = 'categories';
        $connect = mysqli_connect($server, $user, $pass, $mydb);
        if(!$connect) {
            die ("Failed Connection");
        } else {
            print '<br>';
            $catid = $_GET['id'];
            $title = $_GET['title'];
            $description = $_GET['description'];
            $SQLcmd = "INSERT INTO $table_name (CategoryID, Title, Description) VALUES('$catid', '$title', '$description')";
            echo $SQLcmd;
            if(mysqli_query($connect, $SQLcmd)) {
                $SQLselect = 'SELECT * FROM categories';
                $result = mysqli_query($connect, $SQLselect);
                print "<div>Insert into $table_name was succesful!</div>";
                print "<br>";
                print "<table border='1'>";
                print "<tr>
                        <td>Catid</td>
                        <td>Title</td>
                        <td>Description</td>
                        </tr>";
                
                if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                        print '<tr>
                                <td>'.$row["CategoryID"].'</td>
                                <td>'.$row["Title"].'</td>
                                <td>'.$row["Description"].'</td>
                                </tr>';
                    }
                }
                print '</table>';
            } else {
                print "<div>Insert into $table_name failed</div>";
            }
            mysqli_close($connect);
        }       
    ?>
</body>
</html>