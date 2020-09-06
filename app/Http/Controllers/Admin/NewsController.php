<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\News;
use App\History;
use Carbon\Carbon;

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
        $news->fill($form)->save();
        
        
        return redirect('admin/news/create');
    }
    
    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if($cond_title != '') {
            $posts = News::where('title', $cond_title)->get();
        } else {
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request) {
        // News Modelからデータ取得
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.news.edit', ['news_form' => $news]);
    }
    
    public function update(Request $request) {
        // Validation
        $this->validate($request, News::$rules);
        // News Modelからデータ取得
        $news = News::find($request->id);
        // 送信フォームデータの格納
        $news_form = $request->all();
        
        if(isset($news_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
            unset($news_form['image']);
        } elseif(isset($request->remove)) {
            $news->image_path = null;
            unset($news_form['remove']);
        }
        
        unset($news_form['_token']);
        // 該当データの上書き保存
        $news->fill($news_form)->save();
        
        $history = new History;
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now('Asia/Tokyo');
        $history->save();
        
        return redirect('admin/news/');
    }
    
    public function delete(Request $request) {
        
        $news = News::find($request->id);
        $news->delete();
        return redirect('admin/news/');
    }
}
