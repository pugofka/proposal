<template>
  <div class="questions__del">
    <div>
      <input type="text" class="form-control" v-model="variantData.name" @keyup="change">
      <p v-if="isVariantInvalid" class="help-block">Название должно содержать не меньше 3 символов</p>
    </div>
    <button href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab" @click="remove(variantData)" v-if="isShowRemoveBtn">
      <i class="material-icons"><img src='/img/minus.svg'></i>
    </button>
  </div>
</template>

<script>
  export default {
    data: function () {
      return {
        isVariantInvalid: true
      }
    },

    props: {

      variantData: {
        type: Object
      },

      callback: {
        type: Function
      },

      isShowRemoveBtn: {
        type: Boolean
      },

      taskId: {
        type: Number
      }

    },

    methods: {

      validateName: function () {
        if(this.variantData.name && this.variantData.name.length >= 3) {
          this.isVariantInvalid = false;
          return true;
        } else {
          this.isVariantInvalid = true;
          return false;
        }
      },

      change: _.debounce(function () {
        if(this.validateName()) {
          var t = this;
          if(this.variantData.id) {
            axios.put('/variants/'+this.variantData.id, {
              "id": this.variantData.id,
              "name": this.variantData.name,
              "task": this.taskId
            })
              .then(function(response){
                var id = response.data.id;
                t.variantData.id = id;
              })
              .catch(function(error){
                console.error(error);
              })
          } else {
            axios.post('/variants/', {
              "name": this.variantData.name,
              "task": this.taskId
            })
              .then(function(response){
                var id = response.data.id;
                t.variantData.id = id;
              })
              .catch(function(error){
                console.error(error);
              })
          }
        }
      }, 500),

      remove: function(data) {
        this.callback(data);

        if(this.variantData.id) {
          axios.delete('/variants/'+this.variantData.id, {
            "id": this.variantData.id,
            "name": this.variantData.name,
            "task": this.taskId
          })
            .then(function(response){
              console.log(response);
            })
            .catch(function(error){
              console.error(error);
            })
        }
      }

    }
  }
</script>
