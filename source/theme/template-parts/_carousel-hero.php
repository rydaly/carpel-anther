<section id="carousel__hero" class="jumbotron jumbotron--home carousel slide">
  <!-- data-ride="carousel" -->
  <div class="gradient">
    <div class="container">
      <div class="callout col-sm-10 col-md-8">
        <div class="inner">
          <h1><span class="highlight"><?php echo get_field('jumbotron_headline'); ?></span></h1>
        </div>
      </div>
    </div>
  </div>

  <div class="carousel-inner" role="listbox">
    <?php $item_count = 0; ?>
    <?php if(get_field('jumbotron')): while(has_sub_field('jumbotron')): ?>
      <?php
        $image = get_sub_field('image');
        $item_count++;
      ?>
        <div class="carousel-item <?php if($item_count == 1) echo 'active' ?>"
          style="background-image: url('<?php echo $image['url']; ?>')">
        </div>
      <?php endwhile; endif;?>
  </div>

  <a class="carousel-control-prev" href="#carousel__hero" role="button" data-slide="prev">
    <svg xmlns="http://www.w3.org/2000/svg" id="" viewBox="0 0 29.6 111.3">
      <style>.st0{fill:none; stroke:#B9E989; stroke-width:2;}</style>
      <path d="M28.9 111L.7 55.7 28.9.3z" class="st0"/>
    </svg>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel__hero" role="button" data-slide="next">
    <svg xmlns="http://www.w3.org/2000/svg" id="" viewBox="0 0 29.6 111.3">
      <style>.st0{fill:none; stroke:#B9E989; stroke-width:2;}</style>
      <path d="M28.9 111L.7 55.7 28.9.3z" class="st0"/>
    </svg>
    <span class="sr-only">Next</span>
  </a>

</section>
