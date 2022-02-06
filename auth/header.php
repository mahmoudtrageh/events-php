<?php if(!isset($page_title)) {$page_title = 'الرئيسية'; } ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700|Rubik:400,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="../assets/style.css" type="text/css" />
	<link rel="stylesheet" href="../assets/style-rtl.css" type="text/css" />
	<link rel="stylesheet" href="../assets/css/dark.css" type="text/css" />

	<!-- Real Estate Demo Specific Stylesheet -->
	<link rel="stylesheet" href="../assets/demos/real-estate/real-estate.css" type="text/css" />
	<link rel="stylesheet" href="../assets/demos/real-estate/css/font-icons.css" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="../assets/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../assets/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../assets/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="../assets/demos/real-estate/fonts.css" type="text/css" />

	<!-- Bootstrap Select CSS -->
	<link rel="stylesheet" href="../assets/css/components/bs-select.css" type="text/css" />

	<!-- Bootstrap Switch CSS -->
	<link rel="stylesheet" href="../assets/css/components/bs-switches.css" type="text/css" />

	<!-- Range Slider CSS -->
	<link rel="stylesheet" href="../assets/css/components/ion.rangeslider.css" type="text/css" />

	<link rel="stylesheet" href="../assets/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="../assets/css/colors.php?color=2C3E50" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title><?php echo $page_title; ?></title>

	<style>
		.nav-item a img {
			width: 36px;
			height: 36px;
			border-radius: 50%;
			position: relative;
			bottom: 5px;
		}
		.home-stat {
			position: absolute;
			right: 14px;
			padding: 5px;
		}
	</style>

</head>

<body class="stretched ">

	<!-- Login Modal -->
	<div class="modal1 mfp-hide" id="modal-register">
		<div class="card mx-auto" style="max-width: 540px;">
			<div class="card-header py-3 bg-transparent center">
				<h3 class="mb-0 font-weight-normal">مرحبا، أهلا بعودتك</h3>
			</div>
			<div class="card-body mx-auto py-5" style="max-width: 70%;">

				<form id="login-form" class="mb-0 row" method="post">

					<?php if(!empty($error_message)) { ?>
						<div class="error_message"><?php echo $error_message ?></div>
					<?php } ?>

					<div class="col-12">
						<input type="email" id="login-form-username" name="usermail" value="" class="form-control not-dark" onblur="this.placeholder='البريد الإلكتروني'" placeholder="البريد الإلكتروني" onfocus="this.placeholder=''" required  />
					</div>

					<div class="col-12 mt-4">
						<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" autocomplete="new-password" onblur="this.placeholder='كلمة المرور'" placeholder="كلمة المرور" onfocus="this.placeholder=''" required />
					</div>

					<div class="col-12">
						<a href="#" class="float-right text-dark font-weight-light mt-2">نسيت كلمة السر؟</a>
					</div>

					<div class="col-12 mt-4">
						<p><input class="mt-2 ml-2" type="checkbox" id="showpass"><span>أظهر كلمة المرور</span></p>
						<button name="action" type="submit" class="button btn-block m-0" id="login-form-submit" value="login">سجل الدخول</button>
					</div>
				</form>
			</div>
			<div class="card-footer py-4 center">
				<p class="mb-0">لا تمتلك حساب؟ <a href="#register" data-lightbox="inline"><u>تسجيل حساب</u></a></p>
			</div>
		</div>
	</div>


	<!-- login back end -->

	<?php 

	
		if(!isset($_SESSION['usermail'])) {
			
			require_once('../modules/User.php');
		
			$u = new User();
		
			if (isset($_POST['action'])) {
				$usermail = $_POST['usermail'];  
				$password = $_POST['password'];  
			
				$u->getUser($usermail, $password);
			
				if ($u->rowCount() > 0 ) {
					
					// register session with username
					$_SESSION['usermail'] = $usermail;
					
					// record session
					$_SESSION['Userpic'] = $row['Userpic'];
					$_SESSION['password'] = $row['password'];
					$_SESSION['ID'] = $row['id'];
		
					header('location:index.php');
				} else {
					$error_message = 'هذا الحساب غير موجود';
				}
			}
		}
	
	?>
	
	<!-- login back end -->


	<!-- register Modal -->
	<div class="modal2 mfp-hide" id="register">
		<div class="card mx-auto" style="max-width: 540px;">
			<div class="card-header py-3 bg-transparent center">
				<h3 class="mb-0 font-weight-normal">إنشاء حساب</h3>
			</div>
			<div class="card-body mx-auto py-5" style="max-width: 70%;">

				<form id="login-form" name="register-user" enctype="multipart/form-data" class="mb-0 row" method="post">

					<?php if(!empty($success_message)) { ?>
						<div class="success_message"><?php echo $success_message ?></div>
					<?php } ?>
					
					<?php if(!empty($error_message)) { ?>
						<div class="error_message"><?php echo $error_message ?></div>
					<?php } ?>

					<div class="col-12">
						<input type="email" id="usermail" name="usermail" value="" class="form-control not-dark" onblur="this.placeholder='name@example.com'" placeholder="name@example.com" onfocus="this.placeholder=''" required autocomplete="new-usermail" />
					</div>

					<div class="col-12 mt-4">
						<input type="text" id="firstname" name="firstname" value="" class="form-control not-dark" onblur="this.placeholder='محمود'" placeholder="محمود" onfocus="this.placeholder=''" required onkeyup="lettersOnly(this)" />
					</div>

					<div class="col-12 mt-4">
						<input type="text" id="lastname" name="lastname" value="" class="form-control not-dark" onblur="this.placeholder='طه'" placeholder="طه" onfocus="this.placeholder=''" required onkeyup="lettersOnly(this)" />
					</div>

					<div class="col-12 mt-4">
						<input type="password" id="pass" name="password" value="" class="form-control not-dark" onblur="this.placeholder='كلمة المرور'" placeholder="كلمة المرور" onfocus="this.placeholder=''" required autocomplete="new-password" />
					</div>

					<div class="col-12 mt-4">
						<input type="password" id="pass" name="cpassword" value="" class="form-control not-dark" onblur="this.placeholder='تأكيد كلمة المرور'" placeholder="تأكيد كلمة المرور" onfocus="this.placeholder=''" required autocomplete="new-password" />
					</div>

					<div class="col-12 mt-4">
						<input type="file" name="userpic" value="" class="form-control not-dark" />
					</div>
					
					<div class="col-12 mt-4">
						<button class="button btn-block m-0" id="login-form-submit" name="register-user" type="submit" value="login">تسجيل</button>
					</div>
				</form>
			</div>
			<div class="card-footer py-4 center">
				<p class="mb-0">تمتلك حساب؟ <a href="#modal-register" data-lightbox="inline"><u>تسجيل الدخول</u></a></p>
			</div>
		</div>
	</div>

	<!-- انشاء حساب -->

	<?php 
	
	if (isset($_POST['register-user']) && isset($_FILES['userpic'])) {

		$usermail = $_POST['usermail'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];

		$filename = $_FILES['userpic']['name'];
		$filetype = $_FILES['userpic']['type'];
		$filesize = $_FILES['userpic']['size'] / 1024;
		$filetmp = $_FILES['userpic']['tmp_name'];
			

		// create random number 
		$r = rand();

		// date
		$d = date("h.i.sa");

		//img validation

		$validTypes = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
			
		if ( in_array($filetype, $validTypes ) ) {
			
			// add img to uploads file 
			move_uploaded_file($filetmp, '../assets/images/uploads/'.$r.$d.$filename);
				
			// make source of img 
			$finalDes = '../assets/images/uploads/'.$r.$d.$filename;
				
			move_uploaded_file($filetmp, '../assets/images/uploads/'.$r.$d.$filename);
				
			if($password == $cpassword) {
				
				$db->query("SELECT usermail FROM users WHERE usermail = '$usermail'");
				$user = $db->resultSet();
			
				if(empty($user)) {
			

					$db->query(" INSERT INTO users (usermail, password, cpassword, userpic, firstname, lastname) VALUES ('$usermail', '$password', '$cpassword', '$finalDes', '$firstname', '$lastname')");
					$db->bind(':usermail', $usermail);
					$db->bind(':password', $password);
					$db->bind(':cpassword', $cpassword);
					$db->bind(':userpic', $finalDes);
					$db->bind(':firstname', $firstname);
					$db->bind(':lastname', $lastname);

					$db->execute();

					$success_message = "تم التسجيل بنجاح.<br> سوف يتم توجيهك لصفحة تسجيل الدخول الآن";
					header("Refresh:3; url=index.php");
				
				} else {
					$error_message = 'هذا الإيميل مسجل بالفعل. <br> سوف يتم توجيهك لصفحة تسجيل الدخول الآن';
					header("Refresh:3; url=index.php");
				}

			} else {
				$error_message = "الباسورد غير متطابق";
			}
						
		}
	}

	?>

	<!-- انشاء حساب -->


	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header header-size-md">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row justify-content-lg-between">

						<!-- Logo
						============================================= -->
						<div id="logo" class="ml-lg-2">
							<a href="demo-shop.html" class="standard-logo"><img src="../assets/demos/shop/images/logo.png" alt="Canvas Logo"></a>
							<a href="demo-shop.html" class="retina-logo"><img src="../assets/demos/shop/images/logo@2x.png" alt="Canvas Logo"></a>
						</div><!-- #logo end -->

						

													
								
						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<div id="top-account">
								<a href="#modal-register" data-lightbox="inline" ><i class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span class="d-none d-sm-inline-block font-primary font-weight-medium">تسجيل الدخول</span></a>
							</div><!-- #top-search end -->
							
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu with-arrows ml-lg-auto">

							<ul class="menu-container">
								<li class="menu-item current"><a class="menu-link" href="../index.php"><div>الرئيسية</div></a></li>
							</ul>

						</nav><!-- #primary-menu end -->

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>


					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->