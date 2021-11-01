<?php

namespace App\Repositories\Admin\TransactionCustomers\Interfaces;

interface TransactionInterface
{
    public function all();
    public function store($request);
    public function update($request, $id);
    public function find($id);
    public function destroy($id);
    public function search($request);
    public function generateUUID($length);
    public function searchTransactions($id);
}
