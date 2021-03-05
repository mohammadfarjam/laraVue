<template>
    <div>
        <Layout/>
        <div class="d-flex flex-row">
            <div class="col-lg-6 p-0 d_mobile">
                <section class="side">
                    <img src="/image/img.svg"/>
                </section>
            </div>
            <!--        col-lg-6-->

            <div class="col-lg-6 col-md-12 col-sm-12">
                <section class="main">
                    <div class="login-container">
                        <h1 class="title">ثبت نام</h1>

                        <form action="" class="login-form">
                            <div class="form-control1">
                                <input
                                    type="text"
                                    placeholder="نام کاربری  "
                                    v-model="form.name"
                                    name="name"
                                    @keyup.prevent="checkName"
                                />

                                <i class="fas fa-user"></i>

                                <div class="error">{{ errors.name }}</div>
                            </div>

                            <div class="form-control1">
                                <input
                                    type="email"
                                    placeholder="ایمیل"
                                    v-model="form.email"
                                    @keyup.prevent="validEmail"
                                />
                                <i class="fas fa-envelope"></i>

                                <div class="error" v-html="errors.email"></div>
                                <div class="error" v-html="errors.valid_email"></div>
                            </div>

                            <div class="form-control1">
                                <input
                                    type="password"
                                    placeholder="رمز عبور "
                                    v-model="form.password"
                                    @keyup.prevent="checkPassword"
                                />
                                <i class="fas fa-lock"></i>
                                <div class="error" v-html="errors.password"></div>
                                <div class="error" v-html="errors.password_length "></div>
                            </div>

                            <div class="form-control1">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="تکرار رمز عبور "
                                    v-model="form.password_confirmation"
                                    @keyup.prevent="checkConfirmPassword"
                                />
                                <i class="fas fa-lock"></i>

                               <div class="error" v-html="errors.password_confirmation"></div>
                               <div class="error" v-html="errors.check_password_confirmation"></div>
                            </div>
                            <button class="submit" @click.prevent="register" >ثبت نام</button>
                        </form>
                    </div>
                </section>
            </div>
            <!--        col-lg-6-->
        </div>
    </div>
</template>

<script>
import Layout from "./Layout";
import Vue from "vue/dist/vue";
// import axios from "axios";

export default {

    components: {Layout},

    data (){
        return{
            form:{
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
            errors: {},
            err: [],
        }
    },




    methods: {
        register() {
            this.errors = {};

            if (!this.form.name) {
              Vue.set(this.errors, "name", "نام کاربری خود را وارد نمایید");
            }

            if (!this.form.email) {
                Vue.set(this.errors, "email", "ایمیل خود را وارد نمایید");
            }

            if (!this.form.password) {
               Vue.set(this.errors, "password", "رمز عبور خود را وارد نمایید");
            }

            if (this.form.password && this.form.password.length < 8) {
               Vue.set(this.errors, "password_length", "رمز عبور باید بیش از 8 کاراکتر باشد");
            }
            if (!this.form.password_confirmation) {
             Vue.set(this.errors, "password_confirmation", "تکرار رمز عبور را وارد نمایید ");
            }else{
               Vue.set(this.errors, "password_confirmation", "");
            }
            if(!this.errors) {

            }else{
             axios.post('/api/register',this.form).then(() =>{
                    console.log('saved');
                }).catch((error) => {
                    this.err=error.response.data.errors;
                })
            }


        },



        checkName(){
            if (!this.form.name) {

        }else{
                Vue.set(this.errors, "name", "");
            }
            },

        validEmail() {
            if (this.form.email) {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email)) {
                    Vue.set(this.errors, "valid_email", "");
            } else {
                  Vue.set(this.errors, "email", "");
                    Vue.set(this.errors, "valid_email", "آدرس ایمیل معتبر نمی باشد");
                }
            } else {
                 Vue.set(this.errors, "email", "");
                Vue.set(this.errors, "valid_email", "");
               }
        },

        checkPassword(){
            if (this.form.password.length > 0){
                Vue.set(this.errors, "password", "");
            }
        },

        checkConfirmPassword(){
            if (this.form.password_confirmation !== this.form.password) {
                Vue.set(this.errors, "check_password_confirmation", "تکرار رمز عبور تطابق ندارد ");
            }else{
                Vue.set(this.errors, "check_password_confirmation", "");
            }

            if (!this.form.password_confirmation){
                Vue.set(this.errors, "password_confirmation", "");
                }
        },

    },
};
</script>
