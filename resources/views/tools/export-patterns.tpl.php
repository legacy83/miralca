<?php /** @var string $title */ ?>
<?php /** @var string $description */ ?>
<?php /** @var \Miralca\Tools\PluckPatterns $pluckPatterns */ ?>

<?= sprintf( '<h2>%s</h2>', strval( $title ) ); ?>
<?= sprintf( '<p>%s</p>', strval( $description ) ); ?>

<?php if ( !empty( $pluckPatterns->getPatterns() ) ): ?>

    <?= vsprintf( '<textarea class="miralca-export" readonly>%s</textarea>', [
        esc_html( json_encode( $pluckPatterns->getPatterns() ) ),
    ] ); ?>

<?php endif; ?>
