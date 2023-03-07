@extends('layouts.app')

@section('content')
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
                        <h3 class="card-title">Add Company</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name <span class="required">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                    value="{{ old('name') }}">
                                @if($errors->has('name'))
                                <div class="error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}">
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
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Website</label>
                                <input type="text" name="website" class="form-control" placeholder="Website"
                                    value="{{ old('website') }}">
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
<!-- Content Wrapper. Contains page content -->
@endsection