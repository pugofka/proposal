<template>
  <div class="task-variants-wrapper">
    <div class="input-group templates__task-variants" v-for="(variant, index) in variants">
      <span class="input-group-addon templates__variant-name" id="basic-addon1">{{ variant.name }}</span>
      <input type="text" class="form-control templates__variant-time" placeholder="time" aria-label="Variant" aria-describedby="basic-addon1"
             @keyup="sendVariantTime(index)"
      v-model.number="variant.templates_data[0].variant_time"/>
      <!--v-model=variantTime>-->
    </div>
  </div>
</template>

<script>
  export default {
    components: {
      "variant-name": require("./Variants.vue")
    },

    data:
      function () {
        return {
          variantId: this.variantsData,
          variants: this.variantsData,
        }
      },

    props: {
      variantsData: {
        type: Array,
        required: true
      },
      templateIdData: {
        type: Number,
        required: true
      },
      taskData: {
        type: Object,
        required: true
      },
    },

    methods: {
      sendVariantTime: function (index) {
        console.log("update time by axios");
        axios.put(API_URL + "/templates/" + this.templateIdData + "/edit/update-time", {
          "task_id": this.taskData.id,
          "template_id": this.templateIdData,
          "variant_id": this.variantsData[index].id,
          "variant_time": this.variantsData[index].templates_data[0].variant_time
        })
      }
    },

    watch: {},

    created() {
      for(var i=0; i < this.variants.length; i++) {
        if(this.variants[i].templates_data.length <= 0) {
          this.variants[i].templates_data = [{
            id: null,
            task_id: this.taskData.id,
            template_id: this.templateIdData,
            variant_id: this.variants[i].id,
            variant_time: 0
          }]
        }
      }
    }
  }
</script>

<style lang="scss">

</style>
