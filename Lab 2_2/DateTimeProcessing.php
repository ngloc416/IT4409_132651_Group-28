<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Time Processing</title>
</head>
<body>
    <p>Enter your name and select date and time for the appointment</p>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        <table>
            <tr>
                <td>Your name: </td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Date: </td>
                <td>
                    <select name="date">
                        <?php
                            for ($i = 1; $i <= 31; $i++){
                                print ("<option>$i</option>");
                            }
                        ?>
                    </select>
                    <select name="month">
                        <?php
                            for ($i = 1; $i <= 12; $i++){
                                print ("<option>$i</option>");
                            }
                        ?>
                    </select>
                    <select name="year">
                        <?php
                            for ($i = 1900; $i <= 2050; $i++){
                                print ("<option>$i</option>");
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Time: </td>
                <td>
                    <select name="hour">
                        <?php 
                            for ($i = 0; $i <=23; $i++){
                                print ("<option>$i</option>");
                            }
                        ?>
                    </select>
                    <select name="minute">
                        <?php 
                            for ($i = 0; $i <=59; $i++){
                                print ("<option>$i</option>");
                            }
                        ?>
                    </select>
                    <select name="second">
                        <?php 
                            for ($i = 0; $i <=59; $i++){
                                print ("<option>$i</option>");
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><input type="submit" value="Submit"></td>
                <td align="left"><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    <?php
        if (array_key_exists("name", $_GET)){
            $name = $_GET["name"];
            $date = $_GET["date"];
            $month = $_GET["month"];
            $year = $_GET["year"];
            $hour = $_GET["hour"];
            $minute = $_GET["minute"];
            $second = $_GET["second"];

            print ("Hello $name!<br>");
            print ("You have an appointment on $hour:$minute:$second, $date/$month/$year <br>");
            print ("More information<br>");

            $hour_12 = $hour % 12;
            if ($hour < 12){
                print ("In 12 hours, the time and date is $hour_12:$minute:$second AM, $date/$month/$year <br>");
            }
            else if ($hour >= 12){
                print ("In 12 hours, the time and date is $hour_12:$minute:$second PM, $date/$month/$year <br>");
            }
            
            switch ($month){
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10:
                case 12:{
                    print ("This month has 31 days!");
                    break;
                }
                case 4:
                case 6:
                case 9:
                case 11:{
                    print ("This month has 30 days!");
                    break;
                }               
                case 2:{
                    if ($year%4 == 0){
                        if ($year%400 == 0){
                            print ("This month has 28 days!");
                        }
                        else if ($year%100 == 0 && $year%400 != 0){
                            print ("This month has 29 days!");
                        }
                        else {
                            print ("This month has 28 days!");
                        }
                    }
                    else{
                        print ("This month has 29 days!");
                    }
                    break;
                }     
            }
        }
    ?>
</body>
</html>