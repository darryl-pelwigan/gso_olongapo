/**
 * BenedictMS
 * Custom javascript
 */

$.fn.removeModal = function(modal_x,delay_time){
    var timeoutID;
    delayedAlert();
    function delayedAlert() {
      timeoutID = window.setTimeout(slowAlert, delay_time);
    }

    function slowAlert() {
      $('#'+modal_x).delay(delay_time).modal('hide');
    //hide the modal

        $('body').removeClass('modal-open');
    //modal-open class is added on body so it has to be removed

        $('.modal-backdrop').remove();
    //need to remove div with modal-backdrop class
    }

    function clearAlert() {
      window.clearTimeout(timeoutID);
    }



};


$('.close').click(function(){
    $('.alert').delay(500).fadeOut();
});

