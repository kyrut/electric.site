<template>
    <form @submit.prevent="sendMail">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-6 pl-0">
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
                    <div class="col-6 pl-0">
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
        <button type="submit" class="btn btn-primary btn-sm">
            <spin v-if="spinLoad"></spin>
            <span v-else>Отправить</span>
        </button>
    </form>
</template>

<script>
import Spin from "../Spin";
import { required, minLength, helpers } from 'vuelidate/lib/validators'
const phoneValid = helpers.regex('phoneValid', /^9\d\d\)?\s?\-?\d\d\d\s?\-?\d\d\s?\-?\d\d$/);
const nameValid = helpers.regex('nameValid', /^[A-zА-я]{1,}$/);
export default {
    components:{
        Spin
    },
    data: () => ({
        spinLoad:false,
        csrf:'',
        form:{
            name:'',
            phone:'',
        }
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
        this.csrf = window.laravel.csrfToken;
    },
    methods:{
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
                    console.log(res.data.status, res.data.message);
                    this.spinLoad = false
                    this.loadAlert = true
                    this.onReset()
                })
                .catch(err =>{

                })
        }
    }
}
</script>

<style scoped>
    .rounded-left{
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }
    .rounded-left{
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
    }
</style>
