<script type="text/javascript">
    // <![CDATA[

    //$( ".selector" ).datepicker( "refresh" );
//    onSelect: function (date) {
//        // Your CSS changes, just in case you still need them
//        $('a.ui-state-default').removeClass('ui-state-highlight');
//        $(this).addClass('ui-state-highlight');
//    }

    var dd = "<?php echo $calendarDates; ?>";
    var ddstr = dd.toString();
    var disableDates = ddstr.split(",");
    //console.log(disableDates);
    
    //var disableDates = ["2014-03-14", "2014-03-15", "2014-03-16", ];
    
    function updateCalendar() {
        $("#datepicker").datepicker({
            numberOfMonths: 3,
            beforeShowDay: function(date) {
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                //console.log(string);
                //console.log( [array.indexOf(string) == -1] );
                //return [disableDates.indexOf(string) == -1];
                
                //dayclass = 'calDayOn';
                if( disableDates.indexOf(string) === -1 ){
                    //dayclass = 'calDayOff';
                    return ['true','ui-state-highlight'];
                }
                
                return [true,""];

                //$('a.ui-state-default').removeClass('ui-state-highlight');
                //$(this).addClass('ui-state-highlight');
            },
            onSelect: function(date) {
                //console.log(disableDates.toString());
                
                var index = disableDates.indexOf(date);
                if (index > -1) {
                    disableDates.splice(index, 1);
                }else{
                    disableDates.push(date);
                }
                
                $.ajax({
                    url: "<?php echo site_url('panel/page/modifyCalendarDates/') ?>",
                    type: "post",
                    data: {
                        calendarDates: disableDates.toString(),
                    },
                    success: function(data) {
                        //console.log(data);
                    },
                    cache: false
                });
                
                //$("#datepicker").datepicker("refresh");
                //updateCalendar();
                // Your CSS changes, just in case you still need them
                //$('a.ui-state-default').removeClass('ui-state-highlight');
                //$(this).addClass('ui-state-highlight');
            }
        });
    }

    $(document).ready(function() {
        updateCalendar();
    });
// ]]>
</script>
