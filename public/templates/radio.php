<div class="radio" id="radio">
    
    <audio src="" class="radio__audio"></audio>
    
    <div class="radio__body">
        
        <div class="radio__left">
            <div class="radio__logo">
                <img 
                    src="<?php echo wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ) ) ?>" 
                    alt="">
            </div>
            <div class="radio__inf">
                <div class="radio__moto">
                    <?php _e( 'today is your day !' ) ?>
                </div>
                <div class="radio__name">
                    <?php bloginfo( 'name' ) ?> <span class="radio__live">
                        <?php _e( 'LIVE' ) ?>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="radio__center">
            <div class="radio__play">
            </div>
        </div>
        
        <div class="radio__right">
            <img src="<?php echo plugin_dir_url(  dirname( __FILE__ ) ) ?>img/history.svg" class="radio__history" alt="">
            <div class="radio__volume">
                <img 
                    class="on" 
                    src="<?php echo plugin_dir_url(  dirname( __FILE__ ) ) ?>img/volume.svg" 
                    alt="">
                <img 
                    class="off" 
                    src="<?php echo plugin_dir_url(  dirname( __FILE__ ) ) ?>img/volume-off.svg" 
                    alt="">
                <input type="range" min="0" max="10" value="10">
            </div>
        </div>
    
    </div>
    
    <div class="history">
        <div class="history__top">
            <div class="history__name">
                <?php _e( 'History' ) ?>
            </div>
            <img 
                class="history__close" 
                src="<?php echo plugin_dir_url(  dirname( __FILE__ ) ) ?>img/close.svg" 
                alt="">
        </div>
        <div class="history__date">
            <?php _e( 'Today' ) ?>
        </div>
        <div class="history__list">
        </div>
    </div>

</div>

<script>
    sova_radio(
        'radio', 
        {
			stream_url: "<?php echo carbon_get_theme_option( 'radio_stream_url' ) ?>",
            history_url: "<?php echo carbon_get_theme_option( 'radio_history_url' ) ?>",
        }
    )
</script>
