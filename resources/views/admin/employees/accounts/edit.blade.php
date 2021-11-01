@extends('admin.master')

@section('title')
    Edit Account Admin
@endsection

@section('title-content')
    Edit Account Admin
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin edit Account Admin</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('employeesAccounts.update', $account->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">Nick Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $account->name }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $account->email }}">
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
                            <input type="text" class="form-control" name="role" value="{{ $account->role }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('role') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" id="image" name="image"
                                value="{{ $account->image }}">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
