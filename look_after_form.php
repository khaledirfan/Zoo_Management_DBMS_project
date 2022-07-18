<?php
  $conn = oci_connect('tst1', 'tst1', 'localhost/xe')
  or die(oci_error());
if (!$conn) {
  echo "sorry";
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    if(isset($_POST['CAGE_NO'])) {
    // $COMPLAINT_NO = $_POST['COMPLAINT_NO'];
      
      $CAGE_NO = $_POST['CAGE_NO'];
      $EMPLOYEE_ID = $_POST['EMPLOYEE_ID'];

      $sql = "insert into LOOK_AFTER (CAGE_NO, EMPLOYEE_ID) values ('$CAGE_NO','$EMPLOYEE_ID')";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="description" />
    <meta name="keywords" content="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>look_after_form</title>
    <!-- styles-->
    <link rel="stylesheet" href="css/styles.min.css" />
    <link rel="stylesheet" href="css/style.css" />
      <link rel="icon" type="image/x-icon" href="/img/logo.jpeg">

     <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="food_form.css">


    <!-- web-font loader-->
    <script>
      WebFontConfig = {
        google: {
          families: [
            "Nunito+Sans:300,400,500,700,900",
            "Quicksand:300,400,500,700",
          ],
        },
      };

      function font() {
        var wf = document.createElement("script");

        wf.src =
          ("https:" == document.location.protocol ? "https" : "http") +
          "://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js";
        wf.type = "text/javascript";
        wf.async = "true";

        var s = document.getElementsByTagName("script")[0];

        s.parentNode.insertBefore(wf, s);
      }

      font();
    </script>
  </head>
  <body>
    <div class="page-wrapper">
      <!-- menu dropdown start-->
      <!-- <div class="menu-dropdown">
        <div class="menu-dropdown__inner" data-value="start">
          <div class="screen screen--start">
            <div
              class="screen__item screen--trigger item--active"
              data-category="home"
            >
              <span>VISIT</span
              ><span>
                <svg class="icon">
                  <use xlink:href="#chevron"></use>
                </svg>
              </span>
            </div>
            <div class="screen__item screen--trigger" data-category="pages">
              <span>THINGS TO DO</span
              ><span>
                <svg class="icon">
                  <use xlink:href="#chevron"></use>
                </svg>
              </span>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="blog.html">LEARN AND RESEARCH</a>
            </div>
            <div class="screen__item screen--trigger" data-category="shop">
              <span>ANIMAL</span>
              <span>
                <svg class="icon">
                  <use xlink:href="#chevron"></use>
                </svg>
              </span>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="contacts.html">MUSEUM</a>
            </div>
            <div class="screen__item screen--trigger" data-category="elements">
              <span>ABOUT</span
              ><span>
                <svg class="icon">
                  <use xlink:href="#chevron"></use>
                </svg>
              </span>
            </div>
            <div class="screen__item screen--trigger" data-category="language">
              <span>SUPPORT US</span
              ><span>
                <svg class="icon">
                  <use xlink:href="#chevron"></use>
                </svg>
              </span>
            </div>
            <ul class="screen__socials">
              <li>
                <a class="item--facebook" href="#"
                  ><i class="fa fa-facebook" aria-hidden="true"></i
                ></a>
              </li>
              <li>
                <a class="item--twitter" href="#"
                  ><i class="fa fa-twitter" aria-hidden="true"></i
                ></a>
              </li>
              <li>
                <a class="item--youtube" href="#"
                  ><i class="fa fa-youtube-play" aria-hidden="true"></i
                ></a>
              </li>
              <li>
                <a class="item--instagram" href="#"
                  ><i class="fa fa-instagram" aria-hidden="true"></i
                ></a>
              </li>
            </ul>
            <a class="screen__button" href="#">Tickets</a>
          </div>
        </div>
        <div class="menu-dropdown__inner" data-value="home">
          <div class="screen screen--sub">
            <div class="screen__heading">
              <h6 class="screen__back">
                <svg class="icon">
                  <use xlink:href="#chevron-left"></use>
                </svg>
                <span>Home</span>
              </h6>
            </div>
            <div class="screen__item item--active">
              <a class="screen__link" href="index.html">Home Zoo</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="front_2.html">Home Aquarium</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="front_3.html">Home Terrarium</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="front_4.html">Home Protections</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="front_5.html">Home Safari</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="front_6.html">Home Shop</a>
            </div>
          </div>
        </div>
        <div class="menu-dropdown__inner" data-value="pages">
          <div class="screen screen--sub">
            <div class="screen__heading">
              <h6 class="screen__back">
                <svg class="icon">
                  <use xlink:href="#chevron-left"></use>
                </svg>
                <span>Pages</span>
              </h6>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="about.html">About</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="services.html">Services</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="blog-details.html">Blog Details</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="gallery.html">Gallery</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="gallery_2.html">Gallery v.2</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="calendar.html">Calendar</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="membership.html">Membership</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="events.html">Events</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="event-details.html"
                >Event Details</a
              >
            </div>
            <div class="screen__item">
              <a class="screen__link" href="tickets.html">Tickets</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="foundation.html">Foundation</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="education.html">Education</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="donation.html">Donation</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="donation-details.html"
                >Donation Details</a
              >
            </div>
            <div class="screen__item">
              <a class="screen__link" href="animals.html">Animals</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="animal-details.html"
                >Animal Details</a
              >
            </div>
            <div class="screen__item">
              <a class="screen__link" href="safari-tours.html">Safari Tours</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="tour-details.html">Tour Details</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="typography.html">Typography</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="faq.html">Faq</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="map.html">Map</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="404.html">404</a>
            </div>
          </div>
        </div>
        <div class="menu-dropdown__inner" data-value="shop">
          <div class="screen screen--sub">
            <div class="screen__heading">
              <h6 class="screen__back">
                <svg class="icon">
                  <use xlink:href="#chevron-left"></use>
                </svg>
                <span>Shop</span>
              </h6>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="shop-catalog.html">Shop Catalog</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="shop-product.html">Shop Product</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="shop-cart.html">Shop Cart</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="shop-checkout.html"
                >Shop Checkout</a
              >
            </div>
            <div class="screen__item">
              <a class="screen__link" href="shop-account.html">Shop Account</a>
            </div>
          </div>
        </div>
        <div class="menu-dropdown__inner" data-value="elements">
          <div class="screen screen--sub">
            <div class="screen__heading">
              <h6 class="screen__back">
                <svg class="icon">
                  <use xlink:href="#chevron-left"></use>
                </svg>
                <span>Elements</span>
              </h6>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="accordion.html">Accordion</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="alerts.html">Alerts</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="breadcrumbs.html">Breadcrumbs</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="buttons.html">Buttons</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="charts.html">Charts</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="counters.html">Counters</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="forms.html">Forms</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="icon-list.html">Icon List</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="logos.html">Logos</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="paginations.html">Paginations</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="pricing-tables.html"
                >Pricing Tables</a
              >
            </div>
            <div class="screen__item">
              <a class="screen__link" href="tabs.html">Tabs</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="team.html">Tean</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="testimonials.html">Testimonials</a>
            </div>
          </div>
        </div>
        <div class="menu-dropdown__inner" data-value="language">
          <div class="screen screen--sub">
            <div class="screen__heading">
              <h6 class="screen__back">
                <svg class="icon">
                  <use xlink:href="#chevron-left"></use>
                </svg>
                <span>Language</span>
              </h6>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="javascript:void(0);">English</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="javascript:void(0);">French</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="javascript:void(0);">Spanish</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="javascript:void(0);">Deutsch</a>
            </div>
            <div class="screen__item">
              <a class="screen__link" href="javascript:void(0);">Russian</a>
            </div>
          </div>
        </div>
      </div> -->

      <!-- menu dropdown end-->

      <!-- header start-->
      <!-- header start-->
      <!-- header start-->
      <!-- header start-->
      <header class="header header-common">
        <!-- navigation bar start  -->
        <div class="header__top">
          <div class="row align-items-center">
            <div class="col-6 col-lg-4">
              <a class="logo" href="index.html"
                ><img
                  class="logo__img col-lg-12"
                  src="img/logo/org5.png"
                  alt="logo"
                  style="height: 80px; width:100px; padding:5px;"
              /></a>
            </div>
            <div class="col-6 col-lg-8 d-flex justify-content-end">
              <!-- main menu start-->
              <ul class="main-menu">
                <li class="main-menu__item main-menu__item--active">
                  <a class="main-menu__link" href="javascript:void(0);"
                    ><span>Home</span></a
                  >
                  <!-- sub menu start-->
                  <ul class="main-menu__sub-list">
                    <li class="item--active">
                      <a href="index.html"><span>Home Zoo</span></a>
                    </li>
                    <li>
                      <a href="front_2.html"> <span>Home Aquarium</span></a>
                    </li>
                    <li>
                      <a href="front_3.html"><span>Home Terrarium</span></a>
                    </li>
                    <li>
                      <a href="front_4.html"
                        ><span>Home Animal Protections</span></a
                      >
                    </li>
                    <li>
                      <a href="front_5.html"><span>Home Safari</span></a>
                    </li>
                    <li>
                      <a href="front_6.html"><span>Home Shop</span></a>
                    </li>
                  </ul>
                  <!-- sub menu end-->
                </li>
                <li class="main-menu__item main-menu__item--has-child">
                  <a class="main-menu__link" href="javascript:void(0);"
                    ><span>Animals</span></a
                  >
                  <!-- sub menu start-->
                  <ul class="main-menu__sub-list sub-list--style-2">
                    <li>
                      <a href="about.html"><span>About</span></a>
                    </li>
                    <li>
                      <a href="services.html"><span>Services</span></a>
                    </li>
                    <li>
                      <a href="blog-details.html"><span>Blog Details</span></a>
                    </li>
                    <li>
                      <a href="gallery.html"><span>Gallery</span></a>
                    </li>
                    <li>
                      <a href="gallery_2.html"><span>Gallery v.2</span></a>
                    </li>
                    <li>
                      <a href="calendar.html"><span>Calendar</span></a>
                    </li>
                    <li>
                      <a href="membership.html"><span>Membership</span></a>
                    </li>
                    <li>
                      <a href="events.html"><span>Events</span></a>
                    </li>
                    <li>
                      <a href="event-details.html"
                        ><span>Event Details</span></a
                      >
                    </li>
                    <li>
                      <a href="tickets.html"><span>Tickets</span></a>
                    </li>
                    <li>
                      <a href="foundation.html"><span>Foundation</span></a>
                    </li>
                    <li>
                      <a href="education.html"><span>Education</span></a>
                    </li>
                    <li>
                      <a href="donation.html"><span>Donation</span></a>
                    </li>
                    <li>
                      <a href="donation-details.html"
                        ><span>Donation Details</span></a
                      >
                    </li>
                    <li>
                      <a href="animals.html"> <span>Animals</span></a>
                    </li>
                    <li>
                      <a href="animal-details.html">
                        <span>Animal Details</span></a
                      >
                    </li>
                    <li>
                      <a href="safari-tours.html"> <span>Safari Tours</span></a>
                    </li>
                    <li>
                      <a href="tour-details.html"> <span>Tour Details</span></a>
                    </li>
                    <li>
                      <a href="typography.html"> <span>Typography</span></a>
                    </li>
                    <li>
                      <a href="faq.html"><span>FAQ</span></a>
                    </li>
                    <li>
                      <a href="map.html"><span>Map</span></a>
                    </li>
                    <li>
                      <a href="404.html"><span>404 Page</span></a>
                    </li>
                  </ul>
                  <!-- sub menu end-->
                </li>
                <li class="main-menu__item">
                  <a class="main-menu__link" href="services.html"
                    ><span>Services</span></a
                  >
                </li>

                <li class="main-menu__item">
                  <a class="main-menu__link" href="javascript:void(0);"
                    ><span>Finances</span></a
                  >
                  <!-- sub menu start-->
                  <ul class="main-menu__sub-list">
                    <li>
                      <a href="shop-catalog.html"><span>Shop Catalog</span></a>
                    </li>
                    <li>
                      <a href="shop-product.html"><span>Shop Product</span></a>
                    </li>
                    <li>
                      <a href="shop-cart.html"><span>Shop Cart</span></a>
                    </li>
                    <li>
                      <a href="shop-checkout.html"
                        ><span>Shop Checkout</span></a
                      >
                    </li>
                    <li>
                      <a href="shop-account.html"><span>Shop Account</span></a>
                    </li>
                  </ul>
                  <!-- sub menu end-->
                </li>

                <li class="main-menu__item">
                  <a
                    class="main-menu__link"
                    href="/complaint/ContactFrom_v1/index.html"
                    ><span>Complain</span></a
                  >
                </li>
                <!-- <li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="javascript:void(0);"><span>Elements</span></a> -->
                <!-- sub menu start-->
                <!-- <ul class="main-menu__sub-list sub-list--style-2">
										<li><a href="accordion.html"><span>Accordion</span></a></li>
										<li><a href="charts.html"><span>Charts</span></a></li>
										<li><a href="alerts.html"><span>Alerts</span></a></li>
										<li><a href="counters.html"><span>Counters</span></a></li>
										<li><a href="logos.html"><span>Logos</span></a></li>
										<li><a href="forms.html"><span>Forms</span></a></li>
										<li><a href="tabs.html"><span>Tabs</span></a></li>
										<li><a href="buttons.html"><span>Buttons</span></a></li>
										<li><a href="paginations.html"><span>Paginations</span></a></li>
										<li><a href="team.html"><span>Team</span></a></li>
										<li><a href="breadcrumbs.html"><span>Bread Crumbs</span></a></li>
										<li><a href="icon-list.html"><span>Icon List</span></a></li>
										<li><a href="pricing-tables.html"><span>Pricing Tables</span></a></li>
										<li><a href="testimonials.html"><span>Testimonials</span></a></li>
									</ul> -->
                <!-- sub menu end-->
                <!-- </li> -->
              </ul>
              <!-- main menu end--><a
                class="header__button"
                href="/login/img/login-form-05/index.html"
                >Log In</a
              >
              <!-- menu-trigger start-->
              <div class="hamburger">
                <div class="hamburger-box">
                  <div class="hamburger-inner"></div>
                </div>
              </div>
              <!-- menu-trigger end-->
            </div>
          </div>
        </div>
        <!-- <div class="header__lower">
					<div class="row">
						<div class="col-auto d-flex align-items-center">
							<ul class="lower-menu">
								<li class="lower-menu__item"><a class="lower-menu__link" href="#">Membership</a></li>
								<li class="lower-menu__item"><a class="lower-menu__link" href="#">Education</a></li>
								<li class="lower-menu__item"><a class="lower-menu__link" href="#">Map Zoo</a></li>
								<li class="lower-menu__item"><a class="lower-menu__link" href="#">Events</a></li>
								<li class="lower-menu__item"><a class="lower-menu__link" href="#">Donate</a></li>
								<li class="lower-menu__item"><a class="lower-menu__link" href="#">Foundation</a></li>
							</ul> -->
        <!-- lang select start-->
        <!-- <ul class="lang-select">
								<li class="lang-select__item lang-select__item--active"><span>English</span>
									<ul class="lang-select__sub-list">
										<li><a href="#">French</a></li>
										<li><a href="#">Spanish</a></li>
										<li><a href="#">Deutsch</a></li>
										<li><a href="#">Russian</a></li>
									</ul>
								</li>
							</ul> -->
        <!-- lang select end-->
        <!-- <ul class="header__socials">
								<li><a class="item--facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a class="item--twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a class="item--youtube" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
								<li><a class="item--instagram" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div> -->
      </header>

      <!-- navigation bar ended  -->
      <!-- navigation bar ended  -->
      <!-- navigation bar ended  -->

      <!-- header end-->
      <!-- header end-->
      <!-- header end-->
      <!-- header end-->

      <!-- main part start  -->
      <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
           
            <div class="card mb-3">
                <h5 class="text-center mb-4">Assign Employees to cages</h5>
                <form class="form-card" action="look_after_form.php" method="post">




                    <!-- <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex">  <label for="COMPLAINT_NO" class="form-label">
              <h6 class="mt-3">Complaint No: <font color="ff0000">*</font></h6>
            </label>
			  
          <input type="text" id="COMPLAINT_NO" name="COMPLAINT_NO" placeholder="Enter Complaint " class="form-control text-left mr-2">         
                       
                    </div>
                   </div> -->


                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex">  <label for="CAGE_NO" class="form-label">
              <h6 class="mt-3">CAGE_NO<font color="ff0000">*</font></h6>
            </label>
			  
          <input type="text" id="CAGE_NO	" name="CAGE_NO" placeholder="CAGE_NO" class="form-control text-left mr-2">         
                        <!-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)"> </div> -->
                    </div>
                   </div>

                        <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex">  <label for="EMPLOYEE_ID" class="form-label">
              <h6 class="mt-3">EMPLOYEE_ID<font color="ff0000">*</font></h6>
            </label>
			  
          <input type="text" id="EMPLOYEE_ID" name="EMPLOYEE_ID" placeholder="EMPLOYEE_ID" class="form-control text-left mr-2">         
                        <!-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)"> </div> -->
                    </div>
                   </div>


                   <div class="row justify-content-between text-left">
                        
                  
                   <button type="submit"  class="btn btn-primary mt-3">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>




      <!-- main part end  -->


     

      <!-- footer start-->
      <!-- footer start-->
      <!-- footer start-->
      <!-- footer start-->

      <footer class="footer">
        <!-- <img class="footer__bg img--bg" src="img/background__layout.png" alt="bg"/> -->
        <div class="container">
          <div class="row bottom-50">
            <div class="col-md-5 col-xl-4 text-center text-md-left">
              <a class="logo logo--footer" href="index.html"
                ><img
                  class="logo__img img-fluid"
                  src="img/logoedit_ .png"
                  alt="logo"
              /></a>
              <div class="footer__details">
                <p>
                  <strong>Location:</strong>
                  <span>Bangladesh National Zoo, Mirpur 2, Dhaka</span>
                </p>
                <p>
                  <strong>Phone:</strong>
                  <a href="tel:+31859644725">+31 85 964 47 25</a>
                  <a href="tel:+31859644725">+31 65 792 63 11</a>
                </p>
                <p>
                  <strong>Email:</strong>
                  <a href="mailto:info@animalsworld.com"
                    >info@animalsworld.com</a
                  >
                </p>
                <p>
                  <strong>Openning hours:</strong>
                  <span>9:00 AM - 5:00 PM</span>
                </p>
              </div>
              <ul class="socials">
                <li class="socials__item">
                  <a class="socials__link" href="#"
                    ><i class="fa fa-facebook" aria-hidden="true"></i
                  ></a>
                </li>
                <li class="socials__item">
                  <a class="socials__link" href="#"
                    ><i class="fa fa-twitter" aria-hidden="true"></i
                  ></a>
                </li>
                <li class="socials__item">
                  <a class="socials__link" href="#"
                    ><i class="fa fa-youtube-play" aria-hidden="true"></i
                  ></a>
                </li>
                <li class="socials__item">
                  <a class="socials__link" href="#"
                    ><i class="fa fa-instagram" aria-hidden="true"></i
                  ></a>
                </li>
              </ul>
            </div>
            <div class="col-md-7 col-xl-5 d-none d-md-block">
              <!-- <h6 class="footer__title">Menu & Links</h6> -->
              <!-- <ul class="footer-menu">
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Home</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Membership </a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Pages</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Education</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Animals</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Support</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Schedule</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Events</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Gallery</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Blog</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Contacts</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Donate</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Foundation</a></li>
								<li class="footer-menu__item"><a class="footer-menu__link" href="#">Tickets</a></li>
							</ul>
							<ul class="footer-submenu">
								<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Documents</a></li>
								<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Association of Zoo</a></li>
								<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Aqurium</a></li>
								<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Terrarium</a></li>
								<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Terra Park</a></li>
								<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Cooperation</a></li>
								<li class="footer-submenu__item"><a class="footer-submenu__link" href="#">Libriry</a></li>
							</ul> -->
            </div>
            <div class="col-lg-3 d-none d-xl-block">
              <h6 class="footer__title">
                <span>Instagram</span>
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </h6>
              <div class="footer-instagram">
                <a class="footer-instagram__item" href="#">
                  <div class="footer-instagram__img">
                    <img
                      class="img--bg"
                      src="img/f_ig-1.jpg"
                      alt="ig"
                    /></div></a
                ><a class="footer-instagram__item" href="#">
                  <div class="footer-instagram__img">
                    <img
                      class="img--bg"
                      src="img/f_ig-2.jpg"
                      alt="ig"
                    /></div></a
                ><a class="footer-instagram__item" href="#">
                  <div class="footer-instagram__img">
                    <img
                      class="img--bg"
                      src="img/f_ig-3.jpg"
                      alt="ig"
                    /></div></a
                ><a class="footer-instagram__item" href="#">
                  <div class="footer-instagram__img">
                    <img
                      class="img--bg"
                      src="img/f_ig-4.jpg"
                      alt="ig"
                    /></div></a
                ><a class="footer-instagram__item" href="#">
                  <div class="footer-instagram__img">
                    <img
                      class="img--bg"
                      src="img/f_ig-5.jpg"
                      alt="ig"
                    /></div></a
                ><a class="footer-instagram__item" href="#">
                  <div class="footer-instagram__img">
                    <img class="img--bg" src="img/f_ig-6.jpg" alt="ig" /></div
                ></a>
              </div>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-sm-6 text-center text-sm-left">
              <div class="footer-privacy">
                <a class="footer-privacy__link" href="#">Privacy Policy</a
                ><span class="footer-privacy__divider">|</span
                ><a class="footer-privacy__link" href="#">Term and Condision</a>
              </div>
            </div>
            <div class="col-sm-6 text-center text-sm-right">
              <a class="footer__link" href="#"
                ><img src="img/logo.jpeg" alt="logo"
              /></a>
            </div>
          </div>
        </div>
      </footer>
      <!-- footer end-->
      <!-- footer end-->
      <!-- footer end-->
      <!-- footer end-->
      <!-- footer end-->
    </div>
    <!-- libs-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/libs.min.js"></script>
    <!-- scripts-->
    <script src="js/common.js"></script>
    <div style="display: none">
      <!-- <xml version="1.0" encoding="utf-8"?><svg
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
      > -->
        <symbol
          viewBox="0 0 488.147 512"
          id="adult"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M195.158 313.802c-4.247-1.762-8.031-.014-10.889 5.176-5.845 10.617-14.613 16.669-26.881 16.933-14.445.311-24.873-5.948-30.818-19.357-2.512-5.666-6.885-7.609-11.486-5.41-4.237 2.025-5.489 6.7-3.077 12.047 2.134 4.73 4.853 9.099 8.814 12.918 2.162 2.667 4.999 4.978 8.017 7.068 27.96 19.362 59.177 3.654 69.801-17.197 2.711-5.32 1.278-10.204-3.481-12.178z"
          />
          <path
            d="M445.354 35.474c-15.775-16.53-34.422-28.201-56.885-33.369-1.257-.289-3.266.268-3.26-2.105h-34c.123 2.09-1.616 1.768-2.766 2.024-24.323 5.419-44.031 18.46-60.427 36.82-2.322 2.6-4.404 3.156-7.767 2.571-20.15-3.505-39.495-.586-57.919 8.197-23.308 11.111-40.695 28.657-53.955 50.493-1.806 2.974-3.743 4.025-7.131 3.965-10.996-.194-21.998.019-32.996-.088-22.414-.219-42.407 6.766-59.465 21.1-23.425 19.684-35.757 44.772-34.265 75.819.455 9.476 1.569 18.924 2.543 28.369.322 3.122-.325 5.033-3.341 6.811-11.643 6.865-18.778 16.968-17.201 30.84 1.619 14.242 10.445 23.448 23.965 27.868 2.813.92 4.035 2.286 4.713 4.965 3.287 12.996 8.492 25.241 15.036 36.909 10.212 18.209 22.761 34.467 42.57 42.756 8.154 3.412 10.466 7.914 9.586 16.039-.415 3.837-1.539 4.703-5.059 4.605-7.827-.216-15.667-.207-23.495-.031-11.479.258-22.998-.935-34.434.912C24.6 404.949 3.622 424.663.797 448.191c-1.402 11.673-.505 23.626-.573 35.452-.059 10.262 2.04 12.352 12.162 12.352 95.992.002 191.985.002 287.977.002.833 0 1.667.015 2.5-.006 6.269-.159 9.199-2.991 9.327-9.169.087-4.165.052-8.333.014-12.499-.094-10.327.782-20.783-.535-30.954-3.104-23.974-26.468-43.049-52.007-43.33-15.83-.175-31.664-.036-47.496-.039-13.348-.003-13.299.002-11.992-13.49.191-1.974.97-2.985 2.712-3.656 21.563-8.313 36.528-23.879 47.823-43.501.927-1.609 1.44-4.031 4.168-3.571 2.808.473 2.208 3 2.621 4.789 6.109 26.443 27.506 46.806 54.358 50.674 14.204 2.046 28.622.62 42.939.628 4.499.003 5.536 1.34 5.511 5.65-.178 30.497-.143 60.995-.062 91.492.02 7.761-1.384 15.76 2.967 22.984h10c4.354-7.215 2.945-15.207 2.966-22.96.082-29.635.027-59.271.038-88.906.002-5.74.307-6.003 5.36-3.5 17.542 8.689 26.092 23.235 26.549 42.461.392 16.473 0 32.964.127 49.446.061 7.914-1.466 16.078 2.96 23.46h10c4.423-7.385 2.898-15.551 2.961-23.467.126-15.653.042-31.308.036-46.963-.009-27.33-16.689-51.727-42.376-61.336-4.271-1.598-5.802-3.451-5.748-8.118.271-23.812.149-47.628.097-71.442-.006-2.858-.003-5.029 3.812-5.534 31.977-4.227 56.172-21.387 75.312-46.359 47.463-61.929 42.909-157.914-9.951-213.307zM40.287 277.569c-2.037.88-3.468-1.385-4.69-2.857-4.452-5.362-4.604-15.471-.371-20.96.768-.996 1.478-2.569 2.99-2.129 1.35.393.856 1.982.954 3.064.447 4.948.815 9.904 1.211 14.857a6.409 6.409 0 01-.138.011c.087 1.157.264 2.315.24 3.47-.032 1.57 1.406 3.851-.196 4.544zm11.942-99.019c4.49-19.761 15.077-35.383 32.116-46.438 11.732-7.612 24.731-11.539 38.674-11.964 10.156-.309 20.329-.051 30.493-.175 3.335-.041 4.066 1.046 2.831 4.162-9.285 23.429-13.11 47.784-11.952 72.922.154 3.337-.99 4.773-4.306 5.274-6.925 1.047-13.86 1.897-20.85 2.301-17.163.526-32.915-4.039-47.476-13.04-5.64-3.486-10.97-7.676-17.901-8.481-3.503-.406-2.013-2.872-1.629-4.561zm151.989 237.405c18.824.124 37.653-.18 56.472.145 17.61.304 31.686 10.643 34.573 25.569 2.256 11.665.651 23.586.844 35.392.035 2.125-1.34 2.875-3.265 2.877-11.661.008-23.322-.016-34.982.039-2.93.014-3.659-1.589-3.643-4.129.038-6.33.045-12.661-.035-18.991-.076-5.994-3.001-9.595-7.748-9.74-4.933-.151-8.117 3.586-8.197 9.798-.074 5.83-.262 11.674.048 17.488.238 4.463-1.492 5.695-5.782 5.673-28.486-.147-56.974-.076-85.461-.076-28.154-.004-56.308-.122-84.46.104-5.093.041-6.961-1.52-6.435-6.538.31-2.962.201-6.008-.076-8.982-.413-4.434-3.833-7.502-7.922-7.477-4.09.025-7.48 3.128-7.813 7.581-.273 3.646-.192 7.326-.119 10.989.056 2.82-.864 4.389-3.984 4.326-5.495-.111-10.994-.059-16.491-.046-2.197.005-3.492-.889-3.465-3.228.113-9.485-1.021-19.054.503-28.44 3.038-18.707 19.168-31.669 40.19-32.168 17.149-.407 34.316-.041 51.474-.148 3.009-.019 4.337 1.169 5.347 3.955 6.778 18.702 20.343 27.716 40.291 28.201 13.626.331 25.796-2.17 35.429-12.6 4.144-4.487 7.375-9.489 9.049-15.349.871-3.061 2.424-4.246 5.658-4.225zm-76.039-23.992c-.044-2.52.76-3.07 3.221-2.547 16.489 3.503 33.024 3.513 49.508.027 2.961-.626 3.43.404 3.331 2.911-.125 3.156-.03 6.32-.03 9.481h-.034c0 3.327.153 6.662-.028 9.979-.625 11.49-8.667 19.569-20.156 20.115-5.145.244-10.319.23-15.466.005-11.514-.504-19.657-8.489-20.221-20.013-.324-6.639-.007-13.307-.125-19.958zm106.127-56.369c-16.19 27.214-41.347 38.413-71.68 40.26-14.773.9-29.204-1.132-43.263-5.949-25.329-8.678-39.626-28.247-50.454-51.096-8.902-18.786-13.175-38.665-12.727-59.52.15-6.994.024-13.993.024-20.99h.122c0-10.828.041-21.656-.023-32.484-.021-3.517.816-4.69 4.202-2.405 24.744 16.705 51.945 20.396 80.761 14.826 4.213-.814 5.68.243 6.545 4.52 6.185 30.566 19.361 57.607 41.421 79.977 12.342 12.515 26.659 22.07 43.324 27.816 3.415 1.179 3.481 2.132 1.748 5.045zm-27.551-37.081c-28.239-23.81-41.398-55.494-45.309-91.552-4.2-39.12 2.806-75.703 25.682-108.274 15.636-22.263 36.481-37.424 63.914-41.593 29.975-4.555 55.566 5.228 76.964 26.062 22.088 21.506 33.458 48.482 38.18 78.524 2.364 15.036 2.931 30.147.782 45.282-3.923 36.25-17.187 68.071-45.69 91.872-34.318 28.654-80.336 28.504-114.523-.321zm153.454 37.536c-.004 11.984-.006 23.967-.002 35.951.001 2.056.163 4.091-2.93 3.998-15.619-.469-31.331 1.377-46.854-1.023-18.18-2.811-32.567-16.715-36.748-34.479-.628-2.667-1.101-4.859 2.743-5.369 27.567-3.657 49.453-17.594 67.876-37.734 2.593-2.835 11.969-3.717 14.937-1.439 1.479 1.135.941 2.74.947 4.144.053 11.984.031 23.968.031 35.951zm57.396-71.498c-15.85 11.193-33.826 16.13-53.281 15.385-5.821-.223-6.146-.693-3.285-5.47 5.063-8.454 8.909-17.485 12.801-26.499 7.012-20.839 11.198-42.179 10.303-64.236-1.853-45.677-17.23-85.492-51.698-116.754-8.192-7.43-17.412-13.448-27.548-17.873-3.889-1.698-3.807-2.827-.979-5.675 35.478-35.725 89.446-36.74 126.294-2.047 23.151 21.797 35.085 49.357 39.973 80.289 2.376 15.034 2.943 30.151.78 45.289-4.547 39.773-19.73 73.842-53.36 97.591z"
          />
          <path
            d="M219.68 88.959c-3.841-1.839-7.064-.523-10.01 2.141-14.584 13.187-25.413 28.922-32.141 47.419-2.177 5.985-.649 10.556 3.848 12.177 4.754 1.715 8.84-.482 11.035-6.454 5.914-16.089 15.019-29.955 27.998-41.224 2.065-1.793 3.582-3.937 3.712-7.459-.132-2.605-1.449-5.167-4.442-6.6zM124.132 258.1c.552-5.486-2.455-9.658-7.252-10.061-4.633-.389-8.032 2.831-8.678 8.224-.686 5.716-2.94 7.822-8.264 7.719-5.079-.098-7.05-2.077-7.714-7.745-.627-5.351-4.081-8.604-8.708-8.201-4.66.405-7.631 4.319-7.268 9.573.786 11.365 12.328 22.259 23.72 22.388 11.389.128 23.007-10.399 24.164-21.897z"
          />
        </symbol>
        <symbol
          viewBox="0 0 464.892 464.983"
          id="baby"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M463.268 143.307C460.254 119.536 452 97.445 439.07 77.211c-1.781-2.787-1.595-4.595.826-6.788 3.578-3.239 6.976-6.696 10.253-10.243 3.482-3.769 3.408-8.427.096-11.594-3.141-3.004-7.67-3.013-11.249.236-2.958 2.685-5.601 5.717-8.569 8.391-1.121 1.01-2.088 3.904-4.145 1.873-1.57-1.55-4.044-2.879-3.102-6.19 2.681-9.419-1.309-13.267-11.117-10.86-3.184.781-4.573-1.677-6.134-3.315-1.834-1.925.848-2.809 1.799-3.788 6.153-6.334 12.471-12.508 18.677-18.792 4.339-4.393 4.745-9.264 1.186-12.711-3.424-3.317-8.122-2.907-12.338 1.244-6.411 6.314-12.927 12.539-19.028 19.143-3.245 3.513-5.619 4.001-9.957 1.316-65.433-40.507-151.221-31.376-206.135 22.524-44.474 43.654-88.419 87.853-132.216 132.188C15.796 212.362.881 252.219 0 297.372c.332 9.919.984 19.537 2.607 29.092 14.811 87.241 93.284 146.757 182.805 137.589 40.421-4.14 74.822-21.246 103.509-50.169 40.013-40.342 80.32-80.393 120.492-120.577 3.888-3.889 7.88-7.69 11.54-11.786 35.338-39.555 48.949-85.89 42.315-138.214zM150.156 449.143c-69.347-8.033-126.114-64.4-134.083-133.965-5.242-45.76 8.14-86.185 39.39-119.882 21.507-23.191 44.52-44.984 66.872-67.39.556-.558 1.25-.978 2.539-1.97-30.683 113.683-22.034 221.796 40.208 323.959-5.293.701-10.167-.2-14.926-.752zm150.421-69.836c-20.506 20.639-39.774 42.725-66.882 55.468-14.721 6.92-29.962 11.85-46.09 14.027-1.829.247-3.42.739-4.77-1.325-13.05-19.949-24.149-40.905-33.538-64.04 51.595 14.511 101.614 10.442 151.191-5.489.063.798.223 1.225.089 1.359zm132.675-142.723c-7.674 14.947-17.767 28.104-29.654 39.945-19.715 19.64-39.668 39.056-58.911 59.149-8.875 9.267-18.922 15.787-30.775 20.404-35.304 13.752-71.602 21.773-109.669 20.283-19.735-.772-39.04-3.985-57.662-10.844-3.04-1.12-4.886-2.7-5.914-5.951-14.237-45.001-19.231-91.054-16.214-138.079 2.488-38.778 10.206-76.448 23.253-113.058 2.287-6.417 5.562-11.834 10.525-16.595 12.145-11.647 23.837-23.765 35.896-35.503 9.966-9.7 21.318-17.562 33.627-24.022 1.695-.889 3.289-2.405 6.326-1.429-37.401 26.64-58.709 62.438-62.21 107.828-3.489 45.237 10.657 84.608 43.686 116.052 32.035 30.497 71.035 42.693 114.707 38.172 43.747-4.529 78.395-25.669 103.898-61.918 1.533 2.662-.152 4.091-.909 5.566zm-66.08 30.767c-78.486 35.864-169.125-15.458-180.204-101.337-8.77-67.983 42.075-133.985 109.935-142.807 5.969-.776 11.939-1.062 16.185-1.188 23.363-.06 43.544 5.42 62.531 15.632 2.851 1.534 4.215 2.556 1.247 5.619-3.377 3.486-2.974 8.144.174 11.161 3.236 3.102 7.949 3.008 11.61-.568 2.678-2.615 4.85-5.558 8.62-1.266 1.501 1.709 1.472 2.642-.065 4.034-1.355 1.228-2.697 2.511-3.821 3.945-2.699 3.445-2.433 8.099.673 10.849 3.331 2.948 6.936 2.871 10.501.372.943-.661 1.597-1.751 2.562-2.364 1.599-1.017 2.441-4.791 5.375-1.518 2.163 2.412 3.856 4.477.223 7.175-2.754 2.045-4.563 4.811-4.093 8.589.741 5.956 7.947 9.382 12.412 5.188 4.481-4.208 5.378-1.309 7.142 2.021 35.237 66.534 5.94 145.871-61.007 176.463z"
          />
          <path
            d="M332.76 168.864c-11.523 3.756-22.06 2.182-31.196-6.009-10.758-9.645-14.093-21.341-9.269-35.193 2.038-5.853.174-10.26-4.688-11.799-4.477-1.418-8.586 1.14-10.479 6.692-1.675 4.912-2.676 9.959-2.394 15.454-.245 3.425.247 7.05 1.022 10.638 7.179 33.243 40.704 43.11 62.71 35.148 5.614-2.031 7.905-6.575 5.78-11.269-1.896-4.188-5.853-5.498-11.486-3.662zm70.523-30.771c-3.696-1.881-7.047-1.015-10.039 1.775-2.912 2.716-5.986 3.276-9.39.669-4.854-3.718-5.363-7.299-1.554-12.262 3.521-4.588 3.257-9.314-.684-12.256-3.922-2.928-8.624-1.923-12.097 2.661-3.334 4.402-4.721 9.452-4.808 15.923.35 8.258 3.449 16.023 12.392 20.074 9.184 4.161 18.201 3.472 26.382-2.606 5.546-4.119 5.33-11.164-.202-13.978zm-71.519-61.531c-3.907 2.563-7.07 2.071-10.23-1.086-3.223-3.22-3.374-6.409-.847-10.243 3.223-4.888 2.284-9.572-1.939-12.064-4.181-2.466-9.021-.979-11.752 3.969-4.517 8.185-4.469 16.616-.212 24.837 4.193 8.097 11.599 10.954 20.212 11.453 4.444.114 8.61-.864 12.482-2.993 5.28-2.904 7.119-7.618 4.717-11.928-2.47-4.43-7.241-5.349-12.431-1.945zm-68.746-2.144c-8.797-.131-16.028 6.818-16.227 15.596-.204 8.989 7 16.366 15.968 16.352a15.957 15.957 0 0015.98-15.85c.082-8.78-6.937-15.967-15.721-16.098zm111.704 95.99c-8.769.02-15.899 7.132-15.941 15.9-.042 8.789 6.99 15.945 15.777 16.055a15.937 15.937 0 0016.179-16.138c-.09-8.788-7.227-15.837-16.015-15.817z"
          />
        </symbol>
        <symbol
          viewBox="0 0 12.8 16"
          id="bag"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M12.797 13.831l-.916-10.317a.441.441 0 00-.438-.402H9.559C9.533 1.391 8.127 0 6.4 0S3.267 1.391 3.241 3.112H1.357a.437.437 0 00-.438.402L.003 13.831 0 13.87C0 15.045 1.076 16 2.4 16h8c1.324 0 2.4-.955 2.4-2.13 0-.013 0-.026-.003-.039zM6.4.883a2.28 2.28 0 012.276 2.228H4.124A2.28 2.28 0 016.4.883zm4 14.234h-8c-.831 0-1.504-.55-1.517-1.227l.876-9.891h1.478V5.34a.44.44 0 00.441.442.44.44 0 00.442-.442V3.998h4.556V5.34a.44.44 0 00.441.442.44.44 0 00.442-.442V3.998h1.478l.88 9.891c-.013.678-.69 1.228-1.517 1.228z"
            fill-rule="evenodd"
            clip-rule="evenodd"
          />
        </symbol>
        <symbol
          viewBox="0 0 388.819 388.819"
          id="bed"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M368.753 175.923V80.088c0-13.132-10.684-23.816-23.816-23.816H43.882c-13.132 0-23.816 10.684-23.816 23.816v95.836C8.721 177.65 0 187.469 0 199.289v59.318a7.5 7.5 0 007.5 7.5h8.035v37a7.5 7.5 0 007.5 7.5h13.539v14.441a7.5 7.5 0 0015 0v-14.441h285.672v14.441c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-14.441h13.539a7.5 7.5 0 007.5-7.5v-37h8.034a7.5 7.5 0 007.5-7.5v-59.318c0-11.82-8.721-21.64-20.066-23.366zM35.065 80.088c0-4.861 3.955-8.816 8.816-8.816h301.055c4.861 0 8.816 3.955 8.816 8.816v95.566h-26.335a733.889 733.889 0 0016.09-17.92 7.5 7.5 0 00-.001-9.845c-21.698-24.938-39.865-43.105-64.796-64.796a7.5 7.5 0 00-9.846 0c-24.932 21.692-43.098 39.859-64.795 64.796a7.5 7.5 0 00-.001 9.845 732.24 732.24 0 0016.09 17.92h-51.503a733.868 733.868 0 0016.091-17.92 7.5 7.5 0 00-.001-9.845c-21.695-24.934-39.862-43.101-64.796-64.796a7.5 7.5 0 00-9.846 0c-24.934 21.695-43.101 39.862-64.796 64.796a7.5 7.5 0 00-.001 9.845 735.947 735.947 0 0016.091 17.92H35.065V80.088zm205.788 95.566c-6.901-7.084-13.872-14.611-21.15-22.842 17.929-20.287 33.803-36.161 54.085-54.086 20.282 17.924 36.156 33.799 54.086 54.086-7.277 8.231-14.249 15.758-21.15 22.842h-65.871zm-158.76 0c-6.901-7.085-13.873-14.611-21.151-22.842 17.926-20.283 33.803-36.16 54.086-54.086 20.283 17.926 36.16 33.803 54.086 54.086-7.277 8.231-14.249 15.757-21.151 22.842h-65.87zm276.192 119.953H30.535v-29.5h327.75v29.5zm15.534-44.5H15v-51.818c0-4.761 3.874-8.635 8.636-8.635h341.547c4.762 0 8.636 3.874 8.636 8.635v51.818z"
          />
        </symbol>
        <symbol
          viewBox="0 0 92.85 80.4"
          id="bird"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g data-name="Layer 2">
            <path
              d="M75.41 42.91l17.44.8s-16.12 2-18.07 2.61c-3.7 9.87-14.61 7.36-18.15 12.1-5.56 7.46-15.8 10-31.74 5.65-1.62 2.34-17.69 14.7-22.28 16.19s9.48-9.54 9.48-9.54S5.35 75.39.78 76.61s12.29-11.5 12.29-11.5-7.32 3-11.28 3.29 7.65-7.16 7.65-7.16-3.58.28-4.93.28-2-1.11 2.9-3.3S22.53 51 32 49.17c.64-3.3-16.5-29-15.55-31.09s9.7-1.39 22.16 13c1.17-2.14-2.36-33.77.39-30.9S53.62 26.7 54.9 44.8c2 .43 5.79-2.77 9.9-4.68 7.4-3.45 10.61 2.79 10.61 2.79z"
              data-name="Capa 1"
            />
          </g>
        </symbol>
        <symbol
          viewBox="0 0 174 32"
          id="bootstrap"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M26.667 0C29.6 0 32 2.4 32 5.333v21.334C32 29.6 29.6 32 26.667 32H5.333C2.4 32 0 29.6 0 26.667V5.333C0 2.4 2.4 0 5.333 0h21.334zm-8.9 6.954H8.695v18.667h8.576c1.202 0 2.237-.136 3.11-.408.874-.272 1.585-.638 2.144-1.098a4.15 4.15 0 001.23-1.647 5.32 5.32 0 00.391-2.05c0-1.276-.298-2.332-.888-3.179-.591-.842-1.465-1.385-2.615-1.631v-.052c.858-.366 1.516-.89 1.977-1.559.46-.669.69-1.474.69-2.415 0-1.553-.507-2.709-1.517-3.477-1.009-.77-2.352-1.15-4.026-1.15zm-.026 10.165c.994 0 1.757.24 2.311.742.555.502.826 1.208.826 2.134 0 .94-.277 1.673-.826 2.185-.544.518-1.317.774-2.31.774h-5.779V17.12zm-.444-7.503c.889 0 1.568.193 2.039.575.47.382.706 1.046.706 1.987 0 .836-.262 1.474-.784 1.924-.523.45-1.177.67-1.961.67h-5.334V9.615zm20.081-3.38h8.12c1.16 0 2.228.242 3.205.725.976.483 1.744 1.14 2.305 1.972.56.831.841 1.74.841 2.726 0 1.044-.256 1.948-.768 2.711a5.057 5.057 0 01-2.016 1.755v.232c1.083.387 1.943 1 2.581 1.841.638.842.957 1.852.957 3.031 0 1.14-.304 2.15-.913 3.03-.61.88-1.431 1.557-2.465 2.03-1.035.474-2.18.711-3.437.711h-8.41V6.236zm7.83 8.468c.85 0 1.532-.237 2.044-.71.513-.474.769-1.069.769-1.784 0-.696-.246-1.28-.74-1.755-.493-.473-1.145-.71-1.957-.71h-4.031v4.959h3.915zm.435 8.729c.947 0 1.687-.246 2.218-.74.532-.493.798-1.135.798-1.928 0-.793-.27-1.44-.812-1.943-.541-.503-1.315-.754-2.32-.754h-4.234v5.365h4.35zm17.052 4.031c-1.527 0-2.89-.343-4.089-1.03a7.312 7.312 0 01-2.799-2.813c-.667-1.189-1-2.527-1-4.016 0-1.47.333-2.803 1-4.002a7.284 7.284 0 012.799-2.828c1.199-.686 2.562-1.029 4.089-1.029 1.508 0 2.861.343 4.06 1.03a7.284 7.284 0 012.799 2.827c.667 1.199 1 2.533 1 4.002 0 1.489-.333 2.827-1 4.017a7.312 7.312 0 01-2.799 2.813c-1.199.686-2.552 1.029-4.06 1.029zm0-3.509a4.07 4.07 0 002.03-.522 3.828 3.828 0 001.479-1.508c.367-.657.551-1.43.551-2.32 0-.87-.184-1.634-.551-2.291a3.828 3.828 0 00-1.479-1.508 4.07 4.07 0 00-2.03-.522 4.07 4.07 0 00-2.03.522 3.928 3.928 0 00-1.493 1.508c-.378.657-.566 1.421-.566 2.291 0 .87.188 1.638.566 2.305.377.668.874 1.175 1.493 1.523a4.07 4.07 0 002.03.522zm17.835 3.509c-1.527 0-2.89-.343-4.089-1.03a7.312 7.312 0 01-2.799-2.813c-.667-1.189-1-2.527-1-4.016 0-1.47.333-2.803 1-4.002a7.284 7.284 0 012.799-2.828c1.199-.686 2.562-1.029 4.089-1.029 1.508 0 2.861.343 4.06 1.03a7.284 7.284 0 012.798 2.827c.668 1.199 1.001 2.533 1.001 4.002 0 1.489-.333 2.827-1 4.017a7.312 7.312 0 01-2.799 2.813c-1.199.686-2.552 1.029-4.06 1.029zm0-3.509a4.07 4.07 0 002.03-.522 3.828 3.828 0 001.479-1.508c.367-.657.551-1.43.551-2.32 0-.87-.184-1.634-.551-2.291a3.828 3.828 0 00-1.479-1.508 4.07 4.07 0 00-2.03-.522 4.07 4.07 0 00-2.03.522 3.928 3.928 0 00-1.493 1.508c-.378.657-.566 1.421-.566 2.291 0 .87.188 1.638.566 2.305.377.668.874 1.175 1.493 1.523a4.07 4.07 0 002.03.522zm16.762 3.277a5.962 5.962 0 01-2.03-.334c-.619-.222-1.121-.526-1.508-.913-.909-.87-1.363-2.107-1.363-3.712v-6.815H89.81V12.21h2.581V8.034h3.799v4.176h3.625v3.248H96.19v6.119c0 .754.164 1.295.493 1.624.27.31.735.464 1.392.464.367 0 .672-.048.913-.145.242-.097.556-.261.943-.493v3.712a7.112 7.112 0 01-2.639.493zm11.6.232c-1.798 0-3.253-.367-4.364-1.102-1.112-.735-1.89-1.692-2.335-2.871l3.393-1.479c.31.696.75 1.223 1.32 1.58.57.358 1.232.537 1.986.537.696 0 1.276-.111 1.74-.334.464-.222.696-.584.696-1.087 0-.483-.213-.846-.638-1.087-.425-.242-1.063-.46-1.914-.653l-1.74-.377c-1.199-.29-2.194-.817-2.987-1.58-.793-.764-1.189-1.716-1.189-2.857 0-.85.256-1.614.769-2.291.512-.677 1.208-1.199 2.087-1.566.88-.367 1.852-.551 2.915-.551 3.055 0 5.094 1.073 6.119 3.219l-3.248 1.421c-.58-1.044-1.508-1.566-2.784-1.566-.657 0-1.18.12-1.566.362-.387.242-.58.547-.58.914 0 .696.657 1.218 1.972 1.566l2.175.522c1.47.367 2.576.928 3.32 1.682.745.754 1.117 1.682 1.117 2.784 0 .947-.275 1.783-.827 2.509-.55.725-1.304 1.29-2.261 1.696-.958.406-2.016.609-3.176.609zm15.312-.232a5.962 5.962 0 01-2.03-.334c-.619-.222-1.121-.526-1.508-.913-.909-.87-1.363-2.107-1.363-3.712v-6.815h-2.581V12.21h2.581V8.034h3.799v4.176h3.625v3.248h-3.625v6.119c0 .754.164 1.295.493 1.624.27.31.735.464 1.392.464.367 0 .672-.048.913-.145.242-.097.556-.261.943-.493v3.712a7.112 7.112 0 01-2.639.493zm5.684-15.022h3.567v1.972h.232c.367-.696.938-1.271 1.711-1.726a4.946 4.946 0 012.552-.681c.677 0 1.295.106 1.856.319v3.799a12.314 12.314 0 00-1.32-.42 4.835 4.835 0 00-1.145-.131c-1.121 0-2.01.406-2.668 1.218-.657.812-.986 1.837-.986 3.074V27h-3.799V12.21zm16.443 15.254c-1.566 0-2.852-.46-3.857-1.377-1.005-.919-1.508-2.122-1.508-3.611 0-.986.261-1.856.783-2.61.522-.754 1.237-1.334 2.146-1.74.909-.406 1.914-.609 3.016-.609 1.527 0 2.832.222 3.915.667v-.638c0-.812-.304-1.47-.913-1.972-.61-.503-1.426-.754-2.451-.754-.696 0-1.368.16-2.016.479a4.749 4.749 0 00-1.609 1.261l-2.436-1.914a7.157 7.157 0 012.697-2.146c1.083-.503 2.262-.754 3.538-.754 2.262 0 3.983.522 5.162 1.566 1.18 1.044 1.769 2.571 1.769 4.582V27h-3.741v-1.508h-.232c-.445.58-1.03 1.054-1.755 1.421-.725.367-1.56.551-2.508.551zm.899-2.958c1.102 0 1.977-.353 2.625-1.058a3.55 3.55 0 00.971-2.48 7.202 7.202 0 00-3.103-.696c-1.972 0-2.958.735-2.958 2.204 0 .6.213 1.087.638 1.465.425.377 1.034.565 1.827.565zm18.966-12.76c1.334 0 2.547.333 3.64 1 1.092.668 1.947 1.6 2.566 2.799.619 1.199.928 2.552.928 4.06 0 1.527-.31 2.885-.928 4.075-.619 1.189-1.474 2.116-2.566 2.784-1.093.667-2.306 1-3.64 1-1.005 0-1.9-.213-2.683-.638-.783-.425-1.367-.957-1.754-1.595h-.232l.232 2.088v3.945h-3.799V12.21h3.567v1.798h.232c.406-.638.996-1.174 1.769-1.61.773-.435 1.663-.652 2.668-.652zm-.667 3.538c-.696 0-1.353.179-1.972.536a3.932 3.932 0 00-1.479 1.523c-.367.657-.551 1.411-.551 2.262 0 .85.184 1.605.551 2.262a4.04 4.04 0 001.479 1.537 3.8 3.8 0 001.972.551c.715 0 1.382-.184 2.001-.551a4.04 4.04 0 001.479-1.537c.367-.657.551-1.411.551-2.262 0-.85-.184-1.605-.551-2.262a3.932 3.932 0 00-1.479-1.523 3.93 3.93 0 00-2.001-.536z"
          />
        </symbol>
        <symbol
          viewBox="0 0 512 512"
          id="box"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M155.999 370.002c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10z"
          />
          <path
            d="M450.143 190.001l58.929-58.929a10 10 0 00-4.122-16.626l-143.5-44.29C348.514 28.575 310.066.002 265.999.002c-40.964 0-77.6 24.965-92.763 62.625L7.022 114.455a10 10 0 00-4.094 16.618l60.479 60.479-38.144 63.575a10.001 10.001 0 005.413 14.632l55.323 18.44v153.802a10 10 0 006.489 9.363c33.827 12.684 159.512 59.822 160.187 60.061a9.962 9.962 0 006.398.089c.029-.01.059-.016.088-.026l180-60a10.001 10.001 0 006.838-9.487v-157.92l58.998-18.54a10 10 0 004.074-16.611l-58.928-58.929zm-84.144-89.999c0-2.541-.107-5.076-.298-7.603l117.494 36.265-49.897 49.896-81.528-27.173c9.232-15.431 14.229-33.237 14.229-51.385zM190.326 73.974c11.101-32.282 41.512-53.972 75.673-53.972 36.801 0 68.719 24.892 77.618 60.532a80.446 80.446 0 012.382 19.468c0 18.574-6.164 35.983-17.828 50.352-15.277 18.842-37.938 29.648-62.172 29.648-26.196 0-50.767-12.858-65.733-34.404-9.333-13.406-14.267-29.174-14.267-45.596 0-8.931 1.455-17.688 4.327-26.028zM28.764 128.625l138.3-43.124a100.825 100.825 0 00-1.065 14.5c0 16.101 3.814 31.696 11.084 45.767L78.7 178.56l-49.936-49.935zm20.063 126.102l31.62-52.702 160.563 53.521-31.619 52.702-160.564-53.521zm197.172 232.845l-140-52.5V294.866c110.15 36.522 104.771 35.407 107.838 35.407 3.438 0 6.73-1.779 8.577-4.856l23.585-39.311v201.466zm10-248.111l-148.376-49.458 80.794-26.93c18.91 23.247 47.377 36.929 77.582 36.929 27.942 0 54.203-11.499 73.092-31.759l65.284 21.759-148.376 49.459zm170 195.333l-160 53.333v-209.62l35.451 44.31a10.002 10.002 0 0010.807 3.293l113.742-35.743v144.427zM312.791 304.979l-40.024-50.026 160.531-53.51 49.964 49.964-170.471 53.572z"
          />
          <path
            d="M219.511 392.198l-22.24-8.34c-5.171-1.938-10.935.681-12.875 5.852-1.939 5.172.681 10.936 5.852 12.875l22.24 8.34c5.182 1.942 10.939-.69 12.875-5.852 1.939-5.171-.681-10.936-5.852-12.875zm-.001 42.72l-60-22.5c-5.171-1.939-10.935.681-12.875 5.852-1.94 5.171.681 10.936 5.852 12.875l60 22.5a9.975 9.975 0 003.51.64c4.049 0 7.859-2.477 9.365-6.492 1.94-5.172-.68-10.936-5.852-12.875zM323.071 62.93c-3.905-3.906-10.237-3.905-14.143 0l-52.929 52.93-12.929-12.929c-3.905-3.905-10.237-3.905-14.143 0-3.906 3.905-3.905 10.237 0 14.143l20.001 19.999c3.905 3.905 10.237 3.905 14.143 0l60-60c3.905-3.905 3.905-10.237 0-14.143z"
          />
        </symbol>
        <symbol
          viewBox="0 0 92.75 63.79"
          id="bull"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g data-name="Layer 2">
            <g data-name="Capa 1">
              <path
                d="M80.92 41.78c-1.49-.3-2-2.45-1.94-4.2 0-2 .76-3.31 2-3.51a10.53 10.53 0 013.17 0 11.84 11.84 0 00-1-2.8c-1.39-2.57-3.73-2.25-6.41-5.21C70.39 19 61 8.06 54.38 8.37 45 8.8 13.48 23.65 11.89 24.29s-7.57-2.64-7.65-4.57 3.76-7.14 6.51-7.57 8.26.17 9.76-.62S24 7.48 24 6.16s-3.52-4-3.52-4S19.19-.08 17.43 0s-4.13 2.29-5.72 2.12c.44 1.67 4 3.43 5.44 3.35a6.08 6.08 0 003-1.41 4.85 4.85 0 012 1.58c.49.74-.35 2.55-1.76 3.34s-8-.43-10.56.18S-.34 17.08 0 20.07s8.18 9.86 11.08 10.39c-1.93 4.13.09 14.15-.79 14.86s-4.22-1.06-5 .72 4.07 10.45 3.37 11.6-.58 3.75-.58 3.75l7.44-.06a5.49 5.49 0 00-2.09-3.77l-1-4.59s5.5-2.9 7.26-5.72a10.83 10.83 0 004.05 4.32c1.06.35-2.11.7-1.61 2.12s12.08 5.61 12.27 6.43c-1.33 2.09-.37 3.5-.37 3.5l6.61.17a8 8 0 00-4.19-6L31 51.81s5.31-6.05 5.82-12.2C40.36 44.11 48 44.88 48 44.88l-6.15 14.69c-.38.91.83 4.22.83 4.22h7.22c-.44-1.72-4.15-4.23-4.15-4.23l10-14.8h2.55S61.16 56.85 60.63 58s-.44 4.4-.44 4.4l7.39-.18a5.79 5.79 0 00-2.46-3.87l.17-13.73s4 1.33 6.26-.09c-.8 2.48-1.33 8.28-.88 9.51a3.21 3.21 0 003.25 1.85c1.23-.18 8.53-8.1 10-10.59a9.89 9.89 0 00.85-3.8c-.47 0-.94.09-1.4.16a7.63 7.63 0 01-2.45.12z"
              />
              <path
                d="M89.49 37.31a11.59 11.59 0 00-8.36-2.2c-1.6.26-1.32 5.37 0 5.64s3.87-.89 6.16-.09 5.46 4.4 5.46 3.25-.98-5.01-3.26-6.6z"
              />
            </g>
          </g>
        </symbol>
        <symbol
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="aifeather aifeather-shopping-cart"
          viewBox="0 0 24 24"
          id="cart"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle cx="9" cy="21" r="1" />
          <circle cx="20" cy="21" r="1" />
          <path
            d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"
          />
        </symbol>
        <symbol
          viewBox="0 0 135.236 60"
          id="cat"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M135.048 23.327c-1.65-3.973-3.212-7.984-4.892-11.944-.297-.699-.902-1.395-1.548-1.798-4.775-2.977-9.595-5.882-14.405-8.804-.386-.235-.795-.432-1.442-.781l1.543 4.791c-.715.101-1.287.208-1.864.259-3.852.337-7.702.702-11.558.985-11.983.878-23.923 1.073-35.8-1.396-8.821-1.834-17.747-3.031-26.801-2.756-.636.019-1.399.15-1.872.522-2.732 2.148-5.401 4.378-8.075 6.599-.285.236-.641.574-.675.895-.332 3.179-1.497 6.314-.462 9.574.383 1.207.655 2.465.819 3.721.094.72.06 1.574-.245 2.211-2.555 5.337-5.042 10.716-7.848 15.921-1.755 3.256-2.621 6.526-2.356 10.214.198 2.761.039 5.548.039 8.391h9.143c-1.963-1.451-3.656-2.62-5.239-3.923-.481-.396-.889-1.149-.929-1.765-.121-1.853.004-3.721-.064-5.579-.032-.867.316-1.299 1.036-1.7 8.979-4.993 17.936-10.025 26.924-15.001.582-.322 1.417-.469 2.066-.344 14.022 2.701 28.033 5.461 42.051 8.178 1.121.217 1.917.714 2.637 1.612a2026.42 2026.42 0 0014.354 17.674c.352.429.993.869 1.506.878 4.211.068 8.423.037 12.635.025.097 0 .195-.12.39-.248-2.464-1.326-4.842-2.579-7.188-3.889-.534-.298-1.069-.717-1.412-1.213a500.714 500.714 0 01-6.735-9.981c-.314-.479-.464-1.176-.428-1.756.186-2.98.446-5.955.704-8.93.273-3.159.572-6.315.873-9.615 3.912 0 7.717-.016 11.522.023.4.004.818.294 1.19.515a424.118 424.118 0 016.538 3.939c.622.385 1.06.463 1.641-.129a63.65 63.65 0 013.86-3.613c.637-.552.675-1.02.367-1.762z"
          />
          <path
            d="M55.849 53.659c-1.236-.776-1.3-1.455-.769-2.708 1.408-3.324 2.659-6.715 3.965-10.082.238-.614.443-1.241.72-2.021l-13.433-1.973c-.074.184-.142.274-.141.363.086 4.496.165 8.992.293 13.486.011.38.278.822.554 1.114a646.82 646.82 0 007.208 7.513c.28.288.717.613 1.075.605 2.903-.06 5.804-.195 9.016-.32-.632-.48-.998-.778-1.383-1.049-2.358-1.658-4.666-3.397-7.105-4.928zM24.027 21.947c-.393-1.961-.908-3.898-1.456-6.159-.436.657-.737 1.038-.962 1.459-4.492 8.409-10.334 15.768-17.295 22.259-.286.266-.543.564-.814.847-.983 1.025-2.142 1.937-2.888 3.112-.497.784-.799 2.099-.483 2.895.459 1.157 1.743.76 2.495.134 3.3-2.746 6.877-5.273 9.694-8.461 4.074-4.61 7.588-9.716 11.305-14.637.287-.379.493-1.005.404-1.449zm66.354 22.295c-2.74-.536-5.225-1.066-7.731-1.467-.375-.06-1.077.382-1.235.758-.988 2.339-1.878 4.721-2.764 7.102-.127.34-.181.8-.06 1.126 1.021 2.744 2.092 5.469 3.12 8.129h11.798l-8.126-4.907 4.998-10.741z"
          />
        </symbol>
        <symbol
          viewBox="0 0 488.878 488.878"
          id="check"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M143.294 340.058l-92.457-92.456L0 298.439l122.009 122.008.14-.141 22.274 22.274L488.878 98.123l-51.823-51.825z"
          />
        </symbol>
        <symbol
          viewBox="0 0 8 12"
          id="chevron"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M2 0L.59 1.41 5.17 6 .59 10.59 2 12l6-6-6-6z" />
        </symbol>
        <symbol
          viewBox="0 0 9 14"
          id="chevron-left"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M7.355 0L9 1.645 3.657 7 9 12.355 7.355 14l-7-7 7-7z" />
        </symbol>
        <symbol
          viewBox="0 0 464.167 479.957"
          id="child"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M464.061 377.615c-.24-35.626-16.11-62.861-45.436-82.506-3.25-2.177-4.388-3.551-.795-6.329 2.224-1.719 4.1-3.901 6.067-5.939 43.37-44.928 52.779-111.741 22.811-166.419-19.844-36.205-49.958-60.11-89.791-71.396-3.72-1.054-5.207-2.495-4.893-6.414.359-4.47.142-8.993.059-13.49-.102-5.519-3.176-9.03-7.829-9.12-4.833-.093-8.026 3.529-8.126 9.328-.066 3.831.069 7.668-.067 11.496-.051 1.433.859 3.878-1.837 3.735-2.122-.112-4.639.601-6.203-1.992-5.427-8.997-10.74-9.066-15.761-.188-1.618 2.86-4.329 2.198-6.56 2.142-2.461-.061-1.535-2.539-1.55-3.993-.091-8.831-.021-17.663-.057-26.494C304.068 3.717 301.13.045 296.169 0c-4.97-.045-8.021 3.652-8.046 9.91-.04 9.831-.157 19.666.069 29.492.076 3.323-1.137 4.63-4.215 5.415-15.81 4.036-30.361 10.904-43.858 20.039-2.328 1.576-4.621 3.204-8.016 5.562v-6.515c0-16.996.008-33.993-.002-50.99-.006-10.727-4.521-13.676-14.577-9.53-23.555 9.71-47.118 19.399-70.642 29.182-2.917 1.213-5.479 1.602-8.56.247-22.865-10.057-45.815-19.917-68.705-29.915-8.119-3.546-13.473-.213-13.492 8.678-.038 17.996-.115 35.994.072 53.988.039 3.703-1.173 5.994-3.967 8.412C17.761 103.808-.576 141.398.281 187.199c.74 39.536 16.589 72.904 44.828 100.445 5.436 5.301 5.017 4.2-.632 8.104C16.288 315.232.6 341.788.188 376.398c-.368 30.989-.085 61.986-.069 92.98.004 7.882 2.645 10.573 10.424 10.573 147.636.009 295.273.008 442.909-.002 8.11-.001 10.642-2.594 10.646-10.854.015-30.493.169-60.988-.037-91.48zM287.572 60.267c.919 1.346.369 2.893.569 4.336.607 4.37 3.93 7.393 8.09 7.336 4.165-.056 7.41-3.154 7.83-7.569.126-1.322.194-2.686.019-3.994-.593-4.426 2.843-3.531 5.195-3.991 3.403-.666 2.764 1.852 2.82 3.746.244 8.239 2.776 11.916 8.164 11.811 5.248-.102 7.644-3.704 7.885-11.609.053-1.737-.965-4.485 2.594-3.968 2.597.378 6.106-.295 5.394 4.332-.175 1.138-.087 2.336.014 3.494.389 4.452 3.536 7.6 7.672 7.744 4.333.151 7.746-3.002 8.26-7.672.143-1.303.187-2.618.278-3.958C401.76 71.069 452 120.01 447.869 192.082c-3.825 66.72-57.828 118.46-123.698 119.923-68.711 1.526-123.152-47.113-131.001-111.346-8.798-71.999 38.89-127.65 94.402-140.392zm32.405 355.685c-52.321-.641-77.346-53.073-56.65-94.471 1.648-3.297 3.416-4.068 7.056-2.713 33.022 12.295 66.152 12.338 99.196.091 3.8-1.408 5.672-.712 7.436 2.852 20.49 41.388-4.592 93.78-57.038 94.241zM165.483 42.154c15.371-6.388 30.791-12.661 46.135-19.111 3.302-1.388 4.643-1.299 4.57 2.877-.213 12.16-.1 24.326-.06 36.489.008 2.518.013 4.313-3.487 2.841-16.263-6.843-32.597-13.515-48.897-20.268-.401-.166-.702-.573-1.035-.855.436-1.515 1.793-1.565 2.774-1.973zM75.02 22.76c15.824 6.901 31.679 13.732 48.95 21.202-17.309 7.482-33.179 14.312-49.014 21.22-2.362 1.031-2.873.213-2.865-2.019.044-12.825.048-25.651-.004-38.476-.01-2.381.712-2.896 2.933-1.927zM39.184 257.83C1.988 205.944 10.261 132.703 57.06 89.351c1.935-1.793 3.626-3.719 6.897-2.844 2.087.559 4.156-.913 6.135-1.77a47617.83 47617.83 0 0060.918-26.411c7.557-3.284 15.031-3.365 22.697-.157 19.342 8.092 38.757 16.01 58.136 24.012 1.498.618 2.946 1.356 4.981 2.299-8.809 9.129-15.748 19.047-22.227 29.331-2.067 3.28-3.487 6.812-4.965 10.296-1.495 3.522-3.882 4.176-7.152 3.771-3.365-.417-5.514-2.185-6.175-5.558-.191-.973-.106-1.996-.246-2.982-.658-4.631-4.22-7.671-8.547-7.335-4.328.336-7.361 3.841-7.387 8.533-.05 8.95 7.555 19.043 17.476 22.172 3.777 1.191 4.049 2.714 3.099 6.018-2.892 10.058-3.898 20.46-4.811 31.023-2.565-.546-3.936-2.342-5.668-3.511-20.938-14.143-47.553-9.658-63.732 10.789-15.533 19.63-13.288 46.793 5.282 63.589.974.881 2.154 1.533 3.238 2.292-1.795-4.887-2.399-9.807-2.164-14.75-.234 4.943.37 9.862 2.165 14.747 5.747 12.572 15.756 18.394 29.351 18.326 13.407-.067 23.205-5.966 28.851-18.326 5.948-3.471 9.367-9.278 13.417-14.963 2.162 4.342 4.073 8.372 6.149 12.314 6.406 12.16 14.213 23.37 24.06 32.958 3.706 3.609 2.708 5.073-.983 7.459-16.192 10.47-33.699 17.669-52.829 19.9-51.196 5.971-93.528-10.458-123.842-52.743zm134.707-29.562c-1.678-2.851-3.249-5.772-5.063-8.535-2.029-3.09-4.93-4.864-8.737-4.905-1.679-9.293-7.659-14.852-15.979-14.854-8.324-.002-14.256 5.511-15.983 14.853-5.894.07-8.643 4.259-11.229 8.621-.927 1.564-1.721 3.206-2.575 4.814v.001c-4.16-12.408-3.08-24.156 5.776-34.124 8.658-9.745 20.04-11.883 32.399-9.166 18.663 4.103 28.222 23.609 21.391 43.295zm-45.324 16.634c-2.13-6.7-.504-12.219 5.177-16.461 6.909 4.695 13.817 4.659 20.727.001-.646-1.988-1.064-3.641-1.216-5.05.152 1.409.57 3.061 1.216 5.049 5.722 4.229 7.291 9.762 5.169 16.454-.789 1.766-1.714 3.392-2.779 4.838 1.065-1.447 1.99-3.072 2.779-4.838-10.357 4.008-20.714 3.981-31.073.007zm24.624-22.522c.002.116.017.244.023.363-.006-.12-.021-.247-.023-.363zm1.222-3.876zm-41.423 17.504c-.011.121-.018.242-.028.362.01-.12.017-.241.028-.362zm-86.066 228.05c-10.795-.179-10.805.022-10.811-10.692-.007-12.664-.002-25.328-.002-37.992.015-13.997-.507-28.018.122-41.987 1.354-30.06 14.896-53.03 41.33-68.001.868-.491 1.763-.96 2.695-1.306 1.323-.491 2.986-2.029 4.017-.381 1.041 1.666-1.165 2.453-2.127 3.405-19.944 19.715-30.247 43.404-30.076 71.614.162 26.66-.049 53.323.122 79.983.025 4.102-1.058 5.427-5.27 5.357zm149.268-34.55c-.256 10.16-.184 20.332-.03 30.496.045 3.004-.789 4.021-3.922 4.013-39.999-.096-79.998-.098-119.997.002-3.313.008-4.204-1.061-4.191-4.271.112-28.999-.244-58.003.204-86.996.276-17.828 6.406-33.901 17.632-47.896.728-.908 1.535-1.757 2.354-2.585.335-.339.799-.552 2.31-1.561-4.05 11.193-6.578 21.447-6.469 32.244.379 37.778 31.004 72.616 68.364 78.064 13.563 1.978 26.572.511 39.234-4.383 3.314-1.278 4.617-1.326 4.511 2.873zm-.113-51.111c.127 8.491-.072 16.987.088 25.476.053 2.849-.79 4.472-3.461 5.795-24.21 11.985-56.367 6.595-74.863-12.701-19.133-19.961-23.411-52.193-10.189-76.085 1.421-2.568 2.746-3.619 5.869-2.434 32.569 12.356 65.328 12.68 98.211 1.195a10.644 10.644 0 011.916-.496c.29-.043.617.165 1.233.351-4.378 6.939-8.718 13.802-11.786 21.376-4.88 12.049-7.212 24.527-7.018 37.523zm25.685 85.674c-9.636-.34-9.651-.079-9.655-9.959-.006-13.15-.001-26.3-.001-39.451.01-13.65-.47-27.32.108-40.945 1.284-30.244 14.854-53.341 41.465-68.324 1.898-1.068 4.722-3.603 6.16-1.757 1.85 2.377-1.928 3.55-3.325 5.002-18.494 19.214-28.445 41.889-28.412 68.745.034 26.8-.143 53.601.136 80.398.054 5.219-1.559 6.465-6.476 6.291zm208.76-.031c-60.32-.13-120.64-.137-180.96.008-4.535.011-5.567-1.475-5.542-5.731.166-27.993-.107-55.989.159-83.98.175-18.403 6.162-34.96 17.669-49.414.993-1.247 1.83-2.806 3.818-3.157-13.446 42.334-1.882 76.314 35.837 99.32 28.145 17.166 57.637 15.141 84.036-4.344 32.409-23.922 41.859-56.152 28.791-95.033 2.163.439 3.092 2.02 4.118 3.312 11.379 14.326 17.368 30.731 17.566 48.946.306 28.157-.012 56.32.182 84.48.03 4.458-1.332 5.603-5.674 5.593zm37.667-5.035c.023 4.022-1.32 5.06-5.151 5.038-10.923-.064-10.929.087-10.933-10.654-.005-12.983-.001-25.967-.001-42.01-.581-13.565 1.182-30.249-.828-46.824-2.684-22.137-12.611-40.781-28.267-56.494-.235-.236-.538-.426-.708-.7-.781-1.257-3.606-1.853-2.116-3.746 1.246-1.584 3.076.191 4.476.847 5.451 2.555 10.482 5.833 15.058 9.725 18.149 15.438 27.716 35.308 28.225 58.932.617 28.616.083 57.257.245 85.886z"
          />
          <path
            d="M276.038 197.737c-8.582 19.611-1.922 44.158 14.97 55.171 5.661 12.338 15.433 18.245 28.852 18.313 13.605.069 23.6-5.743 29.346-18.316 11.773-8.612 18.001-20.448 18.776-34.773 1.214-22.455-15.596-43.899-37.731-49.024-21.663-5.015-44.847 7.228-54.213 28.629zm13.331 49.06zm-.474-9.643zm.263-2.688zm.648-3.811c.055-.267.107-.535.166-.802-.059.267-.111.534-.166.802zm11.874-41.418c12.056-7.9 29.24-6.864 40.034 2.414 9.617 8.266 12.788 22.504 8.164 36.656-1.667-2.856-3.22-5.786-5.031-8.547-2.026-3.089-4.924-4.881-8.739-4.913-7.012 2.924-8.322 5.92-5.698 13.029 5.131 4.645 7.803 10.036 5.173 17.037-1.319 2.999-3.016 5.593-5.148 7.556 2.131-1.963 3.828-4.557 5.147-7.555-10.322 3.885-20.643 3.983-30.964 0-2.566-6.989.057-12.396 5.191-17.039 6.821 5.544 13.779 5.544 20.601.001-2.624-7.108-1.314-10.104 5.698-13.028-1.831-9.426-7.677-14.857-15.997-14.861-8.34-.003-14.201 5.442-15.983 14.85-5.912.062-8.642 4.286-11.236 8.643-.929 1.561-1.705 3.213-2.551 4.824v.001c-5.154-15.707-.653-31.211 11.339-39.068zm26.392 65.015zm-55.875-110.295c11.408-.067 22.959-10.834 23.858-22.238.414-5.253-2.483-9.205-7.117-9.706-4.629-.5-8.198 2.751-8.833 8.047-.706 5.892-2.785 7.919-8.086 7.881-5.244-.037-7.155-1.985-7.915-8.068-.629-5.033-4.038-8.191-8.512-7.885-4.668.319-7.742 4.2-7.462 9.421.617 11.485 12.499 22.617 24.067 22.548zm87.67 0c11.39.129 23.007-10.399 24.165-21.897.552-5.486-2.455-9.658-7.252-10.061-4.633-.389-8.032 2.831-8.678 8.224-.686 5.716-2.94 7.822-8.264 7.719-5.079-.098-7.05-2.077-7.714-7.745-.627-5.351-4.081-8.604-8.708-8.201-4.66.405-7.631 4.319-7.268 9.573.784 11.365 12.327 22.259 23.719 22.388zm-265.324-.04c11.269.856 23.104-8.759 25.303-20.557 1.124-6.034-1.64-10.676-6.748-11.333-4.902-.63-8.245 2.657-9.025 8.873-.624 4.972-2.915 7.015-7.895 7.042-5.363.029-7.156-1.837-8.082-8.407-.66-4.687-4.054-7.762-8.346-7.564-4.488.207-7.687 3.883-7.638 8.776.106 10.864 11.194 22.316 22.431 23.17z"
          />
        </symbol>
        <symbol
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="aofeather aofeather-clock"
          viewBox="0 0 24 24"
          id="clock"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle cx="12" cy="12" r="10" />
          <path d="M12 6v6l4 2" />
        </symbol>
        <symbol
          viewBox="0 0 47.971 47.971"
          id="close"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M28.228 23.986L47.092 5.122a2.998 2.998 0 000-4.242 2.998 2.998 0 00-4.242 0L23.986 19.744 5.121.88a2.998 2.998 0 00-4.242 0 2.998 2.998 0 000 4.242l18.865 18.864L.879 42.85a2.998 2.998 0 104.242 4.241l18.865-18.864L42.85 47.091c.586.586 1.354.879 2.121.879s1.535-.293 2.121-.879a2.998 2.998 0 000-4.242L28.228 23.986z"
          />
        </symbol>
        <symbol
          viewBox="0 0 510 510"
          id="comment"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M459 0H51C22.95 0 0 22.95 0 51v459l102-102h357c28.05 0 51-22.95 51-51V51c0-28.05-22.95-51-51-51z"
          />
        </symbol>
        <symbol
          viewBox="0 0 20 20"
          id="comment2"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M1 13a2 2 0 002 2h12l4 4V3a2 2 0 00-2-2H3a2 2 0 00-2 2v10z"
            fill-rule="evenodd"
          />
        </symbol>
        <symbol
          viewBox="0 0 512.001 512.001"
          id="cutlery"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M141.247 31.99C125.777 11.362 104.892.003 82.44.003c-22.451 0-43.335 11.36-58.806 31.986C8.921 51.606.819 77.505.819 104.916c0 27.412 8.102 53.31 22.816 72.927 8.605 11.473 18.888 20.068 30.18 25.446L36.546 462.948c-.842 12.653 3.645 25.221 12.309 34.48 8.665 9.261 20.909 14.573 33.591 14.573 12.679 0 24.917-5.309 33.579-14.565 8.664-9.26 13.151-21.83 12.307-34.486l-17.269-259.656c11.294-5.379 21.578-13.974 30.184-25.449 14.712-19.617 22.816-45.517 22.816-72.927s-8.102-53.311-22.816-72.928zM98.874 481.389c-4.3 4.596-10.135 7.127-16.429 7.127-6.299 0-12.138-2.533-16.442-7.132-4.302-4.6-6.442-10.592-6.025-16.875l16.954-254.934c1.826.153 3.659.258 5.508.258 1.848 0 3.68-.106 5.505-.258l16.954 254.934c.417 6.286-1.721 12.281-6.025 16.88zM82.44 186.346c-4.207 0-8.308-.645-12.264-1.839-.328-.121-.66-.232-1-.324-25.683-8.431-44.872-40.759-44.872-79.266 0-44.899 26.08-81.429 58.136-81.429 32.057 0 58.138 36.529 58.138 81.429s-26.08 81.429-58.138 81.429zM511.18 305.92V13.222l-.099.043a11.697 11.697 0 00-1.653-7.696c-3.41-5.516-10.645-7.223-16.164-3.813-47.905 29.617-76.509 80.916-76.518 137.229l-.001.022v153.781c0 13.493 10.783 24.483 24.169 24.891V476.7c0 19.373 15.761 35.134 35.134 35.134s35.135-15.761 35.135-35.134V305.979c-.001-.02-.003-.039-.003-.059zm-69.505-11.685a1.444 1.444 0 01-1.444-1.445V139.028l.001-.014c0-40.621 17.413-78.189 47.462-104.139v259.36h-46.019zm46.022 182.467c0 6.423-5.225 11.649-11.65 11.649-6.423 0-11.649-5.225-11.649-11.649V317.721h23.299v158.981zM332.799.003c-6.485 0-11.743 5.257-11.743 11.743v133.4h-29.92v-133.4c0-6.485-5.258-11.743-11.743-11.743S267.65 5.26 267.65 11.746v133.4h-29.92v-133.4c0-6.485-5.258-11.743-11.743-11.743s-11.743 5.257-11.743 11.743V181.73c0 19.14 15.573 34.714 34.714 34.714h2.089l-16.475 247.65c-.827 12.352 3.551 24.624 12.013 33.67 8.463 9.049 20.42 14.238 32.807 14.238 12.385 0 24.342-5.189 32.806-14.237 8.461-9.045 12.839-21.318 12.013-33.666l-16.476-247.655h2.093c19.142 0 34.715-15.573 34.715-34.714V11.745C344.541 5.26 339.283.003 332.799.003zM295.045 481.72c-4.098 4.382-9.658 6.795-15.654 6.795s-11.556-2.413-15.654-6.795c-4.096-4.379-6.132-10.082-5.732-16.063l16.578-249.215h9.615l16.579 249.218c.4 5.978-1.635 11.681-5.732 16.06zm26.01-299.991c.001 6.192-5.036 11.228-11.228 11.228h-60.868c-6.192 0-11.228-5.036-11.228-11.228v-13.1h83.324v13.1z"
          />
        </symbol>
        <symbol
          viewBox="0 0 937.5 937.5"
          id="debitcard"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M781.25 165.531V78.125C781.195 35 746.25.055 703.125 0h-625C35 .055.055 35 0 78.125v343.75c.121 39.902 30.367 73.273 70.063 77.32l58.734 152.465c15.516 40.258 60.726 60.313 100.988 44.817l366.777-141.29c-25.343 66.2-18.132 140.461 19.461 200.551L625 770.094v151.781c0 8.633 6.992 15.625 15.625 15.625h281.25c8.633 0 15.625-6.992 15.625-15.625V406.113a204.484 204.484 0 00-59.863-144.023zm0 93.446l47.422 123.101c9.293 24.164-2.75 51.277-26.91 60.578l-27.106 10.469a78.145 78.145 0 006.594-31.25zm-750 162.898V78.125c0-25.883 20.992-46.875 46.875-46.875h625C729.008 31.25 750 52.242 750 78.125v99.313h-.137l.137.355v244.082a47.447 47.447 0 01-1.063 8.094l-143.125-143.14c-32.171-31.43-83.46-31.673-115.921-.571-32.47 31.12-34.418 82.37-4.391 115.847l61.016 66.645H78.125c-25.883 0-46.875-20.992-46.875-46.875zM231.422 500l-111.11 42.777L103.876 500zm-12.875 167.309c-24.156 9.312-51.285-2.73-60.594-26.887l-26.36-68.547L318.11 500v-.094h257.047l20.309 22.14zM906.25 906.25h-250v-125h250zm0-156.25H649.297l-6.777-10.828c-38.098-60.883-39.614-137.781-3.957-200.11a15.618 15.618 0 00-2.047-18.312L508.473 381.062c-19.094-20.898-18.02-53.207 2.422-72.78 20.449-19.579 52.773-19.259 72.82.71l248.988 248.93 22.094-22.094-57.813-57.812 16.032-6.25c40.226-15.52 60.273-60.692 44.797-100.942l-52.887-137.328 50.617 50.723a173.037 173.037 0 0150.707 121.894zm0 0"
          />
          <path
            d="M178.125 218.75c22.438 0 40.625-18.188 40.625-40.625v-75c0-22.438-18.188-40.625-40.625-40.625h-75C80.687 62.5 62.5 80.688 62.5 103.125v75c0 22.438 18.188 40.625 40.625 40.625zM93.75 178.125V156.25H125V125H93.75v-21.875c0-5.176 4.2-9.375 9.375-9.375h75c5.176 0 9.375 4.2 9.375 9.375V125h-31.25v31.25h31.25v21.875c0 5.176-4.2 9.375-9.375 9.375h-75c-5.176 0-9.375-4.2-9.375-9.375zm-15.625 87.5h62.5v31.25h-62.5zm0 93.75h62.5v31.25h-62.5zm281.25 0h62.5v31.25h-62.5zm-187.5-93.75h62.5v31.25h-62.5zm93.75 0h62.5v31.25h-62.5zm93.75 0h62.5v31.25h-62.5zm296.875-187.5h31.25V125h-31.25zm-62.5 0H625V125h-31.25zm-62.5 0h31.25V125h-31.25zm-62.5 0H500V125h-31.25zM687.5 812.5h31.25v31.25H687.5zm0 0"
          />
        </symbol>
        <symbol
          viewBox="-56 0 480 480"
          id="direction"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M366.066 250.793l-48-56a8.003 8.003 0 00-6.074-2.793h-104v-32h136a8 8 0 008-8V40a8 8 0 00-8-8h-136v-8c-.066-13.227-10.773-23.934-24-24-13.254 0-24 10.746-24 24v8h-104a7.99 7.99 0 00-6.07 2.793l-48 56a7.994 7.994 0 000 10.398l48 56a7.998 7.998 0 006.07 2.809h104v32h-136a8 8 0 00-8 8v112a8 8 0 008 8h136v152a8 8 0 008 8h32a8 8 0 008-8V320h104a8.004 8.004 0 006.074-2.793l48-56a8.005 8.005 0 000-10.414zM175.992 24a8 8 0 018-8 7.778 7.778 0 015.695 2.45 7.661 7.661 0 012.305 5.55v8h-16zM18.527 96l41.145-48h276.32v96H59.672zm157.465 64h16v32h-16zm16 304h-16V320h16zm116.32-160H31.993v-96h276.32l41.145 48zm0 0"
          />
          <path
            d="M87.992 88h192a8 8 0 000-16h-192a8 8 0 000 16zm200 24a8 8 0 00-8-8h-192a8 8 0 000 16h192a8 8 0 008-8zm-8 120h-192a8 8 0 000 16h192a8 8 0 000-16zm0 32h-192a8 8 0 000 16h192a8 8 0 000-16zm0 0"
          />
        </symbol>
        <symbol
          viewBox="0 0 435.766 435.766"
          id="dog"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle cx="332" cy="85.883" r="12" />
          <path
            d="M419.742 81.883c-18.531 0-34.438 1.304-49.801-14.059l-19.883-19.882a48.002 48.002 0 00-33.942-14.059H259.96a48.188 48.188 0 00-34.019 14.058l-.293.292-37.453 37.452A41.634 41.634 0 00176 115.127v12.57c0 22.778 18.078 46.274 40.61 49.634 2.5.372 4.965.552 7.39.552v3.196c-39.43 22.724-120.332 68.548-136.351 84.447C74.168 279.012 64 300.333 64 321.883c0 9.619 1.258 19.402 6.851 32.121L24 353.883c-13.254 0-24 10.746-24 24s10.746 24 24 24h199.762c11.886 0 20.125-12.764 14.379-23.168a48.229 48.229 0 00-22.973-20.89c5.496-10.916 8.687-19.95 22.473-19.95H256v48.008c0 8.836 7.164 16 16 16h59.527c12.27 0 20.199-13.382 14.004-23.977-7.375-12.619-20.398-21.532-35.606-23.426l3.558-28.466c19.234-11.806 33.406-31.422 37.305-54.13 5.453-31.775-8.074-60.472-30.789-77.638v-32.364h48c17.602 0 39.41-12.349 48.465-27.442 3.817-6.358 19.34-29.415 19.301-36.614-.043-8.312-6.695-15.943-16.023-15.943zM223.93 161.712c-19.562 0-31.93-16.571-31.93-33.608v-12.973c0-6.651 2.539-13.164 7.508-18.131l37.453-37.451c5.027-5.026 11.774-8.371 19.039-9.262v79.596c0 17.115-13.782 31.829-32.07 31.829zM24 385.883c-4.41 0-8-3.589-8-8s3.59-8 7.957-8l56.554.146c5.926 7.782 6.89 9.098 15.965 15.854H24zm378.746-259.674c-6.493 10.82-22.13 19.674-34.746 19.674h-40.809c-10.414 0-19.211-6.708-22.527-16H288c2.047 10.047 7.953 18.628 16 24.406v47.921c23.047 17.422 36.117 37.266 31.019 66.968-4.05 23.585-18.317 36.087-36.457 47.222-3.844 30.751-5.008 40.05-6.5 51.981 16.137 2.009 30.672 2.04 39.465 17.503H272v-80h-16v15.992h-18.359c-4.938 0-9.543 1.31-13.91 3.155.785-21.742-7.082-43.63-23.168-59.718l-11.313 11.313c23.722 23.734 22.27 58.453 8.75 79.633l-4.797 9.483c12.446 5.397 24.375 8.767 30.558 20.142h-79.809c-35.45-.032-63.446-28.586-63.867-63.138-.34-19.142 8.344-38.943 25.922-52.037 17.61-13.117 114.966-69.42 133.993-80.384 0-4.351.008-11.243-.012-15.378 18.606-6.61 32.012-24.191 32.012-45.064v-80h44.121a31.99 31.99 0 0122.625 9.372l19.879 19.881C370.019 90.53 385 96.884 400.992 97.6a22.45 22.45 0 0010.844 13.459l-9.09 15.15z"
          />
        </symbol>
        <symbol
          viewBox="0 0 71.88 63.25"
          id="elep"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g data-name="Layer 2">
            <path
              d="M62.62 34.74l8.32 2.17c2.65-8.55-1.14-13.2-1.2-13.27a1 1 0 01-.24-.64 21.41 21.41 0 00-6.81-13.9C57.34 4 49.43 1 39.13.23a.74.74 0 01-.27.19C27.57 5.5 21.78 11.16 21.65 17.23c-.19 9 12 16.77 16.3 19.2V12.88a1 1 0 012 0v25.26a1.08 1.08 0 010 .19 1.17 1.17 0 01-.06.2 1 1 0 01-.17.25h-.06a.73.73 0 01-.23.16h-.09a1 1 0 01-.34.07 1 1 0 01-.4-.01h-.06c-.78-.39-19.1-9.71-18.85-21.81C19.78 10.87 25 5.11 35.06 0c-1.71 0-3.47 0-5.3.05C17.79.52 9.29 4.15 4.5 10.87c-7.74 10.88-3.16 26.32-3.11 26.48L7.72 54.2h5.1L16 49a1 1 0 01.91-.48 1 1 0 01.85.58l2.5 5.43 5.74.18.57-1.2a1 1 0 011-.57c-.58-1.23-1.85-4.52-.19-7.29s5.32-3.94 11.11-3.77C43.42 42 46 43 46.51 45c.93 3.48-5.69 7.78-7 8.61a1 1 0 01-1.06-1.7c2.83-1.75 6.54-5 6.15-6.39-.19-.72-1.91-1.53-6.15-1.65h-.87c-4.44 0-7.36 1-8.46 2.81a4.07 4.07 0 00-.54 2.23l4.42-.85a1 1 0 011.16.81 1 1 0 01-.79 1.13l-4.48.79a9.5 9.5 0 00.64 1.56.61.61 0 01.07.14 22.47 22.47 0 004.11 6.37.59.59 0 01.15-.2l2.83-2.56A1 1 0 0138 57.62l-2.8 2.55h-.09A12.33 12.33 0 0040.46 63a11 11 0 003 .25l-.76-8.45a1 1 0 012-.18l.74 8.38a22.57 22.57 0 009.1-4.59l-6.37-6.13a1 1 0 010-1.42 1 1 0 011.41 0l6.56 6.31c.79-.67 1.58-1.39 2.39-2.17l1-1-2.37-1.56-4.5-3.28a1 1 0 111.18-1.61l4.48 3.27L61 52.56c1.3-1.37 2.45-2.7 3.48-4l-7.29-5a1 1 0 011.13-1.65l7.37 5.07a36.29 36.29 0 004.63-8.09l-8.15-2.12a1 1 0 11.51-1.94zm-9.81-10.83a1.09 1.09 0 01-.39.08 1 1 0 01-.92-.62c-1.24-2.95-2-3-2.07-3-.47 0-1.31 1.43-1.72 2.88a1 1 0 01-1.92-.54c.19-.7 1.29-4.2 3.52-4.33 1.95-.13 3.25 2.34 4 4.21a1 1 0 01-.5 1.32z"
              data-name="Capa 1"
            />
          </g>
        </symbol>
        <symbol
          viewBox="0 0 511.997 511.997"
          id="family"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M157.897 185.906a7.499 7.499 0 00-10.549 1.101c-3.03 3.736-7.047 5.793-11.313 5.793-4.266 0-8.283-2.058-11.313-5.793a7.5 7.5 0 00-11.65 9.448c5.847 7.21 14.217 11.345 22.963 11.345s17.115-4.135 22.963-11.345a7.5 7.5 0 00-1.101-10.549zm-56.138-44.52a7.5 7.5 0 00-7.5 7.5v8.569a7.5 7.5 0 0015 0v-8.569a7.5 7.5 0 00-7.5-7.5zm68.552 0a7.5 7.5 0 00-7.5 7.5v8.569a7.5 7.5 0 0015 0v-8.569a7.5 7.5 0 00-7.5-7.5zm236.086 87.364a7.499 7.499 0 00-10.549 1.101c-3.03 3.735-7.048 5.793-11.313 5.793-4.266 0-8.283-2.058-11.313-5.793a7.5 7.5 0 10-11.649 9.448c5.846 7.211 14.216 11.345 22.962 11.345s17.115-4.135 22.962-11.345a7.5 7.5 0 00-1.1-10.549zm-56.138-44.519a7.5 7.5 0 00-7.5 7.5v8.569a7.5 7.5 0 0015 0v-8.569a7.5 7.5 0 00-7.5-7.5zm68.552 0a7.5 7.5 0 00-7.5 7.5v8.569a7.5 7.5 0 0015 0v-8.569a7.5 7.5 0 00-7.5-7.5z"
          />
          <path
            d="M491.126 332.545l-58.757-23.503c-.318-.127-.612-.289-.91-.445 40.583-9.234 59.803-24.676 60.656-25.375a7.5 7.5 0 002.671-6.862c-.085-.594-8.494-60.135-8.494-118.904 0-56.11-45.649-101.759-101.759-101.759s-101.758 45.648-101.758 101.759c0 15.374-.698 34.178-1.834 51.979l-16.373 8.187-48.06-24.029c-.138-.069-.283-.119-.424-.179a84.013 84.013 0 004.33-20.98c10.053-3.106 17.378-12.487 17.378-23.547 0-7.449-3.328-14.131-8.569-18.653v-49.9c0-13.785-6.965-26.683-18.387-34.433-3.87-14.38-16.79-24.481-31.958-24.481h-68.552c-37.21 0-67.483 30.273-67.483 67.483v41.33c-5.241 4.521-8.569 11.204-8.569 18.653 0 11.06 7.325 20.441 17.378 23.547 1.894 25.179 14.87 47.302 34.036 61.54v20.73L23.664 273.31C9.51 277.557 0 290.338 0 305.116v83.701a7.5 7.5 0 007.5 7.5h1.069v86.759a7.5 7.5 0 0015 0v-86.759h27.845v86.759a7.5 7.5 0 0015 0v-129.32a33.104 33.104 0 00-5.577-18.42l-12.82-19.23a7.5 7.5 0 00-12.48 8.32l12.82 19.231c2 3 3.058 6.492 3.058 10.099v27.561H15v-76.201c0-8.103 5.214-15.11 12.976-17.439l25.747-7.724c8.966 37.542 43.017 64.95 82.312 64.95 14.117 0 27.827-3.481 40.104-10.105 4.487 6.121 11.724 10.105 19.878 10.105h1.069v1.069c0 25.143 13.832 47.103 34.276 58.712v12.233c0 .46-.294.868-.731 1.014l-27.977 9.326a33.165 33.165 0 00-22.706 31.503v24.316a7.5 7.5 0 0015 0V458.76a18.182 18.182 0 0112.449-17.272l8.227-2.743c10.884 16.232 29.189 26.125 48.944 26.125a58.897 58.897 0 0048.946-26.124l8.225 2.742a18.183 18.183 0 0112.449 17.272v24.316a7.5 7.5 0 0015 0V458.76a33.163 33.163 0 00-22.706-31.502l-27.977-9.326a1.068 1.068 0 01-.731-1.014v-12.233c15.307-8.692 26.893-23.188 31.753-40.481 14.173 14.83 33.968 23.546 55.005 23.546 33.212 0 62.353-21.469 72.391-52.728l28.629 11.451c6.953 2.781 11.445 9.417 11.445 16.904v35.079h-27.845v-9.638a7.5 7.5 0 00-15 0v94.259a7.5 7.5 0 0015 0v-69.621h19.276v69.621a7.5 7.5 0 0015 0v-69.621h1.069a7.502 7.502 0 007.5-7.5v-42.579c.003-13.658-8.19-25.76-20.871-30.832zm-193.35-175.09c0-47.839 38.92-86.759 86.759-86.759s86.758 38.92 86.758 86.759c0 50.363 6.065 101.274 8.036 116.479-6.721 4.397-23.929 14.081-53.018 20.445v-11.935a83.976 83.976 0 0011.384-7.733c14.758-11.929 25.187-28.636 29.363-47.042a85.062 85.062 0 002.098-18.799c0-42.391-30.657-48.477-60.305-54.363-18.865-3.745-38.372-7.618-53.906-20.045a7.5 7.5 0 00-12.185 5.857c0 .199-.327 19.933-28.595 27a7.5 7.5 0 003.638 14.553c23.66-5.915 33.312-19.188 37.248-29.16 16.264 9.638 34.483 13.254 50.879 16.509 31.689 6.291 48.226 10.912 48.226 39.65 0 5.226-.581 10.434-1.726 15.48-3.435 15.134-12.016 28.876-24.165 38.696-12.5 10.104-27.622 15.444-43.73 15.444-14.684 0-28.659-4.504-40.519-13.015a84.746 84.746 0 00-20.533-31.649v-33.525a7.499 7.499 0 00-10.854-6.708l-16.193 8.096c.888-15.619 1.34-30.469 1.34-44.235zm10.707 54.98v27.143l-27.144-13.571 27.144-13.572zm-87.828 0l27.143 13.572-27.143 13.571v-27.143zm-40.707 82.123v7.123c-5.37 4.637-8.569 11.423-8.569 18.583-10.682 6.311-22.817 9.639-35.345 9.639-32.624 0-60.849-22.958-67.91-54.27l18.529-5.559c4.571 23.088 24.972 40.553 49.382 40.553 19.383 0 36.231-11.017 44.641-27.112a84.332 84.332 0 00-.728 11.043zM100.69 260.27v-17.373c10.762 4.97 22.734 7.747 35.345 7.747a84.118 84.118 0 0035.345-7.746v17.383c0 19.489-15.855 35.345-35.345 35.345-19.457 0-35.29-15.804-35.343-35.249l-.002-.107zm35.345-24.626c-38.39 0-69.621-31.231-69.621-69.62a7.5 7.5 0 00-7.5-7.5c-5.314 0-9.638-4.324-9.638-9.638s4.323-9.638 9.638-9.638h17.138a7.5 7.5 0 007.115-5.128l6.884-20.652c17.235-.389 70.664-2.812 100.751-17.856a7.5 7.5 0 003.354-10.062 7.499 7.499 0 00-10.062-3.354c-32.281 16.14-98.807 16.346-99.475 16.346a7.5 7.5 0 00-7.114 5.129l-6.859 20.578H58.914c-.358 0-.714.012-1.069.027V88.903c0-28.939 23.544-52.483 52.483-52.483h68.552c8.956 0 16.48 6.455 17.893 15.347a7.5 7.5 0 003.723 5.356c8.468 4.776 13.729 13.669 13.729 23.21v43.941c-.355-.016-.71-.027-1.069-.027h-8.569a7.5 7.5 0 000 15h8.569c5.314 0 9.638 4.323 9.638 9.638s-4.323 9.638-9.638 9.638a7.5 7.5 0 00-7.5 7.5c0 38.389-31.231 69.621-69.621 69.621zm50.344 24.639v-26.31a85.303 85.303 0 0019.276-19.928v19.781a84.739 84.739 0 00-19.329 28.543c.029-.693.053-1.387.053-2.086zm112.169 173.473c-8.257 10.087-20.661 16.113-33.979 16.113-13.302 0-25.714-6.03-33.974-16.114l4.78-1.593a16.048 16.048 0 0010.988-15.244v-5.978a67.26 67.26 0 0018.207 2.516 67.26 67.26 0 0018.207-2.516v5.978a16.044 16.044 0 0010.987 15.243l4.784 1.595zm26.005-103.853a7.5 7.5 0 00-7.5 7.5v8.569c-.001 28.939-23.545 52.483-52.484 52.483s-52.482-23.544-52.482-52.483v-8.569a7.5 7.5 0 00-7.5-7.5h-8.569c-5.314 0-9.638-4.323-9.638-9.638 0-3.42 1.81-6.515 4.841-8.279a7.455 7.455 0 001.776-1.457c18.54-.537 78.639-4.026 118.138-26.597a7.5 7.5 0 00-7.442-13.024c-34.602 19.772-88.974 23.731-108.744 24.522v-.872c0-13.949 4.224-27.458 11.878-38.847a7.467 7.467 0 002.386 2.382 7.501 7.501 0 007.297.328l48.06-24.03 48.06 24.03a7.502 7.502 0 007.297-.328 7.484 7.484 0 002.385-2.382c7.654 11.389 11.878 24.898 11.878 38.847v10.946a7.498 7.498 0 003.728 6.482c3.032 1.765 4.842 4.859 4.842 8.279 0 5.314-4.324 9.638-9.638 9.638h-8.569zm59.982 42.845c-20.764 0-40.028-10.571-51.242-27.849 13.506-.093 24.466-11.106 24.466-24.633 0-7.16-3.199-13.947-8.569-18.584v-7.123c0-3.019-.163-6.021-.482-8.995 11.121 5.214 23.263 7.925 35.827 7.925 9.145 0 18.189-1.515 26.776-4.379v10.983c0 10.133 6.079 19.113 15.487 22.876l16.173 6.469c-7.751 25.628-31.421 43.31-58.436 43.31z"
          />
          <path
            d="M286.432 357.285a7.499 7.499 0 00-10.549 1.101c-3.031 3.736-7.048 5.793-11.313 5.793-4.265 0-8.283-2.057-11.313-5.793a7.5 7.5 0 00-11.65 9.448c5.848 7.209 14.217 11.345 22.963 11.345s17.115-4.135 22.963-11.344a7.503 7.503 0 00-1.101-10.55z"
          />
          <circle cx="239" cy="328.868" r="7.5" />
          <circle cx="290" cy="328.868" r="7.5" />
        </symbol>
        <symbol
          viewBox="0 0 76.82 54.06"
          id="fish"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g data-name="Layer 2">
            <g data-name="Capa 1">
              <path
                d="M15.35 18.48A2.5 2.5 0 1017.86 21a2.51 2.51 0 00-2.51-2.52z"
              />
              <path
                d="M73.59 34.64a10 10 0 00-1.42-5.85c1.11-1.41 1.51-3.54 1.51-6L76 11.07c0-4.23 2.71-7.67-1.53-7.67h-3.6a7.67 7.67 0 00-7.67 7.67L59.62 18a31.6 31.6 0 00-8-5.44.43.43 0 010-.11c-4.28-.15-2.5-1.47.19-1.42 1-6.61 3.33-12-4.27-10.82-6.56 1-18.22 4-24.36 8.67C16 10.09 0 18.4 0 26.47c0 .66 9.14 13.24 21.79 15.86 5.08 5.79 19.07 9.5 26.51 10.67 8.42 1.29 4.69-5.45 4-13-4.06 1.38-2.23-.74.22-1.58 1.85-1 3.51-1.89 4.95-2.81l5.65 10.79a7.66 7.66 0 007.66 7.66h3.58c4.23 0 1.53-3.43 1.53-7.66zm-58.77-9.83A3.83 3.83 0 1118.65 21a3.83 3.83 0 01-3.83 3.81z"
              />
            </g>
          </g>
        </symbol>
        <symbol
          viewBox="0 0 83.01 94.94"
          id="giraffe"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g data-name="Layer 2">
            <path
              d="M82.79 55.19l-.2-.58Q81 50.56 78.93 49.4a12 12 0 00-4.64-1.54 20.58 20.58 0 01-2.29-.39 2 2 0 00-.58-.38Q68.7 45 59 42t-13.84-6.88A181.66 181.66 0 0115.05 0L2.51 10l-.68.49a8 8 0 00-1 .77 3.08 3.08 0 00-.58 1A4.22 4.22 0 000 13.89c0 1.16.9 1.48 2.7 1l7.14-2.32 19.88 27.6v18.49a6.26 6.26 0 00.67 2.61 5.68 5.68 0 002.22 2.41l-7.52 31.26h5l4.63-14.86 4.83-7.33v22.19h5.79v-24.7a6.86 6.86 0 01.19-1.45A5.53 5.53 0 0147 66.58a4.49 4.49 0 013.47-1.35 4.36 4.36 0 013.38 1.25 4.9 4.9 0 011.35 2.41l.19 1.35v24.7h3.86V75.07l11 19.87h5A30.49 30.49 0 0071.59 88a13.49 13.49 0 01-2.51-7.72v-5q0-2.7 3-7.62t3-7.43v-5a13.34 13.34 0 00-.39-3.28 12.91 12.91 0 012.32.77c.64.39 1.28 1.55 1.93 3.48l.19.57a1.83 1.83 0 002.6 1.07c1.27-.49 1.57-1.36 1.06-2.65z"
              data-name="Capa 1"
            />
          </g>
        </symbol>
        <symbol
          viewBox="0 0 76 46"
          id="gulp"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M20.228 23.767c-.055.077-.148.325-.287.743-.14.418-.31.937-.503 1.564-.202.628-.41 1.332-.643 2.107l-.713 2.377c-.247.806-.48 1.603-.704 2.378-.225.774-.426 1.479-.604 2.106-.178.627-.326 1.154-.45 1.58-.116.426-.193.674-.216.751a5.466 5.466 0 01-.836 1.704 3.252 3.252 0 01-.659.681c-.24.178-.48.271-.736.271-.425 0-.735-.14-.921-.426-.194-.286-.287-.797-.287-1.556v-.333c0-.116.008-.225.024-.356.015-.248.116-.72.294-1.41.186-.69.41-1.471.666-2.339.255-.867.534-1.773.836-2.702.295-.937.566-1.766.806-2.51a40.26 40.26 0 01-2.285 2.34 24.898 24.898 0 01-2.524 2.09 15.01 15.01 0 01-2.602 1.518c-.876.395-1.72.589-2.525.589-.93 0-1.727-.202-2.393-.612a5.281 5.281 0 01-1.657-1.603 7.407 7.407 0 01-.976-2.238A9.361 9.361 0 010 28.003v-.31c0-.093.008-.186.023-.279.078-1.502.295-3.051.643-4.639a38.07 38.07 0 011.378-4.731 44.68 44.68 0 011.975-4.6A40.994 40.994 0 016.466 9.2a33.662 33.662 0 012.811-3.686 22.587 22.587 0 013.06-2.896c1.045-.806 2.098-1.44 3.167-1.898C16.572.263 17.626.04 18.67.04c1.208 0 2.37.333 3.5.991 1.123.658 2.176 1.727 3.16 3.198.225.333.364.666.426 1 .062.34.093.658.093.952 0 .705-.17 1.262-.504 1.673-.34.41-.735.611-1.2.611-.426 0-.82-.224-1.185-.673-.364-.45-.774-1.085-1.223-1.921-.426-.751-.89-1.301-1.402-1.634a2.916 2.916 0 00-1.657-.503c-.93 0-1.92.387-2.974 1.154-1.053.766-2.099 1.78-3.129 3.05-1.03 1.263-2.02 2.703-2.973 4.33a46.991 46.991 0 00-2.517 4.987 35.308 35.308 0 00-1.735 5.034c-.433 1.657-.643 3.144-.643 4.46 0 .442.031.89.093 1.355.062.465.17.883.341 1.263.163.38.387.689.674.929.286.248.643.364 1.084.364.488 0 1.045-.163 1.665-.496.62-.333 1.27-.759 1.936-1.293a24.85 24.85 0 002.013-1.812 35.363 35.363 0 001.89-2.045c.58-.689 1.1-1.355 1.549-1.99.449-.635.79-1.185 1.014-1.657l1.851-5.53c.225-.596.519-1.022.883-1.27.364-.247.736-.379 1.123-.379.186 0 .372.031.557.093.186.062.349.163.496.294.147.132.263.31.349.52.085.208.131.456.131.743 0 .75-.07 1.456-.201 2.122a17.604 17.604 0 01-.503 1.928c-.21.627-.434 1.262-.682 1.897a29.442 29.442 0 00-.743 1.983zm25.052 4.607a18.41 18.41 0 01-2.037 2.293 20.89 20.89 0 01-2.393 1.99c-.82.58-1.626 1.045-2.424 1.402-.797.356-1.51.526-2.145.526s-1.154-.209-1.549-.635c-.395-.426-.596-1.146-.596-2.168 0-.72.108-1.564.318-2.517a12.45 12.45 0 01-1.294 1.859c-.519.627-1.107 1.2-1.765 1.719a8.94 8.94 0 01-2.223 1.262c-.82.318-1.72.48-2.68.48-.433 0-.859-.054-1.262-.162a2.56 2.56 0 01-1.06-.566c-.303-.263-.55-.62-.736-1.068-.186-.45-.28-1.007-.28-1.68 0-.016.024-.256.078-.721.055-.465.225-1.193.504-2.192.286-.999.728-2.284 1.324-3.872.596-1.587 1.44-3.508 2.525-5.761.278-.597.596-1.023.96-1.286a2.025 2.025 0 011.185-.387c.185 0 .38.03.573.085.201.054.387.14.557.256.17.116.31.263.418.449.109.178.163.387.163.627a1.7 1.7 0 01-.062.45c-.07.27-.209.619-.426 1.045-.217.433-.472.929-.766 1.479-.295.557-.597 1.154-.922 1.796a26.093 26.093 0 00-.906 1.998c-.279.69-.519 1.394-.713 2.107a9.2 9.2 0 00-.34 2.083c0 .287.07.542.201.774.132.233.349.357.658.357.86 0 1.68-.287 2.463-.844.782-.566 1.502-1.27 2.168-2.107a20.469 20.469 0 001.797-2.703 36.06 36.06 0 001.34-2.648c.247-.534.472-1.107.666-1.72.193-.611.402-1.176.627-1.695.225-.52.48-.953.774-1.293.295-.349.659-.52 1.092-.52.48 0 .852.179 1.13.543.28.364.42.79.42 1.293 0 .287-.094.674-.272 1.162-.178.495-.403 1.06-.674 1.696-.27.635-.565 1.316-.883 2.036-.317.72-.611 1.456-.882 2.2a21.38 21.38 0 00-.674 2.191 8.269 8.269 0 00-.271 1.99c0 .566.294.845.875.845.41 0 .921-.14 1.526-.426.611-.287 1.246-.682 1.92-1.185a18.222 18.222 0 002.006-1.797 14.583 14.583 0 001.78-2.238l.187 3.198z"
          />
          <path
            d="M45.892 27.197c-.148.364-.287.782-.426 1.263-.14.48-.21.906-.21 1.285 0 .232.04.426.117.565.077.14.232.21.457.21.278 0 .627-.101 1.045-.295.418-.193.867-.457 1.348-.774.48-.318.983-.69 1.51-1.108a40.486 40.486 0 001.556-1.293c.52-.449 1.007-.89 1.48-1.34.472-.449.89-.86 1.262-1.239a.917.917 0 01.38-.232c.146-.046.27-.07.379-.07.263 0 .48.109.658.333.17.217.255.511.255.868 0 .333-.093.697-.278 1.107-.186.41-.512.805-.976 1.2a55.354 55.354 0 01-2.563 2.633 26.86 26.86 0 01-2.572 2.2 13.825 13.825 0 01-2.54 1.518c-.844.38-1.657.565-2.454.565-.543 0-1-.085-1.363-.256a2.263 2.263 0 01-.876-.704 2.875 2.875 0 01-.464-1.061 5.808 5.808 0 01-.14-1.294c0-.766.093-1.556.287-2.362.194-.805.418-1.548.681-2.222.465-1.224.937-2.44 1.41-3.648.48-1.208.914-2.315 1.309-3.314L51.18 4.554c.24-.612.557-1.046.96-1.294.403-.248.813-.38 1.224-.38.41 0 .782.132 1.123.404.34.263.503.696.503 1.293 0 .279-.054.58-.17.89-.117.318-.256.65-.426 1.015a170.21 170.21 0 00-1.185 2.703c-.457 1.068-.945 2.23-1.472 3.484a356.278 356.278 0 00-1.61 3.919c-.55 1.355-1.085 2.68-1.611 3.965a332.638 332.638 0 00-1.472 3.663c-.425 1.138-.82 2.137-1.153 2.981z"
          />
          <path
            d="M74.041 22.938c.186-.124.357-.225.52-.31.154-.077.309-.116.456-.116.294 0 .511.132.658.387.148.256.217.573.217.953 0 .41-.085.82-.27 1.247-.179.426-.45.774-.806 1.06a207.598 207.598 0 00-3.795 3.439c-1.115 1.038-2.16 1.928-3.152 2.672-.983.743-1.951 1.324-2.888 1.727a7.441 7.441 0 01-3.02.611c-1.007 0-1.782-.216-2.331-.658-.55-.441-.821-1.045-.821-1.812v-.178c0-.054.007-.124.023-.201.054-.473.256-1.015.62-1.627.356-.611.79-1.246 1.293-1.905a49.29 49.29 0 011.61-1.998c.574-.673 1.092-1.316 1.58-1.92.48-.604.883-1.154 1.2-1.657.318-.504.48-.907.48-1.224a.56.56 0 00-.2-.45c-.132-.108-.349-.162-.659-.162-.526 0-1.076.14-1.642.41a7.914 7.914 0 00-1.672 1.108 15.5 15.5 0 00-1.611 1.588 22.452 22.452 0 00-1.471 1.858 25.766 25.766 0 00-1.255 1.944c-.38.65-.697 1.254-.96 1.797-.078.17-.194.418-.341.727-.147.318-.302.666-.48 1.061-.17.395-.356.798-.55 1.209a77.277 77.277 0 00-.953 2.168c-.123.286-.216.488-.27.596-.07.14-.179.41-.326.798-.155.395-.325.852-.526 1.378-.202.527-.41 1.077-.628 1.657-.216.581-.426 1.131-.62 1.65-.193.519-.363.976-.503 1.363-.147.395-.24.658-.278.798a8.54 8.54 0 01-.465 1.153 4.491 4.491 0 01-.62.953 2.81 2.81 0 01-.797.658 2.084 2.084 0 01-1.007.248c-.48 0-.867-.116-1.185-.34-.31-.225-.464-.667-.464-1.31 0-.317.038-.634.116-.967.077-.333.178-.659.294-.976.116-.325.24-.635.364-.937.124-.31.24-.597.349-.883a320.32 320.32 0 012.183-4.716 205.01 205.01 0 002.138-4.685 117.373 117.373 0 001.897-4.554 45.088 45.088 0 001.448-4.282c.109-.287.248-.682.434-1.2.186-.52.395-1.03.635-1.526.24-.504.503-.937.805-1.31.295-.37.62-.549.96-.549.527 0 .914.124 1.154.364.24.24.357.596.357 1.069 0 .093-.016.24-.04.449-.022.201-.061.418-.1.65a13.77 13.77 0 01-.131.65 3.08 3.08 0 01-.132.45 27.898 27.898 0 011.588-1.588 17.562 17.562 0 011.765-1.424 10.388 10.388 0 011.866-1.038 4.952 4.952 0 011.906-.403c.433 0 .867.062 1.3.186.434.124.814.31 1.154.55.341.24.612.55.821.921.21.372.318.798.318 1.286 0 .643-.163 1.332-.488 2.06a15.277 15.277 0 01-1.224 2.2 27.973 27.973 0 01-1.587 2.152c-.573.697-1.1 1.332-1.603 1.905-.496.573-.914 1.061-1.255 1.456-.34.403-.51.674-.526.813 0 .186.062.34.178.457.116.116.317.178.596.178.225 0 .558-.124.991-.38.434-.247 1.053-.689 1.836-1.308a83.43 83.43 0 002.997-2.494c1.277-1.022 2.772-2.338 4.545-3.926z"
          />
        </symbol>
        <symbol
          viewBox="0 0 510 510"
          id="heart"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M255 489.6l-35.7-35.7C86.7 336.6 0 257.55 0 160.65 0 81.6 61.2 20.4 140.25 20.4c43.35 0 86.7 20.4 114.75 53.55C283.05 40.8 326.4 20.4 369.75 20.4 448.8 20.4 510 81.6 510 160.65c0 96.9-86.7 175.95-219.3 293.25L255 489.6z"
          />
        </symbol>
        <symbol
          viewBox="0 0 65 65"
          id="information"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M32.5 0C14.58 0 0 14.579 0 32.5S14.58 65 32.5 65 65 50.421 65 32.5 50.42 0 32.5 0zm0 61C16.785 61 4 48.215 4 32.5S16.785 4 32.5 4 61 16.785 61 32.5 48.215 61 32.5 61z"
          />
          <circle cx="33.018" cy="19.541" r="3.345" />
          <path
            d="M32.137 28.342a2 2 0 00-2 2v17a2 2 0 004 0v-17a2 2 0 00-2-2z"
          />
        </symbol>
        <symbol
          viewBox="0 0 60 42"
          id="jeep"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M15 32a3 3 0 100 6 3 3 0 000-6zm0 4a1 1 0 110-2 1 1 0 010 2zm32-4a3 3 0 100 6 3 3 0 000-6zm0 4a1 1 0 110-2 1 1 0 010 2z"
          />
          <path
            d="M56 18h-8.382L41.447 5.658A2.983 2.983 0 0038.764 4H38V2a2 2 0 00-2-2H9a2 2 0 00-2 2v2a3 3 0 00-3 3v13H2a2 2 0 00-2 2v8a2 2 0 002 2h2v1a3 3 0 003 3h1.08a6.991 6.991 0 0013.84 0h18.16a6.991 6.991 0 0013.84 0H58a2 2 0 002-2V22a4 4 0 00-4-4zm-4.11 12a6.978 6.978 0 00-9.78 0H29V20h22v2a3 3 0 003 3h4v5zm-11.81 4H21.92a6.937 6.937 0 00-.605-2h19.37a6.937 6.937 0 00-.605 2zm-29.97-4H6V20h21v10h-7.11a6.978 6.978 0 00-9.78 0zM16 4V2h13v2zm13 8h1.438a1 1 0 01.971.758L32.719 18H29zm29 10v1h-4a1 1 0 01-1-1v-2h3a2 2 0 012 2zm-15.586-4l1.979-1.979.989 1.979zM39.658 6.553l3.792 7.583-1.158 1.158-1.784-1.388.2-.2a1 1 0 00-1.414-1.414l-2 2a1 1 0 001.414 1.414l.376-.376 1.784 1.388L39.586 18h-4.8l-1.432-5.728A3 3 0 0030.438 10H29V6h9.764a.994.994 0 01.894.553zM36 4h-5V2h5zM9 2h5v2H9zM7 6h20v12H6V7a1 1 0 011-1zM2 22h2v8H2zm4 11v-1h2.685a6.937 6.937 0 00-.605 2H7a1 1 0 01-1-1zm9 7a5 5 0 110-10 5 5 0 010 10zm32 0a5 5 0 110-10 5 5 0 010 10zm6.92-6a6.937 6.937 0 00-.605-2H58v2z"
          />
          <path d="M36 22h-4a1 1 0 000 2h4a1 1 0 000-2z" />
        </symbol>
        <symbol
          viewBox="0 0 134 38"
          id="jquery"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M38.281 14.744v-.002l-1.07 3.794 1.07-3.792zm5.505 8.236l-1.18-.008 1.18.007zm-.303 5.665h.001l-7.067.025 7.066-.025zm1.482-5.659l-1.18-.007 1.18.007zm-.863 5.177l1.231-4.695-1.23 4.696zm26.019-21.62l-2.293 10.78 2.293-10.78zm-5.895 0l-1.74 8.053 1.74-8.054v.001z"
          />
          <path
            d="M69.728 6.058h-4.903a.645.645 0 00-.6.484l-1.741 8.054-1.741 8.054a.643.643 0 01-.6.484h-3.47c-3.434 0-3.037-2.375-2.334-5.63l.021-.097.077-.41.015-.078.156-.835.168-.895c.052-.27.13-.664.18-.912l.791-3.866.792-3.867a.39.39 0 00-.396-.486H51.11a.64.64 0 00-.597.485l-1.082 5.134-1.082 5.134-.002.008-.1.477C47 22.987 47.33 28.414 54.104 28.584l.197.004h10.634a.641.641 0 00.598-.485l2.293-10.78 2.294-10.78a.386.386 0 00-.393-.485zM89.29 23.19c.273 0 .451.218.396.485l-.476 2.327m-.475 2.328l.476-2.328-.477 2.33v-.001zm-.597.49h.002a1290.993 1290.993 0 01-.003 0zm-11.962-8.628c-.004-.255.286-.693.558-.693l-.612-.01c-.276 2.775.054.703.054.703zm3.372 8.671h-.095.095z"
          />
          <path
            d="M89.29 23.19c.273 0 .451.218.396.485l-.476 2.327-.077.38m-7.263 2.476h-.02.02zm-1.205.003h-.07.07zm-.367.001l-.115.001h.115zm-.373.001h-.102.102zm.67-.002l-.297.001h.297zm1.255-.003l-1.183.004 1.183-.004zm6.29-.038h.001zm.595-.489l.399-1.95-.4 1.952v-.002zm-8.552.532h-.259.26zm-.731.001h-.35.35zm.37-.001h-.276.276zM8.093 20.25l.762-3.376-.871 3.86-.836 3.932.733-3.447c.056-.267.152-.702.212-.968zM17.21 6.001h-5.385a.652.652 0 00-.605.483l-.51 2.254-.512 2.254c-.06.265.114.483.386.483h5.427a.645.645 0 00.601-.484l.494-2.253.493-2.253c.058-.266-.117-.484-.389-.484zm-1.172 7.498v-.001l-1.58 7.307 1.58-7.306zM.394 37.71a441.046 441.046 0 00-.002-.001h.002zm9.222-24.212l-.762 3.376.762-3.376z"
          />
          <path
            d="M15.648 13.015h-5.427a.65.65 0 00-.604.483l-.763 3.376-.762 3.377c-.06.266-.156.702-.212.968l-.732 3.447-.733 3.446c-.056.266-.173.696-.26.954 0 0-1.015 3.017-2.72 2.983l-.212-.004-1.475-.028h-.001a.646.646 0 00-.609.473l-.563 2.366-.562 2.365c-.063.264.108.483.378.487.967.012 3.132.036 4.443.036 4.258 0 6.502-2.359 7.941-9.148l1.684-7.79 1.58-7.308a.384.384 0 00-.391-.483zm77.101 15.573a.385.385 0 01-.392-.485L96.44 8.978m1.983 19.124l1.651-8.163-1.65 8.163z"
          />
          <path
            d="M92.417 28.345c-.033-.133-.014-.46.044-.726l1.937-9.078-2.041 9.562a.385.385 0 00.391.485h.496c-.272 0-.795-.11-.827-.243zm5.683.134c-.147.06-.492.109-.765.109h.496c.272 0 .54-.219.594-.486l.098-.485c-.054.267-.274.802-.422.862zm1.15-4.459l.73-3.602-.002.007-.728 3.596zm16.11-13.76l.225.929c.062.266-.11.481-.381.482M98.522 27.617l.727-3.596-.727 3.596zm16.615-18.31l.222.952-.222-.952zM99.978 20.418c.055-.266.144-.698.2-.962l.78-3.647-.883 4.13-.097.48zM96.507 8.665l-.17.798L94.4 18.54l2.041-9.563.066-.313z"
          />
          <path
            d="M115.584 11.189l-.225-.93-.223-.952-.112-.481c-.441-1.713-1.735-2.702-4.545-2.702l-4.375-.004-4.029-.005h-4.534a.639.639 0 00-.597.484l-.2.947-.237 1.119-.066.313-2.042 9.563-1.937 9.078c-.058.266-.078.593-.044.726.032.134.555.243.827.243h4.09c.273 0 .617-.05.765-.11.149-.06.368-.594.422-.86l.727-3.597.728-3.596.001-.007.097-.478.882-4.131.78-3.65a.642.642 0 01.597-.482l12.869-.006c.271 0 .443-.217.381-.482z"
          />
          <path
            d="M132.15 2.786c-.272.002-.717.004-.99.004h-4.119c-.272 0-.621.184-.775.408l-9.108 13.344c-.154.226-.33.192-.39-.073l-.67-2.94a.652.652 0 00-.605-.483h-5.856c-.272 0-.434.214-.36.476l2.625 9.192c.074.262.08.692.012.955l-1.143 4.449c-.068.264.1.48.372.48h5.787c.272 0 .55-.216.618-.48l1.144-4.449c.068-.263.257-.658.421-.875L133.9 3.168c.164-.217.075-.394-.197-.392l-1.552.01zM85.63 14.298v-.006a.597.597 0 01-.578.512h-7.424c-.256 0-.387-.174-.35-.39.003-.006.004-.011.008-.017l-.005.003.004-.025.034-.127c.709-1.885 2.153-3.122 4.868-3.122 3.055 0 3.652 1.493 3.444 3.171zm-2.177-8.57c-9.529 0-11.787 5.785-13.054 11.622-1.267 5.95-1.157 11.514 8.703 11.514h1.08c.039-.002.077-.002.116-.002h.367c.39 0 .786-.003 1.183-.004h.02c2.604-.01 5.216-.03 6.273-.038a.642.642 0 00.591-.487l.4-1.951.077-.38.476-2.327a.389.389 0 00-.396-.485h-8.864c-3.526 0-4.573-.937-4.187-3.691h14.17v.001l.009-.001a.585.585 0 00.55-.49l-.001.002c2.104-7.937 1.5-13.282-7.514-13.282h.001zm-45.038 8.539l-.134.475v.002l-1.07 3.792-1.07 3.791a.694.694 0 01-.63.476h-5.663c-4.296 0-5.342-3.36-4.296-8.316 1.045-5.069 3.096-8.22 7.324-8.539 5.778-.436 6.934 3.628 5.54 8.32zm3.884 8.245s2.67-6.484 3.277-10.229C46.406 7.27 43.896 0 34.2 0c-9.64 0-13.826 6.941-15.423 14.487-1.597 7.6.496 14.266 10.08 14.211l7.562-.028 7.067-.026a.683.683 0 00.62-.48l1.23-4.696c.07-.264-.097-.48-.37-.482l-1.18-.007-1.179-.007c-.231-.002-.364-.151-.336-.35a.456.456 0 01.029-.11h-.002z"
          />
          <path d="M90.018 18.172a.325.325 0 11-.65 0 .325.325 0 01.65 0z" />
        </symbol>
        <symbol
          viewBox="0 0 512 512"
          id="lock"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M230.792 354.313l-6.729 60.51a10.67 10.67 0 0010.604 11.844h42.667a10.67 10.67 0 0010.604-11.844l-6.729-60.51c10.927-7.948 17.458-20.521 17.458-34.313 0-23.531-19.135-42.667-42.667-42.667S213.333 296.469 213.333 320c0 13.792 6.532 26.365 17.459 34.313zM256 298.667c11.76 0 21.333 9.573 21.333 21.333 0 8.177-4.646 15.5-12.125 19.125a10.673 10.673 0 00-5.958 10.781l6.167 55.427h-18.833l6.167-55.427c.5-4.49-1.885-8.802-5.958-10.781-7.479-3.625-12.125-10.948-12.125-19.125-.001-11.76 9.572-21.333 21.332-21.333z"
          />
          <path
            d="M437.333 192h-32v-42.667C405.333 66.99 338.344 0 256 0S106.667 66.99 106.667 149.333V192h-32A10.66 10.66 0 0064 202.667v266.667C64 492.865 83.135 512 106.667 512h298.667C428.865 512 448 492.865 448 469.333V202.667A10.66 10.66 0 00437.333 192zM128 149.333c0-70.583 57.417-128 128-128s128 57.417 128 128V192h-21.333v-42.667c0-58.813-47.854-106.667-106.667-106.667S149.333 90.521 149.333 149.333V192H128v-42.667zm213.333 0V192H170.667v-42.667C170.667 102.281 208.948 64 256 64s85.333 38.281 85.333 85.333zm85.334 320c0 11.76-9.573 21.333-21.333 21.333H106.667c-11.76 0-21.333-9.573-21.333-21.333v-256h341.333v256z"
          />
        </symbol>
        <symbol
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="bgfeather bgfeather-mail"
          viewBox="0 0 24 24"
          id="mail"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
          />
          <path d="M22 6l-10 7L2 6" />
        </symbol>
        <symbol
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="bhfeather bhfeather-map-pin"
          viewBox="0 0 24 24"
          id="map-pin"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
          <circle cx="12" cy="10" r="3" />
        </symbol>
        <symbol
          viewBox="0 0 151 44"
          id="node"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M132.681 43.725c-.376 0-.749-.099-1.078-.289l-3.432-2.031c-.512-.287-.262-.388-.093-.447.683-.239.822-.293 1.551-.707.077-.044.177-.029.256.018l2.636 1.564c.096.052.23.052.319 0l10.28-5.933a.324.324 0 00.156-.278V23.76a.33.33 0 00-.159-.283l-10.275-5.929a.316.316 0 00-.317 0l-10.273 5.929a.328.328 0 00-.163.28V35.62c0 .113.062.221.16.275l2.815 1.627c1.528.764 2.462-.137 2.462-1.042V24.77c0-.167.131-.296.299-.296h1.302c.162 0 .296.129.296.296v11.713c0 2.038-1.112 3.208-3.044 3.208-.595 0-1.063 0-2.37-.643l-2.697-1.554a2.174 2.174 0 01-1.078-1.876V23.757a2.16 2.16 0 011.078-1.873l10.29-5.936a2.254 2.254 0 012.161 0l10.277 5.939a2.169 2.169 0 011.078 1.873v11.862c0 .77-.414 1.487-1.078 1.873l-10.277 5.936a2.16 2.16 0 01-1.083.288"
          />
          <path
            d="M135.856 35.551c-4.497 0-5.44-2.065-5.44-3.796 0-.165.132-.296.297-.296h1.328c.147 0 .27.106.293.251.2 1.353.798 2.036 3.518 2.036 2.166 0 3.087-.49 3.087-1.639 0-.66-.262-1.152-3.628-1.482-2.815-.278-4.554-.898-4.554-3.15 0-2.073 1.75-3.308 4.68-3.308 3.291 0 4.923 1.142 5.129 3.597a.3.3 0 01-.299.324h-1.335a.295.295 0 01-.289-.231c-.321-1.423-1.098-1.879-3.21-1.879-2.365 0-2.64.824-2.64 1.441 0 .749.323.968 3.514 1.39 3.16.42 4.66 1.01 4.66 3.231 0 2.24-1.868 3.523-5.126 3.523m12.521-12.58h.345c.283 0 .337-.198.337-.314 0-.303-.208-.303-.324-.303h-.355l-.003.617zm-.42-.972h.765c.262 0 .777 0 .777.586 0 .41-.263.494-.42.546.307.02.327.221.368.504.021.178.055.484.116.587h-.47c-.013-.103-.086-.67-.086-.7-.03-.126-.074-.188-.231-.188h-.389v.89h-.43v-2.225zm-.918 1.106c0 .921.744 1.667 1.657 1.667.921 0 1.665-.761 1.665-1.667 0-.924-.754-1.657-1.667-1.657-.901 0-1.658.723-1.658 1.654m3.644.008a1.987 1.987 0 01-1.981 1.981 1.986 1.986 0 01-1.982-1.98 1.98 1.98 0 113.96 0M24.428 23.3c0-.474-.25-.909-.658-1.144l-10.9-6.271a1.273 1.273 0 00-.599-.172h-.113a1.295 1.295 0 00-.602.172L.66 22.155a1.327 1.327 0 00-.659 1.146l.024 16.89c0 .234.12.452.327.568a.62.62 0 00.653 0l6.48-3.71c.408-.244.658-.674.658-1.143v-7.89c0-.471.25-.906.657-1.14l2.759-1.589a1.309 1.309 0 011.313 0l2.757 1.588c.408.234.659.67.659 1.14v7.89c0 .468.253.9.66 1.142l6.475 3.708a.644.644 0 00.659 0 .66.66 0 00.326-.568l.021-16.888zm51.428 8.793a.327.327 0 01-.165.285l-3.743 2.158a.33.33 0 01-.329 0l-3.743-2.158a.326.326 0 01-.165-.285v-4.322c0-.117.062-.226.162-.285l3.741-2.162a.332.332 0 01.332 0l3.744 2.162a.328.328 0 01.165.285l.001 4.322zM76.867.083a.66.66 0 00-.98.576v16.725a.46.46 0 01-.69.399l-2.73-1.572a1.314 1.314 0 00-1.315 0L60.25 22.503a1.314 1.314 0 00-.66 1.137v12.587c0 .471.252.904.66 1.14l10.902 6.297c.407.234.908.234 1.317 0l10.902-6.3a1.32 1.32 0 00.658-1.14V4.855c0-.478-.26-.917-.676-1.15L76.867.083zm36.305 27.575c.405-.235.654-.67.654-1.138v-3.05c0-.47-.25-.903-.655-1.14l-10.833-6.288a1.316 1.316 0 00-1.32 0l-10.9 6.291c-.409.237-.658.67-.658 1.14v12.583c0 .473.254.91.664 1.145l10.83 6.172c.399.23.887.232 1.291.008l6.552-3.64a.659.659 0 00.005-1.146l-10.967-6.294a.653.653 0 01-.332-.568v-3.947c0-.236.124-.453.33-.57l3.412-1.969a.65.65 0 01.656 0l3.414 1.968c.203.116.33.335.33.57v3.102c0 .234.126.453.329.571a.662.662 0 00.659-.002l6.539-3.798z"
          />
          <path
            d="M101.519 27.069a.25.25 0 01.252 0l2.092 1.207a.253.253 0 01.126.219v2.416c0 .09-.048.173-.126.218l-2.092 1.207a.25.25 0 01-.252 0l-2.091-1.207a.252.252 0 01-.129-.218v-2.416a.25.25 0 01.126-.22l2.094-1.206zM41.295 16.148a1.3 1.3 0 011.313 0l10.896 6.286c.407.236.657.67.657 1.14v12.583c0 .47-.25.904-.657 1.14l-10.896 6.285a1.3 1.3 0 01-1.313 0l-10.89-6.285a1.312 1.312 0 01-.67-1.14V23.573c0-.469.242-.903.657-1.14l10.903-6.285z"
          />
        </symbol>
        <symbol
          viewBox="0 0 480 480"
          id="partnership"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M440 256h-.208A39.583 39.583 0 00448 232v-16c0-22.091-17.909-40-40-40s-40 17.909-40 40v16a39.618 39.618 0 008.248 24.056 40.063 40.063 0 00-32.704 18.24l-21.808 38.352-16.48-35.792a7.466 7.466 0 00-.488-.896 41.334 41.334 0 00-33.072-19.84A39.593 39.593 0 00280 232v-16c0-22.091-17.909-40-40-40s-40 17.909-40 40v16a39.618 39.618 0 008.248 24.056 39.856 39.856 0 00-32.408 17.76c-.24.361-.452.741-.632 1.136l-17 37.6-22.048-38.736a39.856 39.856 0 00-32.408-17.76A39.618 39.618 0 00112 232v-16c0-22.091-17.909-40-40-40s-40 17.909-40 40v16a39.583 39.583 0 008.208 24H40c-22.08.026-39.974 17.92-40 40v64a8 8 0 008 8h24v104a8 8 0 008 8h64a8 8 0 008-8V323.888l25.216 40.352A8 8 0 00144 368h32a8.001 8.001 0 006.912-4c.048-.08.064-.176.112-.264.048-.088.096-.112.136-.184L200 329.888V472a8 8 0 008 8h64a8 8 0 008-8V329.888l16.8 33.688c.04.08.104.136.144.208.04.072.056.16.104.24.18.279.377.547.592.8.178.259.37.507.576.744.298.292.619.56.96.8.555.507 1.22.877 1.944 1.08.226.11.459.206.696.288A8.002 8.002 0 00304 368h32a8 8 0 006.784-3.76L368 323.888V472a8 8 0 008 8h64a8 8 0 008-8V368h24a8 8 0 008-8v-64c-.026-22.08-17.92-39.974-40-40zm-56-40c0-13.255 10.745-24 24-24s24 10.745 24 24v16c0 13.255-10.745 24-24 24s-24-10.745-24-24v-16zm-168 0c0-13.255 10.745-24 24-24s24 10.745 24 24v16c0 13.255-10.745 24-24 24s-24-10.745-24-24v-16zm-168 0c0-13.255 10.745-24 24-24s24 10.745 24 24v16c0 13.255-10.745 24-24 24s-24-10.745-24-24v-16zm48 248H80v-80H64v80H48v-96h48v96zm52.432-112l-37.648-60.24A8 8 0 0096 296v56H48v-56H32v56H16v-56c0-13.255 10.745-24 24-24h24v64h16v-64h21.88c.456 0 .92 0 1.376.04h1.248a23.699 23.699 0 0118.04 10.144L162.248 352h-13.816zM264 464h-16v-80h-16v80h-16v-96h48v96zm40-121.888l-24.8-49.688A8 8 0 00264 296v56h-48v-56a8.001 8.001 0 00-7.992-8.008 7.998 7.998 0 00-7.167 4.432L176 342.112l-7.144-14.28 20.64-45.648A24.003 24.003 0 01209.128 272H232v64h16v-64h21.88a24.985 24.985 0 0121.072 12.04l20.176 43.816L304 342.112zM432 464h-16v-80h-16v80h-16v-96h48v96zm32-112h-16v-56h-16v56h-48v-56a8 8 0 00-14.784-4.24L331.568 352h-13.816l39.408-69.312a23.928 23.928 0 0118.336-10.632h1.248c.456 0 .92-.04 1.376-.04H400v64h16V272h24c13.255 0 24 10.745 24 24v56zM240 0C107.514.15.15 107.514 0 240v8h16v-8a222.713 222.713 0 0121.656-96h73.264c-2.568 10.152-4.8 20.392-6.4 30.768l15.808 2.464A321.393 321.393 0 01127.432 144H232v16h16v-16h104.952a321.347 321.347 0 017.144 33.224l15.808-2.448c-1.6-10.4-3.88-20.616-6.4-30.776h72.88A222.71 222.71 0 01464 240v8h16v-8C479.85 107.514 372.486.15 240 0zm-76 29.288c-6.152 8.656-11.944 17.544-17.272 26.712h-34.264A223.394 223.394 0 01164 29.288zM115.32 128H46.136a225.462 225.462 0 0145.936-56h45.816a341.973 341.973 0 00-22.568 56zM232 128h-99.856a325.956 325.956 0 0124-56H232v56zm.032-72h-66.6a324.93 324.93 0 0120.424-29.424l3.776-4.8a223.156 223.156 0 0142.4-5.6V56zm135.504 0h-33.88a334.15 334.15 0 00-17.168-26.536A223.691 223.691 0 01367.536 56zM248 16.2a223.386 223.386 0 0142.832 5.688l3.688 4.688A323.447 323.447 0 01314.952 56H248V16.2zm0 111.8V72h76.232a325.386 325.386 0 0124 56H248zm117.064 0a342.614 342.614 0 00-22.568-56h45.432a225.462 225.462 0 0145.936 56h-68.8zM144 216h-16v16h16v-16zm32 0h-16v16h16v-16zm144 0h-16v16h16v-16zm32 0h-16v16h16v-16z"
            fill-rule="evenodd"
            clip-rule="evenodd"
          />
        </symbol>
        <symbol
          viewBox="0 -32 512 512"
          id="pawprint"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M342.383 239.352c-23.04-35.942-62.278-57.403-104.965-57.403-42.684 0-81.926 21.461-104.961 57.403l-55.516 86.605c-9.21 14.371-13.46 30.969-12.293 47.996 1.168 17.031 7.649 32.89 18.739 45.871 11.097 12.977 25.761 21.844 42.406 25.649 16.644 3.8 33.707 2.18 49.34-4.692l1.02-.453c39.34-16.957 84.304-16.805 123.546.453 10.121 4.45 20.844 6.7 31.664 6.7 5.883 0 11.801-.668 17.664-2.004 16.645-3.801 31.309-12.668 42.41-25.645 11.094-12.977 17.579-28.84 18.75-45.871 1.172-17.035-3.078-33.633-12.289-48.008zm26.246 160.972c-14.121 16.508-36.965 21.727-56.848 12.985-23.633-10.395-49-15.59-74.375-15.59-25.351 0-50.715 5.191-74.332 15.574l-.672.297c-19.73 8.344-42.238 3.058-56.203-13.266-14.105-16.512-15.71-39.887-3.992-58.172l55.52-86.605c17.492-27.29 47.28-43.582 79.691-43.582 32.41 0 62.203 16.293 79.7 43.582l55.51 86.601c11.724 18.293 10.114 41.672-4 58.176zM91.895 239.238c16.515-6.343 29.062-19.652 35.332-37.476 5.96-16.961 5.472-36.11-1.383-53.922-6.86-17.8-19.336-32.332-35.13-40.922-16.597-9.02-34.827-10.488-51.316-4.133-33.171 12.754-48.394 53.746-33.93 91.399 11.555 29.968 38.505 48.886 65.75 48.886a57.316 57.316 0 0020.677-3.832zm-58.418-55.836c-8.524-22.187-1.036-45.789 16.703-52.609a27.844 27.844 0 0110.047-1.848c5.336 0 10.847 1.457 16.152 4.344 9.539 5.184 17.16 14.184 21.457 25.336 4.293 11.16 4.676 22.941 1.074 33.18-3.3 9.382-9.617 16.28-17.781 19.418l-.016.007c-17.715 6.829-39.086-5.66-47.636-27.828zm166.136-12.015c41.469 0 75.207-38.438 75.207-85.684C274.82 38.445 241.082 0 199.613 0c-41.465 0-75.199 38.445-75.199 85.703 0 47.246 33.734 85.684 75.2 85.684zm0-141.375c24.918 0 45.196 24.984 45.196 55.691 0 30.695-20.278 55.672-45.196 55.672s-45.187-24.977-45.187-55.672c0-30.707 20.27-55.691 45.187-55.691zm129.883 162.426h.004a61.3 61.3 0 0019.367 3.128c30.242 0 59.715-22.011 70.961-55.84 6.477-19.472 6.05-40.062-1.2-57.972-7.585-18.746-21.644-32.356-39.589-38.324-17.945-5.961-37.363-3.477-54.664 7-16.527 10.011-29.191 26.246-35.656 45.718-13.653 41.079 4.64 84.274 40.777 96.29zM317.2 105.612c4.223-12.715 12.293-23.191 22.727-29.511 9.652-5.848 20.183-7.336 29.648-4.192 9.461 3.149 17 10.64 21.235 21.102 4.574 11.304 4.77 24.531.539 37.246-8.434 25.375-31.934 40.492-52.383 33.699-20.434-6.797-30.2-32.969-21.766-58.344zm170.675 76.826l-.012-.012c-28.597-21.125-71.367-11.969-95.347 20.422-23.957 32.406-20.211 75.972 8.343 97.113 10.414 7.715 22.72 11.402 35.313 11.402 21.95 0 44.785-11.203 60.047-31.804 23.957-32.407 20.215-75.973-8.344-97.122zm-15.777 79.265c-14.16 19.113-38.102 25.453-53.38 14.137-15.265-11.3-16.195-36.043-2.073-55.145 9.386-12.68 23.097-19.734 35.734-19.734 6.39 0 12.508 1.805 17.648 5.605 15.254 11.313 16.18 36.047 2.07 55.137zm0 0"
          />
        </symbol>
        <symbol
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="blfeather blfeather-phone-call"
          viewBox="0 0 24 24"
          id="phone-call"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M15.05 5A5 5 0 0119 8.95M15.05 1A9 9 0 0123 8.94m-1 7.98v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"
          />
        </symbol>
        <symbol
          viewBox="0 0 512 512"
          id="photo-camera"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M255.999 152.46c-72.513 0-131.508 58.995-131.508 131.509s58.995 131.508 131.508 131.508 131.508-58.994 131.508-131.508S328.514 152.46 255.999 152.46zm0 242.078c-60.968 0-110.57-49.601-110.57-110.57 0-60.969 49.601-110.571 110.57-110.571 60.969 0 110.57 49.602 110.57 110.571s-49.601 110.57-110.57 110.57z"
          />
          <path
            d="M255.999 201.914c-45.245 0-82.055 36.809-82.055 82.055 0 45.245 36.81 82.053 82.055 82.053s82.055-36.809 82.055-82.053-36.81-82.055-82.055-82.055zm0 144.272c-34.307 0-62.218-27.91-62.218-62.217s27.911-62.218 62.218-62.218 62.218 27.911 62.218 62.218c.001 34.307-27.91 62.217-62.218 62.217z"
          />
          <path
            d="M478.939 114.334H344.133l-13.768-37.5c-4.049-11.029-14.662-18.438-26.411-18.438h-95.908c-11.749 0-22.362 7.41-26.411 18.438l-13.769 37.499H122.06V99.637c0-11.849-9.639-21.49-21.49-21.49H68.85c-11.849 0-21.49 9.641-21.49 21.49v14.697H33.061C14.831 114.334 0 129.165 0 147.395v273.148c0 18.23 14.831 33.061 33.061 33.061h445.878c18.23 0 33.061-14.831 33.061-33.061V147.395c0-18.23-14.831-33.061-33.061-33.061zM202.324 84.431a6.116 6.116 0 015.721-3.994h95.908a6.116 6.116 0 015.721 3.994l10.979 29.903H191.345l10.979-29.903zM68.3 99.637c0-.303.247-.551.551-.551h31.72c.304 0 .551.248.551.551v14.697H68.3V99.637zm-46.259 98.096h32.643v172.47H22.041v-172.47zm467.917 222.81c.001 6.077-4.943 11.02-11.019 11.02H33.061c-6.077 0-11.02-4.944-11.02-11.02v-28.299h43.663c6.086 0 11.02-4.935 11.02-11.02V186.713c0-6.085-4.934-11.02-11.02-11.02H22.041v-28.299c0-6.077 4.944-11.02 11.02-11.02h303.296c.029 0 .056.003.084.003l.074-.003h142.424c6.077 0 11.02 4.944 11.02 11.02v28.299h-43.663c-6.087 0-11.02 4.935-11.02 11.02v194.511c0 6.085 4.934 11.02 11.02 11.02h43.663v28.299zm.001-50.34h-32.643v-172.47h32.643v172.47z"
          />
          <path
            d="M255.999 243.425c-22.356 0-40.544 18.188-40.544 40.544 0 5.478 4.44 9.918 9.918 9.918s9.918-4.44 9.918-9.918c0-11.418 9.289-20.707 20.707-20.707 5.478 0 9.918-4.44 9.918-9.918s-4.438-9.919-9.917-9.919z"
          />
        </symbol>
        <symbol
          viewBox="0 0 16 16"
          id="previous"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M0 7.9L6 3v3h2c8 0 8 8 8 8s-1-4-7.8-4H6v2.9l-6-5z" />
        </symbol>
        <symbol
          viewBox="0 0 31.357 31.357"
          id="question"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M15.255 0c5.424 0 10.764 2.498 10.764 8.473 0 5.51-6.314 7.629-7.67 9.62-1.018 1.481-.678 3.562-3.475 3.562-1.822 0-2.712-1.482-2.712-2.838 0-5.046 7.414-6.188 7.414-10.343 0-2.287-1.522-3.643-4.066-3.643-5.424 0-3.306 5.592-7.414 5.592-1.483 0-2.756-.89-2.756-2.584C5.339 3.683 10.084 0 15.255 0zm-.211 24.406a3.492 3.492 0 013.475 3.476 3.49 3.49 0 01-3.475 3.476 3.49 3.49 0 01-3.476-3.476 3.491 3.491 0 013.476-3.476z"
          />
        </symbol>
        <symbol
          viewBox="0 0 348.333 348.334"
          id="remove"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M336.559 68.611L231.016 174.165l105.543 105.549c15.699 15.705 15.699 41.145 0 56.85-7.844 7.844-18.128 11.769-28.407 11.769-10.296 0-20.581-3.919-28.419-11.769L174.167 231.003 68.609 336.563c-7.843 7.844-18.128 11.769-28.416 11.769-10.285 0-20.563-3.919-28.413-11.769-15.699-15.698-15.699-41.139 0-56.85l105.54-105.549L11.774 68.611c-15.699-15.699-15.699-41.145 0-56.844 15.696-15.687 41.127-15.687 56.829 0l105.563 105.554L279.721 11.767c15.705-15.687 41.139-15.687 56.832 0 15.705 15.699 15.705 41.145.006 56.844z"
          />
        </symbol>
        <symbol
          viewBox="0 0 612 464"
          id="reptiles"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M110.8 73.032V47.494H85.88v25.539h24.92zm166.85 293.849c-17.471-25.164-51.823-70.147-85.574-88.674-30.035-16.488-48.341-5.176-56.583 3.033l18.026 18.091c3.198-3.188 7.836-5.975 17.965-2.492 19.934 6.849 48.224 33.815 77.617 73.985 21.01 28.712 35.231 54.116 41.071 67.322-14.956 2.178-36.363-.214-59.13-6.868-31.715-9.271-60.616-25.039-79.295-43.263-21.271-20.753-27.643-42.513-18.941-64.677l3.299-8.399-6.817-5.913c-23.399-20.296-35.337-43.53-35.481-69.058l-.581-104.894H80.527c-30.044-.003-54.488-24.447-54.488-54.492 0-30.045 24.445-54.49 54.489-54.49h33.628c12.549 0 20.014 11.016 20.903 21.902.158 1.938.173 5.232.189 8.719.074 16.163.174 38.298 11.284 50.816l19.102-16.952c-4.716-5.313-4.809-25.401-4.847-33.979-.018-4.168-.034-7.766-.274-10.684C158.403 20.055 138.474.555 114.156.555H80.528C36.401.554.5 36.454.5 80.582c0 39.805 29.213 72.916 67.324 79.021l.445 80.506c.17 30.242 13.25 58.576 37.939 82.405-7.893 29.012 1.751 58.459 27.704 83.779 21.575 21.048 54.363 39.09 89.963 49.495 19.682 5.753 38.218 8.656 54.208 8.656 12.736 0 23.857-1.842 32.655-5.549l6.09-2.566 1.422-6.453c1.047-4.756 1.144-11.773-11.047-34.995-7.547-14.377-18.043-31.425-29.553-48zm172.827-47.985c-13.66-5.636-33.799-8.625-49.348-.126-9.567 5.229-15.693 13.894-17.714 25.06l25.129 4.552c.634-3.5 2.125-5.721 4.832-7.201 6.019-3.291 17.528-2.733 27.363 1.325 33.84 13.958 70.898 67.655 83.306 92.699-31.016-.854-80.435-13.058-105.447-34.112-9.282-7.814-14.079-15.934-14.261-24.136l-.215-9.672-9.368-2.412c-15.228-3.922-61.451-9.806-92.042 9.782l13.77 21.508c17.566-11.246 46.673-10.725 63.691-8.166 2.878 11.81 10.236 22.75 21.978 32.634 31.652 26.643 90.204 40.084 125.983 40.083 5.511 0 10.486-.319 14.734-.958l8.682-1.306 1.89-8.573c3.637-16.497-22.961-54.635-31.198-65.931-13.809-18.935-41.496-52.565-71.765-65.05zm135.95-130.384c-2.152-1.098-5.275-2.693-6.607-3.724-21.129-82.626-116.369-142.471-227.038-142.471-61.134 0-118.748 17.959-162.229 50.571-44.581 33.435-69.133 78.233-69.133 126.143 0 4.384.219 8.859.651 13.297l.877 8.999 8.78 2.162c66.342 16.339 142.78 24.974 221.055 24.974 33.914 0 142.826-1.304 224.255-16.756-14.232 28.573-39.233 53.204-77.102 76.291l13.293 21.806c52.557-32.043 83.262-67.572 96.612-111.797 10.426-32.227-12.424-43.886-23.414-49.495zm-439.453 32.364c-.01-.617-.016-1.232-.016-1.845 0-58.078 44.828-108.614 110.396-133.923v22.086c-19.089 10.152-38.105 27.752-53.162 49.416-15.547 22.368-25.184 46.882-27.878 70.445a754.57 754.57 0 01-29.34-6.179zm54.535 10.561c4.326-45.178 40.28-87.485 69.034-102.305l69.467 40.11.003 73.601c-47.77-.587-94.602-4.464-138.504-11.406zm151.27-84.311l-69.886-40.351V76.828c21.829-5.806 45.368-8.973 69.889-8.973 23.995 0 47.636 3.103 69.887 9.027v29.892l-69.89 40.352zm12.773 95.744l-.003-73.628 70.458-40.68c30.616 16.276 70.417 62.86 75.857 106.585-48.103 5.073-101.19 7.361-146.312 7.723zm221.464-19.298c-14.957 3.341-31.813 6.18-49.786 8.569-6.587-53.716-52.543-106.287-89.023-125.987V85.162c13.619 5.252 26.482 11.644 38.314 19.101 35.982 22.678 60.412 53.85 68.79 87.775 2.618 10.602 11.982 15.381 19.507 19.222 8.871 4.528 12.53 6.677 12.198 12.312z"
            fill-rule="evenodd"
            clip-rule="evenodd"
          />
        </symbol>
        <symbol
          viewBox="0 0 30.239 30.239"
          id="search"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M20.194 3.46c-4.613-4.613-12.121-4.613-16.734 0-4.612 4.614-4.612 12.121 0 16.735 4.108 4.107 10.506 4.547 15.116 1.34.097.459.319.897.676 1.254l6.718 6.718a2.498 2.498 0 003.535 0 2.496 2.496 0 000-3.535l-6.718-6.72a2.5 2.5 0 00-1.253-.674c3.209-4.611 2.769-11.008-1.34-15.118zm-2.121 14.614c-3.444 3.444-9.049 3.444-12.492 0-3.442-3.444-3.442-9.048 0-12.492 3.443-3.443 9.048-3.443 12.492 0 3.444 3.444 3.444 9.048 0 12.492z"
          />
        </symbol>
        <symbol
          viewBox="0 0 512 512"
          id="smartphone"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M298.667 25.6h-85.333a8.536 8.536 0 00-8.533 8.533 8.536 8.536 0 008.533 8.533h85.333a8.536 8.536 0 008.533-8.533 8.536 8.536 0 00-8.533-8.533zm59.733 0h-8.533a8.536 8.536 0 00-8.533 8.533 8.536 8.536 0 008.533 8.533h8.533a8.536 8.536 0 008.533-8.533A8.536 8.536 0 00358.4 25.6zm-91.802 409.6H245.41c-12.979 0-23.543 10.564-23.543 23.543v4.122c0 12.979 10.564 23.535 23.535 23.535h21.188c12.979 0 23.543-10.556 23.543-23.535v-4.122c0-12.979-10.564-23.543-23.535-23.543zm6.469 27.665a6.475 6.475 0 01-6.468 6.468H245.41c-3.575 0-6.477-2.901-6.477-6.468v-4.122a6.48 6.48 0 016.477-6.477h21.18a6.478 6.478 0 016.477 6.477v4.122z"
          />
          <path
            d="M370.227 0H141.781c-17.007 0-30.848 13.841-30.848 30.848v450.304c0 17.007 13.841 30.848 30.848 30.848h228.437c17.007 0 30.848-13.841 30.848-30.839V30.848C401.067 13.841 387.226 0 370.227 0zM384 481.152c0 7.595-6.178 13.781-13.773 13.781H141.781c-7.603 0-13.781-6.187-13.781-13.773V30.848c0-7.595 6.178-13.781 13.781-13.781h228.437c7.603 0 13.781 6.187 13.781 13.781v450.304z"
          />
          <path
            d="M392.533 51.2H119.467a8.536 8.536 0 00-8.533 8.533v358.4a8.536 8.536 0 008.533 8.533h273.067a8.536 8.536 0 008.533-8.533v-358.4c0-4.71-3.823-8.533-8.534-8.533zM384 409.6H128V68.267h256V409.6z"
          />
        </symbol>
        <symbol
          viewBox="0 0 612 510"
          id="species"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M487.724 137.544l22.579-11.491a280.96 280.96 0 00-12.813-22.539l.01-.005c-22.769-36.188-53.928-67.346-90.107-90.108l-.006.01A280.623 280.623 0 00384.848.597l-11.488 22.58c48.874 24.868 89.492 65.483 114.364 114.367zm59.175 164.451c-.846-54.65-1.801-116.421-76.784-144.165-11.557-25.374-27.702-48.732-48.008-69.036-44.527-44.529-103.73-69.053-166.705-69.053-62.974 0-122.178 24.523-166.706 69.053-44.53 44.528-69.054 103.733-69.054 166.706 0 62.935 24.495 122.108 68.971 166.625.027.027.052.053.081.08l.08.081c25.914 25.888 56.418 44.482 88.9 55.771l-.022.064c.742.249 1.492.482 2.247.696 24.44 8.219 49.973 12.329 75.502 12.329 60.371 0 120.744-22.981 166.705-68.94 44.529-44.528 69.053-103.734 69.053-166.707 0-21.767-2.929-43.08-8.602-63.494 37.68 24.259 38.302 64.704 39.009 110.381.869 56.191 1.855 119.882 82.943 146.832l7.99-24.043c-64.022-21.277-64.753-68.501-65.6-123.18zM45.158 246.676c2.166-52.896 23.794-102.311 61.452-139.968 37.556-37.555 86.802-59.168 139.536-61.434-36.514 17.369-77.391 47.054-115.622 85.284-34.429 34.43-62.304 71.263-80.61 106.518a281.357 281.357 0 00-4.756 9.6zm30.088 117.716a207.875 207.875 0 01-20.219-44.295l.049-.014c-8.43-29.5 21.425-99.67 93.36-171.607 68.358-68.357 135.921-99.345 167.389-94.639a207.719 207.719 0 0148.465 21.51c-13.665 2.207-28.853 6.97-45.259 14.282-42.595 18.99-89.849 53.242-133.054 96.447-43.206 43.205-77.458 90.458-96.449 133.056-7.312 16.405-12.075 31.59-14.282 45.26zm31.365 39.901c-11.827-11.827-9.561-39.806 6.06-74.845 17.758-39.835 50.155-84.389 91.223-125.456 41.067-41.068 85.622-73.465 125.456-91.224 20.171-8.993 38.002-13.559 51.759-13.559 10.14 0 18.068 2.482 23.086 7.5 7.626 7.626 9.394 21.969 5.498 40.588-48.109 10.407-110.243 51.41-160.663 101.83-50.432 50.432-91.448 112.566-101.865 160.67-18.603 3.882-32.934 2.115-40.554-5.504zm293.862-228.168a231.402 231.402 0 01-2.338 5.427c-17.76 39.836-50.156 84.389-91.224 125.457-41.067 41.068-85.622 73.465-125.456 91.224a217.92 217.92 0 01-5.478 2.357c1.893-5.617 4.226-11.537 6.993-17.706 16.472-36.724 47.079-78.946 83.974-115.84 36.887-36.887 79.112-67.485 115.849-83.945 6.156-2.758 12.069-5.087 17.68-6.974zM187.315 454.584a209.745 209.745 0 01-12.511-4.707c-3.529-4.623-5.13-11.463-4.85-20.038 6.994-2.283 14.279-5.107 21.818-8.468 42.596-18.99 89.849-53.242 133.054-96.447 43.205-43.206 77.458-90.457 96.448-133.055 3.353-7.523 6.171-14.789 8.451-21.768 8.702-.273 15.625 1.365 20.257 4.995 1.5 3.633 2.898 7.308 4.191 11.021l-.055.018c4.915 15.141-1.342 41.185-17.163 71.457-17.196 32.899-44.739 69.091-77.556 101.907-70.345 70.347-141.947 103.173-172.084 95.085zm216.879-50.291c-40.813 40.812-94.352 61.323-147.961 61.533a272.63 272.63 0 0012.624-6.172c35.255-18.348 73.773-47.554 108.458-82.239 34.587-34.585 63.74-72.973 82.095-108.089a271.761 271.761 0 006.414-13.093c-.188 55.934-22.058 108.488-61.63 148.06zM23.081 373.457L.5 384.946a280.796 280.796 0 0012.814 22.539l-.008.007c22.761 36.181 53.92 67.339 90.108 90.107l.005-.01a282.023 282.023 0 0022.539 12.814l11.49-22.581c-48.884-24.875-89.499-65.491-114.367-114.365z"
            fill-rule="evenodd"
            clip-rule="evenodd"
          />
        </symbol>
        <symbol
          viewBox="0 0 78.27 86.35"
          id="spider"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g data-name="Layer 2">
            <path
              d="M49.31 44.06l11.55-6.17 17.41 7.33-1.93-3-15.68-7.33L49.19 41c.51-1.48.57-1.43-1.67-2.78l11-9.06 14.19-7.08-3.21-.14-12 6-11.85 9.13a7.3 7.3 0 00-4.95-.58l-3.62-17.81L30.4 2.6 27.12 0 35 19.09l3.13 18.22L28.68 25l-17 .2L8.75 27l18.52.52 8.62 11.27a10.81 10.81 0 00-1.68 1.76l-9.92-6.28L0 46.09l.39 1.73 23.32-10.61L32.86 43a9.24 9.24 0 00-.35 1L21.4 45 1.73 65.39l.39 3.09 20.63-21.62h9.11c-1.57 5.44-5.9 3.77-8.15 7.91-2.43 4.49-.76 13.69 4.82 15.45s13.54-3.22 14.85-8.5c1.07-4.31-.34-7.51-.18-10.46l7.8 5.52 4.3 29.57 2.1-2.29L53.2 56l-9.1-7.8a12.61 12.61 0 011.83-2.49v.89l11.59.73 12.79 22.23 1.32-1.18-12.84-23.75z"
              data-name="Capa 1"
            />
          </g>
        </symbol>
        <symbol
          viewBox="0 0 460 512"
          id="support"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M340 396c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm24.622-32.337l-47.53-15.84-17.063-34.127c15.372-15.646 26.045-36.348 29.644-57.941L331.801 243H350c16.542 0 30-13.458 30-30v-63C380 67.29 312.71 0 230 0 147.078 0 80 67.097 80 150v63c0 13.036 8.361 24.152 20 28.28V253c0 16.542 13.458 30 30 30h8.782a108.487 108.487 0 0016.774 25.974 103.947 103.947 0 004.406 4.741l-17.054 34.108-47.531 15.841C40.112 382.092 0 440.271 0 502c0 5.523 4.477 10 10 10h440c5.522 0 10-4.477 10-10 0-61.729-40.111-119.908-95.378-138.337zM360 213c0 5.514-4.486 10-10 10h-15.262c2.542-19.69 4.236-40.643 4.917-61.28.02-.582.036-1.148.054-1.72H360v53zm-250 10c-5.514 0-10-4.486-10-10v-53h20.298c.033 1.043.068 2.091.107 3.146l.004.107v.009c.7 20.072 2.372 40.481 4.856 59.737H110V223zm20 40c-5.514 0-10-4.486-10-10v-10h8.198l2.128 12.759a105.57 105.57 0 001.482 7.241H130zm-9.983-123H100.38C105.445 72.979 161.377 20 230 20c68.318 0 124.496 52.972 129.619 120h-19.635c-.72-55.227-45.693-100-101.033-100h-17.9c-55.339 0-100.315 44.773-101.034 100zM221.05 60h17.9c44.809 0 81.076 36.651 81.05 81.41 0 3.147-.025 5.887-.078 8.38l-.001.098-12.508-1.787c-33.98-4.852-66.064-20.894-90.342-45.172A10.003 10.003 0 00210 100c-26.856 0-52.564 12.236-69.558 32.908C144.63 92.189 179.053 60 221.05 60zm-68.51 203c-5.006-16.653-10.734-65.653-12-97.053l13.459-17.946c12.361-16.476 31.592-26.713 52.049-27.888 26.917 25.616 61.739 42.532 98.537 47.786l14.722 2.104c-.984 20.885-2.995 41.843-5.876 61.118l-.003.02c-.916 6.197-1.638 10.185-3.482 21.324-5.296 31.765-28.998 60.49-60.287 68.313a81.338 81.338 0 01-39.313 0c-19.537-4.884-37.451-18.402-49.012-37.778h20.386c4.128 11.639 15.243 20 28.28 20h20c16.575 0 30-13.424 30-30 0-16.542-13.458-30-30-30h-20c-13.327 0-24.278 8.608-28.297 20H152.54zm56.619 78.016A101.171 101.171 0 00230 343.2c5.471 0 10.943-.458 16.353-1.346l-17.67 18.687-19.524-19.525zm5.776 34.063l-31.718 33.542a381.013 381.013 0 01-22.389-51.917l11.911-23.822 42.196 42.197zm70.631-45.585l13.604 27.209a380.908 380.908 0 01-22.392 51.933l-33.948-33.948 42.736-45.194zM200 273c0-5.521 4.478-10 10-10h20c5.514 0 10 4.486 10 10 0 5.522-4.479 10-10 10h-20c-5.514 0-10-4.486-10-10zM20.4 492c3.963-49.539 36.932-94.567 81.302-109.363l42.094-14.028a400.869 400.869 0 0028.463 61.74l.056.101.001.002a400.974 400.974 0 0027.372 41.799L211.99 492H20.4zm209.6-8.914l-13.562-21.773a10.133 10.133 0 00-.486-.711 381.284 381.284 0 01-22.532-33.662l35.663-37.714 37.578 37.578A380.863 380.863 0 01244.05 460.6c-.49.653.205-.376-14.05 22.486zM248.01 492l12.301-19.748a400.826 400.826 0 0027.564-42.132c.05-.088.097-.178.147-.266l.018-.032a400.543 400.543 0 0028.164-61.213l42.093 14.028c44.371 14.796 77.34 59.824 81.303 109.363H248.01zm133.227-74.836c-4.378-3.369-10.656-2.55-14.023 1.828-3.368 4.378-2.549 10.656 1.828 14.024 9.454 7.273 17.272 16.766 22.611 27.453 2.473 4.949 8.483 6.941 13.415 4.477 4.94-2.468 6.945-8.474 4.478-13.415-6.683-13.377-16.472-25.261-28.309-34.367z"
            fill-rule="evenodd"
            clip-rule="evenodd"
          />
        </symbol>
        <symbol
          viewBox="0 0 480 480"
          id="support2"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M160 0C93.726 0 40 53.726 40 120v88c.035 30.913 25.087 55.965 56 56h8v-16h-8c-22.08-.026-39.974-17.92-40-40v-88c0-57.438 46.562-104 104-104s104 46.562 104 104v88c-.026 22.08-17.92 39.974-40 40h-8v16h8c30.913-.035 55.965-25.087 56-56v-88C280 53.726 226.274 0 160 0zM65.928 377.032l5.848-9.208-13.512-8.576-5.848 9.216c-17.687 27.872-16.374 63.76 3.304 90.264V480h16v-24a7.999 7.999 0 00-1.752-5c-17.008-21.262-18.631-50.98-4.04-73.968zM440 0H336c-22.08.026-39.974 17.92-40 40v80c.026 22.08 17.92 39.974 40 40h16v32a8 8 0 0013.656 5.656L403.312 160H440c22.08-.026 39.974-17.92 40-40V40c-.026-22.08-17.92-39.974-40-40zm24 120c0 13.255-10.745 24-24 24h-40a8 8 0 00-5.656 2.344L368 172.688V152a8 8 0 00-8-8h-24c-13.255 0-24-10.745-24-24V40c0-13.255 10.745-24 24-24h104c13.255 0 24 10.745 24 24v80z"
          />
          <path
            d="M336 40h56v16h-56zm72 0h32v16h-32zm-72 32h104v16H336zm0 32h56v16h-56zm-68.416 264.464l-5.848-9.216-13.512 8.576 5.848 9.216c14.592 22.985 12.969 52.701-4.04 73.96a7.999 7.999 0 00-1.752 5v24h16v-21.272c19.678-26.504 20.991-62.392 3.304-90.264z"
          />
          <path
            d="M472 272h-72c-30.016.035-54.666 23.729-55.888 53.72L320 369.128V336c-.035-30.913-25.087-55.965-56-56h-29.24l-.216-.168-.144.168H216c-8.837 0-16-7.163-16-16v-18.824A80.002 80.002 0 00240 176v-64a80.165 80.165 0 00-9.6-37.968 8 8 0 00-10.4-3.44L84.592 134.304a8 8 0 00-4.592 7.24V176a80.002 80.002 0 0040 69.176V264c0 8.837-7.163 16-16 16H56c-30.913.035-55.965 25.087-56 56v144h16V336c.026-22.08 17.92-39.974 40-40h25.456l72.04 100.656a8 8 0 006.4 3.344H160a8.002 8.002 0 006.4-3.2l76-100.8H264c22.08.026 39.974 17.92 40 40v64a8 8 0 0014.992 3.88L356.704 336h45.864l-78 144h18.2L420.8 336h3.2c30.913-.035 55.965-25.087 56-56a8 8 0 00-8-8zM96 176v-29.376l123.528-58.128A64 64 0 01224 112v64c0 35.346-28.654 64-64 64-35.346 0-64-28.654-64-64zm64.168 202.496L135.48 344h50.688l-26 34.496zM198.272 328H124l-22.904-32H104c17.673 0 32-14.327 32-32v-11.688a79.94 79.94 0 0048 0V264c0 17.673 14.327 32 32 32h6.4l-24.128 32zM424 320h-63.2c3.825-18.613 20.198-31.979 39.2-32h63.2c-3.825 18.613-20.198 31.979-39.2 32z"
          />
        </symbol>
        <symbol
          viewBox="0 0 480 424"
          id="tickets"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M472 279.925c4.418 0 8-3.584 8-8.004v-64.033a8.002 8.002 0 00-8-8.004H371.312l50.344-50.37a8.007 8.007 0 000-11.318l-43.712-43.735a7.996 7.996 0 00-11.312 0c-12.499 12.505-32.765 12.505-45.264 0-12.499-12.505-12.499-32.782 0-45.287a8.007 8.007 0 000-11.318L285.656 2.125a7.996 7.996 0 00-11.312 0L76.688 199.883H8c-4.418 0-8 3.584-8 8.004v64.033a8.002 8.002 0 008 8.004c17.673 0 32 14.334 32 32.017 0 17.682-14.327 32.017-32 32.017-4.418 0-8 3.584-8 8.004v64.033a8.002 8.002 0 008 8.004h464c4.418 0 8-3.584 8-8.004v-64.033a8.002 8.002 0 00-8-8.004c-17.673 0-32-14.334-32-32.017 0-17.682 14.327-32.016 32-32.016zM280 19.102l24.864 24.877c-15.411 21.581-10.418 51.576 11.152 66.995 16.691 11.932 39.117 11.932 55.808 0l32.864 32.881-56 56.029h-25.376l18.344-18.354a8.007 8.007 0 000-11.318l-88-88.046a7.996 7.996 0 00-11.312 0L124.688 199.883H99.312L280 19.102zm20.688 180.781H147.312L248 99.143l76.688 76.728-24 24.012zM424.62 319.901c3.392 20.188 19.202 36.007 39.38 39.4v48.689h-64v-32.017h-16v32.017H96v-8.004H80v8.004H16v-48.689c26.143-4.396 43.774-29.164 39.38-55.321-3.392-20.188-19.201-36.007-39.38-39.4v-48.689h64v24.012h16v-24.012h368v48.689c-26.143 4.397-43.774 29.166-39.38 55.321zM384 263.917h16V231.9h-16v32.017zm0 48.024h16v-32.017h-16v32.017zm0 48.025h16V327.95h-16v32.016zM80 287.929h16v-32.017H80v32.017zm0 48.025h16v-32.017H80v32.017zm0 48.025h16v-32.017H80v32.017zm272-128.067c-8.837 0-16-7.167-16-16.008a8.002 8.002 0 00-8-8.004H152c-4.418 0-8 3.584-8 8.004 0 8.842-7.163 16.008-16 16.008-4.418 0-8 3.584-8 8.004v96.05a8.002 8.002 0 008 8.004c8.837 0 16 7.167 16 16.008a8.002 8.002 0 008 8.004h176c4.418 0 8-3.584 8-8.004 0-8.842 7.163-16.008 16-16.008 4.418 0 8-3.584 8-8.004v-96.05a8.002 8.002 0 00-8-8.004zm-8 97.059a32.135 32.135 0 00-22.992 23.004H158.992A32.137 32.137 0 00136 352.971v-82.058a32.137 32.137 0 0022.992-23.004h162.016A32.137 32.137 0 00344 270.913v82.058z"
            fill-rule="evenodd"
            clip-rule="evenodd"
          />
        </symbol>
        <symbol
          viewBox="0 0 511.999 511.999"
          id="trophy"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M466.45 49.374a37.048 37.048 0 00-28.267-13.071H402.41v-11.19C402.41 11.266 391.143 0 377.297 0H134.705c-13.848 0-25.112 11.266-25.112 25.112v11.19H73.816a37.05 37.05 0 00-28.267 13.071c-6.992 8.221-10.014 19.019-8.289 29.624 9.4 57.8 45.775 108.863 97.4 136.872 4.717 11.341 10.059 22.083 16.008 32.091 19.002 31.975 42.625 54.073 68.627 64.76 2.635 26.644-15.094 51.885-41.794 57.9-.057.013-.097.033-.153.046-5.211 1.245-9.09 5.921-9.09 11.513v54.363h-21.986c-19.602 0-35.549 15.947-35.549 35.549v28.058c0 6.545 5.305 11.85 11.85 11.85H390.56c6.545 0 11.85-5.305 11.85-11.85v-28.058c0-19.602-15.947-35.549-35.549-35.549h-21.988V382.18c0-5.603-3.893-10.286-9.118-11.52-.049-.012-.096-.028-.145-.04-26.902-6.055-44.664-31.55-41.752-58.394 25.548-10.86 48.757-32.761 67.479-64.264 5.949-10.009 11.29-20.752 16.008-32.095 51.622-28.01 87.995-79.072 97.395-136.87 1.725-10.605-1.297-21.402-8.29-29.623zM60.652 75.192c-.616-3.787.431-7.504 2.949-10.466A13.388 13.388 0 0173.815 60h35.777v21.802c0 34.186 4.363 67.3 12.632 97.583-32.496-25.679-54.87-62.982-61.572-104.193zm306.209 385.051c6.534 0 11.85 5.316 11.85 11.85v16.208H134.422v-16.208c0-6.534 5.316-11.85 11.85-11.85h220.589zm-45.688-66.213v42.513H191.96V394.03h129.213zm-98.136-23.699a78.449 78.449 0 008.002-10.46c7.897-12.339 12.042-26.357 12.228-40.674 4.209.573 8.457.88 12.741.88a94.34 94.34 0 0013.852-1.036c.27 19.239 7.758 37.45 20.349 51.289h-67.172zM378.709 81.803c0 58.379-13.406 113.089-37.747 154.049-23.192 39.03-53.364 60.525-84.956 60.525-31.597 0-61.771-21.494-84.966-60.523-24.342-40.961-37.748-95.671-37.748-154.049V25.112c0-.78.634-1.413 1.412-1.413h242.591c.78 0 1.414.634 1.414 1.413v56.691zm72.639-6.611c-6.702 41.208-29.074 78.51-61.569 104.191 8.268-30.283 12.631-63.395 12.631-97.58V60.001h35.773c3.938 0 7.66 1.723 10.214 4.726 2.518 2.961 3.566 6.678 2.951 10.465z"
          />
          <path
            d="M327.941 121.658a11.857 11.857 0 00-9.566-8.064l-35.758-5.196-15.991-32.402a11.852 11.852 0 00-21.252 0l-15.991 32.402-35.758 5.196a11.849 11.849 0 00-6.567 20.213l25.875 25.221-6.109 35.613a11.848 11.848 0 0017.193 12.492L256 190.32l31.982 16.813a11.843 11.843 0 0012.478-.903 11.848 11.848 0 004.714-11.59l-6.109-35.613 25.875-25.221a11.849 11.849 0 003.001-12.148zm-49.877 24.747a11.847 11.847 0 00-3.408 10.489l3.102 18.09-16.245-8.541a11.86 11.86 0 00-11.028 0l-16.245 8.541 3.102-18.09a11.849 11.849 0 00-3.408-10.489l-13.141-12.81 18.162-2.64a11.849 11.849 0 008.922-6.482L256 108.015l8.122 16.458a11.851 11.851 0 008.922 6.482l18.162 2.64-13.142 12.81z"
          />
        </symbol>
        <symbol
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="bzfeather bzfeather-user"
          viewBox="0 0 24 24"
          id="user"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
          <circle cx="12" cy="7" r="4" />
        </symbol>
        <symbol
          viewBox="0 0 612 594"
          id="visitors"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M365.37 297.362h-27.858v24.881h27.858v-24.881zm-37.969 75.251h-41.802c-23.386 0-42.413 19.026-42.413 42.413v11.324c0 23.387 19.027 42.413 42.413 42.413h8.462v41.92h24.88v-41.92h8.46c23.386 0 42.413-19.026 42.413-42.413v-11.324c0-23.386-19.027-42.412-42.413-42.413zm17.533 53.738c0 9.669-7.865 17.533-17.532 17.533H285.6c-9.669 0-17.533-7.865-17.533-17.533v-11.324c0-9.669 7.865-17.532 17.533-17.532h41.802c9.669 0 17.532 7.864 17.532 17.532v11.324zM306.5 25.486c15.253 0 27.663 12.41 27.663 27.662 0 15.252-12.41 27.662-27.663 27.662h-12.44v85.7h-34.184v24.88h93.25v-24.88h-34.185v-62.307c22.988-5.602 40.103-26.368 40.103-51.055 0-28.972-23.571-52.542-52.544-52.542-28.972 0-52.542 23.57-52.542 52.542h24.88c.002-15.253 12.412-27.662 27.662-27.662zm-31.009 271.876H247.63v24.881h27.861v-24.881zm193.336-178.698H342.139v24.88h52.902l-12.345 62.444c-.845 4.27-2.379 6.609-3.076 7.182H233.382c-.698-.573-2.232-2.912-3.076-7.182l-12.345-62.444h52.904v-24.88H144.174L.5 281.389l106.572 106.57 36.44-36.439v242.874h325.977V351.521l36.44 36.439L612.5 281.389 468.827 118.664zm3.087 200.096h-27.307v250.753H168.393V318.76h-27.305l-34.016 34.014-72.444-72.446 120.77-136.783H192.6l13.299 67.269c3.321 16.801 13.8 27.239 27.348 27.239h146.511c13.547 0 24.026-10.437 27.346-27.239l13.299-67.269h37.201l120.77 136.783-72.443 72.446-34.017-34.014z"
            fill-rule="evenodd"
            clip-rule="evenodd"
          />
        </symbol>
        <symbol
          viewBox="0 0 489.418 489.418"
          id="warning"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M244.709 389.496c18.736 0 34.332-14.355 35.91-33.026l24.359-290.927a60.493 60.493 0 00-15.756-46.011C277.783 7.09 261.629 0 244.709 0s-33.074 7.09-44.514 19.532a60.485 60.485 0 00-15.755 46.011l24.359 290.927c1.578 18.671 17.174 33.026 35.91 33.026zm0 21.412c-21.684 0-39.256 17.571-39.256 39.256 0 21.683 17.572 39.254 39.256 39.254s39.256-17.571 39.256-39.254c0-21.685-17.572-39.256-39.256-39.256z"
          />
        </symbol>
        <symbol
          viewBox="0 0 512.001 512.001"
          id="wifi"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M399.28 277.601a21.608 21.608 0 00-7.191-15.454c-37.419-33.312-85.748-51.658-136.088-51.658-50.34 0-98.669 18.346-136.088 51.658-4.398 3.916-7.019 9.548-7.19 15.451a21.756 21.756 0 006.339 15.957l41.123 41.123c8.001 7.999 20.553 8.545 29.2 1.267 18.55-15.62 42.209-24.221 66.616-24.22 24.409 0 48.067 8.603 66.617 24.22 4.067 3.426 8.997 5.119 13.914 5.119 5.534-.001 11.049-2.147 15.287-6.384l41.122-41.123a21.765 21.765 0 006.339-15.956zm-62.724 41.797l-.004-.002c-22.445-18.898-51.052-29.305-80.551-29.305-29.498 0-58.107 10.409-80.519 29.29l-41.183-41.075c33.453-29.78 76.674-46.181 121.703-46.181s88.25 16.401 121.642 46.133l-41.088 41.14zm-48.365 63.61c-8.598-8.598-20.03-13.334-32.189-13.334s-23.592 4.736-32.19 13.333c-17.748 17.751-17.748 46.63.001 64.379 8.874 8.874 20.533 13.311 32.189 13.311s23.314-4.436 32.188-13.311c8.598-8.597 13.334-20.03 13.334-32.189 0-12.16-4.736-23.592-13.333-32.189zm-15.299 49.082c-9.312 9.314-24.468 9.314-33.782 0-9.315-9.315-9.315-24.47 0-33.784a23.728 23.728 0 0116.892-6.997 23.732 23.732 0 0116.892 6.998 23.732 23.732 0 016.996 16.892c0 6.38-2.485 12.38-6.998 16.891z"
          />
          <path
            d="M505.147 149.718C365.44 18.499 146.563 18.498 6.854 149.717c-4.326 4.062-6.758 9.561-6.852 15.486-.092 5.902 2.156 11.451 6.328 15.623l41.041 41.041c8.26 8.26 21.425 8.519 29.971.592 48.605-45.098 112.053-69.935 178.659-69.935 66.604 0 130.053 24.837 178.658 69.935a21.49 21.49 0 0014.668 5.781c5.534 0 11.065-2.133 15.304-6.372l41.041-41.041c4.173-4.172 6.42-9.721 6.328-15.623-.095-5.924-2.527-11.424-6.853-15.486zm-55.772 56.883c-52.619-48.824-121.293-75.711-193.373-75.711-72.081 0-140.755 26.888-193.332 75.679l-41.005-41.082c131.406-123.42 337.27-123.416 468.673.001l.036.041-40.999 41.072z"
          />
        </symbol>
        <symbol
          viewBox="0 0 328.8 328.8"
          id="wind"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M275.2 243.2c-8-8-18.8-12.8-30.8-12.8H131.2c-5.6 0-10.4 4.4-10.4 10.4s4.4 10.4 10.4 10.4h113.2c6.4 0 12 2.4 16 6.8 4 4 6.8 10 6.8 16 0 6.4-2.4 12-6.8 16-4 4.4-10 6.8-16 6.8-6.4 0-12-2.4-16-6.8-4-4-6.8-10-6.8-16 0-5.6-4.8-10.4-10.4-10.4-5.6 0-10.4 4.8-10.4 10.4 0 12 4.8 22.8 12.8 30.8s18.8 12.8 30.8 12.8 22.8-4.8 30.8-12.8S288 286 288 274s-4.8-22.8-12.8-30.8zM306 90c-14-14-33.6-22.8-55.2-22.8-2 0-4.4 0-6.4.4-7.6-16-18.8-29.2-32.8-38.8-16-11.2-35.6-17.6-56-17.6-24.4 0-46.8 8.8-64 23.6C76.4 48 65.2 65.6 60 86.4c-15.6 2-29.6 9.2-40 19.6-12.4 12.4-20 29.6-20 48.4s7.6 36 20 48.4c12.4 12.8 29.6 20.4 48.8 20.4h182c21.6 0 40.8-8.8 55.2-22.8 14-14 22.8-33.6 22.8-55.2S320 104.4 306 90zm-16 96c-10.4 10.4-24.8 16.8-40.4 16.8H68.8c-13.2 0-25.2-5.2-34-14s-14-20.8-14-34c0-13.6 5.2-25.6 14-34 8.8-8.8 20.8-14 34-14 1.6 0 3.6-.4 4.8-1.2 2.4-1.6 4-4 4.4-6.8 2.8-18.8 12.4-35.6 26-47.2 13.6-11.6 31.6-18.8 50.8-18.8 16.4 0 31.6 5.2 44.4 14 9.6 6.8 18 15.6 23.6 26.4-1.6.8-3.2 1.2-4.8 2-10 4.4-18.8 11.2-26.4 19.2-3.6 4.4-3.2 10.8.8 14.4 4.4 3.6 10.8 3.2 14.4-.8 5.6-6 12-10.8 19.2-14.4 7.2-3.2 15.2-5.2 23.6-5.2 16 0 30 6.4 40.4 16.8 10.4 10.4 16.8 24.8 16.8 40.4 0 16-6.4 30-16.8 40.4z"
          />
        </symbol>
      </svg>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="food_form.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
  </body>
</html>
