
<?php
    $logos=\App\Models\Utility::get_file('uploads/logo/');

?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HDC6PZL05W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HDC6PZL05W');
</script>
<style>
  
    body{
        font-family: 'IBM Plex Sans Arabic' !important;
        background: #fff !important;
    
    }
   .navbar-expand-md .hc{
    flex-direction: row-reverse !important;
}
   .nbtn {
        background: #5E0A83 !important;
    }
    .hbtn{
        background: #fff !important;
        color: #5E0A83 !important;
        border:2px solid #5E0A83;
    }
    .hbtn:hover{
        background: #5E0A83 !important;
        color:#fff !important;
        border:2px solid #5E0A83;
    }
   .form-control, .custom-select, .dataTable-selector, .dataTable-input,# {
   
        color: #293240;
        background-color: #fff;
        border: 1px solid #5E0A83 !important;
        border-radius: 6px;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    button{
        min-width:200px !important;
    }
    .mainstyle{
        padding:28px;
    }

    .navbar-brand{
        margin: 0px !important;
    }
    
 /*smart watch*/
 @media only screen and (min-width: 319px) and (max-width: 420px) {
 
    .navbar-brand{
        margin:0px;
    }
    #ticket_button{
       font-size: 10px;
        padding: 8px 
    }
 }
 
/*phones*/
@media only screen and (min-width: 421px) and (max-width: 600px) {
  
  
    
}
/*tablets*/
@media only screen and (min-width: 601px) and (max-width: 768px) {
  
     .hc{
        justify-content:space-between !important;
    }
    .hc .nva{
        margin:0 2% !important;
    }
    
}

/* Large devices laptops*/
@media only screen and (min-width: 769px) and (max-width: 1024px) {
    .hc{
        justify-content:space-between !important;
    }
    .hc .nva{
        margin:0 15% !important;
    }
 
}

/* Large devices laptops L*/
@media only screen and (min-width: 1025px) and (max-width: 1820px) {

  .hc{
        justify-content:space-between !important;
    }
    .hc .nva{
        margin:0 !important;
    }
}

/* 4k Monitors devices screens*/
@media only screen and (min-width: 1821px) and (max-width: 2560px) {

   .hc{
        justify-content:space-between !important;
    }
    .hc .nva{
        margin:0 !important;
    }
    
}

</style>
  <div class="container">
        <nav class="navbar navbar-expand-md navbar-light default">
                <div class="container-fluid pe-2 hc">
                    <a class="navbar-brand" href="https://www.anasacademy.uk">

                        <img src="<?php echo e($logos.'logo-light.png'.'?'.time()); ?>" alt="logo"  style="width:150px;"/>

                    </a>
                             <div class="nav-item nva">  
                                <div class="text-center">
                                        <a class="btn btn-primary btn-block mt-2 nbtn" id="ticket_button" href="https://www.anasacademy.uk" style="color:#fff">العودة للصفحة الرئيسية</a>
                                </div>
                            </div>
                    <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"-->
                    <!--    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">-->
                    <!--    <span class="navbar-toggler-icon"></span>-->
                    <!--</button>-->
                    <!--<div class="collapse navbar-collapse" id="navbarTogglerDemo01">-->
                        
                    <!--    <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">-->
                    <!--        <li class="nav-item nva">  -->
                    <!--            <div class="text-center">-->
                    <!--                <div class="d-block ">-->
                    <!--                    <a class="btn btn-primary btn-block mt-2 nbtn" id="ticket_button" href="https://www.anasacademy.uk" style="color:#fff">العودة للصفحة الرئيسية</a>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                </div>
            </nav>
    </div><?php /**PATH /home/anasacad/support.anasacademy.uk/resources/views/admin/template/Header.blade.php ENDPATH**/ ?>