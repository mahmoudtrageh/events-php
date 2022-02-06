<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			<div class="container">
				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap">

					<div class="row col-mb-50">
						<div class="col-lg-5 order-last order-lg-first">

							<div class="widget clearfix">

								<img src="assets/demos/real-estate/images/logo@2x.png" style="position: relative; opacity: 0.85; left: -10px; max-height: 80px; margin-bottom: 20px;" alt="Footer Logo">

								<p>موقع يساعدك علي تسجيل ايفنتاتك وإدارتها ويمكن الطلبة من التسجيل بها </p>

								<div class="line" style="margin: 30px 0;"></div>

							</div>

						</div>
						
					</div>

					<p class="ls1 font-weight-light text-center" style="opacity: 0.6; font-size: 13px;">Copyrights &copy; 2020 Canvas: Real Estate</p>

				</div><!-- .footer-widgets-wrap end -->
			</div>
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/plugins.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=YOUR-API-KEY"></script>

	<!-- Bootstrap Select Plugin -->
	<script src="assets/js/components/bs-select.js"></script>

	<!-- Bootstrap Switch Plugin -->
	<script src="assets/js/components/bs-switches.js"></script>

	<!-- Range Slider Plugin -->
	<script src="assets/js/components/rangeslider.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="assets/js/functions.js"></script>

	<script>

		jQuery(document).ready(function(){

			$(".price-range-slider").ionRangeSlider({
				type: "double",
				prefix: "$",
				min: 200,
				max: 10000,
				max_postfix: "+"
			});

			$(".area-range-slider").ionRangeSlider({
				type: "double",
				min: 50,
				max: 20000,
				from: 50,
				to: 20000,
				postfix: " sqm.",
				max_postfix: "+"
			});

			jQuery(".bt-switch").bootstrapSwitch();

		});
		
		$('.owl-carousel').owlCarousel({
			rtl:true,
			loop:true,
			margin:10,
			nav:false,
			autoplay:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:3
				}
			}
		});

		$('input').each(function(){
            if ($(this).attr('required') === 'required') {
                $(this).after('<span class="req">*</span>');
            }
        });
        
           $('#showpass').click(function(){
            $('#pass').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });


		$(document).ready(function(){
			$('input').each(function(){
				if ($(this).attr('required') === 'required') {
					$(this).after('<span class="req">*</span>');
				}
			});
			
			$('#showpass').click(function(){
				$('#pass').attr('type', $(this).is(':checked') ? 'text' : 'password');
			});
			
			
		
		});

		function lettersOnly(input) {
			var regex = /[^ أ-ي]/gi;
			input.value = input.value.replace(regex, "");
		}

	</script>

</body>
</html>