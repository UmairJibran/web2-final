<?php
    if(isset($_POST['send'])){
        $temp = $_POST;
        echo "Name: " . $_POST['uname'] . "<br>";
        echo "Color: " . $_POST['operator'];
    }
?>