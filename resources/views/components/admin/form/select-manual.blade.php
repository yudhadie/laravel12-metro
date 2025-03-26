<div class="{{ $class }}">
    @if ($label != '')
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="{{ $attributes->has('required') ? 'required' : '' }}">
                {{ $label }}
            </span>
        </label>
    @endif
    <select class="form-select form-select-solid form-select-lg fw-bold" name="{{ $name }}" data-control="select2"
        data-placeholder="{{ $attributes->has('data-placeholder') ? $attributes['data-placeholder'] : 'Pilih Satu...' }}"
        {{ $attributes->has('disabled') ? 'disabled' : '' }} {{ $attributes->has('readonly') ? 'readonly' : '' }}
        {{ $attributes }} value="{{ $value }}">
        {{ $slot }}
    </select>
</div>
