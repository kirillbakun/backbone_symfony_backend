$(document).ready(function(){
    app.Book = Backbone.Model.extend({
        defaults: {
            image: 'img/placeholder.jpg',
            title: 'No title',
            author: 'Unknown',
            release_date: 'Unknown',
            keywords: 'None'
        }
    });
});