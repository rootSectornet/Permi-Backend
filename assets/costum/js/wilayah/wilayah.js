
    let table = $('#tables').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "ordering": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": BASE_URL+"Wilayah/json_wilayah",
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
                    {"data": "Wilayah",width:170},
                    {"data": "Deskripsi",width:100},
                    {"data": "Gambar",width:100},
                    {"data": "action",width:100},
                ],
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                }
  });
    Pace.start();

const Wilayah = new Vue({
    el: '#wilayah-modal',
    data: {
        state : "",
        wilayah : "",
        deskripsi : "",
        Validwilayah : "",
        Validdeskripsi : "",
        IsError : false,
        IsLoading : false,
        IsValid : "is-valid",
        IsInValid : "is-invalid",
        Message : "",
        IsPriview : false,
        Data : null
    },
    methods : {
        ReadUrl : (input)=>{
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    Wilayah.IsPriview = true;
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        reset : ()=>{
            Wilayah.state = ""
            Wilayah.wilayah = ""
            Wilayah.deskripsi = ""
            Wilayah.Validwilayah = ""
            Wilayah.Validdeskripsi = ""
            Wilayah.IsError = false
            Wilayah.IsLoading = false
            Wilayah.Message = ""
            Wilayah.IsPriview = false
        },
        Save : ()=>{
            Wilayah.IsLoading = true
            if(Wilayah.wilayah == ""){
                Wilayah.Validwilayah = Wilayah.IsInValid
                Wilayah.Validdeskripsi = ""
                Wilayah.IsLoading = false
            }else if(Wilayah.deskripsi == ""){
                Wilayah.Validdeskripsi = Wilayah.IsInValid
                Wilayah.Validwilayah = ""
                Wilayah.IsLoading = false
            }else{
                var data = new FormData();
                data.append("Wilayah",Wilayah.wilayah)
                data.append("Deskripsi",Wilayah.deskripsi)
                data.append("Foto",$("#imageUpload")[0].files[0])
                   $.ajax({
                      url: BASE_URL+'Wilayah/Save',
                      type: 'POST',
                      data: data,
                      cache : false,
                      processData: false,
                      contentType: false,
                      success: function(data){
                        data = JSON.parse(data)
                        AlertShow("Information",data.Message)
                        $("#wilayah-modal").modal('hide');
                        table.ajax.reload()
                        Wilayah.IsLoading = false
                        Wilayah.Validdeskripsi = ""
                        Wilayah.Validwilayah = ""
                      }
                    });
            }
        },
        SendDelete : (id)=>{
            axios.get(BASE_URL+"Wilayah/DeleteWilayah/"+id).then(response => {
                AlertShow("Information",response.data.Message)
                table.ajax.reload()
                //console.log(response.data);
            }).catch(error => {
                console.log(error);
            });
        }
    }
})

$("#imageUpload").change(function() {
    Wilayah.ReadUrl(this);
});

function Delete(id){
    bootbox.confirm({
        message: "This is a confirm with custom button text and color! Do you like it?",
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
              Wilayah.SendDelete(id)
            }
        }
    });
}
