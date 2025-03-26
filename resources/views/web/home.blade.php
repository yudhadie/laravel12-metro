@extends('web.templates.default')

@section('content')
    <div class="mb-n10 mb-lg-n20 z-index-2">
        <div class="container">
            <div class="text-center mb-17">
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">How it
                    Works</h3>
                <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                    <br />for different amazing and great useful admin
                </div>
            </div>
            <div class="row w-100 gy-10 mb-md-20">
                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">Jane Miller</div>
                        </div>
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                            <br />by using single tool for different
                            <br />amazing and great
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">Setup Your App</div>
                        </div>
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                            <br />by using single tool for different
                            <br />amazing and great
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">Enjoy Nautica App</div>
                        </div>
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                            <br />by using single tool for different
                            <br />amazing and great
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <x-admin.menu.active menu="menu-home" />
@endpush
