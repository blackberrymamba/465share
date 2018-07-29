$vueFiles = new Vue({
	el: '#filesContainer',
	data: {
		files: [],
	},
	methods: {
		fetchFiles: function () {
			this.$http.get('api/getfiles').then((response) => {
				this.files = response.body;
				//console.log(this.files);
			}, (response) => {
				// error callback
			});
        },
        deleteItem: function(file){
            this.$http.get('api/delete/' + file.ID).then((response) => {
                this.fetchFiles();
			}, (response) => {
				// error callback
			});
        }
    }, 
    created: function(){
        this.fetchFiles();
    }
})
