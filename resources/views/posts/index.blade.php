<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <p class="create"><a href="/posts/create">create</a></p>
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <h2 class="title">
                        <a href="/posts/{{ $post -> id }}">{{ $post -> title}}</a>
                    </h2>
                    <p class="body">{{ $post -> body}}</p>
                </div>
                 <div class="delete">
                    <form action="/posts/{{ $post -> id }}/" id="form_delete" method="post" style="display:inline";
                        @csrf
                        @method("DELETE")
                        <p class="delete"><span onclick="return deletePost(this);">削除</span></p>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $posts -> links() }}
        </div>
        <script>
            function deletePost(e){
                "use strict";
                if (confirm("Delete?")) {
                    document.getElementById("form_delete").submit();
                }
            }
        </script>
    </body>
</html>
