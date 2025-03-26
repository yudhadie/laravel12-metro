@extends('admin.templates.default')

@section('content')
    <x-admin.content.container>

        <div class="col-lg-3 mb-5 mb-lg-10">
            <a href="#" class="card bg-body h-150px">
                <div class="card-body d-flex flex-column justify-content-between">
                    <span class="svg-icon svg-icon-muted svg-icon-2hx text-gray-900">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                fill="currentColor" />
                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                fill="currentColor" />
                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <div class="d-flex flex-column">
                        <div class="text-dark fw-bolder fs-1 mb-0 mt-5" id="qty">00</div>
                        <div class="text-dark fw-bold fs-6" id="result">Data</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-5 mb-lg-10">
            <a href="#"class="card card-flush border-0 h-150px" style="background-color: #17c653">
                <div class="card-body d-flex flex-column justify-content-between">
                    <span class="svg-icon svg-icon-muted svg-icon-2hx text-gray-900">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M11 20.8129C11 21.4129 10.5 21.9129 9.89999 21.8129C5.49999 21.2129 2 17.5128 2 12.9128C2 8.31283 5.39999 4.51281 9.89999 4.01281C10.5 3.91281 11 4.41281 11 5.01281V20.8129Z"
                                fill="currentColor" />
                            <path
                                d="M13 18.8129C13 19.4129 13.5 19.9129 14.1 19.8129C18.5 19.2129 22 15.5128 22 10.9128C22 6.31283 18.6 2.51281 14.1 2.01281C13.5 1.91281 13 2.41281 13 3.01281V18.8129Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <div class="d-flex flex-column">
                        <div class="text-dark fw-bolder fs-1 mb-0 mt-5">00</div>
                        <div class="text-dark fw-bold fs-6">Data</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2 mb-5 mb-lg-10">
            <a href="#" class="card card-flush border-0 h-150px" style="background-color: #f8285a">
                <div class="card-body d-flex flex-column justify-content-between">
                    <span class="svg-icon svg-icon-gray-500 svg-icon-2hx text-gray-900">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z"
                                fill="currentColor" />
                            <path
                                d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <div class="d-flex flex-column">
                        <div class="text-dark fw-bolder fs-1 mb-0 mt-5">00</div>
                        <div class="text-dark fw-bold fs-6">Data</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2 mb-5 mb-lg-10">
            <a href="#" class="card card-flush border-0 h-150px" style="background-color: #f6c000">
                <div class="card-body d-flex flex-column justify-content-between">
                    <span class="svg-icon svg-icon-muted svg-icon-2hx text-gray-900">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M21 11H18.9C18.5 7.9 16 5.49998 13 5.09998V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V5.09998C7.9 5.49998 5.50001 8 5.10001 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H5.10001C5.50001 16.1 8 18.4999 11 18.8999V21C11 21.6 11.4 22 12 22C12.6 22 13 21.6 13 21V18.8999C16.1 18.4999 18.5 16 18.9 13H21C21.6 13 22 12.6 22 12C22 11.4 21.6 11 21 11ZM12 17C9.2 17 7 14.8 7 12C7 9.2 9.2 7 12 7C14.8 7 17 9.2 17 12C17 14.8 14.8 17 12 17Z"
                                fill="currentColor" />
                            <path
                                d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <div class="d-flex flex-column">
                        <div class="text-dark fw-bolder fs-1 mb-0 mt-5">00</div>
                        <div class="text-dark fw-bold fs-6">Data</div>
                    </div>
                </div>
            </a>
        </div>



    </x-admin.content.container>
@endsection

@push('scripts')
    <x-admin.menu.active menu="menu-dashboard" />
@endpush
