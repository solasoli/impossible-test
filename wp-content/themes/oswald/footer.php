<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 */

	

?>
<style type="text/css">
@import url(@import url('https://fonts.googleapis.com/css?family=Poppins');

* {
  font-family: 'Poppins', sans-serif;
}

/*section {
  width: 100%;
  display: inline-block;
  background: #333;
  height: 50vh;
  text-align: center;
  font-size: 22px;
  font-weight: 700;
  text-decoration: underline;
}*/

.footer-distributed{
	background: #000;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 100%;
	text-align: left;
	font: bold 16px sans-serif;
	padding: 55px 50px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
	display: inline-block;
	vertical-align: top;
}

/* Footer left */

.footer-distributed .footer-left{
	width: 40%;
}

/* The company logo */

.footer-distributed h3{
	color:  #ffffff;
	font: normal 36px 'Open Sans', cursive;
	margin: 0;
}

.footer-distributed h3 span{
	color:  lightseagreen;
}

/* Footer links */

.footer-distributed .footer-links{
	color:  #ffffff;
	margin: 20px 0 12px;
	padding: 0;
}

.footer-distributed .footer-links a{
	display:inline-block;
	line-height: 1.8;
  font-weight:400;
	text-decoration: none;
	color:  inherit;
}

.footer-distributed .footer-company-name{
	color:  #fff;
	font-size: 14px;
	font-weight: normal;
	margin: 0;
}

/* Footer Center */

.footer-distributed .footer-center{
	width: 40%;
}

.footer-distributed .footer-center i{
	background-color:  #33383b;
	color: #ffffff;
	font-size: 25px;
	width: 38px;
	height: 38px;
	border-radius: 50%;
	text-align: center;
	line-height: 42px;
	margin: 10px 15px;
	vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope{
	font-size: 17px;
	line-height: 38px;
}

.footer-distributed .footer-center p{
	display: inline-block;
	color: #ffffff;
  font-weight:400;
	vertical-align: middle;
	margin:0;
}

.footer-distributed .footer-center p span{
	display:block;
	font-weight: normal;
	font-size:14px;
	line-height:2;
}

.footer-distributed .footer-center p a{
	color:  lightseagreen;
	text-decoration: none;;
}

.footer-distributed .footer-links a:before {
  content: "|";
  font-weight:300;
  font-size: 20px;
  left: 0;
  color: #fff;
  display: inline-block;
  padding-right: 5px;
}

.footer-distributed .footer-links .link-1:before {
  content: none;
}

/* Footer Right */

.footer-distributed .footer-right{
	width: 20%;
}

.footer-distributed .footer-company-about{
	line-height: 20px;
	color:  #92999f;
	font-size: 13px;
	font-weight: normal;
	margin: 0;
}

.footer-distributed .footer-company-about span{
	display: block;
	color:  #ffffff;
	font-size: 14px;
	font-weight: bold;
	margin-bottom: 20px;
}

.footer-distributed .footer-icons{
	margin-top: 25px;
}

.footer-distributed .footer-icons a{
	display: inline-block;
	width: 35px;
	height: 35px;
	cursor: pointer;
	background-color:  #33383b;
	border-radius: 2px;

	font-size: 20px;
	color: #ffffff;
	text-align: center;
	line-height: 35px;

	margin-right: 3px;
	margin-bottom: 5px;
}

.footer-company-name{
	padding-top: 30px;
}

.visit {
	color: #fff;
}

.phone{
	color: #fff;
}

.mail{
	color: #fff;
}

.phone-content{
	padding-top: 10px;
}

.mail-content{
	padding-top: 6px;
}



/* If you don't want the footer to be responsive, remove these media queries */

@media (max-width: 880px) {

	.footer-distributed{
		font: bold 14px sans-serif;
	}

	.footer-distributed .footer-left,
	.footer-distributed .footer-center,
	.footer-distributed .footer-right{
		display: block;
		width: 100%;
		margin-bottom: 40px;
		text-align: center;
	}

	.footer-distributed .footer-center i{
		margin-left: 0;
	}

}

}

</style>
      
<footer class="footer-distributed">

			<div class="footer-left">

				<img src="http://localhost/impossible/wp-content/uploads/2018/08/logo.png">

				<br>

				<p class="footer-company-name">Impossible Marketing © 2018</p>
			</div>

			<div class="footer-center">

				<div>
					<span class="visit">Visit Us :</span>
					<p><span>14B Yan Kit Road,

(Beside Tanjong Pagar Community Centre,
2 minutes walk from Tanjong Pagar MRT station)</span>Singapore 088266</p>
				</div>

				<div class="phone-content">
					<span class="phone">Phone :</span>
					<p>+65 9374 0111</p>
				</div>

				<div class="mail-content">
					<span class="mail">E-mail :</span>
					<p><a href="mailto:enquiry@impossible.sg">enquiry@impossible.sg</a></p>
				</div>

			</div>

			<div class="footer-right">

				

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>




<?php wp_footer(); ?>
</body>

<script type="text/javascript">
	$(.default_logo).css('height: 48px');

</script>
</html>