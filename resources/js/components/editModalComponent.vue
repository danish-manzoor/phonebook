<template>
	<div class="modal fade" id="editmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Update Record</h4>
            </div>
            <div class="modal-body">
            <p class="alert alert-success" v-if="success.length > 0 ">
            {{success}}
            </p>
              <label for="name">Update Tasks</label>
              <input type="textarea" id="name" class="form-control" v-model="rec.name">
              	<ul v-if="error.name" class="list-unstyled">
              		<li v-for="err of error.name" class="alert alert-danger">{{err}}</li>
              	</ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" @click="clearModal">Close</button>
              <button type="button" class="btn btn-primary" @click="updateRecord">Update changes</button>
            </div>
          </div>
        </div>
      </div>
</template>
<script>
	export default {
	props:['rec'],
		data(){
			return{
				error:[],
				success:''
			}
		},
		methods:{
			updateRecord(){
				axios.post('http://localhost/vueJs/task/'+this.rec.id,{
				  'name': this.rec.name,
				  '_method':'PUT'
				})
				.then(data => {
					this.$emit('recordUpdated', data);
					this.success = "Tasks Updated successfully...!";
					this.record='';
				})
				.catch(error => {
					this.error = error.response.data.errors;
					console.log(error.response.data.errors);
				})
				
			},
			clearModal(){
				this.error='';
				this.success="";
			}
		}
	}
</script>
<style scoped>

<style>