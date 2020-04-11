<?php /** @var \Miralca\Tools\PluckPatterns $layoutPatterns */ ?>
<?php /** @var \Miralca\Tools\PluckPatterns $sectionPatterns */ ?>

<?= sprintf( '<h2>%s</h2>', __( 'Export Layout Patterns', 'miralca' ) ); ?>
<?= sprintf( '<p>%s</p>', __( 'Use the content above to import current post types into a different WordPress site.', 'miralca' ) ); ?>

<?php if ( !empty( $layoutPatterns->getPatterns() ) ): ?>

    <?= vsprintf( '<textarea class="miralca-export" readonly>%s</textarea>', [
        esc_html( json_encode( $layoutPatterns->getPatterns() ) ),
    ] ); ?>

<?php endif; ?>

<?= sprintf( '<h2>%s</h2>', __( 'Export Section Patterns', 'miralca' ) ); ?>
<?= sprintf( '<p>%s</p>', __( 'Use the content above to import current post types into a different WordPress site.', 'miralca' ) ); ?>

<?php if ( !empty( $sectionPatterns->getPatterns() ) ): ?>

    <?= vsprintf( '<textarea class="miralca-export" readonly>%s</textarea>', [
        esc_html( json_encode( $sectionPatterns->getPatterns() ) ),
    ] ); ?>

<?php endif; ?>

<style>
    .miralca-export {
        border: 1px solid #ccc;
        height: 200px;
        padding: 20px;
        width: 100%;
    }
</style>