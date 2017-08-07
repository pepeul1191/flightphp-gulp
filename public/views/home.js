var HomeView = Backbone.View.extend({
	el: '#body-app',
	initialize: function(){
		//this.render();
		//console.log("initialize");
	},
	render: function() {
		var template_compiled = null;
		var html_target = this.$el;
		$.ajax({
		   url: STATICS_URL + 'templates/home.html', 
		   type: "GET", 
		   async: false, 
		   success: function(source) {
		   	html_target.html(source);
		   }
		});
		//return template_compiled;
	}
});