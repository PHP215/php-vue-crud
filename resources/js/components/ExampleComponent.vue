<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="" class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" v-model="form.title"><br>
                        <label for="title">Post Body</label>
                        <input type="text" class="form-control" v-model="form.body"><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data : ()=>({
            form :{
                title : null,
                body : null
            }
        }),
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
