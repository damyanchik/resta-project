<button type="{{ $type }}" class="shadow-lg btn btn-dark bg-dark p-2 px-2 rounded-pill">
    @if($iconSide == 'left')
        <i class="fa-solid {{ $icon }} rounded-circle mx-1 app_button__icon"></i>
        <span class="mx-1">{{ strtoupper($name) }}</span>
    @elseif($iconSide == 'right')
        <span class="mx-1">{{ strtoupper($name) }}</span>
        <i class="fa-solid {{ $icon }} rounded-circle mx-1 app_button__icon"></i>
    @else
        <span class="mx-2">{{ strtoupper($name) }}</span>
    @endif
</button>
