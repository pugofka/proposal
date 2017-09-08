<template>
  <div class="task">

    <header class="task__title">
      <h4>{{ task.name }}<small>стоимость задачи: {{ taskPrice }} руб.</small></h4>
      <div class="task__deffered">
        <div class="form-group">
          <label>
            <input type="checkbox" v-model="task.deffered"> Отложить задачу
          </label>
        </div>
      </div>
    </header>


    <div class="task__body row">

      <div class="col-md-6">
        <div class="task__variants row">
          <div class="form-group">
            <label class="col-md-2 control-label">Варианты</label>
            <div class="col-md-10">
              <variant
                v-for="(variant, index) in task.variants"
                :key="index"
                :variantData="variant"
                :currentVariantData="task.variant"
                :taskIdData="task.id"
                :setVariantCallback="setVariant"
                :setHoursCallback="setHours"
              />
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="task__hours row" v-if="task.variant">
          <div class="form-group is-empty">
            <label for="name" class="col-md-4 control-label">Рекомендованные часы</label>
            <div class="col-md-4">
              <input type="number" class="form-control" v-model.number="task.hours">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
  export default {
    components: {
      'variant': require('./VariantItem.vue')
    },

    data: function () {
      return {
        task: this.taskData
      }
    },

    props: {
      taskData: Object,
      hourPriceData: Number
    },

    methods: {

      setHours: function (hours) {
        Vue.set(this.task, 'hours', hours);
      },

      setVariant: function (variant) {
        Vue.set(this.task, 'variant', variant);
      },

      toggleDeffered: function () {
        if(this.task.deffered) this.task.deffered = !this.task.deffered
        else Vue.set(this.task, 'deffered', false)
      }

    },

    computed: {
      taskPrice: function () {
        return this.task.hours * this.hourPriceData;
      }
    },

    created() {
      if(!this.task.hours) this.setHours(0);
      if(!this.task.variant) this.setVariant(null);
      if(!this.task.deffered) this.toggleDeffered();
    }
  }
</script>

<style scoped lang="scss">
  .task {
    &__title {
      display: flex;
      justify-content: space-between;

      h4 {
        small {
          display: block;
          font-size: .5em;
          color: #ccc;
        }
      }
    }
  }
</style>
