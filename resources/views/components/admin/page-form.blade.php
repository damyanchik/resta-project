<form action="{{ $action }}" method="{{ $formMethod }}">
    @csrf
    @method($bladeMethod)
    {{ $slot }}
</form>
