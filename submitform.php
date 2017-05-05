<?php

include ('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $input1 = $_POST["college"];
    $input2 = $_POST["start_year"];
    $input3 = $_POST["end_year"];
    $input4 = $_POST["degree"];
    $input5 = $_POST["stream"];
    $input6 = $_POST["performance_scale"];
    $input7 = $_POST["performance"];

    $myObj->college = $input1;
    $myObj->start_year = $input2;
    $myObj->end_year = $input3;
    $myObj->degree = $input4;
    $myObj->stream = $input5;
    $myObj->performance_scale = $input6;
    $myObj->performance = $input7;

    $myJSON = json_encode($myObj);
    echo $myJSON;

    try {
        $sql = "INSERT INTO demo3 (type, college, start_year, end_year, degree, stream, performance_scale, performance) VALUES ('education_graduation', '$input1', '$input2', '$input3', '$input4', '$input5', '$input6', '$input7')";
        $conn->exec($sql);
        echo "NEW RECORD CREATED SUCCESSFULLY";
        header("Location: http://localhost/phpproject01/com/index.php");
        exit();
        }
    catch(PDOException $e)
        {
        echo $sql . "<br />" . $e->getMessage();
        }
        $conn = null;
}
?>
