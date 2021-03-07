<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Blog</title>
</head>
<body>
    <form method = "POST" action="{{ route('add-blog') }}">
    @csrf
        <input type="text" name="id" placeholder="id">
        <input type="text" name="title" placeholder="title">
        <input type="text" name="body" placeholder="body">
        <button type="submit">Create</button>
    </form>
</body>
</html>