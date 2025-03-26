@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.form.show name='ID' :value='$data->id' />
        <x-admin.form.show name='Data' :value='$data->log_name' />
        <x-admin.form.show name='User' :value="$data->user->name ?? 'unknown'" />
        <x-admin.form.show name='Time:' value="{{ Carbon\Carbon::parse($data->created_at) }}" />
        <x-admin.form.show name='Event' :value="$data->event" />

        <div class="row mb-7">
            <label class="col-lg-2 fw-semibold text-muted">Action</label>

            @if (isset($properties->old))
                <div class="col-lg-5">
                    <div class="d-flex flex-column">
                        <h5>OLD</h5>
                        @foreach ($properties->old as $key => $value)
                            @if ($key != 'created_at' && $key != 'updated_at')
                                <li class="d-flex align-items-center py-2">
                                    <span class="bullet me-5"></span> {{ $key }} : {{ $value }}
                                </li>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            @if (isset($properties->attributes))
                <div class="col-lg-5">
                    <div class="d-flex flex-column">
                        <h5>NEW</h5>
                        @foreach ($properties->attributes as $key => $value)
                            @if ($key != 'created_at' && $key != 'updated_at')
                                <li class="d-flex align-items-center py-2">
                                    <span class="bullet me-5"></span> {{ $key }} : {{ $value }}
                                </li>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

        <x-admin.card.footer>
            <x-admin.button.back href="{{ route('log-activity.index') }}" />
        </x-admin.card.footer>
    </x-admin.card.default>

@endsection

@push('scripts')
    <x-admin.menu.show menu="menu-info" />
    <x-admin.menu.active menu="menu-info-activity" />
@endpush
