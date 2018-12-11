<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function search()
    {
        $q = request('q');

        $results = Customer::orderBy('first_name')
            ->when($q, function ($query) use ($q) {
                $query->where('first_name', 'like', '%'.$q.'%')
                    ->orWhere('last_name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%');
            })
            ->limit(6)
            ->get();

        return response()
            ->json(['results' => $results]);
    }
}
