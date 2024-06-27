<template lang="pug">
	footer#footer.footer.position-relative
		.container
			.footer-top.d-flex
				.store_info_div.d-flex
					.store_info
						h3.mb-2 製床所 - 忠明旗艦店
						p
							span 地址：台中市北區忠明路234號
							a(href="https://maps.app.goo.gl/SdT2S3j7pAErf8UB7" target="_blank")
								img.map_icon(src="../../assets/images/map_icon_white.png" alt="Map Icon" )
						p
							span 電子信箱：
							a(href="mailto: jerry113520@gmail.com" target="_blank") jerry113520@gmail.com
						p
							span 聯絡電話：
							a(href="tel: +886-4-23201861" target="_blank") 04-23201861
					.store_info
						h3.mb-2 製床所 - 東山分店
						p
							span 地址：台中市北屯區東山路一段35-2號
							a(href="https://maps.app.goo.gl/eMc5oGj1j8YXHZTs6" target="_blank")
								img.map_icon(src="../../assets/images/map_icon_white.png" alt="Map Icon" )
						p
							span 電子信箱：
							a(href="mailto: jerry113520@gmail.com" target="_blank") jerry113520@gmail.com
						
						p
							span 聯絡電話：
							a(href="tel: +886-4-22431666" target="_blank") 04-22431666
				.contact_way_div
					.top_div.d-flex.align-items-center
						h3 追蹤我們
						.d-flex.contact_way_icon
							a(href="https://www.facebook.com/wonderfulMattres" target="_blank")
								.icon.fb
							a(href="https://instagram.com/wonderfulmattress?igshid=YWJhMjlhZTc=" target="_blank")
								.icon.ig
							a(href="https://line.me/ti/p/~@121povpz" target="_blank")
								.icon.line
					.bottom_div.d-flex.align-items-center.shopee_and_momo_icon
							a(href="https://line.me/ti/p/~@121povpz" target="_blank")
								.icon.shopee
							a(href="https://line.me/ti/p/~@121povpz" target="_blank")
								.icon.momo
			.divider
			.copyright ©2024 Copyright 御品製床所 All Rights Reserved
		a.w-100.btn-chatbed.mobile(
			href="https://line.me/ti/p/~@121povpz"
			target="_blank"
		)
			img.line_icon(src="../../assets/images/line_icon.png")
			span 聊聊床墊


</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/swiper-bundle.css'

// Import Swiper styles
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

// import required modules
import { Autoplay, Navigation, Pagination } from 'swiper/modules'

const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace('@', '../..')
    return new URL(handlePath, import.meta.url).href
  } catch (err) {
    console.warn(err)
  }
}

export default {
  name: 'indexFooter',
  components: {
    Swiper,
    SwiperSlide,
  },
  props: {
    modules: {
      type: Array,
    },
    screenWidth: {
      type: Number,
    },
  },
  data() {
    return {
      cart_items_count: 0,
    }
  },
  mounted() {
    this.checkSwiperLoaded()
  },
  methods: {
    checkSwiperLoaded() {
      this.$emit('check-swiper-loaded')
    },
    number_style() {
      let count = this.cart_items_count
      if (count > 9 && count <= 99) return 'last_than_99'
      if (count > 99 && count <= 999) return 'last_than_999'
      if (count > 999) return 'last_than_9999'
    },
  },
}
</script>

<style scoped>
@import '@/assets/scss/index_footer.scss';
</style>
