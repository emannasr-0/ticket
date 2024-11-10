   <?php
       $logo = Utility::get_superadmin_logo();
       $emailTemplate     = App\Models\EmailTemplate::first();
       $logos = \App\Models\Utility::get_file('uploads/logo/');
   ?>

<?php if(isset($settings['cust_theme_bg']) && $settings['cust_theme_bg'] == 'on' || $settings['SITE_RTL'] =='on'): ?>
    <nav class="dash-sidebar light-sidebar transprent-bg">
<?php else: ?>
    <nav class="dash-sidebar light-sidebar">
<?php endif; ?>



    <div class="navbar-wrapper">
        <div class="m-header main-logo">
            <a href="<?php echo e(route('home')); ?>" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                
                <img src="<?php echo e($logos . (isset($logo) && !empty($logo) ? $logo .'?'.time(): 'logo-dark.png'.'?'.time())); ?>"
                alt="<?php echo e(config('app.name', 'TicketGo SaaS')); ?>" class="logo logo-lg">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="dash-navbar">
                <li class="dash-item <?php echo e(request()->is('*dashboard*') ? ' active' : ''); ?>">
                    <a href="<?php echo e(route('home')); ?>" class="dash-link "><span class="dash-micon"><i class="ti ti-home"></i></span><span class="dash-mtext"><?php echo e(__('Dashboard')); ?></span></a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-users')): ?>
                    <li class="dash-item <?php echo e(request()->is('*users*') ? ' active' : ''); ?>">
                        <a href="<?php echo e(route('admin.users')); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-users"></i></span><span class="dash-mtext"><?php echo e(__('Users')); ?></span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-tickets')): ?>
                    <li class="dash-item <?php echo e(request()->is('*ticket*') ? ' active' : ''); ?>">
                        <a href="<?php echo e(route('admin.tickets.index')); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-ticket"></i></span><span class="dash-mtext"><?php echo e(__('Tickets')); ?></span>
                        <span id="sidebar-ticket-count" class="badge bg-danger"></span></a>
                    </li>
                    
                <?php endif; ?>
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-reviews')): ?>
                    <li class="dash-item <?php echo e(request()->is('*review*') ? ' active' : ''); ?>">
                        <a href="<?php echo e(route('admin.reviews.index')); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-ticket"></i></span><span class="dash-mtext"><?php echo e(__('Reviews')); ?></span>
                        <span id="sidebar-ticket-count" class="badge bg-danger"></span></a>
                    </li>
                    
                <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-faq')): ?>
                    <?php if(Utility::getSettingValByName('FAQ') == 'on'): ?>
                        <li class="dash-item <?php echo e(request()->is('*faq*') ? ' active' : ''); ?>">
                            <a href="<?php echo e(route('admin.faq')); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-question-mark"></i></span><span class="dash-mtext"><?php echo e(__('FAQ')); ?></span></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(Utility::getSettingValByName('CHAT_MODULE') == 'yes'): ?>
                    <li class="dash-item <?php echo e(request()->is('*Messenger*') ? ' active' : ''); ?>">
                        <a href="<?php echo e(route('admin.chats')); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-brand-hipchat"></i></span><span class="dash-mtext"><?php echo e(__('Messenger')); ?></span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-knowledge')): ?>
                    <?php if(Utility::getSettingValByName('Knowlwdge_Base') == 'on'): ?>
                        <li class="dash-item <?php echo e(request()->is('*knowledge*') ? ' active' : ''); ?>">
                            <a href="<?php echo e(route('admin.knowledge')); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-school"></i></span><span class="dash-mtext"><?php echo e(__('Knowledge Base')); ?></span></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                
               

                <?php if(\Auth::user()->parent == 0): ?>
                <li class="dash-item <?php echo e((\Request::route()->getName()=='notification-templates.index') ? ' active' : ''); ?>">
                 <a href="<?php echo e(route('notification-templates.index')); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-notification"></i></span><span class="dash-mtext"><?php echo e(__('Notification')); ?></span></a>
                 </li>
               <?php endif; ?>

                <?php if(\Auth::user()->parent == 0): ?>
                <li class="dash-item <?php echo e(request()->is('*email*') ? ' active' : ''); ?>">
                    <a href="<?php echo e(route('manage.email.language',[$emailTemplate ->id,\Auth::user()->lang])); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-template"></i></span><span class="dash-mtext"><?php echo e(__('Email Template')); ?></span></a>
                </li>
                <?php endif; ?>

                <?php if(\Auth::user()->parent == 0): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('admin.category')); ?>" class="dash-link"><span class="dash-micon"><i
                                class="ti ti-layout-2"></i></span><span
                            class="dash-mtext"><?php echo e(__('Setup')); ?></span></a>
                </li>
               <?php endif; ?>

                <?php if(\Auth::user()->parent == 0): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-setting')): ?>
                    <li class="dash-item <?php echo e(request()->is('*setting*') ? ' active' : ''); ?>">
                        <a href="<?php echo e(route('admin.settings.index')); ?>" class="dash-link"><span class="dash-micon"><i class="ti ti-settings"></i></span><span class="dash-mtext"><?php echo e(__('Settings')); ?></span></a>
                    </li>
                <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function () {
    setInterval(fetchNotifications, 1000);

    function fetchNotifications() {
        $.ajax({
            url: '<?php echo e(route("admin.notifications.fetch")); ?>',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.notifications) {
                    updateNotifications(response.notifications);

                    // Check if there are new ticket notifications
                    var newTicketNotifications = response.notifications.filter(function (notification) {
                        return notification.type === 'new_ticket';
                    });

                    // Update the ticket count in the sidebar
                    updateTicketCount(newTicketNotifications.length);
                } else {
                    console.error('Invalid response format:', response);
                }
            },
            error: function (error) {
                console.error('Error fetching notifications:', error);
            },
        });
    }

    function updateNotifications(notifications) {
       
    }

    function updateTicketCount(newTicketCount) {
        // Assuming you have an element for displaying ticket count in the sidebar
        var ticketCountElement = $('#sidebar-ticket-count');

        // Update the ticket count in the sidebar
        ticketCountElement.text(newTicketCount);

        // Show or hide the ticket count element based on whether there are new tickets
        ticketCountElement.toggleClass('d-none', newTicketCount === 0);
    }

    // Initial fetch on document ready
    fetchNotifications();
});
///////////////////////

</script>

<?php /**PATH /home/anasacad/support.anasacademy.uk/resources/views/admin/partials/sidebar.blade.php ENDPATH**/ ?>