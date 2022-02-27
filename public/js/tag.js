//  -----------------------------
//  Showing Data into a DataTable
//  -----------------------------
$('#table-tag').DataTable({
    processing: false,
    info: true,
    ajax: 'tag/getData',
    "autoWidth": false,
    // "scrollX": true,
    // "pageLength": 2,
    "aLengthMenu": [
        [5, 50, 100, 500, 1000, -1],
        [5, 50, 100, 500, 1000, "All"]
    ],
    columns: [{
        data: 'Checkbox',
        name: 'Checkbox',
        orderable: false,
        searchable: false
    }, {
        data: 'id',
        name: 'id',
        // visible: false,
    },
    {
        data: 'title',
        name: 'title'
    },
    {
        data: 'metatitle',
        name: 'metatitle'
    },
    {
        data: 'created_at',
        name: 'created_at'
    },
    {
        data: 'updated_at',
        name: 'updated_at'
    },
    {
        data: 'Actions',
        name: 'Actions',
        class: 'text-center'
    },
    ],

});
//  -------------------------------------------------
//  Show and Hide Column into a DataTable on PageLoad
//  -------------------------------------------------
dataColumnIsVisibleOnPageLoad("#table-tag");
//  -------------------------------------------------
//  Show and Hide Column into a DataTable on btnClick
//  -------------------------------------------------
showHideDataTableColumn("#table-tag");
//  --------------------
//  add row to the modal
//  --------------------
addRow('#addRowTag', '#modal-create-tag', "#form-create-tag");
//  -----------------
//  remove row button
//  -----------------
removeRow('#removeRow', '#modal-create-tag', "#form-create-tag");
//  ---------------------
//  tag add functionality
//  ---------------------
add('#table-tag', '#form-create-tag', '#modal-create-tag');
//  ------------------------
//  tag update functionality
//  ------------------------
update('#table-tag', '#modal-update-tag', '#modal-btn-update-tag', '#form-update-tag', 'tag/info');
//  ------------------------
//  tag delete functionality
//  ------------------------
del('#table-tag', '#modal-delete-tag', '#modal-btn-delete-tag', '#form-delete-tag');
//  ---------------------------
//  tag checkeAll functionality
//  ---------------------------
checkedAll("checkedAll", "checkedSingle", "#modal-btn-deleteAll-tag");
//  --------------------------------
//  tag checked single functionality
//  --------------------------------
checkedSingle("checkedSingle", "checkedAll", "#modal-btn-deleteAll-tag");
//  --------------------------------
//  tag deleteAll data functionality
//  --------------------------------
delAll('#table-tag', '#modal-deleteAll-tag', '#modal-btn-deleteAll-tag', '#form-deleteAll-tag');
