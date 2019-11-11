<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Posts</h1>
    <a href="/posts/create">Add new</a>
    <ul>
        <?php foreach($posts as $post): ?>
            <li>
                <a href="/posts/show?id=<?=$post->id?>"><?=$post->title?></a>
                <a href="/posts/edit?id=<?=$post->id?>">edit</a>
                <a href="/posts/delete?id=<?=$post->id?>">delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>