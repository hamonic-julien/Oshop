<section>
  <div class="container-fluid">
      <div class="row mx-0">
        <?php 
          $counter = 0;
          foreach ($array_category as $category) : $counter++;
        ?>
          <div class="<?= $counter > 2 ? 'col-lg-4' : 'col-md-6';?>">
            <div class="card border-0 text-white text-center"><img src="<?= $this->baseUrl.'/'.$category->getPicture();?>" alt="Card image" class="card-img">
              <div class="card-img-overlay d-flex align-items-center">
                <div class="w-100 py-3">
                  <h2 class="<?= $counter <= 2 ? 'display-3' : 'display-5';?> font-weight-bold mb-4"><?= $category->getName();?></h2><a href="<?= $this->baseUrl;?>/catalogue/categorie/<?= $category->getId();?>" class="btn btn-light">Découvrir</a>
                </div>
              </div>
            </div>
          </div>
          <?php if ($counter == 2) : ?>
            <!--Fermeture de la 1ere div row et ouverture de la 2eme-->
            </div>
            <div class="row mx-0">
          <?php endif; ?>
        <?php endforeach;  ?>
      </div>
  </div>
      
</section>