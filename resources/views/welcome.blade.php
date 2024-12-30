@extends('layouts.master')
@section('content')
<style>
/* Optional: Customize the appearance of the carousel */

.banner_section {
    width: 100%;
    height: auto;
    background-image: url('../images/products/banner-bg1.png');
    background-size: cover;
    background-repeat: no-repeat;
    padding-top: 100px; /* Add padding to prevent overlap */
    padding-bottom: 20px;
}

h1 {
   letter-spacing: 0;
    font-weight: normal;
    position: relative;
    padding: 0 0 10px 0;
    font-weight: normal;
    line-height: normal;
    color: #111111;
    margin: 0;
    font-size: 32;
}


.taital_main {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    float: left;
    padding: 0px 20px;
}

.taital_left {
    width: 35%;
    float: left;
}

.taital_right {
    
    width: 65%;
    float: left;
}

.product_img img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

/* Controls customization */
.carousel-control-prev,
.carousel-control-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #000;
}

.carousel-control-prev i,
.carousel-control-next i {
    font-size: 24px;
    color: #000;
}

/* Optional: Autoplay animation delay */
.carousel-item {
    transition: transform 0.5s ease, opacity 0.5s ease-in-out;
}
/* footer section start */

.footer_section {
    width: 100%;
    float: left;
    background-color: #252525;
    height: auto;
    background-size: 100%;
    padding-top: 50px;
    padding-bottom: 30px;
}

.footer_logo {
    width: 100%;
    float: left;
    text-align: center;
    display: none;
}

.footer_logo_1 {
    width: 100%;
    float: left;
    text-align: center;
}

.address_bt {
    width: 100%;
    float: left;
}

.address_bt ul {
    margin: 0px;
    padding: 0px;
}

.address_bt li {
    font-size: 16px;
    color: #ffffff;
    padding: 10px 0px 0px 0px;
}

.address_bt li a {
    color: #ffffff;
}

.address_bt li a:hover {
    color: #f5ddb6;
}

.padding_left10 {
    padding-left: 10px;
}

.address_text {
    font-size: 24px;
    color: #ffffff;
    text-transform: uppercase;
}

.dummy_text {
    width: 100%;
    float: left;
    font-size: 14px;
    color: #ffffff;
    margin: 0px;
    text-align: center;
    padding-top: 20px;
}

.ipsum_text {
    width: 65%;
    float: left;
    font-size: 14px;
    color: #ffffff;
    margin: 0px;
    padding-top: 10px;
}

.main {
    width: 54%;
    float: right;
}

.social_icon {
    width: 50%;
    margin: 0 auto;
    text-align: center;
    padding-top: 40px;
    border-bottom: 1px solid #f5ddb6;
    padding-bottom: 30px;
}

.social_icon ul {
    margin: 0px;
    padding: 0px;
    display: inline-block;
    text-align: center;
}

.social_icon li {
    float: left;
    font-size: 26px;
    color: #f5ddb6;
    padding: 10px;
}

.social_icon li a {
    color: #f5ddb6;
}

.social_icon li a:hover {
    color: #ffffff;
}


/* footer section end */
</style>
<!-- JavaScript to enable autoplay and loop -->
<script>
    $(document).ready(function() {
        $('#my_slider').carousel({
            interval: 3000, // Change slide every 3 seconds
            pause: 'hover', // Pause the slider on hover
            wrap: true      // Enable infinite looping
        });
    });
</script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS and CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome (for carousel control icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<!-- banner section start -->
<div class="banner_section banner_bg">
         <div class="container-fluid">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="taital_main">
                        <div class="taital_left">
                           <h1 class="banner_taital">Cetaphill</h1>
                           <div class="read_bt"><a>Cetaphil is a dermatologist recommended sensitive skincare brand with a wide array of products to improve the resilience of skin and protect against skin concerns</a></div>
                        </div>
                        <div class="taital_right">
                           <div class="product_img"><img src="images/products/cetaphil.png"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="taital_main">
                        <div class="taital_left">
                           <h1 class="banner_taital">Skin 100</h1>
                           <div class="read_bt"><a>Coming soon</a></div>
                        </div>
                        <div class="taital_right">
                           <div class="product_img"><img src="images/products/comingsoon.png"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="taital_main">
                        <div class="taital_left">
                           <h1 class="banner_taital">Milani</h1>
                           <div class="read_bt"><a>Milani Cosmetics and beauty products, including face makeup, eye makeup, skincare, lipstick and a full range of top quality makeup products, for women and everyone of any age or skin tone</a></div>
                        </div>
                        <div class="taital_right">
                           <div class="product_img"><img src="images/products/banner-img.png"></div>
                        </div>
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
      </div>
      <!-- banner section end -->
    <h1 class="text-4xl font-bold text-center my-10">Latest Products</h1>

    <div class="grid grid-cols-4 gap-10 pb-10 px-24">
        @foreach($products as $product)
           <a href="{{route('viewproduct',$product->id)}}" class="border p-4 rounded shadow">x
                <img src="{{asset('images/products/'.$product->photopath)}}" class="w-full h-64 object-cover" alt="">
                <h2 class="text-xl font-bold my-2">{{$product->name}}</h2>
                <p class="text-gray-700 line-clamp-2">{{$product->description}}</p>
                <p class="text-gray-700 font-bold mt-2">Rs {{$product->price}}</p>
            </a>   
        @endforeach
    </div>
          <!-- footer section start -->
          <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-sm-4">
                     <h3 class="address_text">Contact Us</h3>
                     <div class="address_bt">
                        <ul>
                           <li>
                              <a href="#">
                              <i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left10">Address : Bharatpur,chitwan</span>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left10">Call : +01 1234567890</span>
                              </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left10">Email : panda@gmail.com</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <h3 class="address_text">Beautiful</h3>
                     <p class="dummy_text">commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
                  </div>
                  <div class="col-sm-4">
                     <div class="main">
                        <h3 class="address_text">Best Products</h3>
                        <p class="ipsum_text">Estée 
                           ,Lauder 
                           ,NARS 
                           ,Charlotte Tilbury 
                           ,LOréal 
                           ,CHANEL</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="social_icon">
               <ul>
                        <li><a href="#"><img src="images/products/fb-icon.png"></a></li>
                        <li><a href="#"><img src="images/products/twitter-icon.png"></a></li>
                        <li><a href="#"><img src="images/products/linkedin-icon.png"></a></li>
                        <li><a href="#"><img src="images/products/instagram-icon.png"></a></li>
                        <li><a href="#"><img src="images/products/youtub-icon.png"></a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- footer section end -->
@endsection