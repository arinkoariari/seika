<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questall;

class QuestallController extends Controller
{
   public function home(Questall $questall)
{
        return view('posts/home')->with(['questsall' => $questall->getPaginateByLimit()]);
    }
}
?>