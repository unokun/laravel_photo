@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>

  <a href="{{route('users.edit', auth()->user())}}">編集</a>
  <h2>名前</h2>
  <div>{{ $user->name }}</div>
  <h2>プロフィール画像</h2>
  <div class="post_body_main_img">
    @if($user->image !== '')
      <img src="{{ asset('storage/' . $user->image) }}">
    @else
      <img src="{{ asset('images/No_image.png') }}">
    @endif
    <a href="{{ route('users.edit_image', $user) }}">画像を変更</a>            
    </div>
  <h2>プロフィール</h2>
  <div>
  @if($user->profile === '')
    プロフィールが設定されていません。
  @else
    {{ $user->profile }}
  @endif
  </div>

@endsection