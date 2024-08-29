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
        <title>FIS | FAQ's</title>
        <!-- title icon -->
        <link rel="shortcut icon" href="../images/uokfavicon.ico">
        <!-- link bootstrap 5.3.2 css  -->
        <link rel="stylesheet" href="../bootstrap 5.3.2/css/bootstrap.min.css">
        <!-- link common css  -->
        <link rel="stylesheet" href="../css/common.css">
        <!-- link custom css  -->
        <link rel="stylesheet" href="../css/FAQ.css">
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
                                    <a class="nav-link active" href="FAQ.php">FAQ's</a>
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
        <!-- top site map start  -->
        <nav aria-label="breadcrumb" class="top-map mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ's</li>
            </ol>
        </nav>
        <!-- top site map end  -->
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
                    <h1>Frequently Asked Questions (FAQ's)</h1>
                </div>
            </div>
            <!-- page heading end  -->

            <!-- FAQ section start  -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="accordion " id="FAQSection">
                        <!-- Question 01 Start  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Credit Value vs Notional Hours
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#FAQSection">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 FAQ_Q01_answerTitles">
                                                    <i class="fa-solid fa-circle-check"></i> Theory course unit:
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    Credit 1
                                                </div>
                                                <div class="col-md-10">
                                                    <p>= 50 notional hours
                                                    </p>
                                                    <p>= 15 contact hours of interactive lectures/tutorials
                                                        + 35 hours of independent learning</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 FAQ_Q01_answerTitles">
                                                    <i class="fa-solid fa-circle-check"></i> Practical course unit:
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    Credit 1
                                                </div>
                                                <div class="col-md-10">
                                                    <p>= 50 notional hours </p>
                                                    <p>= 30 hours of practical + 20 hours of independent learning</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 FAQ_Q01_answerTitles">
                                                    <i class="fa-solid fa-circle-check"></i> Theory cum practical course unit:
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    Credit 1
                                                </div>
                                                <div class="col-md-10">
                                                    <p>= 50 notional hours
                                                    </p>
                                                    <p>= 10 hours of lecture + 30 hours of practical
                                                        + 10 hours of independent learning</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 FAQ_Q01_answerTitles">
                                                    <i class="fa-solid fa-circle-check"></i> Industrial training course unit:
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    Credit 1
                                                </div>
                                                <div class="col-md-10">
                                                    <p>= 100 notional hours of independent learning
                                                        including time allocated for assessments </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 FAQ_Q01_answerTitles">
                                                    <i class="fa-solid fa-circle-check"></i> Research project course unit:
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    Credit 1
                                                </div>
                                                <div class="col-md-10">
                                                    <p>= 50 notional hours
                                                    </p>
                                                    <p>= 100 notional hours involving independent studies on
                                                        literature survey, field/laboratory work, data analysis,
                                                        writing research proposal/progress reports/dissertation
                                                        and presentations</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Question 01 End  -->

                        <!-- Question 02 Start  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Course Registration and Add/Drop Courses
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#FAQSection">
                                <div class="accordion-body">
                                    <div class="FAQQuestionBody">
                                        <i class="fa-solid fa-circle-check"></i> You must register for Course Units within the <span class="FAQTextBold">first two weeks </span> of <span class="FAQTextBold"> each Academic Year</span>. <br>
                                        <i class="fa-solid fa-circle-check"></i> No changes are allowed <span class="FAQTextBold"> after 2 nd week </span>. <br>
                                        <i class="fa-solid fa-circle-check"></i> You can check your registration details by login into <a class="linkToOtherSite" href="registeredCourse.php" target="_blank"> Faculty Information System </a>. <br>
                                        <i class="fa-solid fa-circle-check"></i> You should also enroll in courses in <a class="linkToOtherSite" href="registeredCourse.php" target="_blank"> eKelaniya</a> Learning Management System (LMS).
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Question 02 End  -->

                        <!-- Question 03 Start  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Grade Point Average (GPA)
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#FAQSection">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="FAQQuestionBody">
                                                <i class="fa-solid fa-circle-check"></i> GPA is an indication of how well a student has performed in the respective degree programme. <br>
                                                <i class="fa-solid fa-circle-check"></i> A 4.0 scale GPA scale is used. <br>
                                                <i class="fa-solid fa-circle-check"></i> GPA is a numerical value between 0.0 and 4.0. <br>
                                                <i class="fa-solid fa-circle-check"></i> Better the performance higher the GPA would be.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="../images/GPA.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Question 03 End  -->
                        <!-- Question 04 Start  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Course Code
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#FAQSection">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <img src="../images/courseCode.png" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Question 04 End  -->
                    </div>
                </div>
            </div>
            <!-- FAQ section end  -->

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
    <!-- link common js  -->
    <script src="../js/common.js"></script>

    </html>
<?php
} else {
    header("Location:/FIS/index.html");
    exit();
}
?>