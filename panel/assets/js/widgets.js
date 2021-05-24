var addingcolors=[];
$('.card-counter').each(function () {
    
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 2000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
$('.color').each(function(){
    color(this);
});
function color(element) {
    var colors = ["#b33939","#cd6133","#84817a","#cc8e35","#ccae62","#2c2c54","#474787","#aaa69d","#227093","#218c74"];
    var textcolors = ["#f3a683","#f7d794","#778beb","#e77f67","#cf6a87","#786fa6","#f8a5c2","#63cdda","#ea8685"];
    var getRandom=colors[Math.floor(Math.random()*colors.length)];
    
    /*var color="";
    while(addingcolors.indexOf(getRandom)!=-1){
        getRandom=colors[Math.floor(Math.random()*colors.length)];
    }
    console.log(getRandom);
    addingcolors.push(getRandom);*/
    $(element).css('background-color', getRandom+"80");
    $(element).css('color', "#fff   ");

}
