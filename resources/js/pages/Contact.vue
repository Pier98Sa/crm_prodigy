<template>
    <div class="container-md py-5">
        <h1 class="text-center text-uppercase">Contact us for more information</h1>

        <div class="modal" tabindex="-1" id="thx">
                    
            <div class="modal-dialog">
                <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title w-100">Thank you for contacting us🎉</h5>
                </div>
                <div class="modal-body">
                    <p> You will be contacted as soon as possible by one of our collaborators. See you soon👍</p>
                </div>
                <div class="modal-footer px-2">
                    <router-link   data-dismiss="modal" class="btn btn-primary w-100" :to="{name: 'home'}">Back to the home</router-link>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form @submit.prevent="makeLead" class="w-100 p-5 card">
                        
                    <div class="form-group">
                        <label for="name" class="col-form-label col-12 col-md-4"> Name<strong>*</strong></label>
                        <input :disabled="inputBlock"  v-model="name" class="col-12 col-md-7 form-control" :class="{'is-invalid':errors.name}" type="text" name="name" id="name" required maxlength="255" placeholder="Insert your name">

                        <p v-for="(error, index) in errors.name" :key="'error_name' + index" class="invalid-feedback">
                            {{error}}
                        </p>
                    </div>  

                    <div class="form-group">
                        <label for="email" class="col-form-label col-12 col-md-4"> Email<strong>*</strong></label>
                        <input :disabled="inputBlock"  v-model="email" class="col-12 col-md-7 form-control" :class="{'is-invalid':errors.email}" type="email" name="email" id="email" required maxlength="255" placeholder="Insert your email">

                        <p v-for="(error, index) in errors.email" :key="'error_email' + index" class="invalid-feedback">
                            {{error}}
                        </p>
                    </div> 

                    <div class="form-group">
                        <label for="phone_number" class="col-form-label col-12 col-md-4"> Phone Number<strong>*</strong></label>
                        <input :disabled="inputBlock"  v-model="phone_number" class="col-12 col-md-7 form-control" :class="{'is-invalid':errors.phone_number}" type="numer" name="phone_number" id="phone_number" required  pattern="[0-9]+" minlength="9" maxlength="15" placeholder="Insert your phone number">

                        <p v-for="(error, index) in errors.phone_number" :key="'error_phone_number' + index" class="invalid-feedback">
                            {{error}}
                        </p>
                    </div> 


                    <div class="form-group">
                        <label for="description" class="col-form-label col-12 col-md-4">Comment <strong>*</strong>
                            <small class="d-block">Write at least 10 characters</small>
                        </label>
                        <textarea :disabled="inputBlock" v-model="description" class="form-control" :class="{'is-invalid':errors.description}" name="description" id="description" cols="30" rows="10" required></textarea>
                        
                        <p v-for="(error, index) in errors.description" :key="'error_descriptione' + index" class="invalid-feedback">
                            {{error}}
                        </p>
                    </div>

                    <button :disabled='leadSending' type="submit" class="btn btn-primary">{{leadSending ? 'Sending in progress ...' : 'Send'}}</button>
                </form>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    name:'Contact',
    data(){
        return{
            name: '',
            email:'',
            phone_number:'',
            description:'',
            errors:{},
            leadSending: false,
            inputBlock: false,

        }
    },

    methods: {
        makeLead(){
          this.leadSending = true; 
          
            axios.post("/api/leads",{
              "name": this.name,
              "email": this.email,
              "phone_number": this.phone_number,
              "description": this.description,
            }).then(response =>{
                if(response.data.errors){
                    this.errors = response.data.errors;
                    this.leadSending = true;
                }else{
                    this.inputBlock = true;
                    $("#thx").modal(); 
                    this.leadSending = false;
                }
            })
        }
    }

}
</script>

<style lang="scss" scoped>

</style>