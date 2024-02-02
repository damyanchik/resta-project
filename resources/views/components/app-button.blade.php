<button type="{{ $type }}" class="shadow-lg btn btn-dark bg-dark rounded-pill py-0" style="height: 7vh; font-size: 2vh">
    @if($iconSide == 'left')
        <i class="fa-solid {{ $icon }} rounded-circle py-1 mx-1 app_button__icon" style="height: 3vh; font-size: 2vh"></i>
        <span class="mx-1">{{ strtoupper($name) }}</span>
    @elseif($iconSide == 'right')
        <span class="mx-1">{{ strtoupper($name) }}</span>
        <i class="fa-solid {{ $icon }} rounded-circle py-1 mx-1 app_button__icon" style="height: 3vh; font-size: 2vh"></i>
    @else
        <span class="mx-2">{{ strtoupper($name) }}</span>
    @endif
</button>
