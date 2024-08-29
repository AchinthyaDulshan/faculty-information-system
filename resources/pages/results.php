<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    # code...

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FIS | Results</title>
        <!-- title icon -->
        <link rel="shortcut icon" href="../images/uokfavicon.ico">
        <!-- link bootstrap 5.3.2 css  -->
        <link rel="stylesheet" href="../bootstrap 5.3.2/css/bootstrap.min.css">
        <!-- link common css  -->
        <link rel="stylesheet" href="../css/common.css">
        <!-- link custom css  -->
        <link rel="stylesheet" href="../css/results.css">
        <!-- link jquery 3.7.1  -->
        <script src="../jquery-3.7.1.min.js"></script>
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
                                    <a class="nav-link active" aria-current="page" href="results.php">Results</a>
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
        <!-- top sitemap start  -->
        <nav aria-label="breadcrumb" class="top-map mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Results</li>
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
                    <h1>Results</h1>
                </div>
            </div>
            <!-- page heading end  -->
            <!-- tab area start  -->
            <div class="row">
                <div class="col-12">
                    <!-- tab list start  -->
                    <ul class="nav nav-tabs mb-3 " id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation" style="visibility: hidden;" id="firstYearNav">
                            <button class="nav-link active " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#firstYear" type="button" aria-selected="true">Year 01</button>
                        </li>
                        <li class="nav-item" role="presentation" style="visibility: hidden;" id="secondYearNav">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#secondYear" type="button" aria-selected="false">Year 02</button>
                        </li>
                        <li class="nav-item" role="presentation" style="visibility: hidden;" id="thirdYearNav">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#thirdYear" type="button" aria-selected="false">Year 03</button>
                        </li>
                        <li class="nav-item" role="presentation" style="visibility: hidden;" id="fourthYearNav">
                            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#fourthYear" type="button" aria-selected="false">Year 04</button>
                        </li>
                    </ul>
                    <!-- tab list end  -->
                    <!-- tab content start  -->
                    <div class="tab-content" id="pills-tabContent">
                        <!-- First Year tab start  -->
                        <div class="tab-pane fade show active" id="firstYear" role="tabpanel" tabindex="0">
                            <!-- Result table area start  -->
                            <table class="table table-hover" id="firstYearResultsTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Academic Year</th>
                                        <th>Attempt</th>
                                        <th>Exam Status</th>
                                        <th>Note</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- result table area end  -->

                            <!-- credit and GPA shown area start  -->
                            <div class="row mt-2">
                                <div class="col-md-6 offset-md-3">
                                    <div class="card rounded-4 CreditGPASummaryCard">
                                        <div class="card-body">
                                            <table class="table mb-0" >
                                                <tbody>
                                                    <tr>
                                                        <td>Total Credits</td>
                                                        <td id="totalCreditsFirstYear"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Credit - Non GPA / Credit Not Count for GPA </td>
                                                        <td id="totalNonGpaCreditsFirstYear"></td>
                                                    </tr>
                                                    <tr >
                                                        <td style="border: 0;">GPA</td>
                                                        <td style="border: 0;" id="GPAFirstYear"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- credit and GPA shown area end  -->
                        </div>
                        <!-- First year tab end  -->

                        <!-- Second year tab start  -->
                        <div class="tab-pane fade" id="secondYear" role="tabpanel" tabindex="0">
                            <!-- Result table area start  -->
                            <table class="table table-hover" id="secondYearResultsTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Academic Year</th>
                                        <th>Attempt</th>
                                        <th>Exam Status</th>
                                        <th>Note</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- result table area end  -->

                            <!-- credit and GPA shown area start  -->
                            <div class="row mt-2">
                                <div class="col-md-6 offset-md-3">
                                    <div class="card rounded-4 CreditGPASummaryCard">
                                        <div class="card-body">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Total Credits</td>
                                                        <td id="totalCreditsSecondYear"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Credit - Non GPA / Credit Not Count for GPA </td>
                                                        <td id="totalNonGpaCreditsSecondYear"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:0;">GPA</td>
                                                        <td style="border:0;" id="GPASecondYear"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- credit and GPA shown area end  -->
                        </div>
                        <!-- second year tab end  -->

                        <!-- third year tab start  -->
                        <div class="tab-pane fade" id="thirdYear" role="tabpanel" tabindex="0">
                            <!-- Result table area start  -->
                            <table class="table table-hover" id="thirdYearResultsTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Academic Year</th>
                                        <th>Attempt</th>
                                        <th>Exam Status</th>
                                        <th>Note</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- result table area end  -->

                            <!-- credit and GPA shown area start  -->
                            <div class="row mt-2">
                                <div class="col-md-6 offset-md-3">
                                    <div class="card rounded-4 CreditGPASummaryCard">
                                        <div class="card-body">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Total Credits</td>
                                                        <td id="totalCreditsThirdYear"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Credit - Non GPA / Credit Not Count for GPA </td>
                                                        <td id="totalNonGpaCreditsThirdYear"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:0;">GPA</td>
                                                        <td style="border:0;" id="GPAThirdYear"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- credit and GPA shown area end  -->
                        </div>
                        <!-- third year tab end  -->

                        <!-- fourth year tab start  -->
                        <div class="tab-pane fade" id="fourthYear" role="tabpanel" tabindex="0">
                            <!-- Result table area start  -->
                            <table class="table table-hover" id="fourthYearResultsTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Academic Year</th>
                                        <th>Attempt</th>
                                        <th>Exam Status</th>
                                        <th>Note</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- result table area end  -->

                            <!-- credit and GPA shown area start  -->
                            <div class="row mt-2">
                                <div class="col-md-6 offset-md-3">
                                    <div class="card rounded-4 CreditGPASummaryCard">
                                        <div class="card-body">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Total Credits</td>
                                                        <td id="totalCreditsFourthYear"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Credit - Non GPA / Credit Not Count for GPA </td>
                                                        <td id="totalNonGpaCreditsFourthYear"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:0;">GPA</td>
                                                        <td style="border:0;" id="GPAFourthYear"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- credit and GPA shown area end  -->
                        </div>
                        <!-- fourth year tab end  -->
                    </div>
                    <!-- tab content end  -->
                </div>
            </div>
            <!-- tab area end  -->

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
    <!-- link custom js  -->
    <script src="../js/results.js"></script>
    <!-- link common js file  -->
    <script src="../js/common.js"></script>

    </html>
<?php
} else {
    header("Location:/FIS/index.html");
    exit();
}
?>