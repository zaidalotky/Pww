<?php
session_start();
$conn=mysqli_connect("localhost","root",'',"dashboard");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$id = $_SESSION['employee_id'];
$content = $_POST['content'];

$sql = "INSERT INTO daily_reports (employee_id, report_date, content) VALUES ('$id', NOW(), '$content')";

if ($conn->query($sql) === TRUE) {
echo"<body bgcolor='#000000;'><br><br><br><br><br><br><br><br><br>";
echo"<h2 style='color:#6C7293;text-align:center;font-family:Bell MT;font-size:35px;padding-right:10px'>The report has been saved successfully </h2>";
echo"<span style='color:#fff;margin-left:400px;font-size:22px;border-bottom:solid 1px #fff;padding-top:0px;'>Thank you for noticing</span>";
echo"</body>";
header("Refresh:3; URL=index.php?id=" . $id);} else {
    echo "خطأ: " . $conn->error;
}
$id_store= $_POST['stid'];
$shift = $_POST['shift'];
$start = $_POST['start'];
$end = $_POST['End'];
//تم تعريف المتغيرات المستقبلة , الان كود ال sql

$sql1="INSERT INTO `employee_shifts` (`id`, `employee_id`, `store_id`, `start_shift`, `end_shift`) VALUES (NULL, '$id', '$id_store', '$start', '$end');";
$result1=mysqli_query($sql1,$conn);
if(mysqli_query($result1)){
    echo"Good Lucky :)";
}
else{
    echo"there is error";
}
$conn->close();
?>
