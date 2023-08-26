<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;
use Illuminate\Support\Facades\Log;

class TodoListController extends Controller
{
    
    public function index() {
        return View('welcome' , ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }

    public function markComplete($id) {
        //Log::info($id);
        $listItem = ListItem::find($id);
        //Log::info($listItem);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function saveItem(Request $request) {
        
        $newListItem = new ListItem;
        //dd($request);
        $newListItem->name = $request->input('listItem');
        $newListItem->is_complete = 0;
        $newListItem->save();

        return redirect('/');
    }

}

