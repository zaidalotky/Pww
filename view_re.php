<?php

session_start();

 $conn=mysqli_connect("localhost","root",'',"dashboard");


if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$sql = "SELECT daily_reports.id, employees.name, daily_reports.report_date, daily_reports.content FROM daily_reports INNER JOIN employees ON daily_reports.employee_id = employees.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"<link rel='stylesheet' type='text/css' href='table.css'>    ";
    echo "<table>";
    echo "<tr><th>Name employee</th><th>Contant</th><th>Date report</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        echo "<td>" . $row["report_date"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد تقارير متاحة.";
}

$conn->close();
?>


