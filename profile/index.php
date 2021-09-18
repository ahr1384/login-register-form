<?php
require('../functions.php');

if(!isset($_COOKIE['user-login'])){
    header('Location: ../login/?error=1');
}


$urlContents = SITE_URL . 'assets' . DIRECTORY_SEPARATOR . 'information' . DIRECTORY_SEPARATOR . 'users.json';

$jsonContents = file_get_contents($urlContents);

$userContents = json_decode($jsonContents, true);

$searchInUsers = array_search($_COOKIE['user-login'], array_column($userContents, "username"));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/dashboard-style.css">
    <title>My profile</title>
</head>

<body>
    <div style="left: -314px;" id="menu" class="menu d-block bg-white h-100 position-fixed align-items-start navbar">
        <div class="position-absolute btn-close-menu">
            <button onclick="toggleMenu()"><i class="fas fa-times"></i></button>
        </div>
        <div class="topbar w-100">
            <img src="../assets/img/Logo.svg" alt="">
        </div>
        <div class="menu-link d-flex flex-column align-items-center w-100">
            <a class="btn w-100 text-start active" href="#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            <a class="btn w-100 text-start" href="#"><i class="fas fa-chart-line"></i><span>Activity</span></a>
            <a class="btn w-100 text-start" href="#"><i class="fas fa-book-reader"></i><span>Library</span></a>
            <a class="btn w-100 text-start" href="#"><i class="fas fa-shield-alt"></i><span>Security</span></a>
            <a class="btn w-100 text-start" href="#"><i class="far fa-calendar-alt"></i><span>Schedules</span></a>
            <a class="btn w-100 text-start" href="#"><i class="fas fa-wallet"></i><span>Payouts</span></a>
            <a class="btn w-100 text-start" href="#"><i class="fas fa-cog"></i><span>Settings</span></a>
            <a class="btn w-100 text-start" href="../logout.php"><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a>
        </div>
    </div>

    <div class="menu-top bg-white p-3">
        <button id="btn-toggle-menu" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
    </div>

    <div class="content">
        <div class="info-header d-flex flex-row justify-content-between">
            <div>
                <p class="fw-bold">Hi <?php echo $userContents[$searchInUsers]["username"] ?>,</p>
                <h2 class="fw-bold">Welcome to Venus!</h2>
            </div>
            <div class="search-header align-self-end">
                <form>
                    <input class="form-control" id="search" type="search" placeholder="search">
                    <label class="position-absolute" for="search"><i class="fas fa-search"></i></label>
                </form>
            </div>
        </div>
        <div class="main-cocontent">

            <div class="info-row-profile row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 d-flex flex-column">
                    <div class="info-box d-flex flex-column bg-white p-3 justify-content-center">
                        <div class="info-box-text d-flex flex-column">
                            <span>Spent this month</span>
                            <p>$682.5</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 d-flex flex-column">
                    <div class="info-box d-flex flex-row bg-white p-3 justify-content-start align-items-center">
                        <div class="info-box-img first-icon d-flex">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="info-box-text d-flex flex-column">
                            <span>Earnings</span>
                            <p>$350.40</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 d-flex flex-column">
                    <div class="info-box d-flex flex-row bg-white p-3 justify-content-start align-items-center">
                        <div class="info-box-img second-icon d-flex">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="info-box-text d-flex flex-column">
                            <span>New clients</span>
                            <p>321</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 d-flex flex-column">
                    <div class="info-box purple-backgraound d-flex flex-column bg-white p-3 justify-content-center">
                        <div class="info-box-text d-flex flex-column">
                            <span>Activity</span>
                            <p>$540.50</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cards-row-profile row">
                <div class="col-lg-8 col-md-12">
                    <div class="cardbox p-4 d-flex bg-white justify-content-center align-items-start">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 d-flex flex-column justify-content-center">
                            <h2>Reach financial goals faster</h2>
                            <p>Use your Venus card around the world with no hidden fees. Hold, transfer and spend money.
                            </p>
                            <a class="btn" href="#">Learn more</a>
                        </div>
                        <div class="justify-content-center d-flex col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <img class="card-img" src="../assets/img/cards.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="cardbox right-cardbox p-4 d-flex bg-white flex-column align-items-start justify-content-start">
                        <img src="../assets/img/fingerprint.svg" alt="">
                        <h2>Control card security in-app with a tap</h2>
                        <p>Discover our cards benefits, with one tap.</p>
                        <a href="#" class="btn text-white w-100">Cards</a>
                    </div>
                </div>
            </div>

            <div class="other-row-profile row">
                <div class="col-lg-4">
                    <div class="p-4 other-box d-flex flex-column bg-white ">
                        <h3>Your transactions</h3>
                        <div class="item">
                            <div class="d-flex item-row">
                                <i class="text-primary fas fa-bus-alt"></i>
                                <div>
                                    <p>Public Transport</p>
                                    <span>22 September 2020</span>
                                </div>
                            </div>
                            <div class="d-flex item-row">
                                <i class="text-success fas fa-store"></i>
                                <div>
                                    <p>Grocery Store</p>
                                    <span>18 September 2020</span>
                                </div>
                            </div>
                            <div class="d-flex item-row">
                                <i class="text-warning fas fa-video"></i>
                                <div>
                                    <p>Public Transport</p>
                                    <span>22 September 2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-end link-view-all mt-link">
                            <a href="#" class="text-primary btn"><span>View all</span><i class="mx-2 fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 other-box d-flex flex-column bg-white">
                        <h2>27 May</h2>
                        <div class="item">
                            <div class="d-flex item-row-right">
                                <div class="flex-column">
                                    <p>Meet w/ Simmmple</p>
                                    <span>01:00 PM - 02:00 PM</span>
                                </div>
                            </div>
                            <div class="d-flex item-row-right">
                                <div class="flex-column">
                                    <p>Fitness Training</p>
                                    <span>02:00 PM - 03:00 PM</span>
                                </div>
                            </div>
                            <div class="d-flex item-row-right">
                                <div class="flex-column">
                                    <p>Reading time</p>
                                    <span>03:00 PM - 04:00 PM</span>
                                </div>
                            </div>
                            <div class="text-end link-view-all">
                                <a href="#" class="text-primary btn"><span>View all</span><i class="mx-2 fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-4 other-box d-flex flex-column bg-white justify-content-evenly">
                        <div class="img text-center">
                            <img src="../assets/img/Avatar.svg" alt="">
                        </div>
                        <div class="name-profile text-center">
                            <h3><?php echo $userContents[$searchInUsers]["username"] ?></h3>
                            <div>
                                <i class="fa fa-map-marker"></i>
                                <span>New York, USA</span>
                            </div>
                        </div>
                        <div class="d-flex info-profile flex-row text-center p-2">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <p>Projects</p>
                                <span>8</span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <p>Followers</p>
                                <span>643</span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <p>Following</p>
                                <span>76</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const menu = document.getElementById("menu");
        const toggleMenu = () => {
            if (menu.style.left == "-314px")
                menu.style.left = "0px";
            else menu.style.left = "-314px";
        }
    </script>
</body>

</html>