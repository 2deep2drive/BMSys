//  --------------------------------------
//  Check the User profile is Exist or not
//  --------------------------------------
function imgeCheck() {
    var imageSrc = $("#user_profile").attr('src');
    if (imageSrc == '' || imageSrc == 'http://127.0.0.1:8000/') {
        $("#user_profile").attr('src', 'https://via.placeholder.com/200x200.png?text=No+Image')
    }
}
//  -------------------
//  Upload User Profile
//  -------------------
$("#form-imageUpload").on('submit', function (e) {
    e.preventDefault(e);
    var form = this;
    $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: new FormData(form),
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(form).find('span.error-text').text('');
        },
        success: function (data) {
            if (data.code == 0) {
                $.each(data.error, function (prefix, val) {
                    $(form).find('span.' + prefix + '_error').text(val[0]);
                });
            } else {
                $("#form-imageUpload").trigger("reset");
                $(form).find('.profile_image_error').hide();
                toastr.success(data.msg);
            }
            var defaultPath = 'http://127.0.0.1:8000/';
            $("#user_profile").attr('src', defaultPath + data.path);
        }
    });
});
//  -------------------
//  Remove User Profile
//  -------------------
$("#form-imageRemove").on('submit', function (e) {
    e.preventDefault(e);
    var form = this;
    $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: new FormData(form),
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(form).find('span.error-text').text('');
        },
        success: function (data) {
            if (data.code == 0) {
                $.each(data.error, function (prefix, val) {
                    $(form).find('span.' + prefix + '_error').text(val[0]);
                });
            } else {
                toastr.success(data.msg);
            }
            $("#user_profile").attr('src', data.path);
            imgeCheck();
        }
    });
});
//  ------------------------------------------------
//  Update/ Change Password Only for logeged in User
//  ------------------------------------------------
$("#form-passwordUpdate").on('submit', function (e) {
    // alert('hi');
    e.preventDefault(e);
    var form = this;
    $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: new FormData(form),
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(form).find('span.error-text').text('');
        },
        success: function (data) {
            if (data.code == 0) {
                $.each(data.error, function (prefix, val) {
                    $(form).find('span.' + prefix + '_error').text(val[0]);

                });
            } else {
                $("#form-passwordUpdate").trigger("reset");
                $(form).find('.errorr').text(data.msg);
                toastr.success(data.msg);
            }
        }
    });
});

