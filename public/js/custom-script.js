$(window).on('load', function() {
  $(".codex-loader").fadeOut("slow");
  // $("body").addClass("darkmode");
});
$( document ).ready(function() {
  //***- SIDEBAR - START 
  $(".submenu-list").slideUp(300);
  $(".secondsubmenu-list").slideUp(300); 
  $('.codex-menu .menu-item').click(function() {
    $(this).children(".submenu-list").slideToggle(300);    
    $(this).siblings().children(".submenu-list").slideUp(300);    
  });
  // var menuUrl = window.location.pathname.split('/');
  var currentUrl = window.location.href.split('?')[0];
  $(".codex-menu .menu-item a").each(function () {   
    var linkUrl = $(this).attr("href");         
      if ($(this).attr("href")) {          
        if (currentUrl == linkUrl) {              
            $(this).addClass("active");
            $(this).parent().addClass("active");                                     
            $(this).parent().parent().parent().addClass("active");                                                
        }
      }
  });

  $('.sidebar-action').click(function(){   
    $('body').toggleClass("daactive-sidebar");
  });
  $('.codex-header .input-group .input-group-text').click(function(){   
    $('.codex-header .input-group .form-control').toggleClass("active");
  });
 
  $('.cdxapp-toggle').click(function(){   
    $('.cdxapp-sidebar ,.cdxapp-xl-sidebar').toggleClass('show-sidebar')   
  });

  //*** HEADER START 
  $(".header-menu .cdxaction-menu,.header-menu ul.menu-list >li >a").click(function(){   
    $(this).siblings('.menu-list,.sub-list').toggleClass("open");      
    $(this).parent('.menu-item').siblings('.menu-item').children('.sub-list').removeClass("open");
  });


  
     
  //*** Product Page - START
  $( ".proshare-toggle" ).on( "click", function() {
      $(".share-iconlist").toggleClass('show');
  });
  $( ".product-size li , .product-color li" ).on( "click", function() {
      $(this).addClass('active');
      $(this).siblings().removeClass('active')
  });

  //*** Quantity Counter - START
  $(document).on('click','.count-plus',function(){
    $(this).siblings('.pro-qty').val(parseInt($(this).siblings('.pro-qty').val()) + 1 );
  });
  $(document).on('click','.count-minus',function(){
    $(this).siblings('.pro-qty').val(parseInt($(this).siblings('.pro-qty').val()) - 1 );
        if ($(this).siblings('.pro-qty').val() == 0) {
        $(this).siblings('.pro-qty').val(1);
      }
  });

  //*** Grid & List View - START
  $( ".listview-toggle" ).on( "click", function() {
      $('.grid-view-page').addClass('list-view-page');   
      $('.list-view-page').removeClass('grid-view-page');
  });
  $( ".gridview-toggle" ).on( "click", function() {
    $('.list-view-page').addClass('grid-view-page');
    $('.grid-view-page').removeClass('list-view-page');  
  });

  //*** Dropdown Action 
  $(".action-menu .action-toggle").click(function(){                 
    $(this).next('.action-dropdown').toggleClass('active');
  });

  //*** Authentication
  $('.toggle-show').click(function(){
      var inp = $('.showhide-password');
      if (inp.attr('type') == 'password') {
        setTimeout(function(){
            inp.attr('type','text');  
            $(".toggle-show").addClass('fa-eye-slash');   
        },250);
        } else {
          setTimeout(function(){
            inp.attr('type','password');;
            $(".toggle-show").removeClass('fa-eye-slash');
          },250);        
        } 
    });
   
  //*** Window Full Screen - START
  $(".btn-windowfull").on("click", function(){
    document.fullScreenElement && null !== document.fullScreenElement || !document.mozFullScreen && !document.webkitIsFullScreen ? document.documentElement.requestFullScreen ? document.documentElement.requestFullScreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullScreen && document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT) : document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
  });    
  

  //*** Theme Icon Code Copy JS 
  function clipboard_genFun(e){
    // Create Div For Clipboard
    let $div = $('<div/>').appendTo('body');
    $div.attr('class', 'copied');
    $div.html(e).show().fadeOut(600);
    setTimeout(function(){
      $div.remove();
    }, 600);
  }
  $('.iconGroup').on('click','li',function() {
    let iconName;
    let html;
    if($('.iconGroup').hasClass('svg')){
      iconName = $(this).children('span').attr('class');   
      html = `<i data-feather="${iconName}"></i>`;      
    }else{
      iconName = $(this).children('i').attr('class');  
      html = `<i class="${iconName}"></i>`;
    }        
    // Create Input For ClassName
    let $temp = $("<input>");
    $("body").append($temp);
    $temp.val(html).select();
    document.execCommand("copy");
    $temp.remove();

    // Clipboard
    clipboard_genFun('Copied to clipboard');
  });

  //*** SINGLE NUMBER COUNTER
  $('.counter').each(function() {
    var $this = $(this);
    jQuery({Counter: 0}).animate({Counter: $this.text()}, {
      duration: 3000,
      easing: 'swing',
      step: function() {
        var num = Math.ceil(this.Counter).toString();
        if(Number(num) > 999){
            while (/(\d+)(\d{3})/.test(num)) {
                num = num.replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
            }
        }
        $this.text(num);
      }
    });
  });
 


  //*** PROGESSBAR COUNTER WITH NUMBER
  $('.progressCounter').each(function() {
    var bar = $(this).find('.progress-bar');
    var value = $(this).find('.count');
    bar.prop('Counter', 0).animate({
      Counter: parseFloat(bar.attr('aria-valuenow'))
    },
    {
      duration: 2000,
      easing: 'swing',      
      step: function(now) {
        var number = parseFloat(Math.round(now * 100) / 100).toFixed(2);
        bar.css({ 'width': number + '%' });              
      }
    });
    jQuery({Counter: 0}).animate({Counter: value.text()}, {
      duration: 2000,
      easing: 'swing',
      step: function(num) {
        var num = Math.ceil(this.Counter).toString();        
        if(Number(num) > 999){
          while (/(\d+)(\d{3})/.test(num)) {
            num = num.replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
          }
        }       
        value.text(num);        
      }
    });
  });
 

  //*** Product Category Checkbox
  var productCheckAll = 'input.custom-input[name="category"]'
  $("input#checkAll").change(function(){
    if(this.checked){
      $(productCheckAll).each(function(){
        this.checked=true;
      })              
    }else{
      $(productCheckAll).each(function(){
        this.checked=false;
      })              
    }
  });
  $(productCheckAll).click(function () {
    if ($(this).is(":checked")){
      var isAllChecked = 0;
      $(productCheckAll).each(function(){
        if(!this.checked)
           isAllChecked = 1;
      })              
      if(isAllChecked == 0){ $('input#checkAll').prop("checked", true); }     
    }else {
      $('input#checkAll').prop("checked", false);
    }
  });

  //*** Product Discount Checkbox
  var discountCheckall = 'input.custom-input[name="discount_group"]'
  $("input#checkAll_discount").change(function(){
    if(this.checked){
      $(discountCheckall).each(function(){
        this.checked=true;
      })              
    }else{
      $(discountCheckall).each(function(){
        this.checked=false;
      })              
    }
  });
  $(discountCheckall).click(function () {
    if ($(this).is(":checked")){
      var isAllChecked = 0;
      $(discountCheckall).each(function(){
        if(!this.checked)
           isAllChecked = 1;
      })              
      if(isAllChecked == 0){ $("input#checkAll_discount").prop("checked", true); }     
    }else {
      $("input#checkAll_discount").prop("checked", false);
    }
  });
 

  //*** On Click Remove Table Row- Product Page(Wishlist/Cart)
  $('.cart-action a.delete').on('click',function(){
    $(this).parents('tr').remove()
  });
  $('a.removeAll_cart').on('click',function(){
    $('tbody.cartBody').remove()
  });

  //** Modal **//
  $('.modal-action').click(function(){
    $(this).siblings('.modal').addClass('active, show');
    $("body").addClass('overflow-hidden');
  });
  $('.modal-close').click(function(){
    $(this).parents('.modal').removeClass('active , show')
    $("body").removeClass('overflow-hidden');
  });
  



  
  //*** Alert ***//
  $(".close-alert").on( "click", function() {
    $(this).parents('.alert').hide();
  });

  //*** Drowpdown ***//
  $(".dropdown button").on( "click", function() {
    $(this).parents('.dropdown').toggleClass('show');
  });

});


//*** accordion
$(".accordion-collapace").slideUp('');   
$(this).next(".accordion-collapace").slideDown('');
if($(".accordion-action").hasClass("active")) {     
  $(".accordion-action.active").next(".accordion-collapace").slideDown('');
}
$(".accordion-grid .accordion-action" ).on( "click", function() {           
  $(this).toggleClass('active');
  $(this).next(".accordion-collapace").slideToggle('');
  $(this).parents().siblings('.accordion-grid').find(".accordion-collapace").slideUp('');
  $(this).parents().siblings('.accordion-grid').find(".accordion-action").removeClass('active');     
});

//*** Tabs ***//       
$('.tabs li a').click(function() {
  // $('.tabs li').removeClass('active');
  $(this).parent().siblings().removeClass('active');
  $(this).parent().addClass('active');
  let currentTab = $(this).attr('href');
  // $(this).parent().parent('.tabs').siblings('.tab-contents .tab-item').hide();
  $(this).parent().parent('.tabs').siblings('.tab-contents').children().hide();
  // $('.tab-contents .tab-item').hide();
  $(currentTab).show();
  return false;
});



$(document).on("click", function(event){
  //***Action Menu
  var $trigger = $(".action-toggle, .action-dropdown");
  if($trigger !== event.target && !$trigger.has(event.target).length){        
    $(".action-dropdown").removeClass("active");        
  }           
});

$(document).on("click", function(event){
  //***Action Menu
  var $trigger = $(".cdxaction-menu, ul.menu-list, .header-menu");
  if($trigger !== event.target && !$trigger.has(event.target).length){        
    $(".menu-list").removeClass("open");        
  }          
});  

$(document).on("click", function(event){
  //*** Dropdown
  var $trigger = $(".dropdown");
  if($trigger !== event.target && !$trigger.has(event.target).length){        
    $(".dropdown").removeClass("show");        
  }           
});