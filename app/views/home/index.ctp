<div class="grid_6">
    <div class="title">
        <h3>Now Playing</h3>
    </div>
    <div id="now-playing"></div>
</div>

<div class="grid_10">
    <div class="title">
        <h3>Recently Played</h3>   
    </div>
    <div id="played"></div>
</div>
<div class="clear"></div>

<script>
    $(document).ready(function() {
   
        $("#now-playing").load("/tracks/now-playing"); 
     //   $("#playlist").load("/track/playlist");
        $("#played").load("/track/played");
        
        var repeatingAjax = function() { 
            $("#now-playing").load("/track/snow-playing"); 
       //     $("#playlist").load("/track/playlist");
            $("#played").load("/tracks/played");

        }
        var ajaxInterval = setInterval(function () { repeatingAjax(); }, 5000);

       // $("#playlist").corner();
        $("#played").corner();
    });
    
    
</script>
