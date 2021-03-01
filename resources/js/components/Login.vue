<template>
    <div>
        <Layout/>
        <div class="d-flex flex-row">
            <div class="col-lg-6 p-0 d_mobile">
                <section class="side ">
                    <img src="/image/img.svg"/>
                </section>
            </div>
            <!--        col-lg-6-->

            <div class="col-lg-6 col-md-12 col-sm-12 ">
                <section class="main">
                    <div class="login-container">

                        <h1 class="title">ورود</h1>


                        <form action="" class="login-form">
                            <div class="form-control1">
                                <input type="text" placeholder="نام کاربری / ایمیل  " v-model="user_name"/>
                                <i class="fas fa-user"></i>

                                <div class="error">{{ errors.username }}</div>
                            </div>


                            <div class="form-control1">
                                <input type="password" placeholder="رمز عبور " v-model="password"/>
                                <i class="fas fa-lock"></i>

                                <div class="error">{{ errors.password }}</div>
                                <div class="error">{{ errors.password_length }}</div>
                            </div>
                            <button class="submit" @click="checkUserData">
                                ورود
                            </button>
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

export default {
    components: {Layout},
    // data() {
    //     return {}
    // }
    // new Vue({
    //     el: "#app",

    data: () => ({
        user_name: "",
        password: "",
        errors: {},
    }),

    methods: {
        checkUserData(e) {
            this.errors = {};

            if (!this.user_name) {
                Vue.set(
                    this.errors, "username", "نام کاربری خود را وارد نمایید"
                );
            }

            if (!this.password) {
                Vue.set(
                    this.errors, "password", "رمز عبور خود را وارد نمایید"
                );
            }

            if (this.password.length < 8) {
                Vue.set(
                    this.errors, "password_length", "رمز عبور باید بیش از 8 کاراکتر باشد"
                );
            }

            if (!this.errors.username && !this.errors.password && !this.errors.password_length) {
                alert("خوش آمدید");
            }

            e.preventDefault();
        },
    },
    // })

}
</script>

