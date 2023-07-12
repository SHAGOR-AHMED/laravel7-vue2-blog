<template>
    <div class="container">
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Add Post</h3>
                    <div class="card-tools">
                        <router-link to="/posts" class="btn btn-info btn-sm">Post List</router-link>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <form method="post" class="form-horizontal" @submit.prevent="addPost" >
                    <div class="card-body">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                          <select class="form-control" v-model="form.category_id">
                            <option value="">Select Category</option>
                            <option :value="cat.id" v-for="cat in getCategories">{{cat.name}}</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="title" placeholder="Title" v-model="form.title">
                          <div class="text-danger" v-if="form.errors.has('title')" v-html="form.errors.get('title')"></div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Content</label>
                        <div class="col-sm-9">
                          <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Thumbnail</label>
                        <div class="col-sm-9">
                          <input type="file" id="thumbnail" name="thumbnail" @change="loadThumbnail($event)"><br><br>
                          <img :src="form.thumbnail" alt="" height="120px" width="120px">
                          <div class="text-danger" v-if="form.errors.has('thumbnail')" v-html="form.errors.get('thumbnail')"></div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="active" v-model="form.status" value="published">
                            <label class="form-check-label" for="published">Published</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inactive" v-model="form.status" value="draft">
                            <label class="form-check-label" for="draft">Draft</label>
                          </div>
                          <div class="text-danger" v-if="form.errors.has('status')" v-html="form.errors.get('status')"></div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Save</button>
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
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        name: 'create',
        data: function(){
            return {
                form: new Form({
                  category_id: null,
                  title: null,
                  content: null,
                  thumbnail: null,
                  status: null,
                }),

                editor: ClassicEditor,
                editorConfig: {}
            }
        },

        mounted(){
          this.$store.dispatch("getCategory");
        },

        computed: {
          getCategories(){
            return this.$store.getters.categories;
          }
        },

        methods: {
          addPost: function(){
            let test = this;
            this.form.post('/add-post')
              .then(function(data){
                toastr.success('Saved Successfully'); //call toastr alert
                //test.$router.push("/categories"); //redirect to category list page.
                test.form.category_id = null;
                test.form.title = null;
                test.form.content = '';
                test.form.thumbnail = null;
                test.form.status = null;
              })
          },

          loadThumbnail: function(e){
            let file = e.target.files[0];
            let reader = new FileReader();
            let a = this;
            reader.onload = function(e){
              a.form.thumbnail = e.target.result;
            }
            reader.readAsDataURL(file);
          }


        }

    }
</script>
