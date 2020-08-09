<template>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li
                            v-for="tab in tabs"
                            v-bind:key="tab"
                            v-bind:class="['nav-item', { active: currentTab === tab }]"
                            v-on:click="currentTab = tab"
                        >
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                {{ tab }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <component v-bind:is="currentTabComponent" :user-id="userId"></component>
                <!--<router-view></router-view>&ndash;&gt;
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Share</button>
                            <button class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <h2>Section title</h2>
                <div class="table-responsive">
                </div>-->
            </main>
        </div>
    </div>
</template>

<script>

    export default {
        props: [
            'userId'
        ],
        mounted() {
            console.log('mounted Home');
        },
        data() {
            return {
                currentTab: "home",
                tabs: ["home", "posts", "tasks"]
            }
        },
        computed: {
            currentTabComponent: function() {
                return "tab-" + this.currentTab.toLowerCase();
            }
        }
    }
</script>

<style>
    body {
        font-size: .875rem;
    }

    /*
     * Sidebar
     */

    .sidebar {
        position: static;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 48px; /* Height of navbar */
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        color: inherit;
    }

    /*
     * Navbar
     */

    /*
     * Utilities
     */
</style>
