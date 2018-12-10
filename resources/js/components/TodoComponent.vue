<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary"><h2>Todotask Card</h2> <span class="col-lg-12 d-flex justify-content-end"><a class="btn btn-primary" data-toggle="modal" href='#addmodal'>Add</a></span></div>
                    
                    <input type="search" class="form-control" placeholder="Search Record" style="margin-top:10px" v-model="search" @keyup="searchrecord">
                    <div class="card-body">
                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">View</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                             <tr v-for="(index,item) in tasks.data">

                                <th scope="row">{{index.id}}</th>
                                  <td>{{index.name}}</td>
                                  <td><a class="btn btn-primary" data-toggle="modal" href='#editmodal' @click="getRecord(index.id)">Edit</a></td>
                                  <td><a data-toggle="modal" href='#viewmodal' class="btn btn-success" @click="getRecord(index.id)">View</a></td>
                                  <td><a class="btn btn-danger" @click="delRecord(index.id)">Delete</a></td>
                              </tr>
                        <pagination :data="tasks" @pagination-change-page="getResults"></pagination>
                          </tbody>
                        </table>
                    </div>
                    <div class="card-footer"><span class="col-lg-12 d-flex justify-content-end">Copyright &copy; 2018</span></div>
                </div>
            </div>
            <div id="modal">
              <addtask @addrecord='refreshrecord'></addtask>
              <viewtask :viewrec="editRec"></viewtask>
              <edittask :rec="editRec" @recordUpdated="refreshrecord"></edittask>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
Vue.component('addtask', require('./addModalComponent.vue'));
Vue.component('viewtask', require('./viewModalComponent.vue'));
Vue.component('edittask', require('./editModalComponent.vue'));

Vue.component('pagination', require('laravel-vue-pagination'));
   export default {
        data(){
            return{
               tasks:{},
               editRec:{},
               errors:[],
               search:''
            }
        },
        created() {
        console.log('abc');
            axios.get('http://localhost/vueJs/task')
            .then((response)=> this.tasks=response.data)
            .catch((error) => console.log(error));
          },
          methods:{
                getResults(page = 1) {
                axios.get('http://localhost/vueJs/task?page=' + page)
                    .then((response)=> this.tasks=response.data)
                    .catch((error) => console.log(error));
                },
                getRecord(id){
                  axios.get('http://localhost/vueJs/task/'+id+'/edit')
                  .then(response=> this.editRec=response.data)
                  .catch(error => this.errors=error.response.data.errors)
                },
                refreshrecord(record){
                  this.tasks=record.data
                },
                delRecord(id){
                  const reply = confirm('Are you sure ,You want to delete this record');
                  if(reply){
                    axios.post('http://localhost/vueJs/task/'+id,{
                      id:id,
                      _method:'DELETE'
                    })
                    .then(response=> this.refreshrecord(response))
                    .catch(error => this.errors=error.response.data.errors)
                  }
                },
                searchrecord(){
                  if(this.search.length >=0){
                    axios.get('http://localhost/vueJs/task/search/'+this.search)
                    .then(response => this.tasks = response.data)
                    .catch(err => console.log(err))
                  }
                  else{
                      this.getResults();
                  }
                }

        }
    }
    
</script>
<style type="text/css"></style>