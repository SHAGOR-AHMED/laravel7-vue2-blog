<template>
    <div class="container">
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="col-md-8 offset-md-2">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Update Category</h3>
                    <div class="card-tools">
                        <router-link to="/categories" class="btn btn-info btn-sm">Category List</router-link>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <form method="post" class="form-horizontal" @submit.prevent="updateCategory" >
                    <div class="card-body">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="name" placeholder="Category Name" v-model="form.name">
                          <div class="text-danger" v-if="form.errors.has('name')" v-html="form.errors.get('name')"></div>
                        </div>
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="active" v-model="form.status" value="1">
                            <label class="form-check-label" for="active">Active</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inactive" v-model="form.status" value="0">
                            <label class="form-check-label" for="inactive">Inactive</label>
                          </div>
                          <div class="text-danger" v-if="form.errors.has('status')" v-html="form.errors.get('status')"></div>
                        </div>
                        
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Update</button>
                    </div>
                    <!-- /.card-footer -->
                  </form>
                  <!-- /.card-body -->
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
        name: 'edit',
        data: function(){
            return {
                form: new Form({
                  id: null,
                  name: null,
                  status: null,
                })
            }
        },

        mounted(){
          this.getCategory();
        },

        methods: {
          updateCategory: function(){
            let test = this;
            this.form.post('/update-category')
              .then(function(response){
                
                toastr.info('Updated Successfully');
                test.$router.push("/categories");

              })
          },

          getCategory: function(){
            let this_ = this;
            axios.get("/show-category/" + this.$route.params.id).then(function(response){
                this_.form.fill(response.data.category);
                
            }).catch(function(error){

            })
            
          }

        }

    }
</script>
