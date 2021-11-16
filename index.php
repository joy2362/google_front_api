<?php
//AIzaSyDQiLqI1_RrgO3fI1Whau-Y0220D_ur74I

header("Access-Control-Allow-Origin: *");
$url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDQiLqI1_RrgO3fI1Whau-Y0220D_ur74I'; 

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 

$data = curl_exec($ch); 
$httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE); # http response status code
curl_close($ch); 

$fronts = json_decode($data);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Google Front</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<h4> Fronts List</h4>
	<table class="table table-hover">
		 <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Front Name</th>
      <th scope="col">Verient</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
	foreach ($fronts->items as $key => $front ) {
		?>
    <tr>
      <th scope="row" ><?php echo $key+1 ?></th>
      <td ><?php echo $front->family ?></td>
      <td>
      	<?php
      	foreach ($front->variants as  $varient) {
 			echo  "<span class=\"badge bg-secondary\">" .$varient."</span>";
 		}
		?>
      </td>

    </tr>
	<?php }?>
  </tbody>
	</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
