<?php
$this->title = 'Суши-Шоп | '.$product['name'];
?>


<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-8 justify-self-center">
            <h2><div class="product-title"><?=$product['name'] ?></div></h2>
            <div class="product">
                <div class="product-img">
                    <img src="/img/<?=$product['img'] ?>" alt="<?=$product['name'] ?>">
                </div>
                <div class="product-name"><?=$product['name'] ?></div>
                <div class="product-descr">Состав: <?=$product['composition'] ?></div>
                <div class="product-descr">Описание: <?=$product['descr'] ?></div>
                <div class="product-price">Цена: <?=$product['price'] ?> рублей</div>
                <div class="product-buttons">
                    <a href="#" data-name="<?=$product['link_name'] ?>" type="button" class="product-button__add btn btn-success">Заказать</a>
                </div>
            </div>
        </div>
    </div>
</div>