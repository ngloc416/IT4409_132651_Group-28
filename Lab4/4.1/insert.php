<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert to Product</title>
</head>
<body>
    <form action="insert_result.php" method="GET">
        <table>
            <tr>
                <td><p>Item Description: </p></td>
                <td><input type="text" name="item" maxlength="40"></td>
            </tr>
            <tr>
                <td><p>Weight: </p></td>
                <td><input type="text" name="weight"></td>
            </tr>
            <tr>
                <td><p>Cost: </p></td>
                <td><input type="text" name="cost"></td>
            </tr>
            <tr>
                <td><p>Number Available: </p></td>
                <td><input type="text" name="number"></td>
            </tr>
            <tr>
                <td align="right"><input type="submit" value="Click To Submit"></td>
                <td align="left"><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>
</html>