likeHandle = function (element) {

    var element = $(element),
        id = element.attr('data-id'),
        like = 1,
        likes_span = element.find('.likes_count'),
        likes_count = likes_span.html();

    if (element.hasClass('liked')) {
        like = -1;
    }

    $.ajax({
        url: 'like.php',
        type: 'post',
        data: {'action': 'like', 'user_id': id, 'like': like},
        success: function (data, status) {

            if (status == 'success') {

                if (like == 1) {
                    $(element).addClass('liked');
                    likes_span.html(parseInt(likes_count) + 1);
                } else {
                    likes_span.html(parseInt(likes_count) - 1);
                    $(element).removeClass('liked').addClass('disliked');
                }

            }
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    }); // end ajax call
};
