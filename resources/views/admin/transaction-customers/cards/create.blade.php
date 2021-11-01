@extends('admin.master')

@section('title')
    Add Card
@endsection

@section('title-content')
    Add Card
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin create cards</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('cards.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">Code</label>
                            <input type="text" class="form-control" name="code" required>
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('code') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">PIN</label>
                            <input type="text" class="form-control" name="PIN" required>
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('PIN') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Period</label>
                            <input type="text" class="form-control" name="period" required>
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('period') }}
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
