import { defineStore } from 'pinia';

export const useCartStore = defineStore('cart', {
  state: () => ({
    cartItems: [],
  }),
  actions: {

async loadCart() {
    try {
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      const response = await axios.get('/api/cart',{headers});
      this.cartItems = response.data.cartItems || [];
    } catch (error) {
      console.error('Failed to load cart:', error);
    }
  },
  async saveCart() {
    try {
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      await axios.post('/api/cart', { cartItems: this.cartItems },{ headers } );
    } catch (error) {
      console.error('Failed to save cart:', error);
    }
  },
  // addItem(item) {
  //   const existingItem = this.cartItems.find(cartItem => cartItem.id === item.id);
  //   if (existingItem) {
  //     existingItem.quantity += item.quantity;
  //   } else {
  //     this.cartItems.push(item);
  //   }
  //   this.saveCart();
  // },
  addItem(item) {
    const existingItem = this.cartItems.find(cartItem => cartItem.id === item.id);
    if (existingItem) {
      existingItem.quantity += item.quantity;
    } else {
      this.cartItems.push(item);
    }
    this.saveCart();
  },
  removeItem(itemId) {
    this.cartItems = this.cartItems.filter(item => item.id !== itemId);
    this.saveCart();
  },
  clearCart() {
    this.cartItems = [];
    this.saveCart();
  },
  incrementItemQuantity(itemId) {
    const item = this.cartItems.find(item => item.id === itemId);
    if (item && item.quantity < item.stock) { // assuming item.stock is the available quantity
      item.quantity += 1;
      this.saveCart();
    }
  },
  decrementItemQuantity(itemId) {
    const item = this.cartItems.find(item => item.id === itemId);
    if (item && item.quantity > 1) {
      item.quantity -= 1;
      this.saveCart();
    }
  }
}
});
