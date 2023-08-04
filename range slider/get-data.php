<?php

$conn = mysqli_connect("localhost", "root", "", "info") or die("Connection failed");

if(isset($_POST['range1']) && isset($_POST['range2'])) {
    $min = $_POST['range1'];
    $max = $_POST['range2'];

    $sql = "SELECT * FROM student WHERE Age BETWEEN {$min} AND {$max}";
}else {
    $min = '';
    $max = '';
    $sql = "SELECT * FROM student ORDER BY id asc";
}

$result = mysqli_query($conn, $sql) or("Query failed");

$output = "";

if(mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $output .= "<tr> 
               <td>{$row['id']}</td>
               <td>{$row['stu_name']}</td>
               <td>{$row['last_name']}</td>
               <td>{$row['Age']}</td>
                <td>{$row['City']}</td>
       </tr>";
  }


 echo  $output;

}else {
    echo "No Record Found.";
}






?>