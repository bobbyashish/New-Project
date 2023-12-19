<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import InputError from "vendor/laravel/breeze/stubs/inertia-react/resources/js/Components/InputError";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";
defineOptions({
    layout: CustomeLayout,
});

defineProps({
    
});


const form = useForm({
    item_name: '',
    item_price: '',
    item_detail: '',
    warranty_period:''
});

const submit = () => {
    form.post(route('products.store'), {
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
        


            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-5  bg-secondary text-white">
                Create Products
            </h2>
        </template>

        <form class="row" @submit.prevent="submit" novalidate>
            <div class="col-md-6">
                <label class="form-label">Item-Name</label>
                <input type="item_name" class="form-control" id="item_name"  v-model="form.item_name"
                    required
                    autofocus
                    autocomplete="item_name" />
                   
                {{ form.errors.item_name }} 
                  
            </div>
            <div class="col-md-6">
                <label class="form-label">Item-Price</label>
                <input type="item_price" class="form-control" id="item_price"   v-model="form.item_price"/>
            
            </div>
            <div class="col-md-6">
                <label class="form-label">Item-Details</label>
                <input type="item_detail" class="form-control" id="item_detail"   v-model="form.item_detail"/>
                {{ form.errors.item_detail }}
            </div>
            <div class="col-md-6">
                <label class="form-label">Warranty-Period</label>
                <input type="warranty_period" class="form-control" id="warranty_period"   v-model="form.warranty_period"/>
                {{ form.errors.warranty_period }}          
            </div>
            <div class="col-6 mt-3">
                <button type="submit" class="btn btn-primary me-5">
                    Submit
                </button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
