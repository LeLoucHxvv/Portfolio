@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="d-flex align-items-center mt-2 position-relative">
                            <div class="rounded"
                                style="background: linear-gradient(to right, #4b78f5 , #8a88881a); padding: 3px; width: 30px; display: flex; justify-content: center; align-items: center;">
                                <i class="mdi mdi-account" style="font-size: 20px;"></i>
                            </div>
                            <div class="mx-2 mt-1" style="font-family: 'Roboto', sans-serif;">
                                <h2 style="font-weight: 700;">My Profile</h2>
                            </div>
                            <a href="{{ route('my-profile.edit', $profile->id) }}"
                                class="btn btn-inverse-warning btn-sm position-absolute top-0 end-0 d-flex align-items-center">
                                <i class="mdi mdi-pencil"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-sample mt-2" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('storage/folder/' . $profile->img) }}" class="mw-100 rounded"
                                        style="max-height: 400px;" alt="profile" id="image">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $profile->name }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Address:</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            value="{{ $profile->location }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Birthdate:</label>
                                        <input type="text" class="form-control" id="bday" name="bday"
                                            value="{{ $profile->bday }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Age:</label>
                                        <input type="email" class="form-control" id="age" name="age"
                                            value="{{ $profile->age }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Mobile Number:</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            value="{{ $profile->mobile_number }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Website:</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                            value="{{ $profile->website }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $profile->email }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Freelance:</label>
                                        <input type="email" class="form-control" id="freelance" name="freelance"
                                            value="{{ $profile->freelance }}" required readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    {{-- @include('menu.Profile.modal') --}}
    @include('menu.Profile.script')
@endsection
