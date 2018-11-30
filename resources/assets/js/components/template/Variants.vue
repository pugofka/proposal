<template>
  <div>
    <div class="form-group" v-for="(variant, index) in variants" :key="index">
      <label :for="index" class="col-md-2 control-label">{{ variant.name }}</label>
      <div class="col-md-10">
        <input
          type="text"
          class="form-control"
          :id="index"
          @keyup="sendVariantTime(index)"
          v-model.number="variant.templates_data[0].variant_time"
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      variantId: this.variantsData.id,
      variants: this.variantsData
    };
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
    }
  },

  methods: {
    sendVariantTime: _.debounce(function(index) {
      axios.put(`/templates/${this.templateIdData}/edit/update-time`, {
        task_id: this.taskData.id,
        template_id: this.templateIdData,
        variant_id: this.variantsData[index].id,
        variant_time: this.variantsData[index].templates_data[0].variant_time
      });
    }, 200)
  },

  created() {
    const t = this;
    for (var i = 0; i < this.variants.length; i++) {
      this.variants[i].templates_data = this.variants[i].templates_data.filter(
        function(item) {
          if (item.template_id == t.templateIdData) return item;
        }
      );

      if (this.variants[i].templates_data.length <= 0) {
        this.variants[i].templates_data = [
          {
            id: null,
            task_id: this.taskData.id,
            template_id: this.templateIdData,
            variant_id: this.variants[i].id,
            variant_time: 0
          }
        ];
      }
    }
  }
};
</script>
