<?php
session_start();

if (!isset($_GET['store_id'])) {
    echo "Store ID not set.";
    exit();
}

$conn = mysqli_connect("localhost", "root", '', "dashboard");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// تتبع ما إذا تم زيادة المقابل المادي أم لا
$payment_increased = false;

// اذا تم الضغط على أي زر
if (isset($_POST['action'])) {
    $employee_id = $_SESSION['employee_id'];
    $store_id = $_GET['store_id'];
    $current_time = date("H:i:s"); 
    $price_query = "SELECT shift_price FROM stores WHERE id = '$store_id'";
    $price_result = $conn->query($price_query);
    
    if ($price_result->num_rows > 0) {
        $row = $price_result->fetch_assoc();
        $shift_price = $row['shift_price'];
    } else {
        echo "Shift price not found.";
        exit();
    }

    if ($_POST['action'] === 'start_shift') {
        $start_time = $current_time;
        $end_time = null;
        $query = "INSERT INTO employee_shifts (employee_id, store_id, start_shift, end_shift) VALUES ('$employee_id', '$store_id', '$start_time', '$end_time')";
        $message =  "
        <body bgcolor='#000000;'><br><br><br><br><br><br><br><br>   
        <h3 style='color:#6C7293;text-align:center;font-family:Bell MT;font-size:35px;'>Shift started successfully.<br>Pww proud of you :)<br><br><span style='color:#fff'>Good lucky</span></h3>
        <h4>Pww proud of you :)</h4>
        </body>";
                $payment_increased = true; // زيادة المقابل المادي
    } elseif ($_POST['action'] === 'end_shift') {
        $current_time = date("H:i:s");
        $end_time = $current_time;
        $query = "UPDATE employee_shifts SET end_shift = '$end_time' WHERE employee_id = '$employee_id' AND store_id = '$store_id'";
        $message =  "
        <body bgcolor='#000000;'><br><br><br><br><br><br><br><br>   
        <h3 style='color:#6C7293;text-align:center;font-family:Bell MT;font-size:35px;'>Shift ended successfully.<br>Pww proud of you :)<br><br><span style='color:#fff'>Thanks for your great efforts</span></h3>
        <h4>Pww proud of you :)</h4>
        </body>";
    }

    if ($conn->query($query) === TRUE) {
        echo $message;
        if ($payment_increased) {
            $total_payment_query = "UPDATE employees SET total_payment = total_payment + '$shift_price' WHERE id = '$employee_id'";
            $conn->query($total_payment_query);
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
