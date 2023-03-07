@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    @include('common.content_header', ['title' => 'Employees', 'url' => '/employee'])
</section>

<!-- Main content -->
<section class="content">
    @include('common.alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Employee List</h2>
                        <a href="{{ route('employee.create') }}" class="btn btn-success float-right"><i
                                class="fa fa-plus"></i> Add Employee</a>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->firstname }}</td>
                                    <td>{{ $employee->lastname }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('employee.show', $employee->id) }}"
                                                class="btn btn-success mr-2"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('employee.edit', $employee->id) }}"
                                                class="btn btn-warning mr-2"><i class="fa fa-pen"></i> Edit</a>
                                            <form action="{{ url('employee/'.$employee->id) }}" method="POST">
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
                        {{ $employees->links() }}
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