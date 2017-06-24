<?php require_once('Connections/conn_rccgvic.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "ask_pastor")) {
  $insertSQL = sprintf("INSERT INTO AskPastor (name, ReachGuest, MsgForPastor) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['reach_you'], "text"),
                       GetSQLValueString($_POST['question'], "text"));

  mysql_select_db($database_conn_rccgvic, $conn_rccgvic);
  $Result1 = mysql_query($insertSQL, $conn_rccgvic) or die(mysql_error());
}
?>
<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<link href="css/rccgvic.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/rccgvic.css" rel="stylesheet" type="text/css">
<head>
<title>RCCGVIC: Ask Pastor</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/jquery.scrolly.min.js"></script>
	<script src="js/jquery.scrollgress.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-wide.css" />
		<link rel="stylesheet" href="css/style-noscript.css" />
	</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
	
		<!-- Header -->
			<header id="header">
				<h1 id="logo"><a href="index.php">Victory <span>International Center</span></a></h1>
				<nav id="nav">
                <ul>
						<li><a href="index.php">Welcome</a></li>
                        <li class=""><a href="#">About Us</a>
                        	<ul>
								<li><a href="TheChurch.php">The Church</a></li>
                                <li><a href="OurVision.php">Our Vision</a></li>
								<li><a href="OurBeliefs.php">Our Beliefs</a></li>
								<li><a href="">Our Leadership</a></li>
                                <li><a href="pastor.php">Our Pastor</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="#">Connect</a>
                        	<ul>
								<li class="current"><a href="AskPastor.php">Ask the Pastor</a></li>
                                <li><a href="">Prayer Requests</a></li>
								<li><a href="">Testimonies</a></li>
								<li><a href="donation.php">Online Donations</a></li>
                                <li><a href="">Invite a Friend</a></li>
                                <li><a href="">Counselling</a></li>
                                <li><a href="">Feedback</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="#">Events</a>
                        	<ul>
                        		<li><a href="">Calendar</a></li>
                                <li><a href="">RCCGNA</a></li>
                          </ul>
                        </li>
                        <li class=""><a href="#">Grow</a>
                        	<ul>
								<li><a href="">Bible in a year</a></li>
                                <li><a href="">Audio Bible</a></li>
								<li><a href="">Sermons</a></li>
                                <li><a href="">Online Resources</a></li>
                                <li><a href="">Prayer Points</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="#">Serve</a>
                        	<ul>
								<li><a href="">Ushering</a></li>
                                <li><a href="">Technical</a></li>
								<li><a href="">Prayer</a></li>
								<li><a href="">Pastoral Care</a></li>
                                <li><a href="">Children</a></li>
                                <li><a href="">Youth</a></li>
                                <li><a href="">Young Adult</a></li>
								<li><a href="">Drama</a></li>
                                <li><a href="">Men of valor</a></li>
								<li><a href="">Women</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="index.php">I'm New</a></li>
                        <li class=""><a href="contactus.php">Contact</a></li>
					</ul>
                
					<!--<ul>
						<li class="current"><a href="index.html">Welcome</a></li>
						<li class="submenu">
							<a href="">Layouts</a>
							<ul>
								<li><a href="left-sidebar.html">Left Sidebar</a></li>
								<li><a href="right-sidebar.html">Right Sidebar</a></li>
								<li><a href="no-sidebar.html">No Sidebar</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li class="submenu">
									<a href="">Submenu</a>
									<ul>
										<li><a href="#">Dolore Sed</a></li>
										<li><a href="#">Consequat</a></li>
										<li><a href="#">Lorem Magna</a></li>
										<li><a href="#">Sed Magna</a></li>
										<li><a href="#">Ipsum Nisl</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#" class="button special">Sign Up</a></li>
					</ul>-->
				</nav>
			</header>
		
		<!-- Main -->
			<article id="main">
			  <!-- One -->
			  <section class="wrapper style4 container">
			    <!-- Content -->
			    <div class="content">
			      <section>
			        <p>Ask Pastor</p>
			        <form action="<?php echo $editFormAction; ?>" method="POST" name="ask_pastor" id="ask_pastor">
			          <table width="200" border="1">
			            <tr>
			              <td>Name:</td>
			              <td><label for="name"></label>
			                <input name="name" type="text" id="name"></td>
		                </tr>
			            <tr>
			              <td>How to reach you:</td>
			              <td><label for="reach_you"></label>
			                <input name="reach_you" type="text" id="reach_you"></td>
		                </tr>
			            <tr>
			              <td>Question:</td>
			              <td><label for="question"></label>
		                  <textarea name="question" rows="5" type="textarea" id="question"></textarea>
                          </td>
		                </tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <tr>
                        
                        </tr>
			            <tr>
			              <td>&nbsp;</td>
			              <td><input type="submit" name="submit" id="submit" value="Submit">
                          </td>
		                </tr>
			            <tr>
			              <td>&nbsp;</td>
			              <td>&nbsp;</td>
		                </tr>
		              </table>
			          <input type="hidden" name="MM_insert" value="ask_pastor">
		            </form>
			        <p>&nbsp;</p>
			      </section>
		        </div>
		      </section>
			  <!-- Two -->
					<section class="wrapper style1 container special">
						<div class="row">
							<div class="4u 12u(2)"></div>
						</div>
			  </section>
					
	</article>

		<!-- Footer -->
			<footer id="footer">
			
				<ul class="icons">
					<li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
					<li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
					<li><a href="#" class="icon circle fa-dribbble"><span class="label">Dribbble</span></a></li>
				</ul>
				
				<ul class="copyright">
					<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			
			</footer>

	</body>
</html>