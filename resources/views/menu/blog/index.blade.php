@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header bg-light">
                    <div class="d-flex align-items-center position-relative">
                        <div class="rounded"
                            style="background: linear-gradient(to right, #4b78f5 , #8a88881a); padding: 3px; width: 30px; display: flex; justify-content: center; align-items: center;">
                            <i class="mdi mdi-file-document" style="font-size: 20px;"></i>
                        </div>
                        <div class="mx-2 mt-1" style="font-family: 'Roboto', sans-serif;">
                            <h2 style="font-weight: 700;">My CV Resume</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #4b78f5; color: white;">Upload PDF
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="pdf_file" class="custom-file-upload"
                                                style="display: inline-block; vertical-align: middle;">
                                                <input type="file" id="pdf_file" name="pdf_file" />
                                                Choose PDF File
                                            </label>
                                            <small class="form-text text-muted"
                                                style="display: inline-block; vertical-align: middle;">Max file size:
                                                2MB</small>
                                        </div>
                                        <button type="submit" class="btn btn-inverse-primary" id="upload_view">
                                            <i class="mdi mdi-file-upload" style="vertical-align: middle;"></i>
                                            CV Resume
                                        </button>
                                    </form>
                                    {{-- @if (session('success'))
                                            <div class="alert alert-success mt-3" role="alert">
                                                {{ session('success') }}
                                            </div>
                                        @elseif (session('error'))
                                            <div class="alert alert-danger mt-3" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">File Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($blog)
                                            <tr>
                                                <td>
                                                    @if ($blog->file_path)
                                                        {{ $blog->file_path }}
                                                    @else
                                                        No file available
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($blog->file_path)
                                                        <a href="{{ route('showfile', ['id' => $blog->id]) }}"
                                                            class="btn btn-outline-info btn-icon-text" role="button" id="view_pdf"
                                                            target="_blank">
                                                            <i class="mdi mdi-eye"></i>
                                                        </a>
                                                    @endif

                                                    <button class="delete-btn btn btn-outline-danger btn-icon-text" title="Delete"
                                                        data-id="{{ $blog->id }}">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @else
                                            <td colspan="6" class="text-center" style="text-align: center;">
                                                <i class="mdi mdi-emoticon-cry-outline"
                                                    style="font-size: 100px; color: #0b096e;"></i>
                                                <p class="mt-2"
                                                    style="font-size: 30px; color: #0b096e; text-align: center; font-family: 'Caveat', cursive;">
                                                    Currently lacking data. Please add!
                                                </p>

                                            </td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card body mt-4">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">File Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $blog->file_path }}</td>
                                            <td>
                                                <a href="{{ route('showfile') }}" class="btn btn-primary" role="button">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <button class="btn btn-danger" role="button">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © LelouchXv</span>
        </div>
    </footer>
    @include('menu.blog.script')
@endsection
