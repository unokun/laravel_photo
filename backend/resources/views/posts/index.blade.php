@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <a href="{{route('posts.create')}}">新規投稿</a>

  <ul class="recommend_users">
    @forelse($recommend_users as $recommend_user)
      <li><a href="{{ route('users.show', $recommend_user) }}">{{ $recommend_user->name }}</a></li>
    @empty
      <li>おすすめユーザーはいません。</li>
    @endforelse
  </ul>

  <ul>
      @forelse($posts as $post)
        <li class="posts">
        <div class="post_content">
              <div class="post_body">
                <div class="post_body_heading">
                  投稿者:{{ $post->user->name }}
                  ({{ $post->created_at }})
                </div>
                <div class="post_body_main">
                  <div class="post_body_main_img">
                    @if($post->image !== '')
                        <img src="{{ asset('storage/' . $post->image) }}">
                    @else
                        <img src="{{ asset('images/No_image.png') }}">
                    @endif
                    <a href="{{ route('posts.edit_image', $post) }}">画像を変更</a>            
                  </div>
                  <div class="post_body_main_comment">
                    {{ $post->comment }}
                  </div>
                </div>
                <div class="post_body_footer">
                  <a class="like_button">{{ $post->isLikedBy(Auth::user()) ? '★' : '☆' }}</a>
                  <form method="post" class="like" action="{{ route('posts.toggle_like', $post) }}">
                    @csrf
                    @method('patch')
                  </form>
                  [<a href="{{ route('posts.edit', $post) }}">編集</a>]
                  <form class="delete" method="post" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除">
                  </form>
                </div>
              </div>
            </div>
        </li>
      @empty
          <li>書き込みはありません。</li>
      @endforelse
  </ul>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    /* global $ */
    $('.like_button').on('click', (event) => {
        $(event.currentTarget).next().submit();
    })
  </script>
@endsection