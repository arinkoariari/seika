<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questall;
use App\Http\Requests\QuestallRequest;

class QuestallController extends Controller
{
   public function home(Questall $questall)
{
        return view('posts/home')->with(['questsall' => $questall->getPaginateByLimit()]);
    }
    public function show(Questall $questall)
{
    return view('posts/Questall/show')->with(['quest' => $quest]);
 
}
public function create()
{
    return view('posts/Questall/create');
}
public function store(Request $request, Questall $questall)
{
    $input = $request['questall'];
    $questall->fill($input)->save();
    return redirect('/quest/' . $questall->id);
}
}
?>