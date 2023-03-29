<?php 
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="prop.png">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" 
integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" 
crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <title>Property Hub</title>
</head>

  <body>
    <?php include("include/header.php");?>

    
                   <section class="mt-5 pt-5" id="myhero">
                            <div class="container my-5 py-5">
                                <div class="hero-content">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-12 col-md-10 col-lg-8 text-center">
                                        <h1 class="fw-bold text-light text-uppercase text-center mb-4 display-4 display-md-3 display-lg-2">Property<span class="text-warning">Hub</span></h1>
                                            <h6 class="text-light fw-bold" id="title">
                                                <span class="d-block d-md-inline">The key to your next home<br></span>
                                                <span class="d-block d-md-inline">is just a <span class="text-warning blink-animation"><i><b>click</i></b></span> away</span>
                                            </h6>
                                            <div class="row">
                                                <div class="col-md-5 mx-auto">
                                            <form method="post" action="propertygrid.php" class="form-inline justify-content-center" id="browse">
                                            <div class="input-group col-md-3 mx-auto">
                                                <input type="text" class="form-control pl-5" name="city" placeholder="Enter City" required>
                                                <div class="input-group-append">
                                                <button type="submit" name="filter" class="btn btn-md btn-warning"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>


                            

    
                            <section class="reveal py-5" style="background-color: #f7f7f7;">
                                  <div class="container text-center mb-5">
                                    <h2 class="fw-bold">Discover our Services</h2>
                                    <div class="row">
                                      <div class="col-md">
                                        <div class="column rounded shadow" style="background-color: #fff; padding: 30px;">
                                          <div class="icon-container" style="background-color: #f57c00; color: #fff; height: 80px; width: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: auto;">
                                            <i class="fas fa-home fa-3x"></i>
                                          </div>
                                          <div class="column-text mt-4">
                                            <h3 class="column-title">Buy a Home</h3>
                                            <p class="column-description">Find your place with an immersive photo experience and the most listings, including things you won’t find anywhere else.</p>
                                          </div>
                                        </div>
                                      </div>
                                
                                      <div class="col-md">
                                        <div class="column rounded shadow" style="background-color: #fff; padding: 30px;">
                                          <div class="icon-container" style="background-color: #3949ab; color: #fff; height: 80px; width: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: auto;">
                                            <i class="fas fa-chart-line fa-3x"></i>
                                          </div>
                                          <div class="column-text mt-4">
                                            <h3 class="column-title">Sell a Home</h3>
                                            <p class="column-description">No matter what path you take to sell your home, we can help you navigate a successful sale.</p>
                                          </div>
                                        </div>
                                      </div>
                                
                                      <div class="col-md">
                                        <div class="column rounded shadow" style="background-color: #fff; padding: 30px;">
                                          <div class="icon-container" style="background-color: #00c853; color: #fff; height: 80px; width: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: auto;">
                                            <i class="fas fa-key fa-3x"></i>
                                          </div>
                                          <div class="column-text mt-4">
                                            <h3 class="column-title">Rent a Home</h3>
                                            <p class="column-description">We are creating a seamless online experience,  from shopping on the largest rental network, to applying, to paying rent.</p>
                                          </div>
                                        </div>
                                      </div>
                                
                                    </div>
                                  </div>
                                </section>





       
        
	
      
        <section class="reveal py-5" style="background-color: #f7f7f7;">
    <div class="container">
        <h2 class="text-secondary double-down-line text-center mb-4">Newly added Properties</h2>
        <div class="row">
            <div class="col-md">
                <div class="tab-content mt-4" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                        <div class="row d-flex mx-auto justify-content-center">
                            <?php
                            $query = mysqli_query($con, "SELECT property.*, user.uname,user.utype,user.uimage FROM `property`,`user` WHERE property.uid=user.uid ORDER BY date DESC LIMIT 9");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                              <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                         <div class="card h-100 border-0 shadow rounded">
    <div class="position-relative">
        <img class="card-img-top" src="admin/property/<?php echo $row['18']; ?>" alt="pimage" style="height: 200px; object-fit: cover;">
        <div class="card-img-overlay d-flex flex-column justify-content-end align-items-center">
            <a href="propertydetail?pid=<?php echo $row['0'];?>" class="btn btn-sm btn-primary mb-3">View details</a>
        </div>
    </div>
    <div class="card-body bg-light">
        <h5 class="card-title"><?php echo $row['1']; ?></h5>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p class="card-text"><i class="fas fa-map-marker-alt text-warning"></i> <?php echo $row['15'];?></p>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end align-items-center">
                    <p class="card-text mb-0 ms-3"><strong>₱<?php echo $row['13'];?></strong></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-secondary"><?php echo $row['24']; ?></div>
            <span class="badge bg-primary text-white"><?php echo $row['5']; ?></span>
        </div>
    </div>
</div>




                            
                                                </div>                                       

                                    
									<?php } ?>
                            
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
         </section>


<section class="reveal">
<div class="container" id="contact">
  <div class="row my-5 py-5">
  <div class="col-md text-center">           
                              <h2 class="text-uppercase">How can We help?</h2>
                              <hr>
                              <p class="text-lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi totam 
                                iste, ipsa fugit cum minima! Possimus facere sapiente tempore vero?</p>
                                <p class="fw-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis,
                                   facere itaque! Ratione blanditiis necessitatibus aut ducimus doloremque omnis corrupti harum, soluta 
                                   molestias sapiente distinctio ea, consequuntur a odio? Cum quasi veniam voluptas eaque labore eius iure at,
                                   quos sunt blanditiis pariatur in dolorum dolores fugiat nostrum. Inventore animi nobis nulla.</p>
                                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate debitis modi eius, rem minus 
                                    mollitia non similique enim delectus quibusdam dolore eligendi sapiente iusto fuga ratione voluptatem inventore. 
                                    Numquam soluta accusamus labore eveniet harum 
                                    impedit sequi id maiores cupiditate. Fuga odio laborum minima ducimus doloribus ipsam soluta voluptatem quos sunt?</p>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias fugiat aliquam, ea nemo eos quis debitis ab quae tenetur sed.</p>
   
          </div>
          <div class="col-md">
    <?php
    $error = "";
    $msg = "";
    if(isset($_POST['send'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {
            $sql = "INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
            $result = mysqli_query($con, $sql);
            if($result) {
                $msg = "Message Sent Successfully";
            }
            else {
                $error = "Message Not Sent Successfully";
            }
        }
        else {
            $error = "Please fill all the fields";
        }
    }
    ?>

<div class="container text-center">
    <form class="rounded" action="#contact-form" method="post">
        <?php
        if(!empty($msg)) {
            echo '<div class="alert alert-success">' . $msg . '</div>';
        }
        if(!empty($error)) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
        ?>
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-uppercase mb-3">Reach us today!</h2>
                <hr class="mb-4">
            </div>
            <div class="form-group col-lg-6 mb-4">
                <input type="text" name="name" class="form-control p-4 rounded-pill border-warning" placeholder="Your Name*" required>
            </div>
            <div class="form-group col-lg-6 mb-4">
                <input type="email" name="email" class="form-control p-4 rounded-pill border-warning" placeholder="Email Address*" required>
            </div>
            <div class="form-group col-lg-6 mb-4">
                <input type="tel" name="phone" class="form-control p-4 rounded-pill border-warning" placeholder="Phone" maxlength="10">
            </div>
            <div class="form-group col-lg-6 mb-4">
                <input type="text" name="subject" class="form-control p-4 rounded-pill border-warning" placeholder="Subject">
            </div>
            <div class="col-lg-12 mb-4">
                <div class="form-group">
                    <textarea name="message" class="form-control p-4 rounded border-warning" rows="5" placeholder="Type Comments..." required></textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" value="send message" name="send" class="btn btn-warning rounded-pill px-5 py-3">Submit</button>
            </div>
        </div>
    </form>
</div>


</div>
    </div>

</section>

<section class="reveal mt-5">
<div class="container">
<h2 class="text-center">Feedbacks From Clients</h2>


  <div id="carouselTestimonial" class="carousel carousel-testimonial slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselTestimonial" data-slide-to="0" class="active"></li>
    <li data-target="#carouselTestimonial" data-slide-to="1"></li>
    <li data-target="#carouselTestimonial" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item text-center active">

    <div class="row">

    <div class="col-md ">
    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Boy Bawang</strong></h5>
    <h6 class="text-dark m-0">Tambay</h6>
    <ul class="d-flex justify-content-center list-unstyled">
        <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
        </ul>
    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>
    </div>

    <div class="col-md">
    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Baby Back Ribs</strong></h5>
    <h6 class="text-dark m-0">Nang lilimos 5k income Daily</h6>
    <ul class="d-flex justify-content-center list-unstyled">
        <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
        </ul>
    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>

    </div>

    <div class="col-md">
    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Bing Bong</strong></h5>
    <h6 class="text-dark m-0">Tambay</h6>
    <ul class="d-flex justify-content-center list-unstyled">
        <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
        </ul>
    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>

    </div>
    </div>

    </div>


    <div class="carousel-item text-center">
 
    <div class="row">

<div class="col-md">
<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Edi Wow</strong></h5>
<h6 class="text-dark m-0">Natutulog lang</h6>
<ul class="d-flex justify-content-center list-unstyled">
    <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
    </ul>
<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>

</div>

<div class="col-md">
<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Boom panot</strong></h5>
<h6 class="text-dark m-0">Web Developer</h6>
<ul class="d-flex justify-content-center list-unstyled">
    <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
    </ul>
<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>

</div>

<div class="col-md">
<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Sanaol</strong></h5>
<h6 class="text-dark m-0">Web Developer</h6>
<ul class="d-flex justify-content-center list-unstyled">
    <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
  <li>  <i class="fa-solid fa-star text-warning"></i></li>
    </ul>
<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>

</div>
</div>
    </div>

    <div class="carousel-item text-center">
     <div class="row">

    <div class="col-md">
    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Pst</strong></h5>
    <h6 class="text-dark m-0">Web Developer</h6>
    <ul class="d-flex justify-content-center list-unstyled">
        <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
        </ul>
    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>

    </div>

    <div class="col-md">
    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Lorem</strong></h5>
    <h6 class="text-dark m-0">Web Developer</h6>
    <ul class="d-flex justify-content-center list-unstyled">
        <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
        </ul>
    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>

    </div>

    <div class="col-md">
    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Ipsum</strong></h5>
    <h6 class="text-dark m-0">Web Developer</h6>
    <ul class="d-flex justify-content-center list-unstyled">
        <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
      <li>  <i class="fa-solid fa-star text-warning"></i></li>
        </ul>
    <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, consectetur adipiscing elit varius quam at, luctus dui. Mauris magna metus consectetur adipiscing elit.</p>

    </div>
    </div>
    </div>
  </div>
    <a class="carousel-control-prev " href="#carouselTestimonial" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon btn-warning" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselTestimonial" role="button" data-slide="next">
        <span class="carousel-control-next-icon btn-warning" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</section>  

<section>
        <div class="container">
            <div class="row text-center" id="city">
                    <h2 class="my-5">Browse for More Properties in these Cities</h2>

                <div class="col-md">
                        <h2>Metro Manila</h2>
                        <hr class="bg-warning p-1 rounded">
            <ul class="list-unstyled">
                <div class="row">
                    <div class="col-md">
                    <li><a href="propertygrid?filter=true&city=Makati">Makati</a></li>
                    <li><a href="propertygrid?filter=true&city=Taguig">Taguig</a></li>
                    <li><a href="propertygrid?filter=true&city=mandaluyong">Mandaluyong</a></li>
                    <li><a href="propertygrid?filter=true&city=Pasig">Pasig</a></li>
                    </div>
                    <div class="col-md">
                    <li><a href="propertygrid?filter=true&city=Parañaque">Parañaque</a></li>
                <li><a href="propertygrid?filter=true&city=san+juan">San Juan</a></li>
                <li><a href="propertygrid?filter=true&city=las+piñas">Las Piñas</a></li>
                <li><a href="propertygrid?filter=true&city=Quezon+City">Quezon City</a></li>
                    </div>
                    <div class="col-md">
                    <li><a href="propertygrid?filter=true&city=Muntinlupa">Multinlupa</a></li>
                <li><a href="propertygrid?filter=true&city=pasay">Pasay</a></li>
                <li><a href="propertygrid?filter=true&city=manila">Manila</a></li>
                    </div>
                </div>
            </ul>
                </div>

                <div class="col-md">
                        <h2>Visayas</h2>
                        <hr class="bg-warning p-1 rounded">
                        <ul class="list-unstyled">
                <div class="row">
                    <div class="col-md">
                    <li><a href="propertygrid?filter=true&city=Cebu+City">Cebu City</a></li>
                    <li><a href="propertygrid?filter=true&city=Lapu+lapu+City">Lapu Lapu City</a></li>
                    <li><a href="propertygrid?filter=true&city=talisay+City">Talisay City</a></li>
                    </div>
                    <div class="col-md">
                    <li><a href="propertygrid?filter=true&city=Bacolod+City">Bacolod City</a></li>
                <li><a href="propertygrid?filter=true&city=Mandaue+City">Mandaue City</a></li>
                <li><a href="propertygrid?filter=true&city=dumaguete+City">Dumaguete City</a></li>
                    </div>
                    <div class="col-md">
                    <li><a href="propertygrid?filter=true&city=ilo+ilo+City">Ilo Ilo City</a></li>
                    </div>
                </div>
            </ul>
                </div>

                <div class="col-md">
                        <h2>Mindanao</h2>
                        <hr class="bg-warning p-1 rounded">
                        <ul class="list-unstyled">
                <div class="row">
                    <div class="col-md">
                    <li><a href="propertygrid?filter=true&city=Davao+City">Davao City</a></li>
                    <li><a href="propertygrid?filter=true&city=general+santos+city">General Santos City</a></li>
                    </div>
                    <div class="col-md">
                    <li><a href="propertygrid?filter=true&city=cagayan+de+oro+City">Cagayan De Oro City</a></li>
                    <li><a href="propertygrid?filter=true&city=Iligan+City">Iligan City</a></li>
                    </div>
         
            </ul>

                </div>

            </div>

        </div>
</section>



		<?php include("include/footer.php");?>
		
		
		
		<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "112783461742003");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>     
 <script src="js/bootstrap.min.js"></script>
 <script src="js/bootstrap.min.js.map"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="js/contact.js"></script>
<script src="js/effects.js"></script>








</body>

</html>