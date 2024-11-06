<!-- resources/js/components/Home.vue -->

<template>

<body >
	
	<!-- Header -->
	<Navbar />
	
	<!-- support -->
	<section class="bg0 p-t-50 m-t-50 p-b-140">
		<div class="container">
	<div class="row">
				<div class="col-lg-10 col-xl-11 m-b-50">
					<div class="m-l-0 m-r--38 m-lr-0-xl">
						<h5 class="text-uppercase">My Support Tickets</h5>
    <button class=" fs-12  p-0 size-102   bg-dark text-white px-2 mt-4 mb-4 my-2 " @click="showCreateTicket()">Create New Ticket</button>
    
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="">
									<th class=" py-3 ps-5 text-start">Ticket Id</th>
									<th class="">Ticket Subject </th>
									<th class="">Ticket Description</th>
									<th class="">Status</th>
									<th class="">Action</th>
								</tr>

								<tr v-if="tickets.length" class="text-start" v-for="ticket in tickets" :key="ticket.id">
									<td class="py-3 ps-5">
										{{ ticket.id }}
									</td>
									<td class="">{{  ticket.subject }}</td>
									<td class="">{{  ticket.description  }}</td>
									<td class="">{{  ticket.status  }}</td>
									
									<!-- <td class="">${{ order.pincode }}</td> -->
									<td class="">
										<router-link  class="flex-c-m  stext-101 cl0 p-2 px-3 bg3 bor14 hov-btn3 p-lr-1 trans-04 pointer" :to="`/TicketDetail/${ticket.id}`">View Details</router-link>
									</td>
								</tr>
								<tr v-else>
									<td class="py-3 ps-5">
										No Tickets Found.
									</td>
								</tr>

							
							</table>
						</div>

					</div>
				</div>

			</div>
		
		</div>
	</section>

	
	<!-- Footer -->
	<footer class="bg3 p-t-5 p-b-10 fixed-bottom web-footer">
		<div class="container">
			

			<div class="py-2">
				<div class="flex-c-m flex-w  nav-footer">
					
						<router-link to="/" active-class="text-white" class=" pr-2">Home</router-link> 
					
|
					
						<router-link to="/Wallet" active-class="text-white" class=" px-2">Deposit & Withdraw</router-link>
					
|
					
						<router-link to="/Refer" active-class="text-white" class=" px-2">Refer & Earn</router-link>
					
|
					
						<router-link to="/Support" active-class="text-white" class=" pl-2">Support</router-link>
						<router-link to="/MyOrders" active-class="text-white" class=" pl-2">My Orders</router-link>
					

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
import CreateSupportTicket from './CreateSupportTicket.vue';
export default {
  name: 'Support',
  components: { CreateSupportTicket,Navbar },
  data() {
    return {
      tickets: [],
	  picon1:picon1U,
     picon2:picon2U,
     picon3:picon3U,
     picon4:picon4U,
     picon5:picon5U,
    };
  },
  methods: {
    fetchTickets() {
		const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      axios.get('/api/tickets',{headers}).then(response => {
        this.tickets = response.data;
      });
    },
	showCreateTicket(){
		this.$router.push({ name: 'CreateSupportTicket' });
	}
  },
  created() {
    this.fetchTickets();
  },
};

</script>
<style scoped>

</style>