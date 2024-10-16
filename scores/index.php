<html>
      <head>
        
        <link rel="stylesheet" type="text/css" href="forms.css">
        <style>
        input[type='submit']{
          margin:40px;
        }
        </style>
      </head>
      <body>
      <form method='post' action='scores.php'>
      <select name='teamname'>
      <?php
      session_start();
                  $conn = mysqli_connect("mysql.hostinger.in","u939418847_score","mahabehesscores","u939418847_score");
                  if (!$conn) {
                     die("Connection failed " . mysqli_connect_error());
                  }

                  $result=mysqli_query( $conn ,"select distinct team_name from maha_behes_scores ORDER BY team_name");
                  if(!$result)
                  	die('could not read table'.mysqli_error($conn));
                   $rows=mysqli_num_rows($result);
                   for($i=0;$i<$rows;$i++)
                   {
                    $row = mysqli_fetch_row($result);
                    echo "<option value='$row[0]'> $row[0] </option>
                    ";
                   }
     mysqli_close($conn);
     ?>
     </select>
     <select name='roundnumber'>
     <option value='r1'>round 1</option>
     <option value='r2'>round 2</option>
     <option value='r3'>round 3</option>
     <option value='r4'>pre quarters</option>
     <option value='r5'>quarters</option>
     <option value='r6'>semis</option>
     <option value='r7'>finals</option>
   </select>
     <input type="submit"/>
     </form>
            </body>
</html>