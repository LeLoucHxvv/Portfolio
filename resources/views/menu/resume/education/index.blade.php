@extends('layouts.admin')

@section('content')
    {{-- <div class="content-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-school text-primary mr-3" style="font-size: 24px;"></i>
                        <h2 class="mx-2">Education Lists</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card-body">
                        <form action="" class="forms-sample" id="education-forms">
                            @foreach ($education as $key => $educations)
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote" style="color: rgb(68, 68, 229);">
                                                <h4><strong>Education</strong></h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group col-md-12 mt-2">
                                                            <label for="">Masters:</label>
                                                            <input type="text" class="form-control" id=""
                                                                value="{{ $educations->master }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group col-md-12 mt-2">
                                                            <label for="">School Year:</label>
                                                            <input type="text" class="form-control" id=""
                                                                value="{{ $educations->school_year }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mt-2">
                                                    <label for="">Place of School:</label>
                                                    <input type="text" class="form-control" id=""
                                                        value="{{ $educations->place_school }}" readonly>
                                                </div>
                                                <div class="form-group col-md-12 mt-2">
                                                    <label for="">Summary:</label>
                                                    <input type="text" class="form-control" id=""
                                                        value="{{ $educations->summary }}" readonly>
                                                </div>
                                                <div class="form-group col-md-3 mt-1">
                                                    <button id="add-discount-btn" class="btn btn-primary p-2"
                                                        title="Add">
                                                        <i class="mdi mdi-plus mr-1"></i>
                                                    </button>
                                                    <button id="edit-discount-btn" class="btn btn-warning p-2"
                                                        title="Edit" data-id="{{ $educations->id }}">
                                                        <i class="mdi mdi-pencil text-white"></i>
                                                    </button>
                                                    <button class="delete-btn btn btn-danger p-2" title="Delete"
                                                        data-id="{{ $educations->id }}">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                </div>
                                            </blockquote>
                                        </div>
                                    </div>
                            @endforeach
                        </form>
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
                                <i class="mdi mdi-school" style="font-size: 20px;"></i>
                            </div>
                            <div class="mx-2 mt-1" style="font-family: 'Roboto', sans-serif;">
                                <h2 style="font-weight: 700;">My Education</h2>
                            </div>
                            {{-- <button class="btn btn-primary btn-sm position-absolute top-0 end-0">Button</button> --}}
                            <button id="add-education-btn"
                                class="btn btn-inverse-primary btn-sm position-absolute top-0 end-0 d-flex align-items-center">
                                <i class="mdi mdi-plus mr-1"></i>
                                <span>Education</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" class="forms-sample" id="education-forms">
                            @if ($education->isEmpty())
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
                                @foreach ($education as $key => $educations)
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <blockquote class="blockquote" style="color: rgb(68, 68, 229);">
                                                        <h4><strong>Education</strong></h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Masters:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="" value="{{ $educations->master }}"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">School Year:</label>
                                                                    <input type="text" class="form-control"
                                                                        id=""
                                                                        value="{{ $educations->school_year }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Place of School:</label>
                                                            <input type="text" class="form-control" id=""
                                                                value="{{ $educations->place_school }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Summary:</label>
                                                            <input type="text" class="form-control" id=""
                                                                value="{{ $educations->summary }}" readonly>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            {{-- <button id="add-discount-btn" class="btn btn-primary p-2"
                                                                title="Add">
                                                                <i class="mdi mdi-plus mr-1"></i>
                                                            </button> --}}
                                                            <button id="edit-education-btn" class="btn btn-outline-info btn-xs"
                                                                data-id="{{ $educations->id }}" title="Edit">
                                                                <i class="mdi mdi-pencil "></i>
                                                            </button>
                                                            <button class="delete-btn btn btn-outline-danger btn-xs" title="Delete"
                                                                data-id="{{ $educations->id }}">
                                                                <i class="mdi mdi-trash-can"></i>
                                                            </button>
                                                        </div>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </form>
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
    @include('menu.resume.education.modal')
    @include('menu.resume.education.script')
@endsection
