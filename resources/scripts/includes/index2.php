<script type="text/javascript">
    
    function menuready() {
            $(".menuItemOn").css('opacity', 0.0);
            $('.menuItemOn').mouseover(function() {
                $(this).stop();
                $(this).animate({opacity: 1.0}, 200);
            });
            $('.menuItemOn').mouseout(function() {
                $(this).stop();
                $(this).animate({opacity: 0.0}, 350);
            });
        }
            
    $(document).ready(function() {
        menuready();
        //alert('asdf');
    });
</script>