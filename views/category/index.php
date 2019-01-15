
<?php  \app\widgets\MenuWidget::widget()?>

<div class="container">
        <div class="row">

            <?php foreach ($products as $product) { ?>
            <div class="col-4">
                <div class="product">
                    <div class="product-img">
                        <img src="/img/<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                    <div class="product-name"><?= $product['name'] ?></div>
                    <div class="product-descr">Состав: <?= $product['composition'] ?></div>
                    <div class="product-price">Цена: <?= $product['price'] ?> рублей</div>
                    <div class="product-buttons">
                        <button type="button" class="product-button__add btn btn-success">Заказать</button>
                        <button type="button" class="product-button__more btn btn-primary">Подробнее</button>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
</div>