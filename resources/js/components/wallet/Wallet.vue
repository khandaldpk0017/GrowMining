<!-- resources/js/components/Home.vue -->

<template>

    <body >
        
        <!-- Header -->
        <Navbar />
    
     
    
    
        <!-- Content page -->
        <section class="bg0 p-t-20 p-b-10">
            <div class="container w-full d-flex justify-content-center  ">
                <div class=" w-full d-flex justify-content-center align-items-center flex-column  p-3">
                  <div id="d-1">
                    <h4 style="color:white"><b>Wallet Balance: <br>₹ {{ walletBalance }} </b></h4>
                  </div>
                  <div  class=" w-full d-flex justify-content-center">
                    <button @click="showAddMoneyModal = true" class="btn btn-info m-2">Add Money</button>
                    <button @click="showWithdrawMoneyModal = true" class="btn btn-info m-2">Withdraw Money</button>
                  </div>
            </div>
    <hr>
    <div v-if="showQr" class="modal ">
      <div class="modal-content w-75">
      <h4>Deposit Money</h4>
      <img :src="`/storage/images/${randomQrOrUpi.qr_image}`" class="py-2" width="100%" alt="QR Code">
      UPI ID <div class="d-flex  w-full"> <input type="text" v-model="randomUpi" class="w-full border px-2 py-0.5 border-dark form-control " disabled><button @click="copyToClipboard(randomUpi)" class="py-0.5 px-2 border border-primary btn-primary">Copy</button></div>
      <div v-if="copySuccess" class="alert alert-success mt-3">
                {{ copySuccess }}
                </div>
      <form @submit="addMoney($event)">
        <label for="" class="pt-2 pb-0">Payment UTR Number</label>
      <input v-model="utrNumber" type="number" required class="border w-full border-dark px-2 py-0.5 my-2" placeholder="Enter Utr Number" />
      <label for="ss"> Upload Payment Screen shot</label>
      <input id="ss" @change="handleFileUpload" type="file" required class="border w-full  px-2 py-0.5 my-2"  />
      <button class="btn btn-success my-2" type="submit">Add</button>
      <button class="btn btn-danger my-2" @click="showQr = false">Cancel</button>
      </form>
    </div>
    </div>
    <!-- Modals for adding/withdrawing money -->
    <div v-if="showAddMoneyModal" class="modal ">
      <div class="modal-content w-50">
        <h3>Add Money to Wallet</h3>
        <input v-model="amountToAdd" type="number" class="border p-2  my-2" placeholder="Enter amount" />
        <button class="btn btn-success my-2" @click="showQrAndUpi">Add</button>
        <button class="btn btn-danger my-2" @click="showAddMoneyModal = false">Cancel</button>
      </div>
    </div>

    <div v-if="showWithdrawMoneyModal" class="modal">
      <div class="modal-content w-75">
        <h3>Withdraw Money from Wallet</h3>
        <div v-if="calculatedAmount" class="my-2">
      <p>Amount after 3% charge: <strong>{{ calculatedAmount }}</strong></p>
    </div>
        <!-- Show account details inputs only if they are not already set -->
         <form  @submit="submitWithdrawDetails($event)">
        <div v-if="!accountNumber" >
          <input v-model="accountHolderNameInput" class="border p-2 w-full my-2"  type="text" placeholder="Enter Account Holder Name" required />
          <input v-model="accountNumberInput" class="border p-2 w-full my-2"  type="text" placeholder="Enter Account Number" required />
          <input v-model="ifscCodeInput" class="border p-2 w-full  my-2"  type="text" placeholder="Enter IFSC Code" required />
        </div>

        <!-- Withdraw Amount -->
        <input v-model="amountToWithdraw" @input="calculateTotal" class="border p-2  my-2"  type="number" placeholder="Enter amount to withdraw" required />
        
        <!-- Withdraw Button -->
       
         <button class="btn btn-success my-2 " type="submit" >Submit & Withdraw</button>
        <button class="btn btn-danger my-2 " @click="showWithdrawMoneyModal = false">Cancel</button>
      </form>
      </div>
    </div>     
    </div>
    <div id="instructions" class="border border-dark m-1 rounded" >
      <p style="font-weight: bold;">
        <span><b>Instructions:</b></span> <br>Everybody should earn and stay wealthy , so join us.
        <ul class="px-3" >
          <li style="list-style: circle;">Withdraw Time : 7 - 9 AM</li>
          <li style="list-style: circle;">Withdraw limit perday (in times) : 1</li>
          <li style="list-style: circle;">Withdraw Amount Range ₹300-₹50000</li>
          <li style="list-style: circle;">Withdraw Charge is 3% of amount.</li>
          <li style="list-style: circle;">Please confirm your benefical account information before withdrawing .if your 
            information is incorrect , our company will not be liable for the amount of loss.
          </li>
          <li style="list-style: circle;">Withdraw remains close on public holidays.If withdrawl done on public holiday, transaction will be processed on next day.

          </li>
          <li style="list-style: circle;font-weight: bold;">if your benefical
            information is incorrect ,please contact customer service</li>
        </ul>
      </p>
    </div>
    <div>&nbsp;</div> <div>&nbsp;</div>
    <div>&nbsp;</div> <div>&nbsp;</div>
    <div>&nbsp;</div> <div>&nbsp;</div>

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
    import { useCartStore } from '../../store/cart';
    import picon1U from '../../../../public/images/icons/icon-pay-01.png';
    import picon2U from '../../../../public/images/icons/icon-pay-02.png';
    import picon3U from '../../../../public/images/icons/icon-pay-03.png';
    import picon4U from '../../../../public/images/icons/icon-pay-04.png';
    import picon5U from '../../../../public/images/icons/icon-pay-05.png';
    
    import Swal from 'sweetalert2';
    // component
    
    import Navbar from '../layout/navbar.vue';
    import axios from 'axios';
    export default {
      name: 'Wallet',
      components: {
        Navbar
      },
      created() {
        this.fetchRandomQrOrUpi();
      },
      methods: {
        calculateTotal() {
      const amount = parseFloat(this.amountToWithdraw);
      if (amount > 0) {
        const charge = amount * 0.03; // 2% charge
        // const gstOnCharge = charge * 0.28; // 28% GST on the 2% charge
        // const totalDeductions = charge + gstOnCharge;
        const finalAmount = amount - charge; // Subtracting charge and GST from the original amount
        this.calculatedAmount = finalAmount.toFixed(2); // Display two decimal places
      } else {
        this.calculatedAmount = null;
      }
    },
        redirectToTelegram () {
  window.location.href = 'https://t.me/+917014245339'; // Replace with your Telegram link
},
        async fetchRandomQrOrUpi() {
          const token =localStorage.getItem('token');
          const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      // Fetch a random QR code or UPI ID
      const response = await axios.get('/api/qrcodes/random',{headers});
      this.randomQrOrUpi = response.data;
      this.randomUpi = response.data.upi_id;
    },
        fetchWalletBalance() {
            const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      axios.get('/api/wallet',{headers})
        .then(response => {
          this.walletBalance = response.data.wallet_balance;
          this.accountNumber = response.data.account_number;
          this.accountHolderName = response.data.account_holder_name;
          this.ifscCode = response.data.ifsc_code;
        })
        .catch(error => {
          console.error('Failed to fetch wallet balance', error);
        });
    },
    handleFileUpload(event) {
      this.imageFile = event.target.files[0]; // Get the selected image file
      console.log(this.imageFile);
    },
    addMoney(event) {
      event.preventDefault();
      const amount = parseFloat(this.amountToAdd);
      if (amount > 0) {
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
    const formData = new FormData();
      formData.append('ss', this.imageFile);
      formData.append('amount', amount);
      formData.append('qr_code_id', this.randomQrOrUpi.id);
      formData.append('utr_number', this.utrNumber);
        axios.post('/api/wallet/add', formData,{headers})
          .then(response => {
            this.walletBalance = response.data.wallet_balance;
            this.showAddMoneyModal = false;
            this.showQr = false;
            this.amountToAdd = 0;
            this.screenShot='',
            alert(response.data.message);
          })
          .catch(error => {
            this.screenShot='';
            console.error('Failed to add money', error);
          });
      }
    },
    copyToClipboard(value) {
            navigator.clipboard.writeText(value).then(() => {
                this.copySuccess = 'Copied to clipboard!';
                setTimeout(() => this.copySuccess = '', 2000); // Clear the success message after 2 seconds
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        },
    showQrAndUpi(){
      this.showAddMoneyModal = false;
      this.showQr=true;
    },
    submitWithdrawDetails(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Confirm!',
        text: 'Are you sure you want to Withdraw?',
        icon: 'warning',
        showCancelButton: true,  // Show the cancel button for confirmation
        confirmButtonText: 'Yes, Withdraw',
        cancelButtonText: 'No, cancel',
        reverseButtons: true  // Reverse the button positions
    }).then((result) => {
      if (result.isConfirmed) {
      const amount = parseFloat(this.amountToWithdraw);
        if(amount<300 || amount>50000){
          alert('Amount is not in given range');
          return;
        }

      if (amount > 0 && amount <= this.walletBalance) {
        const token =localStorage.getItem('token');
     
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        axios.post('/api/wallet/withdraw', {
          amount:this.calculatedAmount,
          total_amount:amount,
          account_number: this.accountNumberInput || this.accountNumber,
          ifsc_code: this.ifscCodeInput || this.ifscCode,
          account_holder_name:this.accountHolderNameInput || this.accountHolderName
        },{headers})
        .then(response => {
          this.walletBalance = response.data.wallet_balance;
          this.showWithdrawMoneyModal = false;
          this.amountToWithdraw = 0;
          this.accountNumberInput = '';
          this.accountHolderNameInput='',
          this.ifscCodeInput = '';
          // alert(response.data.message);
          location.reload();
        })
        .catch(error => {
          if (error.response && error.response.status === 403) {
            alert(error.response.data.message);
            this.showWithdrawMoneyModal = false;
            this.accountNumberInput = '';
          this.accountHolderNameInput='',
          this.ifscCodeInput = '';
          } else {
            console.log('Failed to withdraw money', error);
            this.accountNumberInput = '';
          this.accountHolderNameInput='',
          this.ifscCodeInput = '';
          }
        });
      } else {
        alert('Insufficient funds or invalid amount.');
        this.accountNumberInput = '';
          this.accountHolderNameInput='',
          this.ifscCodeInput = '';
      }
    } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Action if the user cancels
            Swal.fire('Cancelled', 'Your Withdraw Request has been cancelled.', 'error');
            this.accountNumberInput = '';
          this.accountHolderNameInput='',
          this.ifscCodeInput = '';
        }
    });
    }
      },
      computed: {
        
        },
        mounted() {
    this.fetchWalletBalance();
  },
  watch: {
    amountToWithdraw(newVal) {
      this.calculateTotal();  // Recalculate the total when the amount changes
    }
  },
      data() {
        return {
         picon1:picon1U,
         picon2:picon2U,
         picon3:picon3U,
         picon4:picon4U,
         picon5:picon5U,
         baseUrl: 'http://127.0.0.1:8000/register', // Replace with your website's URL
         referralCode: JSON.parse(localStorage.getItem('user')).refer_code, // Replace with the actual referral code of the user
         copySuccess: '',
         walletBalance: 0, // Initially 0
      showAddMoneyModal: false,
      showWithdrawMoneyModal: false,
      amountToAdd: 0,
      amountToWithdraw: 0,
      errorMessage:'',
      accountNumberInput: '',
      ifscCodeInput: '',
      accountHolderNameInput:'',
      accountHolderName:'',
      accountNumber: '', // Initially empty, will be fetched from backend
      ifscCode: '', // Initially empty, will be fetched from backend
      randomQrOrUpi: null,
      utrNumber: '',
      successMessage: '',
      showQr:false,
      randomUpi:null,
      copySuccess:'',
      screenShot:'',
      imageFile:null,
      calculatedAmount: null,
        };
      },
    };
    
    </script>
    <style scoped>
    
    .modal {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}
.modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;

}

#d-1{
  background-color: #5cb85c;
  color:black;
  border-radius: 30px;
  padding: 58px;
  
  top:80px;
  left: 10px;
  right: 10px;
}

.button-container{
  display: grid;           
  grid-template-columns: repeat(2, auto); 
  gap: 10px; 
}

.btn{
  display:inline-block;
  padding: 10px 20px;
}

#instructions{
  padding: 20px;
}

<<<<<<< HEAD
    </style>
=======
    </style>
>>>>>>> dcf0ce4 (add untracked files)
