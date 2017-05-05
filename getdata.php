<?php
include ('connection.php');
$obj = json_decode($_GET ["x"], false);

$sql = "SELECT college, start_year, end_year, degree, stream, performance_scale, performance
FROM demo3 WHERE type = 'education_graduation'";
$stmt = $conn->prepare( $sql );
$stmt->execute();
$to_encode = array();
//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo $result['user_data'];
//print_r($result);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $to_encode[] = $row;
}
echo json_encode($to_encode);
//Array ( [0] => Array ( [user_data] => {"name":"Bachelor of Technology (B.Tech) (2014 - 2018)","age":"University Institute of Technology, Bhopal","city":"CGPA : 6.50/10"} ) )
 ?>
