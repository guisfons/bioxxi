<?php
$titulo = get_field('titulo_cards');
$subtitulo = get_field('subtitulo_cards');
if (have_rows('cards')): ?>
    <section class="wrapper cards">
        <?php
            if ($subtitulo) {
                echo '<h2 class="title title--subtitle"><span>' . $titulo . '<span>' . $subtitulo . '</span></span></h2>';
            } else {
                echo '<h2 class="title">' . $titulo . '</h2>';
            }
        ?>
        <div class="cards__container">
        <?php
        while (have_rows('cards')): the_row();
            $titulo = get_sub_field('titulo');
            $icone_id = get_sub_field('icone');
            $conteudo = get_sub_field('conteudo');
            $cor = get_sub_field('cor');

           
            $icone_url = $icone_id ? wp_get_attachment_image_url($icone_id, 'medium') : '';
        ?>
            <div class="card" style="background-color: <?php echo $cor; ?>;">
                <?php if ($icone_url): ?>
                    <img src="<?php echo esc_url($icone_url); ?>" alt="<?php echo esc_attr($titulo); ?>" class="card__icon" />
                <?php endif; ?>
                <article class="card__text">
                    <?php if ($titulo): ?>
                        <h3 class="card__title"><?php echo $titulo; ?></h3>
                    <?php endif; ?>
                    <?php if ($conteudo): ?>
                        <div class="card__content"><?php echo $conteudo; ?></div>
                    <?php endif; ?>
                </article>
            </div>
        <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>