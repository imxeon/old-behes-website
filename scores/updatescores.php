<html>
      <head>
      </head>
      <body>
            <?php
            session_start();
            extract($_POST);
              $_SESSION['flag']=0;
                 session_start();
                 if ($_SESSION['roundnumber']=='r1')
                 {
                    $round='round_1';
                    
                  }
                 else if ($_SESSION['roundnumber']=='r2')
                 {
                    $round='round_2';
                 }
                 else if ($_SESSION['roundnumber']=='r3')
                 {
                    $_SESSION['flag']=1;
                    $round='round_3';
                 }
                 else if ($_SESSION['roundnumber']=='r4')
                 {
                    $_SESSION['flag']=2;
                    $round='pre_quarter';
                 }
                 else if ($_SESSION['roundnumber']=='r5')
                 {
                    $_SESSION['flag']=2;
                    $round='quarter';
                 }
                 else if ($_SESSION['roundnumber']=='r6')
                 {
                    $_SESSION['flag']=2; 
                    $round='semis';
                 }
                 else if ($_SESSION['roundnumber']=='r7')
                  {
                    $_SESSION['flag']=2;
                    $round='finals';
                  }




                 $conn = mysqli_connect("mysql.hostinger.in","u939418847_score","mahabehesscores","u939418847_score");
                  if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                  }
                  $result=mysqli_query( $conn ,"select * from maha_behes_scores where team_name = '$_SESSION[teamname]' order by participant_name");
                  if(!$result)
                  	die('could not read table 1'.mysqli_error($conn));








                  $row = mysqli_fetch_row($result);
                  $result2=mysqli_query( $conn ,"update maha_behes_scores set ".$round."_win=$won, ".$round."_matter=$matter1, ".$round."_manner=$manner1, ".$round."_method=$method1 where participant_name='$row[1]'");
                  if(!$result2)
                  	die('could not read table 2'.mysqli_error($conn));

                  





                  $row = mysqli_fetch_row($result);
                  $result2=mysqli_query( $conn ,"update maha_behes_scores set ".$round."_win=$won, ".$round."_matter=$matter2, ".$round."_manner=$manner2, ".$round."_method=$method2 where participant_name='$row[1]'");
                  if(!$result2)
                  	die('could not read table 3'.mysqli_error($conn));
                  





                  $row = mysqli_fetch_row($result);
                  $result2=mysqli_query( $conn ,"update maha_behes_scores set ".$round."_win=$won, ".$round."_matter=$matter3, ".$round."_manner=$manner3, ".$round."_method=$method3 where participant_name='$row[1]'");
                  if(!$result2)
                  	die('could not read table 4'.mysqli_error($conn));
                  




  
                   header('Location: scoreavg.php');
                   mysqli_close($conn);
            ?>
      </body>
</html>