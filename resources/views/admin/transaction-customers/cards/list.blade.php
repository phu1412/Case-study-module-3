@extends('admin.master')

@section('title')
    Cards
@endsection

@section('title-content')
    Cards Table
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('cards.create') }}" class="btn btn-primary">Add Cards</a>
            <a href="{{ route('cards.export') }}" class="btn btn-success">Export Excel</a>
            <form method="post" action="{{ route('cards.search') }}" class="float-right">
                @csrf
                <div class=" input-group
                input-group-sm" style="width: 180px; padding-top: 4px">

                    <input type=" text" name="keyword" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>PIN</th>
                        <th>Period</th>
                        <th>Created At</th>
                        <th>Account Bank</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cards as $key => $card)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $card->code }}</td>
                            <td>{{ $card->PIN }}</td>
                            <td>{{ $card->period }}</td>
                            <td>{{ $card->created_at->format('H:i  d-m-Y') }}</td>
                            <td>
                                @if (isset($card->account->id))
                                    <a href="{{ route('accounts.show', $card->account->id) }}">Show</a>
                                @else
                                    Chưa liên kết với Account Bank
                                @endif
                            </td>
                            <td><a href="{{ route('cards.edit', $card->id) }}"><i
                                class="fas fa-edit fa-lg text-info"></i></a>
                                @cannot('teller')
                                    <a href="{{ route('cards.destroy', $card->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this?')"><i
                                        class="fas fa-trash-alt text-danger fa-lg"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
