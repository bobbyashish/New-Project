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

const deleteOrder = (id) => {
    let res = confirm("Are You sure");
    if (res) {
        router.delete(route("orders.destroy", id), {
            onError: () => {},
            onSuccess: () => {},
        });
    }
};
const query = ref(props.params.query);

const searchQuery = () => {
    console.log("asd");
    router.get(route("orders.index"), {
        query: query.value,
    });
};

console.log(props);
</script>

<template>
    <Head title="Dashboard" />
            <div class="card my-3">
                    <h1 class="title px-4 my-5 my-5" style="text-align: center">
                        Order Table
                    </h1>

            <div class="container my-2 my-5">
                <span>
            
                     <a class="btn btn-primary float-start"  style="width: 150px" :href="route('orders.create')">Create Orders</a>         
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
                    <th>Product Name</th>
                    <th>Customer-Id</th>
                    <th>Amount</th>
                  
                    <th>Actions</th>
                </thead>
                <tbody>
                    <tr :key="order" v-for="order in props.data?.data" >
                        <td>{{ order.product_name }}</td>
                        <td>{{ order.customer.first_name }}</td>
                        <td>{{ order.amount }}</td>
                       
                        
                        <td>
                            <button class="btn btn-primary">View</button>

                            <Link :href="route('orders.edit', order.id)">
                                <button class="btn btn-warning">Edit</button>
                            </Link>

                            <button
                                @click="deleteOrder(order.id)"
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



