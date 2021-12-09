export default function ({ store, redirect }) {
  console.log("middlewware");
  console.log($nuxt.$route.name);
  console.log(store.state.token);
  if (! store.state.token) {
    // return redirect('/');
  }
}
