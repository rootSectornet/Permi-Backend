

$("#file").change(function() {

    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        	$('.thumbnail img').remove()
            $('.thumbnail').append("<img src='"+e.target.result+"' style='width: 100%'>");
            $('.thumbnail').hide();
            $('.thumbnail').fadeIn(650);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

const artikel = new Vue({
	el : "#artikel",
	data :{
		content : "sss",
		title : ""
	},
	mounted (){
	},
	methods : {
		save : ()=>{
			alert('asas')
		}
	}
})


Vue.component('ckeditor', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor'
      },
      height: {
        type: String,
        default: '600px',
      },
      toolbar: {
        type: Array,
        default: () => [
          ['Undo','Redo'],
          ['Bold','Italic','Strike'],
          ['NumberedList','BulletedList'],
          ['Cut','Copy','Paste'],
          ['colors']
        ]
      },
      language: {
        type: String,
        default: 'en'
      },
      extraplugins: {
        type: String,
        default: ''
      }
		},
		beforeUpdate () {
      const ckeditorId = this.id
      if (this.value !== CKEDITOR.instances[ckeditorId].getData()) {
        CKEDITOR.instances[ckeditorId].setData(this.value)
      }
		},
		mounted () {
      const ckeditorId = this.id
      console.log(this.value)
      const ckeditorConfig = {
        toolbar: this.toolbar,
        language: this.language,
        height: this.height,
        extraPlugins: this.extraplugins,
        removePlugins: 'elementspath',
        resize_enabled: false
      }
      CKEDITOR.replace(ckeditorId, ckeditorConfig)
      CKEDITOR.instances[ckeditorId].setData(this.value)
      CKEDITOR.instances[ckeditorId].on('change', () => {
        let ckeditorData = CKEDITOR.instances[ckeditorId].getData()
        if (ckeditorData !== this.value) {
          this.$emit('input', ckeditorData)
        }
      })
		},
		destroyed () {
      const ckeditorId = this.id
      if (CKEDITOR.instances[ckeditorId]) {
        CKEDITOR.instances[ckeditorId].destroy()
      }
		}
  
});



const Category = new Vue({
	el : "#category",
	data :{
		Data : [],
		category : null,
		categorySelected : [],
		IsLoading : false,
		IsError : false,
		IsValid : true,
	},
	mounted (){
		this.getCategory()
	},
	methods : {
		getCategory : ()=>{
            axios.get(BASE_URL+"Posting/getCategory/").then(response => {
            	Category.Data = response.data.Message
            }).catch(error => {
                console.log(error);
            });
		},
		save : ()=>{
			Category.IsLoading = true
        	if (!Category.category) {
        		Category.IsValid = false
        	}
        	if (Category.IsValid) {
                axios.post(BASE_URL + "Posting/CreateCategory", {
                    Category: Category.category,
                  })
                  .then(function (response) {
                  	Category.getCategory()
        			Category.category = null
					Category.IsLoading = false
                  })
        	}

			Category.IsLoading = false
		}
	}
})



