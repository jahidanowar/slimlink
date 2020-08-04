<template>
  <div class="link-shortner">
      <div class="jumbotron">
          <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-3">Short Your Link</h1>
                    <form action="/short" method="post" @submit="onFormSubmit">
                    <input type="hidden" name="_token" :value="csrf" />
                        <div class="ls-input"><input type="url" name="url" id="url" class="form-control mb-2" placeholder="Enter your long url" v-model="link"></div>
                        <div class="ls-button"><button type="submit" class="btn btn-primary btn-block">Short</button></div>
                    </form>
                </div>
            </div>
          </div>
      </div>

  </div>
</template>

<script>
export default {
    data(){
        return{
            link: '',
            csrf: window.Laravel.csrfToken
        }
    },
    mounted(){
        console.log(this.name);
    },
    methods:{
        linkText(){
            console.log(this.link);
        },
        onFormSubmit(event){
            // event.preventDefault();
            // console.log(this.link);
            // event.
        }
    }
}
</script>

<style>

</style>
