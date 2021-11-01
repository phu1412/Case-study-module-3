<?php

namespace App\Repositories\Admin\TransactionCustomers\Interfaces;

interface AccountInterface
{
    public function all();
    public function store($request);
    public function update($request, $id);
    public function find($id);
    public function destroy($id);
    public function search($request);
}
