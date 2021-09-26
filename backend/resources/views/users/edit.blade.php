@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <form method="POST" action="{{ route('users.update', $user) }}">
      @csrf
      @method('patch')
      <div>
          <label>
            名前:
            <input type="text" name="name" value="{{ $user->name }}">
          </label>
      </div>
      <div>
          <label>
            メールアドレス:
            <input type="text" name="email" value="{{ $user->email }}">
          </label>
      </div>
      <div>
          <label>
            プロフィール:
            <textarea type="text" name="profile">{{ $user->profile }}</textarea>
          </label>
      </div>
 
      <input type="submit" value="更新">
  </form>
@endsection