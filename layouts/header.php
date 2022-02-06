<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700|Rubik:400,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="assets/style.css" type="text/css" />
	<link rel="stylesheet" href="assets/style-rtl.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/dark.css" type="text/css" />

	<!-- Real Estate Demo Specific Stylesheet -->
	<link rel="stylesheet" href="assets/demos/real-estate/real-estate.css" type="text/css" />
	<link rel="stylesheet" href="assets/demos/real-estate/css/font-icons.css" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="assets/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="assets/demos/real-estate/fonts.css" type="text/css" />

	<!-- Bootstrap Select CSS -->
	<link rel="stylesheet" href="assets/css/components/bs-select.css" type="text/css" />

	<!-- Bootstrap Switch CSS -->
	<link rel="stylesheet" href="assets/css/components/bs-switches.css" type="text/css" />

	<!-- Range Slider CSS -->
	<link rel="stylesheet" href="assets/css/components/ion.rangeslider.css" type="text/css" />

	<link rel="stylesheet" href="assets/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="assets/css/colors.php?color=2C3E50" type="text/css" />

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
						<a href="auth/forget-pass.php" class="float-right text-dark font-weight-light mt-2">نسيت كلمة السر؟</a>
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
			
			require_once('./modules/User.php');
		
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
	
	require_once('./modules/Database.php');

	$db = new Database();
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
			move_uploaded_file($filetmp, './assets/images/uploads/'.$r.$d.$filename);
				
			// make source of img 
			$finalDes = 'assets/images/uploads/'.$r.$d.$filename;
				
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


	<!-- add event Modal -->
	<div class="modal1 mfp-hide" id="add-event">
		<div class="card mx-auto" style="max-width: 800px;">
			<div class="card-header py-3 bg-transparent center">
				<h3 class="mb-0 font-weight-normal">إضافة إيفنت</h3>
			</div>
			<div class="card-body mx-auto py-5" style="max-width: 70%;">

				<form name="save-event" id="login-form" class="mb-0 row" enctype="multipart/form-data" method="post">

					<div class="row">
													
							<input class="form-control mb-4" type="text" name="EventTitle" placeholder="عنوان الإيفنت">
							
							<select id="my-select" name="category" class="mb-4 w-100">
								<option>اختر التصنيف</option>
								<option value="عام">عام</option>
								<option value="علمي">علمي</option>
								<option value="تعليمي">تعليمي</option>
								<option value="ثقافة وأدب">ثقافة وأدب</option>
								<option value="تقني">تقني</option>
								<option value="ديني إسلامي">ديني إسلامي</option>
								<option value="تنمية ذاتية">تنمية ذاتية</option>
								<option value="توظيف">توظيف</option>
							</select>
								
							<label>صورة الإيفنت</label>
							<input class="form-control mb-4" type="file" name="EventImg">
								
							<select name="status" class="mb-4 w-100">
								<option>اختر التكلفة</option>
								<option value="مجاني">مجاني</option>
								<option value="مدفوع">مدفوع (الدفع عند الحضور)</option>
								<option value="الدفع ضروري">الدفع قبل الحضور</option>
							</select>

							<div class="w-100">
								<ul class="nav nav-tabs text-center" id="myTab" role="tablist">
									<li class="nav-item">
									<a class="nav-link active" id="free-tab" data-toggle="tab" href="#free" role="tab" aria-controls="free"
										aria-selected="true">مجانية</a>
									</li>
									<li class="nav-item">
									<a class="nav-link" id="paid-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="paid"
										aria-selected="false">سعر التذكرة</a>
									</li>
									<li class="nav-item">
									<a class="nav-link" id="requirePaid-tab" data-toggle="tab" href="#requirePaid" role="tab" aria-controls="requirePaid"
										aria-selected="false">رقم هاتف التحويل</a>
									</li>
								</ul>
							</div>
							
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="free" role="tabpanel" aria-labelledby="free-tab">
									<p class="mt-3">التذكرة مجانية</p>
								</div>
								<div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="paid-tab">
									<input name="ticket_price" class="form-control mb-4 mt-4" type="number" onblur="this.placeholder='سعر التذكرة ( ج.م )'" placeholder="سعر التذكرة ( ج.م )" onfocus="this.placeholder=''">
								</div>
								<div class="tab-pane fade" id="requirePaid" role="tabpanel" aria-labelledby="requirePaid-tab">
									<input name="voda_num" class="form-control mb-4 mt-4" type="tel" onblur="this.placeholder='رقم تحويل فودافون كاش'" placeholder="رقم تحويل فودافون كاش" onfocus="this.placeholder=''">
								</div>
							</div>
							
							<textarea name='event_desc' class='form-control mb-4' rows='5' onblur="this.placeholder='وصف الإيفنت'" placeholder="وصف الإيفنت" onfocus="this.placeholder=''"></textarea>  
							
							<textarea name='org_desc' class='form-control mb-4' rows='5' onblur="this.placeholder='وصف منظم الإيفنت'" placeholder="وصف منظم الإيفنت" onfocus="this.placeholder=''"></textarea> 
							
							<label>تاريخ البدء</label>
							<input name="date" class="form-control mb-4" type="date" value=""><br>
							
							<label>زمن البدء</label>
							<input name="time" class="form-control mb-4" type="time" value=""><br>

							<label>تاريخ الانتهاء</label>
							<input name="finish_date" class="form-control mb-4" type="date" value="">
												
							<select name="town" class="mb-4 w-100">
								<option>اختر المحافظة</option>
								<option value="القاهرة">القاهرة</option>
								<option value="الغربية">الغربية</option>
								<option value="الإسماعيلية">الإسماعيلية</option>
								<option value="الأسكندرية">الأسكندرية</option>
								<option value="أسوان">أسوان</option>
								<option value="أسيوط">أسيوط</option>
								<option value="البحر الأحمر">البحر الأحمر</option>
								<option value="الأقصر">الأقصر</option>
								<option value="البحيرة">البحيرة</option>
								<option value="الجيزة">الجيزة</option>
								<option value="الدقهلية">الدقهلية</option>
								<option value="السويس">السويس</option>
								<option value="الشرقية">الشرقية</option>
								<option value="الفيوم">الفيوم</option>
								<option value="القليوبية">القليوبية </option>
								<option value="المنوفية">المنوفية</option>
								<option value="المنيا">المنيا</option>
								<option value="الوادي الجديد">الوادي الجديد</option>
								<option value="بني سويف">بني سويف</option>
								<option value="بورسعيد">بورسعيد </option>
								<option value="جنوب سيناء">جنوب سيناء</option>
								<option value="دمياط">دمياط </option>
								<option value="سوهاج">سوهاج </option>
								<option value="شمال سيناء">شمال سيناء</option>
								<option value="قنا">قنا</option>
								<option value="كفر الشيخ">كفر الشيخ</option>
								<option value="مرسى مطروح">مرسى مطروح</option>
								<option value="السادس من أكتوبر">السادس من أكتوبر</option>
							</select>

							<label>زمن الإنتهاء</label>
							<input name="finish_time" class="form-control mb-4" type="time" value=""><br>

							<label>أقصى عدد مطلوب</label>        
							<input name="member_number" class="form-control mb-4" type="number"><br>

							<label>العنوان بالتفصيل</label>
							<input name="address" class="form-control mb-4" placeholder="المحافظة، المدينة، علامة مميزة"><br>

							<label>خريطة الموقع</label>
							<input name="map_link" class="form-control mb-4" placeholder="قم بلصق رابط خريطة جوجل إن وُجد"><br>

							<label>رابط الفيس بوك</label>
							<input name="fb_link" class="form-control mb-4" placeholder="قم بلصق رابط صفحة الفيس بوك إن وُجد"><br>

							<label>رابط تويتر</label>
							<input name="tw_link" class="form-control mb-4" placeholder="قم بلصق رابط تويتر إن وُجد">
							<button name="save-event" class="btn btn-primary" type="submit">أضف</button>

					</div>
					
				</form>
			</div>
			
		</div>
	</div>


	<?php

	if (isset($_POST['save-event']) && isset($_SESSION['usermail'])) { 

		$EventTitle = $_POST['EventTitle'];
		$status = $_POST['status'];
		$town = $_POST['town'];
		$category = $_POST['category'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$finish_date = $_POST['finish_date'];
		$finish_time = $_POST['finish_time'];
		$members = $_POST['member_number'];
		$address = $_POST['address'];
		$map_link = $_POST['map_link'];
		$fb_link = $_POST['fb_link'];
		$tw_link = $_POST['tw_link'];
		$event_desc = $_POST['event_desc'];
		$org_desc = $_POST['org_desc'];
		$ticket_price = $_POST['ticket_price'];
		$voda_num = $_POST['voda_num'];
	
		// info about img i will recieve
		//files respons for files
		$filename = $_FILES['EventImg']['name'];
		$filetype = $_FILES['EventImg']['type'];
		$filesize = $_FILES['EventImg']['size'] / 1024;
		$filetmp = $_FILES['EventImg']['tmp_name'];
	
		// create random number
		$r = rand();
	
		// date
		$d = date("h.i.sa");
	
		//img validation
		$validTypes = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
	
		if (in_array($filetype, $validTypes)) {
	
			// add img to uploads file
			move_uploaded_file($filetmp, './assets/images/uploads/' . $r . $d . $filename);
	
			// make source of img
			$finalDes = 'assets/images/uploads/' . $r . $d . $filename;
	
			move_uploaded_file($filetmp, '../assets/images/uploads/' . $r . $d . $filename);
	
			if (isset($_POST['save-event']))
			{
	
				$db->query("SELECT id FROM users");
				$row = $db->single();
				$count1 = $db->rowCount();
	
				if ($count1 > 0)
				{
	
					// register session with username
					$_SESSION['id'] = $row->id;
	
				}
	
				$postBy = $_SESSION['ID'];
	
				$db->query(" INSERT INTO events (EventTitle, EventImg, town, status, postby, category, date, time, finish_date, finish_time, member_number, address, map_link, fb_link, tw_link, event_desc, org_desc, ticket_price, voda_num ) VALUES ('$EventTitle', '$finalDes', '$town', '$status', '$postBy', '$category', '$date', '$time', '$finish_date', '$finish_time', '$members', '$address', '$map_link', '$fb_link', '$tw_link', '$event_desc', '$org_desc', '$ticket_price', '$voda_num')");
				$db->execute(array(
					$EventTitle,
					$finalDes,
					$town,
					$status,
					$postBy,
					$category,
					$date,
					$time,
					$finish_date,
					$finish_time,
					$members,
					$address,
					$map_link,
					$fb_link,
					$tw_link,
					$event_desc,
					$org_desc,
					$ticket_price,
					$voda_num
				));
	
				header('location:index.php');
	
			}
	
		}
	
	}

	?>
	
	<!-- add event -->

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
							<a href="demo-shop.html" class="standard-logo"><img src="assets/demos/shop/images/logo.png" alt="Canvas Logo"></a>
							<a href="demo-shop.html" class="retina-logo"><img src="assets/demos/shop/images/logo@2x.png" alt="Canvas Logo"></a>
						</div><!-- #logo end -->

						

						<?php
						
							if (isset($_SESSION['usermail'])) { 

								?>

								<!-- Primary Navigation
								============================================= -->
								<nav class="primary-menu with-arrows ml-lg-auto">

								<ul class="menu-container">
									<li class="menu-item"><a class="menu-link" href="./index.php"><div>الرئيسية</div></a></li>
									<li class="menu-item"><a class="menu-link" href="#add-event" data-lightbox="inline"><div>أضف فعالية</div></a></li>
								</ul>

								</nav><!-- #primary-menu end -->

								<?php

								require_once('./modules/Database.php');

								$db = new Database();

								$followed = $_SESSION['usermail'];

								$db->query("SELECT userpic FROM users where usermail = '$followed'");
								$userpic = $db->single();
								
							 ?>
							 
							 <div class="header-misc">
								<ul class="nav navbar-nav flex-row justify-content-between ml-auto">

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="user-profile.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<img src='<?php echo  $userpic->userpic; ?>'>
										</a>

										<?php
						
											$db->query("SELECT id FROM users");
											$row = $db->resultSet();
											$count1 = $db->rowCount();
											
											if ($count1 > 0 ) {
									
												// register session with username
												foreach((array) $row as $ro) {
													$_SESSION['ID'] = $ro->id;
												}
											}
											$db->query("SELECT * FROM users where usermail = '$followed'");
											$userinfo = $db->single();
										?>

											<div class="dropdown-menu dropdown-second" aria-labelledby="navbarDropdown">
												<a class="dropdown-item" href="user-profile.php"> <?php echo  $userinfo->firstname . ' ' . $userinfo->lastname; ?></a>
												<a class="dropdown-item" href="members.php?do=Edit&id=<?php echo $_SESSION['ID'] ?>">تعديل الحساب</a>
												<a class="dropdown-item" href="./auth/logout.php">الخروج</a>
											</div>
										</li>
																											
								</ul>
							
							<?php } else { ?>
								
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
								<li class="menu-item current"><a class="menu-link" href="./index.php"><div>الرئيسية</div></a></li>
							</ul>

						</nav><!-- #primary-menu end -->

						<?php } ?>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>


					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->