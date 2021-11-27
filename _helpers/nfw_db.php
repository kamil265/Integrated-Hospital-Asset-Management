<?php

//connect
$db = new mysqli ($setDb['db_host'],$setDb['db_user'], $setDb['db_password'], $setDb['db_name']);

// function pilih($a='',$b='',$c=''){
//     $sql = "SELECT .$a.,.$b. FROM .&c.";
//     $result = $db->query($sql);
//     return $result;
// }


// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
// $db->close();
