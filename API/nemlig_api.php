<?php
header('Content-Type: text/html; charset=utf-8');
include "db_conncet.php";


$json_response = [];
$json_response["success"] = false;


if (isset($_GET["type"])) {
    $type = filter_var($_GET["type"], FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM nemlig_extension WHERE type = " . $type;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $json_response["data"] = "id: " . $row["id"]. " - type: " . $row["type"]. " - e_p_k: " . $row["emmision_per_kg"]. "<br>";
            $json_response["success"] = true;
        }
    } else {
        $json_response["msg"] = "0 results in DB";
        echo json_encode($json_response);
    }
} else {
    $json_response["msg"] = "GET type not set";
    echo json_encode($json_response);
}
