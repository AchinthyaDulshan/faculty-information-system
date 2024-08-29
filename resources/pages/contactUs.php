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
        <title>FIS | Contact Us</title>
        <!-- title icon -->
        <link rel="shortcut icon" href="../images/uokfavicon.ico">
        <!-- link bootstrap 5.3.2 css  -->
        <link rel="stylesheet" href="../bootstrap 5.3.2/css/bootstrap.min.css">
        <!-- link common css  -->
        <link rel="stylesheet" href="../css/common.css">
        <!-- link custom css  -->
        <link rel="stylesheet" href="../css/contactUs.css">
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
                                    <a class="nav-link active" aria-current="page" href="contactUs.php">Contact Us</a>
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

        <!-- site map start  -->
        <nav aria-label="breadcrumb" class="top-map mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
        <!-- site map end  -->
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

            <!-- error message modal start  -->
            <div class="modal fade" id="errorMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content text-center rounded-4">
                        <div class="modal-body" id="">
                            <div class="alert alert-danger" role="alert" >
                            <i class="fa-solid fa-circle-xmark" style="color: #dc3545;"></i>
                                Something went wrong
                            </div>
                            <div id="modalMessage">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btnModal" data-bs-dismiss="modal" style="margin: 0 auto;">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- error message modal end  -->

            <!-- success message modal start  -->
            <div class="modal fade" id="successMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content text-center rounded-4">
                        <div class="modal-body" id="modalSucceessMessage">
                            <div class="alert alert-success" role="alert">
                                <i class="fa-solid fa-envelope-circle-check" style="color: #198754;"></i> Your Email has been sent Successfully.
                            </div>
                            We will contact you soon.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btnModalSuccess" data-bs-dismiss="modal" style="margin: 0 auto;">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- success message modal end  -->

            <!-- page heading start  -->
            <div class="row">
                <div class="col-12 text-center my-sm-3 m-md-0">
                    <h1>Contact Us</h1>
                </div>
            </div>
            <!-- page heading end  -->

            <!-- page content start  -->
            <div class="row">
                <!-- contact us form start  -->
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                    <div class="card contactUsCard rounded-4">
                        <div class="card-body">
                            <p class="informationText">Check <a href="FAQ.php">Frequently Asked Questions (FAQs)</a> to see whether you could find the answer to your problem. If your question is a general one, we may not answer.</p>
                            <form action="../controllers/sendMail.php" method="post">
                                <div class="row">
                                    <div class="col">
                                        <!-- student no  -->
                                        <!-- <div class="form-floating mb-3">
                                            <input type="text" class="form-control rounded-3" id="txtStudentNo" placeholder="XX/20XX/XXX" name="studentId">
                                            <label for="txtStudentNo">Student No</label>
                                        </div> -->
                                        <!-- email address -->
                                        <!-- <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="txtEmailAddress" placeholder="name@example.com" name="email">
                                            <label for="txtEmailAddress">Email Address</label>
                                        </div> -->
                                        <!-- subject -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control rounded-4" id="txtSubject" placeholder="subject" name="subject">
                                            <label for="txtSubject">Subject</label>
                                        </div>
                                        <!-- message  -->
                                        <div class="form-floating mb-4">
                                            <textarea class="form-control rounded-4" id="txtMessage" placeholder="message here" style="height: 13rem;" name="message"></textarea>
                                            <label for="txtMessage">Message</label>
                                        </div>
                                        <div class="text-center ">
                                            <input class="btn btn-success btnSend w-100" type="submit" value="SEND">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- contact us form end  -->

                <!-- contact us image start  -->
                <div class="col-md-6 d-none d-md-block">
                    <img src="../images/contactUs.jpg" class="img-fluid imgContactUs" alt="" srcset="" style="height: 90%;">
                </div>
                <!-- contact us image end  -->
            </div>
            <!-- page content end  -->

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
    <script src="../js/contactUs.js"></script>
    <!-- link common js  -->
    <script src="../js/common.js"></script>

    </html>
<?php
} else {
    header("Location:/FIS/index.html");
    exit();
}
?>