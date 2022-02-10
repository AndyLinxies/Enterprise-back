<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        {{-- {{dd(Auth::user()->unreadNotifications)}} --}}
        @if (Auth::user()->unreadNotifications->count() != 0)
            
        
        @foreach ( Auth::user()->unreadNotifications as $notification )
        {{-- {{dd($notification->data )}} --}}
        @foreach ($notification->data as $notif)
            {{-- {{dd($notif)}} --}}
            
            
            {{-- <li><a class="dropdown-item" href="#">{{json_decode($notification->data["message"])}}</a></li> --}}
            <li><a class="dropdown-item" href="#">{{ json_encode($notif)}}</a></li>
            @endforeach
            
        @endforeach
        @else
        <li><p class="dropdown-item">No notification</p></li>
        @endif
      {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
    </ul>
  </div>