var themeprimary = localStorage.getItem("themeprimary") || '#7b38f2';
var themesecondary = localStorage.getItem("themesecondary") || '#fa6204';
var themesuccess = localStorage.getItem("themesuccess") || '#13b001';
var themeinfo = localStorage.getItem("themeinfo") || '#018fef';
var themewarning = localStorage.getItem("themewarning") || '#fa9c07';


window.Codexomee = {
	themeprimary: themeprimary,
	themesecondary: themesecondary,
	themesuccess: themesuccess,
	themeinfo: themeinfo,
	themewarning: themewarning,
};


//*** light & dark action  ***//
$('.action-dark').click(function(){   
	$(this).toggleClass('action-light');   
	$('.icon-dark').toggle('');
	$('.icon-light').toggle('');
	$('body').toggleClass('darkmode');
});  

//*** Sidebar Mode ***//
$('.sidebardark-action').click(function(){   
	$('.codex-sidebar').addClass('sidebar-dark');
});
$('.sidebarlight-action').click(function(){   
	$('.codex-sidebar').removeClass('sidebar-dark');
});

//*** customizer ***//
$('.customizer-action').click(function(){   
	$('.theme-cutomizer , .customizer-layer').toggleClass('active');
});
$('.customizer-header').click(function(){   
	$('.theme-cutomizer , .customizer-layer').toggleClass('active');
});



$('.dark-action').click(function(){   
	$('body').addClass('darkmode');
});
$('.light-action').click(function(){   
	$('body').removeClass('darkmode');
});

$('.customizeoption-list li').click(function(){   
	$(this).addClass('active-mode')
	$(this).siblings().removeClass('active-mode');
});

$('.ltr-action').click(function(){   
	$('body').removeClass('rtlmode');
});
$('.rtl-action').click(function(){   
	$('body').addClass('rtlmode');
});


$('.customizer-layer').click(function(){   
	$(this).removeClass('active');
	$('.theme-cutomizer').removeClass('active');
});



//** Theme color mode  ***//
$('.themecolor-list').on( 'click', '.color1', function() {   
  $("#customstyle" ).attr("href", "../assets/css/style.css" );
  return false;
});
$('.themecolor-list').on( 'click', '.color2', function() {   
  $("#customstyle" ).attr("href", "../assets/css/color2.css" );
  return false;
});
$('.themecolor-list').on( 'click', '.color3', function() {   
  $("#customstyle" ).attr("href", "../assets/css/color3.css" );
  return false;
});
$('.themecolor-list').on( 'click', '.color4', function() {   
  $("#customstyle" ).attr("href", "../assets/css/color4.css" );
  return false;
});
$('.themecolor-list').on( 'click', '.color5', function() {   
  $("#customstyle" ).attr("href", "../assets/css/color5.css" );
  return false;
});
$('.themecolor-list').on( 'click', '.color6', function() {   
  $("#customstyle" ).attr("href", "../assets/css/color6.css" );
  return false;
});