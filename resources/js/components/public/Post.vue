<template>
    <div class="container">
        <h3 class="category-title mb-3"> {{ post.title }} </h3>
        <div class="row">
            <div class="col-lg-6">
                <div class="bg-clr-white hover-box">
                    <div class="row">
                        <div class="col-sm-5 position-relative">
                            <router-link :to="`/post/${post.id}`" class="image-mobile">
                                <img height="200px" width="200px" class="card-img-bottom d-block radius-image-full" :src="fileLink(post.thumbnail)" alt="Card image cap">
                            </router-link>
                        </div>
                        <div class="col-sm-7 card-body blog-details align-self">
                            <router-link :to="`/post/${post.id}`" class="blog-desc">{{ post.title }}
                            </router-link>
                            <div class="author align-items-center">
                                <img src="site/assets/images/a1.jpg" alt="" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#">Shagor Ahmed</a> 
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> {{ post.created_at }} </span>
                                    </li>
                                </ul>
                                <div v-html="post.content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>  
</template>

<script>
    export default {
        name: 'Post',
        
        data: function(){
            return {
                post:{}
            }
        },

        mounted(){
          this.getPost();
        },

        methods: {
          
          getPost: function(){
            let this_ = this;
            axios.get("/get-show-post/" + this.$route.params.id).then(function(response){
                this_.post = response.data.post;
                
            }).catch(function(error){

            })
            
          },

          fileLink: function(name){
            if(name != null && name.length < 256){
              return 'uploads/' + name;
            }
            
          }

        }

    }
</script>
