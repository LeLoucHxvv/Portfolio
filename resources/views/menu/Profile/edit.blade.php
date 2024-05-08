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
                            <h2 class="mx-2" style="font-family: 'Roboto', sans-serif;">Edit
                                <strong>{{ $profile->name }}</strong></h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('my-profile.update', $profile->id) }}" method="POST"
                            enctype="multipart/form-data" class="mt-2">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="old" value="{{ $profile->img }}">
                                    <input type="file" id="image" class="dropify" data-height="500" name="img"
                                        data-default-file="{{ asset('storage/folder/' . $profile->img) }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $profile->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Address</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            value="{{ $profile->location }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Birthdate</label>
                                        <input type="text" class="form-control" id="bday" name="bday"
                                            value="{{ $profile->bday }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Age</label>
                                        <input type="text" class="form-control" id="age" name="age"
                                            value="{{ $profile->age }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            value="{{ $profile->mobile_number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Website</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                            value="{{ $profile->website }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $profile->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Freelance</label>
                                        <select class="form-control" id="freelance" name="freelance" required>
                                            <option value="Available"
                                                {{ $profile->freelance == 'Availabe' ? 'selected' : '' }}>Available
                                            </option>
                                            <option value="Not Available"
                                                {{ $profile->freelance == 'Not Available' ? 'selected' : '' }}>Not
                                                Available
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 offset-sm-9 mt-2">
                                        <button type="submit"
                                            class="btn btn-inverse-primary btn-sm d-flex align-items-center">
                                            <i class="mdi mdi-content-save-settings mr-1"></i>
                                            <span>Update</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
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
    @include('menu.Profile.script')
@endsection
