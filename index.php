<?php 
	$page_title = 'الرئيسية'; 
	include('./layouts/header.php');
?>

		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header include-topbar" style="background: url(assets/demos/real-estate/images/hero/1.jpg) center center no-repeat; background-size: cover;">
			<div class="slider-inner">

				<div class="vertical-middle">
					<div class="container pt-5 pb-5 pb-lg-0">
						<div class="tabs advanced-real-estate-tabs">

							<ul class="tab-nav">
								<li><a href="#tab-properties">ابحث عن فعالية</a></li>
							</ul>

							<div class="tab-container">

								<div class="tab-content" id="tab-properties">
									<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET" class="mb-0">
										<div class="row">
											<div class="col-lg-4 col-md-6 col-12 bottommargin-sm">
												<label for="">اختر المحافظة</label>
												<select class="selectpicker form-control" name="search" multiple data-live-search="true" data-size="6" style="width:100%;">
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
											</div>
											<div class="col-lg-4 col-md-6 col-12 bottommargin-sm">
												<label for="">التصنيف</label>
												<select class="selectpicker form-control" name="category" data-size="6" style="width:100%; line-height: 30px;">
													<option value="">أي</option>
													<option disabled>اختر التصنيف</option>
													<option  value="عام">عام</option>
													<option  value="علمي">علمي</option>
													<option  value="تعليمي">تعليمي</option>
													<option value="ثقافة وأدب">ثقافة وأدب</option>
													<option value="تقني">تقني</option>
													<option value="ديني إسلامي">ديني إسلامي</option>
													<option value="تنمية ذاتية">تنمية ذاتية</option>
													<option value="توظيف">توظيف</option>
												</select>
											</div>
											<div class="offset-lg-1 col-lg-2 col-md-12">
												<button name="submit" type="submit" value="submit" class="button button-3d button-rounded btn-block m-0" style="margin-top: 35px !important;">بحث</button>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>
					</div>
				</div>

				<div class="video-wrap">
					<div class="video-overlay" style="background-color: rgba(0,0,0,0.15);"></div>
				</div>

			</div>
		</section><!-- #slider end -->

		<!-- search events -->

		<?php 
		

   		if(isset($_GET['submit'])) {
   
			$search = $_GET['search'];
			$category = $_GET['category'];

			require_once ('modules/Event.php');
	
			$e = new Event();
	
			$freeEvents = $e->getEventsHome('مجاني', $search, $category);
			$countFree = $e->rowCount();
			$paidevents = $e->getEventsHome('مدفوع', $search, $category);
			$countPaid = $e->rowCount();
			$requirePaids = $e->getEventsHome('الدفع ضروري', $search, $category);
			$countRequire = $e->rowCount();
			$allEvents = $e->getEventsHomeAll($search, $category);
			$countAll = $e->rowCount();
	
			?>
			<!-- start container -->
			<div class="container">
				<section id="gallery">
					<h3 class="text-center last-events"> <span> (<?php echo $search; ?> - <?php echo $category; ?> ) </span> الفعاليات</h3>
					<div class="container">
						<ul class=" nav nav-tabs text-center" id="searchmyTab" role="tablist">
							<li class="nav-item">
							<a class="nav-link active" id="all-tab" data-toggle="tab" href="#searchall" role="tab" aria-controls="all"
								aria-selected="true">(<?php echo $countAll ?>) الجميع</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" id="paid-tab" data-toggle="tab" href="#searchpaid" role="tab" aria-controls="paid"
								aria-selected="false">(<?php echo $countRequire + $countPaid ?>) المدفوعة</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" id="free-tab" data-toggle="tab" href="#searchfree" role="tab" aria-controls="free"
								aria-selected="false">(<?php echo $countFree ?>) المجانية</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContentsearch">
							<div class="tab-pane fade show active" id="searchall" role="tabpanel" aria-labelledby="all-tab">
							<section class="portfolio text-center">
								<div class="row">
									<?php
										if($allEvents) {
										
										foreach ((array) $allEvents as $allEvent) {
										
										$event_date = $allEvent->date;
										
										$finish_date = $allEvent->finish_date;
										
										$e->calculateTime($event_date, $finish_date);
										
										
										echo "<div class='col-md-4'>";
										echo"<span class='home-stat alert alert-success'>" . $allEvent->status . "</span>";
										echo "<div class='port-img'>";
										
										echo "<a href='event-details.php?id=" . $allEvent->id . "'><img alt='an example' class='img-fluid' src='" .  $allEvent->EventImg . "' /></a>";
										echo "<h3><a href='event-details.php?id=" . $allEvent->id . "'>" . $allEvent->EventTitle . "</a></h3>";
										
										if (($e->event_start - $e->my_current) < 0) {
										
													echo " <p> انتهي </p>";
										} else if (($e->event_start - $e->my_current) == 0) {
											echo "<p> يحدث اليوم </p>";
										} else {
											?>
									<p> يحدث بعد : <?php echo ($e->event_start - $e->my_current); ?> يوم</p>
									
									<?php
										}
													
										echo "</div>";
										echo "</div>";
										}
										
										}else {
										
										echo "  <h1 class='text-center alert alert-danger not-find'>لا يوجد ايفنتات </h1>";
										
										}
										
										?>
								</div>
							</section>
							</div>
							<div class="tab-pane fade" id="searchpaid" role="tabpanel" aria-labelledby="paid-tab">
							<section class="portfolio text-center">
								<div class="row">
									<?php
										if($paidevents || $requirePaids){
												foreach ((array) $paidevents as $paidevent) {
										
										
										
										$event_date = $paidevent->date;
										$finish_date = $paidevent->finish_date;
										
										$e->calculateTime($event_date, $finish_date);
										
										echo "<div class='col-md-4'>";
										echo"<span class='home-stat alert alert-success'>مدفوع</span>";
										echo "<div class='port-img'>";
										echo "<a href='event-details.php?id=" . $paidevent->id . "'><img alt='an example' class='img-fluid' src='" .  $paidevent->EventImg . "' /></a>";
										echo "<h3><a href='event-details.php?id=" . $paidevent->id . "'>" . $paidevent->EventTitle . "</a></h3>";
										if (($e->event_start - $e->my_current) < 0) {
										
													echo " <p> انتهي </p>";
										} else if (($e->event_start - $e->my_current) == 0) {
											echo "<p> يحدث اليوم </p>";
										} else {
											?>
									<p> يحدث بعد : <?php echo ($e->event_start - $e->my_current); ?> يوم</p>
									<?php
										}
										echo "</div>";
										echo "</div>";
										
										}
										
										foreach ((array) $requirePaids as $requirePaid) {
										
										$event_date = $requirePaid->date;
										$finish_date = $requirePaid->finish_date;
										
										$e->calculateTime($event_date, $finish_date);
										
										echo "<div class='col-md-4'>";
																							echo"<span class='home-stat alert alert-success'>ضروري الدفع</span>";
										
										echo "<div class='port-img'>";
										
										echo "<a href='event-details.php?id=" . $requirePaid->id . "'><img alt='an example' class='img-fluid' src='" .  $requirePaid->EventImg . "' /></a>";
										echo "<h3><a href='event-details.php?id=" . $requirePaid->id . "'>" . $requirePaid->EventTitle . "</a></h3>";
										if (($e->event_start - $e->my_current) < 0) {
										
													echo " <p> انتهي </p>";
										} else if (($e->event_start - $e->my_current) == 0) {
											echo "<p> يحدث اليوم </p>";
										} else {
											?>
									<p> يحدث بعد : <?php echo ($e->event_start - $e->my_current); ?> يوم</p>
									<?php
										}
										echo "</div>";
										echo "</div>";
												}
							
										
										}else {
										
										echo "  <h1 class='text-center alert alert-danger not-find'>لا يوجد ايفنتات </h1>";
										
										}
										
										?>
								</div>
							</section>
							</div>
							<div class="tab-pane fade" id="searchfree" role="tabpanel" aria-labelledby="free-tab">
							<section class="portfolio text-center">
								<div class="row">
									<?php     
										if($freeEvents) {
													foreach ((array) $freeEvents as $freeEvent) {
										
										$event_date = $freeEvent->date;
										$finish_date = $freeEvent->finish_date;
										
										$e->calculateTime($event_date, $finish_date);
										
										echo "<div class='col-md-4'>";
																								echo"<span class='home-stat alert alert-success'>" . $freeEvent->status ."</span>";
										
										echo "<div class='port-img'>";
										
										echo "<a href='event-details.php?id=" . $freeEvent->id . "'><img alt='an example' class='img-fluid' src='" .  $freeEvent->EventImg . "' /></a>";
										echo "<h3><a href='event-details.php?id=" . $freeEvent->id . "'>" . $freeEvent->EventTitle . "</a></h3>";
										if (($e->event_start - $e->my_current) < 0) {
										
													echo " <p> انتهي </p>";
										} else if (($e->event_start - $e->my_current) == 0) {
											echo "<p> يحدث اليوم </p>";
										} else {
											?>
									<p> يحدث بعد : <?php echo ($e->event_start - $e->my_current); ?> يوم</p>
									<?php
										}
										echo "</div>";
										echo "</div>";
										
										
										}
										
										}else {
										
										echo "  <h1 class='text-center alert alert-danger not-find'>لا يوجد ايفنتات </h1>";
										
										}
										
										?>
								</div>
							</section>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- end container -->
		<?php
   		}
		include('./layouts/footer.php');
   		?>

