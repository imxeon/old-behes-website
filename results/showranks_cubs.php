<html>
      <head>
        <link rel="stylesheet" type="text/css" href="tablestyle.css">
      </head>
      <body>
        <a href="index.php">Click here to go back to main page </a>
        <br>
      <table border="1">
        <tr>
          <th>Team Name</th>
          <th>Participant Name</th>
          <th>Team category</th>
          <th>Wins</th>
          <th>round 1 score</th>
          <th>round 2 score</th>
          <th>round 3 score</th>
          <th>pre quarters score</th>
          <th>quarters score</th>
          <th>semis score</th>
          <th>finals score</th>
          <th>Groups average</th>
          <th>Total Average</th>
        </tr>

      <?php
      session_start();
                  $conn = mysqli_connect("mysql.hostinger.in","u939418847_score","mahabehesscores","u939418847_score");
                  if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                  }

                  $result=mysqli_query( $conn ,"select * from maha_behes_scores where division='Cubs' order by outrounds_average desc");
                  if(!$result)
                  	die('could not read table'.mysqli_error($conn));
                   $rows=mysqli_num_rows($result);
                   for($i=0;$i<$rows;$i++)
                   {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    for($j=0;$j<3;$j++)
                    {
                      echo "<td>$row[$j]</td>";
                    }
                    $ans=$row[26]+$row[27]+$row[28]+$row[29]+$row[30]+$row[31]+$row[32];
                     echo "<td>$ans</td>";
                    for($j=3;$j<24;$j=$j+3)
                    {
                      $sum=$row[$j]+$row[$j+1]+$row[$j+2];
                      echo "<td>$sum</td>";
                    }
                    for($j=24;$j<26;$j++)
                    {
                      echo "<td>$row[$j]</td>";
                    }     
                    echo "</tr>";
                   }
     mysqli_close($conn);
     ?>

   </table>
   

  </body>
</html>