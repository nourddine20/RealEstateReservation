<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Les Roches De benslimane</title>
<link rel="shortcut icon" href="/frontside/assets/images/favicon.ico">
<link rel="stylesheet" href="/frontside/assets/css/master.css">
<link rel="stylesheet" href="/frontside/assets/css/responsive.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css" integrity="sha512-oHDEc8Xed4hiW6CxD7qjbnI+B07vDdX7hEPTvn9pSZO1bcRqHp8mj9pyr+8RVC2GmtEfI2Bi9Ke9Ass0as+zpg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

<style>
  @media (max-width:767px){
    .container.content_box_nav{
        height: auto;
    }

    .short-icon-callnow{

      display: inline-block !important;
      top: 100px !important;
    }

    .long-text-callnow{
      display: none !important;
    }

  }

  @media (min-width:767px){

    .short-icon-callnow{

    display: none !important;

   }

   .long-text-callnow{
      display: inline-block !important;
    }

  }


</style>
<!--=== Loader Start ======-->
<div id="loader-overlay">
  <div class="loader-wrapper">
    <div class="scoda-pulse"></div>
  </div>
</div>
<!--=== Loader End ======-->

<!--=== Wrapper Start ======-->
<div class="wrapper" id="main">

  <!--=== Header Start ======-->
  <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav on no-full" >
    <!--=== Start Top Search ===-->
    <div class="fullscreen-search-overlay"  id="search-overlay"> <a href="#" class="fullscreen-close" id="fullscreen-close-button"><i class="icofont icofont-close"></i></a>
      <div id="fullscreen-search-wrapper">
        <form method="get" id="fullscreen-searchform">
          <input type="text" value="" placeholder="Type and hit Enter..." id="fullscreen-search-input" class="search-bar-top">
          <i class="icofont icofont-search-1 fullscreen-search-icon">
          <input value="" type="submit">
          </i>
        </form>
      </div>
    </div>
    <!--=== End Top Search ===-->

    <div class="container content_box_nav" >
      <!--=== Start Atribute Navigation ===-->
      <div class="attr-nav" >
        <ul class="social-media-dark social-top long-text-callnow" >
          <div class="col-md-3 col-sm-6"> <a href="tel:123-456-7890" class="btn btn-color btn-sm btn-circle">Appelez Nous</a> <i class="icofont-phone m-auto text-center text-white" style="font-size: 20px;color:white;"></i></div>
        </ul>

        <ul class="social-media-dark social-top short-icon-callnow ">
          <!-- <div class="col-md-3 col-sm-6 -callnow" > <a href="tel:123-456-7890" style="border-radius: 50px; width:25px;height:25px;" class="btn btn-color btn-sm btn-circle"><i class="icofont-phone m-auto text-center" style="font-size: 20px;"></i></a> </div> -->
          <div class="col-md-3 col-sm-6 bg-red " style="margin-top:25px;">    <a href="tel:123-456-7890" style="top:100px !important;border-radius: 50px;background-color:#7B894E;padding:10px; width:50px;height:50px;" ><i class="icofont-phone m-auto text-center text-white" style="font-size: 20px;color:white;"></i></a></div>
        </ul>



      </div>
      <!--=== End Atribute Navigation ===-->

      <!--=== Start Header Navigation ===-->
      <div class="navbar-header" >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="icofont icofont-navigation-menu"></i> </button>
        <div class="logo"> <a href="index.html"> <img class="logo logo-display" src="frontside/assets/images/logo-black.png" alt=""> <img class="logo logo-scrolled" src="frontside/assets/images/logo-black.png" alt=""> </a> </div>
      </div>
      <!--=== End Header Navigation ===-->

      <div class="navbar-collapse collapse bg-white" id="navbar-menu" aria-expanded="false" >
        <ul class="nav navbar-nav navbar-right nav-scrollspy-onepage" data-in="fadeInLeft">
          <li class="scroll"><a href="#home">Home</a></li>
          <li class="scroll"><a href="#about">A Propos</a></li>
          <li class="scroll"><a href="#service">Commodités</a></li>
          <li class="scroll"><a href="#testimonials">Témoignages</a></li>
          <li class="scroll"><a href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--=== Header End ======-->

  <!--=== Video Start ======-->
  <section class="pt-0 pb-0 bg-video">
    <div class="hero-text-wrap overlay-bg">
      <div class="hero-text white-color">
        <div class="container text-center">
          <h2 class="white-color text-uppercase font-600 letter-spacing-5"><span class="white-color text-uppercase font-900 letter-spacing-5">Le</span> Lotissement</h2>
          <h1 class="white-color text-uppercase font-600"> de benslimane</h1>
          <h3 class="white-color font-600 text-uppercase">titres fonciers disponibles</h3>
          <p class="text-center mt-30"><a href="#about" class="btn btn-dark btn-circle"><span>Découvrir</span></a> </p>
        </div>
      </div>
    </div>
    <div class="homepage-hero-module">
      <div class="video-container">
        <div class="filter"></div>
        <video  class="fillWidth" autoplay loop muted>
          <source src="frontside/assets/images/video/agency.webm" type="video/webm" />
        </video>
        <div class="poster hidden"> <img src="frontside/assets/images/video/agency.jpg" alt="video-img"> </div>
      </div>
    </div>
  </section>
  <!--=== Video End ======-->

  <!--=== Who We Are Start ======-->
  <section class="first-ico-box" id="about">
    <div class="dn-bg-lines">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-8 section-heading">
          <h2 class="text-uppercase wow fadeTop" data-wow-delay="0.1s">Les Roches de benslimane</h2>
          <h4 class="text-uppercase wow fadeTop" data-wow-delay="0.2s">- au coeur de la nature -</h4>
          <div class="mt-30 wow fadeTop" data-wow-delay="0.3s">
            <p>le plan de masse du lotissement a été conçu de manière à créer des lots de terrain ayant chacun des avantages en termes de localisation, orientation ou exposition. Le terrain, légèrement en pente, a permis de favoriser les espaces sans vis-à-vis. La variété des terrains permet un large choix allant d’une grande superficie pour villas isolées à des immeubles en R+4.  </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=== Who We Are End ======-->

   <!--=== What We Do Start ======-->
  <section class="white-bg row " style="display: flex; flex-wrap: wrap;justify-content: space-around;">
    <div class="col-md-8" ><div class="box_img w-100 h-100" style="height:100%;" ><img class="w-100 h-100" style="height:100%;" src="frontside/assets/images/onepage-bg-left.jpg"></div></div>
    <div class="col-md-4" style="padding-left: 80px;margin-top:80px;" >

        <h1 class="font-700 wow fadeTop" data-wow-delay="0.1s">Plan de masse</h1>
        <h4 class="mt-10 line-height-26 wow fadeTop" data-wow-delay="0.2s">Votre de lot de terrain à portée de main</h4>
        <div class="left-service-box pt-40 pb-20 row">
          <div class="col-md-12 feature-box text-left mb-50 col-sm-6 wow fadeTop" data-wow-delay="0.1s">
            <div class=""><i class="icofont-square  font-30px default-icon" ></i></div>
            <div class="">
              <h5 class="">Zone Villa</h5>

            </div>

          </div>
          <div class="col-md-12 feature-box text-left mb-50 col-sm-6 wow fadeTop" data-wow-delay="0.1s">
            <div class=""><i class="icofont-square  font-30px default-icon1"></i></div>
            <div class="">
              <h5 class="">Zone R+2</h5>

            </div>

          </div>
          <div class="col-md-12 feature-box text-left mb-50 col-sm-6 wow fadeTop" data-wow-delay="0.1s">
            <div class=""></div>
            <div >
              <i class="icofont-square  font-30px default-icon2 mx-2"></i>
              <h5 class="" >Zone R+3</h5>

            </div>

          </div>

          <div class="col-md-12 feature-box text-left mb-50 col-sm-6 wow fadeTop" data-wow-delay="0.2s">
            <div class=""><i class="icofont-square font-30px default-icon3"></i></div>
            <div class="">
              <h5 class="">Zone R+4</h5>

            </div>
          </div>
          <div class="col-md-12 feature-box text-left col-sm-6 wow fadeTop" data-wow-delay="0.3s">
            <div class=""><i class="icofont-square font-30px default-icon4"></i></div>
            <div class="">
              <h5 class="">Zone Commerciale</h5>

            </div>
          </div>
        </div>



    </div>
  </section>
    <!--=== What We Do Start ======-->

  <!--=== Our Services Start ======-->
  <section id="service">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 section-heading">
          <h2 class="text-uppercase wow fadeTop" data-wow-delay="0.1s">Commodités</h2>
          <h4 class="text-uppercase wow fadeTop" data-wow-delay="0.2s">- Vivre à la proximité de toute commodité. -</h4>
        </div>
      </div>
      <div class="row mt-50">
        <div class="col-md-3 feature-box text-center col-sm-6 wow fadeTop" data-wow-delay="0.1s"> <i class="icofont icofont-football font-40px dark-icon white-bg-icon circle-icon fade-icon"></i>
          <h4 class="upper-case">AIRES DE JEUX </h4>

        </div>
        <div class="col-md-3 feature-box text-center col-sm-6 wow fadeTop" data-wow-delay="0.2s"> <i class="icofont icofont-flora-flower font-40px dark-icon white-bg-icon circle-icon fade-icon"></i>
          <h4 class="upper-case">ESPACES VERTS</h4>

        </div>
        <div class="col-md-3 feature-box text-center col-sm-6 wow fadeTop" data-wow-delay="0.3s"> <i class="icofont icofont-gym-alt-1 font-40px dark-icon white-bg-icon circle-icon fade-icon"></i>
          <h4 class="upper-case">SALLE DE SPORT </h4>

        </div>
        <div class="col-md-3 feature-box text-center col-sm-6 wow fadeTop" data-wow-delay="0.4s"> <i class="icofont icofont-group-students font-40px dark-icon white-bg-icon circle-icon fade-icon"></i>
          <h4 class="upper-case">ECOLE</h4>

        </div>
      </div>
    </div>
  </section>
  <!--=== Our Services End ======-->





  <!--=== Counter Start ======-->
  <section class="dark-bg pt-80 pb-80">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 counter text-center col-sm-6 wow fadeTop" data-wow-delay="0.1s">
          <h2 class="count white-color font-700">127 </h2>
          <h3>HECTARES DE SUPERFICIE TOTALE</h3>
        </div>
        <div class="col-md-3 counter text-center col-sm-6 wow fadeTop" data-wow-delay="0.2s">
          <h2 class="count white-color font-700">12</h2>
          <h3>HECTARES D'ESPACE VERT</h3>
        </div>
        <div class="col-md-3 counter text-center col-sm-6 wow fadeTop" data-wow-delay="0.3s">
          <h2 class="count white-color font-700">208</h2>
          <h3>LOTS DE VILLAS</h3>
        </div>
        <div class="col-md-3 counter text-center col-sm-6 wow fadeTop" data-wow-delay="0.4s">
          <h2 class="count white-color font-700">650</h2>
          <h3>LOTS D'IMMEUBLES</h3>
        </div>
      </div>
    </div>
  </section>
  <!--=== Counter End ======-->

  <!--=== Testimonails Start ===-->
  <section  id="testimonials" data-stellar-background-ratio="0.2">
    <div class="overlay-bg"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-8 section-heading white-color">
          <h2 class="wow fadeTop" data-wow-delay="0.1s">Témoignages</h2>
          <h4 class="text-uppercase wow fadeTop" data-wow-delay="0.2s">- Happy Clients -</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="slick testimonial">
            <!--=== Slide ===-->
            <div class="testimonial-item">
              <div class="testimonial-content"> <img class="img-responsive img-circle" src="frontside/assets/images/team/avatar-3.jpg" alt="avatar-1"/>
                <h5>Mohammed</h5>
                <p>Architecte </p>
                <h4>Nous sommes très fiers d'accompagner Les Roches De Benslimane sur ce projet. Un projet connecté à la nature, un lieu de quiétude, une structure respectant les normes les plus exigeantes.</h4>
              </div>
            </div>
            <!--=== Slide ===-->
            <div class="testimonial-item">
              <div class="testimonial-content"> <img class="img-responsive img-circle" src="frontside/assets/images/team/avatar-2.jpg" alt="avatar-1"/>
                <h5>Najat </h5>
                <p>Heureuse propriétaire</p>
                <h4>Récemment installés au Maroc, nous avons longuement cherché notre point de chute. Le coup de foudre a été immédiat pour Les Roches De Benslimane</h4>
              </div>
            </div>
            <!--=== Slide ===-->
            <div class="testimonial-item">
              <div class="testimonial-content"> <img class="img-responsive img-circle" src="frontside/assets/images/team/avatar-3.jpg" alt="avatar-1"/>
                <h5>Abdelkrim</h5>
                <p>Heureux propriétaire</p>
                <h4>L'endroit idéal quand on aime la nature et les grands espaces sans s'isoler du monde. Proche de l'école des enfants. Merci et bravo à l'architecte d'avoir pu imaginer un espace aussi fonctionnel.</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=== Testimonails End ===-->


 <!--=== Contact Us Start ======-->
<section id="contact"class="contact-us">
  <div class="container">
    <div class="row">
      <div class="col-md-8 section-heading">
        <h2 class="text-uppercase">Contact</h2>
        <p>Notre équipe se tient à votre disposition pour répondre à toutes vos questions.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
      <form name="contact-form"  id="ajaxpostdemande" method="POST" action="{{route('getajaxpost.demande')}}">
          @csrf
          <div class="messages"></div>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label class="sr-only" for="name">Nom Complet</label>
                <input type="text" name="name" class="form-control" id="name" required="required" placeholder="Nom Complet" data-error="Your Name is Required">
                <div class="help-block with-errors mt-20"></div>
                <div class="errorname text-danger"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label class="sr-only" for="phone">Telephone</label>
                <input type="text" name="phone" class="form-control" id="phone" required="required" placeholder="Téléphone" data-error="Your phone is Required">
                <div class="help-block with-errors mt-20"></div>
                <div class="errorphone text-danger"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label class="sr-only" for="city">Ville</label>
                <input type="text" name="city" class="form-control" id="city" required="required" placeholder="Ville" data-error="Your Ville is Required">
                <div class="help-block with-errors mt-20"></div>
                <div class="errorcity text-danger">

                   </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label class="sr-only" for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="required" data-error="Please Enter Valid Email">
                <div class="help-block with-errors mt-20"></div>
                <div class="erroremail text-danger"></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="sr-only" for="message">Message</label>
            <textarea name="message" class="form-control" id="message" rows="7" placeholder="Message" required data-error="Please, Leave us a message"></textarea>
            <div class="help-block with-errors mt-20"></div>
            <div class="errormessage text-danger"></div>
          </div>

          <div id="box_message">

          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-color btn-circle btn-animate"><span>Réserver un rendez vous <i class="icofont icofont-simple-right"></i></span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--=== Contact Us End ======-->



  <div id="myMapTwo" class="wide"></div>




 <!--=== Footer Start ======-->
 <footer class="footer" id="footer-fixed">
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="widget widget-text">
            <div class="logo logo-footer"><a href="index.html"> <img class="logo logo-display" src="assets/images/logo-white.png" alt=""></a> </div>
            <p>Les Roches de Benslimane est un projet à la fois au coeur de la nature et à proximité des grandes villes. La double voie de Benslimane facilite la connection avec les villes de Casablanca, Mohammedia et Rabat, permettant ainsi une réduction significative au temps des trajets et une plus grande sécurité routière.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-2">
          <div class="widget widget-links">
            <h5 class="widget-title">Liens Utiles</h5>
            <ul>
              <li><a href="#">Espace Investisseur</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Politique de confidentialité</a></li>


            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-2">
          <div class="widget widget-links">
            <h5 class="widget-title">Menu</h5>
            <ul>
              <li><a href="#about">A PROPOS</a></li>
              <li><a href="#service">COMMODITÉS</a></li>
              <li><a href="#testimonials">TÉMOIGNAGES</a></li>
              <li><a href="#contact">CONTACT</a></li>

            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="widget widget-text widget-links">
            <h5 class="widget-title">Contact</h5>
            <ul>
              <li> <i class="icofont icofont-google-map"></i> <a href="#">210, Bd Zerktouni,6 éme étage - Casablanca</a> </li>
              <li> <i class="icofont icofont-iphone"></i> <a href="#">+212 (0) 5 20 15 15 15</a> </li>
              <li> <i class="icofont icofont-mail"></i> <a href="#">Contact@lesrochesdebenslimane.ma</a> </li>
              <li> <i class="icofont icofont-globe"></i> <a href="#">lesrochesdebenslimane.ma</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="footer-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <ul class="social-media">
              <li><a href="#" class="icofont icofont-facebook"></a></li>
              <li><a href="#" class="icofont icofont-youtube-play"></a></li>
              <li><a href="#" class="icofont icofont-instagram"></a></li>
              <li><a href="#" class="icofont icofont-linkedin"></a></li>
            </ul>
          </div>
          <div class="col-md-6 col-xs-12">
            <div class="copy-right text-right">© 2022. All rights reserved</div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--=== Footer End ======-->

  <!--=== GO TO TOP  ===-->
  <a href="#" id="back-to-top" title="Back to top">&uarr;</a>

  <!--=== GO TO TOP End ===-->

</div>
<!--=== Wrapper End ======-->

<!--=== Javascript Plugins ======-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9y4xzoG1g1VYlZR0Lre8rLI_6EJGWGs8"></script>
<script src="frontside/assets/js/jquery.min.js"></script>
<script src="frontside/assets/js/validator.js"></script>
<script src="frontside/assets/js/plugins.js"></script>
<script src="frontside/assets/js/master.js"></script>
<script src="frontside/assets/js/bootsnav.js"></script>
<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
          var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"","cornerRadius":20,"marginBottom":75,"marginLeft":40,"marginRight":40,"btnPosition":"right","whatsAppNumber":"212633615092","welcomeMessage":"Hello","zIndex":999999,"btnColorScheme":"light"};
          window.onload = () => {
            _waEmbed(wa_btnSetting);
          };
        </script>



        <script>
    $(document).ready(function(){


$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

        $('#ajaxpostdemande').on('submit',function(event){


console.log('hello');

event.preventDefault();
console.log('bool');
thisform = $(this);


url = thisform.attr('action');
method = thisform.attr('method');

var formData = new FormData(this);


$.ajax({

type:method,
url: url,
data:formData,
dataType:'JSON',
processData: false,
   contentType: false,
success:function(response){

         //   $('#inscription').attr('data-bs-dismiss','modal');
         //     console.log(response);

             if(response.status == 'success')
             {
                $('.errorname').hide();
                    $('.erroremail').hide();
                    $('.errorcity').hide();
                    $('.errormessage').hide();

                    $('#box_message').html('');


                $content =  ` <div class="text-success" style="color: #3c763d;padding: 5px;margin: 20px;text-align: center;">
                                                    `+response.msg+`

                                                </div>`;

                        $('#box_message').html($content);

                        $('#name').val('');
                $('#phone').val('');
                    $('#email').val('');
                    $('#city').val('');
                    $('#message').val('');




             }else if(response.status == 'error'){



                if(response.input == 'name')
                  {
                    console.log('hellowordl')
                    $('.errorname').show();


                            message = response.msg;


                  $('.errorname').html(message);

                  }else{
                    $('.errorname').hide();

                  }

                  if(response.input == 'phone')
                  {
                    console.log('hellowordl')
                    $('.errorphone').show();


                            message = response.msg;


                  $('.errorphone').html(message);

                  }else{
                    $('.errorphone').hide();

                  }

                  if(response.input == 'email')
                  {
                    console.log('hellowordl')
                    $('.erroremail').show();


                            message = response.msg;


                  $('.erroremail').html(message);

                  }else{
                    $('.erroremail').hide();

                  }


                  if(response.input == 'city')
                  {
                    console.log('hellowordl')
                    $('.errorcity').show();


                            message = response.msg;


                  $('.errorcity').html(message);

                  }else{
                    $('.errorcity').hide();

                  }


                  if(response.input == 'message')
                  {
                    console.log('hellowordl')
                    $('.errormessage').show();


                            message = response.msg;


                  $('.errormessage').html(message);

                  }else{
                    $('.errormessage').hide();

                  }


             }else if(response.input = 'none'){

                $('.errorname').hide();
                $('.errorphone').hide();
                    $('.erroremail').hide();
                    $('.errorcity').hide();
                    $('.errormessage').hide();

                    $('.errorphone').hide();

                    $('#box_message').html('');

                    $content =  ` <div class="text-danger" style="color: #3c763d;padding: 5px;margin: 20px;text-align: center;">
                                                    `+response.msg+`

                                                </div>`;

                        $('#box_message').html($content);
                }

             }


         });


     });



 });


</script>

<!--=== Javascript Plugins End ======-->

</body>
</html>
