<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import CustomInput from "@/Components/CustomInput.vue"
import { Head, Link, useForm } from "@inertiajs/vue3";
defineOptions({
    layout: AdminLayout,
});

defineProps({});

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
});

const submit = () => {
    form.post(route("customers.store"), {
        onSuccess: () => {},
        onError: () => {},
    });
};
</script>

<template>
    <div>
        
        <form class="row" @submit.prevent="submit" novalidate>
        <div>
            <Head title="Customers" />
            <div class="card">
              <h3 class="title px-4" style="text-align:center">Create Customers</h3>
        
            <Link :href="route('customers.index')">
                <button class="btn btn-primary mx-2">Back</button>
                </link>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="mt-2 mx-2">
                            <CustomInput
                            label="First Name"
                            type="text"
                            class="form-control"
                            id="first_name"
                            v-model="form.first_name"
                            required
                            autofocus
                            autocomplete="first_name"
                            :errorMessage="form.errors.first_name"
                        />
                    </div>
                </div>

                <div class="col">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Last Name"
                            type="text"
                            class="form-control"
                            id="last_name"
                            v-model="form.last_name"
                            required
                            autofocus
                            autocomplete="last_name"
                            :errorMessage="form.errors.last_name"
                        />
                    </div>
                </div>
                </div>

                <div class="row justify-content-md-left">
                    <div class="col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Email"
                            type="email"
                            class="form-control"
                            id="email"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="email"
                            :errorMessage="form.errors.email"
                        />
                    </div>
                </div>
                </div>

            <div class="col-6 mt-3 mb-2 mx-2">
                <button class="btn btn-primary" @click="submit">Submit</button>
            </div>
            </div>
            </div>
        </div>
        </form>
    </div>
</template>