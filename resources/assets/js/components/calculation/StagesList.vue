<template>
  <div class="well bs-component">
    <h2>Задачи</h2>
    <div class="form-group">
      <div class="row">
        <label for="templates" class="col-md-2 control-label">Шаблон</label>
        <div class="col-md-10">
          <select id="templates" class="form-control" v-model="calculate.template" @change="getStages">
            <option value="0" disabled>Выберите шаблон</option>
            <option v-for="template in templatesData" :value="template.id">{{ template.name }}</option>
          </select>
        </div>
      </div>
    </div>
    <stage
      v-if="stagesData"
      v-for="(stage, index) in stagesData"
      :key="index"
      :stageData="stage"
      :hourPriceData="hourPriceData"
    />
  </div>
</template>

<script>
  export default {

    components: {
      'stage': require('./StageItem.vue')
    },

    data: function () {
      return {
        calculate: this.calculateData
      }
    },

    props: {
      stagesData: Array,
      hourPriceData: Number,
      calculateData: Object,
      templatesData: Array,
      setStagesCallback: Function
    },

    methods: {
      getStages: function () {
        const t = this;
        axios.get('/calculations/template', {
          params: {
            id: this.calculate.template
          }
        })
          .then(function (response) {
            t.setStagesCallback(response.data);
          })
          .catch(function (error) {
            console.error(error);
          })
      }
    }

  }
</script>
