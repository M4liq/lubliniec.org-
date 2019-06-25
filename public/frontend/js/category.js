

var used = false; 

$(document).on("click", ".list-element",function(){
    
 
    if(!used)
    { 
     
        var before = $(this).html();
        $(this).addClass('during-edition');
        $(this).html('<input type="text" id="input-active" value="'+before+'"></input>');
         used = true;
    }

  });  

  $(".add").click(function(){
    if(!used)
    { 
      
        var toDisplay =  '<li class="list-group-item list-group-item-action px-5">';
        if($(".ranges-group")[0])
        {
         toDisplay = toDisplay + '<span class="list-element" value="4"> Początek przedziału </span>';
         toDisplay = toDisplay + ' -';
         toDisplay = toDisplay + '<span class="list-element" value="4"> Koniec przedziału </span>';
        }
        else 
        toDisplay = toDisplay + '<span class="list-element" value="4"> Nowy element... </span>';
         toDisplay = toDisplay +  '<label class="container-checkbox">';
         toDisplay = toDisplay +  '<input type="checkbox" class="category-element">';
         toDisplay = toDisplay +  '<span class="checkmark"></span>';
         toDisplay = toDisplay +  '</label>';
         toDisplay = toDisplay +  '</li>';
        $(".list-group").append(toDisplay);
        used = false;
    }
  });

  $(document).on('keypress',function(e) {
    if(e.which == 13) {

        var text = $("#input-active").val();
        $(".during-edition").html(text);
        $(".during-edition").attr("class","list-element");
        used = false;
    }
});

$(".unselect-all").click(function(){
  $(".category-element").prop("checked",false)
});

$(".select-all").click(function(){
  $(".category-element").prop("checked",true)
});

