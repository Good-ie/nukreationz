<?php header('Content-type: text/xml'); ?>

<?xml version='1.0' encoding='UTF-8'?>
<!--<urlset xmlns="http://www.google.com/schemas/sitemap/0.9">-->
<urlset xmlns="http://www.google.com/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.9 http://www.google.com/schemas/sitemap/0.9/sitemap.xsd">

 <url>
  <loc>https://www.digital.nukreationz.com.ng/index.php </loc>
  <lastmod>2016-01-23T18:00:15+00:00</lastmod>
 </url>
</urlset>



<?php
// Database Structure CREATE TABLE 'post' (  'link' text NOT NULL,  'date' text   NOT NULL, ) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1


header('Content-type: application/xml');


$servername = "localhost";
$username = "nukreati2_digital";
$password = "Nukreationzno33";
$db = "nukreati2_digital";

$conn = mysqli_connect($servername, $username, $password, $db);

  
//$host="localhost";
//$username="nukreati2_digital";
//$password="Nukreationzno33";
//$databasename="nukreati2_digital";

//$connect=mysql_connect($host,$username,$password);
//$db=mysqli_select_db($databasename);	
 
$get_result=mysqli_query($conn, "select * from post");

echo "<?xml version='1.0' encoding='UTF-8'?>"."\n";
echo "<urlset xmlns='https://www.google.com/schemas/sitemap/0.9'>"."\n";

echo "
<url>
 <loc>https://digital.nukreationz.com.ng/</loc>
 <lastmod>2022-03-11T18:00:15+00:00</lastmod>
 <changefreq>daily</changefreq>
</url>
<url>
 <loc>https://digital.nukreationz.com.ng/about.php</loc>
 <lastmod>2022-03-11T18:00:15+00:00</lastmod>
 <changefreq>daily</changefreq>
</url>
<url>
 <loc>https://digital.nukreationz.com.ng/contact.php</loc>
 <lastmod>2022-03-11T18:00:15+00:00</lastmod>
 <changefreq>daily</changefreq>
</url>";

while($row=mysqli_fetch_array($get_result))
{
 echo "<url>";
 echo "<loc>".$row['link']."</loc>";
 echo "<lastmod>".$row['date']."</lastmod>";
 echo "<changefreq>daily</changefreq>";
 echo "</url>";
}

echo "</urlset>";

?>