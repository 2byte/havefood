import {
  mdiAccountCircle,
  mdiMonitor,
  mdiGithub,
  mdiLock,
  mdiAlertCircle,
  mdiMonitorShimmer,
  mdiSquareEditOutline,
  mdiTable,
  mdiViewList,
  mdiTelevisionGuide,
  mdiResponsive,
  mdiPalette,
  mdiAllInclusive,
  mdiFolderCog,
  mdiAppleKeyboardOption
} from "@mdi/js";

export default [
  "Главное",
  [
    {
      route: "admin.index",
      icon: mdiMonitor,
      label: "Лобби",
    },
  ],
  "Магазин",
  [
    {
      label: 'Управление категориями',
      icon: mdiFolderCog,
      route: 'admin.list-categories'
    },
    {
      label: 'Управление опциями товаров',
      icon: mdiAppleKeyboardOption,
      route: 'admin.options'
    },
    {
      label: "Категории товаров",
      icon: mdiViewList,
      expanded: true,
      menu: [
        {
          icon: mdiAllInclusive,
          label: "Все товары",
          route: 'admin.list-goods'
        },
      ],
    },
  ],
  /*'Examples',
  [
    {
      route: 'tables',
      label: 'Tables',
      icon: mdiTable
    },
    {
      route: 'forms',
      label: 'Forms',
      icon: mdiSquareEditOutline
    },
    {
      route: 'ui',
      label: 'UI',
      icon: mdiTelevisionGuide
    },
    {
      route: 'responsive',
      label: 'Responsive',
      icon: mdiResponsive
    },
    {
      route: 'styles',
      label: 'Styles',
      icon: mdiPalette
    },
    {
      route: 'profile',
      label: 'Profile',
      icon: mdiAccountCircle
    },
    {
      route: 'login',
      label: 'Login',
      icon: mdiLock
    },
    {
      route: 'error',
      label: 'Error',
      icon: mdiAlertCircle
    },
    {
      label: 'Dropdown',
      icon: mdiViewList,
      menu: [
        {
          label: 'Item One'
        },
        {
          label: 'Item Two'
        }
      ]
    }
  ],
  'About',
  [
    {
      href: 'https://tailwind-vue.justboil.me/',
      label: 'Premium version',
      icon: mdiMonitorShimmer,
      target: '_blank'
    },
    {
      href: 'https://github.com/justboil/admin-one-vue-tailwind',
      label: 'GitHub',
      icon: mdiGithub,
      target: '_blank'
    }
  ]*/
];
