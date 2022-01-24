<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="" @submit.prevent="submit" class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" v-model="post.title"><br>
                        <label for="title">Post Body</label>
                        <input type="text" class="form-control" v-model="post.body"><br>
                        <input type="submit" value="Submit">
                    </form>
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Post Title</th>
                                <th>Post Body</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
    export default {
        data(){
            return{
                post : {
                    title : '',
                    body : '',
                }
            }
        },
        methods : {
            submit(){
                axios.post('http://localhost:8000/api/post',this.post).then(res =>{
                    console.log('responese',res.data)
                }).catch(err =>{
                    console.log('error',err.response)
                })
            },
            get(){
                axios.get('http://localhost:8000/api/post',this.post).then(res =>{
                    this.post = res.data
                    console.log('respones',res.data)
                }).catch(err =>{
                    console.log('error',err.response)
                })
            },
        },
         created() {
                console.log('creted')
                this.get();
        },
        
    }
</script>
