<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/new.css">
    <!-- Optional theme -->
    <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title>Bon Appétit</title>
</head>

<body style="font-family:Quicksand;">
    <div id="bg">
        <img src="img/background.jpg" alt="">
    </div>
    <div class="container-fluid">
        <nav class="navbar navbar-inverse" style="opacity:0.6;">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header col-md-2">
                        <a class="navbar-brand" href="#" style="color:white;">Bon Appétit</a>
                    </div>
                    <div class=" col-md-offset-6">
                        <ul class="nav navbar-nav ">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cities <span class="caret"></span></a>
                                <ul class="dropdown-menu" id="citydd">
                                    <?php
                                $servername = 'servername';
                                $username = 'root';
                                $password = 'abcd';
                                $dbname = 'BonApetit';
// Create connection
                                $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
                                if (!$conn) {
                                    die('Connection failed: '.mysqli_connect_error());
                                }
                                $sql = 'SELECT * FROM city';
                                $result = mysqli_query($conn, $sql);
                                mysqli_close($conn);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<li><a href="city.php?cityid='.$row['id'].'&cityname='.$row['name'].'">'.$row['name'].'</a></li>';
                                }
                                ?>
                                </ul>
                            </li>
                            <li><a href="contact_us.html">Contact Us</a></li>
                            <li><a href="about_us.php">About Us</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
        <div class="row" style="margin-top:100px;">
            <div class="col-md-6 col-md-offset-3">
                <div class="well well-lg">
                    <h1> Need Help? </h1>
                    <h3> No Problem! Our customer support is available to help you through phone and email. </h3>
                    <h5> By phone <br>
				Monday-Friday (9 AM- 9 PM) <br>
				647-515-0488 </h5>
                    <div id="email">
                        <form action="mailto:karanbir1395@gmail.com" method="post" enctype="text/plain">
                            <div class="form-group">
                                FirstName:<input type="text" class="form-control" placeholder="Your name" name="FirstName"> Email:
                                <input type="text" class="form-control" placeholder="Email" name="Email">
                                <button class="btn btn-default" type="submit" name="submit" value="Submit">Submit</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
