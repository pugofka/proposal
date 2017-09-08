<template>
  <div>

    <steps
      :stepsData="steps"
    />

    <start
      v-if="steps.current == 0"
      :calculateData="calculate"
      :clientData="client"
    />

    <stages
      v-if="steps.current == 1"
      :stagesData="stages"
      :hourPriceData="calculate.hourPrice"
    />

    <other-tasks
      v-if="steps.current == 2"
      :otherTasksData="otherTasks"
      :hourPriceData="calculate.hourPrice"
    />

    <pagination
      :stepsData="steps"
    />

  </div>
</template>

<script>
  export default {
    components: {
      'steps': require('./Steps.vue'),
      'pagination': require('./StepsPagination.vue'),
      'start': require('./Start.vue'),
      'stages': require('./StagesList.vue'),
      'other-tasks': require('./OtherTasks.vue')
    },

    data: function () {
      return {
        steps: {
          current: 2,
          list: [
            'Начало',
            'Задачи',
            'Дополнительные задачи',
            'Расходы клиента',
            'Результат'
          ]
        },
        calculate: {
          name: '',
          hourPrice: 0,
        },
        client: {
          name: '',
          phone: '',
          mail: ''
        },
        stages: [
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
                    time: 10
                  },
                  {
                    id: 2,
                    name: "Нет",
                    time: 0
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
                    time: 10
                  },
                  {
                    id: 2,
                    name: "Нет",
                    time: 0
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
                    time: 10
                  },
                  {
                    id: 2,
                    name: "Нет",
                    time: 0
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
                    time: 10
                  },
                  {
                    id: 2,
                    name: "Нет",
                    time: 0
                  }
                ]
              }
            ]
          }
        ],
        otherTasks: []
      }
    }

  }
</script>
