<template>
    <div>
        <div class="form-group "><label for="name" class="col-md-3 control-label">Название шаблона</label>
            <div class="col-md-9">
                <input name="name" type="text" value="Сайт-визитка" id="name" class="form-control">
            </div>
        </div>
        <stages-list></stages-list>
    </div>
</template>

<script>
    export default {
        components: {
          'stages-list': require('./StagesList.vue')
        },
    }
</script>
