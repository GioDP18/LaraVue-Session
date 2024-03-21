<template>
    <div>
        <h1>Add Author</h1>

        <form @submit.prevent="formSubmit">
            <div class="mb-3">
                <label for="" class="form-label">Author Name</label>
                <input type="text" v-model="name" class="form-control" id="">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mt-3" style="width:100%">Add</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

const name = ref("");
const router = useRouter();


const formSubmit = async () => {
    try{
        await axios.post(`${import.meta.env.VITE_BASE_URL}/api/auth/add-author`, {
            name: name.value,
        })
        .then((response) => {
            console.log(response);
            router.push('/home');
        })
    }
    catch(error){
        console.error(error);
    }
}

</script>

<style scoped>

</style>
