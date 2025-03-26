<div {{ $attributes }}>
    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
        <span class="{{ $attributes->has('required') ? 'required' : '' }}">
            {{ $label }}
        </span>
    </label>
    <div>
        {{ $slot }}
    </div>
</div>
