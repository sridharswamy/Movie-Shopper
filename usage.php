<?php
session_start();
$n=0;
$conn = mysql_connect("localhost","root","");
$db=mysql_select_db("moviecol", $conn);
include("imdbshort.php");
$imdb = new Imdb();
$boolean='hello';
$cars[0]=strtolower($_POST['movie_name']);
$result=mysql_query("select * from movie where lower(movie_title)='$cars[0]'",$conn);
$n=mysql_num_rows($result);
echo $n;
//$cog=$_SESSION['cog'];
//echo $cog;
if($n!=0)
{
$row=mysql_fetch_array($result);
	echo '<table cellpadding="3" cellspacing="2" border="1" width="80%" align="center">';	
	echo '<tr><th>ID</th><td>'.$row['id'].'</td></tr>';	
	echo '<tr><th>Movie URL</th><td>'.$row['movie_url'].'</td></tr>';	
	echo '<tr><th>Movie Title</th><td>'.$row['movie_title'].'</td></tr>';	
	echo '<tr><th>Movie Year</th><td>'.$row['movie_year'].'</td></tr>';	
	echo '<tr><th>Movie Rating</th><td>'.$row['movie_rating'].'</td></tr>';	
	echo '<tr><th>Movie Release</th><td>'.$row['movie_release'].'</td></tr>';	
	echo '<tr><th>Movie Plot</th><td>'.$row['movie_plot'].'</td></tr>';	
	echo '<tr><th>Movie Poster</th><td><img src="'.$row['movie_poster'].'"></td></tr>';	
	echo '<tr><th>Runtime</th><td>'.$row['runtime'].'</td></tr>';	
	echo '<tr><th>Cost</th><td>'.$row['cost'].'</td></tr>';	
	echo '</table>';
		
	$_SESSION['id'] = $row['id'];
	echo $_SESSION['id'];
}	
else
{
		$movieArray = $imdb->getMovieInfo($cars[0]);
		echo '<table cellpadding="3" cellspacing="2" border="1" width="80%" align="center">';
			foreach ($movieArray as $key=>$value)
			{
			$value = is_array($value)?implode("<br />", $value):$value;
			echo '<tr>';
			echo '<th align="left" valign="top">' . strtoupper($key) . '</th><td>' . $value . '</td>';
			echo '</tr>';
			}
		echo '</table>';
	
	$result=mysql_query("select * from movie where movie_title='$cars[0]'");
	while($row=mysql_fetch_array($result))
	{
	$_SESSION['id'] = $row['id'];
	echo $_SESSION['id'];
	}
}

header('Location: http://localhost/MovieShopper/product-details.php');
	

?>