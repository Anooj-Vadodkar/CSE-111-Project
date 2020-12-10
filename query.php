<html>
<head>
<title>CS 111 Project</title>
</head>
<body>

<?php

$db = new SQLite3('maindata.db');

echo "<h1>Company</h1>\n";
echo "<table border=\"1\" width=\"600\">\n";
echo "<tr><td>Company</td><td>Country</td><td>HQ</td><td>Founder</td><td>Founded</td><td>Defunct</td></tr>\n";

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

echo "<h3>Games and Genre</h3>\n";
echo "<table border=\"1\" width=\"600\">\n";
echo "<tr><td>Name</td><td>Genre</td><td>Description</td></tr>\n";

$cursor = $db->query('SELECT a.name as name, a.genre as genre, b.description as desc from videogamesales a join genre b on a.genre = b.genre limit 100');
while ($row = $cursor->fetchArray()) {
	echo "<tr>\n";
	echo "<td> {$row['name']} </td>\n";
	echo "<td> {$row['genre']} </td>\n";
	echo "<td> {$row['desc']}</td>\n";
	echo "</tr> \n";
}
echo "</table>\n";

echo "<h3>Video Game Sales</h3>\n";
echo "<table border=\"1\" width=\"900\">\n";
echo "<tr>";
echo "<td>Game Id</td><td>Name</td><td>Platform</td><td>Year</td>";
echo "<td>Genre</td><td>Publisher</td><td>NA Sales</td><td>EU Sales</td>";
echo "<td>JP Sales</td><td>Other Sales</td><td>Global Sales</td>";
echo "</tr>\n";

$cursor = $db->query('SELECT * FROM videogamesales limit 100');
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

?>

</body>
</html>

