<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard Pww</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="icon1.icon" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css-f/css/all.min.css">   
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa-solid fa-globe"></i>&nbsp;&nbsp;Pww</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                    <?php
                    $conn=mysqli_connect("localhost","root",'',"dashboard");
                    $employee_id = $_GET['id'];

    // استعلام SQL لاسترجاع معلومات الموظف
    $sql = "SELECT * FROM employees WHERE id = '$employee_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // عرض معلومات الموظف
        $row = $result->fetch_assoc();
        echo "<h6>" . $row['name'] . "</h6>";
    } else {
        echo "لم يتم العثور على معلومات الموظف";
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
                    ?>


                        </h6>
                        <?php
                          $conn=mysqli_connect("localhost","root",'',"dashboard");
                          $employee_id = $_GET['id'];
      
          // استعلام SQL لاسترجاع معلومات الموظف
          $sql = "SELECT * FROM employees WHERE id = '$employee_id'";
          $result = $conn->query($sql);
      
          if ($result->num_rows > 0) {
              // عرض معلومات الموظف
              $row = $result->fetch_assoc();
              echo "<span>" . $row['position'] . "</span>";
          } else {
              echo "لم يتم العثور على معلومات الموظف";
          }
      
          // إغلاق الاتصال بقاعدة البيانات
          $conn->close();
                        ?>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <div class="navbar-nav w-100">
                    <a href="index.php?id=<?php echo $employee_id; ?>" class="nav-item nav-link active"><i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;Employees</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-newspaper"></i>&nbsp;&nbsp;Display</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Report.php?id=<?php $employee_id = $_GET['id']; echo $employee_id; ?>&store_id=1" class="dropdown-item">Report</a>
                            <a href="Shifts.php?id=<?php $employee_id = $_GET['id']; echo $employee_id; ?>&store_id=2" class="dropdown-item">Shifts</a>
                        </div>
                    </div>
                    <a href="financial return.php?id=<?php $employee_id = $_GET['id']; echo $employee_id; ?>" class="nav-item nav-link"><i class="fa-solid fa-coins"></i>&nbsp;&nbsp;Financial Return</a>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                   
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                </div>
                                <div class="d-flex align-items-center">
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                    
                        <i class="fa-solid fa-store" style="font-size: 25px;"></i>&nbsp;&nbsp;&nbsp;<a href="https://pww.company" style="font-size: 20px;">Store Pww</a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Other Elements Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                </div>
            </div>
            <!-- Other Elements End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                        
                        <?php
 $conn=mysqli_connect("localhost","root",'',"dashboard");


if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$sql = "SELECT daily_reports.id, employees.name, daily_reports.report_date, daily_reports.content FROM daily_reports INNER JOIN employees ON daily_reports.employee_id = employees.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"<div class='table-responsive'>";
    echo "<table class='table table1'>"; 
    echo "<tr><th scope='col'>Name employee</th><th scope='col'>Contant</th><th scope='col'>Date report</th></tr>";
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
echo"</div>";
$conn->close();
?>

                        </div>
                        </div>   
                           <div class="row g-4">
                           <div class="col-sm-12 col-xl-6 text-center text-sm-start">
                           <div class="bg-secondary rounded h-100 p-4">
                                &copy; <a href="#">Pww</a>&nbsp;&nbsp;&nbsp;Service custmor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                        </div>
                        </div>
            </div>   
                    </div>
                </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>