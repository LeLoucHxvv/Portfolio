 @extends('layouts.admin')

 @section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        Contact Me
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contactWelcomes as $key => $contactWelcome)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $contactWelcome->name }}</td>
                                <td>{{ $contactWelcome->email }}</td>
                                <td>{{ $contactWelcome->message }}</td>
                                <td>
                                   {{-- <a href="" class="delete" data-id="{{ $contactWelcome->id }}"><i class="mdi mdi-trash-can"></i>
                                   </a> --}}
                                   <button id="delete" class="btn btn-sm btn-danger p-2"
                                    data-id= "{{ $contactWelcome->id }}" >
                                   <i class="mdi mdi-trash-can"></i>
                               </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                   {{$contactWelcomes->links()}}
               </div>
            </div>
        </div>
    </div>

    @include('menu.action');
 @endsection
