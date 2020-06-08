$('.btn-ExitSystem').on('click', function(e){
        e.preventDefault();
        swal({ 
            title: "You want out of the system?",   
            text: "The current session will be closed and will leave the system",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",
            animation: "slide-from-top",   
            closeOnConfirm: false,
            cancelButtonText: "Cancel"
        }, function(){   
            window.location='index.html'; 
        });