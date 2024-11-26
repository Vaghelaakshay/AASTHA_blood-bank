<?= $heading = "ADD NEW PHOTO"; ?>
<?php require_once "header.php" ?>
<div class="form-container">
    <center>
        <h1>Upload Image </h1>
    </center>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file">Enter file Name:</label>
            <input type="text" name="fileName" id="">
        </div>
        <div class="form-group">
            <label for="file">Choose a file:</label>
            <input type="file" name="fileToUpload" id="file">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Upload" class="btn green">
        </div>
    </form>
</div>


<?php require './footer.php'; ?>

<?php
$target_dir = "../uploads/";
$uploadOk = 1;
$fileType = "";
$fileCategory = ""; // To store "photo" or "video"

// Check if file is an image or video
if (isset($_POST["submit"])) {
    $fileNames = $_POST["fileName"];
    $fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
    $newFileName = $fileNames . '.' . $fileType;
    $target_file = $target_dir . $newFileName;

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        $fileCategory = "photo";
    } else {
        // Check if file is a video
        $fileMimeType = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
        if (strpos($fileMimeType, 'video') !== false) {
            echo "File is a video - " . $fileMimeType . ".";
            $uploadOk = 1;
            $fileCategory = "video";
        } else {
            echo "File is not an image or video.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5e+7) { // Limit to 5MB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileCategory == "photo" && !in_array($fileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF photo files are allowed.";
        $uploadOk = 0;
    } elseif ($fileCategory == "video" && !in_array($fileType, ["mp4", "avi"])) {
        echo "Sorry, only MP4 & AVI video files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars($newFileName) . " has been uploaded.";
            // storeInDatabase($conn, $newFileName, $target_file, $fileCategory);
            $values = ['g_name' => $fileNames, 'g_path' => $target_file, 'g_type' => $fileCategory];
            $obj->insert('gallery', $values);
            if ($obj->getResult()) {
                echo  "<script>window.open('gallery.php','_self');</script>";
            } else {
                echo "error";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>