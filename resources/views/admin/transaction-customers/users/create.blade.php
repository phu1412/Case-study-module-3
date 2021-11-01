@extends('admin.master')

@section('title')
    Add User
@endsection

@section('title-content')
    Add User
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin create users</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">User Name</label>
                            <input type="text" class="form-control" name="user_name">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('user_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Email</label>
                            <input type="email" class="form-control" name="email">
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
                        <button type="submit" class="btn btn-primary">Addition</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
