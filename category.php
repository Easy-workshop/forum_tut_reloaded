<?php
session_start();
include 'connect.php';

$perpage = 6;//post par page;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;

$PageSql = "SELECT * FROM topics ";
$pageres = mysql_query($PageSql);
$totalres = mysql_num_rows($pageres);




$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
$sqlcategories = "SELECT t.topic_id,t.topic_subject
                FROM
                    topics t
                WHERE
                    t.topic_cat = '".$_GET['id']."'
					group by(t.topic_id)
					order by t.topic_date desc  LIMIT $start, $perpage"; 
$resultcategories = mysql_query($sqlcategories);


?>
<!DOCTYPE html>
<html lang="fr">
    
<!-- Mirrored from forum.azyrusthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Jul 2018 18:19:42 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forum :: Home Page</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom -->
        <link href="css/custom.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->

        <!-- fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome-4.0.3/css/font-awesome.min.css">

        <!-- CSS STYLE-->
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

    </head>
    <body>

        <div class="container-fluid">

            <!-- Slider -->
            <div class="tp-banner-container">
              <div class="tp-banner" >
                <ul>
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                  <div class="tp-banner-container">
                    <div class="tp-banner" >
                      <ul>
                        <!-- SLIDE  -->
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                          <!-- MAIN IMAGE -->
                          <img src="images/slide.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                          <!-- LAYERS -->
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
                </ul>
              </div>
            </div>
            <!-- //Slider -->

           <div class="headernav">
                <div class="container">
                    <div class="row">
                        <!--
						<div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="index.php"><img src="images/logo.jpg" alt=""  /></a></div>
                        
						<div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                            
							<div class="dropdown">
                                <a data-toggle="dropdown" href="#">Borderlands 2</a> <b class="caret"></b>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Borderlands 1</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Borderlands 2</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-3" href="#">Borderlands 3</a></li>

                                </ul>
                            </div>
							
							
                        </div>-->
						

					<?php

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    echo "You are already signed in, | you can <a href='signout.php'>sign out</a> if you want.";
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
echo "<form method=\"post\" action=\"\">					
						<div class=\"col-xs-2\">

<div class=\"input-group\"><span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-user\"></i></span><input id=\"email\" type=\"text\" 
class=\"form-control\" name=\"user_name\" placeholder=\"login\">
  </div>
						</div>
						<div class=\"col-xs-2\">

<div class=\"input-group\"><span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-lock\"></i></span><input id=\"password\" type=\"password\" class=\"form-control\" name=\"user_pass\" placeholder=\"pass\">
  </div>
						
						</div>
						<div class=\"col-xs-2\">
						<button type=\"submit\" class=\"btn btn-primary\">Login</button>
						
						</div>
    					</form>";
	
	
	
	echo '
	<div class=\"col-xs-6\">
	<div class="wrap">
                                <form action="#" method="post" class="form">
                                    <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                                    <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
						</div>';
	
	}

	
	
	
	 else
    {
        /* so, the form has been posted, we'll process the data in three steps:
            1.  Check the data
            2.  Let the user refill the wrong fields (if necessary)
            3.  Varify if the data is correct and return the correct response
        */
        $errors = array(); /* declare the array for later use */
         
        if(!isset($_POST['user_name']))
        {
            $errors[] = 'The username field must not be empty.';
        }
         
        if(!isset($_POST['user_pass']))
        {
            $errors[] = 'The password field must not be empty.';
        }
         
        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
        }
        else
        {
            //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password
            $sql = "SELECT 
                        user_id,
                        user_name,
                        user_level
                    FROM
                        users
                    WHERE
                        user_name = '" . mysql_real_escape_string($_POST['user_name']) . "'
                    AND
                        user_pass = '" . sha1($_POST['user_pass']) . "'";
                         
            $result = mysql_query($sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo 'Something went wrong while signing in. Please try again later.';
                //echo mysql_error(); //debugging purposes, uncomment when needed
            }
            else
            {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if(mysql_num_rows($result) == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please try again.';
                }
                else
                {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = mysql_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['user_name']  = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }
                     
                    echo "<div class=\"col-xs-5\">";
					echo "Welcome, " . $_SESSION['user_name'] . ". <a href=\"index.php\">Proceed to the forum overview</a>.<a href='signout.php'>sign out</a> if you want.";
                    echo "</div>";
				
				

echo '<div class="col-xs-4">
							<div class="stnt pull-left">                            
                                <form action="http://forum.azyrusthemes.com/03_new_topic.html" method="post" class="form">
                                    <button class="btn btn-primary">Start New Topic</button>
                                </form>
                            </div></div>';
				

			
				echo "<div class=\"col-xs-3\">
							<div class=\"wrap\">
                                <form action=\"#\" method=\"post\" class=\"form\">
                                    <div class=\"pull-left txt\"><input type=\"text\" class=\"form-control\" placeholder=\"Search Topics\"></div>
                                    <div class=\"pull-right\"><button class=\"btn btn-default\" type=\"button\"><i class=\"fa fa-search\"></i></button></div>
                                    <div class=\"clearfix\"></div>
                                </form>
                            </div>
                        </div>";
				
				}
            }
        }
    }
}
 
	
	
	?>
						
                        <!--<div class="col-lg-4 search hidden-xs hidden-sm col-md-3">-->
                            
			
							<!--<div class="col-xs-3">
							<div class="wrap">
                                <form action="#" method="post" class="form">
                                    <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                                    <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
						-->
						
                        <!--<div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">-->
                        <!--    
							<div class="col-xs-3>
							<div class="stnt pull-left">                            
                                <form action="http://forum.azyrusthemes.com/03_new_topic.html" method="post" class="form">
                                    <button class="btn btn-primary">Start New Topic</button>
                                </form>
                            </div>
							-->
                            
							<!--
							<div class="env pull-left"><i class="fa fa-envelope"></i></div>

                            <div class="avatar pull-left dropdown">
                                <a data-toggle="dropdown" href="#"><img src="images/avatar.jpg" alt="" /></a> <b class="caret"></b>
                                <div class="status green">&nbsp;</div>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Inbox</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-3" href="#">Log Out</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-4" href="04_new_account.html">Create account</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    -->
					
					</div>
                </div>
            </div>


<!--**********MY pagination haut de page************-->

           <!-- 
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12 col-md-8">
                            <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                            <div class="pull-left">
                                <ul class="paginationforum">
                                    <li class="hidden-xs"><a href="#">1</a></li>
                                    <li class="hidden-xs"><a href="#">2</a></li>
                                    <li class="hidden-xs"><a href="#">3</a></li>
                                    <li class="hidden-xs"><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#" class="active">7</a></li>
                                    <li><a href="#">8</a></li>
                                    <li class="hidden-xs"><a href="#">9</a></li>
                                    <li class="hidden-xs"><a href="#">10</a></li>
                                    <li class="hidden-xs hidden-md"><a href="#">11</a></li>
                                    <li class="hidden-xs hidden-md"><a href="#">12</a></li>
                                    <li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>
                                    <li><a href="#">1586</a></li>
                                </ul>
                            </div>
                            <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>


-->



   <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12 col-md-8">
                            <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                            <div class="pull-left">
                                
								
								<ul class="paginationforum">
                                    <?php if($curpage != $startpage){ ?>
									<li class="hidden-xs"><a href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">First</span>
									</a>
									</li>
                                   <?php } ?>
								
                                   
								   
								   <?php if($curpage >= 2){ ?>
                                   <li class="hidden-xs"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>							   
                                   <?php } ?>
								   
								   <li class="hidden-xs"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
								
								<?php if($curpage != $endpage){ ?>
                                <li class="hidden-xs"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                                <li class="hidden-xs">
                                <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                               </a>
                               </li>
                              <?php } ?>
								
								
								</ul>
                            </div>
                           <!-- <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>-->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>


















<!--*MY débuts des éléments html: Afficher les catégories111111111111111***********-->


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <!-- POST -->
                           
                            <?php
/*dynamiser 0 post:en cours */

 while($rowcategories = mysql_fetch_assoc($resultcategories))
      {	 
	 echo " <div class=\"post\">
	                               <div class=\"wrap-ut pull-left\">
                                    <div class=\"userinfo pull-left\">
                                        <div class=\"avatar\">
                                            <img src=\"images/avatar.jpg\" alt=\"\" />
                                            <div class=\"status green\">&nbsp;</div>
                                        </div>

                                        <div class=\"icons\">
                                            <img src=\"images/icon1.jpg\" alt=\"\" /><img src=\"images/icon4.jpg\" alt=\"\" />
                                        </div>
                                    </div>
                                    <div class=\"posttext pull-left\">
  
  
  <h2><a href=\"topic.php?id=".$rowcategories['topic_id']."\">".$rowcategories["topic_subject"]."</a></h2>
                              </div>
                                    <div class=\"clearfix\"></div>
                                </div>
                                <div class=\"postinfo pull-left\">
                                    <div class=\"comments\">
                                        <div class=\"commentbg\">
                                            560
                                            <div class=\"mark\"></div>
                                        </div>

                                    </div>
                                    <div class=\"views\"><i class=\"fa fa-eye\"></i> 1,568</div>
                                    <div class=\"time\"><i class=\"fa fa-clock-o\"></i> 24 min</div>                                    
                                </div>
                                <div class=\"clearfix\"></div>
                            </div>";
	 
	 
	 
	  }
	  ?>
                       
                </div> 
    
                        <!--**********MY Categorie************-->
                        
                     
                       
                        <div class="col-lg-4 col-md-4">

                            <!-- -->
                            <div class="sidebarblock">
                                <h3>Categories</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <ul class="cats">
                                    
<!-- <li><a href="#">Trading for Money <span class="badge pull-right">20</span></a></li>-->
  <?php
/*dynamiser 1 :ok */
$sqlcat = "SELECT cat_id,cat_name,cat_description FROM categories"; 
$resultcat = mysql_query($sqlcat);
 while($rowcat = mysql_fetch_assoc($resultcat))
      {	 
	echo "<li><a href=\"category.php?id=".$rowcat['cat_id']."\">".$rowcat['cat_name']."<span class=\"badge pull-right\">20    </span></a></li>";
	}
?>
                                        
                                    </ul>
                                </div>
                            </div>



                        <!--**********MY Sondage************-->


                            <!-- -->
                            <div class="sidebarblock">
                                <h3>Poll of the Week</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <p>Which game you are playing this week?</p>
                                    <form action="#" method="post" class="form">
                                        <table class="poll">
                                            <tr>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar color1" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="50" style="width: 50%">
                                                            Call of Duty Ghosts
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="chbox">
                                                    <input id="opt1" type="radio" name="opt" value="1">  
                                                    <label for="opt1"></label>  
                                                </td>
                                           </tr>
                                         
                                       </table>
                                    </form>
                                    <p class="smal">Voting ends on 19th of October</p>
                                </div>
                            </div>

 <!--**********MY sujert actifs************-->

                            <!-- -->
                            <div class="sidebarblock">
                                <h3>My Active Threads</h3>
                                <!--<div class="divline"></div>
                                <div class="blocktxt">
                         <a href="#">This Dock Turns Your iPhone Into a Bedside Lamp</a>
                         -->
                         
                          <?php
/*dynamiser 2 -->afficher pour chaque topic le nombre de MAX(post):ok */
$sqltopic = "SELECT t.topic_subject,count(*) as nbr_post
                FROM
                    topics t, posts p
                WHERE
                    t.topic_id=p.post_topic
					group by(t.topic_id)
					order by  nbr_post desc"; 
$resulttopic = mysql_query($sqltopic);
 while($rowtopic = mysql_fetch_assoc($resulttopic))
      {	 
          echo "<div class=\"divline\"></div><div class=\"blocktxt\">
                         <a href=\"#\">".$rowtopic["topic_subject"]."</a></div>";
	  }
                                
?>								

                            </div>
                        </div>
                    </div>
                </div>

 <!--**********MY pagination bas de page************-->

<!--
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12">
                            <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                            <div class="pull-left">
                                <ul class="paginationforum">
                                    <li class="hidden-xs"><a href="#">1</a></li>
                                    <li class="hidden-xs"><a href="#">2</a></li>
                                    <li class="hidden-xs"><a href="#">3</a></li>
                                    <li class="hidden-xs"><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#" class="active">7</a></li>
                                    <li><a href="#">8</a></li>
                                    <li class="hidden-xs"><a href="#">9</a></li>
                                    <li class="hidden-xs"><a href="#">10</a></li>
                                    <li class="hidden-xs hidden-md"><a href="#">11</a></li>
                                    <li class="hidden-xs hidden-md"><a href="#">12</a></li>
                                    <li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>
                                    <li><a href="#">1586</a></li>
                                </ul>
                            </div>
                            <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

-->



 <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12 col-md-8">
                            <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                            <div class="pull-left">
                                
								
								<ul class="paginationforum">
                                    <?php if($curpage != $startpage){ ?>
									<li class="hidden-xs"><a href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">First</span>
									</a>
									</li>
                                   <?php } ?>
								
                                   
								   
								   <?php if($curpage >= 2){ ?>
                                   <li class="hidden-xs"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>							   
                                   <?php } ?>
								   
								   <li class="hidden-xs"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
								
								<?php if($curpage != $endpage){ ?>
                                <li class="hidden-xs"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                                <li class="hidden-xs">
                                <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                               </a>
                               </li>
                              <?php } ?>
								
								
								</ul>
                            </div>
                           <!-- <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>-->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </section>

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-xs-3 col-sm-2 logo "><a href="#"><img src="images/logo.jpg" alt=""  /></a></div>
                        <div class="col-lg-8 col-xs-9 col-sm-5 ">Copyrights 2018, websitename.com</div>
                        <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
                            <ul class="socialicons">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-cloud"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
    </div>

        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="../ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
 

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <script src="js/bootstrap.min.js"></script>


        <!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
        <script type="text/javascript">
            
            var revapi;

            jQuery(document).ready(function() {
                "use strict";
                revapi = jQuery('.tp-banner').revolution(
                        {
                            delay: 15000,
                            startwidth: 1200,
                            startheight: 278,
                            hideThumbs: 10,
                            fullWidth: "on"
                        });

            });	//ready

        </script>

        <!-- END REVOLUTION SLIDER -->
       <?php mysql_close(); ?>
    </body>


</html>