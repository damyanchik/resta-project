<div class="col">
    <div class="form-floating">
        <input {{ $attributes->merge(['class' => 'form-check-input', 'name' => $name, 'id' => $name, 'type' => 'checkbox']) }}
            {{ $value ? 'checked' : '' }}
        />
        <label for="{{ $name }}">{{ $label }}</label>
    </div>
</div>
