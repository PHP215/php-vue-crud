<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="text-primary text-center">Laravel Vue Crud System</h3>
                <div class="card p-2">
                    <form action="" @submit.prevent="submit" class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control post-title" v-model="form.title"><br>
                        <label for="title">Post Body</label>
                        <input type="text" class="form-control post-body" v-model="form.body"><br>
                        <input v-if="check == null" class="btn btn-primary"  type="submit" value="Submit">
                        <input v-if="check !== null" class="btn btn-warning" @click="update(check)"  type="submit" value="Update">
                    </form>
                    <div v-if="success == 1" class="alert " :class="{'alert-success': success == 1}">{{message}}</div>
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
                form : {
                  id : '',
                    title : '',
                    body : '',  
                },
                posts : null,
                check : null,
                message : null,
                success : null,
            }
        },
        methods : {
            get(){
                axios.get('http://localhost:8000/api/post',this.form).then(res =>{
                    this.posts = res.data
                    console.log('respones',res.data)
                }).catch(err =>{
                    console.log('error',err.response)
                })
            },
            submit(){
                axios.post('http://localhost:8000/api/post',this.form).then(res =>{
                    this.form.title = ''
                    this.form.body = ''
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
                this.success = 1
                this.message = res.data.msg
            }).catch(res=>{
                console.log('error',res)
            })
        },
        edit(id){
            axios.get('http://localhost:8000/api/post/'+id).
            then(res =>{
                this.form.title = res.data.title
                this.form.body = res.data.body
                this.check = res.data.id
                console.log(this.check)
            }).
            catch(err =>{
                console.log('an error occurs',err)
            });
        },
        update(id){
            axios.put('http://localhost:8000/api/post/'+id, this.form).
            then(response =>{
                this.get()
                this.success = 1
                this.message = response.data.msg
                console.log(response)
            }).
            catch(res =>{
                console.log('error',res)
            })

        }
        },
         created() {
                console.log('creted')
                this.get();
        },
        
    }
</script>
