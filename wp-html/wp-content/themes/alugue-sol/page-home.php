<?php
/**
 * Template Name: Home
 */
get_header();

// DEBUG: mostrar qual arquivo está carregando e o ID do post atual
echo '<pre>';
echo 'Template: ' . basename(__FILE__) . "\n";
echo 'Page ID: ' . get_queried_object_id() . "\n";
print_r( get_queried_object() );
echo '</pre>';
?>

<?php
// Seção Inicial (ACF: title, text_content, save_now)
$initial_title   = get_field('title');
$initial_content = get_field('text_content');
$initial_cta     = get_field('save_now'); // campo Link
$initial_icons = get_field('icons'); // campo Repeater com ícones
?>
<section id="initial-section" class="container py-5 text-center">
  <?php if ( $initial_title ): ?>
    <h1><?php echo esc_html( $initial_title ); ?></h1>
  <?php endif; ?>

  <?php if ( $initial_content ): ?>
    <div class="lead mb-4">
      <?php echo wp_kses_post( $initial_content ); ?>
    </div>
  <?php endif; ?>

  <?php if ( $initial_cta && is_array( $initial_cta ) ): ?>
    <a href="<?php echo esc_url( $initial_cta['url'] ); ?>"
       class="btn btn-primary btn-lg"
       <?php echo $initial_cta['target'] ? 'target="' . esc_attr( $initial_cta['target'] ) . '"' : ''; ?>>
      <?php echo esc_html( $initial_cta['title'] ); ?>
    </a>
  <?php endif; ?>

<?php if( have_rows('icons') ): ?>
  <div class="icon-list d-flex justify-content-center g-4">
    <?php while( have_rows('icons') ): the_row();
      $img = get_sub_field('icon'); // array com URL e alt
    ?>
      <?php if( $img ): ?>
        <img src="<?= esc_url($img['url']); ?>"
             alt="<?= esc_attr($img['alt']); ?>"
             class="icon-svg">
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

</section>

<?php
// Seção Simulador (ACF: title, text_content, simulator_gallery, text_content_2, simulator_button)
$sim_title       = get_field('title');
$sim_text_content    = get_field('text_content');
$sim_image       = get_field('simulator_gallery');
$sim_text_content_2   = get_field('text_content_2');
$sim_button      = get_field('simulator_button');
?>
<section id="simulator" class="container py-5">
  <?php if ( $sim_title ): ?>
    <h2><?php echo esc_html( $sim_title ); ?></h2>
  <?php endif; ?>

  <?php if ( $sim_text_content ): ?>
    <p><?php echo esc_html( $sim_text_content ); ?></p>
  <?php endif; ?>

  <?php if ( $sim_image ): ?>
    <img src="<?php echo esc_url( $sim_image['url'] ); ?>"
         alt="<?php echo esc_attr( $sim_image['alt'] ); ?>"
         class="img-fluid mb-4">
  <?php endif; ?>

  <?php if ( $sim_text_content_2 ): ?>
    <p><?php echo esc_html( $sim_text_content_2 ); ?></p>
  <?php endif; ?>

  <?php if ( $sim_button && is_array( $sim_button ) ): ?>
    <a href="<?php echo esc_url( $sim_button['url'] ); ?>"
       class="btn btn-primary btn-lg"
       <?php echo $sim_button['target'] ? 'target="' . esc_attr( $sim_button['target'] ) . '"' : ''; ?>>
      <?php echo esc_html( $sim_button['title'] ); ?>
    </a>
  <?php endif; ?>
</section>

<?php
// Seção How It Works (ACF Repeater: how_it_works)
if ( have_rows('how_it_works') ): ?>
  <section id="how-it-works" class="container py-5">
    <div class="row">
      <?php while ( have_rows('how_it_works') ): the_row();
        $icon       = get_sub_field('icon');
        $step_title = get_sub_field('step_title');
        $step_desc  = get_sub_field('step_description');
      ?>
        <div class="col-md-4 text-center mb-4">
          <?php if ( $icon ): ?>
            <img src="<?php echo esc_url( $icon['url'] ); ?>"
                 alt="<?php echo esc_attr( $icon['alt'] ); ?>"
                 style="width:50px;">
          <?php endif; ?>

          <?php if ( $step_title ): ?>
            <h5><?php echo esc_html( $step_title ); ?></h5>
          <?php endif; ?>

          <?php if ( $step_desc ): ?>
            <p><?php echo esc_html( $step_desc ); ?></p>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>

<?php
// Seção About (ACF: about_title, about_content)
$about_title   = get_field('about_title');
$about_content = get_field('about_content');
?>
<section id="about" class="container py-5">
  <?php if ( $about_title ): ?>
    <h2><?php echo esc_html( $about_title ); ?></h2>
  <?php endif; ?>

  <?php if ( $about_content ): ?>
    <div><?php echo wp_kses_post( $about_content ); ?></div>
  <?php endif; ?>
</section>

<?php
// Seção Become a Member (ACF: member_title, member_text, member_cta)
$member_title = get_field('member_title');
$member_text  = get_field('member_text');
$member_cta   = get_field('member_cta');
?>
<section id="become-a-member" class="container py-5 text-center">
  <?php if ( $member_title ): ?>
    <h2><?php echo esc_html( $member_title ); ?></h2>
  <?php endif; ?>

  <?php if ( $member_text ): ?>
    <p><?php echo esc_html( $member_text ); ?></p>
  <?php endif; ?>

  <?php if ( $member_cta && is_array( $member_cta ) ): ?>
    <a href="<?php echo esc_url( $member_cta['url'] ); ?>"
       class="btn btn-primary btn-lg"
       <?php echo $member_cta['target'] ? 'target="' . esc_attr( $member_cta['target'] ) . '"' : ''; ?>>
      <?php echo esc_html( $member_cta['title'] ); ?>
    </a>
  <?php endif; ?>
</section>

<?php
// Seção Como Funciona (ACF Repeater: how_works)
if ( have_rows('how_works') ): ?>
  <section id="how_works" class="container py-5">
    <div class="row g-4">
      <?php while ( have_rows('how_works') ): the_row();
        $texto = get_sub_field('texto');
        $icone = get_sub_field('icone');
      ?>
        <div class="col-md-4">
          <div class="p-4 bg-light rounded">
            <?php if ( $icone ): ?>
              <img src="<?php echo esc_url( $icone['url'] ); ?>"
                   alt="<?php echo esc_attr( $icone['alt'] ); ?>"
                   style="width:24px;display:block;margin-bottom:8px;">
            <?php endif; ?>
            <p><?php echo wp_kses_post( $texto ); ?></p>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>

<?php
get_footer();
