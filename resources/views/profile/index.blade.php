@extends('layouts.front')

@section('content')
<div class="container">
        <hr color="#c0c0c0">
        @if(!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="p-2">
                                    <table class="info">
                                        <tr>
                                            <th>Name</th><td>{{ str_limit($headline->name, 70) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th><td>{{ str_limit($headline->gender, 70) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Hobby</th><td>{{ str_limit($headline->hobby, 70) }}</td>
                                        </tr>
                                    </table>
                                </div> 
                                <div>
                                    <p>{{ str_limit($headline->introduction, 650) }}</p>
                                </div>
                            </div>    
                        </div>  
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ str_limit($post->name, 150) }}
                                </div>
                                <div class="gender">
                                    {{ str_limit($post->gender, 150) }}
                                </div>
                                <div class="hobby">
                                    {{ str_limit($post->hobby, 150) }}
                                </div>
                                <div class="intro mt-3">
                                    {{ str_limit($post->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection
