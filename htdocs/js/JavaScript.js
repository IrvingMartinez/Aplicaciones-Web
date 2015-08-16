/*carrucel*/
$(function(){
  $('#slider a:gt(0)').hide();
  var interval = setInterval(changeDiv, 6000);
  function changeDiv(){
      $('#slider a:first-child').fadeOut(1000)
      .next('a').fadeIn(1000)
      .end().appendTo('#slider');
  }
  $('#slider').hover(
   function() {
     clearInterval(interval);
   },
   function() {
     interval = setInterval(changeDiv, 6000);
   }
  );   
  $('.mas').click(function(){
    changeDiv();
    clearInterval(interval);
    interval = setInterval(changeDiv, 6000);
  });
  $('.menos').click(function(){
    $('#slider a:first-child').fadeOut(1000);
    $('#slider a:last-child').fadeIn(1000).prependTo('#slider');
    clearInterval(interval);
    interval = setInterval(changeDiv, 6000);
  });
});

/*header sub-menu*/

$(function() {


    $(document).on('click','#account',function (){;
        $("#topbar-menu").toggleClass("show");
        $("#topbar-menu").toggleClass("hide");
        $(this).find('#ico-account').toggleClass('ion-chevron-down');
        $(this).find('#ico-account').toggleClass('ion-chevron-up');
    })
    $(document).on('click','.submenu',function (){
        $(this).find("#sub-content").toggleClass("show");
        $(this).find("#sub-content").toggleClass("hide");
        $(this).find('#icon').toggleClass('ion-chevron-right');
        $(this).find('#icon').toggleClass('ion-chevron-up');
    })
     
});


$(function() {
    $('div.header nav').click(function(e) {
        var $this = $(this);
        
        $this.toggleClass('open');
        e.stopPropagation();
    });
    $('html,body').click(function() {
        $('div.header nav.open').removeClass('open');
    });
});