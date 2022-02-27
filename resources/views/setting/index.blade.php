@extends('layouts.dashboard')



@section('content')
    <div class="row p-5">
            <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
                <h1 class="h3 mb-0 text-gray-800">Settings</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>
            <!-- Content Row -->
            <div class="row">
              <div class="col-12">
                <div class="card shadow p-3" style="">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                      <div class="d-flex my-3">
                        <button type="button" class="btn btn-theme-1-pri m-1">Blue Primary</button>
                        <button type="button" class="btn btn-theme-2-pri m-1">Dark Primary</button>
                        <button type="button" class="btn btn-theme-3-pri m-1">Green Primary</button>
                        <button type="button" class="btn btn-theme-success m-1">Danger</button>
                        <button type="button" class="btn btn-theme-warning m-1">Warning</button>
                        <button type="button" class="btn btn-theme-info m-1">Info</button>
                        <button type="button" class="btn btn-theme-danger m-1">Light</button>
                        <button type="button" class="btn btn-dark m-1">Dark</button>
                        
                      </div>
                  </div>
            </div>
            </div>
        </div>
    </div>
    
@endsection
