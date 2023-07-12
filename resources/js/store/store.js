export default{
  state: {
    categoryData: [
      {id:1,cat:'test'}
    ],
    postData: []
  },

  getters: {
    categories(state){
      return state.categoryData;
    },
    posts(state){
      return state.postData;
    },

    //for home page
    getPosts(state){
      return state.postData;
    },

    //for home page
    getActiveTopCategory(state){
      return state.categoryData;
    }
  },

  actions: {
    getCategory(data){
      axios.get("get-categories").then(function(response){
        //console.log(response.data.categories);
        data.commit("categories", response.data.categories);

      }).catch(function(error){
        console.log(error);
      })

    },

    getActiveTopCategory(data){
      axios.get("get-active-top-category").then(function (response) {
        data.commit("categories", response.data.categories);
      }).catch(function (error) {
        console.log(error);
      })
    },

    getPosts(data){
      axios.get("get-posts").then(function(response){
        //console.log(response.data.categories);
        data.commit("posts", response.data.posts);

      }).catch(function(error){
        console.log(error);
      })
    },

    //for home page
    getAllPosts(data){
      axios.get("get-posts").then(function(response){
        //console.log(response.data.categories);
        data.commit("postsforhome", response.data.posts);
      }).catch(function(error){
        console.log(error);
      })
    },  

  },

  mutations: {
    categories(state,data){
      return state.categoryData = data;
    },

    posts(state,data){
      return state.postData = data;
    },
    
    //for home page
    postsforhome(state,data){
      return state.postData = data;
    }
    
  }

}