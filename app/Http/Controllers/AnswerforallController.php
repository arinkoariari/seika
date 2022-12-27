<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerforallController;
use App\Http\Requests\AnswerforallRequest;

class AnswerforallController extends Controller
{
   public function create()
{
    return view('posts/answerforall/create');
}
public function store(AnswerforallRequest $request, Answerforall $answerforall)
{
    $input = $request['answerforall'];
    $post->fill($input)->save();
    return redirect('/quest/' . $answerforall->id);
}
}
