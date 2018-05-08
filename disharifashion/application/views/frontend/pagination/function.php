<?php

   function pagination($query, $per_pages = 1,$pages = 1, $id, $url = '?'){        
    	$query = "SELECT COUNT(*) as `num` FROM {$query}";
    	$row = mysql_fetch_array(mysql_query($query));
    	$total = $row['num'];
       
    	$pages = ($pages == 0 ? 1 : $pages);  
    	$start = ($pages - 1) * $per_pages;								
		
    	$prev = $pages - 1;							
    	$next = $pages + 1;
        $lastpages = ceil($total/$per_pages);
    	$lpm1 = $lastpages - 1;
    	
    	$pagination = "";
    	if($lastpages > 1)
    	{	
    		$pagination .= "<ul class='pagination'>";
            $pagination .= "<li class='details'>pages $pages of $lastpages</li>";
    		
    			
    			
    				
    				for ($counter = 1; $counter <= $lastpages; $counter++)
    				{
    					if ($counter == $pages)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='id={$id}&&{$url}pages=$counter'>$counter</a></li>";					
    				}
    			
    		}
    		
    		if ($pages < $counter - 1){ 
    			$pagination.= "<li><a href='id={$id}&&{$url}pages=$next'>Next</a></li>";
                $pagination.= "<li><a href='id={$id}&&{$url}pages=$lastpages'>Last</a></li>";
    		}else{
    			$pagination.= "<li><a class='current'>Next</a></li>";
                $pagination.= "<li><a class='current'>Last</a></li>";
            }
    		$pagination.= "</ul>\n";		
    	
    
    
        return $pagination;
    } 
?>