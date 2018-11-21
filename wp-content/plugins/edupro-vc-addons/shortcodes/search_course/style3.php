<div class="search_course__3 <?php echo esc_attr( $class ); ?>">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" class="form-control" placeholder="<?php esc_attr_e( 'Search Course / Enter your Keywords', 'edupro-addons' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
        <input type="hidden" name="post_type" value="sfwd-courses" />
        <i class="fa fa-search" aria-hidden="true"><button type="submit"></button></i>
    </form>
</div>


<style>
    <?php if ( !empty( $atts['txt_btn_submit_color'] ) ) : ?>
        .search_course__3 form i.fa.fa-search {
            color: <?php echo strip_tags( $atts['txt_btn_submit_color'] ); ?>
        }
    <?php endif; ?>

    <?php if ( !empty( $atts['hover_txt_btn_submit_color'] ) ) : ?>
        .search_course__3 form i.fa.fa-search:hover {
            color: <?php echo strip_tags( $atts['hover_txt_btn_submit_color'] ); ?>
        }
    <?php endif; ?>
</style>