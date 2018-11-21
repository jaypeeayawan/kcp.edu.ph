<?php
$terms = get_terms( 'course_category' );
?>
<div class="search_course__1 <?php echo esc_attr( $class ); ?>">
    <form class="search_course" action="<?php echo home_url( '/' ); ?>" method="get">
        <div class="search_course__1__input">
            <input name="s" type="text" class="form-control" id="pwd" placeholder="<?php esc_html_e( 'Enter your keywords', 'edupro-addons' ); ?>">
            <input type="hidden" name="post_type" value="sfwd-courses" />
        </div>
        <div class="search_course__1__input select-box">
            <select name="terms">
                <option value="" selected><?php esc_html_e( 'Choose Category', 'edupro-addons' ); ?></option>
                <?php foreach ( $terms as $term ) : ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="search_course__1__input select-box">
            <?php
                $course_price_types = array(
                    'open'      => esc_html__( 'Open', 'edupro-addons' ),
                    'closed'    => esc_html__( 'Closed', 'edupro-addons' ),
                    'free'      => esc_html__( 'Free', 'edupro-addons' ),
                    'paynow'    => esc_html__( 'Buy Now', 'edupro-addons' ),
                    'subscribe' => esc_html__( 'Recurring', 'edupro-addons' ),
                );
            ?>
            <select name="course_price_types">
                <option value="" selected><?php esc_html_e( 'Select Price Type', 'edupro-addons' ); ?></option>
                <?php foreach ( $course_price_types as $key => $course_price_type ): ?>
                <option value="<?php echo $key ?>"><?php echo $course_price_type; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="search_course__1__input search_course__1__submit">
            <button type="submit" class="btn-primary"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>&nbsp&nbsp<?php esc_html_e( 'SEARCH FOR COURSE', 'edupro-addons' ); ?></button>
        </div>
    </form>
</div>

<style>
    <?php if ( !empty( $atts['txt_btn_submit_color'] ) ) : ?>
        .search_course__1 button {
            color: <?php echo strip_tags( $atts['txt_btn_submit_color'] ); ?>
        }
    <?php endif; ?>

    <?php if ( !empty( $atts['hover_txt_btn_submit_color'] ) ) : ?>
        .search_course__1 button:hover {
            color: <?php echo strip_tags( $atts['hover_txt_btn_submit_color'] ); ?>
        }
    <?php endif; ?>

    <?php if ( !empty( $atts['bg_btn_submit_color'] ) ) : ?>
        .search_course__1 button {
            background: <?php echo strip_tags( $atts['bg_btn_submit_color'] ); ?>
        }
    <?php endif; ?>

    <?php if ( !empty(  $atts['hover_bg_btn_submit_color'] ) ) : ?>
        .search_course__1 button:hover {
            background: <?php echo strip_tags( $atts['hover_bg_btn_submit_color'] ); ?>
        }
    <?php endif; ?>

    <?php if ( !empty( $atts['bdr_btn_submit_color'] ) ) : ?>
        .search_course__1 button {
            border-color: <?php echo strip_tags( $atts['bdr_btn_submit_color'] ); ?>
        }
    <?php endif; ?>

    <?php if ( !empty( $atts['hover_bdr_btn_submit_color'] ) ) : ?>
        .search_course__1 button:hover {
            border-color: <?php echo strip_tags( $atts['hover_bdr_btn_submit_color'] ); ?>
        }
    <?php endif; ?>
</style>