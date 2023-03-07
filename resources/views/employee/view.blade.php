@extends('layouts.app')

@section('content')
<section class="content-header">
    @include('common.content_header', ['title' => 'Employees', 'url' => '/employee'])
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <h3 class="card-title">Employee Detail</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <td>{{ $employee->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $employee->firstname }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $employee->lastname }}</td>
                                </tr>
                                <tr>                                
                                <tr>
                                    <th style="width: 40px">Company</th>
                                    <td>{{ $employee->company->name }}</td>
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