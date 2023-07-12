<template>
    <div class="container">
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="col-md-8 offset-md-2">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Manage Category</h3>
                    <div class="card-tools">
                        <router-link to="/add-category" class="btn btn-info btn-sm">Add Category</router-link>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(category, i) in getCategories">
                          <td>{{ ++i }}</td>
                          <td>{{ category.name }}</td>
                          <td>{{ category.slug }}</td>
                          <td>
                            <span class="badge" :class="statusColor(category.status)">{{ status(category.status) }}</span>
                          </td>
                          <td>{{ category.created_at | time }}</td>
                          <td>
                            <router-link :to="`/edit-category/${category.id}`" class="btn btn-primary btn-sm">Edit</router-link>
                            <button type="button" class="btn btn-danger btn-sm" @click="remove(category.id)">Delete</button>
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
          this.$store.dispatch("getCategory");
        },
        computed: {
          getCategories(){
            return this.$store.getters.categories;
          }
        },
        methods:{
          status(status){
            let data = {0:"Inactive", 1:"Active"}
            return data[status];
          },
          statusColor: function(status){
            let data = {0:"bg-danger", 1:"bg-success"}
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
                axios.get("remove-category/"+id).then(function(response){

                  del.$store.dispatch("getCategory");
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
        }

    }
</script>
