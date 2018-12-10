<template>
	<div class="modal fade" id="viewmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">View Record</h4>
            </div>
            <div class="modal-body">
              <p id="name">{{viewrec.name}}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>
</template>
<script>
	export default {
		props:['viewrec'],
	}
</script>
<style scoped>

<style>