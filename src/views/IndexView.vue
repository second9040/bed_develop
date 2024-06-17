<script setup>
defineProps({});
</script>

<template lang="pug">
  .index-page
    header.header.d-flex.align-items-center.fixed-top#header
      .container.container-fluid.position-relative.d-flex.align-items-center.justify-content-between
        a.logo.d-flex.align-items-center.me-auto.me-xl-0(href="index.html")
          //- Uncomment the line below if you also wish to use an image logo
          // img(src="../assets/images/logo.png" alt="")
          h1.sitename 製床所御品

        nav#navmenu.navmenu
          ul
            li
              a.active(href="index.html#hero")
            li
              a(href="index.html#about") 床墊
            li
              a(href="index.html#services") 床架/床頭櫃
            li
              a(href="index.html#portfolio") 其他配件
            li
              a(href="index.html#pricing") 關於我們
            li
              a(href="index.html#team") 限時優惠
            li
              a(href="blog.html") 床墊知識
              //- Uncomment the dropdown menu if needed
              // li.dropdown
              //   a(href="#")
              //     span Dropdown
              //     i.bi.bi-chevron-down.toggle-dropdown
              //   ul
              //     li
              //       a(href="#") Dropdown 1
              //     li.dropdown
              //       a(href="#")
              //         span Deep Dropdown
              //         i.bi.bi-chevron-down.toggle-dropdown
              //       ul
              //         li
              //           a(href="#") Deep Dropdown 1
              //         li
              //           a(href="#") Deep Dropdown 2
              //         li
              //           a(href="#") Deep Dropdown 3
              //         li
              //           a(href="#") Deep Dropdown 4
              //         li
              //           a(href="#") Deep Dropdown 5
              //     li
              //       a(href="#") Dropdown 2
              //     li
              //       a(href="#") Dropdown 3
              //     li
              //       a(href="#") Dropdown 4
            li
              a(href="index.html#contact") 好評分享
            li
              a(href="index.html#contact") 體驗據點
          i.mobile-nav-toggle.d-xl-none.bi.bi-list

        .d-flex.align-items-center
          .cart_div
            img.cart_icon(src="../assets/images/cart_icon.png")
            .cart_items_count(
              :class="number_style()"
            ) {{ cart_items_count }}

          a.btn-chatbed(href="index.html#about")
            span 聊聊床墊

    main.main
      // Hero Section
      section#hero.hero.section
        img(src='../assets/images/hero-bg.jpg' alt='' data-aos='fade-in')
        .container
          .row
            .col-lg-10
              h2(data-aos='fade-up' data-aos-delay='100') Welcome to Our Website
              p(data-aos='fade-up' data-aos-delay='200')
                | We are team of talented designers making websites with Bootstrap
            .col-lg-5
              form.sign-up-form.d-flex(action='#' data-aos='fade-up' data-aos-delay='300')
                input.form-control(type='text' placeholder='Enter email address')
                input.btn.btn-primary(type='submit' value='Sign up')
      // /Hero Section
      // Clients Section
      section#clients.clients.section
        .container(data-aos='fade-up')
          .row.gy-4
            .col-xl-2.col-md-3.col-6.client-logo
              img.img-fluid(src='../assets/images/clients/client-1.png' alt='')
            // End Client Item
            .col-xl-2.col-md-3.col-6.client-logo
              img.img-fluid(src='../assets/images/clients/client-2.png' alt='')
            // End Client Item
            .col-xl-2.col-md-3.col-6.client-logo
              img.img-fluid(src='../assets/images/clients/client-3.png' alt='')
            // End Client Item
            .col-xl-2.col-md-3.col-6.client-logo
              img.img-fluid(src='../assets/images/clients/client-4.png' alt='')
            // End Client Item
            .col-xl-2.col-md-3.col-6.client-logo
              img.img-fluid(src='../assets/images/clients/client-5.png' alt='')
            // End Client Item
            .col-xl-2.col-md-3.col-6.client-logo
              img.img-fluid(src='../assets/images/clients/client-6.png' alt='')
            // End Client Item
      // /Clients Section
      // About Section
      section#about.about.section
        .container(data-aos='fade-up' data-aos-delay='100')
          .row.align-items-xl-center.gy-5
            .col-xl-5.content
              h3 About Us
              h2 Ducimus rerum libero reprehenderit cumque
              p
                | Ipsa sint sit. Quis ducimus tempore dolores impedit et dolor cumque alias
                | maxime. Enim reiciendis minus et rerum hic non. Dicta quas cum quia
                | maiores iure. Quidem nulla qui assumenda incidunt voluptatem tempora
                | deleniti soluta.
              a.read-more(href='#')
                span Read More
                i.bi.bi-arrow-right
            .col-xl-7
              .row.gy-4.icon-boxes
                .col-md-6(data-aos='fade-up' data-aos-delay='200')
                  .icon-box
                    i.bi.bi-buildings
                    h3 Eius provident
                    p
                      | Magni repellendus vel ullam hic officia accusantium ipsa dolor omnis
                      | dolor voluptatem
                // End Icon Box
                .col-md-6(data-aos='fade-up' data-aos-delay='300')
                  .icon-box
                    i.bi.bi-clipboard-pulse
                    h3 Rerum aperiam
                    p
                      | Autem saepe animi et aut aspernatur culpa facere. Rerum saepe rerum
                      | voluptates quia
                // End Icon Box
                .col-md-6(data-aos='fade-up' data-aos-delay='400')
                  .icon-box
                    i.bi.bi-command
                    h3 Veniam omnis
                    p
                      | Omnis perferendis molestias culpa sed. Recusandae quas possimus.
                      | Quod consequatur corrupti
                // End Icon Box
                .col-md-6(data-aos='fade-up' data-aos-delay='500')
                  .icon-box
                    i.bi.bi-graph-up-arrow
                    h3 Delares sapiente
                    p
                      | Sint et dolor voluptas minus possimus nostrum. Reiciendis commodi
                      | eligendi omnis quideme lorenda
                // End Icon Box
      // /About Section
      // Stats Section
      section#stats.stats.section
        img(src='../assets/images/stats-bg.jpg' alt='' data-aos='fade-in')
        .container.position-relative(data-aos='fade-up' data-aos-delay='100')
          .row.gy-4
            .col-lg-3.col-md-6
              .stats-item.text-center.w-100.h-100
                span.purecounter(data-purecounter-start='0' data-purecounter-end='232' data-purecounter-duration='1')
                p Clients
            // End Stats Item
            .col-lg-3.col-md-6
              .stats-item.text-center.w-100.h-100
                span.purecounter(data-purecounter-start='0' data-purecounter-end='521' data-purecounter-duration='1')
                p Projects
            // End Stats Item
            .col-lg-3.col-md-6
              .stats-item.text-center.w-100.h-100
                span.purecounter(data-purecounter-start='0' data-purecounter-end='1453' data-purecounter-duration='1')
                p Hours Of Support
            // End Stats Item
            .col-lg-3.col-md-6
              .stats-item.text-center.w-100.h-100
                span.purecounter(data-purecounter-start='0' data-purecounter-end='32' data-purecounter-duration='1')
                p Workers
            // End Stats Item
      // /Stats Section
      // Services Section
      section#services.services.section
        // Section Title
        .container.section-title(data-aos='fade-up')
          h2 Services
          p
            | Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
            | velit
        // End Section Title
        .container
          .row.gy-4
            .col-lg-6(data-aos='fade-up' data-aos-delay='100')
              .service-item.d-flex
                .icon.flex-shrink-0
                  i.bi.bi-briefcase
                div
                  h4.title
                    a.stretched-link(href='services-details.html') Lorem Ipsum
                  p.description
                    | Voluptatum deleniti atque corrupti quos dolores et quas molestias
                    | excepturi sint occaecati cupiditate non provident
            // End Service Item
            .col-lg-6(data-aos='fade-up' data-aos-delay='200')
              .service-item.d-flex
                .icon.flex-shrink-0
                  i.bi.bi-card-checklist
                div
                  h4.title
                    a.stretched-link(href='services-details.html') Dolor Sitema
                  p.description
                    | Minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    | aliquip ex ea commodo consequat tarad limino ata
            // End Service Item
            .col-lg-6(data-aos='fade-up' data-aos-delay='300')
              .service-item.d-flex
                .icon.flex-shrink-0
                  i.bi.bi-bar-chart
                div
                  h4.title
                    a.stretched-link(href='services-details.html') Sed ut perspiciatis
                  p.description
                    | Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    | dolore eu fugiat nulla pariatur
            // End Service Item
            .col-lg-6(data-aos='fade-up' data-aos-delay='400')
              .service-item.d-flex
                .icon.flex-shrink-0
                  i.bi.bi-binoculars
                div
                  h4.title
                    a.stretched-link(href='services-details.html') Magni Dolores
                  p.description
                    | Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                    | officia deserunt mollit anim id est laborum
            // End Service Item
            .col-lg-6(data-aos='fade-up' data-aos-delay='500')
              .service-item.d-flex
                .icon.flex-shrink-0
                  i.bi.bi-brightness-high
                div
                  h4.title
                    a.stretched-link(href='services-details.html') Nemo Enim
                  p.description
                    | At vero eos et accusamus et iusto odio dignissimos ducimus qui
                    | blanditiis praesentium voluptatum deleniti atque
            // End Service Item
            .col-lg-6(data-aos='fade-up' data-aos-delay='600')
              .service-item.d-flex
                .icon.flex-shrink-0
                  i.bi.bi-calendar4-week
                div
                  h4.title
                    a.stretched-link(href='services-details.html') Eiusmod Tempor
                  p.description
                    | Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                    | tempore, cum soluta nobis est eligendi
            // End Service Item
      // /Services Section
      // Features Section
      section#features.features.section
        // Section Title
        .container.section-title(data-aos='fade-up')
          h2 Features
          p
            | Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
            | velit
        // End Section Title
        .container
          .row.gy-4.align-items-center.features-item
            .col-lg-5.order-2.order-lg-1(data-aos='fade-up' data-aos-delay='200')
              h3 Corporis temporibus maiores provident
              p
                | Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                | dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                | nulla pariatur. Excepteur sint occaecat cupidatat non proident.
              a.btn.btn-get-started(href='#') Get Started
            .col-lg-7.order-1.order-lg-2.d-flex.align-items-center(data-aos='zoom-out' data-aos-delay='100')
              .image-stack
                img.stack-front(src='../assets/images/features-light-1.jpg' alt='')
                img.stack-back(src='../assets/images/features-light-2.jpg' alt='')
          // Features Item
          .row.gy-4.align-items-stretch.justify-content-between.features-item
            .col-lg-6.d-flex.align-items-center.features-img-bg(data-aos='zoom-out')
              img.img-fluid(src='../assets/images/features-light-3.jpg' alt='')
            .col-lg-5.d-flex.justify-content-center.flex-column(data-aos='fade-up')
              h3 Sunt consequatur ad ut est nulla
              p
                | Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia
                | minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor
                | doloremque.
              ul
                li
                  i.bi.bi-check
                  span Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                li
                  i.bi.bi-check
                  span
                    | Duis aute irure dolor in reprehenderit in voluptate velit.
                li
                  i.bi.bi-check
                  span Facilis ut et voluptatem aperiam. Autem soluta ad fugiat
                  | .
              a.btn.btn-get-started.align-self-start(href='#') Get Started
          // Features Item
      // /Features Section
      // Portfolio Section
      section#portfolio.portfolio.section
        // Section Title
        .container.section-title(data-aos='fade-up')
          h2 Portfolio
          p
            | Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
            | velit
        // End Section Title
        .container
          .isotope-layout(data-default-filter='*' data-layout='masonry' data-sort='original-order')
            ul.portfolio-filters.isotope-filters(data-aos='fade-up' data-aos-delay='100')
              li.filter-active(data-filter='*') All
              li(data-filter='.filter-app') App
              li(data-filter='.filter-product') Card
              li(data-filter='.filter-branding') Web
            // End Portfolio Filters
            .row.gy-4.isotope-container(data-aos='fade-up' data-aos-delay='200')
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-app
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-1.jpg' alt='')
                .portfolio-info
                  h4 App 1
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-1.jpg' title='App 1' data-gallery='portfolio-gallery-app')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-product
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-2.jpg' alt='')
                .portfolio-info
                  h4 Product 1
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-2.jpg' title='Product 1' data-gallery='portfolio-gallery-product')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-branding
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-3.jpg' alt='')
                .portfolio-info
                  h4 Branding 1
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-3.jpg' title='Branding 1' data-gallery='portfolio-gallery-branding')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-app
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-4.jpg' alt='')
                .portfolio-info
                  h4 App 2
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-4.jpg' title='App 2' data-gallery='portfolio-gallery-app')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-product
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-5.jpg' alt='')
                .portfolio-info
                  h4 Product 2
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-5.jpg' title='Product 2' data-gallery='portfolio-gallery-product')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-branding
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-6.jpg' alt='')
                .portfolio-info
                  h4 Branding 2
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-6.jpg' title='Branding 2' data-gallery='portfolio-gallery-branding')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-app
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-7.jpg' alt='')
                .portfolio-info
                  h4 App 3
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-7.jpg' title='App 3' data-gallery='portfolio-gallery-app')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-product
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-8.jpg' alt='')
                .portfolio-info
                  h4 Product 3
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-8.jpg' title='Product 3' data-gallery='portfolio-gallery-product')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
              .col-lg-4.col-md-6.portfolio-item.isotope-item.filter-branding
                img.img-fluid(src='../assets/images/masonry-portfolio/masonry-portfolio-9.jpg' alt='')
                .portfolio-info
                  h4 Branding 3
                  p Lorem ipsum, dolor sit
                  a.glightbox.preview-link(href='../assets/images/masonry-portfolio/masonry-portfolio-9.jpg' title='Branding 2' data-gallery='portfolio-gallery-branding')
                    i.bi.bi-zoom-in
                  a.details-link(href='portfolio-details.html' title='More Details')
                    i.bi.bi-link-45deg
              // End Portfolio Item
            // End Portfolio Container
      // /Portfolio Section
      // Pricing Section
      section#pricing.pricing.section
        // Section Title
        .container.section-title(data-aos='fade-up')
          h2 Pricing
          p
            | Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
            | velit
        // End Section Title
        .container(data-aos='zoom-in' data-aos-delay='100')
          .row.g-4
            .col-lg-4
              .pricing-item
                h3 Free Plan
                .icon
                  i.bi.bi-box
                h4
                  sup $
                  | 0
                  span  / month
                ul
                  li
                    i.bi.bi-check
                    span Quam adipiscing vitae proin
                  li
                    i.bi.bi-check
                    span Nec feugiat nisl pretium
                  li
                    i.bi.bi-check
                    span Nulla at volutpat diam uteera
                  li.na
                    i.bi.bi-x
                    span Pharetra massa massa ultricies
                  li.na
                    i.bi.bi-x
                    span Massa ultricies mi quis hendrerit
                .text-center
                  a.buy-btn(href='#') Buy Now
            // End Pricing Item
            .col-lg-4
              .pricing-item.featured
                h3 Business Plan
                .icon
                  i.bi.bi-rocket
                h4
                  sup $
                  | 29
                  span  / month
                ul
                  li
                    i.bi.bi-check
                    span Quam adipiscing vitae proin
                  li
                    i.bi.bi-check
                    span Nec feugiat nisl pretium
                  li
                    i.bi.bi-check
                    span Nulla at volutpat diam uteera
                  li
                    i.bi.bi-check
                    span Pharetra massa massa ultricies
                  li
                    i.bi.bi-check
                    span Massa ultricies mi quis hendrerit
                .text-center
                  a.buy-btn(href='#') Buy Now
            // End Pricing Item
            .col-lg-4
              .pricing-item
                h3 Developer Plan
                .icon
                  i.bi.bi-send
                h4
                  sup $
                  | 49
                  span  / month
                ul
                  li
                    i.bi.bi-check
                    span Quam adipiscing vitae proin
                  li
                    i.bi.bi-check
                    span Nec feugiat nisl pretium
                  li
                    i.bi.bi-check
                    span Nulla at volutpat diam uteera
                  li
                    i.bi.bi-check
                    span Pharetra massa massa ultricies
                  li
                    i.bi.bi-check
                    span Massa ultricies mi quis hendrerit
                .text-center
                  a.buy-btn(href='#') Buy Now
            // End Pricing Item
      // /Pricing Section
      // Faq Section
      section#faq.faq.section
        .container
          .row.gy-4
            .col-lg-4(data-aos='fade-up' data-aos-delay='100')
              .content.px-xl-5
                h3
                  span Frequently Asked 
                  strong Questions
                p
                  | Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  | tempor incididunt ut labore et dolore magna aliqua. Duis aute irure
                  | dolor in reprehenderit
            .col-lg-8(data-aos='fade-up' data-aos-delay='200')
              .faq-container
                .faq-item.faq-active
                  h3
                    span.num 1.
                    span Non consectetur a erat nam at lectus urna duis?
                  .faq-content
                    p
                      | Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id
                      | volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna
                      | fringilla urna porttitor rhoncus dolor purus non.
                  i.faq-toggle.bi.bi-chevron-right
                // End Faq item
                .faq-item
                  h3
                    span.num 2.
                    span
                      | Feugiat scelerisque varius morbi enim nunc faucibus a
                      | pellentesque?
                  .faq-content
                    p
                      | Dolor sit amet consectetur adipiscing elit pellentesque habitant
                      | morbi. Id interdum velit laoreet id donec ultrices. Fringilla
                      | phasellus faucibus scelerisque eleifend donec pretium. Est
                      | pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                      | cursus turpis massa tincidunt dui.
                  i.faq-toggle.bi.bi-chevron-right
                // End Faq item
                .faq-item
                  h3
                    span.num 3.
                    span Dolor sit amet consectetur adipiscing elit pellentesque?
                  .faq-content
                    p
                      | Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis
                      | orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra
                      | diam sit amet nisl suscipit. Rutrum tellus pellentesque eu
                      | tincidunt. Lectus urna duis convallis convallis tellus. Urna
                      | molestie at elementum eu facilisis sed odio morbi quis
                  i.faq-toggle.bi.bi-chevron-right
                // End Faq item
                .faq-item
                  h3
                    span.num 4.
                    span Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                  .faq-content
                    p
                      | Dolor sit amet consectetur adipiscing elit pellentesque habitant
                      | morbi. Id interdum velit laoreet id donec ultrices. Fringilla
                      | phasellus faucibus scelerisque eleifend donec pretium. Est
                      | pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                      | cursus turpis massa tincidunt dui.
                  i.faq-toggle.bi.bi-chevron-right
                // End Faq item
                .faq-item
                  h3
                    span.num 5.
                    span
                      | Tempus quam pellentesque nec nam aliquam sem et tortor
                      | consequat?
                  .faq-content
                    p
                      | Molestie a iaculis at erat pellentesque adipiscing commodo.
                      | Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra
                      | maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est.
                      | Purus gravida quis blandit turpis cursus in
                  i.faq-toggle.bi.bi-chevron-right
                // End Faq item
      // /Faq Section
      // Team Section
      section#team.team.section
        // Section Title
        .container.section-title(data-aos='fade-up')
          h2 Team
          p
            | Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
            | velit
        // End Section Title
        .container
          .row.gy-5
            .col-lg-4.col-md-6.member(data-aos='fade-up' data-aos-delay='100')
              .member-img
                img.img-fluid(src='../assets/images/team/team-1.jpg' alt='')
                .social
                  a(href='#')
                    i.bi.bi-twitter-x
                  a(href='#')
                    i.bi.bi-facebook
                  a(href='#')
                    i.bi.bi-instagram
                  a(href='#')
                    i.bi.bi-linkedin
              .member-info.text-center
                h4 Walter White
                span Chief Executive Officer
                p
                  | Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel
                  | dolorum distinctio dire flow
            // End Team Member
            .col-lg-4.col-md-6.member(data-aos='fade-up' data-aos-delay='200')
              .member-img
                img.img-fluid(src='../assets/images/team/team-2.jpg' alt='')
                .social
                  a(href='#')
                    i.bi.bi-twitter-x
                  a(href='#')
                    i.bi.bi-facebook
                  a(href='#')
                    i.bi.bi-instagram
                  a(href='#')
                    i.bi.bi-linkedin
              .member-info.text-center
                h4 Sarah Jhonson
                span Product Manager
                p
                  | Labore ipsam sit consequatur exercitationem rerum laboriosam laudantium
                  | aut quod dolores exercitationem ut
            // End Team Member
            .col-lg-4.col-md-6.member(data-aos='fade-up' data-aos-delay='300')
              .member-img
                img.img-fluid(src='../assets/images/team/team-3.jpg' alt='')
                .social
                  a(href='#')
                    i.bi.bi-twitter-x
                  a(href='#')
                    i.bi.bi-facebook
                  a(href='#')
                    i.bi.bi-instagram
                  a(href='#')
                    i.bi.bi-linkedin
              .member-info.text-center
                h4 William Anderson
                span CTO
                p
                  | Illum minima ea autem doloremque ipsum quidem quas aspernatur modi ut
                  | praesentium vel tque sed facilis at qui
            // End Team Member
            .col-lg-4.col-md-6.member(data-aos='fade-up' data-aos-delay='400')
              .member-img
                img.img-fluid(src='../assets/images/team/team-4.jpg' alt='')
                .social
                  a(href='#')
                    i.bi.bi-twitter-x
                  a(href='#')
                    i.bi.bi-facebook
                  a(href='#')
                    i.bi.bi-instagram
                  a(href='#')
                    i.bi.bi-linkedin
              .member-info.text-center
                h4 Amanda Jepson
                span Accountant
                p
                  | Magni voluptatem accusamus assumenda cum nisi aut qui dolorem voluptate
                  | sed et veniam quasi quam consectetur
            // End Team Member
            .col-lg-4.col-md-6.member(data-aos='fade-up' data-aos-delay='500')
              .member-img
                img.img-fluid(src='../assets/images/team/team-5.jpg' alt='')
                .social
                  a(href='#')
                    i.bi.bi-twitter-x
                  a(href='#')
                    i.bi.bi-facebook
                  a(href='#')
                    i.bi.bi-instagram
                  a(href='#')
                    i.bi.bi-linkedin
              .member-info.text-center
                h4 Brian Doe
                span Marketing
                p
                  | Qui consequuntur quos accusamus magnam quo est molestiae eius laboriosam
                  | sunt doloribus quia impedit laborum velit
            // End Team Member
            .col-lg-4.col-md-6.member(data-aos='fade-up' data-aos-delay='600')
              .member-img
                img.img-fluid(src='../assets/images/team/team-6.jpg' alt='')
                .social
                  a(href='#')
                    i.bi.bi-twitter-x
                  a(href='#')
                    i.bi.bi-facebook
                  a(href='#')
                    i.bi.bi-instagram
                  a(href='#')
                    i.bi.bi-linkedin
              .member-info.text-center
                h4 Josepha Palas
                span Operation
                p
                  | Sint sint eveniet explicabo amet consequatur nesciunt error enim rerum
                  | earum et omnis fugit eligendi cupiditate vel
            // End Team Member
      // /Team Section
      // Call To Action Section
      section#call-to-action.call-to-action.section
        img(src='../assets/images/cta-bg.jpg' alt='')
        .container
          .row.justify-content-center(data-aos='zoom-in' data-aos-delay='100')
            .col-xl-10
              .text-center
                h3 Call To Action
                p
                  | Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                  | dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  | proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                a.cta-btn(href='#') Call To Action
      // /Call To Action Section
      // Testimonials Section
      section#testimonials.testimonials.section
        .container
          .row.align-items-center
            .col-lg-5.info(data-aos='fade-up' data-aos-delay='100')
              h3 Testimonials
              p
                | Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                | dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                | nulla pariatur. Excepteur sint occaecat cupidatat non proident.
            .col-lg-7(data-aos='fade-up' data-aos-delay='200')
              swiper.mySwiper(:loop='true' :modules='modules' :pagination='{ clickable: true }' :slides-per-view='1' :space-between='10' :autoplay='{ delay: 5000, disableOnInteraction: false }')
                swiper-slide.swiper-slide(v-for='(testimonial, index) in testimonials' :key='index')
                  .testimonial-item.px-4.py-2
                    .d-flex
                      img.testimonial-img.flex-shrink-0(:src='getImagePath(testimonial.img)' :alt='testimonial.name')
                      div
                        h3 {{ testimonial.name }}
                        h4 {{ testimonial.title }}
                        .stars
                          i.bi.bi-star-fill(v-for='n in 5' :key='n')
                    p
                      i.bi.bi-quote.quote-icon-left
                      span {{ testimonial.quote }}
                      i.bi.bi-quote.quote-icon-right
      // /Testimonials Section
      // Recent Posts Section
      section#recent-posts.recent-posts.section
        // Section Title
        .container.section-title(data-aos='fade-up')
          h2 Recent Posts
          p
            | Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
            | velit
        // End Section Title
        .container
          .row.gy-4
            .col-xl-4.col-md-6(data-aos='fade-up' data-aos-delay='100')
              article
                .post-img
                  img.img-fluid(src='../assets/images/blog/blog-1.jpg' alt='')
                p.post-category Politics
                h2.title
                  a(href='blog-details.html') Dolorum optio tempore voluptas dignissimos
                .d-flex.align-items-center
                  img.img-fluid.post-author-img.flex-shrink-0(src='../assets/images/blog/blog-author.jpg' alt='')
                  .post-meta
                    p.post-author Maria Doe
                    p.post-date
                      time(datetime='2022-01-01') Jan 1, 2022
            // End post list item
            .col-xl-4.col-md-6(data-aos='fade-up' data-aos-delay='200')
              article
                .post-img
                  img.img-fluid(src='../assets/images/blog/blog-2.jpg' alt='')
                p.post-category Sports
                h2.title
                  a(href='blog-details.html') Nisi magni odit consequatur autem nulla dolorem
                .d-flex.align-items-center
                  img.img-fluid.post-author-img.flex-shrink-0(src='../assets/images/blog/blog-author-2.jpg' alt='')
                  .post-meta
                    p.post-author Allisa Mayer
                    p.post-date
                      time(datetime='2022-01-01') Jun 5, 2022
            // End post list item
            .col-xl-4.col-md-6(data-aos='fade-up' data-aos-delay='300')
              article
                .post-img
                  img.img-fluid(src='../assets/images/blog/blog-3.jpg' alt='')
                p.post-category Entertainment
                h2.title
                  a(href='blog-details.html') Possimus soluta ut id suscipit ea ut in quo quia et soluta
                .d-flex.align-items-center
                  img.img-fluid.post-author-img.flex-shrink-0(src='../assets/images/blog/blog-author-3.jpg' alt='')
                  .post-meta
                    p.post-author Mark Dower
                    p.post-date
                      time(datetime='2022-01-01') Jun 22, 2022
            // End post list item
          // End recent posts list
      // /Recent Posts Section
      // Contact Section
      section#contact.contact.section
        // Section Title
        .container.section-title(data-aos='fade-up')
          h2 Contact
          p
            | Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur
            | velit
        // End Section Title
        .container(data-aos='fade-up' data-aos-delay='100')
          .row.gy-4
            .col-lg-6
              .row.gy-4
                .col-md-6
                  .info-item(data-aos='fade' data-aos-delay='200')
                    i.bi.bi-geo-alt
                    h3 Address
                    p A108 Adam Street
                    p New York, NY 535022
                // End Info Item
                .col-md-6
                  .info-item(data-aos='fade' data-aos-delay='300')
                    i.bi.bi-telephone
                    h3 Call Us
                    p +1 5589 55488 55
                    p +1 6678 254445 41
                // End Info Item
                .col-md-6
                  .info-item(data-aos='fade' data-aos-delay='400')
                    i.bi.bi-envelope
                    h3 Email Us
                    p info@example.com
                    p contact@example.com
                // End Info Item
                .col-md-6
                  .info-item(data-aos='fade' data-aos-delay='500')
                    i.bi.bi-clock
                    h3 Open Hours
                    p Monday - Friday
                    p 9:00AM - 05:00PM
                // End Info Item
            .col-lg-6
              form.php-email-form(action='forms/contact.php' method='post' data-aos='fade-up' data-aos-delay='200')
                .row.gy-4
                  .col-md-6
                    input.form-control(type='text' name='name' placeholder='Your Name' required='')
                  .col-md-6
                    input.form-control(type='email' name='email' placeholder='Your Email' required='')
                  .col-md-12
                    input.form-control(type='text' name='subject' placeholder='Subject' required='')
                  .col-md-12
                    textarea.form-control(name='message' rows='6' placeholder='Message' required='')
                  .col-md-12.text-center
                    .loading Loading
                    .error-message
                    .sent-message Your message has been sent. Thank you!
                    button(type='submit') Send Message
            // End Contact Form
      // /Contact Section

    footer#footer.footer.position-relative
      .container.footer-top
        .row.gy-4
          .col-lg-5.col-md-12.footer-about
            a.logo.d-flex.align-items-center(href='index.html')
              span.sitename Append
            p
              | Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra
              | videa magna derita valies darta donna mare fermentum iaculis eu non diam
              | phasellus.
            .social-links.d-flex.mt-4
              a(href='')
                i.bi.bi-twitter-x
              a(href='')
                i.bi.bi-facebook
              a(href='')
                i.bi.bi-instagram
              a(href='')
                i.bi.bi-linkedin
          .col-lg-2.col-6.footer-links
            h4 Useful Links
            ul
              li
                a(href='#') Home
              li
                a(href='#') About us
              li
                a(href='#') Services
              li
                a(href='#') Terms of service
              li
                a(href='#') Privacy policy
          .col-lg-2.col-6.footer-links
            h4 Our Services
            ul
              li
                a(href='#') Web Design
              li
                a(href='#') Web Development
              li
                a(href='#') Product Management
              li
                a(href='#') Marketing
              li
                a(href='#') Graphic Design
          .col-lg-3.col-md-12.footer-contact.text-center.text-md-start
            h4 Contact Us
            p A108 Adam Street
            p New York, NY 535022
            p United States
            p.mt-4
              strong Phone:
              span +1 5589 55488 55
            p
              strong Email:
              span info@example.com
      .container.copyright.text-center.mt-4
        p
          | &copy; 
          span Copyright
          strong.sitename Append
          span All Rights Reserved
        .credits
          // All the links in the footer should remain intact.
          // You can delete the links only if you've purchased the pro version.
          // Licensing information: https://bootstrapmade.com/license/
          // Purchase the pro version with working PHP/AJAX contact form: [buy-url]
          | Designed by 
          a(href='https://bootstrapmade.com/') BootstrapMade
    
    // Scroll Top
    a#scroll-top.scroll-top.d-flex.align-items-center.justify-content-center(href="#")
      i.bi.bi-arrow-up-short

    // Preloader
    //- #preloader
</template>
<script>
const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// import required modules
import { Autoplay, Navigation, Pagination } from "swiper/modules";

export default {
  name: "TestimonialSwiper",
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      cart_items_count: 99,
      modules: [Autoplay, Navigation, Pagination],
      testimonials: [
        {
          name: "Saul Goodman",
          title: "Ceo & Founder",
          img: "assets/images/testimonials/testimonials-1.jpg",
          quote:
            "Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.",
        },
        {
          name: "Sara Wilsson",
          title: "Designer",
          img: "assets/images/testimonials/testimonials-2.jpg",
          quote:
            "Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.",
        },
        {
          name: "Jena Karlis",
          title: "Store Owner",
          img: "assets/images/testimonials/testimonials-3.jpg",
          quote:
            "Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.",
        },
        {
          name: "Matt Brandon",
          title: "Freelancer",
          img: "assets/images/testimonials/testimonials-4.jpg",
          quote:
            "Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.",
        },
        {
          name: "John Larson",
          title: "Entrepreneur",
          img: "assets/images/testimonials/testimonials-5.jpg",
          quote:
            "Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.",
        },
      ],
    };
  },
  mounted() {
    // this.initSwiper();
  },
  methods: {
    number_style() {
      let count = this.cart_items_count;
      if (count > 9 && count <= 99) return "last_than_99";
      if (count > 99 && count <= 999) return "last_than_999";
      if (count > 999) return "last_than_9999";
    },
    initSwiper() {
      new Swiper(".swiper-container", {
        loop: true,
        speed: 600,
        autoplay: {
          delay: 500,
        },
        slidesPerView: "auto",
        pagination: {
          el: ".swiper-pagination",
          type: "bullets",
          clickable: true,
        },
      });
    },
    getImagePath(img) {
      return require(`@/${img}`);
    },
  },
};
</script>
<style scoped>
.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}

.testimonial-item {
  max-width: 600px;
  margin: 0 auto;
}
.testimonial-img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  margin-right: 15px;
}
.stars {
  margin-top: 5px;
}
.stars i {
  color: #f39c12;
}
.quote-icon-left,
.quote-icon-right {
  color: #f39c12;
  font-size: 24px;
}

.swiper-container {
  border: solid;
  background: #e2ff33;
}
</style>
<style lang="scss">
@import "@/assets/css/index.scss";
</style>
