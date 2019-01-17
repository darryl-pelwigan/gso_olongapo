/**
 * BenedictMS
 * Custom javascript
 */

$.fn.init_notifcationMenu = function(){
    $('.notifications').each(function(index){

         $.fn.getNotification($( this ));
    });
};


$.fn.getNotification = function(el){
     $.ajax({
          type: 'POST',
          url: menu_notifications_path,
          data: {
            _token : csrf_token,
              notification_menu : el.attr('data-notification')
          },
          dataType: "json",
          error: function(){
              console.log('error');
          },
          success: function(data) {
            if(data != 'null'){
              var notifs = '';
              for(var key in data ){
                  if(data[key].count > 0){
                    notifs = '<span class="label '+data[key].color+' pull-right" >'+data[key].count+'</span>'+notifs;
                  }
              }

              el.html(notifs);
            }
          }
        });
};

$.fn.notificationTime = function(delay_time){
    var timeoutID;
    delayedAlert();
    function delayedAlert() {
      timeoutID = window.setInterval(slowAlert, delay_time);
    }
    function slowAlert() {
      $.fn.init_notifcationMenu();
    }
};

$.fn.notificationTime(10000);
$.fn.init_notifcationMenu();