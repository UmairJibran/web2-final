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
            <div class="jumbotron"><a href="add.php" class="btn btn-primary">Add Category</a></div>
            <form method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" name="name" required placeholder='Item Name' class='form-control'>
                    <select name="category" id="cat">
                        <?php
                            $sql = "SELECT * FROM `categories`";
                            $res1 = $conn->query($sql);
                            $rows = $res1->num_rows;
                            if($rows >= 1){
                                while ($data = $res1    ->fetch_assoc()){
                                    $name = $data['name'];
                                    echo "<option value=$name>$name</option>";
                                }
                            }
                        ?>
                    </select>    
                </div>
                <br>
                <div class="form-group col-3" style='float:right;'>
                    <label for="image">Choose Product Image</label>
                    <input type="file" id='image' name='fileToUpload' required>
                </div>
                <br>
                <input type="submit" name='postitem' value="Post Item" class='btn btn-lg btn-primary'>
            </form>
        </div>
    </body>
</html>

<?php
    if(isset($_POST['postitem'])){
        $name = $_POST['name']; 
        $category = $_POST['category'];
        $image = '';
        $file = $_FILES['fileToUpload'];
        $fileName = $file['name'];
        $fileTempName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExt = explode('.',$fileName);
        $fileActulaExtension = strtolower(end($fileExt));
        $allowed = array('jpg','png','jpeg');
        if(in_array($fileActulaExtension,$allowed)){
            echo 'Valid Extension<br>';
            if($fileError === 0){
                echo 'No Error Encountered <br>';
                if($fileSize < 500000){
                    echo 'Reasonable Size<br>';
                    $fileNameNew = uniqid('',true) . '.' . $fileActulaExtension;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    echo 'uploading...';
                    move_uploaded_file($fileTempName,$fileDestination);
                    $image = $fileDestination;
                    $query = "INSERT INTO `items` (`name`, `category`,`image`) VALUES ('$name','$category','$image')";
                    $result = $conn->query($query);
                    $result = $conn->query($query);
                }else{
                    echo 'Your Image was tooo big<br>';
                }
            }else{
                echo "There was an error uploading the image<br>";
            }
        }else{
            echo "This is Extension is not allowed<br>";
        }
    }
?>