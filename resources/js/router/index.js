// resources/js/router.js

import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import store from '../store/auth.js';
import Register from '../components/Register.vue';
import Login from '../components/Login.vue';
import Products from '../components/products/Products.vue';
import ShoppingCart from '../components/shopping-cart/ShoppingCart.vue';
import PaymentGateway from '../components/shopping-cart/PaymentGateway.vue';
import MyOrders from '../components/myorders/MyOrders.vue';
import OrderProducts from '../components/myorders/OrderProducts.vue';
import TicketDetail from '../components/support/TicketDetail.vue';
import CreateSupportTicket from '../components/support/CreateSupportTicket.vue';
import Support from '../components/support/Support.vue';
import About from '../components/about/About.vue';
import Contact from '../components/contact/Contact.vue';
import Refer from '../components/refer/Refer.vue';
import Wallet from '../components/wallet/Wallet.vue';
import Profile from '../components/profile/Profile.vue';
import Levels from '../components/levels/Levels.vue';
import DepositWithdrawRequest from '../components/request/DepositWithdrawRequest.vue';
import ComingSoon from '../components/coming-soon/Coming-soon.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta:{requireAuth:true}
  },
  {
    path: '/Products',
    name: 'Products',
    component: Products,
    meta:{requireAuth:true}
  },
  {
    path: '/payment-gateway',
    name: 'PaymentGateway',
    component: PaymentGateway,
    meta:{requireAuth:true}
  },
  {
    path: '/ShoppingCart',
    name: 'ShoppingCart',
    component: ShoppingCart,
    meta:{requireAuth:true}
  },
  {
    path: '/MyOrders',
    name: 'MyOrders',
    component: MyOrders,
    meta:{requireAuth:true}
  },
  {
    path: '/OrderProducts',
    name: 'OrderProducts',
    component: OrderProducts,
    meta:{requireAuth:true},
    props: true
  },
  {
    path: '/Support',
    name: 'Support',
    component: Support,
    meta:{requireAuth:true},
    props: true
  },
  {
    path: '/CreateSupportTicket',
    name: 'CreateSupportTicket',
    component: CreateSupportTicket,
    meta:{requireAuth:true},
    props: true
  },
  {
    path: '/TicketDetail/:id',
    name: 'TicketDetail',
    component: TicketDetail,
    meta:{requireAuth:true},
    props: true
  },
  {
    path: '/About',
    name: 'About',
    component: About,
    meta:{requireAuth:true},
  },
  {
    path: '/Contact',
    name: 'Contact',
    component: Contact,
    meta:{requireAuth:true},
  },
  {
    path: '/Refer',
    name: 'Refer',
    component: Refer,
    meta:{requireAuth:true},
  },
  {
    path: '/Wallet',
    name: 'Wallet',
    component: Wallet,
    meta:{requireAuth:true},
  },
  {
    path: '/Profile',
    name: 'Profile',
    component: Profile,
    meta:{requireAuth:true},
  },
  {
    path: '/Levels',
    name: 'Levels',
    component: Levels,
    meta:{requireAuth:true},
  },
  {
    path: '/Coming-soon',
    name: 'Coming-soon',
    component: ComingSoon,
    meta:{requireAuth:true},
  },
  {
    path: '/Deposit&WithdrawRequest',
    name: 'Deposit&WithdrawRequest',
    component: DepositWithdrawRequest,
    meta:{requireAuth:true},
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
    // meta:{requireAuth:false}
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    // meta:{requireAuth:false}
  }
 

];

const router = createRouter({
  history: createWebHistory(),
  routes
});
router.beforeEach((to,from)=>{
  if(to.meta.requireAuth && !localStorage.getItem('token')){
    return {name:'Login'}
  }
  if(to.meta.requireAuth ==false && localStorage.getItem('token')){
    return {name:'Home'}
  }
})
export default router;
