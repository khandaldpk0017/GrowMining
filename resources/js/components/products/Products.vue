<!-- resources/js/components/Home.vue -->

<template>

<body >
	
	<!-- Header -->
	<Navbar />

	<!-- Product -->
	<section class="bg0 p-t-23 m-t-50 p-b-140">
		<div class="container">
			<!-- <div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div> -->

			<div class="d-flex flex-sb-m p-b-10">
				<div class="d-flex flex-l-m filter-tope-group m-tb-10">
					<button @click="applyCategoryFilter('')"   :class="{ 'how-active1': selectedCategory === '' }"  class="stext-106  cl6 hov1 bor3 trans-04 m-r-32 m-tb-5  bg-transparent " data-filter="*">
						All Products
					</button>

					<button @click="applyCategoryFilter('women')" :class="{ 'how-active1': selectedCategory === 'women' }" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 bg-transparent" data-filter=".women">
						Women
					</button>

					<button @click="applyCategoryFilter('men')" :class="{ 'how-active1': selectedCategory === 'men' }" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 bg-transparent" data-filter=".men">
						Men
					</button>

					<button @click="applyCategoryFilter('bag')"  :class="{ 'how-active1': selectedCategory === 'bag' }" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 bg-transparent" data-filter=".bag">
						Bag
					</button>

					<button @click="applyCategoryFilter('shoes')" :class="{ 'how-active1': selectedCategory === 'shoes' }" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 bg-transparent" data-filter=".shoes">
						Shoes
					</button>

					<button @click="applyCategoryFilter('watches')" :class="{ 'how-active1': selectedCategory === 'watches' }" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 bg-transparent" data-filter=".watches">
						Watches
					</button>
					<button @click="applyCategoryFilter('other')" :class="{ 'how-active1': selectedCategory === 'other' }" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 bg-transparent" data-filter=".watches">
						Other
					</button>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div @click="showProductFilter()" class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i v-if="!isProductFilter" class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i v-if="isProductFilter" class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close "></i>
						 Filter
					</div>

					<div @click="showProductSearch()" class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i v-if="!isProductSearch" class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i v-if="isProductSearch" class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close "></i>
						Search
					</div>
				</div>
				
				

			</div>
			<!-- Filter -->
			<div v-if="isProductFilter" class="m-b-20 bg6 panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w  w-full p-lr-40 p-t-27 p-lr-15-sm">
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>

						<ul>
							<li class="p-b-6">
								<button type="button" @click="applyPriceFilter('asc')" :class="{ 'filter-link-active': selectedPriceFilter === 'asc' }" href="#" class="filter-link stext-106 trans-04">
									Price: Low to High
								</button>
							</li>

							<li class="p-b-6">
								<button type="button" @click="applyPriceFilter('desc')" :class="{ 'filter-link-active': selectedPriceFilter === 'desc' }" href="#" class="filter-link  stext-106 trans-04">
									Price: High to Low
								</button>
							</li>
						</ul>
					</div>
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price Range
						</div>

						<ul>
							<li class="p-b-6">
								<input type="number" v-model="priceFrom" placeholder="Price from" class="border bg-white ps-2 rounded">
							</li>

							<li class="p-b-6">
								<input type="number" v-model="priceTo" placeholder="Price to" class="border bg-white ps-2 rounded">
							</li>
						</ul>
					</div>

				</div>
				<div class="p-l-40 p-r-15 p-b-27">
				<button class=" py-1 hov-btn1 border border-dark  px-4 " @click="fetchFilteredProducts">Filter</button>
				<button class="py-1 hov-btn1 border border-dark  px-4 ms-2" @click="clearFilteredProducts">Clear</button>
				</div>
			</div>
			<!-- Search product -->
			<div v-if="isProductSearch" class=" panel-search w-full  p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input v-model="searchTerm" @input="fetchProducts" class="mtext-107 cl2 size-114 plh2 p-r-15"  name="search" placeholder="Search">
					</div>	
				</div>

			<div class="row isotope-grid " ref="grid">
				
				 <div v-for="product in products.data" :key="product.id" :class="product.category"  class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item "> 
					
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img :src="product.default_variant.image_url" alt="IMG-PRODUCT" @load="imageLoaded">

							<button @click="openModal(product)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</button>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ product.name }}
								</a>

								<span class="stext-105 cl3">
									${{ product.default_variant.price }}
								</span>
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
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img :src="picon1" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img :src="picon2" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img :src="picon3" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img :src="picon4" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img :src="picon5" alt="ICON-PAY">
					</a>
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

	<!-- Modal1 -->
	<div v-if="selectedProduct" class="product-modal p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1" @click="closeModal"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1"  @click="closeModal">
					<img :src="iconClose2" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
								<div class="slick3 gallery-lb">

								<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
								
								<div class="carousel-inner">
									<div v-for="(image, index) in selectedVariant.images" :key="index" :data-thumb="image" class="carousel-item " :class="{ active: index === 0 }">
									<img class="d-block w-100" :src="`/storage/images/${image}`" alt="First slide">
									
									</div>
								</div>
								
								<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
      							</div>
      							</div>
							</div>
						</div>
					</div>
					<div>
   
  </div>
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								{{ selectedProduct.name }}
							</h4>

							<span class="mtext-106 cl2">
								${{ selectedVariant.price }}
							</span>

							<p class="stext-102 cl3 p-t-23">
								{{ selectedProduct.description }}
							</p>
							<p  v-if="selectedVariant.stock <= 0" class="out-of-stock">Out of Stock</p>
							<p v-else class="text-info">In Stock</p>
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2 p-3 w-full text-uppercase" v-model="selectedSize" @change="updateVariant()">
												<option v-for="size in variantSizes" :key="size" :value="size">{{ size }}</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2  d-flex bg0">
										
										<div v-for="color in variantColors" :key="color" class="color-circle"
											:style="{ backgroundColor: color }"
											@click="selectedColor = color; updateVariant()"
											:class="{ 'active-color': selectedColor === color }">
										</div>
										
									</div>
									</div>
									<div class="text-danger" v-if="sizeAndColorCombination">This combination is not available</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" @click="decrementQuantity">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" v-model="quantity" readonly>

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" @click="incrementQuantity">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button :disabled="selectedVariant.stock <= 0?true:(sizeAndColorCombination?true:false) " :class="selectedVariant.stock <= 0?'disabled-button':(sizeAndColorCombination?'disabled-button':'') " v-if="!isInCart"  @click="addToCart()" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
										<div v-else class="flex-c-m stext-101 cl2 size-101 p-lr-15 trans-04 js-addcart-detail">
                      Already in cart
                    </div>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	
	
<!--===============================================================================================-->


</body>

</template>
  <!-- <button @click="logout">Logout</button> -->

<script>
import { useCartStore } from '../../store/cart';
import iconCloseU from '../../../../public/images/icons/icon-close2.png';
import iconClose2U from '../../../../public/images/icons/icon-close.png';
import heart1U from '../../../../public/images/icons/icon-heart-01.png';
import heart2U from '../../../../public/images/icons/icon-heart-02.png';
import picon1U from '../../../../public/images/icons/icon-pay-01.png';
import picon2U from '../../../../public/images/icons/icon-pay-02.png';
import picon3U from '../../../../public/images/icons/icon-pay-03.png';
import picon4U from '../../../../public/images/icons/icon-pay-04.png';
import picon5U from '../../../../public/images/icons/icon-pay-05.png';

// component
import swal from 'sweetalert';
import Isotope from 'isotope-layout';
import Navbar from '../layout/navbar.vue';
import axios from 'axios';
import Pagination from '../layout/pagination.vue';
export default {
  name: 'Products',
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
	openModal(product) {
	this.selectedProduct = product;
	this.selectedVariant = product.default_variant;
      this.selectedSize = product.default_variant.size; // Set initial size
      this.selectedColor = product.default_variant.color; // Set initial color
      this.updateVariant(); 
    },
    closeModal() {
	  this.selectedProduct = null;
      this.selectedVariant = null;
      this.selectedSize = null;
      this.selectedColor = null;
    },
	updateVariant() {
		
		if (this.selectedProduct) {
			const exists = this.selectedProduct.variants.some(variant =>variant.size === this.selectedSize && variant.color === this.selectedColor);
			
			if(exists){
			  this.selectedVariant = this.selectedProduct.variants.find(variant =>  
			  variant.size === this.selectedSize && variant.color === this.selectedColor
			  )
			  this.sizeAndColorCombination=false;
		  }
		  else{
			  this.selectedVariant = this.selectedProduct.variants.find(variant =>  
			  variant.size === this.selectedSize || variant.color === this.selectedColor
			  )
			  this.sizeAndColorCombination=true;
		  }
			
		  
		  if (this.selectedVariant) {
			this.variantSizes = [...new Set(this.selectedProduct.variants.map(v => v.size))];
			this.variantColors = [...new Set(this.selectedProduct.variants.map(v => v.color))];
		  }
		}
	  },
	incrementQuantity() {
      if (this.quantity < this.selectedVariant.stock) {
        this.quantity += 1;
      }
    },
    decrementQuantity() {
      if (this.quantity > 1) {
        this.quantity -= 1;
      }
    },

	addToCart() {
	const cartStore = useCartStore();
	
	if (!this.selectedVariant) {
		swal({
		title: "Unavailable!",
		text: "This combination is not available.",
		icon: "error",
		button: "OK",
		});
		return;
	}

		cartStore.addItem({ 
		...this.selectedVariant, 
		quantity: this.quantity,
		id: this.selectedVariant.id,
		name: this.selectedProduct.name,
		taxRate: this.selectedProduct.tax==null?1:(this.selectedProduct.tax.rate)/100,
		image: this.selectedVariant.image || this.selectedProduct.image,
		});
	

	this.quantity = 1;
	swal({
		title: "Added to Cart!",
		text: "The item has been added to your cart.",
		icon: "success",
		button: "Continue Shopping",
	});
	
	this.closeModal();
	},

	async fetchProducts(page=1) {
		this.currentPage=page
      try {
		const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        const response = await axios.post('/api/products',{price: this.selectedPriceFilter || '',category: this.selectedCategory || '',search: this.searchTerm || '',priceFrom: this.priceFrom || '',priceTo: this.priceTo || '',page: this.currentPage},{headers});
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
		// this.fetchProducts();
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
		products: [],
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
      iconClose:iconCloseU,
      iconClose2:iconClose2U,
      heart1:heart1U,
      heart2:heart2U,
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
  background-color: #ccc; 
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