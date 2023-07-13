<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST"></form>
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="body" id="" cols="30" rows="10">{{$post->body}}</textarea>
    <button>Save changes</button>
</body>
</html>