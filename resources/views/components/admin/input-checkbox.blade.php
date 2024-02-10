<div class="col">
    <div class="form-floating">
        @if(isset($isHidden) && $isHidden)
            <x-admin.input-hidden name="{{ $name }}" value="0" />
        @endif
        <input
            {{ $attributes->merge(['class' => 'form-check-input', 'value' => 1, 'name' => $name, 'id' => $name, 'type' => 'checkbox']) }}
            {{ $check ? 'checked' : '' }}
        />
        <label for="{{ $name }}">{{ $label }}</label>
    </div>
</div>
