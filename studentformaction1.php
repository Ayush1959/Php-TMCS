<html>
<head>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 10px;
  color: #ddddd;
}
</style>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $college = array();
  $name =array();
  $no = array();
  $english = array();
  $maths = array();
  $biology = array();
  $physics = array();
  $computer = array();
  for ($x=0; $x <6 ; $x++) {
    if (!empty($_POST["college$x"])) {
      array_push($college,test_input($_POST["college$x"]));
    }
    if (!empty($_POST["name$x"])) {
      array_push($name,test_input($_POST["name$x"]));
    }
    if (!empty($_POST["no$x"])) {
      array_push($no,test_input($_POST["no$x"]));
    }
    if (!empty($_POST["english$x"])) {
      array_push($english,test_input($_POST["english$x"]));
    }
    if (!empty($_POST["maths$x"])) {
      array_push($maths,test_input($_POST["maths$x"]));
    }
    if (!empty($_POST["biology$x"])) {
      array_push($biology,test_input($_POST["biology$x"]));
    }
    if (!empty($_POST["physics$x"])) {
      array_push($physics,test_input($_POST["physics$x"]));
    }
    if (!empty($_POST["computer$x"])) {
      array_push($computer,test_input($_POST["computer$x"]));
    }
  }
}
function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<?php
echo "<table>";
echo "<tr>
<th>College</th>
<th>Student Name</th>
<th>ROLL NO</th>
<th>Marks in English</th>
<th>Marks in Maths</th>
<th>marks in Biology</th>
<th>Marks in Physics</th>
<th>Marks in Computer</th>
</tr>";
  for ($y=0; $y <5 ; $y++) {
    echo "<tr>
    <td>$college[$y]</td>
    <td>$name[$y]</td>
    <td>$no[$y]</td>
    <td>$english[$y]</td>
    <td>$maths[$y]</td>
    <td>$biology[$y]</td>
    <td>$physics[$y]</td>
    <td>$computer[$y]</td>
    </tr>";

  }

 ?>

 <?php
$engarray = array_combine($name,$english);
$matharray = array_combine($name,$maths);
$bioarray = array_combine($name,$biology);
$phyarray = array_combine($name,$physics);
$cmparray = array_combine($name,$computer);

echo "<b><br>English</b><br>";
arsort($engarray);
foreach($engarray as $x => $x_value) {
    echo "Name=" . $x . ", Mark=" . $x_value;
    echo "<br>";
}

echo "<b><br>Maths</b><br>";
arsort($matharray);
foreach($matharray as $x => $x_value) {
    echo "Name=" . $x . ", Mark=" . $x_value;
    echo "<br>";
}

echo "<b><br>Biology</b><br>";
arsort($bioarray);
foreach($bioarray as $x => $x_value) {
    echo "Name=" . $x . ", Mark=" . $x_value;
    echo "<br>";
}

echo "<b><br>Physics</b><br>";
arsort($phyarray);
foreach($phyarray as $x => $x_value) {
    echo "Name=" . $x . ", Mark=" . $x_value;
    echo "<br>";
}

echo "<b><br>Computer</b><br>";
arsort($cmparray);
foreach($cmparray as $x => $x_value) {
    echo "Name=" . $x . ", Mark=" . $x_value;
    echo "<br>";
}




 ?>
