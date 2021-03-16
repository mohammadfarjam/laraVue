<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-right"
             style="direction: rtl">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto text-right">
                    <li class="nav-item active">
                        <router-link to="/" class="nav-link">خانه</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/about" class="nav-link">درباره ما</router-link>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><router-link to="/login" class="nav-link text-light ml-3">ورود</router-link></li>
                    <li><router-link to="/register" class="nav-link custom_btn text-light">ثبت نام</router-link></li>
                </ul>
            </div>


        </nav>

    </div>
</template>

<script>
export default {

}
</script>
