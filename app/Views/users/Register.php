<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registration Page</title>
</head>

<body>
    <div class="container bg mt-4">
        <div class="d-flex justify-content-center mb-4">
            <div class="row">
                <h3>InstaMedia</h3>
            </div>
        </div>
        <div class="card bg-light mb-3 mx-auto shadow" style="max-width: 400px;">
            <div class="card-body">
                <form class="m-3" action="/auth/regis" method="POST">
                    <?= (session()->getFlashData('message')); ?>
                    <div class="text-center mb-4">
                        <h4>Daftar Sekarang</h4>
                        <small class="form-text text-muted">Sudah punya akun? <a href="/auth">Masuk</a></small>
                    </div>
                    <div class="form-group">
                        <small id="emailHelp" class="form-text text-muted">Email</small>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                        <?= $validation->getError('email'); ?>
                    </div>
                    <div class="form-group">
                        <small id="nameHelp" class="form-text text-muted">Nama</small>
                        <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <small id="passwordHelp" class="form-text text-muted">Password</small>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                        <?= $validation->getError('password'); ?>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn-primary" style="padding: 5px 140px;">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>