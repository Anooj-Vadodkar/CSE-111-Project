<html>
<head>
<title>CS 111 Project</title>
</head>
<body>

<form action = "cse111.php" method = "get">
      <select name = "database">
		<option value = "">Please Select</option>
        <option value = "Video Game Sales">Video Game Sales</option>
        <option value = "Company">Company</option>
        <option value = "Yearly Sales">Yearly Sales</option>
        <option value = "Publisher">Publisher</option>
        <option value = "Subsidiary">Subsidiary</option>
        <option value = "Genre">Genre</option>
        <option value = "Platforms">Platforms</option>
	  </select>
	  <input name = "search" id="search" type="text" placeholder="Type here">
      <input id = "submit" type = "submit" value = "Search"> 
</form>
<?php

$db = new SQLite3('maindata.db');

if(isset($_GET['database'])){
	$selection = $_GET["database"];
} else {
	$selection = "Video Game Sales";
}

switch($selection){
	case "Video Game Sales":
		if(isset($_GET["search"])){
			$search = $_GET["search"];
			$search = "'%" . $search . "%'";
			$query = 'SELECT * FROM videogamesales WHERE name LIKE ' . $search . ' OR genre LIKE ' . $search . 'OR publisher LIKE ' . $search . ' OR year LIKE ' . $search . ' LIMIT 1000';
			echo "</table>\n";

			echo "<h1>Video Game Sales</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr>";
			echo "<td><strong>ID</td><td><strong>Name</td><td><strong>Platform</td><td><strong>Year</td>";
			echo "<td><strong>Genre</td><td><strong>Publisher</td><td><strong>NA Sales</td><td><strong>EU Sales</td>";
			echo "<td><strong>JP Sales</td><td><strong>Other Sales</td><td><strong>Global Sales</td>";
			echo "</tr>\n";

			$cursor = $db->query($query);
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['gameid']} </td>\n";
				echo "<td> {$row['name']} </td>\n";
				echo "<td> {$row['platform']} </td>\n";
				echo "<td> {$row['year']} </td>\n";
				echo "<td> {$row['genre']} </td>\n";
				echo "<td> {$row['publisher']} </td>\n";
				echo "<td> {$row['na_sales_millions']} </td>\n";
				echo "<td> {$row['eu_sales_millions']} </td>\n";
				echo "<td> {$row['jp_sales_millions']} </td>\n";
				echo "<td> {$row['other_sales_millions']} </td>\n";
				echo "<td> {$row['global_sales_millions']} </td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		} else {
			echo "</table>";
			echo "<h1>Video Game Sales</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr>";
			echo "<td><strong>ID</td><td><strong>Name</td><td><strong>Platform</td><td><strong>Year</td>";
			echo "<td><strong>Genre</td><td><strong>Publisher</td><td><strong>NA Sales</td><td><strong>EU Sales</td>";
			echo "<td><strong>JP Sales</td><td><strong>Other Sales</td><td><strong>Global Sales</td>";
			echo "</tr>\n";

			$cursor = $db->query('SELECT * FROM videogamesales limit 1000');
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['gameid']} </td>\n";
				echo "<td> {$row['name']} </td>\n";
				echo "<td> {$row['platform']} </td>\n";
				echo "<td> {$row['year']} </td>\n";
				echo "<td> {$row['genre']} </td>\n";
				echo "<td> {$row['publisher']} </td>\n";
				echo "<td> {$row['na_sales_millions']} </td>\n";
				echo "<td> {$row['eu_sales_millions']} </td>\n";
				echo "<td> {$row['jp_sales_millions']} </td>\n";
				echo "<td> {$row['other_sales_millions']} </td>\n";
				echo "<td> {$row['global_sales_millions']} </td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		}
		break;
	case "Company":
		if($_GET["search"] !== ""){
			$search = $_GET["search"];
			$search = "'%" . $search . "%'";
			
			$query = 'SELECT * FROM company WHERE company LIKE ' . $search . ' OR country LIKE ' . $search . 'OR headquarters LIKE ' . $search . ' OR founder LIKE ' 
			. $search . ' OR year_founded LIKE ' . $search . ' OR year_defunct LIKE ' . $search . ' LIMIT 1000';
			echo "<h1>Company</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Company</td><td><strong>Country</td><td><strong>HQ</td>\n";
			echo "<td><strong>Founder</td><td><strong>Founded</td><td><strong>Defunct</td></tr>\n";
			$cursor = $db->query($query);
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['company']} </td>\n";
				echo "<td> {$row['country']} </td>\n";
				echo "<td> {$row['headquarters']} </td>\n";
				echo "<td> {$row['founder']} </td>\n";
				echo "<td> {$row['year_founded']} </td>\n";
				echo "<td> {$row['year_defunct']} </td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
			
			
		} else {
			echo "<h1>Company</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Company</td><td><strong>Country</td><td><strong>HQ</td>\n";
			echo "<td><strong>Founder</td><td><strong>Founded</td><td><strong>Defunct</td></tr>\n";
			
			$cursor = $db->query('SELECT * FROM company');
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['company']} </td>\n";
				echo "<td> {$row['country']} </td>\n";
				echo "<td> {$row['headquarters']}</td>\n";
				echo "<td> {$row['founder']}</td>\n";
				echo "<td> {$row['year_founded']}</td>\n";
				echo "<td> {$row['year_defunct']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		}
		break;
	case "Yearly Sales":
		if($_GET["search"] !== ""){
			$search = $_GET["search"];
			$search = "'%" . $search . "%'";
			$query = 'SELECT * FROM yearlycompanysales WHERE company LIKE ' . $search . ' OR year LIKE ' . $search . 'LIMIT 1000';
			echo "<h1>Yearly Sales</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Company</td><td><strong>Year</td><td><strong>NA Sales</td><td><strong>EU Sales</td>\n";
			echo "<td><strong>Japan Sales</td><td><strong>Other Sales</td><td><strong>Global Sales</td></tr>\n";
			
			$cursor = $db->query($query);
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['company']} </td>\n";
				echo "<td> {$row['year']} </td>\n";
				echo "<td> {$row['na_sales_millions']}</td>\n";
				echo "<td> {$row['eu_sales_millions']}</td>\n";
				echo "<td> {$row['jp_sales_millions']}</td>\n";
				echo "<td> {$row['other_sales_millions']}</td>\n";
				echo "<td> {$row['global_sales_millions']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		} else {
			echo "<h1>Yearly Sales</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Company</td><td><strong>Year</td><td><strong>NA Sales</td><td><strong>EU Sales</td>\n";
			echo "<td><strong>Japan Sales</td><td><strong>Other Sales</td><td><strong>Global Sales</td></tr>\n";
			
			$cursor = $db->query('SELECT * FROM yearlycompanysales');
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['company']} </td>\n";
				echo "<td> {$row['year']} </td>\n";
				echo "<td> {$row['na_sales_millions']}</td>\n";
				echo "<td> {$row['eu_sales_millions']}</td>\n";
				echo "<td> {$row['jp_sales_millions']}</td>\n";
				echo "<td> {$row['other_sales_millions']}</td>\n";
				echo "<td> {$row['global_sales_millions']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		}
		break;
	case "Publisher":
		if($_GET["search"] !== ""){
			$search = $_GET["search"];
			$search = "'%" . $search . "%'";
			$query = 'SELECT * FROM publisher WHERE publisher LIKE ' . $search . 'LIMIT 1000';
			echo "<h1>Publisher</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Publisher</strong></td><td><strong>NA Sales</td><td><strong>EU Sales</td>\n";
			echo "<td><strong>JP Sales</td><td><strong>Other Sales</td><td><strong>Global Sales</td></tr>\n";
			
			$cursor = $db->query($query);
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['publisher']} </td>\n";
				echo "<td> {$row['na_sales_millions']}</td>\n";
				echo "<td> {$row['eu_sales_millions']}</td>\n";
				echo "<td> {$row['jp_sales_millions']}</td>\n";
				echo "<td> {$row['other_sales_millions']}</td>\n";
				echo "<td> {$row['global_sales_millions']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		} else {
			echo "<h1>Publisher</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Publisher</strong></td><td><strong>NA Sales</td><td><strong>EU Sales</td>\n";
			echo "<td><strong>JP Sales</td><td><strong>Other Sales</td><td><strong>Global Sales</td></tr>\n";
			
			$cursor = $db->query('SELECT * FROM publisher');
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['publisher']} </td>\n";
				echo "<td> {$row['na_sales_millions']}</td>\n";
				echo "<td> {$row['eu_sales_millions']}</td>\n";
				echo "<td> {$row['jp_sales_millions']}</td>\n";
				echo "<td> {$row['other_sales_millions']}</td>\n";
				echo "<td> {$row['global_sales_millions']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		}
		break;
	case "Subsidiary":
		if($_GET["search"] !== ""){
			$search = $_GET["search"];
			$search = "'%" . $search . "%'";
			$query = 'SELECT * FROM subsidiary WHERE company LIKE ' . $search . ' OR publisher LIKE ' . $search . 'LIMIT 1000';

			echo "<h1>Subsidiary</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Company</strong></td><td><strong>Publisher</strong></td></tr>\n";
			
			$cursor = $db->query($query);
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['publisher']} </td>\n";
				echo "<td> {$row['company']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		} else {
			echo "<h1>Subsidiary</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Company</strong></td><td><strong>Publisher</strong></td></tr>\n";
			
			$cursor = $db->query('SELECT * FROM subsidiary');
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['publisher']} </td>\n";
				echo "<td> {$row['company']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		}
		break;
	case "Genre":
		if($_GET["search"] !== ""){
			$search = $_GET["search"];
			$search = "'%" . $search . "%'";
			$query = 'SELECT * FROM genre WHERE genre LIKE ' . $search . ' OR description LIKE ' . $search . 'LIMIT 1000';

			echo "<h1>Genre</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Genre</td><td><strong>Description</td>\n";
			echo "<td><strong>Qty Sold</td><td><strong>% Sold</td></tr>\n";
			$cursor = $db->query($query);
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['genre']} </td>\n";
				echo "<td> {$row['description']}</td>\n";
				echo "<td> {$row['quantity_sold']} </td>\n";
				echo "<td> {$row['percentage_sold']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		} else {
			echo "<h1>Genre</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Genre</td><td><strong>Description</td>\n";
			echo "<td><strong>Qty Sold</td><td><strong>% Sold</td></tr>\n";
			$cursor = $db->query('SELECT * FROM genre');
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['genre']} </td>\n";
				echo "<td> {$row['description']}</td>\n";
				echo "<td> {$row['quantity_sold']} </td>\n";
				echo "<td> {$row['percentage_sold']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		}
		break;
	case "Platforms":
		if($_GET["search"] !== ""){
			$search = $_GET["search"];
			$search = "'%" . $search . "%'";
			$query = 'SELECT * FROM platforms WHERE fullname LIKE ' . $search . ' OR creator LIKE ' . $search . ' OR year_released LIKE ' . $search . 'LIMIT 1000';

			echo "<h1>Platforms</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Platform</td><td><strong>Full Name</td>\n";
			echo "<td><strong>Creator</td><td><strong>Year Released</td></tr>\n";
			$cursor = $db->query($query);
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['platform']} </td>\n";
				echo "<td> {$row['fullname']}</td>\n";
				echo "<td> {$row['creator']} </td>\n";
				echo "<td> {$row['year_released']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		} else {
			echo "<h1>Platforms</h1>\n";
			echo "<table border=\"1\" width=\"1050\">\n";
			echo "<tr><td><strong>Platform</td><td><strong>Full Name</td>\n";
			echo "<td><strong>Creator</td><td><strong>Year Released</td></tr>\n";
			$cursor = $db->query('SELECT * FROM platforms');
			while ($row = $cursor->fetchArray()) {
				echo "<tr>\n";
				echo "<td> {$row['platform']} </td>\n";
				echo "<td> {$row['fullname']}</td>\n";
				echo "<td> {$row['creator']} </td>\n";
				echo "<td> {$row['year_released']}</td>\n";
				echo "</tr> \n";
			}
			echo "</table>\n";
		}
		break;
	default:
		echo "<h1><center>Please select a table.</center</h1>";
		break;
}
?>

</body>
</html>

