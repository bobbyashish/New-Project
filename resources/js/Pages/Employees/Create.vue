<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";
import CustomInput from "@/Components/CustomInput.vue";
defineOptions({
    layout: CustomeLayout,
});
defineProps({

});
const form = useForm({
    name: "",
    email: "",
    password: "",
    designation: "",
    department: "",
    address: "",
    state: "",
    city: "",
    contact: "",
  
    
});

const submit = () => {
    form.post(route("employees.store"), {
        onSuccess: () => {

},
onError: () => {

}
    });
};
</script>
<template>
    <Head title="Register" />

  
        

    <form class="row " @submit.prevent="submit" novalidate>
        
            <Head title="Employees" />
            <div class="card my-3">
              <h1 class="title px-4 my-5" style="text-align:center">Employee Form</h1>

              <div class="container my-2">
                    <div class="row">
                        <div class="col">
                            <div class="mt-2 mx-2">
                            <CustomInput
                            label="Name"
                            type="text"
                            class="form-control"
                            id="name"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                            :errorMessage="form.errors.name"
                        />
                    </div>
                </div>

                <div class="col">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Email"
                            type="text"
                            class="form-control"
                            id="emaili"
                            v-model="form.emaili"
                            required
                            autofocus
                            autocomplete="emaili"
                            :errorMessage="form.errors.emaili"
                        />
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Password"
                            type="password"
                            class="form-control"
                            id="password"
                            v-model="form.password"
                            required
                            autofocus
                            autocomplete="password"
                            :errorMessage="form.errors.password"
                        />
                  </div>
                </div>
              
            
                    <div class="col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Confirm Password"
                            type="password"
                            class="form-control"
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            required
                            autofocus
                            autocomplete="password_confirmation"
                            :errorMessage="form.errors.password_confirmation"
                        />
                    </div>
                </div>
                </div>
           
                <div class="row justify-content-md-left">
                    <div class="col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Designation"
                            type="designation"
                            class="form-control"
                            id="designation"
                            v-model="form.designation"
                            required
                            autofocus
                            autocomplete="designation"
                            :errorMessage="form.errors.designation"
                        />
                    </div>
                </div>
           
               
                    <div class="col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Department"
                            type="department"
                            class="form-control"
                            id="department"
                            v-model="form.department"
                            required
                            autofocus
                            autocomplete="department"
                            :errorMessage="form.errors.department"
                        />
                    </div>
                </div>
                </div>
                
                <div class="row justify-content-md-left">
                    <div class="col-12">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Address"
                            type="address"
                            class="form-control"
                            id="address"
                            v-model="form.address"
                            required
                            autofocus
                            autocomplete="address"
                            :errorMessage="form.errors.address"
                        />
                    </div>
                </div>
                </div>
                <div class="row justify-content-md-left">
                    <div class="col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="State"
                            type="state"
                            class="form-control"
                            id="state"
                            v-model="form.state"
                            required
                            autofocus
                            autocomplete="state"
                            :errorMessage="form.errors.state"
                        />
                    </div>
                </div>
            
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
                </div>
                <div class="row justify-content-md-left">
                    <div class="col-6">
                    <div class="mt-2 mx-2">
                        <CustomInput
                            label="Contact"
                            type="contact"
                            class="form-control"
                            id="contact"
                            v-model="form.contact"
                            required
                            autofocus
                            autocomplete="contact"
                            :errorMessage="form.errors.contact"
                        />
                    </div>
                </div>
                </div>

                <div class="col-6 mt-3 mb-2 mx-2">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
              </div>
              </div>
        
        </form>

</template>
