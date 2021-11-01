@extends('admin.master')

@section('title')
    Add Account
@endsection

@section('title-content')
    Add Account
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin create Account</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('accounts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">Customer</label>
                            <select class="form-control" name="customer_id">
                                <option value=''>Null</option>
                                @foreach ($customers as $customer)
                                    @if (!$customer->account)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->customer_name . ' - ' . $customer->email . ' - ' . $customer->phone }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Card</label>
                            <select class="form-control" name="card_id">
                                <option value=''>Null</option>
                                @foreach ($cards as $card)
                                    @if (!$card->account)
                                        <option value="{{ $card->id }}">{{ $card->code }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Account Numbers</label>
                            <input type="text" class="form-control" name="code">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('code') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Type of Account</label>
                            <input type="text" class="form-control" name="type_of_account">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('type_of_account') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Brand Account</label>
                            <input type="text" class="form-control" name="brand_account">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('brand_account') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Place of Creation</label>
                            <input type="text" class="form-control" name="place_of_creation">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('place_of_creation') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Amounts</label>
                            <input type="text" class="form-control" name="amounts">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('amounts') }}
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
