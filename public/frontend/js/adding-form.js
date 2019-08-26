
var $collectionHolder; //

var $addNewItem = $('<a href="#" class="btn btn-success">Dodaj Nową Sekcje</a>');
//adding new forms

$(document).ready(function () {

    //get the collectionHolder;
    $collectionHolder = $('#form-list');
    // add remove button to existing items

    $collectionHolder.find('.single-form').each(function(){
        addRemoveButton($(this));
    });

        //add new button 
    $collectionHolder.append($addNewItem);
    //counting forms and setting index data
    $collectionHolder.data('index', $collectionHolder.find('.single-form').length);
        
        //adding form
    $addNewItem.click(function(e){
        e.preventDefault();
        addNewForm();
    });
   
});


    function addNewForm()
    {
        //fetching prototype
        var prototype = $collectionHolder.data('prototype');
        //creating form
        var index = $collectionHolder.data("index");
        //replacing name with id and creating new one for futher forms
        var newForm = prototype.replace(/__name__/g, index);
        $collectionHolder.data("index", index+1);
        //appendign form itself
        var $panel = $('<div class="single-form"></div>').append(newForm);

        // append the removebutton to the new panel
        addRemoveButton($panel);
        // append the panel to the addNewItem
        // we are doing it this way to that the link is always at the bottom of the collectionHolder
        $addNewItem.before($panel);
    }





//remove forms

function addRemoveButton($singleForm)
{
   //creating remove button
   var $removeButton = $('<a href="#" class="btn btn-danger"> Usuń Sekcje </a>');
    var $formFooter = $('<div class="single-form-footer"></div>').append($removeButton);

    //removing single form
    $removeButton.click(function(e){
        e.preventDefault();
        $singleForm.slideUp(1000, function ()
        {
            $singleForm.remove();
        });
    });

    $singleForm.append($formFooter);
}