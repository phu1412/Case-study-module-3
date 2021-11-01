@extends('admin.master')

@section('title')
    Add Position
@endsection

@section('title-content')
    Add Position
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin create Position</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('position.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">Position</label>
                            <input type="text" class="form-control" name="position">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('position') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Branch</label>
                            <input type="text" class="form-control" name="branch">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('branch') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Basic Salary</label>
                            <input type="text" class="form-control" name="basic_salary">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('basic_salary') }}
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
