<?php
    require_once('connection.php');
?>
<html>
    <head>
        <title>Post an Item</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Sulphur+Point:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/master.css">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron"><a href="posting_item.php" class="btn btn-primary">Post Item</a></div>
            <form method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" name="catname" required placeholder='Category' class='form-control'>
                <input type="submit" name='addcat' value="Post Item" class='btn btn-lg btn-primary'>
            </form>
        </div>
    </body>
</html>

<?php
    if(isset($_POST['addcat'])){
        $name = $_POST['catname'];
        $query = "INSERT INTO `categories` (`id`, `name`) VALUES (NULL, '$name')";
        $result = $conn->query($query);
        header("location:postin_item.php");
    }
?>