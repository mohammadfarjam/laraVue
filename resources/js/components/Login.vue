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
                                <input type="text" placeholder="نام کاربری / ایمیل  " v-model="form.email"/>
                                <i class="fas fa-user"></i>

                                <div class="error">{{ errors.email }}</div>
                            </div>


                            <div class="form-control1">
                                <input type="password" placeholder="رمز عبور " v-model="form.password"/>
                                <i class="fas fa-lock"></i>

                                <div class="error">{{ errors.password }}</div>
                            </div>
                            <button class="submit" @click.prevent="login">
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

    data (){
        return{
            form:{
                name: "",
                email: "",
                password: "",

            },
            errors: {},
            err: [],
        }
    },


    methods: {
        login() {
            this.errors = {};

            if (!this.form.email) {
                this.Vue.set(this.errors, "name", "نام کاربری  یا ایمیل خود را وارد نمایید");
            }
}
}
}

</script>

