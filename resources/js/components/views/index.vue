<template>
    <div class="my-spinner flex-grow-1">
        <spinner v-if="loading"></spinner>
        <div v-else class="d-flex justify-content-around flex-column h-100">
            <h1 class="cover-heading" style="font-weight: 600; color: #28a745;">Электрик в Невинномысске</h1>
            <vue-alert  v-if="loadAlert" :messages="msg"></vue-alert>
            <p class="lead">Вызов электрика в день обращения.<br> Бесплатная консультация и расчет стоимости работ. <br>Срочный ремонт и устранение аварийных ситуаций.</p>
            <div class="my-button">
                <p v-on:click="showModal" class="btn btn-sm btn-success mb-3">Оформить заявку <i class="bi bi-envelope"></i></p>
                <a href="tel:+79288171250" class="btn btn-sm btn-success mb-3"> <i class="bi bi-telephone"></i> Позвонить</a>
            </div>
        </div>
        <b-modal ref="my-modal" hide-footer title="Оформить заявку на вызов мастера">
            <div class="d-block text-center">
                <form @submit.prevent="sendMail">
                    <div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="_token" v-bind:value="csrf">
                                        <label for="name" class="text-left w-100">Введите имя</label>
                                        <input type="text"
                                               id="name"
                                               v-model.trim="form.name"
                                               class="form-control"
                                               :class="this.$v.form.name.$error ? 'is-invalid' : '' "
                                        >
                                        <div v-if="this.$v.form.name.$dirty && !this.$v.form.name.required" class="invalid-feedback text-left">
                                            Поле имя должно быть заполнено.
                                        </div>
                                        <div v-if="this.$v.form.name.$dirty && !this.$v.form.name.nameValid" class="invalid-feedback text-left">
                                            Поле имя не должно содержать цифр
                                        </div>
                                        <div v-if="this.$v.form.name.$dirty && !this.$v.form.name.minLength" class="invalid-feedback text-left">
                                            Поле имя должно содержать минимум 3 символа
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label for="phone" class="text-left w-100">Введите телефон</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text rounded-left">+7</div>
                                        </div>
                                        <input type="text"
                                               id="phone"
                                               v-model.trim="form.phone"
                                               class="form-control  rounded-right"
                                               :class="this.$v.form.phone.$error ? 'is-invalid' : '' "
                                        >
                                        <div v-if="this.$v.form.phone.$dirty && !this.$v.form.phone.required" class="invalid-feedback text-left">
                                            Поле телефон должно быть заполнено.
                                        </div>
                                        <div v-if="this.$v.form.phone.$dirty && !this.$v.form.phone.phoneValid" class="invalid-feedback text-left">
                                            Неверный формат номера телефона.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mt-3">
                        <spin v-if="spinLoad"></spin>
                        <span v-else>Отправить</span>
                    </button>
                </form>
            </div>
        </b-modal>
    </div>
</template>

<script>
import Spinner from "../Spinner";
import VueAlert from "../Alert";
import Spin from "../Spin";
import { required, minLength, helpers } from 'vuelidate/lib/validators'
const phoneValid = helpers.regex('phoneValid', /^9\d\d\)?\s?\-?\d\d\d\s?\-?\d\d\s?\-?\d\d$/);
const nameValid = helpers.regex('nameValid', /^[A-zА-я]{1,}$/);
export default {
    components:{
        VueAlert,
        Spin,
        Spinner,
    },
    data: () => ({
        loading: true,
        loadAlert: false,
        spinLoad:false,
        csrf:'',
        form:{
            name:'',
            phone:'',
        },
        msg:'',
    }),
    validations:{
        form:{
            name:{
                nameValid,
                required,
                minLength: minLength(3)
            },
            phone:{
                required,
                phoneValid
            }
        }
    },
    mounted() {
        this.loading = false
        this.csrf = window.laravel.csrfToken;
    },
    methods: {
        showModal() {
            this.$refs['my-modal'].show()
        },
        onReset() {
            this.form.phone = ''
            this.form.name = ''
        },
        sendMail(){
            this.$v.form.$touch()
            if(!this.$v.form.$error){
                this.sendForm()
            }else{
                console.log("не прошла");
            }
        },
        sendForm(){
            axios.post('api/mySend', this.form, {
                headers:{
                    'Content-type':'application/json'
                }
            })
                .then(
                    this.spinLoad = true
                )
                .then(res => {
                    this.$refs['my-modal'].hide()
                    this.spinLoad = false
                    this.loadAlert = true
                    this.msg = res.data.message
                    this.onReset()
                })
                .catch(err =>{

                })
        }
    }
}
</script>

<style scoped>
    .my-spinner{
        position: relative;
        z-index: 10;
    }
    .my-button{
        display: flex;
        justify-content: space-around;
    }
</style>
