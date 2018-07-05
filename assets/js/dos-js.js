// DM Top
jQuery(window).scroll(function(){
if (jQuery(this).scrollTop() > 160) {
jQuery('.dmtop').css({bottom:"25px"});
jQuery('.dmspan').css({bottom:"3px"});
jQuery('#kak-fix').removeClass("kak");
jQuery('#kak-fix').addClass("kak-fix-top");
} else {
jQuery('.dmtop').css({bottom:"-100px"});
jQuery('.dmspan').css({bottom:"-100px"});
jQuery('#kak-fix').removeClass("kak-fix-top");
jQuery('#kak-fix').addClass("kak");
}
});
jQuery('.dmtop').click(function(){
jQuery('html, body').animate({scrollTop: '0px'}, 800);
return false;
});