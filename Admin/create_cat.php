<?php
//create_cat.php
include 'connect.php';
include 'header.php';


if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo '<form method="post" action="">
    Category name: <input type="text" name="cat_name" />
    Category description: <textarea name="cat_description" /></textarea>
    <input type="submit" value="Add category" />
 </form>';
}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO categories(cat_name, cat_description)
       VALUES('" . mysql_real_escape_string($_POST['cat_name']) . "',
             '" . mysql_real_escape_string($_POST['cat_description']) . "')";
  	$result = mysql_query($sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysql_error();
    }
    else
    {
        echo 'New category successfully added.';
    }
}
        
echo '<tr>';
    echo '<td class="leftpart">';
        echo '<h3><a href="category.php?id=">Category name</a></h3> Category description goes here';
    echo '</td>';
    echo '<td class="rightpart">';                
            echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
    echo '</td>';
echo '</tr>';
include 'footer.php';
?>