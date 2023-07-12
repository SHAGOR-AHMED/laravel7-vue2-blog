import home from '../components/backend/home';
import my from '../components/MyComponent';

// Category Component
import categories from '../components/backend/category/manage';
import addCategoey from '../components/backend/category/create';
import editCategoey from '../components/backend/category/edit';

// Post Component
import posts from '../components/backend/post/manage';
import addPost from '../components/backend/post/create';
import editPost from '../components/backend/post/edit';

export const routes = [
  { path: '/', component: my },
  { path: '/home', component: home },
  { path: '/categories', component: categories },
  { path: '/add-category', component: addCategoey },
  { path: '/edit-category/:id', component: editCategoey },

  { path: '/posts', component: posts },
  { path: '/add-post', component: addPost },
  { path: '/edit-post/:id', component: editPost },

];