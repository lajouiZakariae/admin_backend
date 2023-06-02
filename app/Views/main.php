<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("css/main.css") ?>">

    <?= $this->renderSection("meta-data") ?>

    <title><?= $title ?></title>
</head>

<body>

    <?= $this->renderSection("content") ?>

    <script src="<?= base_url("js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("js/jquery.min.js") ?>"></script>
</body>

</html>