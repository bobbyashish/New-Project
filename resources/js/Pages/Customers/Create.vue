<script setup>
import InputError from "@/Components/InputError.vue";
import CustomInput from "@/Components/CustomInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";
defineOptions({
    layout: CustomeLayout,
});
defineProps({});

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    phone: "",
    address1: "",
    address2: "",
    city: "",
    state: "",
    country: "",
    type: "",
    pincode: "",
    terms_accepted: true,
});

const submit = () => {
    if (terms_accepted == 1) {
        form.post(route("customers.store"), {
            onSuccess: () => {},
            onError: () => {},
        });
       
    } else {
        errorMessage = form.errors.terms_accepted;
    }
    
};
</script>

<template>
    <Head title="Dashboard" />
    <form class="row" @submit.prevent="submit" novalidate>
        <Head title="Employees" />
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
                                id="phone"
                                v-model="form.phone"
                                required
                                autocomplete="phone"
                                :errorMessage="form.errors.phone"
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
                                autocomplete="address2"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.address2"
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
                                autocomplete="state"
                                :errorMessage="form.errors.state"
                            >
                                <option value="">Select a State</option>
                                <option value="Andhra Pradesh">
                                    Andhra Pradesh
                                </option>
                                <option value="Arunachal Pradesh">
                                    Arunachal Pradesh
                                </option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">
                                    Chhattisgarh
                                </option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">
                                    Himachal Pradesh
                                </option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">
                                    Madhya Pradesh
                                </option>
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
                                <option value="Uttar Pradesh">
                                    Uttar Pradesh
                                </option>
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
                                autocomplete="pincode"
                                :errorMessage="form.errors.pincode"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row justify-content-md-left">
                <div class="col-12">
                    <div class="mt-4 mx-2">
                        <span class="form-control">
                            <CustomInput
                                type="radio"
                                id="privateType"
                                name="type"
                                class="form-control-input"
                                label="Private"
                                value="type"
                                v-model="form.type"
                                :errorMessage="form.errors.type"
                                required
                            />
                            <CustomInput
                                type="radio"
                                id="type"
                                name="type"
                                class="custom-control-input"
                                label="Regular"
                                value="type"
                                v-model="form.type"
                                :errorMessage="form.errors.type"
                            />
                        </span>
                    </div>
                </div> -->
            

            <div class="form-check col-6">
                <div class="mt-5 mx-2">
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="type"
                            id="type"
                            v-model="form.type"
                            value="Regular"
                            :errorMessage="form.errors.type"
                        />
                        <label class="form-check-label" for="type"
                            >Regular</label
                        >
                    </div> 
                  <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="type"
                            id="type"
                            v-model="form.type"
                            value="Private"
                            :errorMessage="form.errors.type"
                        />
                        <label class="form-check-label" for="type"
                            >Private</label
                        >
                    </div>
                </div>
      
       </div>
    
       </div>
        <div class="form-check col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            class="custom-control-input"
                            autofocus
                            type="checkbox"
                            value="terms_accepted"
                            id="terms_accepted"
                            name="terms_accepted"
                            label=""
                            v-model="form.terms_accepted"
                            :errorMessage="form.errors.terms_accepted"
                            :checked="form.terms_accepted"
                            @change="e => {
                                console.log(e)
                                form.terms_accepted = e.target.checked
                            }"
                        />
                        {{ form.terms_accepted }}
                        Accept the terms and conditions and privacy policy.
                    </div>
                </div>
        <!-- <div class="form-check mx-3 mt-2">
            <input
                class="form-check-input"
                type="checkbox"
                v-model="form.checkbox"
                id="checkbox"
                :errorMessage="form.errors.checkbox"
            />
            <label class="form-check-label" for="checkbox">
                I accept the terms & conditions and privacy policy
            </label>
        </div> -->

        <div class="col-6 mt-3 mb-2 mx-2">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</template>
