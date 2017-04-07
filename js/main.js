$(function(){
    new smoothScroll.init();
});


$(function(){
    new WOW().init();
});

$(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

function Scroll(){
    var top = document.getElementById('menubar');
	var menuButton = document.getElementById('menu-icon');
    var collapse = document.getElementById('bs-example-navbar-collapse-1');
    var collapse2 = document.getElementById('bs-example-navbar-collapse-2');
    var ypos = window.pageYOffset;
    var logo = $("#logo");
    var small = $("#small");
    if(ypos > 20) {
      top.style.height = "60px";
      top.style.paddingTop = "6px";
      collapse.style.Top = "0";
      collapse2.style.marginTop = "0";
      collapse.style.marginLeft = "-40px";
      collapse.style.marginRight = "-40px";
	  menuButton.style.top = "-3px";
      logo.hide();
      small.show();
    }
    else {
      top.style.height = "80px";
      top.style.paddingTop = "10px";
      collapse.style.top = "10px";
      collapse2.style.marginTop = "5px";
      collapse.style.marginLeft = "-40px";
      collapse.style.marginRight = "-40px";
      menuButton.style.top = "2px";
	  logo.show();
      small.hide();
	  
    }

    if(ypos = 0){
      top.style.height = "60px";
      small.hide();
    }
}
  window.addEventListener("scroll",Scroll);

   $(document).ready(function(){
         //hides the small logo when the page loads
         $("#small").hide(); 
         window.onload = Scroll();


    });
