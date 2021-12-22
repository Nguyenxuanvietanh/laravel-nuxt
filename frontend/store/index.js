import cookies from 'js-cookie';

export const state = () => ({
  token: null,
  loading: false
});

export const mutations = {
  SET_TOKEN(state, token) {
    state.token = token;
  },

  REMOVE_TOKEN(state) {
    state.token = null;
  },
  SET_LOADING(state){
    state.loading = state;
  }
};

export const actions = {
//   nuxtServerInit ({commit}, {req, route, app, store}) {
//     let token = cookies.get('x-access-token');
//     console.log("nuxtServerInit");
// console.log(token);
//     if (!token) return

//     commit('setToken', token)
//     app.$axios.setToken(token, 'Bearer')
//   },
  async setToken({commit}, {token, expiresIn}) {
    this.$axios.setToken(token, 'Bearer');
    const expiryTime = new Date(new Date().getTime() + expiresIn * 1000);
    cookies.set('x-access-token', token, {expires: expiryTime});

    commit('SET_TOKEN', token);
    this.$axios.onRequest((config) => {
      config.headers = {
        "Content-Type": "application/json",
        Accept: "application/json",
        Authorization: 'Bearer ' + token, // refers to nuxt.config.js->auth.token
      };
    });

    this.$axios.onError((error) => {
      if (error.response.status === 500) {
        redirect("/error");
      }
    });
  },

  async refreshToken({dispatch}) {
    const {token, expiresIn} = await this.$axios.$post('refresh-token');
    dispatch('setToken', {token, expiresIn});
  },

  logout({commit}) {
    this.$axios.setToken(false);
    this.$cookies.remove('x-access-token');
    commit('REMOVE_TOKEN');
  },
  setLoading({commit},{value}){
    commit('SET_LOADING', value);
  }
};
