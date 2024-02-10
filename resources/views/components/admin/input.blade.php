<div class="{{ $col ?? 'col' }}">
    <div class="form-floating">
        <input {{ $attributes->merge(['class' => 'form-control', 'name' => $name, 'id' => $name]) }} />
        <label for="{{ $name }}">{{ $label }}</label>
    </div>
</div>
