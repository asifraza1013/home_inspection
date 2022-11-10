<div>
    @php
        $notifications = auth()->user()->notifications;
        $totalNotifications = auth()->user()->unreadNotifications->count();
    @endphp
    <style>
        .bg-read{
            background-color: #c5cfe9;
        }
    </style>
    <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="badge badge-pill badge-sm badge-warning">{{$totalNotifications}}</span>
            <i class="ni ni-bell-55"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
            <!-- Dropdown header -->
            <div class="px-3 py-3">
                <h6 class="dropdown-header">
                    You have <strong class="text-primary">{{auth()->user()->unreadNotifications->count()}}</strong> notifications.
                  </h6>
            </div>

            <!-- List group -->
            <div class="list-group list-group-flush">
                @foreach ($notifications as $notification)
                    @php
                        $startTime = Carbon\Carbon::parse(Carbon\Carbon::now()->toDateTimeString());
                        $endTime = Carbon\Carbon::parse($notification->created_at);
                        $totalDuration = $endTime->diffForHumans($startTime);
                    @endphp
                    <a href="{{ $notification->data['user']['url'] }}" class="list-group-item list-group-item-action {{ (!$notification->read_at) ? 'bg-read': null }}">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="NAN" src={{ $notification->data['user']['image'] }}"
                                    class="avatar rounded-circle">
                            </div>
                            <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-0 text-sm">{{ $notification->data['user']['name'] }}</h4>
                                    </div>
                                    <div class="text-right text-muted">
                                        <small>{{ $totalDuration }}</small>
                                    </div>
                                </div>
                                <p class="text-sm mb-0">{{ $notification->data['data'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <hr>
            <!-- View all -->
            @if (auth()->user()->unreadNotifications->count())
                <a class="dropdown-item text-center text-primary font-weight-bold py-3" href="{{ route('databasenotifications.markasread') }}">Mark All as Read</a>
            @endif
        </div>
    </li>
</div>
