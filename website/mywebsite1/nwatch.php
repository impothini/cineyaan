<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="script.js"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
    <script type='text/javascript' src='custom.js'></script>
    <link type='text/css' rel='stylesheet' href='overlaypopup.css' />
</head>
		<body>
			<?php 
			$id=$_GET['id'];
			$name=$_GET['title'];
			$ty =$_GET['ty'];
			$table = 'news';
			if ($ty == 'trlr')
			{
				$table = 'trailers';
			}
			echo "<title>$name:cineyaam.com</title>";
			?>
			
			<table><tr>
				<td width="10%"><div id=""> </div></td>		
	<td width="80%"><div id="container">
    <header>
	<div class="width">
    		<h1><a href="home.php">CineYaan<span>.com</span></a></h1>
    </div>
    </header>
    <nav>
	<div class="width">
    		<ul>
        		<li><a href="home.php">Home</a></li>
        		<?php
        		if ($ty == 'news')
					echo '<li class="start selected"><a href="news.php?videos=all">News</a></li>';
				else
					echo '<li><a href="news.php">News</a></li>';
        		?>
         	   	<li><a href="movies.php">Movies</a></li>
         	   	<?php
        		if ($ty == 'trlr')
					echo '<li class="start selected"><a href="trailers.php">Trailers</a></li>';
				else
					echo '<li><a href="trailers.php">Trailers</a></li>';
        		?>
         	   	<li ><a href="mp3.php">MP3</a></li>
          	  	<li class="end"><a href="contact.php">Contact</a></li>
          	  	  	<div align="right">
          	  	<?php
          	  	
          	  	$servername = "localhost";
				$username = "root";
				$password = "ericsson549";
				$dbname = "website";
          	  	$conn = mysqli_connect($servername, $username, $password, $dbname);
				$conn->set_charset("utf8");
				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}
          	  	?>
          	 </div>
        	</ul>
	</div>
    </nav>
    <div bgcolor="">
	<table bgcolor="" >
    	<tr>
    		<td width="70%">
    			<table border="2px" bordercolor="#00A0EB" style="border-collapse: collapse;" >
    				<tr width='460' bgcolor="#58ACFA"><td>
    					<table >
    				<tr><td><font style="color: white"><?php echo "$name"; ?></font></td></tr>
    				<tr height="315" bgcolor="#000"><td>
    				<div align="center">
    				<?php echo"<iframe width='620' height='415' src='//www.youtube.com/embed/$id?iv_load_policy=3' frameborder='0' allowfullscreen></iframe>"; ?>
    			</div></td></tr>
    			</table>
    			</td></tr>
<?php 
			$servername = "localhost";
			$username = "root";
			$password = "ericsson549";
			$dbname = "website";
			$sql = "SELECT * FROM $table order by timestamp DESC LIMIT 10";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$rs = mysqli_query($conn, $sql);

  $rows = mysqli_num_rows($rs);
  $i=0;
  	while ($row_data = mysqli_fetch_array($rs))
	{
	$id = $row_data['id'];
  	$name = $row_data['name'];
	
  echo "<tr><td><table><tr>";
  //echo "<td width='2px' bgcolor='00A0EB'></td>";
  echo "<td width='700'><table><tr><td border='3' width=105px><a style='text-decoration:none; color:black; font-family:Georgia, Garamond, Serif;' href='nwatch.php?id=$id&title=$name&ty=$ty'><img src='http://img.youtube.com/vi/$id/mqdefault.jpg'style='border-radius:10px;width:100px;height:75px;'></td>";
  echo "<td align='left'><a class='news' style='text-decoration:none; color:#222222; font-family:Georgia, Garamond, Serif;font-weight:normal; font-size:6' href='nwatch.php?id=$id&title=$name&ty=$ty'> <b><h5>$name</a></h5></b></td></a></tr></table></td>";
  //echo "<td width='2px' bgcolor='00A0EB'></td>
  echo "</tr></table></td></tr>";
  //echo "<tr><td bgcolor='00A0EB' height='2px' colspan=2></td><td width='2px'></td><td bgcolor='00A0EB' height='2px'></td></tr>";
    }
	



 ?>
	     			</table>

	</td>
	<td width="30%"></td></tr></table>
	</div>
    <footer>
       <font color="white" size="2"><div align="center">DISCLAIMER:</div> <a style='text-decoration:none;' href='home.php'>www.cineyaan.com</a> &nbsp do not host any of the videos that are available on this website. We link them from youtube. &nbsp These videos are uploaded to those source by the community at large and not by us.&nbsp We accept no responsibility for how you or anyone else may use this information on the <a style='text-decoration:none;' href='home.php'>cineyaan.com</a>. &nbspPlease write to us, if you feel that any video on this website has objectionable content or violating your copyrights. &nbsp Those videos shall be promptly removed from our website. &nbsp All the Movies and other posts may not be available at all the time. &nbsp Thank you. 
       	<div align="center">
       		<a href="home.php">http://www.cineyaan.com</a>
       	</div>
       </font>
    </footer>
</td>
<td width="10%"><div id=""> </div></td>
</tr></table>
</body>
</html>