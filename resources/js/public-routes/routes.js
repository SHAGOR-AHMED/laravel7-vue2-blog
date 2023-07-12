// Public Component
import Home from '../components/public/Home';
import About from '../components/public/About';
import Category from '../components/public/Category';
import Post from '../components/public/Post';

export const routes = [

  //website routes
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/category/:id', component: Category },
  { path: '/post/:id', component: Post },
  

];