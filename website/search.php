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
         	   	<li class="start selected"><a href="movies.php">Movies</a></li>
         	   	<li><a href="trailers.php">Trailers</a></li>
         	   	<li ><a href="mp3.php">MP3</a></li>
          	  	<li class="end"><a href="contact.php">Contact</a></li>
          	  	    <div align="right" style="vertical-align: middle">
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
				$select_query=          "Select year from movies group by year order by year DESC";
				
				$rs =mysqli_query($conn, $select_query);
				
				echo "<select name='year' onchange='location = this.options[this.selectedIndex].value;'>";
				echo "<option value='movies.php' selected='selected'>--year--</option>";
				while ($row_data = mysqli_fetch_array($rs))
				{
					$year1 = $row_data['year'];
					echo $year1;
					echo "<option value='search.php?param=yr&yr=$year1' >".$year1."</option>";
				}
				echo "</select>";
				$select_query=          "Select hero from movies group by hero having count(hero) >=5";
				
				$rs =mysqli_query($conn, $select_query);
			
				echo "<select name='hero' onchange='location = this.options[this.selectedIndex].value;'>";
				echo "<option value='movies.php' selected='selected' style='align:center;'>--hero--</option>";
				while ($row_data = mysqli_fetch_array($rs))
				{
					$hero1 = $row_data['hero'];
					echo "<option value='find.php?param=hr&hr=$hero1' >".$hero1."</option>";
				}
          	  	
          	  	echo "</select>";?>
          	  &nbsp</div>
          	 <div>
          	 	<font style='text-decoration:none;color: #FFFFFF;font-family:Georgia, Garamond, Serif';>
          	 	<?php 
          	 		$sql = "select count(sno) from movies;";
					$rs =mysqli_query($conn, $sql);
					$row_data = mysqli_fetch_array($rs);
					$num = $row_data['count(sno)'];
					echo "$num movies";          	 	
          	 	?>
          	 	&nbsp</font>
          	 	</div>
          	 </div>
          	  	</div>
        	</ul>
	</div>
    </nav>
    <table bgcolor='FFFFFF' >
    	<tr>
    		<td width="15%"></td>
    		<?php
    		if($param == 'alpha')
			{
					
    		if ($alpha=='num')
				{
    			echo "<td ><a style='font-family:Georgia, Garamond, Serif;color:#00A0EB; :hover {background: #ffffff}' href='search.php?param=alpha&alpha=num'>#</a></td>";
				$sql = "SELECT * FROM `movies` WHERE (NAME REGEXP '^[0-9].*') ORDER BY year DESC";
				}
			else
				{
				echo "<td ><a style='text-decoration:none; font-family:Georgia, Garamond, Serif;color:#00A0EB; :hover {background: #ffffff}' href='search.php?param=alpha&alpha=num'>#</a></td>";
				$sql = "SELECT * FROM `movies` WHERE (NAME REGEXP '^$alpha') ORDER BY year DESC";
				}
    			foreach (range('A', 'Z') as $char) 
    			{
				    if ($alpha==$char)
				    	echo "<td><a style='font-family:Georgia, Garamond, Serif;color:#00A0EB;' href='search.php?param=alpha&alpha=$char'>$char</a></td>";
					else {
						echo "<td><a style='text-decoration:none; font-family:Georgia, Garamond, Serif;color:#00A0EB;' href='search.php?param=alpha&alpha=$char'>$char</a></td>";
					}
				
				}
							
				
			}
			elseif ($param == 'yr') {
				$sql = "SELECT * FROM `movies` WHERE year='$year' order by NAME";
				echo "<td width='2%'><a style='text-decoration:none; font-family:Georgia, Garamond, Serif;color:#00A0EB; :hover {background: #ffffff}' href='search.php?param=alpha&alpha=num'>#</a></td>";
				foreach (range('A', 'Z') as $char) 
    			{
				    
						echo "<td width='2%'><a style='text-decoration:none; font-family:Georgia, Garamond, Serif;color:#00A0EB;' href='search.php?param=alpha&alpha=$char'>$char</a></td>";
					
				
				}
				
			}
			elseif ($param == 'hr') {
				$sql = "SELECT * FROM `movies` WHERE Hero='$hero' order by year";
				
			}
			elseif ($param == 'lang') {
				$sql = "SELECT * FROM `movies`";
				
			}
			?>
 		<td width="15%"></td>
    	</tr>
    	    	<tr><td bgcolor="00A0EB" height="2px" colspan="29"></td></tr>

	</table>
	
    <div bgcolor="">
	<table width="10%" bgcolor="" >
    	<tr>
    		<td></td>
    		<td width="70%">
    <table border="0" cellspacing="6" cellpadding="3" >
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
  $i=0;
  $j=0;
  $k=0;
  
  while ($i <= $rows/4+1 && $k < 40)
  {
  	echo "<tr>";
	if ($rows == 0)
	{
		echo "<td align='center'><font style='font-family:Georgia, Garamond, Serif;color:#00A0EB;'> There no results to show..</font></td></tr>";
		break;
	}
  	while ($j < 4 && $row_data = mysqli_fetch_array($rs))
	{
	$id = $row_data['id'];
  $name = $row_data['NAME'];
  $sno = $row_data['SNO'];
  $year = $row_data['YEAR'];
  $hero = $row_data['Hero'];
  echo "<td border='3'align='center'><a style='text-decoration:none;color=black;' href='watch.php?id=$id'><table bgcolor='FFFFFF' height='192px' ><tr ><td align='center' style='border-radius:10px;width:130px;height:140px;'><img src='http://img.youtube.com/vi/$id/mqdefault.jpg'style='border-radius:10px;width:180px;height:125px;'></td></tr>";
  echo "<tr><td bgcolor='00A0EB' height='2px'></td></tr><tr ><td border='1' width='130px'> <b><h5>$name &nbsp ($year)</h5></b></td></tr></table></a></td>";
     $j++; $k++;
    }
	echo "</tr>";
	$i++;
	$j=$j%4;
	$k++;
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