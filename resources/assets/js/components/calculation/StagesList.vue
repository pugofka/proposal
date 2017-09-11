<template>
  <div class="panel panel-default">
    <div class="panel-heading">Задачи</div>
    <div class="panel-body">
      <stage
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

    props: {
      stagesData: Array,
      hourPriceData: Number
    }

  }
</script>
