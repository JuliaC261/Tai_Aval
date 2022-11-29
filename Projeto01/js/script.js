$(function(){
    $('nav.mobile').click(function(){
    //quando clicar vai chamar essa funçao
    //vou criar uma variavel p ser acessada varias vezes

    var listaMenu = $('nav.mobile ul');

 //listaMenu.slideToggle(); //abre efeito cortina

 if(listaMenu.is(':hidden')== true ) {

 var icone = $('botao-menu-mobile').find('i');
 icone.removeClass('fa-bars');
 icone.addClass('fa-times');
 listaMenu.slideToggle();
 
 }else {
    var icone = $('botao-menu-mobile').find('i');
    icone.removeClass('fa-times');
    icone.addClass('fa-bars');
    listaMenu.slideToggle();
}

})

})