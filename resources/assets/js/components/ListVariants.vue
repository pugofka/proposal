<template>
  <div class="form-group questions__wrap">
    <label class="control-label">Варианты</label>
    <variant
      v-for="variant in variantsData"
      :variantData="variant"
      :task-id="taskId"
      :key="variant.id"
      :callback="removeVariant"
      :isShowRemoveBtn="isShowRemoveBtn"
    />
    <button
      href="javascript:void(0)"
      class="questions__btn btn btn-warning btn-fab"
      v-on:click="addVariant"
      v-if="isShowAddBtn"
    >
      <i class="material-icons">
        <img src="/img/plus.svg">
      </i>
    </button>
  </div>
</template>

<script>
export default {
  components: {
    'variant': require('./Variant.vue').default
  },

  data: function () {
    return {
      isShowAddBtn: true,
      variantsData: this.variants,
      isShowRemoveBtn: true
    }
  },

  props: {

    variants: {
      type: Array
    },

    taskId: {
      type: Number
    }

  },

  methods: {

    addVariant: function () {
      var clearVariant = {
        id: null,
        name: null
      };
      this.variants.push(clearVariant);
    },

    removeVariant: function (data) {
      this.variants.splice(this.variants.indexOf(data), 1);
    },

    checkVariants: function (data) {
      if (data.length !== 0) {
        if (!data[data.length - 1].name) this.isShowAddBtn = false;
        else this.isShowAddBtn = true;

        if (data.length <= 1) this.isShowRemoveBtn = false;
        else this.isShowRemoveBtn = true;
      }
    }

  },

  watch: {

    variantsData: {
      handler: function (data) {
        this.checkVariants(data);
      },
      deep: true
    }

  },

  mounted() {
    this.checkVariants(this.variantsData);
    if (this.variantsData.length <= 0) this.addVariant();
  }
}
</script>
