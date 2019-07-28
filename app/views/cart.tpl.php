<section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="<?= $this->baseUrl;?>">Home</a></li>
          <li class="breadcrumb-item active">Panier</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">Panier</h1>
        <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">Vous avez 2 produits dans votre panier</p></div>
          </div>
        </div>
      </div>
  </section>
  <section>
      <div class="container-fluid cart-list">
        <div class="row mb-5"> 
          <div class="col-lg-8">
            <div class="cart">
              <div class="cart-wrapper">
                <div class="cart-header text-center">
                  <div class="row">
                    <div class="col-5 font-weight-bold">Produit</div>
                    <div class="col-2 font-weight-bold">Prix</div>
                    <div class="col-2 font-weight-bold">Quantité</div>
                    <div class="col-2 font-weight-bold">Total</div>
                    <div class="col-1"></div>
                  </div>
                </div>
                <div class="cart-body">
                  <!-- Product-->
                  <?php foreach ($array_products as $product): ;?>
                    <div class="cart-item">
                        <div class="row d-flex align-items-center text-center">
                          <div class="col-5">
                            <div class="d-flex align-items-center"><a href="<?= $this->baseUrl;?>/catalogue/produit/<?= $product->getId();?>"><img src="<?= $this->baseUrl .'/'. $product->getPicture();?>" alt="..." class="cart-item-img"></a>
                              <div class="cart-title text-left"><a href="<?= $this->baseUrl;?>/catalogue/produit/<?= $product->getId();?>" class="text-uppercase text-dark"><strong><?= $product->getName();?></strong></a><br><span class="text-muted text-sm">Taille : Large</span><br>
                                <span class="text-muted text-sm">Couleur : Jaune</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-2"><?= $product->getPrice();?>€</div>
                          <div class="col-2">
                            <div class="d-flex align-items-center">
                              <div class="btn btn-items btn-items-decrease">-</div>
                              <input value="4" class="form-control text-center input-items" type="text">
                              <div class="btn btn-items btn-items-increase">+</div>
                            </div>
                          </div>
                          <div class="col-2 text-center">260€</div>
                          <div class="col-1 text-center"><a href="#" class="cart-remove"> <i class="fa fa-times"></i></a></div>
                      
                        </div>
                    </div>
                 <?php endforeach; ?>
                  
                </div>
              </div>
            </div>
            <div class="my-5 d-flex justify-content-between flex-column flex-lg-row"><a href="<?= $this->baseUrl;?>" class="btn btn-link text-muted"><i class="fa fa-chevron-left"></i> Continuer les achats</a><a href="checkout1.html" class="btn btn-dark">Commander <i class="fa fa-chevron-right"></i>                                                     </a></div>
          </div>
          <div class="col-4">
            <div class="block mb-5">
              <div class="block-header">
                <h6 class="text-uppercase mb-0 font-weight-bold">Récapitulatif</h6>
              </div>
              <div class="block-body bg-light pt-1">
                <p class="text-sm">Le coût de livraison est calculé en fonction des produits choisis</p>
                <ul class="order-summary mb-0 list-unstyled">
                  <li class="order-summary-item d-flex justify-content-between"><span>Sous total</span><span>390€</span></li>
                  <li class="order-summary-item d-flex justify-content-between"><span>Livraison</span><span>10€</span></li>
                  <li class="order-summary-item d-flex justify-content-between"><span>TVA</span><span>0€</span></li>
                  <li class="order-summary-item border-0 d-flex justify-content-between"><span>Total</span><strong class="order-summary-total">400€</strong></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>