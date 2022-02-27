//  -----------------------------
//  Showing Data into a DataTable
//  -----------------------------
$('#table-catagory').DataTable({
    processing: false,
    info: true,
    ajax: 'catagory/getData',
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
dataColumnIsVisibleOnPageLoad("#table-catagory");
//  -------------------------------------------------
//  Show and Hide Column into a DataTable on btnClick
//  -------------------------------------------------
showHideDataTableColumn("#table-catagory");
//  --------------------
//  add row to the modal
//  --------------------
addRow('#addRowCatagory', '#modal-create-catagory', "#form-create-catagory");
//  -----------------
//  remove row button
//  -----------------
removeRow('#removeRow', '#modal-create-catagory', "#form-create-catagory");
//  ---------------------
//  catagory add functionality
//  ---------------------
add('#table-catagory', '#form-create-catagory', '#modal-create-catagory');
//  ------------------------
//  catagory update functionality
//  ------------------------
update('#table-catagory', '#modal-update-catagory', '#modal-btn-update-catagory', '#form-update-catagory', 'catagory/info');
//  ------------------------
//  catagory delete functionality
//  ------------------------
del('#table-catagory', '#modal-delete-catagory', '#modal-btn-delete-catagory', '#form-delete-catagory');
//  ---------------------------
//  catagory checkeAll functionality
//  ---------------------------
checkedAll("checkedAll", "checkedSingle", "#modal-btn-deleteAll-catagory");
//  --------------------------------
//  catagory checked single functionality
//  --------------------------------
checkedSingle("checkedSingle", "checkedAll", "#modal-btn-deleteAll-catagory");
//  --------------------------------
//  catagory deleteAll data functionality
//  --------------------------------
delAll('#table-catagory', '#modal-deleteAll-catagory', '#modal-btn-deleteAll-catagory', '#form-deleteAll-catagory');
