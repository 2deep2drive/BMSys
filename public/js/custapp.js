//  -------------------------------------------------
//  Show and Hide Column into a DataTable on PageLoad
//  -------------------------------------------------
function dataColumnIsVisibleOnPageLoad(dataTable) {

    var Table = $(dataTable).DataTable();

    var links = $(dataTable + '-links a.toggle-vis');

    links.each(function () {
        var colNum = $(this).attr('data-column');

        var column = Table.column(colNum);

        if (column.visible() === false) {

            $(this).addClass('text-primary');

        }
    });

}

//  -------------------------------------------------
//  Show and Hide Column into a DataTable on btnClick
//  -------------------------------------------------

function showHideDataTableColumn(dataTable) {
    $(dataTable + '-links a.toggle-vis').on('click', function (e) {

        e.preventDefault();

        var table = $(dataTable).DataTable();

        var colNum = $(this).attr('data-column');

        var column = table.column(colNum);

        column.visible(!column.visible());

        if (column.visible() === true) {

            console.log("visible");
            $(this).removeClass('text-primary');

        } else {
            console.log(" not visible");

            $(this).addClass('text-primary');

        }

    });
}

//  -------------------------------------------
//  Add Row into the Modal for Tag and Catagory
//  -------------------------------------------
function addRow(addBtn, modalId, formId) {
    $(addBtn).on('click', function () {
        var rowCount = $("#row-count").val();
        
        if (rowCount == '') {
            $(modalId).find('.error_text').text('Field Requried');
        } else if (rowCount < 1) {
            $(modalId).find('.error_text').text('invalid input');
        } else if (rowCount > 5) {
            $(modalId).find('.error_text').text('Maximum 5 fields are allowed');
        } else {
            var div = $("#newRow > div").length;
            var NofF = parseInt(rowCount) + div;
            // alert(NofF);
            if (NofF > 5) {
                $(modalId).find('.error_text').text('Maximum 5 fields are allowed');

            } else {
                $(formId).removeClass("d-none");
                $(modalId).find('.error_text').text('');
                for (var i = 0; i < rowCount; i++) {
                    var html = '';
                    html += '<div id="inputFormRow" class="">';
                    html += '<div class="input-group">';
                    html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
                    html += '<div class="input-group-append">';
                    html += '<button id="removeRow" type="button" class="btn btn-theme-danger"><i class="fas fa-trash-alt"></i></button>';
                    html += '</div>';
                    html += '</div>';
                    html += '<span class="text-danger error-text px-1 pb-2 title title_' + i + '"></span>';
                    html += '</div>';
                    $('#newRow').append(html);
                }
            }
        }
    });
}
//  -------------------------------------------
//  Remove Row into the Modal/ Tag and Catagory
//  -------------------------------------------
function removeRow(removeBtn, modalId, formId) {
    $(modalId).on('click', removeBtn, function () {
        $(this).closest('#inputFormRow').remove();
        var data = $(formId).find("#newRow #inputFormRow");
        if (data.length == 0) {
            $(formId).addClass("d-none");
        }
    });
}
//  ----------------------------------
//  Add functionality for Tag,Catagory
//  ----------------------------------
function add(dataTable, formId, modalId) {
    $(formId).on('submit', function (e) {
        e.preventDefault(e);
        var form = this;
        var sendURL = $(form).attr('action');
        var method = $(form).attr('method');
        $.ajax({
            url: sendURL,
            method: method,
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

                        if (prefix == 'title') {
                            $(formId).find('.' + prefix).text(val[0]);
                        } else if (/title\.\d/g.test(prefix)) {
                            $(formId).find('.' + prefix.replace('.', '_')).text(val[0].replace(/title\.\d/g, 'title'));
                        } else {
                            $(form).find('span.' + prefix + '_error')
                                .text(val[0]);
                        }
                    });
                } else {
                    toastr.success(data.msg);
                    $(form)[0].reset();
                    $(modalId).modal('hide');
                    $(dataTable).DataTable().ajax.reload();
                }
            }
        });

    });

}
//  -------------------------------------
//  Update functionality for Tag,Catagory
//  -------------------------------------
function update(dataTable, modalId, modalBtnId, formId, dataSourceUrl) {
    $(dataTable).on('click', modalBtnId, function () {
        var id = $(this).data('id');
        // alert(id);
        var url = dataSourceUrl + "/" + id;
        $.post(url,
            function (data) {
                console.log(data);
                $(modalId).find('input[name="title"]').val(data.details.title);
                $(modalId).find('input[name="metatitle"]').val(data.details.metatitle);
            }, "json");
        //------------------------------------------------------------------------------
        $(formId).on('submit', function (e) {
            e.preventDefault();
            var form = this;
            var sendURL = $(form).attr('action') + "/" + id;
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
                        $(modalId).modal('hide');
                        $(dataTable).DataTable().ajax.reload();
                        toastr.success(data.msg);
                    }
                }
            });

        });
    });
}
//  -------------------------------------
//  Delete functionality for Tag, Catagory, Post
//  -------------------------------------
function del(dataTable, modalId, modalBtnId, formId, dataSourceUrl) {
    $(dataTable).on('click', modalBtnId, function () {
        var id = $(this).data('id');
        // alert (id);
        // var url = dataSourceUrl+ "/" + id;
        // $.post(url, function (data) {
        //     $(modalId).find('input[name="id"]').val(data.details.id);
        //     $(modalId).find('#delItem').text(data.details.title);
        // }, "json");
        $(formId).on('submit', function (e) {
            e.preventDefault();
            // var Id = $(modalId).find('input[name="id"]').val();
            var form = this;
            var sendURL = $(form).attr('action') + "/" + id;
            var method = $(form).attr('method');
            $.ajax({
                url: sendURL,
                method: method,
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                // beforeSend: function() {
                //     $(form).find('span.error-text').text('');
                // },
                success: function (data) {
                    if (data.code == 0) {
                        $.each(data.error, function (prefix, val) {
                            $(form).find('span.' + prefix + '_error')
                                .text(val[0]);
                        });
                    } else {
                        $(form)[0].reset();
                        $(modalId).modal('hide')
                        $(dataTable).DataTable().ajax.reload();
                        // alert(data.msg);
                        toastr.success(data.msg);
                    }
                }
            });
        });
    });
}
//  ----------------------------------------------
//  View functionality for Post
//  ----------------------------------------------
function view(dataTable, modalId, modalBtnId) {
    $(dataTable).on('click', modalBtnId, function () {
        var id = $(this).data('id');
        var url = "post/" + id + "/info";
        $.get(url,
            function (data) {
                console.log(data);

                $(modalId+" #uname").html('<span>u/ <code>' + data.PostDetails.user.uname + '</code></span>');

                $(modalId+" #publishedDate").html('<pre>' + data.PostDetails.created_at + '</pre>');

                $(modalId+" #title").html(data.PostDetails.title);

                $(modalId+" #desc").html(data.PostDetails.desc);

                var tag = [];
                $.each(data.PostDetails.tags, function (k, v) {
                    tag.push(v.title);
                });

                $.map(tag, function (index) {
                    $('<span class="badge badge-warning ml-2 p-2" style="font-size:16px;cursor:pointer"> <i class="fas fa-tag"></i> ' + index + '<span>').appendTo(modalId+" #tags");
                });

            }, "json");
    });
}
//  ----------------------------------------------
//  ToggleDeleteAll functionality for Tag,Catagory
//  ----------------------------------------------
function toggleDeleteAll(checkedSingle, chkDelAllBtn) {
    if ($('input[name="' + checkedSingle + '"]:checked').length > 0) {
        $(chkDelAllBtn).text('Delete (' + $('input[name="' + checkedSingle + '"]:checked').length + ')')
            .removeClass(
                "d-none");
    } else {
        $(chkDelAllBtn).addClass("d-none");
    }
}
//  ---------------------------------------------
//  Checked Single functionality for Tag,Catagory
//  ---------------------------------------------
function checkedSingle(checkedSingle, checkedAll, chkDelAllBtn) {

    $(document).on('click', 'input[name="' + checkedSingle + '"]', function (e) {
        if ($('input[name="' + checkedSingle + '"]').length == $('input[name="' + checkedSingle + '"]:checked').length) {
            $('input[name="' + checkedAll + '"]').prop('checked', true);
        } else {
            $('input[name="' + checkedAll + '"]').prop('checked', false);
        }
        toggleDeleteAll(checkedSingle, chkDelAllBtn);
    });
}
//  ------------------------------------------
//  Checked All functionality for Tag,Catagory
//  ------------------------------------------
function checkedAll(checkedAll, checkedSingle, chkDelAllBtn) {
    $('input[name="' + checkedAll + '"]').on('click', function (e) {
        if (this.checked) {
            $('input[name="' + checkedSingle + '"]').each(function () {
                this.checked = true;
            });
        } else {
            $('input[name="' + checkedSingle + '"]').each(function () {
                this.checked = false;
            });
        }
        toggleDeleteAll(checkedSingle, chkDelAllBtn);
    });
}
//  ------------------------------------------
//  Uncheck All functionality for Tag,Catagory
//  ------------------------------------------
function UncheckAll() {
    var w = document.getElementsByTagName('input');
    for (var i = 0; i < w.length; i++) {
        if (w[i].type == 'checkbox') {
            w[i].checked = false;
        }
    }
}
//  -----------------------------------------
//  Delete All functionality for Tag,Catagory
//  -----------------------------------------
function delAll(dataTable, modalId, modalBtnId, formId) {
    var checkedField = [];
    $(document).on('click', modalBtnId, function (e) {

        var k = $('input[name="checkedSingle"]:checked').each(function () {
            checkedField.push($(this).data('id'));
        });

        $(modalId).find("#showDelId").text(k.length);
    });

    $(formId).on('submit', function (e) {
        e.preventDefault();

        var form = this;
        var url = $(form).attr('action');
        $.post(url, {
            // _token: $('meta[name="csrf-token"]').attr('content'),
            id: checkedField
        }, function (data) {
            if (data.code == 0) {
                $.each(data.error, function (prefix, val) {
                    $(form).find('span.' + prefix + '_error')
                        .text(val[0]);
                });
            } else {

                $(formId)[0].reset();
                $(modalBtnId).addClass("d-none");
                UncheckAll();
                $(modalId).modal('hide');

                $(dataTable).DataTable().ajax.reload();
                toastr.success(data.msg);
            }
            // console.log(data);
        }, "json");
    });
}
//--------------------------












function resetMoalForm(modalId, formId) {
    $(modalId).on('hidden.bs.modal', function () {
        $(this).find(formId).trigger('reset');
        //  $("#row-count").text();
        //  alert($(modalId).find("#row-count").val());
        // if (formId=='#form-create-tag') {
        // $(formId).empty();
        // $("#row-count").text('');
        // }
    });
}
// dataTable modalId formId addBtn


























































$("#themeChange").on("click", function () {
    if ($("#themeChange").is(':checked')) {
        // $(document).querySelectorAll(selectors);
    }
    else
        alert("not");
});

