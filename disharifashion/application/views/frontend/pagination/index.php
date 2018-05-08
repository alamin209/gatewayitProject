<?php

   
    include_once ('function.php');

    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 12;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`records` where `active` = 1";
?>

	
    
        <?php
            
            $query = mysql_query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
            
        	while ($row = mysql_fetch_assoc($query)) {
        ?>
            <!-- show your pro -->
        <?php    
            }
        ?>
   

<?php
	echo pagination($statement,$limit,$page);
?>
