<div class="col">
    <div class="form-floating">
        <textarea {{ $attributes->merge(['class' => 'form-control', 'name' => $name, 'id' => $name]) }}>{{ $slot }}</textarea>
        <label for="{{ $name }}">{{ $label }}</label>
    </div>
</div>
