
    let table = $('#tables').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "ordering": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": BASE_URL+"Anggota/json_anggota",
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
                  {"searchable": false, "orderable": false, "targets": [0,5,8]},
                ],                     //Set column definition initialisation properties.
                "columns": [
                    {"data": "number",width:10},
                    {"data": "Username",width:170},
                    {"data": "Email",width:100},
                    {"data": "Telp",width:100},
                    {"data": "Alamat",width:100},
                    {"data": "foto",width:100},
                    {"data": "Kampus",width:100},
                    {"data": "Wilayah",width:100},
                    {"data": "action",width:100},
                ],
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                }
  });
    Pace.start();
