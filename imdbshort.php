<?php

class Imdb
{   

    // Get movie information by Movie Title.
    // This method searches the given title on Google, Bing or Ask to get the best possible match.
    public function getMovieInfo($title, $getExtraInfo = true)
    {
        $imdbId = $this->getIMDbIdFromSearch(trim($title));
        if($imdbId === NULL){
            $arr = array();
            $arr['error'] = "No Title found in Search Results!";
            return $arr;
		}
        return $this->getMovieInfoById($imdbId, $getExtraInfo);
	}
     
    // Get movie information by IMDb Id.
    public function getMovieInfoById($imdbId, $getExtraInfo = true)
    {
        $arr = array();
        $imdbUrl = "http://www.imdb.com/title/" . trim($imdbId) . "/";
        return $this->scrapeMovieInfo($imdbUrl, $getExtraInfo);
    }
     
    // Scrape movie information from IMDb page and return results in an array.
    private function scrapeMovieInfo($imdbUrl, $getExtraInfo = true)
    {
	
	
        $arr = array();
		$counter=0;
        $html = $this->geturl("${imdbUrl}combined");
        $title_id = $this->match('/<link rel="canonical" href="http:\/\/www.imdb.com\/title\/(tt\d+)\/combined" \/>/ms', $html, 1);
        if(empty($title_id) || !preg_match("/tt\d+/i", $title_id)){
            $arr['error'] = "No Title found on IMDb!";
            return $arr;
        }
        $arr['title_id'] = $title_id;
        $arr['imdb_url'] = $imdbUrl;
        $arr['title'] = str_replace('"', '', trim($this->match('/<title>(IMDb \- )*(.*?) \(.*?<\/title>/ms', $html, 2)));
        $arr['year'] = trim($this->match('/<title>.*?\(.*?(\d{4}).*?\).*?<\/title>/ms', $html, 1));
        $arr['rating'] = $this->match('/<b>(\d.\d)\/10<\/b>/ms', $html, 1);
        $arr['release_date'] = $this->match('/Release Date:<\/h5>.*?<div class="info-content">.*?([0-9][0-9]? (January|February|March|April|May|June|July|August|September|October|November|December) (19|20)[0-9][0-9])/ms', $html, 1);
        $arr['plot'] = trim(strip_tags($this->match('/Plot:<\/h5>.*?<div class="info-content">(.*?)(<a|<\/div|\|)/ms', $html, 1)));
		$arr['poster'] = $this->match('/<div class="photo">.*?<a name="poster".*?><img.*?src="(.*?)".*?<\/div>/ms', $html, 1);
		$arr['poster_large'] = "";
		$arr['poster_full'] = "";
		$arr['language'] = $this->match_all('/<a.*?>(.*?)<\/a>/ms', $this->match('/Language.?:(.*?)(<\/div>|>.?and )/ms', $html, 1), 1);
        $arr['country'] = $this->match_all('/<a.*?>(.*?)<\/a>/ms', $this->match('/Country:(.*?)(<\/div>|>.?and )/ms', $html, 1), 1);
        $arr['genres'] = $this->match_all('/<a.*?>(.*?)<\/a>/ms', $this->match('/Genre.?:(.*?)(<\/div>|See more)/ms', $html, 1), 1);
		if ($arr['poster'] != '' && strpos($arr['poster'], "media-imdb.com") > 0){ //Get large and small posters
            $arr['poster'] = preg_replace('/_V1.*?.jpg/ms', "_V1._SY200.jpg", $arr['poster']);
            $arr['poster_large'] = preg_replace('/_V1.*?.jpg/ms', "_V1._SY500.jpg", $arr['poster']);
            $arr['poster_full'] = preg_replace('/_V1.*?.jpg/ms', "_V1._SY0.jpg", $arr['poster']);
       }
	   else
	   {
            $arr['poster'] = "";
       }
      $arr['runtime'] = trim($this->match('/Runtime:<\/h5><div class="info-content">.*?(\d+) min.*?<\/div>/ms', $html, 1));
   /*	
 				if($getExtraInfo == true){
					
					$arr['recommended_titles'] = $this->getRecommendedTitles($arr['title_id']);
		}
		$countrec=0;
		$countrec=count($arr['recommended_titles']);
		$_SESSION['countrec']=$countrec;
		$_SESSION['recmovielist']=$arr['recommended_titles'];
		var_dump($_SESSION['recmovielist']);
		*/
        $quantity=50*rand(2,6);
		$count=0;
		$count=count($arr['genres']);
		echo 'Number of genres is:'.$count;
		if($count>0)
		$gno=rand(0,$count-1);
		echo 'random number for genre is:'.$gno;
		
		$conn = mysql_connect("localhost","root","");
		$db=mysql_select_db("moviecol", $conn);
		$result=mysql_query("select movie_title from movie",$conn);
		$userinfo = array();
		$x=0;
		//$array=$arr['recommended_titles'];
		
		//$_SESSION['firstmovie']= $arr['recommended_titles'][0];
		
		while($row=mysql_fetch_array($result))
		{
			if($arr['title']!=$row['movie_title'])
			{
			if($count>0)
			$sql = "INSERT INTO movie VALUES('','".$arr['title_id']."','".$arr['imdb_url']."','".$arr['title']."','".$arr['year']."','".$arr['rating']."','".$arr['release_date']."','".$arr['plot']."','".$arr['poster_large']."','".$arr['runtime']."','".$quantity."','".$arr['genres'][$gno]."')";
			else
			$sql = "INSERT INTO movie VALUES('','".$arr['title_id']."','".$arr['imdb_url']."','".$arr['title']."','".$arr['year']."','".$arr['rating']."','".$arr['release_date']."','".$arr['plot']."','".$arr['poster_large']."','".$arr['runtime']."','".$quantity."','null')";
			//echo $sql;
			$query = mysql_query($sql);	
			}
		}
			
			
	/*		foreach($_SESSION['toprint'] as $key=>$value)
		{
			$sql1 = "INSERT INTO rec VALUES('".$arr['movie_title']."','".$key."')";
			$query1 = mysql_query($sql1) or die(mysql_error());
			
		}
		*/			
	}	
 	public function getRecommendedTitles($titleId)
		{
        $json = $this->geturl("http://www.imdb.com/widget/recommendations/_ajax/get_more_recs?specs=p13nsims%3A${titleId}");
        $resp = json_decode($json, true);
        $arr = array();
			if(isset($resp["recommendations"]))
			{
				foreach($resp["recommendations"] as $val)
				{
                $name = $this->match('/title="(.*?)"/msi', $val['content'], 1);
                $arr[$val['tconst']] = $name;
				}
			}
		$_SESSION['toprint']=$arr;
        return array_filter($arr);
		}
		
  // Movie title search on Google, Bing or Ask. If search fails, return FALSE.
    private function getIMDbIdFromSearch($title, $engine = "google")  {
        switch ($engine){
            case "google":  $nextEngine = "bing";  break;
            case "bing":    $nextEngine = "ask";   break;
            case "ask":     $nextEngine = FALSE;   break;
            case FALSE:     return NULL;
            default:        return NULL;
        }
        $url = "http://www.${engine}.com/search?q=imdb+" . rawurlencode($title);
        $ids = $this->match_all('/<a.*?href="http:\/\/www.imdb.com\/title\/(tt\d+).*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
        if (!isset($ids[0]) || empty($ids[0])) //if search failed
            return $this->getIMDbIdFromSearch($title, $nextEngine); //move to next search engine
        else
            return $ids[0]; //return first IMDb result
    }
     
   private function geturl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }
 
    private function match_all_key_value($regex, $str, $keyIndex = 1, $valueIndex = 2){
        $arr = array();
        preg_match_all($regex, $str, $matches, PREG_SET_ORDER);
        foreach($matches as $m)	{
            $arr[$m[$keyIndex]] = $m[$valueIndex];
        }
        return $arr;
    }
     
    private function match_all($regex, $str, $i = 0){
        if(preg_match_all($regex, $str, $matches) === false)
            return false;
        else
            return $matches[$i];
    }
 
    private function match($regex, $str, $i = 0){
        if(preg_match($regex, $str, $match) == 1)
            return $match[$i];
        else
            return false;
    }
}
?>