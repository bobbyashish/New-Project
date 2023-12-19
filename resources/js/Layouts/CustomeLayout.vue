
<script setup>
import { Head, Link, router } from "@inertiajs/vue3";





</script>

<template>

<body>
<div class="container">
    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li class="nav-item active">
                    <Link
                        :href="route('products.index')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Products
                    </Link>
                </li>
           
                <li class="nav-item active">
                    <Link
                        :href="route('form')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Form                    </Link>
                </li>
                <li class="nav-item active">
                    <Link
                        :href="route('employees.create')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >New Employee                    </Link>
                </li>
                <li class="nav-item active">
                    <Link
                        :href="route('customers.index')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Customers                  </Link>
                </li>
                <li class="nav-item active">
                    <Link
                        :href="route('orders.index')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Orders                  </Link>
                </li>
               
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>

        <slot />

    </div>
</div>
</body>
</template>