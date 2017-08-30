<template>
  <div class="questions__del">
    <input type="text" class="form-control" v-model='variantData.name' @change='change(variantData)'>
    <button href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab" @click="click(variantData)" v-if="removeBtn">
      <i class="material-icons"><img src='/img/minus.svg' alt=""></i>
    </button>
  </div>
</template>

<script>
    export default {	
    	props: {
        variantData: {
          type: Object
        },
        callback: {
          type: Function
        },
        removeBtn: {
          type: Boolean 
        }
      },
      methods: {
        click: function(data) {
          this.callback(data);
        }
      }
	} 
</script>