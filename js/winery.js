window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createWineForm'
    //-------------------------------------------------------------------------
    var createWineryForm = document.getElementById('createWineryForm');//gets element by id from the create wine form
    if (createWineryForm !== null) {
        createWineryForm.addEventListener('submit', validateWineryForm);
    }

    function validateWineryForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {//checks that the data from the user is correct
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createWineForm'
    //-------------------------------------------------------------------------
    var editWineryForm = document.getElementById('editWineryForm');//gets element by id from the create wine form
    if (editWineryForm !== null) {
        editWineryForm.addEventListener('submit', validateWineryForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteWine' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteWinery');//gets element by class name 
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this winery?")) {//checks that the useris sure that they want to delete the wine
            event.preventDefault();
        }
    }

};







