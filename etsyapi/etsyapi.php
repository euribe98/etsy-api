<?php



/**
*  User user listings
**/
function getlistings($shopname, $params, $limit, $imagesz) { 
	//get the access token 
	include 'accesstoken.php';

	$url = 'https://openapi.etsy.com/v2/shops/'.$shopname .'/listings/active?';
	$url = $url.'fields=' .$params .'&limit='. $limit. '&includes=MainImage&api_key=' .$apikey;
	
	//print ($url);
	$json =  execCurl ($url);
	//print ($json);
	return $json;
}

/**
* Get count of shop favorites
**/

/**
* Get shop
**/
function getshop($shopname) {
	
	$url = 'https://openapi.etsy.com/v2/shops/?shop_name='.$shopname .'&api_key=' . $apikey;
	
	return  execCurl ($url);
	//num_favorers
	
}


/**
* Execute http curl request 
**/
function execCurl($url) {
	//echo "<br> URL: $url <br>";
	
	$curl = curl_init();
	
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER => false)
	);
	
	$curl_response = curl_exec($curl);
	
	$curl_errno = curl_errno($curl);
    $curl_error = curl_error($curl);
	
	if (curl_error($curl) || $curl_response === false || $curl_errno > 0)
    {
        $info = curl_getinfo($curl);
        echo 'error occured during curl exec - ' . var_export($info) ;
        echo '<br> error -----------> '. $curl_error; 
        curl_close($curl);
    }
    
    curl_close($curl);
	return  $curl_response;
}



$function = $_GET['functionname'];
$shopname = $_GET['shopname'];
$params = $_GET['params']; 
$limit = $_GET['limit']; 
$imagesz = $_GET['imagesz'];

		

if (isset($function)) {
	if (function_exists($function)){
      if (strcmp($function, 'getlistings')==0 and (isset($shopname)) and (isset($params)) and (isset($limit)) and (isset($imagesz)))
      {
      	$response = getlistings($shopname, $params, $limit, $imagesz);
      	echo $response;
      }
      else {
	    http_response_code(404);
        echo "Function $function does not exit";
      }
	}
}



?>
