@extends('layouts.admin')

@section('page-title')
    {{ __('Dashboard') }}
@endsection
<style>
.rating-breakdown {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.rating-line {
    margin-bottom: 8px;
}

.rating-info {
    display: flex;
    align-items: center;
}

.curved-line {
    height: 10px; /* Adjust the height as needed */
    background-color: #5cb85c; /* Set the color of the curved line */
    border-radius: 5px; /* Set the border-radius to create curved ends */
    margin-right: 8px; /* Adjust the margin between the curved line and the text */
     margin-left: 10px; 
}

.votes {
    font-size: 14px;
    color: #777; /* Set the votes text color */
}
.star-rating .fa-star,
.star-rating .fa-star-half-alt {
    color:#ff9600;
}



</style>
@section('breadcrumb')
    {{-- <li class="breadcrumb-item">{{ __('Home') }}</li> --}}
@endsection
{{-- @section('action-button')
        @if(\Auth::user()->parent == 0)
            <a href="#" class="btn btn-sm btn-primary btn-icon cp_link" data-link="" data-toggle="tooltip" data-original-title="{{__('Click to copy invoice link')}}" title="{{__('Click To Copy Support Ticket Url')}}" data-bs-toggle="tooltip" data-bs-placement="top">
            <i class="ti ti-copy"></i>
            </a>
    @endif
@endsection --}}
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xxl-7">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="card">
                                <div class="card-body dash_card_height">
                                    <div class="theme-avtar bg-primary">
                                        <i class="fas fa-list-alt"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2">{{ __('Total') }}</p>
                                    <h6 class="mb-3">{{ __('Categories') }}</h6>
                                    <h3 class="mb-0">{{ $categories }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="card">
                                <div class="card-body dash_card_height">
                                    <div class="theme-avtar bg-info">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2">{{ __('Open') }}</p>
                                    <h6 class="mb-3">{{ __('Tickets') }}</h6>
                                    <h3 class="mb-0">{{ $open_ticket }} </h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="card">
                                <div class="card-body dash_card_height">
                                    <div class="theme-avtar bg-warning">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2">{{ __('Closed') }}</p>
                                    <h6 class="mb-3">{{ __('Tickets') }}</h6>
                                    <h3 class="mb-0">{{ $close_ticket }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="card">
                                <div class="card-body dash_card_height">
                                    <div class="theme-avtar bg-danger">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2">{{ __('Total') }}</p>
                                    <h6 class="mb-3">{{ __('Agents') }}</h6>
                                    <h3 class="mb-0">{{ $agents }}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Tickets by Category') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div id="categoryPie"></div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
    <!--///////////////////////////////////////-->
     <!-- Review Section -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Students Reviews') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        <!-- Display Average Rating -->
                        <h4>Average Rating: {{ number_format($averageRating, 1) }}</h4>
                    
                        <!-- Display Stars -->
                        <div class="star-rating">
                            @php
                                $fullStars = floor($averageRating);
                                $halfStar = $averageRating - $fullStars >= 0.5;
                            @endphp
                    
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullStars)
                                    <i class="fa fa-star"></i>
                                @elseif ($halfStar && $i == $fullStars + 1)
                                    <i class="fa fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                         <!-- Display Number of Votes -->
                        <p class="votes-info">({{ $totalReviews ?? 0 }} votes)</p>
                    </div>
                        <div class="col-md-8">
                            <!-- Display Rating Breakdown -->
                            <div class="rating-breakdown">
                                @for ($i = 5; $i >= 1; $i--)
                                    <div class="rating-line">
                                        <div class="rating-info">
                                            <strong>{{ $i }}    </strong>
                                            <div class="curved-line" style="width: {{ ($ratingCounts[$i] ?? 0) * 20 }}px;"></div>
                                        </div>
                                        <span class="votes">({{ $ratingCounts[$i] ?? 0 }} votes)</span>
                                    </div>
                                @endfor
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!---->
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('This Year Tickets') }}</h5>
                        </div>
                        <div class="card-body">
                            <div id="chartBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>

    <script>
        (function() {
            var chartBarOptions = {
                series: [{
                    name: '{{ __("Tickets") }}',
                    // data: [40, 20, 60, 15, 50, 65, 20, 40, 20, 60, 15, 50]
                    data: {!! json_encode(array_values($monthData)) !!}
                }, ],

                chart: {
                    height: 150,
                    type: 'area',
                    // type: 'line',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                title: {
                    text: '',
                    align: 'left'
                },
                xaxis: {
                    categories: {!! json_encode(array_keys($monthData)) !!},
                    title: {
                        text: '{{ __('Months') }}'
                    }
                },
                colors: ['#ffa21d', '#FF3A6E'],

                grid: {
                    strokeDashArray: 4,
                },
                legend: {
                    show: false,
                },
                markers: {
                    size: 4,
                    colors: ['#ffa21d', '#FF3A6E'],
                    opacity: 0.9,
                    strokeWidth: 2,
                    hover: {
                        size: 7,
                    }
                },
                yaxis: {
                    title: {
                        text: '{{ __('Tickets') }}'
                    },
                    tickAmount: 3,
                    min: 10,
                    max: 70,
                }
            };
            var arChart = new ApexCharts(document.querySelector("#chartBar"), chartBarOptions);
            arChart.render();
        })();
        (function() {
            var categoryPieOptions = {
                chart: {
                    height: 140,
                    type: 'donut',
                },
                dataLabels: {
                    enabled: false,
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                        }
                    }
                },
                series: {!! json_encode($chartData['value']) !!},
                colors: {!! json_encode($chartData['color']) !!},
                labels: {!! json_encode($chartData['name']) !!},
                legend: {
                    show: true
                }
            };
            var categoryPieChart = new ApexCharts(document.querySelector("#categoryPie"), categoryPieOptions);
            categoryPieChart.render();
        })();
    </script>
    
     <script src="{{ asset('assets/js/plugins/slick.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Initialize Slick carousel
            $('.slick-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000, // Adjust as needed
                dots: true,
            });
        });
    </script>
    
@endpush
