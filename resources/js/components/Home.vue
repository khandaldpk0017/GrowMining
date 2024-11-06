<!-- resources/js/components/Home.vue -->

<template>

<body >
	
	<!-- Header -->
	<Navbar />

		

	
	<!-- Product -->
	<section class="bg0 p-t-10 p-b-140">
		<div class="px-3 pb-1">
      <marquee style="font-weight: bold" behavior="" direction="">Diwali Offer: Invest 100000 or above get 2% extra bonus. Offer valid till 5th Nov 2024.   Refer to your friends and family and get the referral bonus Upto 10% of their investment. Welcome bonus ₹50 for new user.
    </marquee>
  </div>
  <div >
    <button class="px-2 ms-3 py-1 btn-success rounded" @click="redirectToOfficialChannel">Official Channel</button>
    <button  class="px-2 py-1 ms-2 btn-success rounded" @click="redirectToTelegram">Help</button>

  </div>
  <div class="px-3 pb-1">
  <marquee behavior="" direction="" style="font-weight: bold">
    As everyone cannot afford high End crypto mining servers, we provide the servers on rent and use your rented systems to mine the cryptocurrencies. We invest these systems in different cryptocurrency mining take our cut and give you return as promised.

  </marquee>
  </div>
		<div class="container pt-3">
			<div class="p-b-20">
				<h4 class=" cl5 w-50" style="border-bottom:4px double black ;">
					Product Overview
				</h4>
			</div>

		

				<div class="row isotope-grid " ref="grid">
				
				<div v-for="product in products.data" :key="product.id"   class="col-sm-6 col-md-4 col-lg-3 p-b-35 m-2 mx-3 p-4 isotope-item" style="border: 1px solid gray;border-radius: 13px;box-shadow: 0 1px 2px black;width: 92%;"> 
				   
				   <div class="block2">
					   <div class="block2-pic hov-img0 border-b border-dark">
						   <img :src="product.thumbnail_image_url" alt="IMG-PRODUCT" @load="imageLoaded" >

						   <!-- <button @click="openModal(product)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							   Quick View
						   </button> -->
					   </div>

					   <div class="block2-txt flex-w flex-t p-t-3">
						   <div class="block2-txt-child1 flex-col-l " style="font-size: medium;">
                 <span class="cl3">
                   Name : <span style="font-weight: bold;">{{ product.name }}</span>
                 </span>
                 <span class="cl3">
                   Description : <span style="font-weight: bold;">{{ product.description }}</span>
                 </span>
							  <div class="d-flex w-full justify-content-between">

                  <span class="cl3">
                    Price : <span style="font-weight: bold;">₹{{ product.price }}</span>
                  </span>
                  <span class="cl3">
									 Perday Earning : <span style="font-weight: bold;">₹{{ product.perday_earning }}</span>
								  </span>
							  </div>
							  <div class="d-flex w-full justify-content-between">
							   <span class="cl3">
								  Total Earning : <span style="font-weight: bold;font-size: medium;">₹{{ product.total_earning }}</span>
							   </span>
							   <span class="cl3">
								 Expire In : <span style="font-weight: bold;">{{ product.expire_days }} Days</span>
							   </span>
								</div>
							   <div class="w-full d-flex justify-content-end">
								<button @click="buy(product)" style="border: 1px solid black;" class=" m-t-15   stext-103  size-102 bg0 bor2 hov-btn1 p-lr-15 ">
							   <span style="font-size:medium;font-weight: bold;">Buy</span>
						   </button>
						   </div>
						   </div>

						   
					   </div>
				   </div>
			   </div> 
		   
		   </div>
		   <pagination
	   v-if="totalPages > 1"
	 :current-page="currentPage"
	 :total-pages="totalPages"
	 @page-changed="fetchProducts"
   ></pagination>
			<!-- Load more -->
      
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg3 p-t-5 p-b-10 fixed-bottom web-footer">
		<div class="container">
			

			<div class="py-2">
				<div class="flex-c-m flex-w  nav-footer">
					
						<router-link to="/" active-class="text-white" class=" pr-2 " ><i class="zmdi zmdi-home" style="font-size: 25px;"></i></router-link> 
					
|
					
						<router-link to="/Wallet" active-class="text-white" class=" px-2"><i class="zmdi zmdi-balance-wallet" style="font-size: 25px;"></i></router-link>
					
|
					
						<router-link to="/Refer" active-class="text-white" class=" px-2"><i class="zmdi zmdi-money" style="font-size: 25px;"></i></router-link>
					
|
						<router-link to="/Levels" active-class="text-white" class=" px-2"><i class="zmdi zmdi-trending-up" style="font-size: 25px;"></i></router-link> 
|
						<router-link to="/Coming-soon" active-class="text-white" class=" px-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="25px" height="25px">
  <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm7.062 6.898c.265 1.007.421 2.05.451 3.113L16.6 12.82l-.947-1.707 1.04-2.253h2.37zM12 4.075c.686 0 1.355.073 2.003.208l.788 2.272h-2.79l-1.397-1.612A7.977 7.977 0 0112 4.075zm-4.22 2.15l1.756 1.746-1.04 2.253-2.048-.829c.43-.997.99-1.916 1.645-2.67.213-.22.439-.424.687-.6zM4.487 9.93l2.184.885L7.62 12l-1.687 2.197-2.062-.463a7.936 7.936 0 01-.231-2.02c.067-.618.184-1.22.348-1.785zm.928 7.702l1.524-.53L9.385 17.9l-.72 2.486a7.969 7.969 0 01-2.276-2.753zm3.59 4.156l.85-2.936 2.346-.628 2.345.628.85 2.936a7.92 7.92 0 01-6.39 0zm7.186-.93l-.72-2.487 2.446-1.796 1.523.53a7.965 7.965 0 01-2.275 2.753zM19.03 16.43l-2.063.463L15.28 14 17.5 11.06l2.184-.885c.164.566.28 1.167.348 1.785.057.648.028 1.31-.002 1.97zm-3.02-6.048l-1.407 3.05.964 1.738h-5.134l.963-1.738-1.407-3.05 1.32-2.86h2.35l1.32 2.86z" />
</svg>

</router-link> 
					

				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	

	
<!--===============================================================================================-->	
	
	
<!--===============================================================================================-->


</body>

</template>
  <!-- <button @click="logout">Logout</button> -->

<script>
import Swal from 'sweetalert2';
import { useCartStore } from '../store/cart';
import logoU from '../../../public/images/icons/logo-01.png';
import iconCloseU from '../../../public/images/icons/icon-close2.png';
import iconClose2U from '../../../public/images/icons/icon-close.png';
import itemCartU from '../../../public/images/item-cart-01.jpg';
import itemCart2U from '../../../public/images/item-cart-02.jpg';
import itemCart3U from '../../../public/images/item-cart-03.jpg';
import banner1U from '../../../public/images/banner-01.jpg';
import slider1U from '../../../public/images/slide-01.jpg';
import slider2U from '../../../public/images/slide-02.jpg';
import slider3U from '../../../public/images/slide-03.jpg';
import banner2U from '../../../public/images/banner-02.jpg';
import banner3U from '../../../public/images/banner-03.jpg';
import heart1U from '../../../public/images/icons/icon-heart-01.png';
import heart2U from '../../../public/images/icons/icon-heart-02.png';
import p1U from '../../../public/images/product-01.jpg';
import p2U from '../../../public/images/product-02.jpg';
import p3U from '../../../public/images/product-03.jpg';
import p4U from '../../../public/images/product-04.jpg';
import p5U from '../../../public/images/product-05.jpg';
import p6U from '../../../public/images/product-06.jpg';
import p7U from '../../../public/images/product-07.jpg';
import p8U from '../../../public/images/product-08.jpg';
import p9U from '../../../public/images/product-09.jpg';
import p10U from '../../../public/images/product-10.jpg';
import p11U from '../../../public/images/product-11.jpg';
import p12U from '../../../public/images/product-12.jpg';
import p13U from '../../../public/images/product-13.jpg';
import p14U from '../../../public/images/product-14.jpg';
import p15U from '../../../public/images/product-15.jpg';
import p16U from '../../../public/images/product-16.jpg';
import pd1U from '../../../public/images/product-detail-01.jpg';
import pd2U from '../../../public/images/product-detail-02.jpg';
import pd3U from '../../../public/images/product-detail-03.jpg';

import picon1U from '../../../public/images/icons/icon-pay-01.png';
import picon2U from '../../../public/images/icons/icon-pay-02.png';
import picon3U from '../../../public/images/icons/icon-pay-03.png';
import picon4U from '../../../public/images/icons/icon-pay-04.png';
import picon5U from '../../../public/images/icons/icon-pay-05.png';

// component
import Isotope from 'isotope-layout';
import Navbar from './layout/navbar.vue';
import Pagination from './layout/pagination.vue';

export default {
  name: 'Home',
  components: {
    Navbar,Pagination
  },
  mounted() {
    this.$nextTick(() => {
      this.initIsotope();
      
    });
  },
  created() {
    this.fetchProducts(this.currentPage);
  },
  methods: {
	redirectToTelegram () {
  window.location.href = 'https://telegram.me/+919354865603'; // Replace with your Telegram link
},
redirectToOfficialChannel(){
  window.location.href = 'https://telegram.me/official_grow_mining'; // Replace with your Telegram link
  
  },
	showProductSearch(){
		this.isProductSearch=!this.isProductSearch;
	},
	showProductFilter(){
		this.isProductFilter=!this.isProductFilter;
	},
    logout() {
      localStorage.removeItem('token');
      this.$router.push({ name: 'Login' });
    },
    initIsotope() {
      this.isotope = new Isotope('.isotope-grid', {
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows'
      });
      this.isotope.arrange({ filter: this.currentFilter });
      this.isotope.on('layoutComplete', () => {
        
      });
      
    },
    filter(filterName) {
      this.currentFilter = filterName;
      if (this.isotope) {
        this.isotope.arrange({ filter: filterName });
      }
    },
    imageLoaded() {
      if (this.isotope) {
        this.isotope.layout();
      }
    },
	buy(product){
		Swal.fire({
        title: 'Confirm!',
        text: 'Are you sure you want to buy?',
        icon: 'warning',
        showCancelButton: true,  // Show the cancel button for confirmation
        confirmButtonText: 'Yes, buy it!',
        cancelButtonText: 'No, cancel',
        reverseButtons: true  // Reverse the button positions
    }).then((result) => {
        if (result.isConfirmed) {
			
      try {
        
        const user = JSON.parse(localStorage.getItem('user'));

        // Step 1: Create order on the server
        const response =  axios.post('/api/create-order', {
          user_id: user.id,
          productDetails:product,
        }, {
          headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`
          }
        }).then((res)=>{

        if(res.data.success==true){
        Swal.fire('Purchased!', 'Your item has been purchased.', 'success');
        }
      }).catch((error)=>{
        Swal.fire({
        title: 'Confirm!',
        text: 'Insufficient Balance Please recharge your wallet.',
        icon: 'warning',
        showCancelButton: true,  // Show the cancel button for confirmation
        confirmButtonText: 'Ok',
        cancelButtonText: 'No, cancel',
        reverseButtons: true  // Reverse the button positions
        }).then((result) => {
          this.$router.push({ name: 'Wallet' });
        }).catch((error)=>{

        });
        // Swal.fire('Cancelled', 'Insufficient balance', 'error');
        
      });
	} catch (error) {
		Swal.fire('Cancelled', 'Insufficient balance', 'error');
      }
    
            // Action if the user confirms
            
            // Your purchase logic here
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Action if the user cancels
            Swal.fire('Cancelled', 'Your purchase has been cancelled.', 'error');
        }
    });
	},
	async fetchProducts(page=1) {
		this.currentPage=page
      try {
		const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        const response = await axios.post('/api/products',{page: this.currentPage},{headers});
        // this.products = response.data.data;
		const data = response.data.data;
		this.products = data; // Set products from response

		// Update pagination
		this.totalPages = data.last_page;
		this.currentPage = data.current_page;

		// Ensure pagination is valid
		if (this.totalPages < 2) {
		this.currentPage = 1;
		}
		this.$nextTick(() => {
          this.initializeIsotope();
        });
      } catch (error) {
        console.error('Error fetching products:', error);
      } finally {
        this.loading = false;
      }
    },
	
	initializeIsotope() {
      if (!this.isotope) {
        this.isotope = new Isotope(this.$refs.grid, {
          itemSelector: '.isotope-item',
          layoutMode: 'fitRows'
        });
      } else {
        this.isotope.reloadItems();
        this.isotope.arrange();
      }
    },
	watch: {
    products() {
      this.$nextTick(() => {
        if (this.isotope) {
          this.isotope.reloadItems();
          this.isotope.arrange();
        }
      });
    }
    },
	applyCategoryFilter(category) {
	this.selectedCategory=category;
    this.fetchProducts();
  },
  applyPriceFilter(filter) {
		this.selectedPriceFilter=filter;
		
	},
	fetchFilteredProducts(){
		this.fetchProducts();
	},
	clearFilteredProducts(){
		this.selectedPriceFilter='';
		this.priceFrom=null;
		this.priceTo=null;
		this.fetchProducts();
	}
    
  },
  computed: {
    cartItems() {
      const cartStore = useCartStore();
      return cartStore.cartItems;
    },
   
    isInCart() {
      return this.cartItems.some(item => item.id === this.selectedVariant.id);
    },
  },
  data(){
    return{
		priceFrom: null,
      priceTo: null,
		selectedPriceFilter:'',
		selectedCategory:'',
		searchTerm: '',
		currentPage: 1,
		totalPages: 1,
	  isProductSearch:false,
	  isProductFilter:false,
      quantity: 1,
      products: {},
		selectedProduct: null,
		sizeAndColorCombination:false,
		selectedVariant: null, // The variant selected based on size/color
      selectedSize: null,
      selectedColor: null,
      variantSizes: [],
      variantColors: [],
		loading: true,
      isotope: null,
      currentFilter: '*',
      logo:logoU,
      iconClose:iconCloseU,
      iconClose2:iconClose2U,
      itemCart:itemCartU,
      itemCart2:itemCart2U,
      itemCart3:itemCart3U,
      slider1:slider1U,
      slider2:slider2U,
      slider3:slider3U,
      banner1:banner1U,
      banner2:banner2U,
      banner3:banner3U,
      heart1:heart1U,
      heart2:heart2U,
      p1:p1U,
      p2:p2U,
      p3:p3U,
      p4:p4U,
      p5:p5U,
      p6:p6U,
      p7:p7U,
      p8:p8U,
      p9:p9U,
      p10:p10U,
      p11:p11U,
      p12:p12U,
      p13:p13U,
      p14:p14U,
      p15:p15U,
      p16:p16U,
      pd1:pd1U,
      pd2:pd2U,
      pd3:pd3U,
      picon1:picon1U,
      picon2:picon2U,
      picon3:picon3U,
      picon4:picon4U,
      picon5:picon5U,
    };
  }
};

</script>
<style scoped>

.product-modal{
	position: fixed;
  width: 100%;
  height: 100vh;
  top: 0;
  left: 0;
  z-index: 9000;
  overflow: auto;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  visibility: visible;
  opacity: 1;
}
.out-of-stock {
  color: red;
  font-weight: bold;
}

.disabled-button {
  background-color: #ccc; /* Change the style to indicate it's disabled */
  cursor: not-allowed;
}
.color-circle {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  margin: 0 5px;
  cursor: pointer;
  border: 2px solid transparent;
  transition: border-color 0.3s;
}

.color-circle:hover {
  border-color: #ccc;
}

.active-color {
  border-color: #0000;
  border: 4px solid;
}

</style>