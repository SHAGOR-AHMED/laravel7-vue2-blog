<template>
    <header class="w3l-header">
	<!--/nav-->
	<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-sm-3 px-0">
		<router-link class="navbar-brand" to="/">
		  <span class="fa fa-newspaper-o"></span> NewsBlog</router-link>
		  <!-- if logo is image enable this   
			  <a class="navbar-brand" href="#index.html">
				<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
			  </a>
		  -->
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
		  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
		  aria-label="Toggle navigation">
		  <!-- <span class="navbar-toggler-icon"></span> -->
		  <span class="fa icon-expand fa-bars"></span>
		  <span class="fa icon-close fa-times"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <nav class="mx-auto">
			<div class="search-bar">
			  <form class="search">
				<input type="search" class="search__input" name="search" placeholder="Discover news, articles and more"
				  onload="equalWidth()" required>
				<span class="fa fa-search search__icon"></span>
			  </form>
			</div>
		  </nav>
		  <ul class="navbar-nav">

	        <li class="nav-item" v-for="category in getCategories">
				<router-link :to="`/category/${category.id}`" class="nav-link">{{ category.name }}</router-link>
			</li>

				<li class="nav-item @@home__active">
				  <router-link class="nav-link" to="/">Home</router-link>
				</li>
				<li class="nav-item @@home__active">
				  <router-link class="nav-link" to="/about">About</router-link>
				</li>
			
		  </ul>
		</div>
		<!-- toggle switch for light and dark theme -->
		<div class="mobile-position">
		  <nav class="navigation">
			<div class="theme-switch-wrapper">
			  <label class="theme-switch" for="checkbox">
				<input type="checkbox" id="checkbox">
				<div class="mode-container">
				  <i class="gg-sun"></i>
				  <i class="gg-moon"></i>
				</div>
			  </label>
			</div>
		  </nav>
		</div>
		<!-- //toggle switch for light and dark theme -->
	  </div>
	</nav>
	<!--//nav-->

  </header>
</template>

<script>
	export default {
        name: 'Headermain',
        mounted(){
          this.$store.dispatch("getActiveTopCategory");
        },
        computed: {
          getCategories(){
            return this.$store.getters.getActiveTopCategory;
          }
        },
    }
</script>