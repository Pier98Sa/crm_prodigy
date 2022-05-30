<template>
    <div class="container-md pt-3">
        <h1 class="text-center text-uppercase">This is what we do</h1>
        <h5 class="text-center">for more information click on the card</h5>

        <div class="modal" tabindex="-1" id="card-product">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title w-100">{{SingleProduct.name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" id="closed">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img :src="SingleProduct.image" :alt="SingleProduct.name" class="w-100">
                        <p>{{SingleProduct.description}}</p>
                    </div>
        
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6" v-for="product in products" :key="product.key">
                <div class="row py-5">
                    <div class="col">
                        <div class="card h-100" @click="GetSingleProduct(product)">
                            <img :src="product.image" :alt="product.name" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title font-weight-semibold mb-1">{{product.name}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row py-5">
            <div class="col d-flex justify-content-around align-items-center">
                <h2 class="text-uppercase">Fill out the form to receive a quote</h2>
                <router-link class="btn btn-primary ml-3" :to="{name: 'contact'}">Go to Form</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'Products',
    data(){
        return{
            products: [],
            SingleProduct: [],
        }
    },
    methods:{
        GetProducts(){
            axios.get("api/products")
            .then(response =>{
                
                this.products = response.data.result;
            })
        },
        GetSingleProduct(product){
            $("#card-product").modal(); 
            this.SingleProduct = [];
            this.SingleProduct = product;
            console.log(this.SingleProduct);
        }
    },
    mounted(){
        this.GetProducts();
    }

}
</script>

<style lang="scss" scoped>
    .card{
        cursor: pointer;
    }
</style>