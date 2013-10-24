$(function(e) {
    //$('#typeahead').typeahead({"source": ['aaas']});
$('#input').typeahead([
    {
        name: 'Test',
        local: [ "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Nine" ],
        header: '<h5 class="league-name">Test</h3>'
    }
]);
});

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


