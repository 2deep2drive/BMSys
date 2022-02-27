// like
$(".like").on('click', function () {

    var post_id = $(this).data('post_id');

    var id = $(this).parent().attr("id");


  
    $.post("rating/like", {
        pId: post_id
    }, function (data) {
        if (data.code == 0) {
            console.log(data.msg);
        } else {
            if (data.status == 1) {

                $("#" + id).find('#LC').text(data.like);
                $("#" + id).find('#icon-like').css({
                    "color": "#2dc653"
                });

            } else if (data.status == 2) {

                $("#" + id).find('#LC').text(data.like);
                $("#" + id).find('#icon-like').css({
                    "color": "#2dc653"
                });

            } else if (data.status == 3) {

                $("#" + id).find('#LC').text(data.like);
                $("#" + id).parent().find('#DLC').text(data.dislike);
                $("#" + id).find('#icon-like').css({
                    "color": "#2dc653"
                });
                $("#" + id).parent().find('#icon-dislike').css({
                    "color": "#212529"
                });
                // console.log(xxx);
            } else if (data.status == 4) {

                $("#" + id).find('#LC').text(data.like);
                $("#" + id).find('#icon-like').css({
                    "color": "#212529"
                });
            }
        }
    });

});
// dislike
$(".dislike").on('click', function () {

    var post_id = $(this).data('post_id');

    var id = $(this).parent().attr("id");
    $.post("rating/dislike", {
        pId: post_id
    }, function (data) {
        if (data.code == 0) {
            console.log(data.msg);
        } else {
            if (data.status == 1) {

                $("#" + id).find('#DLC').text(data.dislike);
            } else if (data.status == 2) {

                $("#" + id).find('#DLC').text(data.dislike);
                $("#" + id).find('#icon-dislike').css({
                    "color": "#ee344d"
                });

            } else if (data.status == 3) {

                $("#" + id).find('#DLC').text(data.dislike);
                $("#" + id).parent().find('#LC').text(data.like);
                $("#" + id).parent().find('#icon-like').css({
                    "color": "#212529"
                });
                $("#" + id).find('#icon-dislike').css({
                    "color": "#ee344d"
                });

            } else if (data.status == 4) {
                var likeCount = $("#" + id).find('#DLC').text(data.dislike);
                $("#" + id).find('#icon-dislike').css({
                    "color": "#212529"
                });
            }
        }
    });

});
// --------------
function commentsOnPageLoad() {
    var post_id = $("#comment_card").data('post_id');
    $.post(post_id + "/getData", function (data) {
        var html = '';
        html += ' <div class="media  pl-2 pr-3 pt-2 border-left mt-2 rounded-left" style="background-color:#F8F8F8">';
        html += '<img class="d-flex mr-3 rounded-circle userImage" src="{{asset(' + data.msg.user.img_path + ')}}" alt="" >';
        html += ' <div class="media-body">';
        html += ' <div class="d-flex  justify-content-between">';
        html += ' <span><code style="font-size: 16px !important">' + data.msg.user.uname + '</code></span>';
        html += '  <span style="font-size: 14px !important"> Commented on: <code style="font-size: 14px !important"> ' + new Date(data.msg.created_at).toLocaleDateString('en-us', { year: "numeric", month: "short", day: "numeric" }) + '</code></span>';
        html += ' </div>';
        html += '<p class="p-2 rounded" style="background-color:#E8E8E8">' + data.msg.title + '</p>';
        html += '</div>';
        $('#commentDiv').append(html);
    });
}



$("#comment_form").on('submit', function (e) {
    e.preventDefault(e);
    var form = this;
    var sendURL = $(form).attr('action');
    var method = $(form).attr('method');
    $.ajax({
        url: sendURL,
        method: method,
        data: new FormData(form),
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function () {
            $(form).find('span.error-text').text('');
        },
        success: function (data) {
            if (data.code == 0) {
                $.each(data.error, function (prefix, val) {
                    $(form).find('span.' + prefix + '_error')
                        .text(val[0]);
                });
            } else {
                $(form)[0].reset();
                commentsOnPageLoad();
            }
        }
    });
});

$('.bookmark').on('change',function() {
    var post_id = $(this).data('post_id');
    //    alert(post_id);
    if(this.checked) {
        $(this).parent(".btn.focus").css({
            "color": "#36b9cc"
        });
        $.post("post/add-bookmark/"+post_id,function (data) {
            console.log(data);
        });
    } else {
        $(this).parent(".btn.focus").css({
            "color": ""
        });
        $.post("post/remove-bookmark/"+post_id,function (data) {
            console.log(data);
        });
    }
        
});