@extends('admin.master')

@section('title')
    Add Employee
@endsection

@section('title-content')
    Add Employee
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin create Employee</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('employees_info.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">Position</label>
                            <select class="form-control" name="position_id">
                                <option value=''>Null</option>
                                @foreach ($positions as $position)
                                    @if (!$position->employeesInfo)
                                        <option value="{{ $position->id }}">{{ $position->position }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Employee Name</label>
                            <input type="text" class="form-control" name="name">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Employee Email</label>
                            <input type="email" class="form-control" name="personal_email">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('personal_email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Phone</label>
                            <input type="text" class="form-control" name="phone">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Birthday</label>
                            <input type="date" class="form-control" name="birthday">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('birthday') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Address</label>
                            <input type="text" class="form-control" name="address">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Citizen Identification</label>
                            <input type="text" class="form-control" name="citizen_identification">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('citizen_identification') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Join Company Date</label>
                            <input type="date" class="form-control" name="join_company_date">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('join_company_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Gender</label> &ensp;&ensp;
                            <input type="radio" value="male" name="gender" checked> Male
                            <input type="radio" value="female" name="gender"> Female
                        </div>
                        <div class="form-group">
                            <label for="inputFileName">Image</label>
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
