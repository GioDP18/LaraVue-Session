<template>
    <div>
        <h1>List of Books</h1>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary" @click="author">
                Add Author
            </button>
            <button type="button" class="btn btn-primary" @click="addBook">
                Add Book
            </button>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id">
                    <td>{{ book.title }}</td>
                    <td>{{ book.author.name }}</td>
                    <td class="d-flex gap-2">
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" @click="setValues(book.id, book.title, book.author.name, book.author_id)">Update</button>
                        <button @click="deleteBook(book.id)">Delete</button>
                    </td>


                </tr>
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form @submit.prevent="formSubmit">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" v-model="title" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" v-model="author_id" aria-label="Disabled select example">
                                <option selected>Choose Author</option>
                                <option v-for="author in authors" :value="author.id" :selected="author.id === author_id">{{ author.name }}</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="name" class="form-label">Author</label>
                            <input type="text" v-model="author_name" class="form-control" id="name" disabled>
                        </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";

const books = ref([]);
const router = useRouter();
const id = ref('');
const title = ref('');
const author_name = ref('');
const author_id = ref(0);
const authors = ref([]);

onMounted(() => {
    getBooks();
    getAuthors();
})

const getBooks = async () => {
    try {
        await axios.get(`${import.meta.env.VITE_BASE_URL}/api/auth/get-books`)
            .then((response) => {
                console.log(response.data)
                books.value = response.data.data;
            })
    }
    catch (error) {
        console.log(error);
    }
}

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

const setValues = (book_id, book_title, book_author, book_author_id) => {
    id.value = book_id
    title.value = book_title
    author_name.value = book_author
    author_id.value = book_author_id
}

const deleteBook = async (id) => {
    try {
        await axios.delete(`${import.meta.env.VITE_BASE_URL}/api/auth/delete-book/${id}`)
        .then((response) => {
            console.log(response.data)
            getBooks();
        })
    }
    catch (error) {
        console.log(error);
    }
}

const formSubmit = async () => {
    try{
        await axios.put(`${import.meta.env.VITE_BASE_URL}/api/auth/update-book/${id.value}`, {
            title: title.value,
            author_id: author_id.value
        })
        .then((response) => {
            console.log(response);
            getBooks();

            showModal.value = false;
        })
    }
    catch(error){
        console.error(error);
    }
}

const author = () => {
    router.push('/add-author')
}

const addBook = () => {
    router.push('/add-book')
}

</script>

<style scoped></style>
