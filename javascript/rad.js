$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'http://search.twitter.com/search.json',
        data: {
            q: 'KnpRadBundle OR rad.knplabs.com-filter:retweets',
            result_type: 'recent',
            rpp: 5
        },
        success: function(data) {
            var tweets = [];
            var urlExp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;

            data.results.forEach(function(tweet) {
                tweets.push(
                    '<img src="' + tweet.profile_image_url + '" title="' + tweet.from_user_name + '" />'
                    + '<b>' + tweet.from_user_name + '</b> ' + tweet.text.replace(urlExp,"<a href='$1'>$1</a>")
                );
            });
            tweets = '<ul><li>' + tweets.join('</li><li>') + '</li></ul>';
            $('#tweets').html(tweets);
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
                contributors.push(
                    '<a href="https://github.com/' + contributor.login + '">'
                    + '<img src="' + contributor.avatar_url + '" title="' + contributor.login + '" /></a>'
                );
            });
            contributors = '<ul><li>' + contributors.join('</li><li>') + '</li></ul>';
            $('#contributors').html(contributors);
        },
        dataType: 'jsonp',
        cache: true
    });
});
