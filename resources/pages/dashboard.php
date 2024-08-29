<?php
session_start();
include "../controllers/db_connection.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    # code...

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FIS | Dashboard</title>
        <!-- title icon -->
        <link rel="shortcut icon" href="../images/uokfavicon.ico">
        <!-- link bootstrap 5.3.2 css  -->
        <link rel="stylesheet" href="../bootstrap 5.3.2/css/bootstrap.min.css">
        <!-- link common css  -->
        <link rel="stylesheet" href="../css/common.css">
        <!-- link custom css  -->
        <link rel="stylesheet" href="../css/dashboard.css">
        <!-- link jquery 3.7.1  -->
        <script src="../jquery-3.7.1.min.js"></script>
        <!-- Google charts  -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>

    <body>
        <!-- top navbar start  -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- nav brand start  -->
                <a class="navbar-brand mb-0 h1" href="dashboard.php">Faculty Information System</a>
                <!-- nav brand end  -->

                <!-- navbar mobile toggler Start -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="border: none;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- navbar mobile toggler END -->

                <!-- offcanvas start  -->
                <div class="offcanvas offcanvas-lg offcanvas-start fw-semibold fs-6 navTheme" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <!-- offcanvas header start  -->
                    <div class="offcanvas-header">
                        <a class="navbar-brand mb-0 h1" href="dashboard.php">Faculty Information System</a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <!-- offcanvas header end  -->
                    <!-- offcanvas body start  -->
                    <div class="offcanvas-body d-flex flex-md-row flex-column justify-content-center">
                        <!-- main navs start  -->
                        <div class="flex-md-fill">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="results.php">Results</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="registeredCourse.php">Registered Courses</a>
                                </li>
                            </ul>
                        </div>
                        <!-- main navs end  -->
                        <!-- secondary nav start  -->
                        <div class="">
                            <ul class="navbar-nav align-items-center">
                                <!-- contact us page  -->
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="contactUs.php">Contact Us</a>
                                </li>
                                <!-- FAQ's page  -->
                                <li class="nav-item">
                                    <a class="nav-link " href="FAQ.php">FAQ's</a>
                                </li>
                                <!-- Profile selection menu start   -->
                                <li class="nav-item dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        A
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown" style="box-shadow: 0px 0px 5px gray;">
                                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileModal"><i class="fa-regular fa-user fa-lg"></i> Profile</button></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <!-- logout button start -->
                                        <li>
                                            <a class="btn btn-danger btnLogOut" href="../controllers/logOut.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket fa-xl" style="color: #ffFFFF;"></i> Log Out</a>
                                        </li>
                                        <!-- logout button end  -->
                                    </ul>
                                </li>
                                <!-- Profile selection menu end -->
                            </ul>
                        </div>
                        <!-- secondary nav end  -->
                    </div>
                    <!-- offcanvas body end  -->
                </div>
                <!-- offcanvas end  -->
            </div>
        </nav>
        <!-- top navbar end  -->
        <!--  top sitemap  start-->
        <nav aria-label="breadcrumb" class="top-map mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <!-- top sitemap end  -->
        <!-- main container start  -->
        <div class="container">

            <!-- Profile modal start -->
            <div class="modal fade " id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content border-0 rounded-4">
                        <div class="modal-body ">
                            <div class="row">

                                <!-- left side start  -->
                                <div class="col-md-4">
                                    <!-- image area start  -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="../images/profile.png" class="img-thumbnail rounded-circle profileImage" alt="...">
                                        </div>
                                    </div>
                                    <!-- image area end  -->

                                    <!-- name with initials start  -->
                                    <div class="row mt-4">
                                        <div class="col-md-12 text-center fw-bold" id="nameWithInitialsProfile"></div>
                                    </div>
                                    <!-- name with initials end  -->
                                </div>
                                <!-- left side end  -->

                                <!-- right side start  -->
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Profile Details</h3>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Full name label start  -->
                                            <div class="row">
                                                <div class="col-md-12 txtLabel">Full Name:</div>
                                            </div>
                                            <!-- Full name label end  -->
                                            <!-- Full name text start  -->
                                            <div class="row mb-3">
                                                <div class="col-md-12 txtValue" id="fullNameProfile"></div>
                                            </div>
                                            <!-- Full name text end  -->

                                            <div class="row mb-3">
                                                <!-- Student No area start  -->
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12 txtLabel">Student No:</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 txtValue" id="studentNoProfile"></div>
                                                    </div>
                                                </div>
                                                <!-- Student No area end  -->

                                                <!-- relevand handook year start  -->
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-12 txtLabel">Relevant Student hand Book:</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 txtValue" id="studentBookProfile"></div>
                                                    </div>
                                                </div>
                                                <!-- relevand handook year end  -->
                                            </div>

                                            <!-- Email label start  -->
                                            <div class="row">
                                                <div class="col-md-12 txtLabel">Email:</div>
                                            </div>
                                            <!-- Email label end  -->
                                            <!-- Email text start  -->
                                            <div class="row mb-3">
                                                <div class="col-md-12 txtValue" id="emailProfile"></div>
                                            </div>
                                            <!-- Email text end  -->
                                            <!-- Mobile label start  -->
                                            <div class="row">
                                                <div class="col-md-12 txtLabel">Mobile No:</div>
                                            </div>
                                            <!-- Mobile label end  -->
                                            <!-- Mobile text start  -->
                                            <div class="row">
                                                <div class="col-md-12 txtValue" id="mobileNoProfile"></div>
                                            </div>
                                            <!-- Mobile text end  -->
                                        </div>
                                    </div>
                                </div>
                                <!-- right side end  -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btnCloseProfile" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile modal end  -->

            <!-- page heading start  -->
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Dashboard</h1>
                </div>
            </div>
            <!-- page heading end  -->
            <!-- Greeting start  -->
            <div class="row mt-2">
                <div class="col-12 ">
                    <h4 class="fw-bold">Welcome back,
                        <?php
                        $getName = "SELECT name_with_initials FROM student_details WHERE id='" . $_SESSION['studentId'] . "';";
                        $result = mysqli_query($conn, $getName);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['name_with_initials'];
                        ?> 👋</h4>
                </div>
            </div>
            <!-- Greeting end  -->

            <div class="row mt-4">
                <div class="col-md-2 text-center">
                    <p>Your Current GPA</p>

                    <a href="#" id="firstYearGPACardArea" style="visibility: hidden;">
                        <div class="card mb-3 GPA_Card rounded-3" id="firstYearGPACard">
                            <div class="card-body ">
                                <h6>Year 01</h6>
                                <p style="margin:0;" class="GPA_Value" id="firstYearGPA">3.40</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" id="secondYearGPACardArea" style="visibility: hidden;">
                        <div class="card mb-3 GPA_Card rounded-3" id="secondYearGPACard">
                            <div class="card-body">
                                <h6>Year 02</h6>
                                <p style="margin:0;" class="GPA_Value" id="secondYearGPA">3.40</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" id="thirdYearGPACardArea" style="visibility: hidden;">
                        <div class="card mb-3 GPA_Card rounded-3" id="thirdYearGPACard">
                            <div class="card-body">
                                <h6>Year 03</h6>
                                <p style="margin:0;" class="GPA_Value" id="thirdYearGPA">3.40</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" id="fourthYearGPACardArea" style="visibility: hidden;">
                        <div class="card GPA_Card rounded-3" id="fourthYearGPACard">
                            <div class="card-body">
                                <h6>Year 04</h6>
                                <p style="margin:0;" class="GPA_Value" id="fourthYearGPA">3.40</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- chart area start  -->
                <div class="col-md-10">
                    <div id="chart_div_1" style=" height: 500px;">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="spinner-grow text-warning" style="width: 3rem; height: 3rem;" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div id="chart_div_2" style=" height: 500px;">
                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div id="chart_div_3" style=" height: 500px;">
                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div id="chart_div_4" style=" height: 500px;">
                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chart area end  -->

            <!-- footer start  -->
            <div class="row footer my-3">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <p>COST 22073 - Web Development Project 2023</p>
                </div>
            </div>
            <!-- footer end  -->

        </div>
        <!-- main container end  -->
    </body>
    <!-- link bootstrap JS  -->
    <script src="../bootstrap 5.3.2/js/bootstrap.bundle.min.js"></script>
    <!-- link dashboard custom js  -->
    <script src="../js/dashboard.js"></script>
    <!-- link common js  -->
    <script src="../js/common.js"></script>

    </html>
<?php
} else {
    header("Location:/FIS/index.html");
    exit();
}
?>