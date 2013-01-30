$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'http://search.twitter.com/search.json',
        data: {
            q: 'KnpRadBundle',
            result_type: 'recent',
            rpp: 5
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

    $.ajax({
        type: 'GET',
        url: 'https://api.github.com/repos/KnpLabs/KnpRadBundle/contributors',
        success: function(data) {
            var contributors = [];
            data.data.forEach(function(contributor) {
                contributors.push('<a href="https://github.com/' + contributor.login + '"><img src="' + contributor.avatar_url + '" title="' + contributor.login + '" /></a>');
            });
            $('#contributors').html(contributors);
        },
        dataType: 'jsonp',
        cache: true
    });

    function replaceURLWithHTMLLinks(text) {
        var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;

        return text.replace(exp,"<a href='$1'>$1</a>");
    }
});
