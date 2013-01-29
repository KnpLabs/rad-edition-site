$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'http://search.twitter.com/search.json',
        data: {
            q: 'KnpRadBundle',
            result_type: 'recent',
            count: 5
        },
        success: function(data) {
            var tweets = [];
            data.results.forEach(function(tweet) {
                tweets.push('<b>' + tweet.from_user_name + '</b> ' + tweet.text);
            });
            tweets = '<ul><li>' + tweets.join('</li><li>') + '</li></ul>';
            $('#tweets').html(replaceURLWithHTMLLinks(tweets));
        },
        dataType: 'jsonp',
        cache: true
    });

    function replaceURLWithHTMLLinks(text) {
        var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;

        return text.replace(exp,"<a href='$1'>$1</a>");
    }
});
