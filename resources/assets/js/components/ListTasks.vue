<template>
<div>
	<div class="questions__wrapper" v-for="task in tasks">
		<task :taskData='task' :templateData='templates' :callback="removeTask"></task>
	</div>
	<button href="" class="questions__btn btn btn-warning btn-fab" @click="addTask" v-if=isAddBtn>
		<i class="material-icons">
		    <img src='/img/plus.svg' alt="">
	  	</i>
  	</button>
</div>
</template>

<script>
    export default {	
    	data: function () {
        return {
          tasks: this.tasksData,
          templates: this.templatesData,
          isAddBtn: true,
        }
      }, 

      props: {
      	tasksData: {
      		type: Array
      	},
      	templatesData: {
      		type: Array
      	}
      },


      methods: {
        addTask: function() {
          var clearTask = {
          	name: null,
          	id: null,
          	 variants: [
	            { 
	              name: null,
	              id: null
	            }
	         ]
          };
          this.tasks.push(clearTask);
        },
        removeTask: function(data) {
        	this.tasks.splice(this.tasks.indexOf(data), 1);
        }
    },
	components: {
		'task': require('./Task.vue')
	},
	watch: {
		tasks: {
			handler: function(e) {
				if(!e[e.length - 1].name) this.isAddBtn = false;
				else this.isAddBtn = true;
			},
			deep: true
		}
	}
} 
</script>