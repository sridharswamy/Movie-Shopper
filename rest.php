<?php
	header("Content-Type : application/json");	
	function get_price($find)
	{
			$movies = array(
			"Inception"=>250,
			"Batman Begins"=>400,
			"Thor"=>150
		);	
		foreach($movies as $movie=>$price)
		{
			if($movie == $find)
			{
				return $price;
				break;	
			}	
		}

	}		
/*			
			$conn = mysql_connect("localhost","root","");
			$db=mysql_select_db("moviecol", $conn);
			$result = mysql_query("select * from movie where movie_title='$find'");
			$row=mysql_fetch_array($result);
			echo mysql_error();
			$n=mysql_num_rows($result);
			if ($n>0)
			{
			echo $n;
			echo $find;
			echo $row['runtime'];
			return $row['runtime'];
			}
			else
			{
			echo " Error:".mysql_error();
			}
	*/
	
	function deliver_response($status, $status_message, $data)
	{
		header("HTTP/1.1 $status $status_message");	
		$response['status'] = $status;
		$response['status_message'] = $status_message;
		$response['data'] = $data;	
		$json_response = json_encode($response);
		echo $json_response;	
	}
	if(!empty($_GET['name']))
	{
		$name = $_GET['name'];
		$price = get_price($name);	
		if(empty($price))
			deliver_response(200, "Movie NOT found!", NULL);
		else
			deliver_response(200, "Movie found!", $price);
	}
	else
		deliver_response(404, "Invalid Request!", NULL);
?>
