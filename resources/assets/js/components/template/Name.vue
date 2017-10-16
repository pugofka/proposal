<template>

  <div class="form-group">
    <label class="col-md-3 control-label">Название шаблона</label>
    <div class="col-md-9">
      <input
        type="text"
        class="form-control"
        @keyup="update"
        v-model="name"
      >
    </div>
  </div>

</template>

<script>
  export default {

    data: function () {
      return {
        name: this.nameData,
      }
    },

    props: {
      nameData: {
        type: String,
        required: true
      },
      idData: {
        type: Number,
        required: true
      }
    },

    methods: {
      update: _.debounce(function () {
        axios.put("/templates/" + this.idData, {
          "name": this.name
        })
          .catch(function (error) {
            console.error(error);
          })
        console.log("update");
      }, 500)
    }

  }
</script>
