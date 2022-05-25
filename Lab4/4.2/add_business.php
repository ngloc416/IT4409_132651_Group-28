<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business</title>
    <script type="text/javascript">
		function toggleClass(el) {
            let str = el.id.toString();
            el.style.backgroundColor = "black";
            el.style.color = "white";
            document.getElementById("category").value += str + " ";
		}
	</script>
</head>
<body>
    <div style="float: left; width: 250px">
        <p>Click on one or control click on multiple catetories <p><br/>
        <div>
            <table border="1" style="overflow: scroll; width: 100%">
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
                        $title = $row["Title"];
                        print '<tr onclick="toggleClass(this);" id="'.strval($id).'">
                            <td>'.$title.'</td>
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
                <td><input type="text" name="address"></td>
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
                <td><input type="text" name="category" id="category" value="" style="display: none"></td>
            </tr>
        </table>	        
        </form>
    </div> 
    <?php
        if (array_key_exists("name", $_GET)){
            $name = $_GET["name"];
            $address = $_GET["address"];
            $city = $_GET["city"];
            $telephone = $_GET["telephone"];
            $url = $_GET["url"];

            $category_list = explode(" ",$_GET["category"]);
            $cate_list = array();
            for ($i = 0; $i < sizeof($category_list); $i++){
                $tmp = strval($category_list[$i]);
			    array_push($cate_list, $tmp);
            }

            $server = 'localhost';
            $user = 'root';
            $pass = '';
            $mydb = 'lab4';

            $connect = mysqli_connect($server, $user, $pass, $mydb);
            if (!$connect){
                die ("Failed connection!");
            }
            else{
                $insertQuery = "INSERT INTO businesses VALUES (null, '$name','$address', '$city', '$telephone', '$url' )";
                mysqli_query($connect, $insertQuery);
                
                $query = "SELECT * FROM businesses WHERE Name = '$name'";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($result);
                $id = $row["BusinessId"];

                for ($i = 0; $i < sizeof($cate_list); $i++ ){
                    $cate = $cate_list[$i];
                    $query = "INSERT INTO biz_category VALUES ($id, '$cate')";
                    mysqli_query($connect, $query);
                }
                
            }
            mysqli_close($connect);
        }
    ?>
</body>
</html>