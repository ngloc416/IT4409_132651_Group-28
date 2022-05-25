<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <script type="text/javascript">
        function toggleClass(el){
            var category = document.getElementsByClassName("category");
            for (let i = 0; i < category.length; i++){
                category[i].style.backgroundColor = "white";
                category[i].style.color = "black";
            }
            el.style.backgroundColor = "black";
            el.style.color = "white";

            let id = el.id.toString();
            let list_category = document.getElementsByClassName("listCategory");

            for(let i=0; i<list_category.length; i++){
    	        let category_member = list_category[i];
    	        category_member.parentElement.style.display = 'none';
            }

		    for(let i=0; i<list_category.length; i++){
		        let category_member = list_category[i];
		        if(category_member.textContent.includes(id)){
		        	category_member.parentElement.style.display = '';
		        }
		    }
        }
    </script>
</head>
<body>
    <div style="float: left; width: 450px">
        <p>Click on one or control click on multiple catetories </p>
        <div>
            <table border="1" style="width: 60%">
                <th>Click on a category to find businesses listing:</th>
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
                        print '<tr onclick="toggleClass(this);" id="'.strval($id).'" class="category">
                            <td>'.$title.'</td>
                            </tr>';
                    }  
                    ?>                
            </table>		
        </div>
    </div>  
    <div>
        <br><br><br>
        <table border="1">
            <?php 
                $selectQuery = "SELECT * FROM businesses";
                $result = mysqli_query($connect, $selectQuery);

                while($row = mysqli_fetch_array($result)){
                    print '<tr id="'.strval($row["BusinessId"]).'"><td>'.$row["BusinessId"].'</td>';
                    print '<td>'.$row["Name"].'</td>';
                    print '<td>'.$row["Address"].'</td>';
                    print '<td>'.$row["City"].'</td>';
                    print '<td>'.$row["Telephone"].'</td>';
                    print '<td>'.$row["URL"].'</td>';
                    print '<td style="display: none" class="listCategory">';
                    
                    $query1 = "SELECT * FROM biz_category WHERE BusinessId = ".$row['BusinessId'];
                    $result1 = mysqli_query($connect, $query1);
                    while ($row1 = mysqli_fetch_array($result1)){
                        print $row1["CategoryId"];
                    }
                    print '</td></tr>';
                }
            ?>
        </table>
    </div> 
</body>
</html>