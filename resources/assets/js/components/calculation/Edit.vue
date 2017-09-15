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
      :getPDFData=true
    />

    <pagination
      :stepsData="steps"
      :data="{
        id: calculate.id,
        name: calculate.name,
        cost_per_hour: calculate.hourPrice,
        user_name: client.name,
        user_phone: client.phone,
        user_email: client.mail,
        template: calculate.template,
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
          id: this.calculateData.id,
          name: this.calculateData.name,
          hourPrice: this.calculateData.cost_per_hour,
          template: this.calculateData.template
        },
        client: {
          name: this.calculateData.user_name,
          phone: this.calculateData.user_phone,
          mail: this.calculateData.user_mail
        },
        stages: this.calculateData.tasks,
        otherTasks: this.calculateData.additional_tasks,
        expensesCustomers: this.calculateData.info
      }
    },

    props: {
      templatesData: {
        type: Array,
        required: true
      },
      calculateData: Object,
      required: true
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
                  hours: this.stages[i].tasks[j].hours
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
                hours: this.otherTasks[i].hours
              };
              otherTasksHour.push();
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
