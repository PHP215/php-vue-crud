<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="" @submit.prevent="submit" class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" v-model="title"><br>
                        <label for="title">Post Body</label>
                        <input type="text" class="form-control" v-model="body"><br>
                        <input type="submit" value="Submit">
                    </form>
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
        
        mounted() {
            console.log('Component mounted.')
        },
        methods : {
            submit(){
                console.log(this.title)
            }
        }
        
    }
</script>
