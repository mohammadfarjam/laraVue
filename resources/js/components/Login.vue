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
                                <input type="text" placeholder="نام کاربری / ایمیل  " v-model="form.email" name="email" />
                                <i class="fas fa-user"></i>

                                <div class="error" v-html="errors.email"></div>
                                <div class="error" v-for="key in err_server.email" v-html="key"></div>
                            </div>


                            <div class="form-control1">
                                <input type="password" placeholder="رمز عبور " v-model="form.password" name="password" />
                                <i class="fas fa-lock"></i>

                                <div class="error" v-html="errors.password"></div>
                                <div class="error" v-for="key in err_server.password" v-html="key"></div>
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
import Vue from 'vue';
import axios from "axios";
import Layout from "./Layout";

export default {
    components: {Layout},

    data (){
        return{
            form:{
                email: "",
                password: "",
            },
            errors: {},
            err_server: {},
            userData:[],
        }
    },


    methods: {
        login() {
            this.errors = {};

            if (!this.form.email) {
                Vue.set(this.errors, "email", " نام کاربری / ایمیل خود را وارد نمایید");
            }
            if (!this.form.password) {
                Vue.set(this.errors, "password", "رمز عبور خود را وارد نمایید");
            }


            if (!this.errors.email && !this.errors.password) {
                axios.post('/api/login', this.form).then((response) => {
                    if(response.status === 200){
                        this.$router.push({ name:"home",params:{userData:response.data } });
                    }
                }).catch((error) => {
                    this.err_server=error.response.data.errors;

                })
            }
}
}
}

</script>

