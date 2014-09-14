<script type="text/javascript">
    // <![CDATA[
    $(function() {
        $("#panelMenu").css('width', '5px');

        $("#panelMenu").mouseover(function() {
            $("#panelMenu").stop();
            $("#panelMenu").animate({width: '175px'}, 100);
        });
        $("#panelMenu").mouseout(function() {
            $("#panelMenu").stop();
            $("#panelMenu").animate({width: '5px'}, 250);
        });

        $(".mi").mouseover(function() {
            $(this).css('backgroundColor', '#f9aB3C');
        });
        $(".mi").mouseout(function() {
            $(this).css('backgroundColor', '#a9aBaC');
        });
    });
// ]]>
</script>