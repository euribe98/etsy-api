# shopsections

## Synopsis
Sample etsy api implementation using angularjs

## Code Example
1. etsyshopsections1.html retrieves a shop's sections in a drop-down box <br>
2. etsyshopsections2.html retrieves a shop's sections in table form <br>
3. etsyshopsections3.html retrieves a shop's sections in a drop-down box, but<br>
the api is called from a php script, where your api credentials is protected on the server

## Installation
Requirements:<br>
1. An etsy api key. See: https://www.etsy.com/developers/documentation/getting_started/register <br>
For examples 1 and 2, update your-api-key with yours <br><br>

Requirements for example 3<br>
2. PHP.  See documentation at:  http://php.net/manual/en/install.general.php <br>
3. copy the (.html, .php) files to your web server's document root directory <br> 
4. update accesstoken.php and replace API_KEY with your 'real' api key by following these steps: <br>
https://www.etsy.com/developers/documentation/getting_started/register


## API Reference
https://www.etsy.com/developers/documentation

## Tests
1. Start the built-in php server:  start server: php -S localhost:8080 <br>
2. From browser test, your php script and html as follows <br>
http://localhost:8080/etsyshopsections1.html <br>
http://localhost:8080/etsyshopsections3.html <br>
http://localhost:8080/etsyapi.php?/etsyapi.php?functionname=getshopsections&limit=10&params=shop_section_id,title&shopname=bellasjardin



## Contributors
Evan Uribe

## License
