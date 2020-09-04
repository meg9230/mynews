@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの編集</h2>
                <form action="{{ action('Admin\NewsController@update') }}" method="post" enctype="multipart/form-data">
                    @if(count($errors > 0)
                        <ul>
                            @foreach($errors->all() $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別(gender)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味(hobby)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介(introduction)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" row="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}"/>
                            {{ csrf_field }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>MyNews</title>
    </head>
    <body>
        <h1>My News編集画面</h1>
    </body>
</html>