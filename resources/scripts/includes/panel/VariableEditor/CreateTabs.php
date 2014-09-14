<script type="text/javascript">
    // <![CDATA[
    function createTabs() {
        <?php foreach($VEtabs as $tab){ 
            echo "$(\"#$tab\").tabs();\n";
        } ?>
    }
    // ]]>
</script>
