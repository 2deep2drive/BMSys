$('#table-post-exceptUser').DataTable({
    processing: false,
    info: true,
    ajax: 'post/getDataExceptUser',
    "autoWidth": false, // might need this


    "aLengthMenu": [
        [5, 50, 100, 500, 1000, -1],
        [5, 50, 100, 500, 1000, "All"]
    ],
    columns: [{
        data: 'id',
        name: 'xxx',
        class: "text-nowrap"
    },
    {
        data: 'Author_Name',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false

    },
    {
        data: 'Catagory_Name',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'Tags_Name',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'title',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'metatitle',
        name: 'xxx',
        class: "text-nowrap",
        visible: false
    },
    {
        data: 'Status',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'Published_at',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'Created_At',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'Updated_At',
        name: 'xxx',
        class: "text-nowrap"
    },
    {
        data: 'Actions',
        name: 'xxx',
        class: 'text-center'
    },
    ],

});









//  -----------------------------
//  Showing Data into a DataTable
//  -----------------------------
$('#table-post').DataTable({
    processing: false,
    info: true,
    ajax: 'post/getData',
    "autoWidth": false, // might need this


    "aLengthMenu": [
        [5, 50, 100, 500, 1000, -1],
        [5, 50, 100, 500, 1000, "All"]
    ],
    columns: [{
        data: 'id',
        name: 'xxx',
        class: "text-nowrap"
    },
    {
        data: 'Author_Name',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false

    },
    {
        data: 'Catagory_Name',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'Tags_Name',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'title',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'metatitle',
        name: 'xxx',
        class: "text-nowrap",
        visible: false
    },
    {
        data: 'Status',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'Published_at',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'Created_At',
        name: 'xxx',
        class: "text-nowrap",
        // visible: false
    },
    {
        data: 'Updated_At',
        name: 'xxx',
        class: "text-nowrap"
    },
    {
        data: 'Actions',
        name: 'xxx',
        class: 'text-center'
    },
    ],

});
//  -------------------------------------------------
//  Show and Hide Column into a DataTable on PageLoad
//  -------------------------------------------------
dataColumnIsVisibleOnPageLoad("#table-post");
//  -------------------------------------------------
//  Show and Hide Column into a DataTable on btnClick
//  -------------------------------------------------
showHideDataTableColumn("#table-post");
//  ----------------------
//  Post add functionality
//  ----------------------
$("#form-create-post").on('submit', function (e) {
    e.preventDefault(e);
    var form = this;
    var selectCat = $("#selectCat :selected").data('id');
    var selectedTag = [];
    $("#selectTag :selected").each(function () {
        selectedTag.push($(this).data("tagno"));
    });
    var title = $("#pTitle").val();
    var desc = $("#summernote").val();
    //-----validation
    if ($('#selectCat').val() == undefined) {
        $("#form-create-post").find('#catagoryError')
            .text('cataory is not selected');
        console.log('cataory is not selected');
    } else if (selectedTag.length === 0) {
        $("#form-create-post").find('#tagError')
            .text('Tag is not selected');
    } else {
        console.log(selectCat, selectedTag, title, desc);
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: {
                selectCat: selectCat,
                selectedTag: selectedTag,
                title: title,
                desc: desc
            },
            // processData: false,
            dataType: 'json',
            // contentType: false,
            beforeSend: function () {
                // $(form).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $("#form-create-post").trigger('reset');
                    $("#summernote").summernote("reset");
                    window.location.replace('http://127.0.0.1:8000/dashboard/post');
                    toastr.success(data.msg);
                }
            }
        });
    }
});
//  ----------------------
//  Post view functionality
//  ----------------------
view('#table-post', '#modal-view-post', '#modal-btn-view-post');

view('#table-post-exceptUser', '#modal-view-post-exceptUser', '#modal-btn-view-post-exceptUser');

$("#post-btn-viewCancle").on('click', function () {
    $("#modal-view-post #uname,#publishedDate,#title,#desc,#tags").html("");
});
//  ----------------------
//  Post update functionality
//  ----------------------
$("#form-update-post").on('submit', function (e) {

    e.preventDefault(e);
    // window.location.href =" url('post')";
    var form = this;
    var selectCat = $("#selectCat :selected").data('id');
    var selectedTag = [];
    $("#selectTag :selected").each(function () {
        selectedTag.push($(this).data("tagno"));
    });
    var title = $("#pTitle").val();
    var desc = $("#summernote").val();
    //-----validation
    if ($('#selectCat').val() == undefined) {
        $("#form-create-post").find('#catagoryError')
            .text('cataory is not selected');
        console.log('cataory is not selected');
    } else if (selectedTag.length === 0) {
        $("#form-create-post").find('#tagError')
            .text('Tag is not selected');
    } else {
        console.log(selectCat, selectedTag, title, desc);
        $.ajax({
            url: $(form).attr('action'),
            // method: $(form).attr('method'),
            type: 'PUT',
            data: {
                selectCat: selectCat,
                selectedTag: selectedTag,
                title: title,
                desc: desc
            },
            // processData: false,
            dataType: 'json',
            // contentType: false,
            beforeSend: function () {
                // $(form).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    $("#form-create-post").trigger('reset');
                    $("#summernote").summernote("reset");
                    window.location.replace('http://127.0.0.1:8000/dashboard/post');
                    toastr.success(data.msg);
                }
            }
        });
    }


});
//  ----------------------
//  Post Published functionality
//  ----------------------
$("#table-post").on('click', "#post-btn-published", function () {
    var id = $(this).data('id');
    var url = "post/published/" + id;
    $.get(url,
        function (data) {
            $("#table-post").DataTable().ajax.reload();
            toastr.success(data.msg);
        }, "json");
});
//  ----------------------
//  Post delete functionality
//  ----------------------
del('#table-post', '#modal-delete-post', '#modal-btn-delete-post', '#form-delete-post');

del('#table-post-exceptUser', '#modal-delete-post-exceptUser', '#modal-btn-delete-post-exceptUser', '#form-delete-post-exceptUser');


