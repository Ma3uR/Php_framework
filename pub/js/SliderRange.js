$(document).ready(function(){
    // Initializing slider
    $( "#slider" ).slider({
        range: true,
        step:100000,
        min: 6300000,
        max: 200000000,
        values: [ 6300000, 200000000 ],
        slide: function( event, ui ) {

            // Get values
            var min = ui.values[0];
            var max = ui.values[1];
            $('#range').text(min+' - ' + max);

            // AJAX request
            $.ajax({
                url: '/moviesList',
                type: 'GET',
                data: {min:min,max:max},
                success: function(response){

                    // Updating table data
                    $('#movies-list tr:not(:first)').remove();
                    $('#movies-list').append(response);
                }
            });
        }
    });
});