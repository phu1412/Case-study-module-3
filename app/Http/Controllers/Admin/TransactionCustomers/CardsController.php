<?php

namespace App\Http\Controllers\Admin\TransactionCustomers;

use App\Exports\CardsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionCustomers\CardsRequest;
use App\Repositories\Admin\TransactionCustomers\Eloquents\CardRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CardsController extends Controller
{
    private $cardRepository;
    public function __construct(CardRepository $cardRepository)
    {
        $this->cardRepository = $cardRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = $this->cardRepository->all();
        $param = [
            'cards' => $cards,
        ];
        return view('admin.transaction-customers.cards.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transaction-customers.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardsRequest $request)
    {
        $this->cardRepository->store($request);
        return redirect()->route('cards.index')->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = $this->cardRepository->find($id);
        $param = [
            'card' => $card,
        ];
        return view('admin.transaction-customers.cards.show', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = $this->cardRepository->find($id);
        $param = [
            'card' => $card,
        ];
        return view('admin.transaction-customers.cards.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardsRequest $request, $id)
    {
        $this->cardRepository->update($request, $id);
        return redirect()->route('cards.index')->with('success', 'Edit success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cardRepository->destroy($id);
        return redirect()->route('cards.index')->with('success', 'Delete success');
    }

    public function search(Request $request)
    {
        $cards = $this->cardRepository->search($request);
        $param = [
            'cards' => $cards
        ];
        return view('admin.transaction-customers.cards.list', $param);
    }

    public function export()
    {
        return Excel::download(new CardsExport, 'cards.xlsx');
    }
}
