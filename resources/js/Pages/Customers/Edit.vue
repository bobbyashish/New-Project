<script setup>
import CustomInput from "@/Components/CustomInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";
defineOptions({
    layout: CustomeLayout,
});
const props = defineProps({
    customer: {
        type: Object,
    },
});

const form = useForm({
    first_name: props?.customer?.first_name,
    last_name: props?.customer?.last_name,
    email: props?.customer?.email,
    phone: props?.customer?.phone,
    address1: props?.customer?.address1,
    address2: props?.customer?.address2,
    state: props?.customer?.state,
    city: props?.customer?.city,
    country: props?.customer?.country,
    pincode: props?.customer?.pincode,
    type: props?.customer?.type,

});

const submit = () => {
    form.put(route("customers.update", props?.customer?.id), {
        onSuccess: () => {},
        onError: () => {},
    });
};
</script>

<template>
   <Head title="Dashboard" />
    <form class="row" @submit.prevent="submit" novalidate>
        <Head title="Customers" />
        <div class="card my-3">
            <h1 class="title px-4 my-5" style="text-align: center">
                Customers Form
            </h1>

            <div class="container my-2">
                <div class="row">
                    <div class="col">
                        <div class="mt-2 mx-2">
                            <CustomInput
                                label="First-Name"
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
                                label="Last-Name"
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

                <div class="row">
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

                    <div class="col-6">
                        <div class="mt-2 mx-2">
                            <CustomInput
                                label=" Phone"
                                type="phone"
                                class="form-control"
                                id="phone_confirmation"
                                v-model="form.phone_confirmation"
                                required
                                autofocus
                                autocomplete="phone_confirmation"
                                :errorMessage="form.errors.phone_confirmation"
                            />
                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-left">
                    <div class="col-12">
                        <div class="mt-2 mx-2">
                            <CustomInput
                                label="Address-1"
                                type="address1"
                                class="form-control"
                                id="address1"
                                v-model="form.address1"
                                required
                                autofocus
                                autocomplete="address1"
                                :errorMessage="form.errors.address1"
                            />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-left">
                    <div class="col-12">
                        <div class="mt-2 mx-2">
                            <CustomInput
                                label="Address-2"
                                type="address2"
                                class="form-control"
                                id="address2"
                                v-model="form.address2"
                                required
                                autofocus
                                autocomplete="address2"
                                :errorMessage="form.errors.address2"
                            />
                        </div>
                    </div>
                </div>

                <div class="row justify-content-md-left">
                    <div class="col-6">
                        <div class="mt-2 mx-2">
                            <CustomInput
                                label="City"
                                type="city"
                                class="form-control"
                                id="city"
                                v-model="form.city"
                                required
                                autofocus
                                autocomplete="city"
                                :errorMessage="form.errors.city"
                            />
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mt-3 mx-2">
                            <label for="inputState">State</label>
                            <select
                                id="state"
                                class="form-control"
                                v-model="form.state"
                                required
                                autofocus
                                autocomplete="state"
                                :errorMessage="form.errors.state"
                            >
                           
                                <option value="">Select a State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>

                             </select>
                           
                        </div>
                </div>
                </div>

                <div class="row justify-content-md-left">
                    <div class="col-6">
                        <div class="mt-3 mx-2">
                            <label for="inputState">Country</label>
                            <select
                                id="country"
                                class="form-control"
                                v-model="form.country"
                                required
                                autofocus
                                autocomplete="country"
                                :errorMessage="form.errors.country"
                            >
                                <option value>Select a Country</option>
                                <option>India</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mt-2 mx-2">
                            <CustomInput
                                label="Pincode"
                                type="pincode"
                                class="form-control"
                                id="pincode"
                                v-model="form.pincode"
                                required
                                autofocus
                                autocomplete="pincode"
                                :errorMessage="form.errors.pincode"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-left">
                <div class="col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Phone"
                            type="phone"
                            class="form-control"
                            id="phone"
                            v-model="form.phone"
                            required
                            autofocus
                            autocomplete="phone"
                            :errorMessage="form.errors.phone"
                        />
                    </div>
                </div>
            </div>

            

            <div class="col-6 mt-3 mb-2 mx-2">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
</template>