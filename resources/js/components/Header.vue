<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow fixed-top">
      <div class="container-md">
        <a class="navbar-brand" href="#">CRM</a>

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          <router-link class="nav-link" :to="{name: 'products'}">Products</router-link>
          </li>
          <li class="nav-item">
          <router-link class="nav-link" :to="{name: 'about'}">About Us </router-link>
          </li>

          <li class="nav-item">
          <router-link class="nav-link" :to="{name: 'contact'}">Contact Us </router-link>
          </li>
        </ul>

        <a href="/admin" class="btn btn-primary">Private Area</a>

      </div>
    </nav>
  </div>
</template>

<script>
export default {
    name:'Header',
}
</script>

<style lang="scss" scoped>

</style>