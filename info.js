function displayInfo(fName,lName,phone,street,city,zip) {
  window.open(
      "display_info.php?fName="+encodeURI(fName)+"&lName="+encodeURI(lName)+"&phone="+encodeURI(phone)+"&street="+encodeURI(street)+"&city="+encodeURI(city)+"&zip="+encodeURI(zip),
      "_blank",
      "height=200, width=300")
	  
}