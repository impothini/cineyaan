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
			<title>CineYaan.com</title>
			<table><tr>
			<td width="10%"><div id=""> </div></td>
	<td width="80%"><div id="container">
    <header>
	<div class="width">
	<table> <tr>   	
    	<td>	<h1><a href="home.php">CineYaan<span>.com</span></a></h1></td><td><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- banner -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-6610369753586833"
     data-ad-slot="4075868708"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></td>
    </tr></table>		
    </div>
    
    </header>
    <nav>
	<div class="width">
    		<ul>
        		<li class="start selected"><a href="home.php">Home</a></li>
        		<li><a href="news.php">News</a></li>
         	   	<li ><a href="movies.php">Movies</a></li>
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
				$select_query= "Select year from movies group by year order by year DESC";
				
				$rs =mysqli_query($conn, $select_query);
				
				echo "<select name='year' onchange='location = this.options[this.selectedIndex].value;'>";
				echo "<option value='movies.php' selected='selected'>--year--</option>";
				while ($row_data = mysqli_fetch_array($rs))
				{
					$year = $row_data['year'];
					echo $year;
					echo "<option value='search.php?param=yr&yr=$year' >".$year."</option>";
				}
				echo "</select>";
				$select_query=  "Select hero from movies group by hero having count(hero) >=5";
				
				$rs =mysqli_query($conn, $select_query);
			
				echo "<select name='hero' onchange='location = this.options[this.selectedIndex].value;'>";
				echo "<option value='movies.php' selected='selected' style='align:center;'>--hero--</option>";
				while ($row_data = mysqli_fetch_array($rs))
				{
					$hero1 = $row_data['hero'];
					echo "<option value='find.php?param=hr&hr=$hero1' >".$hero1."</option>";
				}
          	  	echo "</select>";
          	  	
          	  	?>
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
        	</ul>
	</div>
    </nav>
    <div bgcolor="">
	<table width="" bgcolor="" >
    	<tr>
    		
    		<td width="70%">
    		<table>
    			<tr><td width='40%'>
    <table border="0" cellspacing="6" cellpadding="3" >
    	<tr><td colspan="2" bgcolor="00A0EB" style='border-radius: 10px;'>
    		<font style='text-decoration:none;color: #FFFFFF;font-family:Georgia, Garamond, Serif';> &nbsp Being Viewed:</font> 
    	</td></tr>
<?php 
			
			$sql = "select * FROM movies WHERE id IN (select id from (SELECT id FROM recent order by sno DESC)s);";
			

$rs = mysqli_query($conn, $sql);

  $i=0;
  $j=0;
  
  while ($i <= 3)
  {
  	echo "<tr>";
  	while ($j < 2 && $row_data = mysqli_fetch_array($rs))
	{
	$id = $row_data['id'];
  $name = $row_data['NAME'];
  $sno = $row_data['SNO'];
  $year = $row_data['YEAR'];
  $hero = $row_data['Hero'];
  echo "<td border='3'align='center' width='40%'><a style='text-decoration:none;color=black;' href='watch.php?id=$id'><table bgcolor='FFFFFF' height='192px' ><tr ><td align='center' style='width:130px;height:140px;'><img src='http://img.youtube.com/vi/$id/mqdefault.jpg'style='border-radius:10px;width:95%;height:90%;'></td></tr>";
  echo "<tr><td bgcolor='00A0EB' height='2px'></td></tr><tr ><td border='1' width='130px'> <b><h5>$name &nbsp ($year)</h5></b></td></tr></table></a></td>";
   
   $j++;
	 
    }
	echo "</tr>";
	$i++;
	
	$j=$j%2;
 }
$sql = "select * FROM movies order by sno LIMIT 8";
			
echo '    	<tr ><td colspan="2" bgcolor="00A0EB" style="border-radius: 10px"><font style="text-decoration:none;color: #FFFFFF;font-family:Georgia, Garamond, Serif">&nbsp Recently Added: </font></td></tr>';
$rs = mysqli_query($conn, $sql);

  $i=0;
  $j=0;
  
  while ($i <= 3)
  {
  	echo "<tr>";
  	while ($j < 2 && $row_data = mysqli_fetch_array($rs))
	{
	$id = $row_data['id'];
  $name = $row_data['NAME'];
  $sno = $row_data['SNO'];
  $year = $row_data['YEAR'];
  $hero = $row_data['Hero'];
  echo "<td border='3'align='center' width='40%'><a style='text-decoration:none;color=black;' href='watch.php?id=$id'><table bgcolor='FFFFFF' height='192px' ><tr ><td align='center' style='width:130px;height:140px;'><img src='http://img.youtube.com/vi/$id/mqdefault.jpg'style='border-radius:10px;width:95%;height:90%;'></td></tr>";
  echo "<tr><td bgcolor='00A0EB' height='2px'></td></tr><tr ><td border='1'> <b><h5>$name &nbsp ($year)</h5></b></td></tr></table></a></td>";
     $j++;
    }
	echo "</tr>";
	$i++;
	$j=$j%2;
 }

 ?>
	 
	</table></td>
	<td width="40%">
		<table>
				<?php
				echo '    	<tr ><td width="30%" bgcolor="00A0EB" style="border-radius: 10px"><font style="text-decoration:none;color: #FFFFFF;font-family:Georgia, Garamond, Serif">&nbsp Latest News: </font></td></tr>'; 
					$sql = "SELECT * FROM news ORDER BY timestamp DESC LIMIT 18";
					$rs = mysqli_query($conn, $sql);
					  $rows = mysqli_num_rows($rs);
					  	while ($row_data = mysqli_fetch_array($rs))
						{
						$id = $row_data['id'];
					  	$name = $row_data['name'];
						$name = trim($name);
						echo "<tr>";
						  echo "<td><table style='float:left'><tr></td><td border='3' width=105px><a style='text-decoration:none; color:black; font-family:Georgia, Garamond, Serif;' href='nwatch.php?id=$id&title=$name&ty=news'><img src='http://img.youtube.com/vi/$id/mqdefault.jpg'style='border-radius:10px;width:100px;height:75px;'></td>";
						  echo "<td><a style='text-decoration:none; color:#222222; font-family:Georgia, Garamond, Serif;font-weight:normal; font-size:6' href='nwatch.php?id=$id&title=$name&ty=news'> <b><h5>$name</a></h5></b></td></a> <td width='2px' bgcolor='00A0EB'></td></tr></table></td></tr>";
						 echo "<tr><td bgcolor='00A0EB' height='2px'></td></tr>";
						}
									?>

		</table>
	</td>
	<td>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- home_page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6610369753586833"
     data-ad-slot="9343673101"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- page1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:150px;height:600px"
     data-ad-client="ca-pub-6610369753586833"
     data-ad-slot="4773872701"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</td>
	</tr></td>
	
	</tr></table></td>
		</tr></table>
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