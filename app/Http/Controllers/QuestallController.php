<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questall;
use App\Http\Requests\QuestallRequest;
use Illuminate\Support\Facades\Auth;

class QuestallController extends Controller
{
   public function home(Questall $questall)
{
        return view('posts/home')->with(['questsall' => $questall->getPaginateByLimit()]);
    }
    public function show(Questall $questall)
{
    return view('posts/Questall/show')->with(['questall' => $questall]);
 
}
public function create()
{
    return view('posts/Questall/create');
}
public function store(QuestallRequest $request, Questall $questall)
{
    $input = $request['questall'];
    $input['user_id'] = Auth::id();
    $questall->fill($input)->save();
    return redirect('/quest/' . $questall->id);
}
public function User()
{
    return $this->belongsTo(User::class);
}
public function delete(Questall $questall)
{
    $questall->delete();
    return redirect('/');
}
}

?>