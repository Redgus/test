<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SeacrchHistory;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history.index', [ 'items' => Auth::user()->search_historys ]);
    }

    public function get_history_market()
    {

        $seacrchHistory = new SeacrchHistory();

        if(Auth::user()->get_products->count() > 0){


            foreach (Auth::user()->get_products as $item) {
                
                $seacrchHistory = $seacrchHistory->orWhere('name', 'LIKE', "%{$item->name}%");
                $seacrchHistory = $seacrchHistory->orWhere('price_from', '>=', $item->price);
                $seacrchHistory = $seacrchHistory->orWhere('price_to', '<=', $item->price);
                if ($item->type != "Без разницы") {
                    
                    $seacrchHistory = $seacrchHistory->orWhere('type', '=', $item->type);
                
                }

            }

            $items = $seacrchHistory->get();

        }else{

            $items = [];
        }

        return view('history.index', [ 'items' => $items ]);
    }
}
