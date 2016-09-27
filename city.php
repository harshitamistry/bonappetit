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
    <div id="bg" style="z-index:-1;">
        <img src="img/background.jpg" alt="">
    </div>
    <div class="container-fluid">
        <nav class="navbar navbar-inverse" style="opacity:0.6;">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header col-md-2">
                        <a class="navbar-brand" href="index.php" style="color:white;">Bon Appétit</a>
                    </div>
                    <div class="col-md-offset-6">
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
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<li><a href="city.php?cityid='.$row['id'].'&cityname='.$row['name'].'">'.$row['name'].'</a></li>';
                                }
                                mysqli_close($conn);
                                ?>
                                </ul>
                            </li>
                            <li><a href="contact_us.php">Contact Us</a></li>
                            <li><a href="about_us.php">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="page-header" style="margin-top:150px;">
            <?php
                    echo '<h1>'.$_GET['cityname'].'  <small style="color:black;">best places to eat around..</small></h1>';
                ?>
        </div>

        <div class="row" style="margin-top:20px;">
            <?php
                                $cityid = $_GET['cityid'];
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
                                $sql = 'SELECT id,name FROM restaurants where cityid='.$cityid;
                                $result = mysqli_query($conn, $sql);
                                mysqli_close($conn);
                                $cnt = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($cnt != 0) {
                                        echo '<div class="col-md-3 col-md-offset-1"><a href="restaurant.php?id='.$row['id'].'"><div class="well well-lg"><h3>'.$row['name'].'</h3><img style="max-width:100%;max-height:100%;"src="getImage.php?id='.$row['id'].'"/></div></a></div>';
                                    } else {
                                        echo '<div class="col-md-3"><a href="restaurant.php?id='.$row['id'].'"><div class="well well-lg"><h3>'.$row['name'].'</h3><img style="max-width:100%;max-height:100%;"src="getImage.php?id='.$row['id'].'"/></div></a></div>';
                                    }
                                    $cnt = $cnt + 1;
                                }
                                ?>

        </div>
    </div>
</body>

</html>
