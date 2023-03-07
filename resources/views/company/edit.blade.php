@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    @include('common.content_header', ['title' => 'Companies', 'url' => '/company'])
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
                        <h3 class="card-title">Edit Company</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('company.update', $company->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" value="PUT" name="_method">
                        <input type="hidden" value="{{ $company->id }}" name="id">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name <span class="required text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                    value="{{ $company->name }}">
                                @if($errors->has('name'))
                                <div class="error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email <span
                                        class="required text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ $company->email }}">
                                @if($errors->has('email'))
                                <div class="error text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <div class="input-group">
                                    <input type="file" name="image">
                                </div>
                                @if($errors->has('image'))
                                <div class="error text-danger">{{ $errors->first('image') }}</div>
                                @endif
                                <br>
                                @if($company->logo)<label>Selected Logo: </label>&nbsp;&nbsp;&nbsp;<img src="{{ url('storage/company/'.$company->logo) }}" width="100"
                                    height="100" />
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Website</label>
                                <input type="text" name="website" class="form-control" placeholder="Website"
                                    value="{{ $company->website }}">
                                @if($errors->has('website'))
                                <div class="error text-danger">{{ $errors->first('website') }}</div>
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
@endsection