//steal/js data/scripts/compress.js

load("steal/rhino/steal.js");
steal.plugins('steal/build','steal/build/scripts','steal/build/styles',function(){
	steal.build('data/scripts/build.html',{to: 'data'});
});
