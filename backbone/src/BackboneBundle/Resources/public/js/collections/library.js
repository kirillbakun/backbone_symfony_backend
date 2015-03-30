$(document).ready(function() {
    app.Library = Backbone.Collection.extend({
        model: app.Book,
        url: 'http://backbone.loc/app_dev.php/get_all'
    });
});