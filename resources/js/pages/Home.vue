<template>
  <div class="container-md">
      <div class="row">
          <div class="col text-center">
            <h1 class=" pt-3 text-uppercase"> The ideal partner for web development</h1>
          </div>
      </div>

      <div class="row pb-5">
          <div class="col-12 col-md-6 pt-3">
                <div class="card shadow h-100" >
                    <img src="img/web.png" class="card-img-top h-100" >
                    <div class="card-body">
                        <router-link class="btn btn-primary " :to="{name: 'products'}">View what we do</router-link>
                    </div>
                </div>
          </div>

          <div class="col-12 col-md-6 pt-3">
                <div class="card shadow h-100" >
                    <img src="img/us.jpg" class="card-img-top h-100 " >
                    <div class="card-body">
                        
                        <router-link class="btn btn-primary " :to="{name: 'about'}">About us</router-link>
                    </div>
                </div>
          </div>
      </div>

      <div class="row pt-5 pb-5">
          <div class="col-12 pt-3">
               <div class="card shadow " >
                    <img src="img/contact.jpg" class="card-img-top " >
                    <div class="card-body">
                        <router-link class="btn btn-primary " :to="{name: 'contact'}">Contact us</router-link>
                    </div>
                </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name:'Home',

}
</script>

<style lang="scss" scoped>
    .card-img-top{
        object-fit: cover;
    }

    .card-body{
        position: absolute;
        bottom: 15px;
        left: 15px;
    }
</style>