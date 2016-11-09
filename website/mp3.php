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
			if (empty($_GET)) {
				$_GET['param'] = 'alpha';
				$_GET['alpha'] = 'all';
			}
			$param=$_GET['param'];
			$alpha;$sql; $id;$name;$hero; $year;
			if ($param == 'alpha')
			{
					$alpha=$_GET['alpha'];
					
			}
			elseif ($param == 'hr') {
				$hero=$_GET['hr'];
				
			}
			elseif ($param == 'yr') {
				$year=$_GET['yr'];
				
			}
			echo "<title>cineyaam.com:search</title>";
			?>
			<title>CineYaan.com</title>
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
        		<li><a href="news.php">News</a></li>
         	   	<li><a href="movies.php">Movies</a></li>
         	   	<li><a href="trailers.php">Trailers</a></li>
         	   	<li class="start selected"><a href="mp3.php">MP3</a></li>
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
				$select_query=          "Select year from mp3songs group by year order by year DESC";
				
				$rs =mysqli_query($conn, $select_query);
				
				echo "<select name='year' onchange='location = this.options[this.selectedIndex].value;'>";
				echo "<option value='mp3.php' selected='selected'>--year--</option>";
				while ($row_data = mysqli_fetch_array($rs))
				{
					$year1 = $row_data['year'];
					echo $year;
					echo "<option value='mp3.php?param=yr&yr=$year1' >".$year1."</option>";
				}
				echo "</select>";
					?>
          	  	</div>
        	</ul>
	</div>
    </nav>
    <table bgcolor='FFFFFF' >
    	<tr>
    		 		<td width="15%"></td>
    		<?php
    		if($param == 'alpha' )
			{
			
			if ($alpha=='num')
			{
    			echo "<td ><a style='font-family:Georgia, Garamond, Serif;color:#00A0EB; :hover {background: #ffffff}' href='mp3.php?param=alpha&alpha=num'>#</a></td>";
				$sql = "SELECT * FROM `mp3songs` WHERE (NAME REGEXP '^[0-9].*') ORDER BY sno DESC";
			}
			else
				{
				echo "<td ><a style='text-decoration:none; font-family:Georgia, Garamond, Serif;color:#00A0EB; :hover {background: #ffffff}' href='mp3.php?param=alpha&alpha=num'>#</a></td>";
				$sql = "SELECT * FROM `mp3songs` WHERE (NAME REGEXP '^$alpha') ORDER BY sno DESC";
				}
    			foreach (range('A', 'Z') as $char) 
    			{
				    if ($alpha==$char)
				    	echo "<td><a style='font-family:Georgia, Garamond, Serif;color:#00A0EB;' href='mp3.php?param=alpha&alpha=$char'>$char</a></td>";
					else {
						echo "<td><a style='text-decoration:none; font-family:Georgia, Garamond, Serif;color:#00A0EB;' href='mp3.php?param=alpha&alpha=$char'>$char</a></td>";
					}
				}
				if ($alpha == 'all') {
				$sql = "SELECT * FROM `mp3songs` order by sno DESC LIMIT 100";
				
			}
				
			}
			elseif ($param == 'yr') {
				$sql = "SELECT * FROM `mp3songs` WHERE year='$year' order by name";
				echo "<td ><a style='text-decoration:none;font-family:Georgia, Garamond, Serif;color:#00A0EB; :hover {background: #ffffff}' href='mp3.php?param=alpha&alpha=num'>#</a></td>";
				foreach (range('A', 'Z') as $char) 
    			{
				    
						echo "<td><a style='text-decoration:none; font-family:Georgia, Garamond, Serif;color:#00A0EB;' href='mp3.php?param=alpha&alpha=$char'>$char</a></td>";
					
				}
				
			}
			
			
			
			?>
 		<td width="15%"></td>
    	</tr>
    	<tr><td bgcolor="00A0EB" height="2px" colspan="29"></td></tr>
	</table>
	
    <div bgcolor="">
	<table width="10%" bgcolor="" >
    	<tr>
    		
    		<td width="70%" bgcolor='FFFFFF'>
    <table border="0" cellspacing="6" cellpadding="3">
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

$rs = mysqli_query($conn, $sql);

  $rows = mysqli_num_rows($rs);
  	
  	while ($row_data = mysqli_fetch_array($rs))
	{
		echo "<tr>";
	$link = $row_data['link'];
  $name = $row_data['name'];
  $year = $row_data['year'];
  echo "<td align='left' style='text-decoration:none;color=black;font-family:Georgia, Garamond, Serif;'>$name</td>";
  echo "</td><td align='right'><a href='$link'><image src='images/download.jpg' style='width:100px;height:25px;'></a></tr><tr ><td bgcolor='00A0EB' height='2px' colspan='2'></tr>";
  
  }


 ?>
	 
	</table></td>
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