import cookies from 'js-cookie';

export default function ({ store, redirect ,route  }) {
  // const token = cookies.get('x-access-token');
  const token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjNhNTQ5NmNkM2FkOWM1NTQ4N2Q3YmEzMGZhMTk5MjNjYmU2NWYxN2M3MmExYzUwMGFiYWYyODBkNDllNTA1YWM0ODA3YTczMmM5YmQ2YjgiLCJpYXQiOjE2MzkwNjI2OTEuMDk0Nzc3LCJuYmYiOjE2MzkwNjI2OTEuMDk0NzgyLCJleHAiOjE2NzA1OTg2OTAuOTU0ODY2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.p3ul8NpTwdwx27h-xb2kdSSV92WYz7sRlsnkX3YBWkcixxCTF7gyAVYgv1ecB96p1hgnh2ZYJ3RUWNG-RNz4Hw-7mr7iMCoycQKQcIEhwdItx96QTMOcfIFvc1txB0I2NMgTC5xnHMZg9rQw6GYgpMpGfy5Na_NP3hfJMgwOkpcppL-2c31yvCSUGu3XbtPrqSqr1Ft3_s4wMEUOwhrD9SFs_Au0pEGlqaU64IJGzoZ8FSc9LqFye0LdGYp2PSvCjArjxyYxziXlW1ZutG2oUFWpAgsndY8RHgpNXwhoAiJkcFGki0sMzYiMFYz5_iiCQ52VWVtLTJGuBQZYWTBJgJerJMTnQIKUirDQpEl7OtdR4aSiQ0bIcVRRyY46vhzmYHXdr0wqq17Rk7ZAGEj9cM7o_2Y4igPU-yv7IgNX39afB1Ldc8VnUT0iZppOf2ZrBNyRS4LzN7RsYplocpxEX25kvI8ZskuETqCny5-orYPwqZFQZIGkg-xFSqg6Ut0Zv6q9I6iWjRfFp2hs2VXTYAyCRH9DhZXqfvXBuuuL4drjW4FODI6aV-_oVtmrULv36tTI175XlVz4HcuQe8BKp-qfwqG7fEGo5U7VM44jeqCWZ92p3dt_LgfxBjhDQtFBtXNQvk5dk_1-MaO5E5eIIa0Dnxb_I-2vanMi1ohT6bk'
  if (! token && route.fullPath !== '/staff/register' && route.fullPath !== '/staff/login') {
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
