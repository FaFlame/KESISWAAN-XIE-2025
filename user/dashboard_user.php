<?php include('session.php'); ?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Dashboard | Doughlicious</title> 
    <link rel="stylesheet" type="text/css" href="../css/styledashboarduser.css"> 
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> 
</head> 
<body> 
     <div class="video-container">
        <video autoplay muted loop id="bg-video" playsinline>
            <source src="video/bg-video.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    <header> 
        <div class="container"> 
            <div class="titleimage">
                <a href="dashboard_user.php"><img src="../user/img/clear-logo-invert.png" width="95px" alt="Doughlicious"></a>
            </div>
            <nav>
                <ul> 
                    <?php include 'navbar.php' ?> 
                </ul>
            </nav> 
        </div> 
    </header> 

    <div class="section"> 
        <div class="container"> 
            <h3>Dashboard</h3> 
            <div class="box"> 
                <h4>Welcome, <?php echo $user_row["admin_name"] ?>! <br> Happy shopping and enjoy exploring your favorite treats!</h4>
            </div> 
        </div> 
    </div> 

    <footer> 
        <div class="container"> 
            <i><small>Copyright &copy; 2025 - Doughlicious. All Rights Reserved.</small></i>
        </div> 
    </footer> 

</body> 
</html>