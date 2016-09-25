//IF THE BUTTON IS HOVERED > THE SEPARATED ITEMS OF HAMBURGER MOVE
$("#button").mouseenter(function(){
   	$(".bread1").addClass("bread1up");
   	$(".tomatoes").addClass("tomatoesup");
   	$(".salad").addClass("saladup");
   	$(".cheese").addClass("cheeseup");
   	$(".steack").addClass("steackup");
   	$(".bread2").addClass("bread2up");
});

//IF THE BUTTON IS NOT HOVERED ANYMORE > THE SEPARATED ITEMS OF HAMBURGER MOVE IN THEIR INITIAL POSITION
$("#button").mouseleave(function(){
    	$(".bread1").removeClass("bread1up");
    	$(".tomatoes").removeClass("tomatoesup");
    	$(".salad").removeClass("saladup");
    	$(".cheese").removeClass("cheeseup");
    	$(".steack").removeClass("steackup");
    	$(".bread2").removeClass("bread2up");
});

//ANIMATION IN THE RIGHT LIST IF THE BBQ ITEM IS SELECTED
$('#bbq').click(function() {
      $('#sauce p').html('bbq');
      $('#sauce p').addClass('additem');
      setTimeout(function(){
      $("#sauce p").removeClass("additem");
      }, 1000);

});

//ANIMATION IN THE RIGHT LIST IF THE KETCHUP ITEM IS SELECTED
$('#ketchup').click(function() {
        $('#sauce p').html('ketchup');
        $('#sauce p').addClass('additem');
      setTimeout(function(){
      $("#sauce p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE BURGER ITEM IS SELECTED
$('#burger').click(function() {
        $('#sauce p').html('burger');
        $('#sauce p').addClass('additem');
      setTimeout(function(){
      $("#sauce p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE MUSTARD ITEM IS SELECTED
$('#mustard').click(function() {
        $('#sauce p').html('mustard');
        $('#sauce p').addClass('additem');
      setTimeout(function(){
      $("#sauce p").removeClass("additem");
      }, 1000);
}); 

//ANIMATION IN THE RIGHT LIST IF THE CREAMY ITEM IS SELECTED
$('#creamy').click(function() {
        $('#sauce p').html('creamy');
        $('#sauce p').addClass('additem');
      setTimeout(function(){
      $("#sauce p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE ICE TEA ITEM IS SELECTED
$('#it').click(function() {
        $('#drink p').html('ice tea');
        $('#drink p').addClass('additem');
      setTimeout(function(){
      $("#drink p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE COCACOLA ITEM IS SELECTED
$('#coca').click(function() {
      $('#drink p').html('cocacola');
      $('#drink p').addClass('additem');
      setTimeout(function(){
      $("#drink p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE FANTA ITEM IS SELECTED
$('#fanta').click(function() {
        $('#drink p').html('fanta');
        $('#drink p').addClass('additem');
      setTimeout(function(){
      $("#drink p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE SPRITE ITEM IS SELECTED
$('#sprite').click(function() {
        $('#drink p').html('sprite');
        $('#drink p').addClass('additem');
      setTimeout(function(){
      $("#drink p").removeClass("additem");
      }, 1000);
}); 

//ANIMATION IN THE RIGHT LIST IF THE 7UP ITEM IS SELECTED
$('#sevenup').click(function() {
        $('#drink p').html('7up');
        $('#drink p').addClass('additem');
      setTimeout(function(){
      $("#drink p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE WATER ITEM IS SELECTED
$('#water').click(function() {
        $('#drink p').html('water');
        $('#drink p').addClass('additem');
      setTimeout(function(){
      $("#drink p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE FRIES ITEM IS SELECTED
$('#fries').click(function() {
        $('#frie p').html('fries');
        $('#frie p').addClass('additem');
      setTimeout(function(){
      $("#frie p").removeClass("additem");
      }, 1000);
});

//ANIMATION IN THE RIGHT LIST IF THE POTATOES ITEM IS SELECTED
$('#potatoes').click(function() {
        $('#frie p').html('potatoes');
        $('#frie p').addClass('additem');
      setTimeout(function(){
      $("#frie p").removeClass("additem");
      }, 1000);
});

//IF WE ARE CHOISING A SAUCES' ITEM, THE SAUCES' TITLE IS ACTIVATED
$('#sauces #choixs').mouseenter(function() {
      $('#title_s p').addClass('titlehovered');
});

//IF WE AREN'T CHOISING A SAUCES' ITEM ANYMORE, THE SAUCES' TITLE IS DISABLED
$('#sauces #choixs').mouseleave(function() {
      $('#title_s p').removeClass('titlehovered');
});

//IF WE ARE CHOISING A DRINKS' ITEM, THE DRINKS' TITLE IS ACTIVATED
$('#boisson #choixs').mouseenter(function() {
      $('#title_d p').addClass('titlehovered');
});

//IF WE AREN'T CHOISING A DRINKS' ITEM ANYMORE, THE DRINKS' TITLE IS DISABLED
$('#boisson #choixs').mouseleave(function() {
      $('#title_d p').removeClass('titlehovered');
});

//IF WE ARE CHOISING A FRIES' ITEM, THE FRIES' TITLE IS ACTIVATED
$('#frites #choixs').mouseenter(function() {
      $('#title_f p').addClass('titlehovered');
});

//IF WE ARE CHOISING A FRIES' ITEM, THE FRIES' TITLE IS DISABLED
$('#frites #choixs').mouseleave(function() {
      $('#title_f p').removeClass('titlehovered');
});

