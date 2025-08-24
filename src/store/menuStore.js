// src/store/menuStore.js
const bed_hardness_tabs = [
  { key: "all", label: "全部" },
  { key: "hard-soft", label: "偏軟" },
  { key: "soft-support", label: "軟有支撐" },
  { key: "medium", label: "軟硬適中" },
  { key: "hard-fit", label: "硬有服貼" },
  { key: "hard", label: "偏硬" },
];

export default {
  bed: {
    text: "床墊",
    asideMenu: [
      {
        key: "hardness",
        title: "軟硬度",
        icon: "/assets/images/index/headerIcon_hardness.png",
        banner: "/assets/images/product/list/hardness.png",
        items: [
          {
            text: "偏軟",
            key: "hard-soft",
            tabs: bed_hardness_tabs,
          },
          {
            text: "軟有支撐",
            key: "soft-support",
            tabs: bed_hardness_tabs,
          },
          {
            text: "軟硬適中",
            key: "medium",
            tabs: bed_hardness_tabs,
          },
          {
            text: "硬有服貼",
            key: "hard-fit",
            tabs: bed_hardness_tabs,
          },
          {
            text: "偏硬",
            key: "hard",
            tabs: bed_hardness_tabs,
          },
        ],
      },
      {
        key: "users",
        title: "使用族群",
        icon: "/assets/images/index/headerIcon_users.png",
        banner: "/assets/images/product/list/users.png",
        items: [
          {
            text: "家用型",
            key: "home",
            tabs: [
              { key: "all", label: "全部" },
              { key: "A", label: "厚實棉襯" },
              { key: "B", label: "1cm乳膠" },
              { key: "C", label: "2.54cm乳膠" },
              { key: "D", label: "5.08cm乳膠" },
            ],
          },
          {
            text: "出租型",
            key: "rental",
            tabs: [
              { key: "all", label: "全部" },
              { key: "A", label: "上班套房" },
              { key: "B", label: "學生套房" },
            ],
          },
          {
            text: "客製(軟硬/尺寸/表布)",
            key: "custom",
            tabs: [
              { key: "all", label: "全部" },
              { key: "A", label: "房東仲介" },
              { key: "B", label: "設計師" },
            ],
          },
        ],
      },
      {
        key: "structure",
        title: "床墊結構",
        icon: "/assets/images/index/headerIcon_structure.png",
        banners: ['/assets/images/product/list/structure1.png', '/assets/images/product/list/structure2.png'],
        items: [
          {
            text: "高強度*串聯式設計",
            key: "sgrid",
            new: true,
            banners: [
              {
                img_pc: "/assets/images/index/banner_kari02_pc.jpg",
                img_mo: "/assets/images/index/banner_kari02_mo.jpg",
                name: "banner_kari02",
                title: "",
                desc: "",
                btn_text: "",
                btn_link: "",
              },
              {
                img_pc: "/assets/images/index/banner_kari03_pc.jpg",
                img_mo: "/assets/images/index/banner_kari03_mo.jpg",
                name: "banner_kari03",
                title: "",
                desc: "",
              },
            ],
            tabs: [
              { key: "all", label: "全部" },
              { key: "A", label: "高碳鋼" },
              { key: "B", label: "Q彈簧" },
              { key: "C", label: "飯店合金" },
              { key: "D", label: "特殊合金" },
            ],
          },
          {
            text: "獨立筒型彈簧",
            key: "pocket",
            tabs: [
              { key: "all", label: "全部" },
              { key: "A", label: "直排式" },
              { key: "B", label: "蜂巢式" },
              { key: "C", label: "硬式獨立筒" },
            ],
          },
        ],
      },
    ],
  }
}
