<template>
    <div class="container">
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Manage Post</h3>
                    <div class="card-tools">
                        <router-link to="/add-post" class="btn btn-info btn-sm">Add Post</router-link>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Category</th>
                          <th>Title</th>
                          <th>Content</th>
                          <th>Thumbnail</th>
                          <th>Created by</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(post, i) in posts">
                          
                          <td>{{ ++i }}</td>
                          <td>{{ post.category_id }}</td>
                          <td>{{ post.title }}</td>
                          <td>{{ post.content }}</td>
                          <td><img width="60px" :src="fileLink(post.thumbnail)" ></td>
                          <td>{{ post.title }}</td>
                          <td>
                            <span class="badge" :class="statusColor(post.status)">{{ post.status }}</span>
                          </td>
                          <td>{{ post.created_at | time }}</td>
                          <td>
                            <router-link :to="`/edit-post/${post.id}`" class="btn btn-primary btn-sm">Edit</router-link>
                            <button type="button" v-if="post.status == 'draft'" class="btn btn-success btn-sm" @click="active(post.id)">Active</button>
                            <button type="button" v-if="post.status == 'published'" class="btn btn-info btn-sm" @click="inactive(post.id)">Inactive</button>
                            <button type="button" class="btn btn-danger btn-sm" @click="remove(post.id)">Delete</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->       
    </div>
</template>

<script>
    export default {
        name: 'manage',
        mounted(){
          this.$store.dispatch("getPosts");
        },

        computed: {
          posts(){
            return this.$store.getters.posts;
          }
        },

        methods:{
          
          statusColor: function(status){
            let data = {'draft':"bg-danger", 'published':"bg-success"}
            return data[status];
          },

          remove: function(id){
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                
                let del = this;
                axios.get("remove-post/"+id).then(function(response){

                  del.$store.dispatch("getPosts");
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )

                }).catch(function(error){
                  console.log(error);
                })

              }

            })
          },

          fileLink: function(name){
            return 'uploads/' + name;
          }

        }

    }
</script>