<template>
  <div class="panel" :class="task.deffered ? 'panel-danger' : task.variant ? 'panel-success' : 'panel-default'">
    <div class="panel-heading">
      <h3 class="panel-title">
        {{ task.name }}<small>стоимость задачи: {{ taskPrice }} руб.</small>
        <div class="pull-right">
          <div class="togglebutton form-group">
            <label>
              <input
                type="checkbox"
                v-model="task.deffered"
                @click="resetTask"
              />
              <span class="toggle"></span>
              Отложить задачу
            </label>
          </div>
        </div>
      </h3>
    </div>
    <div class="panel-body" v-if="!task.deffered">

      <div class="row">
        <div class="col-md-6">
          <div class="task__variants row">
            <div class="form-group">
              <label class="col-md-2 control-label">Варианты</label>
              <div class="col-md-10">
                <variant
                  v-for="(variant, index) in task.variants"
                  :key="index"
                  :variantData="variant"
                  :currentVariantData="task.variant_id"
                  :taskIdData="task.id"
                  :setVariantCallback="setVariant"
                  :setVariantNameCallback="setVariantName"
                  :setHoursCallback="setHours"
                />
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="row" v-if="task.variant_id">
            <div class="form-group">
              <div class="col-md-4 col-md-offset-4">
                <label for="name" class="control-label">Рекомендованные часы</label>
              </div>
              <div class="col-md-4">
                <input type="number" class="form-control" v-model.number="task.hours">
              </div>
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
        Vue.set(this.task, 'variant_id', variant);
      },

      setVariantName: function (name) {
        Vue.set(this.task, 'variant_name', name);
      },

      toggleDeffered: function () {
        if(this.task.deffered) this.task.deffered = !this.task.deffered
        else Vue.set(this.task, 'deffered', false)
      },

      resetTask: function () {
        this.setHours(0);
        this.setVariant(null);
      }

    },

    computed: {
      taskPrice: function () {
        return this.task.hours * this.hourPriceData;
      }
    },

    created() {
      if(!this.task.hours) this.setHours(0);
      if(!this.task.variant_id) this.setVariant(null);
      if(!this.task.variant_name) this.setVariantName(null);
      if(!this.task.deffered) this.toggleDeffered();
    }
  }
</script>

<style scoped lang="scss">
  .panel-heading small {
    font-size: .9em;
    color: #ccc;
    padding-left: 10px;
  }

  .togglebutton.form-group {
    margin-top: 0;
  }
</style>
