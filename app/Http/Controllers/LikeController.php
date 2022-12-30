<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($questallId)
    {
        Auth::user()->like($questallId);
        return 'ok!'; //レスポンス内容
    }

    public function destroy($questallId)
    {
        Auth::user()->unlilikeke($questallId);
        return 'ok!'; //レスポンス内容
    }
}
