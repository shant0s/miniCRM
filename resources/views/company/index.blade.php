@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    @include('common.content_header', ['title' => 'Companies', 'url' => '/company'])
</section>

<!-- Main content -->
<section class="content">
    @include('common.alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Company List</h2>
                        <a href="{{ route('company.create') }}" class="btn btn-success float-right"><i
                                class="fa fa-plus"></i> Add Company</a>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td><img src="{{ url('storage/company/'.$company->logo) }}" width="50"
                                            height="50" />
                                    </td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('company.show', $company->id) }}"
                                                class="btn btn-success mr-2"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('company.edit', $company->id) }}"
                                                class="btn btn-warning mr-2"><i class="fa fa-pen"></i> Edit</a>
                                            <form action="{{ url('company/'.$company->id) }}" id="delete-form"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-delete-record" type="button"><i
                                                        class="fa fa-trash"></i>
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="6">No Record Found.</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $companies->links() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('.btn-delete-record').click(function(e) {
        e.preventDefault();
        if (confirm('Are you sure?')) {
            $(this).closest('form').submit();
        }

        return false;
    })
})
</script>
@endsection