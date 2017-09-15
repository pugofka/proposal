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
      :templatesData="templatesData"
      :calculateData="calculate"
      :setStagesCallback="setStages"
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
      :data="{
        name: calculate.name,
        cost_per_hour: calculate.hourPrice,
        user_name: client.name,
        user_phone: client.phone,
        user_email: client.mail,
        template_id: calculate.template,
        tasks: stages,
        additional_tasks: otherTasks,
        info: expensesCustomers
      }"
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
          template: 0
        },
        client: {
          name: '',
          phone: '',
          mail: ''
        },
        stages: null,
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

        if(this.stages) {
          for (var i = 0; i < this.stages.length; i++) {
            for (var j = 0; j < this.stages[i].tasks.length; j++) {
              if(this.stages[i].tasks[j].hours) {
                const task = {
                  name: this.stages[i].tasks[j].name,
                  hours: +this.stages[i].tasks[j].hours
                };
                tasksHours.push(task);
              }
            }
          }
        }

        if(this.otherTasks) {
          for (var i = 0; i < this.otherTasks.length; i++) {
            if(this.otherTasks[i].hours) {
              const task = {
                name: this.otherTasks[i].name,
                hours: +this.otherTasks[i].hours
              };
              tasksHours.push(task);
            }
          }
        }

        return tasksHours;
      }
    },

    methods: {
      setStages: function (stages) {
        Vue.set(this, 'stages', stages);
      }
    }

  }
</script>
