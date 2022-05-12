<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business</title>
    <script type="text/javascript">
		function toggleClass(el) {

		}
	</script>
</head>
<body>
    <div style="float: left; width: 250px">
        <p>Click on one or control click on multiple catetories <p><br />
        <div style="overflow: scroll; width:80%;">
            <table border="1" width="100%" class="gridview">
                <?php 
                    $server = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $mydb = 'lab4';
                    $table_name = 'categories';
                    $connect = mysqli_connect($server, $user, $pass, $mydb);
                    $query = "SELECT * FROM categories";
                    
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($result)){
                        $id = $row["CategoryID"];
                        print '<tr onclick="toggleClass(this);" id="'.strval($id).'"
                            <td>'.$id.'</td><br>
                            </tr>';
                    }  
                    ?>                
            </table>		
        </div>
    </div>  
    <div>
        <form action="add_business.php" method="GET">
            <table id="table-right">
            <tr>
                <td>Business name: </td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><input type="text" name="adress"></td>
            </tr>
            <tr>
                <td>City: </td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td>Telephone: </td>
                <td><input type="text" name="telephone"></td>
            </tr>
            <tr>
                <td>URL: </td>
                <td><input type="text" name="url"></td>
            </tr>
            <tr>
                <td><input type="submit" name="add_business" value="Add Business"></td>                
                <td><input type="text" name="category" id="category"></td>
            </tr>
        </table>	        
        </form>
    </div> 
</body>
</html>