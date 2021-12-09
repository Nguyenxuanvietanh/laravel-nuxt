import cookies from 'js-cookie';

export default function ({ store, redirect ,route ,app  }) {
  const token = app.$cookies.get('x-access-token');
  console.log("middlewware");
  console.log(route.fullPath);
  if ( !token  && route.fullPath !== '/staff/register' && route.fullPath !== '/staff/login') {
    console.log("hêr");
    return redirect('/staff/login');
    // store.dispatch('logout');
  }
  // if (! token) {
  //   store.dispatch('refreshToken')
  //     .catch(errors => {
  //       console.dir(errors);
  //       store.dispatch('logout');
  //     });
  // }
}
