      <?php
         $dbhost = 'localhost:3036';
         $dbuser = 'root';
         $dbpass = '';
         
         $rec_limit = 2;
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('school2');
         
         /* Get total number of records */
         $sql = "SELECT count(id) FROM student ";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'page'} ) ) {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT id, fname, reg_no ". 
            "FROM student ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
            echo "EMP ID :{$row['id']} <br> ".
               "EMP NAME : {$row['fname']} <br> ".
               "EMP SALARY : {$row['reg_no']} <br> ".
               "--------------------------------<br>";
         }
         
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"paging.php?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"paging.php?page = $page\">Next 10 Records</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"paging.php?page = $page\">Next 10 Records</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"paging.php?page = $last\">Last 10 Records</a>";
         }
         
         mysql_close($conn);
      ?>