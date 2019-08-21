
var $collectionHolder; //

var $addNewItem = $('<a href="#">Dodaj Nową Sekcje</a>');
//adding new forms

$(document).ready(function () {

    //get the collectionHolder;
    $collectionHolder = $('#form-list');

    // add remove button to existing items

    $collectionHolder.find('.single-form-wrapper').each(function(){
        addRemoveButton($(this));
    });
   
});

//remove forms

function addRemoveButton($singleForm)
{
   //creating remove button
   var = $removeButton = 

}