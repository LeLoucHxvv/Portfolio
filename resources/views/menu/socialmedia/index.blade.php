@extends('layouts.admin')

@section('content')
    {{-- <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote" style="color: rgb(25, 25, 219);">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="card-title" style="color: rgb(41, 41, 228); font-size: 1.5em;">Social
                                    Media</h3>
                                <button id="add-socmed-btn" class="btn btn-primary p-2">
                                    <i class="mdi mdi-plus mr-1"></i>
                                    <span> Add Links</span>
                                </button>
                            </div>
                            <form id="socmed-forms">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"> Social media </th>
                                            <th scope="col"> Social media type</th>
                                            <th scope="col"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($socialMedia as $key => $socialMedias)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $socialMedias->social_link }}</td>
                                                <td>{{ $socialMedias->social_media }}</td>
                                                <td>
                                                    <button id="edit-socmed-btn" class="btn btn-warning p-2"
                                                        data-id="{{ $socialMedias->id }}" title="Edit">
                                                        <i class="mdi mdi-pencil text-white"></i>
                                                    </button>
                                                    <button class="delete-btn btn btn-danger p-2" title="Delete"
                                                        data-id="{{ $socialMedias->id }}">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex align-items-center mt-2 position-relative">
                            <div class="rounded"
                                style="background: linear-gradient(to right, #4b78f5 , #8a88881a); padding: 3px; width: 30px; display: flex; justify-content: center; align-items: center;">
                                <i class="mdi mdi-account-group" style="font-size: 20px;"></i>
                            </div>
                            <div class="mx-2 mt-1" style="font-family: 'Roboto', sans-serif;">
                                <h2 style="font-weight: 700;">My Social Media</h2>
                            </div>
                            {{-- <button class="btn btn-primary btn-sm position-absolute top-0 end-0">Button</button> --}}
                            <button id="add-socmed-btn"
                                class="btn btn-inverse-primary btn-sm position-absolute top-0 end-0 d-flex align-items-center">
                                <i class="mdi mdi-plus mr-1"></i>
                                <span>Links</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote" style="color: rgb(25, 25, 219);">
                            <form id="socmed-forms">
                                @if ($socialMedia->isEmpty())
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
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    {{-- <th scope="col">#</th> --}}
                                                    <th scope="col">Social media</th>
                                                    <th scope="col">Social media type</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($socialMedia as $key => $socialMedias)
                                                    <tr>
                                                        {{-- <th scope="row">{{ $key + 1 }}</th> --}}
                                                        <td>{{ $socialMedias->social_link }}</td>
                                                        <td>{{ $socialMedias->social_media }}</td>
                                                        <td>
                                                            <button id="edit-socmed-btn" class="btn btn-outline-info btn-xs"
                                                                data-id="{{ $socialMedias->id }}" title="Edit">
                                                                <i class="mdi mdi-pencil "></i>
                                                            </button>
                                                            <button class="delete-btn btn btn-outline-danger btn-xs" title="Delete"
                                                                data-id="{{ $socialMedias->id }}">
                                                                <i class="mdi mdi-trash-can"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </form>
                        </blockquote>
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
    @include('menu.socialmedia.modal.modal')
    @include('menu.socialmedia.script.action')
@endsection
