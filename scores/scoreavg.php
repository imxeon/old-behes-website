<html>
      <head>
      </head>
      <body>
            <?php
            session_start();
            extract($_POST);
              



                 $conn = mysqli_connect("mysql.hostinger.in","u939418847_score","mahabehesscores","u939418847_score");
                  if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                  }
                  $result=mysqli_query( $conn ,"select * from maha_behes_scores where team_name = '$_SESSION[teamname]' order by participant_name");
                  if(!$result)
                  	die('could not read table 1'.mysqli_error($conn));






                  $row = mysqli_fetch_row($result);
                  if ($_SESSION['flag']==1){
                    $avg=($row[3]+$row[4]+$row[5]+$row[6]+$row[7]+$row[8]+$row[9]+$row[10]+$row[11])/3;
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set group_average=$avg where participant_name='$row[1]'");
                    if(!$result2)
                      die('could not read table 2'.mysqli_error($conn)); 
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set outrounds_average=$avg where participant_name='$row[1]'");
                    if(!$result2)
                      die('could not read table 2'.mysqli_error($conn));
                  }
                  else if ($_SESSION['flag']==2)
                  {
                    $total=0;
                    $j=3;
                    $divider=1;
                    while(($row[$j]!=NULL) && ($j<24))
                    {
                      $total=$total+$row[$j];
                      if (($j%3==0) && ($j!=3))
                      {
                        $divider++;
                      } 
                     $j++;
                    }  
                    echo "$j<br>$divider<br>";
                    $total=$total/$divider;
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set outrounds_average=$total where participant_name='$row[1]'"); 
                  }





                  $row = mysqli_fetch_row($result);
                 
                  if ($_SESSION['flag']==1){
                    $avg=($row[3]+$row[4]+$row[5]+$row[6]+$row[7]+$row[8]+$row[9]+$row[10]+$row[11])/3;
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set group_average=$avg where participant_name='$row[1]'");
                    if(!$result2)
                      die('could not read table 2'.mysqli_error($conn)); 
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set outrounds_average=$avg where participant_name='$row[1]'");
                    if(!$result2)
                      die('could not read table 2'.mysqli_error($conn));
                  }
                  else if ($_SESSION['flag']==2)
                  {
                    $total=0;
                    $divider=1;
                    $j=3;
                    while($row[$j]!=NULL && $j<24)
                    {
                      $total=$total+$row[$j];
                      if ($j%3==0 && $j!=3)
                      $divider++;
                      $j++;
                    }  
                    echo "$j<br>$divider<br>";

                    $total=$total/$divider;
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set outrounds_average=$total where participant_name='$row[1]'"); 
                  }







                  $row = mysqli_fetch_row($result);
                 
                  if ($_SESSION['flag']==1){
                    $avg=($row[3]+$row[4]+$row[5]+$row[6]+$row[7]+$row[8]+$row[9]+$row[10]+$row[11])/3;
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set group_average=$avg where participant_name='$row[1]'");
                    if(!$result2)
                      die('could not read table 2'.mysqli_error($conn)); 
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set outrounds_average=$avg where participant_name='$row[1]'");
                    if(!$result2)
                      die('could not read table 2'.mysqli_error($conn));
                  }
                  else if ($_SESSION['flag']==2)
                  {
                    $total=0;
                    $j=3;
                    $divider=1;
                    while($row[$j]!=NULL && $j<24)
                    {
                      $total=$total+$row[$j];
                      if ($j%3==0 && $j!=3)
                        $divider++;
                      $j++;
                    }  
                    echo "$j<br>$divider<br>";
                    $total=$total/$divider;
                    $result2=mysqli_query( $conn ,"update maha_behes_scores set outrounds_average=$total where participant_name='$row[1]'");                    
                  }







                  session_destroy();
                   header('Location: index.php');
                   mysqli_close($conn);
            ?>
      </body>
</html>