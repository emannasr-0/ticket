@extends('layouts.auth')


@section('page-title')
    {{ __('Create Ticket') }}
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('css/floating_chat.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
@endpush
@php
    $logos=\App\Models\Utility::get_file('uploads/logo/');

@endphp
<style>
:root{
    /*color*/
    --maincolor:#5E0A83;
    --secondcolor:#F70387;
    
    /*image size*/
    --imagesmartwatchsize: 60%;
    --imagephonessize: 60%;
    --imagetabletsize: 60%;
    --imagelaptopsize: 60%;
    --imagelaptoplargesize:60%;
    --image4ksize:40%;
    --imageapplesize:60%;
    /* general font */
    --ibmplexsans:'IBM Plex Sans Arabic';

}
.navbar-expand-md .hc{
    flex-direction: row-reverse !important;
}
#lt-card .left-title h2{
    color:var(--maincolor) !important;
}
    body{
        font-family: var(--ibmplexsans) !important;
                background: #fff !important;
    
    }
    .auth-wrapper .auth-content {
        width: 100% !important;
        
    }
    .auth-content{
        width:100% ;
        padding:0 !important;
        margin:0 !important;
    }
    .nbtn,.hbtn{
        max-width:200px !important;
    }
    .card {
        border-radius: 0;
    }
    .auth-wrapper .auth-content {
        min-height: calc(100vh - 40px);
        display: flex;
        flex-direction: row !important;
        justify-content: space-between;
    }
   .auth-wrapper.auth-v1 .card {
        background: #ffffff;
        box-shadow: none !important;
    }
    #lt-card,#rt-card{
        height: 100% !important;
        
    }
     #lt-card  {
        background: #fff;
        border-radius: 0 !important;
        text-align: center;
        box-shadow: none !important;
        border-right: 2px solid #5E0A83 !important;

    }
     #lt-card .left-title{
         color:var(--maincolor);
         font-size:36px;
         line-height:55px;
         text-align:Center;

     }
     #lt-card .card-body {
        flex-direction: column;
        justify-content: center;
        
       
    }
    
        
   .headline p {
        margin: 10px;
        display: flex;
        padding: 10px;
    }
    p:before,p:after {
      color:white;
      content:'';
      flex:1;
      border-bottom:groove 2px;
      margin: auto 0.25rem;
      box-shadow: 0 -2px ;
    }
   .nbtn {
        background: var(--maincolor) !important;
    }
    .hbtn{
        background: #fff !important;
        color: var(--maincolor) !important;
        border:2px solid var(--maincolor);
    }
    .hbtn:hover{
        background: var(--maincolor) !important;
        color:#fff !important;
        border:2px solid var(--maincolor);
    }
    .hbtn{
        max-width:150px !important;
    }
   .form-control, .custom-select, .dataTable-selector, .dataTable-input,# {
   
        color: #293240;
        background-color: #fff;
        border: 1px solid var(--maincolor) !important;
        border-radius: 6px;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    button{
        max-width:150px !important;
    }
    .mainstyle{
        padding:28px;
    }
    /*.left-title h2,*/
    /*.left-title h3,*/
    /*.left-title h4{*/
    /*    text-align:right;*/

    /*}*/
    .formtitle{
        padding:0;
    }
    #mdt .text-primary{
        padding: 20px 10px !important;
        color:#fff !important;
    }
    
 /*smart watch*/
 @media only screen and (min-width: 320px) and (max-width: 425px) {
     #mdt{display:block;}
         #lt-card{display:none;}

     .left-title h2 {
        font-size: 18px;
        text-align:center;
        margin-top:10px  !important;
        margin-bottom:10px  !important;
    }
    
    .formtitle h2{
        font-size: 18px;
        text-align:right;
    }
       .auth-wrapper .auth-content {
        min-height: calc(100vh - 40px);
        display: flex;
        flex-direction: column !important;
        justify-content: start !important;
    }
    #lt-card, #rt-card{
        background:#fff;
    }
    #rt-card {
     padding: 10px;
    }
    .auth-wrapper .auth-content:not(.container) .card-body {
      padding: 0 !important;
    }
    .hero-img{
        width: var(--imagesmartwatchsize);
    }
    .auth-wrapper .auth-content .card {
        
        justify-content: start !important;
        
    }
    #imgcontent{
        padding:20px;
    }
    /*#formsec{*/
    /*    margin-top:-390px;*/
    /*}*/
    #formcontent{
        padding:10px;
    }
     .text-muted{
        text-align:center !important;
    }
    .d-footer{
       text-align:center !important;
        display:none;
   }
   .m-footer{
        text-align:center !important;
       display:block;
   }
    #lt-card  {
        box-shadow: none !important;
    }
 }
  
 
/*phones*/
@media only screen and (min-width: 320px) and (max-width:5000px) {
    #mdt{display:block;}
    #lt-card{display:none;}
    #lt-card  {
        box-shadow: none !important;
    }
     .left-title h2 {
        text-align:center;
        margin-top:10px  !important;
        margin-bottom:10px  !important;
    }
    .formtitle h2{
        text-align:right;
    }
     .auth-wrapper .auth-content {
        min-height: calc(100vh - 40px);
        display: flex;
        flex-direction: column !important;
        justify-content: start !important;
    }
    #imgsec{
        display:none !important;
    }
    #lt-card, #rt-card{
        background:#fff;
    }
    #rt-card {
     padding: 10px;
    }
    .auth-wrapper .auth-content:not(.container) .card-body {
      padding: 0 !important;
    }
    .hero-img{
        width: var(--imagephonessize);
        display: block !important;
        margin: 10px auto !important;
    }
    .auth-wrapper .auth-content .card {
        
        justify-content: start!important;
        
    }
    #imgcontent{
        padding:10px;
    }
    /*#formsec{*/
    /*    margin-top: 0px !important;*/
    /*}*/
    #formcontent{
        padding: 20px !important;
        box-shadow: 0px 0px 10px 4px #3333 !important;
        margin: -160px auto 20px !important;
        border-radius: 10px !important;
        background-color: #fff !important;
    }
    .text-muted{
        text-align:center !important;
    }
     .d-footer{
       text-align:center !important;
        display:none;
   }
   .m-footer{
        text-align:center !important;
       display:block;
   }
.dddd{
    display: flex !important;
    justify-content: space-between !important;
    flex-wrap: nowrap !important;
    align-items: center !important;
    align-content: stretch !important;
    flex-direction: column !important;
}
.dddd > *{
        flex: 0 0 auto !important;
        width: 56% !important;
}
#disktopv{
    padding:20px !important;
}
}

/*tablets*/
@media only screen and (min-width: 601px) and (max-width: 768px) {
         #mdt{display:none;}
.auth-v1{
    display:block !important;
}
    #lt-card  {
        box-shadow: none !important;
    }
     .left-title h2 {
        font-size: 18px;
        text-align:center;
        padding-bottom:10px;
    }
    .formtitle h2{
        font-size: 18px;
        text-align:right;
    }
    #rt-card {
        padding: 5px;
    }
    .hero-img {
        width: var(--imagetabletsize);
    }
    #lt-card .card-body {
        flex-direction: column;
        justify-content: start !important;
    }
    .priority-field{
        margin-top: -40px !important;
    }
    .footer-center{
       text-align:center !important;
   }
    
     .d-footer{
       text-align:center !important;
        display:block;
   }
   .m-footer{
        text-align:center !important;
       display:none;
   }
}


/* Large devices laptops*/
@media only screen and (min-width: 769px) and (max-width: 1024px) {
         #mdt{display:none;}

    
    .formtitle h2{
        font-size: 24px;
        text-align:right;
    }
    #rt-card {
    padding: 10px 40px 10px 0px;
    }
    .hero-img{
        width:var(--imagelaptoplargesize);
    }
    #lt-card .card-body {
        flex-direction: column;
        justify-content: start !important;
    }
    .priority-field label{
        text-align:right !important;
        
    }
    #rt-card .card-body{
        padding: 40px 10px
    }
    .footer-center{
       text-align:center !important;
   }
    .auth-wrapper .auth-content .card .card-body {
        justify-content: start !important;
      
    }
     .d-footer{
       text-align:center !important;
        display:block;
   }
   .m-footer{
        text-align:center !important;
       display:none;
   }
}
/* Large devices laptops L*/
@media only screen and (min-width: 1025px) and (max-width: 1820px) {
         /*#mdt{display:none;}*/

    .formtitle h2{
        font-size: 24px;
        text-align:right;
    }
    .left-title h2{
        text-align:center;
    }
    #rt-card {
        padding: 10px;
    }
    .hero-img{
        width:var(--imagelaptoplargesize);
    }
    #lt-card .card-body {
        flex-direction: column;
        justify-content: start !important;
    }
     #rt-card .card-body{
        /*padding: 40px 60px 40px 20px !important;*/
    }
    .footer-center{
       text-align:center !important;
   }
       .auth-wrapper .auth-content .card .card-body {
        justify-content: start !important;
      
    }
     .d-footer{
       text-align:center !important;
        display:block;
   }
   .m-footer{
        text-align:center !important;
       display:none;
   }
    
}


/* 4k Monitors devices screens*/
@media only screen and (min-width: 1821px) and (max-width: 2560px) {
         /*#mdt{display:block;}*/

    .formtitle h2{
        font-size: 24px;
        text-align:right;
    }
    .left-title h2{
                text-align:center;

    }
    .hero-img{
        width:var(--image4ksize);
    }
    .auth-wrapper .auth-content:not(.container) .card-body {
        padding: 5% 10%;
    }
     #lt-card .card-body {
        flex-direction: column;
        justify-content: start !important;
    }
    #rt-card .card-body{
        /*padding:40px 22% 0 0;*/
    }
   .d-footer{
       text-align:center !important;
        display:block;
   }
   .m-footer{
        text-align:center !important;
       display:none;
   }
    .auth-wrapper .auth-content .card .card-body {
        justify-content: start !important;
      
    }
    
}
/* other Monitors devices screens*/
@media only screen and (min-width: 2561px) and (max-width: 5060px) {
             #mdt{display:none;}

    .nva{
        margin-left:51% !important;
    }
    .container {
        max-width: 2023px !important;
    }
        .formtitle h2{
        font-size: 24px;
        text-align:right;
    }
    .left-title h2{
                text-align:center;

    }
    .hero-img{
        width:var(--imageapplesize);
    }
    .auth-wrapper .auth-content:not(.container) .card-body {
        padding: 5% 10%;
    }
     #lt-card .card-body {
        flex-direction: column;
        justify-content: start !important;
    }
    #rt-card .card-body{
        /*padding:40px 22% 0 0;*/
    }
   .d-footer{
       text-align:center !important;
        display:block;
   }
   .m-footer{
        text-align:center !important;
       display:none;
   }
    .auth-wrapper .auth-content .card .card-body {
        justify-content: start !important;
      
    }
}
/*phones*/

 @media only screen and (min-width: 421px) and (max-width:430px) {

     .auth-v1{
        display:block !important;
    }
    #mdt {
        display: block !important;
        padding: 10px 14px !important;
    }
    #disktopv{
       margin: -10px 10px !important;
    }
   
 }
 #herosec{
        background-image: url(https://support.anasacademy.uk/resources/views/images/d.jpg) !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    min-height: 500px !important;
    }
    .text-start {
    text-align: right !important;
}


/*laptop*/

 @media only screen and (min-width: 1024px) and (max-width:1440px) {

     #herosec {
        background-image: url(https://support.anasacademy.uk/resources/views/images/d.jpg) !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        min-height: 380px !important;
    }
    #formcontent {
        padding: 20px !important;
        box-shadow: 0px 0px 10px 4px #3333 !important;
        margin: -95px auto 20px !important;
        border-radius: 10px !important;
        background-color: #fff !important;
    }
   
 }
 @media only screen and (min-width: 769px) and (max-width: 1024px){
    #rt-card {
        padding: 0px  !important;
    }
    #herosec {
        background-image: url(https://support.anasacademy.uk/resources/views/images/d.jpg) !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        min-height: 265px !important;
    }
    #formsec{
        width:55% !important;
    }
}
@media only screen and (max-width: 430px){
    .dddd > * {
        width: 90% !important;
    }  
    #mdt {
        padding: 10px 14px !important;
        margin-top: -100px !important;
    }
      
}
#mdt {
    display: block;
}
@media only screen and (min-width: 767px) and (max-width: 768px){
    .dddd > * {
        width: 90% !important;
    }  
    #mdt {
        padding: 10px 14px !important;
        margin-top: 0px !important;
    }
    #herosec {
        background-image: url(https://support.anasacademy.uk/resources/views/images/d.jpg) !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        min-height: 205px !important;
    }
    #formcontent {
        padding: 20px !important;
        box-shadow: 0px 0px 10px 4px #3333 !important;
        margin: -85px auto 20px !important;
        border-radius: 10px !important;
        background-color: #fff !important;
        width: 100%;
    }
}
</style>
@section('content')


@include('admin.template.Header')

    <div class="auth-wrapper auth-v1">
        <!--<div class="bg-auth-side bg-primary"></div>-->
        <div class="auth-content">

            <!--<nav class="navbar navbar-expand-md navbar-dark default dark_background_color">-->
            <!--    <div class="container-fluid pe-2">-->
            <!--        <a class="navbar-brand" href="#">-->

            <!--            <img src="{{ $logos.'logo-light.png'.'?'.time() }}" alt="logo"  style="width:150px;"/>-->

            <!--        </a>-->
            <!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"-->
            <!--            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">-->
            <!--            <span class="navbar-toggler-icon"></span>-->
            <!--        </button>-->
            <!--        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">-->
            <!--            <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">-->
            <!--                <li class="nav-item nva">-->
                                <!--<a class="nav-link" href="{{ route('login') }}">تسجيل دخول{{ __('Agent Login') }}</a>-->
            <!--                    <a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a>-->

            <!--                </li>-->
                            <!--<li class="nav-item nva">-->
                            <!--    @if ($setting['FAQ'] == 'on')-->
                            <!--        <a class="nav-link" href="{{ route('faq') }}">{{ __('FAQ') }}</a>-->
                            <!--    @endif-->
                            <!--</li>-->
                            <!--<li class="nav-item nva">-->
                            <!--    @if ($setting['Knowlwdge_Base'] == 'on')-->
                            <!--        <a class="nav-link" href="{{route('knowledge')}}">{{ __('Knowledge') }}</a>-->
                            <!--    @endif-->
                            <!--</li>-->
            <!--                <li class="nav-item nva">-->
            <!--                    <a class="nav-link" href="{{ route('search') }}">{{ __('Search Ticket') }}</a>-->
            <!--                </li>-->
            <!--            </ul>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</nav>-->
            <div id="herosec" class=" row align-items-center " style="justify-content: center; ">

                <div id="mdt" class=" mx-3 mx-md-5 mt-3 mb-3">
                                <div class=" container card-body w-100 dddd">
                                    
                                        <div class="left-title justify-content-center">
                                            <h2 class="text-primary mb-3" style="line-height:1.5">
                                            
                                            مرحبا بك فى فريق الدعم والتواصل SCT
                                        
                                            </h2>
                                         </div>
                                          <!--<div class="justify-content-center">-->
                                          <!--  <img class="hero-img" src="https://support.anasacademy.uk/resources/views/images/SupportImgs-06.png" alt="slider1"/>-->
    
                                          <!--</div>-->
                                     
                                    </div>
                </div>
            </div>
        <!--<div id="disktopv" class="row align-items-center " style="justify-content: center; ">-->
  <!--<div id="mdt" class="mx-3 mx-md-5 mt-3 mb-3">-->
  <!--                              <div class="card-body w-100">-->
                                    
  <!--                                      <div class="left-title">-->
  <!--                                          <h2 class="text-primary mb-3" style="line-height:1.5">-->
                                            
  <!--                                          مرحبا بك فى فريق الدعم والتواصل SCT-->
                                        
  <!--                                          </h2>-->
  <!--                                       </div>-->
  <!--                                        <div class="justify-content-center">-->
  <!--                                          <img class="hero-img" src="https://support.anasacademy.uk/resources/views/images/SupportImgs-06.png" alt="slider1"/>-->
    
  <!--                                        </div>-->
                                     
  <!--                                  </div>-->
  <!--                          </div>-->
            
<!--            <div id="imgsec" class="col-xs-12 col-sm-6 col-md-6 col-xl-6 align-items-center justify-content-center text-end">-->
<!--                        <div id="imgcontent" class="col-xl-12 text-center">-->
                            <!--<div class="mx-3 mx-md-5 mt-3">-->
        
                            <!--</div>-->
                          
<!--                            <div id="lt-card" class="card">-->
                               
<!--                                <div class="card-body w-100">-->
<!--                                    <div class="left-title">-->
<!--                                        <h2 class="text-primary mb-3" style="line-height:1.5">-->
                                        
<!--مرحبا بك فى فريق الدعم والتواصل SCT-->
<!--                                        </h2>-->
<!--                                        <h4 class="text-primary mb-3" style="line-height:1.5">-->
                                        
<!--يمكنك متابعة طلبك عن طريق رقم التذكرة المرسل لبريدك الالكتروني عند طلب الخدمة-->

<!--</h4>-->
<!--                                     </div>-->
<!--                                      <div class="justify-content-center">-->
<!--                                        <img class="hero-img" src="https://support.anasacademy.uk/resources/views/images/SupportImgs-06.png" alt="slider1"/>-->

<!--                                      </div>-->
                                       <!--<div class="text-center d-xl-none">-->
                                       <!--         <div class="d-block ">-->
                                       <!--             <a class="btn btn-primary btn-block mt-2 hbtn" id="ticket_button" href="{{ route('search') }}" style="color:#fff">{{ __('Search Ticket') }}</a>-->
                                       <!--         </div>-->
                                       <!--          <div class="d-block ">-->
                                       <!--             <a class="btn btn-primary btn-block mt-2 hbtn" id="ticket_button" href="{{ route('search') }}" style="color:#fff">{{ __('Search Ticket') }}</a>-->
                                       <!--         </div>-->
                                       <!-- </div>-->
                                <!--<img src="https://support.anasacademy.uk/resources/views/images/1.jpg" alt="slider1"  style=""/>                    -->
                               
        
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!--</div>-->
                <div id="disktopv" class="row align-items-center " style=" justify-content: center; ">
                    <div id="imgsec" class="col-xs-12 col-sm-6 col-md-6 col-xl-6 align-items-center justify-content-center text-end">
                        <div id="imgcontent" class="col-xl-12 text-center">
                            <!--<div class="mx-3 mx-md-5 mt-3">-->
        
                            <!--</div>-->
                          
                            <div id="lt-card" class="card">
                               
                                <div class="card-body w-100">
                                    <div class="left-title">
<!--                                        <h2 class="text-primary mb-3" style="line-height:1.5">-->
                                        
<!--مرحبا بك فى فريق الدعم والتواصل SCT-->
<!--                                        </h2>-->
<!--                                        <h4 class="text-primary mb-3" style="line-height:1.5">-->
                                        
<!--يمكنك متابعة طلبك عن طريق رقم التذكرة المرسل لبريدك الالكتروني عند طلب الخدمة-->

<!--</h4>-->
                                     </div>
                                      <!--<div class="justify-content-center">-->
                                      <!--  <img class="hero-img" src="https://support.anasacademy.uk/resources/views/images/SupportImgs-06.png" alt="slider1"/>-->

                                      <!--</div>-->
                                       <!--<div class="text-center d-xl-none">-->
                                       <!--         <div class="d-block ">-->
                                       <!--             <a class="btn btn-primary btn-block mt-2 hbtn" id="ticket_button" href="{{ route('search') }}" style="color:#fff">{{ __('Search Ticket') }}</a>-->
                                       <!--         </div>-->
                                       <!--          <div class="d-block ">-->
                                       <!--             <a class="btn btn-primary btn-block mt-2 hbtn" id="ticket_button" href="{{ route('search') }}" style="color:#fff">{{ __('Search Ticket') }}</a>-->
                                       <!--         </div>-->
                                       <!-- </div>-->
                                <!--<img src="https://support.anasacademy.uk/resources/views/images/1.jpg" alt="slider1"  style=""/>                    -->
                               
        
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="formsec" class="col-xs-12 col-sm-6 col-md-6 col-xl-6 align-items-center justify-content-center text-start">
                        <div id="formcontent" class="col-xl-12 text-center align-self-center">
                           <!--<div id="mdt" class="mx-3 mx-md-5 mt-3 mb-3">-->
                           <!--     <div class="card-body w-100">-->
                                    
                           <!--             <div class="left-title">-->
                           <!--                 <h2 class="text-primary mb-3" style="line-height:1.5">-->
                                            
                           <!--                 مرحبا بك فى فريق الدعم والتواصل SCT-->
                                        
                           <!--                 </h2>-->
                           <!--              </div>-->
                           <!--               <div class="justify-content-center">-->
                           <!--                 <img class="hero-img" src="https://support.anasacademy.uk/resources/views/images/SupportImgs-06.png" alt="slider1"/>-->
    
                           <!--               </div>-->
                                     
                           <!--         </div>-->
                           <!-- </div>-->
                            @if (Session::has('create_ticket'))
                                <div class="alert alert-success">
                                    <p>{!! session('create_ticket') !!}</p>
                                </div>
                            @endif
                            <div id="rt-card" class="card">
                                <div class="card-body w-100">
                                    <div class="formtitle">
                                        <h2 class="text-primary mb-3">{{ __('Create Ticket') }}</h2>
                                    </div>
                                    <form method="post" action="{{route('home.store')}}" class="create-form" enctype="multipart/form-data" id="form-data">
                                        @csrf
        
                                        <div class="text-start row">
                                            @if (!$customFields->isEmpty())
                                                @include('admin.customFields.formBuilder')
                                            @endif
        
        
                                            @if (env('RECAPTCHA_MODULE') == 'yes')
                                                <div class="form-group mb-3">
                                                    {!! NoCaptcha::display() !!}
                                                    @error('g-recaptcha-response')
                                                    <span class="small text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            @endif
                                            <div class="text-center">
                                                <div class="d-block ">
                                                    <input type="hidden" name="status" value="New Ticket"/>
                                                    <button class="btn btn-primary btn-block mt-2 nbtn" id="ticket_button">
                                                    قدم الطلب 
                                                    </button>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </form>
                                      <div class="headline"><p>أو يمكنك</p></div>
                                           
        
                                            <!--<div class="text-center">-->
                                            <!--    <div class="d-block ">-->
                                            <!--        <a class="btn btn-primary btn-block mt-2 hbtn" id="ticket_button" href="{{ route('search') }}" style="color:#fff">متابعة طلب سابق</a>-->
                                           
                                            <!--    </div>-->
                                                  
                                            <!--</div>-->
                                            <div class="text-center">
                                                <div class="d-block ">
                                                    <button class="btn btn-primary btn-block mt-2 hbtn" id="ticket_button" onclick="returnToTicketSearch()">
                                                        متابعة طلب سابق
                                                        
                                                    </button>
                                           
                                                </div>
                                                  
                                            </div>
                                        <div class="d-footer">
                                            @include('admin.template.Footer')
                                        </div>
                                  
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                
            
                

            

        </div>

    </div>

       
    <div class="row w-100 pb-2" style="display:none">
        <div class="col-sm-12 col-md-2 col-lg-2">
            @if (Utility::getSettingValByName('CHAT_MODULE') == 'yes')
                <div class="fabs">
                    <div class="chat d-none">
                        <div class="chat_header btn-primary dark_background_color">
                            <div class="chat_option">
                                <div class="header_img">
                                    <img src="{{ $logos.'logo-light.png' .'?'.time()}}" />
                                </div>
                                <span id="chat_head" class="">{{ __('Agent') }}</span>
                            </div>
                        </div>
                        <div class="msg_chat">
                            <div id="chat_fullscreen" class="chat_conversion chat_converse">
                                <h3 class="text-center mt-5 pt-5">{{ __('No Message Found.!') }}</h3>
                            </div>
                            <div class="fab_field">
                                <textarea id="chatSend" name="chat_message" placeholder="{{ __('Send a message') }}"
                                    class="chat_field chat_message"></textarea>
                            </div>
                        </div>
                        <div class="msg_form">
                            <div id="chat_fullscreen" class="chat_conversion chat_converse">
                                <form class="pt-4" name="chat_form">
                                    <div class="form-group row mb-3 ml-md-2">
                                        <div class="col-sm-12 col-md-12">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    <input type="text" class="form-control" id="chat_email"  name="name" placeholder="{{ __('Enter You Email') }}"  autofocus>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback d-block e_error">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4 ml-md-2">
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn-submit btn btn-primary btn-block" id="chat_frm_submit"
                                                type="button"><span>{{ __('Start Chat') }}</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a id="prime" class="fab btn-primary"><i class="prime fas fa-envelope text-white"></i></a>
                </div>
            @endif
        </div>

    </div>
    <div class="m-footer">
         @include('admin.template.Footer')

    </div>

@endsection

@push('scripts')
    @if (env('RECAPTCHA_MODULE') == 'yes')
        {!! NoCaptcha::renderJs() !!}
    @endif
    <script src="//cdn.ckeditor.com/4.12.1/basic/ckeditor.js"></script>
    <script src="{{ asset('js/editorplaceholder.js') }}"></script>
    <script>
          function returnToTicketSearch() {
            window.location.href = "https://support.anasco.uk/search";
        }
    </script>
    <script>
        $(document).ready(function() {
            $.each($('.ckdescription'), function(i, editor) {
                CKEDITOR.replace(editor, {
                    // contentsLangDirection: 'rtl',
                    extraPlugins: 'editorplaceholder',
                    editorplaceholder: editor.placeholder
                });
            });
        });

        if ($(".select2").length) {
            $('.select2').select2({
                "language": {
                    "noResults": function() {
                        return "{{ __('No result found') }}";
                    }
                },
            });
        }

        // for Choose file
        $(document).on('change', 'input[type=file]', function() {
            var names = '';
            var files = $('input[type=file]')[0].files;

            for (var i = 0; i < files.length; i++) {
                names += files[i].name + '<br>';
            }
            $('.' + $(this).attr('data-filename')).html(names);
        });
    </script>
    @if (APP\Models\Utility::getSettingValByName('CHAT_MODULE') == 'yes')
        <script>
            var old_chat_user = getCookie('chat_user');
            $('#prime').click(function() {
                if (old_chat_user != '') {
                    // has cookie
                    $('.msg_chat').removeClass('d-none');
                    $('.msg_form').removeClass('d-block');
                    $('.msg_chat').addClass('d-block');
                    $('.msg_form').addClass('d-none');

                    getMsg();
                } else {
                    // no cookie
                    $('.msg_chat').removeClass('d-block');
                    $('.msg_form').removeClass('d-none');
                    $('.msg_chat').addClass('d-none');
                    $('.msg_form').addClass('d-block');
                }
                toggleFab();
            });


            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            //Toggle chat and links
            function toggleFab() {
                $('.chat').toggleClass('is-visible');
                $('.fab').toggleClass('is-visible');
                $('.chat').toggleClass('d-none');
            }

            // Email Form Submit
            $('#chat_frm_submit').on('click', function() {
                var email = $('#chat_email').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('chat_form.store') }}',
                    data: {
                        "_token": '{{ csrf_token() }}',
                        email: email,
                    },
                    success: function(data) {
                        if (data != 'false') {
                            setCookie('chat_user', JSON.stringify(data), 30);
                            $('.msg_chat').removeClass('d-none').addClass('d-block');
                            $('.msg_form').removeClass('d-block').addClass('d-none');
                        } else if (data == 'false') {
                            $('.e_error').html('Something went wrong.!');
                        }
                    }
                });
            });
            // End Email Form Submit

            $(document).on('keyup', '#chatSend', function(e) {
                var message = $(this).val();
                if (e.keyCode == 13 && message != '') {
                    $(this).val('');

                    $.ajax({
                        type: "post",
                        url: "floating_message",
                        data: {
                            "_token": '{{ csrf_token() }}',
                            message: message,
                        },
                        cache: false,
                        success: function(data) {},
                        error: function(jqXHR, status, err) {},
                        complete: function() {
                            getMsg();
                        }
                    })
                }
            });

            // make a function to scroll down auto
            function scrollToBottomFunc() {
                $('#chat_fullscreen').animate({
                    scrollTop: $('#chat_fullscreen').get(0).scrollHeight
                }, 10);
            }

            // get Message when page is load or when msg successfully send
            function getMsg() {
                $.ajax({
                    type: "get",
                    url: "{{ route('get_message') }}",
                    cache: false,
                    success: function(data) {
                        $('#chat_fullscreen').html(data);
                        scrollToBottomFunc();
                    }
                });
            }

            $(document).ready(function() {

                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = false;

                // var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                //     cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                //     forceTLS: true
                // });


                var pusher = new Pusher('{{ $setting['PUSHER_APP_KEY'] }}', {
                    cluster: '{{ $setting['PUSHER_APP_CLUSTER'] }}',
                    // cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                    forceTLS: true
                });


                var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                    /*alert(JSON.stringify(data));*/
                    if (getCookie('chat_user') != '') {
                        var k = JSON.parse(getCookie('chat_user'));
                        var receiver_id = k.id;
                        var my_id = 0;
                        /*alert(JSON.stringify(data));*/
                        if (my_id == data.from && receiver_id == data.to) {
                            getMsg();
                        }
                    }
                });

            });
        </script>

         <script>
            $(document).ready(function () {
                $("#form-data").submit(function (e) {
                    $("#ticket_button").attr("disabled", true);
                    return true;
                });
            });
            </script>
    @endif
@endpush
@extends('layouts.cookie_consent')

