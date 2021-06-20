<footer class="py-lg-5 py-3">
    <div class="container-fluid px-lg-5 px-3">
        <div class="row footer-top-w3layouts">
            <div class="col-lg-3 footer-grid-w3ls">
                <div class="footer-title">
                    <h3>Product</h3>
                </div>
                <div class="footer-text">
                    <p>BODYCARE</p>
                    <p>SKINCARE</p>
                    <p>LIPCARE</p>
                    <ul class="footer-social text-left mt-lg-4 mt-3">

                        <li class="mx-2">
                            <a href="#">
                                <span class="fab fa-instagram"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#">
                                <span class="fas fa-shopping-bag"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#">
                                <span class="fab fa-whatsapp"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#">
                                <span class="fab fa-youtube"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 footer-grid-w3ls">
                <div class="footer-title">
                    <h3>Get in touch</h3>
                </div>
                <div class="contact-info">
                    <h4>Location :</h4>
                    <p>Tangerang City,Banten.Indonesia</p>
                    <div class="phone">
                        <h4>Contact :</h4>
                        <p>Shopee : Velve Beaute </p>
                        <p>Instagram : @Velve.Beaute </p>
                        <p>Email :
                            <a href="mailto:velvebeaute@gmail.com">velvebeaute@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 footer-grid-w3ls">
                <div class="footer-title">
                    <h3>Quick Links</h3>
                </div>
                <ul class="links">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="shop.html">Shop</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 footer-grid-w3ls">
                <div class="footer-title">
                    <h3>Sign up for your offers</h3>
                </div>
                <div class="footer-text">
                    <p>FOLLOW OUR NEWS AND UPDATES</p>
                    <form action="#" method="post">
                        <input class="form-control" type="email" name="Email" placeholder="Enter your email..." required="">
                        <button class="btn1">
                            <i class="far fa-envelope" aria-hidden="true"></i>
                        </button>
                        <div class="clearfix"> </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="copyright-man mt-4">
            <p class="copy-right text-center" class="footer-text">&copy; 2020 velvebeaute. All Rights Reserved | Design by
                <a> velve </a>
            </p>
        </div>
    </div>
</footer>

<!--jQuery-->
<!-- newsletter modal -->
<!-- Modal -->

<!-- untuk "enter your email diskon -->

</div>
</div>
</div>
<script>
    $(document).ready(function() {
        $("#myModal").modal();
    });
</script>
<!-- // modal -->

<!--search jQuery-->
<script src="js/modernizr-2.6.2.min.js"></script>
<script src="js/classie-search.js"></script>
<script src="js/demo1-search.js"></script>
<!--//search jQuery-->
<!-- cart-js -->
<script src="js/minicart.js"></script>
<script>
    googles.render();

    googles.cart.on('googles_checkout', function(evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });

</script>
<!-- //cart-js -->
<script>
    $(document).ready(function() {
        $(".button-log a").click(function() {
            $(".overlay-login").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });
    });
    $('.overlay-close1').on('click', function() {
        $(".overlay-login").fadeToggle(200);
        $(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
        open = false;
    });
</script>
<!-- carousel -->
<!-- Count-down -->
<!-- <script src="js/simplyCountdown.js"></script> -->
<!-- <link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' /> -->
<!-- <script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 4,
			day: 25
		});
	</script> -->
<!--// Count-down -->
<script src="js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                900: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                    margin: 20
                }
            }
        })
    })
</script>

<!-- //end-smooth-scrolling -->


<!-- dropdown nav -->
<script>
    $(document).ready(function() {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //dropdown nav -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 900);
        });
    });
</script>
<script>
    $(document).ready(function() {
        /*
        						var defaults = {
        							  containerID: 'toTop', // fading element id
        							containerHoverID: 'toTopHover', // fading element hover id
        							scrollSpeed: 1200,
        							easingType: 'linear' 
        						 };
        						*/

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!--// end-smoth-scrolling -->

<script src="js/bootstrap.js"></script>
<!-- js file -->
</body>

</html>