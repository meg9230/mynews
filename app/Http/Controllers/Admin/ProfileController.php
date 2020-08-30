<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// プロフィールページに関するメソッド
class ProfileController extends Controller
{
    // プロフィール作成画面を表示
    public function add(){
        return view('admin.profile.create');
    }
    // プロフィールを作成する
    public function create(){
        return redirect('admin/profile/create');
    }
    // プロフィール編集画面を表示
    public function edit(){
        return view('admin.profile.edit');
    }
    // プロフィールを更新する
    public function update(){
        return redirect('admin/profile/edit');
    }
}
