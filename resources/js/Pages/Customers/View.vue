<form class="row" @submit.prevent="submit" novalidate>
    <div class="col-md-6">
        <label class="form-label">First-Name</label>
        <input
            type="first_name"
            class="form-control"
            id="first_name"
            v-model="form.first_name"
            required
            autofocus
            autocomplete="first_name"
        />
    </div>

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

    <div class="col-md-6">
        <label class="form-label">Last-Name</label>
        <input
            type="last_name"
            class="form-control"
            id="last_name"
            v-model="form.last_name"
        />
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input
            type="email"
            class="form-control"
            id="email"
            v-model="form.email"
        />
    </div>
    <div class="col-6 mt-3">
        <button type="submit" class="btn btn-primary me-5">
            Submit
        </button>
    </div>
</form>
</AuthenticatedLayout>
</template>
