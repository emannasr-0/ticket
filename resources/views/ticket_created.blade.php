
@push('css-page')
    <link rel="stylesheet" href="{{ asset('css/floating_chat.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
@endpush
@php
    $logos=\App\Models\Utility::get_file('uploads/logo/');

@endphp
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Created Successfully</title>
    
    <style>
        body {
          
            font-family: 'IBM Plex Sans Arabic' !important;
            background:#fff !important;
        }
        .content{
            text-align: center;

        }

        .success-message {
            color: #27ae60;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #333;
            font-size: 18px;
        }

       button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #5E0A83;
            color: #fff;
            border: none;
            cursor: pointer;
            min-width: 250px;
            border-radius: 10px;
            margin: 10px;
            font-weight: 600;
            font-family: 'IBM Plex Sans Arabic';
        }
        .btn-style{
            background-color: #fff;
            color:#5E0A83;
            border:2px solid #5E0A83;

        }
        .hero-text{
            font-size:28px;
            color:#5E0A83;
            font-weight:600;
        }
        .header-text{
            font-size:28px;
            color:#5E0A83;
            font-weight:600;
            margin-top:-150px;
        }
        .content-text{
            font-size:18px;
            color:#1E1E1E;
            font-weight:500;
        }
        .thanks-text{
            font-size:18px;
            color:#F60286;
            font-weight:500;
        }
        
/*smart watch*/
 @media only screen and (min-width: 320px) and (max-width: 425px) {
    .title .hero-text{
        font-size: 22px;
        color: #5E0A83;
        font-weight: 600;
    }
    .card-body img{
        max-width: 60%;
        margin:40px auto;
    }
    .header-text,.content-text{
        text-align:center;
    }
    .header-text {
        font-size: 18px;
        color: #5E0A83;
        font-weight: 500;
        margin-top: 0px;
    }
    .content-text{
        font-size: 18px;
        font-weight: 500;
    }
    .thanks-text {
        font-size: 18px;
        font-weight: 500;
    }
    #message{
         font-size: 14px;
        font-weight: 500;
        color: #5E0A83;
    }
    
   .hero-img{
        width:70%;
    }
 }
 
/*phones*/
@media only screen and (min-width: 426px) and (max-width: 600px) {
   .title .hero-text{
        font-size: 22px;
        color: #5E0A83;
        font-weight: 600;
    }
    .card-body svg{
        max-width:;
    }
    .header-text,.content-text{
        text-align:center;
    }
    .header-text {
        font-size: 18px;
        color: #5E0A83;
        font-weight: 500;
        margin-top: 0px;
    }
    .content-text{
        font-size: 18px;
        font-weight: 500;
    }
    .thanks-text {
        font-size: 18px;
        font-weight: 500;
    }
    #message{
         font-size: 14px;
        font-weight: 500;
        color: #5E0A83;
    }
   .hero-img{
        width:60%;
    }
    
}
/*tablets*/
@media only screen and (min-width: 601px) and (max-width: 768px) {
   .title .hero-text{
        font-size: 22px;
        color: #5E0A83;
        font-weight: 600;
    }
    .card-body svg{
        max-width: 50%;
    }
    .header-text,.content-text{
        text-align:center;
    }
    .header-text {
        font-size: 18px;
        color: #5E0A83;
        font-weight: 500;
        margin-top: 0px;
    }
    .content-text{
        font-size: 18px;
        font-weight: 500;
    }
    .thanks-text {
        font-size: 18px;
        font-weight: 500;
    }
    #message{
         font-size: 14px;
        font-weight: 500;
        color: #5E0A83;
    }
    
    .hero-img{
        width:70%;
    }
}

/* Large devices laptops*/
@media only screen and (min-width: 769px) and (max-width: 1024px) {
.title .hero-text{
        font-size: 22px;
        color: #5E0A83;
        font-weight: 600;
    }
    .card-body img{
        max-width: 40%;
        margin:40px auto;
    }
    .header-text,.content-text{
        text-align:center;
    }
    .header-text {
        font-size: 18px;
        color: #5E0A83;
        font-weight: 500;
        margin-top: 0px;
    }
    .content-text{
        font-size: 18px;
        font-weight: 500;
    }
    .thanks-text {
        font-size: 18px;
        font-weight: 500;
    }
    #message{
         font-size: 14px;
        font-weight: 500;
        color: #5E0A83;
    }
    .hero-img{
        width:100%;
    }
}

/* Large devices laptops L*/
@media only screen and (min-width: 1025px) and (max-width: 1820px) {
.title .hero-text{
        font-size: 22px;
        color: #5E0A83;
        font-weight: 600;
    }
    .card-body svg{
        max-width: 25%;
    }
    .header-text,.content-text{
        text-align:center;
    }
    .header-text {
        font-size: 18px;
        color: #5E0A83;
        font-weight: 500;
        margin-top: 0px;
    }
    .content-text{
        font-size: 18px;
        font-weight: 500;
    }
    .thanks-text {
        font-size: 18px;
        font-weight: 500;
    }
    #message{
         font-size: 14px;
        font-weight: 500;
        color: #5E0A83;
    }
    .hero-img{
        width:20%;
    }
}

/* 4k Monitors devices screens*/
@media only screen and (min-width: 1821px) and (max-width: 2560px) {
.title .hero-text{
        font-size: 22px;
        color: #5E0A83;
        font-weight: 600;
    }
    .card-body svg{
        max-width: 20%;
    }
    .header-text,.content-text{
        text-align:center;
    }
    .header-text {
        font-size: 18px;
        color: #5E0A83;
        font-weight: 500;
        margin-top: 0px;
    }
    .content-text{
        font-size: 18px;
        font-weight: 500;
    }
    .thanks-text {
        font-size: 18px;
        font-weight: 500;
    }
    #message{
         font-size: 14px;
        font-weight: 500;
        color: #5E0A83;
    }
    .hero-img{
        width:20%;
    }
   
}
    </style>
</head>
<body>

    <!--English Text-->
    
    <!--<div class="success-message">Ticket Created Successfully</div>-->
    <!--<p>Your ticket has been submitted successfully. We'll get back to you soon!</p>-->
    
    <!--<button onclick="returnToTicketPage()">Create New Ticket</button>-->
    
    <!--Arabic Text-->
    <!-- <div class="success-message">تم إنشاء بطاقة طلب الخدمة بنجاح</div>-->
    <!--<p>لقد تم تقديم بطاقة طلب الخدمة بنجاح. سوف نعود اليكم قريبا!</p>-->
    
    <!--<button onclick="returnToTicketPage()">إنشاء بطاقة طلب الخدمة جديدة</button>-->

<div class="container content">
      <div class="col-xs-12 col-sm-6 col-md-4 align-items-center justify-content-center text-end">
                <div class="col-xl-12 text-center">
                    <!--<div class="mx-3 mx-md-5 mt-3">-->

                    <!--</div>-->
                  
                    <div id="lt-card" class="card">
                       
                        <div class="card-body w-100">
                                <div class="title">
                                    <h2 class="mb-3 hero-text">!تم رفع طلبك بنجاح</h2>
                                </div>
                            <div class="justify-content-center">
                                    <div class="justify-content-center">
                                        <img class="hero-img" src="https://support.anasacademy.uk/resources/views/images/SupportImgs-01.png" alt="slider1"/>

                                    </div>
                                    <h2 class="header-text">ستصلك تذكرة طلب الخدمة  إلى بريدك الإلكتروني المسجل<br>
يرجى استخدام رقم التذكرة لمتابعة حالة طلبك
</h2>
                                    <p  class="content-text">فريقنا الآن يعمل جاهداً للمراجعه طلبك والتواصل معك لخدمتك
<br>
نحن هنا لتلبية احتياجاتك وضمان راحتك الدراسية</p>
                                    <p  class="thanks-text"> !شكرًا لثقتكم بنا </p>
                            </div>
                            
                            <div class="justify-content-center btn-section">
                          
                                {{-- <button class="btn-style" onclick="returnToTicketPage()">العودة للصفحة الرئيسية</button> --}}
                                <button>
                                    <a style="text-decoration:none;color:#fff" href="{{ route('search') }}">متابعة طلب سابق</a>
                                </button>
                            
                            </div>
                          
                        </div>
                            <div class="justify-content-center btn-section">
                                <p id="message" class="content-text">
                                    
سوف يتم إعادة توجيك للصفحة الرئيسية بعد 10 ثوان                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

    <script>
        function returnToTicketPage() {
            window.location.href = "https://anasacademy.uk/";
        }
        
        window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "https://anasacademy.uk/";

    }, 10000);
    </script>
</body>
</html>
