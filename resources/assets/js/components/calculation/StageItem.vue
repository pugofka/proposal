<template>
  <div class="stage">
    <header class="stage__title">
      <h3>
        {{stage.name}}
        <small>стоимость этапа: {{ stage.price }} руб.</small>
      </h3>
      <div class="stage__workers">
        <div class="form-group is-empty">
          <div class="col-md-5 col-md-offset-4">
            <label for="name" class="control-label">Количество людей</label>
          </div>
          <div class="col-md-3">
            <input type="number" class="form-control" min="0" v-model.number="stage.workers">
          </div>
        </div>
      </div>
    </header>

    <div>
      <task
        v-for="(task, index) in stage.tasks"
        :key="index"
        :taskData="task"
        :hourPriceData="hourPriceData"
      />
    </div>
  </div>
</template>

<script>
export default {
  components: {
    'task': require('./TaskItem.vue').default
  },

  data: function () {
    return {
      stage: this.stageData
    }
  },

  props: {
    stageData: Object,
    hourPriceData: Number
  },

  methods: {

    setWorkers: function (workers) {
      Vue.set(this.stage, 'workers', workers);
    },

    setStageHours: function (hours) {
      Vue.set(this.stage, 'hours', hours);
    },

    setStagePrice: function (price) {
      Vue.set(this.stage, 'price', price);
    },

    computedPrice: function () {
      let hoursSum = 0;
      for (var i = 0; i < this.stage.tasks.length; i++) {
        hoursSum += this.stage.tasks[i].hours;
      }
      return hoursSum * this.hourPriceData;
    },

    computedHours: function () {
      let hoursSum = 0;
      for (var i = 0; i < this.stage.tasks.length; i++) {
        hoursSum += this.stage.tasks[i].hours;
      }
      return hoursSum;
    }
  },

  watch: {
    'stage.tasks': {
      handler: function () {
        this.stage.price = this.computedPrice();
        this.stage.hours = this.computedHours();
      },
      deep: true
    }
  },

  created() {
    if (!this.stage.workers) this.setWorkers(1);
    if (!this.stage.hours) this.setStageHours(0);
    if (!this.stage.price) this.setStagePrice(0);
  }
}
</script>

<style scoped lang="scss">
.stage {
  &__title {
    display: flex;
    justify-content: space-between;

    h3 {
      small {
        display: block;
        color: #ccc;
        font-size: 0.5em;
      }
    }
  }
}
</style>
