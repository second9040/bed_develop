<template lang="pug">
  section#bed_good_service.section.pt-0
    .container
      h2.text-center(data-aos='fade-up') 製床所啾甘心
      .title_desc.text-center(data-aos='fade-up') 好的品質好的服務

</template>

<script>
const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "../..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};
export default {
  name: "bed_good_service",
  props: {},
  data() {
    return {
    };
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(item) {
      this.$emit("view-more", item);
    },
  },
};
</script>

<style scoped>
@import "@/assets/css/index/bed_good_service.scss";
</style>
