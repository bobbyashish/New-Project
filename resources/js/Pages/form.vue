<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import CustomeLayout from "@/Layouts/CustomeLayout.vue";

defineOptions({
    layout: CustomeLayout,
});


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
 <div class="container">
  <div class="row mx-0 justify-content-center">
    <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 px-xxl-3">
      <form
        method="POST"
        class="w-100 rounded-1 p-4 border bg-white"
        action="https://herotofu.com/start"
      >
        <label class="d-block mb-4">
          <span class="form-label d-block">Your name</span>
          <input
            name="name"
            type="text"
            class="form-control"
            placeholder="Joe Bloggs"
          />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Address line 1</span>
          <input
            name="address1"
            type="text"
            class="form-control"
            placeholder=""
          />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Address line 2</span>
          <input
            name="address2"
            type="text"
            class="form-control"
            placeholder=""
          />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">City</span>
          <input name="city" type="text" class="form-control" placeholder="" />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">State/Province</span>
          <input name="state" type="text" class="form-control" placeholder="" />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Zip/Postal code</span>
          <input name="zip" type="text" class="form-control" placeholder="" />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Country</span>
          <input
            name="country"
            type="text"
            class="form-control"
            placeholder=""
          />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Telephone</span>
          <input
            name="telephone"
            type="text"
            class="form-control"
            placeholder=""
          />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Delivery information</span>
          <textarea
            name="message"
            class="form-control"
            rows="3"
            placeholder="floor/door lock code/etc."
          ></textarea>
        </label>

        <div class="mb-3">
          <button type="submit" class="btn btn-primary px-3 rounded-3">
            Save
          </button>
        </div>

        <div class="d-block text-end">
          <div class="small">
            by
            <a
              href="https://herotofu.com"
              class="text-dark text-decoration-none"
              target="_blank"
              >HeroTofu</a
            >
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</template>
