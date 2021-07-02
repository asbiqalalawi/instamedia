<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/home/post">Post</a>
                    <a class="nav-link active" aria-current="page" href="/auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <?php foreach ($post as $p) : ?>
            <div class="card mb-2" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text"><?= $p['user']; ?></p>
                </div>
                <img src="/img/<?= $p['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?= $p['description']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>