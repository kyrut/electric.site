<template>
    <div>
        <b-modal ref="my-modal" hide-footer title="Using Component Methods">
            <div class="d-block text-center">
                <b-modal ref="my-modal" hide-footer title="Оформить заявку на вызов мастера">
                    <div class="d-block text-center">
                        <form method="post">
                            <div class="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 pl-0">
                                            <div class="form-group">
                                                <input type="hidden" name="_token" v-bind:value="csrf">
                                                <label for="name" class="text-left w-100">Введите имя</label>
                                                <input type="text" id="name" name="name" class="form-control">
                                                <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-6 pr-0">
                                            <label for="phone" class="text-left w-100 text-w">Введите телефон <i class="fas fa-exclamation-circle text-danger" data-toggle="tooltip" title=""></i></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+7</div>
                                                </div>
                                                <input type="text" id="phone" name="phone" placeholder="___ ___ __ __" class="form-control">
                                                <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="text-left w-100">Сообщение</label>
                                    <textarea id="message" name="message" class="form-control" placeholder="Вы можете оставить дополнительную информацию"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </form>
                    </div>
                </b-modal>
            </div>
            <b-button class="mt-3" variant="outline-danger" block @click="hideModal">Close Me</b-button>
            <b-button class="mt-2" variant="outline-warning" block @click="toggleModal">Toggle Me</b-button>
        </b-modal>
    </div>
</template>

<script>
export default {
    name: "Modal",
    methods: {
        showModal() {
            this.$refs['my-modal'].show()
        },
        hideModal() {
            this.$refs['my-modal'].hide()
        },
        toggleModal() {
            // We pass the ID of the button that we want to return focus to
            // when the modal has hidden
            this.$refs['my-modal'].toggle('#toggle-btn')
        }
    }
}
</script>

<style scoped>

</style>
