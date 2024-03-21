import { createRouter, createWebHistory } from "vue-router";
import LoginView from "../Components/Views/LoginView.vue";
import NotFound from "../Components/404.vue";
import RegisterView from "../Components/Views/RegisterView.vue";
import HomeView from "../Components/Views/HomeView.vue";
import AuthorView from "../Components/Views/AuthorView.vue";
import AddBookView from "../Components/Views/AddBookView.vue";


const routes = [
    {
        path: "/",
        name: "Login",
        component: LoginView
    },
    {
        path: "/register",
        name: "Register",
        component: RegisterView
    },
    {
        path: "/home",
        name: "Home",
        component: HomeView
    },
    {
        path: "/add-author",
        name: "Author",
        component: AuthorView
    },
    {
        path: "/add-book",
        name: "AddBook",
        component: AddBookView
    },

    {
        path: "/:path(.*)",
        name: "404",
        component: NotFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
