<script setup>
const props = defineProps({
    type: {
        type: String,
        default: "text",
        required: false,
    },
    errorMessage: {
        type: String,
        default: "",
        required: false,
    },
    class: {
        type: String,
        default: "form-control",
        required: false,
    },
    id: {
        type: String,
        default: "",
        required: false,
    },
    modelValue: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        default: "",
        required: false,
    },
    name: {
        type: String,
        default: "",
        required: false,
    },
    required: {
        type: Boolean,
        default: false,
        required: false,
    },
    autofocus: {
        type: Boolean,
        default: false,
        required: false,
    },
    options: {
      type: Array,
      required: true,
    },
    select:{
        type:Boolean,
        default:false,
        required:false,
    },
    checked:{
        type:Boolean,
        default:false,
        required:false,

    }
});



const emit = defineEmits(["update:modelValue",'change']);
</script>

<template>
    <div>
        <label class="block text-sm font-medium leading-6 text-gray-900"
            >{{ label }}</label
        >
        <div class="mt-2">
            <input
                v-bind="props"
                :value="modelValue"
                @input="(e) => emit('update:modelValue', e.target.value)"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                @change="(e) => emit('change', e)"
            />
            <div class="text-danger">{{ errorMessage }}</div>
        </div>
    </div>
    <div>
    <label v-for="option in options" :key="option.id">
      <input
        type="radio"
        :id="option.id"
        v-bind="props"
        :value="option.value"
        @input="(e) => emit('update:modelValue', e.target.value)"
        :name="type"
        v-model="selectedOption"
      />
      {{ option.label }}
    </label>
    
  </div>
</template>