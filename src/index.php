<!DOCTYPE html>

<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php if ( isset( $pageTitle ) ) echo $pageTitle; ?></title>

        <link rel="stylesheet" href="assets/stylesheets/app.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
    
        <!-- Navigation -->
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">E-Commerce Store</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=""><i class="fa fa-user"></i>&nbsp; Sign Up</a></li>
                        <li><a href=""><i class="fa fa-sign-in"></i>&nbsp; Login</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Material Design JavaScript -->
        <script src="assets/js/material.js"></script>
        <script src="assets/js/ripples.min.js"></script>

        <!-- Custom Script -->
        <script src="assets/js/app.js"></script>
        <script>$.material.init();</script>
	</body>
</html>