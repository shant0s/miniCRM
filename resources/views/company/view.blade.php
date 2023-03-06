@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Companies</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Companies</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <h3 class="card-title">Company List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <td>{{ $company->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $company->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $company->email }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 40px">Logo</th>
                                    <td><img src="{{ url('storage/company/'.$company->logo) }}" width="50"
                                            height="50" /></td>
                                </tr>
                                <tr>
                                    <th style="width: 40px">Website</th>
                                    <td>{{ $company->website }}</td>
                                </tr>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
@endsection