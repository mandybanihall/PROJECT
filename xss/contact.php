<!DOCTYPE html>
<html>

<head>
  <title>CONTACT-xss</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <section class="contact-section">
    <div class="row">
      <h2 class="contact-heading">CONTACT US </h2>
    </div>
    <div class="row" id="contact">
      <form method="get" action="#" class="contact-form">

        <div class="col span_1_of_3"><label for="username">Name </label></div>
        <div class="col span_2_of_3"><input type="text" name="username" id="name" placeholder=" your name" required></div><br>

        <div class="col span_1_of_3"><label for="message">Drop your message/query </label></div>
        <div class="col span_2_of_3"><textarea name="message" id="message" placeholder="your message" required></textarea></div>

        <div class="col span_2_of_3" class="btn btn-full"><input type="submit" name="submit" value="Submit"></div>
      </form>
    </div>
  </section>

  <div class="php">
    <?php
    if (isset($_GET["username"]))
      echo ("Your Name is " . $_GET["username"])
    ?>
    <br>
    <?php
    if (isset($_GET["message"]))

      echo ("Your Message is " . $_GET["message"])
    ?>
  </div>
</body>

</html>