<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>

<body>
    <section class="contact-section">
        <div class="row" align="center">
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                    <br>
                    <b>Select image : </b>
                    <input type="file" name="file" id="file" style="border: solid;">
                    <input type="submit" value="Submit" name="submit">
                </form>
            </div>
        </div>
    </section>
    <?php

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        echo "File uploaded /uploads/" . $_FILES["file"]["name"];
    }
    ?>
</body>

</html>