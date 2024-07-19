<script setup>
import { RouterLink, RouterView } from "vue-router";
import indexHeader from "@/components/index/indexHeader.vue";
import indexFooter from "@/components/index/indexFooter.vue";
import cartAside from "@/components/cartAside.vue";

</script>

<template>
  <div>
    <div style="min-height: calc(100vh - 320px)">
      <div class="page-header">
        <index-header />
      </div>
      <RouterView />
    </div>
    <index-footer />
    <a
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      href="#"
    >
      <i class="bi bi-chevron-up"></i>
    </a>
    <cart-aside />
  </div>
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
