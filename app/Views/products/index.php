<?= $this->extend("main") ?>

<?= $this->section("content") ?>

<div class="container">

    <h1>All Products</h1>

    <div class="row">

        <?php foreach ($products as $product) : ?>
            <div class="col-6">
                <h3><?= $product->title ?></h3>
                <p><?= $product->price ?></p>
            </div>
        <?php endforeach ?>

    </div>
</div>

<?= $this->endSection() ?>