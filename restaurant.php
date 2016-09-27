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

<body style="font-famliy:Quicksand;">
    <script>
        var total = 0;
        var arr = [];

        function calc(id) {
            var element = document.getElementsByName(id)[0];
            if (arr.indexOf(id) == -1) {
                total = total + parseFloat(element.innerHTML);
                arr.push(id);
            } else {
                total = total - parseFloat(element.innerHTML);
                arr.splice(arr.indexOf(id), 1);
            }
            document.getElementById("calory").innerHTML = total;
        };
    </script>
    <div id="bg" style="z-index:-1;">
        <img src="img/background.jpg" alt="">
    </div>
    <div class="container-fluid" style="font-family:Quicksand;">
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


        <div class="row" style="margin-top:50px;">
            <div class="col-md-offset-7">
                <button class="btn btn-primary" type="button">
                Total Calories Selected <span class="badge" id="calory">0</span>
                </button>
            </div>
        </div>

        <div class="row" style="margin-top:20px;">
            <?php
                                $restid = $_GET['id'];
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
                                $sql = 'SELECT id,name, description,address FROM restaurants where id='.$restid;
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo "<div class='col-md-offset-1 col-md-4' style='color:#484848;font-family:Quicksand;'>";
                                echo '<span><h1>'.$row['name'].'</h1><h5>- '.$row['description'].'</h5></span>';
                                echo '<h5>'.$row['address'].'</h5>';
                                echo '<img style="max-width:100%;max-height:100%;margin-top:20px;"src="getImage.php?id='.$row['id'].'"/>';
                                echo '</div>';
                                echo "<div class='col-md-offset-1 col-md-4' style='color:black;'>";
                                echo "<div class='well well-lg'>";
                                $sql = 'SELECT id,name, price, calory FROM item where restaurantid='.$row['id'];
                                $result2 = mysqli_query($conn, $sql);
                                mysqli_close($conn);
                                echo '<h3>Menu from '.$row['name'].'</h3>';
                                echo "<table class='table'>";
                                echo "<th style='font-weight:bold;'><td>Item</td><td>Calory</td><td>Price</td></th>";
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    echo "<tr><td><input type='checkbox' onclick=\"calc(this.id);\" id=\"".$row2['id'].'"/></td><td>'.$row2['name'].'</td><td name="'.$row2['id'].'">'.$row2['calory'].'</td><td>'.$row2['price'].'</td></tr>';
                                }
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';

                                ?>

        </div>

    </div>
</body>

</html>
