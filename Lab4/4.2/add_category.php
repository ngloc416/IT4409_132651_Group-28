<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <form action="add_category_result.php" method="GET">
        <table>
            <tr>
                <td><p>CatID: </p></td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td><p>Title: </p></td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td><p>Description: </p></td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>