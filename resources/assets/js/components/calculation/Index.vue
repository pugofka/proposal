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

    <expenses-customers
      v-if="steps.current == 3"
      :expensesCustomersData="expensesCustomers"
    />

    <result
      v-if="steps.current == 4"
      :hoursData="resultHours"
      :hourPriceData="this.calculate.hourPrice"
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
      'other-tasks': require('./OtherTasks.vue'),
      'expenses-customers': require('./ExpensesCustomers.vue'),
      'result': require('./Result.vue')
    },

    data: function () {
      return {
        steps: {
          current: 0,
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
        otherTasks: [],
        expensesCustomers: []
      }
    },

    props: {
      templatesData: {
        type: Array,
        required: true
      }
    },

    computed: {
      resultHours: function () {
        let tasksHours = [];

        for (var i = 0; i < this.stages.length; i++) {
          for (var j = 0; j < this.stages[i].tasks.length; j++) {
            if(this.stages[i].tasks[j].hours) {
              const task = {
                name: this.stages[i].tasks[j].name,
                hours: this.stages[i].tasks[j].hours
              };
              tasksHours.push(task);
            }
          }
        }

        for (var i = 0; i < this.otherTasks.length; i++) {
          if(this.otherTasks[i].hours) {
            const task = {
              name: this.otherTasks[i].name,
              hours: this.otherTasks[i].hours
            };
            otherTasksHour.push();
          }
        }

        return tasksHours;
      }
    }

  }
</script>
