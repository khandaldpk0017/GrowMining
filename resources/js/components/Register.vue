<!-- resources/js/components/Register.vue -->

<template>
  <body>
 <div class="container">
        <div class="login-box">
      <h2>Register</h2>
    <form @submit.prevent="register">
      <div class="input-box">
        <input v-model="name" type="text" id="name" required>
        <label for="name">Name</label>
      </div>
      <div class="input-box">
        <input v-model="email" type="text" id="email" required>
        <label for="email">Email</label>
        <div v-if="error.email" class="error">{{ error.email[0] }}</div>
      </div>
      <div class="input-box">
        <input v-model="mobile" type="number" id="mobile" required>
        <label for="mobile">Mobile Number</label>
        <div v-if="error.mobile" class="error">{{ error.mobile[0] }}</div>
      </div>
      <div class="input-box">
        <input v-model="password" type="password" id="password" required>
        <label for="password">Password</label>
        <div v-if="error.password" class="error">{{ error.password[0] }}</div>
      </div>
      <div class="input-box">
        <input v-model="referCode" type="text" id="referCode" >
        <label for="password">Refer Code (Optional)</label>
        <div v-if="error.refer_code" class="error">{{ error.refer_code[0] }}</div>
      </div>
      <button type="submit"class="btn">Register</button>
      <!-- <div v-if="error" class="error">{{ error }}</div> -->
      <div class="signup-link">
        <button @click="goToLogin">Sign in</button>
                </div>
    </form>
  </div>
  
  </div>
  </body>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      name: '',
      email: '',
      mobile: '',
      password: '',
      error: '',
      referCode: ''
    }
  },
  methods: {
   
    async register() {
      try {
        const response = await axios.post('/api/register', {
          name: this.name,
          email: this.email,
          mobile: this.mobile,
          password: this.password,
          refer_code: this.referCode
        });
          Swal.fire({
          title: 'Confirm!',
          text: 'User Registered Successfully',
          icon: 'success',
          confirmButtonText: 'Ok',
            reverseButtons: true  // Reverse the button positions
        }).then((result) => {
          this.$router.push({ name: 'Home' }); // Redirect to Home on success
        }).catch((error)=>{
          console.log(error)
        })
      } catch (error) {
        this.error = error.response.data || 'Registration failed';
        console.error(error.response.data);
      }
    },
    goToLogin() {
      this.$router.push({ name: 'Login' });
    },
    getReferralCodeFromURL() {
      const params = new URLSearchParams(window.location.search);
      const referCode = params.get('referral');
      if (referCode) {
        this.referCode = referCode;
      }
    }
  },
  mounted() {
    console.log("    hsdghsj")
    this.getReferralCodeFromURL();
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #1f293a;
}
.container {
    position: relative;
    width: 256px;
    height: 256px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-box {
    position: absolute;
    width: 400px;
}
.login-box form {
    width: 100%;
    padding: 0 50px;
}
h2 {
    font-size: 2em;
    color: #0ef;
    text-align: center;
}
.input-box {
    position: relative;
    margin: 25px 0;
}
.input-box input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: 2px solid #2c4766;
    outline: none;
    border-radius: 40px;
    font-size: 1em;
    color: #fff;
    padding: 0 20px;
    transition: .5s ease;
}
.input-box input:focus,
.input-box input:valid {
    border-color: #0ef;
}
.input-box label {
    position: absolute;
    top: 50%;
    left: 20px;
    transform: translateY(-50%);
    font-size: 1em;
    color: #fff;
    pointer-events: none;
    transition: .5s ease;
}
.input-box input:focus~label,
.input-box input:valid~label {
    top: 1px;
    font-size: .8em;
    background: #1f293a;
    padding: 0 6px;
    color: #0ef;
}
.forgot-pass {
    margin: -15px 0 10px;
    text-align: center;
}
.forgot-pass a {
    font-size: .85em;
    color: #fff;
    text-decoration: none;
}
.forgot-pass a:hover {
    text-decoration: underline;
}
.btn {
    width: 100%;
    height: 45px;
    background: #0ef;
    border: none;
    outline: none;
    border-radius: 40px;
    cursor: pointer;
    font-size: 1em;
    color: #1f293a;
    font-weight: 600;
}
.signup-link {
    margin: 20px 0 10px;
    text-align: center;
}
.signup-link button {
    font-size: 1em;
    color: #0ef;
    text-decoration: none;
    font-weight: 600;
}
.signup-link button:hover {
    text-decoration: underline;
}
.error {
  color: red;
}
</style>
