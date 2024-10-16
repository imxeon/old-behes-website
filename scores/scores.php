<!DOCTYPE HTML>
<html>
      <head>
        <link rel="stylesheet" type="text/css" href="forms.css">
      </head>
      <body>
            <?php
            session_start();
            extract($_POST);
            $_SESSION['teamname']=$teamname;
            $_SESSION['roundnumber']=$roundnumber;

            $conn = mysqli_connect("mysql.hostinger.in","u939418847_score","mahabehesscores","u939418847_score");
                  if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                  }

                  $result=mysqli_query( $conn ,"select * from maha_behes_scores where team_name = '$teamname' order by participant_name");
                  if(!$result)
                  	die('could not read table'.mysqli_error($conn));
                   $rows=mysqli_num_rows($result);
                   $row = mysqli_fetch_row($result);
                   
            ?>
            <form method='post' action='updatescores.php'>
                  <h3> Please check one of the following:</h3>
                  <label>Win: <input type='radio' name='won' value=1 checked>
                  <label>Loss: <input type='radio' name='won' value=0>
                    <br><br><br>
                    <?php echo "<span class='peepnames'> $row[1]</span>";?>
                    <br>
                  <label>Matter (out of 10): <input type='number' name='matter1' min='0' max='8'/></label>
                  </br>
                  <label>Manner (out of 10): <input type='number' name='manner1' min='0' max='8'/></label>
                  </br>
                  <label>Method(out of 10): <input type='number' name='method1' min='0' max='8'/></label>
                  
                  <br><br><br>
                  <?php
                  $row = mysqli_fetch_row($result);
                   echo "<span class='peepnames'> $row[1]</span>"; ?>
                  <br>
                  <label>Matter (out of 10): <input type='number' name='matter2' min='0' max='8'/></label>
                  </br>
                  <label>Manner (out of 10): <input type='number' name='manner2' min='0' max='8'/></label>
                  </br>
                  <label>Method(out of 10): <input type='number' name='method2' min='0' max='8'/></label>
                  <br><br><br>
                  <?php
                  $row = mysqli_fetch_row($result);
                   echo "<span class='peepnames'> $row[1]</span>";
                   mysqli_close($conn);
                    ?>
                   <br>
                  <label>Matter (out of 10): <input type='number' name='matter3' min='0' max='8'/></label>
                  </br>
                  <label>Manner (out of 10): <input type='number' name='manner3' min='0' max='8'/></label>
                  </br>
                  <label>Method(out of 10): <input type='number' name='method3' min='0' max='8'/></label>
                  <input type='submit'/>
            </form>
            <br><br>
            <a href="index.php">Click here to go back to main page </a>
      </body>
</html>