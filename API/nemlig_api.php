<?php
header('Content-Type: text/html; charset=utf-8');
include "db_conncet.php";


$json_response = [];


if (isset($_POST["type"])) {
    $type = filter_var($_POST["type"], FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM nemlig_extension WHERE type = " . $type;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
} else {
    $json_response["msg"] = "POST type not set";
    echo json_encode($json_response;
}
