	<script src="public/vendor/jquery.min.js"></script> 
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="public/bootstrap/js/bootstrap.min.js"></script>
	<script src="public/bootstrap/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="public/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="public/vendor/modernizr.custom.js"></script>
	<script src="public/vendor/jquery.stellar.js"></script>
	<script src="public/vendor/imagesloaded.pkgd.min.js"></script>
	<script src="public/vendor/masonry.pkgd.min.js"></script>
	<script src="public/vendor/jquery.pricefilter.js"></script>
	<script src="public/vendor/bxslider/jquery.bxslider.min.js"></script>
	<script src="public/vendor/mediaelement-and-player.js"></script>
	<script src="public/vendor/waypoints.min.js"></script>
	<script src="public/vendor/flexslider/jquery.flexslider-min.js"></script>

	<!-- Theme Initializer -->
	<script src="public/js/theme.plugins.js"></script>
	<script src="public/js/theme.js"></script>
	
	<!-- Style Switcher -->
	<script type="text/javascript" src="public/style-switcher/js/switcher.js"></script>
	
<!-- login -->
	<script src="public/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="public/vendor/animsition/js/animsition.min.js"></script>
	<script src="public/vendor/bootstrap/js/popper.js"></script>
	<script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="public/vendor/select2/select2.min.js"></script>
	<script src="public/vendor/daterangepicker/moment.min.js"></script>
	<script src="public/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="public/vendor/countdowntime/countdowntime.js"></script>
	<script src="public/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var qtt = parseInt( $("#quantityItem").val());
			$("#cong").click(function(){
				qtt+=1;
				$("#quantityItem").val(qtt);
				
			})
			$("#tru").click(function(){
				if(qtt >0){
					qtt-=1;
					$("#quantityItem").val(qtt);
				}else{
					qtt= 1;
					$("#quantityItem").val(qtt);
				}
				
				
			})
			var qtt = parseInt( $("#quantityItem1").val());
			$("#plus").click(function(){
				qtt+=1;
				$("#quantityItem1").val(qtt);
				
			})
			$("#minus").click(function(){
				if(qtt >0){
					qtt-=1;
					$("#quantityItem1").val(qtt);
				}else{
					qtt= 1;
					$("#quantityItem1").val(qtt);
				}
				
				
			})
			
			
			
			$("#addCart").click(function(){
				var size  =  $("#size").val();
				var color = $("#color").val();
				if(color=="" || size==""){
					alert("ban phai chon size va color");
					return false;
				}
			})
		})
	</script>