@extends('admin.master')

@section('title')
    Edit Account
@endsection

@section('title-content')
    Edit Account
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Only admin edit Account</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('accounts.update', $account->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-primary">Customer</label>
                            <select class="form-control" name="customer_id">
                                @if (isset($account->customer->id))
                                    <option value="{{ $account->customer->id }}">{{ $account->customer->email }}
                                    </option>
                                @endif
                                <option value=''>Null</option>
                                @foreach ($customers as $customer)
                                    @if (!$customer->account)
                                        <option value="{{ $customer->id }}">{{ $customer->email }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Card</label>
                            <select class="form-control" name="card_id">
                                @if (isset($account->card->id))
                                    <option value="{{ $account->card->id }}">{{ $account->card->code }}</option>
                                @endif
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
                            <input type="text" class="form-control" name="code" value="{{ $account->code }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('code') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Type of Account</label>
                            <input type="text" class="form-control" name="type_of_account"
                                value="{{ $account->type_of_account }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('type_of_account') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Brand Account</label>
                            <input type="text" class="form-control" name="brand_account"
                                value="{{ $account->brand_account }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('brand_account') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Place of Creation</label>
                            <input type="text" class="form-control" name="place_of_creation"
                                value="{{ $account->place_of_creation }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('place_of_creation') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-primary">Amounts</label>
                            <input type="text" class="form-control" name="amounts" value="{{ $account->amounts }}">
                            @if ($errors->any())
                                <div class="text text-danger">
                                    {{ $errors->default->first('amounts') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
