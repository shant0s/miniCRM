@extends('layouts.app')

@section('content')
<section class="content-header">
    @include('common.content_header', ['title' => 'Companies', 'url' => '/employee'])
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add employee</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('employee.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name <span
                                        class="required text-danger">*</span></label>
                                <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname"
                                    value="{{ old('firstname') }}">
                                @if($errors->has('firstname'))
                                <div class="error text-danger">{{ $errors->first('firstname') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name <span
                                        class="required text-danger">*</span></label>
                                <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname"
                                    value="{{ old('lastname') }}">
                                @if($errors->has('lastname'))
                                <div class="error text-danger">{{ $errors->first('lastname') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Company <span
                                        class="required text-danger">*</span></label>
                                <select name="company_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                                    <option value="">-- Select Company --</option>
                                    @forelse($companies as $key => $company)
                                    <option value="{{ $key }}">{{ $company }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @if($errors->has('company_id'))
                                <div class="error text-danger">{{ $errors->first('company_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- Content Wrapper. Contains page content -->
@endsection