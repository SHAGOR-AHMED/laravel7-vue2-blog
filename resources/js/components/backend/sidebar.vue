<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/home" class="brand-link">
      <img :src="fileLink()" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img :src="fileLink()" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mr Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <router-link to="/home" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/categories" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Categories</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/posts" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Posts</p>
            </router-link>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>        
</template>

<script>
  export default {
    name: 'sidebar',
    methods: {   
      fileLink: function(){
        return 'assets/images/AdminLTELogo.png';
      }
    }
  }
</script>