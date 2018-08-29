<template>
  <div class="well bs-component">
    <h2>Результат</h2>
    <div class="result row">
      <div class="col-md-6">
        <div class="row result__row">
          <div class="col-md-6 result__key">
            Часы:
          </div>
          <div class="col-md-6 result__value">
            {{ hours }} ч.
          </div>
        </div>
        <div class="row result__row">
          <div class="col-md-6 result__key">
            Стоимость работы:
          </div>
          <div class="col-md-6 result__value">
            {{ hours * hourPriceData }} руб.
          </div>
        </div>
        <a href='/calculations/pdf' v-if="getPDFData" class="btn btn-success btn-raised">Скачать PDF</a>
      </div>
      <div class="col-md-6">
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data: function () {
      return {
        hours: 0
      }
    },

    props: {
      hoursData: Array,
      hourPriceData: Number,
      getPDFData: Boolean
    },

    methods: {
      setHours: function () {
        for (var i = 0; i < this.hoursData.length; i++) {
          this.hours += this.hoursData[i].hours;
        }
      },

      drawChart: function () {

      }
    },

    created() {
      this.setHours();
    },

    mounted() {
    }
  }
</script>

<style scoped lang="scss">
.result {
  &__row {
    font-size: 20px;
    margin-bottom: 15px;
  }

  &__key {
    font-weight: 700;
  }
}
</style>
