<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";
import { nextTick, ref } from "vue";
defineOptions({
    layout: CustomeLayout,
});

const props = defineProps({
    data: {
        type: Array,
    },
    params: {
        type: Object,
    },
});

const deleteCustomer = (id) => {
    let res = confirm("Are You sure");
    if (res) {
        router.delete(route("customers.destroy", id), {
            onError: () => {},
            onSuccess: () => {},
        });
    }
};
const query = ref(props.params.query);

const searchQuery = () => {
    console.log("asd");
    router.get(route("customers.index"), {
        query: query.value,
    });
};

console.log(props);
</script>

<template>
    <Head title="Dashboard" />
            <div class="card my-3">
                    <h1 class="title px-4 my-5 my-5" style="text-align: center">
                        Customers Table
                    </h1>

            <div class="container my-2 my-5">
                <span>
            
                     <a class="btn btn-primary float-start"  style="width: 150px" :href="route('customers.create')">Create Customer</a>         
                <input
                    class="form-control float-end"
                    placeholder="search"
                    v-model="query"
                    @input="searchQuery"
                    style="width: 250px"
                />
                </span>
            </div>

            <table class="table py-3 px-3 mx-3 my-3">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <tr :key="customer" v-for="customer in props.data?.data" >
                        <td>{{ customer.first_name }}</td>
                        <td>{{ customer.last_name }}</td>
                        <td>{{ customer.email }}</td>
                        <td>{{ customer.phone }}</td>
                        <td>{{ customer.state }}</td>
                        <td>{{ customer.country }}</td>
                        
                        <td>
                            <button class="btn btn-primary">View</button>

                            <Link :href="route('customers.edit', customer.id)">
                                <button class="btn btn-warning">Edit</button>
                            </Link>

                            <button
                                @click="deleteCustomer(customer.id)"
                                class="btn btn-danger"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table> 

        <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" 
            :class="[link.active ? 'active' : '']" 
            :key="link" v-for="link in props?.data?.meta?.links">
            
            
            <Link v-if="link.url" class="page-link" :href="link.url ? link.url : null" :disabled="link.url ? false : true">
            <div v-html="link.label"></div>
            </Link>


            <a v-else class="page-link" href="javascript:void(0);">
                <div v-html="link.label"></div>
            </a>
            </li>
        </ul>
        </nav>
        </div>
     
        
</template>



