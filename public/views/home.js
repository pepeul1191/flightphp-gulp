var HomeView = Backbone.View.extend({
	el: '#body-app',
	initialize: function(){
		//this.render();
		console.log("initialize");
	},
	render: function() {
		var data = { };
		var source = $('#paso1-template').html();
		var template = Handlebars.compile(source);
		var template_compiled = template(data);
		console.log("RENDER???? 2");
		this.$el.html(template_compiled);
		console.log("RENDER???? 1");
		 return this;
	}
});