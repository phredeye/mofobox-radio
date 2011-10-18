module("Model: Data.Artist")

asyncTest("findAll", function(){
	stop(2000);
	Data.Artist.findAll({}, function(artists){
		ok(artists)
        ok(artists.length)
        ok(artists[0].name)
        ok(artists[0].description)
		start()
	});
	
})

asyncTest("create", function(){
	stop(2000);
	new Data.Artist({name: "dry cleaning", description: "take to street corner"}).save(function(artist){
		ok(artist);
        ok(artist.id);
        equals(artist.name,"dry cleaning")
        artist.destroy()
		start();
	})
})
asyncTest("update" , function(){
	stop();
	new Data.Artist({name: "cook dinner", description: "chicken"}).
            save(function(artist){
            	equals(artist.description,"chicken");
        		artist.update({description: "steak"},function(artist){
        			equals(artist.description,"steak");
        			artist.destroy();
        			start()
        		})
            })

});
asyncTest("destroy", function(){
	stop(2000);
	new Data.Artist({name: "mow grass", description: "use riding mower"}).
            destroy(function(artist){
            	ok( true ,"Destroy called" )
            	start();
            })
})