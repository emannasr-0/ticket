<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
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
<?php $__env->startSection('breadcrumb'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                                    <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                    <h6 class="mb-3"><?php echo e(__('Categories')); ?></h6>
                                    <h3 class="mb-0"><?php echo e($categories); ?></h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="card">
                                <div class="card-body dash_card_height">
                                    <div class="theme-avtar bg-info">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Open')); ?></p>
                                    <h6 class="mb-3"><?php echo e(__('Tickets')); ?></h6>
                                    <h3 class="mb-0"><?php echo e($open_ticket); ?> </h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="card">
                                <div class="card-body dash_card_height">
                                    <div class="theme-avtar bg-warning">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Closed')); ?></p>
                                    <h6 class="mb-3"><?php echo e(__('Tickets')); ?></h6>
                                    <h3 class="mb-0"><?php echo e($close_ticket); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="card">
                                <div class="card-body dash_card_height">
                                    <div class="theme-avtar bg-danger">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                    <h6 class="mb-3"><?php echo e(__('Agents')); ?></h6>
                                    <h3 class="mb-0"><?php echo e($agents); ?></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5">
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Tickets by Category')); ?></h5>
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
                    <h5><?php echo e(__('Students Reviews')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        <!-- Display Average Rating -->
                        <h4>Average Rating: <?php echo e(number_format($averageRating, 1)); ?></h4>
                    
                        <!-- Display Stars -->
                        <div class="star-rating">
                            <?php
                                $fullStars = floor($averageRating);
                                $halfStar = $averageRating - $fullStars >= 0.5;
                            ?>
                    
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= $fullStars): ?>
                                    <i class="fa fa-star"></i>
                                <?php elseif($halfStar && $i == $fullStars + 1): ?>
                                    <i class="fa fa-star-half-alt"></i>
                                <?php else: ?>
                                    <i class="far fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                         <!-- Display Number of Votes -->
                        <p class="votes-info">(<?php echo e($totalReviews ?? 0); ?> votes)</p>
                    </div>
                        <div class="col-md-8">
                            <!-- Display Rating Breakdown -->
                            <div class="rating-breakdown">
                                <?php for($i = 5; $i >= 1; $i--): ?>
                                    <div class="rating-line">
                                        <div class="rating-info">
                                            <strong><?php echo e($i); ?>    </strong>
                                            <div class="curved-line" style="width: <?php echo e(($ratingCounts[$i] ?? 0) * 20); ?>px;"></div>
                                        </div>
                                        <span class="votes">(<?php echo e($ratingCounts[$i] ?? 0); ?> votes)</span>
                                    </div>
                                <?php endfor; ?>
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
                            <h5><?php echo e(__('This Year Tickets')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div id="chartBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>

    <script>
        (function() {
            var chartBarOptions = {
                series: [{
                    name: '<?php echo e(__("Tickets")); ?>',
                    // data: [40, 20, 60, 15, 50, 65, 20, 40, 20, 60, 15, 50]
                    data: <?php echo json_encode(array_values($monthData)); ?>

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
                    categories: <?php echo json_encode(array_keys($monthData)); ?>,
                    title: {
                        text: '<?php echo e(__('Months')); ?>'
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
                        text: '<?php echo e(__('Tickets')); ?>'
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
                series: <?php echo json_encode($chartData['value']); ?>,
                colors: <?php echo json_encode($chartData['color']); ?>,
                labels: <?php echo json_encode($chartData['name']); ?>,
                legend: {
                    show: true
                }
            };
            var categoryPieChart = new ApexCharts(document.querySelector("#categoryPie"), categoryPieOptions);
            categoryPieChart.render();
        })();
    </script>
    
     <script src="<?php echo e(asset('assets/js/plugins/slick.min.js')); ?>"></script>
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
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\support\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>