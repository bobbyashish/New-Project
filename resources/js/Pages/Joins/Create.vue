<script setup>
import InputError from "@/Components/InputError.vue";
import CustomInput from "@/Components/CustomInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";
defineOptions({
    layout: CustomeLayout,
});
defineProps({
    customer: Array
});

const form = useForm({
    product_name: "",
    amount: "",
    customer_id: null,
});

const submit = () => {
    form.post(route("orders.store"), {
        onSuccess: () => {},
        onError: () => {},
    });
};
</script>

<template>
    <Head title="Dashboard" />
    <form class="row" @submit.prevent="submit" novalidate>
        <Head title="Orders" />
        <div class="card my-3">
            <h1 class="title px-4 my-5" style="text-align: center">
                Order Form
            </h1>

            <div class="container my-2">
                <div class="row">
                    <div class="col">
                        <div class="mt-2 mx-2">
                            <CustomInput
                                label="Product-Name"
                                type="text"
                                class="form-control"
                                id="product_name"
                                v-model="form.product_name"
                                required
                                autofocus
                                autocomplete="product_name"
                                :errorMessage="form.errors.product_name"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mt-2 mx-2">
                                <CustomInput
                                    label="Amount"
                                    type="text"
                                    class="form-control"
                                    id="amount"
                                    v-model="form.amount"
                                    required
                                    autofocus
                                    autocomplete="amount"
                                    :errorMessage="form.errors.amount"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mt-3 mx-2">
                            <label for="inputState">Customer</label>
                            <select
                                id="customer_id"
                                class="form-control"
                                v-model="form.customer_id"
                                required
                                autocomplete="customer_id"
                                :errorMessage="form.errors.customer_id"
                            >
                                <option value="">Select a customer</option>
                                <option
                                    :value="customer.id"
                                    :key="customer"
                                    v-for="customer in customer"
                                >
                                    {{ customer.first_name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 mt-3 mb-2 mx-2">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</template>
