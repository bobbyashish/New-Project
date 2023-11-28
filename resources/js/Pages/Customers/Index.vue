<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
    customers: {
        type: Array,
    }
})

const deleteCustomer = (id) => {
    let res = confirm('Are You sure');
    if (res){
        router.delete(route('customers.destroy', id), {
            onError: () => {

            },
            onSuccess: () => {
                
            }
        })
    }
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Customers
            </h2>
            <Link :href="route('customers.create')">Create Customer</Link>
        </template>

        <table class="table">
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <tr :key="customer" v-for="customer in customers">
                    <td>{{ customer.first_name }}</td>
                    <td>{{ customer.last_name }}</td>
                    <td>{{ customer.email }}</td>
                    <td>
                        <button class="btn btn-primary">View</button>

                        <Link :href="route('customers.edit', customer.id)">
                        <button class="btn btn-warning">Edit</button>
                        </Link>

                        <button @click="deleteCustomer(customer.id)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </AuthenticatedLayout>
</template>
