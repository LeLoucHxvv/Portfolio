@extends('layouts.admin')

@section('content')
    {{-- <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote" style="color: rgb(25, 25, 219);">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="card-title" style="color: rgb(41, 41, 228); font-size: 1.5em;">Skills</h3>
                                <button id="add-skill-btn" class="btn btn-primary p-2">
                                    <i class="mdi mdi-plus mr-1"></i>
                                    <span> Add Skill</span>
                                </button>
                            </div>
                            <form id="skill-forms">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"> Skills </th>
                                            <th scope="col"> Year Experience</th>

                                            <th scope="col"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skill as $key => $skills)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $skills->skill }}</td>

                                                <td>
                                                    <button id="edit-skill-btn" class="btn btn-warning p-2"
                                                        data-id="{{ $skills->id }}" title="Edit">
                                                        <i class="mdi mdi-pencil text-white"></i>
                                                    </button>
                                                    <button class="delete-btn btn btn-danger p-2" title="Delete"
                                                        data-id="{{ $skills->id }}">
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
                                <i class="mdi mdi-lightbulb" style="font-size: 20px;"></i>
                            </div>
                            <div class="mx-2 mt-1" style="font-family: 'Roboto', sans-serif;">
                                <h2 style="font-weight: 700;">My Skills</h2>
                            </div>
                            <button id="add-skill-btn"
                                class="btn btn-inverse-primary btn-sm position-absolute top-0 end-0 d-flex align-items-center">
                                <i class="mdi mdi-plus mr-1"></i>
                                <span class="mr-1">Skill</span> <!-- Added mr-1 class for margin-right -->
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote" style="color: rgb(25, 25, 219);">
                            <form id="skill-forms">
                                @if ($skill->isEmpty())
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
                                                    <th scope="col">Skills</th>
                                                    <th scope="col">Year Experience</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($skill as $key => $skills)
                                                    <tr>
                                                        {{-- <th scope="row">{{ $key + 1 }}</th> --}}
                                                        <td>{{ $skills->skill }}</td>
                                                        <td>{{ $skills->yr_experience }}</td>
                                                        <td>
                                                            <button id="edit-skill-btn"
                                                                class="btn btn-outline-info btn-xs"
                                                                data-id="{{ $skills->id }}" title="Edit">
                                                                <i class="mdi mdi-pencil "></i>
                                                            </button>
                                                            <button class="delete-btn btn btn-outline-danger btn-xs"
                                                                title="Delete" data-id="{{ $skills->id }}">
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
    @include('menu.skill.modal.modal')
    @include('menu.skill.script.action')
@endsection
