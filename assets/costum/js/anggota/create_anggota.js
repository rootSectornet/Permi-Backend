const Create_anggota = new Vue({
	el : "#createAnggota",
	data : {
		IsLoading : false,
		IsError : false,
        Nama : null,
        Email : null,
        Telp : null,
        Alamat : null,
        Password : null,
		Kampus : null,
		DataKampus : [],
		error : 'Penambahan data anggota gagal !. Silahkan Coba beberapa saat lagi.',
		IsValid : true
	},
	mounted(){
		this.getKampus()
	},
	methods : {
		getKampus : ()=>{
            axios.get(BASE_URL+"Kampus/getKampus/"+UUID).then(response => {
            	Create_anggota.DataKampus = response.data.Message.data
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
        	Create_anggota.IsLoading = true
        	Create_anggota.IsError = false
        	Create_anggota.validaton()
        	if (Create_anggota.IsValid) {
                var data = new FormData();
                data.append("Username",Create_anggota.Nama)
                data.append("Password",Create_anggota.Password)
                data.append("Email",Create_anggota.Email)
                data.append("Telp",Create_anggota.Telp)
                data.append("Alamat",Create_anggota.Alamat)
                data.append("ID_Kampus",Create_anggota.Kampus)
                data.append("Picture",$("#imageUpload")[0].files[0])
                   $.ajax({
                      url: BASE_URL+'Anggota/SaveCreate/'+UUID,
                      type: 'POST',
                      data: data,
                      cache : false,
                      processData: false,
                      contentType: false,
                      success: function(data){
                        data = JSON.parse(data)
                        AlertShow("Information",data.Message)
                        if (data.Code == 200) {
                        	window.location = BASE_URL + "Anggota"
                        } else {
			        		Create_anggota.IsError = true
			        		Create_anggota.IsLoading = false
			        		Create_anggota.error = data.Message
                        }
                      }
                    });
        	} else {
        		Create_anggota.IsError = true
        		Create_anggota.IsLoading = false
        	}
        },
        validaton : ()=>{
        	if (!Create_anggota.Nama) {
        		Create_anggota.IsValid = false;
        	}

        	if (!Create_anggota.Email) {
        		Create_anggota.IsValid = false;
        	}

        	if (!Create_anggota.Telp) {
        		Create_anggota.IsValid = false;
        	}

        	if (!Create_anggota.Alamat) {
        		Create_anggota.IsValid = false;
        	}

            if (!Create_anggota.Password) {
                Create_anggota.IsValid = false;
            }

            if (!Create_anggota.Kampus) {
                Create_anggota.IsValid = false;
            }
        },
        kembali : ()=>{
        	window.history.back();
        }
	}

})

$("#imageUpload").change(function() {
    Create_anggota.ReadUrl(this);
});