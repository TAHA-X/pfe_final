<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/guide.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/projets.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/projet.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

  <script src="{{asset('assets/js/jquery.nice-select.js')}}"></script>
  <script>
     $(document).ready(function() {
         $('select').niceSelect();
        });
  </script>
  <title>@yield("titre")</title>
</head>
<body>



    @yield("contenu")





   
 
    <section class="section section4">
      <div class="left">
         <div style="font-weight:bold; font-size:25px;" class="title_paragraph"><div class="circle"></div> contacter nous</div> <br>
         <h3>----vous avez une question ???</h3>
         <strong>nous voulons la savoir </strong>
      </div>
      <div class="right">
           <div><i class="bi bi-telephone"></i><span>0{{$settings->phone}}</span></div>
           <div><i class="bi bi-envelope"></i><span>{{$settings->email}}</span></div>
      </div>
 </section>
 <section class="section section5">
     <div class="section5_part">
         <h2 id="logo"><i  class="bi logo_title bi-buildings"></i><span class="logo_title">A</span class="text-danger">chorouk</h2>
         <div>
             <i class="bi bi-house-door-fill"></i> <span>{{$settings->adresse}}</span>
         </div>
         <div>
             <i class="bi bi-envelope"></i> <span>{{$settings->email}}</span>
         </div>
         <div>
             <span>follow us :</span>
             <div class="social_media">
                 @if($settings->facebook)
                    <a href="#"><i class="bi bi-facebook"></i></a>
                 @endif
                 @if($settings->instagram)
                    <a href="#"><i class="bi bi-instagram"></i></a>
                 @endif
                 @if($settings->linkedin)
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                 @endif
             </div>
         </div>
     </div>
     <div class="section5_part">
         <strong>Links</strong>
         <ul>
             <li><a ref="{{ url('/') }}">Home</a></li>
             <li><a href="#">About</a></li>
             <li><a href="{{ url('/allResidences') }}">Projets</a></li>
             <li><a href="{{ url('/guide') }}">Guide</a></li>
             <li><a href="{{ url('/contact') }}">Contact</a></li>
         </ul>
     </div>
     <div class="section5_part section5_part_imgs">
         <strong>Instagram</strong>
         <div id="imgs">
             <img src="{{asset('assets/imgsInterface/footer1.jpg')}}">
             <img src="{{asset('assets/imgsInterface/footer2.jpg')}}">
             <img src="{{asset('assets/imgsInterface/footer3.jpg')}}">
             <img src="{{asset('assets/imgsInterface/footer4.jpg')}}">
             <img src="{{asset('assets/imgsInterface/footer5.jpg')}}">
             <img src="{{asset('assets/imgsInterface/footer6.jpg')}}">
         </div>
     </div>
     <div class="section5_part ">
         <strong>Call us</strong>
         <div><i class="bi bi-telephone m-2"></i><span>{{$settings->phone}}</span></div>
         <span style="color:#d00000;">© achorouk. All rights reserved</span>
     </div>
 </section>



<script src="{{asset('assets/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
