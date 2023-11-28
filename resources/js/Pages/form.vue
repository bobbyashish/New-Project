<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    password: "",
    password_confirmation: "",
    address: "",
    state: "",
    city: "",
    department: "",
    designation: "",
    contact: "",
});

const submit = () => {
    form.post(route("form"), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            form.reset("password", "password_confirmation");
        },
        OnError: () => {
            alert("nos");
        },
        onFinish: () => {},
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Form" />
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
                <input type="last_name" class="form-control" id="last_name" />
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" />
            </div>
            <div class="col-md-6">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" />
            </div>
            <div class="col-12">
                <label class="form-label">Address</label>
                <input
                    type="text"
                    class="form-control"
                    id="address"
                    placeholder="1234 Main St"
                />
            </div>
            <div class="col-md-6">
                <label class="form-label">City</label>
                <input type="text" class="form-control" id="city" />
            </div>
            <div class="col-md-6">
                <label class="form-label">State</label>
                <select id="state" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" id="department" />
            </div>
            <div class="col-md-6">
                <label class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" />
            </div>
            <div class="col-md-6">
                <label for="inputZip" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" />
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="gridCheck"
                    />
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-6 mt-3">
                <button type="submit" class="btn btn-primary me-5">
                    Sign in
                </button>
            </div>
        </form>

        <div class="flex items-center justify-end mt-4">
            <Link
                :href="route('login')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Already registered?
            </Link>

            <PrimaryButton
                class="ms-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Register
            </PrimaryButton>
        </div>
    </GuestLayout>
</template>
