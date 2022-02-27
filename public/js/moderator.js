
$("#table-mod").DataTable({
    processing: false,
    info: true,
    ajax: 'mod/getData',
    "autoWidth": false,
    paging: false,
    searching: false,
    // "scrollX": true,
    // "pageLength": 2,
    columns: [
        {
            data: 'uname',
            name: 'username'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'Created_at',
            name: 'created_at'
        },
        
        {
            data: 'Actions',
            name: 'actions',
            class: 'text-center'
        },
    ],

});

add('#table-mod','#form-create-mod');

del('#table-mod','#modal-delete-mod','#modal-btn-delete-mod','#form-delete-mod');
