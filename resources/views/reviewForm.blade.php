@extends('layouts.auth')

@section('page-title')
    {{ __('Review Form') }}
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('css/floating_chat.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
@endpush
<style>
        .m-footer{
        text-align:center !important;
       display:block;
       margin-top:170px;
   }
   /* Add your custom styles for the review form here */
        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }

        .review-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input:checked ~ label {
            color: #f39c12;
        }
        
        .comment-section {
        margin-bottom: 20px;
    }

    .comment-section label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .comment-section textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        resize: vertical;
    }


        
        #submit-btn {
            background-color: #f39c12;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #popup-message {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

</style>
@section('content')


@include('admin.template.Header')
<br><br><br><br>
<div class="review-form">
    <h2>{{ __('اترك تقييمك') }}</h2>

    <form id="review-form" action="{{ url("/review/{$ticket_id}") }}" method="POST" >
        @csrf
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5" required/>
            <label for="star5" title="5 stars">&#9733;</label>

            <input type="radio" id="star4" name="rating" value="4" required/>
            <label for="star4" title="4 stars">&#9733;</label>

            <input type="radio" id="star3" name="rating" value="3" required/>
            <label for="star3" title="3 stars">&#9733;</label>

            <input type="radio" id="star2" name="rating" value="2" required/>
            <label for="star2" title="2 stars">&#9733;</label>

            <input type="radio" id="star1" name="rating" value="1" required/>
            <label for="star1" title="1 star">&#9733;</label>
        </div>
        
         <div class="comment-section">
            <label for="comment">{{ __('تعليقك') }}</label>
            <textarea name="comment" rows="4" placeholder="{{ __('اخبرنا عن تجربتك. . .') }}"></textarea>
        </div>
        
        <button type="submit" id="submit-btn" onclick="submitReview()">{{ __('إرسال تقييمك') }}</button>
    </form>
</div>

<div id="popup-message">
    <p>{{ __('شكرا لتقييمك!') }}</p>
   
</div>
<br>
 <div class="m-footer">
         @include('admin.template.Footer')

    </div>
    
@endsection

@push('scripts')
<script>
        function submitReview() {
            if (document.querySelector('input[name="rating"]:checked')) {
                document.getElementById('popup-message').style.display = 'block';
            } else {
                alert("Please select a rating before submitting.");
            }
        }
    </script>
@endpush