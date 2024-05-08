@extends('layouts.admin')

@section('content')
    {{-- <section class="content">
        <div class="card card-gray">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <div class="card-body">
                <form action="{{route ('menu.aboutme.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="Birthday">Birthday</label>
                            <input type="text" class="form-control" value="{{ $about->birthday}}" name="birthday">
                        </div>
                        <div class="col-6">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" value="Age" name="age">
                        </div>
                        <div class="col-6">
                            <label for="Birthday">Facebook</label>
                            <input type="text" class="form-control" value="Facebook account" name="facebook_account">
                        </div>
                        <div class="col-6">
                            <label for="age">Degree</label>
                            <input type="text" class="form-control" value="Degree" name="degree">
                        </div>
                        <div class="col-6">
                            <label for="Birthday">Gmail</label>
                            <input type="text" class="form-control" value="Gmail account" name="gmail_account">
                        </div>
                        <div class="col-6">
                            <label for="age">City</label>
                            <input type="text" class="form-control" value="City" name="city">
                        </div>
                        <div class="col-6">
                            <label for="age">Freelancer</label>
                            <input type="text" class="form-control" value="Available or not?" name="freelance">
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->
            <div class="card card-gray ml-auto">
              <div class="card-header">
                <button type="submit" class="btn btn-light">Change</button>
              </div>
            </form>
          </div>
        </div>


    </section> --}}
@endsection
