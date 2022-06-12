<section class="single_item">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                
                <?php if (sizeof($imagesExtrasProduct->toArray()) < 1) :?>
                    <div class="single_item-img">
                        <img style="max-width: 500px; min-width: 250px; max-height: 500px; min-height: 250px;" <?= $storesProduct->photo; ?> />
                    </div>
                <?php else :?>
                    <div class="slider">
                        <div class="slides">
                            <input type="radio" name="radio-btn" id="radio1">
                            <input type="radio" name="radio-btn" id="radio2">
                            <input type="radio" name="radio-btn" id="radio3">
                            <input type="radio" name="radio-btn" id="radio4">
                            <input type="radio" name="radio-btn" id="radio5">
                            <?php foreach ($imagesExtrasProduct as $key => $images) :?>
                                    <?php if ($images->photo !== 'Null') :?>
                                        <input type="radio" name="radio-btn" id="radio<?= $key + 2 ?>">
                                    <?php endif ;?>
                            <?php endforeach; ?>

                            <div class="slide first">
                                <img <?= $storesProduct->photo; ?> alt="Imagem 1">
                            </div>

                            <?php foreach ($imagesExtrasProduct as $key => $images) :?>
                                <?php if ($images->photo !== 'Null') :?>
                                    <div class="slide">
                                        <img <?= $images->photo ?> alt="Imagem <?= $key + 2 ?>">
                                    </div>
                                <?php endif ;?>
                            <?php endforeach; ?>

                            <div class="navigation-auto">
                                <div class="auto-btn1"></div>
                                <?php foreach ($imagesExtrasProduct as $key => $images) :?>
                                    <?php if ($images->photo !== 'Null') :?>
                                        <div class="auto-btn<?= $key + 2 ?>"></div>
                                    <?php endif ;?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="manual-navigation">
                            <label for="radio1" class="manual-btn">
                                <img <?= $storesProduct->photo; ?>
                            </label>

                            <?php foreach ($imagesExtrasProduct as $key => $images) :?>
                                <?php if ($images->photo !== 'Null') :?>
                                    <label for="radio<?= $key + 2 ?>" class="manual-btn">
                                        <img <?= $images->photo ?>>
                                    </label>
                                <?php endif ;?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif ;?>
            </div>
            <div class="col-md-6">

                <div class="single_item-details">

                    <h2><?= $storesProduct->product ?></h2>

                    <span class="text-primary">R$<?= $storesProduct->price ?></span>

                    <h4 style="margin-top: 15px">Descrição</h4>

                    <p style="padding-top: 10px;">
                        <?= $storesProduct->description ?>
                    </p>

                    <?php foreach ($storesColors as $storesColor) : ?>
                        <?php if ($storesColor->color2 && $storesColor->color3) : ?>
                            <a href="<?= $this->request->base ?>/homes/product-view/<?= $storesColor->stores_products_id ?>/<?= $storesColor->id ?>/<?= $storesColor->product_flag_code ?>" class="btn" 
                            style="background-color: <?= $storesColor->color ?>; 
                                background-image: linear-gradient(<?= $storesColor->color ?>, <?= $storesColor->color2 ?>, <?= $storesColor->color3 ?>);
                                !important; border-radius: 10px; border: 1px solid #d7d7d7"></a>
                        <?php else : ?>
                            <a href="<?= $this->request->base ?>/homes/product-view/<?= $storesColor->stores_products_id ?>/<?= $storesColor->id ?>/<?= $storesColor->product_flag_code ?>" class="btn" 
                            style="background-color: <?= $storesColor->color ?> !important; border-radius: 10px; border: 1px solid #d7d7d7"></a>
                        <?php endif; ?>

                        
                    <?php endforeach; ?>

                    <form action="<?= $this->request->base; ?>/stores-carts/add" method="post">
                        <?= $this->Flash->render() ?>

                        <input type="number" name="quantity" value="1">

                        <input type="hidden" name="stores_products_id" value="<?= $storesProduct->id ?>">

                        <input type="hidden" name="users_id" value="<?= $idUser ?>"/>

                        <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>"/>

                        <button class="btn btn-primary btn-default" type="submit">
                            <i class="fa fa-shopping-basket"></i> Adicionar ao carrinho
                        </button>

                    </form>

                    <p>Categoria: <a href="#"><?= $storesProduct->stores_category->category ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
