<?php

namespace JeffreyWxj\LaravelInteractiveLogger\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use JeffreyWxj\LaravelInteractiveLogger\Models\InteractiveLog;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $current = $request->input('id') ? InteractiveLog::find($request->input('id')) : InteractiveLog::orderBy('id','desc')->first();
        $list = InteractiveLog::orderBy('created_at','desc')->paginate(10);
        return view('interactive-logger::index', [
            'list' => $list,
            'current' => $current
        ]);
    }

}