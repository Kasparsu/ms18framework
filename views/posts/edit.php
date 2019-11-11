<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<a href="/posts">back</a>
<h1>Create New Post</h1>
<form method="post" action="/posts/modify?id=<?=$post->id?>">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?=$post->title?>">
    <br>
    <label for="body">Body</label>
    <textarea id="body" name="body"><?=$post->body?></textarea>
    <br>
    <input type="submit" value="Edit">
</form>
</body>
</html>