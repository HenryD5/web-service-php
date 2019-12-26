
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<input id="searchterm" type="text" /> <button id="search">search</button>



<script type="text/javascript">// <![CDATA[
      $("#searchterm").keyup(function(e){
        var q = $("#searchterm").val();
        $.getJSON("http://localhost:8080/rest/app/libro.php",
        {
          srsearch: q,
          action: "query",
          list: "search",
          format: "json"
        },
        function(data) {
          $("#results").empty();
          $("#results").append("
 
Results for <b>" + q + "</b>
 
");
          $.each(data.query.search, function(i,item){
            $("#results").append("
<div><a href='http://localhost:8080/rest/app/libro.php' + encodeURIComponent(item.title) + "'>" + item.title + "</a>" + item.snippet + "</div>
");
          });
        });
      });
 
// ]]></script>