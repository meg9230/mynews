<!--layouts.prodile.blade.phpからの読み込み-->
@extends('layouts.profile')

<!--layouts.profile.blade.phpの@yield('title')への埋め込み-->
@section('title', 'プロフィールの新規作成')

<!--layouts.profile.blade.phpの@yield('content')への埋め込み-->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成</h2>
            </div>
        </div>
    </div>
@endsection


