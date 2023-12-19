<script setup>

import { Head, Link, router } from "@inertiajs/vue3";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";
defineOptions({
    layout: CustomeLayout,
});

defineProps({
    products: {
        type: Array,
    }
})

const deleteProduct = (id) => {
    let res = confirm('Are You sure');
    if (res){
        router.delete(route('products.destroy', id), {
            onError: () => {

            },
            onSuccess: () => {
                
            }
        })
    }
}
</script>

<template>     
            <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
                Products
            </h2>
            <Link :href="route('products.create')">Add Products</Link>
           


        <table class="table">
            <thead>
                <th>Item-Name</th>
                <th>Item-Price</th>
                <th>Item-Details</th>
                <th>Warranty-Period</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr :key="product" v-for="product in products">
                    <td>{{ product.item_name }}</td>
                    <td>{{ product.amount }}</td>
                    
                    <td>
                        <button class="btn btn-primary">View</button>

                        <Link :href="route('products.edit', product.id)">
                        <button class="btn btn-warning">Edit</button>
                        </Link>

                        <button @click="deleteProduct(product.id)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

</template>
