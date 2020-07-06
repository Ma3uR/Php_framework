$(document).ready(function(){
    $( "#slider" ).slider({
        range: true,
        step:10000,
        min: 630000,
        max: 200000000,
        values: [ 6300000, 200000000 ],
        slide: function( event, ui ) {
            // Get values
            let min_budget = ui.values[0];
            let max_budget = ui.values[1];
            $('#range').text(min_budget + ' - ' + max_budget);
            // AJAX request
            $.ajax({
                url: '/moviesList',
                type: 'get',
                data: { min_budget:min_budget, max_budget:max_budget },
                success: function(response){
                    // Updating table data
                    $('.myClass table').remove();
                    $('.myClass').append(json2table(response, 'table'));
                }
            });
        }
    });

    function json2table(json, classes) {
        let cols = Object.keys(json[0]);
        let headerRow = '';
        let bodyRows = '';
        classes = classes || '';
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        cols.map(function(col) {
            headerRow += '<th>' + capitalizeFirstLetter(col) + '</th>';
        });
        json.map(function(row) {
            bodyRows += '<tr>';
            cols.map(function(colName) {
                bodyRows += '<td>' + row[colName] + '</td>';
            })
            bodyRows += '</tr>';
        });
        return '<table class="' +
            classes +
            '"><thead><tr>' +
            headerRow +
            '</tr></thead><tbody>' +
            bodyRows +
            '</tbody></table>';
    }
});