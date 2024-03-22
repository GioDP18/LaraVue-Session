<template>
    <div class="container mt-5">
        <h1 class="text-center">Add Book</h1>
        <form @submit.prevent="formSubmit">
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" v-model="title" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Author</label>
                <select class="form-select" v-model="author_id">
                    <option v-for="author in authors" :value="author.id">{{ author.name }}</option>
                </select>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mt-3" style="width:100%">Add</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";


const title = ref("");
const author_id = ref("");
const authors = ref([]);
const router = useRouter();

onMounted(() => {
    getAuthors();
})

const getAuthors = async () => {
    try{
        await axios.get(`${import.meta.env.VITE_BASE_URL}/api/auth/get-authors`)
        .then((response) => {
            console.log(response);
            authors.value = response.data.data
        })
    }
    catch(error){
        console.error(error);
    }
}


const formSubmit = async () => {
    try{
        await axios.post(`${import.meta.env.VITE_BASE_URL}/api/auth/add-book`, {
            title: title.value,
            author_id: author_id.value,
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
.container {
    margin: auto;
    width: 50rem;
}
</style>
