<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";
defineOptions({
    layout: CustomeLayout,
});

defineProps({
    
})


const form = useForm({
    item_name:props?.products?.item_name, 
    item_price:props?.products?.last_price,
    item_details:props?.products?.last_details,
    warranty_period:props?.products.warranty_period
});

const submit = () => {
    form.put(route('products.update', props?.products?.id),{
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
                Create Customer
            </h2>
        </template>

        <form class="row" @submit.prevent="submit" novalidate>
            <div class="col-md-6">
                <label class="form-label">Item-Name</label>
                <input type="item_name" class="form-control" id="item_name"  v-model="form.item_name"
                    required
                    autofocus
                    autocomplete="item_name" />
            </div>
            <div class="col-md-6">
                <label class="form-label">Item-Price</label>
                <input type="item_price" class="form-control" id="item_price"   v-model="form.item_price"/>
            </div>
            <div class="col-md-6">
                <label class="form-label">Item-Details</label>
                <input type="item_details" class="form-control" id="item_details"   v-model="form.item_details"/>
            </div>
            <div class="col-md-6">
                <label class="form-label">Warranty-Period</label>
                <input type="warranty_period" class="form-control" id="warranty_period"   v-model="form.warranty_period"/>
            </div>
            <div class="col-6 mt-3">
                <button type="submit" class="btn btn-primary me-5">
                    Submit
                </button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
