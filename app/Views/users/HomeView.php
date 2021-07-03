<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icon CSS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Home Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">InstaMedia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/home/post"><i class="far fa-plus-square" style="font-size: x-large;"></i></a>
                    <a class="nav-link active" aria-current="page" href="/auth/logout"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <?php foreach ($post as $p) : ?>
            <div class="card mb-2" style="width: 30rem;">
                <div class="card-body">
                    <p class="card-text"><?= $p['user']; ?></p>
                </div>
                <img src="/img/<?= $p['image']; ?>" class="card-img-top" alt="...">
                <div class="row">
                    <div class="col-3">
                        <?php $cek_like = $LikesModel->where('id_post', $p['id_post'])->where('user', session()->get('name'))->countAllResults(); ?>
                        <?php if ($cek_like) : ?>
                            <form action="/home/unlike/<?= $p['id_post'] ?>" method="POST" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="container mt-2">
                                    <div class="col">
                                        <button type="submit" class="btn"><i class="fas fa-heart" style="color: red; font-size: x-large;"></i></button>
                                        <small><?= $total_like = $LikesModel->where('id_post', $p['id_post'])->countAllResults(); ?></small>
                                        <small>likes</small>
                                    </div>
                                </div>
                            </form>
                        <?php else : ?>
                            <form action="/home/like" method="POST">
                                <input type="hidden" value="<?= $p['id_post']; ?>" id="id<?= $p['id_post']; ?>" name="id_post">
                                <div class="container mt-2">
                                    <div class="col">
                                        <button type="submit" class="btn"><i class="far fa-heart" style="color: black; font-size: x-large;"></i></button>
                                        <small><?= $total_like = $LikesModel->where('id_post', $p['id_post'])->countAllResults(); ?></small>
                                        <small>likes</small>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="container">

                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text"><b><?= $p['user']; ?></b> <?= $p['description']; ?></p>
                    <?php $comment = $CommentModel->where('id_post', $p['id_post'])->get()->getResultArray(); ?>
                    <?php foreach ($comment as $c) : ?>
                        <p class="card-text"><b><?= $c['user'] ?></b> <?= $c['text_comment'] ?></p>
                    <?php endforeach; ?>
                    <form action="/home/comment">
                        <input type="hidden" value="<?= $p['id_post']; ?>" id="id<?= $p['id_post']; ?>" name="id_post">
                        <input type="text" class="form-control" id="text" name="text" placeholder="Add comment..." style="width: 400px;">
                        <button type="submit" class="btn"><i class="far fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>