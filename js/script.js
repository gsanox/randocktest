/* Custom jquery and datatables calls and functions, 
no validation included, should be implemented in production environment */

$(document).ready(function() {

    // create datatable and load data
    var table = $('#example').DataTable( {
        "ajax": "classes/controller.php?getAllUsers",
    });

    // Insert new user
    $('#newUser').on('click', function(e){
        e.preventDefault();

        // Simple validation
        if($("#firstname").val() == '' || $("#lastname").val() == ''){
            alert('Check input data');
            return;
        }
        
        // get data from view
        var userData = {
            newUser : 1,
            firstname : $("#firstname").val(),
            lastname : $("#lastname").val()
        };
        
        // Call method for inserting new user 
        $.ajax({
            method: "POST",
            url: "classes/controller.php",
            data: userData
            })
            .done(function( msg ) {
                if(msg === "true"){
                    // If all went well, reload datatable data and show message
                    table.ajax.reload(); 
                    $("#panelFooter").css('background', '#DFF0D8').html('User inserted correctly!!');
                }
                else {
                    // If error ocurred, show message, and show message
                    alert("Error inserting user"); 
                    $("#panelFooter").css('background', '#F2DEDE').html('Error Inserting new user');
                }
                    
        });
    });
});