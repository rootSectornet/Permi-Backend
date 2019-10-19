
    let table = $('#tables').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "ordering": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": BASE_URL+"Kampus/json_kampus/"+ID_WILAYAH,
                    "type": "POST",
                  "dataType": "json",
                  "dataSrc": function (jsonData) {
                          return jsonData.data;
                      }
                },
                "autoWidth": true,
                "lengthMenu": [
                    [5, 10, 30, 50, -1],
                    [5, 10, 30, 50, "All"] // change per page values here
                ],
                "pageLength": 10,
                //Set column definition initialisation properties.
                "columnDefs": [
                  {"searchable": false, "orderable": false, "targets": [0,4]},
                ],                     //Set column definition initialisation properties.
                "columns": [
                    {"data": "number",width:10},
                    {"data": "Kampus",width:170},
                    {"data": "Alamat",width:170},
                    {"data": "Logo",width:170},
                    {"data": "Tgl_Join",width:170},
                    {"data": "Active",width:100},
                    {"data": "Wilayah",width:100},
                    {"data": "action",width:100},
                ],
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                }
  });
    Pace.start();


function Delete(id){
    bootbox.confirm({
        message: "Apakah anda yakin ingin menghapus kampus ini?",
        className: 'rubberBand animated',
        buttons: {
            confirm: {
                label: '<i class="fa fa-check"></i> Yes',
                className: 'btn-success'
            },
            cancel: {
                label: '<i class="fa fa-times"></i>  No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                axios.get(BASE_URL+"Kampus/DeleteKampus/"+id).then(response => {
                    AlertShow("Information",response.data.Message)
                    table.ajax.reload()
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    });
}
