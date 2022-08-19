<!DOCTYPE html>
<html>

<head>
    <title>BOOKS-sql</title>
    <link rel="stylesheet" type="text/css" href="sql/style.css">
</head>

<body>

    <section class="contact-section">
        <div class="row">
            <h2 class="contact-heading">LIBRARY </h2>
        </div>
        <div class="row" id="contact">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="contact-form">
                <div class="col span_1_of_3">

                    <p1>Give me book's number and I give you book's name in my library.</p1><br><br>
                    Book's number : <input type="text" name="number"><br><br>
                    <input type="submit" name="submit" value="Submit">

                </div>

            </form>
        </div>
    </section>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "1ccb8097d0e9ce9f154608be60224c7c";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    if (isset($_POST["submit"])) {
        $number = $_POST['number'];
        $query = "SELECT bookname,authorname FROM books WHERE number = '$number'";
        $result = mysqli_query($conn, $query);

        if (!$result) { //Check result
            $message  = 'Invalid query: ' . mysql_error() . "\n";
            $message .= 'Whole query: ' . $query;
            die($message);
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<hr>";
            echo $row['bookname'] . " ----> " . $row['authorname'];
        }

        if (mysqli_num_rows($result) <= 0)
            echo "0 result";
    }
    ?>
</body>

</html>