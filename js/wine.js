window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createWineForm'
    //-------------------------------------------------------------------------
    var createWineForm = document.getElementById('createWineForm');//gets element by id from the create wine form
    if (createWineForm !== null) {
        createWineForm.addEventListener('submit', validateWineForm);
    }

    function validateWineForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {//checks that the data from the user is correct
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createWineForm'
    //-------------------------------------------------------------------------
    var editWineForm = document.getElementById('editWineForm');//gets element by id from the create wine form
    if (editWineForm !== null) {
        editWineForm.addEventListener('submit', validateWineForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteWine' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteWine');//gets element by class name 
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this wine?")) {//checks that the useris sure that they want to delete the wine
            event.preventDefault();
        }
    }

};







