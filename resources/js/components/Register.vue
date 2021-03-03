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
                                    v-model="user_name"
                                    name="user_name"
                                />

                                <i class="fas fa-user"></i>

                                <div class="error">{{ errors.username }}</div>
                            </div>

                            <div class="form-control1">
                                <input
                                    type="email"
                                    placeholder="ایمیل"
                                    v-model="email"
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
                                    v-model="password"
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
                                    v-model="password_confirmation"
                                    @keyup.prevent="checkConfirmPassword"
                                />
                                <i class="fas fa-lock"></i>

<!--                                <div class="error" v-html="errors.password_confirmation"></div>-->
<!--                                <div class="error" v-html="errors.check_password_confirmation"></div>-->
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
import axios from "axios";

export default {

    components: {Layout},

    data (){
        return{
            form:{
                user_name: "",
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

            // if (!this.user_name) {
            //     Vue.set(this.errors, "username", "نام کاربری خود را وارد نمایید");
            // }
            // if (!this.email) {
            //     Vue.set(this.errors, "email", "ایمیل خود را وارد نمایید");
            // }
            //
            // if (!this.password) {
            //     Vue.set(this.errors, "password", "رمز عبور خود را وارد نمایید");
            // }
            //
            // if (this.password && this.password.length < 8) {
            //     Vue.set(this.errors, "password_length", "رمز عبور باید بیش از 8 کاراکتر باشد");
            // }
            // if (!this.confirm_password) {
            //     Vue.set(this.errors, "password_confirmation", "تکرار رمز عبور را وارد نمایید ");
            // }



                axios.post('/api/register',this.form).then(() =>{
                    console.log('saved');
                }).catch((error) => {
                    this.err=error.response.data.errors;
                })

        },


        validEmail() {
            if (this.email) {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                    Vue.set(this.errors, "valid_email", "");

                } else {
                    Vue.set(this.errors, "valid_email", "آدرس ایمیل معتبر نمی باشد");
                }
            } else {
                Vue.set(this.errors, "valid_email", "");
                Vue.set(this.errors, "email", "");
            }
        },


        checkConfirmPassword(){
            if (this.password_confirmation!== this.password) {
                Vue.set(this.errors, "check_password_confirmation", "تکرار رمز عبور تطابق ندارد ");
            }else{
                Vue.set(this.errors, "check_password_confirmation", "");
            }

            if (this.password_confirmation.length > 0){
                Vue.set(this.errors, "password_confirmation", "");

            }
        },

        checkPassword(){
            if (this.password.length > 0){
                Vue.set(this.errors, "password", "");
            }
        },





    },
};
</script>
