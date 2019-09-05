
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <script type="text/javascript" src="info.js"></script>
 <title>ReadAddressBookCSV.php</title>
</head>
<body>
 <h1>address book</h1>
 <div>
 <?php
 
 class Line{
   var $fName;
   var $lName;
   var $phone;
   var $street;
   var $city;
   var $zip;
   
	 public function __construct($fName, $lName,$phone,$street, $city, $zip){
	   $this->fName = $fName;
	   $this->lName = $lName;
	   $this->phone = $phone;
	   $this->street = $street;
	   $this->city = $city;
	   $this->zip = $zip;
	 }

 }
 
function comparator($a, $b)
{
    return strcmp($a->lName, $b->lName);
}
 
  print <<< HERE
  <table border = "1">
  <tr>
   <th>First</th>
   <th>Last</th>
   <th>phone</th>
   <th>street</th>
   <th>city</th>
   <th>zip</th>
  </tr>
HERE;

 $linesArray = array();
 $citiesArray = array();
 
  $i = 0;
if (($handle = fopen('tabletoread.csv', 'r')) !== FALSE) { // Check the resource is valid, comment this to get path as input
//if (($handle = fopen(.$_GET["path"]., 'r')) !== FALSE) { // uncomment this to get path as input
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!
		$linesArray[$i] = new Line($data[0],$data[1],$data[2],$data[3],$data[4],$data[5]);
		$i++;
		if (array_key_exists($data[4], $citiesArray)) {
			$citiesArray[$data[4]]++;
		}
		else{
		  $citiesArray[$data[4]] = 1;
		}

    }
    fclose($handle);
}
usort($linesArray, 'comparator'); 


foreach($linesArray as $line){
	?>
	  <tr>
	  
	  <td onClick="displayInfo('<?php echo $line->fName ?>', '<?php echo $line->lName ?>', '<?php echo $line->phone ?>', '<?php echo $line->street ?>', '<?php echo $line->city ?>', '<?php echo $line->zip ?>');" > <?php echo $line->fName ?> </td>   
	  <?php
	  echo	  "<td>$line->lName</td>";
	  echo	  "<td>$line->phone</td>";
	  echo	  "<td>$line->street</td>";
	  echo	  "<td>$line->city</td>";
      echo    "<td>$line->zip</td>";
	  echo "</tr>";

}

  print "</table>";  
  
    print <<< HERE
	  <table border = "1">
		  <tr>
		  <th>City</th>
		  <th>Num of ppl</th>

	  </tr>
HERE;

echo "<br>";

  foreach($citiesArray as $city=>$num){
	  echo "<tr>";
	  echo	  "<td>$city</td>";
	  echo	  "<td>$num</td>";
	  echo "</tr>";
}

  print "</table>";

 ?>
 
 
 </div>
</body>
</html>