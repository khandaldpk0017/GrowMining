<!-- resources/js/components/Home.vue -->

<template>

<body >
	
	<!-- Header -->
	<Navbar />

	<!-- Product -->
	<section class="bg0 p-t-70 m-t-50 p-b-140">
		<div class="container p-4 text-capitalize bor2 " style="background-color: lightgrey;width: 60%;" >
			<!-- <h1 class="">Subject : {{ ticket.subject }}</h1>
    <p>Description  : {{ ticket.description }}</p>
    <p>Status: {{ ticket.status }}</p>

    <div v-if="ticket.image_url" class="">
      <img :src="ticket.image_url" alt="Ticket Image"  width="100px" />
    </div> -->

    <div class="chat-window ">
      <div v-for="message in messages" :key="message.id" class="chat-message ">
        <p v-if="message.message" :class="message.sender=='admin'?'justify-content-start':'justify-content-end'" class="d-flex my-2 " ><strong class="p-1">{{ message.sender=='admin'?'admin':'you' }}:</strong> <p class="bor2 bg-white p-1 px-3">{{ message.message }}</p></p>
        <p v-if="message.image" :class="message.sender=='admin'?'justify-content-start':'justify-content-end'" class="d-flex my-2 " ><strong class="p-1">{{ message.sender=='admin'?'admin':'you' }}:</strong> <p class="bor2 bg-white p-1 px-3"><img width="100px" :src="`/storage/images/${message.image}`" ></p></p>
      </div>
    </div>

    <form @submit.prevent="sendMessage" class="d-flex position-relative">
      <input :required="!selectedImage" class="bor10  w-full bor2 p-2 px-3 bg-white" type="text" v-model="newMessage" placeholder="Type your message">
      <input ref="fileInput" id="imageSend" class="bor10 d-none w-full bor2 p-2 px-3 bg-white" type="file" @change="onImageSelected" accept="image/*" placeholder="Type your message">
	  <label for="imageSend"><i class="fa position-absolute  fa-file-alt" style="right: 80px; top: 13px;"></i><span style="right: 75px; top: -2px;" class="position-absolute text-red fs-25 font-bold" :class="!selectedImage?'d-none':''" >*</span></label>
      <button class="bor10  bor2 p-2 px-3 bg-dark text-white" type="submit">Send</button>
    </form>
		
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
  name: 'TicketDetail',
  components: { Navbar },
  data() {
    return {
		picon1:picon1U,
	   picon2:picon2U,
	   picon3:picon3U,
	   picon4:picon4U,
	   picon5:picon5U,
      ticket: {},
      messages: [],
      newMessage: '',
	  selectedImage: null,
      
    };
  },
  methods: {
    fetchTicket() {
		const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      axios.get(`/api/tickets/${this.$route.params.id}`,{headers})
        .then(response => {
          this.ticket = response.data;
          this.messages = response.data.ticket_chats;
        });
    },
    sendMessage() {
		const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
		const formData = new FormData();
		formData.append('message', this.newMessage);
		if (this.selectedImage) {
			formData.append('image', this.selectedImage);
		}
      axios.post(`/api/tickets/${this.ticket.id}/chat`, formData,{headers})
        .then(() => {
          this.newMessage = '';
          this.fetchTicket();
		  this.selectedImage = null;
		  this.$refs.fileInput.value = '';
        });
    },
	onImageSelected(event) {
      const file = event.target.files[0];
      if (file) {
        this.selectedImage = file;
       
      }
    },
    
  },
  created() {
    this.fetchTicket();
  },
};

</script>
<style scoped>
/* .chat-window{
	height: 350px;
	overflow-y: scroll;
	
}
.chat-window::-webkit-scrollbar {
  display: none;
} */
</style>