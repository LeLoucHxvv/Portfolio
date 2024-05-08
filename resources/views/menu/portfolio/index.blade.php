@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="portfolio-card">
                        <div class="d-flex align-items-center mt-2 position-relative">
                            <div class="rounded"
                                style="background: linear-gradient(to right, #4b78f5 , #8a88881a); padding: 3px; width: 30px; display: flex; justify-content: center; align-items: center;">
                                <i class="mdi mdi-folder-multiple" style="font-size: 20px;"></i>
                            </div>
                            <div class="mx-2 mt-1" style="font-family: 'Roboto', sans-serif;">
                                <h2 style="font-weight: 700;">My Portfolio</h2>
                            </div>
                            {{-- <button class="btn btn-primary btn-sm position-absolute top-0 end-0">Button</button> --}}
                            <button id="add-portfolio-btn"
                                class="btn btn-inverse-primary btn-sm position-absolute top-0 end-0 d-flex align-items-center">
                                <i class="mdi mdi-plus mr-1"></i>
                                <span>Portfolio</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="card shadow-0 border rounded-3">
                                    <div class="card-body">
                                        @if ($portfolio->isEmpty())
                                            <td colspan="6" class="text-center" style="text-align: center;">
                                                <img src="https://onlyhdwallpapers.com/wallpaper/nichijou-empty-anime-3cdp.jpg"
                                                    alt="No data"
                                                    style="width: 100%; max-height: 50vh; display: block; margin: 0 auto;">
                                                <p class="mt-2"
                                                    style="font-size: 30px; color: #0b096e; text-align: center; font-family: 'Caveat', cursive;">
                                                    Currently lacking data. Please add!
                                                </p>
                                            </td>
                                        @else
                                            <div class="row">
                                                @foreach ($portfolio as $portfolios)
                                                    <div class="col-md-6 col-lg-3 col-xl-3 mb-3">
                                                        <div class="d-flex flex-row align-items-center mb-1">
                                                            <h4 class="mb-1 me-1">{{ $portfolios->name }}</h4>
                                                        </div>
                                                        <div class="portfolio-image-container">
                                                            <div class="portfolio-image-container">
                                                                <img src="{{ asset('storage/portpolyo/' . $portfolios->img) }}"
                                                                    class="w-100 image-fixed-height" alt="portfolio-image"
                                                                    id="portfolio-image-{{ $portfolios->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column mt-2">
                                                            <button class="btn btn-outline-info btn-sm" id="view-portfolio-btn"
                                                                data-id={{ $portfolios->id }}>
                                                                Details
                                                            </button>
                                                            <button
                                                                class="delete-btn delete btn btn-outline-danger btn-sm mt-1"
                                                                data-id={{ $portfolios->id }}>
                                                                <i class="fas fa-trash text-white"></i>
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © LelouchXv</span>
        </div>
    </footer>
    @include('menu.portfolio.modal')
    @include('menu.portfolio.script')
@endsection
