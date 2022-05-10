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
        <div class="posts">
            <h2 class="title">{{ $post -> title}}</h2>
            <p class="body">{{ $post -> body}}</p>
            <p class="updated_at">{{ $post -> updated_at }}</p>
        </div>
        <div class="footer">
            <a href="/posts/{{ $post -> id }}/edit">edit</a>
            <a href="/">back</a>
        </div>
        <div class="delete">
            <form action="/posts/{{ $post -> id }}/" id="form_delete" method="post" style="display:inline">
                @csrf
                @method("DELETE")
                <p class="delete"><span onclick="return deletePost(this);">削除</span></p>
            </form>
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
