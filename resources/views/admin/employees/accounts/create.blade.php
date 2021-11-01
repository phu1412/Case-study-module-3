@extends('admin.master')

@section('title')
    Add Acsount Admin
@endsection

@section('title-content')
    Add Acsount Admin
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin create Acsount Admin</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('employeesAccounts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">Nick Name</label>
                            <input type="text" class="form-control" name="name">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Email</label>
                            <input type="text" class="form-control" name="email">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Password</label>
                            <input type="text" class="form-control" name="password">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Role</label>
                            <input type="text" class="form-control" name="role">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('role') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" id="image" name="image">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Addition</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
