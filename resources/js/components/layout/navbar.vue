<template>


        
        <!-- Header -->
        <header>
            <!-- Header desktop -->
            <div class="container-menu-desktop fix-menu-desktop">
                <!-- Topbar -->
                <!-- <div class="top-bar">
                    <div class="content-topbar flex-sb-m h-full container">
                        <div class="left-top-bar">
                            Free shipping for standard order over $100
                        </div>
    
                        <div class="right-top-bar flex-w h-full">
                            <router-link to="/Support" class="flex-c-m trans-04 p-lr-25" active-class="text-info">Help & FAQs</router-link>
                           
                           
    
                            <router-link to="/MyOrders" class="flex-c-m trans-04 p-lr-25" active-class="text-info">My Orders</router-link>
    
                            <router-link to="/Refer" class="flex-c-m trans-04 p-lr-25" active-class="text-info">
                                Refer & Earn
                            </router-link>
    
                            <router-link to="/Wallet" class="flex-c-m trans-04 p-lr-25" active-class="text-info">
                                Wallet
                            </router-link>
                        </div>
                    </div>
                </div> -->
    
                <div class="wrap-menu-desktop" :class="{'scrolled-nav': isScrolled}">
                    <nav class="limiter-menu-desktop container" >
                        
                        <!-- Logo desktop -->		
                        <a href="#" class="logo" style="font-size: 1.6em;color:rgb(93 144 108);font-weight: bold;">
                            <img :src="logo" alt="IMG-LOGO">
                            <span class="pl-9 p-t-10">GROW MINING</span>
                        </a>
    
                        <!-- Menu desktop -->
                        <div class="menu-desktop">
                            <ul class="main-menu">
                                <li class="">
                                    <!-- <a href="index.html">Home</a> -->
                                    <router-link to="/" active-class="text-info">Home</router-link>
                                </li>
    
                                <li>
                                    <!-- <a href="product.html">Shop</a> -->
                                    <router-link to="/Wallet" active-class="text-info">Deposit & Withdraw</router-link>
                                </li>
    
                                <li class="label1" data-label1="hot">
                                    <router-link to="/Refer" active-class="text-info">Refer & earn</router-link>
                                </li>
        
                                <li>
                                    <button @click="redirectToTelegram">Support</button>
                                    <!-- <router-link to="/Support" active-class="text-info">Support</router-link> -->
                                </li>
    
                                <li>
                                    <router-link to="/Levels" active-class="text-info">Levels</router-link>
                                </li>
                                <li>
                                    <router-link to="/MyOrders" active-class="text-info">My Orders</router-link>
                                </li>
                                <li>
                                    <router-link to="/Deposit&WithdrawRequest" active-class="text-info">Deposit & Withdraw Request</router-link>
                                </li>
                            </ul>
                            
                        </div>	
    
                        <!-- Icon header -->
                        <div class="wrap-icon-header flex-w flex-r-m">
                            <!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                                <i class="zmdi zmdi-search" @click="showSearchModal()"></i>
                            </div> -->
    
                            <router-link to="/Profile" active-class="text-info" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  "  >
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </router-link>
                            <!-- <button class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti "  @click="openCartModal" :data-notify="cartItemsCount">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </button> -->
    
                            <a href="#"  class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
                                <i @click="logout()" class="zmdi zmdi-power-setting"></i>
                            </a>
                        </div>
                    </nav>
                </div>	
            </div>
    
            <!-- Header Mobile -->
            <div class="wrap-header-mobile" >
                <!-- Logo moblie -->		
                <a href="#" class="logo-mobile" style="font-size: 1.5em;color:rgb(93 144 108);font-weight: bold;">
                    <!-- <img src="aman-removebg-preview" alt=""> -->
                    <img :src="logo" alt="IMG-LOGO">
                            <span class="pl-8 p-t-10"><i>GROW MINING</i></span>
                        </a>
    
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m m-r-5">
                    <!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search" @click="showSearchModal()"></i>
                    </div> -->
                    <router-link to="/Profile" active-class="text-info" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  " >
                        <i class="zmdi zmdi-account"></i>
                            </router-link>
                    <!-- <button class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti " @click="openCartModal" :data-notify="cartItemsCount">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </button> -->
    
                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 " >
                        <i @click="logout()" class="zmdi zmdi-power-setting"></i>
                    </a>
                </div>
    
                <!-- Button show menu -->
                <div @click="toggleMenu" :class="{'is-active': isMenuActive}" class="btn-show-menu-mobile hamburger hamburger--squeeze" >
                    <span class="hamburger-box" >
                        <span class="hamburger-inner" ></span>
                    </span>
                </div>
            </div>
    
    
            <!-- Menu Mobile -->
            <div v-if="isMenuActive" class="menu-mobile">
    
                <ul class="main-menu-m">
                    <li>
                        <button style="padding-left: 20px; padding-bottom: 4px;" @click="redirectToTelegram">Support</button>
                    </li>
    
                    <li>
                        <router-link to="/MyOrders" active-class="text-dark">My Orders</router-link>
                    </li>
    
                    <li>
                        <router-link to="/Deposit&WithdrawRequest" active-class="text-dark">Deposit and Withdraw Requests</router-link>
                    </li>
    
                </ul>
            </div>
    
            <!-- Modal Search -->
            <div v-if="isSearch" class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                <div class="container-search-header">
                    <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                        <img :src="iconClose" alt="CLOSE" @click="hideSearchModal()">
                    </button>
    
                    <form @submit="searchProduct()" class="wrap-search-header flex-w p-l-15">
                        <button type="submit" class="flex-c-m trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="plh3"  type="text" name="search" placeholder="Search...">
                    </form>
                </div>
            </div>
        </header>
    
        <!-- Cart -->
        <div v-if="cartModalVisible" class="wrap-header-cart js-panel-cart show-header-cart">
            <div class="s-full " @click="closeCartModal"></div>
    
            <div class="header-cart flex-col-l p-l-65 p-r-25">
                <div class="header-cart-title flex-w flex-sb-m p-b-8">
                    <span class="mtext-103 cl2">
                        Your Cart
                    </span>
    
                    <div @click="closeCartModal" class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 ">
                        <i class="zmdi zmdi-close"></i>
                    </div>
                </div>
                
                <div class="header-cart-content flex-w js-pscroll">
                    <ul class="header-cart-wrapitem w-full">
                        <li v-for="item in cartItems" :key="item.id" class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img :src="`/storage/images/${item.thumbnail_image}`" alt="IMG">
                            </div>
    
                            <div class="header-cart-item-txt p-t-8">
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{ item.name }}
                                    </a>
                                    <button @click="removeItem(item.id)" class="btn btn-danger btn-sm px-2"><i class="zmdi zmdi-delete"></i></button>
                                </div>
                                <span class="header-cart-item-info">
                                    ${{ item.price }}
                                </span>
                            </div>
                        </li>
    
                    </ul>
                    
                    <div class="w-full">
                        <div class="header-cart-total w-full p-tb-40">
                            Total: ${{ cartTotal }}
                        </div>
    
                        <div class="header-cart-buttons flex-w w-full">
                            <router-link to="/ShoppingCart" class="flex-c-m w-full stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">Check Out</router-link>
    
                            <!-- <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                Check Out
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    </template>


<script>
import { useCartStore } from '../../store/cart';
import { computed } from 'vue';
import logoU from '../../../../public/images/logo/aman-removebg-preview.png';
import iconCloseU from '../../../../public/images/icons/icon-close2.png';
import iconClose2U from '../../../../public/images/icons/icon-close.png';
import itemCartU from '../../../../public/images/item-cart-01.jpg';
import itemCart2U from '../../../../public/images/item-cart-02.jpg';
import itemCart3U from '../../../../public/images/item-cart-03.jpg';

export default {
  name: 'Navbar',
  created() {
    window.addEventListener('scroll', this.handleScroll);
  },
  async mounted() {
    const cartStore = useCartStore();
    await cartStore.loadCart();
  },
  destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
 redirectToTelegram () {
  window.location.href = 'https://telegram.me/+919354865603'; // Replace with your Telegram link
},
    toggleMenu(){
        this.isMenuActive=!this.isMenuActive;
    },
    showSearchModal(){
        this.isSearch=true;
    },
    hideSearchModal(){
        this.isSearch=false;
    },
    logout() {
      localStorage.removeItem('token');
      this.$router.push({ name: 'Login' });
    },
    handleScroll() {
      this.isScrolled = window.scrollY > 40; // Change 50 to whatever scroll position you prefer
    },
    openCartModal() {
      this.cartModalVisible = true;
      const cartStore = useCartStore();
       
      console.log(cartStore.cartItems)
    },
    closeCartModal() {
      this.cartModalVisible = false;
    },
    removeItem(itemId) {
      const cartStore = useCartStore();
      cartStore.removeItem(itemId);
    },
  },
  computed: {
    cartItems() {
      const cartStore = useCartStore();
      return cartStore.cartItems;
    },
    cartItemsCount() {
      return this.cartItems.length;
    },
    cartTotal() {
        return this.cartItems.reduce((total, item) => total + item.price * item.quantity, 0).toFixed(2);
    },
    isInCart() {
      return this.cartItems.some(item => item.id === this.selectedProduct.id);
    },
  },
  data(){
    return{
        isMenuActive:false,
        isSearch:false,
        cartModalVisible: false,
        isScrolled: false,
      logo:logoU,
      iconClose:iconCloseU,
      iconClose2:iconClose2U,
      itemCart:itemCartU,
      itemCart2:itemCart2U,
      itemCart3:itemCart3U,
  
    };
  }
};
</script>

<style scoped>
.modal-search-header {
  position: fixed;
  z-index: 2000;
  width: 100%;
  height: 100%;
  bottom: 0%;
  left: 0;
  background-color: rgba(255,255,255,0.9);
  padding: 50px 15px 100px 15px;
}

.scrolled-nav {
  background-color: white; /* Color when scrolled */
  top: 0;
  transition: 0.5s;
}
.wrap-header-cart {
  position: fixed;
  z-index: 1100;
  width: 100%;
  height: 100vh;
  top: 0;
  right: 0;
  visibility: visible;
  background-color: rgba(0,0,0,0.6);
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;  
  transition: all 0.4s;
}
</style>