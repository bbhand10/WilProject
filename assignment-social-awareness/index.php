<?php
include('includes/connection.php');
session_start();
if (isset($_POST['logout'])) {
    unset($_SESSION["user"]);
    echo "<script>alert('Logout Successfully.');</script>";
    echo "<script>window.location.replace('index.php');</script>";
}
if (isset($_POST['login_btn'])) {
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from users where username = '" . $user_name . "' and password = '" . $password . "'";
    $row = mysqli_query($con, $query);
    $record = mysqli_fetch_assoc($row);
    if ($record) {
        $_SESSION['user'] = $record;
        echo "<script>alert('Login Successfully.');</script>";
        echo "<script>window.location.replace('index.php');</script>";
        exit();
    }
    echo "<script>alert('invalid username & password.');</script>";
    echo "<script>window.location.replace('index.php');</script>";
}

if (isset($_POST['signup_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $validateQuery = "select * from users where username = '" . $username . "'";
    $validateRow = mysqli_query($con, $validateQuery);
    $validateRecord = mysqli_fetch_assoc($validateRow);
    if (!$validateRecord) {
        $query = "insert into users (name,email,username,password) values('" . $name . "','" . $email . "','" . $username . "','" . $password . "')";
        $row = mysqli_query($con, $query);
        if ($row) {
            echo "<script>alert('Your account has been created successfully.')</script>";
            echo "<script>window.location.replace('index.php');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('User already exists.')</script>";
    }

    echo "<script>window.location.replace('index.php');</script>";
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ACS Corp.</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="style/bootstrap_frontend.css" rel="stylesheet">
    <link rel="stylesheet" href="style/font_awesome_frontend/css/font-awesome.css">
    <script src="style/jquery_frontend.js"></script>
    <script src="style/bootstrap_frontend.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">

    <div class="navbar-header">
        <button class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse" type="button"><span
                    class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span></button>
        <a class="navbar-brand" onclick="return false;" style="color: white;">ACS Corporation</a></div>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['user']['name']) && !empty($_SESSION['user']['name'])) {
                ?>
                <li><a href="javascript:void(0)">Hello, <?php echo ucfirst($_SESSION['user']['name']); ?></a>

                <li>
                    <form class="form-inline my-2 my-lg-0" method="post">
                        <button name="logout" class="login-btn" type="submit">logout
                        </button>
                    </form>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <button class="login-btn" data-toggle="modal" data-target="#login_modal">Login</button>
                </li>
                <?php
            }
            ?>

        </ul>
    </div>
</nav>
<div class="home-page">
    <div class="welcome-mobile"><img alt="farm field and box package" class="mobile-img" src="images/banner.png"></div>
    <div class="home-textbox-bg">
        <div class="home-textbox">
            <p><img alt="Image" class="home-textbox-cart" src="images/megaphone.png">
            </p>
            <h1>Social Awareness</h1>
            <h1 style="font-size: 16px">Campaign</h1>
            <p>Awareness is like the sun. When it shines on things, they are transformed.</p>

        </div>
    </div>
</div>
<div class="new-products">
    <h2>Help us to build a global movement for a change.</h2>
    <h4>Our Campaigns</h4>
</div>
<div class="new-products-top"></div>
<div class="new-products">
    <div class="row">
        <div class="col-lg-3 col-sm-6 text-center">
            <div class="item">
                <img alt="box package" class="item-img" src="images/temp_image.png">
                <div class="item-hover">
                    <h3><b>Campaign Details</b></h3>
                    <h3>Name of the Campaign</h3>
                    <h5><b>Organizer: </b>
                        Alex
                    </h5>
                    <p><b>Venue: </b>Washington DC</p>
                    <p><b>Description</b></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dicta explicabo, fugiat iure
                        nulla porro qui rem soluta vero voluptatem. Amet dolore doloribus excepturi iusto nam, quas
                        unde? Esse, quibusdam.</p>
                </div>
                <h3><b>Compaign</b></h3>
                <h3>Environmental Education</h3>

                <br>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 text-center">
            <div class="item">
                <img alt="box package" class="item-img" src="images/temp_image.png">
                <div class="item-hover">
                    <h3><b>Campaign Details</b></h3>
                    <h3>Name of the Campaign</h3>
                    <h5><b>Organizer: </b>
                        Alex
                    </h5>
                    <p><b>Venue: </b>Washington DC</p>
                    <p><b>Description</b></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dicta explicabo, fugiat iure
                        nulla porro qui rem soluta vero voluptatem. Amet dolore doloribus excepturi iusto nam, quas
                        unde? Esse, quibusdam.</p>
                </div>
                <h3><b>Compaign</b></h3>
                <h3>Sustainability Connector</h3>

                <br>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 text-center">
            <div class="item">
                <img alt="box package" class="item-img" src="images/temp_image.png">
                <div class="item-hover">
                    <h3><b>Campaign Details</b></h3>
                    <h3>Name of the Campaign</h3>
                    <h5><b>Organizer: </b>
                        Alex
                    </h5>
                    <p><b>Venue: </b>Washington DC</p>
                    <p><b>Description</b></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dicta explicabo, fugiat iure
                        nulla porro qui rem soluta vero voluptatem. Amet dolore doloribus excepturi iusto nam, quas
                        unde? Esse, quibusdam.</p>
                </div>
                <h3><b>Compaign</b></h3>
                <h3>End Plastic Polllution</h3>

                <br>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 text-center">
            <div class="item">
                <img alt="box package" class="item-img" src="images/temp_image.png">
                <div class="item-hover">
                    <h3><b>Campaign Details</b></h3>
                    <h3>Name of the Campaign</h3>
                    <h5><b>Organizer: </b>
                        Alex
                    </h5>
                    <p><b>Venue: </b>Washington DC</p>
                    <p><b>Description</b></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dicta explicabo, fugiat iure
                        nulla porro qui rem soluta vero voluptatem. Amet dolore doloribus excepturi iusto nam, quas
                        unde? Esse, quibusdam.</p>
                </div>
                <h3><b>Compaign</b></h3>
                <h3>The Great Global Cleanup</h3>

                <br>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row well">
    <div class="col-sm-4">
        <div class="footer-top">
            <h4>GET IN TOUCH</h4>
            <p>acscorp@gmail.com</p>
            <p>acscorpinfo@gmail.com</p>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="footer-top">
            <h4>OUR CONTACT</h4>
            <p>+02 4051 6860<br>+07 5331 7814</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="footer-top">
            <h4>OUR ADDRESS</h4>
            <p>#8911, 67 Glendonbrook Road,<br>Victoria Lane, New South Wales, Australia.</p>
        </div>
    </div>
</div>
<div class="copyright">
    <p>&copy; ACS Corp. || 2020</p>
</div>

<!-- Login Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0px;">
                <i class=""></i>
                <div class="new-products" style="">
                    <h4>LOGIN HERE</h4>
                    <h2>Login to your account</h2>
                </div>
                <div class="new-products-top"></div>
                <div class="new-products" style="height: auto;">
                    <div class="contact">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="control-label">Username:</label>
                                <input class="form-control" name="username" placeholder="Enter Username"
                                       required="required"
                                       type="text">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password:</label>
                                <input class="form-control" name="password" placeholder="Enter Password"
                                       required="required" type="password">

                            </div>

                            <div class="form-group">
                                <button class="login-btn" name="login_btn" type="submit">Click to Login</button>
                                <a class="register-link" href="javascript:void(0)" data-toggle="modal"
                                   data-target="#signup_modal" data-dismiss="modal" style="text-decoration: none;">Not a
                                    Member???</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Sign-Up Modal-->
<div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="signup_modalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0px;">
                <i class=""></i>
                <div class="new-products" style="">
                    <h4>SIGNUP HERE</h4>
                    <h2>Create your account</h2>
                </div>
                <div class="new-products-top"></div>
                <div class="new-products" style="height: auto;">
                    <div class="contact">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="control-label">Name:</label>
                                <input class="form-control" name="name" placeholder="Enter your name"
                                       required="required"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email:</label>
                                <input class="form-control" name="email" placeholder="Enter your email"
                                       required="required"
                                       type="email">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Username:</label>
                                <input class="form-control" name="username" placeholder="Enter username"
                                       required="required"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password:</label>
                                <input class="form-control" name="password" placeholder="Enter password"
                                       required="required" type="password">

                            </div>

                            <div class="form-group">
                                <button class="login-btn" name="signup_btn" type="submit">Click to Login</button>
                                <a class="register-link" href="javascript:void(0)" data-toggle="modal"
                                   data-target="#login_modal" data-dismiss="modal" style="text-decoration: none;">Already
                                    a
                                    Member???</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>