<script>
function alert(content,afterFunction){
$('<div class="alertm_overlay"></div>').appendTo('body');
$('<div class="alertm_all"><a href="#" onclick="alert_close('+afterFunction+'); return false" class="alertm_close">x</a><div class="alertm_wrapper">'+content+'</div><div class="alertm_but" onclick="alert_close('+afterFunction+'); return false">OK</div></div>').appendTo('body');
$(".alertm_overlay, .alertm_all").fadeIn("slow");
$('.alertm_all').css('margin-top', (-1)*($('.alertm_all').height())+'px');
}
function alert_close(afterFunctionClouse){
$(".alertm_overlay, .alertm_all").remove();
afterFunctionClouse;
}
</script>