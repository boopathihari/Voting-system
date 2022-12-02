<?php
require('dbConnect.php');


$candidate = $_POST['canditates'];
$candidateJS = $_POST['canditatesJS'];

$sql_query = "INSERT INTO details(CandidateJS,CandidateGS) VALUES('$candidateJS','$candidate')";


$result = mysqli_query($conn, "SELECT count(*) as total from details");
$data = mysqli_fetch_assoc($result);


if ($conn->query($sql_query)) {
    echo 'Your vote has been submitted.     Thanks for your voting.';
} else {
    echo "ERROR:" . $sql . "" . mysqli_error($conn);
}


mysqli_close($conn);

