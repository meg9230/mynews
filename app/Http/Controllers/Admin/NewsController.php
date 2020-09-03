<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\News;

// ニュース投稿に関するメソッド
class NewsController extends Controller
{
    // 新規ニュース投稿画面を表示
    public function add() {
        return view('admin.news.create');
    }
    // 新規ニュースの作成・投稿
    public function create(Request $request) {
        
        // Varidationを行う
        $this->validate($request, News::$rules);
        
        $news = new News;
        $form = $request->all();
        
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);
        
        // データベースに保存する
        $news->fill($form);
        $news->save();
        
        
        return redirect('admin/news/create');
    }
    
    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if($cond_title != '') {
            $posts = News::where('title', $cond_title)->get();
        } else {
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => '$posts', 'cond_title' => '$cond_title']);
    }
}
