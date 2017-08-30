<template>
	<div class="form-group  questions__wrap">
      <label for="" class="control-label">Варианты</label>
      <variant v-for="variant in variantsData" :variantData=variant :key=variant.id :callback='removeVariant' :removeBtn=removeBtn></variant>
      <button href="javascript:void(0)" class="questions__btn btn btn-warning btn-fab" v-on:click="addVariant" v-if=isAddBtn>
        <i class="material-icons"><img src='/img/plus.svg' alt=""></i>
      </button>
    </div>
</template>

<script>
    export default {
    data: function () {
        return {
          	isAddBtn: true,
          	variantsData: this.variants,
          	removeBtn: true
        }
    },
    props: {
        variants: {
          type: Array
        }
	},
	methods: {
        addVariant: function() {
          var clearVariant = { 
	              name: '',
	              id: null
          };
          this.variants.push(clearVariant);
        },
        removeVariant: function(data) {
        	this.variants.splice(this.variants.indexOf(data), 1);
        },
        checkVariants: function(data) {
          if(data.length !== 0) {
            if(!data[data.length - 1].name) this.isAddBtn = false;
            else this.isAddBtn = true;

            if(data.length <= 1) this.removeBtn = false;
            else this.removeBtn = true;
          }
        }
    },
	watch: {
		variantsData: {
			handler: function(data) {
				this.checkVariants(data);
			},
			deep: true
		}
	},
	components: {
	    'variant': require('./Variant.vue')
	},
	mounted() {
		this.checkVariants(this.variantsData);
	}
}
</script>