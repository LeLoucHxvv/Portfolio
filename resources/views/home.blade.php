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
                                <i class="mdi mdi-grid-large" style="font-size: 20px;"></i>
                            </div>
                            <div class="mx-2 mt-1">
                                <h2>Dashboard</h2>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="card shadow-0 border rounded-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center"> <!-- Adjust column width if necessary -->
                                                <img src="{{ asset('storage/yeah.gif') }}" alt="Your GIF" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="card shadow-0 border rounded-3">
                                    <div class="card-body">
                                        <div class="row justify-content-center"> <!-- Align content to the center -->
                                            <div class="col-md-12 text-center"> <!-- Adjust column width if necessary -->
                                                <div id="typing-animation" ></div>
                                               <a href="{{ asset('assetss/images/kisss.gif') }}" class="btn btn-inverse-primary btn-sm text-center mt-2">Click Me :< </a>
                                            </div>
                                        </div>
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
    @include('welcome.script-dash')
@endsection
