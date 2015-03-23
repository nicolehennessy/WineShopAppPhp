window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createWineForm'
    //-------------------------------------------------------------------------
    var createGrapeForm = document.getElementById('createGrapeForm');//gets element by id from the create Grape form
    if (createGrapeForm !== null) {
        createGrapeForm.addEventListener('submit', validateGrapeForm);
    }

    function validateGrapeForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {//checks that the data from the user is correct
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createWineForm'
    //-------------------------------------------------------------------------
    var editGrapeForm = document.getElementById('editGrapeForm');//gets element by id from the create Grape form
    if (editGrapeForm !== null) {
        editGrapeForm.addEventListener('submit', validateGrapeForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteWine' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteGrape');//gets element by class name 
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this Grape?")) {//checks that the user is sure that they want to delete the Grape
            event.preventDefault();
        }
    }

};







