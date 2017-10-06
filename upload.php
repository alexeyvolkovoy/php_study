<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 8/25/17
 * Time: 8:12 PM
 */
echo <<<_END
<html><head><title>PHP-form to upload files on server</title></head>
<body>
<form method='post' action='upload.php' enctype="multipart/form-data">
Choose a file : <input type="file" name="filename" size="10">
<input type="submit" value="Upload">
</form>

_END;

if ($_FILES)
{
    $name=$_FILES['filename']['name'];
    move_uploaded_file($_FILES['filename']['tmp_name'], $name);
    echo "Uploaded image '$name'<br/><img src='$name' width='300'>";
}

echo "</body></html>";