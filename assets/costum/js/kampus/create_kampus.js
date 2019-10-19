const Create_kampus = new Vue({
	el : "#createKampus",
	data : {
		IsLoading : false,
		IsError : false,
		Kampus : null,
		Alamat : null,
		TglJoin : null,
		Wilayah : null,
		DataWilayah : [],
		error : 'Mohon Penambahan data Kampus failed !. Silahkan Coba beberapa saat lagi.',
		IsValid : true
	},
	mounted(){
		this.getWilayah()
	},
	methods : {
		getWilayah : ()=>{
            axios.get(BASE_URL+"Wilayah/getWilayah/"+UUID).then(response => {
            	Create_kampus.DataWilayah = response.data.Message.data
            }).catch(error => {
                console.log(error);
            });
		},
        ReadUrl : (input)=>{
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        Save : ()=>{
        	Create_kampus.IsLoading = true
        	Create_kampus.IsError = false
        	Create_kampus.validaton()
        	if (Create_kampus.IsValid) {
                var data = new FormData();
                data.append("Kampus",Create_kampus.Kampus)
                data.append("Alamat",Create_kampus.Alamat)
                data.append("Tgl_Join",Create_kampus.TglJoin)
                data.append("ID_Wilayah",Create_kampus.Wilayah)
                data.append("Logo",$("#imageUpload")[0].files[0])
                   $.ajax({
                      url: BASE_URL+'Kampus/SaveCreate/'+UUID,
                      type: 'POST',
                      data: data,
                      cache : false,
                      processData: false,
                      contentType: false,
                      success: function(data){
                        data = JSON.parse(data)
                        AlertShow("Information",data.Message)
                        if (data.Code == 200) {
                        	window.location = BASE_URL + "Kampus"
                        } else {
			        		Create_kampus.IsError = true
			        		Create_kampus.IsLoading = false
			        		Create_kampus.error = data.Message
                        }
                      }
                    });
        	} else {
        		Create_kampus.IsError = true
        		Create_kampus.IsLoading = false
        	}
        },
        validaton : ()=>{
        	if (!Create_kampus.Kampus) {
        		Create_kampus.IsValid = false;
        	}

        	if (!Create_kampus.Alamat) {
        		Create_kampus.IsValid = false;
        	}

        	if (!Create_kampus.TglJoin) {
        		Create_kampus.IsValid = false;
        	}

        	if (!Create_kampus.Wilayah) {
        		Create_kampus.IsValid = false;
        	}
        },
        kembali : ()=>{
        	window.history.back();
        }
	}

})

$("#imageUpload").change(function() {
    Create_kampus.ReadUrl(this);
});