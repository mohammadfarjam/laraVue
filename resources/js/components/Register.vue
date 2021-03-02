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

                                <div class="error">{{ errors.email }}</div>
                                <div class="error">{{ errors.valid_email }}</div>
                            </div>

                            <div class="form-control1">
                                <input
                                    type="password"
                                    placeholder="رمز عبور "
                                    v-model="password"
                                />
                                <i class="fas fa-lock"></i>

                                <!--                        <div class="error">{{ errors.password }}</div>-->
                                <!--                        <div class="error">{{ errors.password_length }}</div>-->
                            </div>

                            <div class="form-control1">
                                <input
                                    type="password"
                                    placeholder="تکرار رمز عبور "
                                    v-model="confirm_password"
                                />
                                <i class="fas fa-lock"></i>

                                <!--                        <div class="error">{{ errors.password }}</div>-->
                                <!--                        <div class="error">{{ errors.password_length }}</div>-->
                            </div>
                            <button class="submit" @click.prevent="register">ثبت نام</button>
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

export default {
    rules: {
        'no-console': 'off',
    },
    components: {Layout},

    data: () => ({
        user_name: "",
        email: "",
        password: "",
        confirm_password: "",
        errors: {},
    }),

    methods: {
        register() {
            this.errors = {};

            if (!this.user_name) {
                Vue.set(this.errors, "username", "نام کاربری خود را وارد نمایید");
            }
            if (!this.email) {
                Vue.set(this.errors, "email", "ایمیل خود را وارد نمایید");
            }
        },




        validEmail () {
            if(this.email){
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                    Vue.set(this.errors, "valid_email", "");

                } else {
                    Vue.set(this.errors, "valid_email", "آدرس ایمیل معتبر نمی باشد");
                }
            }else {
                Vue.set(this.errors, "valid_email", "");
            }


            },

    },
};
</script>
