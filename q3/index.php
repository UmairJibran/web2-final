<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form method="POST">
        <label for="Num1">Number  1</label>
        <input type="number" name="num1" id="Num1" required>
        <label for="Num2">Number  2</label>
        <input type="number" name="num2" id="Num2" required>
        <select name="operator">
            <option value="add">+</option>
            <option value="sub">-</option>
            <option value="mul">*</option>
            <option value="div">/</option>
        </select>
        <input type="submit" value="Calculate" name="calc">
    </form>
</body>
</html>

<?php
    if(isset($_POST['calc'])){
        $operator = $_POST['operator'];
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result=0;
        switch($operator){
            case 'add':{
                $result = $num1 + $num2;
                break;
            }
            case 'sub':{
                $result = $num1 - $num2;
                break;
            }
            case 'mul':{
                $result = $num1 * $num2;
                break;
            }
            case 'div':{
                $result = $num1 / $num2;
                break;
            }
            default:{
                echo "invalid";
            }
        }
        if($result) echo $result;
    }
?>