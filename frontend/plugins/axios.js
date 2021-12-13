// plugins/axios.js
export default function ({ $axios, $auth, redirect, store,app }) {
  var token = app.$cookies.get("x-access-token");
  if(typeof token === 'undefined'){
    token = "";
  }
  $axios.onRequest((config) => {
    config.headers = {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: 'Bearer ' + token, // refers to nuxt.config.js->auth.token
    };
  });

  $axios.onError((error) => {
    if (error.response.status === 500) {
      redirect("/error");
    }
  });
}
