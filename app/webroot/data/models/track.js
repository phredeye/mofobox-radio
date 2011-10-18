/**
 * @tag models, home
 * Wraps backend tracks services.  Enables 
 * [Data.Tracks.static.findAll retrieving],
 * [Data.Tracks.static.update updating],
 * [Data.Tracks.static.destroy destroying], and
 * [Data.Tracks.static.create creating] tracks.
 */
$.Model.extend('Data.Track',
/* @Static */
{
	/**
 	 * Retrieves tracks data from your backend services.
 	 * @param {Object} params params that might refine your results.
 	 * @param {Function} success a callback function that returns wrapped tracks objects.
 	 * @param {Function} error a callback function for an error in the ajax request.
 	 */
	findAll: function( params, success, error ){
		$.ajax({
			url: '/tracks.json',
			type: 'get',
			dataType: 'json',
			data: params,
			success: this.callback(['wrapMany',success]),
			error: error
		//	fixture: "//data/fixtures/tracks.json.get" //calculates the fixture path from the url and type.
		});
	},
	/**
	 * Updates a tracks's data.
	 * @param {String} id A unique id representing your tracks.
	 * @param {Object} attrs Data to update your tracks with.
	 * @param {Function} success a callback function that indicates a successful update.
 	 * @param {Function} error a callback that should be called with an object of errors.
     */
	update: function( id, attrs, success, error ){
		$.ajax({
			url: '/tracks/'+ id + ".json",
			type: 'put',
			dataType: 'json',
			data: attrs,
			success: success,
			error: error,
			fixture: "-restUpdate" //uses $.fixture.restUpdate for response.
		});
	},
	/**
 	 * Destroys a tracks's data.
 	 * @param {String} id A unique id representing your tracks.
	 * @param {Function} success a callback function that indicates a successful destroy.
 	 * @param {Function} error a callback that should be called with an object of errors.
	 */
	destroy: function( id, success, error ){
		$.ajax({
			url: '/tracks/' + id + ".json",
			type: 'delete',
			dataType: 'json',
			success: success,
			error: error,
			fixture: "-restDestroy" // uses $.fixture.restDestroy for response.
		});
	},
	/**
	 * Creates a tracks.
	 * @param {Object} attrs A tracks's attributes.
	 * @param {Function} success a callback function that indicates a successful create.  The data that comes back must have an ID property.
	 * @param {Function} error a callback that should be called with an object of errors.
	 */
	create: function( attrs, success, error ){
		$.ajax({
			url: '/tracks',
			type: 'post',
			dataType: 'json',
			success: success,
			error: error,
			data: attrs,
			fixture: "-restCreate" //uses $.fixture.restCreate for response.
		});
	}
},
/* @Prototype */
{});