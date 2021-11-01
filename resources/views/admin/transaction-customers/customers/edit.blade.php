@extends('admin.master')

@section('title')
    Edit Customer
@endsection

@section('title-content')
    Edit Customer
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin edit Customer</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('customers.update', $customer->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">User Email</label>
                            <select class="form-control" name="user_id">
                                @if (isset($customer->user->id))
                                    <option value="{{ $customer->user->id }}">{{ $customer->user->email }} </option>
                                @endif
                                <option value=''>Null</option>
                                @foreach ($users as $user)
                                    @if (!$user->customer)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Customer Name</label>
                            <input type="text" class="form-control" name="customer_name"
                                value="{{ $customer->customer_name }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('customer_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $customer->email }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Birthday</label>
                            <input type="date" class="form-control" name="birthday" value="{{ $customer->birthday }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('birthday') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Citizen Identification</label>
                            <input type="text" class="form-control" name="citizen_identification"
                                value="{{ $customer->citizen_identification }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('citizen_identification') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Job</label>
                            <input type="text" class="form-control" name="job" value="{{ $customer->job }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('job') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Gender</label>
                            <input type="radio" value="male" name="gender" checked> Male
                            <input type="radio" value="female" name="gender"> Female
                        </div>
                        <div class="form-group">
                            <label for="inputFileName">Image BCI</label>
                            <input type="text" class="form-control" id="images_BCI" name="images_BCI"
                                value="{{ $customer->images_BCI }}">
                            <input type="file" class="form-control-file" id="images_BCI" name="images_BCI">
                        </div>
                        <div class="form-group">
                            <label for="inputFileName">Image ACI</label>
                            <input type="text" class="form-control" id="images_ACI" name="images_ACI"
                                value="{{ $customer->images_ACI }}">
                            <input type="file" class="form-control-file" id="images_ACI" name="images_ACI">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
