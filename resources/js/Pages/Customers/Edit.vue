<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    customer: {
        type: Object,
    }
})


const form = useForm({
    first_name: props?.customer?.first_name,
    last_name: props?.customer?.last_name,
    email: props?.customer?.email
});

const submit = () => {
    form.put(route('customers.update', props?.customer?.id), {
        onSuccess: () => {

        },
        onError: () => {
            
        }
    })
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Customer
            </h2>
        </template>

        <form class="row" @submit.prevent="submit" novalidate>
            <div class="col-md-6">
                <label class="form-label">First-Name</label>
                <input type="first_name" class="form-control" id="first_name"  v-model="form.first_name"
                    required
                    autofocus
                    autocomplete="first_name" />
            </div>
            <div class="col-md-6">
                <label class="form-label">Last-Name</label>
                <input type="last_name" class="form-control" id="last_name"   v-model="form.last_name"/>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email"   v-model="form.email"/>
            </div>
            <div class="col-6 mt-3">
                <button type="submit" class="btn btn-primary me-5">
                    Submit
                </button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
