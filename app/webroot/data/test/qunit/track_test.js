module("Model: Data.Track")

asyncTest("findAll", function(){
	stop(2000);
	Data.Track.findAll({}, function(tracks){
        console.log(tracks, "FindAll Test");
		ok(tracks, "Object is set")
        ok(tracks.length, "Object has length")
        ok(tracks[0].title, "Track.title is not null")
		start()
	});
	
})

/*
asyncTest("create", function(){
	stop(2000);
    
    var data = {
            title: "Tesxt Track",
            track_number: 5,
            artist_id: 3,
            album_id: 3,
            year: 2011,
            duration: 300.00,
            filename: "/dev/null",
            rating: 5
        }
    
    
	new Data.Tracks(params).save(function(data){
        console.log(data, "Create Test");
//		ok(data);
//        ok(data.id);
//        equals(data.title,"Test Track")
//        data.destroy()
		start();
	})
})

asyncTest("update" , function(){
	stop();
	new Data.Tracks({name: "cook dinner", description: "chicken"}).
            save(function(tracks){
            	equals(tracks.description,"chicken");
        		tracks.update({description: "steak"},function(tracks){
        			equals(tracks.description,"steak");
        			tracks.destroy();
        			start()
        		})
            })

});
asyncTest("destroy", function(){
	stop(2000);
	new Data.Tracks({name: "mow grass", description: "use riding mower"}).
            destroy(function(tracks){
            	ok( true ,"Destroy called" )
            	start();
            })
})
*/