$('#search').keyup(function() {
    var searchField = $('#search').val();
    var myExp = new RegExp(searchField, "i");
    $.get('"http://localhost:8080/rest/app/libro.php"', function(data) {
        var output = '<ul class="searchresults">';
        $(data).find("title").each(function(index, value){
            var val = value.firstChild.nodeValue;
            if ((val.search(myExp) != -1)) {
                output += '<li>' + val + '</li>';
            }       
        });
        output += '</ul>';
        $('#update').html(output);
    }); //get 
});