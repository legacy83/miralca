<?php /** @var \Miralca\Tools\PluckPatterns $layoutPatterns */ ?>
<?php /** @var \Miralca\Tools\PluckPatterns $sectionPatterns */ ?>

<?= \Miralca\view( 'tools/export-patterns' )->render( [
    'title' => __( 'Export Layout Patterns', 'miralca' ),
    'description' => __( 'Copy the exported layout patterns bellow and ask your developer to manually import them into your personal WordPress site.', 'miralca' ),
    'pluckPatterns' => $layoutPatterns,
] ); ?>

<?= \Miralca\view( 'tools/export-patterns' )->render( [
    'title' => __( 'Export Section Patterns', 'miralca' ),
    'description' => __( 'Copy the exported section patterns bellow and ask your developer to manually import them into your personal WordPress site.', 'miralca' ),
    'pluckPatterns' => $sectionPatterns,
] ); ?>

<style>
    .miralca-export {
        border: 1px solid #ccc;
        height: 200px;
        margin-bottom: 1em;
        padding: 20px;
        width: 100%;
    }
</style>
