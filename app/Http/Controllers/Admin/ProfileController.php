<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

// プロフィールページに関するメソッド
class ProfileController extends Controller
{
    // プロフィール作成画面を表示
    public function add(){
        return view('admin.profile.create');
    }
    // プロフィールを作成する
    public function create(Request $request){
        
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form)->save();
        
        return redirect('admin/profile/create');
    }
    // プロフィール編集画面を表示
    public function edit(){
        return view('admin.profile.edit');
    }
    // プロフィールを更新する
    public function update(Request $request){
        $this->validate($request, Profiles::$rules);
        $profile = Profiles::find($request->id);
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();
        
        return redirect('admin/profile/edit');
    }
}
