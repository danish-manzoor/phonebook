<template>
	<div class="modal fade" id="addmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
            <p class="alert alert-success" v-if="success.length > 0 ">
            {{success}}
            </p>
              <label for="name">Add new Record</label>
              <input type="textarea" id="name" class="form-control" v-model="record">
              	<ul v-if="error.name" class="list-unstyled">
              		<li v-for="err of error.name" class="alert alert-danger">{{err}}</li>
              	</ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" @click="clearModal">Close</button>
              <button type="button" class="btn btn-primary" @click="addRecord">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</template>
<script>
	export default {
		data(){
			return{
				record:'',
				error:[],
				success:''
			}
		},
		methods:{
			addRecord(){
				axios.post('http://localhost/vueJs/task',{
				  'name': this.record
				})
				.then(data => {
					this.$emit('addrecord', data);
					this.success = "Tasks added successfully...!";
					this.record='';
				})
				.catch(error => {
					this.error = error.response.data.errors;
					console.log(error.response.data.errors);
				})
				
			},
			clearModal(){
				this.error='';
			}
		}
	}
</script>
<style scoped>

<style>