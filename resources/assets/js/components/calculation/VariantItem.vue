<template>
  <div>
    <label>
      <input type="radio" :name="'variant'+taskIdData" @click="onClick" :checked="currentVariantData == variant.id">
      {{ variant.name }}
    </label>
  </div>
</template>

<script>
  export default {
    data: function () {
      return {
        variant: this.variantData
      }
    },

    props: {
      variantData: Object,
      currentVariantData: Number,
      taskIdData: Number,
      setVariantCallback: Function,
      setHoursCallback: Function
    },

    methods: {
      onClick: function () {
        this.setVariantCallback(this.variant.id);
        this.setHoursCallback(this.variant.variant_time);
      }
    }
  }
</script>
