<template>
    <div class="container mt-5">
        <h1 class="text-center">Register</h1>
        <form @submit.prevent="formSubmit">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" v-model="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" v-model="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" v-model="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                <input type="password" v-model="password_confirmation" class="form-control" id="exampleInputPassword2">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mt-3" style="width:100%">Register</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";


const name = ref("");
const email = ref("");
const password = ref("");
const password_confirmation = ref("");
const router = useRouter();


const formSubmit = async () => {
    try{
        await axios.post(`${import.meta.env.VITE_BASE_URL}/api/auth/register`, {
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation: password_confirmation.value,
        })
        .then((response) => {
            console.log(response);
            router.push('/');
        })
    }
    catch(error){
        console.error(error);
    }
}

</script>

<style scoped>
.container {
    margin: auto;
    width: 50rem;
}
</style>
