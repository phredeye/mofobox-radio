module("Model: Data.Album")

asyncTest("findAll", function(){
	stop(2000);
	Data.Album.findAll({}, function(albums){
		ok(albums)
        ok(albums.length)
        ok(albums[0].name)
        ok(albums[0].description)
		start()
	});
	
})

asyncTest("create", function(){
	stop(2000);
	new Data.Album({name: "dry cleaning", description: "take to street corner"}).save(function(album){
		ok(album);
        ok(album.id);
        equals(album.name,"dry cleaning")
        album.destroy()
		start();
	})
})
asyncTest("update" , function(){
	stop();
	new Data.Album({name: "cook dinner", description: "chicken"}).
            save(function(album){
            	equals(album.description,"chicken");
        		album.update({description: "steak"},function(album){
        			equals(album.description,"steak");
        			album.destroy();
        			start()
        		})
            })

});
asyncTest("destroy", function(){
	stop(2000);
	new Data.Album({name: "mow grass", description: "use riding mower"}).
            destroy(function(album){
            	ok( true ,"Destroy called" )
            	start();
            })
})