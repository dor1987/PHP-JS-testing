<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Info.php</title>
</head>
<body>
 <h1>Info</h1>
 <div>
 <?php
 

	
 
echo "first name: ". $_GET["fName"];
echo "<br>";
echo "last name: ".$_GET["lName"];
echo "<br>";
echo "phone: ".$_GET["phone"];
echo "<br>";
echo "street: ".$_GET["street"];
echo "<br>";
echo "city: ".$_GET["city"];
echo "<br>";
echo "zip code: ".$_GET["zip"];




?>
 </div>
</body>
</html>