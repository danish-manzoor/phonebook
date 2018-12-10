<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">Example Component</div>

                    <div class="card-body">
                        Helloo , {{name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                name:'Danish',fa:'Manzoor'
            }
        }
    }
</script>
<style type="text/css">
.card-body{
    color:pink;
}
</style>
