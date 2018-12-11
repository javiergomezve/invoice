<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search()
    {
        $q = request('q');

        $results = Product::orderBy('item_code')
            ->when($q, function ($query) use ($q) {
                $query->where('item_code', 'like', '%'.$q.'%')
                    ->orWhere('description', 'like', '%'.$q.'%');
            })
            ->limit(6)
            ->get();

        return response()
            ->json(['results' => $results]);
    }
}
