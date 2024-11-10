

@php

$settings = App\Models\Utility::settings();
$logo = \App\Models\Utility::get_file('public/');
$Lang = \App\Models\Languages::where('code',$currantLang)->first();

@endphp
<style>
    
    #notification-dropdown {
    display: none;
}

</style>
@if ($settings['cust_theme_bg'] == 'on' )
    <header class="dash-header transprent-bg">
@else
    <header class="dash-header">
@endif
    <div class="header-wrapper">
        <div class="me-auto dash-mob-drp">
            <ul class="list-unstyled">
                <li class="dash-h-item mob-hamburger">
                    <a href="#!" class="dash-head-link" id="mobile-collapse">
                        <div class="hamburger hamburger--arrowturn">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="dropdown dash-h-item drp-company">
                    <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                        <span class="theme-avtar">
                            <img src="{{(!empty(\Auth::user()->avatar))? ($logo.\Auth::user()->avatar): $logo."/avatar.png"}}" class="header-avtar" width="50">
                        </span>
                        <span class="hide-mob ms-2">{{__('Hi')}}, {{ Auth::user()->name }}</span>
                        <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                    </a>
                    <div class="dropdown-menu dash-h-dropdown">

                        <a href="{{ Auth::user()->profilelink }}" class="dropdown-item">
                            <i class="ti ti-user"></i>
                            <span>{{ __('Profile') }}</span>
                        </a>
                        <a href="#!" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="ti ti-power"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        @php
            $unseenCounter = App\Models\FloatingChatMessage::where('id', Auth::user()->id)
                ->where('is_read', 0)
                ->count();
        @endphp
        <div class="ms-auto">
            <ul class="list-unstyled">
               <li class="dropdown dash-h-item drp-language">
                    <a id="notification-dropdown-link" class="dash-head-link dropdown-toggle arrow-none me-0" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span id="notification-counter" class="bg-danger px-1 mb-1 dash-h-badge message-counter custom_messanger_counter">0<span class="sr-only"></span></span>
                    </a>
                    <div id="notification-dropdown" class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                        <!-- Notifications will be dynamically added here using JavaScript -->
                    </div>
                </li>




                @if(\Auth::user()->type != 'Super Admin' && \Auth::user()->type != 'Agent')
                @if(Utility::settings()['CHAT_MODULE'] == 'yes')
                    <li class="dash-h-item">
                        <a class="dash-head-link me-0" href="{{ route('admin.chats') }}">
                            <i class="ti ti-message-circle"></i>
                           <span class="bg-danger px-1 mb-1 dash-h-badge message-counter custom_messanger_counter">1</span><span class="sr-only"></span>
                        </a>
                    </li>
                @endif
                @endif
                <li class="dropdown dash-h-item drp-language">
                    <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-world nocolor"></i>
                        <span class="drp-text hide-mob">{{ ucFirst($Lang->fullName) }}</span>
                        <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                    </a>
                    <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                       @foreach (App\Models\Utility::languages() as $code => $lang)
                       <a href="{{ route('admin.lang.update', $code) }}"
                           class="dropdown-item {{ $currantLang == $code ? 'text-primary' : '' }}">
                           <span>{{ucFirst($lang)}}</span>
                       </a>
                       @endforeach

                        @if (\Auth::user()->parent == 0)
                            @can('lang-create')
                                <a href="#" data-url="{{ route('admin.lang.create') }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create New Language')}}" class="dropdown-item border-top py-1 text-primary"
                                >{{ __('Create Language') }}</a>
                            </a>
                            @endcan
                            @can('lang-manage')
                                <a href="{{ route('admin.lang.index', [$currantLang]) }}"
                                class="dropdown-item border-top py-1 text-primary">{{ __('Manage Languages') }}
                                </a>
                            @endcan
                        @endif

                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</header>


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function () {
    var notificationSound = new Audio('https://support.anasacademy.uk//storage/public/sound.mp3');
    notificationSound.addEventListener('error', function (e) {
        console.error('Error loading sound:', e);
    });

    var notificationDropdown = $('#notification-dropdown');
    var notificationCounter = $('#notification-counter');

    $('#notification-dropdown-link').click(function (event) {
        event.stopPropagation();

        notificationDropdown.toggle();
    });

    $(document).click(function (event) {
        if (!$(event.target).closest('#notification-dropdown-link').length) {
            notificationDropdown.hide();
        }
    });

    fetchNotifications();

    setInterval(fetchNotifications, 1000);

    function fetchNotifications() {
        $.ajax({
            url: '{{ route("admin.notifications.fetch") }}',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (Array.isArray(response.notifications)) {
                    updateNotifications(response.notifications);
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
        var previousCount = parseInt(notificationCounter.text(), 10);
        notificationCounter.text(notifications.length);

        notificationDropdown.empty();

        var markAllUrl = '{{ route("admin.notifications.markAllRead") }}';
        notificationDropdown.append('<a href="' + markAllUrl + '" class="dropdown-item" style="font-size: 12px; color: blue; text-align: right;">Mark All as Read</a>');

        if (notifications.length > 0) {
            notificationDropdown.append('<div class="dropdown-divider"></div>');

            notifications.forEach(function (notification) {
                var routeUrl = '{{ route("admin.notifications.markAsRead", ["id" => ":id"]) }}';
                routeUrl = routeUrl.replace(':id', notification.id);

                notificationDropdown.append('<a href="' + routeUrl + '" class="dropdown-item">' + notification.data + '</a>');
            });

            var newCount = parseInt(notificationCounter.text(), 10);
            if (newCount > previousCount) {
                try {
                    notificationSound.play().then(function () {
                        console.log('Sound played successfully.');
                    }).catch(function (error) {
                        console.error('Error playing sound:', error);
                    });
                } catch (error) {
                    console.error('Error playing sound:', error);
                }
            }
        }
    }
});

</script>



