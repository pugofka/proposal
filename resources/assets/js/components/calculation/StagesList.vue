<template>
  <div class="panel panel-default">
    <div class="panel-heading">Задачи</div>
    <div class="panel-body">
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
        const data = [
          {
            name: "Верстка",
            tasks: [
              {
                id: 1,
                name: "Верстка главной",
                variants: [
                  {
                    id: 1,
                    name: "Да",
                    variant_time: 10
                  },
                  {
                    id: 2,
                    name: "Нет",
                    variant_time: 0
                  }
                ]
              },
              {
                id: 2,
                name: "Верстка главной",
                variants: [
                  {
                    id: 1,
                    name: "Да",
                    variant_time: 10
                  },
                  {
                    id: 2,
                    name: "Нет",
                    variant_time: 0
                  }
                ]
              }
            ]
          },
          {
            name: "Верстка",
            tasks: [
              {
                id: 3,
                name: "Верстка главной",
                variants: [
                  {
                    id: 1,
                    name: "Да",
                    variant_time: 10
                  },
                  {
                    id: 2,
                    name: "Нет",
                    variant_time: 0
                  }
                ]
              },
              {
                id: 4,
                name: "Верстка главной",
                variants: [
                  {
                    id: 1,
                    name: "Да",
                    variant_time: 10
                  },
                  {
                    id: 2,
                    name: "Нет",
                    variant_time: 0
                  }
                ]
              }
            ]
          }
        ];

        this.setStagesCallback(data);
      }
    }

  }
</script>
