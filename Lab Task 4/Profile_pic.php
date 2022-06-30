<!DOCTYPE html>
<html>
<head>
    <title>Change Profile Picture</title>

</head>
<body>

<fieldset>
HM Company
<div align=right>
<?php include 'include/header.php';?>
</div>
</fieldset>


<fieldset>
Account <br>
___________<br>
<div align=left>
<?php include 'include/sidebar.php';
?>
</div>
<?php

$userErr = $passErr = "";
$username = $password = "";
$pp_path = '';
$imgErr = '';
$errCount = 0;
if (isset($_SESSION['username'])) {
    if (file_exists('data.json')) {
        $data = file_get_contents("data.json");
        $array = json_decode($data);
        foreach ($array as $item) {
            if ($_SESSION['username'] === $item->username) {
                $pp_path = $item->pp;
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image_to_up"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $mime_type_arr = array('jpg', 'png', 'jpeg');
            if (in_array($imageFileType, $mime_type_arr)) {
                if ($_FILES["image_to_up"]["size"] > 4000000) {
                    $imgErr .= " Sorry, your file is larger than 4MB";
                    $uploadOk = 0;
                } else {
                    if (file_exists($target_file)) {
                        $imgErr .= " Sorry, image already exists.";
                        $uploadOk = 0;
                    } else {
                        if (move_uploaded_file($_FILES["image_to_up"]["tmp_name"], $target_file)) {
                            $pp_path = $target_file;

                            if (file_exists('data.json')) {
                                $data = file_get_contents("data.json");
                                $array = json_decode($data);
                                $user_found = false;
                                $user_edited = false;
                                foreach ($array as $item) {
                                    if ($_SESSION['username'] === $item->username) {
                                        $user_found = true;
                                        $item->pp = $pp_path;
                                        $user_edited = true;
                                    }
                                }
                                if ($user_edited) {
                                    $final_data = json_encode($array);
                                    if (file_put_contents('data.json', $final_data)) {
                                        echo "Profile Picture Updated Successfully!";
                                    }
                                }
                            }

                        } else {
                            $imgErr .= "Sorry, there was an error uploading your file.";
                        }
                    }
                }
            } else {
                $imgErr .= " Sorry, only JPG, JPEG & PNG files are allowed";
                $uploadOk = 0;
            }
        }
    }

} else{
    header('Location: Login.php');
}



?>
<fieldset>
        <legend><b>Change Profile Picture</b></legend>
    <img src="<?php echo $pp_path;?>" width="150" height="150"> <br>  <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <input type="file" id="image_to_up" name="image_to_up"><br>
            <span class="error"> <?php echo $imgErr;?></span> <br>

            <input type="submit" value="Upload Image" name="submit">

        </form><br>

</fieldset><br>

<fieldset>
 <div align=center>
<?php include 'include/footer.php';?>
</div>
</fieldset>
</body>
</html>