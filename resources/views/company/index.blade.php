@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Company Tables</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('company.create') }}" class="btn btn-primary float-right"><i
                            class="fa fa-plus"></i> Add Company</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- @include('common.alert') -->
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width: 40px">Logo</th>
                                        <th style="width: 40px">Website</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($companies as $company)
                                    <tr>
                                        <td>{{ $company->id }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td><img src="{{ url('storage/company/'.$company->logo) }}" width="50"
                                                height="50" /></td>
                                        <td>{{ $company->website }}</td>
                                        <td>
                                            <a href="{{ route('company.show', $company->id) }}"
                                                class="btn btn-success float-right"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('company.edit', $company->id) }}"
                                                class="btn btn-warning float-right"><i class="fa fa-pen"></i> Edit</a>

                                            <form action="{{ url('company/'.$company->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-sm btn-danger" type="submit"><i
                                                        class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <td colspan="5">No Record Found.</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

