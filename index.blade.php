<!DOCTYPE html>
<html>
<head>
<title>Lab 3 - Laravel</title>
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
// this is the base url to which all your requests will be made
var baseURL = window.location.origin+"/laravel";
$(document).ready(function(){
    	
    $('#table').click(function(event) { // generates the table
        // change the url parameters based on your API here
        // Using an JQuery AJAX GET request to get data form the server 
        //$.getJSON(baseURL+'/dogs', function(data) {
        $.getJSON(baseURL+'/dogs', function(data) {
            generateTable(data, $('#container'));
        //});
    })
	});

    $('#form').click(function(event) { 
        // creating an empty form
        generateForm(null, $('#container'));
    });

    // Handle table click event for delete
    $('#container').on('click', '.delete', function(event) {
        var id = $(this).val();
        // change the url parameters based on your API here
        // remember to create delete functionality on the server side (Model and Controller)
        // Using an JQuery AJAX GET request to get data form the server 
        $.get(baseURL+"/dogs/"+id+"/delete", function(data) {
            //Generate table again after delete
            //change the url based on your API parameters here
            // Using an JQuery AJAX GET request to get data form the server 
            $.getJSON(baseURL+'/dogs', function(data) {
                generateTable(data, $('#container'));
            });
        });
    });

    // Handle form submit event for both upvale & create
    // if the ID_FIELD is present the server would upvale the database otherwise the server would create a record in the database
    $('#container').on('submit', '#my-form', function(event) {
        var id = $('#id').val();
        console.log(id);
        if (id != "") {
            event.preventDefault();
            submitForm(baseURL+"/dogs/"+id+"/edit", $(this));
        } else {
            event.preventDefault();
            submitForm(baseURL+"/dogs/store", $(this));
        }
    });
    
    // Handle table click event for edit
    // generates form with prefilled values
    $('#container').on('click', '.edit', function(event) {
        // getting id to make the AJAX request
        var id = $(this).val();
        // change the url parameters based on your API here
        // Using an JQuery AJAX GET request to get data form the server 
        $.getJSON(baseURL+'/dogs/'+id, function(data) {
            generateForm(data, $('#container'));
        });
    });
});
    // function to generate table
    function generateTable(data, target) {
        clearContainer(target);
        //Change the table according to your data
        var tableHtml = '<table><thead><tr><th>id</th><th>name</th><th>breed</th><th>weight</th><th>Delete</th><th>Edit</th></tr></thead>';
        $.each(data, function(index, dat) {
            tableHtml += '<tr><td>'+dat.id+'</td><td>'+dat.name+'</td><td>'+dat.breed+'</td><td>'+dat.weight+'</td><td><button class="delete" value="'+dat.id+'">Delete</button></td><td><button class="edit" value="'+dat.id+'">Edit</button></td></tr>';
        });
        tableHtml += '</table>';
        $(target).append(tableHtml);
    }
    
    // function to generate form
    function generateForm(data, target){
        clearContainer(target);
        //Change form according to your fields
        $(target).append('<form id="my-form"></form>');
        var innerForm = '<input type="hidden" name="id" id="id"/>'+'<input type="text" name="name" id="name" />'+ '<input type="text" name="breed" id="breed" />'+ '<input type="text" name="weight" id="weight" />'+ '<input type="submit"/>';
        $('#my-form').append(innerForm);
        //Change values according to your data
        if(data != null){
            $.each(data, function(index, dat) { 
                $('#id').val(dat.id);
                $('#name').val(dat.name); 
                $('#breed').val(dat.breed); 
                $('#weight').val(dat.weight);
            });
        }
    }
    
    function submitForm(url, form){
        $.post(url, form.serialize(), function(data) {
            showNotification(data, $('#notification'));
        });
    };
    
    function showNotification(data, target){
        clearContainer(target);
        target.append('<p>'+data+'</p>');
    }
    
    function clearContainer(container){
        container.html('');
    
};

</script>
</head>
<body>
<!--<div id = 'session'> </div>!>
<!-- Other HTML content -->
<div id="notification"></div>
<button id="table">Table</button><button id="form">Form</button>
<!-- Notifications shown here -->
</div>
<div id="container">
<!-- Main Container for dynamic content -->
</div>
<!-- Other HTML content -->
</body>
</html>