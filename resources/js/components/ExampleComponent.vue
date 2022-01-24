<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="" @submit.prevent="submit" class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" v-model="posts.title"><br>
                        <label for="title">Post Body</label>
                        <input type="text" class="form-control" v-model="posts.body"><br>
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
                            <tr v-for="post in posts.data" :key="post.id">
                                <td>{{post.id}}</td>
                                <td>{{post.title}}</td>
                                <td>{{post.body}}</td>
                                <td class="d-flex">
                                    <button @click="edit(post.id)" class="btn mr-2 btn-primary">Edit</button>
                                    <button @click="delete_post(post.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
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
                posts : {
                  id : '',
                    title : '',
                    body : '',  
                }
            }
        },
        methods : {
            get(){
                axios.get('http://localhost:8000/api/post',this.posts).then(res =>{
                    this.posts = res.data
                    console.log('respones',res.data)
                }).catch(err =>{
                    console.log('error',err.response)
                })
            },
            submit(){
                axios.post('http://localhost:8000/api/post',this.posts).then(res =>{
                    console.log('responese',res.data)
                    this.get();
                }).catch(err =>{
                    console.log('error',err.response)
                })
            },
            delete_post(id){
            axios.delete('http://localhost:8000/api/post/'+id).
            then(res =>{
                console.log('res',res);
                this.get();
            }).catch(res=>{
                console.log('error',res)
            })
        },
        edit(id){
            axios.get('http://localhost:8000/api/post/'+id).
            then(res =>{
                this.posts.title = res.data.data.title
                this.posts.body = res.data.data.body
                console.log(res)
            }).
            catch(err =>{
                console.log('an error occurs',err)
            });
        }
        },
         created() {
                console.log('creted')
                this.get();
        },
        
    }
</script>
