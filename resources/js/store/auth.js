import axios from 'axios';

const state = {
  token: localStorage.getItem('token') || '',
  user: {},
};

const mutations = {
  setToken(state, token) {
    state.token = token;
  },
  setUser(state, user) {
    state.user = user;
  },
};

const actions = {
  async register({ commit }, user) {
    await axios.post('/api/register', user);
  },
  async login({ commit }, user) {
    const response = await axios.post('/api/login', user);
    const token = response.data.token;
    commit('setToken', token);
    localStorage.setItem('token', token);
  },
  async fetchUser({ commit }) {
    const response = await axios.get('/api/user');
    commit('setUser', response.data);
  },
};

const getters = {
  isAuthenticated: state => !!state.token,
  user: state => state.user,
};

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters,
};
