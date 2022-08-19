<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="resources/css/style.css">
      <title>fileinclusion </title>
   </head>

   <body>    
      <div class="row"; style="background-color: aliceblue;padding:15px;">
      
      <div align="center"><b><h3>ABOUT</h3></b></div>
      <div align="center">
      <a href=lvl1.php?file=1.php><button>HI?</button></a>
      <a href=lvl1.php?file=2.php><button><----HELLO!</button></a>
      </div>
      
      <?php
        echo "</br></br>";
        
        if (isset( $_GET[ 'file' ]))        
        {
          @include($_GET[ 'file' ]);
          echo"<div align='center'><b><h5>".$_GET[ 'file' ]."</h5></b></div> ";       
        }
      ?>
   </body>
</html>

