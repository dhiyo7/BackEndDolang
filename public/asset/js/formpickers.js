(function($) {
  'use strict';
    $('#timepicker-example').datetimepicker({
      format: 'HH:mm'
    });
    $('#timepicker-example2').datetimepicker({
      format: 'HH:mm'
    });
    var opened = $("#opened").val().replace(':','').substr(0,2).replace('0','')
    var closed = $("#closed").val().replace(':','').substr(0,2).replace('0','')
    
    // if(opened < 3){
    //   alert("")
    // }



})(jQuery);
