<section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="<?= $this->baseUrl;?>">Home</a></li>
        <li class="breadcrumb-item active"><?= $category->getName();?></li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading">Détail Produit</h1>
      </div>
    </div>
  </section>

  <section itemtype="http://schema.org/Product" itemscope class="products-grid">
    <div class="container container-products">
        <div class="row">
            <div class="col-6">
                <img itemprop="image" content="<?= $this->baseUrl.'/'.$product->getPicture();?>" src="<?= $this->baseUrl.'/'.$product->getPicture();?>" alt="product" class="img-product">
            </div>
            <div class="col-6">
                <h2 itemprop="name"><?= $product->getName();?></h2>
                <p class="text-muted">by <strong class="product-name" itemprop="brand"><?= $brand->getName();?></strong></p>
                <div itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope class="rate-product">
                    <meta itemprop="ratingCount" content="18">
                    <meta itemprop="ratingValue" content="4">
                    <i class="fa fas fa-star"></i>
                    <i class="fa fas fa-star"></i>
                    <i class="fa fas fa-star"></i>
                    <i class="fa fas fa-star"></i>
                    <i class="fa fas fa-star-o"></i>
                </div>
                <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                  <meta itemprop="availability" content="InStock">
                  <meta itemprop="priceCurrency" content="EUR">
                  <p class="text-muted"><strong class="price-product" itemprop="price"><?= $product->getPrice();?></strong>€ TTC</p>
                </div>
                <div class="product-action-buttons">
                <form action="<?= $this->baseUrl . '/ajout-panier/';?>" method="post">
                  <input type="hidden" name="product_id" value="<?= $product->getId();?>">
                  <input type="hidden" name="product_qty" value="1">
                  <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
                </form>
                </div>                
                <div itemprop="description" class="py-2">
                    <p class="text-sm mb-1"><?= $product->getDescription();?></p>
                    
                </div>
            </div>
        </div>
    </div>
  </section>