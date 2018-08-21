<?php

include 'connect.php';
include 'header.php';
 
//first select the category based on $_GET['cat_id']


$sql = "SELECT
             topic_id,
            topic_subject
        FROM
            topics
        WHERE
            topics.topic_id = " . mysql_real_escape_string($_GET['id']);
 
$result = mysql_query($sql);
 
if(!$result)
{
    echo 'The topic could not be displayed, please try again later.' . mysql_error();
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'This topic does not exist.';
    }
    else
    {
        //display category data
        while($row = mysql_fetch_assoc($result))
        {
            echo '<h2>Topics in ′' . $row['topic_id'] .'</h2>';
			echo $row['topic_subject'];
        }
     
        //do a query for the topics
        $sql = "SELECT
    posts.post_topic,
    posts.post_content,
    posts.post_date,
    posts.post_by,
    users.user_id,
    users.user_name
FROM
    posts
LEFT JOIN
    users
ON
    posts.post_by = users.user_id
WHERE
    posts.post_topic = " . mysql_real_escape_string($_GET['id']);
         
        $result = mysql_query($sql);
         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>'. $row['post_topic'] . '</th>
                        <th>response22</th>
                      </tr>'; 
                     
                while($row = mysql_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                          //  echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
							 
							echo $row['user_name'].'<br/>';
							echo $row['post_content'].'<br/>';
							
/*						
						echo $row['user_id'].'<br/>';
							echo $row['user_name'].'<br/>';
	*/						 
							 /*
                               
                               ,
                               ,
                               ,
                               
							*/
                        echo '</td>';
                        echo '<td class="rightpart">';
                           // echo date('d-m-Y', strtotime($row['user_id']));
                        echo '</td>';
                    echo '</tr>';
               
			   echo '<tr>';
                   echo '<td>'  ;                 			  
				   echo '<form method="post" action="reply.php?id='. $row['post_topic'] . '">
                          <textarea name="reply-content"></textarea>
                           <input type="submit" value="Submit reply" />
                        </form>';
				   echo '</td>';


			  echo '</tr>';
			   }
        
	
			
			
			}
        
		
		}
    
	
	
	
	}

	
	
	
	
	}
 

 
include 'footer.php';
?>